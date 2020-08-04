<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDnpsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dnps', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('mes_desde')->unsigned();
            $table->integer('mes_hasta')->unsigned();
            $table->integer('anio_desde')->unsigned();
            $table->integer('anio_hasta')->unsigned(); 

            $table->integer('empresa_id')->unsigned();
            $table->integer('persona_id')->unsigned();

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('empresa_id')->references('id')->on('empresas');
            $table->foreign('persona_id')->references('id')->on('personas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dnps');
    }
}
