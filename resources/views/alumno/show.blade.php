@extends('layouts.admin')


@section('content')
    @component('componentes.nav',['operation'=>'Ver',
       'menu_icon'=>' fa fa-file-text ',
       'submenu_icon'=>'fa-users',
       'operation_icon'=>'fa-eye',])
        @slot('menu')
            Registro
        @endslot
        @slot('submenu')
            Empleado
        @endslot
    @endcomponent

    <div class="panel-body">

        <div class="row">
            <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                <div class="form-group">
                    <label for="codigo_interno">CODIGO</label>
                    <input type="text" readonly name="codigo_interno" value="{{$empleado->codigo_interno}}"
                           class="form-control">
                </div>
            </div>
            <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                <div class="form-group">
                    <label for="nombre">NOMBRE</label>
                    <input type="text" readonly name="nombre" value="{{$empleado->nombre}}" class="form-control">
                </div>
            </div>
            <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                <div class="form-group">
                    <label for="apellido">APELLIDO</label>
                    <input type="text" readonly name="apellido" value="{{$empleado->apellido}}" class="form-control">
                </div>
            </div>
            <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                <div class="form-group">
                    <label for="dpi">DPI</label>
                    <input type="text" readonly name="dpi" value="{{$empleado->dpi}}" class="form-control">
                </div>
            </div>
            <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                <div class="form-group">
                    <label for="fecha_nacimiento">FECHA NACIMIENTO</label>
                    <input type="text" readonly name="fecha_nacimiento" value="{{$empleado->fecha_nacimiento}}"
                           class="form-control">
                </div>
            </div>
            <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                <div class="form-group">
                    <label for="correo">CORREO</label>
                    <input type="text" readonly name="correo" value="{{$empleado->correo}}" class="form-control">
                </div>
            </div>
            <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                <div class="form-group">
                    <label for="direccion">DIRECCION</label>
                    <input type="text" readonly name="direccion" value="{{$empleado->direccion}}" class="form-control">
                </div>
            </div>
            <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                <div class="form-group">
                    <label for="id_punto_acceso">PUNTO DE ACCESO</label>
                    <input type="text" readonly name="id_punto_acceso" value="{{$empleado->punto_acceso->descripcion}}"
                           class="form-control">
                </div>
            </div>
            <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                <div class="form-group">
                    <label for="celular">CELULAR</label>
                    <input type="text" readonly name="celular" value="{{$empleado->celular}}" class="form-control">
                </div>
            </div>
        </div>
    </div>
    <div class="panel-body">
        <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
            <div class="form-group">
                <a href="{{url('empleado')}}">
                    <button class="btn btn-default" type="button"><span class="  fa fa-backward"></span> REGRESAR
                    </button>
                </a>
            </div>
        </div>
    </div>

@endsection
