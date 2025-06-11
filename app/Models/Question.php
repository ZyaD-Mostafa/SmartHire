<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    public $timestamps = false;

    protected $fillable=[
        'question_text',
        'question_type',
        'points',
        'option1',
        'option2',
        'option3',
        'option4',
        'correct_answer',
        'exam_id',
    ];

    public function exam()
{
    return $this->belongsTo(Exam::class, 'exam_id');
}
}
