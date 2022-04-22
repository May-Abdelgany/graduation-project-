<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;
    public function user()
    {
        return $this->hasOne(User::class,'user_id');
    }
    public function enrollteacher(){
        $this->belongsTo(Course::class);
    }
}
