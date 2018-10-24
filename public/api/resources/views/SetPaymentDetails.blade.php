@extends('layouts.app')
@section('title')
Marketing Products - Printing Lab
@endsection
@section('content')
<?php 
$carrito =Session::get('carrito');
require_once "./config.php"; 
?>
<div class="pageload" id="pageload"></div>
<div id="preloader">
	<div class="flexloader"><div class="loader"><i class="fa fa-cog fa-4x yellow"></i><i class="fa fa-cog fa-4x black"></i></div></div>
</div>
<div id="Checkout" class="container" ng-controller="cartcontroller">

	<h2 class="font-bold pt-4 pb-5 mb-5"><strong>Checkout with Amazon</strong></h2>
	<div class="row">
		<div class="col-md-12 Checkoutcontainer">
			
			<!-- Stepper -->
			<div class="steps-form-2">
				<div class="steps-row-2 setup-panel-2 d-flex justify-content-between">
					<div class="steps-step-2 boxiconR">
						<a id="paystep1" href="#step-1" type="button" class=" btn-actived btn btn-amber btn-circle-2 waves-effect ml-0" data-toggle="tooltip" data-placement="top" title="Your details"><div class="icodetails"></div></a>
					</div>
					<div class="steps-step-2 boxicon">
						<a id="paystep2" href="#step-2" type="button" class="btn-disbled btn btn-blue-grey btn-circle-2 waves-effect" data-toggle="tooltip" data-placement="top" title="Delivery"><div class="icocheckout"></div></a>
					</div>
					<div class="steps-step-2 boxicon">
						<a id="paystep3" href="#step-3" type="button" class="btn-disbled btn btn-blue-grey btn-circle-2 waves-effect" data-toggle="tooltip" data-placement="top" title="Payment"><div class="icopay"></div></a>
					</div>
					<div class="steps-step-2 boxiconL">
						<a id="paystep4" href="#step-4" type="button" class="btn-disbled btn btn-blue-grey btn-circle-2 waves-effect mr-0" data-toggle="tooltip" data-placement="top" title="Finish"><div class="icodone"></div></a>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-8">
					<div class="jumbotroncolor" style="padding-top:25px;" id="api-content">
						<div class="row setup-content-2" id="step-1">
							<div class="col-md-12">
								<h3 class="font-weight-bold pl-0 my-4"><strong>Customer information</strong></h3>
								<div class="text-center" style="margin-top:40px;margin-bottom:40px;">
									<div id="addressBookWidgetDiv"></div>
								</div>
								<button ng-click="callshiping()" id="p2" class="btn btn-mdb-color btn-rounded nextBtn-2 float-right" type="button">Next</button>
							</div>
						</div>
						<!-- Second Step -->
						<div class="row setup-content-2" id="step-2">
							<div class="col-md-12">
								<h3 class="font-weight-bold pl-0 my-4"><strong>Shipping method</strong></h3>
								<form>
								<div class="row">
									<div class="form-group md-form col-md-12 divrelative">
										<label for="yourUsername-2" data-error="wrong" data-success="right">Full Name</label>
										<input id="yourUsername-2" type="text" required="required" class="form-control validate" placeholder="First name*">
										<span class="validity sapanvalid"></span>
									</div>
								</div>
								<div class="row">
									<div class="form-group md-form col-md-12 divrelative" >
										<label for="yourEmail-2" data-error="wrong" data-success="right">Email</label>
										<input id="yourEmail-2" type="email" required="required" class="form-control validate" placeholder="Email address*">
										<span class="validity sapanvalid"></span>
									</div>
								</div>
								<div class="row" >
									<div class="form-group md-form col-md-4 divrelative">
										<label for="number" data-error="wrong" data-success="right">Phone</label>
										<input id="number" type="text" class="form-control validate" placeholder="800-000-0000" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" required >
										<span class="validity numbervalid"></span>
									</div>
									<div class="form-group md-form col-md-8 divrelative">
										<label for="address" data-error="wrong" data-success="right">Address</label>
										<input id="address" type="text" class="form-control validate" placeholder="address" required >
										<span class="validity addressvalid"></span>
									</div>
								</div>
								<div id="ShippingCost">
									<div class="shipingdiv">
										<h3 class="font-weight-bold pl-0 my-4"><strong>Delivery Method</strong></h3>
										<div class="row" >
											@if (Route::has('login'))
											@auth
											<div class="col-md-4"><input class="btnshiping" maxlength="5" id="zipcode" type="text" name="" value="{{Auth::user()->zip_code}}" placeholder="Zip code"></div>
											@else
											<div class="col-md-4"><input class="btnshiping" maxlength="5" id="zipcode" type="text" name="" value="" placeholder="Zip code"></div>
											@endauth
											@endif
											<input ng-model="confirmed" ng-change="callshiping()" id="shipingcontrol" type="text" name="" value="" hidden="" required>
											<div class="col-md-8"><button class="ShowOptions" ng-click="callshiping()">Show Options</button></div>
										</div>
										<div id="pleasewait" >
											<img src="{!! asset('images/tenor.gif') !!}" style="width: 40%">

										</div>
										<div id="Shipto" style="padding-bottom: 30px">
											<div ng-repeat="items in shipingarray | orderBy:'index'" id="dv@{{items.id}}" ng-click="selectshiping(items.value,items.name)" class='row shipingrow'><div class='col-md-8 col-sm-8'><strong>@{{items.name}}</strong></div><div class='col-md-4 col-sm-4'> $ @{{items.value}}</div><!-- <div class='col-md-12 col-sm-12'>@{{items.days}} Day Transit</div> --></div>
										</div>
									</div>
								</div>

								<button  ng-click="backstep(2)" class="btn btn-mdb-color btn-rounded prevBtn-2 float-left" type="button">Previous</button>
								<button type="submit" id="p3" class="btn btn-mdb-color btn-rounded nextBtn-2 float-right" type="button" >Next</button>
							</div>
