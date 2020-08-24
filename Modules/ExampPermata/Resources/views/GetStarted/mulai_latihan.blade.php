@extends('examppermata::layouts.master2')

@section('content')

<div style="background-image: url('{!! asset('public/images/sidebar/examp.png') !!}'); background-size: cover; text-align: center;font-size: 40px;font-weight: bold;color: #fff; padding-bottom: 80px; padding-top: 80px;">
    Permata Bimbel Online
</div>

<div class="container" style="padding-bottom: 80px; padding-top: 50px;" id="seach_page">          
	<div class="row">
		<div class="col-md-4">
			
		</div>
		<div class="col-md-8">
			<div class="row" style="margin-top: 10px; display:contents;" id="icon-samping-paket" >
			    <span style="font-size: 18px;font-weight: bold;">Paket Yang Anda Punya</span>
			    @include('examppermata::layouts.paket_member')
			</div>

			<div class="row" style="margin-top: 10px; display: contents;" id="icon-samping-feature">
			    <span style="font-size: 18px;font-weight: bold;">Fitur Permata Bimbel</span>
			    @include('examppermata::layouts.menu-berbayar')
		</div>
	</div>
</div>

<a href="https://api.whatsapp.com/send?phone=62811811306&text=*Pengaduan dari {{ $nama_user }}*" target="_blank"> 
  <img src="http://iaifi-ips.org/public/images/whatsapp-opt.png" class="wabutton" alt="WhatsApp-Button">
</a> 
@endsection
@section('script')

<style>
.wabutton{
  position:fixed;
  bottom:30px;
  right:20px;
  z-index:100;
  cursor: pointer;
  animation: bounce 2s infinite;
  -webkit-animation: bounce 2s infinite;
  -moz-animation: bounce 2s infinite;
  -o-animation: bounce 2s infinite;    
}
@-webkit-keyframes bounce {
  0%, 20%, 50%, 80%, 100% {-webkit-transform: translateY(0);} 
  40% {-webkit-transform: translateY(-30px);}
  60% {-webkit-transform: translateY(-15px);}
}
@-moz-keyframes bounce {
  0%, 20%, 50%, 80%, 100% {-moz-transform: translateY(0);}
  40% {-moz-transform: translateY(-30px);}
  60% {-moz-transform: translateY(-15px);}
}
@-o-keyframes bounce {
  0%, 20%, 50%, 80%, 100% {-o-transform: translateY(0);}
  40% {-o-transform: translateY(-30px);}
  60% {-o-transform: translateY(-15px);}
}
@keyframes  bounce {
  0%, 20%, 50%, 80%, 100% {transform: translateY(0);}
  40% {transform: translateY(-30px);}
  60% {transform: translateY(-15px);}
}
hr {
     margin-top: 0px; 
     margin-bottom: 0px; 
} 

.silabus_pembelajaran{
  background-color: #d35400; 
  padding: 10px; 
  width: 100%; 
  border-radius: 5px; 
  margin-bottom: 20px;
}
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
  
  .loader-process {
    border: 16px solid #f3f3f3;
    border-radius: 50%;
    position: absolute;
    left: 40%;
    bottom: 40%;
    z-index: 1;
    border-top: 16px solid #3498db;
    width: 120px;
    height: 120px;
    -webkit-animation: spin 2s linear infinite;
    animation: spin 2s linear infinite;
  }

  /* Safari */
  @-webkit-keyframes spin {
    0% { -webkit-transform: rotate(0deg); }
    100% { -webkit-transform: rotate(360deg); }
  }

  @keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
  }

  .fade-scale {
    transform: scale(0);
    opacity: 0;
    -webkit-transition: all .25s linear;
    -o-transition: all .25s linear;
    transition: all .25s linear;
  }

  .fade-scale.in {
    opacity: 1;
    transform: scale(1);
  }   

  .modal-content {
    border-radius: 3px;
  }

  .loading-body{
    opacity: 0.1;
  }

  .modal a.close-modal {
    display: none !important; 
  }

  .modal {
    overflow: visible;
  } 

</style>

<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="https://permatamall.com/public/assets/js/jquery.modal.min.js"></script>  
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>