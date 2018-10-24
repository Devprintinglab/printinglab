<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title></title>
</head>
<style media="screen">
.container {width: 80%;padding-right: 15px;padding-left: 15px;margin-right: auto;margin-left: auto;}
.center{text-align: center;}
</style>
<body>
  <div class="container">
    <h1 class="center">Request for Vehicle Graphics</h1>
    <strong>Client: </strong> {{$datos['nombre']}} <br>
    <strong>Company: </strong> {{$datos['compania']}}<br>
    <strong>Phone: </strong> {{$datos['telefono']}}<br>
    <strong>Email client: </strong> {{$datos['email']}}<br>
    <strong>Type of Vehicle: </strong> {{$datos['product']}}<br>
    <strong>Option: </strong><br>
    <ul>
      @foreach ($datos['select_option'] as $dato )
        @if(is_null($dato))
        @else
          <li>{{$dato}}</li>
        @endif
      @endforeach
    </ul>
    <strong>Comment: </strong>
    <p>{{$datos['comentario']}}</p>
  </div>
</body>
</html>
