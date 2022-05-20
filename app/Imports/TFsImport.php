<?php

namespace App\Imports;

use App\Models\T_F;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class TFsImport implements ToModel, WithHeadingRow
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
        return new T_F([
            'question' => $row['question'],
            'correct_answer' => $row['correct_answer'],
            'degree' => $row['degree'],
            'status' => $row['status'],
            'course_id' => $this->course_id
        ]);
    }
}
