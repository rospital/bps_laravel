<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ConstruccionPersonaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('construccion_persona', function (Blueprint $table) {
            $table->integer('persona_id')->unsigned();
            $table->integer('construccion_id')->unsigned();
            $table->foreign('persona_id')->references('id')->on('personas');
            $table->foreign('construccion_id')->references('id')->on('construcciones');
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('construccion_persona');
    }
}
