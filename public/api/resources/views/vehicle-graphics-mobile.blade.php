@extends('layouts.app')
@section('title')
Vehicle Graphics - Printing Lab
@endsection
@section('content')

<div class="container textoscontainer">



  <form action="{{route('EmailVehicle')}}" method="post">
    {{csrf_field()}}
    <div class="row">
      <div class="col-md-12">
        <input class="datosemailmobil" placeholder="Full Name*" type="text" name="nombre" required>
      </div>
      <div class="col-md-12">
        <input class="datosemailmobil" placeholder="Phone*" type="tel" name="telefono" required>
      </div>
      <div class="col-md-12">
        <input class="datosemailmobil" placeholder="Email*" type="email" name="email" required>
      </div>
      <div class="col-md-12">
        <input class="datosemailmobil" placeholder="Company Name" type="text" name="compania" >
      </div>
    </div>
    <div class="center">
      <select id="formsel"  class="listfield rselement" name="producto" required>
        <option value="">Type of Vehicle*</option>
        <option value="Truck Wraps" class="optfield">Truck Wraps</option>
        <option value="Van Wraps" class="optfield">Van Wraps</option>
        <option value="Bus Wraps" class="optfield">Bus Wraps</option>
        <option value="Trailer Wraps" class="optfield">Trailer Wraps</option>
        <option value="Food Cart Wraps" class="optfield">Food Cart Wraps</option>
        <option value="Window Wraps" class="optfield">Window Wraps</option>
        <option value="Wall Wraps" class="optfield">Wall Wraps</option>
        <option value="Vinyl Lettering" class="optfield">Vinyl Lettering</option>
        <option value="Magnetic Signs" class="optfield">Magnetic Signs</option>
      </select>
    </div>
    <h5 class="box">Select an Option</h5>
    <div class="center">
      <div class="funkyradio">
        <div class="funkyradio-default">
          <input type="checkbox"  name="checkbox1" id="checkbox1" value="DECAL">
          <label for="checkbox1">Decal</label>
        </div>
      </div>
      <div class="funkyradio">
        <div class="funkyradio-default">
          <input type="checkbox" id="checkbox2" name="checkbox2" value="PARTIAl">
          <label for="checkbox2">Partial</label>
        </div>
      </div>
      <div class="funkyradio">
        <div class="funkyradio-default">
          <input type="checkbox" id="checkbox3" name="checkbox3" value="STRIPES">
          <label for="checkbox3">Stripes</label>
        </div>
      </div>
      <div class="funkyradio">
        <div class="funkyradio-default">
          <input type="checkbox" id="checkbox4" name="checkbox4" value="FULL WRAP">
          <label for="checkbox4">Full Wrap</label>
        </div>
      </div>

      <div class="funkyradio">
        <div class="funkyradio-default">
          <input type="checkbox" id="checkbox5" name="checkbox5" value="COLOR CHANGE">
          <label for="checkbox5">Color Change</label>
        </div>
      </div>
    </div>
    <textarea placeholder="Message*" class="form-control" rows="1" id="text" name="comentario" required></textarea>
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
  if ($('#checkbox1').prop('checked')||$('#checkbox2').prop('checked')||$('#checkbox3').prop('checked')||$('#checkbox5').prop('checked')||$('#checkbox4').prop('checked')){
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
