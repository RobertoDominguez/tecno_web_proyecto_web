<?php

namespace App\Http\Controllers;

use App\Models\Documento;
use App\Models\Tarea;
use App\Models\Pagina;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Auth;

class DocumentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $documentos=Documento::Terminados()->get();

        $visitas=Pagina::where('url','usuario.documento.index')->get()->first();
        $visitas->update(['count'=>$visitas->count+1]);

        return view('personal.documento.index',compact('documentos'),compact('visitas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $visitas=Pagina::where('url','usuario.documento.create')->get()->first();
        $visitas->update(['count'=>$visitas->count+1]);

        return view('personal.documento.create',compact('visitas'));
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
            'nombre_interesado'=>'required',
            'titulo'=>'required',
            'contenido'=>'required',
            'objetivo'=>'required'
        ]);

        $data=[
            'nombre_interesado'=>$request->nombre_interesado,
            'titulo'=>$request->titulo,
            'contenido'=>$request->contenido,
        ];

        $documento=Documento::create($data);

        //se le asigna a si mismo la tarea
        $data=[
            'objetivo'=>$request->objetivo,
            'descripcion'=>'Entrada de documento a ventanilla unica',
            'fecha_ingreso'=>Carbon::now(),
            'id_tarea_padre'=>null,
            'id_documento'=>$documento->id,
            'id_emisor'=>Auth::user()->id,
            'id_receptor'=>Auth::user()->id,
            'id_estado'=>1,
        ];

        $tarea=Tarea::create($data);

        return redirect(route('usuario.documento.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Documento  $documento
     * @return \Illuminate\Http\Response
     */
    public function show(Documento $documento)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Documento  $documento
     * @return \Illuminate\Http\Response
     */
    public function edit(Documento $documento)
    {
        $visitas=Pagina::where('url','usuario.documento.edit')->get()->first();
        $visitas->update(['count'=>$visitas->count+1]);

        return view('personal.documento.edit',compact('documento'),compact('visitas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Documento  $documento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Documento $documento)
    {
        $this->validate(request(),[
            'nombre_interesado'=>'required',
            'titulo'=>'required',
            'contenido'=>'required'
        ]);

        $data=[
            'nombre_interesado'=>$request->nombre_interesado,
            'titulo'=>$request->titulo,
            'contenido'=>$request->contenido,
        ];

        $documento->update($data);
        return redirect(route('usuario.documento.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Documento  $documento
     * @return \Illuminate\Http\Response
     */
    public function destroy(Documento $documento)
    {
        $documento->delete();
        return redirect(route('usuario.documento.index'));
    }
}
