@extends('layouts.FrontEnd')

@section('content')
<!-- start slider -->
<div style="width: 100%; height: 220px; background-image: url('{!! asset('public/images/sidebar/privat.png') !!}');">
    <div class="container">
      <p style="font-size: 24px;color: #fff;font-weight: 600;margin-top: 40px;"></p>
    </div>
</div>
<!-- slider end -->
<div class="container">
  <div class="row">    
    <div class="col-md-12">
      <div class="permata-search" onclick="functionGetOverlay()" id="page_cari_halaman">
        <form action="{{ route('Bimbel.search') }}" method="get">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="usr">Tingkat:</label>
                <input type="hidden" name="jns_bimbel" value="Private">
                <select class="form-control select2" name="tingkat">
                  @foreach($tingkatList as $listTingkat)
                  <option value="{{ $listTingkat }}">{{ $listTingkat }}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="usr">Kota Lokasi Les Privat:</label>
                <select class="form-control select2" name="kota" required="required" onchange="functionGetLainya(this.value)">
                    <option value="">Pilih Kota</option>
                  @foreach($kotaList as $listKota)
                    <option value="{{ base64_encode($listKota) }}">{{ $listKota }}</option>
                  @endforeach
                    <option value="Lainya">Lainya</option>
                </select>
              </div>
            </div>            
            <div class="col-md-6" id="KotaLainya" style="display: none;">
              <div class="form-group">
                <label for="usr">Kota Lokasi Les Privat Lainya:</label>
                <input type="text" class="form-control" name="kota_lainya" id="kota_lainya">
              </div>
            </div>
            <div class="col-md-12" id="buttonCari">
              <div class="form-group">
                <button type="submit" class="btn btn-primary btn-lg" style="float: right;">Mendaftar Les Privat</button>
              </div>
            </div>
          </div>
        </form> 
      </div>
    </div>
  </div>
  @foreach($tingkatList as $listTingkat)
  <div style="margin-bottom: 60px; margin-top: 20px;">
    <span style="font-size: 24px;color: #56c174;font-weight: 600;">{{ $listTingkat }}</span>
    <div class="row">
      <div class="col-md-12">        
        <div class="row">
          <?php
            $matpel         = ENV('APP_URL_API').'web/homepage/private/'.$listTingkat;
            $MatpelList     = json_decode(file_get_contents($matpel));
          ?>
          @foreach($MatpelList as $litsMatpel)
          <div class="col-md-3">
            <div class="plan">
              <div class="titleContainer">
                <div class="title">{{ $litsMatpel }}</div>
              </div>
              <div class="infoContainer">
                <div class="p desc"><em>Silabus Pembelajaran.</em></div>
                <ul class="features">
                  <?php
                    $silabus         = ENV('APP_URL_API').'web/homepage/private/list/silabus/'.str_replace(' ', '%20', $listTingkat).'/'.str_replace(' ', '%20', $litsMatpel);
                    $ListSilabus     = json_decode(file_get_contents($silabus));
                  ?>
                  @foreach($ListSilabus as $silabuslist)
                  <li>{{ $silabuslist }}</li>         
                  @endforeach         
                </ul><a href="{{ route('Private.index') }}?jns_bimbel=Private&tingkat={{ $listTingkat }}&kota=R3VudW5nIEtpZHVs" class="selectPlan">Cari Guru {{ $listTingkat }}</a>
              </div>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
  @endforeach
</div>

@endsection
@section('script')
<style type="text/css">
.errors li{
  color: #fff;
  font-weight: bold;
}
.color_active{
  background: #e3edfd;
  font-weight: bold;
}  


@import url("https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800");


.plan {
  background: #f3f3f3;
  box-sizing: border-box;
  text-align: center;
  margin-bottom: 1em;
}
.plan .titleContainer {
  background-color: #f3f3f3;
  padding: 1em;
}
.plan .titleContainer .title {
  font-size: 1.45em;
  text-transform: uppercase;
  color: #56c174;
  font-weight: 700;
}
.plan .infoContainer {
  padding: 1em;
  color: #2d3b48;
  box-sizing: border-box;
}
.plan .infoContainer .price {
  font-size: 1.35em;
  padding: 1em 0;
  font-weight: 600;
  margin-top: 0;
  display: inline-block;
  width: 80%;
}
.plan .infoContainer .price p {
  font-size: 1.35em;
  display: inline-block;
  margin: 0;
}
.plan .infoContainer .price span {
  font-size: 1.0125em;
  display: inline-block;
}
.plan .infoContainer .desc {
  padding-bottom: 1em;
  border-bottom: 2px solid #f3f3f3;
  margin: 0 auto;
  width: 90%;
}
.plan .infoContainer .desc em {
  font-size: 1em;
  font-weight: 500;
}
.plan .infoContainer .features {
  font-size: 1em;
  list-style: none;
  padding-left: 0;
}
.plan .infoContainer .features li {
  padding: 0.5em;
}
.plan .infoContainer .selectPlan {
  border: 2px solid #56c174;
  padding: 0.75em 1em;
  border-radius: 2.5em;
  cursor: pointer;
  transition: all 0.25s;
  margin: 1em auto;
  box-sizing: border-box;
  max-width: 70%;
  display: block;
  font-weight: 700;
}
.plan .infoContainer .selectPlan:hover {
  background-color: #56c174;
  color: white;
}



</style>
<script type="text/javascript">
    function functionGetLainya(response){
      if (response == "Lainya") {
        $('#KotaLainya').show();
        $('#buttonCari').attr('class','col-md-6');
        $('#buttonCari').attr('style','margin-top:20px;');
        $('#kota_lainya').attr('required','required');
      }else{
        $('#KotaLainya').hide();
        $('#buttonCari').attr('class','col-md-12');
        $('#kota_lainya').removeAttr('required');        
      }
    }

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
