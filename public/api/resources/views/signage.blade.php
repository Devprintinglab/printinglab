@extends('layouts.app')
@section('title')
Signage - Printing Lab
@endsection
@section('content')
<div id="carouselExampleIndicatorsM" class="carousel slide mobile-slider-pages" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicatorsM" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicatorsM" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicatorsM" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner slide-signage">
    <div class="carousel-item active">
      <img src="images/signage/slide-signage-mobile-printing-lab-1.jpg">
    </div>
    <div class="carousel-item">
      <img src="images/signage/slide-signage-mobile-printing-lab-2.jpg">
    </div>
    <div class="carousel-item">
      <img src="images/signage/slide-signage-mobile-printing-lab-3.jpg">
    </div>
  </div>
</div>
<div id="carouselExampleIndicators" class="carousel slide pc-slider-pages" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner slide-signage">
    <div class="carousel-item active">
      <img src="images/signage/slider-gallery-printing-lab-new-jersey-1.jpg">
    </div>
    <div class="carousel-item">
      <img src="images/signage/slider-gallery-printing-lab-new-jersey-2.jpg">
    </div>
    <div class="carousel-item">
      <img src="images/signage/slider-gallery-printing-lab-new-jersey-3.jpg">
    </div>
  </div>
</div>
<div class="barracolor1 mobile-slider-pages">
  <div class="container">
    <div class="row">
      <div class="col-md-12 ">
        <a href="{{url('/signage-mobile')}}" class="h2-mobile"><h2>START WITH A FREE QUOTE</h2></a>
      </div>
    </div>
  </div>
</div>
<div class="barracolor1 pc-slider-pages">
  <div class="container">
    <div class="row">
      <div class="col-md-12 ">
        <a href="#" data-toggle="modal" data-target="#miModal"><h2>START WITH A FREE QUOTE</h2></a>
      </div>
    </div>
  </div>
