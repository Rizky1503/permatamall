@extends('layouts.FrontEnd')

@section('content')
<div style="width: 100%; height: 220px; background-image: url('{!! asset('public/images/sidebar/privat.png') !!}');">
    <div class="container">
      <p style="font-size: 24px;color: #fff;font-weight: 600;margin-top: 70px; text-align: center;">
          Mendaftar Les Privat
      </p>
    </div>
</div>
<div class="container" style="margin-top: 30px; margin-bottom: 30px;">
<form method="get" id="parameter_request">
    <div class="row">    
      <div class="col-md-6">
        <div class="section">
          <p style="font-size: 18px; color: #000; font-weight: bold;"><span class="line"></span>Data Orang Tua :</p>
          <div class="form-group">
            <label>* Nama Lengkap Orang Tua</label>
            <input type="text" name="name" id="name" class="form-control" placeholder="" value="{{ $profileOrtu->nama_ortu }}">
          </div>
          <div class="form-group">
            <label>* Nomor Telepon Orang Tua</label>
            <div class="input-prepend input-group">
              <span class="add-on input-group-addon">+62</span>
              <input type="number" name="phone" id="phone" class="form-control" placeholder="Nomor Telepon" value="{{ $profileOrtu->telpon_ortu }}">
            </div>
          </div>
          <p style="font-size: 18px; color: #000; font-weight: bold;"><span class="line"></span>Profil Tambahan :</p>
          <div class="form-group">
            <label>* Asal Sekolah Siswa</label>
            <input type="text" name="asal_sekolah" id="asal_sekolah" class="form-control" placeholder="" value="{{ $profileOrtu->asal_sekolah }}">
          </div>
          <br>        
        </div>
        <span class="Keterangan">
          <strong>Keterangan</strong>:
          <br>
          <br>
          1. Silahkan lengkapi form yang tersedia sebelum melakukan pencarian guru
          <br>
          2. Pembayaran dihitung Setiap <b>4 kali</b> dalam <b>Pertemuan</b>
          <br>
          3. Untuk level guru, ada <b>Guru</b> dan <b>Guru Senior</b>
        </span>
        <br>
      </div>
      <div class="col-md-6">      
        <input type="hidden" name="raw_search" id="raw_search">
        <div class="section">
          <p style="font-size: 18px; color: #000; font-weight: bold;"><span class="line"></span>Guru Yang di Harapkan :</p>
          <div class="form-group">
            <label>* Jenis Kelamin</label>
            <select name="jenis_kelamin" id="jenis_kelamin" class="form-control" required="">
              <option value="L">Laki-Laki</option>
              <option value="P">Perempuan</option>      
            </select>
          </div>
          <div class="form-group">
            <label>* Tingkat</label>
            <select name="tingkat" id="tingkat" class="form-control select2" required="" onchange="functionGetMatpel(this.value)">
              <option value="">Pilih Tingkat</option>
              <option value="SD" @if($tingkat == "SD") selected="selected" @endif>SD</option>
              <option value="SMP" @if($tingkat == "SMP") selected="selected" @endif>SMP</option>      
              <option value="SMA" @if($tingkat == "SMA") selected="selected" @endif>SMA</option>      
            </select>
          </div>
          <div class="form-group">
            <label>* Mata Pelajaran</label>
            <select name="mata_pelajaran" id="mata_pelajaran" class="form-control select2" required="">
              <option value="">Pilih Mata Pelajaran</option>
              @foreach($Mapel as $ListMatpel)
              <option value="{{ $ListMatpel }}">{{ $ListMatpel }}</option>    
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label>* Pertemuan</label>
            <div class="input-prepend input-group">
              <input type="number" name="Pertemuan" id="Pertemuan" class="form-control" required="">
              <span class="add-on input-group-addon">Kali Pertemuan</span>
            </div>
          </div>
          <div class="form-group">
            <label>* Kota</label>
            <select class=" form-control select2" style="width:100%;" name="kota" id="kota" required="required">
              <option value="">Pilih Kota</option>
              @foreach($kotaList as $listKota)
              <option value="{{ $listKota }}" @if($kota == $listKota) selected="selected" @endif>{{ $listKota }}</option>
              @endforeach
              <option value="{{ $kotaLainya }}" @if($kota == 'Lainya') selected="selected" @endif>{{ $kotaLainya }}</option>
            </select>
          </div>
          <div class="form-group">
            <label>* Level guru</label>
            <select class=" form-control select2" style="width:100%;" name="level" id="level" required="required">
              <option value="">Pilih Guru</option>            
              <option value="Guru">Guru</option>            
              <option value="Guru Senior">Guru Senior</option>            
            </select>
          </div>
          <div class="form-group">
            <button type="button" class="btn btn-primary btn-lg" onclick="functionGetguru()">Mendaftar Les Privat</button>
          </div>
        </div>      
      </div>    
      <div class="col-md-12">
        <div class="section" id="value_search" style="display: none;">
          <center>
            <h2><b id="value_search_count"></b></h2>
            <br>
            <p><button type="button" class="btn btn-primary" onclick="functionGetProccessConfirm()">Setuju & Lanjutkan</button></p>
            <br>
            <br>
          </center>
        </div>
      </div>    
    </div>
  </form>
