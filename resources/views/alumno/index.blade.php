
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
                @foreach($alumno as $key => $rol)
                    <tr>
                        <td><input name="id_item" value="{{$rol->idalumno}}" type="radio"></td>
                        <td>{{$rol->Nombre}}</td>
                        <td>{{$rol->Apellido}}</td>
                        <td>{{$rol->Telefono}}</td>

                    </tr>
                   {{-- @component('componentes.alert-delete',
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
        @include('componentes.pagination',['pagination'=>$alumno])
    </div>

</div>
