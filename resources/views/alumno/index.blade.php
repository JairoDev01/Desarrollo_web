{{--@extends('layouts.layout')
@section('content')


@endsection--}}


    <!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" />

    <!-- Styles -->
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }
    </style>
</head>
<body>
<div class="flex-center position-ref full-height">
    @if (Route::has('login'))
        <div class="top-right links">
            @auth
                <a href="{{ url('/home') }}">Home</a>
            @else
                <a href="{{ route('login') }}">Login</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}">Register</a>
                @endif
            @endauth
        </div>
    @endif

    <div class="content">
        <div class="title m-b-md">
            DESARROLLO WEB 2020
        </div>
        <button type="submit" class="btn btn-primary">NUEVO</button>
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

                        </tr>
                        </thead>
                        <tbody>
                        @foreach($alumno as $key)
                            <tr>
                                <td><input name="id_item" value="{{$key->idalumno}}" type="radio"></td>
                                <td>{{$key->idalumno}}</td>
                                <td>{{$key->Nombre}}</td>
                                <td>{{$key->Apellido}}</td>
                                <td>{{$key->Telefono}}</td>

                            </tr>
                            {{--@component('componentes.alert-delete',
                            ['model'=>'Alumno',
                            'id'=>$rol->idalumno,
                            'method'=>'AlumnoController@destroy',
                            'extras'=>$rol->Nombre,
                            'description'=>$rol->Nombre,
                            'url'=>url('alumno')."/".$rol->idalumno])
                            @endcomponent--}}
                        @endforeach

                        </tbody>

                    </table>

                </div>
                {{--@include('componentes.pagination',['pagination'=>$alumno])--}}
            </div>

        </div>
    </div>
</div>
</body>
</html>




