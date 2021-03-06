<?php

namespace App\Http\Controllers;

use App\Tienda;
use App\Insumo;
use App\Sucursal;
use Illuminate\Http\Request;

class WebpageController extends Controller
{
    /**
     * Página de bienvenida.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('welcome');
    }

    /**
     * Se muestra el formulario para capturar los insumos.
     *
     * @return \Illuminate\Http\Response
     */
    public function capturarInsumos()
    {
        $sucursales = Sucursal::all();

        return view('capturar_insumos', compact('sucursales'));
    }

    /**
     * Se muestra el listado de solicitudes y permite marcarlas como enviadas.
     *
     * @return \Illuminate\Http\Response
     */
    public function enviarSolicitudes()
    {
        $insumos = Insumo::with('sucursal')->where('enviado', false)->paginate(10);

        return view('enviar_solicitudes', compact('insumos'));
    }

    /**
     * Se muestra el listado de solicitudes y permite hacer conciliaciones.
     *
     * @return \Illuminate\Http\Response
     */
    public function conciliarSolicitudes()
    {
        $insumos = Insumo::with('sucursal')->where('enviado', true)->paginate(10);

        return view('conciliar_solicitudes', compact('insumos'));
    }

}
