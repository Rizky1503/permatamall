@extends('layouts.backend-not-found')


@section('content')
<div class="m-grid__item m-grid__item--fluid m-grid" style="background-image: url({!! asset('public/images/bg3.jpg') !!}); padding: 50px; background-size: cover;">
	<div class="m-error_container">
		<span class="m-error_number">
			<h1 style="font-size: 150px;">
				500
			</h1>
		</span>
		<p class="m-error_title m--font-light" style="font-size: 50px;">
			Opps,something went wrong
		</p>
		<p class="m-error_subtitle">
			Sorry we can't seem to find the page you're looking for.
		</p>
	</div>
</div>
<!-- <div class="m-portlet m-portlet--mobile">        
  <div class="m-portlet__body">
  	sdfs  
  </div>
</div> -->
@endsection

@section('script')
@endsection