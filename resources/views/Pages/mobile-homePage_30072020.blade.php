<div class="section-mobile">
  <div class="container">
    <div class="content-section">
      <img src="{!! asset('public/assets/images/icon/icon/Bimbel Online.png') !!}">      
    </div>    
    <div class="content-section-two">
      <span class="judul">BIMBINGAN ONLINE</span>
      <p>
        Layanan Bimbingan Online adalah sebuah layanan pendidikan yang dapat digunakan pengguna secara gratis. Layanan gratis yang disediakan <a href="permatamall.com" style="color: #56c174">PERMATAMALL.COM</a> untuk bimbingan online ini adalah Uji Coba atau TryOut setiap Mata Pelajaran (SD, SMP, SMA), STAN dan SBMPTN. Silahkan uji kemampuan Anda di layanan Bimbingan Online <a href="permatamall.com" style="color: #56c174">PERMATAMALL.COM</a> Disamping layanan gratis, Bimbingan Online ini juga ada versi premium yang lebih lengkap fitur-fitur pendidikannya.
      </p>
      <br>
      <span>
        <a href="{{ route('ExampPermataBimbelOnline.getStarted') }}" class="btn-section">Coba Sekarang</a>
      </span>      
    </div>    
  </div> 
</div>

<div class="section-two-mobile">
  <div class="container">
    <div class="content-section">
      <img src="{!! asset('public/assets/images/icon/icon/Privat.png') !!}">      
    </div>    
    <div class="content-section-two">
      <span class="judul">PRIVAT</span>
      <p>
        Layanan Privat adalah sebuah layanan pendidikan yang dapat digunakan pengguna untuk mendapatkan tutor atau guru privat melalui portal <a href="permatamall.com" style="color: #56c174">PERMATAMALL.COM</a>.Layanan PRIVAT ini terbuka untuk tingkat SD, SMP dan SMA. Mata pelajaran yang dilayani juga sangat beragam, dari mata pelajaran sekolah hingga bidang studi di luar sekolah seperti PIANO, GITAR, SULAP, dll
      </p>
      <br>
      <div class="row">
        @if($private == "Harus_login")
        <div class="col-md-5">
          <a href="{{ route('Registrasi.index') }}" class="btn-section">Daftar sebagai Murid</a>        
        </div>
        <div class="col-md-6">
          <a href="{{ route('Registrasi.index') }}" class="btn-section">Daftar sebagai Guru</a>
        </div>
        @elseif($private == "Mitra")
        <div class="col-md-12">
          <a href="{{ route('Registrasi.index') }}" class="btn-section">Guru</a>
        </div>
        @elseif($private == "Pelanggan")
        <div class="col-md-12">
          <a href="{{ route('Private.List') }}" class="btn-section">Murid</a>
        </div>
        @endif
      </div>
    </div>    
  </div> 
</div>

<div class="section-mobile">
  <div class="container">
    <div class="content-section">
      <img src="{!! asset('public/assets/images/icon/icon/Daftar Bimbel Online.png') !!}">
    </div>    
    <div class="content-section-two">
      <span class="judul">BIMBEL OFFLINE</span>
      <p>
        Layanan Bimbingan Offline adalah sebuah layanan pendidikan yang dapat digunakan pengguna untuk mendaftar ke bimbingan offline yang ada di seluruh Indonesia. <a href="permatamall.com" style="color: #56c174">PERMATAMALL.COM</a> menjadi gateway (perantara) murid dengan lembaga bimbel offline. Dengan layanan ini, murid tidak perlu harus ke kantor pusat atau kantor cabang bimbingan offline untuk mendaftar tapi bisa dilakukan secara online.
      </p>
      <br>
      <span>
        <a href="{{ route('Bimbel.index') }}" class="btn-section">Cari Bimbel Offline</a>
      </span>      
    </div>    
  </div> 
</div>
<!-- <div class="section-two-mobile">
  <div class="container">
    <div class="content-section">
      <img src="{!! asset('public/assets/images/icon/icon/Pelatihan Online.png') !!}">      
    </div>    
    <div class="content-section-two">
      <span class="judul">PELATIHAN ONLINE</span>
      <p>
        Layanan Pelatihan Online adalah sebuah layanan training / pelatihan yang dapat digunakan pengguna untuk mendaftar ke lembaga training / pelatihan yang bekerjasama dengan <a href="permatamall.com" style="color: #56c174">PERMATAMALL.COM</a>. Layanan pelatihan yang dimaksud seperti pelatihan kepemimpinan, pelatihan manajemen resiko, dll.
      </p>
      <br>
      <span>
        <a href="" class="btn-section">Coba Sekarang</a>
      </span>
    </div>    
  </div> 
