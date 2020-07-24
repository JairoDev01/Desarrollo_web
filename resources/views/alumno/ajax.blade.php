@extends('layouts.admin')
@section('style')

    <link href="{{asset('css/loading.css')}}" rel="stylesheet">

@endsection
@section('contenido')
    @include('componentes.alert-success')
    @component('componentes.nav',['operation'=>'LIST',
        'menu_icon'=>' fa fa-file-text ',
        'submenu_icon'=>' fa fa-users ',
        'operation_icon'=>'',])
        @slot('menu')
            Registro
        @endslot
        @slot('submenu')
            Empleado
        @endslot
    @endcomponent

    @component('componentes.alert-no-selecction')
        @slot('mensaje')
            SELECCIONE UN EMPLEADO
        @endslot
    @endcomponent

    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            @can('role-create')
                @component('componentes.btn-create',['url'=>url('empleado/create')])
                @endcomponent
            @endcan
            @can('role-edit')
                @component('componentes.btn-edit',['url'=>'javascript:editar("empleado")'])
                @endcomponent
            @endcan
            @can('role-list')
                @component('componentes.btn-ver',['url'=>'javascript:ver("empleado")'])
                @endcomponent
            @endcan
            @can('role-delete')
                @component('componentes.btn-eliminar',['url'=>'javascript:eliminar("empleado")'])
                @endcomponent
            @endcan
        </div>
    </div>

    <div id="content">
        @include('registro.empleado.index')
    </div>
    <div class="loading">
        <i class="fa fa-refresh fa-spin "></i><br/>
        <span>Cargando</span>
    </div>
@endsection
@section('scripts')
    <script src="{{asset('js/ajax-crud.js')}}"></script>
    <script src="{{asset('js-brc/generico/index.js')}}"></script>
@endsection
