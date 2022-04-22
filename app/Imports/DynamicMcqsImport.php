<?php

namespace App\Imports;

use App\Models\DynamicMcq;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class DynamicMcqsImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new DynamicMcq([
            'question_id' => $row['question_id'],
            'question' => $row['question'],
            'answer1' => $row['answer1'],
            'answer2' => $row['answer2'],
            'answer3' => $row['answer3'],
            'correct_answer' => $row['correct_answer'],
        ]);
    }
}
