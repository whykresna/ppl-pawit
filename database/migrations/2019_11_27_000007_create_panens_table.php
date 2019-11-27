<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePanensTable extends Migration
{
    public function up()
    {
        Schema::create('panens', function (Blueprint $table) {
            $table->increments('id');

            $table->date('tanggal_panen');

            $table->integer('jumlah_buah');

            $table->integer('bruto');

            $table->integer('tarra');

            $table->integer('gross');

            $table->integer('pot');

            $table->integer('netto');

            $table->string('keterangan')->nullable();

            $table->timestamps();

            $table->softDeletes();
        });
    }
}
