@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
          
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Rangos</div>
                    <div class="card-body">
                        <a href="{{ url('/rangos/create') }}" class="btn btn-success btn-sm" title="Add New Rango">
                            <i class="fa fa-plus" aria-hidden="true"></i> Nuevo Rango
                        </a>


                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Periodo</th>
                                        <th>Nombre</th>
                                        <th>Duracion</th>
                                        <th>Inicio</th>
                                        <th>Final</th>

                                        <th>Actiones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($rangos as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->nombre }}</td>
                                        <td>{{ $item->duracion }} semanas</td>
                                        <td>{{ $item->fecha_inicio }}</td>
                                        <td>{{ $item->fecha_final}}</td>
                                        <td>
                                            
                                            <a href="{{ url('/rangos/' . $item->id . '/edit') }}" title="Edit Rango"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</button></a>

                                            <form method="POST" action="{{ url('/rangos' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                               
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Rango" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Eliminar</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            
                            
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
