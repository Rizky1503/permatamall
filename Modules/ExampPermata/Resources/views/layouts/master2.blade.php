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
    <title>{{config('app.name', 'PermataMall')}} | {{$page->title ?? 'ONE STOP ONLINE MARKETPLACE'}}</title>
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
    @include('include.FrontEnd.side-header')  
    <main class="ps-main" style="background: #f5f5f5">
    	@yield('content')    
    
    	<div class="ps-footer bg--cover" data-background="{!! asset('public/assets/images/background/parallax.jpg') !!}">
        @include('include.FrontEnd.footer_content')
        @include('include.FrontEnd.footer')
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

    .color-footer{
      color: #fff;
    }
    </style>	

    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"></script>


    <script type="text/javascript">
    $(document).ready(function() {
          $('.select2').select2();
    });
    </script>    
    @yield('script')
    <style type="text/css">
      .select2-container--default .select2-selection--single {
        background: #f5f5f5;
        border: 1px solid #f5f5f5;
        border-radius: 2px;
        height: 34px;
      }    

      .image-icon-examp{
        max-height: 100px;
      }  

      @media only screen and (max-width: 600px) {
        .image-icon-examp{
          max-height: 40px;
        }
      }
    </style>
  </body>
</html>