</div> -->
<!-- <div style="background-color: #56c174; padding: 50px;">
  <center>
    <span style="font-size: 32px; font-weight: bold; color: #fff;">Produk di bawah ini Masih Dalam Pengembangan</span>
  </center>
</div> -->
<div class="section-mobile">
  <div class="container">
    <div class="content-section">
      <img src="{!! asset('public/assets/images/icon/icon/Gedung Pertemuan.png') !!}">      
    </div>    
    <div class="content-section-two">
      <span class="judul">SEWA GEDUNG</span>
      <p>
        Layanan sewa sewa gedung adalah sebuah fasilitas yang disediakan <a href="permatamall.com" style="color: #56c174">PERMATAMALL.COM</a> untuk melayani pengguna yang membutuhkan ruangan untuk acara-acara tertentu.Kami bekerjasama dengan beberapa sewa gedung yang profesional dalam menyediakan ruangan yang Anda butuhkan seperti sound system, pembawa acara,dll.
      </p>
      <br>
      <span>
        <a href="" class="btn-section">Sewa Gedung</a>
      </span>
    </div>    
  </div> 
</div>

<!-- <div class="section-two-mobile">
  <div class="container">
    <div class="content-section">
      <img src="{!! asset('public/assets/images/icon/icon/Event.png') !!}">      
    </div>    
    <div class="content-section-two">
      <span class="judul">EVENT ORGANIZER</span>
      <span class="pengembangan">Dalam Pengembangan</span>
      <p>
        Layanan Pelatihan Online adalah sebuah layanan training / pelatihan yang dapat digunakan pengguna untuk mendaftar ke lembaga training / pelatihan yang bekerjasama dengan <a href="permatamall.com" style="color: #56c174">PERMATAMALL.COM</a>. Layanan pelatihan yang dimaksud seperti pelatihan kepemimpinan, pelatihan manajemen resiko, dll.
      </p>
      <br>
      <span>
        <a href="" class="btn-section">Cari Event</a>
      </span>
    </div>    
  </div> 
</div>

<div class="section-mobile">
  <div class="container">
    <div class="content-section">
      <img src="{!! asset('public/assets/images/icon/icon/Busana.png') !!}">        
    </div>    
    <div class="content-section-two">
      <span class="judul">BUSANA</span>
      <span class="pengembangan">Dalam Pengembangan</span>
      <p>
        Layanan sewa busana adalah sebuah fasilitas yang disediakan <a href="permatamall.com" style="color: #56c174">PERMATAMALL.COM</a> untuk melayani pengguna yang membutuhkan pakaian seragam dalam sebuah acara formal maupun acara informal.
      </p>
      <br>
      <span>
        <a href="" class="btn-section">Cari Busana</a>
      </span>
    </div>    
  </div> 
</div>

<div class="section-two-mobile">
  <div class="container">
    <div class="content-section">
      <img src="{!! asset('public/assets/images/icon/icon/Hiburan.png') !!}">      
    </div>    
    <div class="content-section-two">
      <span class="judul">HIBURAN</span>
      <span class="pengembangan">Dalam Pengembangan</span>
      <p>
        Layanan sewa hiburan adalah sebuah fasilitas yang disediakan <a href="permatamall.com" style="color: #56c174">PERMATAMALL.COM</a> untuk melayani atau menghibur pengguna dalam sebuah kegiatan atau acara
      </p>
      <br>
      <span>
        <a href="" class="btn-section">Cari Hiburan</a>
      </span>
    </div>    
  </div> 
</div>

<div class="section-mobile">
  <div class="container">
    <div class="content-section">
      <img src="{!! asset('public/assets/images/icon/icon/Katering.png') !!}">      
    </div>    
    <div class="content-section-two">
      <span class="judul">KATERING</span>
      <span class="pengembangan">Dalam Pengembangan</span>
      <p>
        Layanan sewa katering adalah sebuah fasilitas yang disediakan <a href="permatamall.com" style="color: #56c174">PERMATAMALL.COM</a> untuk melayani atau menyediakan ragam makanan / masakan yang dibutuhkan pengguna dalam sebuah acara atau kegiatan
      </p>
      <br>
      <span>
        <a href="" class="btn-section">Cari katering</a>
      </span>
    </div>    
  </div> 
