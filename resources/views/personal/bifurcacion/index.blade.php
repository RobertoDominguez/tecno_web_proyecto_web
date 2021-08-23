@extends('personal.layouts.template')

@section('content')

    <div class="card card-secondary">
        <div class="card-header">
            <h3 class="card-title">Gestionar Bifurcaciones</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <div class="card-body">

            <div class="card mb-4">
                <div class="card-header"><i class="fas fa-table mr-1"></i>Bifurcaciones</div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Nro</th>
                                    <th>Objetivo</th>
                                    <th>Fecha Ingreso</th>
                                    <th>Nro Documento</th>
                                    <th>Receptor</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach ($tareas as $tarea)
                                    <tr>
                                        <td>{{ $tarea->id }}</td>
                                        <td>{{ $tarea->objetivo }}</td>
                                        <td>{{ $tarea->fecha_ingreso }}</td>
                                        <td>{{ $tarea->id_documento }}</td>
                                        <td>{{ $tarea->id_receptor }}</td>
                                        <td>
                                            <form action="{{ route('usuario.bifurcacion.destroy', $tarea->id) }}"
                                                method="post">
                                                {{ csrf_field() }}
                                                <a class="btn btn-primary"
                                                    href="{{ route('usuario.bifurcacion.edit', $tarea->id) }}">Editar</a>
                                                <button type="submit" class="btn btn-danger">Eliminar</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <a class="btn btn-warning" href="{{ route('usuario.bifurcacion.create') }}">Agregar</a>
        </div>
    </div>

@endsection
