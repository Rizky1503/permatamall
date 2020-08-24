@extends('mitra::layouts.master')

@section('content')
@include('mitra::include.menu_home_privat')
<div class="row"> 
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-body" style="min-height: 400px;">  
            	<div class="row">
				    <center>
				        <h2 style="font-weight: bold;color: #3eb960;">Belum Ada Transaksi</h2>
				        <img src="https://permatamall.com/public/assets/images/icon/empty-cart-icon.jpg">
				    </center>
				</div>                          
                <!-- <div class="col-md-12" style="border: 1px solid #e4e4e4;padding: 10px; margin-top: 10px">
				    <div class="row">
				        <div class="col-md-2">
				            <span style="font-size: 12px; color: #afafaf">Nama Product</span>
				            <br>
				            <span style="font-size: 16px;font-weight: 600;color: #444">
		                        Les Privat
		                    </span>
				        </div>				        
				        <div class="col-md-2">
				            <span style="font-size: 12px; color: #afafaf">Total Pembayaran</span>
				            <br>
				            <span style="font-size: 16px;font-weight: 600;color: #444">
		                        10.000
		                    </span>
				        </div>
				        <div class="col-md-3">
				            <span style="font-size: 12px; color: #afafaf">Jumlah Murid</span>
				            <br>
				            <span style="font-size: 16px;font-weight: 600;color: #444">
		                        10 Murid
		                    </span>
				        </div>
				        <div class="col-md-3">
				            <span style="font-size: 12px; color: #afafaf">Status Pembayaran</span>
				            <br>
				            <span style="font-size: 16px;font-weight: 600;color: #444">
                              Proses
                            </span>
				        </div>
				        <div class="col-md-2">
				            <a href="" class="btn btn-primary" style="float: right;">Selengkapnya</a>
				        </div>
				    </div>
				</div> -->
            </div>
        </div>        
    </div>    
</div>
@stop
@section('script')

@endsection
