<?php

namespace Database\Factories;

use App\Models\Mcq;
use Illuminate\Database\Eloquent\Factories\Factory;

class DynamicMcqFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'question_id'=>$this->faker->numberBetween(1,Mcq::count()),
            "question"=>$this->faker->text(500),
            "answer1"=>$this->faker->sentence(20,true),
            "answer2"=>$this->faker->sentence(20,true),
            "answer3"=>$this->faker->sentence(20,true),
            "correct_answer"=>$this->faker->sentence(20,true),
        ];
    }
}
