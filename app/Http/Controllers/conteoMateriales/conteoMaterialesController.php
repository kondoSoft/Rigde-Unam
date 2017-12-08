<?php

namespace App\Http\Controllers\conteoMateriales;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Asignatura;

class conteoMaterialesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index() {

        //Por motivos de demostracion, cargaremos las asignaturas que tengan un id menor a 4
        $asignaturas = Asignatura::where('id', '<', 2)->get();
        return view('conteoMateriales.index', compact('asignaturas'));
    }
}
