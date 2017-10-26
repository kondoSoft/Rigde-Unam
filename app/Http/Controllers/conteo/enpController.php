<?php

namespace App\Http\Controllers\conteo;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class enpController extends Controller
{
    public function index() {
         return view('conteo.enp.index');
    }
}
