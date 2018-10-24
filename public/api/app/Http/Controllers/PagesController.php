<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{

  public function Home(){
    return view('welcome');
  }
  public function Aboutus(){
    return view('about-us');
  }
  public function ReturnsRefund(){
    return view('returns-and-refund');
  }
  public function PrivacyPolicy(){
    return view('privacy-policy');
  }
  public function TermsConditions(){
    return view('terms-and-conditions');
  }
  public function Signage(){
    return view('signage');
  }
  public function VehicleGraphics(){
    return view('vehicle-graphics');
  }
  public function LargeFormat(){
    return view('large-format');
  }
  public function TradeShows(){
    return view('/trade-shows');
  }
  public function CustomApparel(){
    return view('/custom-apparel');
  }
  public function ContactUs(){
    return view('/contact-us');
  }
  public function Cards(){
    return view('/cards');
  }

  public function ConfirmPaymentAndAuthorize(){
    return view('/ConfirmPaymentAndAuthorize');
  }

  public function handle_login(){
    return view('/home');
  }

  public function amazontest(){
    return view('/amazontest');
  }
  public function landingpage(){
    return view('/landing-page');
  }

  public function SignageMobile(){
    return view('/signage-mobile');
  }
  public function VehicleMobile(){
    return view('/vehicle-graphics-mobile');
  }

  public function LargeMobile(){
    return view('/large-format-mobile');
  }

  public function TradeMobile(){
    return view('/trade-shows-mobile');
  }

}
