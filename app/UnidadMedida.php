<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UnidadMedida extends Model
{
    protected $table = 'unidadesMedida';

    public function setNombreAttribute($value)
    {
        $this->attributes['nombre'] = mb_convert_case(trim($value), MB_CASE_TITLE, "UTF-8");
    }
}
