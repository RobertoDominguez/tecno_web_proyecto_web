@extends('cliente.layouts.template')

@section('content')

    <body>
        <div class="row">
            <div class="col-12">
                <div class="card card-secondary">
                    <div class="card-header">
                        <h3 class="card-title">Seguimiento de documento</h3>
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

                        <form action="{{ route('menu') }}" method="GET" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="row">

                                <div class="input-group">
                                    <input name="id_documento" class="form-control" type="text"
                                        placeholder="Buscar documento..." aria-label="Search"
                                        aria-describedby="basic-addon2" />
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="button"><i class="fas fa-search"></i></button>
                                    </div>
                                </div>

                            </div>
                        </form>



                        <div class="card-body">

                            <div class="card mb-4">
                                <div class="card-header"><i class="fas fa-table mr-1"></i>Bifurcaciones</div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>Nro</th>
                                                    <th>Nombre</th>
                                                    <th>Titulo</th>
                                                    <th></th>
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
                                                </tr>
                                            </tfoot>
                                            <tbody>
                                                <tr>
                                                    @if (!is_null($documento))
                                                        <td>{{ $documento->id }}</td>
                                                        <td>{{ $documento->nombre_interesado }}</td>
                                                        <td>{{ $documento->titulo }}</td>
                                                        <td>
                                                            <a class="btn btn-primary"
                                                                href="{{ route('documento.estado', $documento->id) }}">Ver
                                                                estado</a>
                                                        </td>
                                                        <td>
                                                            <a class="btn btn-danger"
                                                                href="{{ route('documento.estado', $documento->id) }}">Ver
                                                                ubicacion</a>
                                                        </td>
                                                    @endif
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
    </body>

@endsection
