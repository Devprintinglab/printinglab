@extends('layouts.app')

@section('content')
<?php
$carrito =Session::get('carrito');
require_once "./config.php";
?>
<div class="container login-empty" id="loginhide">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">{{ __('Login') }}</div>
        <div class="card-body">
          <form id="loginform" method="POST" action="{{ route('login') }}">
            @csrf
            <div class="form-group row">
              <label for="email" class="col-sm-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
              <div class="col-md-6">
                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
                @if ($errors->has('email'))
                <span class="invalid-feedback">
                  <strong>{{ $errors->first('email') }}</strong>
                </span>
                @endif
              </div>
            </div>
            <div class="form-group row">
              <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
              <div class="col-md-6">
                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                @if ($errors->has('password'))
                <span class="invalid-feedback">
                  <strong>{{ $errors->first('password') }}</strong>
                </span>
                @endif
              </div>
            </div>
            <!--
            <div class="form-group row">
              <div class="col-md-6 offset-md-4">
                <div class="checkbox">
                  <a class="btn btn-link" href="{{ route('password.request') }}">
                    {{ __('Forgot Your Password?') }}
                  </a>
                  <label>
                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('Remember Me') }}
                  </label>
                </div>
              </div>
            </div>-->
            <div class="form-group row mb-0">
              <div class="col-md-8 offset-md-4">
                <button type="submit" class="botonsubmit">
                  {{ __('Login') }}
                </button>
                <!-- <a class="btn btn-link" href="{{ route('password.request') }}">
                  {{ __('Forgot Your Password?') }}
                </a> -->
              </div>
            </div>
            <div class="form-group row mb-0 amazon-login-btn">
              <div class="col-md-8 offset-md-4">
                <p>Or also you can login with</p>
                <div id="AmazonLoginButton" style="margin-top: 10px;"></div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="row justify-content-center" id="registerhide" style="display: none">
  <div class="col-md-8">
    <div class="card">
      <div class="card-header">{{ __('Registar') }}</div>
      <div class="card-body">
        <form id="registerform" method="POST" action="{{ route('register') }}">
          @csrf
          <div class="form-group row">
            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>
            <div class="col-md-6">
              <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>
              @if ($errors->has('name'))
              <span class="invalid-feedback">
                <strong>{{ $errors->first('name') }}</strong>
              </span>
              @endif
            </div>
          </div>
          <div class="form-group row">
            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Last Name') }}</label>
            <div class="col-md-6">
              <input id="last_name" type="text" class="form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}" name="last_name" value="{{ old('last_name') }}" required autofocus>

              @if ($errors->has('last_name'))
              <span class="invalid-feedback">
                <strong>{{ $errors->first('last_name') }}</strong>
              </span>
              @endif
            </div>
          </div>
          <div class="form-group row">
            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
            <div class="col-md-6">
              <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

              @if ($errors->has('email'))
              <span class="invalid-feedback">
                <strong>{{ $errors->first('email') }}</strong>
              </span>
              @endif
            </div>
          </div>

          <div class="form-group row">
            <label for="userID" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
            <div class="col-md-6">
              <input id="userID" type="text" name="userID" >
            </div>
          </div>

          <div class="form-group row">
            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
            <div class="col-md-6">
              <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

              @if ($errors->has('password'))
              <span class="invalid-feedback">
                <strong>{{ $errors->first('password') }}</strong>
              </span>
              @endif
            </div>
          </div>
          <div class="form-group row">
            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>
            <div class="col-md-6">
              <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
            </div>
          </div>
          <div class="form-group row mb-0">
            <div class="col-md-6 offset-md-4">
              <button type="submit" class="btn btn-primary">
                {{ __('Register') }}
              </button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
@section('scripts')
<script type='text/javascript'>
  $.ajaxSetup({
    headers: {
      'X-CSRF-Token': $('meta[name=_token]').attr('content')
    }
  });
  window.onAmazonLoginReady = function () {
    amazon.Login.setClientId('<?php echo $amazonpay_config['client_id']; ?>');
    var authRequest;
    OffAmazonPayments.Button("AmazonLoginButton", "<?php echo $amazonpay_config['merchant_id']; ?>", {
      type: "LwA",
      color: "Gold",
      authorization: function () {
        loginOptions = { scope: "profile"};
        authRequest = amazon.Login.authorize (loginOptions, function(response) {
            // this code is executed ASYNCHRONOUSLY
            if ( response.error ) {
                // USER NOT LOGGED IN
                alert('oauth error ' + response.error);
                return;
              } else {
                amazon.Login.retrieveProfile(response.access_token,function (response) {
                  console.log(response)
                  //$('#loginhide').remove();
                  //$('#registerhide').remove();
                  console.dir('Name= ' + response.profile.Name);
                  console.dir('PostalCode= ' + response.profile.PostalCode);
                  console.dir('PrimaryEmail= ' + response.profile.PrimaryEmail);
                  //$( "#loginform").submit();
                  //$( "#registerform").submit();
                  $.ajax({
                 url: 'registeramazonuser', // point to server-side PHP script
                 data: {tipe:1,email:response.profile.PrimaryEmail,name:response.profile.Name,user_ID:response.profile.CustomerId},
                 type: 'POST',
                 success: function(data) {
                  console.log(data.success)
                  if (data.success==true) {
                    $('#registerhide').remove();
                    $('#name').val(response.profile.Name)
                    $('#last_name').val(response.profile.Name)
                    $('#email').val(response.profile.PrimaryEmail)
                    $('#userID').val(response.profile.CustomerId)
                    $('#password').val(response.profile.CustomerId)
                    $('#password-confirm').val(response.profile.CustomerId)
                    $( "#loginform").submit();
                  }else{
                    $('#loginhide').remove();
                    $('#name').val(response.profile.Name)
                    $('#last_name').val(response.profile.Name)
                    $('#email').val(response.profile.PrimaryEmail)
                    $('#userID').val(response.profile.CustomerId)
                    $('#password').val(response.profile.CustomerId)
                    $('#password-confirm').val(response.profile.CustomerId)
                    $( "#registerform").submit();
                    $.ajax({
                    url: 'registeramazonuser', // point to server-side PHP script
                    data: {tipe:2,email:response.profile.PrimaryEmail,name:response.profile.Name,user_ID:response.profile.CustomerId},
                    type: 'POST',
                    success: function(data) {
                     // alert(data.success)
                       }
                      });
                  }
                }
              });
                });
              }
              return false;
            });
      },
      onError: function (error) {
            // something bad happened
          }
        });
  };


</script>

@endsection
