<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Coleccion;

class ColeccionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return $coleccion = Coleccion::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $coleccion = new Coleccion();
        $coleccion -> nombre = $request->get('nombre');

        $coleccion -> save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $coleccion  = Coleccion::where('id_coleccion', $id)->get()->first();
        if (empty($coleccion)) {
            $error_message = [
                "ok" => false,
                "data" => null,
                "error" => [
                    "message:" => "Resource not found with id $id"
                ]
            ];
            return response($error_message, 404);
        } else {
            $success_message = [
                "ok" => true,
                "data" => $coleccion,
                "error" => null
            ];
            return response($success_message, 200);
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $coleccion  = Coleccion::where('id_coleccion', $id)->get();
        return $coleccion;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $coleccion = Coleccion::where('id_coleccion', $id)->update(
            [
                "nombre" => $request->get('nombre')
            ]
        );
        if (!$coleccion) {
            $error_message = [
                "ok" => false,
                "data" => null,
                "error" => [
                    "message:" => "Resource not found with id $id"
                ]
            ];
            return response($error_message, 404);
        } else {
            $success_message = [
                "ok" => true,
                "data" => Coleccion::where('id_coleccion', $id)->get()->first(),
                "error" => null
            ];
            return response($success_message, 200);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $coleccion = Coleccion::where('id_coleccion', $id)->delete();
        if (!$coleccion) {
            $error_message = [
                "ok" => false,
                "data" => null,
                "error" => [
                    "message:" => "Resource not found with id $id"
                ]
            ];
            return response($error_message, 404);
        } else {
            $success_message = [
                "ok" => true,
                "data" => Coleccion::where('id_coleccion', $id)->get()->first(),
                "error" => null
            ];
            return response($success_message, 200);
        }
    }
}
