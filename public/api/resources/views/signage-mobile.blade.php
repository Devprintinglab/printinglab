@extends('layouts.app')
@section('title')
Signage - Printing Lab
@endsection
@section('content')
<div class="container textoscontainer">
  <form action="{{route('EmailSignage')}}"  method="POST"  enctype="multipart/form-data">
    {{csrf_field()}}
    <div class="row">
      <div class="col-md-12">
        <input class="datosemailmobil" placeholder="Full Name*" type="text" name="nombre" required>
      </div>
      <div class="col-md-12">
        <input class="datosemailmobil" placeholder="Phone*" type="number" name="telefono" required>
      </div>
      <div class="col-md-12">
        <input class="datosemailmobil" placeholder="Email*" type="email" name="email" required>
      </div>
      <div class="col-md-12">
        <input class="datosemailmobil" placeholder="Company Name" type="text" name="compania" >
      </div>
      <div class="col-md-12">
        <input class="datosemailmobil" placeholder="Width" type="number" name="width">
      </div>
      <div class="col-md-12">
        <input class="datosemailmobil" placeholder="Height" type="number" name="height">
      </div>
      <div class="col-md-12">
        <div class="fileMobilesignage">
          <div class="output">
            <p></p>
          </div>
          <p>Upload Your File</p>
          <input type="file" id="archivounouno" name="archivo">
        </div>
      </div>
    </div>
    <h5 class="center">Select an Option</h5>
    <div class="center">
      <div class="funkyradio">
        <div class="funkyradio-default">
          <input type="checkbox" name="checkbox1" id="checkbox1"  value="AWNINGS"/>
          <label for="checkbox1">Awnings</label>
        </div>
      </div>
      <div class="funkyradio">
        <div class="funkyradio-default">
          <input type="checkbox" name="checkbox2" id="checkbox2" value="LIGHT BOXES"/>
          <label for="checkbox2">Light Boxes</label>
        </div>
      </div>
      <div class="funkyradio">
        <div class="funkyradio-default">
          <input type="checkbox" name="checkbox3" id="checkbox3" value="BLADE SIGNS"/>
          <label for="checkbox3">Blade Signs</label>
        </div>
      </div>
      <div class="funkyradio">
        <div class="funkyradio-default">
          <input type="checkbox" name="checkbox4" id="checkbox5" value="FLAT SIGNS"/>
          <label for="checkbox5">Flat Signgs</label>
        </div>
      </div>
      <div class="funkyradio">
        <div class="funkyradio-default">
          <input type="checkbox" name="checkbox5" id="checkbox8" value="CHANNEL LETTERS"/>
          <label for="checkbox8">Channel Letters</label>
        </div>
      </div>
    </div>
    <textarea placeholder="Message*" class="form-control" rows="1" id="text" name="comentario" required></textarea>
    <div class="g-recaptcha" data-sitekey="6Lc71FMUAAAAADzrSEncv4kdpeR2hDjOtm22mVNz"></div>
    <button type="submit" class="botonmodal " value="Submit">
      SUBMIT FORM
    </button>
  </form>
</div>
@endsection
@section('scripts')
<script>
$('#archivounouno').on('change', function(e){
  //validación peso del archivo en by
  var input = document.getElementById('archivounouno');
  var clicked = e.target;
  var file = clicked.files[0];
  if (file.size>20000000 )
  {
    $('.output p').text('');
    $("#archivounouno").val('');
    $.confirm({
      title: 'Alert!',
      content: 'The file can not exceed 20Mb',
      draggable: false,
      buttons: {
        confirm: function () {
        },
      }
    })
  }else {
    var filePath = 	document.getElementById('archivounouno').value;
    var allowedExtensions = /(.jpg|.psd|.png|.ai|.pdf|.zip|.ZIP|.PSD|.PNG|.AI|.PDF|.jpeg)$/i;
    //validacion extension
    if (!allowedExtensions.exec(filePath)) {
      $('.output p').text('');
      $("#archivounouno").val('');
      $.confirm({
        title: 'Alert!',
        content: 'The extension of the file is not allowed',
        draggable: false,
        buttons: {
          confirm: function () {
          },
        }
      })
    }else{
      var ruta = $(this).val();
      var substr = ruta.replace('C:\\fakepath\\', '');
      $('.output p').text(substr);
      $('.output').css({
        "opacity": 1,
        "transform": "translateY(0px)"
      });
      $('.file > p').addClass('change');
    }
  }
});

$('.botonmodal').click(function(){
  if ($('#checkbox1').prop('checked')||$('#checkbox2').prop('checked')||$('#checkbox3').prop('checked')||$('#checkbox5').prop('checked')||$('#checkbox8').prop('checked')){
    if ($.trim($('#text').val()).length < 1) {
      $.confirm({
        title: 'Alert!',
        content: 'The field is empty, please fill it.',
        draggable: false,
        buttons: {
          confirm: function () {
          },
        }
      })
      return false;
    }else{
      return true;
    }
  }else {
    $.confirm({
      title: 'Alert!',
      content: 'You must check an option.',
      draggable: false,
      buttons: {
        confirm: function () {
        },
      }
    })
    return false;
  }
});
</script>
@endsection
