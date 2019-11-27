<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToPanensTable extends Migration
{
    public function up()
    {
        Schema::table('panens', function (Blueprint $table) {
            $table->unsignedInteger('lahan_id');

            $table->foreign('lahan_id', 'lahan_fk_660501')->references('id')->on('lahans');
        });
    }
}
