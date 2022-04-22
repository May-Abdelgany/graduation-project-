<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         //\App\Models\User::factory(100)->create();
        //\App\Models\Admin::factory(80)->create();
        //\App\Models\Student::factory(80)->create();
        //\App\Models\Teacher::factory(80)->create();
        \App\Models\Course::factory(10)->create();
       \App\Models\Exam::factory(10)->create();
        \App\Models\Mcq::factory(10)->create();
        \App\Models\T_F::factory(10)->create();
        \App\Models\Complete::factory(10)->create();
       // \App\Models\Degree::factory(30)->create();
        \App\Models\McqExam::factory(10)->create();
        \App\Models\TFExam::factory(10)->create();
        \App\Models\CompleteExam::factory(10)->create();
        \App\Models\DynamicMcq::factory(10)->create();
    }
}
