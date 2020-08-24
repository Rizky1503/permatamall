@extends('layouts.FrontEnd')
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/rangeslider.js/2.3.2/rangeslider.min.css">

<style>
.btn-success {
  float:right;
  margin-top:16px;
}
.line{
  border-left: 3px solid #4ab1ac;
  margin-right: 10px;
}
.content-bimbel{
  border: 1px solid #eee;
    overflow: hidden;
    padding: 10px;
    width: 100%;
    height: 313px;
    float: left;
    border-radius: 4px;
    margin-right: 8px;
    margin-bottom: 25px;    
    background: #ffffffff;
    box-shadow: 3px 3px #dcdbdb;
}
.content-price{
  font-weight: bold;
  font-size: 18px;
  padding-bottom: 6px;
}
.label-price{
  font-size: 14px;
  padding-top: 9px;
}
</style>
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
      <div class="col-md-12">
        <span style="font-size: 32px;font-weight: bold;">Temukan Bimbel Offline Favorit</span>
      </div>
      <div class="col-md-12">
        <hr>
        <form method="get" action="{{ route('Bimbel.search') }}">
          <div class="row">
            <div class="col-md-9">
              <label>Kota</label>
              <select class="form-control select2" style="width:100%;" name="kota" required="required">
                @foreach($kotaList as $listKota)
                <option value="{{ base64_encode($listKota) }}" @if($kota == $listKota) selected="selected" @endif>{{ $listKota }}</option>
                @endforeach
              </select>
            </div>          
            <div class="col-md-3">
              <button type="submit" class="btn btn-success btn-lg">Cari Bimbel</button>
            </div>
          </div>
        </form>
      </div>
    </div> 
  </div>
  <div class="conten-after-search">
    <h2><span class="line"></span>Masih Tahap Pengembangan</h2>
    <!-- <h2><span class="line"></span>Daftar Bimbel :</h2> -->
    <!-- <div class="row">
      <div class="col-md-12">
        <br>
        <div class="slide-daftar-bimbel">
          <ul class="list-content-bimbel">
            <div class="row">
              <div class="col-md-3">
                <li class="content-bimbel">
                  <div class="content-list-title">
                      <h3>
                          <span class="list-title-bold"></span>
                      </h3>
                  </div>
                  <div class="content-list-body">
                    <a href="http://localhost/permatamallfrontenddev/bimbel/test" class="image-list-home gaevent" data-gakategori="Homepage"data-gaaction="Click-Image-Promo-Mobil-Terpopuler-Homepage">
                      <div class="lazy content-list-image left" data-was-processed="true">
                          <img class="lazy image-list-home loaded" src="https://bimbel.siapsekolah.com/wp-content/uploads/job-manager-uploads/company_logo/2018/09/119.BALARAJA.jpg" alt="Primagama" title="Primagama" data-src="https://bimbel.siapsekolah.com/wp-content/uploads/job-manager-uploads/company_logo/2018/09/119.BALARAJA.jpg" data-was-processed="true">
                      </div>
                    </a>
                    <div class="content-list-price left">
                      <a href="http://localhost/permatamallfrontenddev/bimbel/test" class="image-list-home gaevent" title="http://localhost/permatamallfrontenddev/bimbel/test" data-galabel="http://localhost/permatamallfrontenddev/bimbel/test" data-gakategori="Homepage" data-gaaction="Click-Image-Promo-Mobil-Terpopuler-Homepage">
                        <div class="content-list-price-wrapper">
                            <div class="label-price">
                                Paket Mulai :                                                  
                            </div>
                            <div class="content-price">
                                Rp. 18.860.000                                                    
                            </div>
                        </div>
                        <div class="content-list-price-wrapper">
                            <div class="label-price">
                                Tersedia di :                                                   
                            </div>
                            <div class="content-price">
                                Jakarta, Bogor, Semarang, dll                                                    
                            </div>
                        </div>
                      </a>
                      <div class="content-list-price-wrapper">
                        <a href="http://localhost/permatamallfrontenddev/bimbel/test" class="image-list-home gaevent" title="http://localhost/permatamallfrontenddev/bimbel/test" data-galabel="http://localhost/permatamallfrontenddev/bimbel/test" data-gakategori="Homepage" data-gaaction="Click-Image-Promo-Mobil-Terpopuler-Homepage">
                        </a>
                        <div class="label-price">
                          <a href="http://localhost/permatamallfrontenddev/bimbel/test" class="image-list-home gaevent" title="http://localhost/permatamallfrontenddev/bimbel/test" data-galabel="http://localhost/permatamallfrontenddev/bimbel/test" data-gakategori="Homepage" data-gaaction="Click-Image-Promo-Mobil-Terpopuler-Homepage">
                          </a>
                          <a style="color:#2d948f;" href="http://localhost/permatamallfrontenddev/bimbel/test" class="tag-price">
                           <i class="fa fa-tag"></i> Lihat627 Promo
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>                  
                </li>
              </div>
              <div class="col-md-3">
                <li class="content-bimbel">
                  <div class="content-list-title">
                      <h3>
                          <span class="list-title-bold"></span>
                      </h3>
                  </div>
                  <div class="content-list-body">
                    <a href="http://localhost/permatamallfrontenddev/bimbel/test" class="image-list-home gaevent" data-gakategori="Homepage"data-gaaction="Click-Image-Promo-Mobil-Terpopuler-Homepage">
                      <div class="lazy content-list-image left" data-was-processed="true">
                          <img class="lazy image-list-home loaded" src="https://bimbel.siapsekolah.com/wp-content/uploads/job-manager-uploads/company_logo/2018/09/119.BALARAJA.jpg" alt="Primagama" title="Primagama" data-src="https://bimbel.siapsekolah.com/wp-content/uploads/job-manager-uploads/company_logo/2018/09/119.BALARAJA.jpg" data-was-processed="true">
                      </div>
                    </a>
                    <div class="content-list-price left">
                      <a href="http://localhost/permatamallfrontenddev/bimbel/test" class="image-list-home gaevent" title="http://localhost/permatamallfrontenddev/bimbel/test" data-galabel="http://localhost/permatamallfrontenddev/bimbel/test" data-gakategori="Homepage" data-gaaction="Click-Image-Promo-Mobil-Terpopuler-Homepage">
                        <div class="content-list-price-wrapper">
                            <div class="label-price">
                                Paket Mulai :                                                  
                            </div>
                            <div class="content-price">
                                Rp. 18.860.000                                                    
                            </div>
                        </div>
                        <div class="content-list-price-wrapper">
                            <div class="label-price">
                                Tersedia di :                                                   
                            </div>
                            <div class="content-price">
                                Jakarta, Bogor, Semarang, dll                                                    
                            </div>
                        </div>
                      </a>
                      <div class="content-list-price-wrapper">
                        <a href="http://localhost/permatamallfrontenddev/bimbel/test" class="image-list-home gaevent" title="http://localhost/permatamallfrontenddev/bimbel/test" data-galabel="http://localhost/permatamallfrontenddev/bimbel/test" data-gakategori="Homepage" data-gaaction="Click-Image-Promo-Mobil-Terpopuler-Homepage">
                        </a>
                        <div class="label-price">
                          <a href="http://localhost/permatamallfrontenddev/bimbel/test" class="image-list-home gaevent" title="http://localhost/permatamallfrontenddev/bimbel/test" data-galabel="http://localhost/permatamallfrontenddev/bimbel/test" data-gakategori="Homepage" data-gaaction="Click-Image-Promo-Mobil-Terpopuler-Homepage">
                          </a>
                          <a style="color:#2d948f;" href="http://localhost/permatamallfrontenddev/bimbel/test" class="tag-price">
                           <i class="fa fa-tag"></i> Lihat627 Promo
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>                  
                </li>
              </div>
              <div class="col-md-3">
                <li class="content-bimbel">
                  <div class="content-list-title">
                      <h3>
                          <span class="list-title-bold"></span>
                      </h3>
                  </div>
                  <div class="content-list-body">
                    <a href="http://localhost/permatamallfrontenddev/bimbel/test" class="image-list-home gaevent" data-gakategori="Homepage"data-gaaction="Click-Image-Promo-Mobil-Terpopuler-Homepage">
                      <div class="lazy content-list-image left" data-was-processed="true">
                          <img class="lazy image-list-home loaded" src="https://bimbel.siapsekolah.com/wp-content/uploads/job-manager-uploads/company_logo/2018/09/119.BALARAJA.jpg" alt="Primagama" title="Primagama" data-src="https://bimbel.siapsekolah.com/wp-content/uploads/job-manager-uploads/company_logo/2018/09/119.BALARAJA.jpg" data-was-processed="true">
                      </div>
                    </a>
                    <div class="content-list-price left">
                      <a href="http://localhost/permatamallfrontenddev/bimbel/test" class="image-list-home gaevent" title="http://localhost/permatamallfrontenddev/bimbel/test" data-galabel="http://localhost/permatamallfrontenddev/bimbel/test" data-gakategori="Homepage" data-gaaction="Click-Image-Promo-Mobil-Terpopuler-Homepage">
                        <div class="content-list-price-wrapper">
                            <div class="label-price">
                                Paket Mulai :                                                  
                            </div>
                            <div class="content-price">
                                Rp. 18.860.000                                                    
                            </div>
                        </div>
                        <div class="content-list-price-wrapper">
                            <div class="label-price">
                                Tersedia di :                                                   
                            </div>
                            <div class="content-price">
                                Jakarta, Bogor, Semarang, dll                                                    
                            </div>
                        </div>
                      </a>
                      <div class="content-list-price-wrapper">
                        <a href="http://localhost/permatamallfrontenddev/bimbel/test" class="image-list-home gaevent" title="http://localhost/permatamallfrontenddev/bimbel/test" data-galabel="http://localhost/permatamallfrontenddev/bimbel/test" data-gakategori="Homepage" data-gaaction="Click-Image-Promo-Mobil-Terpopuler-Homepage">
                        </a>
                        <div class="label-price">
                          <a href="http://localhost/permatamallfrontenddev/bimbel/test" class="image-list-home gaevent" title="http://localhost/permatamallfrontenddev/bimbel/test" data-galabel="http://localhost/permatamallfrontenddev/bimbel/test" data-gakategori="Homepage" data-gaaction="Click-Image-Promo-Mobil-Terpopuler-Homepage">
                          </a>
                          <a style="color:#2d948f;" href="http://localhost/permatamallfrontenddev/bimbel/test" class="tag-price">
                           <i class="fa fa-tag"></i> Lihat627 Promo
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>                  
                </li>
              </div>
              <div class="col-md-3">
                <li class="content-bimbel">
                  <div class="content-list-title">
                      <h3>
                          <span class="list-title-bold"></span>
                      </h3>
                  </div>
                  <div class="content-list-body">
                    <a href="http://localhost/permatamallfrontenddev/bimbel/test" class="image-list-home gaevent" data-gakategori="Homepage"data-gaaction="Click-Image-Promo-Mobil-Terpopuler-Homepage">
                      <div class="lazy content-list-image left" data-was-processed="true">
                          <img class="lazy image-list-home loaded" src="https://bimbel.siapsekolah.com/wp-content/uploads/job-manager-uploads/company_logo/2018/09/119.BALARAJA.jpg" alt="Primagama" title="Primagama" data-src="https://bimbel.siapsekolah.com/wp-content/uploads/job-manager-uploads/company_logo/2018/09/119.BALARAJA.jpg" data-was-processed="true">
                      </div>
                    </a>
                    <div class="content-list-price left">
                      <a href="http://localhost/permatamallfrontenddev/bimbel/test" class="image-list-home gaevent" title="http://localhost/permatamallfrontenddev/bimbel/test" data-galabel="http://localhost/permatamallfrontenddev/bimbel/test" data-gakategori="Homepage" data-gaaction="Click-Image-Promo-Mobil-Terpopuler-Homepage">
                        <div class="content-list-price-wrapper">
                            <div class="label-price">
                                Paket Mulai :                                                  
                            </div>
                            <div class="content-price">
                                Rp. 18.860.000                                                    
                            </div>
                        </div>
                        <div class="content-list-price-wrapper">
                            <div class="label-price">
                                Tersedia di :                                                   
                            </div>
                            <div class="content-price">
                                Jakarta, Bogor, Semarang, dll                                                    
                            </div>
                        </div>
                      </a>
                      <div class="content-list-price-wrapper">
                        <a href="http://localhost/permatamallfrontenddev/bimbel/test" class="image-list-home gaevent" title="http://localhost/permatamallfrontenddev/bimbel/test" data-galabel="http://localhost/permatamallfrontenddev/bimbel/test" data-gakategori="Homepage" data-gaaction="Click-Image-Promo-Mobil-Terpopuler-Homepage">
                        </a>
                        <div class="label-price">
                          <a href="http://localhost/permatamallfrontenddev/bimbel/test" class="image-list-home gaevent" title="http://localhost/permatamallfrontenddev/bimbel/test" data-galabel="http://localhost/permatamallfrontenddev/bimbel/test" data-gakategori="Homepage" data-gaaction="Click-Image-Promo-Mobil-Terpopuler-Homepage">
                          </a>
                          <a style="color:#2d948f;" href="http://localhost/permatamallfrontenddev/bimbel/test" class="tag-price">
                           <i class="fa fa-tag"></i> Lihat627 Promo
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>                  
                </li>
              </div>
              <div class="col-md-3">
                <li class="content-bimbel">
                  <div class="content-list-title">
                      <h3>
                          <span class="list-title-bold"></span>
                      </h3>
                  </div>
                  <div class="content-list-body">
                    <a href="http://localhost/permatamallfrontenddev/bimbel/test" class="image-list-home gaevent" data-gakategori="Homepage"data-gaaction="Click-Image-Promo-Mobil-Terpopuler-Homepage">
                      <div class="lazy content-list-image left" data-was-processed="true">
                          <img class="lazy image-list-home loaded" src="https://bimbel.siapsekolah.com/wp-content/uploads/job-manager-uploads/company_logo/2018/09/119.BALARAJA.jpg" alt="Primagama" title="Primagama" data-src="https://bimbel.siapsekolah.com/wp-content/uploads/job-manager-uploads/company_logo/2018/09/119.BALARAJA.jpg" data-was-processed="true">
                      </div>
                    </a>
                    <div class="content-list-price left">
                      <a href="http://localhost/permatamallfrontenddev/bimbel/test" class="image-list-home gaevent" title="http://localhost/permatamallfrontenddev/bimbel/test" data-galabel="http://localhost/permatamallfrontenddev/bimbel/test" data-gakategori="Homepage" data-gaaction="Click-Image-Promo-Mobil-Terpopuler-Homepage">
                        <div class="content-list-price-wrapper">
                            <div class="label-price">
                                Paket Mulai :                                                  
                            </div>
                            <div class="content-price">
                                Rp. 18.860.000                                                    
                            </div>
                        </div>
                        <div class="content-list-price-wrapper">
                            <div class="label-price">
                                Tersedia di :                                                   
                            </div>
                            <div class="content-price">
                                Jakarta, Bogor, Semarang, dll                                                    
                            </div>
                        </div>
                      </a>
                      <div class="content-list-price-wrapper">
                        <a href="http://localhost/permatamallfrontenddev/bimbel/test" class="image-list-home gaevent" title="http://localhost/permatamallfrontenddev/bimbel/test" data-galabel="http://localhost/permatamallfrontenddev/bimbel/test" data-gakategori="Homepage" data-gaaction="Click-Image-Promo-Mobil-Terpopuler-Homepage">
                        </a>
                        <div class="label-price">
                          <a href="http://localhost/permatamallfrontenddev/bimbel/test" class="image-list-home gaevent" title="http://localhost/permatamallfrontenddev/bimbel/test" data-galabel="http://localhost/permatamallfrontenddev/bimbel/test" data-gakategori="Homepage" data-gaaction="Click-Image-Promo-Mobil-Terpopuler-Homepage">
                          </a>
                          <a style="color:#2d948f;" href="http://localhost/permatamallfrontenddev/bimbel/test" class="tag-price">
                           <i class="fa fa-tag"></i> Lihat627 Promo
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>                  
                </li>
              </div>
            </div>
          </ul>
        </div>
      </div>
    </div> -->
  </div>
  <br>
</div>
@endsection
@section('script')
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/rangeslider.js/2.3.2/rangeslider.min.js"></script>
<script type="text/javascript">
  function functionGetMatpel(response) {
    $.ajax({
        type: "GET",
        url: '{{ route("Private.matpel") }}',
        data: {
          id:response
        },
        success: function(responses){
          $('#mata_pelajaran').html(responses);
         }
    });
  }

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
@endsection
