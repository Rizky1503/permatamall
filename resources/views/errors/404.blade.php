<!DOCTYPE html>
<html lang="en" >
  <!-- begin::Head -->
  <head>
    <meta charset="utf-8" />
    <title>
      Halaman Tidak Ditemukan
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
    <!--end::Web font -->
        <!--begin::Base Styles -->
    <link href="{!! asset('public/assets/assets/vendors/base/vendors.bundle.css') !!}" rel="stylesheet" type="text/css" />
    <link href="{!! asset('public/assets/assets/demo/default/base/style.bundle.css') !!}" rel="stylesheet" type="text/css" />
    <!--end::Base Styles -->
    <link rel="shortcut icon" href="{!! asset('public/assets/images/logoonly-100x100.png') !!}" />
  </head>
  <!-- end::Head -->
    <!-- end::Body -->
  <body class="m--skin- m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default"  >
    <!-- begin:: Page -->
    <div class="m-grid m-grid--hor m-grid--root m-page">
      <div class="m-grid__item m-grid__item--fluid m-grid  m-error-3" style="background-image: url({!! asset('public/assets/assets/app/media/img//error/bg3.jpg') !!});">
        <div class="m-error_container">
          <span class="m-error_number">
            <h1>
              404
            </h1>
          </span>
          <p class="m-error_title m--font-light">
            Halaman Tidak Ditemukan
          </p>
          <p class="m-error_subtitle">
            Maaf halaman yang kamu cari tidak ditemukan
          </p>
          <p class="m-error_description">
            Periksa kembali link yang ingin kamu tuju atau .
            <br>
            <a href="{{ route('FrontEnd.index') }}">kembali ke halaman depan</a>.
          </p>
        </div>
      </div>
    </div>
    <!-- end:: Page -->
      <!--begin::Base Scripts -->
    <script src="{!! asset('public/assets/assets/vendors/base/vendors.bundle.js') !!}" type="text/javascript"></script>
    <script src="{!! asset('public/assets/assets/demo/default/base/scripts.bundle.js') !!}" type="text/javascript"></script>
    <!--end::Base Scripts -->
  </body>
  <!-- end::Body -->
</html>
