<?php

namespace App\Http\Controllers\Catalogos;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SaoController extends Controller
{
    public function index() {
      return view('layouts.catalogos');
    }
}
