@extends('layouts.app')
@section('title')
Calendars - Printing Lab
@endsection
@section('content')
<div class="container textoscontainer">
  <div class="row">
    <div class="col-md-7">
      @foreach ($producto as $dato )
      <div class="row imgpadding">
        <div class="col-md-12" >
          <a data-fancybox="gallery" href="images/marketing/calendars/{{ $dato->img1}}">
            <img class="img_detalle" src="images/marketing/calendars/{{ $dato->img1}}">
          </a>
        </div>
      </div>
      <div class="row imgpadding">
        <div class="col-md-4 col-xs-4">
          <a data-fancybox="gallery" href="images/marketing/calendars/{{ $dato->img2}}">
            <img class="img_detalle2" src="images/marketing/calendars/{{ $dato->img2}}">
          </a>
        </div>
        <div class="col-md-4 col-xs-4">
          <a data-fancybox="gallery" href="images/marketing/calendars/{{ $dato->img3}}">
            <img class="img_detalle2" src="images/marketing/calendars/{{ $dato->img3}}">
          </a>
        </div>
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
            @foreach ($attr1 as $key)
            <option value="{{$key->attr1}}">{{$key->attr1}}</option>
            @endforeach
          </select>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6 col-4">
          <p>Stock: </p>
        </div>
        <div class="col-md-6 col-8 filter_select">
          <select class="selectdetalles selector2" name="stock"  id="stock" onchange="stock_change()" >
          </select>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6 col-4">
          <p>Printed Side:</p>
        </div>
        <div class="col-md-6 col-8 filter_select">
          <select class="selectdetalles selector2" name="printedside"  id="printedside" onchange="printedside_change()" >
          </select>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6 col-4">
          <p>Coating:</p>
        </div>
        <div class="col-md-6 col-8 filter_select">
          <select class="selectdetalles selector2" name="coating"  id="coating" onchange="coating_change()" >
          </select>
        </div>
      </div>
      <div class="row" id="row_edge">
        <div class="col-md-6 col-4">
          <p>Drill Hole:</p>
        </div>
        <div class="col-md-6 col-8 filter_select">
          <select class="selectdetalles selector2" name="drill"  id="drill" onchange="drill_change()" >
          </select>
        </div>
      </div>
      <div class="row" id="row_edge_2">
        <div class="col-md-6 col-4">
          <p>Corners:</p>
        </div>
        <div class="col-md-6 col-8 filter_select">
          <select class="selectdetalles selector2" name="Corners"  id="Corners" onchange="corners_change()" >
          </select>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6 col-4">
          <p>Quantity:</p>
        </div>
        <div class="col-md-6 col-8 filter_select">
          <select class="selectdetalles selector2" name="quantity"  id="quantity" onchange="quantity_change()" >
          </select>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6 col-4">
          <p>Printing Time:</p>
        </div>
        <div class="col-md-6 col-8 filter_select">
          <select class="selectdetalles selector2" name="printingtime"  id="printingtime" onchange="printingtime_change()" >
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
          <input type="hidden" name="idC"  id="idC" value="5">
          <input type="hidden" name="caras" id="Rselectcaras" >
          <input  type="hidden"name="idE"  id="idE">
          <input type="submit" value="UPLOAD YOUR FILE & ORDER NOW" class="btn validate_form_upload">
        </form>
        <!-- diseñador -->
        <form name="fromoculto1" id="form_Design" class="movil_BC" action="{{route('tool')}}" method="post" enctype="multipart/form-data">
          {{csrf_field()}}
          @foreach ($producto as $dato )
          <input type="hidden" name="id_P" id="id_P" value="{{$dato->id_productos}}">
          <input type="hidden" name="P_name" id="P_name" value="{{ $dato->nombre}}">
          @endforeach
          <input type="hidden" name="_idC"  id="_idC" value="5">
          <input type="hidden" name="_size"  id="_size">
          <input type="hidden" name="_sides" id="_sides" >
          <input type="hidden" name="_idspc"  id="_idspc">
          <input type="hidden" name="_Corners"  id="_Corners">
          <input type="submit" value="CREATE YOUR DESIGN ONLINE" class="btn validate_form_design">
        </form>
        <!-- nosotros lo diseñamos -->
        <form name="fromoculto1" id="form_Wedesign"  action="{{route('we-designed')}}" method="post" enctype="multipart/form-data">
          {{csrf_field()}}
          @foreach ($producto as $dato )
          <input type="hidden" name="idP" id="id_product" value="{{$dato->id_productos}}">
          @endforeach
          <input type="hidden" name="idC"  id="idC" value="5">
          <input type="hidden" name="caras2" id="Rselectcaras2" >
          <input  type="hidden"name="idE2"  id="idE2">
          <input  value="WE DESIGN IT FOR YOU" class="btn validate_form_wedesign">
        </form>
      </div>
    </div>
  </div>
  <div class="container tabs-products">
    <ul class="nav nav-pills" role="tablist">
      <li class="nav-item">
        <a class="nav-link link-products active" data-toggle="pill" href="#home">DETAILS</a>
      </li>
      <li class="nav-item">
        <a class="nav-link link-products " data-toggle="pill" href="#menu1">PAPER</a>
      </li>
      <li class="nav-item">
        <a class="nav-link link-products " data-toggle="pill" href="#menu2">TEMPLATES</a>
      </li>
    </ul>
    <div class="tab-content tab-content-MP">
      <div id="home" class="container tab-pane active"><br>
        <p>
          Effective marketing need not consume your entire budget and take up a lot of time. Standard postcard printing is an affordable way of informing current and potential customers on your brand’s latest deals, promos, or products. Its impact begins in the homes of your consumers when they receive their postcard in the mail.
          Promotional postcards compel them to check out what you’re announcing and visit your store to check out the advertised offer.
        </p>
        <p>
          Which size should I choose? <br>
          It’s crucial for you to choose dimensions that will make your custom postcards effective and impactful. Here are some of our standard postcard sizes that are guaranteed to make an immediate impression:
        </p>
        <p>
          •	4" x 6" is small enough to make a straightforward and easy to read announcement. It’s also easy to keep and qualifies as USPS First-Class mail. <br>
          •	5" x 7" stands out against the smaller, standard postcards sent as personal mail. Its width allows for the right balance among several images and compelling copy. Perfect for promoting a new business or product line. <br>
          •	5.5" x 8.5" has more than enough space for an image-heavy or extremely visual design. Recommended for postcards announcing a sale or special deal available in store or under a limited time period.<br>
        </p>
      </div>
      <div id="menu1" class="container tab-pane fade"><br>
        <p>
          14 pt.  <br>
          The standard material used for other thick promotional products such as business cards
          Sturdy enough to handle high-quality double-sided printing & multiple handlings
          Available in shiny gloss and elegant matte coating
        </p>
        <p>
          16 pt.  <br>
          Additional durability gives an upscale feel
          Double-sided gloss protects it from wear, tear, & other external damage
          Matte finish leads customers to reading lengthier text
        </p>
      </div>
      <div id="menu2" class="container tab-pane fade"><br>
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
                <a href="{{route('download-template-postcards',['archivo'=>'3x4_postcard.eps']) }}"><i class="fas fa-download"></i> 3x4 postcard</a>
              </td>
              <td>
                <a href="{{route('download-template-postcards',['archivo'=>'3x4_postcard.jpg']) }}"><i class="fas fa-download"></i> 3x4 postcard</a>
              </td>
            </tr>
            <tr>
              <td>
                <a href="{{route('download-template-postcards',['archivo'=>'4.75x4.75_postcard.eps']) }}"><i class="fas fa-download"></i> 4.75x4.75 postcard</a>
              </td>
              <td>
                <a href="{{route('download-template-postcards',['archivo'=>'4.75x4.75_postcard.jpg']) }}"><i class="fas fa-download"></i> 4.75x4.75 postcard</a>
              </td>
            </tr>
            <tr>
              <td>
                <a href="{{route('download-template-postcards',['archivo'=>'4x6_postcard_horizontal.eps']) }}"><i class="fas fa-download"></i> 4x6 postcard horizontal</a>
              </td>
              <td>
                <a href="{{route('download-template-postcards',['archivo'=>'4x6_postcard_horizontal.jpg']) }}"><i class="fas fa-download"></i> 4x6 postcard horizontal</a>
              </td>
            </tr>
            <tr>
              <td>
                <a href="{{route('download-template-postcards',['archivo'=>'4x6_postcard_vertical.eps']) }}"><i class="fas fa-download"></i> 4x6 postcard vertical</a>
              </td>
              <td>
                <a href="{{route('download-template-postcards',['archivo'=>'4x6_postcard_vertical.jpg']) }}"><i class="fas fa-download"></i> 4x6 postcard vertical</a>
              </td>
            </tr>
            <tr>
              <td>
                <a href="{{route('download-template-postcards',['archivo'=>'5x7_postcard_vertical.eps']) }}"><i class="fas fa-download"></i> 5x7 postcard vertical</a>
              </td>
              <td>
                <a href="{{route('download-template-postcards',['archivo'=>'5x7_postcard_vertical.jpg']) }}"><i class="fas fa-download"></i> 5x7 postcard vertical</a>
              </td>
            </tr>
            <tr>
              <td>
                <a href="{{route('download-template-postcards',['archivo'=>'8.5x5.5_postcard_horizontal.eps']) }}"><i class="fas fa-download"></i> 8.5x5.5 postcard horizontal</a>
              </td>
              <td>
                <a href="{{route('download-template-postcards',['archivo'=>'8.5x5.5_postcard_horizontal.jpg']) }}"><i class="fas fa-download"></i> 8.5x5.5 postcard horizontal</a>
              </td>
            </tr>
            <tr>
              <td>
                <a href="{{route('download-template-postcards',['archivo'=>'8.5x5.5_postcard_vertical.eps']) }}"><i class="fas fa-download"></i> 8.5x5.5 postcard vertical</a>
              </td>
              <td>
                <a href="{{route('download-template-postcards',['archivo'=>'8.5x5.5_postcard_vertical.jpg']) }}"><i class="fas fa-download"></i> 8.5x5.5 postcard vertical</a>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection

@section('scripts')
<script>
size_change();
function size_change(){
  var attr1=$("#size").val();
  $("#_size").val($("#size").val());
  $.get("postcardsattr2/"+attr1,function(result){
    $("#row_edge_2").css({display: 'none'});
    $("#row_edge").css({display: 'none'});
    $('#stock').empty();
    $('#printedside').empty();
    $('#Corners').empty();
    $('#coating').empty();
    $('#drill').empty();
    $('#quantity').empty();
    $("#printingtime").empty();
    $('#labeltxt').empty();
    $("#stock").append("<option>Select</option>")
    for(i=0; i<result.length; i++){
      $("#stock").append("<option value='"+result[i].attr2+"'>"+result[i].attr2+"</option>");
    }
  })
}
function stock_change(){
  var attr1=$("#size").val();
  var attr2=$("#stock").val();
  $.get("postcardsattr3/"+attr1+"/"+attr2, function(result){
    $("#row_edge_2").css({display: 'none'});
    $("#row_edge").css({display: 'none'});
    $('#printedside').empty();
    $('#coating').empty();
    $('#Corners').empty();
    $('#drill').empty();
    $('#quantity').empty();
    $("#printingtime").empty();
    $('#labeltxt').empty();
    $("#printedside").append("<option>Select</option>")
    for(i=0; i<result.length; i++){
      $("#printedside").append("<option value='"+result[i].attr3+"'>"+result[i].attr3+"</option>");
    }
  })
}
function printedside_change(){
  var attr1=$("#size").val();
  var attr2=$("#stock").val();
  var attr3=$("#printedside").val();
  $.get("postcardsattr4/"+attr1+"/"+attr2+"/"+attr3, function(result){
    $("#row_edge_2").css({display: 'none'});
    $("#row_edge").css({display: 'none'});
    $('#coating').empty();
    $('#Corners').empty();
    $('#drill').empty();
    $('#quantity').empty();
    $("#printingtime").empty();
    $('#labeltxt').empty();
    $("#coating").append("<option>Select</option>")
    for(i=0; i<result.length; i++){
      $("#coating").append("<option value='"+result[i].attr4+"'>"+result[i].attr4+"</option>");
    }
  })
}
function coating_change(){
  var attr1=$("#size").val();
  var attr2=$("#stock").val();
  var attr3=$("#printedside").val();
  var attr4=$("#coating").val();
  if ((attr1=='3" x 4"' && attr4=='Matte/Dull Finish')||(attr1=='3" x 4"' && attr4=='Full UV on Front Only') ) {
    $("#row_edge").css({display: 'flex'});
    $("#row_edge_2").css({display: 'none'});
    $.ajaxSetup({
      headers:{
        'X-CSRF-Token': $('meta[name=_token]').attr('content')
      }
    })
    $.ajax({
      url:'postcardsattr5',
      data:{atr1:attr1,atr2:attr2,atr3:attr3,atr4:attr4,},
      type:'POST',
      success: function(result){
        $('#drill').empty();
        $('#quantity').empty();
        $("#printingtime").empty();
        $('#labeltxt').empty();
        $('#Corners').empty();
        $("#drill").append("<option>Select</option>");
        for(i=0; i<result.length; i++){
          $("#drill").append("<option value='"+result[i].attr5+"'>"+result[i].attr5+"</option>");
        }
      }
    })
  }else if ((attr1=='4" x 6"' && attr4=='Matte/Dull Finish')||(attr1=='4" x 6"'&&attr4=='UV Coating')||  (attr1=='4" x 6"' && attr2!='18 Point C1S' && attr4=='Full UV on Front Only')) {
    $("#row_edge_2").css({display: 'flex'});
    $("#row_edge").css({display: 'none'});
    $.ajaxSetup({
      headers:{
        'X-CSRF-Token': $('meta[name=_token]').attr('content')
      }
    })
    $.ajax({
      url:'postcardsattr5',
      data:{atr1:attr1,atr2:attr2,atr3:attr3,atr4:attr4,},
      type:'POST',
      success: function(result){
        $('#drill').empty();
        $('#quantity').empty();
        $("#printingtime").empty();
        $('#labeltxt').empty();
        $('#Corners').empty();
        $("#Corners").append("<option>Select</option>");
        for(i=0; i<result.length; i++){
          $("#Corners").append("<option value='"+result[i].attr5+"'>"+result[i].attr5+"</option>");
        }
      }
    })
  }else{
    $("#row_edge_2").css({display: 'none'});
    $("#row_edge").css({display: 'none'});
    $.ajaxSetup({
      headers:{
        'X-CSRF-Token': $('meta[name=_token]').attr('content')
      }
    })
    $.ajax({
      url:'postcardsattr10',
      data:{atr1:attr1,atr2:attr2,atr3:attr3,atr4:attr4,},
      type:'POST',
      success: function(result){
        $('#Corners').empty();
        $('#drill').empty();
        $('#quantity').empty();
        $("#printingtime").empty();
        $('#labeltxt').empty();
        $("#quantity").append("<option>Select</option>");
        for(i=0; i<result.length; i++){
          $("#quantity").append("<option value='"+result[i].attr10+"'>"+result[i].attr10+"</option>");
        }
      }
    })
  }
}
function corners_change(){
  var attr1=$("#size").val();
  var attr2=$("#stock").val();
  var attr3=$("#printedside").val();
  var attr4=$("#coating").val();
  var attr5=$("#Corners").val();
  $.ajaxSetup({
    headers:{
      'X-CSRF-Token': $('meta[name=_token]').attr('content')
    }
  })
  $.ajax({
    url:'postcardsattr10_drill',
    data:{atr1:attr1,atr2:attr2,atr3:attr3,atr4:attr4,atr5:attr5,},
    type:'POST',
    success: function(result){
      $('#quantity').empty();
      $("#printingtime").empty();
      $('#labeltxt').empty();
      $("#quantity").append("<option>Select</option>");
      for(i=0; i<result.length; i++){
        $("#quantity").append("<option value='"+result[i].attr10+"'>"+result[i].attr10+"</option>");
      }
    }
  })
}
function drill_change(){
  var attr1=$("#size").val();
  var attr2=$("#stock").val();
  var attr3=$("#printedside").val();
  var attr4=$("#coating").val();
  var attr5=$("#drill").val();
  $.ajaxSetup({
    headers:{
      'X-CSRF-Token': $('meta[name=_token]').attr('content')
    }
  })
  $.ajax({
    url:'postcardsattr10_drill',
    data:{atr1:attr1,atr2:attr2,atr3:attr3,atr4:attr4,atr5:attr5,},
    type:'POST',
    success: function(result){

      $('#quantity').empty();
      $("#printingtime").empty();
      $('#labeltxt').empty();

      $("#quantity").append("<option>Select</option>");
      for(i=0; i<result.length; i++){
        $("#quantity").append("<option value='"+result[i].attr10+"'>"+result[i].attr10+"</option>");
      }
    }
  })
}
function quantity_change(){
  var attr1=$("#size").val();
  var attr2=$("#stock").val();
  var attr3=$("#printedside").val();
  var attr4=$("#coating").val();
  var attr10=$("#quantity").val();
  var attr51=$("#drill").val();
  var attr52=$("#Corners").val();
  if (attr51==null&&attr52==null) {
    $.ajaxSetup({
      headers:{
        'X-CSRF-Token': $('meta[name=_token]').attr('content')
      }
    });
    $.ajax({
      url:'postcardsattr11',
      data:{atr1:attr1,atr2:attr2,atr3:attr3,atr4:attr4,atr10:attr10,},
      type:'POST',
      success: function(result){
        $("#printingtime").empty();
        $('#labeltxt').empty();

        $("#printingtime").append("<option>Select</option>");
        for(i=0; i<result.length; i++){
          $("#printingtime").append("<option value='"+result[i].attr11+"'>"+result[i].attr11+"</option>");
        }
      }
    })
  }
  else{
    if (attr51==null) {
      var attr5=$("#Corners").val();
    }else {
      var attr5=$("#drill").val();
    }
    $.ajaxSetup({
      headers:{
        'X-CSRF-Token': $('meta[name=_token]').attr('content')
      }
    });
    $.ajax({
      url:'postcardsattr11_drill',
      data:{atr1:attr1,atr2:attr2,atr3:attr3,atr4:attr4,atr5:attr5,atr10:attr10,},
      type:'POST',
      success: function(result){
        $("#printingtime").empty();
        $('#labeltxt').empty();
        $("#printingtime").append("<option>Select</option>");
        for(i=0; i<result.length; i++){
          $("#printingtime").append("<option value='"+result[i].attr11+"'>"+result[i].attr11+"</option>");
        }
      }
    })
  }
}
function printingtime_change(){
  var attr1=$("#size").val();
  var attr2=$("#stock").val();
  var attr3=$("#printedside").val();
  var attr4=$("#coating").val();
  var attr10=$("#quantity").val();
  var attr11=$("#printingtime").val();
  var attr51=$("#drill").val();
  var attr52=$("#Corners").val();
  if (attr51==null&&attr52==null)  {
    $.ajaxSetup({
      headers:{
        'X-CSRF-Token': $('meta[name=_token]').attr('content')
      }
    });
    $.ajax({
      url:'postcardsattr12',
      data:{atr1:attr1,atr2:attr2,atr3:attr3,atr4:attr4,atr10:attr10,atr11:attr11,},
      type:'POST',
      success: function(result){
        var attr12= result[0].attr12;
        var id_especificaciones=result[0].id_especificaciones;
        $('#labeltxt').html(attr12);
        document.getElementById("idE").value =id_especificaciones;
        document.getElementById("idE2").value =id_especificaciones;
        document.getElementById("Rselectcaras").value =attr3;
        document.getElementById("Rselectcaras2").value =attr3;
        $("#_idspc").val(id_especificaciones);
      }
    })
  }else {
    if (attr51==null) {
      var attr5=$("#Corners").val();
    }else {
      var attr5=$("#drill").val();
    }
    $.ajaxSetup({
      headers:{
        'X-CSRF-Token': $('meta[name=_token]').attr('content')
      }
    });
    $.ajax({
      url:'postcardsattr12_drill',
      data:{atr1:attr1,atr2:attr2,atr3:attr3,atr4:attr4,atr5:attr5,atr10:attr10,atr11:attr11,},
      type:'POST',
      success: function(result){
        var attr12= result[0].attr12;
        var id_especificaciones=result[0].id_especificaciones;
        $('#labeltxt').html(attr12);
        document.getElementById("idE").value =id_especificaciones;
        document.getElementById("idE2").value =id_especificaciones;
        document.getElementById("Rselectcaras").value =attr3;
        document.getElementById("Rselectcaras2").value =attr3;
        $("#_idspc").val(id_especificaciones);
      }
    });
  }
};


$(".validate_form_upload").click(function(){
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
    $('#form_Upload').submit();
  }
});
$(".validate_form_design").click(function(){
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
    $('#form_Design').submit();
  }
});
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
