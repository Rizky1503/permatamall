@extends('layouts.FrontEnd')

@section('content')
<div class="heading-body">
    <div class="container">
        <center>
          <div class="form-cari">
            <div class="form-custom">
              Syarat & Ketentuan
            </div>
          </div>
        </center>          
    </div>
</div>
<div class="container" style="margin-bottom: 50px;">
  <ul class="nav nav-tabs">
    <li class="active"><a href="#guru" data-toggle="tab">Syarat & Ketentuan Guru</a></li>
    <li><a href="#murid" data-toggle="tab">Syarat & Ketentuan Murid</a></li>
  </ul>
  <!-- Tab panes, ini content dari tab di atas -->
  <div class="tab-content">
    <div class="tab-pane active" id="guru">
      <p><strong>Guru</strong></p>
      <p>Permatamall.com adalah sebuah platform yang menghubungkan murid dengan guru yang tepat untuk membantu murid mengembangkan pengetahuan yang diperoleh di sekolah, mendapatkan bantuan tambahan di luar sekolah, maupun mengembangkan keahlian tertentu. Aplikasi dan situs Permatamall.com ini dikelola oleh PT. Permata Mall Nusantara. <br>Dengan mengakses dan menggunakan aplikasi dan situs Permatamall serta mendaftar menjadi Guru di Permatamall, berarti Anda telah memahami dan menyetujui untuk terikat dan tunduk dengan semua peraturan yang berlaku di Permatamall.</p>
      <ol>
        <br>
          <li><strong>Pendaftaran</strong></li>
          <ol>
              <li>Untuk registrasi menjadi Guru, Anda diwajibkan untuk mengisi semua kelengkapan informasi pribadi Anda, termasuk data pribadi, profil singkat, pengalaman mengajar, serta bukti kualifikasi untuk mata pelajaran tertentu. Seluruh informasi yang dimasukkan harus informasi yang benar dan akurat.</li>
              <li>Anda harus mencantumkan nama lengkap (bukan nama alias).</li>
              <li>Nomor telepon yang dicantumkan adalah nomor yang aktif, sehingga Permatamall dapat menghubungi sewaktu-waktu apabila diperlukan.</li>
              <li>Permatamall berhak untuk menolak aplikasi pendaftaran Anda sebagai Guru dengan alasan yang jelas.</li>
          </ol>
          <br>
          <li><strong>Akun Guru</strong></li>
          <ol>
              <li>Anda bertanggung jawab untuk menjaga kerahasiaan akun dan password dan membatasi akses ke komputer Anda.</li>
              <li>Anda setuju bertanggung jawab atas semua yang terjadi perihal penggunaan akun pribadi dan password Anda.</li>
              <li>Anda setuju untuk segera memberitahukan Permatamall tentang setiap penyalahgunaan akun atau pelanggaran keamanan lainnya yang berkaitan dengan akun Anda.</li>
              <li>Permatamall tidak akan bertanggung jawab atas kerugian atau kerusakan yang timbul dari kegagalan untuk mematuhi persyaratan-persyaratan ini.</li>
              <li>Permatamall berhak untuk menolak layanan atau menghentikan akun.</li>
          </ol>
          <br>
          <li><strong>Profil Guru</strong></li>
          <ol>
              <li>Anda setuju untuk mengisi semua informasi pribadi seakurat mungkin.</li>
              <li>Anda, dan bukan Permatamall, bertanggung jawab penuh atas semua materi yang Anda sediakan di Permatamall.</li>
          </ol>
          <br>
          <li><strong>Pembayaran Biaya Les Privat</strong></li>
          <ol>
              <li>Pembayaran guru akan diproses 100% setelah pertemuan terakhir sesuai dengan biaya yang disepakati per-pertemuan dikali jumlah pertemuan.</li>
              <li>Pembayaran guru baru bisa diproses setelah guru mengirim laporan les privat dan absensi belajar.</li>
              <li>Apabila setelah pertemuan pertama murid konfirmasi ketidakcocokan belajar, maka Permata Mall tetap akan memproses pembayaran untuk guru selama 1 pertemuan tersebut.</li>
          </ol>
          <br>
          <li><strong>Perilaku Guru</strong></li>
          <ol>
              <li>Guru harus bertanggung jawab, bersikap profesional dan etis saat mengajar Murid agar suasana belajar mengajar menjadi kondusif dan nyaman.</li>
              <li>Guru harus mempersiapkan materi ajar secara matang sebelum mengajar.</li>
              <li>Guru harus hadir tepat waktu sesuai jadwal yang telah disepakati. Apabila Guru menghadapi kendala untuk hadir, Guru harus menginformasikan hal tersebut kepada orang tua atau murid yang diajar dengan alasan yang jelas setidaknya dua hari sebelum waktu mengajar.</li>
              <li>Guru setuju menerima sanksi dari Permatamall apabila tidak memenuhi ketiga poin di atas. Bentuk sanksi akan ditentukan lebih lanjut oleh Permatamall sesuai pertimbangan yang jelas.</li>
          </ol>
          <br>
          <li><strong>Penggunaan Informasi</strong></li>
      </ol>
      <p>Penggunaan informasi akun guru dan murid untuk kepentingan Permatamall diperbolehkan dengan syarat tetap oleh persetujuan pihak Permatamall tanpa melalui perantara dan segala hal yang berkaitan informasi adalah hak Permatamall sepenuhnya.</p>
      <p>&nbsp;</p>
    </div>
    <div class="tab-pane" id="murid">
      <p><strong>Murid</strong></p>
      <p>Permatamall.com adalah sebuah&nbsp;marketplace yang menghubungkan murid dengan guru untuk membantu murid mencapai prestasi tertinggi, maupun mengembangkan keahlian tertentu. Aplikasi dan situs Permatamall ini dikelola oleh PT. Permata Mall Nusantara.</p>
      <p>Dengan mengakses dan menggunakan aplikasi dan situs Permatamall serta mendaftar menjadi Murid di Permatamall, berarti Anda telah memahami dan menyetujui untuk terikat dan tunduk dengan semua peraturan yang berlaku di Permatamall.</p>
      <p>&nbsp;</p>
      <ol>
          <ol>
              <li><strong>Pendaftaran</strong></li>
              <ol>
                  <li>Untuk registrasi menjadi Murid, Anda harus mengisi semua kelengkapan biodata tanpa terkecuali dan menyertakan identitas asli Anda.</li>
                  <li>Anda harus mencantumkan nama lengkap (bukan nama alias).</li>
                  <li>Nomor telepon yang dicantumkan adalah nomor yang aktif, sehingga Permatamall dapat menghubungi sewaktu-waktu apabila diperlukan.</li>
                  <li>Nomor telepon orangtua yang dicantumkan adalah nomor yang aktif, sehingga pihak Permata Mall dapat menghubungi orangtua sewaktu-waktu.</li>
              </ol>
          </ol>
      </ol>
      <ol>
          <ol>
              <li><strong>Akun Murid</strong></li>
              <ol>
                  <li>Anda bertanggung jawab untuk menjaga kerahasiaan akun dan password dan membatasi akses ke komputer Anda.</li>
                  <li>Anda setuju bertanggung jawab atas semua yang terjadi perihal penggunaan akun pribadi dan password Anda.</li>
                  <li>Anda setuju untuk segera memberitahukan Permatamall tentang setiap penyalahgunaan akun atau pelanggaran keamanan lainnya yang berkaitan dengan akun Anda.</li>
                  <li>Permatamall tidak akan bertanggung jawab atas kerugian atau kerusakan yang timbul dari kegagalan untuk mematuhi persyaratan-persyaratan ini.</li>
                  <li>Permatamall berhak untuk menolak layanan atau menghentikan akun.</li>
              </ol>
          </ol>
      </ol>
      <p>&nbsp;</p>
      <ol>
          <ol>
              <li><strong>Profil Murid</strong></li>
              <ol>
                  <li>Anda setuju untuk mengisi semua informasi pribadi seakurat mungkin.</li>
                  <li>Anda, dan bukan Permatamall, bertanggung jawab penuh atas semua materi yang Anda sediakan di Permatamall.</li>
              </ol>
          </ol>
      </ol>
      <p>&nbsp;</p>
      <ol>
          <ol>
              <li><strong>Pencarian Guru</strong></li>
              <ol>
                  <li>Anda memahami bahwa semua informasi mengenai Guru disediakan oleh pihak ketiga yang berada di luar kontrol Permatamall.</li>
                  <li>Kami tidak bertanggung jawab atas segala kerugian yang disebabkan oleh informasi pihak ketiga.</li>
              </ol>
          </ol>
      </ol>
      <p>&nbsp;</p>
      <ol>
          <ol>
              <li><strong>Pembayaran</strong></li>
              <ol>
                  <li>Anda setuju untuk membayar paket les privat sesuai dengan waktu yang ditetapkan oleh Permatamall.</li>
                  <li>Apabila Anda tidak membayar dalam waktu 2x24 jam, maka pemesanan dianggap dibatalkan.</li>
                  <li>Permatamall tidak menjamin pengembalian pembayaran apabila terjadi pembatalan les privat.</li>
              </ol>
          </ol>
      </ol>
      <p>&nbsp;</p>
      <ol>
          <ol>
              <li><strong>Perilaku Murid</strong></li>
              <ol>
                  <li>Murid yang telat untuk membayar paket les privat akan berdampak pada pembatalan pendaftaran les privat.</li>
                  <li>Murid harus menjaga etika dan kesopanan saat belajar dengan Guru agar suasana belajar mengajar menjadi kondusif dan nyaman.</li>
              </ol>
          </ol>
      </ol>
      <p>&nbsp;</p>
      <ol>
          <li><strong>Penggunaan Informasi</strong></li>
      </ol>
      <p>Penggunaan informasi akun murid untuk kepentingan Permatamall diperbolehkan dengan syarat tetap oleh persetujuan pihak Permatamall tanpa melalui perantara dan segala hal yang berkaitan informasi adalah hak Permatamall sepenuhnya.</p>
    </div>
  </div>
