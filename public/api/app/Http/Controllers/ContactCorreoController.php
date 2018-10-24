<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\Email_Contact;
use Illuminate\Support\Facades\Mail;

class ContactCorreoController extends Controller
{
  public function EnviarCorreo(Request $Request){
    $nombre=$Request->nombre;
    $telefono=$Request->telefono;
    $email=$Request->email;
    $producto=$Request->producto;
    $compania=$Request->compania;
    $comentario=$Request->comentario;
    $emailE='contacto@tienda.printinglab.com';
    $datos=[
      'nombre'=>$nombre,
      'telefono'=>$telefono,
      'email'=>$email,
      'producto'=>$producto,
      'compania'=>$compania,
      'comentario'=>$comentario,
    ];
    Mail::to($emailE)->send(new Email_Contact($datos));
    return view('contact-us');
  }
}
