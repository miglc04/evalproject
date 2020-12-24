<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sucursal extends Model
{
    protected $table = 'sucursales';

    public function tienda()
    {
        return $this->belongsTo('App\Tienda');;
    }

    public function insumos()
    {
        return $this->hasMany('App\Insumo');
    }
}
