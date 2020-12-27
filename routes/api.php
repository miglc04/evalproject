<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::apiResource('insumo', 'InsumoController');
Route::put('insumo/conciliar/{id}', 'InsumoController@conciliar');
