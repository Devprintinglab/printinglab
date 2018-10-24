@extends('layouts.app')
@section('title')
Business Cards - Printing Lab
@endsection
@section('content')

<div class="container textoscontainer">
  <div class="row">
    <div class="col-md-7">
      @foreach ($producto as $dato )
      <div class="row imgpadding">
        <div class="col-md-12" >
          <a data-fancybox="gallery" href="images/marketing/cards/{{ $dato->img1}}">
            <img class="img_detalle" src="images/marketing/cards/{{ $dato->img1}}">
          </a>
        </div>
      </div>
      <div class="row imgpadding">
        <div class="col-md-4 col-xs-4">
          <a data-fancybox="gallery" href="images/marketing/cards/{{ $dato->img2}}">
            <img class="img_detalle2" src="images/marketing/cards/{{ $dato->img2}}">
          </a>
        </div>
        <!-- <div class="col-md-4 col-xs-4">
        <a data-fancybox="gallery" href="images/marketing/cards/{{ $dato->img3}}">
        <img class="img_detalle2" src="images/marketing/cards/{{ $dato->img3}}">
      </a>
    </div> -->
  </div>
  @endforeach
</div>
<div class="col-md-4 select-businnes-cards">
  @foreach ($producto as $dato )
  <div class="product_name">
    <h3> <strong>{{ $dato->nombre}}</strong>  </h3>
  </div>
  @endforeach
  <div class="row">
    <div class="col-md-6 col-4">
      <p>Size:</p>
    </div>
    <div class="col-md-6 col-8 filter_select">
      <select class="selectdetalles selector2" name="size"  id="size" onchange="size_change()">
        <option value="{{$attr1}}">{{$attr1}}</option>
      </select>
    </div>
  </div>
  <div class="row">
    <div class="col-md-6 col-4">
      <p>Paper Type: </p>
    </div>
    <div class="col-md-6 col-8 filter_select">
      <select class="selectdetalles selector2" name="papertype"  id="papertype" onchange="papertype_change()" >
        <option value="{{$attr2}}">{{$attr2}}</option>
      </select>
    </div>
  </div>
  <div class="row" id="row_edge">
    <div class="col-md-6 col-4">
      <p>Edge Color:</p>
    </div>
    <div class="col-md-6 col-8 filter_select">
      <select class="selectdetalles selector2" name="edge_color"  id="edge_color" onchange="edgecolor_change()" >
        <option value="{{$attr6}}">{{$attr6}}</option>
      </select>
    </div>
  </div>
  <div class="row">
    <div class="col-md-6 col-4">
      <p>Printed Side:</p>
    </div>
    <div class="col-md-6 col-8 filter_select">
      <select class="selectdetalles selector2" name="printedside"  id="printedside" onchange="printedside_change()" >
        <option value="{{$attr3}}">{{$attr3}}</option>
      </select>
    </div>
  </div>
  <div class="row">
    <div class="col-md-6 col-4">
      <p>Coating:</p>
    </div>
    <div class="col-md-6 col-8 filter_select">
      <select class="selectdetalles selector2" name="coating"  id="coating" onchange="coating_change()" >
        <option value="{{$attr4}}">{{$attr4}}</option>
      </select>
    </div>
  </div>
  <div class="row">
    <div class="col-md-6 col-4">
      <p>Corners:</p>
    </div>
    <div class="col-md-6 col-8 filter_select">
      <select class="selectdetalles selector2" name="corners"  id="corners" onchange="corners_change()" >
        <option value="{{$attr5}}">{{$attr5}}</option>
      </select>
    </div>
  </div>
  <div class="row">
    <div class="col-md-6 col-4">
      <p>Quantity:</p>
    </div>
    <div class="col-md-6 col-8 filter_select">
      <select class="selectdetalles selector2" name="quantity"  id="quantity" onchange="quantity_change()" >
        <option value="{{$attr10}}">{{$attr10}}</option>
      </select>
    </div>
  </div>
  <div class="row">
    <div class="col-md-6 col-4">
      <p>Printing Time:</p>
    </div>
    <div class="col-md-6 col-8 filter_select">
      <select class="selectdetalles selector2" name="printingtime"  id="printingtime" onchange="printingtime_change()" >
        <option value="{{$attr11}}">{{$attr11}}</option>
      </select>
    </div>
  </div>
  <div class="div_printing">
    <div class="row">
      <div class="col-md-6 col-4">
        <p>Printing Cost:</p>
      </div>
      <div class="col-md-6 col-8">
        <h3 class="result_price">
          <strong>$</strong>
          <strong id="labeltxt">
            {{$attr12}}
          </strong>
        </h3>
      </div>
    </div>
  </div>
  <!-- subida de archivo y ordenar  -->
  <div class="botonesform" >
    <form name="fromoculto1" id="form_Upload" action="{{route('upload-file')}}" method="post" enctype="multipart/form-data">
      {{csrf_field()}}
      @foreach ($producto as $dato )
      <input type="hidden" name="idP" id="id_product" value="{{$dato->id_productos}}">
      @endforeach
      <input type="hidden" name="idC"  id="idC" value="1">
      <input type="hidden" name="caras" id="Rselectcaras" value="{{$attr3}}">
      <input  type="hidden"name="idE"  id="idE" value="{{$especificacion}}">
      <input type="submit" value="UPLOAD YOUR FILE & ORDER NOW" class="btn validate_form_upload">
    </form>
    <!-- diseñador -->
    <form name="fromoculto1" id="form_Design" class="movil_BC" action="{{route('tool')}}" method="post" enctype="multipart/form-data">
      {{csrf_field()}}
      @foreach ($producto as $dato )
      <input type="hidden" name="id_P" id="id_P" value="{{$dato->id_productos}}">
      <input type="hidden" name="P_name" id="P_name" value="{{ $dato->nombre}}">
      @endforeach
      <input type="hidden" name="_idC"  id="_idC" value="1">
      <input type="hidden" name="_size"  id="_size" value="{{$attr1}}">
      <input type="hidden" name="_sides" id="_sides" value="{{$attr3}}">
      <input type="hidden" name="_idspc"  id="_idspc" value="{{$especificacion}}">
      <input type="hidden" name="_Corners"  id="_Corners" value={{$attr5}}>
      <input type="submit" value="CREATE YOUR DESIGN ONLINE" class="btn validate_form_design">
    </form>
    <!-- nosotros lo diseñamos -->
    <form name="fromoculto1" id="form_Wedesign"  action="{{route('we-designed')}}" method="post" enctype="multipart/form-data">
      {{csrf_field()}}
      @foreach ($producto as $dato )
      <input type="hidden" name="idP" id="id_product" value="{{$dato->id_productos}}">
      @endforeach
      <input type="hidden" name="idC"  id="idC" value="1">
      <input type="hidden" name="caras2" id="Rselectcaras2" value="{{$attr3}}">
      <input  type="hidden"name="idE2"  id="idE2" value="{{$especificacion}}">
      <input  value="WE DESIGN IT FOR YOU" class="btn validate_form_wedesign">
    </form>
  </div>
