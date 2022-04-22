<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
    ];
    public function mcq(){
        return $this->hasMany(Mcq::class);
      }
      public function true_false(){
        return $this->hasMany(T_F::class);
      }
      public function complete(){
        return $this->hasMany(Complete::class);
      }

      public function exam(){
        return $this->hasMany(Exam::class);
      }
      
}
