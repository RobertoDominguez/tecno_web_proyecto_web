@extends('admin.layouts.template')

@section('content')

    <div class="card card-secondary">
        <div class="card-header">
            <h3 class="card-title">Unidades</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <div class="card-body">

            <div class="card mb-4">
                <div class="card-header"><i class="fas fa-table mr-1"></i>Unidades</div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Codigo</th>
                                    <th>Hora inicio</th>
                                    <th>Hora final</th>
                                    <th>Nombre</th>
                                    <th>Nivel</th>
                                    <th>Ubicacion</th>
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
                                    <th></th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach ($unidads as $unidad)
                                    <tr>
                                        <td>{{ $unidad->codigo }}</td>
                                        <td>{{ $unidad->hora_ini }}</td>
                                        <td>{{ $unidad->hora_fin }}</td>
                                        <td>{{ $unidad->nombre }}</td>
                                        <td>{{ $unidad->nivel }}</td>
                                        <td>{{ $unidad->ubicacion }}</td>
                                        <td>
                                            <form action="{{ route('administrador.unidad.destroy', $unidad->id) }}"
                                                method="post">
                                                {{ csrf_field() }}
                                                <a class="btn btn-primary"
                                                    href="{{ route('administrador.unidad.edit', $unidad->id) }}">Editar</a>
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
            <a class="btn btn-warning" href="{{ route('administrador.unidad.create') }}">Agregar</a>
        </div>
    </div>

@endsection
