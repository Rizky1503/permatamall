@extends('examppermata::layouts.master2')

@section('content')

@include('examppermata::layouts.header')


<div class="container" style="padding-bottom: 80px; padding-top: 50px;" id="seach_page">          
	<div class="row">
		<div class="col-md-4">
      <span style="font-size: 18px;font-weight: bold;" id="ditampilkan"></span>
      
      <div class="panel panel-default">
        <div class="panel-body" style="border-bottom: 1px solid #f5f5f5; padding: 15px 15px 1px 15px; background-color: #e0f9e0;">       
          <div class="form-group" style="margin-bottom: 2px;">
            <label for="email">Hi, </label> <span>{{ $nama_user ?? '' }} </span>
          </div>
          <div class="form-group" style="margin-bottom: 2px;">
            <div class="col-md-6">
              <img class=" img-fluid" src="{!! asset('public/images/bimbel-gratis/'.$data->paket->image) !!}" alt="card image" style="width: 90%;">
            </div>
            <div class="col-md-6">
                <p style="margin-top: 47px; font-weight: bold;">{{ $data->Data->kelas }}</p>
            </div>
            <center>
              @if($data->Data->id_package_user == 1 or $data->Data->id_package_user == 2 or $data->Data->id_package_user == 3 or $data->Data->id_package_user == 4)
                <label style="color: red">Berakhir Pada : <span>{{ \Carbon\Carbon::parse(Session::get('$data->Data->expired_bimbel_online'))->format('d F Y') }}</span></label>
              @else

              @endif
            </center>
          </div>
        </div>
      </div>
      
      <center style="padding-bottom: 10px;">
        <img class=" img-fluid" src="{!! asset('public/images/bimbel_berbayar_icon/'.$images_jenis) !!}" alt="card image" style="width: 13%; ">
        <span>KURIKULLUM 2013</span>
        <span> - {{$jenis}}</span>
        @if($data->Data->kondisi == '11' || $data->Data->kondisi == '10')
        <span> - {{$data->Data->kondisi}}</span>
        @else
        <span> </span>
        @endif
      </center>


      <div class="panel panel-default">
        <div class="panel-body" style="border-bottom: 1px solid #f5f5f5; padding: 15px 15px 1px 15px; background-color: #e0f9e0;">
          <div class="form-group">
            @foreach($matpel as $key => $value)
            <div class="col-md-12">
              <a href="{{ route('ExampPermata.after_matpel',encrypt([$data->Data->id_order,$data->Data->id_package_user,$tahun,$jenis,$value->nama_matpel]))}} ">
              <img class=" img-fluid" src="{!! asset('public/images/bimbel_berbayar_icon/'.$value->images) !!}" alt="card image" style="width: 20%;">
              <span style="font-size: 17px;">{{$value->nama_matpel}}</span>
              </a>
            </div>
            @endforeach
          </div> 
        </div>  
      </div>
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

      <div class="row" style="margin-top: 10px; display: contents;" >
        <span style="font-size: 18px;font-weight: bold;">Petunjuk Penggunaan Latihan</span>
        <div class="col-md-12">    
          <div class="panel panel-default" style="background-color: #e0f9e0;">
            <div class="panel-body" style="padding: 8px; text-align: left;">       
              @foreach($penggunaan as $key => $value)
                <p>{{$value->title}}</p>
              @endforeach
            </div>
          </div>          
        </div> 



      </div>

		</div>
	</div>
</div>

<a href="https://api.whatsapp.com/send?phone=62811811306&text=*Pengaduan dari {{ $nama_user }}*" target="_blank"> 
  <img src="http://iaifi-ips.org/public/images/whatsapp-opt.png" class="wabutton" alt="WhatsApp-Button">
</a> 
@endsection
@section('script')

<style>
.ps-main{
  background: #f5fbf5;
}
  
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

