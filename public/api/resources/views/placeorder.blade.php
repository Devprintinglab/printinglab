@extends('layouts.app')
@section('title')
Products - Printing Lab
@endsection
@section('content')
<div class="content container" ng-controller="designercontroller">
  <div class="row" >
    <div id="confimationorder">
      <h1>Tank you for your order</h1>
      <div class="row">
        <div class="col-md-8">
          <h4 id="ordernumber"><p></p></h4>
          <p id="orderemail"></p>
          <a href="">Prin Receipt</a>
        </div>
        <div class="col-md-4">
          <p>Questions?</p>
          <p>call (201) 305 0404 or</p>
          <a href="">Contact Us</a>
        </div>
      </div>
    </div>
  </div>
</div>
<style type="text/css">
  #confimationorder{
    height: 50vh;
    padding-top: 50px;
    padding-bottom: 50px;
}
#confimationorder p{
    margin-bottom: 0px
}
#confimationorder h1{
 font-weight: 900
}
</style>
@endsection