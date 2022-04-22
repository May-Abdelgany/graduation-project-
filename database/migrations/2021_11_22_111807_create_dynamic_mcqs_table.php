<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDynamicMcqsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dynamic_mcqs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('question_id')->references('id')->on('mcqs')->onDelete('cascade');
            $table->text('question');
            $table->string('answer1');
            $table->string('answer2');
            $table->string('answer3');
            $table->string('correct_answer');
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
        Schema::dropIfExists('dynamic_mcqs');
    }
}
