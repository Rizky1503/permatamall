@extends('layouts.FrontEnd')

@section('content')
<div style="width: 100%; height: 200px; background-image: url('{!! asset('public/images/sidebar/mitra.png') !!}');">
    <div class="container">
      	<center>
          <p style="font-size: 24px;color: #fff;font-weight: 600;margin-top: 60px;">Profil</p>
      	</center>          
    </div>
</div>
<div class="container" style="padding-top:10px; padding-bottom: 50px;">
  <div class="row">
    <div class="col-md-3">
      <div class="panel panel-default">
        <div class="panel-body">
          <a href="{{ route('Profile.index') }}" class="btn btn-profile btn-profile-active">
            <i class="fa fa-user icon-profile"></i> Profil
          </a>
          <br>
          <a href="{{ route('Profile.password') }}" class="btn btn-profile">
            <i class="fa fa-key icon-profile"></i> Ubah Password
          </a>
          <br>
          <a href="{{ route('Profile.edit') }}" class="btn btn-profile">
            <i class="fa fa-user-plus icon-profile"></i> Ubah Profil
          </a>
        </div>
      </div>
    </div>
    <div class="col-md-9">
        <div class="panel panel-default">
            <div class="panel-body" style="min-height: 400px;">
                <p>
                  <?php
                  if ($Data->foto != "") {
                    $foto = ENV('APP_URL_API_RESOURCE').'images/profile/pelanggan/'.$Data->foto;
                  }else{
                    $foto = asset('public/assets/images/not-found.png'); //not-found.png
                  }
                  ?>
                  <span style="float: right;">
                    <a href="{{ route('Profile.edit') }}" class="btn btn-warning"> <i class="fa fa-pencil"></i> Ubah Profil</a>
                  </span>
                  <span class="heading-profile"><i class="fa fa-file-image-o icon-profile"></i> Foto Profil</span><br>
                  <span style="background-color: #41c866;padding: 3px;width: 100px;display: block;border-radius: 10px;">
                    <img src="{{ $foto }}" style="width: 100px; border-radius: 10%; height: 100px;">
                  </span>
                </p>
                <p>
                  <span class="heading-profile"><i class="fa fa-user icon-profile"></i> Nama Lengkap</span><br>
                  <span>{{ $Data->nama }}</span>
                </p>
                <p>
                  <span class="heading-profile"><i class="fa fa-envelope icon-profile"></i> Email</span><br>
                  <span>{{ $Data->email }}</span>
                </p>
                <p>
                  <span class="heading-profile"><i class="fa fa-mobile icon-profile"></i> No Telpon</span><br>
                  <span>{{ $Data->no_telpon }}</span>
                </p>
                <p>
                  <span class="heading-profile"><i class="fa fa-map-marker icon-profile"></i> Alamat</span><br>
                  <span>{{ $Data->alamat }}</span>
                </p>
            </div>
        </div>
    </div>
  </div>
</div>
@endsection
@section('script')
<style type="text/css">
  .icon-profile{
    border: 1px solid;
    border-radius: 50%;
    width: 20px;
    height: 20px;
    text-align: center;
    padding-top: 1px;
  }

  .btn-profile{
    width: 100%;
    background-color: #fff;
    text-align: left;
  }

  .btn-profile:hover{
    background-color: #328c4a;
    color: #fff;
  }

  .btn-profile-active{
    background-color: #41c866;
    color: #fff;
  }

  .heading-profile{
    /*font-size: 18px;*/
    font-weight: 700;
    color: #434343;
  }
</style>
<!-- <script type="text/javascript">
var ws = new WebSocket('ws://127.0.0.1:9300');

ws.onopen = function(evt) { 
  console.log("Connection open ..."); 
  ws.send("Hello WebSockets!");
};

ws.onmessage = function(evt) {
  alert("Fdsaf");
  console.log( "Received Message: " + evt.data);
  ws.close();
};

// ws.onclose = function(evt) {
//   console.log("Connection closed.");
// };   
</script> -->
@endsection
