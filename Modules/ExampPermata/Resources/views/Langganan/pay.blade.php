@extends('layouts.FrontEnd')

@section('content')
<div style="background-image: url('{!! asset('public/images/sidebar/banner_examp.png') !!}'); background-size: cover; text-align: center;font-size: 40px;font-weight: bold;color: #209841; padding-bottom: 80px; padding-top: 80px;">
    <div class="container" style="display: flex;justify-content: center;-ms-transform: translateY(-50%);transform: translateY(20%);">
    	<center>
    		<h1 style="font-weight: bold; color: #209841;">Detail Pembayaran</h1>
    		<h2 style="font-weight: bold; color: #209841;">Bimbel Online</h2>	
    	</center>
    </div>
</div>
<div class="container" style="margin-bottom: 60px; margin-top: 40px;">
  	<div class="row">
  		<div class="col-md-7">
  			<div class="col-md-12">
  				<div class="panel panel-default" style="border-radius: 5px;">
			  		<div class="panel-heading">Informasi Berlangganan</div>
		  			<div class="panel-body">
		  				<div style="padding: 10px 0px 10px 0px;border:1px solid #e4e3e3; padding: 1px 10px;background-color: #efefef;">
		  					Bimbel Online
			  					<br>
			  				    {{$data_paket->nama_paket}}
				        		<br>
				        		Lama Berlangganan : {{$data_paket->duration}} Bulan
				        		<br>
			        	</div>
		  			</div>
				</div>
				@if($data->paymentcode)
					@if($cek < 1 )
						<div class="content">
						  <span style="text-align: justify;">Sobat Permata Bimbel, Silahkan Lakukan Pembayaran dalam waktu 2 x 24 jam. Upload Bukti Pembayaran di Form Berikut (jpg, png):</span>
						</div>
						<br>
						<form method="POST" action="{{ route('ExampPermata.insert_payment') }}" enctype="multipart/form-data">
						@csrf
						<input type="hidden" name="inv" id="inv"  value="{{ encrypt($data->id_order) }}">
						<input type="hidden" name="id" id="id"  value="{{ $id }}">
						<div>
							<div class="form-group">
							    <label for="exampleFormControlFile1">Upload</label>
							    <input type="file" name="upload" required="required" id="upload" class="form-control-file" id="image-file-payment">
							  </div>
						</div>
						<!-- <br>
						 <div>
							<label>Atas Nama</label>
							<input type="text" name="atasnama" id="atasnama" class="form-control" value="">
						</div>
						<br>  -->
						<div>
							<button class="btn btn-success" onclick="konfirmassi()">Konfirmasi Pembayaran</button>
						</div>
						</form>

						
					@endif
						
				@endif
  			</div>
  			<div class="col-md-12">
  				@if(!$data->paymentcode)
  					@if($cek < 1 )
  						<div class="panel panel-default" style="border-radius: 5px;">
  							<div class="panel-body">
  								@if($data_deal_web->id_voucher)
  									<div class="row">
  										<div class="col-md-9">
  											@if($data_deal_web->flag == 'diskon')
  												<p style="color: red; font-size: 18px;">{{$data_deal_web->voucher_code}} {{ ucfirst($data_deal_web->flag) }} {{$data_deal_web->nominal}}%</p>
  											@else
  												<p style="color: red; font-size: 18px;">{{$data_deal_web->voucher_code}} {{ ucfirst($data_deal_web->flag) }} Rp. {{number_format($data_deal_web->nominal,0,',','.')}}</p>
  											@endif

  										</div>
  										<div class="col-md-3">
  											<button class="btn btn-success" onclick="functionvoucher()" style="border-radius: 5px;">Ganti</button>
  										</div>
  									</div>
  								@else
  									<div class="row">
  										<div class="col-md-9">
  											<p style="color: red; font-size: 18px;">Tersedia {{$voucher->count}} Voucher Untuk Kamu</p>
  										</div>
  										<div class="col-md-3">
  											<button class="btn btn-success" onclick="functionvoucher()" style="border-radius: 5px;">Gunakan</button>
  										</div>
  									</div>
  								@endif

  							</div>
  						</div>
  					@endif
  				@endif
  			</div>
  			<div class="col-md-12">	
  				@if($data->status_order != 'Cek_Pembayaran' )
	  				@if(!$data->paymentcode)
					<div class="accordion" id="accordionExample">
					  <div class="card" >
					    <div class="card-header" id="headingOne" style="background-color: #3eb960;">
					        <h2 class="mb-0" style="padding: 2px;border: 1px solid #efefef;">
					            <button type="button" class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" style="text-decoration: none; color: #fff">Manual Pembayaran</button>                  
					            <span style="float: right;">
					              <button type="button" class="btn btn-link" data-toggle="collapse" data-target="#collapseOne">
					                <i class="fa fa-chevron-down" style="color: #fff"></i>
					              </button>                              
					            </span>
					        </h2>
					    </div>
					    <div id="collapseOne" class="collapse in" aria-labelledby="headingOne" data-parent="#accordionExample" style="border:1px solid #efefef; background-color: #fff; padding: 10px;">
					        <div class="card-body" style="display: grid;">
	<!-- 				        	<h3>Manual</h3>       
	 -->				        @foreach ($manual as $key => $value)
					        	   <label onclick='GetInformationPayMethodManual("{{$value->channel_payment}}","{{$value->id_payment}}","{{ encrypt($data->id_order) }}","{{$mount}}","{{$data_deal_web->id_voucher_already}}")'><input type="radio" name="payment_method" value="{{ $value->id_payment }}">
					        	   	<img src="{{ $value->breadchumb }}" style="width: 100px;">
					        	   	<label> {{ $value->no_payment }}</label>
					        	   	<label style="float: right;">Rp. {{ number_format($mount, 0, ',', '.') }}</label>
					        	   	<hr>
					        	   </label>
					        	@endforeach                     
					        </div>
					   		<input type="button" onclick="reload()" class="btn btn-success" value="CheckOut">
					    </div>
					  </div>                
					</div>

					@if(count($online) > 0)
					<div class="accordion1" id="accordionExample1">
					  <div class="card">
					    <div class="card-header" id="headingOne" style="background-color: #3eb960;">
					        <h2 class="mb-0" style="padding: 2px;">
					            <button type="button" class="btn btn-link" data-toggle="collapse" data-target="#collapseOne1" style="text-decoration: none; color: #fff" >Online Pembayaran</button>                  
					            <span style="float: right;">
					              <button type="button" class="btn btn-link" data-toggle="collapse" data-target="#collapseOne1">
					                <i class="fa fa-chevron-down" style="color: #fff"></i>
					              </button>                              
					            </span>
					        </h2>
					    </div>
					    <div id="collapseOne1" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample1" style="border:1px solid #efefef; background-color: #fff; padding: 10px;">
					        <div class="card-body" style="display: grid;">
				    			@foreach ($online as $key => $value)
				    			  <?php if($value->nama_bank == 'Gopay'){
					    			   		$harga = $mount;
					    			   		$cost = $harga * $value->cost / 100;
					    			   		$final = $harga + $cost;
				    			   		}else{
					    			   		$harga = $mount;
					    			   		$final = $harga + $value->cost;
					    			   	}
				    			   ?>	
	 				        	   <label onclick='GetInformationPayMethod("{{$value->channel_payment}}","{{$value->id_payment}}","{{ encrypt($data->id_order) }}","{{$final}}")'><input type="radio" name="payment_method" id="payment_method" value="{{ $value->channel_payment }}"><img src="{{ $value->breadchumb }}" style="width: 100px;"><label style="float: right;">Rp. {{ number_format($final, 0, ',', '.') }}</label><hr></label>
	 				        	@endforeach  
					        </div>
					    </div>
					  </div>                
					</div><br>
						@else
						@endif
					
					@endif
				@endif	
  			</div>
	  			
		</div>
		  	<div class="col-md-5">
		  		<div class="panel panel-default" style="border-radius: 5px;">
				  	<div class="panel-body">
				  		<div style="border-bottom: 1px solid #ffffff;">
			        		<span style="font-size: 12px; color: #afafaf">Kode Berlangganan</span>
			        		<br>
			        		<input type="hidden" name="inv" id="inv" value="{{ encrypt($data->id_order) }}">
				        	<span style="font-size: 13px;font-weight: 600;color: #444">
				        		{{ $data->id_order }}</span>
				        	<hr>
			        		<span style="font-size: 12px; color: #afafaf">Status</span>
			        		<br>

			        		@if($data->status_order == 'Pending')
				        	<span style="font-size: 13px;font-weight: 600;color: #444">
				        		Menunggu Pembayaran
				        	</span>
				        	@elseif($data->status_order == 'Cek_Pembayaran')
				        	<span style="font-size: 13px;font-weight: 600;color: #444">
				        		Menunggu Konfirmasi Permatamall
				        	</span>
				        	@elseif($data->status_order == 'In Progres')
				        	<span style="font-size: 13px;font-weight: 600;color: #444">
				        		Sedang Berlangsung sampai {{ \Carbon\Carbon::parse($data->expired_bimbel_online)->format('d F Y') }}
				        	</span>
				        	@endif
				        	
				        	<hr>			        	
				        	<span style="font-size: 12px; color: #afafaf">Tanggal Pembelian Berlangganan</span>
			        		<br>
				        	<span style="font-size: 13px;font-weight: 600;color: #444">{{ \Carbon\Carbon::parse($data->created_at)->format('d F Y') }}</span>
				        	<hr>
				        	<span style="font-size: 12px; color: #afafaf">Total Pembayaran</span>
			        		<br>
			        		@if($data_deal_web->id_voucher)
				        	<span style="font-size: 13px;font-weight: 600;color: #444; text-decoration: line-through;">Rp. {{ number_format($mount_deal, 0, ',', '.') }}</span><br>
				        	<span style="font-size: 13px;font-weight: 600;color: red; font-size: 18px;">Rp. {{ number_format($mount, 0, ',', '.') }}</span>
				        	@else
				        	<span style="font-size: 13px;font-weight: 600;color: #444; ">Rp. {{ number_format($mount, 0, ',', '.') }}</span>
				        	@endif
				        	@if($data->paymentcode)
				        	<hr>			        	
				        	<span style="font-size: 12px; color: #afafaf">Metode Pembayaran</span>
				        	<?php
				        	$payment = json_decode(file_get_contents(ENV('APP_URL_API').'langganan/examp/get_payment/'.$data->paymentcode));
				        	?>
							<br>
				        	<img src="{{ $payment->breadchumb }}" style="width: 68px;">	
				        	<span style="font-size: 13px;font-weight: 600;color: #444">{{ $payment->nama_payment  }}</span>
				        	<span style="font-size: 13px;font-weight: 600;color: #444;float: right">{{ $payment->no_payment  }}</span>
				        	<br>
				        	@if($cek < 1)
				        	<span><a style="color:red;cursor: pointer;" onclick="hapuspaymentorder()">Ganti Metode Pembayaran</a></span>
				        	@endif
				        	<hr>			        	
				        	
				        	@endif
			        	</div>
				  	</div>
				</div>
				
		  	</div>
  		</div>
