<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\SuperAdminController;

use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\ExamFeedbackController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserAppController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\GoogleAuthController;
use App\Http\Middleware\Admin;
use App\Http\Middleware\SuperAdmin;


Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/team', [HomeController::class , 'team'])->name('user.team');
Route::get('/feedback', [HomeController::class , 'feedback'])->name('user.feedback');






Route::get('/auth/google', [GoogleAuthController::class, 'redirectToGoogle'])->name('google.login');
Route::get('/auth/google/callback', [GoogleAuthController::class, 'handleGoogleCallback']);






Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('/profile/edit/{id}', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile/{id}', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/profile/upload', [ProfileController::class, 'upload'])->name('profile.upload');
    Route::post('/feedback', [HomeController::class, 'storeFeedback'])->name('feedback.store');


   // AVAJOB page (job details / exam page)
    Route::get('/avajob/{job}', [UserAppController::class, 'show'])->name('user.avajob');

// Application form (for a specific job)
    Route::get('/avajob/appform/{job}', [UserAppController::class, 'showForm'])->name('user.applicationForm');

// Store the application
    Route::post('/avajob/appform/{job}', [UserAppController::class, 'store'])->name('applicationForm.store');
    Route::get('/avajob/{job}/exam/{exam}',[ExamController::class , 'show'])->name('user.exam');
    Route::post('/avajob/{job}/exam/{exam}/submit', [ExamController::class, 'submitExam'])->name('exam.submit');
    Route::post('/exam/{job}/{exam}/feedback', [ExamFeedbackController::class, 'store'])->name('exam.feedback.store');
    Route::get('/thank-you', function () {
        return view('user.thankPage');
    })->name('user.thankPage');


});

Route::middleware('auth',Admin::class)->group(function (){
    Route::get('/admin/home',[AdminController::class,'index'])->name('admin.home');
    Route::get('/admin/job',[AdminController::class,'showJob'])->name('admin.job');
    Route::post('/admin/create/job',[AdminController::class,'createJob'])->name('admin.create.job');
    Route::get('/admin/edit/job/{id}',[AdminController::class,'editJob'])->name('admin.edit.job');
    Route::put('/admin/update/job',[AdminController::class,'updateJob'])->name('admin.update.job');
    Route::delete('/admin/delete/job/{id}',[AdminController::class,'deleteJob'])->name('admin.delete.job');

    Route::get('/admin/exmas',[AdminController::class,'showExam'])->name('admin.exam');
    Route::post('/admin/create/exam',[AdminController::class,'createExam'])->name('admin.create.exam');

    Route::get('/admin/questions',[AdminController::class,'showQuestion'])->name('admin.questions');
    Route::get('/admin/addQuestion',[AdminController::class,'addQuestion'])->name('admin.add.question');
    Route::post('/admin/create/question',[AdminController::class,'createQuestion'])->name('admin.create.quesion');
    Route::post('/upload/questions', [AdminController::class, 'uploadQuestions'])->name('admin.upload.questions');
    Route::get('/download/question-template', [AdminController::class, 'downloadQuestionTemplate'])->name('admin.download.question.template');
    Route::get('/admin/view/quesion',[AdminController::class,'viewQuestion'])->name('admin.view.questions');
    Route::get('/admin/edit/quesion/{id}',[AdminController::class,'editQuestion'])->name('admin.edit.questions');
    Route::put('/admin/update/quesion',[AdminController::class,'updateQuestion'])->name('admin.update.questions');
    Route::delete('/admin/delete/quesion/{id}',[AdminController::class,'deleteQuestion'])->name('admin.delete.questions');





    Route::get('/admin/applications',[AdminController::class,'showApp'])->name('admin.showApp');

});

Route::middleware('auth',SuperAdmin::class)->group(function(){
    Route::get('/superadmin/home',[SuperAdminController::class,'index'])->name('superadmin.home');
    Route::get('/superadmin/add/user',[SuperAdminController::class,'addUser'])->name('superadmin.add.user');
    Route::post('/superadmin/store/user',[SuperAdminController::class,'storeUser'])->name('superadmin.store.user');
    Route::get('/superadmin/edit/user/{id}',[SuperAdminController::class,'editUser'])->name('superadmin.edit.user');
    Route::put('/superadmin/update/user',[SuperAdminController::class,'updateUser'])->name('superadmin.update.user');
    Route::delete('/superadmin/delete/user/{id}',[SuperAdminController::class,'deleteUser'])->name('superadmin.delete.user');
});
require __DIR__.'/auth.php';
