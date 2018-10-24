<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\Email_Trade;
use Illuminate\Support\Facades\Mail;

class TradeCorreoController extends Controller
{
  public function EnviarCorreo(Request $Request){
    $nombre =$Request->nombre;
    $telefono =$Request->telefono;
    $email =$Request->email;
    $compania =$Request->compania;
    $comentario =$Request->comentario;
    $emailE='contacto@tienda.printinglab.com';
    $datos=[
      'nombre'=>$nombre,
      'telefono'=>$telefono,
      'email'=>$email,
      'compania'=>$compania,
      'comentario'=>$comentario];
    Mail::to($emailE)->send(new Email_Trade($datos));
    return view('trade-shows');
  }
}
