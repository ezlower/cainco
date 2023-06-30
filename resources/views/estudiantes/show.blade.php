@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
           

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Estudiante {{ $estudiante->id  }}</div>
                    <div class="card-body">

                        <a href="{{ url('/estudiantes') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/estudiantes/' . $estudiante->id . '/edit') }}" title="Edit Estudiante"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="{{ url('estudiantes' . '/' . $estudiante->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Estudiante" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $estudiante->id }}</td>
                                    </tr>
                                    <tr><th> Nombre </th><td> {{ $estudiante->nombre }} </td></tr>
                                    <tr><th> Paterno </th><td> {{ $estudiante->paterno }} </td></tr>
                                    <tr><th> Materno </th><td> {{ $estudiante->materno }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
