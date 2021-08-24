<?php

namespace App\Http\Controllers;

use App\Models\Documento;
use App\Models\Estado;
use App\Models\Pagina;
use App\Models\Tarea;
use App\Models\Unidad;
use Illuminate\Http\Request;
use Auth;


class SeguimientoController extends Controller
{
    public function menu(Request $request)
    {

        $documento = Documento::find($request->id_documento);

        $visitas = Pagina::where('url', 'usuario.bifurcacion.index')->get()->first();
        $visitas->update(['count' => $visitas->count + 1]);

        return view('cliente.seguimiento.index', compact('documento'), compact('visitas'));
    }

    public function estado($id)
    {
        $estado = Estado::join('tarea', 'estado.id', 'tarea.id_estado')
            ->join('documento', 'documento.id', 'tarea.id_documento')
            ->where('documento.id', $id)->get()->first();

        return redirect()->back()->with('estado', $estado->nombre);   
    }

    public function ubicacion($id)
    {
        $unidades=Documento::join('tarea','documento.id','tarea.id_documento')
        ->join('usuario','usuario.id','tarea.id_receptor')
        ->join('unidad','usuario.id_unidad','unidad.id')
        ->join('estado','tarea.id_estado','estado.id')
        ->select('unidad.*','estado.nombre as nombre_estado')->get();

        $visitas = Pagina::where('url', 'documento.ubicacion')->get()->first();
        $visitas->update(['count' => $visitas->count + 1]);

        return view('cliente.seguimiento.ubicacion',compact('unidades'),compact('visitas'));
    }
}
