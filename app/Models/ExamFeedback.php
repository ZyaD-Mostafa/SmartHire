<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExamFeedback  extends Model
{
    protected $table = 'exam_feedbacks';

    protected $fillable = [
        'user_id',
        'job_id',
        'exam_id',
        'feedback',
        'rating',
    ];

    // يمكنك إضافة علاقات النموذج هنا إذا احتجت، مثلاً:
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function job()
    {
        return $this->belongsTo(Job::class);
    }

    public function exam()
    {
        return $this->belongsTo(Exam::class);
    }
}
