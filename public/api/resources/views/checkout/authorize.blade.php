@extends('layouts.app')
@section('title')
Marketing Products - Printing Lab
@endsection
@section('content')
<?php
$carrito =Session::get('carrito');
?>
<!-- <div class="pageload" id="pageload"></div>
<div id="preloader">
    <div class="flexloader"><div class="loader"><i class="fa fa-cog fa-4x yellow"></i><i class="fa fa-cog fa-4x black"></i></div></div>
</div> -->
<div id="Checkout" class="container" ng-controller="cartcontroller">
 <h2 class="font-bold pt-4 pb-5 mb-5"><strong>Checkout </strong></h2>
 <div class="row">
    <div class="col-md-12 Checkoutcontainer">

        <!-- Stepper -->
        <div class="steps-form-2 ">
            <div class="steps-row-2 setup-panel-2 d-flex justify-content-between">
                <div class="steps-step-2 boxiconR">
                    <a id="paystep1" href="#step-1" type="button" class=" btn-actived btn btn-amber btn-circle-2 waves-effect ml-0" data-toggle="tooltip" data-placement="top" title="Your details"><div class="icodetails"></div></a>
                </div>
                <div class="steps-step-2 boxicon">
                    <a id="paystep2" href="#step-2" type="button" class="btn-disbled btn btn-blue-grey btn-circle-2 waves-effect" data-toggle="tooltip" data-placement="top" title="Delivery"><div class="icopay"></div></a>
                </div>
                <div class="steps-step-2 boxiconL">
                    <a id="paystep3" href="#step-3" type="button" class="btn-disbled btn btn-blue-grey btn-circle-2 waves-effect" data-toggle="tooltip" data-placement="top" title="Payment"><div class="icodone"></div></a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <div class="jumbotroncolor" style="padding-top:25px;" id="api-content">
                    <div class="row setup-content-2" id="step-1">
                        <div class="col-md-12">
                            <h3 class="font-weight-bold pl-0 my-4"><strong>Billing details</strong></h3>
                            <form>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="firstname">First Name*</label>
                                            @if (Route::has('login'))
                                            @auth
                                            <input type="text" class="form-control" id="firstname" value="{{Auth::user()->name}}" required>
                                            @else
                                            <input type="text" class="form-control" id="firstname" required>
                                            @endauth
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                      <div class="form-group">
                                        <label for="lastname">Last Name*</label>
                                        @if (Route::has('login'))
                                        @auth
                                        <input type="text" class="form-control" id="lastname" value="{{Auth::user()->last_name}}" required>
                                        @else
                                        <input type="text" class="form-control" id="lastname" required>
                                        @endauth
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="companyname">Company name</label>
                                        <input type="text" class="form-control" id="companyname">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email">Email*</label>
                                        @if (Route::has('login'))
                                        @auth
                                        <input type="email" class="form-control" id="email" value="{{Auth::user()->email}}" required>
                                        @else
                                        <input type="email" class="form-control" id="email" required>
                                        @endauth
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <label for="phone">Phone*</label>
                                    @if (Route::has('login'))
                                    @auth
                                    <input type="text" class="form-control" id="phone" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" value="{{Auth::user()->phone}}" required>
                                    @else
                                    <input type="text" class="form-control" id="phone" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" required>
                                    @endauth
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="Address">Address*</label>
                                    @if (Route::has('login'))
                                    @auth
                                    <input type="text" class="form-control" id="Address" value="{{Auth::user()->address}}"  required>
                                    @else
                                    <input type="text" class="form-control" id="Address"  required>
                                    @endauth
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="city">Town / City*</label>
                                    <input type="text" class="form-control" id="city" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="zipcode">ZIP Code*</label>
                                    @if (Route::has('login'))
                                    @auth
                                    <input type="text" class="form-control" id="zipcode" pattern="[0-9]{5}" value="{{Auth::user()->zip_code}}" required>
                                    @else
                                    <input type="text" class="form-control" id="zipcode" pattern="[0-9]{5}" required>
                                    @endauth
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label for="inputState">State*</label>
                                <select id="inputState" class="form-control" required>
                                    <option selected>Choose...</option>
                                    <option value="AL">Alabama</option>
                                    <option value="AK">Alaska</option>
                                    <option value="AZ">Arizona</option>
                                    <option value="AR">Arkansas</option>
                                    <option value="CA">California</option>
                                    <option value="CO">Colorado</option>
                                    <option value="CT">Connecticut</option>
                                    <option value="DE">Delaware</option>
                                    <option value="DC">District Of Columbia</option>
                                    <option value="FL">Florida</option>
                                    <option value="GA">Georgia</option>
                                    <option value="HI">Hawaii</option>
                                    <option value="ID">Idaho</option>
                                    <option value="IL">Illinois</option>
                                    <option value="IN">Indiana</option>
                                    <option value="IA">Iowa</option>
                                    <option value="KS">Kansas</option>
                                    <option value="KY">Kentucky</option>
                                    <option value="LA">Louisiana</option>
                                    <option value="ME">Maine</option>
                                    <option value="MD">Maryland</option>
                                    <option value="MA">Massachusetts</option>
                                    <option value="MI">Michigan</option>
                                    <option value="MN">Minnesota</option>
                                    <option value="MS">Mississippi</option>
                                    <option value="MO">Missouri</option>
                                    <option value="MT">Montana</option>
                                    <option value="NE">Nebraska</option>
                                    <option value="NV">Nevada</option>
                                    <option value="NH">New Hampshire</option>
                                    <option value="NJ">New Jersey</option>
                                    <option value="NM">New Mexico</option>
                                    <option value="NY">New York</option>
                                    <option value="NC">North Carolina</option>
                                    <option value="ND">North Dakota</option>
                                    <option value="OH">Ohio</option>
                                    <option value="OK">Oklahoma</option>
                                    <option value="OR">Oregon</option>
                                    <option value="PA">Pennsylvania</option>
                                    <option value="RI">Rhode Island</option>
                                    <option value="SC">South Carolina</option>
                                    <option value="SD">South Dakota</option>
                                    <option value="TN">Tennessee</option>
                                    <option value="TX">Texas</option>
                                    <option value="UT">Utah</option>
                                    <option value="VT">Vermont</option>
                                    <option value="VA">Virginia</option>
                                    <option value="WA">Washington</option>
                                    <option value="WV">West Virginia</option>
                                    <option value="WI">Wisconsin</option>
                                    <option value="WY">Wyoming</option>
                                </select>
                            </div>
                           <!--  93ubT5Hpcc2C
                                 2E3z6KruR
                                 48Cy6rk4H82xD6b9
                                 Simon -->
                             </div>
                         </div>
                         <div id="ShippingCost">
                            <h3 class="font-weight-bold pl-0 my-4"><strong>Delivery Method</strong></h3>
                            <div class="shipingdiv">
                                <div class="row" >
                                    @if (Route::has('login'))
                                    @auth
                                    <div class="col-md-4"><input class="btnshiping" maxlength="5" id="zipcode" type="text" name="" value="{{Auth::user()->zip_code}}" placeholder="Zip code"></div>
                                    @else
                                    <div class="col-md-4"><input class="btnshiping" maxlength="5" id="zipcode" type="text" name="" value="" placeholder="Zip code"></div>
                                    @endauth
                                    @endif
                                    <div class="col-md-8"><button class="ShowOptions" ng-click="callshiping()">Show Options</button></div>
                                    <div id="pleasewait" >
                                        <img src="{!! asset('images/tenor.gif') !!}" style="width: 40%">
                                    </div> 
                                    <div class="col-md-6" id="Shipto" style="padding-bottom: 30px">
                                        <div ng-repeat="items in shipingarray | orderBy:'index'" id="dv@{{items.id}}" ng-click="selectshiping(items.value,items.name)" class='row shipingrow'><div class='col-md-8 col-sm-8'><strong>@{{items.name}}</strong></div><div class='col-md-4 col-sm-4'> $ @{{items.value}}</div ></div>
                                    </div>
                                    <input ng-model="confirmed" ng-change="callshiping()" id="shipingcontrol" type="text" name="" value="" hidden="" required>
                                </div>

                            </div>
                        </div>
                        <button type="submit" ng-click="callshiping()" id="p2" class="btn btn-mdb-color btn-rounded nextBtn-2 float-right" type="button">Next</button>
                    </form>
                </div>
            </div>
            <!-- Second Step -->
            <div class="row setup-content-2" id="step-2" >
                <div class="col-md-12">
                    <h3 class="font-weight-bold pl-0 my-4"><strong>Purchase</strong></h3>

                    <form class="" id="AuthorizePayForm">
                        {{ csrf_field() }}
                        <div class="col-md-12 Checkoutcontainer">
                            <div class="row">
                                <div class="col-md-12">
                                 <div class="form-group">
                                    <label for="Name">Name on card*</label>
                                    @if (Route::has('login'))
                                    @auth
                                    <input type="text" class="form-control" id="Name" name="Name" placeholder="Enter Name on card" value="{{Auth::user()->name}}" required>
                                    @else
                                    <input type="text" class="form-control" id="Name" name="Name" placeholder="Enter Name on card" required>
                                    @endauth
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <img src="./images//payments-checkout.png">
                                </div>
                                <div class="form-group">
                                    <label for="cnumber">Card Number*</label>
                                    <input type="text" class="form-control" id="cnumber" name="cnumber" placeholder="Enter Card Number" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                  <label for="card-expiry-month">Expiration Month*</label>
                                  {{ Form::selectMonth(null, null, ['id' => 'cardexpirymonth','name' => 'card_expiry_month', 'class' => 'form-control', 'required']) }}
                              </div>
                          </div>
                          <div class="col-md-4">
                           <div class="form-group">
                              <label for="card-expiry-year">Expiration Year*</label>
                              {{ Form::selectYear(null, date('Y'), date('Y') + 20, null, ['id' => 'cardexpiryyear','name' => 'card_expiry_year', 'class' => 'form-control', 'required']) }}
                          </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                            <label for="ccode">Card Code*</label>
                            <input type="text" class="form-control" id="ccode" name="ccode" placeholder="Enter Card Code" pattern="[0-9]{3}" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="CAddress">Billing Address*</label>
                            @if (Route::has('login'))
                            @auth
                            <input type="text" class="form-control" id="CAddress" value="{{Auth::user()->address}}" name="CAddress"  required>
                            @else
                            <input type="text" class="form-control" id="CAddress"  name="CAddress" required>
                            @endauth
                            @endif
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="Ccity">Town / City*</label>
                            <input type="text" class="form-control" id="Ccity" name="Ccity" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="Czipcode">ZIP Code*</label>
                            @if (Route::has('login'))
                            @auth
                            <input type="text" class="form-control" id="Czipcode" name="Czipcode" pattern="[0-9]{5}" value="{{Auth::user()->zip_code}}" required>
                            @else
                            <input type="text" class="form-control" id="Czipcode" name="Czipcode" pattern="[0-9]{5}" required>
                            @endauth
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="CinputState">State*</label>
                        <select name="CinputState" id="CinputState" class="form-control" required>
                            <option selected>Choose...</option>
                            <option value="AL">Alabama</option>
                            <option value="AK">Alaska</option>
                            <option value="AZ">Arizona</option>
                            <option value="AR">Arkansas</option>
                            <option value="CA">California</option>
                            <option value="CO">Colorado</option>
                            <option value="CT">Connecticut</option>
                            <option value="DE">Delaware</option>
                            <option value="DC">District Of Columbia</option>
                            <option value="FL">Florida</option>
                            <option value="GA">Georgia</option>
                            <option value="HI">Hawaii</option>
                            <option value="ID">Idaho</option>
                            <option value="IL">Illinois</option>
                            <option value="IN">Indiana</option>
                            <option value="IA">Iowa</option>
                            <option value="KS">Kansas</option>
                            <option value="KY">Kentucky</option>
                            <option value="LA">Louisiana</option>
                            <option value="ME">Maine</option>
                            <option value="MD">Maryland</option>
                            <option value="MA">Massachusetts</option>
                            <option value="MI">Michigan</option>
                            <option value="MN">Minnesota</option>
                            <option value="MS">Mississippi</option>
                            <option value="MO">Missouri</option>
                            <option value="MT">Montana</option>
                            <option value="NE">Nebraska</option>
                            <option value="NV">Nevada</option>
                            <option value="NH">New Hampshire</option>
                            <option value="NJ">New Jersey</option>
                            <option value="NM">New Mexico</option>
                            <option value="NY">New York</option>
                            <option value="NC">North Carolina</option>
                            <option value="ND">North Dakota</option>
                            <option value="OH">Ohio</option>
                            <option value="OK">Oklahoma</option>
                            <option value="OR">Oregon</option>
                            <option value="PA">Pennsylvania</option>
                            <option value="RI">Rhode Island</option>
                            <option value="SC">South Carolina</option>
                            <option value="SD">South Dakota</option>
                            <option value="TN">Tennessee</option>
                            <option value="TX">Texas</option>
                            <option value="UT">Utah</option>
                            <option value="VT">Vermont</option>
                            <option value="VA">Virginia</option>
                            <option value="WA">Washington</option>
                            <option value="WV">West Virginia</option>
                            <option value="WI">Wisconsin</option>
                            <option value="WY">Wyoming</option>
                        </select>
                    </div>
                           <!--  93ubT5Hpcc2C
                                 2E3z6KruR
                                 48Cy6rk4H82xD6b9
                                 Simon -->
                             </div>
                         </div>
                     </div>
                     <input hidden type="text" class="form-control" id="camount" name="camount" required>
                 </form>
                 <button  ng-click="backstep(2)" class="btn btn-mdb-color btn-rounded prevBtn-2 float-left" type="button">Previous</button>

                 <button hidden id="p3" class="btn btn-mdb-color btn-rounded nextBtn-2 float-right" type="button" >Next</button>
                 <button ng-click="AuthorizePay()" class="btn btn-mdb-color btn-rounded float-right" type="button" >Next</button>
             </div>
         </div>
         <!-- Third Step -->
         <div class="row setup-content-2" id="step-3">
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
                    <button ng-click="placeorder()" id="place-order" class="btn btn-lg " style="float: right;">Place Order</button>
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
                        <button ng-click="backstep(3)" class="btn btn-mdb-color btn-rounded prevBtn-2 float-left" type="button">Previous</button>
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
    <input hidden  type="text" name="paytype"  value="Authorize.net" id="paytype">
    <input hidden  type="text" name="cltname"  value="{{Auth::user()->name}}" id="cltname">
    <input hidden  type="mail" name="cltmail"  value="{{Auth::user()->email}}" id="cltmail">
    <input hidden type="text" name="cltadress"   id="cltadress">
    <input hidden type="text" name="cltphone"   id="cltphone">
</form>
<link rel="stylesheet" href="{!! asset('css/paystepcheckout.css') !!}"></link>
<script type="text/javascript" src="{!! asset('js/paystepcheckout.js') !!}"></script>
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
</script>




<!-- <form class="form-horizontal" style="margin-top:40px;" role="form" method="post" action="./Apicalls/ConfirmAndAuthorize.php">
</form> -->
@endsection
