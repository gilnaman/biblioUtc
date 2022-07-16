<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Actividad;
use Illuminate\Http\Request;

class ActividadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $activity = Actividad::all();
        return response()->json($activity, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        try {
            $data = $request->validate([
                'actividad' => 'required'
            ]);

            Actividad::create([
                'actividad'=> $data['actividad']
            ]);

            return response()->json(['message'=> "Actividad guardada"]);
        }catch(Exception $e){
            return response()->json(['message'=> $e->getMessage()]);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Actividad  $actividad
     * @return \Illuminate\Http\Response
     */
    public function show(Actividad $actividad)
    {
        try{
            return response()->json($actividad,200);
        }catch(Exception $e){
            return response()->json(['message'=> $e->getMessage()]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Actividad  $actividad
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Actividad $actividad)
    {

        try{
            $data = $request->validate([
                'actividad' => 'required'
            ]);

                $actividad->actividad = $data['actividad'];
                $actividad->save();

            return response()->json(['message'=> "Actividad actualizado correctamente"]);

        }catch(Exception $e){
            return response()->json(['message'=> $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Actividad  $actividad
     * @return \Illuminate\Http\Response
     */
    public function destroy(Actividad $actividad)
    {
        try{
            $actividad->delete();
            return response()->json(['message'=> "Actividad Eliminado correctamente"]);
        } catch(Exception $e){
            return response()->json(['message'=> $e->getMessage()]);
        }
    }
}
