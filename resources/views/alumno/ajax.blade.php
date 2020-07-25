@extends('layouts.app')
@section('style')

    <link href="{{asset('css/loading.css')}}" rel="stylesheet">

@endsection
@section('contenido')
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            @can('role-create')
                @component('componentes.btn-create',['url'=>url('alumno/create')])
                @endcomponent
            @endcan
            @can('role-edit')
                @component('componentes.btn-edit',['url'=>'javascript:editar("alumno")'])
                @endcomponent
            @endcan
            @can('role-list')
                @component('componentes.btn-ver',['url'=>'javascript:ver("alumno")'])
                @endcomponent
            @endcan
            @can('role-delete')
                @component('componentes.btn-eliminar',['url'=>'javascript:eliminar("alumno")'])
                @endcomponent
            @endcan
        </div>
    </div>

    <div id="content">
        @include('alumno.index')
    </div>
    <div class="loading">
        <i class="fa fa-refresh fa-spin "></i><br/>
        <span>Cargando</span>
    </div>
@endsection
@section('scripts')
    <script src="{{asset('js/ajax-crud.js')}}"></script>
    <script src="{{asset('js/generico/index.js')}}"></script>
@endsection
