@extends('admin.layouts.template')

@section('content')

    <body>
        <div class="row">
            <div class="col-12">
                <div class="card card-secondary">
                    <div class="card-header">
                        <h3 class="card-title">Agregar Usuario</h3>
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

                        <form action="{{ route('administrador.usuario.create') }}" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="row">

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>CI:</strong>
                                        <input type="text" name="ci" value="" maxlength="200" class="form-control">
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Correo:</strong>
                                        <input type="email" name="email" value="" maxlength="200" class="form-control">
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Contraseña:</strong>
                                        <input type="password" name="password" value="" maxlength="200" class="form-control">
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Nombre:</strong>
                                        <input type="text" name="nombre" value="" maxlength="200" class="form-control">
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Apellido Paterno:</strong>
                                        <input type="text" name="ap_paterno" value="" maxlength="200" class="form-control">
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Apellido Materno:</strong>
                                        <input type="text" name="ap_materno" value="" maxlength="200" class="form-control">
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Telefono:</strong>
                                        <input type="text" name="telefono" value="" maxlength="200" class="form-control">
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Rol:</strong>
                                        <div>
                                            <select id="editType" name="id_rol" class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                                            @foreach ($roles as $rol)
                                                <option  value="{{$rol->id}}">{{$rol->nombre}}</option>
                                            @endforeach                                       
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Unidad:</strong>
                                        <div>
                                            <select id="editType" name="id_unidad" class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                                            @foreach ($unidades as $unidad)
                                                <option  value="{{$unidad->id}}">{{$unidad->nombre}}</option>
                                            @endforeach                                       
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-success">Guardar</button>
                                        <a class="btn btn-primary" href="{{ route('administrador.usuario.index') }}">Atras</a>
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
