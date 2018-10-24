@extends('layouts.app')
@section('title')
Custom Apparel - Printing Lab
@endsection
@section('content')
<div class="pc-clientes">
  <img class="img-apparel" src="images/custom_apparel/slider-custom-apparel-gallery-printing-lab-new-jersey.jpg" alt="">
</div>
<div class="container">
  <div class="row row-custom-apparel">
    <div class="col-md-6 col-sm-6 col-12">
      <h1>Hi There!</h1>
      <p>In this moment we are building our Custom Apparel page.<br>
        But if you’re interested you can <a href="{{url('/contact-us')}}" title="Contact Us">Contact Us</a> for any quote or doubt.
      </p>
    </div>
    <div class="col-md-6 col-sm-6 col-12">
      <figure >
        <img class="img-apparel2" src="images/custom_apparel/tshirt-custom-apparel-printing-lab-new-york-nj.gif" alt="">
      </figure>
    </div>
  </div>
</div>
@endsection
