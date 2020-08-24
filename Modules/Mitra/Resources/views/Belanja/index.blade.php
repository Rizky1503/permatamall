@extends('mitra::layouts.master-v2')

@section('content')
<div class="m-portlet ">
    <div class="m-portlet__body  m-portlet__body--no-padding">
        <div class="row m-row--no-padding m-row--col-separator-xl">
            <div class="col-md-12 col-lg-6 col-xl-5">
                <!--begin::Total Profit-->
                <div class="m-widget24">
                    <div class="m-widget24__item">
                        <h4 class="m-widget24__title">
                            Pembayaan
                        </h4>
                        <br>
                        <span class="m-widget24__desc">
                            total uang yang akan di terima
                        </span>
                        <span class="m-widget24__stats m--font-brand">
                            Rp. 2.000.000
                        </span>
                        <div class="m--space-10"></div>
                        <div class="progress m-progress--sm">
                            <div class="progress-bar m--bg-brand" role="progressbar" style="width: 78%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <span class="m-widget24__change">
                            Hitung dalam percent
                        </span>
                        <span class="m-widget24__number">
                            78%
                        </span>
                    </div>
                </div>
                <!--end::Total Profit-->
            </div>
            <div class="col-md-12 col-lg-6 col-xl-4">
                <!--begin::New Feedbacks-->
                <div class="m-widget24">
                    <div class="m-widget24__item">
                        <h4 class="m-widget24__title">
                            Order Baru
                        </h4>
                        <br>
                        <span class="m-widget24__desc">
                            pembelian dari konsumen
                        </span>
                        <span class="m-widget24__stats m--font-info">
                            1349
                        </span>
                        <div class="m--space-10"></div>
                        <div class="progress m-progress--sm">
                            <div class="progress-bar m--bg-info" role="progressbar" style="width: 84%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <span class="m-widget24__change">
                            Change
                        </span>
                        <span class="m-widget24__number">
                            84%
                        </span>
                    </div>
                </div>
                <!--end::New Feedbacks-->
            </div>            
            <div class="col-md-12 col-lg-6 col-xl-3">
                <!--begin::New Users-->
                <div class="m-widget24">
                    <div class="m-widget24__item">
                        <h4 class="m-widget24__title">
                            Barang Terjual
                        </h4>
                        <br>
                        <span class="m-widget24__desc  m--font-success">
                        	276 / 1000
                        </span>
                        <div class="m--space-10"></div>
                        <div class="progress m-progress--sm">
                            <div class="progress-bar m--bg-success" role="progressbar" style="width: 90%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <span class="m-widget24__change">
                            Change
                        </span>
                        <span class="m-widget24__number">
                            90%
                        </span>
                    </div>
                </div>
                <!--end::New Users-->
            </div>
        </div>
    </div>
</div>




@if($registrasi == "true")
<div id="registrasi_belanja" class="modal">
	<form action="{{ route('Mitra.Belanja.store') }}" method="post">
		@csrf
		@if ($errors->any())
		    <div class="alert alert-danger">
		        <ul>
		            @foreach ($errors->all() as $error)
		                <li>{{ $error }}</li>
		            @endforeach
		        </ul>
		    </div>
		@endif
	  	<div class="form-group">
	  		Permata Belanja adalah sebuah produk dari marketplace permatamall.com dengan konsep jual beli online, dimana pembeli dan penjual melakukan transaksi secara online. Transaksi yang terjadi harus melalui platform permatamall.com untuk menjamin hak dan kewajiban pembeli maupun penjual.
	  	</div>
	  	<div class="form-group">
	  		<label class="container-checked">Setuju dan Lanjutkan
				<input type="checkbox" id="checkbox-data" onclick="functionCheckbox()" name="checked" @if(old("checked") == "on") checked="checked" @endif>
				<span class="checkmark"></span>
			</label>
	  	</div>
	  	<div id="form_rekening" style="@if(old('checked') == 'on') display: block; @else display: none; @endif">
	  		<div class="form-group">
		    	<label for="text">Nama Bank:</label>
		    	<input type="text" class="form-control" id="nama_bank" name="nama_bank" value="{{ old('nama_bank') }}">
			</div>
			<div class="form-group">
			    	<label for="text">Nama pemilik rekening:</label>
			    	<input type="text" class="form-control" id="nama_pemilik_rekening" name="nama_pemilik_rekening" value="{{ old('nama_pemilik_rekening') }}">
			</div>
			<div class="form-group">
			    <label for="pwd">No rekening:</label>
			    <input type="text" class="form-control" id="no_rekening" name="no_rekening" value="{{ old('no_rekening') }}">
			</div>
			<div class="form-group">
			  	<button type="submit" class="btn btn-primary">Submit</button>
			</div>
		  </div>	  
	</form>    
</div>
@endif
@stop
@section('script')
@if($registrasi == "true")
<script type="text/javascript">
    $(document).ready(function() {
        $('#registrasi_belanja').modal({
          fadeDuration: 250,
          escapeClose: false,
		      clickClose: false,
		      showClose: false
        });
    });

    function functionCheckbox() {
	    if(document.getElementById('checkbox-data').checked) {
	      $('#form_rekening').show();
	    } else {
	      $('#form_rekening').hide();
	    }
	  }
</script> 
@endif
<style>
/* The container */
.container-checked {
  display: block;
  position: relative;
  padding-left: 25px;
  margin-bottom: 12px;
  cursor: pointer;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}

/* Hide the browser's default checkbox */
.container-checked input {
  position: absolute;
  opacity: 0;
  cursor: pointer;
  height: 0;
  width: 0;
}

/* Create a custom checkbox */
.checkmark {
  position: absolute;
  top: 3px;
  border-radius: 3px;
  left: 0;
  height: 15px;
  width: 15px;
  background-color: #eee;
}

/* On mouse-over, add a grey background color */
.container-checked:hover input ~ .checkmark {
  background-color: #ccc;
}

/* When the checkbox is checked, add a blue background */
.container-checked input:checked ~ .checkmark {
  background-color: #56c174;
}

/* Create the checkmark/indicator (hidden when not checked) */
.checkmark:after {
  content: "";
  position: absolute;
  display: none;
}

/* Show the checkmark when checked */
.container-checked input:checked ~ .checkmark:after {
  display: block;
}

/* Style the checkmark/indicator */
.container-checked .checkmark:after {
  left: 4px;
  top: 1px;
  width: 5px;
  height: 10px;
  border: solid white;
  border-width: 0 2px 2px 0;
  -webkit-transform: rotate(45deg);
  -ms-transform: rotate(45deg);
  transform: rotate(45deg);
}
</style>
@endsection
