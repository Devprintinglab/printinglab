@extends('layouts.app')
@section('title')
404 - Printing Lab
@endsection
@section('content')
<div class="container textoscontainer">
  <div class="container">
    <div class="row justify-content-md-center">
      <div class="col-md-auto ops">
        <h2>Oops!</h2>
      </div>
    </div>
    <div class="row errortext">
      <div class="col-md-6">
        <h1>404 Error</h1>
        <h3>We can't find the page you're looking for.</h3>
        <p>Please see our services.</p>
      </div>
      <div class="col-md-6">
        <img src="images/404-printing-lab-new-york.gif"  alt="">
      </div>
    </div>
  </div>
</div>
@endsection
