<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Illuminate\Pagination\Paginato;


class SaleController extends Controller
{

  public function index()
  {
    $sales=DB::table('compras')
    ->join('users','compras.id_user','=', 'users.id')
    ->select('id_compras','date','name','phone','email','numero_venta')
    ->paginate(10);
    //$sales=DB::select('SELECT id_compras, date, name,phone,email, numero_venta FROM compras JOIN users ON compras.id_user= users.id;');
    return view('sale/index',['result'=>$sales]);
  }

  public function details(Request $request)
  {
    $id=$request->id;
    $detail=DB::select("SELECT productos.nombre as productname,img1,archivo_a,archivo_b,notas,notas_2,numero_venta,total,attr1,attr2,attr3,attr4,attr5,attr6,attr7,attr8,attr9,attr10,attr11,attr12 from compras join compraxproduct on compras.id_compras= compraxproduct.id_compras
      join especixproduct on especixproduct.id_especificaciones=compraxproduct.id_especixproduct JOIN categoria on categoria.id_categorias=especixproduct.id_categoria
      JOIN productos on productos.id_productos=especixproduct.id_productos JOIN especificaciones on especixproduct.id_especificaciones=especificaciones.id_especificaciones
      WHERE compras.id_compras='$id'");
      return view('sale.details',['result'=>$detail]);
    }

    protected function download(Request $request){
      $file=$request->archivo;
      $pathtoFile = './upload-products/'.$file;
      if (file_exists($pathtoFile)=='true') {
        return response()->download($pathtoFile);
      }else{
        return redirect()->back()->with("error","File doesn't exist.");
      }
    }

  }
