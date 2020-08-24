@extends('examppermata::layouts.master2')

@section('content')

<link rel="stylesheet" href="http://localhost/permatamall/public/assets/css/jquery.modal.min.css" />

<div style="background-image: url('{!! asset('public/images/sidebar/examp.png') !!}'); background-size: cover; text-align: center;font-size: 40px;font-weight: bold;color: #fff; padding-bottom: 80px; padding-top: 80px;">
    LATIHAN UJI COBA {{$kelas}}
</div>
<div class="container" style="padding-bottom: 80px; padding-top: 50px;">          
  <div class="row"> 
    <div class="col-md-12">
      <div class="row">
        @foreach($tingkat->data as $key => $value)
        <div class="col-xs-12 col-sm-6 col-md-3" style="cursor: pointer;">
            <a href="{{ route('FreeExamp.select_matapelajaran',encrypt([$kelas,$value->tingkat])) }}">
            <div class="image-flip" ontouchstart="this.classList.toggle('hover');" style="border: 1px solid grey; border-radius: 16px; box-shadow: 0px 0px 5px 0px grey; margin-bottom: 20px">
                <div class="mainflip">
                    <div class="frontside">
                        <div class="card">
                            <div class="card-body text-center">
                                <p><img class=" img-fluid" src="{{ ENV('APP_URL_API_RESOURCE').'mobile/bo/paket/gratis/'.$value->image_tingkat }}" alt="card image"></p>
                                <h4 class="card-title">{{ $value->tingkat }}</h4>
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
  </div>
</div>

<!-- @if($maksimal->data  != 'tidak bisa akses')
<div id="loadMe" class="modal" style="height: 600px; background: #f5f5dc00;"> 
      <img class=" img-fluid" src="{!! asset('public/images/bimbel-gratis/ujicoba.png') !!}" alt="card image" style="position: relative; top: -52px;">
      <div style="position: relative; top: -99px;">
        <h3 style="color: white;"><center>Uji Coba Habis</center></h3>
        <span style="color: white;">Masa uji coba telah habis maksimal uji coba 3 kelas, silahkan berlangganan sekarang</span>
      </div>
      <div style="position: relative; top: -78px;">
        <center>
          <a href="{{ route('FrontEnd.index')}}" class="btn btn-danger">Kembali</a>
          <a href="{{ route('ExampPermataBimbelOnline.getStarted')}}" class="btn btn-primary">Berlangganan</a>
        </center>
      </div>
</div>
@endif -->

<!-- Modal -->
<div class="modal fade-scale" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <center><div id="loading-dulu-process"></div></center>
      <div class="panel-body" id="loading-dulu-two-process"> 
        <div class="row">
          <div class="col-md-12">
            <span style="font-size: 18px;font-weight: bold;line-height: 2;">I. Informasi Test</span>          
            <p>Jumlah Soal : <span id="jumlah_soal_value"></span></p>        
            <!-- <p>Total Waktu Pengerjaan: <span id="total_waktu_value"></span></p> -->        
            <!-- <p>Total Silabus : <span id="total_silabus_value"></span></p>             -->
          </div>
          <div class="col-md-12">
            <span style="font-size: 18px;font-weight: bold;line-height: 2;">II. Keterangan</span>
            <br>
            selamat mengikuti latihan bimbel online
          </div>
        </div>        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="SourceProcess()">Konfirmasi</button>
      </div>
    </div>
  </div>
</div>

