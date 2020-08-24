@extends('mitra::layouts.master-v2')

@section('content')
<form method="post" action="{{ route('Mitra.daftarStoreProductPrivate') }}" enctype="multipart/form-data">
@csrf
	<div class="row">
		<div class="col-md-4">
			<div class="m-portlet m-portlet--tab">			
				<div class="m-portlet__body">
					<div class="form-group m-form__group">
			            <label for="usr">Pilih Tingkat Sekolah:</label>
			            <select name="tingkat_kelas" class="form-control" onchange="functionGetbyTingkat(this.value)" required="required" id="tingkat_kelas">
			            	<option value="">Pilih tingkat</option>
			            	@foreach($data as $listTingkatSekolah)			            	
			            	<option value="{{ encrypt($listTingkatSekolah) }}">{{ $listTingkatSekolah }}</option>			           	
			            	@endforeach
			            </select>
			        </div>
			        <div class="form-group m-form__group">
			            <label for="usr">Pilih Mata Pelajaran:</label>
			            <select name="matpel_tingkat" class="form-control" onchange="functionGetJadwal(this.value)" id="matpel_tingkat" required="required">
			            	<option value="">Pilih</option>
			            </select>
			        </div>
			        <div class="form-group m-form__group">
			            <label for="usr">Kota/Kabupaten Mengajar:</label>
			            <select name="kota" class="form-control" id="kota" required="required" onchange="functionGetLainya(this.value)">
			            	<option value="">Pilih kota</option>
			            	@foreach($kota_value as $ListKota)
			            	<option value="{{ $ListKota }}">{{ $ListKota }}</option>
			            	@endforeach
			            	<option value="Lainya">Lainya</option>
			            </select>
			        </div>
			        <div class="form-group m-form__group" id="KotaLainya" style="display: none;">
			        	<label for='usr'>Masukan Kota Lainya:</label>                         
		                <input id='kota_lainya' type='text' class='form-control' name='kota_lainya' placeholder='ex: subang' style='margin-top: -0.1px;'>
			        </div>
			        <div class="form-group m-form__group">
			        	<label for='usr'>Pengalaman Mengajar:</label>                           
		                <select class='form-control' name='lama' id="lama">
		                    <option value='1'>1 Tahun</option>
		                    <option value='2'>2 Tahun</option>
		                    <option value='3'>3 Tahun</option>
		                    <option value='4'>4 Tahun</option>
		                    <option value='5'>>= 5 Tahun</option>
		                </select>
			        </div>
			        <div class="form-group m-form__group">
			        	<label for='usr'>Gaji saat ini:</label>                         
		                <div class='input-group'>
		                  <input id='gaji_saat_ini' type='text' class='form-control' name='gaji_saat_ini' placeholder='ex: 65000' style='margin-top: -0.1px;' required="required" autocomplete="off">
		                  <span class='input-group-addon'>/ Pertemuan</span>   
		                </div>
			        </div>
			        <div class="form-group m-form__group">
			        	<label for='usr'>Gaji Yang di harapkan:</label>                         
		                <div class='input-group'>
		                  <input id='gaji_harap' type='text' class='form-control' name='harga' placeholder='ex: 75000' style='margin-top: -0.1px;' required="required" autocomplete="off">
		                  <span class='input-group-addon'>/ Pertemuan</span>   
		                </div>
			        </div>
			        <div class="form-group m-form__group">
			        	<label for='usr'>Total murid selama mengajar:</label>                         
		                <div class='input-group'>
		                  <input id='total_murid' type='text' class='form-control' name='total_murid' placeholder='ex: 100' style='margin-top: -0.1px;' required="required" autocomplete="off">
		                  <span class='input-group-addon'>/ Murid</span>   
		                </div>
			        </div>
					
				</div>		
			</div>
		</div>
		<div class="col-md-8">
			<div class="m-portlet m-portlet--tab">	
				<div class="m-portlet__head">
					<div class="m-portlet__head-caption">
						<div class="m-portlet__head-title">
							<span class="m-portlet__head-icon m--hide">
								<i class="la la-gear"></i>
							</span>
							<h3 class="m-portlet__head-text" id="nama_mata_pelajaran">
								Pilih Mata Pelajaran
							</h3>
						</div>
					</div>
				</div>		
				<div class="no_active_jadwal" id="disabled_jadwal">
	    			<p style="line-height: 20; color: #fff; font-weight: bold; font-size: 20px;">
	    				<i class="fa fa-info-circle"></i>
	    				Mohon melengkapi profile kiri terlebih dahulu
	    			</p>
	    		</div>
				<div class="m-portlet__body">
					<span style="line-height: 2; font-size: 12px; color: #f00">
		        		Waktu: 09:00 - 12:00 (Pagi) <br>
		        		Waktu: 13:00 - 16:00 (Siang) <br>
		        		Waktu: 16:00 - 20:00 (Malam) 
		        	</span>
		            <div class='form-group'>
		                <div class='row'>
		                    <div class='col-md-4'>
		                        <label for='usr'>Jadwal Mengajar:</label>
		                    </div>
		                    <div class='col-md-4'>
		                        <label for='usr'>Waktu Jadwal Mengajar:</label>
		                    </div>
		                </div>
		            </div>
		            <?php
		            $nama_hari = array('Senin','Selasa','Rabu','Kamis','Jumat','Sabtu','Minggu');
		            ?>
		            @foreach($nama_hari as $key => $listHari)
		            <div class='form-group'>
		                <div class='row'>
		                    <div class='col-md-4'>      
		                    	<label class="container-home">{{ $listHari }}
								  <input type="checkbox" value="{{ $listHari }}" name="hari[]" id="hari_{{ $key + 1 }}" onclick="myFunction(this.id)">
								  <span class="checkmark-home"></span>
								</label>
		                    </div>
		                    <div class='col-md-8'>  
		                    	<div id="selai_{{ $key + 1 }}" style="display: none;">
		                    		<label class="container-home" style="float: left; margin-left: 15px;">Pagi
									  	<input type="checkbox" value="Pagi" name="{{ $listHari }}[]">
									  	<span class="checkmark-home"></span>
									</label>
									<label class="container-home" style="float: left; margin-left: 15px;">Siang
									  	<input type="checkbox" value="Siang" name="{{ $listHari }}[]">
									  	<span class="checkmark-home"></span>
									</label>
									<label class="container-home" style="float: left; margin-left: 15px;">Malam
									  	<input type="checkbox" value="Malam" name="{{ $listHari }}[]">
									  	<span class="checkmark-home"></span>
									</label>
		                    	</div>	                    	
		                    </div>                      
		                </div>
		        	</div>
		        	@endforeach					
				</div>		
			</div>
		</div>
		<div class="col-md-12">
			<div style="float: right;">
				<button type="submit" class="btn btn-success m-btn m-btn--custom m-btn--icon m-btn--air">
					<span>
				        <i class="la la-cart-plus"></i>
				        <span>
				            Kirim Data
				        </span>
				    </span>
				</button>
			</div>
		</div>
	</div>
