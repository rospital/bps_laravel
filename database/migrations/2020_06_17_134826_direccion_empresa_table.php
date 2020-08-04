<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DireccionEmpresaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('direccion_empresa', function (Blueprint $table) {
            $table->integer('empresa_id')->unsigned();
            $table->integer('direccion_id')->unsigned();

            $table->foreign('empresa_id')->references('id')->on('empresas');
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
        Schema::dropIfExists('direccion_empresa');
    }
}
