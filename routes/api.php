<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Alumno;
use App\Models\AccesoRegistros;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

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


Route::post('confirmar-matricula', function(Request $request){
	$respuesta = Alumno::where('matricula', $request->matricula)->get()->first();
	if (!$respuesta){
		$respuesta = (object) ["error" => true];
	} 
	return response()->json($respuesta, 200);
});

Route::post('registrar-acceso', function(Request $request){
	 $respuesta = (object) ['respuesta' => false];
        //Encontar al alumno por matricula 
        $user = Alumno::where('matricula', $request->matricula)->get()->first();

        $fechaActual = Carbon::now();

        //Iniciaf promesas
        DB::beginTransaction();
        try {
            //si la peticion es correcta 
            AccesoRegistros::create([
                'id_actividad' => $request->actividad,
                'matricula' => $request->matricula,
                'fecha' => $fechaActual->format('Y-m-d'),
                'hora' => $fechaActual->format('H:i:') . '00',
            ]);

            //Mandar la solicitud 
            DB::commit();
            //Regresar un true al js para conformar correcto
            $respuesta = (object) ['respuesta' => true];

            // la response va aqui por tema de scope

        } catch (\Exception $e) {
            //si la petición falla 
            DB::rollBack();
            //regresar un false para cancelar la operación 
            $respuesta = (object) ['request' => $e];

        }
        return response()->json($respuesta, 200);
});