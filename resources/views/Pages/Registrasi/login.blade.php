@extends('layouts.FrontEnd')

@section('content')
<!-- start slider -->
<div style="width: 60%; height: 100px;">
    <div class="container">
      <!-- <p style="font-size: 24px;color: #fff;font-weight: 600;margin-top: 40px;">Lebih mudah dengan PERMATAMALL, Gabung sekarang juga</p>
      <p style="font-size: 24px;color: #fff;font-weight: 600;">dan rasakan manfaatnya</p> -->
    </div>
</div>
<!-- slider end -->
<!-- dektop -->
<div class="container desktop">
  <div class="row">
    <div class="col-md-7">
      <div class="row">
        <div class="col-md-6">
          <center>
            <img src="{!! asset('public\assets\images\icon\PlusPermataMall\apa yang anda perlukan ada di kami.png') !!}">
            <hr>
            <p>Semua yang kamu butuh kan ada di kami</p>
          </center>
        </div>
        <div class="col-md-6">
          <center>
            <img src="{!! asset('public\assets\images\icon\PlusPermataMall\Pembayaran mudah,aman,dan cepat.png') !!}">
            <hr>
            <p>Pembayaran mudah, cepat, dan aman</p>
          </center>
        </div>
        <div class="col-md-6">
          <center>
            <img src="{!! asset('public\assets\images\icon\PlusPermataMall\Promo.png') !!}">
            <hr>
            <p>Promo dan bonus menarik</p>
          </center>
        </div>
        <div class="col-md-6">
          <center>
            <img src="{!! asset('public\assets\images\icon\PlusPermataMall\Aman.png') !!}">
            <hr>
            <p>Aman dan terpercaya</p>
          </center>
        </div>
        <div class="col-md-6">
          <center>
            <img src="{!! asset('public\assets\images\icon\PlusPermataMall\Costumer Service.png') !!}">
            <hr>
            <p>Custumer service 1x24 jam yang tanggap</p>
          </center>
        </div>
        <div class="col-md-6">
          <center>
            <img src="{!! asset('public\assets\images\icon\PlusPermataMall\100.png') !!}">
            <hr>
            <p>Jaminan 100% aman</p>
          </center>
        </div>
      </div>
    </div>
    <div class="col-md-5">
      <div class="permata-search page_cari_halaman" onclick="functionGetOverlay()" >
        <div class="row">
          <div class="col-md-12">
            <div class="alert alert-warning">
              <ul>
                <li>1. Pilih Pelanggan atau Mitra</li>
                <li>2. Isi Email dan Password</li>
              </ul>
            </div>            
          </div>
          @if (session('success'))
            <div class="col-md-12">
              <div class="alert alert-success">
                {{ session('success') }}
              </div>
            </div>
          @endif
          @if (session('alert'))
              <div class="col-md-12">
                <div class="alert alert-danger">
                    {{ session('alert') }}
                </div>
              </div>
          @endif
          @if(count($errors))
            <div class="col-md-12">            
              <ul class="errors" style="background: #f00;padding: 10px 10px 10px 10px;border-radius: 5px;">
                @foreach($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
              </ul>
              <br>
              <br>
            </div>
          @endif          
          <div class="col-md-12">
            <label for="usr">Login:</label>
            <br>
            <br>
            <span style="border: 1px solid #dcdcdc;padding: 15px;border-radius: 5px; cursor: pointer;" onclick="functionSelectedMethod()"  class="functionSelectedMethod_Pelanggan @if(old('jenis_login') == 'Pelanggan') color_active @endif">
              <img src="{!! asset('public\assets\images\icon\Icon pelanggan.png') !!}" style="max-height: 30px;">
              Pelanggan / Siswa
            </span>
           <!--  <span style="border: 1px solid #dcdcdc;padding: 15px;border-radius: 5px; cursor: pointer; margin-left: 10px;" onclick="functionSelectedMethodMitra()" class="functionSelectedMethod_mitra @if(old('jenis_Login') == 'Mitra') color_active @endif">
              <img src="{!! asset('public\assets\images\icon\Icon pelanggan.png') !!}" style="max-height: 30px;">
              Mitra / Guru
            </span> -->
            <div style="margin-top: 20px;">
              <form method="post" action="{{ route('Login.check') }}">
                {{ csrf_field() }}
                <input type="hidden" name="jenis_Login" class="methode_id" value="{{ old('jenis_Login') }}">
                <div class="form-group">
                  <label for="usr">Email:</label>
                  <input type="email" class="form-control" name="email"value="{{ old('email') }}">
                </div>
                <div class="form-group">
                  <label for="usr">Password:</label>
                  <input type="password" id="password_desktop" class="form-control" name="Password"value="{{ old('password') }}">
                  <span toggle="#password_desktop" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                </div>
                <br>
                <div class="form-group">
                  <button type="submit" class="btn btn-primary">Login</button>
                  <span style="float: right;line-height: 2.7;">Lupa password <a href="{{ route('ForgotPassword.index') }}" style="font-weight: 800; color:#0064d2;">Klik disini</a></span>
                  <br>
                  <br>
                  <br>
                  <center>
                    belum punya akun <a href="{{ route('Registrasi.index') }}" style="font-weight: 800; color:#0064d2;">Registrasi disini</a>
                  </center>
                </div>
              </form>
            </div>

            <div class="form-group">
                <center><p style="font-weight: 600">Atau Dengan</p></center>
            </div>
            <div class="form-group">
              <a href="{{ route('login_provider', 'facebook') }}">
                <button class="loginBtn loginBtn--facebook">Facebook</button>
              </a>
              
              <a href="{{ route('login_provider', 'google') }}">
                <button class="loginBtn loginBtn--google">Google</button>
              </a>
              
            </div>
          </div>          
        </div> 
      </div>
    </div>
  </div>
  <div style="margin-bottom: 60px;">
    
  </div>
</div>

<!-- mobile -->
<div class="container mobile">
  <div class="row">    
    <div class="col-md-5">
      <div class="permata-search page_cari_halaman" onclick="functionGetOverlay()" >
        <div class="row">
          <div class="alert alert-warning">
            <ul>
              <li>1. Pilih Pelanggan atau Mitra</li>
              <li>2. Isi Email dan Password</li>
            </ul>
          </div>            
        </div>
        @if (session('success'))
            <div class="row">
              <div class="alert alert-success">
                  {{ session('success') }}
              </div>
            </div>
        @endif
        @if (session('alert'))
            <div class="col-md-12">
              <div class="alert alert-danger">
                  {{ session('alert') }}
              </div>
            </div>
        @endif
        @if(count($errors))
          <div class="col-md-12">            
            <ul class="errors" style="background: #f00;padding: 10px 10px 10px 10px;border-radius: 5px;">
              @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
            <br>
            <br>
          </div>
        @endif          
        <div class="row">
          <div class="col-md-12" style="padding-left: 0px; padding-right: 0px;">
            <label for="usr">Jenis Login:</label>
            <br>
            <br>
            <span style="border: 1px solid #dcdcdc;padding: 10px; border-radius: 5px; cursor: pointer;" onclick="functionSelectedMethod()"  class="functionSelectedMethod_Pelanggan @if(old('jenis_login') == 'Pelanggan') color_active @endif">
              <img src="{!! asset('public\assets\images\icon\Icon pelanggan.png') !!}" style="max-height: 13px;">
              Pelanggan / Siswa
            </span>
            <span style="border: 1px solid #dcdcdc;padding: 10px; border-radius: 5px; cursor: pointer; margin-left: 10px;" onclick="functionSelectedMethodMitra()" class="functionSelectedMethod_mitra @if(old('jenis_Login') == 'Mitra') color_active @endif">
              <img src="{!! asset('public\assets\images\icon\Icon pelanggan.png') !!}" style="max-height: 13px;">
              Mitra / Guru
            </span>
            <div style="margin-top: 20px;">
              <form method="post" action="{{ route('Login.check') }}">
                @csrf
                <input type="hidden" name="jenis_Login" class="methode_id" value="{{ old('jenis_Login') }}">
                <div class="form-group">
                  <label for="usr">Email:</label>
                  <input type="email" class="form-control" name="email"value="{{ old('email') }}">
                </div>
                <div class="form-group">
                  <label for="usr">Password:</label>
                  <input type="password" id="password_mobile" class="form-control" name="Password"value="{{ old('password') }}">
                  <span toggle="#password_mobile" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                </div>
                <br>
                <div class="form-group">
                  <button type="submit" class="btn btn-primary">Login</button>
                  <span style="float: right;line-height: 2.7;">Lupa password <a href="{{ route('ForgotPassword.index') }}" style="font-weight: 800; color:#0064d2;">Klik disini</a></span>
                  <br>
                  <br>
                  <br>
                  <center>
                    belum punya akun <a href="{{ route('Registrasi.index') }}" style="font-weight: 800; color:#0064d2;">Registrasi disini</a>
                  </center>
                </div>
              </form>
              <div class="form-group">
                <center><p style="font-weight: 600">Atau Dengan</p></center>
              </div>
              <div class="form-group">
                <a href="{{ route('login_provider', 'facebook') }}">
                  <button class="loginBtn loginBtn--facebook">Facebook</button>
                </a>
              
                <a href="{{ route('login_provider', 'google') }}">
                  <button class="loginBtn loginBtn--google">Google</button>
                </a>
              </div>
            </div>
          </div>
        </div>          
      </div> 
    </div>
  </div>
  <div class="col-md-7">
    <div class="row" style="margin-top: 60px;">
      <div class="col-md-6">
        <center>
          <img src="{!! asset('public\assets\images\icon\PlusPermataMall\apa yang anda perlukan ada di kami.png') !!}">
          <hr>
          <p>Semua yang kamu butuh kan ada di kami</p>
        </center>
      </div>
      <div class="col-md-6">
        <center>
          <img src="{!! asset('public\assets\images\icon\PlusPermataMall\Pembayaran mudah,aman,dan cepat.png') !!}">
          <hr>
          <p>Pembayaran mudah, cepat, dan aman</p>
        </center>
      </div>
      <div class="col-md-6">
        <center>
          <img src="{!! asset('public\assets\images\icon\PlusPermataMall\Promo.png') !!}">
          <hr>
          <p>Promo dan bonus menarik</p>
        </center>
      </div>
      <div class="col-md-6">
        <center>
          <img src="{!! asset('public\assets\images\icon\PlusPermataMall\Aman.png') !!}">
          <hr>
          <p>Aman dan terpercaya</p>
        </center>
      </div>
      <div class="col-md-6">
        <center>
          <img src="{!! asset('public\assets\images\icon\PlusPermataMall\Costumer Service.png') !!}">
          <hr>
          <p>Custumer service 1x24 jam yang tanggap</p>
        </center>
      </div>
      <div class="col-md-6">
        <center>
          <img src="{!! asset('public\assets\images\icon\PlusPermataMall\100.png') !!}">
          <hr>
          <p>Jaminan 100% aman</p>
        </center>
      </div>
    </div>
  </div>
</div>
<div style="margin-bottom: 60px;">
    
  </div>
</div>
@endsection
@section('script')
<style type="text/css">
.desktop{
  display: block;
}

.mobile {
  display: none;
}

.field-icon {
  float: right;
  margin-right: 10px;
  margin-top: -25px;
  position: relative;
  z-index: 2;
}

.hr-with-txt span {
    background: #fff;
    color: #888;
    display: block;
    font-size: 12px;
    text-align: center;
    padding: 0 8px;
    margin: 0 auto;
    position: relative;
    z-index: 1;
    width: -webkit-fit-content;
    width: -moz-fit-content;
    width: fit-content;
}

@media only screen and (max-width: 600px) {
  .desktop{
    display: none;
  }

  .mobile {
    display: block;
  }  
}

.errors li{
  color: #fff;
  font-weight: bold;
}
.color_active{
  background: #e3edfd;
  font-weight: bold;
}  
/* Shared */
.loginBtn {
  box-sizing: border-box;
  position: relative;
  /* width: 13em;  - apply for fixed size */
  margin: 0.2em;
  padding: 0 15px 0 46px;
  border: none;
  text-align: left;
  line-height: 34px;
  white-space: nowrap;
  border-radius: 0.2em;
  font-size: 16px;
  color: #FFF;
}
.loginBtn:before {
  content: "";
  box-sizing: border-box;
  position: absolute;
  top: 0;
  left: 0;
  width: 34px;
  height: 100%;
}
.loginBtn:focus {
  outline: none;
}
.loginBtn:active {
  box-shadow: inset 0 0 0 32px rgba(0,0,0,0.1);
}


/* Facebook */
.loginBtn--facebook {
  background-color: #4C69BA;
  background-image: linear-gradient(#4C69BA, #3B55A0);
  /*font-family: "Helvetica neue", Helvetica Neue, Helvetica, Arial, sans-serif;*/
  text-shadow: 0 -1px 0 #354C8C;
  width: 47%;
}
.loginBtn--facebook:before {
  border-right: #364e92 1px solid;
  background: url('https://s3-us-west-2.amazonaws.com/s.cdpn.io/14082/icon_facebook.png') 6px 6px no-repeat;
}
.loginBtn--facebook:hover,
.loginBtn--facebook:focus {
  background-color: #5B7BD5;
  background-image: linear-gradient(#5B7BD5, #4864B1);
}


/* Google */
.loginBtn--google {
  /*font-family: "Roboto", Roboto, arial, sans-serif;*/
  background: #DD4B39;
  width: 47.4%;
}
.loginBtn--google:before {
  border-right: #BB3F30 1px solid;
  background: url('https://s3-us-west-2.amazonaws.com/s.cdpn.io/14082/icon_google.png') 6px 6px no-repeat;
}
.loginBtn--google:hover,
.loginBtn--google:focus {
  background: #E74B37;
}  

.permata-search {
    padding: 20px 35px 40px 40px;
}
</style>
<script type="text/javascript">
    function functionSelectedMethod(){
        $('.functionSelectedMethod_Pelanggan').addClass("color_active");
        $('.functionSelectedMethod_mitra').removeClass("color_active");
        $('.methode_id').val("Pelanggan")

        $.ajax({
          type: "GET",
          url: '{{ route("jenis_user") }}',
          data: {
            jenis: 'pelanggan',
          },
          success: function(responses){
            
           }
        });
      
    }

    function functionSelectedMethodMitra(){
      $('.functionSelectedMethod_Pelanggan').removeClass("color_active");
      $('.functionSelectedMethod_mitra').addClass("color_active");
      $('.methode_id').val("Mitra")

      $.ajax({
        type: "GET",
        url: '{{ route("jenis_user") }}',
        data: {
          jenis: 'mitra',
        },
        success: function(responses){
          
         }
      });
    }

    function functionGetOverlay(){
        $('#page_selain_cari_halaman').addClass("show");
        $('.page_cari_halaman').addClass("focus");
    }

    function functionPostOverlay(){
        $('#page_selain_cari_halaman').removeClass("show");
        $('.page_cari_halaman').removeClass("focus");
    }

    $(document).ready(function(){
        $('.functionSelectedMethod_Pelanggan').addClass("color_active");
        $('.functionSelectedMethod_mitra').removeClass("color_active");
        $('.methode_id').val("Pelanggan")
    });

    $(".toggle-password").click(function() {

      $(this).toggleClass("fa-eye fa-eye-slash");
      var input = $($(this).attr("toggle"));
      if (input.attr("type") == "password") {
        input.attr("type", "text");
      } else {
        input.attr("type", "password");
      }
    });
</script>
@endsection
