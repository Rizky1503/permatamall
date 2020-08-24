@extends('examppermata::layouts.master2')

@section('content')
<div style="background-image: url('{!! asset('public/images/sidebar/examp.png') !!}'); background-size: cover; text-align: center;font-size: 40px;font-weight: bold;color: #fff; padding-bottom: 80px; padding-top: 80px;">
    Tes Persiapan dan Latihan
</div>
<div class="container" style="padding-bottom: 80px; padding-top: 50px;">          
  <div class="row"> 
    <div class="col-md-4">
      <div class="panel panel-default">
        <div class="panel-body" style="border-bottom: 1px solid #f5f5f5; padding: 15px 15px 1px 15px;">       
          <div class="form-group" style="margin-bottom: 2px;">
            <label for="email">Nama:</label> <br> <span> {{ $nama_user ?? '' }} </span>
          </div>
          @if($terakhir == "Belum Ada Tes")
          @else
          <div class="form-group" style="margin-bottom: 2px;">            
            <label for="email">Terakhir Akses:</label> 
            <br>
            <span>Tingkat : {{ $terakhir->kelas ?? '' }}</span>
            <br>
            <span>Mata Pelajaran : {{ $terakhir->matpel ?? '' }}</span>
            <br>
            <span>Tanggal : {{ \Carbon\Carbon::parse($data->created_at ?? '')->format('d F Y H:i:s') }}</span>
            <br>
            <span>Nilai : {{ $data->total_nilai ?? '-' }}</span>
          </div>
          @endif
          @if($status == "Mulai")
          <div class="form-group" style="margin-bottom: 2px;">
            <div class="alert alert-warning" style="padding: 10px;">
              Test Anda masih belum selesai,<a href=""><b>Selesaikan sekarang</b></a>
            </div>
          </div>
          @endif
        </div>         
        <center><div id="loading-dulu"></div></center>
        <div class="panel-body" id="loading-dulu-two">
          @if($status == "Mulai")
          <a href="{{ route('ExampPermata.ETest.index') }}" class="btn btn-primary">Lanjutkan Tes yang tertunda</a>
          @else
            <form method="post" enctype="multipart/form-data" id="form-all">
              <div class="form-group">
                <label for="email">Pilih Kelas:</label>
                <select class="form-control select2" name="kelas" onchange="functionKelas(this.value)" id="kelas">
                  <option value="">Pilih Kelas</option>
                  @foreach($ListProd as $ListProdAll)
                  <option value="{{ $ListProdAll }}">{{ $ListProdAll }}</option>
                  @endforeach
                </select>
              </div>
              <div class="form-group">
                <label for="email">Pilih Mata Pelajaran:</label>
                <select class="form-control select2" name="matpel" id="matpel" onchange="functionMapel(this.value)">
                  <option value="">Pilih Mata Pelajaran</option>
                </select>
              </div>
              <div class="form-group">
                <label for="email">Topik Pembelajaran:</label>
                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">                                
                </div>
              </div>            
              <div class="form-group">
                <button type="button" class="btn btn-primary" style="float: right;" onclick="confirmRequest()">Mulai Test</button>
              </div>
            </form>
          @endif          
        </div>
       </div>
    </div> 
    <div class="col-md-8">
      <div class="row">
          <div class="col-md-12">    
            <div class="panel panel-default">
              <div class="panel-body" style="padding: 8px; text-align: center;">       
                <div style="width: 30%; float: left;">
                  <a href="">
                    <img src="{!! asset('public/assets/images/icon/examp/user.png') !!}" class="image-icon-examp">
                    <p style="margin-top: 10px; font-weight: bold;">Profil</p>
                  </a>
                </div>
                <div style="width: 30%; float: left;">
                  <a href="{{ route('ExampPermata.Saran.index') }}">
                    <img src="{!! asset('public/assets/images/icon/examp/laporan.png') !!}" class="image-icon-examp">
                    <p style="margin-top: 10px; font-weight: bold;">Saran & Nilai</p>
                  </a>
                </div>
                <div style="width: 30%; float: left;">
                  <a href="{{ route('ExampPermata.Pembahasan.index') }}">
                    <img src="{!! asset('public/assets/images/icon/examp/nilai.png') !!}" class="image-icon-examp">
                    <p style="margin-top: 10px; font-weight: bold;">Pembahasan</p>
                  </a>
                </div>
              </div>
            </div>          
          </div>
      </div>
      <span style="font-size: 18px;font-weight: bold;">Produk lainya</span>
      <div class="row" style="margin-top: 10px;">
        <div class="col-md-12">    
          <div class="panel panel-default">
            <div class="panel-body" style="padding: 8px; text-align: center;">       
              <div style="width: 50%; float: left;">
                <a href="{{ route('Private.List') }}">
                  <img src="{!! asset('public/assets/images/icon/icon/Privat.png') !!}" class="image-icon-examp">
                  <p style="margin-top: 10px; font-weight: bold;">Les Privat</p>
                </a>
              </div>
              <div style="width: 50%; float: left;">
                <a href="{{ route('Belanja.index') }}">
                  <img src="{!! asset('public/assets/images/icon/icon/Daftar Bimbel Online.png') !!}" class="image-icon-examp">
                  <p style="margin-top: 10px; font-weight: bold;">Belanja</p>
                </a>
              </div>
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
          <div class="col-md-6">
            <span style="font-size: 18px;font-weight: bold;line-height: 2;">I. Profil Murid</span>
            <p>Nama : <span id="nama_value"></span></p>        
            <p>Kelas : <span id="kelas_value"></span></p>        
            <p>Mata Pelajaran : <span id="mapel_value"></span></p>            
          </div>
          <div class="col-md-6">
            <span style="font-size: 18px;font-weight: bold;line-height: 2;">II. Informasi Test</span>          
            <p>Jumlah Soal : <span id="jumlah_soal_value"></span></p>        
            <p>Total Waktu Pengerjaan: <span id="total_waktu_value"></span></p>        
            <p>Total Silabus : <span id="total_silabus_value"></span></p>            
          </div>
          <div class="col-md-12">
            <span style="font-size: 18px;font-weight: bold;line-height: 2;">III. Keterangan</span>
            <br>
            Halo, sobat permatamall.com, selamat mengikuti test bimbel online ya, jangan khawatir jika sobat permatamall.com mengalami masalah saat mengikuti test bimbel online. Jika terjadi masalah sumberdaya atau koneksi terputus, maka jawaban dan waktu sobat permatamall.com akan langsung otomatis disimpan oleh sistem.Sobat permatamall.com bisa kembali melanjutkan test bimbel online yang tertunda dengan jawaban dan waktu yang sudah tercatat oleh sistem permatamall.com.
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
    url: '{{ route("ExampPermata.mapel") }}',
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
    url: '{{ route("ExampPermata.silabus") }}',
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
      url: '{{ route("ExampPermata.confirm") }}',
      data: alldata,      
      success: function(responses){
        // informasi profile
        var profileUser = JSON.parse(responses[0].Information);
        $('#nama_value').html(profileUser.nama);
        $('#kelas_value').html(profileUser.kelas);
        $('#mapel_value').html(profileUser.matpel);

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
      url: '{{ route("ExampPermata.process") }}',
      data: alldata,      
      success: function(responses){
        $('#loading-dulu-process').removeClass('loader-process');
        $('#loading-dulu-two-process').removeClass('loading-body');  
        window.onbeforeunload = function() {
        };
        window.location.href = "{{ route('ExampPermata.ETest.index') }}";
      }
    });

}
</script>
@endsection