<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use App\Models\User;
use App\Models\Job;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\QuestionsImport;
use App\Exports\QuestionTemplateExport;
use App\Models\UserExam;
use App\Models\UserApp;


class AdminController extends Controller
{
    //

    public function index(){

        $user=Auth::user()->id;
        $jobCount=Job::where('user_id',$user)->count();
        $jobid=Job::where('user_id',$user)->pluck('id');
        $examCount=Exam::whereIn('job_id',$jobid)->count();
        $userApplicationCount=UserApp::whereIn('job_id',$jobid)->count();



        $questionCount = Question::whereIn('exam_id', function($query) use ($user) {
            $query->select('id')
                  ->from('exams')
                  ->whereIn('job_id', function($query) use ($user) {
                      $query->select('id')
                            ->from('jobs')
                            ->where('user_id', $user);
                  });
        })->count();

        $jobs = Job::with([
            'exams' => function($query) {
                $query->with([
                    'userExams' => function($query) {
                        $query->with('user');
                    }
                ]);
            }
        ])->where('user_id',$user)->orderBy('id', 'DESC')->get();

        return view('admin.home',compact('jobs','userApplicationCount','jobCount','questionCount','examCount'));

    }



    public function showJob(){
        $user=Auth::user()->id;
        $jobs=Job::where('user_id',$user)->orderBy('id','DESC')->get();

        return view('admin.job',compact('jobs'));
    }

    public function createJob(Request $request){

        $job=new Job();
        $job->name=$request->name;
        $job->major=$request->major;
        $job->location=$request->location;
        $job->duration=$request->duration;
        $job->is_available=$request->is_available;
        $job->user_id=Auth::user()->id;
        $job->exam_count=$request->exam_count;

        // if($request->hasFile('image')){
        //     $image=$request->file('image');
        //     $destination=public_path('uploads/jobs');
        //     $extension=$image->extension();
        //     $imageName=Carbon::now()->timestamp.'.'.$extension;
        //     $image->move($destination, $imageName);
        //     $job->image=$imageName;
        // }
        $job->save();
        return redirect()->back();
    }

    public function showExam(){
        $user=Auth::user()->id;

        $exams = Exam::whereHas('job', function($query) use ($user) {
            $query->where('user_id', $user);
        })->orderBy('id', 'DESC')->get();

        $jobs = Job::where('user_id', $user)->get();

        return view('admin.exam',compact('jobs','exams'));
    }

    public function createExam(Request $request){

        $job=Job::find($request->job_id);
        if($job){
            $existingExamsCount = Exam::where('job_id', $request->job_id)->count();
            if($existingExamsCount >= $job->exam_count){
                return redirect()->back()->with('error', 'You cannot add more exams for this job. Maximum number of exams reached.');
            }

            $exam=new Exam();
            $exam->exam_name=$request->exam_name;
            $exam->number_of_questions=$request->number_of_questions;
            $exam->exam_duration=$request->exam_duration;
            $exam->job_id=$request->job_id;
            $exam->save();
            return redirect()->back()->with('success', 'Exam created successfully.');
        } else {
            return redirect()->back()->with('error', 'Job not found.');

        }


    }

    public function showQuestion(){
        $job_id = Job::where('user_id', Auth::user()->id)->value('id');
        $exams = Exam::where('job_id', $job_id)->get();

        return view('admin.questions',compact('exams'));
    }

    public function addQuestion(){
        $exams=Exam::get();

        return view('admin.add_question',compact('exams'));
    }

    public function createQuestion(Request $request){
        $exam=Exam::find($request->exam_id);

        if($exam){
            $existingquestionCount = Question::where('exam_id', $request->exam_id)->count();
            if($existingquestionCount >= $exam->number_of_questions){
                return redirect()->back()->with('error','Cannot add more questions after limit of question if exam');
            }
            $q=new Question();
            $q->question_text=$request->question_text;
            $q->exam_id=$request->exam_id;
            $q->question_type=$request->question_type;
            $q->points=$request->points;
            $q->option1=$request->option1;
            $q->option2=$request->option2;
            $q->option3=$request->option3;
            $q->option4=$request->option4;
            $q->correct_answer=$request->correct_answer;
            $q->save();

            return redirect()->back()->with('success','added successfully');
        } else {
            return redirect()->back()->with('error', 'exam not found.');

        }


    }
    public function downloadQuestionTemplate()
    {
        return Excel::download(new QuestionTemplateExport, 'question_template.xlsx');
    }

    public function uploadQuestions(Request $request)
    {
    // Validate the uploaded file
        $request->validate([
            'excel_file' => 'required|mimes:xlsx,xls',
        ]);

        // Handle the file upload and import
        Excel::import(new QuestionsImport, $request->file('excel_file'));

        return redirect()->back()->with('success', 'Questions have been uploaded successfully.');
        }


        public function viewQuestion(Request $request){
            $examId = $request->input('exam');

            if (!$examId) {
                return redirect()->back()->with('error', 'Please select an exam.');
            }

            $exam = Exam::find($examId);

            if (!$exam) {
                return redirect()->back()->with('error', 'Exam not found.');
            }

            // Assuming you have a relationship like Exam -> questions
            $questions = $exam->questions; // Make sure Exam model has `questions()` relation

            return view('admin.view_questions', compact('exam', 'questions'));
        }


        public function editQuestion($id){
            $quesion=Question::findOrFail($id);
            return view('admin.edit_question',compact('quesion'));
        }

        public function updateQuestion(Request $request){

            $q=Question::findOrFail($request->id);
            $q->question_text=$request->question_text;
            $q->exam_id=$q->exam_id;
            $q->question_type=$request->question_type;
            $q->points=$request->points;
            $q->option1=$request->option1;
            $q->option2=$request->option2;
            $q->option3=$request->option3;
            $q->option4=$request->option4;
            $q->correct_answer=$request->correct_answer;
            $q->save();

            return redirect()->route('admin.view.questions');
        }
            public function deleteQuestion($id){
                $question=Question::findOrFail($id);
                $question->delete();
                return redirect()->back();
                
            }
        

        public function showApp(){
            $admin = Auth::user();

            // Get jobs created by this admin
            $jobs = $admin->jobs; // assuming User hasOne Job or hasMany Jobs relationship

            // Get all job IDs
            $jobIds = $jobs->pluck('id');

            // Get applications for these jobs
            $applications = UserApp::with('job') // eager load job relation
                ->whereIn('job_id', $jobIds)
                ->get();

            return view('admin.application',compact('applications'));
        }

    public function editJob($id){
        $job=Job::findOrFail($id);
        return view('admin.edit_job',compact('job'));
    }

    public function updateJob(Request $request){
        $job=Job::findOrFail($request->id);
        $job->name=$request->name;
        $job->major=$request->major;
        $job->location=$request->location;
        $job->duration=$request->duration;
        $job->is_available=$request->is_available;
        $job->user_id=Auth::user()->id;
        $job->exam_count=$request->exam_count;
        $job->save();
        return redirect()->route('admin.job');
    }

    public function deleteJob($id){

        // $job=Job::findOrFail($id);
        $job=Job::findOrFail($id);
        $job->delete();
        return redirect()->back();
    }
}
