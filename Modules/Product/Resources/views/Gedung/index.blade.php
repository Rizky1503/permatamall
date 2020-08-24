@extends('layouts.FrontEnd')

@section('content')

<style>
.sort_harga-tertinggi{
  margin-right:123px;
}
.rangeslider__handle {
  width: 25px !important;
  height: 25px !important;
  bottom: 1px;
} 
.rangeslider--horizontal {
  height: 14px !important;
} 
.rangeslider--horizontal .rangeslider__handle {
  top: -6px !important;
}
.rangeslider__fill {
  background: #9ec6dc !important;
}
.rangeslider {
  background: #ffffff !important;
} 
.styled-checkbox+label {
  position: relative;
  cursor: pointer;
  padding: 0;
    /* display: block; */
}
.fa-star{
  color: #ff940e; 
}     
</style>
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
    <img src="https://static.tiket.photos/image/upload/v1565858059/banner/2019/08/15/d25afbd7-cb59-40b4-845c-dfda0b883b18-1565858057637-51f564e10ef4a457732d5f6b9188c710.jpg" alt="Los Angeles" style="width:100%;">
  </div>

  <div class="item">
    <img src="https://static.tiket.photos/image/upload/v1565782517/banner/2019/08/14/2025b30e-2b8c-4ec8-81ce-33b08ab06646-1565782515249-c6d16dc1f3379aed828d726d581eab9a.jpg" alt="Chicago" style="width:100%;">
  </div>

  <div class="item">
    <img src="https://static.tiket.photos/image/upload/v1565858059/banner/2019/08/15/d25afbd7-cb59-40b4-845c-dfda0b883b18-1565858057637-51f564e10ef4a457732d5f6b9188c710.jpg" alt="New york" style="width:100%;">
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
      <div class="col-md-5">
        <span style="font-size: 20px;font-weight: bold;">Temukan Gedung Terbaik</span>
      </div>
      
      <div class="col-md-12">
        <hr>
        <div class="row">
          <div class="col-md-9">
            <div class="form-group">
              <label for="usr">Nama Tempat kota atau provinsi:</label>
              <input type="email" class="form-control" name="email" value="">
            </div>

            <div class="forms-group">
              <div class="input-group date" data-date-format="dd.mm.yyyy">
                <input  type="text" class="form-control" placeholder="dd.mm.yyyy">
              <div class="input-group-addon" >
                <span class="glyphicon glyphicon-th"></span>
              </div>
              </div>
            </div>

          </div>
          <div class="col-md-3">
            <div class="form-group">
              <label for="usr">Kapasitas:</label>
              <input type="range" min="10" max="1000" step="10" value="300" data-orientation="horizontal">
            </div>
          </div>
        </div>
      </div>
    </div> 
  </div>
  <div class="conten-after-search">
  
  <div class="conten-after-search">
  <div class="row">
    <div class="col-md-3">
      <div class="sort-by">
        <div class="title-sort">
          <h3>Sort By</h3>
          <p>Mengurutkan berdasarkan pilihan anda</p>
        </div>
        <hr class="line" style="border-top: 1px solid #a4a7a9;"> 
        <form class="opsi-radio">
            <div class="radio">
              
              <input id="radio-1" class="sort_harga_tertinggi" name="sort_harga" type="radio" value="1" checked="" style="margin-left: -123px;">
              <label for="radio-1" class="radio-label">Harga Tertinggi</label>
            </div>
            <div class="radio" style="position: relative;right: -130px;top: -31px;">
              <input id="radio-1" class="radiosoting sort_harga-termurah" name="sort_harga" type="radio" value="1" style="margin-left: -123px;">
              <label for="radio-1" class="radio-label">Harga Termurah</label>
            </div> 
        </form> 
        <div class="form-group">
          <h4 style="margin-bottom:12px;">Harga Gedung</h4>
          <div class = "range">
          <input type="range" min="10" max="1000" step="10" value="0" data-orientation="horizontal">
             <b>RP. 10.000.000 - RP. 10.000.000.000</b>
          </div>
        </div>
        <div class="form-group">
          <h4 style="margin-bottom:12px;">Kapasitas Gedung</h4>
          <div class = "range">
          <input type="range" min="10" max="1000" step="10" value="0" data-orientation="horizontal">
             <b>100 kursi - 1000 kursi</b>
          </div>
        </div>
        <div class="form-group">
          <h4>Rating</h4>
          <div class="rating">
            <div>
              <input class="styled-checkbox search-rating" id="onestar" type="checkbox" value="5">
                <label for="onestar">
                  <span class="rating">
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                  </span>  
                </label>
            </div>
            <div>
              <input class="styled-checkbox search-rating" id="onestar" type="checkbox" value="4">
                <label for="onestar">
                  <span class="rating">
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star-o" aria-hidden="true"></i>
                  </span>  
                </label>
            </div>
            <div>
              <input class="styled-checkbox search-rating" id="onestar" type="checkbox" value="3">
                <label for="onestar">
                  <span class="rating">
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star-o" aria-hidden="true"></i>
                    <i class="fa fa-star-o" aria-hidden="true"></i>
                  </span>  
                </label>    
            </div>
            <div>
              <input class="styled-checkbox search-rating" id="onestar" type="checkbox" value="3">
                <label for="onestar">
                  <span class="rating">
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star-o" aria-hidden="true"></i>
                    <i class="fa fa-star-o" aria-hidden="true"></i>
                    <i class="fa fa-star-o" aria-hidden="true"></i>
                  </span>  
                </label>    
            </div>
            <div>
              <input class="styled-checkbox search-rating" id="onestar" type="checkbox" value="3">
                <label for="onestar">
                  <span class="rating">
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star-o" aria-hidden="true"></i>
                    <i class="fa fa-star-o" aria-hidden="true"></i>
                    <i class="fa fa-star-o" aria-hidden="true"></i>
                    <i class="fa fa-star-o" aria-hidden="true"></i>
                  </span>  
                </label>
              </div>      
            </div>
        </div>
      </div>
    </div>
    <div class="col-md-9">
      <br>
      <div id="carousel-example" class="carousel slide hidden-xs" data-ride="carousel">
        <!-- Wrapper for slides -->
                <div class="row">
                    <div class="col-md-4">
                      <article class="card">
                        <div class="thumb" style="background: url('{!! asset('public/images/Sketsa Gedung.png') !!}') no-repeat center;"></div>
                        <div class="infos">
                          <h2 class="title">Gedung Resepsi GRAHA DELIMA</h2>                
                          <div class="rateYo" style="margin-left: -5px;"></div>    
                          <br>                      
                          <span class="date">Rp. 2.000.000 - Rp. 13.000.000</span>
                        </div>
                      </article>
                    </div>  
                    <div class="col-md-4">
                      <article class="card">
                        <div class="thumb" style="background: url('{!! asset('public/images/Sketsa Gedung.png') !!}') no-repeat center;"></div>
                        <div class="infos">
                          <h2 class="title">Gedung Resepsi GRAHA DELIMA</h2>                
                          <div class="rateYo" style="margin-left: -5px;"></div>    
                          <br>                      
                          <span class="date">Rp. 2.000.000 - Rp. 13.000.000</span>
                        </div>
                      </article>
                    </div>  
                    <div class="col-md-4">
                      <article class="card">
                        <div class="thumb" style="background: url('{!! asset('public/images/Sketsa Gedung.png') !!}') no-repeat center;"></div>
                        <div class="infos">
                          <h2 class="title">Gedung Resepsi GRAHA DELIMA</h2>                
                          <div class="rateYo" style="margin-left: -5px;"></div>    
                          <br>                      
                          <span class="date">Rp. 2.000.000 - Rp. 13.000.000</span>
                        </div>
                      </article>
                    </div>  
                    <div class="col-md-4">
                      <article class="card">
                        <div class="thumb" style="background: url('{!! asset('public/images/Sketsa Gedung.png') !!}') no-repeat center;"></div>
                        <div class="infos">
                          <h2 class="title">Gedung Resepsi GRAHA DELIMA</h2>                
                          <div class="rateYo" style="margin-left: -5px;"></div>    
                          <br>                      
                          <span class="date">Rp. 2.000.000 - Rp. 13.000.000</span>
                        </div>
                      </article>
                    </div>
                    <div class="col-md-4">
                      <article class="card">
                        <div class="thumb" style="background: url('{!! asset('public/images/Sketsa Gedung.png') !!}') no-repeat center;"></div>
                        <div class="infos">
                          <h2 class="title">Gedung Resepsi GRAHA DELIMA</h2>                
                          <div class="rateYo" style="margin-left: -5px;"></div>    
                          <br>                      
                          <span class="date">Rp. 2.000.000 - Rp. 13.000.000</span>
                        </div>
                      </article>
                    </div>
                    <div class="col-md-4">
                      <article class="card">
                        <div class="thumb" style="background: url('{!! asset('public/images/Sketsa Gedung.png') !!}') no-repeat center;"></div>
                        <div class="infos">
                          <h2 class="title">Gedung Resepsi GRAHA DELIMA</h2>                
                          <div class="rateYo" style="margin-left: -5px;"></div>    
                          <br>                      
                          <span class="date">Rp. 2.000.000 - Rp. 13.000.000</span>
                        </div>
                      </article>
                    </div>
                    <div class="col-md-4">
                      <article class="card">
                        <div class="thumb" style="background: url('{!! asset('public/images/Sketsa Gedung.png') !!}') no-repeat center;"></div>
                        <div class="infos">
                          <h2 class="title">Gedung Resepsi GRAHA DELIMA</h2>                
                          <div class="rateYo" style="margin-left: -5px;"></div>    
                          <br>                      
                          <span class="date">Rp. 2.000.000 - Rp. 13.000.000</span>
                        </div>
                      </article>
                    </div>
                    <div class="col-md-4">
                      <article class="card">
                        <div class="thumb" style="background: url('{!! asset('public/images/Sketsa Gedung.png') !!}') no-repeat center;"></div>
                        <div class="infos">
                          <h2 class="title">Gedung Resepsi GRAHA DELIMA</h2>                
                          <div class="rateYo" style="margin-left: -5px;"></div>    
                          <br>                      
                          <span class="date">Rp. 2.000.000 - Rp. 13.000.000</span>
                        </div>
                      </article>
                    </div>  
                </div>
            </div>

      </div>
    </div>
  </div>
  
</div>

  </div>
  <br>
</div>
@endsection
@section('script')
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/rangeslider.js/2.3.2/rangeslider.min.css">
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/rangeslider.js/2.3.2/rangeslider.min.js"></script>
<script type="text/javascript">

    
    $('input[type="range"]').rangeslider({
      polyfill: false,
      // Callback function
    onInit: function() {},

// Callback function
onSlide: function(position, value) {},

// Callback function
onSlideEnd: function(position, value) {}
    });


    function functionGetOverlay(){
        $('#page_selain_cari_halaman').addClass("show");
        $('#page_cari_halaman').addClass("focus");
    }

    function functionPostOverlay(){
        $('#page_selain_cari_halaman').removeClass("show");
        $('#page_cari_halaman').removeClass("focus");
    }

    $('.input-group.date').datepicker({format: "dd.mm.yyyy"}); 
    
</script>
@endsection
