<!DOCTYPE>
<html lang="en" >
	<!-- begin::Head -->
	<head>
		<meta charset="utf-8" />
		<title>
			{{config('app.name', 'PermataMall')}} | {{$page->title ?? ''}}
		</title>
		<meta name="description" content="Latest updates and statistic charts">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!--begin::Web font -->
		<script src="https://cdn.bootcss.com/webfont/1.6.16/webfontloader.js"></script>
		<script>
          WebFont.load({
            google: {"families":["Poppins:300,400,500,600,700","Roboto:300,400,500,600,700"]},
            active: function() {
                sessionStorage.fonts = true;
            }
          });
		</script>

		<link href="{!! asset('public/assets/assets/vendors/custom/fullcalendar/fullcalendar.bundle.css') !!}" rel="stylesheet" type="text/css" />
		<link href="{!! asset('public/assets/assets/vendors/base/vendors.bundle.css') !!}" rel="stylesheet" type="text/css" />
		<link href="{!! asset('public/assets/assets/demo/default/base/style.bundle.css') !!}" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="{!! asset('public/assets/css/sweetalert2.min.css') !!}">
		<link rel="stylesheet" href="{!! asset('public/assets/css/jquery.modal.min.css') !!}" />
		<link rel="shortcut icon" href="{!! asset('public/assets/images/logoonly-100x100.png') !!}" />
	</head>
	<body class="m--skin- m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default">
		@yield('content')

		<script src="{!! asset('public/assets/assets/vendors/base/vendors.bundle.js') !!}" type="text/javascript"></script>
		<script src="{!! asset('public/assets/assets/demo/default/base/scripts.bundle.js') !!}" type="text/javascript"></script>
		<script type="text/javascript" src="{!! asset('public/assets/js/sweetalert2.min.js') !!}"></script> 
	    <script src="{!! asset('public/assets/js/jquery.modal.min.js') !!}"></script>  
	    <script type="text/javascript">
	    	var Select2 = function() {
		    	$(".m-select2").select2()
			}();
			jQuery(document).ready(function() {
			    Select2.init()
			});
	    </script>
		@yield('script')
	</body>
	<!-- end::Body -->
</html>
