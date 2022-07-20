<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alumnos;
use Illuminate\Support\Facades\DB;

class AlumnosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(alumnos)//Request $request
    {
        $alumnos=Alumnos::all();
        return view('studens.index',compact('alumnos'));

        $texto=trim($request->get('texto'));
        $registros=DB::table('alumnos')
                    ->select('nombre','apellidos','grupo','matricula')
                    ->where('nombre','LIKE','%'.$texto.'%')
                    ->orWhere('apellidos','LIKE','%'.$texto.'%')
                    ->orderBy('nombre','asc')
                    ->paginate(10);
        return view('studens.index',compact('alumnos','texto'));
                    return $registros;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('add.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $registro = new Autor;
        $registro->nombre=$request->input('nombre');
        $registro->apellido=$request->input('apellido');
        $registro->matricula=$request->input('matricula');
        $registro->grupo=$request->input('grupo');
        $registro->save();
        return redirect()->route('studens.index');

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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $autores=Autores::findOrFail($id);
        //return $registro;
        return view('studens.edit',compact('alumnos'));
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
        $registro=Registro::findOrFail($id);
        $registro->nombre=$request->input('nombre');
        $registro->apellido=$request->input('apellido');
        $registro->matricula=$request->input('matricula');
        $registro->grupo=$request->input('grupo');
        $registro->save();
        return redirect()->route('studens|      .index');
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
    }
}
