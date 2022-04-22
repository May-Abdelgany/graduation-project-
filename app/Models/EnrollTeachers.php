<?php

namespace App\Models;

use App\Models\Course;
use App\Models\Teacher;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class EnrollTeachers extends Model
{
    use HasFactory;

    public function teacher(){
        return $this->hasMany(Teacher::class);
      }
      public function course(){
        return $this->hasMany(Course::class);
      }
}
