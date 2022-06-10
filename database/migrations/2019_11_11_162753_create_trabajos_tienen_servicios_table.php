<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrabajosTienenServiciosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trabajos_tienen_servicios', function (Blueprint $table) {
            $table->increments('id_trabajos_tienen_servicios');
            // Para crear la FK, necesitamos asegurarnos de que tiene
            // las mismas restricciones:
            $table->integer('id_trabajo')->unsigned();
            $table->integer('id_servicio')->unsigned();
            $table->timestamps();

            // Creamos la FK.
            // foreign => La columna de este tabla que va a ser la FK.
            // references => La PK a la que apunta.
            // on => La tabla de la PK.
            $table->foreign('id_trabajo')->references('id_trabajo')->on('trabajos');
            $table->foreign('id_servicio')->references('id_servicio')->on('servicios');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trabajos_tienen_servicios');
    }
}
