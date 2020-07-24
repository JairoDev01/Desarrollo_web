<?php

namespace App\Http\Controllers;

use App\Empleado;
use App\PuntoAcceso;
use Illuminate\Http\Request;

class AlumnoController extends Controller
{
    public function __construct()
    {

        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->get('search') == null ? '' : $request->get('search');
        $sort = $request->get('sort') == null ? 'desc' : ($request->get('sort'));
        $sortField = $request->get('field') == null ? 'nombre' : $request->get('field');

        $filtros = ['codigo_interno', 'nombre', 'apellido', 'dpi', 'descripcion', 'celular'];
        $empleado = Empleado::join('tb_puntos_acceso', 'tb_puntos_acceso.id_accesso', '=', 'tb_empleado.id_punto_acceso')
            ->select('tb_empleado.*', 'tb_puntos_acceso.descripcion as descripcion')
            ->actived()
            ->whereLike($filtros, $search)
            ->orderBy($sortField, $sort)
            ->paginate(20);

        if ($request->ajax()) {
            return view('registro.empleado.index',
                [
                    'search' => $search,
                    'sort' => $sort,
                    'sortField' => $sortField,
                    'empleado' => $empleado
                ]
            );
        } else {
            return view('registro.empleado.ajax',
                [
                    'search' => $search,
                    'sort' => $sort,
                    'sortField' => $sortField,
                    'empleado' => $empleado
                ]
            );
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $acceso = PuntoAcceso::actived()->get();
        return view('registro.empleado.create',
            [
                'acceso' => $acceso
            ]
        );

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        //
        $empleado = new Empleado();
        $empleado->codigo_interno = $request->get('codigo_interno');
        $empleado->nombre = $request->get('nombre');
        $empleado->apellido = $request->get('apellido');
        $empleado->dpi = $request->get('dpi');
        $empleado->fecha_nacimiento = $request->get('fecha_nacimiento');
        $empleado->correo = $request->get('correo');
        $empleado->direccion = $request->get('direccion');
        $empleado->id_punto_acceso = $request->get('id_punto_acceso');
        $empleado->celular = $request->get('celular');
        $empleado->save();

        return redirect()
            ->route('empleado.index')
            ->with('success', 'Empleado creado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {

            $empleado = Empleado::findOrFail($id);


            return view('registro.empleado.show',
                [
                    'empleado' => $empleado
                ]
            );


        } catch (\Exception $ex) {


            return redirect()->route('empleado.index')
                ->with('error', 'En este momento no es posible procesar su petición');

        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //


        $empleado = Empleado::findOrFail($id);

        $acceso = PuntoAcceso::actived()->get();

        return view('registro.empleado.edit', [
            'empleado' => $empleado,
            'acceso' => $acceso
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //

        try {
            $empleado = Empleado::findOrFail($id);
            $empleado->codigo_interno = $request->get('codigo_interno');
            $empleado->nombre = $request->get('nombre');
            $empleado->apellido = $request->get('apellido');
            $empleado->dpi = $request->get('dpi');
            $empleado->fecha_nacimiento = $request->get('fecha_nacimiento');
            $empleado->correo = $request->get('correo');
            $empleado->direccion = $request->get('direccion');
            $empleado->id_punto_acceso = $request->get('id_punto_acceso');
            $empleado->celular = $request->get('celular');
            $empleado->update();

            return redirect()
                ->route('empleado.index')
                ->with('success', 'Empleado actualizado correctamente');
        } catch (\Exception $ex) {

            return redirect()
                ->back()
                ->withErrors(['Error al actualizar empleado']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        try {

            $empleado = Empleado::findOrFail($id);
            $empleado->estado = 0;
            $empleado->update();
            return response()->json(
                ['success' => 'Empleado dado de baja correctamente']
            );

        } catch (\Exception $ex) {

            return response()->json(
                ['error' => 'En este momento no es posible procesar su petición',
                    'mensaje' => $ex->getMessage()
                ]
            );

        }

    }


    /**
     * @param Request $request
     * @return
     */
    public function search(Request $request)
    {

        $search = $request->get('search') == null ? '' : $request->get('search');
        $sort = $request->get('sort') == null ? 'asc' : ($request->get('sort'));
        $sortField = $request->get('field') == null ? 'nombre' : $request->get('field');

        $filtros = ['codigo_interno', 'nombre', 'apellido'];
        $empleados = Empleado::select('id_empleado', 'codigo_interno', 'nombre', 'apellido')
            ->actived()
            ->whereLike($filtros, $search)
            ->orderBy($sortField, $sort)
            ->paginate(20);


        return $empleados;


    }
}
