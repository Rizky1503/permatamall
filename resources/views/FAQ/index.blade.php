@extends('layouts.FrontEnd')

@section('content')
<div class="heading-body">
    <div class="container">
        <center>
          <div class="form-cari">
            <div class="form-custom">
              <div class="input-group">
                <input type="text" class="form-control" aria-label="Amount (rounded to the nearest dollar)">
                <span class="input-group-addon">Cari</span>
              </div>
            </div>
          </div>
        </center>          
    </div>
</div>
<div class="container">
  <div>
    <span class="font-heading-font">1. Apakah guru bisa mengajar lebih dari satu mata pelajaran ?</span>
    <p style="margin-left: 20px;">Bisa. Guru bisa mengajar lebih dari satu mata pelajaran. Pastikan Anda telah mengunggah semua dokumen yang menunjukan kemampuan Anda dalam mengajar mata pelajaran tersebut.</p>
    <hr>
  </div>
  <div>
    <span class="font-heading-font">2. Apakah ada biaya yang harus dibayar untuk bergabung menjadi guru les privat ?</span>
    <p style="margin-left: 20px;">Tidak ada biaya yang harus dibayar. Namun, Permata Mall akan mengambil Rp. 20.000 (20 ribu) dari setiap biaya per-pertemuan yang Anda terima.</p>
    <hr>
  </div>
  <div>
    <span class="font-heading-font">3. Bagaimana sistem pembayaran les privat ?</span>
    <p style="margin-left: 20px;">
      A. Pembayaran guru akan diproses 100% setelah pertemuan terakhir sesuai dengan biaya yang disepakati per-pertemuan dikali jumlah pertemuan. <br>
      B. Pembayaran guru baru bisa diproses setelah guru mengirim laporan les privat dan absensi belajar. <br>
      C. Apabila setelah pertemuan pertama murid konfirmasi ketidakcocokan belajar, maka Permata Mall tetap akan memproses pembayaran untuk guru selama 1 pertemuan tersebut.
    </p>
    <hr>
  </div>
  <div>
    <span class="font-heading-font">4. Bagaimana mendapatkan murid di Bimbel Les Privat Permatamall ?</span>
    <p style="margin-left: 20px;">
      setiap harinya Permatamall akan mengirimkan tawaran mengajar kepada semua guru les privat melalui   WhatsApp. Selain itu, Permatamall akan menghubungi guru les privat prioritas secara langsung jika ada tawaran mengajar yang cocok dengan guru les privat tersebut.
    </p>
    <hr>
  </div>  
  <div>
    <span class="font-heading-font">5. Apakah Guru harus standby setiap waktu ?</span>
    <p style="margin-left: 20px;">
      Guru tidak harus stand by setiap waktu, Guru hanya harus standby selama jadwal mengajar les privat. Selama jadwal mengajar Guru diwajibkan untuk menjawab pertanyaan dari murid.
    </p>
    <hr>
  </div>  
  <div>
    <span class="font-heading-font">6. Apakah guru harus menyiapkan bahan ajar ?</span>
    <p style="margin-left: 20px;">
      Tim Permata Bimbel Les Privat menyediakan modul kurikulum les privat dalam bentuk materi kurikulum 2013. Namun, guru dihimbau untuk tetap menyiapkan materi sendiri sebagai tambahan aktivitas di dalam les privat.
    </p>
    <hr>
  </div>
  <div class="masih-bingung">
    Kamu masih bingung, coba ajukan pertanyaan kamu <a href="{{ route('Complaint.index') }}" class="btn btn-primary" style="border-radius: 2px; float: right; margin-top: -7px;">Klik disini</a>
  </div>
</div>
@endsection
@section('script')
<style type="text/css">
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
