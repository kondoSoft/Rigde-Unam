<?php

namespace App\Http\Controllers\conteoMateriales;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class conteoMaterialesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index() {
         return view('conteoMateriales.index');
    }
}
