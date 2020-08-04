<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EmailEmpresaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('email_empresa', function (Blueprint $table) {
            $table->integer('empresa_id')->unsigned();
            $table->integer('email_id')->unsigned();

            $table->foreign('empresa_id')->references('id')->on('empresas');
            $table->foreign('email_id')->references('id')->on('emails');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('email_empresa');
    }
}
