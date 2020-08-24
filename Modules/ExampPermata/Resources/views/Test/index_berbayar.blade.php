<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="format-detection" content="telephone=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <link href="http://localhost/permataMall-FrontEnd/public/assets/images/logoonly-100x100.png" rel="icon">
    <meta name="author" content="Nghia Minh Luong">
    <meta name="keywords" content="Default Description">
    <meta name="description" content="Default keyword">
    <title>PERMATAMALL | </title>
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
</head>
<body class="ps-loading loaded">
<span id="8756321" style="display: none;"></span>
<div class="home-page-widget-overlay" onclick="functionPostOverlay()" id="page_selain_cari_halaman"></div>
@include('include.FrontEnd.header')
@include('include.FrontEnd.side-header')
<main class="ps-main" style="background: #f5f5f5">
    <div class="container" style="padding-bottom: 80px; padding-top: 50px;">
        <div class="row">
            <div class="col-md-9">
                <div class="panel panel-default" style="min-height: 400px;">
                    <div class="panel-body" style="background: #3eb960;color: #fff;font-weight: bold;">
                        <div class="row">
                            <div class="header-profile-examp">
                                <div class="col-md-4 test-profile">{{ $Profile->nama ?? '' }}</div>
                                <div class="col-md-8 test-profile">
                                    {{ $Profile->kelas ?? '' }} -
                                    {{ str_replace('_', ' ', json_decode($Profile->keterangan)->jenis_paket) ?? '' }} - 
                                    {{ str_replace('_', ' ', json_decode($Profile->keterangan)->tahun_soal) ?? '' }} - 
                                    {{ str_replace('_', ' ', json_decode($Profile->keterangan)->_mata_pelajaran) ?? '' }}
                                </div>
                            </div>
                            <div class="header-profile-time-examp">
                                <!-- <div class="col-md-12 test-profile" id="waktu_process">00:00:00</div> -->
                            </div>                                                        
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div id="target-content"></div>                                
                        </div>
                        
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="panel panel-default" style="min-height: 407px;">
                    <div class="panel-body" style="background: #3eb960;color: #fff;font-weight: bold;">
                        <div class="row">
                            <div class="col-md-12 test-profile">Daftar Soal</div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <ul class='pagination text-center' id="pagination">
                            @foreach($Jumlahsoal as $key => $value)
                                <li id="{{ $value->id_soal_execute }}" data-id="{{ $key+1 }}" class="@if($value->jawaban_user != '') terjawab @else non_active @endif   @if($value->id_soal_execute == $soalSatu->id_soal_execute) active @endif">
                                    <a href="{{ route('ExampPermata.ETestLangganan.soal') }}?execute={{ $value->id_soal_execute }}" style="margin: 5px;border-radius: 4px;font-size: 16px;">{{ $key+1 }}</a>
                                </li>
                            @endforeach                                    
                        </ul>
                        <button class="btn btn-primary" onclick="functionFinish()">Selesai Sekarang</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="ps-footer bg--cover" data-background="http://localhost/permataMall-FrontEnd/public/assets/images/background/parallax.jpg">

    @include('include.FrontEnd.footer')
