<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLjkTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ljk', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->integer('skor_twk')->default(0);
            $table->integer('skor_tiu')->default(0);
            $table->integer('skor_tkp')->default(0);
            $table->integer('skor_total')->default(0);
            $table->integer('status')->comment('0:belum selesai 1:selesai')->default(0);
            $table->string('keterangan')->comment('0:belum selesai 1:selesai')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
            $table->timestamp('finish_at')->nullable();
            // $table->timestamps('finish_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ljk');
    }
}
