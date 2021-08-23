<?php

namespace App\Http\Controllers;

use App\Models\Documento;
use App\Models\Tarea;
use App\Models\Usuario;
use App\Models\Pagina;
use Illuminate\Http\Request;
use Auth;

class BifurcacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tareas=Tarea::where('id_receptor',Auth::user()->id)->where('id_tarea_padre','!=',null)->where('id_estado',1)->get();

        $visitas=Pagina::where('url','usuario.bifurcacion.index')->get()->first();
        $visitas->update(['count'=>$visitas->count+1]);

        return view('personal.bifurcacion.index',compact('tareas'),compact('visitas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $documentos=Documento::Terminados()->get();
        $receptores=Usuario::where('id_rol',2)->get();
        $tareas=Tarea::where('id_receptor',Auth::user()->id)->where('id_tarea_padre',null)->where('id_estado',1)->get();
        
        $visitas=Pagina::where('url','usuario.bifurcacion.create')->get()->first();
        $visitas->update(['count'=>$visitas->count+1]);

        return view('personal.bifurcacion.create',compact('documentos','receptores'),compact('tareas'))->with(compact('visitas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(request(),[
            'objetivo'=>'required',
            'descripcion'=>'required',
            'fecha_ingreso'=>'required',
            'id_tarea_padre'=>'required',
            'id_documento'=>'required',
            'id_receptor'=>'required',
        ]);

        $data=[
            'objetivo'=>$request->objetivo,
            'descripcion'=>$request->descripcion,
            'fecha_ingreso'=>$request->fecha_ingreso,
            'id_tarea_padre'=>$request->id_tarea_padre,
            'id_documento'=>$request->id_documento,
            'id_emisor'=>Auth::user()->id,
            'id_receptor'=>$request->id_receptor,
            'id_estado'=>1,
        ];

        $bifurcacion=Tarea::create($data);
        return redirect(route('usuario.bifurcacion.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tarea  $bifurcacion
     * @return \Illuminate\Http\Response
     */
    public function show(Tarea $bifurcacion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tarea  $bifurcacion
     * @return \Illuminate\Http\Response
     */
    public function edit(Tarea $bifurcacion)
    {
        $documentos=Documento::Terminados()->get();
        $receptores=Usuario::where('id_rol',2)->get();
        $tareas=Tarea::where('id_receptor',Auth::user()->id)->where('id_tarea_padre',null)->where('id_estado',1)->get();
        
        $visitas=Pagina::where('url','usuario.bifurcacion.index')->get()->first();
        $visitas->update(['count'=>$visitas->count+1]);

        return view('personal.bifurcacion.edit',compact('bifurcacion','tareas'),compact('documentos','receptores'))->with(compact('visitas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tarea  $bifurcacion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tarea $bifurcacion)
    {
        $this->validate(request(),[
            'objetivo'=>'required',
            'descripcion'=>'required',
            'fecha_ingreso'=>'required',
            'id_tarea_padre'=>'required',
            'id_documento'=>'required',
            'id_receptor'=>'required',
        ]);

        $data=[
            'objetivo'=>$request->objetivo,
            'descripcion'=>$request->descripcion,
            'fecha_ingreso'=>$request->fecha_ingreso,
            'id_tarea_padre'=>$request->id_tarea_padre,
            'id_documento'=>$request->id_documento,
            'id_emisor'=>Auth::user()->id,
            'id_receptor'=>$request->id_receptor,
            'id_estado'=>1,
        ];

        $bifurcacion->update($data);
        return redirect(route('usuario.bifurcacion.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tarea  $bifurcacion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tarea $bifurcacion)
    {
        $bifurcacion->delete();
        return redirect(route('usuario.bifurcacion.index'));
    }
}
