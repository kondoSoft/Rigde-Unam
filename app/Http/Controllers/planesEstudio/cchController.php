<?php

namespace App\Http\Controllers\planesEstudio;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class cchController extends Controller
{
     public function index() {
          $cch = [
               '1er' => [
                   'Materias Común' => [
                        'Matematicas I (Algebra-Geometria)',
                        'Tallér de Computo',
                        'Química I',
                        'Historia Universal Moderna y Contemporanea I',
                        'Taller de Lectura, Redacción e Iniciación a la Investigación Documental I',
                        'Lengua Extranjera I'
                   ]
               ],
               '2do' => [
                   'Materias Común' => [
                        'Matematicas II (Algebra-Geometria)',
                        'Química II',
                        'Historia Universal Moderna y Contemporanea II',
                        'Taller de Lectura, Redacción e Iniciación a la Investigación Documental II',
                        'Lengua Extranjera II'
                   ]
               ],
               '3er' => [
                   'Materias Común' => [
                        'Matematicas III (Algebra-Geometria)',
                        'Fisica I',
                        'Biología I',
                        'Historia de México I',
                        'Taller de Lectura, Redacción e Iniciación a la Investigación Documental III',
                        'Lengua Extranjera III'
                   ]
               ],
               '4t0' => [
                   'Materias Común' => [
                        'Matematicas III (Algebra-Geometria)',
                        'Fisica II',
                        'Biología II',
                        'Historia de México II',
                        'Taller de Lectura, Redacción e Iniciación a la Investigación Documental IV',
                        'Lengua Extranjera IV'
                   ]
               ],
               '5to' => [
                   '1ra Opción' => [
                        'Calculo Integral y Diferencial I',
                        'Estadistica y Probabilidad I',
                        'Cibernética y Computación I'
                   ],
                   '2da Opción' => [
                        'Biología III',
                        'Fisica III',
                        'Quimica III'
                   ],
                   '3ra Opción' => [
                        'Temas Selectos de Fiosofía I'
                   ],
                   '4ta Opción' => [
                        'Administración I',
                        'Antropología I',
                        'Ciencias de la Salud I',
                        'Cinecias Políticas y Sociales I',
                        'Derecho I',
                        'Economía I',
                        'Geografía I',
                        'Psicología I',
                        'Teorías de la Historia I'
                   ],
                   '5ta Opción' => [
                        'Griego I',
                        'Latín I',
                        'Lectura y Análisis de Textos Literarios I',
                        'Taller de Comunicación I',
                        'Taller de Diseño Ambiental I',
                        'Taller de Expresión Gráfica I',
                   ]
               ],
               '6to' => [
                   '1ra Opción' => [
                        'Calculo Integral y Diferencial II',
                        'Estadistica y Probabilidad II',
                        'Cibernética y Computación II'
                    ],
                    '2da Opción' => [
                         'Biología IV',
                         'Fisica IV',
                         'Quimica IV'
                    ],
                    '3ra Opción' => [
                         'Temas Selectos de Fiosofía II'
                    ],
                    '4ta Opción' => [
                         'Administracíon II',
                         'Antropología II',
                         'Ciencias de la Salud II',
                         'Cinecias Políticas y Sociales II',
                         'Derecho II',
                         'Economía II',
                         'Geografía II',
                         'Psicología II',
                         'Teorías de la Historia II'
                    ],
                    '5ta Opción' => [
                         'Griego II',
                         'Latín II',
                         'Lectura y Análisis de Textos Literarios II',
                         'Taller de Comunicación II',
                         'Taller de Diseño Ambiental II',
                         'Taller de Expresión Gráfica II',
                    ]
               ],
          ];

          return view('planesEstudio.cch.index', compact('cch'));
     }

}
