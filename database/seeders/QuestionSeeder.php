<?php

namespace Database\Seeders;

use App\Models\Question;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Question::create([
            'exam_id'      => 2,
            'question_text'=> 'What does ICT stand for?',
            'question_type'=> 'mcq',
            'points'       => 1,
            'option1'      => 'Information and Communication Technology',
            'option2'      => 'International Communication Training',
            'option3'      => 'Integrated Computer Technology',
            'option4'      => 'Internet and Computer Tools',
            'correct_answer'=> 'option1'
        ]);

        // السؤال الثاني: MCQ
        Question::create([
            'exam_id'      => 2,
            'question_text'=> 'Which of the following devices is commonly used for ICT?',
            'question_type'=> 'mcq',
            'points'       => 1,
            'option1'      => 'Smartphone',
            'option2'      => 'Tablet',
            'option3'      => 'Laptop',
            'option4'      => 'All of the above',
            'correct_answer'=> 'option4'
        ]);

        // السؤال الثالث: True/False
        Question::create([
            'exam_id'      => 2,
            'question_text'=> 'True or False: The internet is a part of ICT.',
            'question_type'=> 'true_false',
            'points'       => 1,
            'correct_answer'=> 'true'
        ]);

        // السؤال الرابع: MCQ
        Question::create([
            'exam_id'      => 2,
            'question_text'=> 'Which technology is used for wireless communication?',
            'question_type'=> 'mcq',
            'points'       => 1,
            'option1'      => 'Bluetooth',
            'option2'      => 'Wi-Fi',
            'option3'      => 'NFC',
            'option4'      => 'All of the above',
            'correct_answer'=> 'option4'
        ]);

        // السؤال الخامس: True/False
        Question::create([
            'exam_id'      => 2,
            'question_text'=> 'True or False: Cloud computing is a key component of ICT.',
            'question_type'=> 'true_false',
            'points'       => 1,
            'correct_answer'=> 'true'
        ]);
    }

}

//php artisan db:seed --class=QuestionSeeder
