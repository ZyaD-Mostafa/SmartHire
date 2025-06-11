<?php

namespace App\Http\Controllers;
use App\Models\Exam;
use App\Models\Job;
use App\Models\UserAnswer;
use App\Models\UserExam;
// use Illuminate\Container\Attributes\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ExamController extends Controller
{

    public function submitExam(Request $request, $job, $exam)
    {
        // تحميل الامتحان مع أسئلته
        $exam = Exam::with('questions')->findOrFail($exam);
        $userId = Auth::id();
        $isLike = $request->input('is_like'); // "1" for like, "0" for dislike, or null if not set


        // التأكد من أن المستخدم لم يؤدِ الامتحان مسبقاً
        if (UserExam::where('user_id', $userId)->where('exam_id', $exam->id)->exists()) {
            return redirect()->route('user.avajob', ['job' => $job])
                             ->with('error', 'You have already taken this exam.');
        }

        // إنشاء سجل لمحاولة الامتحان
        $userExam = UserExam::create([
            'user_id' => $userId,
            'exam_id' => $exam->id,
            'is_like' => $isLike ,
            'score'   => 0, // سنحدث القيمة لاحقاً بعد حساب الدرجات
        ]);

        $totalScore = 0;

        // التكرار على كل سؤال من أسئلة الامتحان
        foreach ($exam->questions as $question) {
            // تم تسميته في الفورم باسم "q{question_id}"
            $inputName = 'q' . $question->id;
            $chosen = $request->input($inputName);
            $isCorrect = false;

            // مقارنة الإجابة المختارة مع الإجابة الصحيحة المخزنة في قاعدة البيانات
            if ($chosen && $chosen == $question->correct_answer) {
                $isCorrect = true;
                $totalScore += $question->points;
            }

            // تخزين إجابة المستخدم لكل سؤال في جدول user_answers
            UserAnswer::create([
                'user_exam_id' => $userExam->id,
                'question_id'  => $question->id,
                'chosen_answer' => $chosen ?? 'not answered',  // Use a default value if $chosen is null
                'is_correct'   => $isCorrect,
            ]);
        }

        // تحديث سجل محاولة الامتحان بالدرجة النهائية
        $userExam->update(['score' => $totalScore]);


            // Flash two session variables:
        // One to trigger the feedback modal
        session()->flash('examSubmitted', true);
        // One to pass the correct exam id
        session()->flash('solvedExamId', $exam);





        // Get the job record with its associated exams
    $jobRecord = Job::with('exams')->findOrFail($job);

    // Count the total exams for this job
    // $totalExams = $jobRecord->exams->count();

    // // Count how many exams the user has taken in this job
    // $userTakenExams = UserExam::where('user_id', $userId)
    //                           ->whereIn('exam_id', $jobRecord->exams->pluck('id'))
    //                           ->count();

    // // If user has completed all exams, redirect to the thanks page
    // if ($userTakenExams >= $totalExams) {
    //     return redirect()->route('user.thankPage')
    //         ->with('success', 'Exam submitted successfully! Your score is: ' . $totalScore);
    // } else {
        // Otherwise, redirect back to the available jobs page (avajob)
        return redirect()->route('user.avajob', ['job' => $jobRecord->id])
            ->with('success', 'Exam submitted successfully! Your score is: ' . $totalScore);
    // }
}





    public function show($job ,  $exam)
    {


        // تحميل بيانات الوظيفة (إن احتجت إليها)
    $job = Job::findOrFail($job);
    // تحميل الامتحان مع أسئلته
    $exam = Exam::with('questions')->findOrFail($exam);

    $userExam = UserExam::where('user_id', Auth::id())
    ->where('exam_id', $exam->id)
    ->first();
        if ($userExam) {
        return redirect()->route('user.avajob', ['job' => $job->id])
    ->with('error', 'You have already taken this exam.');
    }

        return view('user.exams.exam', compact('job', 'exam'));

    }


}
