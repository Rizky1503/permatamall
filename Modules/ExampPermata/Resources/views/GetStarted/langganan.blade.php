@extends('examppermata::layouts.master2')

@section('content')

<!-- <iframe src ="{{ asset('/laraview/#../file/Contoh pdf.pdf') }}" width="1000px" height="600px"></iframe> -->

<div style="background-image: url('{!! asset('public/images/sidebar/examp.png') !!}'); background-size: cover; text-align: center;font-size: 40px;font-weight: bold;color: #fff; padding-bottom: 80px; padding-top: 80px;">
    Permata Bimbel Online
</div>

<link rel="stylesheet" href="https://permatamall.com/public/assets/css/jquery.modal.min.css" />

<div class="container" style="padding-bottom: 80px; padding-top: 50px;" id="seach_page">          
  <div class="row"> 
    <div class="col-md-4">
      <div class="panel panel-default">
        <div class="panel-body" style="border-bottom: 1px solid #f5f5f5; padding: 15px 15px 1px 15px;">       
          <div class="form-group" style="margin-bottom: 2px;">
            <label for="email">Nama:</label> <br> <span>{{ $nama_user ?? '' }} </span>
          </div>
          <div class="form-group" style="margin-bottom: 2px;">
            <!-- <label for="email">Tanggal Berakhir Langganan:</label> <br> <span>{{ \Carbon\Carbon::parse($expired)->format('d F Y') ?? '' }} ( 6 Bulan Berlangganan )</span> -->
            <label for="email">Tanggal Berakhir Langganan:</label> <br> <span>Gratis Selama Promosi</span>
          </div>   
        </div>         
        <center><div id="loading-dulu"></div></center>
        <div class="panel-body" id="loading-dulu-two">
          <form method="post" enctype="multipart/form-data" id="form-all">
            <input type="hidden" name="_kelas" value="" id="_kelas">
            <input type="hidden" name="_tingkat" value="" id="_tingkat">
            <div class="form-group">
              <label for="email">Kategori Pilihan:</label>
              <select class="form-control select2" name="_test_online" id="test_online" onchange="functiongetjenis(this.value)">
                <option value="">Pilih Paket</option>
                @foreach($kategori_pilihan as $kategori_pilihan)
                <option value="{{ encrypt($kategori_pilihan->id_order) }}">
                  
                  @if ($kategori_pilihan->keterangan == 'TINGKAT')  
                      {{ $kategori_pilihan->kondisi }}
                  @else
                      {{ $kategori_pilihan->keterangan }} {{ $kategori_pilihan->kondisi }}
                  @endif
                  
                </option>
                @endforeach
              </select>
            </div>
            <div id="pending" style="display: none;">
              <a href="{{ route('ExampPermata.pay',[base64_encode($tingkat_pay.','.$matpel.','.$amount.','.$jenis)]) }}" class="btn btn-primary">
                Lanjutkan Pembayaran
              </a>
            </div>
            <div class="form-group" id="pilih_jenis_latihan" style="display: none">
              <label for="email">Jenis Latihan:</label>
              <select class="form-control select2" name="_jenis_latihan" id="jenis_latihan" style="width:100%" onchange="functiongettahun(this.value)">
                <option value="">Pilih Paket</option> 
              </select>
            </div>
            <div class="form-group" id="pilih_tahun" style="display: none">
              <label for="email">Pilih Tahun:</label>
              <select class="form-control select2" name="_tahun" id="tahun" style="width:100%" onchange="functiongetmatpel(this.value)">
                <option value="2020" selected="selected">2020</option>
                
              </select>
            </div>

            <div class="form-group" id="pilih_matapelajaran" style="display: none">
              <label for="email">Pilih Mata Pelajaran:</label>
              <select class="form-control select2" name="_mata_pelajaran" id="matpel" style="width:100%">
                <option value="">Pilih Mata Pelajaran</option>                  
              </select>
            </div>

            <div class="form-group">
              <button type="button" class="btn btn-primary" style="float: right;" onclick="confirmRequest()">Mulai Test</button>
            </div>
          </form>                   
        </div>
       </div>
    </div> 
    <div class="col-md-8">
      <div class="row">
          @include('examppermata::layouts.menu-berbayar')
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

