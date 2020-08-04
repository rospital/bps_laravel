<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PersonaTelefonoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('persona_telefono', function (Blueprint $table) {
            $table->integer('persona_id')->unsigned();
            $table->integer('telefono_id')->unsigned();

            $table->foreign('persona_id')->references('id')->on('personas');
            $table->foreign('telefono_id')->references('id')->on('telefonos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('persona_telefono');
    }
}
