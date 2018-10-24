@extends('layouts.app')
@section('title')
Register - Printing lab
@endsection
@section('content')


<div class="container textoscontainer">
  holi
  <form class="" action="{{route('register')}}" method="post">
    {{csrf_field()}}
    <div class="row">
      <div class="col-md-6">
        <input class="registerinput" type="text" placeholder="Name" name="name" value="" required>
      </div>
      <div class="col-md-6">
        <input class="registerinput" type="text" placeholder="Last Name" name="last_name" value="" required>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6">
        <input class="registerinput" type="email" placeholder="Email" name="email" value="" required>
        @if(isset($email_nosame))
        <p>{{$email_nosame}}</p>
        @endif
      </div>
      <div class="col-md-6">
        <input class="registerinput" type="email" placeholder="Confirm Email" name="confirm_email" value="" required>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6">
        <input class="registerinput" type="password" placeholder="password" name="password" value="" required>
      </div>
      <div class="col-md-6">
        <input class="registerinput" type="password" placeholder="confirme password" name="confirme_password" value="" required>
      </div>
      @if (isset($password_nosame))
      <p>{{$password_nosame}}</p>
      @endif
    </div>
    <button type="submit" class="botonsubmit " value="Submit">
      SUBMIT
    </button>
  </form>
  @if (isset($prueba))
  <p>{{$prueba}}</p>
  @endif

</div>



@endsection

@section('scripts')

@endsection
