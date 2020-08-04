<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ColaboradorConstruccionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('colaborador_construccion', function (Blueprint $table) {
            $table->integer('colaborador_id')->unsigned();
            $table->integer('construccion_id')->unsigned();
            $table->foreign('colaborador_id')->references('id')->on('personas');
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
        Schema::dropIfExists('colaborador_construccion');
    }
}
