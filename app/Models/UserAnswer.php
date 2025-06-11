<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserAnswer extends Model
{

    protected $fillable = [
        'user_exam_id',
        'question_id',
        'chosen_answer',
        'is_correct',
    ];

    
    public function question()
{
    return $this->belongsTo(Question::class, 'question_id');
}
}
