<?php

namespace Database\Factories;

use App\Models\Exam;
use App\Models\T_F;
use Illuminate\Database\Eloquent\Factories\Factory;

class TFExamFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'exam_id'=>$this->faker->numberBetween(1,Exam::count()),
            'question_id'=>$this->faker->numberBetween(1,T_F::count()),
        ];
    }
}
