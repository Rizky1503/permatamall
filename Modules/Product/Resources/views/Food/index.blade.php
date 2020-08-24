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
<div class="food-search">
  <div class="container">
    <div class="food-search-kotak">
      <form method="get" action="">
        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label for="email">Pilih Kategori</label>
              <input type="email" class="form-control" id="email">
            </div>
          </div>                      
          <div class="col-md-7">
            <div class="form-group">
              <label for="email">Pilih </label>
              <input type="email" class="form-control" id="email">
            </div>
          </div>                      
          <div class="col-md-1">
            <div class="form-group">
              <label for="email">&nbsp;</label>
              <button class="btn btn-primary">Cari Barang</button>
            </div>
          </div>                      
        </div>
      </form>
    </div> 
  </div>
</div>
@endsection
@section('script')
<style type="text/css">
  .food-search{
    background-color:#00000099;
    padding-top: 20px;
    padding-bottom: 20px;
    margin-top: -130px;
    z-index: 999999;
    position: sticky;
  }

  .food-search-kotak{
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
</style>
@endsection