</form>
						</div>

						<!-- Third Step -->
						<div class="row setup-content-2" id="step-3">
							<div class="col-md-12">
								<h3 class="font-weight-bold pl-0 my-4"><strong>Payment </strong></h3>
								<div class="text-center" style="margin-top:40px;margin-bottom:40px;">
									<div id="walletWidgetDiv"></div>
								</div>
								<button ng-click="backstep(3)" class="btn btn-mdb-color btn-rounded prevBtn-2 float-left" type="button">Previous</button>
								<button id="p4"  class="btn btn-mdb-color btn-rounded nextBtn-2 float-right" type="button">Next</button>
							</div>
						</div>

						<!-- Fourth Step -->
						<div class="row setup-content-2" id="step-4">
							<div class="col-md-12">
								<h3 class="font-weight-bold pl-0 my-4"><strong>Your Order</strong></h3>
								@foreach ($carrito as $array =>$items)
								@if($carrito[$array]['IdC']==1)
								<div class="row orderlist">
									<div class="col-md-4">
										@if($carrito[$array]['img1']=='no_img')
										<i class="far fa-file-image fa-10x"></i>
										@else
										@if($carrito[$array]['ArchivoA']==''&& $carrito[$array]['ArchivoB']==''  )
										<img class="product_car {{$carrito[$array]['nombre']}}" src="upload-products/{{$carrito[$array]['Imagen']}}" alt="">
										@elseif( isset($carrito[$array]['ArchivoA']) && $carrito[$array]['ArchivoB']==''  )
										<img class="product_car {{$carrito[$array]['nombre']}}" src="upload-products/{{$carrito[$array]['ArchivoA']}}" alt="">
										@elseif( isset($carrito[$array]['ArchivoB']) && $carrito[$array]['ArchivoA']==''  )
										<img class="product_car {{$carrito[$array]['nombre']}}" src="upload-products/{{$carrito[$array]['ArchivoB']}}" alt="">
										@elseif(isset($carrito[$array]['ArchivoA']) && isset($carrito[$array]['ArchivoB'])  )
										<div class="row">
											<div class="col-md-6">
												<img class="product_car {{$carrito[$array]['nombre']}}" src="upload-products/{{$carrito[$array]['ArchivoA']}}" alt="">
											</div>
											<div class="col-md-6">
												<img class="product_car {{$carrito[$array]['nombre']}}" src="upload-products/{{$carrito[$array]['ArchivoB']}}" alt="">
											</div>
										</div>
										@endif
										@endif
									</div>
									<div class="col-md-8">
										<h5><strong>{{$carrito[$array]['nombre']}}</strong></h5>
										<div class="row">
											<div class="col-md-6">

												<li><strong>Size: </strong>{{$carrito[$array]['attr1']}}</li>
												<li><strong>Paper Type: </strong>{{$carrito[$array]['attr2']}}</li>
												@if($carrito[$array]['attr6']!='')
												<li><strong>Edge Color: </strong>{{$carrito[$array]['attr6']}}</li>
												@endif
												<li><strong> Printed Side: </strong>{{$carrito[$array]['attr3']}}</li>

											</div>	
											<div class="col-md-6">

												<li><strong>Coating: </strong>{{$carrito[$array]['attr4']}}</li>
												<li><strong>Corners: </strong>{{$carrito[$array]['attr5']}}</li>
												<li><strong>Ships In: </strong>{{$carrito[$array]['attr11']}}</li>
												<li><strong>Quantity: </strong>{{$carrito[$array]['attr10']}}</li>

											</div>
										</div>	
									</div>
								</div>
								@endif
								@endforeach 
								<div class="toltalandpay" style="margin-top:40px;margin-bottom:40px;">
									<button id="place-order" class="btn btn-lg " style="float: right;">Place Order</button>
							<!-- <span style="font-size: 21px">
								Shipping  
								<strong>$</strong>
								<strong id="Shipping_value"> 
								</strong>
							</span><br>
							<span>
								Total  
								<strong>$</strong>
								<strong id="total_value"> 
								</strong>
							</span> -->
						</div>
						<button ng-click="backstep(4)" class="btn btn-mdb-color btn-rounded prevBtn-2 float-left" type="button">Previous</button>
					</div>
				</div>
				<div id="section-content">
					<div  id="errordiv" class="alert alert-danger" role="alert"></div>
				</div>
			</div>
			<div>
				<a id="Logout" href="cart" style="color: #f4005b !important">Log out from Amazon Pay</a>
			</div>
		</div>
		<div class="col-md-4">
			<div class="col-md-12">
				<div class="secure-checkout-container panel panel-default">
					<div class="row panel-body secure-checkout">
						<h3 class="font-weight-bold pl-0 my-4"><strong>Order Summary</strong></h3>
						<table class="table" align="center">
							<tbody><tr>
								<td>Printing Cost:</td>
								<td align="right" class="printing-cost">$<span>{{$total}}</span></td>
							</tr>
							<tr>
								<td>Shipping:</td>
								<td align="right" class="shipping-cost">$<span id="Shipping_val">0.00</span></td>
							</tr>
							<tr>
								<td>Tax</td>
								<td align="right" class="tax">$<span id="tax">0.00</span></td>
							</tr>
							<tr>
								<td>Discount</td>
								<td align="right" class="tax">$<span>0.00</span></td>
							</tr>
							<tr>
								<td colspan="2"><hr></td>
							</tr>
							<tr>
								<td style="padding-top: 10px">Estimated Total</td>
								<td align="right" class="total-cost"><strong>$<span id="total_val">0.0</span></strong></td>
							</tr>              
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
</div>
</div>