</div> -->

<div class="section-two-mobile">
  <div class="container">
    <div class="content-section">
      <img src="{!! asset('public/assets/images/icon/icon/Paket Wisata.png') !!}">      
    </div>    
    <div class="content-section-two">
      <span class="judul">Travel</span>
      <span class="pengembangan">Dalam Pengembangan</span>
      <p>
        Layanan Paket Wisata adalah sebuah layanan wisata yang disediakan <a href="permatamall.com" style="color: #56c174">PERMATAMALL.COM</a> dan mitra penyedia wisata untuk dapat dinikmati pengguna <a href="permatamall.com" style="color: #56c174">PERMATAMALL.COM</a> dengan biaya yang terjangkau.Paket Wisata yang dimaksud sudah termasuk biaya wisata, biaya penginapan, biaya tur.
      </p>
      <br>
      <span>
        <a href="" class="btn-section">Booking Wisata</a>
      </span>
    </div>    
  </div> 
</div>

<!-- <div class="section-mobile">
  <div class="container">
    <div class="content-section">
      <img src="{!! asset('public/assets/images/icon/icon/Lokasi Wisata.png') !!}">      
    </div>    
    <div class="content-section-two">
      <span class="judul">LOKASI WISATA</span>
      <span class="pengembangan">Dalam Pengembangan</span>
      <p>
        Layanan Lokasi Wisata adalah sebuah layanan informasi lokasi-lokasi wisata di seluruh dunia yang dapat dinikmati para pengguna <a href="permatamall.com" style="color: #56c174">PERMATAMALL.COM</a>. Lokasi wisata ini menyediakan data detil lokasi tersebut seperti hotel terdekat, bandara terdekat, restauran terdekat, dll.
      </p>
      <br>
      <span>
        <a href="" class="btn-section">Cari Lokasi Wisata</a>
      </span>
    </div>    
  </div> 
</div> -->

<!-- <div class="section-two-mobile">
  <div class="container">
    <div class="content-section">
      <img src="{!! asset('public/assets/images/icon/icon/Penginapan.png') !!}">      
    </div>    
    <div class="content-section-two">
      <span class="judul">PENGINAPAN</span>
      <span class="pengembangan">Dalam Pengembangan</span>
      <p>
        Layanan Penginapan adalah sebuah layanan informasi penginapan (hotel, villa atau home stay) yang terkait dengan perjalanan Anda ke suatu daerah tertentu yang disediakan <a href="permatamall.com" style="color: #56c174">PERMATAMALL.COM</a>. Penginapan ini dapat terkoneksi dengan lokasi wisata yang berada di sekitar penginapan.
      </p>
      <br>
      <span>
        <a href="" class="btn-section">Cari Penginapan</a>
      </span>
    </div>    
  </div> 
</div> -->

<!-- <div class="section-mobile">
  <div class="container">
    <div class="content-section">
      <img src="{!! asset('public/assets/images/icon/icon/Sewa Mobil.png') !!}">      
    </div>    
    <div class="content-section-two">
      <span class="judul">SEWA MOBIL</span>
      <span class="pengembangan">Dalam Pengembangan</span>
      <p>
        Layanan sewa transport adalah sebuah layanan informasi transportasi (mobil) yang disediakan <a href="permatamall.com" style="color: #56c174">PERMATAMALL.COM</a> untuk dapat digunakan pengguna saat mengunjungi sebuah lokasi.
      </p>
      <br>
      <span>
        <a href="" class="btn-section">Cari Sewa Mobil</a>
      </span>
    </div>    
  </div> 
</div>

<div class="section-two-mobile">
  <div class="container">
    <div class="content-section">
      <img src="{!! asset('public/assets/images/icon/icon/Tiket.png') !!}">      
    </div>    
    <div class="content-section-two">
      <span class="judul">TIKET</span>
      <span class="pengembangan">Dalam Pengembangan</span>
      <p>
        Layanan Tiket adalah sebuah layanan informasi mengenai tiket (pertunjukan, nonton, dll) yang disediakan <a href="permatamall.com" style="color: #56c174">PERMATAMALL.COM</a>. Layanan tiket ini bisa digunakan pengguna sesuai dengan kegiatan yang tertera pada <a href="permatamall.com" style="color: #56c174">PERMATAMALL.COM</a>
      </p>
      <br>
      <span>
        <a href="" class="btn-section">Cari Tiket</a>
      </span>
    </div>    
  </div> 
</div> -->

