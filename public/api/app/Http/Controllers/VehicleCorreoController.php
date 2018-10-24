<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\Email_Vehicle;
use Illuminate\Support\Facades\Mail;

class VehicleCorreoController extends Controller
{
  public function EnviarCorreo(Request $Request){
    $nombre =$Request->nombre;
    $telefono =$Request->telefono;
    $email =$Request->email;
    $compania =$Request->compania;
    $comentario =$Request->comentario;
    $producto=$Request->producto;
    $emailE='contacto@tienda.printinglab.com';
    $select_option = [$Request->checkbox1,
    $Request->checkbox2,
    $Request->checkbox3,
    $Request->checkbox4,
    $Request->checkbox5];
    $datos=[
      'nombre'=>$nombre,
      'telefono'=>$telefono,
      'email'=>$email,
      'compania'=>$compania,
      'product'=>$producto,
      'comentario'=>$comentario,
      'select_option'=>$select_option,
    ];
    Mail::to($emailE)->send(new Email_Vehicle($datos));
    return view('vehicle-graphics');
  }
}
