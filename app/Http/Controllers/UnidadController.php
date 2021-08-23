<?php

namespace App\Http\Controllers;

use App\Models\Pagina;
use App\Models\Unidad;
use Illuminate\Http\Request;

class UnidadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $unidads=Unidad::all();

        $visitas=Pagina::where('url','administrador.unidad.index')->get()->first();
        $visitas->update(['count'=>$visitas->count+1]);

        return view('admin.unidad.index',compact('unidads','visitas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $visitas=Pagina::where('url','administrador.unidad.create')->get()->first();
        $visitas->update(['count'=>$visitas->count+1]);

        return view('admin.unidad.create',compact('visitas'));
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
            'codigo'=>'required',
            'hora_ini'=>'required',
            'hora_fin'=>'required',
            'nombre'=>'required',
            'nivel'=>'required',
            'ubicacion'=>'required',
        ]);

        $data=[
            'codigo'=>$request->codigo,
            'hora_ini'=>$request->hora_ini,
            'hora_fin'=>$request->hora_fin,
            'nombre'=>$request->nombre,
            'nivel'=>$request->nivel,
            'ubicacion'=>$request->ubicacion,
        ];

        $unidad=Unidad::create($data);
        return redirect(route('administrador.unidad.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Unidad  $unidad
     * @return \Illuminate\Http\Response
     */
    public function show(Unidad $unidad)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Unidad  $unidad
     * @return \Illuminate\Http\Response
     */
    public function edit(Unidad $unidad)
    {
        $visitas=Pagina::where('url','administrador.unidad.edit')->get()->first();
        $visitas->update(['count'=>$visitas->count+1]);

        return view('admin.unidad.edit',compact('unidad'),compact('visitas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Unidad  $unidad
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Unidad $unidad)
    {
        $this->validate(request(),[
            'codigo'=>'required',
            'hora_ini'=>'required',
            'hora_fin'=>'required',
            'nombre'=>'required',
            'nivel'=>'required',
            'ubicacion'=>'required',
        ]);

        $data=[
            'codigo'=>$request->codigo,
            'hora_ini'=>$request->hora_ini,
            'hora_fin'=>$request->hora_fin,
            'nombre'=>$request->nombre,
            'nivel'=>$request->nivel,
            'ubicacion'=>$request->ubicacion,
        ];

        $unidad->update($data);
        return redirect(route('administrador.unidad.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Unidad  $unidad
     * @return \Illuminate\Http\Response
     */
    public function destroy(Unidad $unidad)
    {
        $unidad->delete();
        return redirect(route('administrador.unidad.index'));
    }
}
