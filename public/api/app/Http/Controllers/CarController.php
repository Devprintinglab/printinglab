<?php

namespace App\Http\Controllers;
// namespace App\Http\Controllers\AmazonPay;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Mail\Email_confirmation;
use App\Mail\Email_Order;
use Illuminate\Support\Facades\Mail;
use Session;

class CarController extends Controller
{


  public function uploadesing(Request $request){
    $sideA = $request->side1;
    $sideB = $request->side2;
    $caras = $request->faces;
    $filename = time().'_'.date('Ymd');
    $SVGfiles = 'UserfileSVG_'.time().'_'.date('Ymd');
    $imagenA = 'F_'.$filename;
    $imagenB = 'B_'.$filename;
    $nombre_archivoA = str_replace(' ', '', $imagenA);
    $nombre_archivoB = str_replace(' ', '', $imagenB);
    mkdir('upload-products/'.$filename, 0755);
    define('UPLOAD_DIR', 'upload-products/');
    define('SVG_DIR', 'upload-products/'.$filename.'/');
    $sideA = str_replace('data:image/png;base64,', '', $sideA);
    $sideA = str_replace(' ', '+', $sideA);
    $data1 = base64_decode($sideA);
    $sideB = str_replace('data:image/png;base64,', '', $sideB);
    $sideB = str_replace(' ', '+', $sideB);
    $data2 = base64_decode($sideB);
    $file1 = UPLOAD_DIR .$nombre_archivoA.'.png';
    $file2 = UPLOAD_DIR .$nombre_archivoB.'.png';
    $filesvg1 = SVG_DIR .$nombre_archivoA.'.svg';
    $filesvg2 = SVG_DIR .$nombre_archivoB.'.svg';
    if ($caras=='2face') {
      $successA = file_put_contents($file1, $data1);
      $successB = file_put_contents($file2, $data2);
      $succesvgA = file_put_contents($filesvg1, $request->side1svg);
      $succesvgB = file_put_contents($filesvg2, $request->side2svg);
    }else{
      $successA = file_put_contents($file1, $data1);
      $succesvgA = file_put_contents($filesvg1, $request->side1svg);
    }
    return response()->json(['ladoA'=>$nombre_archivoA,'ladoB'=>$nombre_archivoB,'respond'=>$caras,'folder'=>$filename]);
  }
  public function deldir($dir){
    $dir = 'upload-products/';
    $current_dir = opendir($dir);
    while($entryname = readdir($current_dir)){
      if(is_dir("$dir/$entryname") and ($entryname != "." and $entryname!="..")){
        deldir("${dir}/${entryname}");
      }elseif($entryname != "." and $entryname!=".."){
        unlink("${dir}/${entryname}");
      }
    }
    closedir($current_dir);
    rmdir(${'dir'});
  }
  public function movefiles(Request $request){
    $fileurl=substr($request->filetomove, -37);
    copy($request->filetomove, 'upload-products/'.$request->path.'/'.$fileurl);
  }

