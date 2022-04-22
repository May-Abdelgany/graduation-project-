<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DynamicMcq extends Model
{
    use HasFactory;

    protected $fillable = [
        'question_id',
        'question',
        'answer1',
        'answer2',
        'answer3',
        'correct_answer',
    ];
    public function mcq()
    {
        return $this->hasMany(Mcq::class);
    }
    public function examquestion()
    {
        $this->belongsTo(ExamQuestion::class);
    }
}
