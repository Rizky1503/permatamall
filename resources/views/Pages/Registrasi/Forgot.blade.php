@extends('layouts.FrontEnd')

@section('content')
<!-- start slider -->
<div style="width: 100%; height: 200px; background-color: #3eb960">
    <div class="container">
      <p style="font-size: 24px;color: #fff;font-weight: 600;margin-top: 40px;">Lebih mudah dengan PERMATAMALL, Gabung sekarang juga</p>
      <p style="font-size: 24px;color: #fff;font-weight: 600;">dan rasakan manfaatnya</p>
    </div>
</div>
<!-- slider end -->
<!-- dektop -->
<div class="container desktop">
  <div class="row">
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
    <div class="col-md-5">
      <div class="permata-search page_cari_halaman" onclick="functionGetOverlay()" >
        <div class="row">
          <div class="col-md-12">
            <div class="alert alert-warning">
              <ul>
                <li>Silahkan Member dan masukan email yang terdaftar</li>
              </ul>
            </div>            
          </div>
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
            <label for="usr">Member:</label>
            <br>
            <br>
            <span style="border: 1px solid #dcdcdc;padding: 20px;border-radius: 5px; cursor: pointer;" onclick="functionSelectedMethod()"  class="functionSelectedMethod_Pelanggan @if(old('jenis_login') == 'Pelanggan') color_active @endif">
              <img src="{!! asset('public\assets\images\icon\Icon pelanggan.png') !!}" style="max-height: 40px;">
              Pelanggan
            </span>
            <span style="border: 1px solid #dcdcdc;padding: 20px;border-radius: 5px; cursor: pointer; margin-left: 10px;" onclick="functionSelectedMethodMitra()" class="functionSelectedMethod_mitra @if(old('jenis_login') == 'Mitra') color_active @endif">
              <img src="{!! asset('public\assets\images\icon\Icon pelanggan.png') !!}" style="max-height: 40px;">
              Mitra / Guru
            </span>
            <div style="margin-top: 20px;">
              <form id="form_desktop">
                @csrf
                <input type="hidden" name="jenis_login" class="methode_id" value="{{ old('jenis_login') }}">
                <div class="form-group">
                  <label for="usr">Email:</label>
                  <input type="email" class="form-control" name="email"value="{{ old('email') }}">
                </div>
                <br>
                <div class="form-group">
                  <button type="button" class="btn btn-primary" onclick="functionSubmitEmailDesktop()">Kirim ke email</button>
                  <span style="float: right;line-height: 2.7;"><a href="{{ route('ForgotPassword.index') }}" style="font-weight: 800; color:#0064d2;">Kembali ke halaman login</a></span>
                  <br>
                  <br>
                  <br>
                </div>
              </form>
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
              <li>Silahkan Member dan masukan email yang terdaftar</li>
            </ul>
          </div>            
        </div>
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
              Pelanggan
            </span>
            <span style="border: 1px solid #dcdcdc;padding: 10px; border-radius: 5px; cursor: pointer; margin-left: 10px;" onclick="functionSelectedMethodMitra()" class="functionSelectedMethod_mitra @if(old('jenis_login') == 'Mitra') color_active @endif">
              <img src="{!! asset('public\assets\images\icon\Icon pelanggan.png') !!}" style="max-height: 13px;">
              Mitra / Guru
            </span>
            <div style="margin-top: 20px;">
              <form id="form_mobile">
                @csrf
                <input type="hidden" name="jenis_login" class="methode_id" value="{{ old('jenis_login') }}">
                <div class="form-group">
                  <label for="usr">Email:</label>
                  <input type="email" class="form-control" name="email"value="{{ old('email') }}">
                </div>
                <br>
                <div class="form-group">
                  <button type="button" class="btn btn-primary" onclick="functionSubmitEmailMobile()">Kirim ke email</button>
                  <span style="float: right;line-height: 2.7;"><a href="{{ route('ForgotPassword.index') }}" style="font-weight: 800; color:#0064d2;">Kembali ke halaman login</a></span>
                  <br>
                  <br>
                  <br>
                </div>
              </form>              
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

.permata-search {
    padding: 20px 35px 40px 40px;
}
</style>
<script type="text/javascript">
  function functionSubmitEmailDesktop(){
    Swal.fire({
      onBeforeOpen: () => {
        Swal.showLoading()
        timerInterval = setInterval(() => {
        Swal.getContent().querySelector('strong')
          .textContent = Swal.getTimerLeft()
        }, 100)
      },
      title: 'Sedang proses',
      showConfirmButton: false,
    
    })
    var form = $('#form_desktop').serialize();
    console.log(form);
    $.ajax({
      type: "POST",
      url: "{{ route('ApiForgotPassword.index') }}",
      data: form,
      success: function(data) {
        if (data == "tidak") {
          if (form.jenis_login == "Pelanggan") {
            Swal.fire({
              position: 'center',
              type: 'error',
              title: 'Mohon Maaf',
              text: 'Email Pelanggan tidak di temukan',
              showConfirmButton: false,
              timer: 1000
            });            
          }else{
            Swal.fire({
              position: 'center',
              type: 'error',
              title: 'Mohon Maaf',
              text: 'Email Mitra / Guru tidak di temukan',
              showConfirmButton: false,
              timer: 1000
            });                        
          }
        }else{
          Swal.fire({
            position: 'center',
            type: 'success',
            title: 'Terima Kasih',
            text: 'Link perubahan password sudah terkirim ke email',
            showConfirmButton: false,
            timer: 4000
          }).then(function() {
            window.location.href = "{{ route('Login.index') }}";
          });
        }
      }
    });
  }

  function functionSubmitEmailMobile(){
    Swal.fire({
      onBeforeOpen: () => {
        Swal.showLoading()
        timerInterval = setInterval(() => {
        Swal.getContent().querySelector('strong')
          .textContent = Swal.getTimerLeft()
        }, 100)
      },
      title: 'Sedang proses',
      showConfirmButton: false,
    
    })
    var form = $('#form_mobile').serialize();
    console.log(form);
    $.ajax({
      type: "POST",
      url: "{{ ENV('APP_URL_API').'web/profile/forgot' }}",
      data: form,
      success: function(data) {
        if (data == "tidak") {
          if (form.jenis_login == "Pelanggan") {
            Swal.fire({
              position: 'center',
              type: 'error',
              title: 'Mohon Maaf',
              text: 'Email Pelanggan tidak di temukan',
              showConfirmButton: false,
              timer: 1000
            });            
          }else{
            Swal.fire({
              position: 'center',
              type: 'error',
              title: 'Mohon Maaf',
              text: 'Email Mitra / Guru tidak di temukan',
              showConfirmButton: false,
              timer: 1000
            });                        
          }
        }else{
          Swal.fire({
            position: 'center',
            type: 'success',
            title: 'Terima Kasih',
            text: 'Link perubahan password sudah terkirim ke email',
            showConfirmButton: false,
            timer: 4000
          }).then(function() {
            window.location.href = "{{ route('Login.index') }}";
          });
        }
      }
    });
  }


    function functionSelectedMethod(){
        $('.functionSelectedMethod_Pelanggan').addClass("color_active");
        $('.functionSelectedMethod_mitra').removeClass("color_active");
        $('.methode_id').val("Pelanggan")
      
    }

    function functionSelectedMethodMitra(){
      $('.functionSelectedMethod_Pelanggan').removeClass("color_active");
      $('.functionSelectedMethod_mitra').addClass("color_active");
      $('.methode_id').val("Mitra")
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
</script>
@endsection
