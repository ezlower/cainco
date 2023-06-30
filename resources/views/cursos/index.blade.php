@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
         

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"></div>
                    <div class="card-body">
                        <a href="{{ url('/cursos/create') }}" class="btn btn-success btn-sm" title="Add New Curso">
                            <i class="fa fa-plus" aria-hidden="true"></i> Nuevo Cargo
                        </a>

                       

                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Periodo</th>
                                        <th>Cargo</th>
                                        <th>Descripcion</th>
                                        <th>Actiones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($cursos as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->periodo }}</td>
                                        <td>{{ $item->materia }}</td>
                                        <td>{{ $item->descripcion }}</td>
                                        
                                        <td>
                                        
                                            <a href="{{ url('/cursos/' . $item->id . '/edit') }}" title="Edit Matricula"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</button></a>

                                            <form method="POST" action="{{ url('/cursos' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Curso" onclick="return confirm(&quot;Estas Seguro de Eliminar?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Eliminar</button>
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
