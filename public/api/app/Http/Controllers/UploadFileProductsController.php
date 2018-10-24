<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UploadFileProductsController extends Controller
{
  public function home(Request $request){
    $idP=$request->idP;
    $idC=$request->idC;
    $caras=$request->caras;
    $idE=$request->idE;
    if ($caras=='Front Only'|| $caras=='Front Only (Foil on Front)'|| $caras=='Front Only (Foil on Both Sides)'|| $caras=='Front Only (with Foil on Front)' ) {
      $caras='1';
    }else{
      $caras='2';
    }
    return view('upload-products',['id_products'=>$idP,'id_category'=>$idC,'face'=>$caras,'id_specs'=>$idE,]);
  }
}
