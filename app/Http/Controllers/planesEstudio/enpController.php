<?php

namespace App\Http\Controllers\planesEstudio;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class enpController extends Controller
{
     public function index() {
          $enp = [
                "Cuarto" => [
                   'Obligatorias de Elección – Lengua Extranjera' => [
                         'Inglés IV',
                         'Fránces IV'
                   ],
                   'Educación Estética Y Artística' => [
                         'Danza Clásica',
                         'Danza Contemporánea',
                         'Danza Española',
                         'Danza Regional',
                         'Música',
                         'Teatro',
                         'Pintura',
                         'Escultura',
                         'Grabado',
                         'Fotografía'
                   ]
                ],
                "Quinto" => [
                   'Obligatorias de Elección – Lengua Extranjera' => [
                         'Inglés V',
                         'Fránces V',
                         'Italiano I',
                         'Alemán I',
                         'Inlgés I',
                         'Francés I'
                   ],
                   'Educación Estética Y Artística' => [
                         'Danza Clásica',
                         'Danza Contemporánea',
                         'Danza Española',
                         'Danza Regional',
                         'Música',
                         'Teatro',
                         'Pintura',
                         'Escultura',
                         'Grabado',
                         'Fotografía'
                   ]


               ],
               "Sexto" => [
                   'Obligatorias de Elección – Lengua Extranjera' => [
                        'Inglés VI',
                        'Fránces VI',
                        'Italiano II',
                        'Alemán II',
                        'Inlgés II',
                        'Francés II'
                   ]
               ]
          ];
          return view('planesEstudio.enp.index', compact('enp'));
     }
}
