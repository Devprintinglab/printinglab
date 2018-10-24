@extends('layouts.app')
@section('title')
Trade Shows - Printing Lab
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
      <img src="images/trade/slider-mobile-trade-shows-gallery-printing-lab-new-jersey-1.jpg">
    </div>
    <div class="carousel-item">
      <img src="images/trade/slider-mobile-trade-shows-gallery-printing-lab-new-jersey-2.jpg">
    </div>
    <div class="carousel-item">
      <img src="images/trade/slider-mobile-trade-shows-gallery-printing-lab-new-jersey-3.jpg">
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
      <img src="images/trade/slider-trade-shows-gallery-printing-lab-new-jersey-1.jpg">
    </div>
    <div class="carousel-item">
      <img src="images/trade/slider-trade-shows-gallery-printing-lab-new-jersey-2.jpg">
    </div>
    <div class="carousel-item">
      <img src="images/trade/slider-trade-shows-gallery-printing-lab-new-jersey-3.jpg">
    </div>
  </div>
</div>
<div class="barracolor4 mobile-slider-pages">
  <div class="container">
    <div class="row">
      <div class="col-md-12 ">
        <a href="{{url('/trade-shows-mobile')}}" class="h2-mobile"><h2>START WITH A FREE QUOTE</h2></a>
      </div>
    </div>
  </div>
