<?php

namespace Database\Factories;

use App\Models\Course;
use Illuminate\Database\Eloquent\Factories\Factory;

class ExamFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        //$course_id = $this->faker->numberBetween(1,Course::count());
        return [
            "name"=>$this->faker->name(),
            "code"=>$this->faker->numberBetween(1000,10000),
            "course_id"=> $this->faker->numberBetween(1,Course::count()),
        ];
    }
}
