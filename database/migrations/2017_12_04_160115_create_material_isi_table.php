<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMaterialIsiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('material_isi', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_isi');
            $table->integer('id_material');
            $table->integer('cantidadExistente');
            $table->integer('faltantes');
            $table->integer('cumple');
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
        Schema::dropIfExists('material_isi');
    }
}
