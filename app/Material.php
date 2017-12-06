<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    protected $table = 'materiales';
    protected $fillable = ['nombre', 'id_unidadMedida', 'id_tipoMateria', 'id_materialRequerimiento'];
}
