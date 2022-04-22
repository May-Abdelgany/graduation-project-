<?php

namespace Database\Factories;

use App\Models\Exam;
use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;

class DegreeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'student_id'=>$this->faker->unique()->numberBetween(1,Student::count()),
            'exam_id'=>$this->faker->unique()->numberBetween(1,Exam::count()),
            "degree"=>$this->faker->numberBetween(50,100),
        ];
    }
}
