<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddIdHostingColumnToRenovacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('renovaciones', function (Blueprint $table) {
            $table->integer('id_hosting')->unsigned()->after('notas_renovacion')->nullable();

            $table->foreign('id_hosting')->references('id_hosting')->on('hostings')->onDelete('set null');
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
            $table->dropForeign(['id_hosting']);
            $table->dropColumn('id_hosting');
        });
    }
}