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
        $solicitudes = Insumo::with('sucursal')->paginate(15);

        return view('enviar_solicitudes', compact('solicitudes'));
    }

    /**
     * Se muestra el listado de solicitudes y permite hacer conciliaciones.
     *
     * @return \Illuminate\Http\Response
     */
    public function conciliarSolicitudes()
    {
        $solicitudes = Insumo::paginate(15);

        return view('conciliar_solicitudes', compact('solicitudes'));
    }

}
