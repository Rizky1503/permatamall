@extends('mitra::layouts.master-v2')

@section('content')
<form class="m-form" id="form_add">	
	@csrf
	<input type="hidden" name="_product_key" value="{{ $id_prod_temp }}">
	<input type="hidden" name="_lat" value="" id="_lat">
	<input type="hidden" name="_long" value="" id="_long">
	<div class="m-alert m-alert--icon m-alert--icon-solid m-alert--outline alert alert-info alert-dismissible fade show" role="alert">
	    <div class="m-alert__icon">
	        <i class="flaticon-exclamation-1"></i>
	        <span></span>
	    </div>
	    <div class="m-alert__text">
	        <ul>
	        	<li>Lengkapi semua form agar barang pengajuan kamu cepat terverifikasi</li>
	        	<li>upload gambar produk maksimal 5 gambar</li>
	        	<li>barang pengajuan kamu terverifikasi maksimal 1 x 24 jam</li>
	        </ul>
	    </div>
	    <div class="m-alert__close">
	        <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
	    </div>
	</div>

	<div class="m-alert m-alert--icon alert alert-danger m--hide" role="alert" id="m_form_1_msg">
		<div class="m-alert__icon">
			<i class="la la-warning"></i>
		</div>
		<div class="m-alert__text">
			Error! mohon lengkapi semua form
		</div>
		<div class="m-alert__close">
			<button type="button" class="close" data-close="alert" aria-label="Close"></button>
		</div>
	</div>

	<!--begin::Portlet-->
	<div class="m-portlet m-portlet--tab">
		<div class="m-portlet__head">
			<div class="m-portlet__head-caption">
				<div class="m-portlet__head-title">
					<span class="m-portlet__head-icon m--hide">
						<i class="la la-gear"></i>
					</span>
					<h3 class="m-portlet__head-text">
						Rincian Barang
					</h3>
				</div>
			</div>
		</div>
		<div class="m-portlet__body">
			<div class="form-group m-form__group">
				<label for="nama_barang">
					Nama Barang
				</label>
				<input type="text" name="nama_barang" class="form-control m-input" id="nama_barang" aria-describedby="emailHelp" placeholder="Masukan nama barang">
			</div>
			<div class="form-group m-form__group">
				<label for="Categoricascader">
					Kategori Barang
				</label>
				<div id="cascader1">
					<div class="m-spinner m-spinner--brand m-spinner--lg"></div>
				</div>
				<input type="hidden" name="kategori_barang" class="form-control m-input cascader" id="Categoricascader"  aria-describedby="emailHelp" placeholder="Pilih Kategori">
			</div>			
		</div>		
	</div>

	<!--begin::Portlet-->
	<div class="m-portlet m-portlet--tab">
		<div class="m-portlet__head">
			<div class="m-portlet__head-caption">
				<div class="m-portlet__head-title">
					<span class="m-portlet__head-icon m--hide">
						<i class="la la-gear"></i>
					</span>
					<h3 class="m-portlet__head-text">
						Informasi Barang
					</h3>
				</div>
			</div>
		</div>
		<div class="m-portlet__body">
			<div class="row">
				<div class="col-md-6">
					<div class="form-group m-form__group">
						<label for="nama_barang">
							Harga
						</label>
						<div class="input-group m-input-group">
							<span class="input-group-addon" id="basic-addon1">
								Rp. 
							</span>
							<input type="text" name="harga" class="form-control m-input" placeholder="masukan harga" aria-describedby="basic-addon1" id="harga">
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group m-form__group">
						<label for="nama_barang">
							Stok
						</label>
						<div class="input-group">				
							<input type="text" name="stok" class="form-control" aria-label="Text input with dropdown button" placeholder="Masukan jumlah stok barang" id="stok">
						</div>
					</div>				
				</div>
			</div>
			<div class="form-group m-form__group">
				<label for="nama_barang">
					Kondisi Barang
				</label>
				<div class="m-radio-inline">
					<label class="m-radio">
						<input type="radio" name="kondisi_barang" value="baru">
						Baru
						<span></span>
					</label>
					<label class="m-radio">
						<input type="radio" name="kondisi_barang" value="bekas">
						Bekas
						<span></span>
					</label>
				</div>
			</div>
			<br>
			<div class="form-group m-form__group">
				<label for="nama_barang">
					Di kirim dari luar negeri
				</label>
				<div class="m-radio-inline">
					<label class="m-radio">
						<input type="radio" name="barang_import" value="Ya">
						Ya
						<span></span>
					</label>
					<label class="m-radio">
						<input type="radio" name="barang_import" value="Tidak">
						Tidak
						<span></span>
					</label>
				</div>
			</div>		
		</div>		
	</div>

	<!--begin::Portlet-->
	<div class="m-portlet m-portlet--tab">
		<div class="m-portlet__head">
			<div class="m-portlet__head-caption">
				<div class="m-portlet__head-title">
					<span class="m-portlet__head-icon m--hide">
						<i class="la la-gear"></i>
					</span>
					<h3 class="m-portlet__head-text">
						Unggah Gambar Barang
					</h3>
				</div>
			</div>
		</div>
		<div class="m-portlet__body">
			<div class="form-group m-form__group">
				<div class="m-dropzone dropzone m-dropzone--primary" id="m_dropzone_one">
					<div class="m-dropzone__msg dz-message needsclick">
						<h3 class="m-dropzone__msg-title">
							Unggah gambar kamu disini.
						</h3>
						<span class="m-dropzone__msg-desc">
							Klik atau tarik gambar kesini untuk mengunggah 
							<br>
							Unggah maksimal 5 gambar
						</span>
					</div>
				</div>
			</div>
		</div>		
	</div>

	<!--begin::Portlet-->
	<div class="m-portlet m-portlet--tab">
		<div class="m-portlet__head">
			<div class="m-portlet__head-caption">
				<div class="m-portlet__head-title">
					<span class="m-portlet__head-icon m--hide">
						<i class="la la-gear"></i>
					</span>
					<h3 class="m-portlet__head-text">
						Keterangan Barang
					</h3>
				</div>
			</div>
		</div>
		<div class="m-portlet__body">
			<div class="form-group m-form__group">
				<label for="nama_barang">
					Keterangan
				</label>
				<textarea name="keterangan" class="summernote"></textarea>
			</div>	
		</div>		
	</div>
	<div class="row">
		<div class="col-md-12">
			<div style="float: right;">
				<button type="submit" class="btn btn-primary" id="submit_button">Submit & Tambah Lagi</button>
			</div>
		</div>
	</div>
