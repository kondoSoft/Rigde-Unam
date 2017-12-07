<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMaterialesRequerimientoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('materialesRequerimiento', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('asignatura_id');
            $table->integer('material_id');
            $table->string('rubroMinima');
            $table->integer('cantidad');
            $table->string('cantidadMinima');
            $table->integer('valorTotalPorcentual');
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
        Schema::dropIfExists('materialesRequerimiento');
    }
}
