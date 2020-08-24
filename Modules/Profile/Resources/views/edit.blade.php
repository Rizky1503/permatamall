@extends('layouts.FrontEnd')

@section('content')
<div style="width: 100%; height: 200px; background-image: url('{!! asset('public/images/sidebar/mitra.png') !!}');">
    <div class="container">
      	<center>
          <p style="font-size: 24px;color: #fff;font-weight: 600;margin-top: 60px;">Profile Saya</p>
      	</center>          
    </div>
</div>
<div class="container" style="padding-top:10px; padding-bottom: 50px;">
  <div class="row">
    <div class="col-md-3">
      <div class="panel panel-default">
        <div class="panel-body">
          <a href="{{ route('Profile.index') }}" class="btn btn-profile">
            <i class="fa fa-user icon-profile"></i> Profil
          </a>
          <br>
          <a href="{{ route('Profile.password') }}" class="btn btn-profile">
            <i class="fa fa-key icon-profile"></i> Ubah Password
          </a>
          <br>
          <a href="{{ route('Profile.edit') }}" class="btn btn-profile btn-profile-active">
            <i class="fa fa-user-plus icon-profile"></i> Ubah Profil
          </a>
        </div>
      </div>
    </div>
    <div class="col-md-9">
        <div class="panel panel-default">
            <div class="panel-body" style="min-height: 400px;">
                <form action="{{ route('Profile.store') }}" method="post" enctype="multipart/form-data">
                  @csrf
                  <div class="form-group">
                    <label for="email">Foto Profil:</label>
                    <div class="avatar-upload">
                      <div class="avatar-edit">
                        <input type="hidden" name="image_last" value="{{ $Data->foto }}">
                        <input type='file' id="imageUpload" accept=".png, .jpg, .jpeg" name="foto_profile"/>
                        <label for="imageUpload"></label>
                      </div>
                      <div class="avatar-preview">
                        <?php
                        if ($Data->foto != "") {
                          $foto = ENV('APP_URL_API_RESOURCE').'images/profile/pelanggan/'.$Data->foto;
                        }else{
                          $foto = asset('public/assets/images/not-found.png'); //not-found.png
                        }
                        ?>
                        <div id="imagePreview" style="background-image: url({{ $foto }});">
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="pwd">Nama Lengkap:</label>
                    <input type="text" name="nama_lengkap" class="form-control" id="pwd" value="{{ $Data->nama }}">
                  </div>
                  <div class="form-group">
                    <label for="pwd">No telpon:</label>
                    <input type="text" name="no_telpon" class="form-control" id="pwd" value="{{ $Data->no_telpon }}">
                  </div>
                  <div class="form-group">
                    <label for="pwd">Alamat:</label>
                    <textarea class="form-control" name="alamat">{!! $Data->alamat !!}</textarea>
                  </div>
                  <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
  </div>
</div>
@endsection
@section('script')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script type="text/javascript">
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#imagePreview').css('background-image', 'url('+e.target.result +')');
            $('#imagePreview').hide();
            $('#imagePreview').fadeIn(650);
        }
        reader.readAsDataURL(input.files[0]);
    }
}
$('#imageUpload').bind('change', function() {
  fileValidation(this.id);
  var mb = this.files[0].size / 1024 / 1024;
  if (mb > 3) {
    swal({
      title: "Error!",
      text: "Foto yang kamu upload "+ mb.toFixed(2)+" MB, maksimal upload yang di izinkan 1 MB",
      icon: "error",
    });
    this.value = "";
    $('#imagePreview').css('background-image', 'url({!! asset("public/assets/images/not-found.png") !!})');
    $('#imagePreview').hide();
    $('#imagePreview').fadeIn(650);
  }else{
    readURL(this);
  }
});


function fileValidation(response){
    var fileInput = document.getElementById(response);
    var filePath = fileInput.value;
    var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;
    if(!allowedExtensions.exec(filePath)){
      swal({
      title: "Error!",
      text: "File yang di ijinkan hanya format .jpeg .jpg dan .png",
      icon: "error",
    });
        fileInput.value = '';
        return false;
    }
}
</script>
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

  .avatar-upload {
    position: relative;
    max-width: 205px;
  }
  .avatar-upload .avatar-edit {
    position: absolute;
    right: 12px;
    z-index: 1;
    top: 10px;
  }
  .avatar-upload .avatar-edit input {
    display: none;
  }
  .avatar-upload .avatar-edit input + label {
    display: inline-block;
    width: 34px;
    height: 34px;
    margin-bottom: 0;
    border-radius: 100%;
    background: #FFFFFF;
    border: 1px solid transparent;
    box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.12);
    cursor: pointer;
    font-weight: normal;
    transition: all 0.2s ease-in-out;
  }
  .avatar-upload .avatar-edit input + label:hover {
    background: #f1f1f1;
    border-color: #d6d6d6;
  }
  .avatar-upload .avatar-edit input + label:after {
    content: "\f040";
    font-family: 'FontAwesome';
    color: #757575;
    position: absolute;
    top: 10px;
    left: 0;
    right: 0;
    text-align: center;
    margin: auto;
  }
  .avatar-upload .avatar-preview {
    width: 192px;
    height: 192px;
    position: relative;
    border-radius: 10%;
    border: 6px solid #F8F8F8;
    box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.1);
  }
  .avatar-upload .avatar-preview > div {
    width: 100%;
    height: 100%;
    border-radius: 10%;
    background-size: cover;
    background-repeat: no-repeat;
    background-position: center;
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
