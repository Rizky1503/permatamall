
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
	              <div class="panel panel-default" style="min-height: 400px;">
	                <div class="panel-body">                
	                	<h3>Invoice sementara masih dalam pengembangan,untuk mendapatkan invoice Permatamall.com telah mengirimkan ke email akun ini,terima kasih</h3>
                    <br>
                    <br>
                    <br>
                    <h3>PT. Permata Mall Nusantara</h3>
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
    <!-- JS Library-->
    <script type="text/javascript" src="{!! asset('public/assets/plugins/jquery/dist/jquery.min.js') !!}"></script>
    <script type="text/javascript" src="{!! asset('public/assets/plugins/bootstrap/dist/js/bootstrap.min.js') !!}"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    @include('sweet::alert')
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
  </body>
</html>