</main>
<!-- JS Library-->
<script type="text/javascript" src="{!! asset('public/assets/plugins/jquery/dist/jquery.min.js') !!}"></script>
<script type="text/javascript" src="{!! asset('public/assets/plugins/bootstrap/dist/js/bootstrap.min.js') !!}"></script>    
<script type="text/javascript" charset="utf8" src="{!! asset('public/assets/js/jquery-1.8.2.min.js') !!}"></script>
<script type="text/javascript" charset="utf8" src="{!! asset('public/assets/js/sweetalert.min.js') !!}"></script>
<script>
    document.addEventListener('contextmenu', event => event.preventDefault());
    jQuery(document).ready(function() {
        jQuery("#target-content").load("{{ route('ExampPermata.ETestLangganan.soal') }}?execute={{ $soalSatu->id_soal_execute }}&number=1");
        jQuery("#pagination li").live('click', function(e) {
            e.preventDefault();
            jQuery("#target-content").html("<div class='loader'></div>");
            jQuery("#pagination li").removeClass('active');
            jQuery(this).addClass('active');
            var pageNum     = this.id;
            var number      = $(this).attr("data-id");
            jQuery("#target-content").load("{{ route('ExampPermata.ETestLangganan.soal') }}?execute="+pageNum+"&number="+number);
        });
    });

    var upgradeTime = "{{ $Profile->waktu_test }}" * 60;
    var seconds = upgradeTime;
    function timer() {
      var days        = Math.floor(seconds/24/60/60);
      var hoursLeft   = Math.floor((seconds) - (days*86400));
      var hours       = Math.floor(hoursLeft/3600);
      var minutesLeft = Math.floor((hoursLeft) - (hours*3600));
      var minutes     = Math.floor(minutesLeft/60);
      var remainingSeconds = seconds % 60;
      function pad(n) {
        return (n < 10 ? "0" + n : n);
      }
      document.getElementById('waktu_process').innerHTML = pad(hours) + ":" + pad(minutes) + ":" + pad(remainingSeconds);

      var hgt_9433 = seconds / 60;
      document.getElementById('8756321').innerHTML = hgt_9433.toFixed(0);

      if (seconds == 0) {
        clearInterval(countdownTimer);
        document.getElementById('waktu_process').innerHTML = "Selesai";
        // $.ajax({
        //     type: "GET",
        //     url: '{{ route("ExampPermata.ETestLangganan.finish") }}',
        //     data: {
        //         id:"{{ encrypt($Profile->id_examp) }}",
        //     },
        //     success: function(responses){
        //         var obj = JSON.parse(responses);
        //         swal({
        //           title: "Waktu Habis",
        //           text: "Waktu kamu habis,soal otomatis di selesaikan,kamu menyelesaikan tes dengan Total Benar "+obj.benar+" soal, Salah "+obj.salah+" soal, Tidak  dijawab "+obj.tidak_jawab+" soal",
        //           type: "success",
        //           confirmButtonText: "Keluar",
        //           buttons:"Keluar",
        //         }).then(function() {
        //             window.location.href = "{{ route('ExampPermataBimbelOnline.getStarted') }}";
        //         });
        //      }
        // });
      } else {
        seconds--;
      }
    }
    var countdownTimer = setInterval('timer()', 1000);

    function functionCheckbox() {
        if(document.getElementById('checkbox-data').checked) {
          $('#jawaban').show();
        } else {
          $('#jawaban').hide();
        }
    }

    function functionAnswer (response){
        var str     = response;
        var ans     = str.substr(4,1);
        var res     = str.substr(6, 10);
        $('.'+res).removeClass('active_answer');
        $('#'+response).addClass('active_answer');
        $('#'+res).addClass('terjawab');
        var gth_8756321 = $('#8756321').html();
        $.ajax({
            type: "POST",
            url: '{{ route("ExampPermata.ETestLangganan.answer") }}',
            data: {
                _token: "{{ csrf_token() }}",
                ans:ans,
                id:res,
                gth_8756321:gth_8756321
            },
            success: function(responses){
                var element = document.getElementById(responses);
                if(typeof(element) != 'undefined' && element != null){
                    jQuery("#target-content").html("<div class='loader'></div>");
                    $('#'+responses).addClass('active');
                    var number      = $('#'+responses).attr("data-id");
                    jQuery("#target-content").load("{{ route('ExampPermata.ETestLangganan.soal') }}?execute="+responses+"&number="+number);
                }         
             }
        });
    }


    function functionFinish(){

        swal({
          title: "Selesai",
          text: "Anda yakin mau selesai sekarang ? ",
          icon: "info",
          buttons: true,
          dangerMode: true,
        })
        .then((willDelete) => {
          if (willDelete) {
            $.ajax({
                type: "GET",
                url: '{{ route("ExampPermata.ETestLangganan.finish") }}',
                data: {
                    id:"{{ encrypt($Profile->id_examp) }}",
                },
                success: function(responses){
                    var obj = JSON.parse(responses);
                    swal({
                      title: "Selamat",
                      text: "Anda telah menyelesaikan test dengan Total Benar "+obj.benar+" soal, Salah "+obj.salah+" soal, Tidak  dijawab "+obj.tidak_jawab+" soal",
                      type: "success",
                      confirmButtonText: "Keluar",
                      buttons:"Keluar",
                    }).then(function() {
                        window.location.href = "{{ route('ExampPermataBimbelOnline.getStarted') }}";
                    });
                 }
            });                
          }
        });

    }

    setInterval(function(){
        var gth_8756321 = $('#8756321').html();
        $.ajax({
            type: "POST",
            url: "{{ route('ApiExampBerbayar.index') }}",
            data: {
                id_user:"{{ encrypt($Profile->id_examp) }}",
                method:gth_8756321
            } ,
            success: function(data) {
                console.log(data)
            }
        });        
    }, 60000);
</script>

