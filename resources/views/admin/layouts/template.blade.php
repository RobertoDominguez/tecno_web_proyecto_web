<!DOCTYPE html>
<html lang="en">

<head>

    <base href="../../..">

    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Ventanilla Unica FICCT</title>
    @if (\Session::get('tema') == 'nino')
    <link href="{{ asset('template/css/nino.css') }}" rel="stylesheet" />
    @elseif(\Session::get('tema') == 'adulto')
    <link href="{{ asset('template/css/adulto.css') }}" rel="stylesheet" />
    @else
    <link href="{{ asset('template/css/styles.css') }}" rel="stylesheet" />
    @endif
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>

    <script async src="https://cse.google.com/cse.js?cx=cddb24a0be31db357"></script>
</head>

<body class="sb-nav-fixed">
    @if (\Session::get('modo') == 'dia')
    <nav class="sb-topnav navbar navbar-expand navbar-light bg-light">
        @else
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            @endif
            <a class="navbar-brand" href="/">Tecno WEB</a><button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button><!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
                {{-- <div class="input-group">
            <input class="form-control" type="text" placeholder="Search for..." aria-label="Search"
                aria-describedby="basic-addon2" />
            <div class="input-group-append">
                <button class="btn btn-primary" type="button"><i class="fas fa-search"></i></button>
            </div>
        </div> --}}
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ml-auto ml-md-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <form action="{{ route('modo.dia') }}" method="POST">
                            {{ csrf_field() }}
                            <input type="submit" class="dropdown-item" value="Modo Dia">
                        </form>

                        <form action="{{ route('modo.noche') }}" method="POST">
                            {{ csrf_field() }}
                            <input type="submit" class="dropdown-item" value="Modo Noche">
                        </form>
                        <div class="dropdown-divider"></div>

                        <form action="{{ route('tema.nino') }}" method="POST">
                            {{ csrf_field() }}
                            <input type="submit" class="dropdown-item" value="Tema Niño">
                        </form>

                        <form action="{{ route('tema.joven') }}" method="POST">
                            {{ csrf_field() }}
                            <input type="submit" class="dropdown-item" value="Tema Joven">
                        </form>

                        <form action="{{ route('tema.adulto') }}" method="POST">
                            {{ csrf_field() }}
                            <input type="submit" class="dropdown-item" value="Tema Adulto">
                        </form>
                        <div class="dropdown-divider"></div>
                        <form action="{{ route('logout') }}" method="POST">
                            {{ csrf_field() }}
                            <input type="submit" class="dropdown-item" value="Cerrar sesión">
                        </form>

                    </div>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                @if (\Session::get('modo') == 'dia')
                <nav class="sb-sidenav accordion sb-sidenav-light" id="sidenavAccordion">
                    @else
                    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                        @endif
                        <div class="sb-sidenav-menu">
                            <div class="nav">
                                <div class="sb-sidenav-menu-heading">Nucleo</div>
                                <a class="nav-link" href="{{ route('administrador.usuario.index') }}">
                                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                    Usuarios
                                </a>

                                <a class="nav-link" href="{{ route('administrador.unidad.index') }}">
                                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                    Unidades
                                </a>

                                <div class="sb-sidenav-menu-heading">Estadisticas</div>
                                <a class="nav-link" href="tables.html">
                                    <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                    Reportes
                                </a>
                            </div>
                        </div>
                        <div class="sb-sidenav-footer">
                            <div class="small">Conectado como:</div>
                            administrador
                        </div>
                    </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <hr>
                        <div class="gcse-search"></div>
                        <hr>
                        @yield('content')
                    </div>
                </main>
                @if (\Session::get('modo') == 'dia')
                <footer class="py-4 bg-light mt-auto">
                    @else
                    <footer class="py-4 bg-dark mt-auto">
                        @endif
                        <div class="container-fluid">
                            <div class="d-flex align-items-center justify-content-between small">
                                <div class="text-muted">Copyright &copy; TecnoWebGrupo12SA</div>
                                <div>
                                    @php
                                    echo 'visitas: ' . $visitas->count;
                                    @endphp
                                </div>
                            </div>
                        </div>
                    </footer>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous">
        </script>
        <script src="{{ asset('template/js/scripts.js') }}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="{{ asset('template/assets/demo/chart-area-demo.js') }}"></script>
        <script src="{{ asset('template/assets/demo/chart-bar-demo.js') }}"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="{{ asset('template/assets/demo/datatables-demo.js') }}"></script>
</body>

</html>