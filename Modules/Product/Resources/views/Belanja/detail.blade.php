@extends('layouts.FrontEnd')
@section('content')

<?php
	function random_color_part() {
	    return str_pad( dechex( mt_rand( 0, 255 ) ), 2, '0', STR_PAD_LEFT);
	}

	function random_color() {
	    return random_color_part() . random_color_part() . random_color_part();
	}
?>

	<div id="mainBody">
		<div class="container">
		<div class="row">
		<div class="span9">
		<div class="row">	  
				<div id="gallery" class="span3">
				@if (count($detailproduk[0]->gambarproduk) != 0)
	              <a href="#" title="{{$detailproduk[0]->nama_produk}}">
	  				<img src="{{ ENV('APP_URL_API_RESOURCE').'belanja/product/'.$detailproduk[0]->gambarproduk[0]->gambar_produk}}" style="width:100%" alt="{{$detailproduk[0]->nama_produk}}"/>
	              </a>	
				@else
				    <figure data-color="#E24938, #{{ random_color() }}">
				      <img src="{{ ENV('APP_URL_API_RESOURCE').'belanja/product/default-product-image.png'}}" />
				    </figure>
				@endif	
	           
				<div id="differentview" class="moreOptopm carousel slide">
	                <div class="carousel-inner">
	                  <div class="item active" style="display: flex;">
	                   @if (count($detailproduk[0]->gambarproduk) != 0)
	                   	@foreach ($detailproduk[0]->gambarproduk as $gambar)
	                   		<a href="#" > <img style="width:74%" src="{{ ENV('APP_URL_API_RESOURCE').'belanja/product/'.$gambar->gambar_produk}}" alt=""/></a>	
	                   	@endforeach
	                   @else
	                   		<a href="#" > <img style="width:74%" src="{{ ENV('APP_URL_API_RESOURCE').'belanja/product/default-product-image.png'}}" alt=""/></a>
	                   @endif
	                  </div>
	                  <div class="item">
	                   @if (count($detailproduk[0]->gambarproduk) != 0)
	                   	 @foreach ($detailproduk[0]->gambarproduk as $gambar)
	                   		 <a href="#" > <img style="width:74%" src="{{ ENV('APP_URL_API_RESOURCE').'belanja/product/'.$gambar->gambar_produk}}" alt=""/></a>	
	                   	 @endforeach
	                    @else
	                   		 <a href="#" > <img style="width:74%" src="{{ ENV('APP_URL_API_RESOURCE').'belanja/product/ default-product-image.png'}}" alt=""/></a>
	                    @endif
	                  </div>
	                </div>
	            <!--    
				  <a class="left carousel-control" href="#myCarousel" data-slide="prev">‹</a>
	              <a class="right carousel-control" href="#myCarousel" data-slide="next">›</a> 
				  -->
	              </div>
				</div>
				<div class="span6">
					<h3>{{$detailproduk[0]->nama_produk}}</h3>
					<small></small>
					<form action="{{ route('Belanja.keranjang',[$detailproduk[0]->id_produk])}}" method="post">@csrf 
						<hr class="soft"/>
						<form class="form-horizontal qtyFrm">
						  <div class="control-group">
						  	<?php $diskon = (($detailproduk[0]->harga / 50) * 100); ?>
							<label class="control-label"><span style="font-size: 23px; color: #4fc865;">Rp. {{number_format($detailproduk[0]->harga,0)}}</span></label>
							<!-- <label class="control-label"><strike style="font-size: 16px;color: #9a9e9b;position: relative;bottom: 13px;">Rp. {{number_format($diskon,0)}}</strike></label> -->
							<!-- <label class="control-label" style="position: relative;left: 278px;bottom: 8px;"><span style="font-size: 16px;color: #ffffff;position: relative;padding: 7px 28px 11px 27px;background: #4fc865;border-radius: 66px;">50%</span></label> -->
							<hr class="soft">
							<div class="controls">
							<input type="hidden" name="harga" value="{{$detailproduk[0]->harga}}">
							<input type="hidden" name="slug" value="{{$detailproduk[0]->slug}}">
							<input type="hidden" name="id_mitra" value="{{$detailproduk[0]->id_mitra}}">
							@if ($detailproduk[0]->stok == 0)	
							<input type="number" style="width: 160px !important;" readonly="readonly" class="span1" id="qty" name="qty" placeholder="Stock Habis." min=1 max="{{$detailproduk[0]->stok}}" oninput="validity.valid||(value='');" />
							@else
							<input type="number" class="span1" id="qty" name="qty" placeholder="Qty." min=1 max="{{$detailproduk[0]->stok}}" oninput="validity.valid||(value='');" />
							@endif
							<button type="submit" class="btn btn-large btn-primary pull-right">Tambah ke kerangjang <i class=" icon-shopping-cart"></i></button>
							</div>
						  </div>
						</form>
					</form>	
						<hr class="soft"/>
						<h4>Stok tersedia ± {{$detailproduk[0]->stok}}</h4>
						<hr class="soft clr"/>
						{!! substr($detailproduk[0]->keterangan,100) !!}
						<a class="btn btn-small pull-right" href="#detail">More Details</a>
						<br class="clr"/>
					<a href="#" name="detail"></a>
				<hr class="soft"/>
				</div>

				<div class="span3" style="position: absolute;left: 74%;">
					<p>Mitra</p>
					<div class = "detail-mitra">
						<div class="head">
							<div class="avatar">
								<a href="/u/jakartagadgetstore"><img class="c-avatar__image" src="https://s2.bukalapak.com/avt/2350302/small/LOGO_JGS.jpg" alt="Logo jgs" width="50" height="50"></a>
							</div>
						</div>
						<div class="body">
							<h2>
								<a title="Jakarta Gadget Store" class="nama-mitra" href="/u/jakartagadgetstore">{{$detailproduk[0]->mitra->nama}} Store</a>
							</h2>
							<div class="c-user-identification__reputation qa-seller-reputation">
								<a class="c-user-identification__feedback c-link-nd" href="/u/jakartagadgetstore/feedback?feedback_as=as_seller&amp;filter_by=all">100% (25405 feedback)</a>
							</div>
							<div class="location">
								<span class="c-user-identification-location__icon c-icon c-icon--location"></span>
								<span class="c-user-identification-location__txt qa-seller-location">
									<a href="/c/handphone/aksesoris-handphone/kabel-data/l-jakarta-pusat" style="position: relative;top: -73px;right: -62px;">{{$detailproduk[0]->mitra->kota}}</a>
								</span>
							</div>
						</div>
					</div>
					<hr class="soft" style="position: relative; bottom: 74px;">
					<div class="c-user-badges-exhibit">
						<div class="c-user-badges-exhibit__badge">
							<div class="o-flag o-flag--tiny"><div class="o-flag__head"><span class="c-seller-badge c-seller-badge--super-seller qa-seller-badge-super-seller-icon "></span></div><div class="o-flag__body"><span class="qa-seller-badge-super-seller-label " style="position: relative;bottom: 67px;">Super Seller</span></div></div>
						</div>
						<div class="c-user-badges-exhibit__badge"></div>
						<div class="c-user-badges-exhibit__badge">
							<div class="o-flag o-flag--tiny"><div class="o-flag__head"><span class="c-seller-badge c-seller-badge--lvl-7 qa-seller-badge-level-icon" title="Pelapak memiliki 10001-50000 feedback positif"></span></div><div class="o-flag__body"><span class="qa-seller-badge-level-label" style="position: relative; bottom: 57px;">Recommended Seller</span></div></div>
						</div>
						<div class="c-user-badges-exhibit__badge"></div>
					</div>
					<hr class="soft" style="position: relative; bottom: 58px;">
					<a href="{{ route('Belanja.list_keranjang')}}"><button class="btn btn-large btn-primary">Lihat Keranjang ku</button></a>
				</div>
				
				<div class="span9" style="padding-bottom: 100px;">
	            <ul id="productDetail" class="nav nav-tabs">
	              <li class="active"><a href="#home" data-toggle="tab">Details</a></li>
	              <li><a href="#profile" data-toggle="tab">Ulasan</a></li>
	            </ul>
	            <div id="myTabContent" class="tab-content">
	              <div class="tab-pane fade active in" id="home">
				  	<h4>Product Information</h4>
	                <p>{!! $detailproduk[0]->keterangan !!}</p>
				  </div>
	          </div>

		</div>
	</div>
	</div> </div>
	</div>
	<!-- MainBody End ============================= -->

