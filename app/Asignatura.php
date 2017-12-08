<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asignatura extends Model
{
    protected $table = 'asignaturasTemp';

    public function materiales(){
        return $this->belongsToMany(Material::class, with(new MaterialRequerimiento)->getTable())->withPivot('cantidad','rubroMinima', 'cantidadMinima', 'valorTotalPorcentual');
    }
}
