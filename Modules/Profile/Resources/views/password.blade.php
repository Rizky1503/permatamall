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
          <a href="{{ route('Profile.password') }}" class="btn btn-profile btn-profile-active">
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
            <div class="col-md-8"> 

              <form id="myform">
                @csrf
                  <div class="form-group">
                    <label for="pwd">Password Lama:</label>
                    <input type="password" name="old_password" id="old_password" class="form-control">
                  </div>
                 <div class="form-group">
                  <label for="pwd">Password Baru:</label>
                  <input type="password" name="password" id="password" class="form-control">
                </div>

                <div class="form-group">
                  <label for="pwd">Konfirm Password Baru:</label>
                  <input type="password" name="konfirm" id="konfirm" class="form-control">
                </div>

                <button type="submit" class="btn btn-primary">Ubah Password</button>
              </form>

            </div>  
          </div>
        </div>
    </div>
  </div>
</div>
@endsection
@section('script')

<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.js"></script>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.14.0/jquery.validate.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>

<script type="text/javascript">

  $(document).ready(function() {  
      $("#myform").validate({  
            rules: {
              old_password: {
                required: true,
              },
              password: {
                required: true,
                minlength: 6
              },
              konfirm: {
                required: true,
                minlength: 6,
                equalTo: "#password"
              },
            },
            messages: {
              old_password: {
                required: "Password Lama Tidak Boleh Kosong",
                minlength: "Password Lama Minimal 6 Karakter"
              },
              password: {
                required: "Password Baru Tidak Boleh Kosong",
                minlength: "Password Lama Minimal 6 Karakter"
              },
              konfirm: {
                required: "Konfirmasi Password Tidak Boleh Kosong",
                minlength: "Konfirmasi Password Minimal 6 Karakter",
                equalTo: "Konfirmasi Password Harus Sama Dengan Password Baru"
              },   
            },
            submitHandler: function(){
              var data = $('#myform').serialize();
               $.ajax({
                 type: "GET",
                 url: '{{ route("Profile.cek_password") }}',
                 data: data,
                 success: function(responses){
                   if(responses === 'sama'){
                      change_password();
                   }else if(responses === 'beda'){
                      swal({
                          title: "Error",
                          text: "Password Lama Tidak Sama",
                          icon: "error",
                          buttons: false,
                          dangerMode: true,
                        })
                   }
                 }
               });
            } 
      });  
  });

  function change_password(){
    var data = $('#myform').serialize();

    $.ajax({
        type: "POST",
        url: '{{ route("Profile.change_password") }}',
        data: data,
        success: function(responses){
            swal({
              title: "Ganti Password",
              text: "Password Berhasil Di Ganti Untuk Aplikasi Web, Android, dan IOS",
              icon: "success",
              buttons: true,
              dangerMode: true,
            });
            setInterval(function(){ location.reload(); }, 5500);
            
        }
      });

    
    // swal({
    //   title: "Yakin Ganti Password?",
    //   text: "Apa Kamu Akan Mengganti Password?",
    //   icon: "warning",
    //   buttons: true,
    //   dangerMode: true,
    // })
    // .then((willChange) => {
    //   if (willChange) {
    //   $.ajax({
    //     type: "POST",
    //     url: '{{ route("Profile.change_password") }}',
    //     data: data,
    //     success: function(responses){
    //       console.log('berhasil');
    //     }
    //   });

    //   swal({
    //       title: "Ganti Password",
    //       text: "Password Berhasil Di Ganti",
    //       icon: "success",
    //       buttons: true,
    //       dangerMode: true,
    //     });
    //   } else {
        
    //   }
    // });

    // $.ajax({
    //   type: "POST",
    //   url: '{{ route("Profile.change_password") }}',
    //   data: data,
    //   success: function(responses){
    //     swal({
    //       title: "Ganti Password",
    //       text: "Password Berhasil Di hapus",
    //       icon: "success",
    //       buttons: true,
    //       dangerMode: true,
    //     })
    //    }
    // });
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

  .label{
    color: red; 
  }

  .errors li{
    color: #fff;
    font-weight: bold;
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
