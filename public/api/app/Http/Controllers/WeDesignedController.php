<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WeDesignedController extends Controller
{
  public function Home(Request $request){
    $idP=$request->idP;
    $idC=$request->idC;
    $caras=$request->caras2;
    if ($caras=='Front Only'|| $caras=='Front Only (Foil on Front)'|| $caras=='Front Only (Foil on Both Sides)'|| $caras=='Front Only (with Foil on Front)' ) {
      $caras='1';
    }else{
      $caras='2';
    }
    $idE=$request->idE2;
    $consultaAtributos=DB::select("SELECT productos.nombre FROM especificaciones JOIN especixproduct
      ON especixproduct.id_especificaciones= especificaciones.id_especificaciones
      JOIN productos on productos.id_productos= especixproduct.id_productos
      WHERE productos.id_productos=$idP AND especificaciones.id_especificaciones=$idE");
      foreach ($consultaAtributos as $key) {
        $nombre=$key->nombre;
      }
      return view('we-designed',['id_products'=>$idP,'id_category'=>$idC,'face'=>$caras,'id_specs'=>$idE,'nombre'=>$nombre,]);
    }
  }
