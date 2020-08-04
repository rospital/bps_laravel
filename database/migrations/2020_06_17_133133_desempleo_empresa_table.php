<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DesempleoEmpresaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('desempleo_empresa', function (Blueprint $table) {
            $table->integer('empresa_id')->unsigned();
            $table->integer('desempleo_id')->unsigned();

            $table->foreign('empresa_id')->references('id')->on('empresas');
            $table->foreign('desempleo_id')->references('id')->on('desempleos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('desempleo_empresa');
    }
}
