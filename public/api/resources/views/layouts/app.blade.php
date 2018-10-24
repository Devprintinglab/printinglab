<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="_token" content='{{csrf_token()}}'>
  <title>@yield('title','Printing Lab')</title>
  <meta name="description" content="At Printing Lab we work to offer you corporate image and advertising through signage, awnings, vehicle graphics, banners, large format and other marketing products.">
  <link type="text/css" rel="stylesheet" media="screen" href="//fonts.googleapis.com/css?family=PT+Sans:400,700,400italic,700italic&amp;subset=latin,cyrillic-ext,latin-ext,cyrillic">
  <link rel="shortcut icon" href="images/favicon-printing-lab.png" type="image/x-icon"/>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link  href="https://fonts.googleapis.com/css?family=Abril+Fatface|Architects+Daughter|Arimo|Bangers|Berkshire+Swash|Bree+Serif|Cinzel|Cormorant+Unicase|Fredoka+One|Gloria+Hallelujah|Gugi|Inconsolata|Lato|Libre+Baskerville|Lobster|Luckiest+Guy|Monoton|Montserrat|Nunito|Open+Sans|Orbitron|Oswald|Oxygen|Pacifico|Pangolin|Permanent+Marker|Philosopher|Playfair+Display|Raleway|Roboto|Roboto+Slab|Shadows+Into+Light|Shrikhand|Titan+One|VT323|Yanone+Kaffeesatz" rel="stylesheet">
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css"></link>
  <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.10/angular.min.js"></script>
  <script src="//code.angularjs.org/snapshot/angular-animate.js"></script>
  <script type="text/javascript" src="{!! asset('js/jquery-3.3.1.min.js') !!}"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
  <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
  <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
  <script type="text/javascript" src="{!! asset('js/fabric.min.js') !!}"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
  <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js"></script>
  <link rel="stylesheet" href="css/page.css">
  <link rel="stylesheet" href="css/jquery.fancybox.min.css">
  @yield('insert_css')
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-114027193-1"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());
    gtag('config', 'UA-114027193-1');
  </script>
  <script type="application/ld+json">
    {
      "@context": "http://schema.org",
      "@type": "Organization",
      "url": "http://printinglab.com",
      "logo": "http://printinglab.com/favicon.png",
      "name": "Printing Lab, LLC.",
      "contactPoint": {
      "@type": "ContactPoint",
      "telephone": "+1-201-305-0404",
      "contactType": "Customer service, sales",
      "areaServed": "US",
      "availableLanguage": "English",
    }
  }
</script>
<script id="mcjs">!function(c,h,i,m,p){m=c.createElement(h),p=c.getElementsByTagName(h)[0],m.async=1,m.src=i,p.parentNode.insertBefore(m,p)}(document,"script","https://chimpstatic.com/mcjs-connected/js/users/251b2e0553860ed938039c6f1/a47710029600f4f8a8e33cf0f.js");</script>
</head>
<div class="col-md-12" style="z-index: 1021;">
  <div class="row justify-content-end">
    <div class="col-md-5">
      @if (Route::has('login'))
      @auth
      <ul class="ul-count justify-content-end">
        <li class="li-top dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#"><img src="images/user.svg" alt="">Hi, {{Auth::user()->name}}!</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="{{ url('/home') }}">Home</a></li>
            <!-- prueba roles y permisos -->
            @can('sales.index')
            <li><a class="dropdown-item" href="{{route('sales.index')}}">Sales</a></li>
            @endcan()
            <li><a id="logout" class="dropdown-item" href="{{ url('/exit-count') }}">Exit</a></li>
          </ul>
        </li>
        <li class="li-top">
          <a href="{{url('cart')}}"><img src="images/cart.svg" alt="">
          </a>
          <p class="countcart">@if (Session::has('carrito'))
            @php
            {{$carrito =Session::get('carrito');
            $count_cart = count($carrito);
          }}
          @endphp
          {{ $count_cart}}
          @else
          0
          @endif
        </p>
      </li>
    </ul>
    @else
    <ul class="ul-count justify-content-end">
      <li class="li-top dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#"><img src="images/user.svg" alt="">Hi, Log In!</a>
        <ul class="dropdown-menu">
          <li  >
            <a class="dropdown-item" href="{{ route('login') }}"> Log in</a>
          </li>
          <li >
            <a class="dropdown-item" href="{{ route('register') }}">Register</a>
          </li>
        </ul>
      </li>
      <li class="li-top">
        <a href="{{url('/cart')}}"><img src="images/cart.svg" alt="">
        </a>
        <p class="countcart">@if (Session::has('carrito'))
          @php
          {{$carrito =Session::get('carrito');
          $count_cart = count($carrito);
        }}
        @endphp
        {{ $count_cart}}
        @else
          0
      @endif</p>
    </li>
  </ul>
  @endauth
  @endif
</div>
</div>
</div>
<nav class="navbar navbar-expand-lg navbar-light sticky-top">
  <a class="navbar-brand" href="{{url('/')}}">
    <img src="{{asset('images/logo-printing-lab-new-york.svg')}}" alt="">
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item {{Request::is('signage')?'active':'' }}">
        <a class="nav-link" href="{{url('/signage')}}">SIGNAGE </a>
      </li>
      <li class="nav-item {{Request::is('vehicle-graphics')?'active':'' }}">
        <a class="nav-link" href="{{url('/vehicle-graphics')}}">VEHICLE GRAPHICS</a>
      </li>
      <li class="nav-item {{Request::is('large-format')?'active':'' }}">
        <a class="nav-link" href="{{url('/large-format')}}">LARGE FORMAT</a>
      </li>
      <li class="nav-item {{Request::is('trade-shows')?'active':'' }}">
        <a class="nav-link" href="{{url('/trade-shows')}}">TRADE SHOWS</a>
      </li>
      <li class="nav-item {{Request::is('custom-apparel')?'active':'' }}">
        <a class="nav-link" href="{{url('/custom-apparel')}}">CUSTOM APPAREL</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">MARKETING PRODUCTS</a>
        <ul class="dropdown-menu">
          <li >
            <a class="dropdown-item" href="cards"><strong>Business Cards</strong> </a>
          </li>
          <li>
            <a class="dropdown-item" href="postcards"><strong>Postcards</strong></a>
          </li>
        </ul>
      </li>
      <li class="nav-item {{Request::is('contact-us')?'active':''}}">
        <a class="nav-link" href="{{url('/contact-us')}}">CONTACT US</a>
      </li>
    </ul>
  </div>
