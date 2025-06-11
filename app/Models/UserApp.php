<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User;

class UserApp extends Model
{

    protected $fillable = [
        'user_id',
        'name',
        'email',
        'phone',
        'sec_phone', // Database column name
        'national_id',
        'address',
        'dob',
        'grad_year',
        'university',
        'degree',
        'cv_path',
        'job_id'
    ];


      public function user()
    {
        return $this->belongsTo(User::class); // One user can have many applications
    }

    public function job()
    {
        return $this->belongsTo(Job::class);
    }
}

