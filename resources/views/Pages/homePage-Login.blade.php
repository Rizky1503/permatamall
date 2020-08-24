
@extends('layouts.FrontEnd')

@section('content')

@if($count_survey < 1)
<div id="loadMe" class="modal" style="height: 270px;">
  <div>
    <h5>Terimakasih telah menggunakan aplikasi <b>PermataMall</b>. Darimanakah Anda mengetahui aplikasi <b>PermataMall ?</b></h5><hr>
    <div class="row">
      <div class="col-md-12">
        <div class="row">
          <div class="col-md-3" onclick="kirimpemberitahuan('Facebook')">
            <span class="span-where-you-know" style="background-color: #3b5998; color: white; ">Facebook</span>
          </div>
           <div class="col-md-3" onclick="kirimpemberitahuan('Instagram')">
            <span class="span-where-you-know" style="background-color: #833AB4; color: white; ">Instagram</span>
          </div>
           <div class="col-md-3" onclick="kirimpemberitahuan('Brosur')">
            <span value  class="span-where-you-know" style="background-color: #56c174; color: white; ">Brosur<span style="color: #ff000000;">___<span></span>
          </div>
           <div class="col-md-3" onclick="kirimpemberitahuan('Iklan')">
            <span class="span-where-you-know" style="background-color: #ff901d; color: white;">Iklan</span>
          </div><br><br><br>
           <div class="col-md-3" onclick="showlainnya()">
            <span class="span-where-you-know" style="background-color: #fd1414; color: white;">Lainnya</span>
          </div><br>
          <div class="col-md-9" id="lainnya-input" style="display: none">
            <label></label>
            <input type="text" name="" id="inputlainnya" class="form-control">
          </div>
          <div class="col-md-3" id="lainnya-button" style="display: none">
            <label></label><br>
            <button type="submit" class="btn btn-primary" onclick="kirimpemberitahuanlainnya()">Kirim</button>
          </div>
        </div>
      </div> 
    </div>  
  </div>
</div>
@endif

<!-- start slider -->
<div id="myCarousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
    <li data-target="#myCarousel" data-slide-to="3"></li>
    <li data-target="#myCarousel" data-slide-to="4"></li>
    <li data-target="#myCarousel" data-slide-to="5"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner">  
      <div class="item active">
        <a style="cursor: pointer;" onclick="migration()">
          <img src="{!! asset('public/images/banner/paket trial.jpg') !!}" alt="Los Angeles" style="width:100%;">
        </a>
      </div>
      <div class="item">
        <a style="cursor: pointer;" onclick="migration()" >  
          <img src="{!! asset('public/images/banner/ptn.jpg') !!}" alt="Chicago" style="width:100%;">
        </a>
      </div>
      <div class="item">
        <a style="cursor: pointer;" onclick="migration()" >  
          <img src="{!! asset('public/images/banner/promo_covid.jpg') !!}" alt="Chicago" style="width:100%;">
        </a>
      </div>
       <div class="item">
        <a style="cursor: pointer;" onclick="migration()" >  
          <img src="{!! asset('public/images/banner/Artboard_1.png') !!}" alt="Chicago" style="width:100%;">
        </a>
      </div>
      <div class="item">
        <a href="{{ route('Registrasi.index') }}">  
          <img src="{!! asset('public/images/banner/eksositem..jpg') !!}" alt="Chicago" style="width:100%;">
        </a>
      </div>
      <div class="item">
        <a href="{{ route('Registrasi.index') }}">  
          <img src="{!! asset('public/images/banner/tunggu.jpg') !!}" alt="Chicago" style="width:100%;">
        </a>
      </div>
  </div>

  <!-- Left and right controls -->
  <a class="left carousel-control" href="#myCarousel" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
<!-- slider end -->
<div class="container">
<div class="permata-search" onclick="functionGetOverlay()" id="page_cari_halaman">
  <div class="row">
    <div class="col-md-12">
      <span style="font-size: 32px;font-weight: bold; position: relative; top: 25px;">Mau Apa ?</span>
      <div class="grid-container">        
        <main class="grid-item main" id="content-swift">
          @include('Pages.icon_product')
        </main>
      </div>
    </div>
  </div> 
