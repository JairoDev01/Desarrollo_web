@extends('layouts.layout')
@section('content')
    <a href="{{ route('alumno.create')}}" class="btn btn-primary">
        NUEVO
    </a>
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">

            <div class="table-responsive">

                <table class="table table-striped table-bordered table-condensed table-hover">

                    <thead style="background-color: #01579B;  color: #fff;">
                    <tr>
                        <th>

                        </th>
                        <th>
                            ID ALUMNO
                        </th>
                        <th>
                            NOMBRE
                        </th>
                        <th>
                            APELLIDO
                        </th>
                        <th>
                            TELEFONO
                        </th>
                        <th colspan="2">ACCIÓN</th>

                    </tr>
                    </thead>
                    <tbody style="color: black;">
                    @foreach($alumno as $key)
                        <tr>
                            <td><input name="id_item" value="{{$key->idalumno}}" type="radio"></td>
                            <td>{{$key->idalumno}}</td>
                            <td>{{$key->Nombre}}</td>
                            <td>{{$key->Apellido}}</td>
                            <td>{{$key->Telefono}}</td>
                            <td><a href="{{ route('alumno.edit',$key->idalumno)}}" class="btn btn-info">EDITAR</a>
                            </td>
                            <td>
                                 <form action="{{ route('alumno.destroy', $key->idalumno)}}" method="POST">
                                     {{ csrf_field() }}
                                     @method('POST')
                                     <button class="btn btn-danger" type="submit">ELIMINAR</button>
                                 </form>
                             </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            {{--@include('componentes.pagination',['pagination'=>$alumno])--}}
        </div>

    </div>
@endsection
