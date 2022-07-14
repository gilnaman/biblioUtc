<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Coleccion;

class ColeccionesController extends Controller
{
    public function index(){
        //$c=Coleccion::all();
        //return response()->json($c, 200);

        return $c=Coleccion::all();
    }


      public function create()
    {

    }

    public function store(Request $request){
       // $c=new Coleccion($request->all());
        $c= new Coleccion();

        $c->id_coleccion=$request->get('id_coleccion');
        $c->nombre=$request->get('nombre');
       

        $c->save();
        //return response()->json($c, 200);
    }

    //fuction filtro
public function buscar (Request $request){
    $resultado = Coleccion::whereRaw('nombre LIKE?',["%{$request->nombre}%"])->get();
    return response()->json($resultado,200);
}


public function show($id)
{
    //
   // return[Coleccion::find($id)];
    return $c=Coleccion::find($id);
}

 public function edit($id)
    {
        //
    }



public function update(Request $request, $id)
    {
        $c=Coleccion::find($id);

        $c->id_coleccion=$request->get('id_coleccion');
        $c->nombre=$request->get('nombre');


        $c->update();
    }


public function destroy($id)
    {
        $c=Coleccion::find($id);

        $c->delete();
    }



}


