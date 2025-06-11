<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'name',
        'image',
        'major',
        'location',
        'duration',
    ];
    public function exams()
    {
        return $this->hasMany(Exam::class, 'job_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class); // One user can have many applications
    }

    public function userApp(){
        return $this->hasMany(UserApp::class, 'job_id');

    }
}