</div>
<div class="barracolor4 pc-slider-pages">
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
        <a data-fancybox="gallery" href="images/trade/interna/trade-shows-gallery-printing-lab-new-jersey-4.jpg">
          <img class="img_gallery_tipe_11" src="images/trade/trade-shows-gallery-printing-lab-new-jersey-4.jpg">
        </a>
      </div>
      <div class="col-md-8 col-sm-8 col-8 contenedorespadding">
        <div class="col-md-12 col-sm-12 contenedorespadding">
          <a data-fancybox="gallery" href="images/trade/interna/trade-shows-gallery-printing-lab-new-jersey-3.jpg">
            <img class="img_gallery_tipe_12" src="images/trade/trade-shows-gallery-printing-lab-new-jersey-3.jpg">
          </a>
        </div>
        <div class="row">
          <div class="col-md-6 col-sm-6 col-6 contenedorespadding">
            <a data-fancybox="gallery" href="images/trade/interna/trade-shows-gallery-printing-lab-new-jersey-1.jpg">
              <img class="img_gallery_tipe_13" src="images/trade/trade-shows-gallery-printing-lab-new-jersey-1.jpg">
            </a>
          </div>
          <div class="col-md-6 col-sm-6 col-6 contenedorespadding">
            <a data-fancybox="gallery" href="images/trade/interna/trade-shows-gallery-printing-lab-new-jersey-2.jpg">
              <img class="img_gallery_tipe_14" src="images/trade/trade-shows-gallery-printing-lab-new-jersey-2.jpg">
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
          <a data-fancybox="gallery" href="images/trade/interna/trade-shows-gallery-printing-lab-new-jersey-8.jpg">
            <img class="img_gallery_tipe_21" src="images/trade/trade-shows-gallery-printing-lab-new-jersey-8.jpg">
          </a>
        </div>
        <div class="row">
          <div class="col-md-6 col-sm-6 col-6 contenedorespadding">
            <a data-fancybox="gallery" href="images/trade/interna/trade-shows-gallery-printing-lab-new-jersey-5.jpg">
              <img class="img_gallery_tipe_22" src="images/trade/trade-shows-gallery-printing-lab-new-jersey-5.jpg">
            </a>
          </div>
          <div class="col-md-6 col-sm-6 col-6 contenedorespadding">
            <a data-fancybox="gallery" href="images/trade/interna/trade-shows-gallery-printing-lab-new-jersey-6.jpg">
              <img class="img_gallery_tipe_23" src="images/trade/trade-shows-gallery-printing-lab-new-jersey-6.jpg">
            </a>
          </div>
        </div>
      </div>
      <div class="col-md-4 col-sm-4 col-4 contenedorespadding">
        <a data-fancybox="gallery" href="images/trade/interna/trade-shows-gallery-printing-lab-new-jersey-7.jpg">
          <img class="img_gallery_tipe_24" src="images/trade/trade-shows-gallery-printing-lab-new-jersey-7.jpg">
        </a>
      </div>
    </div>
  </div>
  <div class="contenido-propio gallery">
    <div class="row row-propio-gallery">
      <div class="col-md-4 col-sm-4 col-4 contenedorespadding">
        <a data-fancybox="gallery" href="images/trade/interna/trade-shows-gallery-printing-lab-new-jersey-12.jpg">
          <img class="img_gallery_tipe_11" src="images/trade/trade-shows-gallery-printing-lab-new-jersey-12.jpg">
        </a>
      </div>
      <div class="col-md-8 col-sm-8 col-8 contenedorespadding">
        <div class="col-md-12 col-sm-12 contenedorespadding">
          <a data-fancybox="gallery" href="images/trade/interna/trade-shows-gallery-printing-lab-new-jersey-11.jpg">
            <img class="img_gallery_tipe_12" src="images/trade/trade-shows-gallery-printing-lab-new-jersey-11.jpg">
          </a>
        </div>
        <div class="row">
          <div class="col-md-6 col-sm-6 col-6 contenedorespadding">
            <a data-fancybox="gallery" href="images/trade/interna/trade-shows-gallery-printing-lab-new-jersey-9.jpg">
              <img class="img_gallery_tipe_13" src="images/trade/trade-shows-gallery-printing-lab-new-jersey-9.jpg">
            </a>
          </div>
          <div class="col-md-6 col-sm-6 col-6 contenedorespadding">
            <a data-fancybox="gallery" href="images/trade/interna/trade-shows-gallery-printing-lab-new-jersey-10.jpg">
              <img class="img_gallery_tipe_14" src="images/trade/trade-shows-gallery-printing-lab-new-jersey-10.jpg">
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
          <a data-fancybox="gallery" href="images/trade/interna/trade-shows-gallery-printing-lab-new-jersey-16.jpg">
            <img class="img_gallery_tipe_21" src="images/trade/trade-shows-gallery-printing-lab-new-jersey-16.jpg">
          </a>
        </div>
        <div class="row">
          <div class="col-md-6 col-sm-6 col-6 contenedorespadding">
            <a data-fancybox="gallery" href="images/trade/interna/trade-shows-gallery-printing-lab-new-jersey-14.jpg">
              <img class="img_gallery_tipe_22" src="images/trade/trade-shows-gallery-printing-lab-new-jersey-14.jpg">
            </a>
          </div>
          <div class="col-md-6 col-sm-6 col-6 contenedorespadding">
            <a data-fancybox="gallery" href="images/trade/interna/trade-shows-gallery-printing-lab-new-jersey-13.jpg">
              <img class="img_gallery_tipe_23" src="images/trade/trade-shows-gallery-printing-lab-new-jersey-13.jpg">
            </a>
          </div>
        </div>
      </div>
      <div class="col-md-4 col-sm-4 col-4 contenedorespadding">
        <a data-fancybox="gallery" href="images/trade/interna/trade-shows-gallery-printing-lab-new-jersey-15.jpg">
          <img class="img_gallery_tipe_24" src="images/trade/trade-shows-gallery-printing-lab-new-jersey-15.jpg">
        </a>
      </div>
    </div>
  </div>
  <div class="contenido-propio gallery">
    <div class="row row-propio-gallery">
      <div class="col-md-4 col-sm-4 col-4 contenedorespadding">
        <a data-fancybox="gallery" href="images/trade/interna/trade-shows-gallery-printing-lab-new-jersey-19.jpg">
          <img class="img_gallery_tipe_11" src="images/trade/trade-shows-gallery-printing-lab-new-jersey-19.jpg">
        </a>
      </div>
      <div class="col-md-8 col-sm-8 col-8 contenedorespadding">
        <div class="col-md-12 col-sm-12 contenedorespadding">
          <a data-fancybox="gallery" href="images/trade/interna/trade-shows-gallery-printing-lab-new-jersey-20.jpg">
            <img class="img_gallery_tipe_12" src="images/trade/trade-shows-gallery-printing-lab-new-jersey-20.jpg">
          </a>
        </div>
        <div class="row">
          <div class="col-md-6 col-sm-6 col-6 contenedorespadding">
            <a data-fancybox="gallery" href="images/trade/interna/trade-shows-gallery-printing-lab-new-jersey-17.jpg">
              <img class="img_gallery_tipe_13" src="images/trade/trade-shows-gallery-printing-lab-new-jersey-17.jpg">
            </a>
          </div>
          <div class="col-md-6 col-sm-6 col-6 contenedorespadding">
            <a data-fancybox="gallery" href="images/trade/interna/trade-shows-gallery-printing-lab-new-jersey-18.jpg">
              <img class="img_gallery_tipe_14" src="images/trade/trade-shows-gallery-printing-lab-new-jersey-18.jpg">
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
          <a data-fancybox="gallery" href="images/trade/interna/trade-shows-gallery-printing-lab-new-jersey-23.jpg">
            <img class="img_gallery_tipe_21" src="images/trade/trade-shows-gallery-printing-lab-new-jersey-23.jpg">
          </a>
        </div>
        <div class="row">
          <div class="col-md-6 col-sm-6 col-6 contenedorespadding">
            <a data-fancybox="gallery" href="images/trade/interna/trade-shows-gallery-printing-lab-new-jersey-22.jpg">
              <img class="img_gallery_tipe_22" src="images/trade/trade-shows-gallery-printing-lab-new-jersey-22.jpg">
            </a>
          </div>
          <div class="col-md-6 col-sm-6 col-6 contenedorespadding">
            <a data-fancybox="gallery" href="images/trade/interna/trade-shows-gallery-printing-lab-new-jersey-21.jpg">
              <img class="img_gallery_tipe_23" src="images/trade/trade-shows-gallery-printing-lab-new-jersey-21.jpg">
            </a>
          </div>
        </div>
      </div>
      <div class="col-md-4 col-sm-4 col-4 contenedorespadding">
        <a data-fancybox="gallery" href="images/trade/interna/trade-shows-gallery-printing-lab-new-jersey-24.jpg">
          <img class="img_gallery_tipe_24" src="images/trade/trade-shows-gallery-printing-lab-new-jersey-24.jpg">
        </a>
      </div>
    </div>
  </div>
  <div class="contenido-propio gallery">
    <div class="row row-propio-gallery">
      <div class="col-md-4 col-sm-4 col-xs-4 contenedorespadding">
        <a data-fancybox="gallery" href="images/trade/interna/trade-shows-gallery-printing-lab-new-jersey-25.jpg">
          <img class="img_gallery_tipe_11" src="images/trade/trade-shows-gallery-printing-lab-new-jersey-25.jpg" >
        </a>
      </div>
      <div class="col-md-4 col-sm-4 col-xs-4 contenedorespadding">
        <a data-fancybox="gallery" href="images/trade/interna/trade-shows-gallery-printing-lab-new-jersey-26.jpg">
          <img class="img_gallery_tipe_11" src="images/trade/trade-shows-gallery-printing-lab-new-jersey-26.jpg" >
        </a>
      </div>
      <div class="col-md-4 col-sm-4 col-xs-4 contenedorespadding">
        <a data-fancybox="gallery" href="images/trade/interna/trade-shows-gallery-printing-lab-new-jersey-27.jpg">
          <img class="img_gallery_tipe_11" src="images/trade/trade-shows-gallery-printing-lab-new-jersey-27.jpg" >
        </a>
      </div>
    </div>
  </div>
</div>
<!-- Modal -->
<div class="modal fade" id="miModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 id="exampleModalLabel">FREE QUOTE</h4>
      </div>
      <div class="modal-body ">
        <form action="{{route('EmailTrade')}}" method="post">
          {{csrf_field()}}
          <div class="row">
            <input class="datospopup" placeholder="Full Name*" type="text" name="nombre" required>
            <input class="datospopup" placeholder="Phone*" type="tel" name="telefono" required>
            <input class="datospopup" placeholder="E-mail*" type="email" name="email" required>
            <input class="datospopup" placeholder="Company Name" type="text" name="compania" >
          </div>
          <textarea placeholder="Message*" id="text" class="form-control" rows="1" name="comentario" required></textarea>
          <div class="g-recaptcha" data-sitekey="6LfVdEAUAAAAAGU-ey1nXYoKztntr9v0lxI0Sli8"></div>
          <button type="submit" class="botonmodal " value="Submit">
            SUBMIT
          </button>
        </form>
      </div>
    </div>
  </div>
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
