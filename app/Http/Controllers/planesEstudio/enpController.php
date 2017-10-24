<?php

namespace App\Http\Controllers\planesEstudio;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class enpController extends Controller
{
     public function index() {
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
          return view('planesEstudio.enp.index', compact('enp'));
     }
}
