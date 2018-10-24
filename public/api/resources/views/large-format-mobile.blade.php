@extends('layouts.app')
@section('title')
Large Format - Printing Lab
@endsection
@section('content')
<div class="container textoscontainer">
  <form action="{{route('EmailLarge')}}"   method="post">
    {{csrf_field()}}
    <div class="row">
      <div class="col-md-12">
        <input class="datosemailmobil" placeholder="Full Name*" type="text" name="nombre" required>
      </div>
      <div class="col-md-12">
        <input class="datosemailmobil" placeholder="Phone*" type="tel" name="telefono" required>
      </div>
      <div class="col-md-12">
        <input class="datosemailmobil" placeholder="E-mail*" type="email" name="email" required>
      </div>
      <div class="col-md-12">
        <input class="datosemailmobil" placeholder="Company Name" type="text" name="compania" >
      </div>
    </div>
    <div class="box">Select an Option</div>
    <div class="center">
      <div class="funkyradio">
        <div class="funkyradio-default">
          <input type="checkbox"  name="checkbox1" id="checkbox1" value="BANNERS">
          <label for="checkbox1">Banners</label>
        </div>
      </div>
      <div class="funkyradio">
        <div class="funkyradio-default">
          <input type="checkbox" id="checkbox2" name="checkbox2" value="VINYL GRAPHICS">
          <label for="checkbox2">Vinyl Graphics</label>
        </div>
      </div>
    </div>
    <textarea placeholder="Message*" class="form-control" id="text"rows="1" name="comentario" required></textarea>
    <div class="g-recaptcha" data-sitekey="6LfVdEAUAAAAAGU-ey1nXYoKztntr9v0lxI0Sli8"></div>
    <button type="submit" class="botonmodal " value="Submit">
      SUBMIT
    </button>
  </form>
</div>
@endsection
@section('scripts')
<script>
$('.botonmodal').click(function(){
  if ($('#checkbox1').prop('checked')||$('#checkbox2').prop('checked')){
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
