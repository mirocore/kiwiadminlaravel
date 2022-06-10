<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddIdDominioColumnToRenovacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('renovaciones', function (Blueprint $table) {
            $table->integer('id_dominio')->unsigned()->after('notas_renovacion')->nullable();

            $table->foreign('id_dominio')->references('id_dominio')->on('dominios')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('renovaciones', function (Blueprint $table) {
            // Dropeamos la columna.
            $table->dropForeign(['id_dominio']);
            $table->dropColumn('id_dominio');
        });
    }
}
