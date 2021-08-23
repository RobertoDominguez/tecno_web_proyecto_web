@extends('personal.layouts.template')

@section('content')

    <body>
        <div class="row">
            <div class="col-12">
                <div class="card card-secondary">
                    <div class="card-header">
                        <h3 class="card-title">Gestionar Uniones</h3>
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

                        @if (\Session::has('correcto'))
                            <div class="alert alert-success">
                                <ul>
                                    <li>{!! \Session::get('correcto') !!}</li>
                                </ul>
                            </div>
                        @endif

                        @if (\Session::has('incorrecto'))
                            <div class="alert alert-danger">
                                <ul>
                                    <li>{!! \Session::get('incorrecto') !!}</li>
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('usuario.union.realizar') }}" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="row">

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Nro Tarea:</strong>
                                        <div>
                                            <select id="editType" name="id_tarea" class="custom-select mr-sm-2"
                                                id="inlineFormCustomSelect">
                                                @foreach ($tareas as $tarea)
                                                    <option value="{{ $tarea->id }}">{{ $tarea->id }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-success">Realizar Union</button>
                                        {{-- <a class="btn btn-primary" href="{{ route('usuario.union.verificar',$tarea->id) }}">Verificar
                                            Union</a> --}}
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
