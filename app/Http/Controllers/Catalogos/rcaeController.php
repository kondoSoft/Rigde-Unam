<?php

namespace App\Http\Controllers\Catalogos;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class rcaeController extends Controller
{
    public function index() {

         $areas = [
              'Laboratorio de Cómputo',
              'Enfermería',
              'Biblioteca',
              'Laboratorio de Física',
              'Laboratorio de Biología',
              'Laboratorio de Química',
              'Laboratorio de Educación para la Salud',
              'Laboratorio Multidisciplinario'
         ];
         $escolaridad = [
             'Técnico',
             'Licenciatura',
             'Maestría',
             'Doctorado'
         ];

         return view('rcae.index', compact('areas', 'escolaridad'));
    }
}
