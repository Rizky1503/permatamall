@extends('examppermata::layouts.master2')

@section('content')
<link rel="stylesheet" href="http://localhost/permatamall/public/assets/css/jquery.modal.min.css" />

<div style="background-image: url('{!! asset('public/images/sidebar/banner_examp.png') !!}'); background-size: cover; text-align: center;font-size: 40px;font-weight: bold;color: #209841; padding-bottom: 80px; padding-top: 80px;">
    LATIHAN UJI COBA
</div>
<div class="container" style="padding-bottom: 80px; padding-top: 50px;">           
  @if($ListProd_user)
    <div class="row">
    <div class="col-xs-12 ">
      <nav>
        <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
          <a class="nav-item nav-link active alwaysactive" id="nav-kelaskamu-tab" data-toggle="tab" href="#nav-kelaskamu" role="tab" aria-controls="nav-kelaskamu" aria-selected="false" autofocus>KELAS YANG KAMU PILIH</a>
        </div>
      </nav>
      <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
        <div class="tab-pane fade active in" id="nav-kelaskamu" role="tabpanel" aria-labelledby="nav-kelaskamu-tab">
          <div class="row">
            @foreach ($ListProd_user as $key => $value)
            <div class="col-xs-12 col-sm-6 col-md-4">
             <a href="{{ route('FreeExamp.select_tingkat',encrypt($value->kelas)) }}">
                <div class="image-flip" ontouchstart="this.classList.toggle('hover');" style="border: 1px solid grey; border-radius: 16px; box-shadow: 0px 0px 5px 0px grey; margin-bottom: 20px">
                    <div class="mainflip">
                        <div class="frontside">
                            <div class="card">
                                <div class="card-body text-center">
                                    <p><img class=" img-fluid" src="{!! asset('public/images/bimbel-gratis/'.$value->image_kelas) !!}" alt="card image"></p>
                                    <h4 class="card-title">{{ $value->kelas }}</h4>
                                    <!-- <p class="card-text">This is basic card with image on top, title, description and button.</p> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
              </a>
            </div>
            @endforeach
          </div>  
        </div>
        <div style="border: 1px solid #cecccc; border-radius: 5px; padding: 20px; background-color: #eaeaea;">
          <span style="font-size: 20px; color: green;"><a href="{{route('ExampPermataBimbelOnline.getStarted')}}"><center>Dapatkan materi lengkap setiap kelas, <span style="font-size: 20px; color: red;">klik disini</span></center></a></span>
        </div>
      </div>  
    </div>
  </div><br>
  @else

  @endif
  
  <div class="row">
    <div class="col-xs-12 ">
      <nav>
        <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
          <a class="nav-item nav-link active" id="nav-kelas-tab" data-toggle="tab" href="#nav-kelas" role="tab" aria-controls="nav-kelas" aria-selected="true" autofocus onclick="functionRemoveClass(this.id)">KELAS</a>
          <!-- <a class="nav-item nav-link" id="nav-ktsp-tab" data-toggle="tab" href="#nav-ktsp" role="tab" aria-controls="nav-ktsp" aria-selected="false">KTSP</a> -->
          <a class="nav-item nav-link" id="nav-2013-tab" data-toggle="tab" href="#nav-2013" role="tab" aria-controls="nav-2013" aria-selected="false" onclick="functionRemoveClass(this.id)">KURIKULLUM 2013</a>
          <!-- <a class="nav-item nav-link" id="nav-2013-revisi-tab" data-toggle="tab" href="#nav-2013-revisi" role="tab" aria-controls="nav-2013-revisi" aria-selected="false">KURIKULLUM 2013 REVISI</a>  -->
        </div>
      </nav>
      <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
        <div class="tab-pane fade active in" id="nav-kelas" role="tabpanel" aria-labelledby="nav-kelas-tab">
          @foreach ($ListProd->data as $key => $value)
            <div class="row"> 
              @foreach ($value->Kelas as $key => $kelas)
                <div class="col-xs-12 col-sm-6 col-md-3">
                  @if(count($ListProd_user) >= $ListProd->length_access)
                    <a onclick="alert()" style="cursor: pointer;">
                  @else
                    <a href="{{ route('FreeExamp.select_tingkat',encrypt($kelas->kelas)) }}">
                  @endif                  
                  <div class="image-flip" ontouchstart="this.classList.toggle('hover');" style="border: 1px solid grey; border-radius: 16px; box-shadow: 0px 0px 5px 0px grey; margin-bottom: 20px">
                      <div class="mainflip">
                          <div class="frontside">
                              <div class="card">
                                  <div class="card-body text-center">
                                      <p><img class=" img-fluid" src="{!! asset('public/images/bimbel-gratis/'.$kelas->image_kelas) !!}" alt="card image"></p>
                                      <h4 class="card-title">{{ $kelas->kelas }}</h4>
                                      <!-- <p class="card-text">This is basic card with image on top, title, description and button.</p> -->
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>                  
                  </a>                  
                </div>
              @endforeach 
            </div>
          @endforeach
        </div>
        <!-- <div class="tab-pane fade" id="nav-ktsp" role="tabpanel" aria-labelledby="nav-ktsp-tab">
         <div class="row">
           <div class="col-md-12">
             <div class="row">
               <div class="col-md-4">
                  <center><h3>SD</h3></center><hr>
                  <p class="matapelajaran">- Matematika</p>
                  <p class="matapelajaran">- Bahasa Indonesia</p>
                  <p class="matapelajaran">- Bahasa Inggris</p>
               </div>
               <div class="col-md-4">
                  <center><h3>SMP</h3></center><hr>
                  <p class="matapelajaran">- Matematika</p>
                  <p class="matapelajaran">- Bahasa Indonesia</p>
                  <p class="matapelajaran">- Bahasa Inggris</p>
                  <p class="matapelajaran">- IPA Biologi</p>
                  <p class="matapelajaran">- IPA Fisika</p>
               </div>
               <div class="col-md-4">
                  <center><h3>SMA</h3></center><hr>
                  <p class="matapelajaran">- Matematika</p>
                  <p class="matapelajaran">- Bahasa Indonesia</p>
                  <p class="matapelajaran">- Bahasa Inggris</p>
                  <p class="matapelajaran">- IPA Fisika</p>
                  <p class="matapelajaran">- IPA Kimia</p>
                  <p class="matapelajaran">- IPA Biologi</p>
                  <p class="matapelajaran">- IPS Sejarah</p>
                  <p class="matapelajaran">- IPS Ekonomi</p>
                  <p class="matapelajaran">- IPS Sosiologi</p>
                  <p class="matapelajaran">- IPS Geografi</p>
               </div>
             </div>
           </div>
         </div>
        </div> -->
        <div class="tab-pane fade" id="nav-2013" role="tabpanel" aria-labelledby="nav-2013-tab">
          <div class="pricing-table group">
            <div class="block business fl">
                <h2 class="title"></h2>
                <div class="content">
                    <p class="price">
                        <span style="color: white;position: relative;bottom: -11px;">SD</span>
                    </p>
                    <p class="hint"></p>
                </div>
                <ul class="features" style="height: 609px;border: 1px solid #efefef;">
                    <li style="font-size: 20px;"> - Matematika</li>
                    <li style="font-size: 20px;"> - Bahasa Indonesia</li>
                    <li style="font-size: 20px;"> - Bahasa Inggris</li>
                    <li style="font-size: 20px;"> - IPA</li>
                    
                </ul>
                <div class="pt-footer">
                    <p style="color: #f0f8ff00;">Permatamall</p>
                </div>
            </div>
            <div class="block professional fl">
              <h2 class="title"></h2>
              <div class="content">
                  <p class="price">
                      <span style="color: white;position: relative;bottom: -11px;">SMP</span>
                  </p>
                  <p class="hint"></p>
              </div>
              <ul class="features" style="height: 609px;border: 1px solid #efefef;">
                  <li style="font-size: 20px;">- Matematika</li>
                  <li style="font-size: 20px;">- Bahasa Indonesia</li>
                  <li style="font-size: 20px;">- Bahasa Inggris</li>
                  <li style="font-size: 20px;">- IPA</li>
                  <li style="font-size: 20px;">- IPS</li>
              </ul>
              <div class="pt-footer">
                  <p style="color: #f0f8ff00;">Permatamall</p>
              </div>
            </div>
            <div class="block personal fl">
              <h2 class="title"></h2>
              <div class="content">
                  <p class="price">
                      <span style="color: white;position: relative;bottom: -11px;">SMA</span>
                  </p>
                  <p class="hint"></p>
              </div>
              <ul class="features" style="border: 1px solid #efefef;">
                  <li style="font-size: 20px;">- Matematika</li>
                  <li style="font-size: 20px;">- Bahasa Indonesia</li>
                  <li style="font-size: 20px;">- Bahasa Inggris</li>
                  <li style="font-size: 20px;">- IPA Fisika</li>
                  <li style="font-size: 20px;">- IPA Kimia</li>
                  <li style="font-size: 20px;">- IPA Biologi</li>
                  <li style="font-size: 20px;">- IPS Sejarah</li>
                  <li style="font-size: 20px;">- IPS Ekonomi</li>
                  <li style="font-size: 20px;">- IPS Sosiologi</li>
                  <li style="font-size: 20px;">- IPS Geografi</li>
              </ul>
              <div class="pt-footer">
                  <p style="color: #f0f8ff00;">Permatamall</p>
              </div>
            </div>
          </div>                
        </div>
        <!-- <div class="tab-pane fade" id="nav-2013-revisi" role="tabpanel" aria-labelledby="nav-2013-revisi-tab">
          <div class="row">
           <div class="col-md-12">
             <div class="row">
               <div class="col-md-4">
                  <center><h3>SD</h3></center><hr>
                  <p class="matapelajaran">- Matematika</p>
                  <p class="matapelajaran">- Bahasa Indonesia</p>
                  <p class="matapelajaran">- Bahasa Inggris</p>
               </div>
               <div class="col-md-4">
                  <center><h3>SMP</h3></center><hr>
                  <p class="matapelajaran">- Matematika</p>
                  <p class="matapelajaran">- Bahasa Indonesia</p>
                  <p class="matapelajaran">- Bahasa Inggris</p>
                  <p class="matapelajaran">- IPA</p>
               </div>
               <div class="col-md-4">
                  <center><h3>SMA</h3></center><hr>
                  <p class="matapelajaran">- Matematika</p>
                  <p class="matapelajaran">- Matematika Peminatan</p>
                  <p class="matapelajaran">- Bahasa Indonesia</p>
                  <p class="matapelajaran">- Bahasa Inggris</p>
                  <p class="matapelajaran">- IPA Fisika</p>
                  <p class="matapelajaran">- IPA Kimia</p>
                  <p class="matapelajaran">- IPA Biologi</p>
                  <p class="matapelajaran">- IPS Sejarah</p>
                  <p class="matapelajaran">- IPS Sejarah Peminatan</p>
                  <p class="matapelajaran">- IPS Ekonomi</p>
                  <p class="matapelajaran">- IPS Sosiologi</p>
                  <p class="matapelajaran">- IPS Geografi</p>
               </div>
             </div>
           </div>
         </div>
        </div> -->
      </div>  
    </div>
  </div>
