<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeTypeDataLjkTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ljk', function (Blueprint $table) {
            $table->integer('skor_twk')->default(0)->change();
            $table->integer('skor_tiu')->default(0)->change();
            $table->integer('skor_tkp')->default(0)->change();
            $table->integer('skor_total')->default(0)->change();
            $table->integer('skor_status')->default(0)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