</div>

@if( $asal_sekolah == 0)
<div id="loadMe" class="modal">
    <div>
	  <div class="row">
	  	<div class="col-md-3">
	  		<div class="form-group">
			  <label>* Tingkat</label>
			  	<select name="tingkat" id="tingkat" class="form-control">
			  		<option value="SD">SD</option>
			  		<option value="SMP">SMP</option>
			  		<option value="SMA">SMA</option>
			  	</select>
			</div>	
	  	</div>
	  	<div class="col-md-9">
			<div class="form-group">
			  <label>* Asal Sekolah</label>
			  <input type="text" name="asal_sekolah" id="asal_sekolah" required="required"  placeholder="MUHAMADIYAH 1" class="form-control">
			</div>
	  	</div>
	  	<div class="col-md-12">
			<div class="form-group">
			  <div class="ui-widget">
				  <label>Kota Sekolah</label>
				  <input type="text" name="kota_sekolah" id="kota_sekolah" required="required" placeholder="JAKARTA" class="form-control" onkeyup="filterkota(this.value)">
			  </div>
			</div>
	  	</div>
	  </div>
    </div>
    <p id="demo"></p>
  
 <!--  <div class="form-group">
    <label class="container-checked">Masih Bersekolah di Sekolah yang Sama
      <input type="checkbox" id="checkbox-data" onclick="functionCheckbox()">
      <span class="checkmark"></span>
    </label>
  </div> -->
  <div class="form-group">
    <!-- <button type="submit" class="btn btn-primary" onclick="InsertAsalSekolah()">Konfirmasi</button> -->
  	<button type="submit" class="btn btn-primary" onclick="InsertAsalSekolah()">Konfirmasi</button>
  </div> 
