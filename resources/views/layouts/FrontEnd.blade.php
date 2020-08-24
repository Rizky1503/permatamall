<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Google Tag Manager -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-156594125-1">
    </script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-156594125-1');
    </script>

    @if(ENV('APP_ENV') == "production")
    <meta http-equiv="Refresh" content="0;URL=https://frontend.permatamall.com"/>
    @endif
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="robots" content="index, follow" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="keywords" content="permata, permata mall, Permata Mall, PermataMall indonesia, permata nusantara permata mal nusantara, produk baru,popular, terbaru, termurah, nusantara, barang bagus, tiket, paket wisata, liburan, luar kota, luar negeri , jakarta, bimbel, tryout, bimbel online, sewa mobil, penginapan, hotel, Sewa Gedung, liburan" itemprop="keywords">
    <meta name="description" content="permatamall.com Situs penyedia jasa Pendidikan, Penjualan Barang, Penyewaan Sewa Gedung, Pengandaan segala kebutuhan dengan jaminan keanggotaan secara aman dan nyaman untuk melakukan transaksi." />
    <meta name="twitter:card" content="summary_large_image"/>
    <meta name="twitter:site" content="@permata_mall"/>
    <meta name="twitter:creator" content="@permata_mall" />
    <meta name="twitter:description" content="permatamall.com Situs penyedia jasa Pendidikan, Penjualan Barang, Penyewaan Sewa Gedung, Pengandaan segala kebutuhan dengan jaminan keanggotaan secara aman dan nyaman untuk melakukan transaksi." />
    <meta name="twitter:image:src" content="{!! asset('public/assets/images/logoonly-100x100.png') !!}" />
    <meta property="fb:pages" content="109886990386740" />
    <meta property="fb:app_id" content="109886990386740" />
    <meta property="article:author" content="{{ ENV('APP_URL_FACEBOOK') }}" itemprop="author" />
    <meta property="article:publisher" content="{{ ENV('APP_URL_FACEBOOK') }}" />
    <meta property="og:site_name" content="PermataMall"/>
    <meta property="og:title" content="Permata Mall | Termurah, Terpercaya, Teraman"/>
    <meta property="og:url" content="https://permatamall.com/"/>
    <meta property="og:description" content="permatamall.com Situs penyedia jasa Pendidikan, Penjualan Barang, Penyewaan Sewa Gedung, Pengandaan segala kebutuhan dengan jaminan keanggotaan secara aman dan nyaman untuk melakukan transaksi." >
    <meta property="og:image" content="{!! asset('public/assets/images/logoonly-100x100.png') !!}" />
    <meta property="og:image:width" content="650" />
    <meta property="og:image:height" content="366" />
    <meta property="og:type" content="article" />
    <meta name="google-site-verification" content="OrdhcJTH_OZPkoPhlb4roRLz0lL3ddlVyF6jcQkARqc" />

    <link rel="canonical" href="https://permatamall.com" />
    <link rel="alternate" media="only screen and (max-width: 640px)" href="https://permatamall.com">
    <link rel="apple-touch-icon" href="{!! asset('public/assets/images/logoonly-100x100.png') !!}">
    <link rel="android-touch-icon" href="{!! asset('public/assets/images/logoonly-100x100.png') !!}" />
    <link rel="shortcut icon" href="{!! asset('public/assets/images/logoonly-100x100.png') !!}">
    <link rel="shortcut icon" href="{!! asset('public/assets/images/logoonly-100x100.png') !!}" type="image/x-icon" />

    <title>{{config('app.name', 'Permata Mall')}} : {{ $page->title ?? 'ONE STOP ONLINE MARKETPLACE'}}</title>
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
    <link rel="stylesheet" type="text/css" href="{!! asset('public/assets/css/select2.min.css') !!}">    
    <link rel="stylesheet" href="{!! asset('public/assets/css/jquery.modal.min.css') !!}" />
  </head>
  <body class="ps-loading loaded">
    <div id="Migration" class="modal" style="height: auto;">
      <div>
        <center>
          <h5><b>Belajar Online</b> ada di <b>PermataBelajar</b></h5>
          <span>Silahkan kunjungi kami di :</span><hr>

          <div class="row">
            <div class="col-md-6">
              <a href="https://permatabelajar.com/">
                <img src="{!! asset('public/images/logo_permatabelajar.jpg') !!}" style="width: 50%;">
                <center><span>Website PermataBelajar</span></center>
              </a>
            </div>
            <div class="col-md-6">
              <a href="https://play.google.com/store/apps/details?id=com.permatabimbel" >
                <img src="{!! asset('public/assets/images/icon/icon/cb935093.png') !!}" style="width: 70%; padding-bottom: 27px; margin-top: 27px;">
                <center><span>Apps PermataBelajar</span></center>
              </a>
            </div>
          </div>
        </center>
      </div>
    </div>
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MKZPK47"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    <div class="home-page-widget-overlay" onclick="functionPostOverlay()" id="page_selain_cari_halaman"></div>    
    @include('include.FrontEnd.header')
    @include('include.FrontEnd.side-header')
    <main class="ps-main">
      @yield('content')    
      <!-- <div class="ps-subscribe">
        <div class="ps-container">
          <div class="row">
                <div class="col-lg-7 col-md-12 col-sm-12 col-xs-12 ">
                  <span style="color: #fff;font-size: 20px;line-height: 3;"><i class="fa fa-envelope"></i> Berlangganan sekarang untuk penawaran terbaik</span>
                </div>
                <div class="col-lg-5 col-md-7 col-sm-12 col-xs-12 ">
                  <form class="ps-subscribe__form" action="do_action" method="post">
                    <input class="form-control" type="text" placeholder="">
                    <button>Berlangganan</button>
                  </form>
                </div>
          </div>
        </div>
      </div> -->
      <div class="ps-footer bg--cover" data-background="{!! asset('public/assets/images/background/parallax.jpg') !!}">
       @include('include.FrontEnd.footer_content')
       @include('include.FrontEnd.footer')
      </div>
    </main>


    @if(Session::get('login'))            
      @if(HelperRedirectPortalMitra() == 1)
      @else
        @if(HelperNotificationJadwal()->Count > 0)
          <div id="jadwal_notifikasi" class="modal" style="margin-top: 60px;">
            <main class="jadwal-keles">
              <div class="notification-jadwal">
                <svg viewbox="-10 0 35 15">
                  <path class="notification-jadwal--bell" d="M14 12v1H0v-1l0.73-0.58c0.77-0.77 0.81-3.55 1.19-4.42 0.77-3.77 4.08-5 4.08-5 0-0.55 0.45-1 1-1s1 0.45 1 1c0 0 3.39 1.23 4.16 5 0.38 1.88 0.42 3.66 1.19 4.42l0.66 0.58z"></path> 
                  <path class="notification-jadwal--bellClapper" d="M7 15.7c1.11 0 2-0.89 2-2H5c0 1.11 0.89 2 2 2z"></path>
                </svg>
              </div>
              <center>
                <br>
                <?php
                $database_notifikasi = HelperNotificationJadwal()->List;
                $keterangan_jadawal = json_decode(HelperNotificationJadwal()->List->keterangan);
                $JadwalLastConfirm  = json_decode(file_get_contents(ENV('APP_URL_API').'web/Transaction/detail/jadwal_last/'.$database_notifikasi->id_invoice.'/'.decrypt(Session::get('id_token_xmtrusr'))));
                ?>
                <span>Hi {{ HelperNotificationJadwal()->List->nama_pelanggan ?? ' ' }}, Silahkan konfirmasi kehadiran jadwal guru yang mengajar kamu</span>        
                <br>
                <br>
                <a href="{{ route('Jadwal.index', [substr($database_notifikasi->id_invoice,0, 12).base64_encode(substr($database_notifikasi->id_invoice,12, 50)),base64_encode(now())]) }}" class="btn btn-primary">Konfirmasi Kehadiran</a>
              </center>
            </main>
          </div>          
        @endif
      @endif
    @endif
    <style>
      .color-footer{
        color: #fff;
      }

      .ps-widget--info p {
        font-family: "Work Sans", san-serif;
        font-weight: 400;
        color: #fff;
      }

      .modal{
        overflow: visible;
      }

      </style>
    <!-- JS Library-->    
    <script type="text/javascript" src="{!! asset('public/assets/plugins/jquery/dist/jquery.min.js') !!}"></script>
    <script type="text/javascript" src="{!! asset('public/assets/plugins/bootstrap/dist/js/bootstrap.min.js') !!}"></script>
    <!-- Custom scripts-->    
    <script type="text/javascript" src="{!! asset('public/assets/js/sweetalert2.min.js') !!}"></script>     
    <script type="text/javascript" src="{!! asset('public/assets/js/main.js') !!}"></script>     
    <script type="text/javascript" src="{!! asset('public/assets/js/select2.min.js') !!}"></script>
    <script src="{!! asset('public/assets/js/jquery.modal.min.js') !!}"></script>  
    @if(Session::get('login'))            

      @if(HelperRedirectPortalMitra() == 1)
      @else
        @if(HelperNotificationJadwal()->Count > 0)
          <script type="text/javascript">
            $(document).ready(function() {
                $('#jadwal_notifikasi').modal({
                  fadeDuration: 250
                });
            });
          </script>         
        @endif
      @endif
    @endif    
    <script type="text/javascript">
      function migration(){
        $('#Migration').modal({
          fadeDuration: 250,
          escapeClose: false,
          clickClose: false,
          showClose: false
        });
      }
      
      $(document).ready(function() {
          $('.select2').select2();
          GetNotification();
      });

      function GetNotification() {
        $.ajax({
            type: "POST",
            url: "{{ route('ApiNotification.member') }}",
            data: {
              '_token':"{{ Session::get('id_token_xmtrusr') }}"
            },
            success: function(Result) {
              $('#notification_count').html(Result[0].count);
              if (Result[0].count > 0) {
                push_notification(Result[0].count); 
              } 

              $('#NotificationData').html("");
              var NotificationData = $('#NotificationData');

              $.each(Result[0].data, function(k, v) {
                if (v.keterangan == "In Progres") {
                  var in_kata = 'Produk '+v.produk_notifikasi+' '+"sudah Terverifikasi"
                }else if (v.keterangan == "Pending"){
                  var in_kata = 'silahkan upload pembayaran untuk produk ' + v.produk_notifikasi
                }else if (v.keterangan == "Rejected"){
                  var in_kata = 'Bukti pembayaran ' + v.produk_notifikasi+' Kamu tidak sesuai,silahkan upload kembali bukti pembayaran'
                }else{
                  var in_kata = v.produk_notifikasi+' '+v.keterangan
                }
                NotificationData.append("<a href='"+v.url+"'>\
                  <li>\
                    <p>\
                        "+in_kata+"\
                        <span class='timeline-icon'><i class='fa fa-bell' style='color:red'></i></span>\
                    </p>\
                  </li>\
                </a>")
              });
            }
        });         
      }   


      function push_notification(response) {
        if (!("Notification" in window)) {
          console.log("This browser does not support desktop notification");
        }
        else if (Notification.permission === "granted") {
          var options = {
                body: "kamu dapat "+response+" Pemberitahuan",
                icon: "{!! asset('public/assets/images/logoonly-100x100.png') !!}",
                dir : "ltr"
              };
          var notification = new Notification("Pemberitahuan PermataMall",options);
          notification.onclick = function(event) {
            event.preventDefault(); // prevent the browser from focusing the Notification's tab
            window.open("{{ env('APP_URL_NOTIFICATION') }}", '_blank');
          }
        }
        else if (Notification.permission !== 'denied') {
          Notification.requestPermission(function (permission) {
            if (!('permission' in Notification)) {
              Notification.permission = permission;
            }
         
            if (permission === "granted") {
              var options = {
                body: "kamu dapat "+response+" Pemberitahuan",
                icon: "{!! asset('public/assets/images/logoonly-100x100.png') !!}",
                dir : "ltr"
              };
              var notification = new Notification("Pemberitahuan PermataMall",options);
              notification.onclick = function(event) {
                event.preventDefault(); // prevent the browser from focusing the Notification's tab
                window.open("{{ env('APP_URL_NOTIFICATION') }}", '_blank');
              }
            }
          });
        }
      }      



      if ("WebSocket" in window) {         
         // Let us open a web socket
         var ws = new WebSocket("{{ env('APP_URL_SOCKET') }}");
         ws.onopen = function() {          
            // Web Socket is connected, send data using send()
            ws.send("Notification");
            ws.send("Transaction");
         };  
         
         ws.onmessage = function (evt) { 
            GetNotification();
            var received_msg = evt.data;
            console.log(received_msg);
         };
  
         // ws.onclose = function() {             
         //    // websocket is closed.
         //    alert("Connection is closed..."); 
         // };
      } else {
        console.log("Browser not support")
      }   

      
    </script>
    <!--Start of Tawk.to Script-->
    <script type="text/javascript">
      var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
      (function(){
        var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
        s1.async=true;
        s1.src='https://embed.tawk.to/5db2b51378ab74187a5b7af7/default';
        s1.charset='UTF-8';
        s1.setAttribute('crossorigin','*');
        s0.parentNode.insertBefore(s1,s0);
      })();
    </script>
    <!--End of Tawk.to Script-->
    @yield('script')
  </body>
</html>