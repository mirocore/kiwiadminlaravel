<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddIdSslColumnToRenovacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('renovaciones', function (Blueprint $table) {
            $table->integer('id_ssl')->unsigned()->after('notas_renovacion')->nullable();

            $table->foreign('id_ssl')->references('id_ssl')->on('ssl')->onDelete('set null');
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
            $table->dropForeign(['id_ssl']);
            $table->dropColumn('id_ssl');
        });
    }
}