</div>
<a href="#" rel="modal:close" id="close-modal"></a>
@endif


<!-- modal voucher -->
<div id="voucher" class="modal" style="top: -140px; max-height: 300px; overflow-x: hidden; overflow-y: auto;">
	<div style="">
		<p style="font-size: 20px">Semua Voucher</p><hr style="margin-top: 7px; margin-bottom: 16px">
	   	@foreach($voucher->voucher as $key => $value)
		    <div class="voucher-kotak" style="height: auto; border: 1px solid #9a9a9a; border-radius: 5px;">
	    		<?php $detail = explode(',',$value->detail);?>
		    	<div class="row" style="padding: 10px;">
		    		<div class="col-md-9">
		    			@if($value->flag == 'diskon')
		    				<p style="font-size: 15px; color: green;"><b>{{$value->voucher_code}} - {{ucfirst($value->flag)}} {{$value->nominal}}% {{$value->kelas}}</b></p>
		    			@else
		    				<p style="font-size: 15px; color: green;"><b>{{$value->voucher_code}} - {{ucfirst($value->flag)}} Rp. {{number_format($value->nominal,0,',','.')}} {{$value->kelas}}</b></p>
		    			@endif
		    			@foreach($detail as $key => $detail)
		    				<p style="font-size: 12px; color: grey; line-height: 0px;">{{$detail}}</p>
		    			@endforeach
		    				<p style="font-size: 12px; color: grey; line-height: 1px;">{{ \Carbon\Carbon::parse($value->expired_date)->format('d F Y') }}</p>
		    		</div>
		    		<div class="col-md-3">
		    			<button class="btn btn-success" onclick="fuctionpilihvoucher('{{$value->voucher_code}}','{{$value->flag}}','{{$value->nominal}}','{{ encrypt($data->id_order) }}','{{$mount_deal}}','{{$value->id_voucher}}')" style="border-radius: 5px; margin-top: 8px;">Gunakan</button>
		    		</div>
		    	</div>
		    </div><br>
	    @endforeach
	</div>