</div>
</div>
<div class="container tabs-products">
  <input type="hidden" name="" value="{{$attr1}}">
  <input type="hidden" name="" value="{{$attr2}}">
  <input type="hidden" name="" value="{{$attr3}}">
  <input type="hidden" name="" value="{{$attr4}}">
  <input type="hidden" name="" value="{{$attr5}}">
  <input type="hidden" name="" value="{{$attr6}}">
  <input type="hidden" name="" value="{{$attr10}}">
  <input type="hidden" name="" value="{{$attr11}}">
  <input type="hidden" name="" value="{{$attr12}}">
  <ul class="nav nav-pills" role="tablist">
    <li class="nav-item">
      <a class="nav-link link-products active" data-toggle="pill" href="#home">DETAILS</a>
    </li>
    <li class="nav-item">
      <a class="nav-link link-products " data-toggle="pill" href="#menu1">COATINGS</a>
    </li>

    <li class="nav-item">
      <a class="nav-link link-products " data-toggle="pill" href="#menu2">PAPER</a>
    </li>
    <li class="nav-item">
      <a class="nav-link link-products " data-toggle="pill" href="#menu3">SPECS</a>
    </li>
    <li class="nav-item">
      <a class="nav-link link-products " data-toggle="pill" href="#menu4">TEMPLATES</a>
    </li>
  </ul>
  <div class="tab-content tab-content-MP">
    <div id="home" class="container tab-pane active"><br>
      <p>
        Set the Right Tone for Your Client Relationships.
      </p>
      <p>
        Business cards may be small but they have a big impact on how your brand is perceived. Business cards at their core represent your business. If your brand is important, then business card printing should be taken seriously. Our high quality custom business cards are thick, durable, and are professionally printed.
      </p>
      <p>
        Business cards may be small but they have a big impact on how your brand is perceived. Business cards at their core represent your business. If your brand is important, then business card printing should be taken seriously. Our high quality custom business cards are thick, durable, and are professionally printed.
      </p>
    </div>
    <div id="menu1" class="container tab-pane fade"><br>
      <p>
        <strong>MATTE/DULL FINISH</strong><br>
        Thick cardstock with a non-reflective matte finish for a classic and elegant look
        Aqueous (water-based) coating adds scratch and scuff resistance
        Paper from sustainable sources
        Non-glossy surface provides better writability but testing is recommended.
        Ballpoint pens (oil-based ink) and permanent markers work best.
        Great choice for business cards, postcards, hang tags and pocket folders
        Note: we do not guarantee writability or printability of coated paper

      </p>
      <p>
        <strong>GLOSS COVER</strong><br>
        Thick cardstock with a gloss finish for sheen and vibrant colors
        Aqueous (water-based) coating adds scratch and scuff resistance
        Paper from sustainable sources
        May be written on but testing is recommended. Ballpoint pens (oil-based ink) and permanent markers work best.
        Most popular choice for business cards, postcards, hang tags and pocket folders

      </p>
      <p>
        <strong>AKUAFOIL</strong><br>
        With Akuafoil, you can turn a wide range of CMYK colors into multi-colored foils. Akuafoil uses a special processed foil system that is applied under a 4/c process to create an array of foil colors. It's simple, affordable, and makes your prints stand out from the crowd.
        For an Akuafoil job, you must include an Akuafoil mask file along with your CMYK file. The mask file indicates where the Akuafoil will be applied. The file setup is the same as Spot UV. Use 100% K where Akuafoil needs to be applied and white where the Akuafoil is not applied.
        As shown above, the file on the left is the normal CMYK print file. If you want the logo to be Akuafoil, then your Akuafoil mask file should look like the file on the right. The white indicates no Akuafoil and black 100% K indicates where the Akuafoil will be applied. When uploading, please remember to upload separate files.
        Here are some more things to keep in mind when creating your Akuafoil artwork:
        Make sure the mask and CMYK print file are aligned. They should match exactly in size and position.
        1.	Akuafoil works best on lighter colors. The darker the CMYK color, the less vibrant the Akuafoil effect.
        2.	Do not use very thin or small text and artwork with Akuafoil. Use San Serif fonts above 12 point for best results.
        a.	If you have Akuafoil applied to a white area, it will have a plain silver Akuafoil look.
        b.	For better quality we recommend creating mask files in vector based programs such as Illustrator or CorelDRAW.
        If you would like plain silver Akuafoil to print, make sure to have at least 15% K in the CMYK print file area in order to obtain the highest quality silver Akuafoil effect.
      </p>
    </div>
    <div id="menu2" class="container tab-pane fade"><br>
      <p>
        14pt Metallic Pearl <br>
        Our 14pt Metallic Pearl paper is a unique stock that shimmers in light when viewed from different angles. The stock itself is embedded with Pearl fibers that give the paper an overall smooth, metallic look. Printing on this stock will give your CMYK colors a subtle shimmer, however heavy ink densities or coverage may diminish the effect.
      </p>
      <p>
        32pt EDGE <br>
        EDGE Cards are made of three premium quality stocks adhered together creating an ultra thick, 32pt triple layered card with a colored core.
        Face Stock: 9pt Bright White Premium uncoated with a Smooth finish
        Insert Stock: 14pt Premium Opaque Black
      </p>
    </div>
    <div id="menu3" class="container tab-pane fade"><br>
      <p>
        RESOLUTION <br>
        Low resolution files may be printed as is or will be placed on hold until we receive new files, slowing your turn-around.
      </p>
      <p>
        <strong>THESE ARE 72 DPI LOW RES IMAGES</strong> <br>
        <img src="images/resolution-72.jpg">
      </p>
      <p>
        <strong>THESE ARE THE SAME IMAGES BUT AT 300 DPI</strong><br>
        <img src="images/resolution-300.jpg">
      </p>
      <p>
        PREPAIR A TRANSPARENT FILE <br>
        Al diseñar las tarjetas de plástico, es importante recordar que el plástico esmerilado(frosted) y el plástico transparente (clear),es transparente. Las tarjetas de plástico son producidas con esquinas redondeadas sin ningún costo adicional.
      </p>
      <p>
        Como puede ver en el ejemplo, la diferencia en la transparencia de cada tarjeta es representada en esta imagen. La tarjeta transparente(clear)a la derecha, son completamente tranparentes.Las tarjetas esmeriladas(frosted ) en el centro, son semi-transparentes, sus diseños no pueden ser vistos en el reverso de este material. Las tarjetas blancas (opaque white) en la izquierda son de plástico blanco sólido y no son transparentes. Por favor tome esto en cuenta al diseñar sus tarjetas. El tipo de material tendrá un efecto en el resultado final.
      </p>
      <p>
        Al no haber tinta blanca en el proceso de CMYK, es importante recordar que la opción de transparente y de esmerilado, tendrá un efecto transparente en su pieza. Los tres diseños en el ejemplo son igual al primer ejemplo. El área blanca(en blanco) en la imagen no incluye tinta y demostrara el material transparente o blanco dependiendo en su selección de material, en este caso, estas áreas en blanco serán producidas sin impresión en estas áreas, todo color en las tarjetas trasparentes o esmeriladas será transparente.
      </p>
      <p>
        Las tarjetas transparentes probablemente incluirán un pequeño porcentaje de tarjetas rayadas, por ser el plástico trasparente. Esto es relacionado con la fabricación de este tipo de material y al transportar el material, para asistir con este resultado corremos una cantidad adicional en su orden para completar la cantidad deseada de su orden.
      </p>
      <p>
        Tarjetas de plástico transparentes son enviadas con una capa protectiva fácil de despegar. Esta protección es para prevenir rayones y daños al empaquetar y proteger el producto en el proceso de envío.
      </p>
      <p>
        PROOF OR SAMPLE FILE <br>
        Al enviar los archivos, no envíe pruebas o muestras. Puede ser que se imprima el archivo incorrecto. Envíe solamente los archivos que usted necesita que se impriman.
      </p>
      <p>
        No somos responsables si este tipo de archivos sean impresos. Solo en la ocasión que uno de nuestros empleados lo pida, no envíe archivos que no sean necesarios.
      </p>
      <p>
        BLEED <br>
        Bleed must extend past the cut-line and will be trimmed from the product during the final cutting phase. When the image is required to extend all the way to the edge, bleed is needed to preserve the finished look and the quality of the final product.
      </p>
      <p>
        Please keep all text at least 0.125" inside the cut-line. <br>
        - The bleed for Standard Products is 0.125". <br>
        - The bleed for Booklets and Presentation Folders is 0.25". <br>
        - For Grand4mat Products, please see the G4Mat FAQs for individual substrate guides. <br>
        We recommend using our templates at all times.
      </p>
      <p>
        TRANSPARENCY ISSUES <br>
        Any transparency issue can be resolved before saving your file.
        What a transparency problem looks like on screen...	After a transparency problem is printed...
      </p>
      <p>
        To prevent this, never use shadows, glows, or any other transparency (image or otherwise) on top of a spot color. Always convert your spot color to CMYK and flatten before sending.
      </p>
      <p>
        SHADOWS, GLOWS, TRANSPARENCY,
        All of these effects will cause transparency problems.
      </p>
      <p>
        FRONT AND BACK <br>
        No. We are now specifically set up to process one side at a time, and this requires that each side of a job must be on a separate file.
        2 FILES – 1FR, 1BK
        1 FILE – FR&BK
      </p>
      <p>
        Not separating files will cause delays and you might have to send the files again. Remember to separate the pages of your .pdf files as well.
      </p>
      <p>
        SPOT UV FILES <br>
        When creating a Spot UV job, you must include a Spot UV template file along with the regular print file. The Spot UV template file is used to show where the UV coating needs to be applied.
      </p>
      <p>
        For better quality we recommend creating mask files in vector based programs such as Illustrator or CorelDRAW.
        Please only use solid 100% K to indicate where you would like the UV. Do not use shadows, glows or grayscale images. White will indicate no UV.
        Remember, if it's white, you can write!
      </p>
    </div>
    <div id="menu4" class="container tab-pane fade"><br>
      <table class="table">
        <thead>
          <tr>
            <td>EPS</td>
            <td>JPG</td>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>
              <a href="{{route('download-template-business',['archivo'=>'1.75x3.5_slim_business_cards.eps']) }}"><i class="fas fa-download"></i> 1.75x3.5 slim business cards</a>
            </td>
            <td>
              <a href="{{route('download-template-business',['archivo'=>'1.75x3.5_slim_business_cards.jpg']) }}"><i class="fas fa-download"></i> 1.75x3.5 slim business cards</a>
            </td>
          </tr>
          <tr>
            <td>
              <a href="{{route('download-template-business',['archivo'=>'2.5x2.5_circle_business_cards.eps']) }}"><i class="fas fa-download"></i> 2.5x2.5 circle_business cards</a>
            </td>
            <td>
              <a href="{{route('download-template-business',['archivo'=>'2.5x2.5_circle_business_cards.jpg']) }}"><i class="fas fa-download"></i> 2.5x2.5 circle business cards</a>
            </td>
          </tr>
          <tr>
            <td>
              <a href="{{route('download-template-business',['archivo'=>'2.5x2.5_square_business_card_rounded_corners.eps']) }}"><i class="fas fa-download"></i> 2.5x2.5 square business card rounded corners</a>
            </td>
            <td>
              <a href="{{route('download-template-business',['archivo'=>'2.5x2.5_square_business_card_rounded_corners.jpg']) }}"><i class="fas fa-download"></i> 2.5x2.5 square business card rounded corners</a>
            </td>
          </tr>
          <tr>
            <td>
              <a href="{{route('download-template-business',['archivo'=>'2.5x2.5_square_business_cards.eps']) }}"><i class="fas fa-download"></i> 2.5x2.5 square business cards</a>
            </td>
            <td>
              <a href="{{route('download-template-business',['archivo'=>'2.5x2.5_square_business_cards.jpg']) }}"><i class="fas fa-download"></i> 2.5x2.5 square business cards</a>
            </td>
          </tr>
          <tr>
            <td>
              <a href="{{route('download-template-business',['archivo'=>'2x2_square_business_cards.eps']) }}"><i class="fas fa-download"></i> 2x2 square business cards</a>
            </td>
            <td>
              <a href="{{route('download-template-business',['archivo'=>'2x2_square_business_cards.jpg']) }}"><i class="fas fa-download"></i> 2x2 square business cards</a>
            </td>
          </tr>
          <tr>
            <td>
              <a href="{{route('download-template-business',['archivo'=>'2x3.5_oval_business_cards.eps']) }}"><i class="fas fa-download"></i> 2x3.5 oval business cards</a>
            </td>
            <td>
              <a href="{{route('download-template-business',['archivo'=>'2x3.5_oval_business_cards.jpg']) }}"><i class="fas fa-download"></i> 2x3.5 oval business cards</a>
            </td>
          </tr>
          <tr>
            <td>
              <a href="{{route('download-template-business',['archivo'=>'2x3.5_standard_business_cards.eps']) }}"><i class="fas fa-download"></i> 2x3.5 standard business cards</a>
            </td>
            <td>
              <a href="{{route('download-template-business',['archivo'=>'2x3.5_standard_business_cards.jpg']) }}"><i class="fas fa-download"></i> 2x3.5 standard business cards</a>
            </td>
          </tr>
          <tr>
            <td>
              <a href="{{route('download-template-business',['archivo'=>'2x3.5_standard_business_cards_rounded_corners.eps']) }}"><i class="fas fa-download"></i> 2x3.5 standard business cards rounded corners</a>
            </td>
            <td>
              <a href="{{route('download-template-business',['archivo'=>'2x3.5_standard_business_cards_rounded_corners.eps']) }}"><i class="fas fa-download"></i> 2x3.5 standard business cards rounded corners</a>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>
