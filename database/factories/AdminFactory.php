<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

class AdminFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

       //$users=DB::table('users')->select('id')->where('role','admin')->get();
      
        return [
            'user_id'=> $this->faker->unique()->numberBetween(1,100),
        ];
    }
}
