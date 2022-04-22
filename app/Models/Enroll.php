<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enroll extends Model
{
    use HasFactory;
    public function student(){
        return $this->hasMany(Student::class);
      }

      public function course(){
        return $this->hasMany(Course::class);
      }
}

