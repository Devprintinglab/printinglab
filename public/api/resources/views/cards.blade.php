@extends('layouts.app')
@section('title')
Marketing Products - Printing Lab
@endsection
@section('content')
<div class="container textoscontainer">
  <div class="row">
    <div class="col-md-3 links-a-marketing">
      <ul>
        <div>
          <strong>BUSINESS CARDS</strong>
        </div>
        <li><a href="business-cards1"><span>Standard Business Cards</span></a> </li>
        <li><a href="business-cards2"><span>Square Business Cards</span></a> </li>
        <li><a href="business-cards3"><span>Circle Business Cards</span></a> </li>
        <li><a href="business-cards4"><span>Slim Business Cards</span></a> </li>
        <li><a href="business-cards5"><span>Plastic Business Cards</span></a> </li>
        <li><a href="business-cards6"><span>Oval Business Cards</span></a> </li>
      </ul>
    </div>
    <div class="col-md-9">
      <div class="row">
        <div class="col-md-4 col-xs-6 divs_MP_products" >
          <a  href="business-cards1">
            <img src="images/marketing/cards/standard-business-card-2x3.5-printing-lab-new-york-1.jpg">
          </a>
          <div class="tittle-products-BC">
            <a href="business-cards1">
              <span>Standard Business Cards</span>
            </a>
          </div>
        </div>
        <div class="col-md-4 col-xs-6 divs_MP_products" >
          <a  href="business-cards2">
            <img src="images/marketing/cards/square-business-card-2x2-printing-lab-new-york.jpg">
          </a>
          <div class="tittle-products-BC">
            <a href="business-cards2">
              <span>Square Business Cards</span>
            </a>
          </div>
        </div>
        <div class="col-md-4 col-xs-6 divs_MP_products" >
          <a  href="business-cards3">
            <img src="images/marketing/cards/circle-business-cards-2.5x2.5-printing-lab-new-york.jpg">
          </a>
          <div class="tittle-products-BC">
            <a href="business-cards3">
              <span>Circle Business Cards</span>
            </a>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4 col-xs-6 divs_MP_products" >
          <a  href="business-cards4">
            <img src="images/marketing/cards/slim-business-card-1.75x3.5-printing-lab-new-york.jpg">
          </a>
          <div class="tittle-products-BC">
            <a href="business-cards4">
              <span>Slim Business Cards</span>
            </a>
          </div>
        </div>
        <div class="col-md-4 col-xs-6 divs_MP_products" >
          <a  href="business-cards5">
            <img src="images/marketing/cards/plastic-business-card-2x3.5-printing-lab-new-york.jpg">
          </a>
          <div class="tittle-products-BC">
            <a href="business-cards5">
              <span>Plastic Business Cards</span>
            </a>
          </div>
        </div>
        <div class="col-md-4 col-xs-6 divs_MP_products">
          <a  href="business-cards6">
            <img src="images/marketing/cards/oval-business-card-2x3.5-printing-lab-new-york-1.jpg">
          </a>
          <div class="tittle-products-BC">
            <a href="business-cards6">
              <span>Oval Business Cards</span>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
