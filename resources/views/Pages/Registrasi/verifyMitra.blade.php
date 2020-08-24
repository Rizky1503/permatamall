@extends('layouts.FrontEnd')

@section('content')
<!-- start slider -->
<div style="width: 100%; height: 200px; background-color: #3eb960">
    <div class="container">
      <p style="font-size: 24px;color: #fff;font-weight: 600;margin-top: 40px; text-align: center;">
          Verifikasi Email
      </p>
    </div>
</div>
<!-- slider end -->
<div class="container">
  <div class="row">    
    <div class="col-md-12">
      <div class="permata-search">
        <div class="row">
          <div class="col-md-2">
            <img src="{!! asset('public/assets/images/icon/icon/email_verifikasi.png') !!}" width="300">       
          </div>
          <div class="col-md-10">
            <span style="font-size: 18px;">
              Mohon cek email untuk verifikasi terlebih dahulu
            </span>
            <br>
            <button class="btn btn-warning" style="margin-top: 10px;" onclick="functionSendEmail()">Kirim ulang Email</button>
          </div>
        </div>        
      </div>
    </div>
  </div>
  <div style="margin-bottom: 60px;">
    
  </div>
</div>
@endsection
@section('script')
<script type="text/javascript">
  function functionSendEmail(){
    Swal.fire({
      onBeforeOpen: () => {
        Swal.showLoading()
        timerInterval = setInterval(() => {
        Swal.getContent().querySelector('strong')
          .textContent = Swal.getTimerLeft()
        }, 100)
      },
      title: 'Sedang proses',
      text: 'Mohon tunggu ,sedang dalam proses',
      showConfirmButton: false,
    
    })
    $.ajax({
      type: "GET",
      url: '{{ route("EmailVerifyMitra.request") }}',
      data:"requested",
      success: function(responses){
        if (responses == "Berhasil") {
          Swal.fire({
              position: 'center',
              type: 'success',
              title: 'Email Terkirim',
              text: 'Silahkan cek email untuk verifikasi',
              showConfirmButton: true,
              timer: 15000
          })
        }else{
          Swal.fire({
              position: 'center',
              type: 'error',
              title: 'Email tidak terkirim',
              text: 'Batas maksimal kirim email 4 kali dalam satu jam,silahkan lakukan kembali di jam berikutnya',
              showConfirmButton: true,
              timer: 1500
          });
        }
      }
    });
  }
</script>
@endsection