</form>
@stop
@section('script')
<style type="text/css">
	input[type=file] {
	    display: block;
	    padding: 3px;
	}

	.panel-default>.panel-heading {
	    color: #fff;
	    background-color: #56c174;
	    border-color: #56c174;
	    font-weight: bold;
	}

		/* The container */
	.container-home {
	  display: block;
	  position: relative;
	  padding-left: 26px;
	  margin-bottom: 12px;
	  cursor: pointer;
	  -webkit-user-select: none;
	  -moz-user-select: none;
	  -ms-user-select: none;
	  user-select: none;
	}

	/* Hide the browser's default checkbox */
	.container-home input {
	  position: absolute;
	  opacity: 0;
	  cursor: pointer;
	  height: 0;
	  width: 0;
	}

	/* Create a custom checkbox */
	.checkmark-home {
	  position: absolute;
	  top: 0;
	  left: 0;
	  height: 20px;
	  width: 20px;
	  background-color: #eee;
	}

	/* On mouse-over, add a grey background color */
	.container-home:hover input ~ .checkmark-home {
	  background-color: #ccc;
	}

	/* When the checkbox is checked, add a blue background */
	.container-home input:checked ~ .checkmark-home {
	  background-color: #56c174;
	}

	/* Create the checkmark/indicator (hidden when not checked) */
	.checkmark-home:after {
	  content: "";
	  position: absolute;
	  display: none;
	}

	/* Show the-home checkmark when checked */
	.container-home input:checked ~ .checkmark-home:after {
	  display: block;
	}

	/* Style the checkmark/indicator */
	.container-home .checkmark-home:after {
	  left: 9px;
	  top: 5px;
	  width: 5px;
	  height: 10px;
	  border: solid white;
	  border-width: 0 3px 3px 0;
	  -webkit-transform: rotate(45deg);
	  -ms-transform: rotate(45deg);
	  transform: rotate(45deg);
	}

	.input-group-addon{
		border: 0px;
    	background: #ccc;
	}

	.no_active_jadwal{
		display: block;
		background-color: #00000080;
		width: 95.8%;
		height: 78%;
		position: absolute;
		z-index: 9;
		cursor: no-drop; 
		text-align: center;
	}

	.active_jadwal{
		display: none;
	}
