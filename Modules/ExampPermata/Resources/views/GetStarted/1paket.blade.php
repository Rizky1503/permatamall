
    <!--====== Favicon Icon ======-->
    <link rel="shortcut icon" href="{!! asset('public/assets/images/logoonly-100x100.png') !!}" />
        
    <!--====== Animate CSS ======-->
    <link href="{!! asset('public/assets/assets_tmp/css/animate.css') !!}" rel="stylesheet" type="text/css" />
   
    <!--====== Line Icons CSS ======-->
    <link href="{!! asset('public/assets/assets_tmp/css/LineIcons.css') !!}" rel="stylesheet" type="text/css" />
        
    <!--====== Font Awesome CSS ======-->
    <link href="{!! asset('public/assets/assets_tmp/css/font-awesome.min.css') !!}" rel="stylesheet" type="text/css" />
        
    <!--====== Bootstrap CSS ======-->
    <link href="{!! asset('public/assets/assets_tmp/css/bootstrap.min.css') !!}" rel="stylesheet" type="text/css" />

    <!--====== Default CSS ======-->
    <link href="{!! asset('public/assets/assets_tmp/css/default.css') !!}" rel="stylesheet" type="text/css" />
    
    <!--====== Style CSS ======-->
    <link href="{!! asset('public/assets/assets_tmp/css/style.css') !!}" rel="stylesheet" type="text/css" />