</div>
<div class="container-fluid background-fluid">
  <div class="container-fluid2">
    <h3 class="center"><strong>REASONS TO TRUST IN OUR COMPANY</strong></h3>
    <div class="col-md-12">
      <div class="row">
        <div class="col-md-2 center">
          <img class="img_prefooter" src="images/high-quality.png">
          <h6><strong>High Quality</strong></h6>
          <p>
            We offer superior quality printing by our 100% quality guarantee services. Don't compromise on quality and see the difference!
          </p>
        </div>
        <div class="col-md-2 center">
          <img class="img_prefooter" src="images/best-prices.png">
          <h6><strong> Best prices</strong></h6>
          <p>
            Printing Lab is proud to offer our high class quality printing at affordable prices. We continue to strive to provide our customers with the best instant pricing available through our easy to use website.
          </p>
        </div>
        <div class="col-md-2 center">
          <img class="img_prefooter" src="images/customer-service.png">
          <h6><strong>Customer Service </strong></h6>
          <p>
            If you have a question or need guidance placing an order? We're here to help! Don’t hesitate and give us a call!
          </p>
        </div>
        <div class="col-md-2 center">
          <img class="img_prefooter" src="images/fast-turnaround.png">
          <h6><strong>Fast Turnaround</strong></h6>
          <p>
            Printing Lab offers is one of the fastest printing turnaround times found worldwide. Local pickup is also available in NY/NJ area.
          </p>
        </div>
        <div class="col-md-2 center">
          <img class="img_prefooter" src="images/file-inspection.png">
          <h6><strong>File Inspection</strong></h6>
          <p>
            We're so confident in the quality of our printing that we provide 100% free proofing. No order commitment or credit card is required!
          </p>
          <p>
            What do we do? We print fast. We print fast pace of your business, and are here to meet your printing needs.
          </p>
        </div>
        <div class="col-md-2 center">
          <img class="img_prefooter" src="images/eco.png">
          <h6><strong>Eco Friendliness</strong></h6>
          <p>
            Protecting the environment, our
            customers and ouremployees
            is one of our highest concerns.
          </p>
          <p>
            To do this we use vegetable
            based inks with low VOC emissions
            and offer paper options that contain
            up to 55%postconsumer recycled content.
          </p>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
