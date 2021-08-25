@extends('admin.layouts.template')

@section('content')

    <div class="card card-secondary">
        <div class="card-header">
            <h3 class="card-title">Gestionar Usuarios</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <div class="card-body">

            <div class="card mb-4">
                <div class="card-header"><i class="fas fa-table mr-1"></i>Usuarios</div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Ci</th>
                                    <th>Correo</th>
                                    <th>Nombre</th>
                                    <th>Telefono</th>
                                    <th>Rol</th>
                                    <th>Unidad</th>
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
                                @foreach ($usuarios as $usuario)
                                    <tr>
                                        <td>{{ $usuario->ci }}</td>
                                        <td>{{ $usuario->email }}</td>
                                        <td>{{ $usuario->nombre.' '.$usuario->ap_paterno.' '.$usuario->ap_materno }}</td>
                                        <td>{{ $usuario->telefono }}</td>
                                        <td>{{ $usuario->nombre_rol }}</td>
                                        <td>{{ $usuario->nombre_unidad }}</td>
                                        <td>
                                            <form action="{{ route('administrador.usuario.destroy', $usuario->id) }}"
                                                method="post">
                                                {{ csrf_field() }}
                                                <a class="btn btn-primary"
                                                    href="{{ route('administrador.usuario.edit', $usuario->id) }}">Editar</a>
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
            <a class="btn btn-warning" href="{{ route('administrador.usuario.create') }}">Agregar</a>
        </div>
    </div>

@endsection
