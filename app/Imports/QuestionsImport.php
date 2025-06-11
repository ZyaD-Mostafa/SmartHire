<?php

namespace App\Imports;

use App\Models\Question;
use Maatwebsite\Excel\Concerns\ToModel;

class QuestionsImport implements ToModel
{
    public function startRow(): int
    {
        return 2; // Skip the header row
    }

    public function model(array $row)
    {
        return new Question([
            'question_text' => $row[0],
            'question_type' => $row[1],
            'points' => $row[2],
            'option1' => $row[3],
            'option2' => $row[4],
            'option3' => $row[5],
            'option4' => $row[6],
            'correct_answer' => $row[7],
            'exam_id' => $row[8],
        ]);
    }

    public function rules(): array
    {
        return [
            'question_type' => ['required', 'in:mcq,true_false'],
            // Add other validation rules as needed
        ];
    }
}
