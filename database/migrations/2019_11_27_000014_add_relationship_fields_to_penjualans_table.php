<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToPenjualansTable extends Migration
{
    public function up()
    {
        Schema::table('penjualans', function (Blueprint $table) {
            $table->unsignedInteger('tengkulak_id');

            $table->foreign('tengkulak_id', 'tengkulak_fk_660588')->references('id')->on('tengkulaks');
        });
    }
}
