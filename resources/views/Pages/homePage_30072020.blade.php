@extends('layouts.FrontEnd')

@section('content')


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

<div class="grid-container">
  <!-- <div class="icon_right" id="right-button">
    <i class="fa fa-chevron-right" aria-hidden="true"></i>
  </div> -->
  <main class="grid-item main" id="content-swift">
    @include('Pages.icon_product')
  </main>
</div>

@include('Pages.desktop-homePage')
@include('Pages.mobile-homePage')

<div class="container">
  <br>
  <div class="row">
    <div class="col-md-9">
      <span style="font-size: 20px;">
        <strong>Promo Produk</strong> 
        <!-- <a href="" class="img-icon-popular">
          <img src="{!! asset('public\assets\images\icon\icon\Perangkat Lunak.png') !!}" width="20">                                   
        </a>
        <a href="" class="img-icon-popular">
          <img src="{!! asset('public\assets\images\icon\icon\Event.png') !!}" width="20">                                   
        </a>
        <a href="" class="img-icon-popular">
          <img src="{!! asset('public\assets\images\icon\icon\Gedung Pertemuan.png') !!}" width="20">                                   
        </a>
        <a href="" class="img-icon-popular">
          <img src="{!! asset('public\assets\images\icon\icon\Hiburan.png') !!}" width="20">                                   
        </a>
        <a href="" class="img-icon-popular">
          <img src="{!! asset('public\assets\images\icon\icon\Daftar Bimbel Online.png') !!}" width="20">                                   
        </a> -->
      </span>
    </div>
    <div class="col-md-3">
        <!-- Controls -->
        <div class="controls pull-right hidden-xs">
            <!-- <a href="">Lihat Semua Promo</a> -->
        </div>
    </div>
  
    <div class="col-md-12">
      <br>
      <div class="row">

        <div class="col-md-3">
          <a style="cursor: pointer;" onclick="migration()">
            <img src="{!! asset('public\assets\images\promo\persiapan-kelas-12-final.png') !!}" style="border-radius: 5px;margin-bottom: 20px">
          </a>
        </div>

        <div class="col-md-3">
          <a style="cursor: pointer;" onclick="migration()">
            <img src="{!! asset('public\assets\images\promo\persiapan-kelas-12-final-ips.png') !!}" style="border-radius: 5px;margin-bottom: 20px">
          </a>
        </div>

        <div class="col-md-3">
          <a style="cursor: pointer;" onclick="migration()">
            <img src="{!! asset('public\assets\images\promo\persiapan-kelas-11-final-dev.png') !!}" style="border-radius: 5px;margin-bottom: 20px">
          </a>
        </div>

        <div class="col-md-3">
          <a style="cursor: pointer;" onclick="migration()">
            <img src="{!! asset('public\assets\images\promo\persiapan-kelas-10-final-reivisi.png') !!}" style="border-radius: 5px;margin-bottom: 20px">
          </a>
        </div>


        <div class="col-md-3">
          <a style="cursor: pointer;" onclick="migration()">
            <img src="{!! asset('public\assets\images\promo\persiapan-kelas-9-SMP-final-revisi.png') !!}" style="border-radius: 5px;margin-bottom: 20px">
          </a>
        </div>

        <div class="col-md-3">
          <a style="cursor: pointer;" onclick="migration()">
            <img src="{!! asset('public\assets\images\promo\persiapan-kelas-8-SMP-final-revisi.png') !!}" style="border-radius: 5px;margin-bottom: 20px">
          </a>
        </div>

        <div class="col-md-3">
          <a style="cursor: pointer;" onclick="migration()">
            <img src="{!! asset('public\assets\images\promo\persiapan-kelas-7-SMP-final-revisi.png') !!}" style="border-radius: 5px;margin-bottom: 20px">
          </a>
        </div>
        
        <div class="col-md-3">
          <a style="cursor: pointer;" onclick="migration()">
            <img src="{!! asset('public\assets\images\promo\paket-lainnya_.png') !!}" style="border-radius: 5px;margin-bottom: 20px">
          </a>
        </div>
       
      </div>
      
    </div>
  </div>
  <br>
  <div style="margin-top: 60px; margin-bottom: 60px;">
    <center>
      <span style="font-size: 24px;font-weight: bold;">Semua Dibuat mudah dengan PERMATA MALL</span>          
    </center>
    <br>
    <br>
    <div class="row">

      <div class="col-md-4">
        <center>
          <img src="{!! asset('public\assets\images\icon\PlusPermataMall\apa yang anda perlukan ada di kami.png') !!}">
          <hr>
          <p>
            <center>
              Semua yang kamu butuh kan ada di kami
            </center>
          </p>
        </center>
      </div>

      <div class="col-md-4">
        <center>
          <img src="{!! asset('public\assets\images\icon\PlusPermataMall\Pembayaran mudah,aman,dan cepat.png') !!}">
          <hr>
          <p>
            <center>
              Pembayaran mudah, cepat, dan aman
            </center>
          </p>
        </center>
      </div>

      <div class="col-md-4">
        <center>
          <img src="{!! asset('public\assets\images\icon\PlusPermataMall\Promo.png') !!}">
          <hr>
          <p>
            <center>
              Promo dan bonus menarik
            </center>
          </p>
        </center>
      </div>

      <div class="col-md-4">
        <center>
          <img src="{!! asset('public\assets\images\icon\PlusPermataMall\Aman.png') !!}">
          <hr>
          <p>
            <center>
              Aman dan terpercaya
            </center>
          </p>
        </center>
      </div>

      <div class="col-md-4">
        <center>
          <img src="{!! asset('public\assets\images\icon\PlusPermataMall\Costumer Service.png') !!}">
          <hr>
          <p>
            <center>
              Custumer service 1x24 jam yang tanggap
            </center>
          </p>
        </center>
      </div>

      <div class="col-md-4">
        <center>
          <img src="{!! asset('public\assets\images\icon\PlusPermataMall\100.png') !!}">
          <hr>
          <p>
            <center>
              Jaminan 100% aman
            </center>
          </p>
        </center>
      </div>
    
    </div>
  </div>