</form>
@stop
@section('script')
<script type="text/javascript">

function getLocation() {
	console.log("fdsf");
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(showPosition);
  } else { 
  	console.log('not support');
  }
}

function showPosition(position) {
	$('#_lat').val(position.coords.latitude);
	$('#_long').val(position.coords.longitude);
}


var jquery_bentrok = jQuery.noConflict();
var FormControls = function() {
	jquery_bentrok("#form_add").validate({
	    rules: {
	        nama_barang: {
	            required: !0
	        },
            kategori_barang: {
                required: !0
            },
            harga: {
                required: !0,
                digits: !0
            },
            stok: {
                required: !0,
                minlength: 1,
                maxlength: 4
            },
            kondisi_barang: {
                required: !0
            },
            barang_import: {
                required: !0
            },
            keterangan: {
                required: !0
            },
	    },
	    invalidHandler: function(e, r) {
	        var i = jquery_bentrok("#m_form_1_msg");
	        i.removeClass("m--hide").show(), mApp.scrollTo(i, -200)
	    },
	    submitHandler: function(e) {
	    	functionSubmit();
	    }
	})
}();

var textareaDeskripsi = function() {
	jquery_bentrok(".summernote").summernote({
        height: 300
    })
}();


var myDropzoneOne = new Dropzone("div#m_dropzone_one", {
	url: "{{ route('Mitra.Belanja.Product.imageUploadProduct',['data' => $id_prod_temp]) }}",
	method: 'POST',
	autoProcessQueue: true, 
	maxFilesize: 2, //mb
	paramName: "imageOne",
	acceptedFiles: "image/*",
	maxFiles: 5,
	parallelUploads: 5,  
  	init: function() {
      	myDropzone = this;      
      	this.on("queuecomplete", function(file, response) {
      		console.log('adsa');
      	});
  	}, 
  	addRemoveLinks: true,
 	removedfile: function(file, response ) {
 		obj = JSON.parse(file.xhr.responseText);
 		var name = file.name;        
	    $.ajax({
	        type: 'POST',
	        url: "{{ route('Mitra.Belanja.Product.imageUploadProduct') }}",
	        data: "id="+obj.filename,
	        dataType: 'html'
	    });
	    var _ref;
	    return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) : void 0; 		
	},
	// success: function( file, response ){
	// 	obj = JSON.parse(response);
 //    	file.previewElement.querySelector("img").src = obj.filename;        
 //    } 

});



