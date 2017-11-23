<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grupo extends Model
{
    protected $fillable = ['nombre', 'descripcion', 'created_by', 'updated_by'];
    public function users() {
        return $this->belongsToMany(User::class, with(new User_Grupo)->getTable())->withTimestamps();
    }

    public function createModel($data) {
        $newGrupo = Grupo::create([
            'nombre' => $data['nombre'],
            'descripcion' => $data['descripcion'],
            'created_by' => $data->user()->id,
            'updated_by' => $data->user()->id,
        ]);
        return $newGrupo;
    }

    public function updateModel($data, $model) {
        return $model->fill($data)->save();
    }
}
