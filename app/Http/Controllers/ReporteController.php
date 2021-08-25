<?php

namespace App\Http\Controllers;

use App\Models\Documento;
use App\Models\Estado;
use App\Models\Pagina;
use App\Models\Tarea;
use App\Models\Unidad;
use Illuminate\Http\Request;
use Auth;


class ReporteController extends Controller
{

    public function reporteView()
    {
        $visitas = Pagina::where('url', 'usuario.reporte.index')->get()->first();
        $visitas->update(['count' => $visitas->count + 1]);

        $id_unidad=Auth::user()->id_unidad;

        $reportes=[
            'total_documentos'=>$this->totalDocumentos(),
            'cantidad_documentos_unidad'=>$this->cantidadDocumentosUnidad($id_unidad),
            'tareas_por_unidad'=>$this->tareasPorUnidad($id_unidad)
        ];

        return view('personal.reporte.index', compact('reportes'), compact('visitas'));
    }

    public static function totalDocumentos()
    {
        $documento = Documento::all()->count();
        return $documento;
    }

    public static function cantidadDocumentosUnidad($id_unidad)
    {
        $cantidad = Documento::join('tarea', 'tarea.id_documento', 'documento.id')
            ->join('usuario', 'usuario.id', 'tarea.id_receptor')
            ->join('unidad', 'unidad.id', 'usuario.id_unidad')
            ->where('unidad.id',$id_unidad)
            ->get()
            ->count();

        return $cantidad;
    }

    public static function tareasPorUnidad($id_unidad)
    {
        $tareas=Tarea::join('usuario','usuario.id','tarea.id_receptor')
        ->join('unidad','unidad.id','usuario.id_unidad')
        ->where('unidad.id',$id_unidad)
        ->get()->count();
        return $tareas;
    }
}
