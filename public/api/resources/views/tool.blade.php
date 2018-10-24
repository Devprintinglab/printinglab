@extends('layouts.app')
@section('title')
Products - Printing Lab
@endsection
@section('content')  
<!-- Styles -->
<div class="pageload" id="pageload"></div>
<div ng-controller="designercontroller" class="">
  <div id="preloader">
   <div class="flexloader"><div class="loader"><i class="fa fa-cog fa-4x yellow"></i><i class="fa fa-cog fa-4x black"></i></div></div>
 </div>
 <div class="container" id="toolcontainer" style="display: none;">
  <div class="col-12 top_toolbar">

<!--    <button ng-click="claaremplate()" >Clear canvas</button>
 <button ng-click="BDtemplate(1)" disabled="">loadJSONtamplates</button>  -->
 <div class="clearfix" style="padding-bottom: 10px;">
  <h4 class="float-left">{{$nombre}}</h4>
  @if (Route::has('login'))
  @auth
  @if (Auth::user()->id==4)
  <button  ng-click="addtemplate({{$class}})" class="btn btn-order float-left">Save template</button>   
  @else 
  @endif
  @endauth
  @endif
  <button ng-click="BDtemplate(2)" class="btn btn-order float-left" style="margin-left: 10px;">Load template</button>
  <input hidden="" id="cutipe" type="text" name="" value="{{$cut}}">
  <input hidden="" id="idcard" type="text" name="" value="{{$class}}">
  @if ($cara=="Front Only")
  <form id="form-desiner" name="fromoculto1"  action="{{route('cart')}}" method="post" enctype="multipart/form-data" >
    {{csrf_field()}}
    <input  type="hidden" name="route" value=true>
    <input  type="hidden" name="idC"  id="idC" value="1">
    <input  type="hidden" name="caras" id="caras" value="1face">
    <input  type="hidden" name="idE"  id="idE" value="{{$spec}}">
    <input  type="hidden" name="idP"  id="idP" value="{{$class}}">
    <input  type="hidden" name="idP"  id="idP" value="{{$class}}">
    <input  type="hidden" name="side1" id="side1" value="">
    <input type="submit" value="Go" hidden="">
  </form>
  <button  ng-click="sendorder()" class="btn btn-order float-right">Proceed to Order</button>
  @else
  <form id="form-desiner" name="fromoculto1"  action="{{route('cart')}}" method="post" enctype="multipart/form-data" >
    {{csrf_field()}}
    <input  type="hidden" name="route" value="true">
    <input  type="hidden" name="idC"  id="idC" value="1">
    <input  type="hidden" name="caras" id="caras" value="2face" >
    <input  type="hidden" name="idE"  id="idE" value="{{$spec}}">
    <input  type="hidden" name="idP"  id="idP" value="{{$class}}">
    <input  type="hidden" name="side1" id="side1" value="">
    <input  type="hidden" name="side2" id="side2" value="">
    <input type="submit" value="Go" hidden="">
  </form>
  <button  ng-click="sendorder()" class="btn btn-order float-right">Proceed to Order</button>
  @endif
  <div ng-click="savecanvas()" class=" float-right savebtn">
   <img src="{{url('/')}}/img/icons/save.png">
   <p>Save</p>
 </div>
 <div  ng-click="preview()" class="float-right previewbtn" data-toggle="modal" data-target="#preview" title="Preview"><img src="{{url('/')}}/img/icons/preview.png">
  <p>Preview</p>
