@extends('layouts.app')
@section('title')
Sales - Printing Lab
@endsection
@section('content')
<div class="container textoscontainer">
  <div class="col-md-12">
    <h2><strong>SALE DETAILS</strong></h2>
  </div>
  @if (session('error'))
  <div class="alert alert-danger">
    {{ session('error') }}
  </div>
  @endif
  <table class="table">
    <thead class="thead_sales">
      <tr class="center">
        <td class="tbl_sales_1"><strong>PRODUCT DETAILS</strong></td>
        <td class="tbl_sales_2"><strong>QUANTITY</strong></td>
        <td class="tbl_sales_3"><strong>ORDER</strong></td>
        <td class="tbl_sales_4"><strong>FILES</strong></td>
        <td class="tbl_sales_5"><strong>TOTAL</strong></td>
      </tr>
    </thead>
    <tbody class="tbody_sales">
      @foreach($result as $respuesta)
      <tr>
        <td>
          <div class="row">
            <div class="col-md-3">
              <img class="product_car" src="upload-products/products/{{$respuesta->img1}}" alt="">
            </div>
            <div class="col-md-8">
              <h5><strong>{{$respuesta->productname}}</strong></h5>
              <strong>Size: </strong>{{$respuesta->attr1}}
              <br>
              <strong>Paper Type: </strong>{{$respuesta->attr2}}
              <br>
              @if($respuesta->attr6!='')
              <strong>Edge Color: </strong>{{$respuesta->attr6}}
              <br>
              @endif
              <strong> Printed Side: </strong>{{$respuesta->attr3}}
              <br>
              <strong>Coating: </strong>{{$respuesta->attr4}}
              <br>
              <strong>Corners: </strong>{{$respuesta->attr5}}
              <br>
              <strong>Ships In: </strong>{{$respuesta->attr11}}
              <br>
            </div>
          </div>
          <strong>Extra details: </strong><p> {{$respuesta->notas}}</p>
          <strong>Proofing Option: </strong><p> {{$respuesta->notas_2}}</p>
        </td>
        <td class="center">
          <strong>{{$respuesta->attr10}}</strong>
        </td>
        <td class="center">
          <strong>{{$respuesta->numero_venta}}</strong>
        </td>
        <td class="center">
          @if($respuesta->archivo_a!='')
          <a href="{{route('sales.download',['archivo'=>$respuesta->archivo_a])}}"><i class="fas fa-download"></i>{{$respuesta->archivo_a}} </a>
          @endif
          @if($respuesta->archivo_b!='')
          <br>
          <a href="{{route('sales.download',['archivo'=>$respuesta->archivo_b])}}"><i class="fas fa-download"></i>{{$respuesta->archivo_b}} </a>
          @endif
        </td>
        <td class="center">
          <strong>${{$respuesta->total}}</strong>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection
