<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExamQuestion extends Model
{
    use HasFactory;
    protected $fillable = [
        'smcq_id',
        'dmcq_id',
        't_f_id',
        'complete_id',
        'exam_id',
    ];

    public function true_false()
    {
        return $this->hasMany(T_F::class);
    }
    public function complete()
    {
        return $this->hasMany(Complete::class);
    }
    public function mcq()
    {
        return $this->hasMany(Mcq::class);
    }
}
