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
<div class="container">
<div class="permata-search" onclick="functionGetOverlay()" id="page_cari_halaman">
  <div class="row">
    <div class="col-md-3">
      <span style="font-size: 32px;font-weight: bold;">Mau Apa ?</span>
    </div>
    <div class="col-md-9">
      <div class="row">
        <div style="float: right; margin-right: 35px;" class="menu-button">
          <button class="product-permata-sidebar color_active" id="Bimbel" onclick="functionGetChange(this.id)">
            <img src="{!! asset('public\assets\images\icon\icon\Bimbel Online.png') !!}" width="30px"> 
            Bimbel
          </button>
          <button class="product-permata-sidebar color_active_non" id="gedung" onclick="functionGetChange(this.id)">
            <img src="{!! asset('public\assets\images\icon\icon\Gedung Pertemuan.png') !!}" width="30px">         
            Gedung
          </button>
        </div>
      </div>
    </div>
    <div class="col-md-12">
      <hr class="hr_search">      
      <div id="kontent_bimbel">
        <form action="{{ route('Bimbel.search') }}" method="get">
          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label for="usr">Jenis Bimbel:</label>
                <select class="form-control  select2" name="jns_bimbel">
                  <option value="Private">Private</option>
                  <option value="Bimbel Offline">Bimbel Offline</option>
                </select>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="usr">Tingkat:</label>
                <select class="form-control select2" name="tingkat">
                  <option value="SD">SD</option>
                  <option value="SMP">SMP</option>
                  <option value="SMA">SMA</option>
                </select>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="usr">Kota:</label>
                <select class="form-control select2" name="kota" required="required">
                    <option value="">Pilih Kota</option>
                  @foreach($kotaList as $listKota)
                    <option value="{{ base64_encode($listKota) }}">{{ $listKota }}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <button type="submit" class="btn btn-primary btn-lg" style="float: right;">Cari Bimbel</button>
              </div>
            </div>
          </div>
        </form>
      </div>
      <div id="kontent_gedung">
        <form>
          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label for="usr">Lokasi, Alamat, atau Kota:</label>
                <select class="form-control  select2">
                  <option value="Private">Private</option>
                  <option value="Bimbel Offline">Bimbel Offline</option>
                </select>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="usr">Kapasitas:</label>
                <input type="range" name="" min="10" max="200" value="150">
              </div>
            </div>            
            <div class="col-md-12">
              <div class="form-group">
                <button class="btn btn-primary btn-lg" style="float: right;">Cari Gedung</button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div> 
