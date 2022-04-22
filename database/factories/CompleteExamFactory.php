<?php

namespace Database\Factories;

use App\Models\Complete;
use App\Models\Exam;
use Illuminate\Database\Eloquent\Factories\Factory;

class CompleteExamFactory extends Factory
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
            'question_id'=>$this->faker->numberBetween(1,Complete::count()),
        ];
    }
}
