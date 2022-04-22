<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exams', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('code')->unique();
            $table->integer('number_of_question_tf');
            $table->integer('number_of_question_complete');
            $table->integer('number_of_question_static_mcq');
            $table->integer('number_of_question_dynamic_mcq');
            $table->time('end_time');
            $table->time('time_of_exam');
            $table->foreignId('course_id')->references('id')->on('courses')->onDelete('cascade');
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('exams');
    }
}
