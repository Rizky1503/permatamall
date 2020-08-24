@extends('layouts.FrontEnd')

@section('content')
<div class="container" style="padding: 10px; background-color: #fff; -webkit-box-shadow: 0 6px 12px rgba(0,0,0,.175); box-shadow: 0 6px 12px rgba(0,0,0,.175); margin-top: 20px; margin-bottom: 20px;">
	<div class="row">
		@include('mitra::include.pilih_product')
		<div class="col-md-9">
			<span style="font-size: 20px">Silahkan lengkapi form <strong>Gedung</strong></span>
		</div>
	</div>
</div>
@stop
@section('script')
<script type="text/javascript">
function functionGetProduct(response) {
	window.location.href = "{{ route('Mitra.daftar') }}?prod="+response;
}
</script>
@endsection