</div>


@endsection
@section('script')

<style type="text/css">
  /*
  Inspired by the dribble shot http://dribbble.com/shots/1285240-Freebie-Flat-Pricing-Table?list=tags&tag=pricing_table
  */

  /*--------- Font ------------*/
  @import url(https://fonts.googleapis.com/css?family=Droid+Sans);
  @import url(http://weloveiconfonts.com/api/?family=fontawesome);
  /* fontawesome */
  [class*="fontawesome-"]:before {
    font-family: 'FontAwesome', sans-serif;
  }
  * {
      margin: 0;
      padding: 0;
      border: 0;
      font-size: 100%;
      font: inherit;
      vertical-align: baseline;
      -webkit-box-sizing: border-box;
      -moz-box-sizing: border-box;
      box-sizing: border-box;
  }
  /*------ utiltity classes -----*/
  .fl{ float:left; }
  .fr{ float: right; }
  /*its also known as clearfix*/
  .group:before,
  .group:after {
      content: "";
      display: table;
  } 
  .group:after {
      clear: both;
  }
  .group {
      zoom: 1;  /*For IE 6/7 (trigger hasLayout) */
  }

  .pricing-table {
      text-align: center;
      padding-right: 0;
  }
  .pricing-table .heading{
      color: #9C9E9F;
      text-transform: uppercase;
      font-size: 1.3rem;
      margin-bottom: 4rem;
  }
  .block{
      width: 30%;    
      margin: 0 15px;
      overflow: hidden;
      -webkit-border-radius: 5px;
      -moz-border-radius: 5px;
      border-radius: 5px;    
  /*    border: 1px solid red;*/
  }
  /*Shared properties*/
  .title,.pt-footer{
      color: #FEFEFE;
      text-transform: capitalize;
      line-height: 2.5;
      position: relative;
  }
  .content{
      position: relative;
      color: #FEFEFE;
      padding: 20px 0 10px 0;
  }
  /*arrow creation*/
  .content:after, .content:before,.pt-footer:before,.pt-footer:after {
    top: 100%;
    left: 50%;
    border: solid transparent;
    content: " ";
    height: 0;
    width: 0;
    position: absolute;
    pointer-events: none;
  }
  .pt-footer:after,.pt-footer:before{
      top:0;
  }
  .content:after,.pt-footer:after {
    border-color: rgba(136, 183, 213, 0); 
    border-width: 5px;
    margin-left: -5px;
  }
  /*/arrow creation*/
  .price{
      position: relative;
      display: inline-block;
      margin-bottom: 0.625rem;
  }
  .price span{    
      font-size: 6rem;
      letter-spacing: 8px;
      font-weight: bold;        
  }
  .price sup{
      font-size: 1.5rem;    
      position: absolute;    
      top: 12px;
      left: -12px;
  }
  .hint{
      font-style: italic;
      font-size: 0.9rem;
  }
  .features{
      list-style-type: none;    
      background: #FFFFFF;
      text-align: left;
      color: #9C9C9C;
      padding:30px 22%;
      font-size: 0.9rem;
  }
  .features li{
      padding:15px 0;
      width: 100%;
  }
  .features li span{
     padding-right: 0.4rem; 
  }
  .pt-footer{
      font-size: 0.95rem;
      text-transform: capitalize;
  }

  /*PERSONAL*/
  .personal .title{        
      background: #78CFBF;    
  }
  .personal .content,.personal .pt-footer{
      background: #82DACA;
  }
  .personal .content:after{ 
    border-top-color: #82DACA;  
  }
  .personal .pt-footer:after{
      border-top-color: #FFFFFF;
  }
  /*PROFESSIONAL*/
  .professional .title{
      background: #3EC6E0;
  }
  .professional .content,.professional .pt-footer{
      background: #53CFE9;
  }
  .professional .content:after{ 
    border-top-color: #53CFE9;  
  }
  .professional .pt-footer:after{
      border-top-color: #FFFFFF;
  }
  /*BUSINESS*/
  .business .title{
      background: #E3536C;
  }
  .business .content,.business .pt-footer{
      background: #EB6379;
  }
  .business .content:after{ 
    border-top-color: #EB6379;  
  }
  .business .pt-footer:after {  
    border-top-color: #FFFFFF;  
  }
</style>

<style>
  .matapelajaran{
    font-size: 20px;
  }

  a.nav-item.nav-link.active {
      border: none;
      color: #fff;
      background: #3eb960 !important;
      border-radius: 0;
      padding: 10px;
      font-size: 20px;
  }

  a.nav-item.nav-link.alwaysactive {
      border: none;
      color: #fff;
      background: #3eb960 !important;
      border-radius: 0;
      padding: 10px;
      font-size: 20px;
  }


  .ps-main {
    background: #c7ffd6 !important;
  }

  .tab-content {
    min-height: 209px;
  }
  .modal {
      display: none;
      vertical-align: middle;
      position: relative;
      z-index: 2;
      max-width: 500px;
      box-sizing: border-box;
      width: 90%;
      background: #fff;
      padding: 15px 30px;
      -webkit-border-radius: 8px;
      -moz-border-radius: 8px;
      -o-border-radius: 8px;
      -ms-border-radius: 8px;
      border-radius: 8px;
       -webkit-box-shadow: 0 0 10px #0000; 
      -moz-box-shadow: 0 0 10px #0000;
      -o-box-shadow: 0 0 10px #0000;
      -ms-box-shadow: 0 0 10px #0000;
      box-shadow: 0 0 10px #0000;
      text-align: left;
  }
  .kelas {
    position: absolute;
    top: 28px;
    font-size: 20px;
    padding: 6px;
    color: #1f28cf;
    font-family: cursive;
  }

  .loader {
    border: 16px solid #f3f3f3;
    border-radius: 50%;
    position: absolute;
    left: 35%;
    bottom: 30%;
    z-index: 1;
    border-top: 16px solid #3498db;
    width: 120px;
    height: 120px;
    -webkit-animation: spin 2s linear infinite;
    animation: spin 2s linear infinite;
  }
  
  .loader-process {
    border: 16px solid #f3f3f3;
    border-radius: 50%;
    position: absolute;
    left: 40%;
    bottom: 40%;
    z-index: 1;
    border-top: 16px solid #3498db;
    width: 120px;
    height: 120px;
    -webkit-animation: spin 2s linear infinite;
    animation: spin 2s linear infinite;
  }

  /* Safari */
  @-webkit-keyframes spin {
    0% { -webkit-transform: rotate(0deg); }
    100% { -webkit-transform: rotate(360deg); }
  }

  @keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
  }

  .fade-scale {
    transform: scale(0);
    opacity: 0;
    -webkit-transition: all .25s linear;
    -o-transition: all .25s linear;
    transition: all .25s linear;
  }

  .fade-scale.in {
    opacity: 1;
    transform: scale(1);
  }   

  .modal-content {
    border-radius: 3px;
  }

  .loading-body{
    opacity: 0.1;
  }

  @import url('https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
  #team {
      background: #eee !important;
  }


  .btn-primary {
      color: #fff;
      background-color: #007b5e;
      border-color: #007b5e;
  }

  section {
      padding: 60px 0;
  }

  section .section-title {
      text-align: center;
      color: #007b5e;
      margin-bottom: 50px;
      text-transform: uppercase;
  }

  #team .card {
      border: none;
      background: #ffffff;
  }

