@extends('layouts.app')
@section('title')
Cart - Printing Lab
@endsection
@section('content')
<?php
$carrito =Session::get('carrito');
require_once "./config.php";
?>
<div class="container textoscontainer" ng-controller="cartcontroller">
  @if (Session::has('carrito'))
  <div class="col-md-12">
    <h2><strong>Shopping Cart</strong></h2>
  </div>
  <div class="row divtitle-Pcar">
    <div class="col-md-9 center">
      <H5>PRODUCT DETAILS</H5>
    </div>
    <div class="col-md-3 center">
      <H5>TOTAL</H5>
    </div>
  </div>
  @foreach ($carrito as $array =>$items)
  @if($carrito[$array]['IdC']==1)
  <div class="row producto-cart" id="{{$carrito[$array]['IdA']}}">
    <div class="col-md-9">
      <div class="row">
        <div class="col-md-5">
          @if(($carrito[$array]['img1']=='png'||$carrito[$array]['img1']=='jpg') && $carrito[$array]['img2']=='')
          <div class="col-md-12 center producto-cart-img">
            <img class="product_car" src="upload-products/{{$carrito[$array]['ArchivoA']}}" alt="">
          </div>
          @elseif(($carrito[$array]['img1']=='') && ($carrito[$array]['img2']=='png'||$carrito[$array]['img2']=='jpg'))
          <div class="col-md-12 center producto-cart-img">
            <img class="product_car" src="upload-products/{{$carrito[$array]['ArchivoB']}}" alt="">
          </div>
          @elseif($carrito[$array]['img1']=='' && $carrito[$array]['img2']=='pdf')
          <div class="col-md-12 center producto-cart-img">
            <iframe class="kv-preview-data file-preview-pdf" src="upload-products/{{$carrito[$array]['ArchivoB']}}" type="application/pdf" scrolling="no"></iframe>
          </div>
          @elseif( ($carrito[$array]['img1']=='') && ($carrito[$array]['img2']=='otro'))
          <div class="col-md-12 center producto-cart-img">
            <i class="far fa-file-image fa-7x"></i>
          </div>
          @elseif($carrito[$array]['img1']=='vacio' && $carrito[$array]['img2']=='vacio')
          <div class="col-md-12 center producto-cart-img">
            <img class="product_car" src="upload-products/{{$carrito[$array]['Imagen']}}" alt="">
          </div>
          @elseif($carrito[$array]['img1']=='pdf' && $carrito[$array]['img2']=='')
          <div class="col-md-12 center producto-cart-img">
            <iframe class="kv-preview-data file-preview-pdf" src="upload-products/{{$carrito[$array]['ArchivoA']}}" type="application/pdf" scrolling="no"></iframe>
          </div>
          @elseif(($carrito[$array]['img1']=='otro') && ($carrito[$array]['img2']==''||$carrito[$array]['img2']=='otro') )
          <div class="col-md-12 center producto-cart-img">
            <i class="far fa-file-image fa-7x"></i>
          </div>
          @elseif(($carrito[$array]['img1']=='png'||$carrito[$array]['img1']=='jpg') && ($carrito[$array]['img2']=='png'||$carrito[$array]['img2']=='jpg'))
          <div class="row producto-cart-img">
            <div class="col-md-6">
              <img class="product_car2" src="upload-products/{{$carrito[$array]['ArchivoA']}}" alt="">
            </div>
            <div class="col-md-6">
              <img class="product_car2" src="upload-products/{{$carrito[$array]['ArchivoB']}}" alt="">
            </div>
          </div>
          @elseif(($carrito[$array]['img1']=='pdf') && ($carrito[$array]['img2']=='png'||$carrito[$array]['img2']=='jpg'))
          <div class="row producto-cart-img">
            <div class="col-md-6">
              <iframe  src="upload-products/{{$carrito[$array]['ArchivoA']}}" type="application/pdf" scrolling="no"></iframe>
            </div>
            <div class="col-md-6">
              <img class="product_car2" src="upload-products/{{$carrito[$array]['ArchivoB']}}" alt="">
            </div>
          </div>
          @elseif(($carrito[$array]['img1']=='png'||$carrito[$array]['img1']=='jpg') && ($carrito[$array]['img2']=='pdf'))
          <div class="row producto-cart-img">
            <div class="col-md-6">
              <img class="product_car2" src="upload-products/{{$carrito[$array]['ArchivoA']}}" alt="">
            </div>
            <div class="col-md-6">
              <iframe class="kv-preview-data file-preview-pdf" src="upload-products/{{$carrito[$array]['ArchivoB']}}" type="application/pdf" scrolling="no"></iframe>
            </div>
          </div>
          @elseif(($carrito[$array]['img1']=='pdf') && ($carrito[$array]['img2']=='pdf'))
          <div class="row producto-cart-img">
            <div class="col-md-6">
              <iframe class="kv-preview-data file-preview-pdf" src="upload-products/{{$carrito[$array]['ArchivoA']}}" type="application/pdf" scrolling="no"></iframe>
            </div>
            <div class="col-md-6">
              <iframe class="kv-preview-data file-preview-pdf" src="upload-products/{{$carrito[$array]['ArchivoB']}}" type="application/pdf" scrolling="no"></iframe>
            </div>
          </div>
          @elseif(($carrito[$array]['img1']=='pdf') && ($carrito[$array]['img2']=='otro'))
          <div class="row producto-cart-img">
            <div class="col-md-6">
              <iframe class="kv-preview-data file-preview-pdf" src="upload-products/{{$carrito[$array]['ArchivoA']}}" type="application/pdf" scrolling="no"></iframe>
            </div>
            <div class="col-md-6">
              <i class="far fa-file-image fa-7x"></i>
            </div>
          </div>
          @elseif(($carrito[$array]['img1']=='otro') && ($carrito[$array]['img2']=='pdf'))
          <div class="row producto-cart-img">
            <div class="col-md-6">
              <i class="far fa-file-image fa-7x"></i>
            </div>
            <div class="col-md-6">
              <iframe class="kv-preview-data file-preview-pdf" src="upload-products/{{$carrito[$array]['ArchivoB']}}" type="application/pdf" scrolling="no"></iframe>
            </div>
          </div>
          @elseif(($carrito[$array]['img1']=='otro') && ($carrito[$array]['img2']=='jpg'||$carrito[$array]['img2']=='png'))
          <div class="row producto-cart-img">
            <div class="col-md-6">
              <i class="far fa-file-image fa-7x"></i>
            </div>
            <div class="col-md-6">
              <img class="product_car2" src="upload-products/{{$carrito[$array]['ArchivoB']}}" alt="">
            </div>
          </div>
          @endif
          <div class="row">
            <div class="col-md-12 ">
              <a href="#!" data-id="{{$carrito[$array]['IdA']}}" class="elimianr_product" >REMOVE</a>
            </div>
          </div>
        </div>
        <div class="col-md-7">
          <h5><strong>{{$carrito[$array]['nombre']}}</strong></h5>
          <div class="row">
            <div class="col-md-6">
              <strong>Size: </strong>{{$carrito[$array]['attr1']}}
              <br>
              <strong>Paper Type: </strong>{{$carrito[$array]['attr2']}}
              <br>
              @if($carrito[$array]['attr6']!='')
              <strong>Edge Color: </strong>{{$carrito[$array]['attr6']}}
              <br>
              @endif
              <strong> Printed Side: </strong>{{$carrito[$array]['attr3']}}
            </div>
            <div class="col-md-6">
              <strong>Coating: </strong>{{$carrito[$array]['attr4']}}
              <br>
              <strong>Corners: </strong>{{$carrito[$array]['attr5']}}
              <br>
              <strong>Ships In: </strong>{{$carrito[$array]['attr11']}}
              <br>
              <strong>Quantity: </strong>{{$carrito[$array]['attr10']}}
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-3 rosa">
      <p class="center"><strong>${{$carrito[$array]['attr12']}}</strong></p>
      @if($carrito[$array]['Notas']!='')
      <div class="col-md-12 pruebatxt">
        <div class="row">
          <div class="col-md-6 a_edit">
            <a href="#!" data-id="{{$carrito[$array]['IdA']}}" class="edit_producto" >EDIT ORDER</a>
          </div>
          <input type="hidden" name="" value="{{$carrito[$array]['Notas']}}">
          <div class="col-md-6 a_edit">
            <a href="#!" data-id="{{$carrito[$array]['IdA']}} "  class="edit_details">EDIT DETAILS</a>
          </div>
        </div>
      </div>
      @else
      <div class="col-md-12 pruebatxt center a_edit">
        <a href="#!" data-id="{{$carrito[$array]['IdA']}}" class="edit_producto" >EDIT ORDER</a>
      </div>
      @endif
    </div>
  </div>
  @elseif($carrito[$array]['IdC']==5)
  <div class="row producto-cart" id="{{$carrito[$array]['IdA']}}">
    <div class="col-md-9">
      <div class="row">
        <div class="col-md-5">
          @if(($carrito[$array]['img1']=='png'||$carrito[$array]['img1']=='jpg') && $carrito[$array]['img2']=='')
          <div class="col-md-12 center producto-cart-img">
            <img class="product_car" src="upload-products/{{$carrito[$array]['ArchivoA']}}" alt="">
          </div>
          @elseif(($carrito[$array]['img1']=='') && ($carrito[$array]['img2']=='png'||$carrito[$array]['img2']=='jpg'))
          <div class="col-md-12 center producto-cart-img">
            <img class="product_car" src="upload-products/{{$carrito[$array]['ArchivoB']}}" alt="">
          </div>
          @elseif($carrito[$array]['img1']=='' && $carrito[$array]['img2']=='pdf')
          <div class="col-md-12 center producto-cart-img">
            <iframe class="kv-preview-data file-preview-pdf" src="upload-products/{{$carrito[$array]['ArchivoB']}}" type="application/pdf" scrolling="no"></iframe>
          </div>
          @elseif( ($carrito[$array]['img1']=='') && ($carrito[$array]['img2']=='otro'))
          <div class="col-md-12 center producto-cart-img">
            <i class="far fa-file-image fa-7x"></i>
          </div>
          @elseif($carrito[$array]['img1']=='vacio' && $carrito[$array]['img2']=='vacio')
          <div class="col-md-12 center producto-cart-img">
            <img class="product_car" src="upload-products/{{$carrito[$array]['Imagen']}}" alt="">
          </div>
          @elseif($carrito[$array]['img1']=='pdf' && $carrito[$array]['img2']=='')
          <div class="col-md-12 center producto-cart-img">
            <iframe class="kv-preview-data file-preview-pdf" src="upload-products/{{$carrito[$array]['ArchivoA']}}" type="application/pdf" scrolling="no"></iframe>
          </div>
          @elseif(($carrito[$array]['img1']=='otro') && ($carrito[$array]['img2']==''||$carrito[$array]['img2']=='otro') )
          <div class="col-md-12 center producto-cart-img">
            <i class="far fa-file-image fa-7x"></i>
          </div>
          @elseif(($carrito[$array]['img1']=='png'||$carrito[$array]['img1']=='jpg') && ($carrito[$array]['img2']=='png'||$carrito[$array]['img2']=='jpg'))
          <div class="row producto-cart-img">
            <div class="col-md-6">
              <img class="product_car2" src="upload-products/{{$carrito[$array]['ArchivoA']}}" alt="">
            </div>
            <div class="col-md-6">
              <img class="product_car2" src="upload-products/{{$carrito[$array]['ArchivoB']}}" alt="">
            </div>
          </div>
          @elseif(($carrito[$array]['img1']=='pdf') && ($carrito[$array]['img2']=='png'||$carrito[$array]['img2']=='jpg'))
          <div class="row producto-cart-img">
            <div class="col-md-6">
              <iframe  src="upload-products/{{$carrito[$array]['ArchivoA']}}" type="application/pdf" scrolling="no"></iframe>
            </div>
            <div class="col-md-6">
              <img class="product_car2" src="upload-products/{{$carrito[$array]['ArchivoB']}}" alt="">
            </div>
          </div>
          @elseif(($carrito[$array]['img1']=='png'||$carrito[$array]['img1']=='jpg') && ($carrito[$array]['img2']=='pdf'))
          <div class="row producto-cart-img">
            <div class="col-md-6">
              <img class="product_car2" src="upload-products/{{$carrito[$array]['ArchivoA']}}" alt="">
            </div>
            <div class="col-md-6">
              <iframe class="kv-preview-data file-preview-pdf" src="upload-products/{{$carrito[$array]['ArchivoB']}}" type="application/pdf" scrolling="no"></iframe>
            </div>
          </div>
          @elseif(($carrito[$array]['img1']=='pdf') && ($carrito[$array]['img2']=='pdf'))
          <div class="row producto-cart-img">
            <div class="col-md-6">
              <iframe class="kv-preview-data file-preview-pdf" src="upload-products/{{$carrito[$array]['ArchivoA']}}" type="application/pdf" scrolling="no"></iframe>
            </div>
            <div class="col-md-6">
              <iframe class="kv-preview-data file-preview-pdf" src="upload-products/{{$carrito[$array]['ArchivoB']}}" type="application/pdf" scrolling="no"></iframe>
            </div>
          </div>
          @elseif(($carrito[$array]['img1']=='pdf') && ($carrito[$array]['img2']=='otro'))
          <div class="row producto-cart-img">
            <div class="col-md-6">
              <iframe class="kv-preview-data file-preview-pdf" src="upload-products/{{$carrito[$array]['ArchivoA']}}" type="application/pdf" scrolling="no"></iframe>
            </div>
            <div class="col-md-6">
              <i class="far fa-file-image fa-7x"></i>
            </div>
          </div>
          @elseif(($carrito[$array]['img1']=='otro') && ($carrito[$array]['img2']=='pdf'))
          <div class="row producto-cart-img">
            <div class="col-md-6">
              <i class="far fa-file-image fa-7x"></i>
            </div>
            <div class="col-md-6">
              <iframe class="kv-preview-data file-preview-pdf" src="upload-products/{{$carrito[$array]['ArchivoB']}}" type="application/pdf" scrolling="no"></iframe>
            </div>
          </div>
          @elseif(($carrito[$array]['img1']=='otro') && ($carrito[$array]['img2']=='jpg'||$carrito[$array]['img2']=='png'))
          <div class="row producto-cart-img">
            <div class="col-md-6">
              <i class="far fa-file-image fa-7x"></i>
            </div>
            <div class="col-md-6">
              <img class="product_car2" src="upload-products/{{$carrito[$array]['ArchivoB']}}" alt="">
            </div>
          </div>
          @endif
          <div class="row">
            <div class="col-md-12 ">
              <a href="#!" data-id="{{$carrito[$array]['IdA']}}" class="elimianr_product" >REMOVE</a>
            </div>
          </div>
        </div>
        <div class="col-md-7">
          <h5><strong>{{$carrito[$array]['nombre']}}</strong></h5>
          <div class="row">
            <div class="col-md-6">
              <strong>Size: </strong>{{$carrito[$array]['attr1']}}
              <br>
              <strong>Stock: </strong>{{$carrito[$array]['attr2']}}
              <br>
              <strong>Printed Side: </strong>{{$carrito[$array]['attr3']}}
              <br>
              <strong>Coating: </strong>{{$carrito[$array]['attr4']}}
            </div>
            <div class="col-md-6">
              @if($carrito[$array]['attr5']!='')
              @if(($carrito[$array]['attr1']=='3" x 4"' && $carrito[$array]['attr4']=='Matte/Dull Finish')||($carrito[$array]['attr1']=='3" x 4"' && $carrito[$array]['attr4']=='Full UV on Front Only'))
              <strong>Drill Hole: </strong>{{$carrito[$array]['attr5']}}
              <br>
              @else
              <strong>Cornes: </strong>{{$carrito[$array]['attr5']}}
              <br>
              @endif
              @endif
              <strong>Ships In: </strong>{{$carrito[$array]['attr11']}}
              <br>
              <strong>Quantity: </strong>{{$carrito[$array]['attr10']}}
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-3 rosa">
      <p class="center"><strong>${{$carrito[$array]['attr12']}}</strong></p>
      @if($carrito[$array]['Notas']!='')
      <div class="col-md-12 pruebatxt">
        <div class="row">
          <div class="col-md-6 a_edit">
            <a href="#!" data-id="{{$carrito[$array]['IdA']}}" class="edit_producto_postcards" >EDIT ORDER</a>
          </div>
          <input type="hidden" name="" value="{{$carrito[$array]['Notas']}}">
          <div class="col-md-6 a_edit">
            <a href="#!" data-id="{{$carrito[$array]['IdA']}} "  class="edit_details">EDIT DETAILS</a>
          </div>
        </div>
      </div>
      @else
      <div class="col-md-12 pruebatxt center a_edit">
        <a href="#!" data-id="{{$carrito[$array]['IdA']}}" class="edit_producto_postcards" >EDIT ORDER</a>
      </div>
      @endif
    </div>
  </div>
  @endif
  @endforeach
  <div class="divshipping ">
    <h5><strong>Shipping</strong></h5>
    <div class="row">
      <div class="col-md-6">
        <div class="zip-title">
          <label><strong>Zip code</strong></label>
        </div>
        <div class="row" >
          @if (Route::has('login'))
          @auth
          <div class="col-md-4">
            <input class="btnshiping" maxlength="5" id="zipcode" type="text" name="" value="{{Auth::user()->zip_code}}">
          </div>
          @else
          <div class="col-md-4">
            <input class="btnshiping"   maxlength="5" id="zipcode" type="text" name="" value="" >
          </div>
          @endauth
          @endif
          <div class="col-md-8">
            <button class="ShowOptions" ng-click="callshiping()">Show Options</button>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div id="pleasewait" >
          <img src="{!! asset('images/tenor.gif') !!}" style="width: 40%">
        </div>
        <div id="Shipto">
          <div ng-hide="divsoculto" class="producto-cart-img">
            <strong >Select an option</strong>
          </div>
          <div ng-repeat="items in shipingarray | orderBy:'index'" id="dv@{{items.id}}" ng-click="selectshiping(items.value)" class='shipingrow'>
            <div class="row">
              <div class='col-md-8 col-sm-8'>
                <strong>@{{items.name}}</strong>
              </div>
              <div class='col-md-4 col-sm-4'>$ @{{items.value}}
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="col-md-12">
    <h4><strong>ORDER SUMMARY</strong></h4>
    <div class="row row_summary">
      <div class="col-md-6 col-xs-6">
        <span><strong>Printing Cost</strong></span><br>
        <span><strong>Shipping & Handling</strong></span><br>
        <span><strong>Tax</strong></span><br>
      </div>
      <div class="col-md-6 col-xs-6">
        <span>
          <strong>$</strong>
          <strong id="total_value">{{$total}}
          </strong>
        </span>
        <br>
        <strong>$</strong>
        <span><strong id="shipping-cost">-</strong></span><br>
        <strong>$</strong>
        <span><strong id="tax">-</strong></span><br>
      </div>
    </div>
    @if (Route::has('login'))
    @auth
    <div class="row">
      <div id="AmazonPayButton" class="btn-amazon-checkout" >
      </div>
      <div class="or">
        <strong>or</strong>
      </div>
      <button class="checkoutbnt">
        <a href="{{route('checkout')}}">CHECKOUT</a>
      </button>
      <script type="text/javascript">
       window.onAmazonLoginReady = function () {
        try {
          amazon.Login.setClientId("<?php echo $amazonpay_config['client_id']; ?>");
        } catch (err) {
          alert(err);
        }
      };
      window.onAmazonPaymentsReady = function () {
        var authRequest;
        OffAmazonPayments.Button("AmazonPayButton", "<?php echo $amazonpay_config['merchant_id']; ?>", {
          type: "PwA",
          color: "Gold",
          size: "medium",
          language: "en-GB",
          authorization: function() {
            loginOptions = { scope: "postal_code payments:widget payments:shipping_address", popup: true };
            authRequest = amazon.Login.authorize(loginOptions, "SetPaymentDetails");
          },
          onError: function(error) {
            console.log(error)
          }
        });
      };
    </script>
  </div>
  @else
  <div class="row">
    <div id="AmazonLoginButton" class="btn-amazon-checkout " >
    </div>
    <div class="or">
      <strong>or</strong>
    </div>

    <button class="checkoutbnt ">
      <a href="{{ route('login') }}">Checkout </a>
    </button>
    <script type="text/javascript">
      $.ajaxSetup({
        headers: {
          'X-CSRF-Token': $('meta[name=_token]').attr('content')
        }
      });
      window.onAmazonLoginReady = function () {
        try {
          amazon.Login.setClientId("<?php echo $amazonpay_config['client_id']; ?>");
        } catch (err) {
          alert(err);
        }
      };
      window.onAmazonLoginReady = function () {
        amazon.Login.setClientId('<?php echo $amazonpay_config['client_id']; ?>');
        var authRequest;
        OffAmazonPayments.Button("AmazonLoginButton", "<?php echo $amazonpay_config['merchant_id']; ?>", {
    type: "LwA",      // PwA, Pay, A, LwA, Login
    color: "Gold",    // Gold, LightGray, DarkGray
    size: "mediun",   // small, medium, large, x-large
    language: "en-GB",
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

  </div>
  @endauth
  @endif
</div>

@else
<div class="cart-empty">
  <center><h2>YOUR SHOPPING CART IS EMPTY</h2></center>
  <h1>{{ Session::get('carrito') }}</h1>
</div>
@endif
</div>
<!-- Modal edit details-->
<!-- business Cards-->
<div class="modal fade" id="miModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" enctype="multipart/form-data">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 id="exampleModalLabel">CHARACTERISTICS</h4>
      </div>
      <div class="modal-body">
        <form action="{{route('update-product')}}"  method="POST"  enctype="multipart/form-data">
          {{csrf_field()}}
          <input type="hidden" name="idP" id="Modal_idP" value="">
          <input type="hidden" name="idA" id="Modal_idA" value="">
          <input type="hidden" name="idE" id="Modal_idE" value="">

          <input type="hidden" name="notas_2" id="Modal_notas_2" value="">

          <div class="row">
            <div class="col-md-6">
              <span>Size: </span>
            </div>
            <div class="col-md-6">
              <input class="input-update" type="text" id="size" name="" value="" disabled>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <span>Paper Type: </span>
            </div>
            <div class="col-md-6">
              <input class="input-update"  name="papertype"  id="papertype" disabled>
            </div>
          </div>
          <div class="row" id="row_edge">
            <div class="col-md-6">
              <p>Edge Color:</p>
            </div>
            <div class="col-md-6">
              <select class="selectdetalles selector2" name="edge_color"  id="edge_color" onchange="Color_change()" >
              </select>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <span>Printed Side:</span>
            </div>
            <div class="col-md-6">
              <input class="input-update" name="printedside"  id="printedside" disabled>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <span>Coating:</span>
            </div>
            <div class="col-md-6">
              <input class="input-update" name="coating"  id="coating" disabled>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <span>Corners:</span>
            </div>
            <div class="col-md-6">
              <input class="input-update" name="corners"  id="corners" disabled>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <p>Quantity:</p>
            </div>
            <div class="col-md-6 filter_select">
              <select class="selectdetalles selector2" name="quantity"  id="quantity" onchange="quantity_change()" required>
              </select>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <p>Printing Time:</p>
            </div>
            <div class="col-md-6 filter_select">
              <select class="selectdetalles selector2" name="printingtime"  id="printingtime" onchange="printingtime_change()" required>
              </select>
            </div>
          </div>
          <div class="div_printing_up">
            <div class="row">
              <div class="col-md-6">
                <p>Printing Cost:</p>
              </div>
              <div class="col-md-6 ">
                <h3 class="result_price">
                  <strong>$</strong>
                  <input type="hidden" name="total_update" id="total_update" value="">
                  <strong   id="labeltxt" disabled>
                  </strong>
                </h3>
              </div>
            </div>
          </div>
          <button type="submit" class="botonmodal " value="Submit">
            UPDATE
          </button>
        </form>
      </div>
    </div>
  </div>
</div>
<!--  coneccion api ups shiping -->
<!-- Postcards-->
<div class="modal fade" id="miModal_Postcards" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" enctype="multipart/form-data">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 id="exampleModalLabel">CHARACTERISTICS</h4>
      </div>
      <div class="modal-body">
        <form action="{{route('update-product')}}"  method="POST"  enctype="multipart/form-data">
          {{csrf_field()}}
          <input type="hidden" name="idP" id="Modal_idP_postcards" value="">
          <input type="hidden" name="idA" id="Modal_idA_postcards" value="">
          <div class="row">
            <div class="col-md-6">
              <span>Size: </span>
            </div>
            <div class="col-md-6">
              <input class="input-update" type="text" id="size_postcards" name="" value="" disabled>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <span>Stock: </span>
            </div>
            <div class="col-md-6">
              <input class="input-update"  name="stock_postcards"  id="stock_postcards" disabled>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <span>Printed Side:</span>
            </div>
            <div class="col-md-6">
              <input class="input-update" name="printedside_postcards"  id="printedside_postcards" disabled>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6">
              <span>Coating:</span>
            </div>
            <div class="col-md-6">
              <input class="input-update" name="coating_postcards"  id="coating_postcards" disabled>
            </div>
          </div>

          <div class="row" id="row_edge_postcards">
            <div class="col-md-6">
              <p>Drill Hole:</p>
            </div>
            <div class="col-md-6">
              <input class="input-update" name="drill_holle"  id="drill_holle" disabled>
            </div>
          </div>
          <div class="row" id="row_edge_postcards2">
            <div class="col-md-6">
              <p>Cornes:</p>
            </div>
            <div class="col-md-6">
              <input class="input-update" name="corners_postcards"  id="corners_postcards" disabled>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <p>Quantity:</p>
            </div>
            <div class="col-md-6 filter_select">
              <select class="selectdetalles selector2" name="quantity_postcards"  id="quantity_postcards" onchange="quantity_change_postcards()" required>
              </select>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <p>Printing Time:</p>
            </div>
            <div class="col-md-6 filter_select">
              <select class="selectdetalles selector2" name="printingtime_postcards"  id="printingtime_postcards" onchange="printingtime_change_postcards()" required>
              </select>
            </div>
          </div>
          <div class="div_printing_up">
            <div class="row">
              <div class="col-md-6">
                <p>Printing Cost:</p>
              </div>
              <div class="col-md-6 ">
                <h3 class="result_price">
                  <strong>$</strong>
                  <input type="hidden" name="total_update_postcards" id="total_update_postcards" value="">
                  <strong   id="labeltxt_postcards" disabled>
                  </strong>
                </h3>
              </div>
            </div>
          </div>
          <button type="submit" class="botonmodal " value="Submit">
            UPDATE
          </button>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- Modal edit details-->
<!-- Modal edit details-->
<div class="modal fade" id="edit_details" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" enctype="multipart/form-data">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 id="exampleModalLabel">DETAILS</h4>
      </div>
      <div class="modal-body">
        <form action="{{route('update-product-details')}}"  method="POST"  enctype="multipart/form-data">
          {{csrf_field()}}
          <input type="hidden" name="idP" id="Modal_idPT" value="">
          <input type="hidden" name="idA" id="Modal_idAT" value="">

          <input type="hidden" name="details" id="Modal_details" value="1">
          <div class="col-md-12">
            <textarea class="form-control-designed" rows="5" name="comentario" id="Modal_textarea" required></textarea>
          </div>
          <button type="submit" class="botonmodal " value="Submit">
            UPDATE
          </button>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- Formularions Auth necesarios para registro desde el carrito -->
<!-- login -->
<div  id="loginhide" hidden="">
  <form id="loginform" method="POST" action="{{ route('login') }}" hidden="">
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
    <div class="form-group row">
      <div class="col-md-6 offset-md-4">
        <div class="checkbox">
          <label>
            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('Remember Me') }}
          </label>
        </div>
      </div>
    </div>
    <div class="form-group row mb-0">
      <div class="col-md-8 offset-md-4">
        <button type="submit" class="btn btn-primary">
          {{ __('Login') }}
        </button>
        <a class="btn btn-link" href="{{ route('password.request') }}">
          {{ __('Forgot Your Password?') }}
        </a>
        Or
      </div>
    </div>
  </form>
</div>
<div  id="registerhide" hidden="">
  <form id="registerform" method="POST" action="{{ route('register') }}" hidden="">
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
    <div class="form-group row mb-0" hidden="">
      <div class="col-md-6 offset-md-4">
        <button type="submit" class="btn btn-primary">
          {{ __('Register') }}
        </button>
      </div>
    </div>
  </form>
  @if (Session::has('carrito'))
  <?php
  $totalcount=0;
  foreach ($carrito as $key => $value) {
    $totalcount=$carrito[$key]['attr10']+$totalcount;
  }
  ?>
  @else
  @endif
</div>
<link rel="stylesheet" href="{!! asset('css/paystep.css') !!}"></link>
<!--- Formularions Auth necesarios para registro desde el carrito -->
@endsection
@section('scripts')


<script>
  $('.elimianr_product').click(function(e){
    e.preventDefault();
    var id_A= $(this).attr("data-id");
    $.confirm({
      title: 'Delete Product',
      content: 'Are you sure you want to remove this item from your shopping cart? This cannot be undone. ',
      draggable: false,
      buttons: {
        confirm: function () {
          $.ajaxSetup({
            headers:{
              'X-CSRF-Token': $('meta[name=_token]').attr('content')
            }
          });
          $.ajax({
            url:'eliminar-product',
            data: {idA:id_A},
            type: 'GET',
            success: function (data){
              if (data=="0") {
                deleteCookie('cookie_envio')
                deleteCookie('zip')
                deleteCookie('tax')
                window.location.assign('cart');
              }else{
                window.location.assign('cart');
              }
            }
          }).fail(function (){
            alert("Sorry something were wrong, please try again.");
          });
        },
        cancel: function () {
        },
      }
    })
  });

  function deleteCookie(cname) {
    document.cookie = cname +'=; Path=/; Expires=Thu, 01 Jan 1970 00:00:01 GMT;';
  }


$('.edit_producto').click(function(e){
  e.preventDefault();
  var id_A= $(this).attr("data-id");
  $('#Modal_idA').val('')
  $('#Modal_idP').val('')
  $('#Modal_idE').val('')
  $('#size').val('')
  $('#papertype').val('')
  $('#edge_color').empty('')
  $('#printedside').val('')
  $('#coating').val('')
  $('#corners').val('')
  $("#quantity").empty()
  $("#printingtime").empty()
  $('#total_update').empty()
  $('#labeltxt').empty()
  $.get("consult-update-product/"+id_A, function(result){
    $("#miModal").modal();
    if (result[7]=="") {
      $('#row_edge').css('display','none')
      $('#Modal_idA').val(id_A)
      $('#Modal_idP').val(result[0])
      $('#Modal_idE').val(result[1])
      $('#size').val(result[2] )
      $('#papertype').val(result[3] )
      $('#printedside').val(result[4] )
      $('#coating').val(result[5])
      $('#corners').val(result[6])
      $("#quantity").append("<option value='"+result[8]+"'>"+result[8]+"</option>")
      for(i=0; i<result[11].length; i++){
        if (result[11][i].attr10!==result[8] ){
          $("#quantity").append("<option value='"+result[11][i].attr10+"'>"+result[11][i].attr10+"</option>")
        }
      };
      $("#printingtime").append("<option value='"+result[9]+"'>"+result[9]+"</option>")
      for(i=0; i<result[12].length; i++){
        if (result[12][i].attr11!==result[9] ){
          $("#printingtime").append("<option value='"+result[12][i].attr11+"'>"+result[12][i].attr11+"</option>")
        }
      };
      $('#total_update').val(parseFloat(result[10]).toFixed(2));
      $('#labeltxt').html(parseFloat(result[10]).toFixed(2));
      $('#Modal_notas_2').val(result[13])
    }else {
      $('#row_edge').css('display','flex');
      $('#Modal_idA').val(id_A)
      $('#Modal_idP').val(result[0])
      $('#Modal_idE').val(result[1])
      $('#size').val(result[2] )
      $('#papertype').val(result[3] )
      $("#edge_color").append("<option value='"+result[7]+"'>"+result[7]+"</option>")
      for(i=0; i<result[8].length; i++){
        if (result[8][i].attr6!==result[7] ){
          $("#edge_color").append("<option value='"+result[8][i].attr6+"'>"+result[8][i].attr6+"</option>")
        }
      };
      $('#printedside').val(result[4])
      $('#coating').val(result[5])
      $('#corners').val(result[6])
      $("#quantity").append("<option value='"+result[9]+"'>"+result[9]+"</option>")
      for(i=0; i<result[12].length; i++){
        if (result[12][i].attr10!==result[9] ){
          $("#quantity").append("<option value='"+result[12][i].attr10+"'>"+result[12][i].attr10+"</option>")
        }
      };
      $("#printingtime").append("<option value='"+result[10]+"'>"+result[10]+"</option>")
      for(i=0; i<result[13].length; i++){
        if (result[13][i].attr11!==result[10] ){
          $("#printingtime").append("<option value='"+result[13][i].attr11+"'>"+result[13][i].attr11+"</option>")
        }
      };
      $('#total_update').val(parseFloat(result[11]).toFixed(2));
      $('#labeltxt').html(parseFloat(result[11]).toFixed(2));
      $('#Modal_notas_2').val(result[14])
    }
  })
})


  $('.edit_details').click(function(e){
    e.preventDefault();
    var id_A= $(this).attr("data-id");
    $('#Modal_idA').val('');
    $('#Modal_idP').val('');
    $.get("consult-update-details/"+id_A, function(result){
      var idP =  result[0];
      var Nota =result[1];
      $("#edit_details").modal();
      $('#Modal_idAT').val(id_A);
      $('#Modal_idPT').val(idP);
      $('#Modal_textarea').val(Nota);
    });
  });

function Color_change(){
  var id_product = $("#Modal_idP").val()
  var attr1=$("#size").val()
  var attr2=$("#papertype").val()
  var attr3=$("#printedside").val()
  var attr4=$("#coating").val()
  var attr5=$("#corners").val()
  var attr6=$("#edge_color").val()
  var attr10=$("#quantity").val()
  var attr11=$("#printingtime").val()
  $.get("search_attr12_BC_color/"+id_product+"/"+attr1+"/"+attr2+"/"+attr3+"/"+attr4+"/"+attr5+"/"+attr6+"/"+attr10+"/"+attr11,function(result){
    $('#Modal_idE').val(result[0]['id_especificaciones'])
  })
}

function quantity_change(){
  var id_product =  $('#Modal_idP').val();
  var at1=$("#size").val();
  var at2=$("#papertype").val();
  var at3=$("#printedside").val();
  var at4=$("#coating").val();
  var at5=$("#corners").val();
  var at10=$("#quantity").val();
  var nota =$("#Modal_notas_2").val()
  if (at2=="32pt Uncoated Painted EDGE"){
    var attr6=$("#edge_color").val();
    var at6=$("#edge_color").val()
    $.ajaxSetup({
      headers:{
        'X-CSRF-Token': $('meta[name=_token]').attr('content')
      }
    })
    $.ajax({
      url:'search_attr10_BC_color',
      data:{idp:id_product,atr1:at1,atr2:at2,atr3:at3,atr4:at4,atr5:at5,atr6:at6,atr10:at10},
      type:'POST',
      success: function(result){
        $('#Modal_idE').val(result[0]['id_especificaciones'])
        $('#total_update').empty()
        $('#labeltxt').empty()
        if (nota==='0'){
          price = parseFloat(result[0]['atr12'])
          price= (price+50.00).toFixed(2)
          $('#total_update').val(price)
          $('#labeltxt').html(price)
        }else{
          $('#total_update').val(result[0]['atr12'])
          $('#labeltxt').html(result[0]['atr12'])
        }
      }
    })
  }else{
    $.ajaxSetup({
      headers:{
        'X-CSRF-Token': $('meta[name=_token]').attr('content')
      }
    })
    $.ajax({
      url:'search_attr10_BC_car',
      data:{idp:id_product,atr1:at1,atr2:at2,atr3:at3,atr4:at4,atr5:at5,atr10:at10},
      type:'POST',
      success: function(result){
        $("#printingtime").empty()
        $('#total_update').empty()
        $('#labeltxt').empty()
        $('#Modal_idE').val(result[0][0]['id_especificaciones'])
        if (nota==='0') {
          price = parseFloat(result[0][0]['atr12'])
          price= (price+50.00).toFixed(2)
          $('#total_update').val(price)
          $('#labeltxt').html(price)
        }else{
          $('#total_update').val(result[0][0]['atr12'])
          $('#labeltxt').html(result[0][0]['atr12'])
        }
        $("#printingtime").append("<option value='"+result[0][0]['attr11']+"'>"+result[0][0]['attr11']+"</option>")
        for(i=0; i<result[1].length; i++){
          if (result[1][i].attr11!==result[0][0]['attr11'] ){
            $("#printingtime").append("<option value='"+result[1][i].attr11+"'>"+result[1][i].attr11+"</option>")
          }
        };
      }
    })
  }
}

function printingtime_change(){
  var id_product =  $('#Modal_idP').val()
  var at1=$("#size").val()
  var at2=$("#papertype").val()
  var at3=$("#printedside").val()
  var at4=$("#coating").val()
  var at5=$("#corners").val()
  var at10=$("#quantity").val()
  var at11=$("#printingtime").val()
  var nota =$("#Modal_notas_2").val()
  if (at2=="32pt Uncoated Painted EDGE"){
    var at6=$("#edge_color").val()
    $.ajaxSetup({
      headers:{
        'X-CSRF-Token': $('meta[name=_token]').attr('content')
      }
    })
    $.ajax({
      url:'search_attr11_BC_color',
      data:{idp:id_product,atr1:at1,atr2:at2,atr3:at3,atr4:at4,atr5:at5,atr6:at6,atr10:at10,atr11:at11},
      type:'POST',
      success: function(result){
        $('#Modal_idE').val(result[0]['id_especificaciones'])
        $('#total_update').empty()
        $('#labeltxt').empty()
        if (nota==='0'){
          price = parseFloat(result[0]['attr12'])
          price= (price+50.00).toFixed(2)
          $('#total_update').val(price)
          $('#labeltxt').html(price)
        }else{
          $('#total_update').val(result[0]['atr12'])
          $('#labeltxt').html(result[0]['atr12'])
        }
      }
    })
  }else{
    $.ajaxSetup({
      headers:{
        'X-CSRF-Token': $('meta[name=_token]').attr('content')
      }
    })
    $.ajax({
      url:'search_attr11_BC',
      data:{idp:id_product,atr1:at1,atr2:at2,atr3:at3,atr4:at4,atr5:at5,atr10:at10,atr11:at11},
      type:'POST',
      success: function(result){
        $('#Modal_idE').val(result[0]['id_especificaciones'])
        $('#total_update').empty()
        $('#labeltxt').empty()
        if (nota==='0'){
          price = parseFloat(result[0]['attr12'])
          price= (price+50.00).toFixed(2)
          $('#total_update').val(price)
          $('#labeltxt').html(price)
        }else{
          $('#total_update').val(result[0]['atr12'])
          $('#labeltxt').html(result[0]['atr12'])
        }
      }
    })
  }
}








//postcards
$('.edit_producto_postcards').click(function(e){
  e.preventDefault();
  var id_A= $(this).attr("data-id");
  $('#Modal_idA_postcards').val('');
  $('#Modal_idP_postcards').val('');
  $('#size_postcards').val('');
  $('#stock_postcards').val('');
  $('#printedside_postcards').val('');
  $('#coating_postcards').val('');
  $('#drill_holle').val('');
  $('#corners_postcards').val('');
  $("#quantity_postcards").empty();
  $("#printingtime_postcards").empty();
  $('#total_update_postcards').empty();
  $('#labeltxt_postcards').empty();
  $.get("consult-update-product/"+id_A, function(result){
    var idP =  result[0];
    var attr1 =result[1];
    var attr2 =result[2];
    var attr3 =result[3];
    var attr4 =result[4];
    var attr5 =result[5];
    $("#miModal_Postcards").modal();
    if (result[6]==1) {
      //tiene drill
      $('#row_edge_postcards').css('display','flex');
      $('#row_edge_postcards2').css('display','none');
      $('#Modal_idA_postcards').val(id_A);
      $('#Modal_idP_postcards').val(idP);
      $('#size_postcards').val(attr1);
      $('#stock_postcards').val(attr2);
      $('#printedside_postcards').val(attr3);
      $('#coating_postcards').val(attr4);
      $('#drill_holle').val(attr5);
      $("#quantity_postcards").append("<option>Select</option>");
      for(i=0; i<result[8].length; i++){
        $("#quantity_postcards").append("<option value='"+result[8][i].attr10+"'>"+result[8][i].attr10+"</option>");
      };
    }else if (result[6]==2) {
      //tiene Corness
      $('#row_edge_postcards').css('display','none');
      $('#row_edge_postcards2').css('display','flex');
      $('#Modal_idA_postcards').val(id_A);
      $('#Modal_idP_postcards').val(idP);
      $('#size_postcards').val(attr1);
      $('#stock_postcards').val(attr2);
      $('#printedside_postcards').val(attr3);
      $('#coating_postcards').val(attr4);
      $('#corners_postcards').val(attr5);
      $("#quantity_postcards").append("<option>Select</option>");
      for(i=0; i<result[8].length; i++){
        $("#quantity_postcards").append("<option value='"+result[8][i].attr10+"'>"+result[8][i].attr10+"</option>");
      };
    }else {
      $('#row_edge_postcards').css('display','none');
      $('#row_edge_postcards2').css('display','none');
      $('#Modal_idA_postcards').val(id_A);
      $('#Modal_idP_postcards').val(idP);
      $('#size_postcards').val(attr1);
      $('#stock_postcards').val(attr2);
      $('#printedside_postcards').val(attr3);
      $('#coating_postcards').val(attr4);
      $("#quantity_postcards").append("<option>Select</option>");
      for(i=0; i<result[8].length; i++){
        $("#quantity_postcards").append("<option value='"+result[8][i].attr10+"'>"+result[8][i].attr10+"</option>");
      };
    }
  });
});

function quantity_change_postcards(){
  var id_product =  $('#Modal_idP_postcards').val();
  var attr1=  $('#size_postcards').val();
  var attr2=  $('#stock_postcards').val();
  var attr3=  $('#printedside_postcards').val();
  var attr4=  $('#coating_postcards').val();
  var attr10=  $("#quantity_postcards").val();
  var attr51=  $('#drill_holle').val();
  var attr52=  $('#corners_postcards').val();
  if ( (attr51==="" || attr51==null) && (attr52==="" || attr52==null)){
    $.ajaxSetup({
      headers:{
        'X-CSRF-Token': $('meta[name=_token]').attr('content')
      }
    });
    $.ajax({
      url:'postcardsattr11',
      data:{atr1:attr1,atr2:attr2,atr3:attr3,atr4:attr4,atr10:attr10,},
      type:'POST',
      success: function(result){
        $("#printingtime_postcards").empty();
        $('#total_update_postcards').val('');
        $('#labeltxt_postcards').empty();
        $("#printingtime_postcards").append("<option>Select</option>");
        for(i=0; i<result.length; i++){
          $("#printingtime_postcards").append("<option value='"+result[i].attr11+"'>"+result[i].attr11+"</option>");
        };
      }
    });
  }else{
    if (attr51==="" || attr51==null) {
      var attr5=$("#corners_postcards").val();
    }else {
      var attr5=$("#drill_holle").val();
    }
    $.ajaxSetup({
      headers:{
        'X-CSRF-Token': $('meta[name=_token]').attr('content')
      }
    });
    $.ajax({
      url:'postcardsattr11_drill',
      data:{atr1:attr1,atr2:attr2,atr3:attr3,atr4:attr4,atr5:attr5,atr10:attr10,},
      type:'POST',
      success: function(result){
        $("#printingtime_postcards").empty();
        $('#total_update_postcards').val('');
        $('#labeltxt_postcards').empty();

        $("#printingtime_postcards").append("<option>Select</option>");
        for(i=0; i<result.length; i++){
          $("#printingtime_postcards").append("<option value='"+result[i].attr11+"'>"+result[i].attr11+"</option>");
        }
      }
    })
  }
}

function printingtime_change_postcards(){
  var id_product =  $('#Modal_idP_postcards').val();
  var attr1=  $('#size_postcards').val();
  var attr2=  $('#stock_postcards').val();
  var attr3=  $('#printedside_postcards').val();
  var attr4=  $('#coating_postcards').val();
  var attr5=  $('#drill_holle').val();
  var attr10=  $("#quantity_postcards").val();
  var attr11=  $("#printingtime_postcards").val();
  if (attr5===""||attr5==null){
    $.ajaxSetup({
      headers:{
        'X-CSRF-Token': $('meta[name=_token]').attr('content')
      }
    });
    $.ajax({
      url:'postcardsattr12',
      data:{atr1:attr1,atr2:attr2,atr3:attr3,atr4:attr4,atr10:attr10,atr11:attr11,},
      type:'POST',
      success: function(result){
        var attr12= result[0].attr12;
        var id_especificaciones=result[0].id_especificaciones;
        $('#total_update_postcards').val(attr12);
        $('#labeltxt_postcards').html(attr12);
      }
    })
  }else{
    $.ajaxSetup({
      headers:{
        'X-CSRF-Token': $('meta[name=_token]').attr('content')
      }
    });
    $.ajax({
      url:'postcardsattr12_drill',
      data:{atr1:attr1,atr2:attr2,atr3:attr3,atr4:attr4,atr5:attr5,atr10:attr10,atr11:attr11,},
      type:'POST',
      success: function(result){
        var attr12= result[0].attr12;
        var id_especificaciones=result[0].id_especificaciones;
        $('#total_update_postcards').val(attr12);
        $('#labeltxt_postcards').html(attr12);
      }
    });

  }


}

// script ops shiping
</script>
<script type="text/javascript" src="{!! asset('js/cartjs.js') !!}"></script>
@endsection
