<?php

use app\Http\Controllers\API\AlumnosControllerApi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use League\Flysystem\Plugin\GetWithMetadata;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

route::GET('/Alumnos', 'App\Http\Controllers\AlumnosController@index');

route::POST('/Alumnos', 'App\Http\Controllers\AlumnosController@store');

route::PUT('/Alumnos', 'App\Http\Controllers\AlumnosController@update');

route::DELETE('/Alumnos', 'App\Http\Controllers\AlumnosController@destroy');

