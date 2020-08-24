
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
    <link rel="stylesheet" href="{!! asset('public/assets/css/jquery.modal.min.css') !!}" />
  </head>
  <body class="ps-loading loaded">
    <header class="header">      
      <nav class="navigation">
        <div class="container">
            <div class="navigation__column left">
                <div class="header__logo">
                    <a class="ps-logo" href="{{ route('Mitra.index') }}"><img src="{!! asset('public/assets/images/textonly-363x129.png') !!}" alt=""></a>
                </div>
            </div>
            <div class="navigation__column center">
                &nbsp;
            </div>
            <div class="navigation__column right">
                <div class="header__logo">
                    <a class="ps-logo" href="{{ route('logout') }}" style="color: #3eb960; font-weight: bold;">
                        Logout
                    </a>
                </div>
            </div>          
        </div>
      </nav>
    </header>    
    <main class="ps-main" style="background: #f5f5f5">
        <div style="background-image: url('{!! asset('public/images/sidebar/mitra.png') !!}'); line-height: 4;text-align: center;font-size: 40px;font-weight: bold;color: #fff;">
            {{$page->title ?? '' }}
        </div>                   
        <!-- <marquee><h1>Simulasi aplikasi, Masih dalam tahap pengembangan</h1></marquee>  -->
        <div class="container" style="padding-top:10px; padding-bottom: 50px;">             
            @yield('content')
        </div>    
      
        <div class="ps-footer bg--cover" data-background="{!! asset('public/assets/images/background/parallax.jpg') !!}">        

        @include('include.FrontEnd.footer')
    </main>

    <div id="jadwal_notifikasi" class="modal" style="margin-top: 60px;">
        {{ HelperNotificationJadwalGuru()->Count }}
    </div>
    <!-- JS Library-->
    <script type="text/javascript" src="{!! asset('public/assets/plugins/jquery/dist/jquery.min.js') !!}"></script>
    <script type="text/javascript" src="{!! asset('public/assets/plugins/bootstrap/dist/js/bootstrap.min.js') !!}"></script>
    <script src="{!! asset('public/assets/js/sweetalert.min.js') !!}"></script>
    <script src="{!! asset('public/assets/js/jquery.modal.min.js') !!}"></script>  
    <!-- <script type="text/javascript">
        $(document).ready(function() {
            $('#jadwal_notifikasi').modal({
              fadeDuration: 250
            });
        });
    </script> -->    
    @include('sweet::alert')
    @yield('script')
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

        .image-icon-examp{
            max-height: 50px;
        }  

        .icon_menu_mitra:hover{
            background-color: #d6d6d6;
        }

        .icon_menu_mitra{
            width: 16%; 
            float: left;
        }

        .modal{
            overflow: visible;
        }

        @media only screen and (max-width: 600px) {
            .image-icon-examp{
              max-height: 40px;
            }

            .icon_menu_mitra{
                width: 30%; 
                height: 100px;
                float: left;
            }

        }
    </style>    
  </body>
</html>