</div>
</div>
</div>
<div class="col-12 toolbar">
  <div class=" clearfix">
    <div class="row">
      <div class="col-text" >
        <h5>Text</h5>
        <div class="input-group mb-3" style="position: relative;">
         <label class="lb-font">Font</label>
         <select ng-model="myItem" ng-change="changefont(this.myItem)" class="custom-select" id="font-family" ng-style="{'font-family': myItem}"  title="Select font" ng-disabled="texdisabled">
          <option ng-selected="myItem" >@{{myItem}}</option>
          <option value="Shrikhand"  style="font-family: Shrikhand">Shrikhand</option>
          <option value="Roboto" style="font-family: Roboto">Roboto</option>
          <option value="Pangolin" style="font-family: Pangolin">Pangolin</option>
          <option value="Open Sans" style="font-family: Open Sans">Open Sans</option>
          <option value="Montserrat" style="font-family: Montserrat">Montserrat</option>
          <option value="Lato" style="font-family: Lato">Lato</option>
          <option value="Titan One" style="font-family: Titan One">Titan One</option>
          <option value="Oswald" style="font-family: Oswald">Oswald</option>
          <option value="Roboto Slab" style="font-family: Roboto Slab">Roboto Slab</option>
          <option value="Raleway" style="font-family: Raleway">Raleway</option>
          <option value="Playfair Display" style="font-family: Playfair Display">Playfair Display</option>
          <option value="Arimo" style="font-family: Arimo">Arimo</option>
          <option value="Nunito" style="font-family: Nunito">Nunito</option>
          <option value="Inconsolata" style="font-family: Inconsolata">Inconsolata</option>
          <option value="Libre Baskerville" style="font-family: Libre Baskerville">Libre Baskerville</option>
          <option value="Yanone Kaffeesatz" style="font-family: Yanone Kaffeesatz">Yanone Kaffeesatz</option>
          <option value="Gloria Hallelujah" style="font-family: Gloria Hallelujah">Gloria Hallelujah</option>
          <option value="Gugi" style="font-family: Gugi">Gugi</option>
          <option value="Oxygen" style="font-family: Oxygen">Oxygen</option>
          <option value="Lobster" style="font-family: Lobster">Lobster</option>
          <option value="Bree Serif" style="font-family: Bree Serif">Bree Serif</option>
          <option value="Pacifico" style="font-family: Pacifico">Pacifico</option>
          <option value="Abril Fatface" style="font-family: Abril Fatface">Abril Fatface</option>
          <option value="Shadows Into Light" style="font-family: Shadows Into Light">Shadows Into Light</option>
          <option value="Berkshire Swash" style="font-family: Berkshire Swash">Berkshire Swash</option>
          <option value="Cinzel" style="font-family: Cinzel">Cinzel</option>
          <option value="Cormorant Unicase" style="font-family: Cormorant Unicase">Cormorant Unicase</option>
          <option value="Permanent Marker" style="font-family: Permanent Marker">Permanent Marker</option>
          <option value="Philosopher" style="font-family: Philosopher">Philosopher</option>
          <option value="Orbitron" style="font-family: Orbitron">Orbitron</option>
          <option value="Fredoka One" style="font-family: Fredoka One">Fredoka One</option>
          <option value="Luckiest Guy" style="font-family: Luckiest Guy">Luckiest Guy</option>
          <option value="Monoton" style="font-family: Monoton">Monoton</option>
          <option value="Bangers" style="font-family: Bangers">Bangers</option>
          <option value="Architects Daughter" style="font-family: Architects Daughter">Architects Daughter</option>
          <option value="VT323" style="font-family: VT323">VT323</option>
        </select>
        <label class="lb-size">Size</label>
        <select class="custom-select" ng-model="size" ng-change="changesize(this.size)" title="Select Font Size" ng-disabled="texdisabled">
          <option ng-selected="">@{{size}}pt</option>
          <option value="16">7pt</option>
          <option value="17">8pt</option>
          <option value="18">9pt</option>
          <option value="19">10pt</option>
          <option value="20">11pt</option>
          <option value="22">12pt</option>
          <option value="24">14pt</option>
          <option value="26">16pt</option>
          <option value="28">18pt</option>
          <option value="30">20pt</option>
          <option value="32">22pt</option>
          <option value="34">24pt</option>
          <option value="40">30pt</option>
          <option value="46">36pt</option>
          <option value="58">48pt</option>
          <option value="80">60pt</option>
          <option value="92">72pt</option>
          <option value="106">96pt</option>
        </select>
        <label class="lb-color">Color</label>
        <input ng-style="{'background-color': textselectedcolor }"  class="text-color" style="width:30%;padding-top: 20px;padding-left: 80px;" ng-disabled="texdisabled"/>
        <i class="fas fa-caret-down tip2" onclick="tip2()" ng-disabled="texdisabled"></i>
        <div class="form-group aligntext">
         <div class="btn-group" role="group" aria-label="Basic example" style="position: relative;">
          <label class="aling-textaling">Aling</label>
          <button ng-click="textAlign('left')" type="button" class="btn tex-format-borde"  ng-disabled="texdisabled"><img src="{{url('/')}}/img/icons/left.png">
          </button>
          <button ng-click="textAlign('center')" type="button" class="btn tex-format-borde"  ng-disabled="texdisabled"><img src="{{url('/')}}/img/icons/center.png">
          </button>
          <button ng-click="textAlign('right')" type="button" class="btn" ng-disabled="texdisabled"><img src="{{url('/')}}/img/icons/right.png">
          </button>
          <label class="format-textaling">Format</label>
          <button ng-click="changefontStyle('bold')" type="button" class="btn tex-format-borde"  ng-disabled="texdisabled"><img src="{{url('/')}}/img/icons/bold.png">
          </button>
          <button ng-click="changefontStyle('oblique')" type="button" class="btn tex-format-borde"  ng-disabled="texdisabled"><img src="{{url('/')}}/img/icons/italic.png">
          </button>
          <button ng-click="changefontStyle('underline')" type="button" class="btn" ng-disabled="texdisabled"><img src="{{url('/')}}/img/icons/underline.png">
          </button>
          <button ng-click="Quitinput()" type="button" class="btn" id="btnquitinput">Quit <br> input
          </button>
        </div>
      </div>
      <div class="btn-group btn-group-sm" role="group" aria-label="...">
      </div>
    </div>
  </div>
  <div class="col-element">
    <h5>Element</h5>
    <div class="row">
      <div class="col">
        <!-- <input type='range' step='.1' max='2' min='0' ng-model="zoom"  ng-change="changezoom(this.zoom)"> -->
        <div class="dropdown">
          <label>Figures</label>
          <button class="btn  dropdown-toggle figures" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <img src="{{url('/')}}/img/icons/figures.png">
          </button>
          <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
            <button class="dropdown-item" type="button" ng-click="addShape('Square')"><i class="material-icons">crop_square</i>  Square</button>
            <button class="dropdown-item" type="button" ng-click="addShape('Circle')"><i class="material-icons">panorama_fish_eye</i>  Circle</button>
            <button class="dropdown-item" type="button" ng-click="addShape('Triangle')"><i class="material-icons">change_history</i>  Triangle</button>
            <button class="dropdown-item" type="button" ng-click="horizontaline()"><i class="material-icons">remove</i>  Horizontal line</button>
            <button class="dropdown-item" type="button" ng-click="verticaline()"><i class="material-icons" style="transform: rotate(90deg);">remove</i>  Vertical line</button>
          </div>
        </div>
      </div>
      <div class="col mx-auto" >
        <label>Add Text</label>
        <button type="button" ng-click="addText()" class="btn btn-addtext"><p class="insertext"  >ABC</p></button>
      </div>
      <div class="col mx-auto" >
        <label>Icons</label>
        <button data-toggle="modal" data-target="#Modalicons" type="button" ng-click="addicon()" class="btn btn-addtext"><p class="insertext" style="font-size: 17px"><i class="far fa-smile"></i></p></button>
      </div>
    </div>
    <div class="row">
      <div class="col">
        <button ng-click="savecanvas()" type="button" class="btn btn-addimg" data-toggle="modal" data-target="#ModalUpload">Upload Images <br>from Your Divice</button>
      </div>
    </div>
  </div>
  <div class="col-xs col-background" >
    <h5>Background</h5>
    <div class="form-group" style="position: relative;margin-top: 16px;">
      <input ng-style="{'background-color': backgroundselectedcolor }" class="col-background-input  background-color">
      <i class="fas fa-caret-down tip" onclick="tip()"></i>
    </div>
    <div class="form-group">
      <label for="formControlRange">Opacity</label>
      <input type="range" ng-model="Opacity"  ng-change="changeopacity(this.Opacity)" min="0" max="1" step="0.1"  class="form-control-range" id="formControlRange" title="Select Font Opacity">
    </div>
  </div>
  <div class="col-edit" >
    <h5>Edit Element</h5>
    <div class="col-12" style="padding: 0px 0px 15px 0px;margin-top: 13px;">
      <div class="btn-group left">
        <button  id="name" ng-click="undo()" type="button" class="btn" ng-disabled="undoButton">
          <p>undo</p>
          <img src="{{url('/')}}/img/icons/undo.png">
        </button>
        <button ng-click="redo()" type="button" class="btn" ng-disabled="redoButton">
          <p>Redo</p>
          <img src="{{url('/')}}/img/icons/redo.png">
        </button>
        <button ng-click="delete()" type="button" class="btn">
          <p>Delete</p>
          <img src="{{url('/')}}/img/icons/delete.png">
        </button>
      </div>
      <div class="btn-group" >
        <button ng-model="layer"  ng-click="changlayer('up')"  type="button" class="btn">
          <p>Bring to front</p>
          <img src="{{url('/')}}/img/icons/front.png">
        </button>
        <button ng-model="layer"  ng-click="changlayer('down')"  type="button" class="btn">
          <p>Bring to back</p>
          <img src="{{url('/')}}/img/icons/back.png">
        </button>
      </div>
    </div>
    <div class="col-12 " style="padding: 0px 0px 5px 0px;">
      <div class="btn-group left" role="group" aria-label="Basic example">
        <button ng-click="Copy()" type="button" class="btn">
          <p>Copy</p>
          <img src="{{url('/')}}/img/icons/copy.png">
        </button>
        <button ng-click="Paste()" type="button" class="btn">
          <p>Paste</p>
          <img src="{{url('/')}}/img/icons/paste.png">
        </button>
        <button ng-click="lock('lock')" type="button" class="btn">
          <p>Lock</p>
          <img src="{{url('/')}}/img/icons/lock.png">
        </button>
      </div>
      <button ng-click="quicklayers()" type="button" class="btn" style="position: relative;left: -15px;border: 1px black solid;padding: 3px;margin-top: 5px;">Layers
      </button>
      <div class="btn-group">
        <div class="dropdown">
          <button class="btn dropdown-toggle" type="button" id="dropdownaling" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <p>Aling</p>
            <img src="{{url('/')}}/img/icons/align.png">
          </button>
          <div class="dropdown-menu" aria-labelledby="dropdownaling">
            <button class="dropdown-item" type="button" ng-click="Aling('left')"><i class="fas fa-arrow-left"></i>   Aling left</button>
            <button class="dropdown-item" type="button" ng-click="Aling('Center')"><i class="fas fa-arrows-alt-h"></i>  Aling Center</button>
            <button class="dropdown-item" type="button" ng-click="Aling('Right')"><i class="fas fa-arrow-right"></i>  Aling Right</button>
            <button class="dropdown-item" type="button" ng-click="Aling('Top')"><i class="fas fa-arrow-up"></i>  Aling Top</button>
            <button class="dropdown-item" type="button" ng-click="Aling('Middle')"><i class="fas fa-arrows-alt"></i>  Aling Middle</button>
            <button class="dropdown-item" type="button" ng-click="Aling('Bottom')"><i class="fas fa-arrow-down"></i>  Aling Bottom</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
