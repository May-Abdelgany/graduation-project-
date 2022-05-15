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
            $table->integer('number_of_question_tf_easy');
            $table->integer('number_of_question_tf_medium');
            $table->integer('number_of_question_tf_difficult');
            $table->integer('number_of_question_complete_easy');
            $table->integer('number_of_question_complete_medium');
            $table->integer('number_of_question_complete_difficult');
            $table->integer('number_of_question_static_mcq_easy');
            $table->integer('number_of_question_static_mcq_medium');
            $table->integer('number_of_question_static_mcq_difficult');
            $table->date('date');
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