  public function CarPost(Request $request){
    $idP=$request->idP;
    $idC=$request->idC;
    $idE=$request->idE;
    $Notas=$request->comentario;
    $idroute=$request->route;
    $filename = time().'_'.date('Ymd');
    $idarray;
    $caras=$request->caras;
    $we_designed=$request->we_designed;
    //diseñado por nosotros
    if ($we_designed=='true'){
      $archivo_1=$request->archivo;
      $archivo11=$request->file21;
      $archivo12=$request->file22;
      if ($caras==1 && isset($archivo_1)) {
        $archivo_1=$request->file('archivo');
        $nombre_archivoA=$archivo_1->getClientOriginalExtension();
        $nombre_archivoA='F_'.$filename.'.'.$nombre_archivoA;
        $archivo_1->move('upload-products/',$nombre_archivoA);
        $nombre_archivoB='';
        $extencion=$archivo_1->getClientOriginalExtension();
        if ($extencion!='jpg' && $extencion!='png' && $extencion!='pdf'){
          $type_file1='otro';
          $type_file2='';
        }else{
          $type_file1=$extencion;
          $type_file2='';
        }
      }elseif($caras==2 &&(isset($archivo11)||isset($archivo12)) ){
        $nombre_archivoA='';
        $nombre_archivoB='';
        if (isset($archivo11)){
          $archivo_11=$request->file('file21');
          $nombre_archivoA=$archivo_11->getClientOriginalExtension();
          $nombre_archivoA='F_'.$filename.'.'.$nombre_archivoA;
          $archivo_11->move('upload-products/',$nombre_archivoA);
          $extencion=$archivo_11->getClientOriginalExtension();
          if ($extencion!='jpg' && $extencion!='png' && $extencion!='pdf'){
            $type_file1='otro';
          }else{
            $type_file1=$extencion;
          }
        }
        if (isset($archivo12)){
          $archivo_12=$request->file('file22');
          $nombre_archivoB=$archivo_12->getClientOriginalExtension();
          $nombre_archivoB='B_'.$filename.'.'.$nombre_archivoB;
          $archivo_12->move('upload-products/',$nombre_archivoB);
          $extencion=$archivo_12->getClientOriginalExtension();
          if ($extencion!='jpg' && $extencion!='png' && $extencion!='pdf'){
            $type_file2='otro';
          }else{
            $type_file2=$extencion;
          }
        }
        if (!isset($archivo11)){
          $type_file1='';
        }
        if (!isset($archivo12)){
          $type_file2='';
        }
      }else{
        $nombre_archivoA='';
        $nombre_archivoB='';
        $type_file1='vacio';
        $type_file2='vacio';
      }
    }
    //carga de archivo
    else{
      if ($caras==1){
        if ($idroute=='true') {
          $nombre_archivoA=$request->side1.'.png';
          $nombre_archivoB='';
          $type_file1='png';
          $type_file2='';
        }else{
          $imagen=$request->archivo;
          $imagen=$request->file('archivo');
          $nombre_archivoA=$imagen->getClientOriginalExtension();
          $nombre_archivoA='F_'.$filename.'.'.$nombre_archivoA;
          $imagen->move('upload-products/',$nombre_archivoA);
          $nombre_archivoB='';
          $extencion=$imagen->getClientOriginalExtension();
          if ($extencion!='jpg' && $extencion!='png' && $extencion!='pdf'){
            $type_file1='otro';
          }else{
            $type_file1=$extencion;
          }
          $type_file2='';
        }
      }else{
        if ($idroute=='true'){
          $nombre_archivoA = $request->side1.'.png';
          $nombre_archivoB = $request->side2.'.png';
          $type_file1='png';
          $type_file2='png';
        }else{
          $cantidad_files=$request->file('fileM');
          if (count($cantidad_files)==2 ) {
            $imagenA=$request->fileM[0];
            $nombre_archivoA =$request->fileM[0]->getClientOriginalExtension();
            $nombre_archivoA='B_'.$filename.'.'.$nombre_archivoA;
            $imagenA->move('upload-products/',$nombre_archivoA);
            $imagenB=$request->fileM[1];
            $nombre_archivoB =$request->fileM[1]->getClientOriginalExtension();
            $nombre_archivoB='F_'.$filename.'.'.$nombre_archivoB;
            $imagenB->move('upload-products/',$nombre_archivoB);
            $extencion1=$request->fileM[0]->getClientOriginalExtension();
            $extencion2=$request->fileM[1]->getClientOriginalExtension();
            if ($extencion1!='jpg' && $extencion1!='png' && $extencion1!='pdf'){
              $type_file1='otro';
            }else{
              $type_file1=$extencion1;
            }
            if ($extencion2!='jpg' && $extencion2!='png' && $extencion2!='pdf'){
              $type_file2='otro';
            }else{
              $type_file2=$extencion2;
            }
          }else{
            $imagenA=$request->fileM[0];
            $nombre_archivoA =$request->fileM[0]->getClientOriginalExtension();
            $nombre_archivoA='F_'.$filename.'.'.$nombre_archivoA;
            $imagenA->move('upload-products/',$nombre_archivoA);
            $nombre_archivoB='';
            $extencion1 =$request->fileM[0]->getClientOriginalExtension();
            if ($extencion1!='jpg' && $extencion1!='png' && $extencion1!='pdf'){
              $type_file1='otro';
            }else{
              $type_file1=$extencion1;
            }
            $type_file2='';
          }
        }
      }
    }
    $consultaAtributos=DB::select("SELECT productos.nombre,productos.img1,attr1, attr2, attr3, attr4, attr5,attr6, attr10, attr11, attr12 FROM especificaciones JOIN especixproduct ON especixproduct.id_especificaciones= especificaciones.id_especificaciones JOIN productos on productos.id_productos= especixproduct.id_productos WHERE productos.id_productos=$idP AND especificaciones.id_especificaciones=$idE");
    foreach ($consultaAtributos as $key) {
      $nombre=$key->nombre;
      $imageBD=$key->img1;
      $attr1=$key->attr1;
      $attr2=$key->attr2;
      $attr3=$key->attr3;
      $attr4=$key->attr4;
      $attr5=$key->attr5;
      $attr6=$key->attr6;
      $attr10=$key->attr10;
      $attr11=$key->attr11;
      $attr12=$key->attr12;
    }
    $imageBD_r='products/'.$imageBD;
    $nombre_imagen=$imageBD_r;
    if (!isset($we_designed)){
      $Notas='';
      $informacion_extra=$request->selectRadios;
    }else{
      $attr12=$attr12+50;
      $informacion_extra='';
    }
    if (Session::has('carrito')) {
      //tiene contenido
      $arreglo =Session::get('carrito');
      //id del arrary
      foreach ($arreglo as $key => $value) {
        $idarray=$arreglo[$key]['IdA'];
      }
      $idarray=$idarray+1;
      //fin del id array
      $items = [
        'IdA'=>$idarray,
        'IdC' =>$idC,
        'IdP'=>$idP,
        'IdE'=>$idE,
        'face'=>$caras,
        'nombre'=>$nombre,
        'attr1'=>$attr1,
        'attr2'=>$attr2,
        'attr3'=>$attr3,
        'attr4'=>$attr4,
        'attr5'=>$attr5,
        'attr6'=>$attr6,
        'attr10'=>$attr10,
        'attr11'=>$attr11,
        'attr12'=>$attr12,
        'img1'=>$type_file1,
        'img2'=>$type_file2,
        'Imagen'=>$nombre_imagen,
        'ArchivoA'=>$nombre_archivoA,
        'ArchivoB'=>$nombre_archivoB,
        'Notas'=>$Notas,
        'Notas2'=>$informacion_extra,
      ];
      //sumar al carrito
      array_push($arreglo, $items);
      $total=0;
      foreach ($arreglo as $key => $value) {
        $total=$arreglo[$key]['attr12']+$total;
      }
      Session::put('carrito',$arreglo);
      //  dd(Session::get('carrito'));
      return view('cart',['total'=>$total]);
    }
    //primer articulo
    else{
      session(['carrito']);
      $items = [
        'IdA'=>1,
        'IdC' =>$idC,
        'IdP'=>$idP,
        'IdE'=>$idE,
        'face'=>$caras,
        'nombre'=>$nombre,
        'attr1'=>$attr1,
        'attr2'=>$attr2,
        'attr3'=>$attr3,
        'attr4'=>$attr4,
        'attr5'=>$attr5,
        'attr6'=>$attr6,
        'attr10'=>$attr10,
        'attr11'=>$attr11,
        'attr12'=>$attr12,
        'img1'=>$type_file1,
        'img2'=>$type_file2,
        'Imagen'=>$nombre_imagen,
        'ArchivoA'=>$nombre_archivoA,
        'ArchivoB'=>$nombre_archivoB,
        'Notas'=>$Notas,
        'Notas2'=>$informacion_extra,
      ];
      $Carrito=[$items];
      Session::put('carrito', $Carrito);
      return view('cart',['total'=>$attr12]);
    }
  }

