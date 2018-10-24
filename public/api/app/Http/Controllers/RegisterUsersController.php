<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;



use Illuminate\Auth\Passwords\CanResetPassword;

use Session;
class RegisterUsersController extends Controller
{
  public function ViewRegister(){
    return view('register');
  }

  public function Registeramzomuser(Request $request){
    $nameN =$request->name;
    $userID =$request->user_ID;
    $type =$request->tipe;
    $emailN =$request->email;
    //$confirm_emailN =$request->confirm_email;
    //$password =$request->password;
    //$confirme_password =$request->confirme_password;
    if ($type==1) {
      $success =  DB::table('users')->select('name','email')->where('email', $emailN)->get();
      if (isset($success[0])) {
        return response()->json(['success'=>true]);
      }else{
        return response()->json(['success'=>false]);
      }
    }
    if ($type==2){
       $success =  DB::table('users')->where('email', $emailN)->update(['user_ID'=>$userID]);
        return response()->json(['success'=>$userID]);
    }
  }

  public function Register(Request $request){
    $nameN =$request->name;
    $user_ID =$request->userID;
    $last_nameN =$request->last_name;
    $emailN =$request->email;
    $confirm_emailN =$request->confirm_email;
    $password =$request->password;
    $confirme_password =$request->confirme_password;
    $count_password=strlen($password);
    if ($emailN==$confirm_emailN) {
      if ($password==$confirme_password) {
        if ($count_password>=6) {
          $email=strtolower($emailN);
          $consulta= DB::select("SELECT email FROM usuarios WHERE  email='$email'");
          if (isset($consulta[0])) {
            return view('register',['email_nosame'=>'The email has already been taken.']);
          }else{
            //$encrypted = Crypt::encrypt($request->password);
            //$encrypted = bcrypt($password);
          //  $encrypted=Hash::make($password);
          //    dd($encrypted);
            $name=strtolower($nameN);
            $last_name=strtolower($last_nameN);
            $data=array('name'=>$name,'user_ID'=>$user_ID,'last_name'=>$last_name,'email'=>$email,'password'=>$password);
            $insert=DB::table('usuarios')->insert($data);
            if ($insert==true) {
              $consulta_iduser= DB::select("SELECT id_user FROM usuarios WHERE  email='$email'");
              foreach ($consulta_iduser as $key ) {
                $id_user=$key->id_user;
              }
              session(['user_client']);
              $data_user=[
                'nombre'=>$name,
                'id_user'=>$id_user
              ];
              Session::put('user_client',$data_user);
              return view('count-user',['nombre_client'=>$name]);
            }else{
              return view('register',['prueba'=>'fallo insert']);
            }
          }
        }else{
          return view('register',['password_nosame'=>'The password must be at least 6 characters.']);
        }
      }else{
        return view('register',['password_nosame'=>'The password confirmation does not match.']);
      }
    }else{
      return view('register',['email_nosame'=>'The email no match.']);
    }



  }




}
