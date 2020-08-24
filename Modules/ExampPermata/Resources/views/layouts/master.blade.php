
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tryout PermataMall || Gratis</title>
    <link href="https://fonts.googleapis.com/css?family=Croissant+One" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Raleway:400,500,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="{!! asset('public/assets/examp/css/bootstrap.css') !!}">
    <link rel="stylesheet" href="{!! asset('public/assets/examp/css/font-awesome.min.css') !!}">
    <link rel="stylesheet" href="{!! asset('public/assets/examp/css/owl.carousel.min.css') !!}">
    <link rel="stylesheet" href="{!! asset('public/assets/examp/css/owl.theme.default.min.css') !!}">
    <link rel="stylesheet" href="{!! asset('public/assets/examp/style.css') !!}">
    <link rel="stylesheet" href="{!! asset('public/assets/examp/responsive.css') !!}">
</head>

<body>
    <div class="wrapper">
        @if( \Request::route()->getName() == "ExampPermata.index")
        <header class="header">
            <div class="blue">
                <img src="{!! asset('public/assets/examp/img/header-shepe-blue.png') !!}" alt="">
            </div>
            <div class="white">
                <img src="{!! asset('public/assets/examp/img/header-shepe-white.png') !!}" alt="">
            </div>
            <div class="container">
                <img class="shepe1" src="{!! asset('public/assets/examp/img/shepe1.png') !!}" alt="">
                <img class="shepe2" src="{!! asset('public/assets/examp/img/shepe2.png') !!}" alt="">
                <img class="shepe3" src="{!! asset('public/assets/examp/img/shepe2.png') !!}" alt="">
                <img class="shepe4" src="{!! asset('public/assets/examp/img/shepe2.png') !!}" alt="">
                <img class="shepe5" src="{!! asset('public/assets/examp/img/shepe1.png') !!}" alt="">
                <img class="shepe6" src="{!! asset('public/assets/examp/img/shepe2.png') !!}" alt="">
                <div class="row">
                    <div class="col-md-9 col-sm-9 col-xs-12">
                        <div class="logo">
                            <a href="">
                                <img src="{!! asset('public/assets/images/textonly-363x129.png') !!}" width="200">
                            </a>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-3 col-xs-12">
                        <span style="float: right;">
                            <img src="https://www.bukalapak.com/images/default_avatar/thumb/default.jpg" data-toggle="dropdown" style="border-radius: 50%; max-width: 30px;">
                            Muhamad
                        </span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="header-text">
                            <h1>Uji kemampuanmu disini</h1>
                            <p>Ayo uji kemampuan pengetahuan kamu dengan test yang tersedia <br> PT Permata Mall Nusantara bekerjasama dengan kementrian pendidikan untuk mengadakan test online secara free (GRATIS)</p>
                            <button  onclick="location.href = '{{ route('ExampPermata.mapel') }}'">Mulai Sekarang</button>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="another-text">
                            <h3>Pilih Berlangganan Sekarang</h3>
                            <p>Silahkan pilih kelas yang tersedia, jika kamu kelas kamu tidak terdaftar<br><a href="">hubungi kami disini</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        @elseif(\Request::route()->getName() == "ExampPermata.mapel")
        <header class="header">
            <div class="blue">
                <img src="{!! asset('public/assets/examp/img/header-shepe-blue.png') !!}" alt="">
            </div>
            <div class="white">
                <img src="{!! asset('public/assets/examp/img/header-shepe-white.png') !!}" alt="">
            </div>
            <div class="container">
                <img class="shepe6" src="{!! asset('public/assets/examp/img/shepe2.png') !!}" alt="">
                <div class="row">
                    <div class="col-md-9 col-sm-9 col-xs-12">
                        <div class="logo">
                            <a href="">
                                <img src="{!! asset('public/assets/images/textonly-363x129.png') !!}" width="200">
                            </a>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-3 col-xs-12">
                        <span style="float: right;">
                            <img src="https://www.bukalapak.com/images/default_avatar/thumb/default.jpg" data-toggle="dropdown" style="border-radius: 50%; max-width: 30px;">
                            Muhamad
                        </span>
                    </div>
                </div>
                <div style="height: 250px;"></div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="another-text">
                            <h3>Kelas Yang di pilih {{ $kelas }}</h3>
                            <p>Untuk selanjutnya silahkan pilih mata pelajaran yang tersedia, untuk merubah kelas <a href="{{ route('ExampPermata.index') }}">Klik disini</a></p>
                        </div>
                    </div>
                </div>

            </div>
        </header>
        @else
        dsd
        @endif
        @yield('content')
        <footer class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <center>PT PERMATA MALL NUSANTARA</center>
                    </div>                    
                </div>
            </div>
        </footer>
    </div>
    <script src="{!! asset('public/assets/examp/js/jquery-3.1.1.min.js') !!}"></script>
    <script src="{!! asset('public/assets/examp/js/bootstrap.min.js') !!}"></script>
    <script src="{!! asset('public/assets/examp/js/owl.carousel.min.js') !!}"></script>
    <script src="{!! asset('public/assets/examp/js/active.js') !!}"></script>
    @yield('script')

    <script type="text/javascript" src="{!! asset('public/assets/plugins/jquery/dist/jquery.min.js') !!}"></script>
    <script type="text/javascript" src="{!! asset('public/assets/plugins/bootstrap/dist/js/bootstrap.min.js') !!}"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    @include('sweet::alert')
</body>

</html>