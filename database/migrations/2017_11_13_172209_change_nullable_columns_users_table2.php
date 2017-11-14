<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeNullableColumnsUsersTable2 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('email',191)->default('NULL')->nullable(true)->change();
            $table->string('nombre',191)->default('NULL')->nullable(true)->change();
            $table->string('apellidoPaterno', 191)->default('NULL')->nullable(true)->change();
            $table->string('apellidoMaterno', 191)->default('NULL')->nullable(true)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('email',191)->default('NULL')->nullable(false)->change();
            $table->string('nombre',191)->default('NULL')->nullable(false)->change();
            $table->string('apellidoPaterno', 191)->default('NULL')->nullable(false)->change();
            $table->string('apellidoMaterno', 191)->default('NULL')->nullable(false)->change();
        });
    }
}
