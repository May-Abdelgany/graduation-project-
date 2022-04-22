<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        //$user_id = $this->faker->numberBetween(10,20);
        return [
            'user_id'=> $this->faker->unique()->numberBetween(100,200),
        ];
    }
}
