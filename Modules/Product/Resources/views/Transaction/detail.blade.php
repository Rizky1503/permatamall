@extends('layouts.FrontEnd')

@section('content')
<div style="width: 100%; height: 200px; background-image: url('{!! asset('public/images/sidebar/login.png') !!}'); justify-content: center;display: flex;">
    <div class="container" style="display: flex;justify-content: center;-ms-transform: translateY(-50%);transform: translateY(20%);">
    	<center>
    		<h1 style="font-weight: bold; color: #fff;">Detail Transaksi</h1>
    	</center>
    </div>
</div>
<div class="container" style="margin-bottom: 60px; margin-top: 40px;">
  	<div class="row">
  		<div class="col-md-7">
  			<div class="col-md-12">
  				<div class="panel panel-default">
			  		<div class="panel-heading">Informasi Pesanan</div>
		  			<div class="panel-body">
		  				<div style="padding: 10px 0px 10px 0px;border:1px solid #e4e3e3; padding: 1px 10px;background-color: #efefef;">
		  					Les Private
		  					<br>
			        		{{ json_decode($Detail->keterangan)->tingkat ?? '' }} - {{ json_decode($Detail->keterangan)->mata_pelajaran ?? '' }} - {{ json_decode($Detail->keterangan)->kota }}
			        		<br>
			        		{{ json_decode($Detail->keterangan)->Pertemuan }} Kali Pertemuan	
			        		<br>
			        		{{ json_decode($Detail->keterangan)->level }}
			        		<br>
			        		{{ json_decode($Detail->keterangan)->tingkat }}
			        		<br>
			        		{{ json_decode($Detail->keterangan)->mata_pelajaran }}
			        		<br>
			        		{{ json_decode($Detail->keterangan)->kota }}
			        	</div>
		  			</div>
				</div>
				@if($data->paymentcode or $data=='null')
					@if($cek < 1)
						<div class="content">
						  <span style="text-align: justify;">Sobat Permata Bimbel, Silahkan Lakukan Pembayaran dalam waktu 1 x 24 jam. Salam Permata Bimbel.Masukan Bukti Pembayaran di Form Berikut:</span>
						</div>
						<br>
						<div>
							<div class="form-group">
							    <label for="exampleFormControlFile1">Bukti Pembayaran</label>
							    <input type="file" name="buktipembayaran" id="buktipembayaran" class="form-control-file" id="exampleFormControlFile1">
							  </div>
						</div>
						<br>
						<div>
							<label>Atas Nama</label>
							<input type="text" name="atasnama" id="atasnama" class="form-control" value="">
						</div>
						<br>
						<div>
							<button class="btn btn-success" onclick="konfirmasi()">Konfirmasi Pembayaran</button>
						</div>
					@endif
				@endif
  			</div>
  			<div class="col-md-12">
  				@if(!$data->paymentcode)
				<div class="accordion" id="accordionExample">
				  <div class="card">
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
				        	   <label><input type="radio" name="payment_method" value="{{ $value->id_payment }}"><img src="{{ $value->breadchumb }}" style="width: 100px;"><label style="float: right;">Rp. {{ number_format($data->amount, 0, ',', '.') }}</label><hr></label>
				        	@endforeach                     
				        </div>
				   		<input type="button" class="btn btn-success" value="CheckOut">
				    </div>
				  </div>                
				</div>

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
				    			   		$harga = $data->amount;
				    			   		$cost = $harga * $value->cost / 100;
				    			   		$final = $harga + $cost;
			    			   		}else{
				    			   		$harga = $data->amount;
				    			   		$final = $harga + $value->cost;
				    			   	}
			    			   ?>	
 				        	   <label><input type="radio" onclick="onlinepayment(this.value)" name="payment_method" value="{{ $value->channel_payment }}"><img src="{{ $value->breadchumb }}" style="width: 100px;"><label style="float: right;">Rp. {{ number_format($final, 0, ',', '.') }}</label><hr></label>
 				        	@endforeach  
				        </div>
				    </div>
				  </div>                
				</div><br>
			@endif	
  			</div>
	  			
		</div>
	  	<div class="col-md-5">
	  		<div class="panel panel-default">
			  	<div class="panel-body">
			  		<div style="border-bottom: 1px solid #ffffff;">
		        		<span style="font-size: 12px; color: #afafaf">No Tagihan</span>
		        		<br>
		        		<input type="hidden" name="inv" id="inv" value="{{ encrypt($Detail->id_order) }}">
			        	<span style="font-size: 13px;font-weight: 600;color: #444">{{ substr($Detail->id_order,3, 9) }}{{ base64_encode(substr($Detail->id_order,12, 9)) }}</span>
			        	<hr>
		        		<span style="font-size: 12px; color: #afafaf">Status</span>
		        		<br>
			        	<span style="font-size: 13px;font-weight: 600;color: #444">
			        		@if($Detail->status_order == "Cek_Pembayaran")
			                    Konfirmasi
			                  @elseif($Detail->status_order == "Pending")
			                    Proses
			                  @elseif($Detail->status_order == "In Progres")
			                    Terverifikasi
			                  @else
			                    {{ str_replace('_',' ', $Detail->status_order) }}
			                  @endif
			        	</span>
			        	<hr>			        	
			        	<span style="font-size: 12px; color: #afafaf">Tanggal transaksi</span>
		        		<br>
			        	<span style="font-size: 13px;font-weight: 600;color: #444">{{ \Carbon\Carbon::parse($Detail->created_at)->format('d F Y H:i:s') }}</span>
			        	<hr>			        	
			        	<span style="font-size: 12px; color: #afafaf">Total Pembayaran</span>
		        		<br>
			        	<span style="font-size: 13px;font-weight: 600;color: #444">Rp. {{ number_format($data->amount, 0, ',', '.') }}</span>
			        	<input type="hidden" name="amount" id="amount" value="{{ $data->amount }}">
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
			        	
			        	@endif
		        	</div>
			  	</div>
			</div>
			
	  	</div>
  	</div>
</div>
@endsection
@section('script')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="SB-Mid-server-juzzj8oCGer3_4cZ5kgt_s46"></script>
@include('sweet::alert')


<script type="text/javascript">

function onlinepayment(value){
	$.ajax({
	    type: "GET",
	    url: '{{ route("Transaction.online_payment") }}',
	    data: {
	        channel_payment : value,
	        id_invoice : $('#inv').val(),
	        amount : $('#amount').val(),
	    },
	    success: function(responses){  
	    	snap.pay(responses);
	    }
	});
}

function konfirmasi(){
	var atasnama = document.getElementById("atasnama").value
	var file = document.getElementById("buktipembayaran").value
	$.ajax({
	    type: "GET",
	    url: '{{ route("ExampPermata.insert_payment") }}',
	    data: {
	        atasnama: atasnama,
	        file : file,
	        inv: $('#inv').val(),
	    },
	    success: function(responses){  
	    	if(responses == '200'){
	    		location.reload();
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
                		location.reload();
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

function hapuspaymentorder(){
	$.ajax({
	    type: "GET",
	    url: '{{ route("ExampPermata.delete_payment") }}',
	    data: {
	        inv: $('#inv').val(),
	    },
	    success: function(responses){  
	    	if(responses == '200'){
	    		location.reload();
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

@endsection