<div class="container" style="padding-bottom: 80px; padding-top: 50px; display: none;" id="finish_page">
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default">
        <center><div id="loading-dulu-process"></div></center>
          <div class="panel-body loading-dulu-two-process">
            <label style="font-size: 24px;" id="judul_test">
               <span style="font-weight: bold;" id="nama_test"></span>
            </label> 
          </div>
          <hr>              
          <div class="panel-body loading-dulu-two-process">             
           <!--  <p>
              <i class="fa fa-clock-o" style="font-size: 24px;"></i> <span style="position: absolute;margin: 3px 10px;">Total Waktu Pengerjaan <span id="time_examp"></span> Menit</span>
            </p>  -->
            <p>
              <i class="fa fa-files-o" style="font-size: 18px;"></i> <span style="position: absolute;margin: 0px 14px;">Total Soal <span id="soal_examp"></span> Soal</span>
            </p> 
            <div>
              <div class="row" id="DataPelajaran">
                
              </div>
            </div>
          </div>
          <hr>
          <div class="panel-body loading-dulu-two-process">
            <span style="float: right;">
              <button class="btn btn-warning" onclick="CancelProcess()">
                <i class="fa fa-times-circle-o"></i> Batal
              </button>
              <button type="button" class="btn btn-primary" id="button_confirm">
                <i class="fa fa-check-circle-o"></i> Konfirmasi
              </button>
            </span>
          </div>
      </div>
    </div>  
    <!-- <div class="col-md-4">
      <div class="panel panel-default">
          <div class="panel-body" style="padding: 10px 15px 10px 15px; border-bottom: 1px solid #ddd">            
            <span>Video Tutorial</span>
          </div>
          <div class="panel-body" id="video">           
            <video style="max-width: 330px;" controls controlsList="nodownload">
                <source src="{!! asset('public/video/load_video_blob.MP4') !!}" type="video/mp4">
            </video>
          </div>
      </div>
    </div> -->
  </div>  
</div>

<div id="loadMe" class="modal">
  <form id="form-all-siap">
    <input type="hidden" name="_kelas" value="" id="_kelas_siapun">
    <input type="hidden" name="_tingkat" value="" id="_tingkat_siapun">
    <input type="hidden" name="_jenis_latihan" value="SIAP UN" id="_jenis_latihan">
    <div class="form-group">
        <label for="email">Kategori Pilihan:</label>
        <select class="form-control" name="_test_online" id="test_online_siap" onchange="functiongetmatpelsiapun(this.value)">
          <option value="">Pilih Paket</option>
          @foreach($kategori_pilihan_siap as $kategori_pilihan_siap)
          <option value="{{ encrypt($kategori_pilihan_siap->id_order) }}">
            
            @if ($kategori_pilihan_siap->keterangan == 'TINGKAT')  
                {{ $kategori_pilihan_siap->kondisi }}
            @else
                {{ $kategori_pilihan_siap->keterangan }} {{ $kategori_pilihan_siap->kondisi }}
            @endif
            
          </option>
          @endforeach
        </select>
    </div>

    <div class="form-group">
      <label for="email">Pilih Mata Pelajaran:</label>
      <select class="form-control select2" name="_mata_pelajaran" id="matpel_siapun" style="width:100%">
        <option value="">Pilih Mata Pelajaran</option>                  
      </select>
    </div>
    
  </form>  
    
 <!--  <div class="form-group">
    <label class="container-checked">Masih Bersekolah di Sekolah yang Sama
      <input type="checkbox" id="checkbox-data" onclick="functionCheckbox()">
      <span class="checkmark"></span>
    </label>
  </div> -->
  <div class="form-group">
    <button type="submit" class="btn btn-primary" onclick="SiapUn()"><a href="#" rel="modal:close">Konfirmasi</a></button>
    <button type="submit" class="btn btn-danger"><a href="#" rel="modal:close">Batal</a></button>
  </div> 
</div>

