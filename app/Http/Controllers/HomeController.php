<?php

namespace App\Http\Controllers;

use App\Models\ExamFeedback;
use App\Models\Job;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // جلب جميع الجامعات من قاعدة البيانات
        $universities = Job::all();

        // إذا كنت تريد تقسيم الجامعات إلى مجموعات (مثلاً 3 بطاقات لكل شريحة)
        $chunks = $universities->chunk(3);

        return view('home', compact('chunks'));
    }
    public function team()
    {
        return view('user.team');
    }
    public function feedback()
    {
    $feedbacks = ExamFeedback::orderBy('created_at', 'desc')->get();
    return view('user.feedback', compact('feedbacks'));
    }


 public function storeFeedback(Request $request)
    {
        // Validate the incoming request data.
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'rating'  => 'required|integer|min:1|max:5',
            'feedback'=> 'required|string',
        ]);

        // Create a new feedback entry using the ExamFeedback model.
        ExamFeedback::create([
            'user_id' => $request->user_id,
            'rating'  => $request->rating,
            'feedback'=> $request->feedback,
        ]);

        // Redirect back with a success message.
        return redirect()->back()->with('success', 'Feedback submitted successfully!');
    }
}
