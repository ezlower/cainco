<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Barryvdh\DomPDF\Facade as PDF;
use App\Estudiante;
use Illuminate\Http\Request;

class EstudiantesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function exportPdf()
    {
        $estudiantes=Estudiante::get();
        $pdf = PDF::loadView('pdf.estudiantes',compact('estudiantes'));
        return $pdf->downLoad('user-list.pdf');
    }
    public function index(Request $request)
    {
        $estudiantes = Estudiante::all()->where('estado', 'A');
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $estudiantes = Estudiante::where('nombre', 'LIKE', "%$keyword%")
                ->orWhere('paterno', 'LIKE', "%$keyword%")
                ->orWhere('materno', 'LIKE', "%$keyword%")
                ->orWhere('direccion', 'LIKE', "%$keyword%")
                ->orWhere('email', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $estudiantes = Estudiante::latest()->paginate($perPage);
        }
        
        return view('estudiantes.index', compact('estudiantes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('estudiantes.create');
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
            'direccion'=>'required|string|max:50',
            'email'=>'required|string|max:100'
            
        ];
        $Mensaje=["required"=>':attribute es requerido'];

        $this->validate($request,$campos,$Mensaje);

        
   
        

        $datosEstudiante=request()->except('_token');
        Estudiante::insert($datosEstudiante);
        $requestData = $request->all();
        
        Estudiante::create($requestData);

        return redirect('estudiantes')->with('flash_message', 'Estudiante agregado!');
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
        $estudiante = Estudiante::findOrFail($id);
       
        return view('estudiantes.show', compact('estudiante'));
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
        $estudiante = Estudiante::findOrFail($id);

        return view('estudiantes.edit', compact('estudiante'));
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
        
        $estudiante = Estudiante::findOrFail($id);
        $estudiante->update($requestData);

        return redirect('estudiantes')->with('flash_message', 'Estudiante updated!');
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
        $estudiante=Estudiante::where('id',$id)->firstOrFail();
        $estudiante->estado = 'X';
        $estudiante->save();

        return redirect('estudiantes')->with('flash_message', 'Student was deleted!');
    }
    
}
