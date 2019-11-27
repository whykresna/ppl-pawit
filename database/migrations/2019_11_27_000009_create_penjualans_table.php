<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenjualansTable extends Migration
{
    public function up()
    {
        Schema::create('penjualans', function (Blueprint $table) {
            $table->increments('id');

            $table->date('tanggal_pengiriman');

            $table->integer('jumlah_permintaan');

            $table->integer('harga_penjualan');

            $table->integer('pajak_penjualan');

            $table->timestamps();

            $table->softDeletes();
        });
    }
}
