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
<div class="belanjar-search">
  <div class="container">
    <div class="row">
      <div class="belanjar-search-kotak">
        <form method="get" action="">
          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label for="pilih">Pilih Kategori</label>
                <select class="form-control m-input-belanja" style="margin-top: 3px;">
                  <option>Semua</option>
                </select>
              </div>
            </div>                      
            <div class="col-md-7">
              <div class="form-group">
                <label for="text">Cari barang disini </label>
                <input type="text" class="form-control m-input-belanja">
              </div>
            </div>                      
            <div class="col-md-1">
              <div class="form-group">
                <label for="cari">&nbsp;</label>
                <button class="btn btn-primary">Cari Barang</button>
              </div>
            </div>                      
          </div>
        </form>
      </div> 
    </div>
  </div>
</div>

<div class="container container-fluid-content">
  <div class="row">
    <div class="col-md-9">
      <div class="categori-kotak">          
        <div class="row">
          <?php
            function random_color_part() {
                return str_pad( dechex( mt_rand( 0, 255 ) ), 2, '0', STR_PAD_LEFT);
            }

            function random_color() {
                return random_color_part() . random_color_part() . random_color_part();
            }
          ?>
          <h2 class="home-subHeader-top" style="padding: 0 0 10px;font-size: 22px;font-weight: 500;width: 50%;margin-bottom: 0;padding-bottom: 28px;"><span style="border-left: 3px solid #56c174; margin-right: 10px;"></span>Produk Terpopuler</h2>
          @foreach($produk as $produk)
          <div class="col-md-3">
            <div class="shop-card">
              <a href="">
                <div class="title">
                  {{$produk->nama_produk}}
                </div>        
              </a>                       
              <div class="slider">
                @if (count($produk->gambarproduk ) != 0)

                  @foreach($produk->gambarproduk as $gambar)
                    <figure data-color="#E24938, #{{ random_color() }}">
                      <img src="{{ ENV('APP_URL_API_RESOURCE').'belanja/product/'.$gambar->gambar_produk}}" />
                    </figure>
                  @endforeach
                @else
                    <figure data-color="#E24938, #{{ random_color() }}">
                      <img src="{{ ENV('APP_URL_API_RESOURCE').'belanja/product/default-product-image.png'}}" />
                    </figure>
                @endif
              </div>
              <div class="cta">
                <div class="price">Rp {{ number_format($produk->harga,0 ,',','.')}}</div>
                <a href="{{ route('Belanja.detail',[$produk->slug]) }}"><button class="btn">Beli Sekarang<span class="bg"></span></button></a>
              </div>
            </div>
          </div>
          @endforeach
        </div>
      </div>        
    </div>
    <div class="col-md-3">
      <div class="categori-kotak-2">
        <!-- start slider -->
        <span style="font-size: 18px;">Kategori Produk</span>
        <table class="table table-bordered" style="margin-top: 10px;">
          <tbody>
              <tr>
                  <td>
                      <a href="">
                          <img src="{!! asset('public/assets/images/icon/belanja/icon6.png') !!}" width="30"> Kamera
                          <span style="float: right;"><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                      </a>
                  </td>
              </tr>
              <tr>
                  <td>
                      <a href="">
                          <img src="{!! asset('public/assets/images/icon/belanja/icon3.png') !!}" width="30"> Kesehatan
                          <span style="float: right;"><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                      </a>
                  </td>
              </tr>
              <tr>
                  <td>
                      <a href="">
                          <img src="{!! asset('public/assets/images/icon/belanja/icon4.png') !!}" width="30"> handpone dan tablet
                          <span style="float: right;"><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                      </a>
                  </td>
              </tr>
              <tr>
                  <td>
                      <a href="">
                          <img src="{!! asset('public/assets/images/icon/belanja/icon5.png') !!}" width="30"> Perlengkapan Pesta &amp; Craft
                          <span style="float: right;"><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                      </a>
                  </td>
              </tr>
              <tr>
                  <td>
                      <a href="">
                          <img src="{!! asset('public/assets/images/icon/belanja/icon7.png') !!}" width="30"> Perawatan Tubuh
                          <span style="float: right;"><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                      </a>
                  </td>
              </tr>
          </tbody>
      </table>
        <!-- <table class="table table-bordered" style="margin-top: 10px;">
          @foreach($kategori as $kategori)
          <tr>
            <td>
              <a href="">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTBQEf11USHJLmi6m3OsRDgWP4pkn2f-f4n7G4GsZEe_kRHCPdgDA&s" width="30">
                {{$kategori->kategori}}
                <span style="float: right;"><i class="fa fa-angle-right" aria-hidden="true"></i></span>
              </a>
            </td>         
          </tr>
          @endforeach
        </table> -->
        <img src="https://image.shutterstock.com/z/stock-vector-big-sale-and-discount-web-banners-with-red-bows-and-ribbons-best-offer-vector-eps-illustration-508527859.jpg">
      </div>
    </div>      
  </div>
