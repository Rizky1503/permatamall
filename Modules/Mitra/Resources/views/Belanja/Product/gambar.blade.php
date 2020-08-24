@extends('mitra::layouts.master-v2')

@section('content')
<!--begin::Portlet-->
<div class="m-portlet m-portlet--tab">
	<div class="m-portlet__head">
		<div class="m-portlet__head-caption">
			<a href="{{ route('Mitra.Belanja.Product.index') }}" style="text-decoration: none">
				<div class="m-portlet__head-title">
					<span class="m-portlet__head-icon">
						<i class="la la-arrow-left"></i>
					</span>
					<h3 class="m-portlet__head-text">
						Kembali
					</h3>
				</div>
			</a>
		</div>
		<div class="m-portlet__head-tools">
			<ul class="m-portlet__nav">
				<li class="m-portlet__nav-item">
					@if(count($Gambar) >= 6)
					<button class="btn btn-accent m-btn m-btn--custom m-btn--icon m-btn--pill m-btn--air" disabled="disabled" style="cursor: no-drop;">
						<span>
							<i class="la la-minus-circle"></i>
							<span>
								Maksimal Upload 6 Gambar
							</span>
						</span>
					</button>
					@else
					<button class="btn btn-accent m-btn m-btn--custom m-btn--icon m-btn--pill m-btn--air" onclick="ShowModal()">
						<span>
							<i class="la la-plus"></i>
							<span>
								Tambah Gambar
							</span>
						</span>
					</button>
					@endif
				</li>
			</ul>
		</div>
	</div>
	<div class="m-portlet__body">
		<div>
			<div class="row">
				@foreach($Gambar as $ListGambar)
				<div class="col-md-4">
					<div style="margin-bottom: 20px;">
						<span style="position: absolute; right: 0;margin-right: 20px; margin-top: 4px;">
							<a onclick="removeFile(this.id)" class="btn btn-outline-brand m-btn m-btn--icon m-btn--icon-only m-btn--outline-2x m-btn--air" id="{{ encrypt($ListGambar->id_gambar) }}">
							    <i class="fa fa-trash"></i> 
							</a>
						</span>
						<img src="{{ ENV('APP_URL_API_RESOURCE').'images/mitra/belanja/'.$ListGambar->gambar_produk }}" style="width: 100%; max-height: 300px;">							
					</div>
				</div>					
				@endforeach					
			</div>
		</div>	
	</div>		
</div>


<div id="registrasi_belanja" class="modal">
	<div class="form-group m-form__group">
		<div class="m-dropzone dropzone m-dropzone--primary" id="m_dropzone_one">
			<div class="m-dropzone__msg dz-message needsclick">
				<h3 class="m-dropzone__msg-title">
					Unggah gambar kamu disini.
				</h3>
				<span class="m-dropzone__msg-desc">
					Klik atau tarik gambar kesini untuk mengunggah 
				</span>
			</div>
		</div>
	</div>	
</div>

@stop
@section('script')
<script type="text/javascript">
	function ShowModal() {
		$('#registrasi_belanja').modal({
          	fadeDuration: 250,
          	escapeClose: false,
  		  	clickClose: false,
  		  	showClose: false
        });
	}

var myDropzoneOne = new Dropzone("div#m_dropzone_one", {
	url: "{{ route('Mitra.Belanja.Product.imageUploadProduct',['data' => $id_prod_temp]) }}",
	method: 'POST',
	autoProcessQueue: true, 
	maxFilesize: 2, //mb
	paramName: "imageOne",
	acceptedFiles: "image/*",
	maxFiles: 1,
	parallelUploads: 1,  
  	init: function() {
      	myDropzone = this;      
      	this.on("queuecomplete", function(file, response) {
      		location.reload();
      	});
  	}, 
  	addRemoveLinks: false,
 	 

});

function removeFile(response) {
	Swal.fire({
	      onBeforeOpen: () => {
	        Swal.showLoading()
	        timerInterval = setInterval(() => {
	        Swal.getContent().querySelector('strong')
	          .textContent = Swal.getTimerLeft()
	        }, 100)
	      },
	      title: 'Sedang proses',
	      text: 'mohon menunggu proses sedang berjalan, jangan refresh halaman maupun tutup brower',
	      showConfirmButton: false,
	    
	});
	$.ajax({
        type: 'POST',
        url: "{{ route('Mitra.Belanja.Product.imageUploadProduct') }}",
        data: "id="+response,
        dataType: 'html',
        success: function(responses){
        	Swal.fire({
	            position: 'center',
	            type: 'success',
	            title: 'Selamat',
	            text: 'Gambar berhasil di hapus',
	            showConfirmButton: true,
	            timer: 15000
	        }).then(function() {
	            location.reload();
	        });        	
        }
    });
}
</script>
<style type="text/css">
.modal{
	overflow: visible;
}	
</style>
@endsection
