<?php

namespace App\Models;

use App\Models\Course;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Mcq extends Model
{
    use HasFactory;

    protected $fillable = [
        'question',
        'answer1',
        'answer2',
        'answer3',
        'correct_answer',
        'degree',
        'time',
        'status',
        'display',
        'course_id'
    ];
    public function course()
    {
        $this->belongsTo(Course::class);
    }
    public function examquestion()
    {
        $this->belongsTo(ExamQuestion::class);
    }
    public function dynamicmcq()
    {
        $this->belongsTo(dynamicmcq::class);
    }
}
