@extends('layouts.FrontEnd')

@section('content')
<!-- start slider -->
<div style="width: 100%; height: 200px; background-image: url('{!! asset('public/images/sidebar/login.png') !!}');">
    <div class="container">
      
    </div>
</div>
<!-- slider end -->
@include('Pages.Registrasi.index-desktop')
@include('Pages.Registrasi.index-mobile')

<div id="pelanggan" class="modal" style="margin-top: 60px;">
  <center><span style="font-size: 16px;font-weight: bold;">Syarat Dan Ketentuan <strong id="header-member"></strong></span></center>
  <hr>
  <div id="body-member-pelanggan" style="display: none;">
    <p><strong>Murid</strong></p>
    <p>Permatamall.com adalah sebuah platform yang menghubungkan pelajar dengan pengajar yang tepat untuk membantu siswa mempelajari keahlian/ pengetahuan baru, mendapatkan bantuan tambahan di luar sekolah/ kampus, maupun mengembangkan keahlian tertentu. Aplikasi dan situs Permatamall ini dikelola oleh PT. Permata Mall Nusantara.</p>
    <p>Dengan mengakses dan menggunakan aplikasi dan situs Permatamall serta mendaftar menjadi Murid di Permatamall, berarti Anda telah memahami dan menyetujui untuk terikat dan tunduk dengan semua peraturan yang berlaku di Permatamall.</p>
    <ol>
        <li><strong>Pendaftaran</strong></li>
        <ol>
            <li>Untuk registrasi menjadi Murid, Anda harus mengisi semua kelengkapan biodata tanpa terkecuali dan menyertakan identitas asli Anda.</li>
            <li>Anda harus mencantumkan nama lengkap (bukan nama alias).</li>
            <li>Nomor telepon yang dicantumkan adalah nomor yang aktif, sehingga Permatamall dapat menghubungi sewaktu-waktu apabila diperlukan.</li>
            <li>Permatamall berhak untuk menolak aplikasi pendaftaran Anda sebagai Murid dengan alasan yang jelas.</li>
        </ol>
        <li><strong>Akun Murid</strong></li>
        <ol>
            <li>Anda bertanggung jawab untuk menjaga kerahasiaan akun dan password dan membatasi akses ke komputer Anda.</li>
            <li>Anda setuju bertanggung jawab atas semua yang terjadi perihal penggunaan akun pribadi dan password Anda.</li>
            <li>Anda setuju untuk segera memberitahukan Permatamall tentang setiap penyalahgunaan akun atau pelanggaran keamanan lainnya yang berkaitan dengan akun Anda.</li>
            <li>Ruangguru tidak akan bertanggung jawab atas kerugian atau kerusakan yang timbul dari kegagalan untuk mematuhi persyaratan-persyaratan ini.</li>
            <li>Permatamall berhak untuk menolak layanan atau menghentikan akun.</li>
        </ol>
        <li><strong>Profil Murid</strong></li>
        <ol>
            <li>Anda setuju untuk mengisi semua informasi pribadi seakurat mungkin.</li>
            <li>Anda, dan bukan Permatamall, bertanggung jawab penuh atas semua materi yang Anda sediakan di Permatamall.</li>
        </ol>
        <li><strong>Pencarian Guru</strong></li>
        <ol>
            <li>Anda memahami bahwa semua informasi mengenai Guru disediakan oleh pihak ketiga yang berada di luar kontrol Permatamall.</li>
            <li>Kami tidak bertanggung jawab atas segala kerugian yang disebabkan oleh informasi pihak ketiga.</li>
        </ol>
        <li><strong>Pembayaran</strong></li>
        <ol>
            <li>Anda setuju untuk membayar paket belajar sesuai dengan waktu yang ditetapkan oleh Permatamall.</li>
            <li>Apabila Anda tidak membayar dalam waktu 2x24 jam, maka pemesanan dianggap dibatalkan.</li>
            <li>Permatamall tidak menjamin pengembalian pembayaran apabila terjadi pembatalan belajar.</li>
        </ol>
        <li><strong>Perilaku Murid</strong></li>
        <ol>
            <li>Murid yang telat untuk membayar paket belajar akan berdampak pada pembatalan pendaftaran belajar mengajar.</li>
            <li>Murid harus menjaga etika dan kesopanan saat belajar dengan Guru agar suasana belajar mengajar menjadi kondusif dan nyaman.</li>
        </ol>
        <li><strong>Penggunaan Informasi</strong></li>
    </ol>
    <p>Penggunaan informasi akun guru dan murid untuk kepentingan Permatamall diperbolehkan dengan syarat tetap oleh persetujuan pihak Permatamall tanpa melalui perantara dan segala hal yang berkaitan informasi adalah hak Permatamall sepenuhnya.</p>
    <p>&nbsp;</p>
  </div>
  <div id="body-member-mitra" style="display: none;">
    <p><strong>Guru</strong></p>
    <p>Permatamall.com adalah sebuah platform yang menghubungkan pelajar dengan pengajar yang tepat untuk membantu siswa mempelajari keahlian/ pengetahuan baru, mendapatkan bantuan tambahan di luar sekolah/ kampus, maupun mengembangkan keahlian tertentu. Aplikasi dan situs Permatamall.com ini dikelola oleh PT. Permata Mall Nusantara.</p>
    <p>
        <br /> Dengan mengakses dan menggunakan aplikasi dan situs Permatamall serta mendaftar menjadi Guru di Permatamall, berarti Anda telah memahami dan menyetujui untuk terikat dan tunduk dengan semua peraturan yang berlaku di Permatamall.</p>
    <ol>
        <li><strong>Pendaftaran</strong></li>
        <ol>
            <li>Untuk registrasi menjadi Guru, Anda diwajibkan untuk mengisi semua kelengkapan informasi pribadi Anda, termasuk data pribadi, profil singkat, pengalaman mengajar, serta bukti kualifikasi untuk mata pelajaran tertentu. Seluruh informasi yang dimasukkan harus informasi yang benar dan akurat.</li>
            <li>Anda harus mencantumkan nama lengkap (bukan nama alias).</li>
            <li>Nomor telepon yang dicantumkan adalah nomor yang aktif, sehingga Permatamall dapat menghubungi sewaktu-waktu apabila diperlukan.</li>
            <li>Permatamall berhak untuk menolak aplikasi pendaftaran Anda sebagai Guru dengan alasan yang jelas.</li>
        </ol>
        <li><strong>Akun Guru</strong></li>
        <ol>
            <li>Anda bertanggung jawab untuk menjaga kerahasiaan akun dan password dan membatasi akses ke komputer Anda.</li>
            <li>Anda setuju bertanggung jawab atas semua yang terjadi perihal penggunaan akun pribadi dan password Anda.</li>
            <li>Anda setuju untuk segera memberitahukan Permatamall tentang setiap penyalahgunaan akun atau pelanggaran keamanan lainnya yang berkaitan dengan akun Anda.</li>
            <li>Permatamall tidak akan bertanggung jawab atas kerugian atau kerusakan yang timbul dari kegagalan untuk mematuhi persyaratan-persyaratan ini.</li>
            <li>Permatamall berhak untuk menolak layanan atau menghentikan akun.</li>
        </ol>
        <li><strong>Profil Guru</strong></li>
        <ol>
            <li>Anda setuju untuk mengisi semua informasi pribadi seakurat mungkin.</li>
            <li>Anda, dan bukan Permatamall, bertanggung jawab penuh atas semua materi yang Anda sediakan di Permatamall.</li>
        </ol>
        <li><strong>Perilaku Guru</strong></li>
        <ol>
            <li>Guru harus bertanggung jawab, bersikap profesional dan etis saat mengajar Murid agar suasana belajar mengajar menjadi kondusif dan nyaman.</li>
            <li>Guru harus mempersiapkan materi ajar secara matang sebelum mengajar.</li>
            <li>Guru harus hadir tepat waktu sesuai jadwal yang telah disepakati. Apabila Guru menghadapi kendala untuk hadir, Guru harus menginformasikan hal tersebut kepada orang tua atau murid yang diajar dengan alasan yang jelas setidaknya dua hari sebelum waktu mengajar.</li>
            <li>Guru setuju menerima sanksi dari Permatamall apabila tidak memenuhi ketiga poin di atas. Bentuk sanksi akan ditentukan lebih lanjut oleh Permatamall sesuai pertimbangan yang jelas.</li>
        </ol>
        <li><strong>Penggunaan Informasi</strong></li>
    </ol>
    <p>Penggunaan informasi akun guru dan murid untuk kepentingan Permatamall diperbolehkan dengan syarat tetap oleh persetujuan pihak Permatamall tanpa melalui perantara dan segala hal yang berkaitan informasi adalah hak Permatamall sepenuhnya.</p>
    <p>&nbsp;</p>
    <p><strong>Guru</strong></p>
    <p>Permatamall.com adalah sebuah platform yang menghubungkan pelajar dengan pengajar yang tepat untuk membantu siswa mempelajari keahlian/ pengetahuan baru, mendapatkan bantuan tambahan di luar sekolah/ kampus, maupun mengembangkan keahlian tertentu. Aplikasi dan situs Permatamall.com ini dikelola oleh PT. Permata Mall Nusantara.</p>
    <p>
        <br /> Dengan mengakses dan menggunakan aplikasi dan situs Permatamall serta mendaftar menjadi Guru di Permatamall, berarti Anda telah memahami dan menyetujui untuk terikat dan tunduk dengan semua peraturan yang berlaku di Permatamall.</p>
    <ol>
        <li><strong>Pendaftaran</strong></li>
        <ol>
            <li>Untuk registrasi menjadi Guru, Anda diwajibkan untuk mengisi semua kelengkapan informasi pribadi Anda, termasuk data pribadi, profil singkat, pengalaman mengajar, serta bukti kualifikasi untuk mata pelajaran tertentu. Seluruh informasi yang dimasukkan harus informasi yang benar dan akurat.</li>
            <li>Anda harus mencantumkan nama lengkap (bukan nama alias).</li>
            <li>Nomor telepon yang dicantumkan adalah nomor yang aktif, sehingga Permatamall dapat menghubungi sewaktu-waktu apabila diperlukan.</li>
            <li>Permatamall berhak untuk menolak aplikasi pendaftaran Anda sebagai Guru dengan alasan yang jelas.</li>
        </ol>
        <li><strong>Akun Guru</strong></li>
        <ol>
            <li>Anda bertanggung jawab untuk menjaga kerahasiaan akun dan password dan membatasi akses ke komputer Anda.</li>
            <li>Anda setuju bertanggung jawab atas semua yang terjadi perihal penggunaan akun pribadi dan password Anda.</li>
            <li>Anda setuju untuk segera memberitahukan Permatamall tentang setiap penyalahgunaan akun atau pelanggaran keamanan lainnya yang berkaitan dengan akun Anda.</li>
            <li>Permatamall tidak akan bertanggung jawab atas kerugian atau kerusakan yang timbul dari kegagalan untuk mematuhi persyaratan-persyaratan ini.</li>
            <li>Permatamall berhak untuk menolak layanan atau menghentikan akun.</li>
        </ol>
        <li><strong>Profil Guru</strong></li>
        <ol>
            <li>Anda setuju untuk mengisi semua informasi pribadi seakurat mungkin.</li>
            <li>Anda, dan bukan Permatamall, bertanggung jawab penuh atas semua materi yang Anda sediakan di Permatamall.</li>
        </ol>
        <li><strong>Perilaku Guru</strong></li>
        <ol>
            <li>Guru harus bertanggung jawab, bersikap profesional dan etis saat mengajar Murid agar suasana belajar mengajar menjadi kondusif dan nyaman.</li>
            <li>Guru harus mempersiapkan materi ajar secara matang sebelum mengajar.</li>
            <li>Guru harus hadir tepat waktu sesuai jadwal yang telah disepakati. Apabila Guru menghadapi kendala untuk hadir, Guru harus menginformasikan hal tersebut kepada orang tua atau murid yang diajar dengan alasan yang jelas setidaknya dua hari sebelum waktu mengajar.</li>
            <li>Guru setuju menerima sanksi dari Permatamall apabila tidak memenuhi ketiga poin di atas. Bentuk sanksi akan ditentukan lebih lanjut oleh Permatamall sesuai pertimbangan yang jelas.</li>
        </ol>
        <li><strong>Penggunaan Informasi</strong></li>
    </ol>
    <p>Penggunaan informasi akun guru dan murid untuk kepentingan Permatamall diperbolehkan dengan syarat tetap oleh persetujuan pihak Permatamall tanpa melalui perantara dan segala hal yang berkaitan informasi adalah hak Permatamall sepenuhnya.</p>
    <p>&nbsp;</p>
  </div>