</div>
  <div id="modal_proses_data" class="modal" style="margin-top: 60px;">
    <p>Nama Lengkap Orang Tua <span style="float: right;" id="nama_lengkap_value"></span></p>
    <p>Nomor Telepon Orang Tua <span style="float: right;" id="Nomor_telp_value"></span></p>
    <p>Asal Sekolah <span style="float: right;" id="asal_sekolah_value"></span></p>
    <p>Jenis Kelamin <span style="float: right;" id="jenis_kelamin_value"></span></p>
    <p>Tingkat <span style="float: right;" id="Tingkat_value"></span></p>
    <p>Mata Pelajaran <span style="float: right;" id="mata_pelajaran_value"></span></p>
    <p>Pertemuan <span style="float: right;" id="Pertemuan_value"></span></p>
    <p>Kota <span style="float: right;" id="kota_value"></span></p>
    <p>Level <span style="float: right;" id="level_value"></span></p>
    <p style="float: right;">
      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      <button type="button" class="btn btn-primary" onclick="functionGetProccess()">Konfirmasi</button>
    </p>
  </div>    
@endsection
@section('script')
<style type="text/css">
  .section{
    width: 100%;
    padding: 20px 10px 20px 10px;
    border-radius: 5px;
    background: #fff;
    -webkit-box-shadow: 0 6px 12px rgba(0, 0, 0, .175);
    box-shadow: 0 6px 12px rgba(0, 0, 0, .175);
    position: sticky;
    margin-bottom: 10px;
  }

  .line{
    border-left: 3px solid #4ab1ac;
    margin-right: 10px;
  }

  .form-group{
    padding-left: 10px;
    padding-right: 10px;
  }

</style>



<script>
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


function functionGetguru(){  

  var tingkat         = $('#tingkat').val();
  var mata_pelajaran  = $('#mata_pelajaran').val();
  var Pertemuan       = $('#Pertemuan').val();
  var Level           = $('#level').val();

  if (tingkat == "") {
    Swal.fire({
      position: 'center',
      type: 'info',
      title: 'Tingkat required',
      text: 'silahkan pilih tingkat terlebih dahulu',
      showConfirmButton: true,
      timer: 60000
    }).then(function() {
      $('#tingkat').focus();
    });  
  }else if (mata_pelajaran == "") {
    Swal.fire({
      position: 'center',
      type: 'info',
      title: 'Mata Pelajaran required',
      text: 'silahkan pilih mata pelajaran terlebih dahulu',
      showConfirmButton: true,
      timer: 60000
    }).then(function() {
      $('#mata_pelajaran').focus();
    });    
  }else if (Pertemuan == "") {
    Swal.fire({
      position: 'center',
      type: 'info',
      title: 'Pertemuan required',
      text: 'silahkan masukan Pertemuan terlebih dahulu',
      showConfirmButton: true,
      timer: 60000
    }).then(function() {
      $('#Pertemuan').focus();
    });
  }else if (Level == "") {
    Swal.fire({
      position: 'center',
      type: 'info',
      title: 'Level required',
      text: 'silahkan Pilih Level Guru terlebih dahulu',
      showConfirmButton: true,
      timer: 60000
    }).then(function() {
      $('#level').focus();
    });
  }else if (Pertemuan < 4) {
    Swal.fire({
      position: 'center',
      type: 'info',
      title: 'Pertemuan Error',
      text: 'Pertemuan minimal 4 kali',
      showConfirmButton: true,
      timer: 60000
    }).then(function() {
      $('#Pertemuan').focus();
      $('#Pertemuan').val("");
    });
  }else{

    $('#raw_search').val("");
    $('#value_search').hide();
    $('#level').val($('#level').val());
    $('#Pertemuan_value').val($('#level').val());
    var form = $('#parameter_request').serialize();
    $.ajax({
        type: "GET",
        url: '{{ route("Private.levelprivate") }}',
        data:form,
        success: function(responses){
          $('#value_search_count').html("Sobat Permata Bimbel Les Privat, <a href='{{ route('FrontEnd.index') }}'>permatamall.com</a> akan segera menginformasikan kebutuhan Les Privat anda dalam waktu 1 x 24 jam. Salam Permata Bimbel Les Privat.");
          $('#raw_search').val(responses.raw);
          $('#value_search').show();

          // if (responses.count > 0) {
          //   $('#value_search_count').html("Kami Menemukan Guru dengan biaya Rp. "+responses.min +" - Rp. "+responses.max+" /Pertemuan");
          //   $('#raw_search').val(responses.raw);
          //   $('#value_search').show();
          // }else{
          //   $('#value_search_count').html("Kami akan menginformasikan kepada anda dalam waktu 1 x 24 jam");
          //   $('#raw_search').val(responses.raw);
          //   $('#value_search').show();            
          // }

         }
    });
  }  
}