@endsection
@section('script')

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
@include('sweet::alert')

<style type="text/css">

form input{
	border: 1px solid #56c174 !important;
}

input.span1, textarea.span1, .uneditable-input.span1 {
    width: 88px !important;
}

.detail-mitra{
	display: table;
    width: 100%;
    border-spacing: 0;
}

.nama-mitra{
	font-size: 14px;
    line-height: 1.4;
    font-weight: 700;
    display: block;
    overflow: hidden;
    width: 100%;
    white-space: nowrap;
    text-transform: capitalize;
    text-overflow: ellipsis;
    color: #333;
    position: relative;
    top: -72px;
    left: 58px;
}

.c-user-identification-location__txt {
    font-size: 12px;
    line-height: 1.4;
    color: #666;
}

.c-icon {
    font-family: "bl_icons_v4" !important;
    speak: none;
    font-style: normal;
    font-weight: normal;
    font-variant: normal;
    text-transform: none;
    line-height: 1;
    vertical-align: middle;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
}

.c-user-identification__feedback {
    font-size: 12px;
    line-height: 1.4;
}

.c-link-nd {
    font-weight: 400;
    text-decoration: none;
    cursor: pointer;
    color: #333;
    border-bottom: dotted 1px #333;
    outline: none;
    position: relative;
    bottom: 73px;
    left: 58px;
}

