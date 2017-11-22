<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Grupo;
use App\User;

class GruposController extends Controller
{

    /**
     * [showListForm description]
     * Busqueda de el usuario seleccionado, el catalogo de grupos y los grupos que el usuario tiene asignado.
     * @param  User   $user Usuario seleccionado
     * @return [type]       Regresa la vista para mostrar el usuario con el catalogo de grupos.
     */

    public function showListForm(User $user) {
        $grupos = Grupo::All();
        $userGrupos = $user->grupos->pluck('id')->toArray();
        return view('admin.grupo._listForm', compact('grupos', 'userGrupos', 'user'));
    }

    /**
     * [putListForm description]
     * Guarda los grupos asignados al usuario, los que no se seleccionen, seran eliminados d ela relacion
     * @param  User    $user    Usuario a que se le asignaran grupos
     * @param  Request $request Grupos que se le asignaran
     * @return [type]           [description]
     */

    public function putListForm(User $user, Request $request) {
        $grupos = $request->input('grupos');
        $userGrupos = [];
        if(count($grupos) > 0) {
            foreach($grupos as $grupo) {
                $userGrupo [$grupo] = [
                    'created_by' => 1,
                    'updated_by' => 1
                ];
            }
            $user->grupos()->sync($userGrupo);
        } else {
            $user->grupos()->detach();
        }

        return 'Guardado con exito';
    }
}
