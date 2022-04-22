<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Complete extends Model
{
    use HasFactory;
    protected $fillable = [
        'question',
        'answer',
        'degree',
        'time',
        'status',
        'course_id'
    ];
    public function course(){
        $this->belongsTo(Course::class);
    }

    public function examquestion(){
        $this->belongsTo(ExamQuestion::class);
    }
}
