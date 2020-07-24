<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>{{env('APP_NAME')}}</title>
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/AdminLTE.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/_all-skins.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap-datepicker.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap-timepicker.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/font-awesome.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap-select.min.css')}}">
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <style>
        .popover {
            max-width: none;
        }
    </style>
    @yield('style')

</head>
<body style="background-color: #f5f5f5;">
<div class="navbar navbar-default" style="background-color: #01579B; border-radius: 0px;">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button"
                    class="navbar-toggle"
                    data-toggle="collapse"
                    data-target="#mynavbar-content">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{url('/')}}" style="color: #fff">{{env('APP_NAME')}}</a>
        </div>
        <div class="collapse navbar-collapse" id="mynavbar-content">

            @can('registro')
                <ul class="nav navbar-nav">
                    <li class="dropdown">
                        <a href="#" data-toggle="dropdown" style="background-color: #01579B;  color: #fff;">Registro<b
                                class="caret"></b></a>
                        <ul class="dropdown-menu">
                            @can('empleados')
                                <li>
                                    <a href="{{url('empleado')}}">
                                        <i class="fa fa-users" aria-hidden="true"></i>
                                        Empleados
                                    </a>
                                </li>
                            @endcan
                            @can('puntos')
                                <li>
                                    <a href="{{url('acceso')}}">
                                        <i class="fa fa fa-tags" aria-hidden="true"></i>
                                        Punto de acceso
                                    </a>
                                </li>
                            @endcan
                            @can('rangos')
                                <li>
                                    <a href="{{url('rangos')}}">
                                        <i class="fa fa-list-ol" aria-hidden="true"></i>
                                        Rangos de Temperatura
                                    </a>
                                </li>
                            @endcan

                        </ul>
                    </li>
                </ul>
            @endcan
            @can('reportes')
                <ul class="nav navbar-nav">
                    <li class="dropdown">
                        <a href="#" data-toggle="dropdown" style="background-color: #01579B;  color: #fff;">Reportes<b
                                class="caret"></b></a>
                        <ul class="dropdown-menu">
                            @can('registros')
                                <li>
                                    <a href="{{url('reportes/empleados')}}">
                                        <i class="fa fa fa-table" aria-hidden="true"></i>
                                        Registros
                                    </a>
                                </li>
                            @endcan
                            @can('historial')
                                <li>
                                    <a href="{{url('reportes/historial')}}">
                                        <i class="fa fa fa-history" aria-hidden="true"></i>
                                        Historial
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                </ul>
            @endcan
            @can('parametros')
                <ul class="nav navbar-nav">
                    <li class="dropdown">
                        <a href="{{url('parametros')}}"
                           style="background-color: #01579B;  color: #fff;">Parametros</a>
                    </li>
                </ul>
            @endcan
            @can('usuarios')
                <ul class="nav navbar-nav">
                    <li class="dropdown">
                        <a href="#" data-toggle="dropdown" style="background-color: #01579B;  color: #fff;">Usuarios<b
                                class="caret"></b></a>
                        <ul class="dropdown-menu">
                            @can('administrar')
                                <li><a href="{{url('users')}}"><i class="fa fa-cog"></i>Administrar</a></li>
                            @endcan
                            @can('roles')
                                <li><a href="{{url('roles')}}"><i class=" fa fa-wrench"></i>Roles</a></li>
                            @endcan
                        </ul>
                </ul>
            @endcan

            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown menu">
                    <a href="#" data-toggle="dropdown"
                       id="lnk_username"
                       style="background-color: #01579B;  color: #fff;"
                       aria-expanded="true">
                        <i class="fa fa-user" aria-hidden="true"></i>
                        {{Auth::user()->username}}<b class="caret"></b>
                        <a class="nav-link"
                           id="lnk_logout"
                           style="background-color: #01579B;  color: #fff;display: none"
                           href="{{route('logout')}}"><i class="fa fa-sign-out"></i>Cerrar
                            Sesión</a>
                    </a>
                    <ul class="dropdown-menu" id="menu_username">
                        <li class="nav-item">
                            <a class="nav-link"
                               href="{{route('logout')}}"><i class="fa fa-sign-out"></i>Cerrar
                                Sesión</a>
                        </li>
                    </ul>
                </li>

            </ul>
        </div>
    </div>
</div>
<div class="box-body">
    <div class="row">
        <div class="col-md-12">
            @if ($message = Session::get('unautorized'))
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <p>{{ $message }}</p>
                </div>
            @endif
            @yield('contenido')
        </div>
    </div>
</div>

<footer>
    <center>
        <strong> &copy; {{env('DEVELOPED_AT')}} <a>{{env('DEVELOPER')}}</a></strong> TODOS LOS DERECHOS RESERVADOS.
    </center>
</footer>


<script src="{{asset('js/jQuery-2.1.4.min.js')}}"></script>
<script src="{{asset('js/app.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/bootstrap-select.min.js')}}"></script>
<script src="{{asset('js/bootstrap-datepicker.min.js')}}"></script>
<script src="{{asset('js/bootstrap-timepicker.min.js')}}"></script>
<script src="{{asset('js/bootstrap-datepicker.es.min.js')}}"></script>
<script>

    var height = 0;
    var width = 0;
    $(document).ready(function () {
        $('[data-toggle="tooltip"]').tooltip();
        $(function () {
            $('[data-toggle="popover"]').popover()
        });
        height = window.screen.availHeight;
        width = window.screen.availWidth;
        if (height < 740 || width < 400) {
            document.getElementById('lnk_username').style.display = "none";
            document.getElementById('lnk_logout').style.display = "block";
        }


    });
    $(window).resize(function () {
        height = window.screen.availHeight;
        width = window.screen.availWidth;

        if (height < 740 || width < 380) {
            document.getElementById('lnk_username').style.display = "none";
            document.getElementById('lnk_logout').style.display = "block";
        } else {
            document.getElementById('lnk_username').style.display = "block";
            document.getElementById('lnk_logout').style.display = "none";
        }

    });

</script>
@yield('scripts')
</body>
