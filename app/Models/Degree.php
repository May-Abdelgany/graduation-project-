<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Degree extends Model
{
    use HasFactory;
    public function user(){
        return $this->hasMany(User::class);
      }
      public function exam(){
        return $this->hasMany(Exam::class);
      }
}