</div>
@endsection
@section('script')
<style type="text/css">
  .nav-tabs>li.active>a, .nav-tabs>li.active>a:focus, .nav-tabs>li.active>a:hover {
    color: #555;
    cursor: default;
    font-weight: bold;
    background-color: #fff;
    border: 1px solid #ddd;
    border-radius: 0px;
    border-bottom-color: transparent;
  }

  .tab-content {
      text-align: justify;
      background: #fdfdfd;
      line-height: 25px;
      border: 1px solid #ddd;
      border-top: 1px solid #fdfdfd;
      border-bottom: 1px solid #3eb960;
      padding: 30px 25px;
      min-height: 500px;
  }
  .heading-body{
    width: 100%; 
    height: 300px; 
    background-image: url('{!! asset('public/assets/images/banner-navigation.png') !!}');
    background-repeat: no-repeat; 
    background-position: center; 
    background-size: 100%;
  }

  .form-cari{
    font-size: 24px;color: #fff;
    font-weight: 600;
    margin-top: 100px;
  }

  .form-custom{
    width: 30%;
    font-weight: bold;
    color: #000;
  }

  .font-heading-font{
    font-weight: bold; 
    font-size: 24px;
  }

  .masih-bingung{
    margin-top: 50px;
    margin-bottom: 50px;
    border: 1px solid #c1c1c1;
    padding: 20px 10px 20px 10px;
    border-radius: 5px;
    background-color: #fafbfc;
    border: 1px solid rgba(0,0,0,.12);
    font-weight: bold;
    color: #000;
  }

  p {
    font-size: 16px;
    line-height: 1.5em;
    color: #000;
  }

  li {
    font-size: 16px;
    line-height: 1.5em;
    color: #000;
  }

  @media only screen and (max-width: 600px) {
    .heading-body{
      width: 100%; 
      height: 100px; 
      background-image: url('{!! asset('public/assets/images/banner-navigation.png') !!}');
      background-repeat: no-repeat; 
      background-position: center; 
      background-size: cover;
    }

    .form-cari{
      font-size: 24px;color: #fff;
      font-weight: 600;
      margin-top: 30px;
    }

    .form-custom{
      width: 70%;
    }
  }
</style>
@endsection
