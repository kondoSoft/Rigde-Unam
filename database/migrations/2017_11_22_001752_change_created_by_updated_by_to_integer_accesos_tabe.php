<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeCreatedByUpdatedByToIntegerAccesosTabe extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('accesos', function (Blueprint $table) {
            $table->integer('created_by')->change();
            $table->integer('updated_by')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('accesos', function (Blueprint $table) {
            $table->string('created_by')->change();
            $table->string('updated_by')->change();
        });
    }
}