</div>
<div class="container">
  <div class="section">
    <img src="{!! asset('public/images/banner/home/visi_misi.jpg') !!}" alt="Chicago" style="width:100%;">
  </div>
  <div class="section">
    <a style="cursor: pointer;" onclick="migration()">
      <img src="{!! asset('public/images/banner/home/do.jpg') !!}" alt="Chicago" style="width:100%;">
    </a>
  </div>
  <div class="section">
    <img src="{!! asset('public/images/banner/home/pengembangan.jpg') !!}" alt="Chicago" style="width:100%;">
  </div>
</div>
</div>
<style type="text/css">
  .section {
    padding-top: 0px !important;
    padding-bottom: 0px !important;
    background-color: #e8e8e861;
  }
</style>
@endsection
@section('script')
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/rangeslider.js/2.3.2/rangeslider.min.css">
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/rangeslider.js/2.3.2/rangeslider.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>


<script type="text/javascript">

  function kirimpemberitahuan(value){
    $.ajax({
      type: "GET",
      url: '{{ route("FrontEnd.store_survey") }}',
      data: {
          sumber : value,
      },
      success: function(responses){  
        location.reload();
      }
    });
  }

  function kirimpemberitahuanlainnya(value){
    $.ajax({
      type: "GET",
      url: '{{ route("FrontEnd.store_survey") }}',
      data: {
          sumber : $('#inputlainnya').val(),
      },
      success: function(responses){  
        location.reload();
      }
    });
  }
  

  function showlainnya(){
    var input = document.getElementById("lainnya-input");    
    var button = document.getElementById("lainnya-button");    
    
    input.style.display = "block";
    button.style.display = "block";
  
  }


  
  $(document).ready(function() {
      $('#loadMe').modal({
        fadeDuration: 250,
        escapeClose: false,
        clickClose: false,
        showClose: false
      });
  });

  const slider = document.querySelector('.items-menu');
  let isDown = false;
  let startX;
  let scrollLeft;

  slider.addEventListener('mousedown', (e) => {
    isDown = true;
    slider.classList.add('active');
    startX = e.pageX - slider.offsetLeft;
    scrollLeft = slider.scrollLeft;
  });
  slider.addEventListener('mouseleave', () => {
    isDown = false;
    slider.classList.remove('active');

  });
  slider.addEventListener('mouseup', () => {
    isDown = false;
    slider.classList.remove('active');
  });
  slider.addEventListener('mousemove', (e) => {
    if(!isDown) return;
    e.preventDefault();
    const x = e.pageX - slider.offsetLeft;
    const walk = (x - startX) * 3; //scroll-fast
    slider.scrollLeft = scrollLeft - walk;   


  });  

  $('#right-button').click(function() {
      event.preventDefault();      
      const x = 533 - 0;
      const walk = (x - startX) * 3; //scroll-fast
      slider.scrollLeft = 0 - walk;    

  });

  function functionGetChange(response){
    if (response == "gedung") {
      // menu
      $('#Bimbel').removeClass("color_active");
      $('#Bimbel').addClass("color_active_non");
      $('#gedung').removeClass("color_active_non");
      $('#gedung').addClass("color_active");      
      $('#kontent_bimbel').hide(); 
      $('#kontent_gedung').show(); 
    }else if (response == "Bimbel") {
      // menu
      $('#Bimbel').addClass("color_active");
      $('#Bimbel').removeClass("color_active_non");
      $('#gedung').addClass("color_active_non");
      $('#gedung').removeClass("color_active");      
      // kontent
      $('#kontent_bimbel').show(); 
      $('#kontent_gedung').hide(); 

    }
  }


  $(document).ready(function() {
      functionGetChange('Bimbel');
  });

  $('input[type="range"]').rangeslider({polyfill: false});


  function functionGetOverlay(){
    $('#page_selain_cari_halaman').addClass("show");
    $('#page_cari_halaman').addClass("focus");
  }

  function functionPostOverlay(){
    $('#page_selain_cari_halaman').removeClass("show");
    $('#page_cari_halaman').removeClass("focus");
  }
</script>


