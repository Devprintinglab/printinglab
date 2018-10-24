<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostCardsController extends Controller
{

  public function Home(){
    $consulta= DB::table('productos')->where('id_productos',10)->get();
    $attr1=DB::select("SELECT DISTINCT attr1 FROM especificaciones JOIN especixproduct
      ON especixproduct.id_especificaciones= especificaciones.id_especificaciones
      JOIN productos on productos.id_productos= especixproduct.id_productos
      WHERE productos.id_productos=10");
      return view('postcards',['producto'=>$consulta,'attr1'=>$attr1]);
    }

    public function postcardsattr2(Request $Request,$attr1){
      if ($Request->ajax()){
        $consultaattr2=DB::select("SELECT DISTINCT attr2 FROM especificaciones JOIN especixproduct
          ON especixproduct.id_especificaciones= especificaciones.id_especificaciones
          JOIN productos on productos.id_productos= especixproduct.id_productos
          WHERE productos.id_productos=10 and attr1='$attr1' ");
          return response()->json($consultaattr2);
        }
      }

      public function postcardsattr3(Request $Request,$attr1,$attr2){
        if ($Request->ajax()){
          $consultaattr3=DB::select("SELECT DISTINCT attr3 FROM especificaciones JOIN especixproduct
            ON especixproduct.id_especificaciones= especificaciones.id_especificaciones
            JOIN productos on productos.id_productos= especixproduct.id_productos
            WHERE productos.id_productos=10 and attr1='$attr1' and attr2='$attr2'");
            return response()->json($consultaattr3);
          }
        }

        public function postcardsattr4(Request $Request,$attr1,$attr2,$attr3){
          if ($Request->ajax()){
            $consultaattr4=DB::select("SELECT DISTINCT attr4 FROM especificaciones JOIN especixproduct
              ON especixproduct.id_especificaciones= especificaciones.id_especificaciones
              JOIN productos on productos.id_productos= especixproduct.id_productos
              WHERE productos.id_productos=10 and attr1='$attr1' and attr2='$attr2' and attr3='$attr3'");
              return response()->json($consultaattr4);
            }
          }

          public function  postcardsattr5(Request $request){
            $attr1 = $request->atr1;
            $attr2 = $request->atr2;
            $attr3 = $request->atr3;
            $attr4 = $request->atr4;
            $consultaattr5=DB::select("SELECT DISTINCT attr5 FROM especificaciones JOIN especixproduct
              ON especixproduct.id_especificaciones= especificaciones.id_especificaciones
              JOIN productos on productos.id_productos= especixproduct.id_productos
              WHERE productos.id_productos=10 and attr1='$attr1' and attr2='$attr2' and attr3='$attr3' and attr4='$attr4'");
              return response()->json($consultaattr5);
            }

            public function postcardsattr10(Request $request){
              $attr1 = $request->atr1;
              $attr2 = $request->atr2;
              $attr3 = $request->atr3;
              $attr4 = $request->atr4;
              $consultaattr10=DB::select("SELECT DISTINCT attr10 FROM especificaciones JOIN especixproduct
                ON especixproduct.id_especificaciones= especificaciones.id_especificaciones
                JOIN productos on productos.id_productos= especixproduct.id_productos
                WHERE productos.id_productos=10 and attr1='$attr1' and attr2='$attr2' and attr3='$attr3' and attr4='$attr4'");
                return response()->json($consultaattr10);
              }

              public function postcardsattr10_drill(Request $request){
                $attr1 = $request->atr1;
                $attr2 = $request->atr2;
                $attr3 = $request->atr3;
                $attr4 = $request->atr4;
                $attr5 = $request->atr5;
                $consultaattr10=DB::select("SELECT DISTINCT attr10 FROM especificaciones JOIN especixproduct
                  ON especixproduct.id_especificaciones= especificaciones.id_especificaciones
                  JOIN productos on productos.id_productos= especixproduct.id_productos
                  WHERE productos.id_productos=10 and attr1='$attr1' and attr2='$attr2' and attr3='$attr3' and attr4='$attr4' and attr5='$attr5'");
                  return response()->json($consultaattr10);
                }

                public function postcardsattr11(Request $request){
                  $attr1 = $request->atr1;
                  $attr2 = $request->atr2;
                  $attr3 = $request->atr3;
                  $attr4 = $request->atr4;
                  $attr10 = $request->atr10;
                  $consultaattr11=DB::select("SELECT DISTINCT attr11 FROM especificaciones JOIN especixproduct
                    ON especixproduct.id_especificaciones= especificaciones.id_especificaciones
                    JOIN productos on productos.id_productos= especixproduct.id_productos
                    WHERE productos.id_productos=10 and attr1='$attr1' and attr2='$attr2' and attr3='$attr3' and attr4='$attr4' and attr10='$attr10'");
                    return response()->json($consultaattr11);
                  }

                  public function postcardsattr11_drill(Request $request){
                    $attr1 = $request->atr1;
                    $attr2 = $request->atr2;
                    $attr3 = $request->atr3;
                    $attr4 = $request->atr4;
                    $attr5 = $request->atr5;
                    $attr10 = $request->atr10;
                    $consultaattr11=DB::select("SELECT DISTINCT attr11 FROM especificaciones JOIN especixproduct
                      ON especixproduct.id_especificaciones= especificaciones.id_especificaciones
                      JOIN productos on productos.id_productos= especixproduct.id_productos
                      WHERE productos.id_productos=10 and attr1='$attr1' and attr2='$attr2' and attr3='$attr3' and attr4='$attr4' and attr5='$attr5' and attr10='$attr10'");
                      return response()->json($consultaattr11);
                    }

                    public function postcardsattr12(Request $request){
                      $attr1 = $request->atr1;
                      $attr2 = $request->atr2;
                      $attr3 = $request->atr3;
                      $attr4 = $request->atr4;
                      $attr10 = $request->atr10;
                      $attr11 = $request->atr11;
                      $consultaattr12=DB::select("SELECT DISTINCT especificaciones.id_especificaciones,attr12 FROM especificaciones JOIN especixproduct
                        ON especixproduct.id_especificaciones= especificaciones.id_especificaciones
                        JOIN productos on productos.id_productos= especixproduct.id_productos
                        WHERE productos.id_productos=10 and attr1='$attr1' and attr2='$attr2' and attr3='$attr3' and attr4='$attr4' and attr10='$attr10' and attr11='$attr11'");
                        return response()->json($consultaattr12);
                      }

                      public function postcardsattr12_drill(Request $request){
                        $attr1 = $request->atr1;
                        $attr2 = $request->atr2;
                        $attr3 = $request->atr3;
                        $attr4 = $request->atr4;
                        $attr5 = $request->atr5;
                        $attr10 = $request->atr10;
                        $attr11 = $request->atr11;
                        $consultaattr12=DB::select("SELECT DISTINCT especificaciones.id_especificaciones,attr12 FROM especificaciones JOIN especixproduct
                          ON especixproduct.id_especificaciones= especificaciones.id_especificaciones
                          JOIN productos on productos.id_productos= especixproduct.id_productos
                          WHERE productos.id_productos=10 and attr1='$attr1' and attr2='$attr2' and attr3='$attr3' and attr4='$attr4' and attr5='$attr5' and attr10='$attr10' and attr11='$attr11'");
                          return response()->json($consultaattr12);
                        }

                      }