</style>
<script type="text/javascript">

	$("#tingkat_kelas, #matpel_tingkat, #kota, #lama, #gaji_saat_ini, #gaji_harap, #total_murid").change(function() { 
	    activeFunction();
	});

	$("#gaji_saat_ini, #gaji_harap, #total_murid").keyup(function() {
		var value = $(this).val();
	    value = value.replace(/^(0*)/,"");
	    $(this).val(value);

	 	activeFunction();
	});

	$("#gaji_saat_ini, #gaji_harap, #total_murid").keypress(function (e) {
	    var txt = String.fromCharCode(e.which);
	    if (!txt.match(/[A-Za-z0-9&.]/)) {
	        return false;
	    }

	    if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
           	return false;
	    }
	});

	function activeFunction(){
		var tingkat_kelas 	= $('#tingkat_kelas').val();
		var matpel_tingkat 	= $('#matpel_tingkat').val();
		var kota 			= $('#kota').val();
		var lama 			= $('#lama').val();
		var gaji_saat_ini 	= $('#gaji_saat_ini').val();
		var gaji_harap 		= $('#gaji_harap').val();
		var total_murid 	= $('#total_murid').val();

		if (tingkat_kelas == "" || matpel_tingkat == "" || kota == "" || gaji_saat_ini == "" || gaji_harap == "" || total_murid == "") {
			$('#disabled_jadwal').attr('class','no_active_jadwal');
		}else{
			$('#disabled_jadwal').attr('class','active_jadwal');
		}
	}

	function myFunction(response){
		var res 	= response.substr(5, 4);
		var checkBox 	= document.getElementById(response);
		var waktu 		= document.getElementById("selai_"+res);

		if (checkBox.checked == true){
		    waktu.style.display = "block";
		} else {
		     waktu.style.display = "none";
		}
	}

	function functionGetbyTingkat(response) {
		$.ajax({
		    type: "GET",
		    url: '{{ route("Mitra.matpel") }}',
		    data: {
		    	id:response
		    },
		    success: function(responses){
		    	$('#matpel_tingkat').html(responses);
		     }
		});
	}

	function functionGetJadwal(response){
		$('#nama_mata_pelajaran').text(response);
	}


	function functionGetprovinsi(response){
		$.ajax({
		    type: "GET",
		    url: '{{ route("Mitra.kota") }}',
		    data: {
		    	id:response
		    },
		    success: function(responses){
		    	$('#kota').html(responses);
		     }
		});
	}


	function functionGetLainya(response){
		if (response == "Lainya") {
			$('#KotaLainya').show();
			$('#kota_lainya').attr('required','required');
		}else{
			$('#KotaLainya').hide();
			$('#kota_lainya').removeAttr('required');
		}
	}
</script>
@endsection