jquery_bentrok(document).ready(function() {
    getLocation();
    FormControls.init();
    textareaDeskripsi.init();
});	

function functionSubmit() {
	$('#submit_button').attr('class','btn m-btn btn-primary m-btn--custom m-loader m-loader--light m-loader--left');
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
	var data = $('#form_add').serialize();
	$.ajax({
        type: "POST",
        url: '{{ route("Mitra.Belanja.Product.store") }}',
        data: data,
        success: function(responses){
        	var parsedJson = $.parseJSON(responses);
        	$('#submit_button').attr('class','btn btn-primary');
        	if (parsedJson.status == "Finish") {
        		Swal.fire({
		            position: 'center',
		            type: 'success',
		            title: 'Selamat',
		            text: 'Barang yang kamu buat akan terpublikasi paling lama maksimal 1 x 24 jam, setelah di konfirmasi',
		            showConfirmButton: true,
		            timer: 15000
		        }).then(function() {
		              window.location = "{{ route('Mitra.Belanja.Product.index') }}";
		        });
        	}else{
        		Swal.fire({
	              	position: 'center',
	              	type: 'error',
	              	title: 'Error',
	              	text: 'silahkan lengkapi barang jualan kamu,atau mengalami kesulitan hubungi kami',
	              	showConfirmButton: true,
	              	timer: 3000
	          	});

        	}
         }
    });
    return false;
}
</script>

<link rel="stylesheet" href="{!! asset('public/assets/cascader/css/bootstrap-cascader.min.css') !!}">
<script src="{!! asset('public/assets/cascader/js/vendor.min.js') !!}"></script>
<script src="{!! asset('public/assets/cascader/js/bootstrap-cascader.js') !!}"></script>
<script type="text/javascript">
$(function() {
	$.ajax({
        type: "GET",
        url: '{{ route("Mitra.Belanja.Product.getFirstCategory") }}',
        data: {
            id:"1",
        },
        success: function(responses){
        	var field = [];        	
        	$.each(responses, function(index, item) {
        		field_sub = [];
        		$.each(item.d, function(indexs, items) {        			
        			if (undefined !== items.d && items.d.length) {
        				field_sub_sub = [];
		        		$.each(items.d, function(indexss, itemss) {
		        			var database_sub_sub = {
						        c: itemss.c,
						        n: itemss.n,				        
						    }
						    field_sub_sub.push(database_sub_sub); 
		        		});

					} else {
	        			field_sub_sub = [];
					}
	        		
        			var database_sub = {
				        c: items.c,
				        n: items.n,	
				        d: field_sub_sub        
				    }

				    field_sub.push(database_sub); 
        		});

	            var database = {
			        c: item.c,
			        n: item.n,
			        d: field_sub
			    }

	            field.push(database);  		
			});

        	console.log(field);
			var n = field;

			$('#cascader1').html("");
		    $("#cascader1").bsCascader({
		    	splitChar: " / ",
		        openOnHover: !0,
		        loadData: function(c, a) {
		            a(n)
		        }
		    })
        }
    });
        
});	
</script>
<style type="text/css">
.open>.dropdown-menu {
     display: block; 
}	

.bootstrap-cascader>.dropdown-menu {
     max-width: 100%; 
}

.btn.dropdown-toggle:after, .nav-link.dropdown-toggle:after {
     line-height: 1.5; 
}
</style>
@endsection
