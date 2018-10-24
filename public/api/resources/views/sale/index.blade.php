@extends('layouts.app')
@section('title')
Sales - Printing Lab
@endsection
@section('content')

<div class="container textoscontainer">
  <div class="col-md-12">
    <h2><strong>SALES</strong></h2>
  </div>
  <!-- <div class="container">
  <div class="row">
  <div class="form-group">
  <input type="date" name="bday" class="form-control">
</div>
<div class="form-group">
<input type="date" name="bday"  class="form-control">
</div>
</div>
</div> -->
<table class="table table-striped">
  <thead>
    <tr class="center">
      <th scope="col">ID</th>
      <th scope="col">DATE</th>
      <th scope="col">NAME</th>
      <th scope="col">PHONE</th>
      <th scope="col">EMAIL</th>
      <th scope="col">ORDER</th>
      <th scope="col">VIEW DETAILS</th>
    </tr>
  </thead>
  <tbody class="center">
    @foreach($result as $respuesta)
    <tr>
      <td>{{$respuesta->id_compras}}</td>
      <td>{{$respuesta->date}}</td>
      <td>{{$respuesta->name}}</td>
      <td>{{$respuesta->phone}}</td>
      <td>{{$respuesta->email}}</td>
      <td>{{$respuesta->numero_venta}}</td>
      <td>
        <a href="{{route('sales.details',['id'=>$respuesta->id_compras])}}"><i class="far fa-eye"></i></a>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
{{ $result->links() }}
</div>
@endsection
