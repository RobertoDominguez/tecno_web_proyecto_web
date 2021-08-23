@extends('personal.layouts.template')

@section('content')

    <div class="card card-secondary">
        <div class="card-header">
            <h3 class="card-title">Documentos</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <div class="card-body">

            <div class="card mb-4">
                <div class="card-header"><i class="fas fa-table mr-1"></i>Documentos</div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Nro</th>
                                    <th>Nombre</th>
                                    <th>Titulo</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach ($documentos as $documento)
                                    <tr>
                                        <td>{{ $documento->id }}</td>
                                        <td>{{ $documento->nombre_interesado }}</td>
                                        <td>{{ $documento->titulo }}</td>
                                        <td>
                                            <form action="{{ route('usuario.documento.destroy', $documento->id) }}"
                                                method="post">
                                                {{ csrf_field() }}
                                                <a class="btn btn-primary"
                                                    href="{{ route('usuario.documento.edit', $documento->id) }}">Editar</a>
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
            <a class="btn btn-warning" href="{{ route('usuario.documento.create') }}">Agregar</a>
        </div>
    </div>

@endsection
