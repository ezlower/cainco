@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Notas</div>
                    <div class="card-body">
                        <a href="{{ url('/notas/create') }}" class="btn btn-success btn-sm" title="Add New Nota">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>

                      

                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Estudiante</th>
                                        <th>Curso </th>
                                        <th>Nota 1</th>
                                        <th>Nota 2</th>
                                        <th>Nota 3</th>
                                        <th>Promedio Final</th>
                                        <th>Descripcion</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($notas as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->nombre }}</td>
                                        <td>{{ $item->curso }}</td>
                                        <td>{{ $item->nota1 }}</td>
                                        <td>{{ $item->nota2 }}</td>
                                        <td>{{ $item->nota3 }}</td>
                                        <td>{{ $item->notafinal }}</td>
                                        <td>{{ $item->descripcion }}</td>
                                        <td>
                                            
                                            <a href="{{ url('/notas/' . $item->id . '/edit') }}" title="Edit Nota"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                                            <form method="POST" action="{{ url('/notas' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                              
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Nota" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
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
