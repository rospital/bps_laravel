<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EmailPersonaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('email_persona', function (Blueprint $table) {
            $table->integer('persona_id')->unsigned();
            $table->integer('email_id')->unsigned();

            $table->foreign('persona_id')->references('id')->on('personas');
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
        Schema::dropIfExists('email_persona');
    }
}