@section('scripts')
<script >

var id_product=$("#id_product").val();

function carga_allSelect(size, papertype, printedside, coating, corners, quantity_inicial, printingtime_inicial){
  size();
  papertype();
  printedside();
  coating();
  corners();
  quantity_inicial();
  printingtime_inicial();
}

function size(){
  $.get("attr1_BC/"+id_product,function(result){
    var input =$("#size").val()
    if (result.length!==1){
      for(i=0; i<result.length; i++){
        if (result[i].attr1!==input){
          $("#size").append("<option value='"+result[i].attr1+"'>"+result[i].attr1+"</option>");
        }
      }
    }
  })
}

function papertype(){
  var at1 =$("#size").val()
  $.get("attr2_BC/"+id_product+"/"+at1,function(result){
    var input=$("#papertype").val()
    for(i=0; i<result.length; i++){
      if (result[i].attr2!==input){
        $("#papertype").append("<option value='"+result[i].attr2+"'>"+result[i].attr2+"</option>");
      }
    }
  })
}

function printedside(){
  var at1 =$("#size").val()
  var at2 =$("#papertype").val()
  $.ajaxSetup({
    headers:{
      'X-CSRF-Token': $('meta[name=_token]').attr('content')
    }
  })
  $.ajax({
    url:'attr3_BC',
    data:{idp:id_product,atr1:at1,atr2:at2},
    type:'POST',
    success: function(result){
      var input=$("#printedside").val()
      for(i=0; i<result.length; i++){
        if (result[i].attr3!==input){
          $("#printedside").append("<option value='"+result[i].attr3+"'>"+result[i].attr3+"</option>");
        }
      }
    }
  })
}