</div>
</div>
<!-- <div>{{($width * 96)*2.2}} X {{($height * 96)*2.2}}  </div> -->

<div class="cutcanvas flex-canvas mx-auto cls{{$class}} {{$corner}}" ng-class="bcut" ng-style="{'background-color': cutbackground,'height':cutHeight,'width':cutWidth}" id="canvashidden" style="display: none;">
  <div class=" mx-auto cls{{$class}} {{$corner}}" ng-style="{'background-color': backgroundCol,'height':canvasHeight,'width':canvasWidth,'border':canvasborder,'box-shadow':canvashadow}" >
    <canvas  ng-show="front" class="cls{{$class}} {{$corner}}" sample-show-hide" id="canvas" height="{{$height}}" width="{{$width}}" >
    </canvas>
    <canvas ng-show="back" class="cls{{$class}} {{$corner}}" sample-show-hide" id="canvasback" height="{{$height}}" width="{{$width}}" style="">
    </canvas>
    <div class="mx-auto" style="padding-top: 50px"></div>
    @if ($cara=="Front and Back")
    <div class="btn-group btn-changeside" role="group" aria-label="Basic example">
      <button ng-disabled="front" type="button" ng-click="changeside('f')" class="btn">Front Side</button>
      <button ng-disabled="back" type="button" ng-click="changeside('b')" class="btn ">Back Side</button>
    </div>
    @else
    <div></div>
    @endif
  <!-- <div class="btn-group" role="group" aria-label="Basic example">
    <input type="" name="" ng-model="canvasX">
    <input type="" name="" ng-model="canvasY">
    <div>@{{canvasY}}</div>
  </div> -->
  <div class="handle-target" onselectstart="return false" ng-style="{'height': handle_targetH,'width': handle_targetW,'top': handle_targetT,'left': handle_targetL }"></div>
  <div class="scissors" ng-hide="scissors" >
    <img <img src="{{url('/')}}/img/tijeras-01.svg">
  </div>
  <div class="pick-color" ng-hide="pickcolor" ng-style="{'top': pos_y , 'left':pos_x,'background-color': pos_color}">
  </div>
  <div  class="float-menu2"  dragbox='dragOptions' id="shapeoption" ng-style="{'top': topval , 'left':leftval}">
    <div class="row">
