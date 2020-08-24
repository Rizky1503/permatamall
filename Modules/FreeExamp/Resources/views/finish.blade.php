@extends('layouts.FrontEnd')

@section('content')
<div style="background-image: url('{!! asset('public/images/sidebar/examp.png') !!}'); background-size: cover; text-align: center;font-size: 40px;font-weight: bold;color: #fff; padding-bottom: 80px; padding-top: 80px;">
    Pembahasan Soal Anda
</div>
<div class="container" style="padding-bottom: 80px; padding-top: 10px;">      
  <div class="masih-bingung">
    <p>
      Selamat Anda telah menyelesaikan Latihan, Kami menyarankan untuk mencoba soal-soal yang lebih banyak dan bervariasi dengan klik tombol <strong>LANJUT</strong> untuk registrasi. Setelah registrasi, maka akan mendapatkan soal-soal, pembahasan dan video tutorial yang lebih banyak dan bervariasi dan tentunya <strong>masih GRATIS</strong> lho selama promosi.
    </p>
    <a href="{{ route('ExampPermataBimbelOnline.getStarted') }}" class="btn btn-primary">Lanjut</a>
    <a href="{{ route('FrontEnd.index') }}" class="btn btn-warning">Tidak</a>
  </div>    
  <div class="table-responsive">          
    <table class="table table-bordered" width="100%" style="background-color: #fff;">
      <thead>
        <tr>
          <th style="vertical-align : middle;text-align:center;" width="5%" rowspan="2">#</th>
          <th style="vertical-align : middle;text-align:center;" width="35%" rowspan="2">Soal</th>
          <th style="vertical-align : middle;text-align:center;" width="35%" rowspan="2">Pembahasan</th>
          <th style="vertical-align : middle;text-align:center;" width="15%" colspan="2" style="text-align: center;">Jawaban</th>
          <th style="vertical-align : middle;text-align:center;" width="10%" rowspan="2">Keterangan</th>
        </tr>
        <tr>
          <th style="text-align: center;">Betul</th>
          <th style="text-align: center;">Anda</th>
        </tr>
      </thead>
      <tbody>
        @foreach($Data as $key => $ListData)
        <tr>
          <td align="center">{{ $key + 1 }}</td>
          <td align="center"><img src="{{ ENV('APP_URL_API_RESOURCE').'images/gratis/5041/Soal/'.$ListData->soal }}" style='width:100%;'></td>
          <td align="center"><img src="{{ ENV('APP_URL_API_RESOURCE').'images/gratis/5041/Pembahasan/'.$ListData->pembahasan }}" style='width:100%;'></td>
          <td align="center"><b>{{ $ListData->jawaban }}</b></td>
          <td align="center"><b>{{ $ListData->jawaban_user }}</b></td>
          <td align="center">
            @if($ListData->jawaban == $ListData->jawaban_user )
              Betul
            @else
              Salah
            @endif
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection
@section('script')
<style type="text/css">
.masih-bingung {
    margin-top: 50px;
    margin-bottom: 50px;
    border: 1px solid #c1c1c1;
    padding: 20px 10px 20px 10px;
    border-radius: 5px;
    background-color: #fafbfc;
    border: 1px solid rgba(0,0,0,.12);
    color: #000;
}  
</style>
@endsection