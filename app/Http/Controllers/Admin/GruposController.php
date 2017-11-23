<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;
use App\Http\Requests\GrupoRequest;
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

    public function index () {
        return view('admin.grupo.index');
    }

    public function getList()
    {
        Session::put('grupoSearch', Input::has('ok') ? Input::get('search') : (Session::has('grupoSearch') ? Session::get('grupoSearch') : ''));
        Session::put('grupoField', Input::has('field') ? Input::get('field') : (Session::has('grupoField') ? Session::get('grupoField') : 'nombre'));
        Session::put('grupoSort', Input::has('sort') ? Input::get('sort') : (Session::has('grupoSort') ? Session::get('grupoSort') : 'asc'));
        $grupos = Grupo::where('nombre', 'like', '%' . Session::get('grupoSearch') . '%')
           ->orderBy(Session::get('grupoField'), Session::get('grupoSort'))->paginate(8);
        return view('admin.grupo._list', compact('grupos'));
    }

    public function create() {
        return view('admin.grupo.create');
    }

    public function store(GrupoRequest $request) {
        $grupo = new Grupo;
        if ($grupo->createModel($request)) {
            return redirect()->route('admin.grupos.index')->with('success', 'Grupo registrado');
        }
    }

    public function edit(Grupo $grupo) {
        return view('admin.grupo.edit', compact('grupo'));
    }

    public function update(Grupo $grupo, GrupoRequest $request) {
        if($grupo->updateModel($request->all(), $grupo) == true) {
            return redirect()->route('admin.grupos.index')->with('success', 'Grupo Acualizado');
        }
    }

    public function delete(Grupo $grupo) {
        $grupo->delete();
        return back()->with('success', 'Grupo eliminado ' . $grupo->nombre);
    }
}
