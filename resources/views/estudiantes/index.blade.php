@extends('layouts.admin')


@section('content')
    <div class="container">
        <div class="row">
        

            <div class="col-md-12">
                
                <div class="card">
                    <div class="card-header">Estudiantes</div>
                    <div class="card-body">
                        <a href="{{ url('/estudiantes/create') }}" class="btn btn-success btn-sm" title="Add New Estudiante">
                            <i class="fa fa-plus" aria-hidden="true"></i> Nuevo Estudiante
                        </a>
                        
                        <a href="{{ route('estudiantes.pdf')}}" class="btn btn-secondary">
                            <i class="fa fa-plus" aria-hidden="true"></i>
                            Exportar como PDF</a>

                        <form method="GET" action="{{ url('/estudiantes') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
            
                            <div class="input-group">
               
                                <input type="text" class="form-control" name="search" placeholder="Search..." value="{{ request('search') }}">
                 
                                <span class="input-group-append">
                     
                                    <button class="btn btn-secondary" type="submit">
                        
                                        <i class="fa fa-search"></i>
                       
                                    </button>
                   
                                </span>
               
                            </div>
           
                        </form>
            
                        <br/>
                        <br/>
         
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nombre Completo</th>
                                        
                                        <th>Direccion</th>
                                        <th>Correo Electronico</th>
                                        <th>Estado</th>
                                        <th>Actiones</th>
                                    </tr>
                                </thead>

                                <tbody>
                                @foreach($estudiantes as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->nombre }} {{ $item->paterno }} {{ $item->materno }}</td>
                                        
                                        <td>{{ $item->direccion }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ $item->estado }}</td>
                                        <td>
                                          
                                            <a href="{{ url('/estudiantes/' . $item->id . '/edit') }}" title="Edit Estudiante"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</button></a>

                                            <form method="POST" action="{{ url('/estudiantes' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Estudiante" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Eliminar</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $estudiantes->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
