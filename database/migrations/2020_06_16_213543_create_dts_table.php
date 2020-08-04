<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDtsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dts', function (Blueprint $table) {
            $table->increments('id');
            
            $table->integer('mes_desde')->unsigned();
            $table->integer('anio_desde')->unsigned();
            $table->integer('mes_hasta')->unsigned();
            $table->integer('anio_hasta')->unsigned();
            $table->integer('empresa_id')->unsigned();
            $table->integer('apia_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('empresa_id')->references('id')->on('empresas');
            $table->foreign('apia_id')->references('id')->on('apias');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dts');
    }
}
