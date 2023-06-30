@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
          
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Curso {{ $curso->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/cursos') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/cursos/' . $curso->id . '/edit') }}" title="Edit Curso"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="{{ url('cursos' . '/' . $curso->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Curso" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $curso->id }}</td>
                                    </tr>
                                    <tr><th> Nombre </th><td> {{ $curso->nombre }} </td></tr><tr><th> Descripcion </th><td> {{ $curso->descripcion }} </td></tr><tr><th> Periodo Id </th><td> {{ $curso->periodo_id }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