</div>

@endsection
@section('script')
@include('sweet::alert')


 <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="SB-Mid-server-juzzj8oCGer3_4cZ5kgt_s46"></script>

 <script type="text/javascript" src="https://app.midtrans.com/snap/snap.js" data-client-key="Mid-server-0_7N8YEMOvU1GBFZtLEIkMFL:"></script>

 <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<script type="text/javascript">

function fuctionpilihvoucher(kode,flag,nominal,invoice,amount,id_voucher){
	$.ajax({
	    type: "GET",
	    url: '{{ route("ExampPermata.diskon") }}',
	    data: {
	        kode : kode,
	        flag : flag,
	        nominal : nominal,
	        invoice : invoice,
	        amount  : amount,
	        id_voucher : id_voucher,
	    },
	    success: function(responses){  
	    	location.reload()
	    }
	});
}

function ManualPayment (){	
	$('#collapseOne1').removeClass('collapse in').addClass('collapse');
}

function OnlinePayment (){
	$('#collapseOne').removeClass('collapse in').addClass('collapse');
}

function filterkota (value){
	$.ajax({
	    type: "GET",
	    url: '{{ route("ExampPermata.kota_sekolah") }}',
	    data: {
	        kota_sekolah : $('#kota_sekolah').val(),
	    },
	    success: function(responses){  
	    	$( "#kota_sekolah" ).autocomplete({
	      		source: responses
	    	});
	    }
	});
}

$(document).ready(function() {
    $('#loadMe').modal({
    	fadeDuration: 250,
    	escapeClose: false,
		clickClose: false,
		showClose: false
  	});
});

function functionvoucher(){
	$('#voucher').modal({
  	});
}

$('#image-file-payment').bind('change', function() {
    fileValidation(this.id);
    var mb = this.files[0].size / 1024 / 1024;
    if (mb > 3) {
      swal({
        title: "Error!",
        text: "Foto yang kamu upload "+ mb.toFixed(2)+" MB, maksimal upload yang di izinkan 1 MB",
        icon: "error",
      });
          this.value = "";
    }   
  });

function GetInformationPayMethod(chanel,code,invoice,amount){
	$.ajax({
	    type: "GET",
	    url: '{{ route("ExampPermata.online_payment") }}',
	    data: {
	        channel_payment : chanel,
	        payment_code : code,
	        id_invoice : invoice,
	        final_amount : amount,
	    },
	    success: function(responses){  
	    	console.log(responses);
	    	snap.pay(responses);
	    }
	});
}

function GetInformationPayMethodManual(chanel,code,invoice,amount,id_voucher){
	$.ajax({
	    type: "GET",
	    url: '{{ route("ExampPermata.store_payment_method") }}',
	    data: {
	        channel_payment : chanel,
	        payment_code : code,
	        id_invoice : invoice,
	        amount : amount,
	        id_voucher : id_voucher
	    },
	    success: function(responses){  
	    	console.log(responses);
	    	snap.pay(responses);
	    }
	});
}

