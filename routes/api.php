<?php

use App\Http\Controllers\Acceso\AccesoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('lista-acciones', [AccesoController::class, 'acciones']);

Route::post('confirmar-matricula', [AccesoController::class, 'validarMatricula']);

Route::post('registrar-acceso', [AccesoController::class, 'registraAcceso']);