<?php

namespace App\Http\Controllers;

use App\Models\Pagina;
use App\Models\Tarea;
use Illuminate\Http\Request;
use Auth;


class UnionController extends Controller
{
    public function getTareas(){
        $tareas=Tarea::where('id_receptor',Auth::user()->id)->where('id_tarea_padre',null)->where('id_estado',1)->get();
        
        $visitas=Pagina::where('url','usuario.union.index')->get()->first();
        $visitas->update(['count'=>$visitas->count+1]);

        return view('personal.union.index',compact('tareas'),compact('visitas'));
    }

    public function verificar($id_tarea){

        $tareas=Tarea::join('tarea as bif','tarea.id','bif.id_tarea_padre')->where('tarea.id',$id_tarea)->get();

        $esPosible = true;
        foreach ($tareas as $tarea){
            if ($tarea->id_estado==1) {
                $esPosible = false;
            }
        }

        if ($esPosible){
            return redirect()->back()->with('correcto', 'Se puede realizar la union');   
        }else{
            return redirect()->back()->with('incorrecto', 'No se puede realizar la union');   
        }
        
    }

    public function realizar(Request $request){

        $this->validate(request(),[
            'id_tarea'=>'required',
        ]);

        $tarea=Tarea::find($request->id_tarea);

        $tareas=Tarea::join('tarea as bif','tarea.id','bif.id_tarea_padre')->where('tarea.id',$tarea->id_tarea)->get();

        $esPosible = true;
        foreach ($tareas as $tarea){
            if ($tarea->id_estado==1) {
                $esPosible = false;
            }
        }

        if (!$esPosible){
            return redirect()->back()->with('incorrecto', 'No se puede realizar la union');   
        }

        $aceptado=true;
        foreach ($tareas as $tarea){
            if ($tarea->id_estado!=2) {
                $aceptado=false;
            }
        }

        if ($aceptado){
            $tarea->update(['id_estado'=>2]);
            return redirect()->back()->with('correcto', 'Se realizo la union! La tarea esta en estado aceptado');   
        }else{
            $tarea->update(['id_estado'=>3]);
            return redirect()->back()->with('incorrecto', 'Se realizo la union! La tarea esta en estado rechazado');   
        }

    }
}