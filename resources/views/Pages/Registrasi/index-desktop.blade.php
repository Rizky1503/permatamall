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
      <div class="permata-search page_cari_halaman">
        <div class="row">
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
            <label for="usr">Jenis Registrasi:</label>
            <br>
            <br>
            <span style="border: 1px solid #dcdcdc;padding: 20px;border-radius: 5px; cursor: pointer;" onclick="functionSelectedMethod()"  class="functionSelectedMethod_Pelanggan @if(old('jenis_registrasi') == 'Pelanggan') color_active @endif">
              <img src="{!! asset('public\assets\images\icon\Icon pelanggan.png') !!}" style="max-height: 30px;">
              Pelanggan / Siswa
            </span>
            <!-- <span style="border: 1px solid #dcdcdc;padding: 20px;border-radius: 5px; cursor: pointer; margin-left: 10px;" onclick="functionSelectedMethodMitra()" class="functionSelectedMethod_mitra @if(old('jenis_registrasi') == 'Mitra') color_active @endif">
              <img src="{!! asset('public\assets\images\icon\Icon pelanggan.png') !!}" style="max-height: 30px;">
              Mitra / Guru
            </span> -->
            <div style="margin-top: 20px;">
              <form method="post" action="{{ route('Registrasi.check') }}">
                @csrf
                <input type="hidden" name="jenis_registrasi" class="methode_id" value="{{ old('jenis_registrasi') }}">
                <div class="form-group">
                  <label for="usr" class="level_login_value">Nama Lengkap Pelanggan/Siswa:</label>
                  <input type="text" class="form-control" name="nama_lengkap" value="{{ old('nama_lengkap') }}" placeholder="ex: jhon">
                </div>
                <div class="form-group">
                  <label for="usr">No Telp:</label>
                  <input type="number" class="form-control" name="no_telp"value="{{ old('no_telp') }}" placeholder="ex: 08212345432">
                </div>
                <div class="form-group">
                  <label for="usr">Email:</label>
                  <input type="email" class="form-control" name="email"value="{{ old('email') }}" placeholder="ex: jhon@example.com">
                </div>
                <div class="form-group">
                  <label for="usr">Password:</label>
                  <input type="password" id="password_desktop" class="form-control password" name="Password"value="{{ old('password') }}" placeholder="*****">
                  <span toggle="#password_desktop" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                  <ul class="helper-text">
                    <li class="length">Minimal 6 karakter</li>
                  </ul>
                </div>
                <div class="form-group">
                  <label for="usr">Alamat:</label>
                  <textarea rows="4" cols="50" name="alamat" class="form-control" placeholder="masukan alamat lengkap">{{ old('alamat') }}</textarea>
                </div>
                <div class="form-group">
                  <label class="container-checked">Setuju dengan <a href="#pelanggan" style="color: #f00">syarat dan ketentuan</a> yang berlaku
                    <input type="checkbox" id="checkbox-data" onclick="functionCheckbox()">
                    <span class="checkmark"></span>
                  </label>
                </div>
                <br>
                <div class="form-group">
                  <button type="submit" class="btn btn-success" id="submit-registrasi-desktop" disabled="disabled">Registrasi</button>
                  <span style="float: right;line-height: 2.7;">sudah punya akun <a href="{{ route('Login.index') }}" style="font-weight: 800; color:#0064d2;">Login disini</a></span>
                  <br>
                  <br>
                  <br>
                </div>
                <input type="hidden" name="lat" id="lat" value="">
                <input type="hidden" name="long" id="long" value="">
              </form>

              <!-- <div class="form-group">
                <center><p style="font-weight: 600">Atau Dengan</p></center>
              </div>
              <div class="form-group">
                <button class="loginBtn loginBtn--facebook">
                  Facebook
                </button>

                <button class="loginBtn loginBtn--google">
                  Google
                </button>
              </div> -->
            </div>
          </div>          
        </div> 
      </div>
    </div>
  </div>
  <div style="margin-bottom: 60px;">
    
  </div>
</div>

<style type="text/css">
  .container-checked input {
      position: absolute;
      opacity: 0;
      cursor: pointer;
      height: 0;
      width: 0;
  }
</style>

