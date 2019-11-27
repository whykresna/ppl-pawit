<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLahansTable extends Migration
{
    public function up()
    {
        Schema::create('lahans', function (Blueprint $table) {
            $table->increments('id');

            $table->string('nama_lahan')->unique();

            $table->integer('luas_lahan');

            $table->integer('jumlah_bibit');

            $table->timestamps();

            $table->softDeletes();
        });
    }
}
