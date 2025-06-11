<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserExam extends Model
{

    protected $fillable = [
        'user_id',
        'exam_id',
        'score',
        'is_like',
    ];
    public function userAnswers()
    {
        return $this->hasMany(UserAnswer::class, 'user_exam_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function exam()
    {
        return $this->belongsTo(Exam::class, 'exam_id');
    }
}
