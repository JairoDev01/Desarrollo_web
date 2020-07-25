@extends('layouts.layout')

@section('content')
    <div class="panel-body">
        <form action="{{ route('alumno.update',$alumno->idalumno) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">

                <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                    <div class="form-group">
                        <label for="nombre">NOMBRE</label>
                        <input type="text" name="nombre" value="{{$alumno->Nombre}}" class="form-control">
                    </div>
                </div>
                <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                    <div class="form-group">
                        <label for="apellido">APELLIDO</label>
                        <input type="text" name="apellido" value="{{$alumno->Apellido}}" class="form-control">
                    </div>
                </div>
                <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                    <div class="form-group">
                        <label for="telefono">TELEFONO</label>
                        <input type="text" name="telefono" value="{{$alumno->Telefono}}" class="form-control">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="table-responsive">
                    </div>
                </div>
            </div>
            <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                <div class="form-group">
                    <button class="btn btn-default" type="submit"><span class=" fa fa-check"></span> GUARDAR</button>
                    <a href="{{ route('alumno.index') }}">
                        <button class="btn btn-default" type="button"><span class="  fa fa-remove"></span> CANCELAR
                        </button>
                    </a>
                </div>
            </div>
        </form>
    </div>
@endsection
