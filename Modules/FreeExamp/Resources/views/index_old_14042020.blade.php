@extends('examppermata::layouts.master2')

@section('content')
<div style="background-image: url('{!! asset('public/images/sidebar/examp.png') !!}'); background-size: cover; text-align: center;font-size: 40px;font-weight: bold;color: #fff; padding-bottom: 80px; padding-top: 80px;">
    Latihan
</div>
<div class="container" style="padding-bottom: 80px; padding-top: 50px;">          
  <div class="row"> 
    <div class="col-md-4">
      <div class="col-md-12">
        <div class="panel panel-default">
          <center><div id="loading-dulu"></div></center>
          <div class="panel-body" id="loading-dulu-two">
  	        <form method="post" enctype="multipart/form-data" id="form-all">
  	          <div class="form-group">
  	            <label for="email">Pilih Kelas:</label>
  	            <select class="form-control select2" name="kelas" onchange="functionKelas(this.value)" id="kelas">
  	              <option value="">Pilih Kelas</option>	 
                  @foreach($ListProd as $ListProdAll)
                  <option value="{{ $ListProdAll->kelas }}">{{ $ListProdAll->kelas }}</option>
                  @endforeach             
  	            </select>
  	          </div>
  	          <div class="form-group">
  	            <label for="email">Pilih Mata Pelajaran:</label>
  	            <select class="form-control select2" name="matpel" id="matpel" onchange="functionMapel(this.value)">
  	              <option value="">Pilih Mata Pelajaran</option>
  	            </select>
  	          </div>
  	          <div class="form-group" style="display: none;">
  	            <label for="email">Topik Pembelajaran:</label>
  	            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">                                
  	            </div>
  	          </div>            
  	          <div class="form-group">
  	            <button type="button" class="btn btn-primary" style="float: right;" onclick="confirmRequest()">Mulai Latihan</button>
  	          </div>
  	        </form>      
          </div>
        </div>
      </div>

      <div class="col-md-12"> 
        <div class="panel panel-default">
          <center><div id="loading-dulu"></div></center>
            <a href="{{ route('FreeExamp.video_langganan') }}" style="position: relative; left: 98px;">
              <img src="{!! asset('public/assets/images/icon/examp/video.png') !!}" class="image-icon-examp">
              <p style="margin-top: 10px; font-weight: bold;">Video Pembahasan</p>
            </a>
        </div>
      </div>
    </div> 
    <div class="col-md-8">
      <div class="row">
          <div class="col-md-12">    
            <div class="panel panel-default">
              <div class="panel-body" style="padding: 8px; text-align: center;"> 
              <center><h4><b>Materi Permata Bimbel Online</b></h4></center>
              <hr>      
                <div style="width: 25%; float: left;">
                  <a onclick="alert()" style="cursor: pointer;">
                    <img src="{!! asset('public/assets/images/icon/examp/laporan.png') !!}" class="image-icon-examp">
                    <p style="margin-top: 10px; font-weight: bold;">Saran & Nilai</p>
                  </a>
                </div>
                <div style="width: 25%; float: left;">
                  <a onclick="alert()" style="cursor: pointer;">
                    <img src="{!! asset('public/assets/images/icon/examp/nilai.png') !!}" class="image-icon-examp">
                    <p style="margin-top: 10px; font-weight: bold;">Pembahasan</p>
                  </a>
                </div>
                <div style="width: 25%; float: left; cursor: pointer">
                  <a onclick="alert()" style="cursor: pointer;" >
                    <img src="https://resource.permatamall.com/api/v1/mobile/icon/bo/siap-un1.png" class="image-icon-examp">
                    <p style="margin-top: 10px; font-weight: bold;">Siap UN</p>
                  </a>
                </div>
                 <div style="width: 25%; float: left; cursor: pointer">
                  <a onclick="alert()" style="cursor: pointer;">
                    <img src="{!! asset('public/assets/images/icon/examp/bedah-materi.png') !!}" class="image-icon-examp">
                    <p style="margin-top: 10px; font-weight: bold;">Pendalaman Materi</p>
                  </a>
                </div>
              </div>
            </div>          
          </div>
          <div class="col-md-12">    
            <div class="panel panel-default">
              <div class="panel-body" style="padding: 8px; min-height: 275px;">       
                <p>
                  Halo sobat <b>Permata Bimbel</b>, selamat datang di marketplace pendidikan <a href="{{ route('FrontEnd.index') }}">permatamall.com</a>, anda berada di marketplace pendidikan terbaru di Indonesia. <strong>Produk Bimbel Online Gratis</strong> ini sebagai perkenalan bagi kalian yang mau mencoba Latihan soal-soal Gratis. Silahkan mendaftar <strong>Bimbel Online</strong> yang sedang dalam masa promosi. Selamat mencoba. Terimakasih sudah berkunjung.
                </p>
                <p>
                  Produk <a href="{{ route('FrontEnd.index') }}">permatamall.com</a> diantaranya: <b>Bimbel Online,  Les Privat,  Belanja (Jual-Beli),  Travel (Tur, Tiket, Hiburan), dll.</b>
                </p>
                <p>Selamat mencoba latihan soal-soal gratis ya....</p>
              </div>
            </div>          
          </div>
      </div>      
    </div>          
  </div>
</div>

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
</style>
<script type="text/javascript">

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
  var alldata       = $('#form-all').serialize();
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