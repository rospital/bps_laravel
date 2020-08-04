<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DireccionPersonaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('direccion_persona', function (Blueprint $table) {
            $table->integer('persona_id')->unsigned();
            $table->integer('direccion_id')->unsigned();

            $table->foreign('persona_id')->references('id')->on('personas');
            $table->foreign('direccion_id')->references('id')->on('direcciones');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('direccion_persona');
    }
}
