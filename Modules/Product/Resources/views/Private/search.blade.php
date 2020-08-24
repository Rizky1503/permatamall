@extends('layouts.FrontEnd')

@section('content')
<div style="width: 100%; height: 220px; background-image: url('{!! asset('public/images/sidebar/privat.png') !!}');">
    <div class="container">
      <p style="font-size: 24px;color: #fff;font-weight: 600;margin-top: 70px; text-align: center;">
          Mendaftar Les Privata
      </p>
    </div>
</div>
<div class="container"  style="margin-top: 30px; margin-bottom: 30px;">
  <div class="row">
    <div class="col-md-5">
      <form method="get" id="parameter_request">
        <div class="section">
          <div class="form-group">
            <input type="hidden" name="jenis_kelamin" value="Semua">
            <!-- <label>* Jenis Kelamin</label>
            <select name="jenis_kelamin" id="jenis_kelamin" class="form-control" required="">
              <option value="L">Laki-Laki</option>
              <option value="P">Perempuan</option>      
            </select> -->
          </div>
          <div class="form-group">
            <label>* Guru Les Privat Kelas</label>
            <select name="tingkat" id="tingkat" class="form-control select2" required="" onchange="functionGetMatpel(this.value)">
              <option value="">Pilih Guru Les Privat Kelas  </option>
              <option value="SD" @if($tingkat == "SD") selected="selected" @endif>SD</option>
              <option value="SMP" @if($tingkat == "SMP") selected="selected" @endif>SMP</option>      
              <option value="SMA" @if($tingkat == "SMA") selected="selected" @endif>SMA</option>
            </select>
          </div>
          <div class="form-group">
              <label>* Mata Pelajaran Les Privat</label>
              <select name="mata_pelajaran" id="mata_pelajaran" class="form-control select2" required="">
                <option value="">Pilih Mata Pelajaran Les Privat</option>
                @foreach($Mapel as $ListMatpel)
                <option value="{{ $ListMatpel }}">{{ $ListMatpel }}</option>    
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label>* Jumlah Pertemuan Les Privat</label>
                <select name="Pertemuan" id="Pertemuan" class="form-control select2" required="">
                  <option value="">Pilih Pertemuan</option>
                  <option value="4">4 Pertemuan</option>
                  <option value="8">8 Pertemuan</option>      
                  <option value="14">14 Pertemuan</option>
                </select>
            </div>
            <div class="form-group">
              <label>* Lokasi Mengajar Les Privat</label>
              <select class=" form-control select2" style="width:100%;" name="kota" id="kota" required="required">
                <option value="">Pilih Lokasi Mengajar Les Privat</option>
                @foreach($kotaList as $listKota)
                <option value="{{ $listKota }}" @if($kota == $listKota) selected="selected" @endif>{{ $listKota }}</option>
                @endforeach
                <option value="{{ $kotaLainya }}" @if($kota == 'Lainya') selected="selected" @endif>{{ $kotaLainya }}</option>
              </select>
            </div>
            <div class="form-group">
              <label>* Level Guru Les Privat</label>
              <select class=" form-control select2" style="width:100%;" name="level" id="level" required="required">
                <option value="">Pilih Guru Les Privat</option>            
                <option value="Guru">Guru</option>            
                <option value="Guru Senior">Guru Senior</option>            
              </select>
            </div>
            <div class="form-group">
              <button type="button" class="btn btn-primary btn-lg" onclick="functionGetguru()">Mendaftar Les Privat</button>
            </div>
        </div>
      </form>
    </div>
    <div class="col-md-7">
      <img src="{!! asset('public/images/privat/flyer_murid_untuk_web.jpg') !!}" style="width: 100%">
    </div>
  </div>
</div>


<div id="loadMe" class="modal" style="max-width: 200px;">
  <div class="loader"></div>
  <center>
    <p style="font-weight: bold;">Mohon Tunggu</p>
  </center>
</div>
@endsection
@section('script')
<style type="text/css">
  .section{
    padding: 30px 30px 30px 30px;
    width: 100%;  
    min-height: 300px;
    background: #fff;
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 3px 20px 0px rgba(0, 0, 0, 0.1);
    -moz-box-shadow: 0 3px 20px 0px rgba(0, 0, 0, 0.1);
    -webkit-box-shadow: 0 3px 20px 0px rgba(0, 0, 0, 0.1);
    -o-box-shadow: 0 3px 20px 0px rgba(0, 0, 0, 0.1);
    -ms-box-shadow: 0 3px 20px 0px rgba(0, 0, 0, 0.1);
  }

  .form-control{
    border: 1px solid #ddd;
    border-radius: 2px;
  }

  .select2-container--default .select2-selection--single {
    background-color: #fff;
    border: 1px solid #ddd;
    border-radius: 2px;
    padding: 3px;
    height: 33px;
  } 

  .input-group .form-control {
    position: relative;
    z-index: 1;
  }

  /** SPINNER CREATION **/

  .loader {
    position: relative;
    text-align: center;
    margin: 15px auto 35px auto;
    z-index: 9999;
    display: block;
    width: 80px;
    height: 80px;
    border: 10px solid rgba(0, 0, 0, .3);
    border-radius: 50%;
    border-top-color: #000;
    animation: spin 1s ease-in-out infinite;
    -webkit-animation: spin 1s ease-in-out infinite;
  }

  @keyframes spin {
    to {
      -webkit-transform: rotate(360deg);
    }
  }

  @-webkit-keyframes spin {
    to {
      -webkit-transform: rotate(360deg);
    }
  }    
</style>

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

    $('#loadMe').modal({
      fadeDuration: 250,
      escapeClose: false,
      clickClose: false,
      showClose: false
    });

    $.ajax({
      type: "GET",
      url: '{{ route("Private.RequestRequirement") }}',
      data:form,
      success: function(responses){
        setTimeout(function() {
          window.location = responses;
        }, 2000);         
      }
    });      
  }  
}

</script>
@endsection
