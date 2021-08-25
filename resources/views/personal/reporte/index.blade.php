@extends('personal.layouts.template')

@section('content')
    <h1 class="mt-4">Reportes</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Reportes</li>
    </ol>
    <div class="row">
        <div class="col-xl-3 col-md-6">
            <div class="card bg-primary text-white mb-4">
                <div class="card-body">Cantidad de documentos en la unidad</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" >{{$reportes['cantidad_documentos_unidad'].' documentos' }}</a>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-warning text-white mb-4">
                <div class="card-body">Cantidad de tareas de la unidad</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link">{{$reportes['tareas_por_unidad'].' tareas' }}</a>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card bg-success text-white mb-4">
                <div class="card-body">Total de documentos</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link">{{$reportes['total_documentos'].' documentos' }}</a>

                </div>
            </div>
        </div>
        {{-- <div class="col-xl-3 col-md-6">
            <div class="card bg-danger text-white mb-4">
                <div class="card-body">Danger Card</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="#">View Details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div> --}}
    </div>
@endsection
