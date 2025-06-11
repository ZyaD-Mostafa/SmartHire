<?php

namespace App\Http\Controllers;

use App\Models\ExamFeedback;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ExamFeedbackController extends Controller
{
    public function store(Request $request, $job, $exam)
    {
        // Validate the feedback input
        $validated = $request->validate([
            'feedback' => 'nullable|string',
            'rating'   => 'required|integer|min:1|max:5',
        ]);

        // Get the currently authenticated user's ID
        $userId = Auth::id();

        // Create the exam feedback record using the route parameters for job and exam IDs
        ExamFeedback::create([
            'user_id'  => $userId,
            'job_id'   => $job,
            'exam_id'  => $exam,
            'feedback' => $validated['feedback'] ?? null,
            'rating'   => $validated['rating'],
        ]);

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Feedback submitted successfully!');
    }
}

