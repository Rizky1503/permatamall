
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="format-detection" content="telephone=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <link href="{!! asset('public/assets/images/logoonly-100x100.png') !!}" rel="icon">
    <meta name="author" content="Nghia Minh Luong">
    <meta name="keywords" content="Default Description">
    <meta name="description" content="Default keyword">
    <title>{{config('app.name', 'PermataMall')}} | Payment</title>
    <!-- Fonts-->
    <link href="https://fonts.googleapis.com/css?family=Work+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{!! asset('public/assets/plugins/font-awesome/css/font-awesome.min.css') !!}">
    <link rel="stylesheet" href="{!! asset('public/assets/plugins/ps-icon/style.css') !!}">
    <!-- CSS Library-->
    <link rel="stylesheet" href="{!! asset('public/assets/plugins/bootstrap/dist/css/bootstrap.min.css') !!}">
    <link rel="stylesheet" href="{!! asset('public/assets/plugins/jquery-bar-rating/dist/themes/fontawesome-stars.css') !!}">

    <!-- Custom-->
    <link rel="stylesheet" href="{!! asset('public/assets/css/style.css') !!}">
    <link rel="stylesheet" href="{!! asset('public/assets/css/style-custom.css') !!}">
    <link rel="stylesheet" href="{!! asset('public/assets/css/sweetalert2.min.css') !!}">
  </head>
  <body class="ps-loading loaded">
    <div class="home-page-widget-overlay" onclick="functionPostOverlay()" id="page_selain_cari_halaman"></div>
    @include('include.FrontEnd.header')    
    <main class="ps-main" style="background: #f5f5f5">
      	<div class="container" style="padding-bottom: 80px; padding-top: 50px;">
      		@if ($errors->any())
			    <div class="alert alert-danger">
			        <ul>
			            @foreach ($errors->all() as $error)
			                <li>{{ $error }}</li>
			            @endforeach
			        </ul>
			    </div>
			    @endif
      		<div class="row"> 
      			<div class="col-md-8">
      				<div class="panel panel-default">
					  	<div class="panel-heading">Bukti pembayaran</div>
					  	<div class="panel-body">					  		
					  		<form method="post" action="{{ route('ExampPermata.paymentStore') }}" enctype="multipart/form-data">
					  			@csrf
					  			<input type="hidden" name="product_invoice" value="{{ encrypt($data[0]) }}">
					  			<div class="form-group">
								    <label for="email">Nama:</label>
								    <input type="text" class="form-control" id="nama" name="nama" value="{{ old('nama') }}">
								</div>
						  		<div class="form-group">
								    <label for="email">Nama Bank:</label>
								    <input type="text" class="form-control" id="bank" name="nama_bank" value="{{ old('nama_bank') }}">
								</div>
						  		<div class="form-group">
								    <label for="email">Upload bukti Pembayaran:</label>
								    <input type="file" class="form-control" id="image-file-payment" name="upload">
								</div>
								<div class="form-group">
									<button type="submit" class="btn btn-primary" style="float: right;">Konfirmasi Pembayaran</button>
								</div>
					  		</form>
					  	</div>
					</div>
      			</div>
      			<div class="col-md-4">
      				<div class="panel panel-default">
					  	  <div class="panel-heading">Detail Transaksi</div>
  					  	  <div class="panel-body Transaksi">
    					  		<span style="color: #bbbaba">Nama Product</span>
    					  		<br>
    					  		<span style="color: #000; font-weight: bold; font-size: 20px;">{{ $data[1] ?? '' }} - {{ $data[2] ?? '' }} - {{ $data[3] ?? '' }} - 6 Bulan</span>
    					  	</div>
    					  	<div class="panel-body Transaksi">
    					  		<span style="color: #bbbaba">Transfer Ke Rekening PermataMall</span>
    					  		<br>
    					  		<span style="color: #000; font-weight: bold; font-size: 20px;"><img src="https://upload.wikimedia.org/wikipedia/id/thumb/e/e0/BCA_logo.svg/472px-BCA_logo.svg.png" width="60">&nbsp; 5421342312</span>
    					  		<br>
    					  		<span style="color: #000; font-weight: bold; font-size: 20px;"><img src="https://upload.wikimedia.org/wikipedia/id/thumb/f/fa/Bank_Mandiri_logo.svg/1280px-Bank_Mandiri_logo.svg.png" width="60">&nbsp; 4536352121215</span>
    					  	</div>
    					  	<div class="panel-body Transaksi">
    					  		<span style="color: #bbbaba">Total yang harus di bayar</span>
    					  		<br>
    					  		<span style="color: #000; font-weight: bold; font-size: 20px;">Rp. {{ number_format($data[4] ?? 0,0,',','.') }}</span>
    					  	</div>
  					    </div>
      			  </div>
      		</div>
      	</div>    
      
      	<div class="ps-footer bg--cover" data-background="{!! asset('public/assets/images/background/parallax.jpg') !!}">        
        
        @include('include.FrontEnd.footer')
    </main>

    <script type="text/javascript" src="{!! asset('public/assets/plugins/jquery/dist/jquery.min.js') !!}"></script>
    <script type="text/javascript" src="{!! asset('public/assets/plugins/bootstrap/dist/js/bootstrap.min.js') !!}"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    @include('sweet::alert')
    <!-- JS Library-->    
    <style type="text/css">
    	.panel-default{
    		border-radius: 2px;
    		border-color: #f5f5f5;
    	}

    	.panel-default>.panel-heading{
    		border-radius: 2px;
    		color: #fff;
    		font-weight: 700;
    		border-color: #f5f5f5;
    		background-color: #3eb960
    	}

    	.form-control {
		    display: block;
		    width: 100%;
		    height: 34px;
		    padding: 6px 12px;
		    font-size: 14px;
		    line-height: 1.42857143;
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
		}

		input[type=file] {
		    display: block;
		    padding-top: 4px;
		}

		.Transaksi{
			border-bottom: 2px solid #f5f5f5;
		}
    </style>	

    <script type="text/javascript">
      $('#image-file-payment').bind('change', function() {
        fileValidation(this.id);
        var mb = this.files[0].size / 1024 / 1024;
        if (mb > 3) {
          swal({
            title: "Error!",
            text: "Foto yang kamu upload "+ mb.toFixed(2)+" MB, maksimal upload yang di izinkan 1 MB",
            icon: "error",
          });
              this.value = "";
        }   
      });


      function fileValidation(response){
          var fileInput = document.getElementById(response);
          var filePath = fileInput.value;
          var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;
          if(!allowedExtensions.exec(filePath)){
            swal({
            title: "Error!",
            text: "File yang di ijinkan hanya format .jpeg .jpg dan .png",
            icon: "error",
          });
              fileInput.value = '';
              return false;
          }
      }
    </script>
  </body>
</html>