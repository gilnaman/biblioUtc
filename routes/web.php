<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//Route::view('paises','gestionPaises');

Route::view('pais','Paises');
Route::put('update/pais','App\Http\Controllers\PaisesController@update');
Route::delete('delete/pais/{id}','App\Http\Controllers\PaisesController@destroy');
Route::get('getPaises', 'App\Http\Controllers\PaisesController@index');