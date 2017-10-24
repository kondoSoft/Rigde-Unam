<?php

namespace App\Http\Controllers\conteo;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class cchController extends Controller
{
    public function index() {
         return view('conteo.cch.index');
    }
}
