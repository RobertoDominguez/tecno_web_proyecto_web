@extends('personal.layouts.template')

@section('content')

    <body>
        <div class="row">
            <div class="col-12">
                <div class="card card-secondary">
                    <div class="card-header">
                        <h3 class="card-title">Agregar Bifurcacion</h3>
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

                        <form action="{{ route('usuario.bifurcacion.create') }}" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="row">

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Nro Tarea:</strong>
                                        <div>
                                            <select id="editType" name="id_tarea_padre" class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                                            @foreach ($tareas as $tarea)
                                                <option  value="{{$tarea->id}}">{{$tarea->id}}</option>
                                            @endforeach                                       
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Objetivo:</strong>
                                        <input type="text" name="objetivo" value="" maxlength="200" class="form-control">
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>descripcion:</strong>
                                        <textarea class="form-control" name="descripcion" rows="3"></textarea>
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Fecha Ingreso:</strong>
                                        <input type="date" name="fecha_ingreso" value="" maxlength="200" class="form-control">
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Nro Documento:</strong>
                                        <div>
                                            <select id="editType" name="id_documento" class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                                            @foreach ($documentos as $documento)
                                                <option  value="{{$documento->id}}">{{$documento->id}}</option>
                                            @endforeach                                       
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Usuario Receptor:</strong>
                                        <div>
                                            <select id="editType" name="id_receptor" class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                                            @foreach ($receptores as $receptor)
                                                <option  value="{{$receptor->id}}">{{$receptor->nombre.' '.$receptor->ap_paterno.' '.$receptor->ap_materno}}</option>
                                            @endforeach                                       
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-success">Guardar</button>
                                        <a class="btn btn-primary" href="{{ route('usuario.bifurcacion.index') }}">Atras</a>
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