/*  .image-flip:hover .backside,
  .image-flip.hover .backside {
      -webkit-transform: rotateY(0deg);
      -moz-transform: rotateY(0deg);
      -o-transform: rotateY(0deg);
      -ms-transform: rotateY(0deg);
      transform: rotateY(0deg);
      border-radius: .25rem;
  }

  .image-flip:hover .frontside,
  .image-flip.hover .frontside {
      -webkit-transform: rotateY(180deg);
      -moz-transform: rotateY(180deg);
      -o-transform: rotateY(180deg);
      transform: rotateY(180deg);
  }*/

  .mainflip {
      -webkit-transition: 1s;
      -webkit-transform-style: preserve-3d;
      -ms-transition: 1s;
      -moz-transition: 1s;
      -moz-transform: perspective(1000px);
      -moz-transform-style: preserve-3d;
      -ms-transform-style: preserve-3d;
      transition: 1s;
      transform-style: preserve-3d;
      position: relative;
  }

  .frontside {
      position: relative;
      -webkit-transform: rotateY(0deg);
      -ms-transform: rotateY(0deg);
      z-index: 2;
      margin-bottom: 30px;
  }

  .backside {
      position: absolute;
      top: 0;
      left: 0;
      background: white;
      -webkit-transform: rotateY(-180deg);
      -moz-transform: rotateY(-180deg);
      -o-transform: rotateY(-180deg);
      -ms-transform: rotateY(-180deg);
      transform: rotateY(-180deg);
      -webkit-box-shadow: 5px 7px 9px -4px rgb(158, 158, 158);
      -moz-box-shadow: 5px 7px 9px -4px rgb(158, 158, 158);
      box-shadow: 5px 7px 9px -4px rgb(158, 158, 158);
  }

  .frontside,
  .backside {
      -webkit-backface-visibility: hidden;
      -moz-backface-visibility: hidden;
      -ms-backface-visibility: hidden;
      backface-visibility: hidden;
      -webkit-transition: 1s;
      -webkit-transform-style: preserve-3d;
      -moz-transition: 1s;
      -moz-transform-style: preserve-3d;
      -o-transition: 1s;
      -o-transform-style: preserve-3d;
      -ms-transition: 1s;
      -ms-transform-style: preserve-3d;
      transition: 1s;
      transform-style: preserve-3d;
  }

  .frontside .card,
  .backside .card {
      min-height: auto;
  }

  .backside .card a {
      font-size: 18px;
      color: #007b5e !important;
  }

  .frontside .card .card-title,
  .backside .card .card-title {
      color: #007b5e !important;
  }

  .frontside .card .card-body img {
      width: 120px;
      height: 120px;
      border-radius: 50%;
  }

  .btn-primary {
      color: #fff;
      background-color: #41c866;
      border-color: #41c866;
  }