.c-panel {
    position: relative;
    display: block;
    margin-bottom: 12px;
    background-color: #fff;
    -webkit-box-shadow: 0 2px 1px rgba(51,51,51,0.05);
    box-shadow: 0 2px 1px rgba(51,51,51,0.05);
    border-radius: 2px;
    border: 1px solid #eee;
    position: relative;
    bottom: 56px;
}

.u-fg--ash-dark, .u-fg--ash-dark:focus, .u-fg--ash-dark:hover {
    color: #999 !important;
}

.u-txt--small-upcase {
    letter-spacing: 1px;
    text-transform: uppercase;
}

.u-txt--small {
    font-size: 12px;
    line-height: 1.4;
}

.u-fg--black, .u-fg--black:focus, .u-fg--black:hover {
    color: #333 !important;
}

.u-mrgn-bottom--2 {
    margin-bottom: 12px !important;
}

.u-txt--bold {
    font-weight: bold !important;
}

.u-txt--fair {
    font-size: 16px;
    line-height: 1.2;
}

.c-panel__body>:last-child {
    margin-bottom: 0;
}

.u-fg--black, .u-fg--black:focus, .u-fg--black:hover {
    color: #333 !important;
}

.u-txt--small {
    font-size: 12px;
    line-height: 1.4;
}

.c-panel__body {
    padding: 24px;
}

.c-user-stats {
    font-size: 12px;
    line-height: 1.4;
    color: #333;
    position: relative;
    bottom: 45px;
}

.c-table {
    width: 100%;
    max-width: 100%;
}

.u-fg--green-super-dark, .u-fg--green-super-dark:focus, .u-fg--green-super-dark:hover {
    color: #5eab34 !important;
}

</style>

<!-- Bootstrap style --> 
    <link rel="stylesheet" href="{!! asset('public/assets\themes/css/base.css') !!}">
<!-- Bootstrap style responsive -->	
	<link rel="stylesheet" href="{!! asset('public\assets\themes/css/bootstrap-responsive.min.css') !!}">
	<link rel="stylesheet" href="{!! asset('public\assets\themes/css/font-awesome.css') !!}">
	<link rel="stylesheet" href="{!! asset('public\assets\themes/switch/themeswitch.css') !!}">
<!-- Google-code-prettify -->	
	<link rel="stylesheet" href="{!! asset('public\assets\themes/js/google-code-prettify/prettify.css') !!}">

	<script src="{!! asset('public\assets\themes/js/google-code-prettify/prettify.js') !!}"></script> 
	<script src="{!! asset('public\assets\themes/js/bootshop.js') !!}"></script> 
	<script src="{!! asset('public\assets\themes/js/jquery.lightbox-0.5.js') !!}"></script> 

<script type="text/javascript">
	$("#qty").keyup(function() {
		var value = $(this).val();
	    value = value.replace(/^(0*)/,"");
	    $(this).val(value);

	 	activeFunction();
	});

	$("#qty").keypress(function (e) {
	    var txt = String.fromCharCode(e.which);
	    if (!txt.match(/[A-Za-z0-9&.]/)) {
	        return false;
	    }

	    if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
           	return false;
	    }
	});
</script>

@endsection