<!--       <div class="col" >
       <button ng-click="delete()" type="button" class="btn btn-secondary" style="margin-left: 5px"> <i class="material-icons">delete</i></button>
       <p>Delete</p>
     </div> -->
     <div class="col" >
      <input ng-style="{'background-color': fillselectedcolor }" class="fill-color">
      <p>Fill Color</p>
    </div>
    <div class="col">
      <input ng-style="{'background-color': bordeselectedcolor }" class="border-color">
      <p>Border Color</p>
    </div>
    <div class="col" >
     <div class="dropdown" >
      <a class="btn" href="#" id="dropdownMenuLink" data-toggle="dropdown" >
        <img src="{{url('/')}}/img/icons/dashedline.png">
      </a>
      <div class="dropdown-menu" aria-labelledby="dropdownMenuLink" id="Dashed-Line1">
        <a class="dropdown-item" href="#" ng-click="changestrokeweigth('0','0','0','0')">&nbsp;</a>
        <a class="dropdown-item" href="#" ng-click="changestrokeweigth('5','5','0','0')">&nbsp;</a>
        <a class="dropdown-item" href="#" ng-click="changestrokeweigth('5','10','0','0')">&nbsp;</a>
        <a class="dropdown-item" href="#" ng-click="changestrokeweigth('5','30','40','5')">&nbsp;</a>
        <a class="dropdown-item" href="#" ng-click="changestrokeweigth('54','2','0','0')">&nbsp;</a>
      </div>
    </div>
    <p>Dashed Line</p>
  </div>
  <div class="col" >
    <div class="dropdown">
      <a class="btn" href="#" id="dropdownMenuLink" data-toggle="dropdown" >
       <img src="{{url('/')}}/img/icons/stroke.png">
     </a>
     <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
      <a class="dropdown-item" href="#" ng-click="changestroke(0)">0pt</a>
      <a class="dropdown-item" href="#" ng-click="changestroke(1)">1pt</a>
      <a class="dropdown-item" href="#" ng-click="changestroke(2)">2pt</a>
      <a class="dropdown-item" href="#" ng-click="changestroke(3)">3pt</a>
      <a class="dropdown-item" href="#" ng-click="changestroke(4)">4pt</a>
      <a class="dropdown-item" href="#" ng-click="changestroke(5)">5pt</a>
      <a class="dropdown-item" href="#" ng-click="changestroke(6)">6pt</a>
      <a class="dropdown-item" href="#" ng-click="changestroke(8)">8pt</a>
      <a class="dropdown-item" href="#" ng-click="changestroke(10)">10pt</a>
      <a class="dropdown-item" href="#" ng-click="changestroke(12)">12pt</a>
      <a class="dropdown-item" href="#" ng-click="changestroke(14)">14pt</a>
      <a class="dropdown-item" href="#" ng-click="changestroke(16)">16pt</a>
      <a class="dropdown-item" href="#" ng-click="changestroke(18)">18pt</a>
      <a class="dropdown-item" href="#" ng-click="changestroke(20)">20pt</a>
      <a class="dropdown-item" href="#" ng-click="changestroke(24)">24pt</a>
      <a class="dropdown-item" href="#" ng-click="changestroke(40)">40pt</a>
    </div>
  </div>
  <p>Stroke</p>