</div>

@endsection
@section('script')
<style type="text/css">
.field-icon {
  float: right;
  margin-right: 10px;
  margin-top: -25px;
  position: relative;
  z-index: 2;
}

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

/* The container */
.container-checked {
  display: block;
  position: relative;
  padding-left: 25px;
  margin-bottom: 12px;
  cursor: pointer;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}

/* Hide the browser's default checkbox */
.container-checked input {
  position: absolute;
  opacity: 0;
  cursor: pointer;
  height: 0;
  width: 0;
}

/* Create a custom checkbox */
.checkmark {
  position: absolute;
  top: 3px;
  border-radius: 3px;
  left: 0;
  height: 15px;
  width: 15px;
  background-color: #eee;
}

/* On mouse-over, add a grey background color */
.container-checked:hover input ~ .checkmark {
  background-color: #ccc;
}

/* When the checkbox is checked, add a blue background */
.container-checked input:checked ~ .checkmark {
  background-color: #56c174;
}

/* Create the checkmark/indicator (hidden when not checked) */
.checkmark:after {
  content: "";
  position: absolute;
  display: none;
}

/* Show the checkmark when checked */
.container-checked input:checked ~ .checkmark:after {
  display: block;
}

/* Style the checkmark/indicator */
.container-checked .checkmark:after {
  left: 4px;
  top: 1px;
  width: 5px;
  height: 10px;
  border: solid white;
  border-width: 0 2px 2px 0;
  -webkit-transform: rotate(45deg);
  -ms-transform: rotate(45deg);
  transform: rotate(45deg);
}