</nav>
<body ng-app="designer-v1" >
  <div class="flex-center position-ref full-height">
    <div class="content">
      @yield('content')
    </div>
  </div>
  <footer >
    <div class="container">
      <div class="box">
        <img src="images//printing-lab-logo-new-york-nj.png">
      </div>
      <div class="row">
        <div class="col-md-2 col-sm-6 col-6  company">
          <strong><h5>COMPANY</h5></strong>
          <li><a href="{{ url('/about-us') }}">About Us</a></li>
          <li><a href="contact-us">Contact Us</a> </li>
          <li class="social-menu-footer">
            <a href="https://www.facebook.com/PrintingLab" target="_blank"><i class="fab fa-facebook fa-lg"></i></a>
            <a href="https://www.instagram.com/printinglab/" target="_blank"><i class="fab fa-instagram fa-lg"></i></a>
            <a href="https://twitter.com/printinglab" target="_blank"><i class="fab fa-twitter fa-lg"></i></a>
          </li>
        </div>
        <div class="col-md-2 col-sm-6 col-6  policy">
          <H5>POLICY</H5>
          <li><a href="{{ url('/returns-and-refund')}}">Returns & Refunds</a></li>
          <li><a href="{{ url('privacy-policy')}}">Privacy Policy</a> </li>
          <li><a href="{{url('terms-and-conditions') }}">Terms & Conditions</a></li>
          <li></li>
        </div>
        <div class="col-md-4 col-sm-6 col-6 ">
          <H5>LOCATIONS</H5>
          <img class="img_location" src="images//mapa-footer.png" alt="">
        </div>
        <div class="col-md-4 col-sm-6 col-6 div_footer">
          <li>We received all cards.</li>
          <li> <img src="./images//payments-footer.png"> <!-- (c) 2005, 2018. Authorize.Net is a registered trademark of CyberSource Corporation --> <div class="AuthorizeNetSeal"> <script type="text/javascript" language="javascript">var ANS_customer_id="3bb32460-9aba-4e5e-8cb5-68a1d43d06aa";</script> <script type="text/javascript" language="javascript" src="//verify.authorize.net:443/anetseal/seal.js" ></script> </div></li>
          <li>Subscribe to receive offers and more.</li>
          <link href="//cdn-images.mailchimp.com/embedcode/horizontal-slim-10_7.css" rel="stylesheet" type="text/css">
          <style type="text/css">
          #mc_embed_signup{
            background:#2e2e2e;
            clear:left;
            font:12px Helvetica,Arial,sans-serif;
          }
          #mc_embed_signup form {
            text-align: initial !important;
          }
          #mc_embed_signup input.email {
            width: 69%;
            margin-bottom: 5px;
          }
          @media (max-width: 768px){
            #mc_embed_signup input.email {
              width: 100%;
              margin-bottom: 5px;
            }
          }
        </style>
        <div id="mc_embed_signup">
          <form action="https://printinglab.us15.list-manage.com/subscribe/post?u=251b2e0553860ed938039c6f1&amp;id=0e1097874c" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
            <div id="mc_embed_signup_scroll">
              <input type="email" value="" name="EMAIL" class="email" id="mce-EMAIL" placeholder="Email Address" required>
              <div style="position: absolute; left: -5000px;" aria-hidden="true">
                <input type="text" name="b_251b2e0553860ed938039c6f1_0e1097874c" tabindex="-1" value="">
              </div>
              <div class="clear"><input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button">
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
    <div class="col-md-12   col-sm-12 col-xs-12 ccpl">
      <label>© 2018 Printing Lab. All rights reserved.</label>
    </div>
  </div>
  <a class="go-top" href="#">
    <i class="fas fa-chevron-circle-up fa-2x"></i>
  </a>
</footer>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
@yield('insert_script')
<script src="js/jquery.fancybox.min.js"></script>
<script src="js/propio.js"></script>
<script>
  $(document).ready(function() {
    $('.carousel').carousel({
      pause:true,
      interval: 4000
    });
    $('.dropdown-toggle').dropdown()
    $(window).scroll(function() {
      if ($(this).scrollTop() > 200) {
        $('.go-top').fadeIn(200);
      } else {
        $('.go-top').fadeOut(200);
      }
    });
    $('.go-top').click(function(event) {
      event.preventDefault();
      $('html, body').animate({scrollTop: 0}, 300);
    });
  });
  $("#logout").on("click", function () {
    amazon.Login.logout();
    document.cookie = "amazon_Login_accessToken=; expires=Thu, 01 Jan 1970 00:00:00 GMT";
  });
</script>
@yield('scripts')
</body>

<!-- <script type="text/javascript" src="{!! asset('js/Widgets.js') !!}"></script> -->
<!-- <script type='text/javascript' src='https://static-na.payments-amazon.com/OffAmazonPayments/us/js/Widgets.js'></script>
 -->
 <script type='text/javascript' src='https://static-na.payments-amazon.com/OffAmazonPayments/us/sandbox/js/Widgets.js'></script>
</html>