function coating(){
  var at1 =$("#size").val()
  var at2 =$("#papertype").val()
  var at3 =$("#printedside").val()
  $.ajaxSetup({
    headers:{
      'X-CSRF-Token': $('meta[name=_token]').attr('content')
    }
  })
  $.ajax({
    url:'attr4_BC',
    data:{idp:id_product,atr1:at1,atr2:at2,atr3:at3},
    type:'POST',
    success: function(result){
      var input=$("#coating").val()
      for(i=0; i<result.length; i++){
        if (result[i].attr4!==input){
          $("#coating").append("<option value='"+result[i].attr4+"'>"+result[i].attr4+"</option>");
        }
      }

    }
  })
}

function corners(){
  var at1 =$("#size").val()
  var at2 =$("#papertype").val()
  var at3 =$("#printedside").val()
  var at4 =$("#coating").val()
  $.ajaxSetup({
    headers:{
      'X-CSRF-Token': $('meta[name=_token]').attr('content')
    }
  })
  $.ajax({
    url:'attr5_BC',
    data:{idp:id_product,atr1:at1,atr2:at2,atr3:at3,atr4:at4},
    type:'POST',
    success: function(result){
      var input=$("#corners").val()
      for(i=0; i<result.length; i++){
        if (result[i].attr5!==input){
          $("#corners").append("<option value='"+result[i].attr5+"'>"+result[i].attr5+"</option>");
        }
      }
    }
  })
}

function quantity_inicial(){
  var at1 =$("#size").val()
  var at2 =$("#papertype").val()
  var at3 =$("#printedside").val()
  var at4=$("#coating").val()
  var at5=$("#corners").val()
  $.ajaxSetup({
    headers:{
      'X-CSRF-Token': $('meta[name=_token]').attr('content')
    }
  })
  $.ajax({
    url:'attr10_BC',
    data:{idp:id_product,atr1:at1,atr2:at2,atr3:at3,atr4:at4,atr5:at5},
    type:'POST',
    success: function(result){
      var input = parseInt($("#quantity").val())
      for(i=0; i<result.length; i++){
        if (result[i].attr10!==input){
          $("#quantity").append("<option value='"+result[i].attr10+"'>"+result[i].attr10+"</option>");
        }
      }
    }
  })
}

