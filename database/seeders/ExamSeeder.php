<?php

namespace Database\Seeders;

use App\Models\Exam;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ExamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Exam::create([
            'exam_name' => 'Pedagogical Exam',
            'number_of_questions' => 30,
            'exam_duration' => 30,
            'job_id' => 1, // Ensure this job exists in the jobs table
        ]);

        Exam::create([
            'exam_name' => 'ICT Essentials',
            'number_of_questions' => 25,
            'exam_duration' => 60,
            'job_id' => 1,
        ]);

        Exam::create([
            'exam_name' => 'English Exam',
            'number_of_questions' => 15,
            'exam_duration' => 30,
            'job_id' => 1,
        ]);
    }
}


// php artisan db:seed --class=ExamSeeder
