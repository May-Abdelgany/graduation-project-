<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DoExam extends Model
{
    use HasFactory;
    public function exam(){
        return $this->hasMany(Exam::class);
    }
    public function student(){
        return $this->hasMany(student::class);
    }
}
