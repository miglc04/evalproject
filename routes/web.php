<?php

use Illuminate\Support\Facades\Route;


Route::get('/', 'WebPageController@index')->name('index');

Route::get('/capturar-insumos', 'WebPageController@capturarInsumos')->name('capturarInsumos');

Route::get('/enviar-solicitudes', 'WebPageController@enviarSolicitudes')->name('enviarSolicitudes');

Route::get('/conciliar-solicitudes', 'WebPageController@conciliarSolicitudes')->name('conciliarSolicitudes');
