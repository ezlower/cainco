<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use DB;
use App\Rango;
use Illuminate\Http\Request;

class RangosController extends Controller
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
            $rangos = Rango::where('nombre', 'LIKE', "%$keyword%")
                ->orWhere('duracion', 'LIKE', "%$keyword%")
                ->orWhere('fecha_inicio', 'LIKE', "%$keyword%")
                ->orWhere('fecha_final', 'LIKE', "%$keyword%")
                ->orWhere('periodo_id', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $rangos = Rango::latest()->paginate($perPage);
        }

        $rangs=Rango::join('periodos','rangos.periodo_id','=','periodos.id')
        ->select(
                        'rangos.id',
                        'periodos.nombre as name',
                        'rangos.nombre',
                        'rangos.duracion',
                        'rangos.fecha_inicio',
                        'rangos.fecha_final'
                )
        ->get();
        
        return view('rangos.index',["rangos"=>$rangs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('rangos.create');
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
        
        Rango::create($requestData);

        return redirect('rangos')->with('flash_message', 'Rango added!');
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
        $rango = Rango::findOrFail($id);

        return view('rangos.show', compact('rango'));
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
        $rango = Rango::findOrFail($id);

        return view('rangos.edit', compact('rango'));
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
        
        $rango = Rango::findOrFail($id);
        $rango->update($requestData);

        return redirect('rangos')->with('flash_message', 'Rango updated!');
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
        Rango::destroy($id);

        return redirect('rangos')->with('flash_message', 'Rango deleted!');
    }
}
