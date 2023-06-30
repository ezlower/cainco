<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use DB;
use App\Curso;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\BD;

class CursosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function listall()
    {
        $curso = DB::table('cursos')
            ->Join('periodos', 'periodos.id', '=', 'cursos.periodo_id')
            ->select('periodos.nombre')
            ->get();
           // dd($curso);
        return view('cursos.index', compact('cursos'));
    }

    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $cursos = Curso::where('nombre', 'LIKE', "%$keyword%")
                ->orWhere('descripcion', 'LIKE', "%$keyword%")
                ->orWhere('periodo_id', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $cursos = Curso::latest()->paginate($perPage);
        }
        
        $cruss=Curso::join('periodos','cursos.periodo_id','=','periodos.id')
        ->select(
            'cursos.id',
            'periodos.nombre as periodo',
            'cursos.nombre as materia',
            'cursos.descripcion'

        )
        ->get();
        return view('cursos.index', ["cursos"=>$cruss],compact('cursos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('cursos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        
        $campos=[
            
            'nombre'=>'required|string|max:50',
            //'descripcion'=>'required|string|max:100',
           // 'cedula'=>'required|string|max:50',
            'periodo_id '=>'required|string|max:100'
            
        ];
        $Mensaje=["required"=>':attribute es requerido'];

        $this->validate($request,$campos,$Mensaje);
        $datosEstudiante=request()->except('_token');



        $requestData = $request->all();
        
        Curso::create($requestData);

        return redirect('cursos')->with('flash_message', 'Curso added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $curso = Curso::findOrFail($id);
        
        return view('cursos.show', compact('curso'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $curso = Curso::findOrFail($id);

        return view('cursos.edit', compact('curso'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        
        $requestData = $request->all();
        
        $curso = Curso::findOrFail($id);
        $curso->update($requestData);

        return redirect('cursos')->with('flash_message', 'Curso updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        Curso::destroy($id);

        return redirect('cursos')->with('flash_message', 'Curso deleted!');
    }
    public function setSession(Request $request)
    {
         $request->session()->put('id',$request->id);
         return response()->json(["Sesion"=>"Asignado"]);
    }

}
