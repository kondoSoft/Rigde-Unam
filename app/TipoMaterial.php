<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoMaterial extends Model
{
    protected $table = 'tipoMateriales';

    public function setNombreAttribute($value)
    {
        $this->attributes['nombre'] = mb_convert_case(trim($value), MB_CASE_TITLE, "UTF-8");
    }

    public function getNombreAttribute($value)
    {
        return trim($value);
    }
}
