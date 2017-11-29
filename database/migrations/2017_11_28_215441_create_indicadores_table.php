<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIndicadoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('indicadores', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('clave');
            $table->string('tipo');
            $table->text('origen');
            $table->text('objetivo');
            $table->text('pertinencia');
            $table->text('periodicidad');
            $table->integer('activo');
            $table->string('responsableSeguimiento');
            $table->string('responsableEjecucion');
            $table->integer('dimension');
            $table->integer('created_by');
            $table->integer('updated_by');
            $table->text('extra');
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
        Schema::dropIfExists('indicadores');
    }
}
