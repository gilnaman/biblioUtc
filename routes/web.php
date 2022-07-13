<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Acceso\AccesoController;

Route::get('/', function () {
    return view('welcome');
});


Route::get('vista', AccesoController::class);