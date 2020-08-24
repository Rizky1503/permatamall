@extends('layouts.FrontEnd')

@section('content')
<!-- start slider -->
<div style="width: 100%; height: 200px; background-image: url('{!! asset('public/images/sidebar/bo.png') !!}');">
    <div class="container">
      	<center>
          <p style="font-size: 24px;color: #fff;font-weight: 600;margin-top: 60px;">Lembaga Bimbingan Belajar Daerah {{ $kota }}</p>
      	</center>          
    </div>
</div>
<!-- slider end -->
<div class="container" style="margin-top: 20px;">
  <div class="row">    
    <div class="col-md-3">    	
		<div class="card">
		  <img src="{!! asset('public/images/contoh-bimbel.jpg') !!}" alt="Avatar" style="width:100%">
		  <div class="container-card">
		    <h4><b>Bimbel Ganesha</b></h4> 
		    <p>SD, SMP, SMA</p>
		    <p>Cabang : Surabaya, bandung,jakarta, Bogor, selatan, tanggerang ...</p> 
		  </div>
		  <a href="{{ route('Bimbel.more',['Ganesha-Operation-more','kota'=> base64_encode($kota)]) }}">
		  	<div style="background-color: #3eb960; padding: 10px; font-weight: bold; text-align: center; color: #fff">
			  	Selengkapnya
			</div>
		  </a>
		</div>
    </div>
    
  </div>
  <div style="margin-bottom: 60px;">
    
  </div>
</div>
@endsection
@section('script')
<style>
.card {
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
  transition: 0.3s;
  width: 100%;
}

.card:hover {
  box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
}

.container-card {
  padding: 2px 16px;
}
</style>
@endsection
