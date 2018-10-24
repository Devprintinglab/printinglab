<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DownloadTemplateController extends Controller
{
    public function DownloadBusinesscards(Request $request){
      $file=$request->archivo;
      $pathtoFile = './images/marketing/cards/'.$file;
      return response()->download($pathtoFile);
    }

    public function DownloadPostcards(Request $request){
      $file=$request->archivo;
      $pathtoFile = './images/marketing/postcards/'.$file;
      return response()->download($pathtoFile);
    }
}
