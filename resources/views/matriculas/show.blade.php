@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
     

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Matricula {{ $matricula->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/matriculas') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/matriculas/' . $matricula->id . '/edit') }}" title="Edit Matricula"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="{{ url('matriculas' . '/' . $matricula->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Matricula" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $matricula->id }}</td>
                                    </tr>
                                    <tr><th> Cedula </th><td> {{ $matricula->cedula }} </td></tr>
                                    <tr><th> Sexo </th><td> {{ $matricula->sexo }} </td></tr>
                                    <tr><th> Estadocivil </th><td> {{ $matricula->estadocivil }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