function printingtime_inicial(){
  var at1 =$("#size").val()
  var at2 =$("#papertype").val()
  var at3 =$("#printedside").val()
  var at4=$("#coating").val()
  var at5=$("#corners").val()
  var at10=$("#quantity").val()
  $.ajaxSetup({
    headers:{
      'X-CSRF-Token': $('meta[name=_token]').attr('content')
    }
  })
  $.ajax({
    url:'attr11_BC',
    data:{idp:id_product,atr1:at1,atr2:at2,atr3:at3,atr4:at4,atr5:at5,atr10:at10},
    type:'POST',
    success: function(result){
      var input=$("#printingtime").val()
      for(i=0; i<result.length; i++){
        if (result[i].attr11!==input){
          $("#printingtime").append("<option value='"+result[i].attr11+"'>"+result[i].attr11+"</option>")
        }
      }
    }
  })
}

carga_allSelect(size, papertype, printedside, coating, corners, quantity_inicial, printingtime_inicial);

function size_change(){
  var at1=$("#size").val()
  $("#_size").val(at1)
  $.get("search_attr1_BC/"+id_product+"/"+at1,function(result){
    $("#papertype").empty();
    $("#printedside").empty();
    $("#coating").empty();
    $("#corners").empty();
    $("#quantity").empty();
    $("#printingtime").empty();
    $('#labeltxt').empty();
    $("#papertype").append("<option value='"+result[0].attr2+"'>"+result[0].attr2+"</option>");
    $("#printedside").append("<option value='"+result[0].attr3+"'>"+result[0].attr3+"</option>");
    $("#coating").append("<option value='"+result[0].attr4+"'>"+result[0].attr4+"</option>");
    $("#corners").append("<option value='"+result[0].attr5+"'>"+result[0].attr5+"</option>");
    $("#quantity").append("<option value='"+result[0].attr10+"'>"+result[0].attr10+"</option>");
    $("#printingtime").append("<option value='"+result[0].attr11+"'>"+result[0].attr11+"</option>");
    $('#labeltxt').html(result[0].attr12);
    papertype()
    printedside()
    coating()
    corners()
    quantity_inicial()
    printingtime_inicial()
    document.getElementById("idE").value =result[0].id_especificaciones;
    document.getElementById("idE2").value =result[0].id_especificaciones;
    document.getElementById("Rselectcaras").value =result[0].attr3;
    document.getElementById("Rselectcaras2").value =result[0].attr3;
    $("#_sides").val(result[0].attr3)
    $("#_Corners").val(result[0].attr5)
    $("#_idspc").val(result[0].id_especificaciones);
  })
}

function papertype_change(){
  var at1=$("#size").val()
  var at2 =$("#papertype").val()
  if(at2==='32pt Uncoated Painted EDGE'){
    $("#edge_color").empty();
    $("#row_edge").css({"display":"flex"})
    $.get("search_attr6_BC/"+id_product+"/"+at1+"/"+at2,function(result){
      for (var i = 0; i < result.length; i++) {
        $("#edge_color").append("<option value='"+result[i].attr6+"'>"+result[i].attr6+"</option>");
      }
    })
  }else{
    $("#edge_color").empty();
    $("#row_edge").css({"display":"none"})
  }
  $.get("search_attr2_BC/"+id_product+"/"+at1+"/"+at2,function(result){
    $("#printedside").empty();
    $("#coating").empty();
    $("#corners").empty();
    $("#quantity").empty();
    $("#printingtime").empty();
    $('#labeltxt').empty();
    $("#printedside").append("<option value='"+result[0].attr3+"'>"+result[0].attr3+"</option>");
    $("#coating").append("<option value='"+result[0].attr4+"'>"+result[0].attr4+"</option>");
    $("#corners").append("<option value='"+result[0].attr5+"'>"+result[0].attr5+"</option>");
    $("#quantity").append("<option value='"+result[0].attr10+"'>"+result[0].attr10+"</option>");
    $("#printingtime").append("<option value='"+result[0].attr11+"'>"+result[0].attr11+"</option>");
    $('#labeltxt').html(result[0].attr12);
    printedside()
    coating()
    corners()
    quantity_inicial()
    printingtime_inicial()
    document.getElementById("idE").value =result[0].id_especificaciones;
    document.getElementById("idE2").value =result[0].id_especificaciones;
    document.getElementById("Rselectcaras").value =result[0].attr3;
    document.getElementById("Rselectcaras2").value =result[0].attr3;
    $("#_sides").val(result[0].attr3)
    $("#_Corners").val(result[0].attr5)
    $("#_idspc").val(result[0].id_especificaciones)
  })
}

function edgecolor_change(){
  var attr1=$("#size").val()
  var attr2=$("#papertype").val()
  var attr3=$("#printedside").val()
  var attr4=$("#coating").val()
  var attr5=$("#corners").val()
  var attr6=$("#edge_color").val()
  var attr10=$("#quantity").val()
  var attr11=$("#printingtime").val()
  $.get("search_attr12_BC_color/"+id_product+"/"+attr1+"/"+attr2+"/"+attr3+"/"+attr4+"/"+attr5+"/"+attr6+"/"+attr10+"/"+attr11,function(result){
    document.getElementById("idE").value =result[0].id_especificaciones;
    document.getElementById("idE2").value =result[0].id_especificaciones;
    document.getElementById("Rselectcaras").value =attr3;
    document.getElementById("Rselectcaras2").value =attr3;
    $("#_idspc").val(result[0].id_especificaciones);
  })
}