<form id="orderconfirm" name="orderconfirm"  action="{{route('Findordercomplete')}}" method="post" enctype="multipart/form-data" >
	{{csrf_field()}}
	<input hidden  type="text" name="idorder"  id="idorder">
	<input hidden  type="text" name="paytype"  value="AmazonPay" id="paytype">
	<input hidden  type="text" name="cltname"  value="{{Auth::user()->name}}" id="cltname">
	<input hidden  type="mail" name="cltmail"  value="{{Auth::user()->email}}" id="cltmail">
	<input hidden type="text" name="cltadress"   id="cltadress">
	<input hidden type="text" name="cltphone"   id="cltphone">
</form>
<link rel="stylesheet" href="{!! asset('css/paystep.css') !!}"></link>

<script type='text/javascript'>
	$("#pleasewait").hide();
	$("#pageload").show();
	$("#preloader").show();
	var amazonzipcode
	var Shipingtypename;
	var Shipingtypeval; 
	var tax;
	var Emailorder;
	var BuyerName;
	var IDorder;
	var ShippingHandling;
	var totalphp = '<?php echo $total ?>'
	var totalmount = '<?php echo $total ?>'
	$("#total_val").html(totalmount)
	window.onAmazonLoginReady = function () {
		try {
			amazon.Login.setClientId('<?php print $amazonpay_config['client_id']; ?>');
			amazon.Login.setUseCookie(true);
		} catch (err) {
			alert(err);
		}
	};

	window.onAmazonPaymentsReady = function () {
		new OffAmazonPayments.Widgets.AddressBook({
			sellerId: "<?php echo $amazonpay_config['merchant_id']; ?>",
			onOrderReferenceCreate: function (orderReference) {

				var access_token = '<?php print $_GET["access_token"];?>';
				$.post("./Apicalls/GetDetails.php", {
					orderReferenceId: orderReference.getAmazonOrderReferenceId(),
					accessToken: access_token,
					Amount: totalmount
				}).done(function (data) {
					try {
						JSON.parse(data);
					} catch (err) {
					}
					var orderreferencedetails = JSON.parse(data)
					console.log(orderreferencedetails)
					$('#idorder').val(orderreferencedetails.GetOrderReferenceDetailsResult.OrderReferenceDetails.SellerOrderAttributes.SellerOrderId)
					$('#zipcode').val(orderreferencedetails.GetOrderReferenceDetailsResult.OrderReferenceDetails.Destination.PhysicalDestination.PostalCode)
					$('#yourUsername-2').val(orderreferencedetails.GetOrderReferenceDetailsResult.OrderReferenceDetails.Buyer.Name)
					$('#yourEmail-2').val(orderreferencedetails.GetOrderReferenceDetailsResult.OrderReferenceDetails.Buyer.Email)
					$('#number').val(orderreferencedetails.GetOrderReferenceDetailsResult.OrderReferenceDetails.Destination.PhysicalDestination.Phone)
					number
					IDorder = orderreferencedetails.GetOrderReferenceDetailsResult.OrderReferenceDetails.SellerOrderAttributes.SellerOrderId
					Emailorder = orderreferencedetails.GetOrderReferenceDetailsResult.OrderReferenceDetails.Buyer.Email
					BuyerName = orderreferencedetails.GetOrderReferenceDetailsResult.OrderReferenceDetails.Buyer.Name
					$("#orderemail").html('You will recive an email confirmation shortly at: '+orderreferencedetails.GetOrderReferenceDetailsResult.OrderReferenceDetails.Buyer.Email)

					$('#address').val(orderreferencedetails.GetOrderReferenceDetailsResult.OrderReferenceDetails.Destination.PhysicalDestination.AddressLine1+', '+orderreferencedetails.GetOrderReferenceDetailsResult.OrderReferenceDetails.Destination.PhysicalDestination.City+', '+orderreferencedetails.GetOrderReferenceDetailsResult.OrderReferenceDetails.Destination.PhysicalDestination.StateOrRegion+' '+orderreferencedetails.GetOrderReferenceDetailsResult.OrderReferenceDetails.Destination.PhysicalDestination.PostalCode)
					$("#pageload").hide();
					$("#preloader").hide();
				});
			},
			onReady: function(billingAgreement) {
				var billingAgreementId = billingAgreement.getAmazonBillingAgreementId(); 
				//console.log(billingAgreementId)
			},
			onAddressSelect: function (orderReference) {
				var billingAgreementId = orderReference;
				console.log(billingAgreementId)
				new OffAmazonPayments.Widgets.Wallet({
					sellerId: "<?php echo $amazonpay_config['merchant_id']; ?>",
					onPaymentSelect: function (orderReference) {
					},
					design: {
						designMode: 'responsive'
					},
					onError: function (error) {
						console.log(error)
						$.confirm({
							title: error.getErrorCode(),
							content: error.getErrorMessage(),
							buttons: {
								backtothecart: {
									text: 'back to cart',
									btnClass: 'alert-content',
									keys: ['enter', 'shift'],
									action: function(){
										document.location.href="{!! route('cart'); !!}";
									}
								},
								cancel: function () {

								},
							}
						});
					}
				}).bind("walletWidgetDiv");
			},
			design: {
				designMode: 'responsive'
			},
			onError: function (error) {
				$.confirm({
					title: error.getErrorCode(),
					content: error.getErrorMessage(),
					buttons: {
						backtothecart: {
							text: 'back to cart',
							btnClass: 'alert-content',
							keys: ['enter', 'shift'],
							action: function(){
								document.location.href="{!! route('cart'); !!}";
							}
						},
						cancel: function () {
						},
					}
				});
			}
		}).bind("addressBookWidgetDiv");
		

	};
	$( "#place-order" ).click(function() {
		$.confirm({
			title: 'Confirm Order?',
			buttons: {
				confirm: function () {
					$("#pageload").show();
					$("#preloader").show();
					$.post("./Apicalls/ConfirmAndAuthorize.php", {
						SellerNote:'Authorizing payment',
						Amount: totalmount
					}).done(function (data) {
						try {
							JSON.parse(data);
						} catch (err) {
							console.log('error')
						}
						var orderreferencedetails = JSON.parse(data)
						console.log(orderreferencedetails)
						//document.location.href="{!! route('placeorder'); !!}"
						if (orderreferencedetails.confirm.ResponseStatus=='400' ) {
							$.confirm({
								title: 'Payment declicned',
								content: 'The credit card information was declined',
								buttons: {
									backtothecart: {
										text: 'Try again',
										btnClass: 'alert-content',
										keys: ['enter', 'shift'],
										action: function(){
											location.reload()
										}
									},
									cancel: function () {
										location.reload()
									},
								}
							});

						}else{
							if (orderreferencedetails.authorize.AuthorizeResult.AuthorizationDetails.AuthorizationStatus.State=='Open') {

								$.ajaxSetup({
									headers: {
										'X-CSRF-Token': $('meta[name=_token]').attr('content')
									}
								});
								$.ajax({
                                url: 'ordercomplete', // point to server-side PHP script
                                data: {OrderID:IDorder,Total:totalmount,name:BuyerName,Shiping:Shipingtypename,Shipingvalue:Shipingtypeval,email:Emailorder,Tax:tax},
                                type: 'POST',
                                success: function(data) {    
                                	console.log(data)
                                	$('#idorder').val(data.success)
                                	$( "#orderconfirm").submit();
                                }
                            });
							}else{
								$.confirm({
									title: 'Payment declicned',
									content: 'The credit card information was declined',
									buttons: {
										backtothecart: {
											text: 'Try again',
											btnClass: 'alert-content',
											keys: ['enter', 'shift'],
											action: function(){
												location.reload()
											}
										},
										cancel: function () {
										 	  location.reload()
										},
									}
								});
							}

						}
					});

				},
				cancel: function () {

				},
			}
		});



	});



    // console.log(closest (number, array));

    document.getElementById('Logout').onclick = function() {
    	amazon.Login.logout();
    };
</script>
<script type="text/javascript" src="{!! asset('js/paystep.js') !!}"></script>
<!-- <form class="form-horizontal" style="margin-top:40px;" role="form" method="post" action="./Apicalls/ConfirmAndAuthorize.php">
</form> -->
@endsection
