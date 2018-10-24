@extends('layouts.app')
@section('title')
Printing Lab
@endsection
@section('content')
<div class="container">
  <div class="col-md-12">
    <h2><strong>My Account</strong></h2>
  </div>
  <div class="row count-row">
    <div class="nav flex-column nav-pills col-md-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
      <a class="nav-link active" id="v-pills-orders-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-orders" aria-selected="true">ORDERS</a>
      <a class="nav-link" id="v-pills-personal-tab" data-toggle="pill" href="#v-pills-personal" role="tab" aria-controls="v-pills-personal" aria-selected="false">PERSONAL INFO</a>
      <?php if (!isset($Uid)): ?>
        <a class="nav-link" id="v-pills-password-tab" data-toggle="pill" href="#v-pills-password" role="tab" aria-controls="v-pills-password" aria-selected="false">CHANGE PASSWORD</a>
        <a class="nav-link" id="v-pills-delete-ccount-tab" data-toggle="pill" href="#v-pills-delete-ccount" role="tab" aria-controls="v-pills-delete-ccount" aria-selected="false">DELETE ACCOUNT</a>
      <?php endif ?>
    </div>
    <div class="tab-content col-md-9" id="v-pills-tabContent">
      <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-orders-tab">
        <table class="table table-striped ">
          <thead class="center">
            <tr>
              <td><strong>ORDER</strong></td>
              <td><strong>ADDRESS</strong></td>
              <td><strong>DATE</strong></td>
              <td><strong>TOTAL</strong></td>
              <td><strong>VIEW DETAILS</strong></td>
            </tr>
          </thead>
          <tbody class="center">
            @foreach($result as $sale)
            <tr>
              <td>{{$sale->numero_venta}}</td>
              <td>{{$sale->address}}</td>
              <td>{{$sale->date}}</td>
              <td>{{$sale->total}}</td>
              <td>
                <a href="{{route('sale-details',['id'=>$sale->id_compras])}}"><i class="far fa-eye"></i></a>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
        {{ $result->links() }}
      </div>
      <div class="tab-pane fade" id="v-pills-personal" role="tabpanel" aria-labelledby="v-pills-personal-tab">
        @if(isset($success_user))
        <div class="alert alert-success">
          {{$success_user}}
        </div>
        @endif
        @if(isset($error_user))
        <div class="alert alert-danger">
          {{$error_user}}
        </div>
        @endif
        <form action="{{route('update-user')}}" class="form-personal" method="post">
          {{csrf_field()}}
          <div class="row">
            <div class="col-md-6">
              <p>NAME</p>
              <input class="form-input" type="text" class="" name="name" value="{{$nombre}}">
            </div>
            <div class="col-md-6">
              <p>LAST NAME</p>
              <input class="form-input" type="text" class="" name="last_name" value="{{$last_name}}">
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <p>ADDRESS</p>
              <input class="form-input" type="text" class="" name="address"  @if(isset($address)) value="{{$address}}" @else value="" @endif>
            </div>
            <div class="col-md-6">
              <p for="">PHONE</p>
              <input class="form-input" type="tel" class="" name="phone"  @if(isset($phone)) value="{{$phone}}" @else value="" @endif>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <p for="">EMAIL</p>
              <input class="form-input" type="text" name="email" value="{{$email}}">
            </div>
            <div class="col-md-6">
              <p for="">ZIP CODE</p>
              <input class="form-input" type="number" class="" name="zip_code"  @if(isset($zip)) value="{{$zip}}" @else value="" @endif>
            </div>
          </div>
          <div class="row col-md-6">
            <input class="btn-savecount" type="submit" value="SAVE" class="btn">
          </div>
        </form>
      </div>
      <div class="tab-pane fade" id="v-pills-password" role="tabpanel" aria-labelledby="v-pills-password-tab">
        @if (session('error'))
        <div class="alert alert-danger">
          {{ session('error') }}
        </div>
        @endif
        @if (session('success'))
        <div class="alert alert-success">
          {{ session('success') }}
        </div>
        @endif
        <form action="{{route('update-password')}}" class="form-personal" method="post">
          {{csrf_field()}}
          <div class="row">
            <div class="col-md-6">
              <p>CURRENT PASSWORD</p>
              <input class="form-input" type="password" class="" name="current-password" value="" required>
            </div>
            <div class="col-md-6">
              <p>NEW PASSWORD</p>
              <input class="form-input" type="password" class="" name="new-password" value="" required>
            </div>
          </div>
          <div class="row col-md-6">
            <p>CONFIRM NEW PASSWORD</p>
            <input class="form-input" type="password" class="" name="new-password_confirmation" value="" required>
          </div>
          <div class="row col-md-6">
            <input class="btn-savecount" type="submit" value="SAVE" class="btn">
          </div>
        </form>
      </div>
      <div class="tab-pane fade" id="v-pills-delete-ccount" role="tabpanel" aria-labelledby="v-pills-delete-ccount-tab">
        <div class="col-md-12">
          <h4>Are you sure to make this?</h4>
          <p class="p-deletcount">If you delete your account your personal infromation and purchasing information will</p>
          <p class="p-deletcount">be lost. And you will not receive more information of offers and email marketing.</p>
          @if (session('result_delet'))
          <div class="alert alert-danger">
            {{ session('result_delet') }}
          </div>
          @endif
          <form action="{{route('delete-count')}}" id="count-delete" method="post">
            {{csrf_field()}}
            <div class="">
              <p>TYPE YOUR PASSWORD</p>
              <input class="delete-count" type="password" name="current-password" value="">
            </div>
            <div class="">
              <input class="btn-savecount btn-deletecount" value="REMOVE MY ACCOUNT" class="btn">
            </div>
          </form>
        </div>
      </div>
         @if (Session::has('carrito'))
      <div style="float: right;">
        <a href="{{ url('/cart')}}">Go to cart</a>
       </div>
         @else
         @endif     
    </div>
  </div>
  
</div>
@endsection
@section('scripts')
<script>
$(".btn-deletecount").click(function(){
  $.confirm({
    title: 'You must confirm this',
    content: 'Are you sure that you want to delete your account?',
    draggable: false,
    buttons: {
      confirm: function () {
        $("#count-delete").submit();
      },
      cancel: function () {
        $.alert('Canceled!');
      },
    }
  });
});
</script>
@endsection
