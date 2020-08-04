<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class HistoriaPersonaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('historia_persona', function (Blueprint $table) {
            $table->integer('persona_id')->unsigned();
            $table->integer('historia_id')->unsigned();

            $table->foreign('persona_id')->references('id')->on('personas');
            $table->foreign('historia_id')->references('id')->on('historias');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('historia_persona');
    }
}