function InsertAsalSekolah(){
	var asal_sekolah = document.getElementById("asal_sekolah").value;
	var kota_sekolah = document.getElementById("kota_sekolah").value;

	if (asal_sekolah == ""){
	  	alert('Asal Sekolah Tidak Boleh Kosong');
	}else if (kota_sekolah == ""){
	  	alert('Kota Sekolah Tidak Boleh Kosong');
	}else{
		$.ajax({
		    type: "GET",
		    url: '{{ route("ExampPermata.update_sekolah") }}',
		    data: {
		        tingkat : $('#tingkat').val(),
		        asal_sekolah : $('#asal_sekolah').val(),
		        kota_sekolah : $('#kota_sekolah').val(),
		        id_invoice : $('#inv').val(),
		    },
		    success: function(responses){  
		    	 
		    	$.modal.getCurrent().close();
		    }
		});
	}
}

function onlinepayment(value){
	$.ajax({
	    type: "GET",
	    url: '{{ route("ExampPermata.online_payment") }}',
	    data: {
	        channel_payment : value,
	        id_invoice : $('#inv').val(),
	    },
	    success: function(responses){  
	    	console.log(responses);
	    	snap.pay(responses);
	    }
	});
}

function konfirmasi(){
	var file = document.getElementById("upload").value
	if (file == "") {
		alert('Upload Bukti Pembayaran Terlebih Dulu')
	}else{
		$.ajax({
	    type: "GET",
	    url: '{{ route("ExampPermata.insert_payment") }}',
	    data: {
	        file : file,
	        inv: $('#inv').val(),
	    },
	    success: function(responses){  
		    	if(responses == '200'){
		    		
		    	}else{
		    		Swal.fire({
		    		  title: 'Error!',
		    		  text: 'Pergantian Metode Pembayaran Gagal',
		    		  icon: 'error',
		    		  confirmButtonText: 'error'
		    		});
		    	}
	    	}
		});
	}
}

function hapuspaymentorder(value){
	$.ajax({
	    type: "GET",
	    url: '{{ route("ExampPermata.cancel_payment") }}',
	    data: {
	        inv: $('#inv').val(),
	    },
	    success: function(responses){  
	    	location.reload();
	        
	    }
	});
}

function reload(){
	location.reload();
}

$(document).ready(function(){
    $("input[type='button']").click(function(){
    	var radioValue = $("input[name='payment_method']:checked").val();
        if(radioValue){
            $.ajax({
                type: "GET",
                url: '{{ route("ExampPermata.proses") }}',
                data: {
                    method:radioValue,
                    inv: $('#inv').val(),
                },
                success: function(responses){  
                	if(responses == '200'){
                		
                	}else{
                		Swal.fire({
                		  title: 'Error!',
                		  text: 'Pembayaran Gagal',
                		  icon: 'error',
                		  confirmButtonText: 'Cool'
                		});
                	}
                    
                }
            });
        }
    });
});

</script>

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

.ui-autocomplete-input{
	z-index: 10;
}

.ui-front {
    z-index: 9999;
    border: 1px solid grey;
    background-color: white;
    width: 200px !important;
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

.color_active{
  	background: #e3edfd;
  	font-weight: bold;
}  

.modal {
    overflow: visible;
}   

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

.container-checked input {
    position: absolute;
    opacity: 0;
    cursor: pointer;
    height: 0;
    width: 0;
}

.container-checked:hover input ~ .checkmark {
    background-color: #ccc;
}

.checkmark {
    position: absolute;
    top: 3px;
    border-radius: 3px;
    left: 0;
    height: 15px;
    width: 15px;
    background-color: #eee;
}

.container-checked input:checked ~ .checkmark:after {
    display: block;
}

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

.checkmark:after {
    content: "";
    position: absolute;
    display: none;
}

.container-checked input:checked ~ .checkmark {
    background-color: #56c174;
}

form input {
	border: 0px solid #eee;
	border-radius: 2px;
	color: #777;
	outline: none;
	margin-top: 3px;
	font-size: inherit;
	display: block;
	padding: 8px;
	padding-left: 30px;
	width: 100%;
	-moz-box-sizing: border-box;
	-webkit-box-sizing: border-box;
	box-sizing: border-box;
}

.modal a.close-modal {
    display: none !important; 
}

</style>

@endsection
