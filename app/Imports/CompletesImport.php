<?php

namespace App\Imports;

use App\Models\Complete;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class CompletesImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Complete([
            'question' => $row['question'],
            'answer' => $row['answer'],
            'degree' => $row['degree'],
            'time' => $row['time'],
            'status' => $row['status'],
            'course_id' => $row['course_id'],
        ]);
    }
}
