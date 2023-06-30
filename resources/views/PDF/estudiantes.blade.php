@
<!DOCTYPE html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <style>
    body{
      font-family: sans-serif;
    }
    @page {
      margin: 160px 50px;
    }
    header { position: fixed;
      left: 0px;
      top: -160px;
      right: 0px;
      height: 100px;
      background-color: #ddd;
      text-align: center;
    }
    header h1{
      margin: 10px 0;
    }
    header h2{
      margin: 0 0 10px 0;
    }
    footer {
      position: fixed;
      left: 0px;
      bottom: -50px;
      right: 0px;
      height: 40px;
      border-bottom: 2px solid #ddd;
    }
    footer .page:after {
      content: counter(page);
    }
    footer table {
      width: 100%;
    }
    footer p {
      text-align: right;
    }
    footer .izq {
      text-align: left;
    }
    .table{
        width: 100%;
        border 2px;
        text-align: center;
    }
  </style>
  
<body>
  <table class="table">
      <thead>
            <tr>
                <th>ID</th>
                <th>Nombre Completo</th>
                <th>Direccion</th>
                <th>Correo Eletronico </th>
            </tr>
      </thead>
      <tbody>
          @foreach ($estudiantes as $item)
            <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->nombre}} {{$item->paterno}} {{$item->materno}}</td>
                <td>{{$item->direccion}}</td>
                <td>{{$item->email}}</td>
            </tr>
          @endforeach
      </tbody>
  </table>
  
 
</body>
</html>