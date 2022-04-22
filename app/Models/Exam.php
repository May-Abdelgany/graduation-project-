<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'code',
    ];
      public function course(){
        $this->belongsTo(Course::class);
    }
    public function degree(){
        $this->belongsTo(Degree::class);
    }
    public function ExamAnswers(){
        $this->belongsTo(ExamAnswers::class);
    }
    public function doExam()
    {
        $this->belongsTo(doExam::class);
    }

}
