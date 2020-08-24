@extends('layouts.FrontEnd')
@section('content')
<!-- start slider -->
<div id="myCarousel" class="carousel slide" data-ride="carousel">
<!-- Indicators -->
<ol class="carousel-indicators">
  <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
  <li data-target="#myCarousel" data-slide-to="1"></li>
  <li data-target="#myCarousel" data-slide-to="2"></li>
</ol>

<!-- Wrapper for slides -->
<div class="carousel-inner">  
  <div class="item active">
    <img src="{!! asset('public/images/banner/Bimbel_Offline.png') !!}" alt="Los Angeles" style="width:100%;">
  </div>

  <div class="item">
    <img src="{!! asset('public/images/banner/Bimbel_Online.png') !!}" alt="Chicago" style="width:100%;">
  </div>

  <div class="item">
    <img src="{!! asset('public/images/banner/Bimbel_Privat.png') !!}" alt="Chicago" style="width:100%;">
  </div>

  <div class="item">
    <img src="{!! asset('public/images/banner/Sewa Gedung.png') !!}" alt="Chicago" style="width:100%;">
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
<div class="travel-search" onclick="functionGetOverlay()" id="page_cari_halaman">
  <div class="container">
    <div class="grid-container">
        <div class="grid-item a">
          <div class="menu-travel actives">
            <a href="">
              <img src="{!! asset('public/assets/images/icon/icon/Paket Wisata.png') !!}" style="max-width: 15px;">
              Paket Wisata
            </a>
          </div>
          <div class="menu-travel">
            <a href="">
              <img src="{!! asset('public/assets/images/icon/icon/Lokasi Wisata.png') !!}" style="max-width: 15px;">
              Lokasi Wisata
            </a>
          </div>
          <div class="menu-travel">
            <a href="">
              <img src="{!! asset('public/assets/images/icon/icon/Penginapan.png') !!}" style="max-width: 15px;">
              Penginapan Wisata
            </a>
          </div>
          <div class="menu-travel">
            <a href="">
              <img src="{!! asset('public/assets/images/icon/icon/Sewa Mobil.png') !!}" style="max-width: 15px;">
              Sewa Mobil
            </a>
          </div>
          <div class="menu-travel">
            <a href="">
              <img src="{!! asset('public/assets/images/icon/icon/Tiket.png') !!}" style="max-width: 15px;">
              Tiket
            </a>
          </div>
          
        </div>
        <div class="grid-item b">
            <form method="get" action="">
              <div class="row">
                <div class="col-md-7">
                  <div class="form-group">
                    <label for="email">Pilih </label>
                    <input type="email" class="form-control" id="email">
                  </div>
                </div>                      
              </div>
            </form>
        </div>        
    </div>    
  </div>
</div>
@endsection
@section('script')
<style type="text/css">
  .grid-container {
    display: grid;
    grid-template-columns:20% 80%; 
    width: 100%;
  }

  .a {
      border-radius: 5px 0px 0px 5px;
      background-color: #f1f1f1;
      border-right: 2px solid #d4d4d4;
      z-index: 9999;
  }

  .b {
      padding: 10px;
      background-color: #fff;
      border-radius: 0px 5px 5px 0px;
  }

  .travel-search{
    background-color:#00000099;
    padding-top: 20px;
    padding-bottom: 20px;
    margin-top: -190px;
    z-index: 999999;
    position: sticky;
  }

  .menu-travel{
    border-radius: 5px 0px 0px 5px;
    padding: 5px 10px 5px 10px;
  }

  .menu-travel:hover{
    background-color: #fff;
    cursor: pointer;
    font-weight: bold;
    color: #41c866;
  }

  .actives{
    background-color: #fff;
    cursor: pointer;
    font-weight: bold;
    color: #41c866;
  }


.form-group {
     margin-bottom: 2px; 
}
</style>

<script type="text/javascript">
  function functionGetOverlay(){
    $('#page_selain_cari_halaman').addClass("show");
    $('#page_cari_halaman').addClass("focus");
  }

  function functionPostOverlay(){
    $('#page_selain_cari_halaman').removeClass("show");
    $('#page_cari_halaman').removeClass("focus");
  }
</script>
@endsection
