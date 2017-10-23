<?php

namespace App\Http\Controllers\Catalogos;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SaoController extends Controller
{
    public function index() {
         $materias = [
              [
                    "nombre" => "Matemativas IV",
                    "Plan" => "ENP",
                    "tipoPeriodo",
                    "Año" => "4"
              ],
              [
                    "nombre" => "Fisica IV",
                    "Plan" => "ENP",
                    "tipoPeriodo",
                    "Año" => "4"
              ],
              [
                    "nombre" => "Ingles IV",
                    "Plan" => "ENP",
                    "tipoPeriodo",
                    "Año" => "4"
              ],
              [
                    "nombre" => "Matemativas V",
                    "Plan" => "ENP",
                    "tipoPeriodo",
                    "Año" => "5"
              ],
              [
                    "nombre" => "Matemativas V",
                    "Plan" => "ENP",
                    "tipoPeriodo",
                    "Año" => "5"
              ],
              [
                    "nombre" => "Matemativas V",
                    "Plan" => "ENP",
                    "tipoPeriodo",
                    "Año" => "5"
              ],
              [
                    "nombre" => "Matemativas VI",
                    "Plan" => "ENP",
                    "tipoPeriodo",
                    "Año" => "6"
              ],
              [
                    "nombre" => "Matemativas VI",
                    "Plan" => "ENP",
                    "tipoPeriodo",
                    "Año" => "6"
              ],
              [
                    "nombre" => "Matemativas VI",
                    "Plan" => "ENP",
                    "tipoPeriodo",
                    "Año" => "6"
              ],
              [
                    "nombre" => "Matemativas VI",
                    "Plan" => "ENP",
                    "tipoPeriodo",
                    "Año" => "6"
              ]
         ];
         $semestre1 = [
              'Matematicas I (Algebra-Geometria)',
              'Tallér de Computo',
              'Química I',
              'Historia Universal Moderna y Contemporanea I',
              'Taller de Lectura, Redacción e Iniciación a la Investigación Documental I',
              'Lengua Extranjera I'
         ];
         $semestre2 = [
              'Matematicas II (Algebra-Geometria)',
              'Química II',
              'Historia Universal Moderna y Contemporanea II',
              'Taller de Lectura, Redacción e Iniciación a la Investigación Documental II',
              'Lengua Extranjera II'
         ];
         $semestre3 = [
              'Matematicas III (Algebra-Geometria)',
              'Fisica I',
              'Biología I',
              'Historia de México I',
              'Taller de Lectura, Redacción e Iniciación a la Investigación Documental III',
              'Lengua Extranjera III'
         ];
         $semestre4 = [
              'Matematicas III (Algebra-Geometria)',
              'Fisica II',
              'Biología II',
              'Historia de México II',
              'Taller de Lectura, Redacción e Iniciación a la Investigación Documental IV',
              'Lengua Extranjera IV'
         ];
         $semestre5 = [
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
         ];
         $semestre6 = [
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
         ];

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
         $enp = [
              "Cuarto" => [
                   "Materias Común" => [
                        'Matemáticas IV',
                        'Fisica III',
                        'Lenguas Española',
                        'HIstoria Universal III',
                        'Lógica',
                        'Geografía',
                        'Dibujo II',
                        'Educación Estética y Artística IV',
                        'Educación Fisica IV',
                        'Orientación Educativa IV',
                        'Informática',
                        'Lengua Extranjera IV'
                   ],
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
                   'Materias Común' => [
                        'Matemáticas V',
                        'Química III',
                        'Biología IV',
                        'Educación para la Salud',
                        'Historia de México',
                        'Etimologías Grecolatinas',
                        'Ética',
                        'Educación Física',
                        'Educación Estética y Artística V',
                        'Orientación Educativa V',
                        'Literatura Universal',
                        'Lengua Extranjera V'
                   ],
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
                  'Area I: Físico -Matemático' => [
                       'Derecho',
                       'Literatura Mexicána e Iberoamericana',
                       'Psicología',
                       'Lengua Extranjera VI',
                       'Matemáticas VI',
                       'Dibujo COnstrunctivo II',
                       'Fisica IV',
                       'Química IV',
                       'Geología y Minerología',
                       'Físico - Química',
                       'Temas Selectos de Matemáticas',
                       'Estadísticas y Probabilidad',
                       'Informática Aplicada a la Ciencia y la Industria',
                       'Cosmografía',
                       'Biología V',
                  ],
                  'Area II: Ciencias Biológicas y de la Salud' => [
                       'Derecho',
                       'Literatura Mexicána e Iberoamericana',
                       'Psicología',
                       'Lengua Extranjera VI',
                       'Matemáticas VI',
                       'Dibujo COnstrunctivo II',
                       'Fisica IV',
                       'Química IV',
                       'Geología y Minerología',
                       'Físico - Química',
                       'Temas Selectos de Biología',
                       'Estadística y Probabilidad',
                       'Temas Selectos de Morfofisiología',
                       'Informática Aplicada a la Ciencias y la Industria'
                  ],
                  'Area III: Ciencias Sociales' => [
                       'Derecho',
                       'Literatura Mexicána e Iberoamericana',
                       'Psicología',
                       'Lengua Extranjera VI',
                       'Matemáticas VI',
                       'Introducción al Estudio de las Ciencias Sociales y Económicas',
                       'Problemas Sociales Políticos y Económicos de México',
                       'Geografía Económica',
                       'Contabilidad y Gestión Administrativa',
                       'Geografía Política',
                       'Estadística y Probabilidad',
                       'Sociología'
                  ],
                  'Area IV: Humanidades y Artes' => [
                       'Derecho',
                       'Literatura Mexicána e Iberoamericana',
                       'Psicología',
                       'Lengua Extranjera VI',
                       'Matemáticas VI',
                       'Historia de la Cultura',
                       'Historia de las Doctrinas Fiosóficas',
                       'Introducción al Estudio de las Ciencias Sociales y Económicas',
                       'Revolución Mexicana',
                       'Pensamiento Filosófico en México',
                       'Modelado II',
                       'Estadística y Probabilidad',
                       'Latín',
                       'Griego',
                       'Comunicación Visual',
                       'Estética',
                       'Historia del Arte'
                  ],
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
        
         return view('layouts.catalogos', compact('materias', 'cch', 'enp'));
    }
}
