@extends('personal.layouts.template')

@section('content')

    <body>
        <div class="row">
            <div class="col-12">
                <div class="card card-secondary">
                    <div class="card-header">
                        <h3 class="card-title">Agregar Unidad</h3>
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

                        <form action="{{ route('usuario.tarea.update', $tarea->id) }}" method="POST"
                            enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Objetivo:</strong>
                                        <input type="text" name="objetivo" value="{{ $tarea->objetivo }}" maxlength="200"
                                            class="form-control">
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>descripcion:</strong>
                                        <textarea class="form-control" name="descripcion" rows="3">
                                                            {{ $tarea->descripcion }}
                                                        </textarea>
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Fecha Ingreso:</strong>
                                        <input type="date" name="fecha_ingreso" value="{{ $tarea->fecha_ingreso }}"
                                            maxlength="200" class="form-control">
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Nro Documento:</strong>
                                        <div>
                                            <select id="editType" name="id_documento" class="custom-select mr-sm-2"
                                                id="inlineFormCustomSelect">
                                                <option value="{{ $tarea->id_documento }}">{{ $tarea->id_documento }}
                                                </option>
                                                @foreach ($documentos as $documento)
                                                    @if ($documento->id != $tarea->id_documento)
                                                        <option value="{{ $documento->id }}">{{ $documento->id }}
                                                        </option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Usuario Receptor:</strong>
                                        <div>
                                            <select id="editType" name="id_receptor" class="custom-select mr-sm-2"
                                                id="inlineFormCustomSelect">
                                                <option value="{{ $tarea->id_receptor }}">
                                                    {{ $tarea->id_receptor }}
                                                </option>
                                                @foreach ($receptores as $receptor)
                                                    @if ($receptor->id != $tarea->id_receptor)
                                                        <option value="{{ $receptor->id }}">
                                                            {{ $receptor->nombre . ' ' . $receptor->ap_paterno . ' ' . $receptor->ap_materno }}
                                                        </option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-success">Guardar</button>
                                        <a class="btn btn-primary" href="{{ route('usuario.tarea.index') }}">Atras</a>
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
