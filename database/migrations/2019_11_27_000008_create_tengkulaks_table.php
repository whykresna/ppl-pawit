<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTengkulaksTable extends Migration
{
    public function up()
    {
        Schema::create('tengkulaks', function (Blueprint $table) {
            $table->increments('id');

            $table->string('nama_tengkulak');

            $table->longText('alamat_tengkulak');

            $table->string('nomor_telepon_tengkulak');

            $table->string('email_tengkulak');

            $table->datetime('tanggal_masuk');

            $table->timestamps();

            $table->softDeletes();
        });
    }
}
