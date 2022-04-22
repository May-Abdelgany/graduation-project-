<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExamQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exam_questions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('smcq_id')->nullable();
            $table->foreign('smcq_id')->references('id')->on('mcqs')->nullOnDelete();
            $table->unsignedBigInteger('dmcq_id')->nullable();
            $table->foreign('dmcq_id')->references('id')->on('dynamic_mcqs')->nullOnDelete();
            $table->unsignedBigInteger('t_f_id')->nullable();
            $table->foreign('t_f_id')->references('id')->on('t__f_s')->nullOnDelete();
            $table->unsignedBigInteger('complete_id')->nullable();
            $table->foreign('complete_id')->references('id')->on('completes')->nullOnDelete();
            $table->unsignedBigInteger('exam_id')->nullable();
            $table->foreignId('exam_id')->references('id')->on('exams')->onDelete('cascade');
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
        Schema::dropIfExists('exam_questions');
    }
}
