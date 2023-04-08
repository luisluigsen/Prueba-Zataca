<?php

use App\Adapters\Http\Controllers\FacturasApagarController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/web/facturacion/facturas-impagadas.php', [FacturasApagarController::class, 'obtenerFacturas']);
