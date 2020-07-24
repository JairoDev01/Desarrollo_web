@extends('layouts.admin')

@section('contenido')

    @component('componentes.nav',['operation'=>'Editar',
    'menu_icon'=>'fa-file-text ',
    'submenu_icon'=>' fa fa-users',
    'operation_icon'=>'fa-edit',])
        @slot('menu')
            Registro
        @endslot
        @slot('submenu')
            Empleado
        @endslot
    @endcomponent

    @include('componentes.alert-error')
    <div class="panel-body">
        {!!Form::model($empleado,['method'=>'PATCH','route'=>['registro.empleado.update',$empleado->id_empleado]])!!}
        {{Form::token()}}
        <div class="row">
            <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                <div class="form-group">
                    <label for="codigo_interno">CODIGO</label>
                    <input type="text" name="codigo_interno" value="{{$empleado->codigo_interno}}" class="form-control">
                </div>
            </div>
            <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                <div class="form-group">
                    <label for="nombre">NOMBRE</label>
                    <input type="text" name="nombre" value="{{$empleado->nombre}}" class="form-control">
                </div>
            </div>
            <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                <div class="form-group">
                    <label for="apellido">APELLIDO</label>
                    <input type="text" name="apellido" value="{{$empleado->apellido}}" class="form-control">
                </div>
            </div>
            <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                <div class="form-group">
                    <label for="dpi">DPI</label>
                    <input type="text" name="dpi" value="{{$empleado->dpi}}" class="form-control">
                </div>
            </div>
            <div class="col-lg-4 col-sm-6 col-md-6 col-xs-12">
                <div class="form-group">
                    <label>Fecha de Nacimiento</label>
                    <div class="input-group date">
                        <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                        </div>
                        <input id="fecha_nacimiento" name="fecha_nacimiento"
                               value="{{$empleado->fecha_nacimiento}}"
                               type="text" class="form-control pull-right">
                    </div>

                </div>
            </div>
            <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                <div class="form-group">
                    <label for="correo">CORREO</label>
                    <input type="text" name="correo" value="{{$empleado->correo}}" class="form-control">
                </div>
            </div>
            <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                <div class="form-group">
                    <label for="direccion">DIRECCION</label>
                    <input type="text" name="direccion" value="{{$empleado->direccion}}" class="form-control">
                </div>
            </div>
            <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                <div class="form-group">
                    <label for="id_acceso">PUNTO DE ACCESO</label>
                    <select name="id_punto_acceso" class="form-control selectpicker"
                            required
                            id="id_punto_acceso">
                        <option value="">SELECCIONAR PUNTO DE ACCESO</option>
                        @foreach($acceso as $punto)
                            @if($empleado->id_punto_acceso == $punto->id_accesso)
                                <option selected value="{{$punto->id_accesso}}">{{$punto->descripcion}}</option>
                            @else
                                <option value="{{$punto->id_accesso}}">{{$punto->descripcion}}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                <div class="form-group">
                    <label for="celular">CELULAR</label>
                    <input type="text" name="celular" value="{{$empleado->celular}}" class="form-control">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="table-responsive">
                </div>
            </div>
        </div>
    </div>
    <div class="panel-body">
        <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
            <div class="form-group">
                <button class="btn btn-default" type="submit"><span class=" fa fa-check"></span> GUARDAR</button>
                <a href="{{ route('empleado.index') }}">
                    <button class="btn btn-default" type="button"><span class="  fa fa-remove"></span> CANCELAR</button>
                </a>
            </div>
        </div>
    </div>
    {!!Form::close()!!}
@endsection
@section('scripts')
    <script>

        $('.date').datepicker({
            format: 'yyyy-mm-dd',
            autoclose: true,
            setDate: new Date()

        });
    </script>
@endsection
