<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Nota;
use Illuminate\Http\Request;

class NotasController extends Controller
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
            $notas = Nota::where('estudiante_id', 'LIKE', "%$keyword%")
                ->orWhere('curso_id', 'LIKE', "%$keyword%")
                ->orWhere('nota1', 'LIKE', "%$keyword%")
                ->orWhere('nota2', 'LIKE', "%$keyword%")
                ->orWhere('nota3', 'LIKE', "%$keyword%")
                ->orWhere('notafinal', 'LIKE', "%$keyword%")
                ->orWhere('descripcion', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $notas = Nota::latest()->paginate($perPage);
        }
        $nots=Nota::join('estudiantes','notas.estudiante_id','=','estudiantes.id')
                  ->join('cursos','notas.curso_id','=','cursos.id')
                  ->select(
                    'estudiantes.nombre as nombre',
                    'cursos.nombre as curso',
                    'notas.nota1',
                    'notas.nota2',
                    'notas.nota3',
                    'notas.notafinal',
                    'notas.descripcion',
                    )
                    ->get();
        return view('notas.index',["notas"=>$nots] ,compact('notas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('notas.create');
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
        
        Nota::create($requestData);

        return redirect('notas')->with('flash_message', 'Nota added!');
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
        $nota = Nota::findOrFail($id);

        return view('notas.show', compact('nota'));
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
        $nota = Nota::findOrFail($id);

        return view('notas.edit', compact('nota'));
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
        
        $nota = Nota::findOrFail($id);
        $nota->update($requestData);

        return redirect('notas')->with('flash_message', 'Nota updated!');
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
        Nota::destroy($id);

        return redirect('notas')->with('flash_message', 'Nota deleted!');
    }
}