</style>

<script src="http://localhost/permatamall/public/assets/js/jquery.modal.min.js"></script>  
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>

<script type="text/javascript">
  function functionRemoveClass(responses) {
    $('.nav-link').removeClass('active');
    $('#'+responses).addClass('active');
  }

  $(document).ready(function() {
      $('#loadMe').modal({
        fadeDuration: 250,
        escapeClose: false,
      clickClose: false,
      showClose: false
      });
  });

(function($, window, undefined) {
    //is onprogress supported by browser?
    var hasOnProgress = ("onprogress" in $.ajaxSettings.xhr());

    //If not supported, do nothing
    if (!hasOnProgress) {
        return;
    }
    
    //patch ajax settings to call a progress callback
    var oldXHR = $.ajaxSettings.xhr;
    $.ajaxSettings.xhr = function() {
        var xhr = oldXHR.apply(this, arguments);
        if(xhr instanceof window.XMLHttpRequest) {
            xhr.addEventListener('progress', this.progress, false);
        }
        
        if(xhr.upload) {
            xhr.upload.addEventListener('progress', this.progress, false);
        }
        
        return xhr;
    };
})(jQuery, window);



function SourceProcess(){
  var alldata  = $('#form-all').serialize();
  $('#loading-dulu-process').addClass('loader-process');
  $('#loading-dulu-two-process').addClass('loading-body');
  $.ajax({
      type: "GET",
      url: '{{ route("FreeExamp.process") }}',
      data: alldata,      
      success: function(responses){
        $('#loading-dulu-process').removeClass('loader-process');
        $('#loading-dulu-two-process').removeClass('loading-body');  
        window.onbeforeunload = function() {
        };
        window.location.href = "{{ route('FreeExamp.ETest.index') }}";
      }
    });
}


function alert(){
  swal({
      title:"Maksimal 3 Kelas",
      text: "Sudah ada 3 kelas yang kamu pilih..",
      type: "warning",
      icon: "warning",
    })
}
</script>
@endsection