<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTFSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t__f_s', function (Blueprint $table) {
            $table->id();
            $table->text('question');
            $table->string('answer1');
            $table->string('answer2');
            $table->string('correct_answer');
            $table->integer('degree');
            $table->integer('time');
            $table->enum('status', ['easy','medium','difficult'])->default('easy');
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
        Schema::dropIfExists('t__f_s');
    }
}