@endsection
@section('script')
<style>
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

  .btn-primary:hover,
  .btn-primary:focus {
      background-color: #108d6f;
      border-color: #108d6f;
      box-shadow: none;
      outline: none;
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
      border-radius: 0px;
  }

  .col-lg-1, .col-lg-10, .col-lg-11, .col-lg-12, .col-lg-2, .col-lg-3, .col-lg-4, .col-lg-5, .col-lg-6, .col-lg-7, .col-lg-8, .col-lg-9, .col-md-1, .col-md-10, .col-md-11, .col-md-12, .col-md-2, .col-md-3, .col-md-4, .col-md-5, .col-md-6, .col-md-7, .col-md-8, .col-md-9, .col-sm-1, .col-sm-10, .col-sm-11, .col-sm-12, .col-sm-2, .col-sm-3, .col-sm-4, .col-sm-5, .col-sm-6, .col-sm-7, .col-sm-8, .col-sm-9, .col-xs-1, .col-xs-10, .col-xs-11, .col-xs-12, .col-xs-2, .col-xs-3, .col-xs-4, .col-xs-5, .col-xs-6, .col-xs-7, .col-xs-8, .col-xs-9 {
    padding-right: 0px !important;
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

function functionKelas(response) {
  $('#loading-dulu').addClass('loader');
  $('#loading-dulu-two').addClass('loading-body');
  $('#matpel').html("<option value=''>Pilih Mata Pelajaran</option>");
  $('#accordion').html("");
  $.ajax({
    type: "GET",
    url: '{{ route("FreeExamp.mapel") }}',
    data: {
      id:response
    },
    success: function(responses){
      $('#loading-dulu').removeClass('loader');
      $('#loading-dulu-two').removeClass('loading-body');
      $('#matpel').html(responses);
     }
  });
}

function functionMapel(response) {
  $('#loading-dulu').addClass('loader');
  $('#loading-dulu-two').addClass('loading-body');  
  $('#accordion').html("");
  $.ajax({
    type: "GET",
    url: '{{ route("FreeExamp.silabus") }}',
    data: {
      kelas: $('#kelas').val(),
      id:response
    },
    success: function(responses){
      $('#loading-dulu').removeClass('loader');
      $('#loading-dulu-two').removeClass('loading-body');      
      $('#accordion').html(responses);
     }
  });
}


function confirmRequest(){
  var kelas         = $('#kelas').val();
  var matapelajaran = $('#matpel').val();
  var alldata       = $('#form-all').serialize();
  if (kelas == "") {
    swal({
      title: "Kelas Required",
      text: "Silahkan Pilih Kelas dahulu.",
      type: "info",
      icon: "info",
      buttons: false,
      timer: 1000
    }).then(name => {
      $('#kelas').focus();
    });

  }else if (matapelajaran == "") {
    swal({
      title: "Mata Pelajaran Required",
      text: "Silahkan Pilih Mata Pelajaran dahulu.",
      type: "info",
      icon: "info",
      buttons: false,
      timer: 1000
    }).then(name => {
      $('#matpel').focus();
    });

  }else{

    $('#loading-dulu').addClass('loader');
    $('#loading-dulu-two').addClass('loading-body');
    $.ajax({
      type: "GET",
      url: '{{ route("FreeExamp.confirm") }}',
      data: alldata,      
      success: function(responses){
        // informasi profile
        var profileUser = JSON.parse(responses[0].Information);

        // informasi test
        $('#jumlah_soal_value').html(profileUser.jumlahSoal + ' Butir Soal');
        $('#total_waktu_value').html(profileUser.TotalWaktu + ' Menit');
        $('#total_silabus_value').html(profileUser.total_silabus + ' Silabus Pembelajaran');


        $('#loading-dulu').removeClass('loader');
        $('#loading-dulu-two').removeClass('loading-body');      
        $('#myModal').modal({backdrop: 'static', keyboard: false}).show();
        window.onbeforeunload = function() {
           return "";
        };
      
      },
      progress: function(e) {
        if(e.lengthComputable) {
            var pct = (e.loaded / e.total) * 100;
        }
        //this usually happens when Content-Length isn't set
        else {
            console.warn('Content Length not reported!');
        }
      }
    });
  }  
}

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
      title:"Silahkan Berlangganan",
      text: "Untuk Mendapatkan Semua fitur",
      type: "info",
      icon: "info",
    })
}
</script>
@endsection