  public function home(){
    if (Session::has('carrito')) {
      $arreglo =Session::get('carrito');
      $total=0;
      foreach ($arreglo as $key => $value) {
        $total=$arreglo[$key]['attr12']+$total;
      }
      return view('cart',['total'=>$total]);
    }else{
      return view('cart');
    }
  }

  public function Eliminar(Request $request){
    $idA= $request->idA;
    $arreglo =Session::get('carrito');
    $carro =array();
    foreach ($arreglo as $key => $value){
      if ($arreglo[$key]['IdA']!=$idA){
        $nuevo_carro = [
          'IdA'=>$arreglo[$key]['IdA'],
          'IdC'=>$arreglo[$key]['IdC'],
          'IdP'=>$arreglo[$key]['IdP'],
          'IdE'=>$arreglo[$key]['IdE'],
          'face'=>$arreglo[$key]['face'],
          'nombre'=>$arreglo[$key]['nombre'],
          'attr1'=>$arreglo[$key]['attr1'],
          'attr2'=>$arreglo[$key]['attr2'],
          'attr3'=>$arreglo[$key]['attr3'],
          'attr4'=>$arreglo[$key]['attr4'],
          'attr5'=>$arreglo[$key]['attr5'],
          'attr6'=>$arreglo[$key]['attr6'],
          'attr10'=>$arreglo[$key]['attr10'],
          'attr11'=>$arreglo[$key]['attr11'],
          'attr12'=>$arreglo[$key]['attr12'],
          'img1'=>$arreglo[$key]['img1'],
          'img2'=>$arreglo[$key]['img2'],
          'Imagen'=>$arreglo[$key]['Imagen'],
          'ArchivoA'=>$arreglo[$key]['ArchivoA'],
          'ArchivoB'=>$arreglo[$key]['ArchivoB'],
          'Notas'=>$arreglo[$key]['Notas'],
          'Notas2'=>$arreglo[$key]['Notas2'],
        ];
        array_push($carro, $nuevo_carro);
      }
    }
    $total=0;
    foreach ($carro as $key => $value) {
      $total=$carro[$key]['attr12']+$total;
    }
    Session::put('carrito', $carro);
    $x=Session::get('carrito');
    if (count($x)=='') {
      $request->session()->forget('carrito');
      $result="0";
      return response()->json($result);
    }else{
      return response()->json($total);
    }
  }