</div>
@endsection
@section('script')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
@include('sweet::alert')
<style type="text/css">
  .container-fluid-content{
    margin-top: 20px; 
    margin-bottom: 30px; 
    padding: 0; 
  }

  .belanjar-search{
    background-color:#00000099;
    padding-top: 20px;
    padding-bottom: 20px;
    margin-top: -130px;
    z-index: 999999;
    position: sticky;
  }

  .belanjar-search-kotak{
    width: 100%;
    border-radius: 5px;
    padding: 10px 30px 10px 20px;
    background: #fff;
    -webkit-box-shadow: 0 6px 12px rgba(0, 0, 0, .175);
    box-shadow: 0 6px 12px rgba(0, 0, 0, .175);
  }


  .form-group {
       margin-bottom: 2px; 
  }

  .m-input-belanja{
    border-radius: 2px;
    border: 1px solid #ddd;
  }

  .shop-card {
    width: 100%;
    background: #f5f5f5;
    margin-bottom: 30px;
    border:1px solid #ddd;
    overflow: hidden;
    border-radius: 2px;
    padding: 5px;
    text-align: center;
    z-index: 2;
  }
  .shop-card figure {
    margin: 0;
    padding: 0;
    overflow: hidden;
    outline: none !important;
  }
  .shop-card figure img {
    /*margin: -95px 0 -60px;*/
    width: 100%;
  }
  .shop-card .title {
    font-weight: 900;
    text-transform: uppercase;
    font-size: 12px;
    color: #23211f;
    height: 30px;
    margin-bottom: 5px;
  }
  .shop-card .cta {
    padding: 0px 16px 5px;
  }
  .shop-card .cta::after {
    content: '';
    display: table;
    clear: both;
  }
  .shop-card .price {
    float: left;
    color: #56c174;
    font-size: 10px;
    font-weight: 900;
    padding-top: 2px;
    transition: color .3s ease-in-out;
    margin-top: -33px;
  }
  .shop-card .btn {
    margin-top: -35px;
    position: relative;
    z-index: 1;
    float: right;
    display: inline-block;
    font-size: 10px;
    font-weight: 900;
    text-transform: uppercase;
    color: #56c174;
    padding: 5px 5px;
    cursor: pointer;
    transition: all .3s ease-in-out;
    line-height: .95;
    border: none;
    background: none;
    outline: none;
    border: 1px solid #56c174;
    border-radius: 20px;
    overflow: hidden;
  }
  .shop-card .btn .bg {
    width: 101%;
    height: 101%;
    display: block !important;
    z-index: -1;
    opacity: 0;
    transition: all .3s ease-in-out;
    background: linear-gradient(135deg, #a61322, #d33f34);
  }
  .shop-card .btn:hover {
    color: #fff !important;
    border: 1px solid transparent !important;
    background-color: #56c174;
  }
  .shop-card .btn:hover {
    opacity: 1;
  }

  /*--------------------
  Slick Dots
  ---------------------*/
  .slick-dots {
    bottom: 12px !important;
  }
  .slick-dots a {
    position: relative;
    display: block;
    width: 16px;
    height: 16px;
  }
  .slick-dots span {
    position: absolute;
    top: 50%;
    left: 50%;
    -webkit-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
    width: 6px;
    height: 6px;
    border-radius: 50%;
  }
  .slick-dots circle {
    fill: none;
    stroke-width: 1;
    stroke-linecap: round;
    stroke-dasharray: 39 39;
    stroke-dashoffset: 39;
    transition: all .9s ease-in-out;
    transition: stroke-dashoffset 0.5s;
  }
  .slick-dots .slick-active circle {
    stroke-dashoffset: 0;
  }

  .shop-card figure img {
      height: 150px;
  }

  @media only screen and (max-width: 600px) {
    .container-fluid-content{
      padding: 10px;
    }
  }


</style>

<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/gh/kenwheeler/slick@1.8.1/slick/slick.css"/>
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/gh/kenwheeler/slick@1.8.1/slick/slick-theme.css"/>
<script type="text/javascript" src="//cdn.jsdelivr.net/gh/kenwheeler/slick@1.8.1/slick/slick.min.js"></script>
<script type="text/javascript">
// function background(c1, c2) {
//   return {
//     background: '-moz-linear-gradient(15deg, ' + c1 + ' 50%, ' + c2 + ' 50.1%)',
//     background: '-o-linear-gradient(15deg, ' + c1 + ', ' + c2 + ' 50.1%)',
//     background: '-webkit-linear-gradient(15deg, ' + c1 + ' 50%, ' + c2 + ')',
//     background: '-ms-linear-gradient(15deg, ' + c1 + ' 50%, ' + c2 + ' 50.1%)',
//     background: 'linear-gradient(15deg, ' + c1 + ' 50%,' + c2 + ' 50.1%)'
//   }
// }

// function changeBg(c1, c2) {
//   $('div.bg').css(background(c1, c2)).fadeIn(700, function() {
//     $('body').css(background(c1, c2));
//     $('.bg').hide();
//   })
//   $('span.bg').css({
//     background: '-moz-linear-gradient(135deg, ' + c1 + ', ' + c2 + ')',
//     background: '-o-linear-gradient(135deg, ' + c1 + ', ' + c2 + ')',
//     background: '-webkit-linear-gradient(135deg, ' + c1 + ', ' + c2 + ')',
//     background: '-ms-linear-gradient(135deg, ' + c1 + ', ' + c2 + ')',
//     background: 'linear-gradient(135deg, ' + c1 + ',' + c2 + ')'
//   });
// }

$('.slider').slick({
  arrows: false,
  dots: true,
  infinite: true,
  speed: 600,
  fade: true,
  focusOnSelect: true,
  customPaging: function(slider, i) {
    var color = $(slider.$slides[i]).data('color').split(',')[1];
    return '<a><svg width="100%" height="100%" viewBox="0 0 16 16"><circle cx="8" cy="8" r="6.215" stroke="' + color + '"></circle></svg><span style="background:' + color + '"></span></a>';
  }
})
</script>

@endsection
