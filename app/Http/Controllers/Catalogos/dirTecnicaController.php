<?php

namespace App\Http\Controllers\Catalogos;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class dirTecnicaController extends Controller
{
    public function index() {
         
         return view('dirTecnica.index');
    }
}
