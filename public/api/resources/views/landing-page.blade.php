@extends('layouts.app')
@section('title')
About Us - Printing Lab
@endsection
@section('content')
<?php 
$carrito =Session::get('carrito');
 ?>
<div class="container textoscontainer">
	<div class="col-md-12">
		<h1 class="titlecontact"></h1>                
	</div>
	<h1 class="p25">Congratulations!</h1>
	<p><span style="font-size: 14px; line-height: 1.2;">We&nbsp;</span>automatically<span style="font-size: 14px; line-height: 1.2;">&nbsp;created a new account for you and you have successfully signed in printinglab.com</p>
		@if (Session::has('carrito'))
	<p><span style="font-size: 14px; line-height: 1.2;"><a href="{{ url('/cart')}}">continue</a> to shopping car page.</span></p>
	@else
  <p><span style="font-size: 14px; line-height: 1.2;">Take a look at your <a href="{{ url('/home')}}">account</a> page.</span></p>
  @endif


	</div>
	
	<script type="text/javascript">

		window.onAmazonLoginReady = function () {
			amazon.Login.retrieveProfile(function (response) {
				//console.log(response)
				$.ajaxSetup({
					headers: {
						'X-CSRF-Token': $('meta[name=_token]').attr('content')
					}
				});
				$.ajax({
					url: 'registeramazonuser', 
					data: {tipe:2,email:response.profile.PrimaryEmail,name:response.profile.Name,user_ID:response.profile.CustomerId},
					type: 'POST',
					success: function(data) {
						//console.log(data.success)
						//console.log(<?php  $carrito; ?>)
					}
				});
			});

		}  

	</script>
	@endsection