<div id="loadMe_bedah" class="modal">
  <div class="form-group">
        <label for="email">Kategori Pilihan:</label>
        <select class="form-control" name="_test_online_bedah" id="test_online_siap_bedah" onchange="functiongetmatpelbedahmateri(this.value)">
          <option value="">Pilih Paket</option>
          @foreach($kategori_pilihan_bedah as $kategori_pilihan_bedah)
          <option value="{{ encrypt($kategori_pilihan_bedah->id_order) }}">
            
            @if ($kategori_pilihan_bedah->keterangan == 'TINGKAT')  
                {{ $kategori_pilihan_bedah->kondisi }}
            @else
                {{ $kategori_pilihan_bedah->keterangan }} {{ $kategori_pilihan_bedah->kondisi }}
            @endif
            
          </option>
          @endforeach
        </select>
  </div>

  <div class="form-group">
        <label for="email">Mata Pelajaran:</label>
        <select class="form-control" name="_mata_pelajaran_bedah" id="_mata_pelajaran_bedah" onchange="functiongetsilabusbedahmateri(this.value)">
          <option value="">Pilih Mata Pelajaran</option>
        </select>
  </div>

  <div class="form-group">
        <label for="email">Silabus:</label>
        <select class="form-control" name="_silabus_bedah" id="_silabus_bedah">
          <option value="">Pilih Silabus</option>
        </select>
  </div>

  <div id="pdf">
    
  </div>

  <div class="form-group">
    <button type="submit" class="btn btn-primary" onclick="functiongetfilemateri()">Lihat Materi</button>
    <button type="submit" class="btn btn-danger"><a href="#" rel="modal:close">Batal</a></button>
  </div>

</div>

<a href="https://api.whatsapp.com/send?phone=62811811306&text=*Pengaduan dari {{ $nama_user }} dengan paket {{ $matpel }}*" target="_blank"> 
  <img src="http://iaifi-ips.org/public/images/whatsapp-opt.png" class="wabutton" alt="WhatsApp-Button">
</a> 
@endsection
@section('script')
<style>
.wabutton{
  position:fixed;
  bottom:30px;
  right:20px;
  z-index:100;
  cursor: pointer;
  animation: bounce 2s infinite;
  -webkit-animation: bounce 2s infinite;
  -moz-animation: bounce 2s infinite;
  -o-animation: bounce 2s infinite;    
}
@-webkit-keyframes bounce {
  0%, 20%, 50%, 80%, 100% {-webkit-transform: translateY(0);} 
  40% {-webkit-transform: translateY(-30px);}
  60% {-webkit-transform: translateY(-15px);}
}
@-moz-keyframes bounce {
  0%, 20%, 50%, 80%, 100% {-moz-transform: translateY(0);}
  40% {-moz-transform: translateY(-30px);}
  60% {-moz-transform: translateY(-15px);}
}
@-o-keyframes bounce {
  0%, 20%, 50%, 80%, 100% {-o-transform: translateY(0);}
  40% {-o-transform: translateY(-30px);}
  60% {-o-transform: translateY(-15px);}
}
@keyframes  bounce {
  0%, 20%, 50%, 80%, 100% {transform: translateY(0);}
  40% {transform: translateY(-30px);}
  60% {transform: translateY(-15px);}
}
hr {
     margin-top: 0px; 
     margin-bottom: 0px; 
} 

