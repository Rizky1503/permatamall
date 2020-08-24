
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
  @include('include.FrontEnd.side-header') 
  <main class="ps-main" style="background: #f5f5f5">
  	<div class="container" style="padding-bottom: 80px; padding-top: 50px;">
        <div class="row">
          @if (session('success'))
            <div class="col-md-12">
              <div class="alert alert-success">
                {{ session('success') }}
              </div>
            </div>
          @endif
        </div>
    		<div class="row"> 
    			<div class="col-md-6">
    				<div class="panel panel-default">
			  	    <div class="panel-body">					  
                <center>
                  <span style="font-size: 20px; font-weight: bold;">Jadwal Belajar Les Privat</span>
                  <hr>
                </center>	
                <p style="color: #000; font-weight: bold;">Profil Siswa</p>
                <p>Nama : {{ $profile->nama }}</p>
                <p>No Telpon : {{ $profile->no_telpon }}</p>
                <p>Alamat : {{ $profile->alamat }}</p>
                <hr>
                <div>
                  <p style="color: #000; font-weight: bold;">Profil Guru</p>
                  <p>Nama : {{ $guru->nama }}</p>
                  <p>No Telpon : {{ $guru->no_telpon }}</p>
                </div>            
                @if(!empty($guru->foto))
                  <img src="{{ ENV('APP_URL_API_RESOURCE').'images/document/mitra/'.$guru->id_mitra.'/'.$guru->foto }}" style="max-width: 100px;border-radius: 3%;">
                @endif                
			  	    </div>
    			  </div>      			
    			</div>
          <div class="col-md-6">
            <div class="panel panel-default">
              <div class="panel-heading">Jadwal Pertemuan Les Privat</div>
              <div class="panel-body">                
                <div class="table-responsive">
                  <table class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th>Pertemuan Ke</th>
                        <th>Status</th>
                      </tr>
                    </thead>
                    <tbody>
                      @if(empty($List) AND empty($JadwalLast))
                        <tr>
                          <td align="center" colspan="2">Daftar Belum Tersedia</td>
                        </tr>
                      @else
                        @foreach($JadwalLast as $key => $JadwalLastAll)
                        <tr>
                          <td>{{ $JadwalLastAll->pertemuan_ke }}</td>
                          <td>
                            @if($JadwalLastAll->status == "Hadir")
                            Guru Hadir tanggal {{ \Carbon\Carbon::parse($JadwalLastAll->tanggal)->format('d F Y H:i:s') }}
                            @else
                            Guru Tidak hadir tanggal {{ \Carbon\Carbon::parse($JadwalLastAll->tanggal)->format('d F Y H:i:s') }}
                            @endif
                          </td>
                        </tr>
                        @endforeach
                        @foreach($List as $key => $ListAll)
                        <tr>
                          <td>{{ $ListAll->pertemuan_ke }}</td>
                          <td>                          
                            @if($ListAll->pertemuan_ke % 4 == "0")
                              @if($JadwalLastConfirm != 1)
                                <a href="{{ route('Jadwal.absen_review',[encrypt($ListAll->id_pertemuan), base64_encode('Hadir')]) }}" class="btn btn-primary">Absen Hadir</a>
                                <a href="{{ route('Jadwal.absen_review',[encrypt($ListAll->id_pertemuan), base64_encode('Tidak')]) }}" class="btn btn-warning">Tidak Hadir</a>
                              @else
                                <a href="#tidak_button" data-id="{{ $ListAll->id_pertemuan }}" class="btn btn-primary">Absen Hadir terakhir</a>
                              @endif
                            @else 
                              @if($JadwalLastConfirm != 1)
                                <a href="{{ route('Jadwal.absen',[encrypt($ListAll->id_pertemuan), base64_encode('Hadir')]) }}" class="btn btn-primary">Absen Hadir</a>
                                <a href="{{ route('Jadwal.absen',[encrypt($ListAll->id_pertemuan), base64_encode('Tidak')]) }}" class="btn btn-warning">Tidak Hadir</a>
                              @else
                                <a href="#tidak_button" data-id="{{ $ListAll->id_pertemuan }}" class="btn btn-primary">Absen Hadir terakhir</a>
                              @endif                            
                            @endif                            
                          </td>
                        </tr>
                        @endforeach
                      @endif  
                    </tbody>
                  </table>
                </div>
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
          	</div>
        	</div>
      </div>

      <div id="tidak_button" class="modal">
        <input type="hidden" name="_token_close" id="_token_close">
        <p>
          Selamat, jadwal les privat kamu telah selesai, terimakasih telah mempercayai platform <a href="https://permatamall.com">Permatamall.com </a> sebagai media les privat kamu,sampai ketemu di les privat lainnya.
        </p>
        <p>
          Beri kami ulasan tentang platform <a href="https://permatamall.com">Permatamall.com </a>
        </p>
        <p>
          <label>
            <input type="radio" name="review_close" value="Sangat_Puas" onclick="functionSumbitFinish(this.value)">
            <img src="{!! asset('public/assets/images/icon/review/happy.png') !!}">
            <span class="text-review-happy-angry">Sangat Puas</span>
          </label>      
          <label>
            <input type="radio" name="review_close" value="Puas" onclick="functionSumbitFinish(this.value)">
            <img src="{!! asset('public/assets/images/icon/review/proud.png') !!}">
            <span class="text-review-proud-sad">&nbsp; Puas</span>        
          </label>      
          <label>
            <input type="radio" name="review_close" value="Sedang" onclick="functionSumbitFinish(this.value)">
            <img src="{!! asset('public/assets/images/icon/review/sad.png') !!}">
            <span class="text-review-proud-sad">Sedang</span>
          </label>      
          <label>
            <input type="radio" name="review_close" value="Tidak_Puas" onclick="functionSumbitFinish(this.value)">
            <img src="{!! asset('public/assets/images/icon/review/angry.png') !!}">
            <span class="text-review-happy-angry">Tidak Puas</span>        
          </label>      
        </p>          
        <br>
      </div>

  </main>
  <!-- JS Library-->
  <script type="text/javascript" src="{!! asset('public/assets/plugins/jquery/dist/jquery.min.js') !!}"></script>
  <script type="text/javascript" src="{!! asset('public/assets/plugins/bootstrap/dist/js/bootstrap.min.js') !!}"></script>
  <script src="{!! asset('public/assets/js/jquery.modal.min.js') !!}"></script>
  <script src="{!! asset('public/assets/js/sweetalert2.min.js') !!}"></script>
  <link rel="stylesheet" href="{!! asset('public/assets/css/jquery.modal.min.css') !!}" />
  <link rel="stylesheet" href="{!! asset('public/assets/css/sweetalert2.min.css') !!}" />
  @include('sweet::alert')
  <script type="text/javascript">
    $('a[href="#tidak_button"]').click(function(event) {
      event.preventDefault();
      $(this).modal({
        fadeDuration: 250
      });

      var data = $(this).data('id');
      $('#_token_close').val(data);
      $("input:radio").removeAttr("checked");
      $('#alasan_close').val("");
      $('#submit_close').attr('disabled','disabled'); 
    });

    function functionSumbitFinish(response) {
      Swal.fire({
        onBeforeOpen: () => {
          Swal.showLoading()
          timerInterval = setInterval(() => {
          Swal.getContent().querySelector('strong')
            .textContent = Swal.getTimerLeft()
          }, 100)
        },
        title: 'Sedang proses',
        text: 'mohon menunggu proses sedang berjalan, jangan refresh halaman maupun tutup brower',
        showConfirmButton: false,
      
      })      
      var data = $('#_token_close').val();
      $.ajax({
          type: "POST",
          url: "{{ route('Jadwal.nilai') }}",
          data: {
              data:data,
              status:response
          },
          success: function(data) {
            Swal.fire({
                position: 'center',
                type: 'success',
                title: 'Terima Kasih',
                text: 'terima kasih atas penilaian kamu',
                showConfirmButton: true,
                timer: 15000
            }).then(function() {
                window.location = "{{ route('Transaction.index') }}";
            });
          }
      });
    }
  </script>
  <style type="text/css">
    label {
      padding: 0px 20px 0px 20px;
    }
    .text-review-happy-angry{
      position: absolute;
      margin-left: -70px;
      margin-top: 60px;
    }
    .text-review-proud-sad{
      position: absolute;
      margin-left: -55px;
      margin-top: 60px;
    }
    /* HIDE RADIO */
    [type=radio] { 
      position: absolute;
      opacity: 0;
      width: 0;
      height: 0;
    }

    /* IMAGE STYLES */
    [type=radio] + img {
      max-width: 60px;
      cursor: pointer;
    }

    /* CHECKED STYLES */
    [type=radio]:checked + img {
      background-color: #56c174;
      border-radius: 50px;
      padding: 4px;
    }

    .modal{
      overflow: visible;
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
</body>
</html>