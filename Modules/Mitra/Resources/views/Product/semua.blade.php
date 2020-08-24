@extends('mitra::layouts.master-v2')

@section('content')
@if(!empty($data))
<div class="m-portlet m-portlet--bordered-semi m-portlet--widget-fit m-portlet--full-height m-portlet--skin-light ">
    <div class="m-portlet__head">
        <div class="m-portlet__head-caption">
            <div class="m-portlet__head-title">
                <h3 class="m-portlet__head-text m--font-light">
                    Produk Kamu
                </h3>
            </div>
        </div>
    </div>
    <div class="m-portlet__body">
        <div class="m-widget17">
            <div class="m-widget17__visual m-widget17__visual--chart m-portlet-fit--top m-portlet-fit--sides m--bg-danger">
                <div class="m-widget17__chart" style="height:200px; background-image: url('{!! asset('public/images/sidebar/mitra.png') !!}');">
                	
                </div>
            </div>
            <div class="m-widget17__stats">                
                <div class="row">                	
                	@foreach($data as $ListData)
                	<div class="col-md-4" style="margin-bottom: 80px;">
                		@if($ListData->id_master_kategori == 19) <!-- privat -->
                		<a style="text-decoration: none;" href="{{ route('Mitra.Product.data',[base64_encode($ListData->id_master_kategori)]) }}">
                		@elseif($ListData->id_master_kategori == 23) <!-- Bimbel Offline -->
                		<a style="text-decoration: none;" href="">
                		@elseif($ListData->id_master_kategori == 24) <!-- Belanja -->
                		<a style="text-decoration: none;" href="{{ route('Mitra.Belanja.Product.index') }}">
                		@else
                		<a style="text-decoration: none;" href="">
                		@endif                		
                			<div class="m-widget17__items m-widget17__items-col2">
			                    <div class="m-widget17__item">
			                        <span class="m-widget17__icon">
			                            <img src="{{ ENV('APP_URL_API').'icon/'.$ListData->icon }}" width="50">
			                        </span>
			                        <span class="m-widget17__subtitle">
			                           	{{ $ListData->kategori }}
			                        </span> 
			                        <span class="m-widget17__desc">
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			                        </span>
			                    </div>
			                </div>
                		</a>                		
                	</div>   
                	@endforeach                  	        	
                </div>
            </div>
        </div>
    </div>
</div>
@endif   

<div class="m-portlet m-portlet--bordered-semi m-portlet--widget-fit m-portlet--full-height m-portlet--skin-light ">
    <div class="m-portlet__head">
        <div class="m-portlet__head-caption">
            <div class="m-portlet__head-title">
                <h3 class="m-portlet__head-text m--font-light">
                    Semua Produk
                </h3>
            </div>
        </div>
    </div>
    <div class="m-portlet__body">
        <div class="m-widget17">
            <div class="m-widget17__visual m-widget17__visual--chart m-portlet-fit--top m-portlet-fit--sides m--bg-danger">
                <div class="m-widget17__chart" style="height:200px; background-image: url('{!! asset('public/images/sidebar/mitra.png') !!}');">
                	
                </div>
            </div>
            <div class="m-widget17__stats">                
                <div class="row">
                	@foreach($ListProdCategory as $ListProdCategoryProduct)
                		@if($ListProdCategoryProduct->id_master_kategori != "23" AND $ListProdCategoryProduct->id_master_kategori != "25")
							<div class="col-md-4" style="margin-bottom: 80px;">
		                		<a style="text-decoration: none;" href="{{ route('Mitra.daftar') }}?prod={{ base64_encode($ListProdCategoryProduct->id_master_kategori) }}">
		                			<div class="m-widget17__items m-widget17__items-col2">
					                    <div class="m-widget17__item">
					                        <span class="m-widget17__icon">
					                            <img src="{{ ENV('APP_URL_API').'icon/'.$ListProdCategoryProduct->icon }}" width="50">
					                        </span>
					                        <span class="m-widget17__subtitle">
					                           	{{ $ListProdCategoryProduct->kategori }}
					                        </span>
					                        <span class="m-widget17__desc">
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					                        </span>
					                    </div>
					                </div>
		                		</a>                		
		                	</div> 
						@endif					
					@endforeach                	      	
                </div>
            </div>
        </div>
    </div>
</div>

<!-- <div class="row"> 
    <div class="col-md-12">    	

        @if(decrypt(Session::get('id_token_xmtrusr')) == "MT201909131000000008")
        <div class="panel panel-default">
            <div class="panel-heading">List Produk Kamu</div>
            <div class="panel-body Transaksi">
				<div class="col-md-3" style="border: 1px solid #f5f5f5; padding-top: 15px; padding-right: 0px; padding-left: 0px;">
					<center>
						<img src="{{ ENV('APP_URL_API').'icon/1909061000-cvrtyehg.png' }}" width="100">
						<h2>Bimbel Offline</h2>
					</center>
					<a href="{{ route('Mitra.BOF.index') }}">
						<div style="background: #3eb960; padding: 10px; color: #fff; font-size: 15px; margin-top: 15px;">
							<center>Selengkapnya</center>
						</div>
					</a>						
				</div>              					
            </div>            
        </div>
        @endif        
    </div>    
</div> -->
@stop
@section('script')
<style type="text/css">
.m-widget17 .m-widget17__stats .m-widget17__items .m-widget17__item {
	border:2px solid #f2f3f8;
}	
</style>
@endsection