<style type="text/css">

  .wabutton{
    position:fixed;
    bottom:122px;
    right: 3px;
    z-index:100;
    cursor: pointer;
    animation: bounce 2s infinite;
    -webkit-animation: bounce 2s infinite;
    -moz-animation: bounce 2s infinite;
    -o-animation: bounce 2s infinite;    
  }
  @-webkit-keyframes bounce {
    0%, 20%, 50%, 80%, 100% {-webkit-transform: translateY(0);} 
    40% {-webkit-transform: translateY(-30px);}
    60% {-webkit-transform: translateY(-15px);}
  }
  @-moz-keyframes bounce {
    0%, 20%, 50%, 80%, 100% {-moz-transform: translateY(0);}
    40% {-moz-transform: translateY(-30px);}
    60% {-moz-transform: translateY(-15px);}
  }
  @-o-keyframes bounce {
    0%, 20%, 50%, 80%, 100% {-o-transform: translateY(0);}
    40% {-o-transform: translateY(-30px);}
    60% {-o-transform: translateY(-15px);}
  }
  @keyframes  bounce {
    0%, 20%, 50%, 80%, 100% {transform: translateY(0);}
    40% {transform: translateY(-30px);}
    60% {transform: translateY(-15px);}
  }

@import url(https://fonts.googleapis.com/css?family=Rubik);

.grid-container {
  background: #efefef;
  font-family: "Rubik", sans-serif;
}

.span-where-you-know{
  border: 1px solid #dcdcdc;
  padding: 15px;
  border-radius: 5px;
  cursor: pointer;
}

@supports (display: grid) {
  .grid-container {
    display: grid;
    grid-template-columns: 1fr 1fr 1fr;
    grid-template-rows: auto 1fr auto;
    grid-template-areas: "header header header" "title title footer" "main main main";
  }
  @media screen and (max-width: 500px) {
    .grid-container {
      grid-template-columns: 1fr;
      grid-template-rows: 0.3fr 1fr auto 1fr;
      grid-template-areas: "header" "title" "main" "footer";
    }
  }

  .grid-item {
    color: #fff;
    background: skyblue;
    padding: 3.5em 1em;
    font-size: 1em;
    font-weight: 700;
  }


  .main {
    color: #959595;
    background-color: white;
    grid-area: main;
    padding: 0;
    overflow-x: hidden;
    overflow-y: hidden;
  }


  .items-menu {
    position: relative;
    width: 100%;
    overflow-x: scroll;    
    overflow-y: hidden;
    white-space: nowrap;
    transition: all 0.2s;
    will-change: transform;
    user-select: none;
    cursor: pointer;
    padding-left: 10px;
  }

  .items-menu.active {
    background: rgba(255, 255, 255, 0.3);
    cursor: grabbing;
    cursor: -webkit-grabbing;
    transform: scale(1);
  }

  .item-menu {
    display: inline-block;
    background: #f1f1f1;
    text-align: center;
    padding: 10px;
    min-width: 100px;
    margin: 10px 3px 1px 3px;
    border-radius: 4px;
  }

  .modal {
    overflow: visible;
  }   



  @media screen and (max-width: 500px) {
    .items-menu {
      overflow-x: scroll;
      padding-left: 15px;
    }
  }
}




  .search_none_active{
    display: none;
  }

  .search_active{
    display: block;
  }

  .color_active{
    background: #56c174;
    font-weight: bold;
    color: #fff;
  }

  .color_active_non{
    background: #fff;
    font-weight: bold;
  }

  .form-control {
      border-radius: 0px;
  }

  .rangeslider__fill {
      background: #56c174;
      position: absolute;
  }  

  
  .rangeslider--horizontal{
    margin-top: 10px;
  }

  .search-content{
    width: 30%;
    float: left;
    padding: 10px 100px 40px 100px;
    min-height: 190px;
  }

  @media only screen and (max-width: 600px){
    .search-content{
      width: 33%;
      float: left;
      padding: 10px;
    }
    .permata-search {
        width: 100%;
        padding: 10px 10px 10px 10px;
        border-radius: 5px;
        background: #fff;
        -webkit-box-shadow: 0 6px 12px rgba(0, 0, 0, .175);
        box-shadow: 0 6px 12px rgba(0, 0, 0, .175);
        position: sticky;
        margin-top: -10px;
    }
  }

::-webkit-scrollbar {
  width: 12px;
  height: 12px;
}


::-webkit-scrollbar-thumb {
  background: transparent; 
}
</style>
@endsection
