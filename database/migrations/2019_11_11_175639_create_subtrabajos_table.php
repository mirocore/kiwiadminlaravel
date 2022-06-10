<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubtrabajosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subtrabajos', function (Blueprint $table) {
            $table->increments('id_subtrabajo');
            
            $table->string('nombre_subtrabajo', 250);
            $table->decimal('importe_subtrabajo', 7,2);
            
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
        Schema::dropIfExists('subtrabajos');
    }
}
