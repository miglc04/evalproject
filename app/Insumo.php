<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Insumo extends Model
{
    public function sucursal()
    {
        return $this->belongsTo('App\Sucursal');
    }
}