</div>
</div>
</div>
<div  class="quickinput">
  <div ng-repeat=" item in quickinputarray">
    <input id="@{{item.id}}" ng-model="item.name"  ng-change="quickinputchange(this.item.name,item.id)" name="@{{item.name}}" placeholder="@{{item.name}}" value="@{{item.name}}">
  </div>
  
</div>

<div  class="quicklayers">
  <div >
    <div class="row">
      <div ng-repeat=" item in quicklayersarray" class="col-md-4">
        <button ng-click="setactivelayer(item.id)" >@{{item.name}}</button>
      </div>
    </div>
<!--   
  <input id="@{{item.id}}" ng-model="item.name"  ng-change="quickinputchange(this.item.name,item.id)" name="" placeholder="@{{item.name}}" value="@{{item.name}}"> -->
</div>

</div>
<!-- <div  class="voxline" ng-style="{'height':voxlineheight, 'width':voxlinewidth 'top': voxlinetop , 'left':voxlineleft}">
  @{{outlinetop}}
</div> -->
<div ng-click="showalerta()" ng-hide="alerta" id="alerta" class="alerta" ng-style="{'top': alertatop , 'left':alertaleft,height:alertaheight,width:alertawidth}">
  <p ng-hide="alertatext">Keep text inside the safety line to make sure it doesn't get cut off. <a href=""></a></p> 
  <i class="fas fa-exclamation-triangle"></i>
  <div class="tipalert"></div>
