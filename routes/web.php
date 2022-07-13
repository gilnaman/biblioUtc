<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Acceso\AccesoController;



Route::get('vista', [AccesoController::class, 'index']);



Route::get('/', function () {
    return view('welcome');
});