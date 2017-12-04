<?php

namespace App\Http\Controllers\planesEstudio;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class enpController extends Controller
{
     public function index() {
          $enp = [
               "Sexto" => [
                   'Área I: Físico - Matemático' => [
                       'Geología y Minerología',
                       'Físico - Química',
                       'Temas Selectos de Matemáticas',
                       'Estadística y Probabilidad',
                       'Informática Aplicada a la Ciencia y a la Industria',
                       'Cosmografía',
                       'Biología V'
                   ],
                   'Área II: Ciencias Biológicas y de la Salud' => [
                       'Geología y Minerología',
                       'Físico - Química',
                       'Temas Selectos de Biología',
                       'Estadística y Probabilidad',
                       'Temas Selectos de Morfofisiología',
                       'Informática Aplicada a la Ciencia y a la Industria',
                   ],
                   'Área III: Ciencias Sociales' => [
                       'Contabilidad y Gestión Administrativa',
                       'Geografía Política',
                       'Estadística y Probabilidad',
                       'Sociología'
                   ],
                   'Área IV: Humanidades y Artes' => [
                       'Revolución Mexicana',
                       'Pensamiento Filosófico en México',
                       'Modelado II',
                       'Estadística y Probabilidad',
                       'Latín',
                       'Griego',
                       'Comunicación Visual',
                       'Estética',
                       'Historia del Arte'
                   ]
               ]
          ];
          return view('planesEstudio.enp.index', compact('enp'));
     }
}
