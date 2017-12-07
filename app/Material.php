<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    protected $table = 'materiales';
    protected $fillable = ['nombre', 'id_unidadMedida', 'id_tipoMateria', 'id_materialRequerimiento'];

    public function requerimientos() {
        return $this->hasMany(MaterialRequerimiento::class);
    }

    public function tipoMaterial() {
        return $this->belongsTo(TipoMaterial::class, 'tipoMaterial_id');
    }

    public function unidadMedida() {
        return $this->belongsTo(UnidadMedida::class, 'unidadMedida_id');
    }
}
