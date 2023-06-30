@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
          

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Periodos</div>
                    <div class="card-body">
                        <a href="{{ url('/periodos/create') }}" class="btn btn-success btn-sm" title="Add New Periodo">
                            <i class="fa fa-plus" aria-hidden="true"></i> Nuevo Periodo
                        </a>

                        

                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nombre</th>
                                        <th>Duracion</th>
                                        <th>Año</th>
                                        <th>Descripcion</th>
                                        <th>Actiones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($periodos as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->nombre }}</td>
                                        <td>{{ $item->duracion }} semanas</td>
                                        <td>{{ $item->año }}</td>
                                        <td>{{$item->descripcion}}</td>
                                        <td>
                                            
                                            <a href="{{ url('/periodos/' . $item->id . '/edit') }}" title="Edit Periodo"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</button></a>

                                            <form method="POST" action="{{ url('/periodos' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                               
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Periodo" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Eliminar</button>
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
