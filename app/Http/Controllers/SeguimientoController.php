<?php

namespace App\Http\Controllers;

use App\Models\Pagina;
use App\Models\Tarea;
use Illuminate\Http\Request;
use Auth;


class SeguimientoController extends Controller
{
    public function menu(){

        $visitas=Pagina::where('url','usuario.bifurcacion.index')->get()->first();
        $visitas->update(['count'=>$visitas->count+1]);

        return view('cliente.seguimiento.index',compact('visitas'));
    }
}