<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDireccionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('direcciones', function (Blueprint $table) {
            $table->increments('id');

            $table->string('calle');
            $table->string('numero');
            $table->string('complemento');
            $table->integer('localidad_id')->unsigned();

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('localidad_id')->references('id')->on('localidades');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('direcciones');
    }
}
