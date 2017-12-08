<?php

namespace App\Http\Controllers\Catalogos;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class horarioEscolarController extends Controller
{
    public function index() {

         $dias = [
           'Lunes',
           'Martes',
           'Miércoles',
           'Jueves',
           'Viernes',
           'Sábado'
         ];
         return view('horarioEscolar.index', compact('dias'));
    }
}
