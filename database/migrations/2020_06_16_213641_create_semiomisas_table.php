<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSemiomisasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('semiomisas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('mes_desde');
            $table->integer('anio_desde');
            $table->integer('mes_hasta');
            $table->integer('anio_hasta');
            $table->integer('user_id')->unsigned();
            $table->integer('empresa_id')->unsigned();
            $table->integer('dt_id')->unsigned();;
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('empresa_id')->references('id')->on('empresas');
            $table->foreign('dt_id')->references('id')->on('dts');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('semiomisas');
    }
}