function printedside_change(){
  var at1=$("#size").val()
  var at2=$("#papertype").val()
  var at3=$("#printedside").val()
  $("#_sides").val(at3)
  if (at2=="32pt Uncoated Painted EDGE") {
    var at6=$("#edge_color").val()
    $.ajaxSetup({
      headers:{
        'X-CSRF-Token': $('meta[name=_token]').attr('content')
      }
    })
    $.ajax({
      url:'search_attr3_BC_color',
      data:{idp:id_product,atr1:at1,atr2:at2,atr3:at3,atr6:at6 },
      type:'POST',
      success: function(result){
        $("#coating").empty();
        $("#corners").empty();
        $("#quantity").empty();
        $("#printingtime").empty();
        $('#labeltxt').empty();
        $("#coating").append("<option value='"+result[0].attr4+"'>"+result[0].attr4+"</option>");
        $("#corners").append("<option value='"+result[0].attr5+"'>"+result[0].attr5+"</option>");
        $("#quantity").append("<option value='"+result[0].attr10+"'>"+result[0].attr10+"</option>");
        $("#printingtime").append("<option value='"+result[0].attr11+"'>"+result[0].attr11+"</option>");
        $('#labeltxt').html(result[0].atr12);
        coating()
        corners()
        quantity_inicial()
        printingtime_inicial()
        document.getElementById("idE").value =result[0].id_especificaciones;
        document.getElementById("idE2").value =result[0].id_especificaciones;
        document.getElementById("Rselectcaras").value =at3;
        document.getElementById("Rselectcaras2").value =at3;
        $("#_Corners").val(result[0].attr5)
        $("#_idspc").val(result[0].id_especificaciones);
      }
    })
  }else {
    $.ajaxSetup({
      headers:{
        'X-CSRF-Token': $('meta[name=_token]').attr('content')
      }
    })
    $.ajax({
      url:'search_attr3_BC',
      data:{idp:id_product,atr1:at1,atr2:at2,atr3:at3},
      type:'POST',
      success: function(result){
        $("#coating").empty();
        $("#corners").empty();
        $("#quantity").empty();
        $("#printingtime").empty();
        $('#labeltxt').empty();
        $("#coating").append("<option value='"+result[0].attr4+"'>"+result[0].attr4+"</option>");
        $("#corners").append("<option value='"+result[0].attr5+"'>"+result[0].attr5+"</option>");
        $("#quantity").append("<option value='"+result[0].attr10+"'>"+result[0].attr10+"</option>");
        $("#printingtime").append("<option value='"+result[0].attr11+"'>"+result[0].attr11+"</option>");
        $('#labeltxt').html(result[0].atr12);
        coating()
        corners()
        quantity_inicial()
        printingtime_inicial()
        document.getElementById("idE").value =result[0].id_especificaciones;
        document.getElementById("idE2").value =result[0].id_especificaciones;
        document.getElementById("Rselectcaras").value =at3;
        document.getElementById("Rselectcaras2").value =at3;
        $("#_Corners").val(result[0].attr5)
        $("#_idspc").val(result[0].id_especificaciones);
      }
    })
  }
}

function coating_change(){
  var at1=$("#size").val()
  var at2=$("#papertype").val()
  var at3=$("#printedside").val()
  var at4=$("#coating").val()
  $.ajaxSetup({
    headers:{
      'X-CSRF-Token': $('meta[name=_token]').attr('content')
    }
  })
  $.ajax({
    url:'search_attr4_BC',
    data:{idp:id_product,atr1:at1,atr2:at2,atr3:at3,atr4:at4},
    type:'POST',
    success: function(result){
      $("#corners").empty();
      $("#quantity").empty();
      $('#labeltxt').empty();
      $('#printingtime').empty();
      $("#corners").append("<option value='"+result[0].attr5+"'>"+result[0].attr5+"</option>");
      $("#quantity").append("<option value='"+result[0].attr10+"'>"+result[0].attr10+"</option>");
      $("#printingtime").append("<option value='"+result[0].attr11+"'>"+result[0].attr11+"</option>");
      $('#labeltxt').html(result[0].atr12);
      corners()
      quantity_inicial()
      printingtime_inicial()
      document.getElementById("idE").value =result[0].id_especificaciones;
      document.getElementById("idE2").value =result[0].id_especificaciones;
      document.getElementById("Rselectcaras").value =at3;
      document.getElementById("Rselectcaras2").value =at3;
      $("#_Corners").val(result[0].attr5)
      $("#_idspc").val(result[0].id_especificaciones);

    }
  })
}

function corners_change(){
  var at1=$("#size").val()
  var at2=$("#papertype").val()
  var at3=$("#printedside").val()
  var at4=$("#coating").val()
  var at5=$("#corners").val()
  $("#_Corners").val(at5)
  $.ajaxSetup({
    headers:{
      'X-CSRF-Token': $('meta[name=_token]').attr('content')
    }
  })
  $.ajax({
    url:'search_attr5_BC',
    data:{idp:id_product,atr1:at1,atr2:at2,atr3:at3,atr4:at4,atr5:at5},
    type:'POST',
    success: function(result){
      $("#quantity").empty();
      $('#labeltxt').empty();
      $('#printingtime').empty();
      $("#quantity").append("<option value='"+result[0].attr10+"'>"+result[0].attr10+"</option>");
      $("#printingtime").append("<option value='"+result[0].attr11+"'>"+result[0].attr11+"</option>");
      $('#labeltxt').html(result[0].atr12);
      quantity_inicial()
      printingtime_inicial()
      document.getElementById("idE").value =result[0].id_especificaciones;
      document.getElementById("idE2").value =result[0].id_especificaciones;
      document.getElementById("Rselectcaras").value =at3;
      document.getElementById("Rselectcaras2").value =at3;
      $("#_idspc").val(result[0].id_especificaciones);

    }
  })
}

