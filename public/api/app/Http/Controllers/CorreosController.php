<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Mail\Email_Signage;
use Illuminate\Support\Facades\Mail;





class CorreosController extends Controller
{


  // public function index(){
  //   return view('emails.signage');
  // }
  //


  public function EnviarCorreo( Request $Request ){

    $nombre= $Request->nombre;
    $telefono=$Request->telefono;
    $email=$Request->email;
    $compania=$Request->compania;
    $width=$Request->width;
    $height=$Request->height;
    $comentario=$Request->comentario;
    $emailE='contacto@tienda.printinglab.com';

    $imagen=$Request->file('archivo');
    $nombre_image=$imagen->getClientOriginalName();
    $nombre_image=rand(1,9999).'-'.date('H').'-'.date('d').'-'.date('F').'-'.date('Y').'-'.$email.$nombre_image;
    $imagen->move('images-mails/',$nombre_image);
    

    $select_option = [$Request->checkbox1,
    $Request->checkbox2,
    $Request->checkbox3,
    $Request->checkbox4,
    $Request->checkbox5];


    $datos= ['nombre' =>$nombre,
    'telefono'=>$telefono,
    'email' =>$email,
    'compania'=>$compania,
    'width'=>$width,
    'height'=>$height,
    'Options'=>$select_option,
    'comentario' =>$comentario,
    'imagen'=>$nombre_image];
    Mail::to($emailE)->send(new Email_Signage($datos) );



    return view('signage');

  }



}