</div>
<div id="safelines" class="safeline" ng-style="{'top': safelinetop , 'left':safelineleft}">
  Safety Line
  <div class="line"></div>
</div>
<div  class="outline1" ng-style="{'top': outlinetopval , 'left':outlineleftval}">
  @{{outlinetop}}
</div>
<div  class="outline2" ng-style="{'top': outline2topval , 'left':outline2leftval}">
  @{{outlinerigth}}
</div>
<div  class="float-menu" id="Entertext"  ng-style="{'top': topval , 'left':leftval}">
  <h5>Enter text:</h5>
  <textarea  id="valuetext" value="" type="text" ng-model="textval"  ng-change="changetext(this.textval)" style="height: 30px">
  </textarea>
</div>
</div>
</div>
<div class="modal fade" id="preview" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered"  role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Preview</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div id="card">
          <div class="front">
            <h1>Front Side</h1>
            <img src='@{{canvasurl}}' class=" cls{{$class}} {{$corner}}" alt="ccc" style="width: 40%">
          </div>
          <div class="back">
            <h1>Back Side</h1>
            <img src='@{{canvasbackurl}}' class=" cls{{$class}} {{$corner}}" style="width: 40%">
          </div>
        </div>

      </div>
      <div class="modal-footer mx-auto">
        <p style="text-align: center;">Click to view other side</p>
        <div class="btn-group" role="group" aria-label="Basic example">
        </div>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="loadimgModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modastockimg" role="document">
    <div class="modal-content">
      <div class="modal-header">
       <h5>Stock Images</h5>
       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">
      <div class="container">
        <h1 class="my-4 text-center text-lg-left"></h1>
        <div class="row text-center text-lg-left">
          @foreach ($imgs as $img)
          <div  class="col-lg-3 col-md-4 col-xs-6">
            <a ng-click="addImg('{{url('/')}}/img/desing/','{{$img->url}}')" href="#" class="d-block mb-4 h-100">
              <img class="img-fluid img-thumbnail" src="{{url('/')}}/img/desing/{{$img->url}}" alt="{{$img->name}}" data-dismiss="modal">
            </a>
          </div>
          @endforeach
        </div>
      </div>

    </div>
    <div class="modal-footer">
    </div>
  </div>