.silabus_pembelajaran{
  background-color: #d35400; 
  padding: 10px; 
  width: 100%; 
  border-radius: 5px; 
  margin-bottom: 20px;
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

  .modal a.close-modal {
    display: none !important; 
  }

  .modal {
    overflow: visible;
  } 

</style>

<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="https://permatamall.com/public/assets/js/jquery.modal.min.js"></script>  
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

<script type="text/javascript">
document.addEventListener('contextmenu', event => event.preventDefault());

function disableContextMenu(){
    window.frames["fraDisabled"].document.oncontextmenu = function(){alert("No way!"); return false;};   
    // Or use this
    // document.getElementById("fraDisabled").contentWindow.document.oncontextmenu = function(){alert("No way!"); return false;};;    
  }  

function functiongetmatpelbedahmateri(value){
  $.ajax({
      type: "GET",
      url: '{{ route("ExampPermata.matapelajaran_bedah_materi") }}',
      data: {
          id:value,
      },
      success: function(responses){
       $('#_mata_pelajaran_bedah').html(responses); 
      }
  });
}

function functiongetsilabusbedahmateri(value){
  $.ajax({
      type: "GET",
      url: '{{ route("ExampPermata.silabus_bedah_materi") }}',
      data: {
          matapelajaran : value,
          id: $('#test_online_siap_bedah').val(),
      },
      success: function(responses){
       $('#_silabus_bedah').html(responses); 
      }
  });

  $.ajax({
      type: "GET",
      url: '{{ route("ExampPermata.keterangan_bedah_materi") }}',
      data: {
          id : $('#_silabus_bedah').val(),
      },
      success: function(responses){
        $('#keterangan_bedah_materi').html(responses); 
      }
  });
}

function functiongetfilemateri(){
  $.ajax({
      type: "GET",
      url: '{{ route("ExampPermata.GetFilePdf") }}',
      data: {
          id : $('#_silabus_bedah').val(),
      },
      success: function(responses){
        // window.open(responses);
        $('#pdf').html(responses); 
      }
  });
}


function pilihSiapUn(){
    $('#loadMe').modal({
      fadeDuration: 250,
    });
}

function BedahMateri(){
    $('#loadMe_bedah').modal({
      fadeDuration: 250,
    });
}
 
  
function display(vid){
    var video = document.getElementById("video");
    video.src = window.URL.createObjectURL(vid);
}
$( document ).ready(function() {
    display('https://i1.wp.com/kreativv.com/wp-content/uploads/2019/09/COLOR-CODED-LYRICS.png?w=850&ssl=1')
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

function functiongettahun(value){ 
  if (value == 'UTS' || value == 'UAS' ) {
    $('#pilih_matapelajaran').show();
    $('#pilih_tahun').hide();
    $.ajax({
      type: "GET",
      url: '{{ route("ExampPermata.get_matpel") }}',
      data: {
          tahun: $('#tahun').val(),
          jenis:$('#jenis_latihan').val(),
          id_inv:$('#test_online').val(),

      },
      success: function(responses){
        $('#matpel').html(responses); 
      }
  });
  }else{
    $('#pilih_matapelajaran').show();
    $('#pilih_tahun').show();
    if (value == 'SIAP UN') {
        if ( $('#_tingkat').val() == 'IPA' ) {
          Swal.fire({
            icon: 'error',
            title: 'Siap UN SMA IPA 2020 Sudah Berakhir',
            text: 'Nantikan Kami Di Siap UN 2021 ',
          })
          $('#tahun').html('<option disabled selected>Nantikan Kami di 2021<option>'); 
          $('#matpel').html('<option disabled selected>Nantikan Kami di 2021<option>'); 
        }else if( $('#_tingkat').val() == 'IPS' ){
          Swal.fire({
            icon: 'error',
            title: 'Siap UN SMA IPS 2020 Sudah Berakhir',
            text: 'Nantikan Kami Di Siap UN 2021 ',
          })
          $('#tahun').html('<option disabled selected>Nantikan Kami di 2021<option>'); 
          $('#matpel').html('<option disabled selected>Nantikan Kami di 2021<option>'); 
        }else{
          $('#judul_test').html("Latihan " + value );
          $.ajax({
                type: "GET",
                url: '{{ route("ExampPermata.gettahun") }}',
                data: {
                    id:value,
                    kategori: $('#_tingkat').val(),
                },
                success: function(responses){
                    $('#tahun').html(responses);   
                }
          });
        }
    }else{
      $('#judul_test').html("Latihan " + value );
      $.ajax({
            type: "GET",
            url: '{{ route("ExampPermata.gettahun") }}',
            data: {
                id:value,
                kategori: $('#_tingkat').val(),
            },
            success: function(responses){
                $('#tahun').html(responses);   
            }
      });
    }
  }
}

function functiongetmatpel(value){
  $.ajax({
      type: "GET",
      url: '{{ route("ExampPermata.get_matpel") }}',
      data: {
          tahun:value,
          jenis:$('#jenis_latihan').val(),
          id_inv:$('#test_online').val(),

      },
      success: function(responses){
        $('#matpel').html(responses); 
      }
  });
}

function functiongetmatpelsiapun(value){
    alert(value)
    $.ajax({
        type: "GET",
        url: '{{ route("ExampPermata.getjenis") }}',
        data: {
            id:value
        },
        success: function(responses){
          if (responses.status == "in Progres") {
            $('#in_progres').hide();
            $('#pending').hide();
            var option = '<option value="" selected disabled>Pilih Jenis Latihan </option>';
            $.each(responses.data, function (key, value) {
              option += '<option value="'+ value.jenis_paket + '">' + value.jenis_paket + '</option>';             
            })
            $('#jenis_latihan').html(option);
            $('#_kelas_siapun').val(responses.data_order.keterangan);
            $('#_tingkat_siapun').val(responses.data_order.kondisi);
          }else if (responses.status == "None"){
            $('#pending').hide();
            $('#in_progres').hide();
            $('#_kelas_siapun').val(responses.data_order.keterangan);
            $('#_tingkat_siapun').val(responses.data_order.kondisi);
          }else{
            $('#pending').show();
            $('#in_progres').hide();
          }
        }
    });
    $.ajax({
        type: "GET",
        url: '{{ route("ExampPermata.get_matpel") }}',
        data: {
            tahun: '2020',
            jenis: 'SIAP UN',
            id_inv: value,

        },
        success: function(responses){
          $('#matpel_siapun').html(responses); 
        }
    });
}

function SiapUn(){
  var test_online   = $('#test_online_siap').val();
  var alldata       = $('#form-all-siap').serialize();
  if (test_online == "") {
    swal({
      title: "Pilih Tes Required",
      text: "Silahkan Pilih Tes dahulu.",
      type: "info",
      icon: "info",
      buttons: false,
      timer: 1000
    }).then(name => {
      $('#kelas').focus();
    });

  }else{

    $('#loading-dulu').addClass('loader');
    $('#loading-dulu-two').addClass('loading-body');
    $.ajax({
      type: "GET",
      url: '{{ route("ExampPermata.langganan_confirm_siap_un") }}',
      data: alldata,      
      success: function(responses){
        $('#loading-dulu').removeClass('loader');
        $('#loading-dulu-two').removeClass('loading-body');
        $('#seach_page').hide();
        $('#finish_page').show();
        var profileUser = JSON.parse(responses[0].Information);
        // informasi profile
        $('#time_examp').html(profileUser.TotalWaktu);
        $('#soal_examp').html(profileUser.jumlahSoal);
        if (profileUser.jumlahSoal == 0 || profileUser.TotalWaktu == 0) {
          $('#button_confirm').attr('disabled','disabled');
          $('#button_confirm').removeAttr('onclick');
        }else{
          $('#button_confirm').removeAttr('disabled');
          $('#button_confirm').attr('onclick','SourceProcesssiapun()');
        }

        // "+order.total_matpel+" Soal

        var DataPelajaran = $("#DataPelajaran");
        DataPelajaran.html("");
        $.each(profileUser.Pelajaran, function(i, order){
            DataPelajaran.append("\
              <div class='col-md-4'>\
                <div class='silabus_pembelajaran'>\
                  <i class='fa fa-info-circle'></i>\
                  <span style='font-weight: bold;'>"+order.nama_matpel+"</span>\
                  <br>\
                  15 Soal\
                </div>\
              </div>\
            ");
        });  


        // $('#kelas_value').html(profileUser.kelas);
        // $('#mapel_value').html(profileUser.matpel);

        // // informasi test
        // $('#jumlah_soal_value').html(profileUser.jumlahSoal + ' Butir Soal');
        // $('#total_waktu_value').html(profileUser.TotalWaktu + ' Menit');
        // $('#total_silabus_value').html(profileUser.total_silabus + ' Silabus Pembelajaran');


        // $('#loading-dulu').removeClass('loader');
        // $('#loading-dulu-two').removeClass('loading-body');      
        // $('#myModal').modal({backdrop: 'static', keyboard: false}).show();
        // window.onbeforeunload = function() {
        //    return "";
        // };
      
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

function functiongetjenis(value){
    $.ajax({
        type: "GET",
        url: '{{ route("ExampPermata.getjenis") }}',
        data: {
            id:value
        },
        success: function(responses){
          if (responses.status == "in Progres") {
            $('#pilih_jenis_latihan').show();
            $('#pending').hide();
            
            var option = '<option value="" selected disabled>Pilih Jenis Latihan </option>';
            $.each(responses.data, function (key, value) {
              option += '<option value="'+ value.jenis_paket + '">' + value.jenis_paket + '</option>';             
            })
            $('#jenis_latihan').html(option);
            $('#_kelas').val(responses.data_order.keterangan);
            $('#_kelas_siapun').val(responses.data_order.keterangan);
            $('#_tingkat_siapun').val(responses.data_order.kondisi);
            $('#_tingkat').val(responses.data_order.kondisi);
          }else if (responses.status == "None"){
            
            $('#pending').hide();
            $('#pilih_jenis_latihan').hide();

            $('#_kelas').val(responses.data_order.keterangan);
            $('#_kelas_siapun').val(responses.data_order.keterangan);
            $('#_tingkat_siapun').val(responses.data_order.kondisi);
            $('#_tingkat').val(responses.data_order.kondisi);
          }else{
            $('#pending').show();
            $('#in_progres').hide();
          }
        }
    });
}

function myFunction(item, index) {
  console.log(item.jenis_paket); 
}

function confirmRequest(){
  var test_online   = $('#test_online').val();
  var alldata       = $('#form-all').serialize();
  if (test_online == "") {
    swal({
      title: "Pilih Tes Required",
      text: "Silahkan Pilih Tes dahulu.",
      type: "info",
      icon: "info",
      buttons: false,
      timer: 1000
    }).then(name => {
      $('#kelas').focus();
    });

  }else{

    $('#loading-dulu').addClass('loader');
    $('#loading-dulu-two').addClass('loading-body');
    $.ajax({
      type: "GET",
      url: '{{ route("ExampPermata.langganan_confirm") }}',
      data: alldata,      
      success: function(responses){
        $('#loading-dulu').removeClass('loader');
        $('#loading-dulu-two').removeClass('loading-body');
        $('#seach_page').hide();
        $('#finish_page').show();
        var profileUser = JSON.parse(responses[0].Information);
        // informasi profile
        $('#time_examp').html(profileUser.TotalWaktu);
        $('#soal_examp').html(profileUser.jumlahSoal);
        if (profileUser.jumlahSoal == 0 || profileUser.TotalWaktu == 0) {
          $('#button_confirm').attr('disabled','disabled');
          $('#button_confirm').removeAttr('onclick');
        }else{
          $('#button_confirm').removeAttr('disabled');
          $('#button_confirm').attr('onclick','SourceProcess()');
        }

        // "+order.total_matpel+" Soal

        var DataPelajaran = $("#DataPelajaran");
        DataPelajaran.html("");
        $.each(profileUser.Pelajaran, function(i, order){
            DataPelajaran.append("\
              <div class='col-md-4'>\
                <div class='silabus_pembelajaran'>\
                  <i class='fa fa-info-circle'></i>\
                  <span style='font-weight: bold;'>"+order.nama_matpel+"</span>\
                  <br>\
                  15 Soal\
                </div>\
              </div>\
            ");
        });  


        // $('#kelas_value').html(profileUser.kelas);
        // $('#mapel_value').html(profileUser.matpel);

        // // informasi test
        // $('#jumlah_soal_value').html(profileUser.jumlahSoal + ' Butir Soal');
        // $('#total_waktu_value').html(profileUser.TotalWaktu + ' Menit');
        // $('#total_silabus_value').html(profileUser.total_silabus + ' Silabus Pembelajaran');


        // $('#loading-dulu').removeClass('loader');
        // $('#loading-dulu-two').removeClass('loading-body');      
        // $('#myModal').modal({backdrop: 'static', keyboard: false}).show();
        // window.onbeforeunload = function() {
        //    return "";
        // };
      
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
  var alldata = $('#form-all').serialize();
  $('#loading-dulu-process').addClass('loader-process');
  $('#loading-dulu-two-process').addClass('loading-body');
  $.ajax({
      type: "GET",
      url: '{{ route("ExampPermata.langganan_process") }}',
      data: alldata,      
      success: function(responses){
        $('#loading-dulu-process').removeClass('loader-process');
        $('#loading-dulu-two-process').removeClass('loading-body');  
        window.onbeforeunload = function() {
        };
        window.location.href = "{{ route('ExampPermata.ETestLangganan.index') }}";
      }
  });
}

function SourceProcesssiapun(){
  var alldata       = $('#form-all-siap').serialize();
  $('#loading-dulu-process').addClass('loader-process');
  $('#loading-dulu-two-process').addClass('loading-body');
  $.ajax({
      type: "GET",
      url: '{{ route("ExampPermata.langganan_process") }}',
      data: alldata,      
      success: function(responses){
        $('#loading-dulu-process').removeClass('loader-process');
        $('#loading-dulu-two-process').removeClass('loading-body');  
        window.onbeforeunload = function() {
        };
        window.location.href = "{{ route('ExampPermata.ETestLangganan.index') }}";
      }
  });
}

function CancelProcess(){
  $('#loading-dulu-process').addClass('loader-process');
  $('.loading-dulu-two-process').addClass('loading-body');
  setTimeout(function(){
    $('#loading-dulu-process').removeClass('loader-process');
    $('.loading-dulu-two-process').removeClass('loading-body');
    $('#seach_page').show();
    $('#finish_page').hide();
  }, 1000);
}

</script>
@endsection
