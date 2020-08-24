@extends('layouts.FrontEnd')

@section('content')

<style>
.tab-content {
  background: #fdfdfd;
  line-height: 25px;
  border: 1px solid #ddd;
  border-top: 5px solid #dddddd;
  border-bottom: 5px solid #dddddd;
  padding: 30px 25px;
  min-height: 500px;
}
.button {
  color: #fdfdfd;
    background-color: #4ec37c;
    border: 1px solid #b8e0f6;
    border-radius: 25px;
    width: 26%;
    min-width: 173px;
    padding: 10px;
    margin-top: 31px;
}
.line{
  border-left: 3px solid #4ab1ac;
  margin-right: 10px;
}
</style>
<div class="container" style="margin-top: 20px;">
  <br><br>
  <div class="tab-content">
  <div id="info1" class="tab-pane fade in active">
			<div class="form-group">
				<font style="color: red">* Semua data yang diinformasikan wajib <b>BENAR</b></font>
			</div>
      
      <div class="col-md-12">
        <div class="row">
          <div class="form-group">
          <h3>
            <span class="line"></span>Data Murid :
          </h3>
          </div>
        </div>
      </div>

      <div class="col-md-12">
        <div class="row">
          <div class="form-group">
            <div class="col-md-6">
              <label>Nama Lengkap Murid</label>
              <input type="text" name="name" id="name" class="form-control" placeholder="" required="">
              <span style="color:red;display:none;font-size: 10px;" id="alert_name"><i>* Nama Lengkap Murid wajib diisi</i></span>
            </div>
            <div class="col-md-6">
              <label>Nomor Telepon Murid</label>
              <div class="input-prepend input-group">
                <span class="add-on input-group-addon">+62</span>
                <input type="number" name="phone" id="phone" class="form-control" placeholder="Nomor Telepon" required="">
              </div>
                <span style="color:red;font-size: 10px;" id="message"></span>
                <span style="color:red;display:none;font-size: 10px;" id="alert_phone"><i>* Nomor Telepon/HP wajib diisi</i></span>
            </div>
            <div class="col-md-12">
              <label>Alamat Lengkap</label>
              <input type="text" name="name" id="name" class="form-control" placeholder="" required="">
              <span style="color:red;display:none;font-size: 10px;" id="alert_name"><i>* Alamat Lengkap Murid wajib diisi</i></span>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-12">
        <div class="row">
          <div class="form-group">
          <h3>
            <span class="line"></span>Data Orang Tua Murid :
          </h3>
          </div>
        </div>
      </div>
			
      <div class="col-md-12">
        <div class="row">
          <div class="form-group">
            <div class="col-md-6">
              <label>Nama Lengkap Orang Tua</label>
              <input type="text" name="name" id="name" class="form-control" placeholder="" required="">
              <span style="color:red;display:none;font-size: 10px;" id="alert_name"><i>* Nama Lengkap Orang Tua wajib diisi</i></span>
            </div>
            <div class="col-md-6">
              <label>Nomor Telepon Orang Tua</label>
              <div class="input-prepend input-group">
                <span class="add-on input-group-addon">+62</span>
                <input type="number" name="phone" id="phone" class="form-control" placeholder="Nomor Telepon" required="">
              </div>
                <span style="color:red;font-size: 10px;" id="message"></span>
                <span style="color:red;display:none;font-size: 10px;" id="alert_phone"><i>* Nomor Telepon/HP wajib diisi</i></span>
            </div>
          </div>
        </div>
      </div>
    
      <div class="col-md-12">
        <div class="row">
          <div class="form-group">
            <div class="text-center">
              <p><button id="submit-form" type="button" class="btn button">Daftar</button></p>
            </div>
          </div>
        </div>
      </div>			
		</div>
  </div>
  <br><br>
</div>
@endsection
@section('script')
@endsection
