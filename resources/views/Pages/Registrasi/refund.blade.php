
@extends('layouts.FrontEnd')

@section('content')

<div style="width: 100%; height: 200px; background-image: url('{!! asset('public/images/sidebar/login.png') !!}');">
    <div class="container">
      <!-- <p style="font-size: 24px;color: #fff;font-weight: 600;margin-top: 40px;">Refund Policy</p> -->
    </div>
</div>

<div class="container">
<p>Refund Policy</p>
<p>Last updated: January 28, 2020</p>
<p>Thank you for visiting PermataMall operated by Permata Mall Nusantara PT.</p>
<p>Jika, untuk beberapa alasan, Anda tidak puas dengan pembelian atau berlangganan produk PT Permata Mall Nusantara. Kami lampirkan peraturan pengembalian dana.</p>
<p>Lampiran berikut ini dapat mengakomodasi setiap produk yang Anda beli di e-commerce PermataMall.</p>
<p>Defenisi</p>
<h2>Defenisi</h2>
<p>Untuk tujuan peraturan pengembalian dana:</p>
<ul>
<li><strong>Anda</strong> mengandung arti personal atau individua atau pengguna Layanan PermataMall atau perusahaan atau entitas legal lainnya yang menggunakan atau mengakses layanan PermataMall.</li>
<li><strong>Perusahaan</strong> (mengacu ke kata lainnya seperti Lembaga, kami, kita dalam perjanjian ini) mengacu kepada PT Permata Mall Nusantara, Komplek Permata Hijau 2 Blok O No 2 Cidodol 12220.</li>
<li><strong>Layanan</strong> mengacu pada situs web.</li>
<li><strong>Situs Web</strong> mangacu pada permatamall, akses url https://permatamall.com</li>
<li><strong>Produk</strong> mengacu pada layanan les privat yang disediakan PermataMall.</li>
<li><strong>Pesanan</strong> mengandung arti sebuah permintaan untuk menjadi murid les privat PermataMall.</li>
</ul>
<p>Ketentuan Pesanan yang dapat dibatalkan</p>
<p>Jika Anda belum melakukan pembayaran Les Privat dalam waktu 2x24 Jam dari sejak pemesanan, maka layanan Les Privat tersebut akan otomatis batal.</p>
<p>Pembatalan Les Privat oleh Murid dapat dilakukan:</p>
<ol>
<li>Jika di pertemuan pertama Les Privat, Murid tidak senang dengan guru, Murid diberikan kesempatan untuk meminta pergantian Guru kepada PermataMall. Jika Murid masih tetap tidak senang setelah pergantian Guru dilakukan di Les Privat ke 2, maka Murid dapat melakukan pembatalan Les Privat dengan mengajukan pembatalan melalui telp ke CS PermataMall sebelum Les Privat selanjutnya dilakukan.</li>
<li>Jika terjadi pembatalan maka biaya pembatalan akan ditransfer sepenuhnya ke rekening yang bersangkutan.</li>
<li>Masa pengembalian dana pembatalan, paling lama 7 hari kerja.</li>
</ol>
<p>&nbsp;</p>
<p>Untuk proses pembatalan dapat dilakukan dengan:</p>
<ul>
<li>Email: support@permatamall.com</li>
<li>Mengunjungi: https://permatamall.com/bimbel/refund</li>
<li>Telp: 0811811306</li>
<li>Surat: Komplek Permata Hijau 2 Blok O No 2 Cidodol Jakarta Selatan 12220</li>
</ul>
<p>&nbsp;</p>
<p>Kami akan mengembalikan dana Anda paling lama 7 hari sejak Anda melakukan pembatalan tanpa ada potongan.</p>
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
