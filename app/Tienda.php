<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tienda extends Model
{
    public function sucursales()
    {
        return $this->hasMany('App\Sucursal');
    }
}