</div>
<div class="container container_img">
  <div class="contenido-propio gallery">
    <div class="row row-propio-gallery">
      <div class="col-md-4 col-sm-4 col-4 contenedorespadding">
        <a data-fancybox="gallery" href="images/signage/interna/signage-gallery-printing-lab-new-jersey-1.jpg">
          <img class="img_gallery_tipe_11" src="images/signage/signage-gallery-printing-lab-new-jersey-1.jpg">
        </a>
      </div>
      <div class="col-md-8 col-sm-8 col-8 contenedorespadding">
        <div class="col-md-12 col-sm-12 contenedorespadding">
          <a data-fancybox="gallery" href="images/signage/interna/signage-gallery-printing-lab-new-jersey-5.jpg">
            <img class="img_gallery_tipe_12" src="images/signage/signage-gallery-printing-lab-new-jersey-5.jpg">
          </a>
        </div>
        <div class="row">
          <div class="col-md-6 col-sm-6 col-6 contenedorespadding">
            <a data-fancybox="gallery" href="images/signage/interna/signage-gallery-printing-lab-new-jersey-7.jpg">
              <img class="img_gallery_tipe_13" src="images/signage/signage-gallery-printing-lab-new-jersey-7.jpg">
            </a>
          </div>
          <div class="col-md-6 col-sm-6 col-6 contenedorespadding">
            <a data-fancybox="gallery" href="images/signage/interna/signage-gallery-printing-lab-new-jersey-3.jpg">
              <img class="img_gallery_tipe_14" src="images/signage/signage-gallery-printing-lab-new-jersey-3.jpg">
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="contenido-propio gallery">
    <div class="row row-propio-gallery">
      <div class="col-md-8 col-sm-8 col-8 contenedorespadding">
        <div class="col-md-12 col-sm-12 contenedorespadding">
          <a data-fancybox="gallery" href="images/signage/interna/signage-gallery-printing-lab-new-jersey-2.jpg">
            <img class="img_gallery_tipe_21" src="images/signage/signage-gallery-printing-lab-new-jersey-2.jpg">
          </a>
        </div>
        <div class="row">
          <div class="col-md-6 col-sm-6 col-6 contenedorespadding">
            <a data-fancybox="gallery" href="images/signage/interna/signage-gallery-printing-lab-new-jersey-8.jpg">
              <img class="img_gallery_tipe_22" src="images/signage/signage-gallery-printing-lab-new-jersey-8.jpg">
            </a>
          </div>
          <div class="col-md-6 col-sm-6 col-6 contenedorespadding">
            <a data-fancybox="gallery" href="images/signage/interna/signage-gallery-printing-lab-new-jersey-4.jpg">
              <img class="img_gallery_tipe_23" src="images/signage/signage-gallery-printing-lab-new-jersey-4.jpg">
            </a>
          </div>
        </div>
      </div>
      <div class="col-md-4 col-sm-4 col-4 contenedorespadding">
        <a data-fancybox="gallery" href="images/signage/interna/signage-gallery-printing-lab-new-jersey-6.jpg">
          <img class="img_gallery_tipe_24" src="images/signage/signage-gallery-printing-lab-new-jersey-6.jpg">
        </a>
      </div>
    </div>
  </div>
  <div class="contenido-propio gallery">
    <div class="row row-propio-gallery">
      <div class="col-md-4 col-sm-4 col-4 contenedorespadding">
        <a data-fancybox="gallery" href="images/signage/interna/signage-gallery-printing-lab-new-jersey-10.jpg">
          <img class="img_gallery_tipe_11" src="images/signage/signage-gallery-printing-lab-new-jersey-10.jpg">
        </a>
      </div>
      <div class="col-md-8 col-sm-8 col-8 contenedorespadding">
        <div class="col-md-12 col-sm-12 contenedorespadding">
          <a data-fancybox="gallery" href="images/signage/interna/signage-gallery-printing-lab-new-jersey-11.jpg">
            <img class="img_gallery_tipe_12" src="images/signage/signage-gallery-printing-lab-new-jersey-11.jpg">
          </a>
        </div>
        <div class="row">
          <div class="col-md-6 col-sm-6 col-6 contenedorespadding">
            <a data-fancybox="gallery" href="images/signage/interna/signage-gallery-printing-lab-new-jersey-9.jpg">
              <img class="img_gallery_tipe_13" src="images/signage/signage-gallery-printing-lab-new-jersey-9.jpg">
            </a>
          </div>
          <div class="col-md-6 col-sm-6 col-6 contenedorespadding">
            <a data-fancybox="gallery" href="images/signage/interna/signage-gallery-printing-lab-new-jersey-12.jpg">
              <img class="img_gallery_tipe_14" src="images/signage/signage-gallery-printing-lab-new-jersey-12.jpg">
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="contenido-propio gallery">
    <div class="row row-propio-gallery">
      <div class="col-md-8 col-sm-8 col-8 contenedorespadding">
        <div class="col-md-12 col-sm-12 contenedorespadding">
          <a data-fancybox="gallery" href="images/signage/interna/signage-gallery-printing-lab-new-jersey-13.jpg">
            <img class="img_gallery_tipe_21" src="images/signage/signage-gallery-printing-lab-new-jersey-13.jpg">
          </a>
        </div>
        <div class="row">
          <div class="col-md-6 col-sm-6 col-6 contenedorespadding">
            <a data-fancybox="gallery" href="images/signage/interna/signage-gallery-printing-lab-new-jersey-14.jpg">
              <img class="img_gallery_tipe_22" src="images/signage/signage-gallery-printing-lab-new-jersey-14.jpg">
            </a>
          </div>
          <div class="col-md-6 col-sm-6 col-6 contenedorespadding">
            <a data-fancybox="gallery" href="images/signage/interna/signage-gallery-printing-lab-new-jersey-15.jpg">
              <img class="img_gallery_tipe_23" src="images/signage/signage-gallery-printing-lab-new-jersey-15.jpg">
            </a>
          </div>
        </div>
      </div>
      <div class="col-md-4 col-sm-4 col-4 contenedorespadding">
        <a data-fancybox="gallery" href="images/signage/interna/signage-gallery-printing-lab-new-jersey-16.jpg">
          <img class="img_gallery_tipe_24" src="images/signage/signage-gallery-printing-lab-new-jersey-16.jpg">
        </a>
      </div>
    </div>
  </div>
  <div class="contenido-propio gallery">
    <div class="row row-propio-gallery">
      <div class="col-md-4 col-sm-4 col-4 contenedorespadding">
        <a data-fancybox="gallery" href="images/signage/interna/signage-gallery-printing-lab-new-jersey-20.jpg">
          <img class="img_gallery_tipe_11" src="images/signage/signage-gallery-printing-lab-new-jersey-20.jpg">
        </a>
      </div>
      <div class="col-md-8 col-sm-8 col-8 contenedorespadding">
        <div class="col-md-12 col-sm-12 contenedorespadding">
          <a data-fancybox="gallery" href="images/signage/interna/signage-gallery-printing-lab-new-jersey-18.jpg">
            <img class="img_gallery_tipe_12" src="images/signage/signage-gallery-printing-lab-new-jersey-18.jpg">
          </a>
        </div>
        <div class="row">
          <div class="col-md-6 col-sm-6 col-6 contenedorespadding">
            <a data-fancybox="gallery" href="images/signage/interna/signage-gallery-printing-lab-new-jersey-17.jpg">
              <img class="img_gallery_tipe_13" src="images/signage/signage-gallery-printing-lab-new-jersey-17.jpg">
            </a>
          </div>
          <div class="col-md-6 col-sm-6 col-6 contenedorespadding">
            <a data-fancybox="gallery" href="images/signage/interna/signage-gallery-printing-lab-new-jersey-19.jpg">
              <img class="img_gallery_tipe_14" src="images/signage/signage-gallery-printing-lab-new-jersey-19.jpg">
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="contenido-propio gallery">
    <div class="row row-propio-gallery">
      <div class="col-md-8 col-sm-8 col-8 contenedorespadding">
        <div class="col-md-12 col-sm-12 contenedorespadding">
          <a data-fancybox="gallery" href="images/signage/interna/signage-gallery-printing-lab-new-jersey-23.jpg">
            <img class="img_gallery_tipe_21" src="images/signage/signage-gallery-printing-lab-new-jersey-23.jpg">
          </a>
        </div>
        <div class="row">
          <div class="col-md-6 col-sm-6 col-6 contenedorespadding">
            <a data-fancybox="gallery" href="images/signage/interna/signage-gallery-printing-lab-new-jersey-21.jpg">
              <img class="img_gallery_tipe_22" src="images/signage/signage-gallery-printing-lab-new-jersey-21.jpg">
            </a>
          </div>
          <div class="col-md-6 col-sm-6 col-6 contenedorespadding">
            <a data-fancybox="gallery" href="images/signage/interna/signage-gallery-printing-lab-new-jersey-22.jpg">
              <img class="img_gallery_tipe_23" src="images/signage/signage-gallery-printing-lab-new-jersey-22.jpg">
            </a>
          </div>
        </div>
      </div>
      <div class="col-md-4 col-sm-4 col-4 contenedorespadding">
        <a data-fancybox="gallery" href="images/signage/interna/signage-gallery-printing-lab-new-jersey-25.jpg">
          <img class="img_gallery_tipe_24" src="images/signage/signage-gallery-printing-lab-new-jersey-25.jpg">
        </a>
      </div>
    </div>
  </div>
