<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request; 

class DesignerController extends Controller{
  public function index(){
    $imgs = DB::select('select * from images', [1]);
    $products = DB::select('select * from productos', [1]);
    return view('product',['products'=>$products,'imgs'=>$imgs]);
  }
  public function tool(Request $request){
    $directory = 'img/icons/svg';
    $scanned_directory = array_diff(scandir($directory), array('..', '.'));
    $sb = substr($request->_size,strpos($request->_size, 'x '),strlen($request->_size));
    $width = substr($sb,2,strlen($sb)-3);
    $height=substr($request->_size.'"', 0, strpos($request->_size, '"'));
    switch ($request->P_name) {
      case 'Postcards':
      if ($height < 5) {
       $pixelW = ($width *96)*1.4;
       $pixelh=($height *96)*1.4;
     }else{
      $pixelW = $width *96;
      $pixelh=$height *96;
    }
    break;
    case 'Standard Business Cards':
    $pixelW = ($width *96)*2;
    $pixelh=($height *96)*2;
    break;
    case 'Square Business Cards':
    $pixelW = ($width *96)*2;
    $pixelh=($height *96)*2;
    break;
    case 'Circle Business Cards':
    $pixelW = ($width *96)*2;
    $pixelh=($height *96)*2;
    break;
    case 'Slim Business Cards':
    $pixelW = ($width *96)*2;
    $pixelh=($height *96)*2;
    break;
    case 'Plastic Business Cards':
    $pixelW = ($width *96)*2;
    $pixelh=($height *96)*2;
    break;
    case 'Oval Business Cards':
    $pixelW = ($width *96)*2;
    $pixelh=($height *96)*2;
    break;
    case 'Calendars':
    $pixelW = ($width *96)*2;
    $pixelh=($height *96)*2;
    break;
    case 'Door Hangers':
    $pixelW = ($width *96)*2;
    $pixelh=($height *96)*2;
    break;
    case 'Envelope':
    $pixelW = ($width *96)*2;
    $pixelh=($height *96)*2;
    break;
  };

  $imgs = DB::table('images')->where('type', 1)->get();
  $user_imgs = DB::table('images')->where('type', 2)->get();
    //dd($scanned_directory);
  return view('tool')->with(['class'=>$request->id_P,'cut'=>$request->id_P,'nombre'=>$request->P_name,'cara'=>$request->_sides,'spec'=>$request->_idspc,'idC'=>$request->_idC,'width'=>$pixelW,'corner'=>str_replace(' ', '', $request->_Corners),'height'=>$pixelh,'imgs'=>$imgs,'user_imgs'=>$user_imgs,'icons'=> $scanned_directory]);
}

public function callicons(Request $request){
 $directory = 'img/icons/svg/'.$request->name;
 $scanned_directory = array_diff(scandir($directory), array('..', '.'));
 return response()->json(['success'=>$scanned_directory]);
}

public function uploadpost(Request $request){ 
 request()->validate([
  'uploadFile' => 'required',
]);
 foreach ($request->file('uploadFile') as $key => $value) {
  $imageName = time(). $key . '.' . $value->getClientOriginalExtension();
  $value->move(public_path('img'), $imageName);
}
return back()->with('success','Image Upload successfully');
}
public function upload(Request $request){
 $supplier_name = $request->name;
 $extension = $request->file('file');
 $extension = $request->file('file')->getClientOriginalExtension();
 $dir = 'img/templates/userfiles/';
 $filenameUrl = uniqid().'_'.time().'_'.date('Ymd').'.'.$extension;
 $filename = 'Userfile_'.time().'_'.date('Ymd');   
 $request->file('file')->move($dir, $filenameUrl);
 DB::table('images')->insertGetId(
  array('name' =>$filename,'type' =>2, 'url' =>$filenameUrl)
);
 $user_imgs = DB::table('images')->where('type', 2)->get();
 return response()->json(['success'=>'Images Uploaded Successfully.','user_imgs'=>$user_imgs,'url'=>$filenameUrl]);
}
public function deleteimg(Request $request){
  $img_id = $request->id;
  $img_name = $request->name;
  $user_imgs = DB::table('images')->where('type', 2)->get();
  $image_path = 'img/templates/imageupload/'.$img_name; 
  unlink($image_path);
  $deletecall = DB::table('images')->where('id', $img_id)->delete();
  $user_imgs = DB::table('images')->where('type', 2)->get();
  return response()->json(['success'=>$image_path,'user_imgs'=>$user_imgs,'dba_delete'=>$deletecall]);
}
public function userimg(){
 $user_imgs = DB::table('images')->where('type', 2)->get();
 return response()->json(['success'=>'Images load Successfully.','user_imgs'=>$user_imgs]);
}

public function jsontemplates(Request $request){
  define('UPLOAD_DIR', 'upload-products/Templates');
  $file = UPLOAD_DIR .'Templates.json';
  if ($request->json==2) {
    $jsonString = file_get_contents('upload-products/Templates.json');
    $data = json_decode($jsonString, true);
    return response()->json(['success'=>$data]);
  }else{
    $success = file_put_contents($file, json_encode($request->json));
    //$data = json_decode($success, true);
    return response()->json(['success'=>$success]);
  }
  if ($request->action==2) {

  }else{

  }

}
public function BDtemplates(Request $request){
  define('UPLOAD_DIR', 'img/templates/');
  $filename = substr(uniqid(),8).'_'.date('Y-m-d');
  $namecut = str_replace(' ', '',$request->name);
  $imagenA = $namecut.$filename.'_F';
  $imagenB = $namecut.$filename.'_B';
  if ($request->action==1){
   $success = DB::table('templates')->insertGetId(
     array('type' =>$request->id,'name' =>$request->name, 'cv' =>$request->cv,'cv2' =>$request->cv2,'img' =>$imagenA, 'img2' =>$imagenB)
   );
   if ($success) {
     $sideA = str_replace('data:image/png;base64,', '', $request->img);
     $sideA = str_replace(' ', '+', $sideA);
     $data1 = base64_decode($sideA);
     $sideB = str_replace('data:image/png;base64,', '', $request->img2);
     $sideB = str_replace(' ', '+', $sideB);
     $data2 = base64_decode($sideB);
     $file1 = UPLOAD_DIR .$imagenA.'.png';
     $file2 = UPLOAD_DIR .$imagenB.'.png';
     $successA = file_put_contents($file1, $data1);
     $successB = file_put_contents($file2, $data2);
   }
   return response()->json(['success'=>$success]);
 }
 if ($request->action==2) {
  $success =  DB::table('templates')->select('id','name', 'type', 'img', 'img2')->get();
  return response()->json(['success'=>$success]);
}
if ($request->action==4) {
  $success = DB::table('templates')->where('name', $request->name)->orwhere('id', $request->id)->delete();
  if ($success) {
    $image_path1 = 'img/templates/'.$request->img1.'.png';
    $image_path2 = 'img/templates/'.$request->img2.'.png';
    unlink($image_path1);
    unlink($image_path2);
  }
  return response()->json(['success'=>$success]);
}

if ($request->action==3) {
  $success =  DB::table('templates')->where('name', $request->name)->update(['type' =>$request->id,'name' =>$request->name, 'cv' =>$request->cv,'cv2' =>$request->cv2,'img' =>$request->img, 'img2' =>$request->img2]);
  return response()->json(['success'=>$success]);
}
if ($request->action==5) {
  $success =  DB::table('templates')->select('id','name', 'type', 'cv', 'cv2')->where('id', $request->id)->get();
  return response()->json(['success'=>$success]);
}

}
}
