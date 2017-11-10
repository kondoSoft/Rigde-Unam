<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class AddColumnsToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('nombre');
            $table->string('apellidoPaterno');
            $table->string('apellidoMaterno');
            $table->integer('estatus');
            $table->string('remember_token', 255)->change();
            $table->string('index');
            $table->renameColumn('name', 'username');
            $table->text('token');
            $table->string('tipoUsuario',1);

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
            $table->dropColumn(
                [
                    'nombre',
                    'apellidoPaterno',
                    'apellidoMaterno',
                    'estatus',
                    'index',
                    'token',
                    'tipoUsuario'
                ]);
            $table->string('remember_token', 100)->change();
            $table->renameColumn('username', 'name');
        });
    }
}
