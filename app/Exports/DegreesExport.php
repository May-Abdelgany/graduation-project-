<?php

namespace App\Exports;

use App\Models\Degree;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;

class DegreesExport implements FromQuery, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */

    private $colums = ['first name','last name', 'degree',];
    public function __construct(int $id)
    {
        $this->id = $id;
    }
    public function query()
    {
        $degree = Degree::query()->join('students', 'students.id', '=', 'degrees.student_id')->join('users', 'users.id', '=', 'students.user_id')->select('users.firstname', 'users.lastname', 'degrees.degree')
        ->where('exam_id', $this->id);

        return $degree;
    }
    public function headings(): array
    {
        return $this->colums;
    }
}
