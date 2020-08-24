@extends('mitra::layouts.master-v2')

@section('content')

<div class="m-portlet m-portlet--tab">
  <form method="post" action="{{ route('Mitra.Profile.StoreProfile') }}" enctype="multipart/form-data" class="m-form m-form--fit m-form--label-align-right">
    @csrf
    <div class="m-portlet__body">
      @if(count($errors))
      <div class="form-group m-form__group">        
        <div class="row">
          <div class="col-md-12">            
            <ul class="errors" style="background: #f00;padding: 10px 10px 10px 10px;border-radius: 5px; color: #fff">
              @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
            <br>
            <br>
          </div>  
        </div>
      </div> 
      @endif

      <div class="form-group m-form__group">
          <div class="row">
            <div class="col-md-6">
              <label for="usr">Nama Lengkap:</label>
              <input type="text" name="nama_lengkap" class="form-control m-input m-input--solid" value="{{ $Profile->nama ?? old('nama_lengkap') }}">
            </div>
            <div class="col-md-6">
              <label for="usr">Email:</label>
              <input type="text" name="email" class="form-control m-input m-input--solid" value="{{ $Profile->email ?? old('email') }}" disabled="disabled">
            </div>
          </div>
      </div> 


      <div class="form-group m-form__group">
          <div class="row">
            <div class="col-md-6">
              <label for="usr">No Telpon:</label>                   
              <input type="text" name="no_telpon" class="form-control m-input m-input--solid" value="{{ $Profile->no_telpon ?? old('no_telpon') }}"> 
            </div>
            <div class="col-md-6">
              <label for="usr">Jenis Kelamin:</label>                   
              <select name="jenis_kelamin" class="form-control m-input m-input--solid">
                <option value="">Pilih jenis kelamin</option>  
                <option value="L" @if($Profile->jenis_kelamin == "L") selected @endif>Laki Laki</option>  
                <option value="P" @if($Profile->jenis_kelamin == "P") selected @endif>Perempuan</option>  
              </select> 
            </div>
          </div>
      </div> 

      <div class="form-group m-form__group">
          <div class="row">
            <div class="col-md-6">
              <label for="usr">Nama Pemilik Rekening:</label>
              <input type="text" name="nama_pemilih_rekening" class="form-control m-input m-input--solid" value="{{ $Profile->pemilik_rek ?? old('nama_pemilih_rekening') }}" placeholder="ex: jhon (BCA)"> 
            </div>
            <div class="col-md-6">
              <label for="usr">No Pemilik rekening:</label>
              <input type="text" name="no_pemilik_rekening" class="form-control m-input m-input--solid" value="{{ $Profile->no_rek ?? old('no_pemilik_rekening') }}" placeholder="EX: 543233232"> 
            </div>
          </div>
      </div> 


      <div class="form-group m-form__group">
          <div class="row">
            <div class="col-md-6">
              <label for="usr">Kota Lahir:</label>
              <select class="form-control m-input m-input--solid m-select2" name="kota">
                <option value="">Pilih Kota</option>
                @foreach($kotaList as $listkota)
                <option value="{{ $listkota }}" @if($Profile->kota == $listkota) selected @endif>{{ $listkota }}</option>
                @endforeach
              </select> 
            </div>
            <div class="col-md-6">
              <label for="usr">Alamat:</label>
              <textarea class="form-control m-input m-input--solid" name="alamat">{{ $Profile->alamat ?? old('alamat') }}</textarea> 
            </div>
          </div>
      </div>

      <div class="form-group m-form__group">
          <div class="row">
            <div class="col-md-6">
              <label for="usr">Foto Profile:</label>
              <div class="avatar-upload">
                <div class="avatar-edit">
                  <input type="hidden" name="last_name" value="{{ $Profile->foto_profile }}">
                  <input type='file' id="imageUpload" accept=".png, .jpg, .jpeg" name="foto_profile"/>
                  <label for="imageUpload"></label>
                </div>
                <div class="avatar-preview">
                  <div id="imagePreview" style="background-image: url({{ ENV('APP_URL_API_RESOURCE').'images/mitra/document/mitra/'.$Profile->id_mitra.'/'.$Profile->foto_profile }});">
                  </div>
                </div>
              </div> 
            </div>            
          </div>
      </div> 


      <div class="form-group m-form__group">
        <label for="usr">Dokumen Kelengkapan:</label>
        <hr>
        <div class="row">
          <div class="col-md-4">
            <p>Foto Selfi KTP</p>
            <img src="{{ ENV('APP_URL_API_RESOURCE').'images/mitra/document/mitra/'.$Profile->id_mitra.'/'.$Profile->foto }}" style="max-width: 100%">
          </div>
          <div class="col-md-4">
            <p>Curiculum Vitae</p>
            <img src="{{ ENV('APP_URL_API_RESOURCE').'images/mitra/document/mitra/'.$Profile->id_mitra.'/'.$Profile->cv }}" style="max-width: 100%">
          </div>
          <div class="col-md-4">
            <p>Sertifikat</p>
            <img src="{{ ENV('APP_URL_API_RESOURCE').'images/mitra/document/mitra/'.$Profile->id_mitra.'/'.$Profile->sertifikat }}" style="max-width: 100%">
          </div>              
        </div>
      </div> 


      

    </div>
    <div class="m-portlet__foot m-portlet__foot--fit">
      <div class="m-form__actions">
        <button type="submit" class="btn btn-primary">
          Ubah Profile
        </button>
      </div>
    </div>
  </form>
  <!--end::Form-->
</div>
@stop
@section('script')
<style type="text/css">
@media only screen and (max-width: 600px) {
  form{
    width: 109%;
  }
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
    Swal.fire({
        position: 'center',
        type: 'error',
        title: 'Error!',
        text: "Foto yang kamu upload "+ mb.toFixed(2)+" MB, maksimal upload yang di izinkan 1 MB",
        showConfirmButton: true,
        timer: 3000
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
      Swal.fire({
          position: 'center',
          type: 'error',
          title: 'Error!',
          text: "File yang di ijinkan hanya format .jpeg .jpg dan .png",
          showConfirmButton: true,
          timer: 3000
      });
      fileInput.value = '';
      return false;
    }
}
</script>
@endsection

