@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
         
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Empleado</div>
                    <div class="card-body">
                        <a href="{{ url('/docentes/create') }}" class="btn btn-success btn-sm" title="Add New Docente">
                            <i class="fa fa-plus" aria-hidden="true"></i> Nuevo Empleado
                        </a>


                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nombre</th>
                                        
                                        <th>Cedula</th>
                                        <th>Cargo Asignado</th>
                                        
                                        <th>Actiones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($docentes as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->nombre }} {{ $item->paterno }} {{ $item->materno }}</td>
                                        
                                        <td>{{ $item->cedula }}</td>
                                        <td>{{ $item->curso }}</td>
                                        
                                        <td>
                                           
                                            <a href="{{ url('/docentes/' . $item->id . '/edit') }}" title="Edit Docente"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</button></a>

                                            <form method="POST" action="{{ url('/docentes' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Docente" onclick="return confirm(&quot; Seguro de Eliminar?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Eliminar</button>
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