</div>
</div>
<div class="modal fade" id="ModalUpload" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5>Upload Images from Your Computer</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="container">
          <form id="uploadfile-form" name="formClient" novalidate  method="post" enctype="multipart/form-data" >
            {{ csrf_field() }}
            <input  type="file" id="uploadFile" name="uploadFile[]"/>
            <input type="submit" class="btn btn-success" name='submitImage' value="Upload Image"/>
          </form>
          <br/>
          <div id="image_preview"></div>
        </div>
        <h5>Your Images </h5>
        <div class="row text-center text-lg-left">
          <div ng-repeat="items in uploadimgurllist" class="show-image col-lg-3 col-md-4 col-xs-6" style="height: auto;max-width: 15%;">
            <a ng-click="addImg('{{url('/')}}/img/templates/userfiles/',items.url)" href="#" class="d-block mb-4 h-100">
              <img class="img-fluid rounded mx-auto d-block" src="{{url('/')}}/img/templates/userfiles/@{{items.url}}" alt="" style="height: 80px" data-dismiss="modal">
            </a>
            <input ng-click="deleteImg(items.id,items.url)" class="delete" type="button" value="Delete" />
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button ng-disabled="btnuploadimgurl"   type="button" class="btn btn-primary" ng-click="insertimg('{{url('/')}}/img/templates/userfiles/')" data-dismiss="modal" aria-label="Close">Insert Image</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="Modaltemplate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5>Select Template</h5>
        <!-- <div class="dropdown">
          <button class="btn btn-secondary dropdown-toggle" type="button" id="templatetype" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Select template type
          </button>
          <div class="dropdown-menu" aria-labelledby="templatetype">
            <a class="dropdown-item" href="#" ng-click="templatetype(1)">Standard</a>
            <a class="dropdown-item" href="#" ng-click="templatetype(2)">Square</a>
            <a class="dropdown-item" href="#" ng-click="templatetype(3)">Circle</a>
            <a class="dropdown-item" href="#" ng-click="templatetype(4)">Slim</a>
            <a class="dropdown-item" href="#" ng-click="templatetype(6)">Oval</a>
            <a class="dropdown-item" href="#" ng-click="templatetype(5)">Plastic</a>
            <a class="dropdown-item" href="#" ng-click="templatetype(9)">ALL</a>
          </div>
        </div> -->
        <button ng-click="loadacanvas()" type="button" class="btn btn-primary" data-dismiss="modal" aria-label="Close" ><i class="fas fa-plus"></i> Continue</button>
        <button ng-click="claaremplate()" type="button" class="btn btn-primary" data-dismiss="modal" aria-label="Close" ><i class="fas fa-plus"></i> New</button>
      </div>
      <div class="modal-body" id="tamplatebody">
        <div id="preloader2">
         <div class="flexloader"><div class="loader"><i class="fa fa-cog fa-4x yellow"></i><i class="fa fa-cog fa-4x black"></i>
         </div>
       </div>
     </div>
     <div class="input-group mb-3">
      <input ng-model="templatefilter" type="text" class="form-control" placeholder="Search Templates" aria-label="Recipient's username" aria-describedby="basic-addon2">
      <div class="input-group-append">
        <span class="input-group-text" id="basic-addon2"><i class="fas fa-search"></i></span>
      </div>
    </div>

    <div class="row text-center text-lg-left">
      <div ng-repeat="items in canvastemplate  | filter:{type:{{$class}},name:templatefilter}:true | orderBy:'name'" class="show-image col-lg-3 col-md-4 col-xs-6" style="height: auto;max-width: 15%;">
       <h5 style="text-align: center;">@{{items.name}}</h5>
       <?php if ($cara=='Front and Back') {?>
         <a ng-click="SelctedTemplate(items.id,items.name,true)" href="#" class="d-block mb-4 h-100">
          <img class="img-fluid mx-auto d-block cls@{{items.type}}" src="img/templates/@{{items.img}}.png" alt="seg" style="margin: 10px;" data-dismiss="modal">
          <img class="img-fluid mx-auto d-block cls@{{items.type}}" src="img/templates/@{{items.img2}}.png" alt="" style="margin: 10px;" data-dismiss="modal">
        </a>
      <?php }
      else{ ?>
       <a  href="#" class="d-block mb-4 h-100">
        <img ng-click="SelctedTemplate(items.id,items.name,true)" class="img-fluid mx-auto d-block cls@{{items.type}}" src="img/templates/@{{items.img}}.png" alt="" style="margin: 10px;" data-dismiss="modal">
        <img ng-click="SelctedTemplate(items.id,items.name,false)" class="img-fluid mx-auto d-block cls@{{items.type}}" src="img/templates/@{{items.img2}}.png" alt="" style="margin: 10px;" data-dismiss="modal">
      </a>


    <?php }  ?>



    <input ng-click="deletetemplate(items.id,items.name,items.img,items.img2)" class="delete" type="button" value="Delete" />
    <input ng-click="editemplate(items.id,items.name,items.img,items.img2)" class="edit" type="button" value="Edit" data-dismiss="modal" aria-label="Close" />
    <div ng-if="$last" ng-init="ngRepeatFinished()"></div>
  </div>
