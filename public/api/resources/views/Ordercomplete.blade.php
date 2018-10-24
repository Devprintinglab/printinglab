@extends('layouts.app')
@section('title')
About Us - Printing Lab
@endsection
@section('content')
<style type="text/css">
  .order{
        
      }
</style>
<div class="container textoscontainer">
  <div class="col-md-12">
    <h1 class="titlecontact"><b>Thank You,</b> your order has been placed.</h1>
  </div>
<div class="col-md-12" style="margin-bottom:50px">
    <p>
      An email confirmation has been sent to you.
    </p>
     @foreach ($result as $dato )
     <p>
      Order Number: {{$dato->numero_venta}} 
    </p>
    <p>
      Order Total: ${{$dato->total}} 
    </p>
     @endforeach
  </div>
  <a  href="{{ url('/home') }}" calss="order" style="background-color: black;padding: 15px;color: #fff;">Back to Orders</a>
</div>

@endsection



