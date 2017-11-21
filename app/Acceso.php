<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Acceso extends Model
{
    public function users() {
        return $this->belongsToMany(User::class, with(new User_Acceso)->getTable())->withTimestamps();
    }
}
