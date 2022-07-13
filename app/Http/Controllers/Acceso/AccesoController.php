<?php

namespace App\Http\Controllers\Acceso;

use App\Http\Controllers\Controller;
use App\Models\AccesoRegistros;
use Illuminate\Http\Request;
use App\Models\Actividad;
use App\Models\Alumno;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class AccesoController extends Controller
{
    public function __invoke()
    {
        //regresar la vista de la pagina
        return view('accesos.vistaAcceso');
    }

    public function acciones()
    {
        //Mostrar la lista de acciones disponibles
        $actividades = Actividad::orderBy('actividad', 'asc')->get();

        return \response()->json($actividades, 200);
    }

    public function validarMatricula(Request $request)
    {
        //Encontrar al usuario por su matricula
        $respuesta = Alumno::where('matricula', $request->matricula)->get()->first();
        //Validar si el usuario existe
        if (!$respuesta) {
            //Si no existe se devuelve un error
            $respuesta = (object) ["error" => true];
        }
        //Si se encuentra se devuelven los datos
        return response()->json($respuesta, 200);
    }

    public function registraAcceso(Request $request)
    {
        //Crear un objeto con la respuesta TRUE/FALSE
        $respuesta = (object) ['respuesta' => false];
        //Cargar la fecha actual
        $fechaActual = Carbon::now();

        //Iniciar promesas
        DB::beginTransaction();
        try {
            //si la peticion es correcta 
            AccesoRegistros::create([
                'id_actividad' => $request->actividad,
                'matricula' => $request->matricula,
                //Usar un formato de 2022-02-18 en la fechas
                'fecha' => $fechaActual->format('Y-m-d'),
                //usar un formato de 14:39:00 para las horas
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
    }
}