</div>
<div class="modal-footer">
  <button ng-hide="btntemplate"  type="button" class="btn btn-primary" ng-click="deltemplate()" data-dismiss="modal" aria-label="Close">Delete templates</button>
</div>
</div>
</div>
</div>
</div>
<div class="modal fade" id="Modalicons" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5>Select Icons</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h1>Select from  stock icons.</h1>
        <div class="row text-center iconsModal">
          <select ng-model="icons" ng-change="callicons(this)">
            <option ng-selected="icons" >@{{icons}}</option>
            @foreach ($icons as $ico)
            <option value="{{$ico}}">{{$ico}}</option>
            @endforeach
          </select>
        </div>
        <div ng-repeat="items in iconsurl" class="show-image col-lg-3 col-md-4 col-xs-6" style="height: auto;max-width: 15%;">
          <a ng-click="addico('{{url('/')}}/img/icons/svg/',items)"  href="#" class="d-block mb-4 h-100">
            <img class="img-fluid rounded mx-auto d-block" src="{{url('/')}}/img/icons/svg/@{{namefolderico}}/png/@{{items.split('.').slice(0, -1).join('.')}}.png" alt="" style="height: 80px" data-dismiss="modal">
          </a>
        </div>
        <div class="modal-footer">
        </div>
      </div>
    </div>
  </div>
</div>
</div>
<link rel="stylesheet" href="{!! asset('css/jquery.colorpicker.css') !!}"></link>
<script type="text/javascript" src="{!! asset('js/jquery-ui.min.js') !!}"></script>
<script type="text/javascript" src="{!! asset('js/jquery.colorpicker.js') !!}"></script>
<link rel="stylesheet" href="{!! asset('css/designer.css') !!}"></link>
<link rel="stylesheet" type="text/css" href="{!! asset('css/jquery-ui.css') !!}"></link>
<script type="text/javascript" src="{!! asset('js/fabric.curvedText.js') !!}"></script>
<script type="text/javascript" src="{!! asset('js/spectrum.js') !!}"></script>
<script type="text/javascript" src="{!! asset('js/jquery.flip.min.js') !!}"></script>
<script type="text/javascript" src="{!! asset('js/designer.js') !!}"></script>
<link rel="stylesheet" href="{!! asset('css/spectrum.css') !!}"></link>

<script>

  $("#card").flip();
  function flipcard() {
  }

</script>

@endsection
