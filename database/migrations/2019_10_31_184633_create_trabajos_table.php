<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrabajosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trabajos', function (Blueprint $table) {
            $table->increments('id_trabajo');
            $table->string('nombre', 150)->nullable();
            $table->text("descripcion")->nullable();
            $table->enum('estado', array('nuevo', 'terminado', 'cancelado'))->nullable();
            $table->date('fecha_contratacion')->nullable();
            $table->date('fecha_alta')->nullable();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trabajos');
    }
}