function quantity_change(){
  var at1=$("#size").val()
  var at2=$("#papertype").val()
  var at3=$("#printedside").val()
  var at4=$("#coating").val()
  var at5=$("#corners").val()
  var at10=$("#quantity").val()
  if (at2=="32pt Uncoated Painted EDGE"){
    var at6=$("#edge_color").val()
    $.ajaxSetup({
      headers:{
        'X-CSRF-Token': $('meta[name=_token]').attr('content')
      }
    })
    $.ajax({
      url:'search_attr10_BC_color',
      data:{idp:id_product,atr1:at1,atr2:at2,atr3:at3,atr4:at4,atr5:at5,atr6:at6,atr10:at10},
      type:'POST',
      success: function(result){
        $('#labeltxt').empty();
        $('#printingtime').empty();
        $("#printingtime").append("<option value='"+result[0].attr11+"'>"+result[0].attr11+"</option>");
        $('#labeltxt').html(result[0].atr12);
        printingtime_inicial()
        document.getElementById("idE").value =result[0].id_especificaciones;
        document.getElementById("idE2").value =result[0].id_especificaciones;
        document.getElementById("Rselectcaras").value =at3;
        document.getElementById("Rselectcaras2").value =at3;
        $("#_idspc").val(result[0].id_especificaciones);
      }
    })
  }else{
    $.ajaxSetup({
      headers:{
        'X-CSRF-Token': $('meta[name=_token]').attr('content')
      }
    })
    $.ajax({
      url:'search_attr10_BC',
      data:{idp:id_product,atr1:at1,atr2:at2,atr3:at3,atr4:at4,atr5:at5,atr10:at10},
      type:'POST',
      success: function(result){
        $('#labeltxt').empty();
        $('#printingtime').empty();
        $("#printingtime").append("<option value='"+result[0].attr11+"'>"+result[0].attr11+"</option>");
        $('#labeltxt').html(result[0].atr12);
        printingtime_inicial()
        document.getElementById("idE").value =result[0].id_especificaciones;
        document.getElementById("idE2").value =result[0].id_especificaciones;
        document.getElementById("Rselectcaras").value =at3;
        document.getElementById("Rselectcaras2").value =at3;
        $("#_idspc").val(result[0].id_especificaciones);
      }
    })
  }
}

function printingtime_change(){
  var at1=$("#size").val()
  var at2=$("#papertype").val()
  var at3=$("#printedside").val()
  var at4=$("#coating").val()
  var at5=$("#corners").val()
  var at10=$("#quantity").val()
  var at11=$("#printingtime").val()
  if (at2=="32pt Uncoated Painted EDGE"){
    var at6=$("#edge_color").val()
    $.ajaxSetup({
      headers:{
        'X-CSRF-Token': $('meta[name=_token]').attr('content')
      }
    })
    $.ajax({
      url:'search_attr11_BC_color',
      data:{idp:id_product,atr1:at1,atr2:at2,atr3:at3,atr4:at4,atr5:at5,atr6:at6,atr10:at10,atr11:at11},
      type:'POST',
      success: function(result){
        console.log(result)
        $('#labeltxt').empty();
        $('#labeltxt').html(result[0].attr12);
        document.getElementById("idE").value =result[0].id_especificaciones;
        document.getElementById("idE2").value =result[0].id_especificaciones;
        document.getElementById("Rselectcaras").value =at3;
        document.getElementById("Rselectcaras2").value =at3;
        $("#_idspc").val(result[0].id_especificaciones);
      }
    })
  }else{
    $.ajaxSetup({
      headers:{
        'X-CSRF-Token': $('meta[name=_token]').attr('content')
      }
    })
    $.ajax({
      url:'search_attr11_BC',
      data:{idp:id_product,atr1:at1,atr2:at2,atr3:at3,atr4:at4,atr5:at5,atr10:at10,atr11:at11},
      type:'POST',
      success: function(result){
        console.log(result)
        $('#labeltxt').empty();
        $('#labeltxt').html(result[0].attr12);
        document.getElementById("idE").value =result[0].id_especificaciones;
        document.getElementById("idE2").value =result[0].id_especificaciones;
        document.getElementById("Rselectcaras").value =at3;
        document.getElementById("Rselectcaras2").value =at3;
        $("#_idspc").val(result[0].id_especificaciones);
      }
    })
  }
}

//validaciones

$(".validate_form_wedesign").click(function(){
  var labelText = $("#labeltxt").text();
  if (labelText=='') {
    $.confirm({
      content: 'Please select all the features',
      draggable: false,
      buttons: {
        confirm: function () {
        },
      }
    })
    return false;
  }else{
    $.confirm({
      title: 'We design it for you.',
      content: 'If you take this service will cost $50 additional.',
      draggable: false,
      buttons: {
        confirm: function () {
          $('#form_Wedesign').submit();
        },
        cancel: function () {
        },
      }
    })
  }
});

</script>
@endsection
