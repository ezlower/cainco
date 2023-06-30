@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Matriculas</div>
                    <div class="card-body">
                        <a href="{{ url('/matriculas/create') }}" class="btn btn-success btn-sm" title="Add New Matricula">
                            <i class="fa fa-plus" aria-hidden="true"></i> Nueva Matricula
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
                                        <th>Sexo</th>
                                        <th>Estado Civil</th>
                                       
                                        <th>Telefono</th>
                                        <th>Actiones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($matriculas as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{$item->nombre}}</td>
                                        <td>{{ $item->cedula }}</td>
                                        <td>{{ $item->sexo }}</td>
                                        <td>{{ $item->estadocivil }}</td>
                                        
                                        <td>{{$item->telefono}}</td>
                                        <td>
                                            
                                            <a href="{{ url('/matriculas/' . $item->id . '/edit') }}" title="Edit Matricula"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</button></a>

                                            <form method="POST" action="{{ url('/matriculas' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Matricula" onclick="return confirm(&quot;Seguro de Eliminar?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Elminar</button>
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