<style>
    .loader {
        border: 16px solid #f3f3f3;
        border-radius: 50%;
        position: absolute;
        left: 35%;
        bottom: 30%;
        z-index: 1;
        border-top: 16px solid #3498db;
        width: 120px;
        height: 120px;
        -webkit-animation: spin 2s linear infinite;
        animation: spin 2s linear infinite;
    }

    .test-profile {
        font-weight: bold;
        font-size: 16px;
    }

    .jawaban {
        padding: 4px 10px 4px 10px;
        border: 2px solid #3eb960;
        border-radius: 5px;
        background: #fff;
        font-weight: bold;
        color: #3eb960;
    }

    .active_answer {
        background-color: #3eb960;
        color: #fff;
    }


    .option-pagin {
        float: right;
        margin-top: -40px;
    }

    hr {
        margin-top: 2px;
        margin-bottom: 7px;
    }

    .pilih_jawaban {
        font-size: 20px;
        font-weight: bold;
    }

    .style-jawaban {
        margin-top: 10px;
    }

    .pagination>.active>a, .pagination>.active>a:focus, .pagination>.active>a:hover, .pagination>.active>span, .pagination>.active>span:focus, .pagination>.active>span:hover {
        z-index: 3;
        cursor: default;
        color: #ffffff;
        background-color: #278642;
        border-color: #278642;

    }

    .pagination>.terjawab>a, .pagination>.terjawab>a:focus, .pagination>.terjawab>a:hover, .pagination>.terjawab>span, .pagination>.terjawab>span:focus, .pagination>.terjawab>span:hover {
        z-index: 3;
        cursor: default;
        cursor: pointer;
        color: #ffffff;
        background-color: #3eb960;
        border-color: #3eb960;
    }

    .pagination>li:first-child>a, .pagination>li:first-child>span {
        border-radius: 4px;
        border-top-left-radius: 0px; 
        border-bottom-left-radius: 0px; 
    }

    .pagination>li:last-child>a, .pagination>li:last-child>span {
        border-top-left-radius: 0px; 
        border-bottom-left-radius: 0px; 
        border-radius: 4px;

    }

    .pagination>li:last-child>a, .pagination>li:last-child>span {
        border-top-right-radius: 0px;
        border-bottom-right-radius: 0px;
        border-radius: 4px;
    }

    .pagination>.terjawab>a, .pagination>.terjawab>a:focus, .pagination>.terjawab>a:hover, .pagination>.terjawab>span, .pagination>.terjawab>span:focus, .pagination>.terjawab>span:hover {
        border-radius: 4px;
    }

    .pagination>li>a, .pagination>li>span {
        padding: 5px 10px;
    }

    .pagination>li>a, .pagination>li>span {
         line-height: 1.1; 
        color: #3eb960;
        background-color: #fff;
        border: 2px solid #3eb960;
    }

    .pagination>li>a:focus, .pagination>li>a:hover, .pagination>li>span:focus, .pagination>li>span:hover {
        z-index: 2;
        color: #ffffff;
        background-color: #278642;
        border-color: #278642;
    }

    .header-profile-examp{
        width: 80%;
        float: left;
    }

    .header-profile-time-examp{
        width: 20%;
        float: left;        
    }

    /* The container */
    .container-checked {
      display: block;
      position: relative;
      padding-left: 25px;
      margin-bottom: 12px;
      cursor: pointer;
      -webkit-user-select: none;
      -moz-user-select: none;
      -ms-user-select: none;
      user-select: none;
    }

    /* Hide the browser's default checkbox */
    .container-checked input {
      position: absolute;
      opacity: 0;
      cursor: pointer;
      height: 0;
      width: 0;
    }

    /* Create a custom checkbox */
    .checkmark {
      position: absolute;
      top: 3px;
      border-radius: 3px;
      left: 0;
      height: 15px;
      width: 15px;
      background-color: #eee;
    }

    /* On mouse-over, add a grey background color */
    .container-checked:hover input ~ .checkmark {
      background-color: #ccc;
    }

    /* When the checkbox is checked, add a blue background */
    .container-checked input:checked ~ .checkmark {
      background-color: #56c174;
    }

    /* Create the checkmark/indicator (hidden when not checked) */
    .checkmark:after {
      content: "";
      position: absolute;
      display: none;
    }

    /* Show the checkmark when checked */
    .container-checked input:checked ~ .checkmark:after {
      display: block;
    }

    /* Style the checkmark/indicator */
    .container-checked .checkmark:after {
      left: 4px;
      top: 1px;
      width: 5px;
      height: 10px;
      border: solid white;
      border-width: 0 2px 2px 0;
      -webkit-transform: rotate(45deg);
      -ms-transform: rotate(45deg);
      transform: rotate(45deg);
    }

    @media only screen and (max-width: 600px) {
        .option-pagin {
            float: left;
            margin-top: 20px;
        }
        .pilih_jawaban {
            line-height: 2;
        }

        .header-profile-examp{
            width: 50%;
            float: left;
        }

        .header-profile-time-examp{
            width: 30%;
            float: left;        
        }

        #waktu_process{
            font-size: 30px;
            margin-top: 10px;
        }
    }
    </style>
</body>

</html>