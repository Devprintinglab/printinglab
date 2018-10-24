<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\Email_Large;
use Illuminate\Support\Facades\Mail;

class LargeCorreoController extends Controller
{
  public function EnviarCorreo(Request $Request){
    $emailE='contacto@tienda.printinglab.com';
    $nombre =$Request->nombre;
    $telefono =$Request->telefono;
    $email =$Request->email;
    $compania =$Request->compania;
    $comentario =$Request->comentario;
    $select_option = [$Request->checkbox1,
    $Request->checkbox2];
    $datos=[
      'nombre'=>$nombre,
      'telefono'=>$telefono,
      'email'=>$email,
      'compania'=>$compania,
      'comentario'=>$comentario,
      'select_option'=>$select_option,
    ];
    Mail::to($emailE)->send(new Email_Large($datos));
    return view('large-format');
  }
}
