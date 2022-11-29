<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Libros;

class LibrosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $libros = Libro::where('estatus', 'ACTIVO')->get();

        return \response()->json($libros, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $libro=new Libro();

        $libro->titulo=$request->get('titulo');
        $libro->fecha_publicacion=$request->get('fecha_publicacion');
        $libro->paginas=$request->get('paginas');
        $libro->created=$request->get('created');
        $libro->cutter=$request->get('cutter');
        $libro->dewey=$request->get('dewey');
        $libro->caratula=$request->get('caratula');


        $libro->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($isbn)
    {
        return $libro=Libro::find($isbn);
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
        $libro=Libro::find($id);

        $libro->titulo=$request->get('titulo');
        $libro->fecha_publicacion=$request->get('fecha_publicacion');
        $libro->paginas=$request->get('paginas');
        $libro->created=$request->get('created');
        $libro->cutter=$request->get('cutter');
        $libro->dewey=$request->get('dewey');
        $libro->caratula=$request->get('caratula');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($isbn)
    {
        $libro=Libro::find($isbn);
        $libro->delete();
    }
}