</div>
<div class="conten-after-search">
  <div class="row">
    <!-- <div class="col-md-9">
      <span style="font-size: 20px;">
        <strong>Pencarian Populer :</strong> 
        @foreach($popular_label as $listLabelPopular)
        <span class="template-span-href">Gedung</span> 
        @endforeach
      </span>
    </div>
    <div class="col-md-3">
        <div class="controls pull-right">
            <a class="left fa fa-chevron-left btn btn-success btn-sm" href="#carousel-example" data-slide="prev"></a>
            <a class="right fa fa-chevron-right btn btn-success btn-sm" href="#carousel-example" data-slide="next"></a>
        </div>
    </div> -->
    <div class="col-md-12">
      <br>
      <div id="carousel-example" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="item active">

                <div class="row">
                  @foreach($popular_data as $ListDataPopular)
                    <?php  
                    if (file_exists($ListDataPopular->image)) {
                        $imagePopular   = "'".$ListDataPopular->image."'";
                    }else {
                        $imagePopular   = 'https://emkaarchitect.com/wp-content/uploads/2019/06/Proses-Pemasangan-Dinding-Lantai-2-Gedung-Parkir-Proyek-Pembangunan-Gedung-Dan-Resto-Sekolah-Tinggi-Pariwisata-AMPTA-Yogyakarta-800x400.jpeg';
                    }
                    ?>
                    <div class="col-md-3">
                      <article class="card">
                        <div class="thumb" style="background: url({{ $imagePopular  }}) no-repeat center;"></div>
                        <div class="infos">
                           <a href="">
                             <h2 class="title">{{ $ListDataPopular->nama_produk }}</h2>
                           </a>                 
                          <span class="date">Rp. 2.000.000 - Rp. 13.000.000</span>
                          <br>
                          <br>
                          <a href="" class="btn btn-primary">Selengkapnya</a>
                        </div>
                      </article>
                    </div>  
                  @endforeach
                </div>
            </div>
            <div class="item">
                <div class="row">
                  @foreach($popular_data as $ListDataPopular)
                    <?php  
                    if (file_exists($ListDataPopular->image)) {
                        $imagePopular   = "'/".$ListDataPopular->image."'";
                    }else {
                        $imagePopular   = 'https://emkaarchitect.com/wp-content/uploads/2019/06/Proses-Pemasangan-Dinding-Lantai-2-Gedung-Parkir-Proyek-Pembangunan-Gedung-Dan-Resto-Sekolah-Tinggi-Pariwisata-AMPTA-Yogyakarta-800x400.jpeg';
                    }
                    ?>
                    <div class="col-md-3">
                      <article class="card">
                        <div class="thumb" style="background: url({{ $imagePopular  }}) no-repeat center;"></div>
                        <div class="infos">
                           <a href="">
                             <h2 class="title">{{ $ListDataPopular->nama_produk }}</h2>
                           </a>                 
                          <span class="date">Rp. 2.000.000 - Rp. 13.000.000</span>
                          <br>
                          <br>
                          <a href="" class="btn btn-primary">Selengkapnya</a>
                        </div>
                      </article>
                    </div>  
                  @endforeach                     
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-9">
      <span style="font-size: 20px;">
        <strong>Promo Produk :</strong> 
        <a href="" class="img-icon-popular">
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
          <img src="{!! asset('public\assets\images\icon\icon\DAFTAR BIMBEL ONLINE.png') !!}" width="20">                                   
        </a>
      </span>
    </div>
    <div class="col-md-3">
        <!-- Controls -->
        <div class="controls pull-right hidden-xs">
            <a href="">Lihat Semua Promo</a>
        </div>
    </div>
    <div class="col-md-12">
      <br>
      <div class="row">
        <div class="col-md-3">
          <img src="{!! asset('public/images/Promo/Bimbel_Offline-01.png') !!}" style="border-radius: 5px;margin-bottom: 20px">
        </div>
        <div class="col-md-3">
          <img src="{!! asset('public/images/Promo/Bimbel_Online-01.png') !!}" style="border-radius: 5px;margin-bottom: 20px">
        </div>
        <div class="col-md-3">
          <img src="{!! asset('public/images/Promo/Bimbel_Private-01.png') !!}" style="border-radius: 5px;margin-bottom: 20px">
        </div>
        <div class="col-md-3">
          <img src="{!! asset('public/images/Promo/Sewa_Gedung-01.png') !!}" style="border-radius: 5px;margin-bottom: 20px">
        </div>
        <div class="col-md-3">
          <img src="{!! asset('public/images/Promo/Bimbel_Online-01.png') !!}" style="border-radius: 5px;margin-bottom: 20px">
        </div>
        <div class="col-md-3">
          <img src="{!! asset('public/images/Promo/Sewa_Gedung-01.png') !!}" style="border-radius: 5px;margin-bottom: 20px">
        </div>
        <div class="col-md-3">
          <img src="{!! asset('public/images/Promo/Bimbel_Offline-01.png') !!}" style="border-radius: 5px;margin-bottom: 20px">
        </div>
        <div class="col-md-3">
          <img src="{!! asset('public/images/Promo/Bimbel_Private-01.png') !!}" style="border-radius: 5px;margin-bottom: 20px">
        </div>
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
        <p>Semua yang kamu butuh kan ada di kami</p>
      </center>
    </div>

    <div class="col-md-4">
      <center>
        <img src="{!! asset('public\assets\images\icon\PlusPermataMall\Pembayaran mudah,aman,dan cepat.png') !!}">
        <hr>
        <p>Pembayaran mudah, cepat, dan aman</p>
      </center>
    </div>

    <div class="col-md-4">
      <center>
        <img src="{!! asset('public\assets\images\icon\PlusPermataMall\Promo.png') !!}">
        <hr>
        <p>Promo dan bonus menarik</p>
      </center>
    </div>

    <div class="col-md-4">
      <center>
        <img src="{!! asset('public\assets\images\icon\PlusPermataMall\Aman.png') !!}">
        <hr>
        <p>Aman dan terpercaya</p>
      </center>
    </div>

    <div class="col-md-4">
      <center>
        <img src="{!! asset('public\assets\images\icon\PlusPermataMall\Costumer Service.png') !!}">
        <hr>
        <p>Custumer service 1x24 jam yang tanggap</p>
      </center>
    </div>

    <div class="col-md-4">
      <center>
        <img src="{!! asset('public\assets\images\icon\PlusPermataMall\100.png') !!}">
        <hr>
        <p>Jaminan 100% aman</p>
      </center>
    </div>
  
  </div>
</div>
</div>
@endsection
@section('script')
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/rangeslider.js/2.3.2/rangeslider.min.css">
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/rangeslider.js/2.3.2/rangeslider.min.js"></script>


<script type="text/javascript">
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
</style>
@endsection
