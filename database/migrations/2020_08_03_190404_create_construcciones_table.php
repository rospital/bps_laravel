<?php

use App\Construccion;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConstruccionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('construcciones', function (Blueprint $table) {
            $table->increments('id');
            $table->date('fecha_desde')->format('d/m/Y');
            $table->date('fecha_hasta')->format('d/m/Y');
            $table->string('tipo')->default(Construccion::TIPO_AUTOCONSTRUCCION);
            $table->integer('obra_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('obra_id')->references('id')->on('obras');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('construcciones');
    }
}
