<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Acceso extends Model
{
    public function users() {
        return $this->belongToMany('App\User', 'User_Acceso');
    }
}
