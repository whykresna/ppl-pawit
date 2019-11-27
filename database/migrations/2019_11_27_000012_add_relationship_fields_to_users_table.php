<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToUsersTable extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->unsignedInteger('lahan_id')->nullable();

            $table->foreign('lahan_id', 'lahan_fk_660472')->references('id')->on('lahans');
        });
    }
}
