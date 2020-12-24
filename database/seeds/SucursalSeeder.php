<?php

use App\Sucursal;
use Illuminate\Database\Seeder;

class SucursalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Sucursal::create([ 'nombre' => 'Sucursal Primera', 'tienda_id' => 1 ]);

        Sucursal::create([ 'nombre' => 'Sucursal Segunda', 'tienda_id' => 1 ]);

        Sucursal::create([ 'nombre' => 'Sucursal Tercera', 'tienda_id' => 1 ]);
    }
}
