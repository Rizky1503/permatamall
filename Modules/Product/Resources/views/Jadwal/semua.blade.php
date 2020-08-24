@extends('layouts.FrontEnd')

@section('content')
<div style="background-image: url('{!! asset('public/images/banner/Bimbel_Privat.png') !!}'); background-size: cover; background-repeat: no-repeat; background-position-y: -110px;">    
  <div class="container" style="padding-top: 20px; padding-bottom: 20px; height: 200px;">
    <span style="font-size: 32px; color: #fff;font-weight: bold;">Lihat Jadwal Les Privat</span>
  </div>
</div>
<div class="container" style="margin-top: 30px; margin-bottom: 30px;">
    @if(empty($Data))
      <div class="col-md-12" style="border: 1px solid #e4e4e4;padding: 10px; margin-top: 10px">
        <span style="font-size: 16px;">Jadwal belum tersedia</span>
      </div>         
    @else
      @foreach($Data as $listData)
      <?php
        $Keterangan = json_decode($listData->keterangan);
      ?>
      <div class="col-md-12" style="border: 1px solid #e4e4e4;padding: 10px; margin-top: 10px">
        <div class="row">
          <div class="col-md-3">
            <span style="font-size: 12px; color: #afafaf">Tingkat</span>
            <br>
            <span style="font-size: 16px;font-weight: 600;color: #444">{{ $Keterangan->tingkat }}</span>
          </div>
          <div class="col-md-3">
            <span style="font-size: 12px; color: #afafaf">Mata Pelajaran</span>
            <br>
            <span style="font-size: 16px;font-weight: 600;color: #444">
              {{ $Keterangan->mata_pelajaran }}
            </span>
          </div>        
          <div class="col-md-3">
            <span style="font-size: 12px; color: #afafaf">Jumlah Pertemuan</span>
            <br>
            <span style="font-size: 12px;color: #444">
                {{ $Keterangan->Pertemuan }}
            </span>
          </div>
          <div class="col-md-3">
              <a href="{{ route('Jadwal.index', [substr($listData->id_order,0, 12).base64_encode(substr($listData->id_order,12, 50)),base64_encode(now())]) }}" style="float: right;" class="btn btn-primary">Lihat Jadwal</a>                  
          </div>
        </div>            
      </div>  
      @endforeach   
    @endif
</div>
@endsection
@section('script')
@endsection
