<?php

namespace App\Imports;

use App\Models\Mcq;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class McqsImport implements ToModel, WithHeadingRow
{
    protected $course_id ;
    public function __construct($course_id)
    {
        $this->course_id = $course_id ;
    }
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Mcq([
            'question' => $row['question'],
            'answer1' => $row['answer1'],
            'answer2' => $row['answer2'],
            'answer3' => $row['answer3'],
            'correct_answer' => $row['correct_answer'],
            'degree' => $row['degree'],
            'time' => $row['time'],
            'status' => $row['status'],
            'display' => $row['display'],
            'course_id' => $this->course_id
        ]);
    }
}