<body>

    <div class="preloader">
        <div class="loader">
            <div class="ytp-spinner">
                <div class="ytp-spinner-container">
                    <div class="ytp-spinner-rotator">
                        <div class="ytp-spinner-left">
                            <div class="ytp-spinner-circle"></div>
                        </div>
                        <div class="ytp-spinner-right">
                            <div class="ytp-spinner-circle"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <header class="header-area">
        <div class="navbar-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <nav class="navbar navbar-expand-lg">
                            <a class="navbar-brand" href="{{ route('FrontEnd.index') }}">
                                <!-- <img src="assets/images/logo.svg" alt="Logo"> -->
                            </a>
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="toggler-icon"></span>
                                <span class="toggler-icon"></span>
                                <span class="toggler-icon"></span>
                            </button>

                            <div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent">
                                <ul id="nav" class="navbar-nav ml-auto">
                                    <li class="nav-item active">
                                        <a class="page-scroll" href="{{ route('FrontEnd.index') }}">Halaman Utama</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="page-scroll" href="#features">Paket Bimbel</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="page-scroll" href="#about">Tentang Bimbel</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="page-scroll" href="#vidio">Vidio Bimbel</a>
                                    </li>
                                </ul>
                                @if(Session::get('login'))
                                @else
                                <div class="navbar-btn d-none d-sm-inline-block">
                                    <a class="main-btn" data-scroll-nav="0" href="{{ route('Login.index') }}">Login</a>
                                </div>&nbsp;
                                <div class="navbar-btn d-none d-sm-inline-block">
                                    <a class="main-btn" data-scroll-nav="0" href="{{ route('Registrasi.index') }}">Registrasi</a>
                                </div>
                                @endif
                            </div> <!-- navbar collapse -->
                        </nav> <!-- navbar -->
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
        </div> <!-- navbar area -->
        
        <div id="home" class="header-hero bg_cover" style="background-image: url({{ asset('public/assets/assets_tmp/images/banner-bg.png')  }})">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="header-hero-content text-center">
                            <h4 style="color:#ef561c; font-size: 32px;" class="header-sub-title wow fadeInUp" data-wow-duration="1.3s" data-wow-delay="0.2s">Permata Bimbel Online - Solusi Belajar Online </h4>
                            <h2 style="color:#ef561c" class="header-title wow fadeInUp" data-wow-duration="1.3s" data-wow-delay="0.5s">Solusi belajar yang membantu proses belajar siswa baik di sekolah dan di luar sekolah</h2>
                            <a href="#features" style="background: linear-gradient(to right, #fe8464 0%, #fe6e9a 50%, #fe8464 100%);" class="main-btn" data-scroll-nav="0" >Pesan Sekarang</a>
                        </div> <!-- header hero content -->
                    </div>
                </div> <!-- row --><br><br><br><br><br>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="header-hero-image text-center wow fadeIn" data-wow-duration="1.3s" data-wow-delay="1.4s">
                            <img src="" alt="">
                        </div> <!-- header hero image -->
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
            <div id="particles-1" class="particles"></div>
        </div> <!-- header hero -->
    </header>
    
    <section id="features" class="services-area pt-120">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="section-title text-center pb-40">
                        <div class="line m-auto"></div>
                        <h3 class="title">Pilihan Paket Bimbel Online, <span> Materi ringkasan pelajaran, Siap UN, Siap SBMPTN, Video tutorial belajar Latihan Soal dan pembahasan untuk</span> tingkat SD, SMP dan SMA</h3>
                    </div> <!-- section title -->
                </div>
            </div> <!-- row -->
            <div class="row justify-content-left">
                @foreach($data as $ListData)
                <div class="col-md-3" style="width: 100%">
                  <a href="{{ route('ExampPermataBimbelOnline.paket_more',[encrypt($ListData->id_paket)]) }}">
                    <div class="card card-image" style="width: 100%">
                        <img style="width:100%; border-radius: 5px; margin-top: 20px;" src="{{ ENV('APP_URL_API_RESOURCE').'images/paket/examp/'.$ListData->banner_paket }}">
                    </div>
                  </a>
                </div>
                @endforeach
            </div> <!-- row -->
        </div> <!-- container -->
    </section>
 
    <section id="about" class="about-area pt-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="about-content mt-50 wow fadeInLeftBig" data-wow-duration="1s" data-wow-delay="0.5s">
                        <div class="section-title">
                            <div class="line"></div>
                            <h3 class="title">Belajar efektif <span>dengan berbagai contoh soal yang sesuai dengan kurikulum saat ini</span></h3>
                        </div> <!-- section title -->
                        <ul>
                            <li> - Penjelasan materi ringkasan pelajaran setiap tingkat secara menyeluruh.</li>
                            <li> - Penguatan konsep melalui soal Latihan yang bervariasi.</li>
                            <li> - Evaluasi belajar melalui soal latihan yang bervariasi.</li>
                        </ul>
                        <a href="#features" class="main-btn">Daftar Sekarang</a>
                    </div> <!-- about content -->
                </div>
                <div class="col-lg-6">
                    <div class="about-image text-center mt-50 wow fadeInRightBig" data-wow-duration="1s" data-wow-delay="0.5s">
                        <img src="{{asset('public/assets/assets_tmp/images/about1.svg')}}" alt="about">
                    </div> <!-- about image -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
        <div class="about-shape-1">
            <img src="{{ asset('public/assets/assets_tmp/images/about-shape-1.svg')}}" alt="shape">
        </div>
    </section>

    <section id="vidio" class="services-area pt-120">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="section-title text-center pb-40">
                        <div class="line m-auto"></div>
                        <h3 class="title">Materi Video Tutorial Belajar</h3>
                    </div> <!-- section title -->
                </div>
            </div> <!-- row -->
            <div class="row justify-content-left">
                @foreach($vidio as $ListVideo)
                <div class="col-md-3">
                  <a href="{{ route('FreeExamp.nambah_view',[$ListVideo->slug]) }}">
                    <div class="card card-image" style="width: 100%">
                        <img style="width:100%; border-radius: 5px; margin-top: 20px;" src="{{ ENV('APP_URL_API_RESOURCE').'images/Video/banner/'.$ListVideo->kelas.'/'.$ListVideo->nama_matpel.'/'.$ListVideo->banner }}">
                    </div>
                    <center><p><b style="color: #ef561c; font-size: 19px;">{{ $ListVideo->nama_matpel }}</b></p></center>
                    <center><p>{{ $ListVideo->tingkat }}</p></center>
                  </a>
                </div>
                @endforeach
            </div> <!-- row -->
        </div> <!-- container -->
    </section>
    
    <footer id="footer" class="footer-area pt-120">
        <div class="container"><br><br><br><br><br><br><br>
            <div class="footer-widget pb-100">
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-sm-8">
                        <div class="footer-about mt-50 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.2s">
                            <div class="footer-contact mt-50 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.8s">
                                <div class="footer-title">
                                    <h4 class="title">Kontak</h4>
                                </div>
                                <ul class="contact">
                                    <li>Email: <a href='mailto:support@permatamall.com' style="color:#4650d0;">support@permatamall.com</a></li>
                                    <li>Phone: 0811811306</li>
                                    <li>whatsapp: 0811811306</li>
                                    <li>Blok O, No 2, Jl. Komp. Permata Hijau Jl. Cidodol Raya No.2<br> Kebayoran Lama, 12220.</li>
                                </ul>
                            </div>
                            <ul class="social">
                                <li><a href="https://www.facebook.com/PermataMall"><i class="lni-facebook-filled social-icon"></i></a></li>
                                <li><a href="https://twitter.com/Permatamall_ID"><i class="lni-twitter-filled social-icon"></i></a></li>
                                <li><a href="https://www.instagram.com/permatamall.id/"><i class="lni-instagram-filled social-icon"></i></a></li>
                                <li><a href="http://bit.ly/370tyET"><i class="lni lni-youtube social-icon"></i></a></li>
                            </ul>
                        </div> <!-- footer about -->
                    </div>
                    <div class="col-lg-5 col-md-7 col-sm-7">
                        <div class="footer-link d-flex mt-50 justify-content-md-between">
                            <div class="link-wrapper wow fadeIn" data-wow-duration="1s" data-wow-delay="0.4s">
                                <div class="footer-title">
                                    <h4 class="title">Tentang PermataMall</h4>
                                </div>
                                <ul class="link">
                                    <li><a href="#">Hubungi Kami</a></li>
                                    <li><a href="#">Pusat Bantuan</a></li>
                                    <li><a href="#">Karir</a></li>
                                    <li><a href="#">Tentang Kami</a></li>
                                    <li><a href="#">Pengembalian Dana</a></li>
                                    <li><a href="#">Syarat dan Ketentuan</a></li>
                                </ul>
                            </div> <!-- footer wrapper -->
                            <div class="link-wrapper wow fadeIn" data-wow-duration="1s" data-wow-delay="0.6s">
                                <div class="footer-title">
                                    <h4 class="title">Produk PERMATAMALL</h4>
                                </div>
                                <ul class="link">
                                    <li><a href="#">Permata Bimbel</a></li>
                                    <li><a href="#">Permata Belanja</a></li>
                                    <li><a href="#">Permata Travel</a></li>
                                    <li><a href="#">Permata Sewa Gedung</a></li>
                                    <li><a href="#">Permata Jasa</a></li>
                                </ul>
                            </div> <!-- footer wrapper -->
                        </div> <!-- footer link -->
                    </div>
                    <div class="col-lg-3 col-md-5 col-sm-5">
                        <div class="footer-contact mt-50 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.8s">
                            <div class="footer-title">
                                <h4 class="title">Download Apps Di</h4>
                            </div>
                            <ul class="contact">
                                <li><a href='https://play.google.com/store/apps/details?id=com.permatamall&hl=in'></a><img src="{!! asset('public/assets/images/icon/icon/cb935093.png') !!}" alt="" style="max-height: 70px;"></li>
                                <li><a href=''><img src="{!! asset('public/assets/images/icon/icon/c3ef5d85.png') !!}" alt="" style="max-height: 70px;"></a></li>
                            </ul>
                        </div> <!-- footer contact -->
                    </div>
                </div> <!-- row -->
            </div> <!-- footer widget -->
            <div class="footer-copyright">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="copyright d-sm-flex justify-content-between">
                            <div class="copyright-content">
                                <p class="text"><a href="https://permatamall.com" rel="nofollow">© PERMATAMALL, All rights Resevered. 2019</a></p>
                            </div> <!-- copyright content -->
                        </div> <!-- copyright -->
                    </div>
                </div> <!-- row -->
            </div> <!-- footer copyright -->
        </div> <!-- container -->
        <div id="particles-2"></div>
    </footer>
    
    <a href="#" class="back-to-top"><i class="lni-chevron-up"></i></a>

    <!--====== BACK TOP TOP PART ENDS ======-->   
    
    <!--====== Jquery js ======-->
    <script src="{!! asset('public/assets/assets_tmp/js/vendors/jquery-1.12.4.min.js') !!}"></script>
    <script src="{!! asset('public/assets/assets_tmp/js/vendors/modernizr-3.7.1.min.js') !!}"></script>
    
    <!--====== Bootstrap js ======-->
    <script src="{!! asset('public/assets/assets_tmp/js/popper.min.js') !!}"></script>
    <script src="{!! asset('public/assets/assets_tmp/js/bootstrap.min.js') !!}"></script>

    <!--====== Plugins js ======-->
    <script src="{!! asset('public/assets/assets_tmp/js/plugins.js') !!}"></script>

    <!--====== Scrolling Nav js ======-->
    <script src="{!! asset('public/assets/assets_tmp/jquery.easing.min.js') !!}"></script>
    <script src="{!! asset('public/assets/assets_tmp/js/scrolling-nav.js') !!}"></script>

    <!--====== wow js ======-->
    <script src="{!! asset('public/assets/assets_tmp/js/wow.min.js') !!}"></script>
    
    <!--====== Particles js ======-->
    <script src="{!! asset('public/assets/assets_tmp/js/particles.min.js') !!}"></script>

    <!--====== Main js ======-->
    <script src="{!! asset('public/assets/assets_tmp/js/main.js') !!}"></script>

    
</body>

<style type="text/css">


.navbar-nav .nav-item a {
    color : #ef561c;
}

.footer-title .title {
    color: #ef561c;
}

.footer-contact .contact li {
    color: #ef561c;
}

.link-wrapper .link li a {
    color: #ef561c;
}

.social-icon{
    color: #ef561c;
}

.copyright-content a {
    color: #ef561c;
}

.sticky .navbar-nav .nav-item.active > a, .sticky .navbar-nav .nav-item:hover > a {
    color: #ef561c;
}

.card {
    border: 1px solid rgba(0, 0, 0, 0);
}



</style>

