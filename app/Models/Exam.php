<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{


    protected $fillable = [
        'job_id', 'exam_name', 'number_of_questions', 'exam_duration'
    ];

    // علاقة الامتحان بالوظيفة
    public function job()
    {
        return $this->belongsTo(Job::class, 'job_id');
    }

    public function userExams()
    {
        return $this->hasMany(UserExam::class, 'exam_id');
    }

    public function questions()
    {
        return $this->hasMany(Question::class, 'exam_id');
    }

}
