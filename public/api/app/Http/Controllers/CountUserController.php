<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use App\User;

class CountUserController extends Controller
{
  public   function   __construct ( )
  {
    $this -> middleware ( 'auth' ) ;
  }
  public function UpdateUser(Request $request){
    $id = Auth::id();
    $nombre= strtolower($request->name);
    $last_name= strtolower($request->last_name);
    $email= strtolower($request->email);
    $address= strtolower($request->address);
    $billing_address= strtolower($request->billing_address);
    $phone=$request->phone;
    $zip=$request->zip_code;
    $consulta= DB::select("SELECT id FROM users WHERE  email='$email' and id<>'$id'");
    $sales=DB::table('compras')
    ->join('users','compras.id_user','=', 'users.id')
    ->select('id_compras','date','address','numero_venta','total')
    ->where('id','=',$id)
    ->paginate(5);
    if (count($consulta)==1){
      $error="This email is already on use.";
      return view('home',['nombre'=>$nombre,'last_name'=>$last_name,'email'=>$email,'address'=>$address,'phone'=>$phone,'zip'=>$zip,'error_user'=>$error,'result'=>$sales]);
    }else{
      $UpdateUser = DB::table('users') ->where('id', $id) ->update(['name' => $nombre,'last_name'=>$last_name,'email'=>$email,'address'=>$address,'phone'=>$phone,'zip_code'=>$zip]);
      if (count($UpdateUser)==1){
        $succes="Changes saved successfully";
        return view('home',['nombre'=>$nombre,'last_name'=>$last_name,'email'=>$email,'address'=>$address,'phone'=>$phone,'zip'=>$zip,'success_user'=>$succes,'result'=>$sales]);
      }else{
        $error="Sorry, we can't update your info. Please try again.";
        return view('home',['nombre'=>$nombre,'last_name'=>$last_name,'email'=>$email,'address'=>$address,'phone'=>$phone,'zip'=>$zip,'error_user'=>$error,'result'=>$sales]);
      }
    }
  }

  public function UpdatePassword(Request $request){
    $clave1= strlen($request->get('new-password'));
    $clave2=strlen($request->get('new-password_confirmation'));
    if ($clave1 <6 || $clave2<6) {
      return redirect()->back()->with("error","The password must be at least 6 characters.");
    }
    if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
      // The passwords matches
      return redirect()->back()->with("error","Your current password does not matches with the password you provided. Please try again.");
    }
    if(strcmp($request->get('current-password'), $request->get('new-password')) == 0){
      //Current password and new password are same
      return redirect()->back()->with("error","New Password cannot be same as your current password. Please choose a different password.");
    }
    $validatedData = $request->validate([
      'current-password' => 'required',
      'new-password' => 'required|string|min:6|confirmed',
    ]);
    //Change Password
    $user = Auth::user();
    $user->password = bcrypt($request->get('new-password'));
    $user->save();
    return redirect()->back()->with("success","Password changed successfully!");
  }

  public function DeleteCount(Request $request){
    if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
      // The passwords matches
      return redirect()->back()->with("result_delet","Your current password does not matches with the password you provided. Please try again.");
    }
     $id = Auth::id();
    // $users = User::findOrFail($id);
    // $users->delete();
    $UpdateUser = DB::table('users') ->where('id', $id) ->update(['name' => '000','last_name'=>'000','email'=>'000@'.$id.'.com ','address'=>'000','phone'=>'000','zip_code'=>'000']);
    Auth::logout();
    return view('welcome');
  }

  public function details(Request $request){
    $id= $request->id;
    $detail=DB::select("SELECT productos.nombre as productname,img1,numero_venta,total,attr1,attr2,attr3,attr4,attr5,attr6,attr7,attr8,attr9,attr10,attr11,attr12 from compras join compraxproduct on compras.id_compras= compraxproduct.id_compras
      join especixproduct on especixproduct.id_especificaciones=compraxproduct.id_especixproduct JOIN categoria on categoria.id_categorias=especixproduct.id_categoria
      JOIN productos on productos.id_productos=especixproduct.id_productos JOIN especificaciones on especixproduct.id_especificaciones=especificaciones.id_especificaciones
      WHERE compras.id_compras='$id'");
      return view('sale-details',['result'=>$detail]);
  }

}
