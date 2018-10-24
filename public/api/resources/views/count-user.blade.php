@extends('layouts.app')
<?php
$usuario=Session::get('user_client');
?>
@section('title')
{{$usuario['nombre']}} - Printing Lab
@endsection
@section('content')






<div class="container">
  <div class="row count-row">


    <div class="nav flex-column nav-pills col-md-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
      <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">PERSONAL INFO</a>
      <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">CHANGE PASSWORD</a>
      <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">DELETE ACCOUNT</a>
    </div>
    <div class="tab-content col-md-9" id="v-pills-tabContent">
      <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
        <form class="form-input" action="" method="post">
          {{csrf_field()}}
          <div class="row">
            <div class="col-md-6">
              <p>NAME</p>
              <input type="text" class="" name="" value="">
            </div>
            <div class="col-md-6">
              <p>LAST NAME</p>
              <input type="text" class="" name="" value="">
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <p>ADDRESS</p>
              <input type="text" class="" name="" value="">
            </div>
            <div class="col-md-6">
              <p>BILLING ADDRESS</p>
              <input type="text" class="" name="" value="">
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <p for="">EMAIL</p>
              <input type="text" name="" value="">
            </div>
            <div class="col-md-6">
              <p for="">PHONE</p>
              <input type="text" name="" value="">
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <p for="">ZIP CODE</p>
              <input type="text" name="" value="">
            </div>
          </div>
        </form>
      </div>
      <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
        <form class="form-input" action="" method="post">
          {{csrf_field()}}
          <div class="row">
            <div class="col-md-6">
              <p>ACTUAL PASSWORD</p>
              <input type="password" class="" name="" value="">
            </div>
            <div class="col-md-6">
              <p>NEW PASSWORD</p>
              <input type="password" class="" name="" value="">
            </div>
          </div>
        </form>
      </div>

      <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">

        <div class="col-md-12">
          <h4>Are you sure to make this?</h4>
          <p>If you delete your account your personal infromation and purchasing information will</p>
          <p>be lost. And you will not receive more information of offers and email marketing.</p>
          <form class="delete-count" action="" method="post">
            {{csrf_field()}}
            <p for="">TYPE YOUR PASSWORD</p>

              <input type="text" name="" value="">

          </form>

        </div>


      </div>

    </div>




  </div>
</div>






@endsection
