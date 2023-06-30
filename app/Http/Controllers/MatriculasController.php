<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use DB;
use App\Matricula;
use Illuminate\Http\Request;

class MatriculasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $matriculas = Matricula::where('cedula', 'LIKE', "%$keyword%")
                ->orWhere('sexo', 'LIKE', "%$keyword%")
                ->orWhere('estadocivil', 'LIKE', "%$keyword%")
                ->orWhere('fechanacimiento', 'LIKE', "%$keyword%")
                ->orWhere('telefono', 'LIKE', "%$keyword%")
                ->orWhere('estudiante_id', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        
        
                
                
        
            } else {
            $matriculas = Matricula::latest()->paginate($perPage);
        }
        //dd($matriculas);
        
        $matriculs=Matricula::join('estudiantes','matriculas.estudiante_id','=','estudiantes.id')
                ->select(
                        'matriculas.id',
                        'estudiantes.nombre as nombre',
                        'matriculas.cedula',
                        'matriculas.sexo',
                        'matriculas.estadocivil',
                        'matriculas.fechanacimiento',
                        'matriculas.telefono'
                         )
                ->get();

        //return view('matriculas.index', compact('matriculs'));
        return view('matriculas.index', ["matriculas"=>$matriculs], compact('matriculas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('matriculas.create');
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
        
        $requestData = $request->all();
        
        Matricula::create($requestData);

        return redirect('matriculas')->with('flash_message', 'Matricula added!');
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
        $matricula = Matricula::findOrFail($id);

        return view('matriculas.show', compact('matricula'));
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
        $matricula = Matricula::findOrFail($id);

        return view('matriculas.edit', compact('matricula'));
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
        
        $matricula = Matricula::findOrFail($id);
        $matricula->update($requestData);

        return redirect('matriculas')->with('flash_message', 'Matricula updated!');
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
        Matricula::destroy($id);

        return redirect('matriculas')->with('flash_message', 'Matricula deleted!');
    }
}
