@extends('layouts.app')
@section('title')
Login - Printing lab
@endsection
@section('content')


<div class="container textoscontainer">
  <form class="" action="{{route('login-validate')}}" method="post"  >
    {{csrf_field()}}
    <div class="row">
      <div class="col-md-6">
        <input class="registerinput" type="email" placeholder="Email" name="email" value="" required>
      </div>
      <div class="col-md-6">
        <input class="registerinput" type="password" placeholder="password" name="password" value="" required>
      </div>
    </div>
    @if (isset($response))
    <p>{{$response}}</p>
    @endif
    <button type="submit" class="botonsubmit " value="Submit">
      SUBMIT
    </button>
    
  </form>
</div>


@endsection
@section('scripts')



@endsection
