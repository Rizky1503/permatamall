@extends('layouts.FrontEnd-v2')
@section('content')
<!-- begin:: Page -->
<div class="m-grid m-grid--hor m-grid--root m-page">
	<div class="m-grid__item m-grid__item--fluid m-grid m-grid--hor m-login m-login--singin m-login--2 m-login-2--skin-2" id="m_login" style="background-image: url({!! asset('public/assets/images/bg-3.jpg') !!});">
		<div class="m-grid__item m-grid__item--fluid	m-login__wrapper">
			<div class="m-login__container">
				<div class="m-portlet">					
					<div class="m-portlet__body">
						<div class="m-pricing-table-1 m-pricing-table-1--fixed">
							<div class="m-pricing-table-1__items row">
								<div class="m-pricing-table-1__item col-lg-12">
									<div class="m-pricing-table-1__visual">
										<div class="m-pricing-table-1__hexagon1"></div>
										<div class="m-pricing-table-1__hexagon2"></div>
										<span class="m-pricing-table-1__icon m--font-brand">
											<i class="flaticon-interface-5"></i>
										</span>
									</div>
									<span class="m-pricing-table-1__price">
										Permatamall
									</span>
									<h2 class="m-pricing-table-1__subtitle">
										Pengaduan / Keluhan
									</h2>
									
									<span class="m-pricing-table-1__description">
										selamat pengaduan/keluhan anda telah terkirim, berikut no tiket pengaduan/keluhan anda
										<br>
										<span style="font-weight: 700">{{ $id }}</span>
									</span>
									<div class="m-pricing-table-1__btn">
										<a href="{{ route('FrontEnd.index') }}" class="btn m-btn--pill  btn-success m-btn--wide m-btn--uppercase m-btn--bolder m-btn--sm">
											Kembali ke halaman utama
										</a>									
									</div>
								</div>								
							</div>
						</div>
					</div>
				</div>
				
			</div>
		</div>
	</div>
</div>
@stop
@section('script')
<style type="text/css">
.m-pricing-table-1 .m-pricing-table-1__items .m-pricing-table-1__item .m-pricing-table-1__visual {
     margin-top: 40px;     
}	

.m-pricing-table-1 .m-pricing-table-1__items .m-pricing-table-1__item:nth-child(1) .m-pricing-table-1__price {
     margin-top: 150px; 
}
.m-pricing-table-1 .m-pricing-table-1__items .m-pricing-table-1__item .m-pricing-table-1__price {
     margin-top: 150px; 
}
</style>
@endsection