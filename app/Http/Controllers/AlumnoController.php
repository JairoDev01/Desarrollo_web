<?php

namespace App\Http\Controllers;

use App\Alumno;
use Illuminate\Http\Request;

class AlumnoController extends Controller
{
    /*public function __construct()
    {

        $this->middleware('auth');
    }*/

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory
     */
    public function index()
    {
        $alumno = Alumno::all();
        //dd($alumno);
        return view('alumno.index',compact('alumno'));
        /*if ($request->ajax()) {
            return view('alumno.index',
                [
                    'alumno' => $alumno
                ]
            );
        } else {
            return view('alumno.ajax',
                [
                    'alumno' => $alumno
                ]
            );
        }*/
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function create()
    {
        //
        //$acceso = Alumno::get();
        return view('alumno.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        //

        $alumno = new Alumno();
        $alumno->Nombre = $request->get('nombre');
        $alumno->Apellido = $request->get('apellido');
        $alumno->Telefono = $request->get('telefono');
        $alumno->save();

        return redirect()
            ->route('alumno.index')
            ->with('success', 'Alumno creado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function show($id)
    {
        try {

            $empleado = Alumno::findOrFail($id);


            return view('alumno.show',
                [
                    'empleado' => $empleado
                ]
            );


        } catch (\Exception $ex) {

            return redirect()->route('alumno.index')
                ->with('error', 'En este momento no es posible procesar su petición');

        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function edit($id)
    {
        //


        $empleado = Alumno::findOrFail($id);

        return view('alumno.edit', [
            'empleado' => $empleado
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //

        try {
            $alumno = Alumno::findOrFail($id);
            $alumno->Nombre = $request->get('nombre');
            $alumno->Apellido = $request->get('apellido');
            $alumno->Telefono = $request->get('telefono');
            $alumno->update();

            return redirect()
                ->route('alumno.index')
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
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        try {

            $empleado = Alumno::findOrFail($id);
            $empleado->delete();
            return response()->json(
                ['success' => 'Alumno dado de baja correctamente']
            );

        } catch (\Exception $ex) {

            return response()->json(
                ['error' => 'En este momento no es posible procesar su petición',
                    'mensaje' => $ex->getMessage()
                ]
            );

        }

    }
}