</div>
<!-- Modal -->
<div class="modal fade" id="miModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" enctype="multipart/form-data">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 id="exampleModalLabel">FREE QUOTE</h4>
      </div>
      <div class="modal-body">
        <form action="{{route('EmailSignage')}}"  method="POST"  enctype="multipart/form-data">
          {{csrf_field()}}
          <div class="row">
            <input class="datospopup" placeholder="Full Name*" type="text" name="nombre" required>
            <input class="datospopup" placeholder="Phone*" type="number" name="telefono" required>
          </div>
          <div class="row">
            <input class="datospopup" placeholder="Email*" type="email" name="email" required>
            <input class="datospopup" placeholder="Company Name" type="text" name="compania" >
          </div>

          <div class="row">
              <input class="datospopup" placeholder="Width" type="number" name="width">
              <input class="datospopup" placeholder="Height" type="number" name="height">
          </div>
          <div style="display: inline-table;">
            <div class="fileModalsignage">
              <div class="output">
                <p></p>
              </div>
              <p>Upload Your File</p>
              <input type="file" id="archivounouno" name="archivo">
            </div>
          </div>
          <h5 class="center">Select an Option</h5>
          <div class="row rowselect">
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
          </div>
          <div class="row rowselect">
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
    </div>
  </div>
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
