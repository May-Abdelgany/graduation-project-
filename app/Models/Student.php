<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->hasOne(User::class,'user_id');
    }
    public function enroll(){
        $this->belongsTo(Course::class);
    }
    public function ExamAnswers(){
        $this->belongsTo(ExamAnswers::class);
    }
    public function doExam()
    {
        $this->belongsTo(doExam::class);
    }
}
