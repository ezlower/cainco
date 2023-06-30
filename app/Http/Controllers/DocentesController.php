<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Docente;
use Illuminate\Http\Request;

class DocentesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $docentes = Docente::all()->where('estado', 'A');
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $docentes = Docente::where('nombre', 'LIKE', "%$keyword%")
                ->orWhere('paterno', 'LIKE', "%$keyword%")
                ->orWhere('materno', 'LIKE', "%$keyword%")
                ->orWhere('cedula', 'LIKE', "%$keyword%")
                ->orWhere('curso_id', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $docentes = Docente::latest()->paginate($perPage);
        }
        $docents=Docente::join('cursos','docentes.curso_id','=','cursos.id')
        ->select(
            'docentes.id',
            'docentes.nombre',
            'docentes.paterno',
            'docentes.materno',
            'docentes.cedula',
            'cursos.nombre as curso'
        )
        ->get();
        return view('docentes.index', ["docentes"=>$docents],compact('docentes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('docentes.create');
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
            'paterno'=>'required|string|max:100',
            'cedula'=>'required|string|max:50'
            
            
        ];
        $Mensaje=["required"=>':El atributo es requerido'];

        $this->validate($request,$campos,$Mensaje);
        $datosDocente=request()->except('_token');


        Docente::insert($datosDocente);

        $requestData = $request->all();
        
        Docente::create($requestData);

        return redirect('docentes')->with('flash_message', 'Docente added!');
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
        $docente = Docente::findOrFail($id);

        return view('docentes.show', compact('docente'));
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
        $docente = Docente::findOrFail($id);

        return view('docentes.edit', compact('docente'));
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
        
        $docente = Docente::findOrFail($id);
        $docente->update($requestData);

        return redirect('docentes')->with('flash_message', 'Docente updated!');
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
        //$docente=Docente::where('id',$id)->firstOrFail();
        //$docente->estado = 'X';
        //$docente->save();

        //return redirect('docentes')->with('flash_message', 'El estudiante fue eliminado!');
        Docente::destroy($id);

        return redirect('Docente')->with('flash_message', 'Docente deleted!');
    }
}