function functionGetProccessConfirm(){
  var name            = $('#name').val();
  var phone           = $('#phone').val();
  var tingkat         = $('#tingkat').val();
  var mata_pelajaran  = $('#mata_pelajaran').val();
  var Pertemuan       = $('#Pertemuan').val();
  var Level           = $('#level').val();
  var asal_sekolah    = $('#asal_sekolah').val();

  if (name == "") {
    Swal.fire({
      position: 'center',
      type: 'info',
      title: 'Nama required',
      text: 'silahkan masukan nama orang tua terlebih dahulu',
      showConfirmButton: true,
      timer: 60000
    }).then(function() {
      $('#name').focus();
    });  
  }else if (phone == "") {
    Swal.fire({
      position: 'center',
      type: 'info',
      title: 'Phone required',
      text: 'silahkan masukan phone terlebih dahulu',
      showConfirmButton: true,
      timer: 60000
    }).then(function() {
      $('#phone').focus();
    });      
  }else if (asal_sekolah == "") {
    Swal.fire({
      position: 'center',
      type: 'info',
      title: 'Asal Sekolah required',
      text: 'silahkan masukan Asal Sekolah terlebih dahulu',
      showConfirmButton: true,
      timer: 60000
    }).then(function() {
      $('#phone').focus();
    });      
  }else if (tingkat == "") {
    Swal.fire({
      position: 'center',
      type: 'info',
      title: 'Tingkat required',
      text: 'silahkan pilih tingkat terlebih dahulu',
      showConfirmButton: true,
      timer: 60000
    }).then(function() {
      $('#tingkat').focus();
    });      
  }else if (mata_pelajaran == "") {
    Swal.fire({
      position: 'center',
      type: 'info',
      title: 'Mata Pelajaran required',
      text: 'silahkan pilih mata pelajaran terlebih dahulu',
      showConfirmButton: true,
      timer: 60000
    }).then(function() {
      $('#mata_pelajaran').focus();
    });    
  }else if (Pertemuan == "") {
    Swal.fire({
      position: 'center',
      type: 'info',
      title: 'Pertemuan required',
      text: 'silahkan masukan Pertemuan terlebih dahulu',
      showConfirmButton: true,
      timer: 60000
    }).then(function() {
      $('#Pertemuan').focus();
    });
  }else if (Level == "") {
    Swal.fire({
      position: 'center',
      type: 'info',
      title: 'Level required',
      text: 'silahkan Pilih Level Guru terlebih dahulu',
      showConfirmButton: true,
      timer: 60000
    }).then(function() {
      $('#level').focus();
    });
  }else{
    $('#nama_lengkap_value').html($('#name').val());
    $('#Nomor_telp_value').html($('#phone').val());
    $('#asal_sekolah_value').html($('#asal_sekolah').val());
    $('#jenis_kelamin_value').html($('#jenis_kelamin').val());
    $('#Tingkat_value').html($('#tingkat').val());
    $('#mata_pelajaran_value').html($('#mata_pelajaran').val());
    $('#Pertemuan_value').html($('#Pertemuan').val()+' Kali Pertemuan');
    $('#kota_value').html($('#kota').val());
    $('#level_value').html($('#level').val());
    $('#modal_proses_data').modal({
      fadeDuration: 250
    });
  }
}


function functionGetProccess(){
  Swal.fire({
      onBeforeOpen: () => {
        Swal.showLoading()
        timerInterval = setInterval(() => {
        Swal.getContent().querySelector('strong')
          .textContent = Swal.getTimerLeft()
        }, 100)
      },
      title: 'Sedang proses',
      text: 'Sobat Permata Bimbel Les Privat, koneksi ke permatamall.com sedang penuh, mohon menunggu proses pengiriman data order anda hingga sukses',
      showConfirmButton: false,
    
  })
  var parameter_request = $('#parameter_request').serialize();
  $.ajax({
      type: "GET",
      url: '{{ route("Private.PrivateProcess") }}',
      data:parameter_request,
      success: function(responses){
        if (responses == "Requested") {
          Swal.fire({
              position: 'center',
              type: 'error',
              title: 'Proses Gagal',
              text: 'Sobat Permata Bimbel Les Privat, order dengan spesifikasi yang sama telah terdaftar, mohon sobat permata bimbel les privat cek di menu keranjang untuk lebih detail.',
              showConfirmButton: true,
              timer: 1500
          });
        }else{
          Swal.fire({
              position: 'center',
              type: 'success',
              title: 'Proses Berhasil',
              text: ' Sobat Permata Bimbel Les Privat, silahkan tunggu informasi dari permatamall.com, atau sobat bisa lihat proses permohonan di menu keranjang. Salam Permata Bimbel Les Privat',
              showConfirmButton: true,
              timer: 15000
          }).then(function() {
              window.location = "{{ route('Transaction.index') }}";
          });
        }
       }
  });
}
</script>

<style type="text/css">
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

.Keterangan{
  color: #f00;
}
</style>
@endsection