  public function ConsultUpdate($id_A){
    $id_A;
    $arreglo =Session::get('carrito');
    foreach ($arreglo as $key => $value){
      if ($arreglo[$key]['IdA']==$id_A){
        if ($arreglo[$key]['IdC']==1){
          $id_product=$arreglo[$key]['IdP'];
          $E_product=$arreglo[$key]['IdE'];
          $attr1=$arreglo[$key]['attr1'];
          $attr2=$arreglo[$key]['attr2'];
          $attr3=$arreglo[$key]['attr3'];
          $attr4=$arreglo[$key]['attr4'];
          $attr5=$arreglo[$key]['attr5'];
          $attr6=$arreglo[$key]['attr6'];
          $attr10=$arreglo[$key]['attr10'];
          $attr11=$arreglo[$key]['attr11'];
          $attr12=$arreglo[$key]['attr12'];
          $notas=$arreglo[$key]['Notas2'];
          if ($notas==""){
            $notas=0;
          }else{
            $notas=1;
          }
          if ($attr6==""){
            $consulta_attr10=DB::select("SELECT DISTINCT(attr10) FROM especificaciones JOIN especixproduct ON especixproduct.id_especificaciones= especificaciones.id_especificaciones JOIN productos on productos.id_productos=especixproduct.id_productos WHERE productos.id_productos=$id_product AND attr1='$attr1' AND attr2='$attr2' AND attr3='$attr3' AND attr4='$attr4' AND attr5='$attr5'");
            $consulta_attr11=DB::select("SELECT DISTINCT(attr11)  FROM especificaciones JOIN especixproduct ON especixproduct.id_especificaciones= especificaciones.id_especificaciones JOIN productos on productos.id_productos=especixproduct.id_productos WHERE productos.id_productos=$id_product AND attr1='$attr1' AND attr2='$attr2' AND attr3='$attr3' AND attr4='$attr4' AND attr5='$attr5' AND attr10=$attr10");
            return response()->json( array($id_product,$E_product,$attr1,$attr2,$attr3,$attr4,$attr5,$attr6,$attr10,$attr11,$attr12,$consulta_attr10,$consulta_attr11,$notas));
          }else{
            $consulta_attr10=DB::select("SELECT DISTINCT(attr10) FROM especificaciones JOIN especixproduct ON especixproduct.id_especificaciones= especificaciones.id_especificaciones JOIN productos on productos.id_productos=especixproduct.id_productos WHERE productos.id_productos=$id_product AND attr1='$attr1' AND attr2='$attr2' AND attr3='$attr3' AND attr4='$attr4' AND attr5='$attr5' AND attr6='$attr6'");
            $consulta_attr11=DB::select("SELECT DISTINCT(attr11)  FROM especificaciones JOIN especixproduct ON especixproduct.id_especificaciones= especificaciones.id_especificaciones JOIN productos on productos.id_productos=especixproduct.id_productos WHERE productos.id_productos=$id_product AND attr1='$attr1' AND attr2='$attr2' AND attr3='$attr3' AND attr4='$attr4' AND attr5='$attr5' AND attr6='$attr6' AND attr10=$attr10");
            $consultaattr6=DB::select("SELECT DISTINCT(attr6) FROM especificaciones JOIN especixproduct ON especixproduct.id_especificaciones=especificaciones.id_especificaciones JOIN productos on productos.id_productos= especixproduct.id_productos WHERE productos.id_productos=$id_product AND attr1='$attr1' AND attr2='$attr2'");
            return response()->json( array($id_product,$E_product,$attr1,$attr2,$attr3,$attr4,$attr5,$attr6,$consultaattr6,$attr10,$attr11,$attr12,$consulta_attr10,$consulta_attr11,$notas));
          }
        }
        if ($arreglo[$key]['IdC']==5){
          $id_product=$arreglo[$key]['IdP'];
          $attr1=$arreglo[$key]['attr1'];
          $attr2=$arreglo[$key]['attr2'];
          $attr3=$arreglo[$key]['attr3'];
          $attr4=$arreglo[$key]['attr4'];
          $attr5=$arreglo[$key]['attr5'];
          $attr6=$arreglo[$key]['attr6'];
          $attr10=$arreglo[$key]['attr10'];
          $attr11=$arreglo[$key]['attr11'];
          $attr12=$arreglo[$key]['attr12'];
          if (($attr1=='3" x 4"' && $attr4=='Matte/Dull Finish')||($attr1=='3" x 4"' && $attr4=='Full UV on Front Only')) {
            $consultaattr10=DB::select("SELECT DISTINCT attr10 FROM especificaciones JOIN especixproduct
              ON especixproduct.id_especificaciones= especificaciones.id_especificaciones
              JOIN productos on productos.id_productos= especixproduct.id_productos
              WHERE productos.id_productos=10 and attr1='$attr1' and attr2='$attr2' and attr3='$attr3' and attr4='$attr4' and attr5='$attr5'");
              $attr5_array=1;
            }
            elseif (($attr1=='4" x 6"' && $attr4=='Matte/Dull Finish')||($attr1=='4" x 6"'&&$attr4=='UV Co$ating')||  ($attr1=='4" x 6"' && $attr2!='18 Point C1S' && $attr4=='Full UV on Front Only')) {
              $consultaattr10=DB::select("SELECT DISTINCT attr10 FROM especificaciones JOIN especixproduct
                ON especixproduct.id_especificaciones= especificaciones.id_especificaciones
                JOIN productos on productos.id_productos= especixproduct.id_productos
                WHERE productos.id_productos=10 and attr1='$attr1' and attr2='$attr2' and attr3='$attr3' and attr4='$attr4' and attr5='$attr5'");
                $attr5_array=2;
              }
              else{
                $attr5_array=0;
                $consultaattr10=DB::select("SELECT DISTINCT attr10 FROM especificaciones JOIN especixproduct
                  ON especixproduct.id_especificaciones= especificaciones.id_especificaciones
                  JOIN productos on productos.id_productos= especixproduct.id_productos
                  WHERE productos.id_productos=10 and attr1='$attr1' and attr2='$attr2' and attr3='$attr3' and attr4='$attr4'");
                }
                return response()->json( array($id_product,$attr1,$attr2,$attr3,$attr4,$attr5,$attr5_array,$attr6,$consultaattr10));
              }
            }
          }
        }

        public function ConsultUpdateDetails($id_A){
          $arreglo =Session::get('carrito');
          foreach ($arreglo as $key => $value) {
            if ($arreglo[$key]['IdA']==$id_A) {
              $id_product=$arreglo[$key]['IdP'];
              $Notas=$arreglo[$key]['Notas'];
            }
          }
          return response()->json( array($id_product,$Notas));
        }

        public function quantity_business_cards(Request $request){
          $id_product = $request->idp;
          $attr1 = $request->atr1;
          $attr2 = $request->atr2;
          $attr3 = $request->atr3;
          $attr4 = $request->atr4;
          $attr5 = $request->atr5;
          $attr10 = $request->atr10;
          $consulta_11=DB::select("SELECT especificaciones.id_especificaciones,attr11, MIN(attr12) as atr12 FROM especificaciones JOIN especixproduct ON especixproduct.id_especificaciones= especificaciones.id_especificaciones JOIN productos on productos.id_productos= especixproduct.id_productos WHERE especixproduct.id_productos=$id_product and attr1='$attr1' AND attr2='$attr2' AND attr3='$attr3'
          AND attr4='$attr4' AND attr5='$attr5' AND attr10='$attr10'");
          $select_11=DB::select("SELECT DISTINCT(attr11)  FROM especificaciones JOIN especixproduct ON especixproduct.id_especificaciones= especificaciones.id_especificaciones JOIN productos on productos.id_productos=especixproduct.id_productos WHERE productos.id_productos=$id_product AND attr1='$attr1' AND attr2='$attr2' AND attr3='$attr3' AND attr4='$attr4' AND attr5='$attr5' AND attr10=$attr10");
          return response()->json( array($consulta_11,$select_11));
        }

        public function update(Request $request){
          $idA = $request->idA;
          //validar color
          $validate6=$request->edge_color;
          //return view('cart',['total'=>$attr6]);
          $arreglo =Session::get('carrito');
          $carro =array();
          foreach ($arreglo as $key => $value) {
            if ($arreglo[$key]['IdA']==$idA){
              if ($arreglo[$key]['IdC']==1){
                $attr10=$request->quantity;
                $attr10=intval($attr10);
                $attr11=$request->printingtime;
                $attr12=$request->total_update;
                $attr12=floatval($attr12);
                if ($arreglo[$key]['attr6']=="") {
                  $attr6=$arreglo[$key]['attr6'];
                }else{
                  $attr6=$request->edge_color;
                }
                $attr1=$arreglo[$key]['attr1'];
                $attr2=$arreglo[$key]['attr2'];
                $attr3=$arreglo[$key]['attr3'];
                $attr4=$arreglo[$key]['attr4'];
                $attr5=$arreglo[$key]['attr5'];
                //  $consultaid_E=DB::select("SELECT id_especificaciones FROM especificaciones WHERE attr1='$attr1' and attr2='$attr2' and attr3  ='$attr3' and attr4='$attr4' and attr5='$attr5' and attr6='$attr6' and attr10 ='$attr10' and attr11 ='$attr11' and attr12 ='$attr12'");
                $idE=$request->idE;
                //dd($idE);
                $nuevo_carro = [
                  'IdA'=>$arreglo[$key]['IdA'],
                  'IdC'=>$arreglo[$key]['IdC'],
                  'IdP'=>$arreglo[$key]['IdP'],
                  'IdE'=>$idE,
                  'face'=>$arreglo[$key]['face'],
                  'nombre'=>$arreglo[$key]['nombre'],
                  'attr1'=>$arreglo[$key]['attr1'],
                  'attr2'=>$arreglo[$key]['attr2'],
                  'attr3'=>$arreglo[$key]['attr3'],
                  'attr4'=>$arreglo[$key]['attr4'],
                  'attr5'=>$arreglo[$key]['attr5'],
                  'attr6'=>$attr6,
                  'attr10'=>$attr10,
                  'attr11'=>$attr11,
                  'attr12'=>$attr12,
                  'img1'=>$arreglo[$key]['img1'],
                  'img2'=>$arreglo[$key]['img2'],
                  'Imagen'=>$arreglo[$key]['Imagen'],
                  'ArchivoA'=>$arreglo[$key]['ArchivoA'],
                  'ArchivoB'=>$arreglo[$key]['ArchivoB'],
                  'Notas'=>$arreglo[$key]['Notas'],
                  'Notas2'=>$arreglo[$key]['Notas2'],
                ];
                array_push($carro, $nuevo_carro);
              }
              elseif ($arreglo[$key]['IdC']==5){
                $attr10=$request->quantity_postcards;
                $attr11=$request->printingtime_postcards;
                $attr12=$request->total_update_postcards;
                $attr1=$arreglo[$key]['attr1'];
                $attr2=$arreglo[$key]['attr2'];
                $attr3=$arreglo[$key]['attr3'];
                $attr4=$arreglo[$key]['attr4'];
                $attr5=$arreglo[$key]['attr5'];
                $consultaid_E=DB::select("SELECT id_especificaciones FROM especificaciones WHERE attr1='$attr1' and attr2='$attr2' and attr3  ='$attr3' and attr4='$attr4' and attr5='$attr5' and attr10 ='$attr10' and attr11 ='$attr11' and attr12 ='$attr12'");
                $idE=$consultaid_E[0]->id_especificaciones;
                if (!$arreglo[$key]['Notas']=='' ) {
                  $attr12=$attr12+50;
                }
                $nuevo_carro = [
                  'IdA'=>$arreglo[$key]['IdA'],
                  'IdC'=>$arreglo[$key]['IdC'],
                  'IdP'=>$arreglo[$key]['IdP'],
                  'IdE'=>$idE,
                  'face'=>$arreglo[$key]['face'],
                  'nombre'=>$arreglo[$key]['nombre'],
                  'attr1'=>$arreglo[$key]['attr1'],
                  'attr2'=>$arreglo[$key]['attr2'],
                  'attr3'=>$arreglo[$key]['attr3'],
                  'attr4'=>$arreglo[$key]['attr4'],
                  'attr5'=>$arreglo[$key]['attr5'],
                  'attr6'=>$arreglo[$key]['attr6'],
                  'attr10'=>$attr10,
                  'attr11'=>$attr11,
                  'attr12'=>$attr12,
                  'img1'=>$arreglo[$key]['img1'],
                  'img2'=>$arreglo[$key]['img2'],
                  'Imagen'=>$arreglo[$key]['Imagen'],
                  'ArchivoA'=>$arreglo[$key]['ArchivoA'],
                  'ArchivoB'=>$arreglo[$key]['ArchivoB'],
                  'Notas'=>$arreglo[$key]['Notas'],
                  'Notas2'=>$arreglo[$key]['Notas2'],
                ];
                array_push($carro, $nuevo_carro);
              }
            }
            //no es el producto seleccionado
            else {
              $nuevo_carro=[
                'IdA'=>$arreglo[$key]['IdA'],
                'IdC'=>$arreglo[$key]['IdC'],
                'IdP'=>$arreglo[$key]['IdP'],
                'IdE'=>$arreglo[$key]['IdE'],
                'face'=>$arreglo[$key]['face'],
                'nombre'=>$arreglo[$key]['nombre'],
                'attr1'=>$arreglo[$key]['attr1'],
                'attr2'=>$arreglo[$key]['attr2'],
                'attr3'=>$arreglo[$key]['attr3'],
                'attr4'=>$arreglo[$key]['attr4'],
                'attr5'=>$arreglo[$key]['attr5'],
                'attr6'=>$arreglo[$key]['attr6'],
                'attr10'=>$arreglo[$key]['attr10'],
                'attr11'=>$arreglo[$key]['attr11'],
                'attr12'=>$arreglo[$key]['attr12'],
                'img1'=>$arreglo[$key]['img1'],
                'img2'=>$arreglo[$key]['img2'],
                'Imagen'=>$arreglo[$key]['Imagen'],
                'ArchivoA'=>$arreglo[$key]['ArchivoA'],
                'ArchivoB'=>$arreglo[$key]['ArchivoB'],
                'Notas'=>$arreglo[$key]['Notas'],
                'Notas2'=>$arreglo[$key]['Notas2'],
              ];
              array_push($carro, $nuevo_carro);
            }
          }
          Session::put('carrito', $carro);
          $arreglo2 =Session::get('carrito');
          $total=0;
          foreach ($arreglo2 as $key => $value) {
            $total=$arreglo2[$key]['attr12']+$total;
          }
          return view('cart',['total'=>$total]);
        }

        public function UpdateDetails(Request $request){
          $idA = $request->idA;
          $Notas=$request->comentario;
          $arreglo =Session::get('carrito');
          $carro =array();
          foreach ($arreglo as $key => $value) {
            if ($arreglo[$key]['IdA']==$idA){
              $nuevo_carro = [
                'IdA'=>$arreglo[$key]['IdA'],
                'IdC'=>$arreglo[$key]['IdC'],
                'IdP'=>$arreglo[$key]['IdP'],
                'IdE'=>$arreglo[$key]['IdE'],
                'face'=>$arreglo[$key]['face'],
                'nombre'=>$arreglo[$key]['nombre'],
                'attr1'=>$arreglo[$key]['attr1'],
                'attr2'=>$arreglo[$key]['attr2'],
                'attr3'=>$arreglo[$key]['attr3'],
                'attr4'=>$arreglo[$key]['attr4'],
                'attr5'=>$arreglo[$key]['attr5'],
                'attr6'=>$arreglo[$key]['attr6'],
                'attr10'=>$arreglo[$key]['attr10'],
                'attr11'=>$arreglo[$key]['attr11'],
                'attr12'=>$arreglo[$key]['attr12'],
                'img1'=>$arreglo[$key]['img1'],
                'img2'=>$arreglo[$key]['img2'],
                'Imagen'=>$arreglo[$key]['Imagen'],
                'ArchivoA'=>$arreglo[$key]['ArchivoA'],
                'ArchivoB'=>$arreglo[$key]['ArchivoB'],
                'Notas'=>$Notas,
                'Notas2'=>$arreglo[$key]['Notas2'],
              ];
              array_push($carro, $nuevo_carro);
            }
            else{
              $nuevo_carro=[
                'IdA'=>$arreglo[$key]['IdA'],
                'IdC'=>$arreglo[$key]['IdC'],
                'IdP'=>$arreglo[$key]['IdP'],
                'IdE'=>$arreglo[$key]['IdE'],
                'face'=>$arreglo[$key]['face'],
                'nombre'=>$arreglo[$key]['nombre'],
                'attr1'=>$arreglo[$key]['attr1'],
                'attr2'=>$arreglo[$key]['attr2'],
                'attr3'=>$arreglo[$key]['attr3'],
                'attr4'=>$arreglo[$key]['attr4'],
                'attr5'=>$arreglo[$key]['attr5'],
                'attr6'=>$arreglo[$key]['attr6'],
                'attr10'=>$arreglo[$key]['attr10'],
                'attr11'=>$arreglo[$key]['attr11'],
                'attr12'=>$arreglo[$key]['attr12'],
                'img1'=>$arreglo[$key]['img1'],
                'img2'=>$arreglo[$key]['img2'],
                'Imagen'=>$arreglo[$key]['Imagen'],
                'ArchivoA'=>$arreglo[$key]['ArchivoA'],
                'ArchivoB'=>$arreglo[$key]['ArchivoB'],
                'Notas'=>$arreglo[$key]['Notas'],
                'Notas2'=>$arreglo[$key]['Notas2'],
              ];
              array_push($carro, $nuevo_carro);
            }
          }
          Session::put('carrito', $carro);
          $arreglo2 =Session::get('carrito');
          $total=0;
          foreach ($arreglo2 as $key => $value) {
            $total=$arreglo2[$key]['attr12']+$total;
          }
          return view('cart',['total'=>$total]);
        }


  public function Findordercomplete(Request $request){
    //dd($request->idorder);
    $id = Auth::id();
    $paytype = $request->paytype;
    $cltname = $request->cltname; 
    $cltadress = $request->cltadress;
    $cltphone = $request->cltphone;
    $sales=DB::table('compras')
    ->join('compraxproduct','compras.id_compras','=', 'compraxproduct.id_compras')
    ->join('especixproduct','compraxproduct.id_especixproduct','=', 'especixproduct.id_especixproduct')
    ->join('especificaciones','especixproduct.id_especificaciones','=', 'especificaciones.id_especificaciones')
    ->join('productos','especixproduct.id_productos','=', 'productos.id_productos')
    ->where('compras.id_compras',$request->idorder)
    ->get();
    $result = DB::table('compras')->where('id_compras',$request->idorder)->get();
    $emailtouser=$request->cltmail;
    $emailtous='contacto@tienda.printinglab.com';
    $orderID=$request->idorder;
    $datos=[
      'date'=>date("Y/m/d"),
      'IdO'=>$orderID,
      'result'=>$result,
      'sales'=>$sales,
      'paytype'=>$paytype,
      'cltname'=>$cltname,
      'cltadress'=>$cltadress,
      'cltphone'=>$cltphone,
    ];
    Mail::to($emailtouser)->send(new Email_confirmation($datos));
    Mail::to($emailtous)->send(new Email_Order($datos));
    return view('Ordercomplete',['result'=>$result]);
  }
  public function ordercomplete(Request $request){
    $arreglo =Session::get('carrito');
    $id = Auth::id();
    $orderID = $request->OrderID;
    $total = $request->Total;
    $BuyerName = $request->name;
    $Shipingtypename = $request->Shiping;
    $Shipingtypevalue = $request->Shipingvalue;
    $taxvalue=  $request->Tax;
    $Emailorder = $request->email;
    $success = DB::table('compras')->insertGetId(
      array('id_user' =>$id,'numero_venta' =>$orderID, 'total' =>$total,'date' =>date('Y-m-d'),'Shiping' =>$Shipingtypename,'Shipingtotal' =>$Shipingtypevalue,'tax' =>$taxvalue));
    $toEnd = count($arreglo);
    foreach ($arreglo as $key => $value) {
      DB::table('compraxproduct')->insertGetId(
        array('id_compras' =>$success,'id_especixproduct' =>$arreglo[$key]['IdE'], 'archivo_a' =>$arreglo[$key]['ArchivoA'],'archivo_b' =>$arreglo[$key]['ArchivoB'],'notas' =>$arreglo[$key]['Notas'],'notas_2' =>$arreglo[$key]['Notas2']));
      if (0 === --$toEnd) {
        $request->session()->forget('carrito');
        return response()->json(['success'=>$success]);
      }
    }
                      // return response()->json(['success'=>$success]);
  }

public function SetPaymentDetails(){
              $arreglo2 =Session::get('carrito');
              $total=0;
              foreach ($arreglo2 as $key => $value) {
                $total=$arreglo2[$key]['attr12']+$total;
              }
              return view('/SetPaymentDetails',['total'=>$total]);
            }

}


          