<!-- <div class="section-mobile">
  <div class="container">
    <div class="content-section">
      <img src="{!! asset('public/assets/images/icon/icon/Sewa Mobil.png') !!}">      
    </div>    
    <div class="content-section-two">
      <span class="judul">PERMATA KULINER</span>
      <span class="pengembangan">Dalam Pengembangan</span>
      <p>
        Layanan Permata Kuliner adalah sebuah layanan toko kuliner (makanan dan minuman) yang bekerjasama dengan <a href="permatamall.com" style="color: #56c174">PERMATAMALL.COM</a>. Permata Kuliner ini akan berisi informasi mitra <a href="permatamall.com" style="color: #56c174">PERMATAMALL.COM</a> yang menyediakan makanan dan minuman yang unik, dapat dipesan secara online dan dibayar secara online.
      </p>
      <br>
      <span>
        <a href="" class="btn-section">Cari Kuliner</a>
      </span>
    </div>    
  </div> 
</div>

<div class="section-two-mobile">
  <div class="container">
    <div class="content-section">
      <img src="{!! asset('public/assets/images/icon/icon/Perangkat Lunak.png') !!}">      
    </div>    
    <div class="content-section-two">
      <span class="judul">JASA PERANGKAT LUNAK</span>
      <span class="pengembangan">Dalam Pengembangan</span>
      <p>
        Layanan Jasa Perangkat Lunak adalah sebuah layanan yang disediakan <a href="permatamall.com" style="color: #56c174">PERMATAMALL.COM</a> untuk memenuhi kebutuhan pembuatan perangkat lunak Anda seperti: Perangkat Lunak Sistem Monitoring, Perangkat LUNAK Penjualan - Pembelian, Perangkat Lunak Logistik, dan lain sebagainya.
      </p>
      <br>
      <span>
        <a href="" class="btn-section">Cari Jasa Perangkat Lunak</a>
      </span>
    </div>    
  </div> 
</div> -->

<div class="section-mobile">
  <div class="container">
    <div class="content-section">
      <img src="{!! asset('public/assets/images/icon/icon/Elektronik.png') !!}">      
    </div>    
    <div class="content-section-two">
      <span class="judul">JASA ELEKTRONIK</span>
      <span class="pengembangan">Dalam Pengembangan</span>
      <p>
        Layanan Jasa  adalah sebuah layanan yang disediakan <a href="permatamall.com" style="color: #56c174">PERMATAMALL.COM</a> untuk memenuhi kebutuhan pengguna yang bermasalah dalam hal jasa.
      </p>
      <br>
      <span>
        <a href="" class="btn-section">Cari Jasa</a>
      </span>
    </div>    
  </div> 
</div>


<!-- <div class="section-two-mobile">
  <div class="container">
    <div class="content-section">
      <img src="{!! asset('public/assets/images/icon/icon/Logistik.png') !!}">      
    </div>    
    <div class="content-section-two">
      <span class="judul">JASA LOGISTIK</span>
      <span class="pengembangan">Dalam Pengembangan</span>
      <p>
        Layanan Jasa Logistik adalah sebuah layanan yang disediakan <a href="permatamall.com" style="color: #56c174">PERMATAMALL.COM</a> untuk memenuhi kebutuhan pengguna dalam mengirim atau mengangkut barang. Logistik yang dimaksud seperti Pengiriman Dokumen, Pengiriman Barang, Pindahan, dll.
      </p>
      <br>
      <span>
        <a href="" class="btn-section">Cari Jasa Logistik</a>
      </span>
    </div>    
  </div> 
</div>

<div class="section-mobile">
  <div class="container">
    <div class="content-section">
      <img src="{!! asset('public/assets/images/icon/icon/Lowongan.png') !!}">      
    </div>    
    <div class="content-section-two">
      <span class="judul">JASA LOWONGAN KERJA</span>
      <span class="pengembangan">Dalam Pengembangan</span>
      <p>
        Layanan Jasa Lowongan Kerja adalah sebuah layanan yang disediakan <a href="permatamall.com" style="color: #56c174">PERMATAMALL.COM</a> dengan mitra penyedia  untuk memenuhi kebutuhan pengguna untuk mencari lowongan kerja di berbagai lembaga. Lowongan Kerja yang dimaksud seperti LoKer Pertamina, Telkom, Freeport, dll
      </p>
      <br>
      <span>
        <a href="" class="btn-section">Cari Lowongan</a>
      </span>      
    </div>    
  </div> 
</div> -->