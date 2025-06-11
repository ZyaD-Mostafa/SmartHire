<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserAppRequest;
use App\Models\UserApp;
use App\Models\User;
use App\Models\Job;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;



class UserAppController extends Controller
{

public function store(StoreUserAppRequest $request ,$job)
{
    try {
        // Validate request data
        $validated = $request->validated();

        // Handle file upload
        $cvPath = $request->file('cv')->store('cv_uploads', 'public');

        // Create application record
        UserApp::create([
            'user_id' => Auth::id(),
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'sec_phone' => $validated['secPhone'],
            'national_id' => $validated['national_id'],
            'address' => $validated['address'],
            'dob' => $validated['dob'],
            'grad_year' => $validated['grad_year'],
            'university' => $validated['university'],
            'degree' => $validated['degree'],
            'cv_path' => $cvPath,
            'job_id' => $job, // job id from route

        ]);



        return redirect()->route('user.avajob', ['job' => $job])
            ->with('success', 'Application submitted successfully!');

    } catch (\Exception $e) {
        return redirect()->back()
            ->withInput()
            ->with('error', 'Error: ' . $e->getMessage());
    }
}
    /**
     * Display the specified resource.
     */
    public function show($job)
{
    if (!Auth::check()) {
        return redirect()->route('login')->with('error', 'You need to log in first.');
    }

    $job = Job::findOrFail($job);
    $user = Auth::user();

    // Check for an application for this specific job.
    $hasApplication = UserApp::where('user_id', $user->id)
                             ->where('job_id', $job->id)
                             ->exists();

        $exams = $job->exams;


    return view('user.avajob', compact('hasApplication', 'job' ,'exams'));
}

    public function showform($job)
    {
        $job = Job::findOrFail($job);
        return view('user.applicationForm', compact('job'));
    }


}