</div>

@endsection
@section('script')
<script type="text/javascript">
  

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

  $('#right-button').click(function(e) {
      const x = e.pageX - slider.offsetLeft;
      const walk = (x - startX) * 3; //scroll-fast
      slider.scrollLeft = scrollLeft - walk;       

  });
</script>

<style type="text/css">
@import url(https://fonts.googleapis.com/css?family=Rubik);

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

.grid-container {
  background: #efefef;
  font-family: "Rubik", sans-serif;
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
    padding-left: 35px;
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



  @media screen and (max-width: 500px) {
    .items-menu {
      overflow-x: scroll;
      padding-left: 15px;
    }
  }
}





.content-section{
  width: 50%;
  float: left;
}  

.content-section-two{
  width: 50%;
  float: left;
  text-align: center;
}  

span.judul{
  font-size: 32px;
  font-weight: 600;
  color: #56c174;
}

.section{
  padding-top: 50px;
  padding-bottom: 50px;
  background-color: #e8e8e861;
}

.section-two{
  padding-top: 50px;
  padding-bottom: 50px;
}

.btn-section{
  border: 2px solid #56c174;
  padding: 10px;
  font-size: 18px;
  font-weight: 600;
  border-radius: 10px;
  color: #56c174;
}

p{
  text-align: justify;
  color: #000;
}

footer p{
  text-align: justify;
  color: #fff;
}

.pengembangan{
  font-size: 12px;
  background: #f05565;
  padding: 5px;
  display: flex;
  border-radius: 3px;
  color: #fff;
  max-width: 150px;
}

.section-mobile{
  display: none;
}

.section-two-mobile{
  display: none;
}

.section{
  display: block;
}

.section-two{
  display: block;
}


@media only screen and (max-width: 600px) {
  .section{
    display: none;
  }

  .section-two{
    display: none;
  }


  .section-mobile{
    display: block;
    background: #e8e8e861;
  }

  .section-two-mobile{
    display: block;
  }

  .content-section{
    width: 100%;
    text-align: center;
    padding: 10px;
  }

  .content-section-two{
    width: 100%;
    text-align: center;
  }


  span.judul {
      font-size: 20px;
  }

  .btn-section {
    border: 2px solid #56c174;
    padding: 7px;
    font-size: 14px;
    margin-bottom: 20px;
    font-weight: 600;
    float: left;
    border-radius: 10px;
    color: #56c174;
  }  

  .content-section img{
    width: 150px;
  }

  .content-section-two img{
    width: 150px;
  }
}

/*::-webkit-scrollbar {
  width: 12px;
  height: 12px;
}*/


/*::-webkit-scrollbar-thumb {
  background: transparent; 
}*/

.icon_right{
  position: absolute;
  right: 0;
  z-index: 1;
  margin-top: 40px;
  background: #56c174;
  padding: 5px;
  color: #fff;
  border-radius: 50%;
  width: 30px;
  text-align: center;
  margin-right: 10px;  
}

</style>
@endsection
