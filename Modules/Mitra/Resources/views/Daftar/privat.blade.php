@extends('mitra::layouts.master-v2')

@section('content')
<div class="m-portlet m-portlet--tab">	
	<!--begin::Form-->
	<form method="post" action="{{ route('Mitra.daftarStore') }}" enctype="multipart/form-data" class="m-form m-form--fit m-form--label-align-right">
		@csrf
		<input type="hidden" name="product" value="{{ $value_prod }}">
		<div class="m-portlet__body">
			@if ($errors->any())
			    <div class="alert alert-danger">
			        <ul>
			            @foreach ($errors->all() as $error)
			                <li>{{ $error }}</li>
			            @endforeach
			        </ul>
			    </div>
			@endif

			<div class="form-group m-form__group">
			    <div class="row">
			    	<div class="col-md-6">
			    		<label for="usr">Jenis Kelamin:</label>
			            <select name="jenis_kelamin" class="form-control m-input m-input--solid">
	                        <option value="L" @if($Profile->jenis_kelamin == "L") selected @endif>Laki Laki</option>  
	                        <option value="P" @if($Profile->jenis_kelamin == "P") selected @endif>Perempuan</option>  
			            </select>
			    	</div>
			    	<div class="col-md-6">
			    		<label for="usr">Pilih Kota Lahir:</label>
			            <select class="form-control m-select2" id="m_select2_1" name="kota">
			            	<option value="">Pilih Kota</option>
			            	@foreach($kota as $listKota)
			            		<option value="{{ $listKota }}">{{ $listKota }}</option>
			            	@endforeach
			            </select>
			    	</div>
			    </div>
			</div>    

			<div class="form-group m-form__group">
			    <div class="row">
			    	<div class="col-md-6">
			    		<label for="usr">Pemilik No Rek + (Nama Bank):</label>
			            <input type="nama" class="form-control m-input m-input--solid" name="pemilik_rek" value="{{ $Profile->pemilik_rek ?? '' }}" placeholder="ex: jonie (BCA)" required="required">
			    	</div>
			    	<div class="col-md-6">
			    		<label for="usr">No Rek:</label>
			            <input type="nama" class="form-control m-input m-input--solid" name="no_rek" value="{{ $Profile->no_rek ?? '' }}" placeholder="ex: 5432165424" required="required">
			    	</div>
			    </div>				
			</div>

			<div class="form-group m-form__group">
			    <div class="row">
			    	<div class="col-md-6">
			    		<label for="usr">Upload CV:</label>
			            <input type="file" class="form-control" name="cv" value="" required="required" id="image-file-cv">
			            <span style="font-size: 12px; color: #f00">
			            	- maksimal upload 3 mb <br>
			            	- file di ijinkan .jpg .png .jpeg
			        	</span>
			    	</div>
			    	<div class="col-md-6">
			    		<label for="usr">Upload Foto <span style="font-size: 12px; color: #f00">[ foto selfi pegang ktp ]</span>:</label>
			            <input type="file" class="form-control" name="foto" value="" required="required" id="image-file-foto">
			            <span style="font-size: 12px; color: #f00">
			            	- maksimal upload 3 mb <br>
			            	- file di ijinkan .jpg .png .jpeg
			        	</span>
			    	</div>
			    </div>				
			</div>    
			

			<div class="form-group m-form__group">
			    <div class="row">
			    	<div class="col-md-6">
			    		<label for="usr">Upload Sertifikat <span style="font-size: 12px; color: #f00"></span>:</label>
			            <input type="file" class="form-control" name="sertifikat" value="" required="required" id="image-file-sertifikat">
			            <span style="font-size: 12px; color: #f00">
			            	- maksimal upload 3 mb <br>
			            	- file di ijinkan .jpg .png .jpeg
			        	</span>
			    	</div>			    	
			    </div>				
			</div>    					
		</div>
		<div class="m-portlet__foot m-portlet__foot--fit">
			<div class="m-form__actions">
				<button type="submit" class="btn btn-primary">
					Langkah Selanjutnya
				</button>				
			</div>
		</div>
	</form>
	<!--end::Form-->
</div>
@stop
@section('script')
<style type="text/css">
	.form-control{
		border-radius: 0px;
	}
	input[type=file] {
	    display: block;
	    padding: 3px;
	}

	.select2-selection__rendered{
		display: block;
	    width: 100%;
	    height: 38px;
	    padding: 6px 12px;
	    font-size: 14px;
	    float: left;
	    color: #555;
	    background-image: none;
	    border: 1px solid #f5f5f5;
	    border-radius: 2px;
	    background: #f5f5f5;
	    -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
	    box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
	    -webkit-transition: border-color ease-in-out .15s,-webkit-box-shadow ease-in-out .15s;
	    -o-transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
	    transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
        margin-top: -2px;
	    width: 101%;
	    margin-left: -2px;
	    margin-bottom: 2px;
	}

</style>
<script type="text/javascript">
	function functionGetProduct(response) {
		window.location.href = "{{ route('Mitra.daftar') }}?prod="+response;
	}	

	$('#image-file-foto').bind('change', function() {
		fileValidation(this.id);
		var mb = this.files[0].size / 1024 / 1024;
		if (mb > 3) {
			Swal.fire({
              	position: 'center',
              	type: 'error',
              	title: 'Error!',
              	text: "Foto yang kamu upload "+ mb.toFixed(2)+" MB, maksimal upload yang di izinkan 1 MB",
              	showConfirmButton: true,
              	timer: 3000
          	});
	        this.value = "";
		}		
    });

    $('#image-file-cv').bind('change', function() {
		fileValidation(this.id);
		var mb = this.files[0].size / 1024 / 1024;
		if (mb > 3) {
			Swal.fire({
              	position: 'center',
              	type: 'error',
              	title: 'Error!',
              	text: "Foto yang kamu upload "+ mb.toFixed(2)+" MB, maksimal upload yang di izinkan 1 MB",
              	showConfirmButton: true,
              	timer: 3000
          	});
	        this.value = "";
		}		
    });

    $('#image-file-sertifikat').bind('change', function() {
		fileValidation(this.id);
		var mb = this.files[0].size / 1024 / 1024;
		if (mb > 3) {
			Swal.fire({
              	position: 'center',
              	type: 'error',
              	title: 'Error!',
              	text: "Foto yang kamu upload "+ mb.toFixed(2)+" MB, maksimal upload yang di izinkan 1 MB",
              	showConfirmButton: true,
              	timer: 3000
          	});
	        this.value = "";
		}		
    });

	function fileValidation(response){
	    var fileInput = document.getElementById(response);
	    var filePath = fileInput.value;
	    var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;
	    if(!allowedExtensions.exec(filePath)){
	    	Swal.fire({
              	position: 'center',
              	type: 'error',
              	title: 'Error!',
              	text: "File yang di ijinkan hanya format .jpeg .jpg dan .png",
              	showConfirmButton: true,
              	timer: 3000
          	});
	        fileInput.value = '';
	        return false;
	    }
	}
</script>
@endsection
