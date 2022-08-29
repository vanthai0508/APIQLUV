<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('confirm',function(Blueprint $table)
        {
            $table->dateTime('dateinterview');
            $table->integer('id_user')->unsigned()->nullable();
            $table->foreign('id_user')->references('id')->on('users');
            $table->integer('id_cv')->unsigned()->nullable();
            $table->foreign('id_cv')->references('id')->on('cv');
            $table->string('name');
            $table->string('phone');
            $table->string('position');
            $table->increments('id');
            $table->integer('status')->unsigned()->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('confirm');
    }
};