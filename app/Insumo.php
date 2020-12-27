<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Insumo extends Model
{
    protected $fillable = [
        'descripcion',
        'necesarios',
        'enviado',
        'sucursal_id'
    ];

    public function sucursal()
    {
        return $this->belongsTo('App\Sucursal');
    }
}
