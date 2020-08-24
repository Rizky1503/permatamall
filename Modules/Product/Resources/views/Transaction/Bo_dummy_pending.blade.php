@extends('layouts.FrontEnd')

@section('content')
<div style="width: 100%; height: 200px; background-image: url('{!! asset('public/images/sidebar/login.png') !!}'); justify-content: center;display: flex;">
    <div class="container" style="display: flex;justify-content: center;-ms-transform: translateY(-50%);transform: translateY(20%);">
    	<center>
    		<h1 style="font-weight: bold; color: #fff;">Detail Pembayaran</h1>
    		<h2 style="font-weight: bold; color: #f9f902;">Bimbel Online</h2>	
    	</center>
    </div>
</div>
<div class="container" style="margin-bottom: 60px; margin-top: 40px;">
  	<div class="row">
  		<div class="col-md-7">
  			<div class="panel panel-default">
		  		<div class="panel-heading">Informasi Berlangganan</div>
	  			<div class="panel-body">
	  				<div style="padding: 10px 0px 10px 0px;border:1px solid #e4e3e3; padding: 1px 10px;background-color: #efefef;">
		        		SMA - IPA 
		        		<br>
		        		Tingkat : SMA	
		        		<br>
		        		Kelas : IPA
		        		<br>
		        		Lama Berlangganan : 6 Bulan
		        		<br>
		        		Mata Pelajaran : 
		        		<br>
		        		&ensp; - Bahasa Indonesia
		        		<br>
		        		&ensp; - Fisika
		        		<br>
		        		&ensp; - Kimia
		        		<br>
		        		&ensp; - Bahasa Inggris
		        		<br>
		        		&ensp; - Biologi
		        		<br>
		        		&ensp; - MATEMATIKA IPA
		        		
		        	</div>
		        	<!-- <div style="padding: 10px 0px 10px 0px;border:1px solid #e4e3e3; padding: 1px 10px;background-color: #efefef;">
		        		<span style="font-size: 12px; color: #afafaf">Jumlah Pertemuan</span>
		        		<br>
			        	<span style="font-size: 13px;font-weight: 600;color: #444"></span>
		        	</div>
		        	<div style="padding: 10px 0px 10px 0px;border:1px solid #e4e3e3; padding: 1px 10px;background-color: #efefef;">
		        		<span style="font-size: 12px; color: #afafaf">Jenis guru</span>
		        		<br>
			        	<span style="font-size: 13px;font-weight: 600;color: #444"></span>
		        	</div>
		        	<div style="padding: 10px 0px 10px 0px;border:1px solid #e4e3e3; padding: 1px 10px;background-color: #efefef;">
		        		<span style="font-size: 12px; color: #afafaf">Jenis Kelamin guru</span>
		        		<br>
			        	<span style="font-size: 13px;font-weight: 600;color: #444">
			        		
			        	</span>
		        	</div>
		        	<div style="padding: 10px 0px 10px 0px;border:1px solid #e4e3e3; padding: 1px 10px;background-color: #efefef;">
		        		<span style="font-size: 12px; color: #afafaf">Tingkat</span>
		        		<br>
			        	<span style="font-size: 13px;font-weight: 600;color: #444"></span>
		        	</div>
		        	<div style="padding: 10px 0px 10px 0px;border:1px solid #e4e3e3; padding: 1px 10px;background-color: #efefef;">
		        		<span style="font-size: 12px; color: #afafaf">Mata Pelajaran</span>
		        		<br>
			        	<span style="font-size: 13px;font-weight: 600;color: #444"></span>
		        	</div>
		        	<div style="padding: 10px 0px 10px 0px;border:1px solid #e4e3e3; padding: 1px 10px;background-color: #efefef;">
		        		<span style="font-size: 12px; color: #afafaf">Kota</span>
		        		<br>
			        	<span style="font-size: 13px;font-weight: 600;color: #444"></span>
		        	</div> -->
	  			</div>
			</div>
			</div>
	  	<div class="col-md-5">
	  		<div class="panel panel-default">
			  	<div class="panel-body">
			  		<div style="border-bottom: 1px solid #ffffff;">
		        		<span style="font-size: 12px; color: #afafaf">Kode Berlangganan</span>
		        		<br>
			        	<span style="font-size: 13px;font-weight: 600;color: #444">
			        		202001171MDAwMDAwMDIy</span>
			        	<hr>
		        		<span style="font-size: 12px; color: #afafaf">Status</span>
		        		<br>
			        	<span style="font-size: 13px;font-weight: 600;color: #444">
			        		Menunggu Pembayaran
			        	</span>
			        	<hr>			        	
			        	<span style="font-size: 12px; color: #afafaf">Tanggal Pembelian Berlangganan</span>
		        		<br>
			        	<span style="font-size: 13px;font-weight: 600;color: #444">17 January 2020 01:33:51</span>
			        	<hr>
			        	<span style="font-size: 12px; color: #afafaf">Total Pembayaran</span>
		        		<br>
			        	<span style="font-size: 13px;font-weight: 600;color: #444">
			        		Rp. 1.000.000
			        	</span>
			        	<hr>
		                  <a href="#" class="btn btn-success">Bayar Sekarang</a>
		        	</div>
			  	</div>
			</div>
	  	</div>
  	</div>
</div>
@endsection
@section('script')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
@include('sweet::alert')
<style type="text/css">
.permata-search-detail{
    width: 100%;
    padding: 20px 40px 40px 40px;
    border-radius: 5px;
    background: #fff;
    -webkit-box-shadow: 0 6px 12px rgba(0,0,0,.175);
    box-shadow: 0 6px 12px rgba(0,0,0,.175);
    position: sticky;
    margin-top: 60px;
}

.panel-default{
	border-radius: 2px;
	border-color: #efefef;
}

.panel-default>.panel-heading {
    color: #333;
    font-weight: bold;
    font-size: 18px;
    background-color: #efefef;
    border-color: #efefef;
}

</style>
<script type="text/javascript">
</script>
@endsection
