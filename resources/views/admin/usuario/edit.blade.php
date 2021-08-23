@extends('admin.layouts.template')

@section('content')

    <body>
        <div class="row">
            <div class="col-12">
                <div class="card card-secondary">
                    <div class="card-header">
                        <h3 class="card-title">Editar Usuario</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <div class="card-body">

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <strong>Whoops!</strong> Verifica los datos.<br><br>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('administrador.usuario.update',$usuario->id) }}" method="POST"
                            enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="row">

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>CI:</strong>
                                        <input type="text" name="ci" value="{{ $usuario->ci }}" maxlength="200"
                                            class="form-control">
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Correo:</strong>
                                        <input type="email" name="email" value="{{ $usuario->email }}" maxlength="200"
                                            class="form-control">
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Contraseña:</strong>
                                        <input type="password" name="password" value="{{ $usuario->password }}"
                                            maxlength="200" class="form-control">
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Nombre:</strong>
                                        <input type="text" name="nombre" value="{{ $usuario->nombre }}" maxlength="200"
                                            class="form-control">
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Apellido Paterno:</strong>
                                        <input type="text" name="ap_paterno" value="{{ $usuario->ap_paterno }}"
                                            maxlength="200" class="form-control">
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Apellido Materno:</strong>
                                        <input type="text" name="ap_materno" value="{{ $usuario->ap_materno }}"
                                            maxlength="200" class="form-control">
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Telefono:</strong>
                                        <input type="text" name="telefono" value="{{ $usuario->telefono }}"
                                            maxlength="200" class="form-control">
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Rol:</strong>
                                        <div>
                                            <select id="editType" name="id_rol" class="custom-select mr-sm-2"
                                                id="inlineFormCustomSelect">
                                                <option value="{{ $usuario->id_rol }}">{{ $usuario->nombre_rol }}</option>
                                                @foreach ($roles as $rol)
                                                    @if ($rol->id != $usuario->id_rol)
                                                        <option value="{{ $rol->id }}">{{ $rol->nombre }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Unidad:</strong>
                                        <div>
                                            <select id="editType" name="id_unidad" class="custom-select mr-sm-2"
                                                id="inlineFormCustomSelect">
                                                <option value="{{ $usuario->id_unidad }}">{{ $usuario->nombre_unidad }}</option>
                                                @foreach ($unidades as $unidad)
                                                    @if ($unidad->id != $usuario->id_unidad)
                                                        <option value="{{ $unidad->id }}">{{ $unidad->nombre }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-success">Guardar</button>
                                        <a class="btn btn-primary"
                                            href="{{ route('administrador.usuario.index') }}">Atras</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
    </body>

@endsection
