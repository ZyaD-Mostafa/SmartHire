<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromArray;

class QuestionTemplateExport implements FromArray
{
    public function array(): array
    {
        return [
            ['What is 2+2?', 'mcq', 1, '3', '4', '5', '6', 'option2', 1],
            ['What is the capital of France?', 'mcq', 1, 'Paris', 'London', 'Rome', 'Berlin', 'option1', 2],
        ];
    }
}
