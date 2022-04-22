<?php

namespace Database\Factories;

use App\Models\Course;
use App\Models\Exam;
use Illuminate\Database\Eloquent\Factories\Factory;

class CompleteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "question"=>$this->faker->text(500),
            "answer"=>$this->faker->sentence(20,true),
            "degree"=>$this->faker->numberBetween(1,3),
            "time"=>$this->faker->numberBetween(2,4),
            "status"=>$this->faker->randomElement(['easy','medium','difficult']),
            'course_id'=>$this->faker->numberBetween(1,Course::count()),
        ];
    }
}
