@component('componentes.search',[
'search'=>$search,
  'sort'=>$sort,
 'sortField'=>$sortField,
])
    @slot('modulo')
        Empleado
    @endslot
@endcomponent
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">

        <div class="table-responsive">

            <table class="table table-striped table-bordered table-condensed table-hover">

                <thead style="background-color: #01579B;  color: #fff;">
                <tr>
                    <th>

                    </th>
                    <th>
                        @component('componentes.column-sort',['modulo'=>'empleado',
                        'search'=>$search,
                    'sort'=>$sort,
                    'sortField'=>$sortField,
                    'field'=>'codigo_interno',
                    'titulo'=>'CODIGO'])
                        @endcomponent
                    </th>
                    <th>
                        @component('componentes.column-sort',['modulo'=>'empleado',
                        'search'=>$search,
                    'sort'=>$sort,
                    'sortField'=>$sortField,
                    'field'=>'nombre',
                    'titulo'=>'nombre'])
                        @endcomponent
                    </th>
                    <th>
                        @component('componentes.column-sort',['modulo'=>'empleado',
                        'search'=>$search,
                        'sort'=>$sort,
                        'sortField'=>$sortField,
                        'field'=>'apellido',
                        'titulo'=>'apellido'])
                        @endcomponent
                    </th>
                    <th>
                        @component('componentes.column-sort',['modulo'=>'empleado',
                        'search'=>$search,
                        'sort'=>$sort,
                        'sortField'=>$sortField,
                        'field'=>'dpi',
                        'titulo'=>'dpi'])
                        @endcomponent
                    </th>
                    <th>
                        @component('componentes.column-sort',['modulo'=>'empleado',
                        'search'=>$search,
                        'sort'=>$sort,
                        'sortField'=>$sortField,
                        'field'=>'descripcion',
                        'titulo'=>'Punto de Acceso'])
                        @endcomponent
                    </th>
                    <th>
                        @component('componentes.column-sort',['modulo'=>'empleado',
                        'search'=>$search,
                        'sort'=>$sort,
                        'sortField'=>$sortField,
                        'field'=>'celular',
                        'titulo'=>'celular'])
                        @endcomponent
                    </th>
                    <th>
                        @component('componentes.column-sort',['modulo'=>'empleado',
                        'search'=>$search,
                        'sort'=>$sort,
                        'sortField'=>$sortField,
                        'field'=>'estado',
                        'titulo'=>'estado'])
                        @endcomponent
                    </th>

                </tr>
                </thead>
                <tbody>
                @foreach($empleado as $key => $rol)
                    <tr>
                        <td><input name="id_item" value="{{$rol->id_empleado}}" type="radio"></td>
                        <td>{{$rol->codigo_interno}}</td>
                        <td>{{$rol->nombre}}</td>
                        <td>{{$rol->apellido}}</td>
                        <td>{{$rol->dpi}}</td>
                        <td>{{$rol->descripcion}}</td>
                        <td>{{$rol->celular}}</td>
                        <td>
                            @if($rol->estado == 1)
                                <span class="label label-success">Activo</span>
                            @else
                                <span class="label label-danger">De baja</span>
                            @endif
                        </td>
                    </tr>
                    @component('componentes.alert-delete',
                    ['model'=>'EMPLEADO',
                    'id'=>$rol->id_empleado,
                    'method'=>'EmpleadoController@destroy',
                    'extras'=>$rol->nombre,
                    'description'=>$rol->nombre,
                    'url'=>url('empleado')."/".$rol->id_empleado])
                    @endcomponent
                @endforeach

                </tbody>

            </table>

        </div>
        @include('componentes.pagination',['pagination'=>$empleado])
    </div>

</div>
