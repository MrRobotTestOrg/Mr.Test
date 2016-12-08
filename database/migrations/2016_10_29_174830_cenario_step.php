<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CenarioStep extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cenario_step', function (Blueprint $table) {
            $table->increments('id');
            $table->string('valor')->nullable();
            $table->integer('ordem');
            $table->integer('cenario_id')->unsigned();
            $table->foreign('cenario_id')->references('id')->on('cenario');
            $table->integer('step_id')->unsigned();
            $table->foreign('step_id')->references('id')->on('step');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('cenario_step');

    }
}
