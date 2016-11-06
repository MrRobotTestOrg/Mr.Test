<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Cenario extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cenario', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titulo');
            $table->integer('feature_id')->unsigned();
            $table->foreign('feature_id')->references('id')->on('feature');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('cenario');
    }
}
