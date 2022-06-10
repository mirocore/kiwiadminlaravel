<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddIdTrabajoColumnToSubtrabajosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('subtrabajos', function (Blueprint $table) {
            $table->integer('id_trabajo')->unsigned()->after('id_subtrabajo');

            $table->foreign('id_trabajo')->references('id_trabajo')->on('trabajos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('subtrabajos', function (Blueprint $table) {
            // Dropeamos la columna.
            $table->dropForeign(['id_trabajo']);
            $table->dropColumn('id_trabajo');
        });
    }
}