.helper-text{
  font-size: 12px;
}

.valid {
  color: #1fd34a;
}

</style>
<script type="text/javascript">
   $('a[href="#pelanggan"]').click(function(event) {
    event.preventDefault();
    $(this).modal({
      fadeDuration: 250
    });
    var data = $('.methode_id').val();
    $('#header-member').html(data);
    if (data == "Mitra") {
      $('#body-member-mitra').show();
      $('#body-member-pelanggan').hide();
    }else{
      $('#body-member-pelanggan').show();
      $('#body-member-mitra').hide();      
    }

  });
 

  function functionCheckbox() {
    if(document.getElementById('checkbox-data').checked) {
      $('#submit-registrasi-desktop').removeAttr('disabled');
    } else {
      $('#submit-registrasi-desktop').attr('disabled', 'disabled');
    }

    if(document.getElementById('checkbox-data-mobile').checked) {
      $('#submit-registrasi-mobile').removeAttr('disabled');
    } else {
      $('#submit-registrasi-mobile').attr('disabled', 'disabled');
    }
  }
  


  function functionSelectedMethod(){
      $('.functionSelectedMethod_Pelanggan').addClass("color_active");
      $('.functionSelectedMethod_mitra').removeClass("color_active");
      $('.methode_id').val("Pelanggan")
      $('.level_login_value').html('Nama Lengkap Pelanggan/Siswa :')
    
  }

  function functionSelectedMethodMitra(){
    $('.functionSelectedMethod_Pelanggan').removeClass("color_active");
    $('.functionSelectedMethod_mitra').addClass("color_active");
    $('.methode_id').val("Mitra")
    $('.level_login_value').html('Nama Lengkap Mitra/Guru :')
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
      $('.functionSelectedMethod_Pelanggan').removeClass("color_active");
      $('.functionSelectedMethod_mitra').addClass("color_active");
      $('.methode_id').val("Mitra")

      //get location
      if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(storelatlong);
      } else { 
        x.innerHTML = "Geolocation is not supported by this browser.";
      }
  });

  function storelatlong(position){
    $('#lat').val(position.coords.latitude);
    $('#long').val(position.coords.longitude);
  }

  $(".toggle-password").click(function() {

    $(this).toggleClass("fa-eye fa-eye-slash");
    var input = $($(this).attr("toggle"));
    if (input.attr("type") == "password") {
      input.attr("type", "text");
    } else {
      input.attr("type", "password");
    }
  });




  (function(){
    var password = document.querySelector('.password');    
    var helperText = {
      charLength: document.querySelector('.helper-text .length')
    };
    var pattern = {
      charLength: function() {
        if( password.value.length >= 6 ) {
          return true;
        }
      }
        
    };    
    // Listen for keyup action on password field
    password.addEventListener('keyup', function (){
      // Check that password is a minimum of 8 characters
      patternTest( pattern.charLength(), helperText.charLength );      
      // Check that all requirements are fulfilled
      if( hasClass(helperText.charLength, 'valid')
      ) {
        if(document.getElementById('checkbox-data').checked) {
          $('#submit-registrasi-desktop').removeAttr('disabled');
        } else {
          $('#submit-registrasi-desktop').attr('disabled', 'disabled');
        }
      }
      else {
        $('#submit-registrasi-desktop').attr('disabled', 'disabled');
      }
    });
    
    function patternTest(pattern, response) {
      if(pattern) {
        addClass(response, 'valid');
      }
      else {
        removeClass(response, 'valid');
      }
    }
    
    function addClass(el, className) {
      if (el.classList) {
        el.classList.add(className);
      }
      else {
        el.className += ' ' + className;
      }
    }
    
    function removeClass(el, className) {
      if (el.classList)
          el.classList.remove(className);
        else
          el.className = el.className.replace(new RegExp('(^|\\b)' + className.split(' ').join('|') + '(\\b|$)', 'gi'), ' ');
    }
    
    function hasClass(el, className) {
      if (el.classList) {
        console.log(el.classList);
        return el.classList.contains(className);  
      }
      else {
        new RegExp('(^| )' + className + '( |$)', 'gi').test(el.className); 
      }
    }    
  })();
</script>
@endsection
