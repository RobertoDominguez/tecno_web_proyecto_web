<?php

namespace App\Http\Controllers;

use App\Models\Documento;
use App\Models\Estado;
use App\Models\Pagina;
use App\Models\Tarea;
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

        return view('');
    }
}
