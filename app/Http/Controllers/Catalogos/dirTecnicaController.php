<?php

namespace App\Http\Controllers\Catalogos;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class dirTecnicaController extends Controller
{
    public function index() {
        $turnos = [
            'M' => 'Matutino',
            'V' => 'Vespertino',
            'Mix' => 'Mixto',
            'N' => 'Nocturno',
        ];
        return view('dirTecnica.index', compact('turnos'));
    }
}
