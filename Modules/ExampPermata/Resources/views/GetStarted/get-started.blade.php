@extends('examppermata::layouts.master2')

@section('content')
<div style="background-image: url('{!! asset('public/images/sidebar/banner_examp.png') !!}'); background-size: cover; text-align: center;font-size: 40px;font-weight: bold;color: #209841; padding-bottom: 80px; padding-top: 80px;">
       <div class="col-md-2"></div>
       @if(Session::get('id_token_xmtrusr'))
        <div class="col-md-8" style="font-size: 24px; margin-top: -34px;">TERIMAKASIH TELAH BERGABUNG BERSAMA PERMATA BIMBEL SAAT INI PAKET YANG ANDA PILIH MASIH GRATIS SELAMA MASA PROMOSI SELAMAT BELAJAR DAN BERLATIH</div>
       @else
        <div class="col-md-8" style="font-size: 24px; margin-top: -34px;">SELAMAT DATANG SILAHKAN REGISTRASI ATAU LOGIN UNTUK MENGAKSES FITUR BIMBEL ONLINE PERMATA BIMBEL</div>
       @endif
      
       <div class="col-md-2"></div>
</div>
<div class="container" style="padding-bottom: 80px;">  
  @if($data->paket_ready == 'login dulu')
    <br><p style="font-size: 18px;">Cara Menggunakan Voucher :</p><div>
      @foreach($data->voucher as $value)
        <p>{{$value->tutor}}</p>
      @endforeach
    </div>
    <div class="row">     
      @foreach($data->paket as $ListData)
          <div class="col-md-3">
            <a href="{{ route('ExampPermata.paket_more',[encrypt($ListData->id_paket)]) }}">
              <div class="card card-image" style="background-image: url({{ ENV('APP_URL_API_RESOURCE').'images/paket/examp/'.$ListData->banner_paket }}); background-size: contain; min-height: 300px; background-position: center;background-repeat: no-repeat; border-radius: 5px; margin-top: 20px;">          
              </div>
              <p>Siswa bissa belajar dari soal-soal pilihan serta pembahasannya, dan beberapa video tutorial belajar yang ada.</p>
              <p>PermataMall juga akan mengadakan secara periodik program belajar jarak jauh lewat "Video Conference", kalau ada pertanyaan dapat mengghubungi kami di support@permatamall.com dan di no WA 0811811306.</p>
              <p style="color: #f12713"><b>Rp. {{number_format($ListData->amount,0,',','.')}}</b></p>
              <p style="color: #f12713"><b>NOTE : *SELAMA MASA PROMOSI</b></p>
            </a>
            <a href="{{ route('ExampPermata.paket_more',[encrypt($ListData->id_paket)]) }}" class="btn btn-primary form-control">Masuk</a>
          </div>
      @endforeach
    </div>
  @else     
    <div class="row"> 
      <h2>Paket Yang Kamu Punya :</h2>    
      @foreach($data->paket_ready as $ListData)
          <div class="col-md-3">
            <a href="{{ route('ExampPermata.langganan',[base64_encode($ListData->id_paket)]) }}">
              <div class="card card-image" style="background-image: url({{ ENV('APP_URL_API_RESOURCE').'images/paket/examp/'.$ListData->banner_paket }}); background-size: contain; min-height: 300px; background-position: center;background-repeat: no-repeat; border-radius: 5px; margin-top: 20px;">          
              </div>
            </a>
          </div>
      @endforeach
    </div>
    <br><div class="row">  
      <h2>Paket Lainnya :</h2>   
      <br><p style="font-size: 18px;">Cara Menggunakan Voucher :</p><div>
        @foreach($data->voucher as $value)
          <p>{{$value->tutor}}</p>
        @endforeach
      </div>
      @foreach($data->paket as $ListData)
         <div class="col-md-3">
            <a href="{{ route('ExampPermata.paket_more',[encrypt($ListData->id_paket)]) }}">
              <div class="card card-image" style="background-image: url({{ ENV('APP_URL_API_RESOURCE').'images/paket/examp/'.$ListData->banner_paket }}); background-size: contain; min-height: 300px; background-position: center;background-repeat: no-repeat; border-radius: 5px; margin-top: 20px;">          
              </div>
              <p>Siswa bissa belajar dari soal-soal pilihan serta pembahasannya, dan beberapa video tutorial belajar yang ada.</p>
              <p>PermataMall juga akan mengadakan secara periodik program belajar jarak jauh lewat "Video Conference", kalau ada pertanyaan dapat mengghubungi kami di support@permatamall.com dan di no WA 0811811306.</p>
              <p style="color: #f12713"><b>Rp. {{number_format($ListData->amount,0,',','.')}}</b></p>
              <p style="color: #f12713"><b>NOTE : *SELAMA MASA PROMOSI</b></p>
            </a>
            <a href="{{ route('ExampPermata.paket_more',[encrypt($ListData->id_paket)]) }}" class="btn btn-primary form-control">Masuk</a>
          </div>
      @endforeach
    </div>
  @endif   
</div>

@endsection
@section('script')
<style>
  .form-control{
    background: #41c866;
    color: white;
  }
  .ps-main{
    background: #f5fbf5;
  }

  .btn-order{
    position: absolute;
    bottom: 0;
    margin-left: -60px;
    margin-bottom: 20px;    
  }
</style>
<script type="text/javascript">
</script>
@endsection
