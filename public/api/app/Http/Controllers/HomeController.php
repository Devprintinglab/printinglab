<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class HomeController extends Controller
{
  /**
  * Create a new controller instance.
  *
  * @return void
  */
  public function __construct()
  {
    $this->middleware('auth');
  }

  /**
  * Show the application dashboard.
  *
  * @return \Illuminate\Http\Response
  */
  public function index()
  {
    $id = Auth::id();
    $SelectUser=DB::table('users')->where('id',$id)->get();
    foreach ($SelectUser as $key) {
      $nombre=$key->name;
      $last_name=$key->last_name;
      $email=$key->email;
      $address=$key->address;
      $phone=$key->phone;
      $zip=$key->zip_code;
      $Uid=$key->user_ID;
      
    }

    $sales=DB::table('compras')
    ->join('users','compras.id_user','=', 'users.id')
    ->select('id_compras','date','address','numero_venta','total')
    ->where('id','=',$id)
    ->paginate(5);
    return view('home',[
      'nombre'=>$nombre,
      'last_name'=>$last_name,
      'email'=>$email,
      'address'=>$address,
      'phone'=>$phone,
      'zip'=>$zip,
      'result'=>$sales,
      'Uid'=>$Uid]);
    }
    
    public function CloseUser()
    {
      Auth::logout();
      return view('/welcome');
    }

  }
