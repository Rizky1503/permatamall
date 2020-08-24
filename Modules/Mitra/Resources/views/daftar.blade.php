@extends('mitra::layouts.master-v2')

@section('content')
<div class="m-portlet m-portlet--tab">
  	<form method="post" action="http://localhost/permataMall-FrontEnd/mitra/profile/StoreProfile" enctype="multipart/form-data" class="m-form m-form--fit m-form--label-align-right">
    		@include('mitra::include.pilih_product')      	    
  	</form>
  <!--end::Form-->
</div>
@stop
@section('script')
<script type="text/javascript">
function functionGetProduct(response) {
	window.location.href = "{{ route('Mitra.daftar') }}?prod="+response;
}
</script>
@endsection
