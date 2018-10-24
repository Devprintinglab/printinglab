@extends('layouts.app')
@section('title')
Trade Shows - Printing Lab
@endsection
@section('content')

<div class="container textoscontainer">
  <form action="{{route('EmailTrade')}}" method="post">
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
    <textarea placeholder="Message*" id="text" class="form-control" rows="1" name="comentario" required></textarea>
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
});
</script>
@endsection
