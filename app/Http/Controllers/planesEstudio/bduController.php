<?php

namespace App\Http\Controllers\planesEstudio;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class bduController extends Controller
{
    public function index() {
         $bdu = [

             '1er' => [
                  'Materias Común' => [
                       'Ágebra y Principios de Física',
                       'Ciencias de la Vida y de la Tierra I',
                       'Física y su Matemática',
                       'Narración y su exposición',
                       'Poblamiento, Migraciones y Multiculturalismo',
                       'Ingles I'
                  ],
                  'Optativas' => [
                       'Apreciación Estética',
                       'Bioquímica',
                       'Cálculo Diferencial e Integral',
                       'Informática',
                       'Planeación y Gestión de Negocios'
                  ]
             ],

             '2do' => [
                  'Materias Común' => [
                       'Ciencias de la Vida y de la Tierra II',
                       'Estado, Ciudadania y Democracia',
                       'Geometría Analítica',
                       'Geometría y Geografía',
                       'Lógica para la Solución de Problemas',
                       'Inglés II'
                  ]
             ],
             '3er' => [
                  'Materias Común' => [
                       'Capitalismo y Mundialización Económica',
                       'Ciencias de la Salud I',
                       'Dialógica y Argumentación',
                       'Matemáticas y Economía',
                       'Medio Ambiente y Bioética',
                       'Problemas Filosóficos',
                  ]
             ],
             '4to' => [
                  'Materias Común' => [
                       'Ciencias de la Salud II',
                       'Literatura',
                       'México, Configuración Histórica y Geográfica',
                       'Modelos Cuantitativos y Cualitativos en Investigación Social',
                       'Modelos Cuantitativos en Ciencias de la Vida y la Tierra',
                       'Optativa'
                  ]
             ]
       ];
         return view('planesEstudio.bdu.index', compact('bdu'));
    }
}
