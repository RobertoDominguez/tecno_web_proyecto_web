<?php

namespace App\Http\Controllers;

use App\Models\Documento;
use App\Models\Pagina;
use App\Models\Tarea;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Auth;

class TareaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tareas=Tarea::where('id_receptor',Auth::user()->id)->where('id_tarea_padre',null)->where('id_estado',1)->get();

        $visitas=Pagina::where('url','usuario.bifurcacion.index')->get()->first();
        $visitas->update(['count'=>$visitas->count+1]);

        return view('personal.tarea.index',compact('tareas'),compact('visitas'));
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
        
        $visitas=Pagina::where('url','usuario.bifurcacion.create')->get()->first();
        $visitas->update(['count'=>$visitas->count+1]);

        return view('personal.tarea.create',compact('documentos','receptores'))->with(compact('visitas'));
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
            'id_documento'=>'required',
            'id_receptor'=>'required',
        ]);

        $data=[
            'objetivo'=>$request->objetivo,
            'descripcion'=>$request->descripcion,
            'fecha_ingreso'=>$request->fecha_ingreso,
            'id_tarea_padre'=>null,
            'id_documento'=>$request->id_documento,
            'id_emisor'=>Auth::user()->id,
            'id_receptor'=>$request->id_receptor,
            'id_estado'=>1,
        ];

        $tarea=Tarea::create($data);
        return redirect(route('usuario.tarea.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tarea  $tarea
     * @return \Illuminate\Http\Response
     */
    public function show(Tarea $tarea)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tarea  $tarea
     * @return \Illuminate\Http\Response
     */
    public function edit(Tarea $tarea)
    {
        $documentos=Documento::Terminados()->get();
        $receptores=Usuario::where('id_rol',2)->get();
        
        $visitas=Pagina::where('url','usuario.bifurcacion.edit')->get()->first();
        $visitas->update(['count'=>$visitas->count+1]);

        return view('personal.tarea.edit',compact('tarea'),compact('documentos','receptores'))->with(compact('visitas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tarea  $tarea
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tarea $tarea)
    {
        $this->validate(request(),[
            'objetivo'=>'required',
            'descripcion'=>'required',
            'fecha_ingreso'=>'required',
            'id_documento'=>'required',
            'id_receptor'=>'required',
        ]);

        $data=[
            'objetivo'=>$request->objetivo,
            'descripcion'=>$request->descripcion,
            'fecha_ingreso'=>$request->fecha_ingreso,
            'id_tarea_padre'=>null,
            'id_documento'=>$request->id_documento,
            'id_emisor'=>Auth::user()->id,
            'id_receptor'=>$request->id_receptor,
            'id_estado'=>1,
        ];

        $tarea->update($data);
        return redirect(route('usuario.tarea.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tarea  $tarea
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tarea $tarea)
    {
        $tarea->delete();
        return redirect(route('usuario.tarea.index'));
    }
}
