@extends('layouts.FrontEnd')

@section('content')
<div style="width: 100%; height: 220px; background-image: url('{!! asset('public/images/sidebar/privat.png') !!}');">
    <div class="container">
      <p style="font-size: 24px;color: #fff;font-weight: 600;margin-top: 70px; text-align: center;">
          Mendaftar Les Privat
      </p>
    </div>
</div>
<div class="container"  style="margin-top: 30px; margin-bottom: 30px;">
  <div class="row">
    <div class="col-md-12">
      <div class="form-group">
        <a href="{{ route('Private.index',['jns_bimbel' => 'Private', 'tingkat' => $data['tingkat'], 'kota' => base64_encode($data['kota'])]) }}">
          <label style="cursor: pointer;"><i class="fa fa-arrow-left"></i> Kembali Ke Pencarian</label>   
        </a>         
      </div>
    </div>
    <div class="col-md-12">
      <div style="background: #29abe2;padding: 10px;border-radius: 3px;color: #fff;">Sobat permatamall.com, Silahkan konfirmasi pendaftaran Les Privat, Terimakasih....</div>
      <br>
    </div>
    <div class="col-md-4">
      <div class="section-first">   
        <div style="padding: 30px 30px 10px 30px;">   
          <div class="form-group">
            <label>Guru Les Privat Kelas</label>
            <br>
            <span>{{ $data['tingkat'] }}</span>
          </div>
          <div class="form-group">
            <label>Mata Pelajaran Les Privat</label>
            <br>
            <span>{{ $data['mata_pelajaran'] }}</span>
          </div>
          <div class="form-group">
            <label>Jumlah Pertemuan Les Privat</label>
            <br>
            <span>{{ $data['Pertemuan'] }} Pertemuan</span>
          </div>
          <div class="form-group">
            <label>Lokasi Mengajar Les Privat</label>
            <br>
            <span>{{ $data['kota'] }}</span>
          </div>
          <div class="form-group">
            <label>Level Guru Les Privat</label>
            <br>
            <span>{{ $data['level'] }}</span>
          </div>
        </div>                     
        <a onclick="ProsesSekarang()">
          <div style="width: 100%;cursor: pointer; background: #56c174;padding: 10px 30px 10px 30px;font-size: 18px;text-align: center; color: #fff;">
            Konfirmasi Les Privat
          </div>
        </a>
      </div>
    </div>
    <div class="col-md-8">
      <div class="section">          
        <div class="form-group">
          <label>Daftar Silabus Pelajaran Les Privat {{ $data['tingkat'] }} {{ $data['mata_pelajaran'] }}</label>
          <br>
          <div style="margin-left: 15px;">
            <ul style="list-style-type:disc;">
              @foreach($silabus as $listSilabus)
              <li>{{ $listSilabus }}</li>
              @endforeach
            </ul>
          </div>
        </div>              
      </div>
    </div>
  </div>
</div>


<div id="loadMe" class="modal">
  <form method="get" action="{{ route('Private.proses') }}">
    <input type="hidden" name="jenis_kelamin" value="{{ $data['jenis_kelamin'] }}">
    <input type="hidden" name="tingkat" value="{{ $data['tingkat'] }}">
    <input type="hidden" name="mata_pelajaran" value="{{ $data['mata_pelajaran'] }}">
    <input type="hidden" name="Pertemuan" value="{{ $data['Pertemuan'] }}">
    <input type="hidden" name="kota" value="{{ $data['kota'] }}">
    <input type="hidden" name="level" value="{{ $data['level'] }}">
    <div class="form-group">
      <label>* Nama Orang Tua Siswa</label>
      <input type="text" name="nama_orang_tua" class="form-control">
    </div>
    <div class="form-group">
      <label>* No Telp Orang Tua Siswa</label>
      <input type="text" name="no_telp_orang_tua" class="form-control">
    </div>
    <div class="form-group">
      <button type="submit" class="btn btn-primary">Konfirmasi</button>
    </div>
  </form>
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

  .section-first{
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
    margin-bottom: 20px;
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


function ProsesSekarang(){  
  $('#loadMe').modal({
    fadeDuration: 250,
  });
}

</script>
@endsection
