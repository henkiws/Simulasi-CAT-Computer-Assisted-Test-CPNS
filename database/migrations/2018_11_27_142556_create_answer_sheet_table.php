<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnswerSheetTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('answer_sheet', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('ljk_id');
            $table->unsignedInteger('question_id');
            $table->integer('question_group')->nullable();
            $table->unsignedInteger('option_id')->comment('jawaban benar')->nullable();
            $table->unsignedInteger('answer_id')->comment('jawaban user')->nullable();
            $table->integer('value')->nullable();
            $table->foreign('ljk_id')->references('id')->on('ljk')->onDelete('cascade');
            $table->foreign('question_id')->references('id')->on('questions')->onDelete('cascade');
            $table->foreign('option_id')->references('id')->on('options')->onDelete('cascade');
            $table->foreign('answer_id')->references('id')->on('options')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('answer_sheet');
    }
}
