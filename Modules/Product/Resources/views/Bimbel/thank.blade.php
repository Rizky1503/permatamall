
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
    <title>{{config('app.name', 'PermataMall')}} | {{$page->title ?? ''}}</title>
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
          <div class="row">
            <div class="col-md-12">
              <div class="bs-example">
                <div class="accordion" id="accordionExample">
                  <div class="card">
                    <div class="card-header" id="headingOne" style="background-color: #3eb960;">
                        <h2 class="mb-0" style="padding: 2px;">
                            <button type="button" class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" style="text-decoration: none; font-weight: bold; color: #fff">Informasi Produk</button>                  
                            <span style="float: right;">
                              <button type="button" class="btn btn-link" data-toggle="collapse" data-target="#collapseOne">
                                <i class="fa fa-minus" style="color: #fff"></i>
                              </button>                              
                            </span>
                        </h2>
                    </div>
                    <div id="collapseOne" class="collapse in" aria-labelledby="headingOne" data-parent="#accordionExample" style="border:1px solid #fff; background-color: #fff; padding: 10px;">
                        <div class="card-body">                            
                            <div style="border:1px solid #e4e3e3; padding: 1px 10px;background-color: #efefef;">
                              <span style="font-size: 12px; color: #afafaf">Nama Produk</span>
                              <br>
                              <span style="font-size: 13px;font-weight: 600;color: #444">Bimbel offline Bimbel Ganesha</span>
                            </div>
                            <div style="border:1px solid #e4e3e3; padding: 1px 10px;background-color: #efefef;">
                              <span style="font-size: 12px; color: #afafaf">Alamat</span>
                              <br>
                              <span style="font-size: 13px;font-weight: 600;color: #444">Jl veteran III</span>
                            </div>
                            <div style="border:1px solid #e4e3e3; padding: 1px 10px;background-color: #efefef;">
                              <span style="font-size: 12px; color: #afafaf">Tingkat</span>
                              <br>
                              <span style="font-size: 13px;font-weight: 600;color: #444">SD</span>
                            </div>
                            <div style="border:1px solid #e4e3e3; padding: 1px 10px;background-color: #efefef;">
                              <span style="font-size: 12px; color: #afafaf">Daerah</span>
                              <br>
                              <span style="font-size: 13px;font-weight: 600;color: #444">Kalideres II</span>
                            </div>
                            <div style="border:1px solid #e4e3e3; padding: 1px 10px;background-color: #efefef;">
                              <span style="font-size: 12px; color: #afafaf">Kota</span>
                              <br>
                              <span style="font-size: 13px;font-weight: 600;color: #444">Bogor</span>
                            </div>
                        </div>
                    </div>
                  </div>                
                </div>
              </div>
              <br>
            </div>
          </div>          
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
					  		<form method="post" action="{{ route('Payment.store') }}" enctype="multipart/form-data">
					  			@csrf
					  			<input type="hidden" name="product_invoice" value="">
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
								    <input type="file" class="form-control" id="bukti" name="upload">
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
					  		<span style="color: #000; font-weight: bold; font-size: 20px;">Paket SD 1 Tahun</span>
					  	</div>
					  	<div class="panel-body Transaksi">
					  		<span style="color: #bbbaba">Transefer Ke Rekening PermataMall</span>
					  		<br>
					  		<span style="color: #000; font-weight: bold; font-size: 20px;"><img src="https://upload.wikimedia.org/wikipedia/id/thumb/e/e0/BCA_logo.svg/472px-BCA_logo.svg.png" width="60">&nbsp; 5421342312</span>
					  		<br>
					  		<span style="color: #000; font-weight: bold; font-size: 20px;"><img src="https://upload.wikimedia.org/wikipedia/id/thumb/f/fa/Bank_Mandiri_logo.svg/1280px-Bank_Mandiri_logo.svg.png" width="60">&nbsp; 4536352121215</span>
					  	</div>
					  	<div class="panel-body Transaksi">
					  		<span style="color: #bbbaba">Total yang harus di bayar</span>
					  		<br>
					  		<span style="color: #000; font-weight: bold; font-size: 20px;">Rp. 1.000.000</span>
					  	</div>
					</div>
      			</div>
      		</div>
      	</div>    
      
      	<div class="ps-footer bg--cover" data-background="{!! asset('public/assets/images/background/parallax.jpg') !!}">        
        	<div class="ps-footer__copyright">
          	<div class="ps-container">
           	 	<div class="row">
                  	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 ">
                    	<p>&copy; <a href="#">PERMATAMALL GROUP</a>, Inc. All rights Resevered. 2019</p>
                  	</div>
                  	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 ">
                    	<ul class="ps-social">
                      		<li><a href="#"><i class="fa fa-facebook"></i></a></li>
                      		<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                      		<li><a href="#"><i class="fa fa-twitter"></i></a></li>
                      		<li><a href="#"><i class="fa fa-instagram"></i></a></li>
                    	</ul>
                  	</div>
            	</div>
          	</div>
        </div>
    </main>

    <script type="text/javascript" src="{!! asset('public/assets/plugins/jquery/dist/jquery.min.js') !!}"></script>
    <script type="text/javascript" src="{!! asset('public/assets/plugins/bootstrap/dist/js/bootstrap.min.js') !!}"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    @include('sweet::alert')
    <!-- JS Library-->    
    <style type="text/css">
      .bs-example{
          margin: 1px;
      }
      .accordion .fa{
          margin-right: 0.5rem;
      }
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
      $(document).ready(function(){
          // Add minus icon for collapse element which is open by default
          $(".collapse.show").each(function(){
            $(this).prev(".card-header").find(".fa").addClass("fa-minus").removeClass("fa-plus");
          });
          
          // Toggle plus minus icon on show hide of collapse element
          $(".collapse").on('show.bs.collapse', function(){
            $(this).prev(".card-header").find(".fa").removeClass("fa-plus").addClass("fa-minus");
          }).on('hide.bs.collapse', function(){
            $(this).prev(".card-header").find(".fa").removeClass("fa-minus").addClass("fa-plus");
          });
      });
    </script>
  </body>
</html>