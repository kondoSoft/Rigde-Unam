<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Acceso;
use App\User;
use App\User_Acceso;

class AccesosController extends Controller
{
    public function showListForm(User $user) {
        $accesos = Acceso::All();
        $userAccesos = $user->accesos->pluck('id')->toArray();
        return view('admin.acceso._listForm', compact('accesos', 'userAccesos', 'user'));
    }

    public function putListForm(User $user, Request $request) {
        $accesos = $request->input('accesos');
        $userAcceso = [];
        if(count($accesos) > 0)
        {
            foreach ($accesos as $acceso) {
                $userAcceso [$acceso] = [
                    'created_by' => '1',
                    'updated_by' => '1'
                ];
            }
            $user->accesos()->sync($userAcceso);
        } else {
            $user->accesos()->detach();
        }
        return 'Guardado con exito';
    }
}
