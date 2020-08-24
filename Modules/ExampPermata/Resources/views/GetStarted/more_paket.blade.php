@extends('examppermata::layouts.master2')

@section('content')
<div style="background-image: url('{!! asset('public/images/sidebar/examp.png') !!}'); background-size: cover; text-align: center;font-size: 40px;font-weight: bold;color: #fff; padding-bottom: 80px; padding-top: 80px;">
    Paket {{ $data->nama_paket }} <br>
    <span style="color: yellow;">Kurikulum 2013</span>
</div>
<div class="container" style="padding-bottom: 80px; padding-top: 10px;">          
  <div class="row">
    <div class="col-md-3 col-lg-push-9">
      <img src="{{ ENV('APP_URL_API_RESOURCE').'images/paket/examp/'.$data->banner_paket }}" style="border-radius: 5px;margin-bottom: 20px">
      <div class="panel panel-default">
        <div class="panel-body" style="border-bottom: 1px solid #f5f5f5; padding: 15px; margin-top: -26px; margin-left: 21px;">   
          <br>
          <!-- <span style="font-size: 24px;">{{ \Carbon\Carbon::parse($check_paket->expired_bimbel_online ?? '')->format('d F Y') }}</span> -->

          @if(Session::get('id_token_xmtrusr'))
            @if(decrypt(Session::get('id_token_xmtrusr')) == "1PG201910021000000017" )
                    <a href="{{ route('ExampPermata.pay',[base64_encode($data->tingkat.','.$data->matpel.','.$data->amount.','.$data->jenis_paket)]) }}" class="btn btn-primary">Daftar Paket {{ $data->nama_paket }} </a>

                    <!-- <a onclick="ProsesSekarang()"  class="btn btn-primary">Berlangganan {{ $data->nama_paket }} </a> -->
                </div>
            @else
                @if ($check_paket->count == 0)
                  @if($data->amount == 0)
                    <p style="color: red;">*SELAMA MASA PROMOSI</p>
                      <a href="{{ route('ExampPermata.langganan',[base64_encode($data->tingkat.','.$data->matpel.','.$data->amount.','.$data->jenis_paket)]) }}" class="btn btn-primary">Masuk Paket {{ $data->nama_paket }}</a><br>                  
                    </div>
                  @else
                    <p style="color: red;">*SELAMA MASA PROMOSI</p>
                      <a href="{{ route('ExampPermata.pay',[base64_encode($data->tingkat.','.$data->matpel.','.$data->amount.','.$data->jenis_paket)]) }}" class="btn btn-primary">Daftar Paket {{ $data->nama_paket }}</a><br>
                    </div>
                  @endif                  
                @else
                  <p style="color: red;">*SELAMA MASA PROMOSI</p>
                    <a href="{{ route('ExampPermata.langganan',[base64_encode($data->tingkat.','.$data->matpel.','.$data->amount.','.$data->jenis_paket)]) }}" class="btn btn-primary">Masuk Paket {{ $data->nama_paket }}</a><br>                  
                  </div>                  
                @endif
            @endif
          @else
            @if ($check_paket == 0)
              <p style="color: red;">*SELAMA MASA PROMOSI</p>
              <a href="{{ route('ExampPermata.langganan',[base64_encode($data->tingkat.','.$data->matpel.','.$data->amount.','.$data->jenis_paket)]) }}" class="btn btn-primary">Masuk Paket {{ $data->nama_paket }}</a><br>
            </div>
            @else
                <p style="color: red;">*SELAMA MASA PROMOSI</p>
                <a href="{{ route('ExampPermata.pay',[base64_encode($data->tingkat.','.$data->matpel.','.$data->amount.','.$data->jenis_paket)]) }}" class="btn btn-primary">Daftar Paket {{ $data->nama_paket }}</a><br>
            </div>
            @endif
          @endif
       
      </div>      
    </div>
    <!--Sidebar-->
    <div class="col-md-9 col-lg-pull-3">
      <div class="panel panel-default">
        <div class="panel-body" style="border-bottom: 1px solid #f5f5f5; padding: 15px;">   
          {!! $data->description !!}
        </div>
      </div>
    </div>
  </div>  
</div>



@endsection
@section('script')

<link rel="stylesheet" href="https://permatamall.com/public/assets/css/jquery.modal.min.css" />
<script src="https://permatamall.com/public/assets/js/jquery.modal.min.js"></script>  

<style>
  .btn-order{
    position: absolute;
    bottom: 0;
    margin-left: -60px;
    margin-bottom: 20px;    
  }

  <style type="text/css">
    .section{
      padding: 30px 30px 30px 30px;
      width: 100%;  
      min-height: 300px;
      background: #fff;
      border-radius: 10px;
      overflow: hidden;
      box-shadow: 0 3px 20px 0px rgba(0, 0, 0, 0.1);
      -moz-box-shadow: 0 3px 20px 0px rgba(0, 0, 0, 0.1);
      -webkit-box-shadow: 0 3px 20px 0px rgba(0, 0, 0, 0.1);
      -o-box-shadow: 0 3px 20px 0px rgba(0, 0, 0, 0.1);
      -ms-box-shadow: 0 3px 20px 0px rgba(0, 0, 0, 0.1);
    }

    .section-first{
      width: 100%;  
      min-height: 300px;
      background: #fff;
      border-radius: 10px;
      overflow: hidden;
      box-shadow: 0 3px 20px 0px rgba(0, 0, 0, 0.1);
      -moz-box-shadow: 0 3px 20px 0px rgba(0, 0, 0, 0.1);
      -webkit-box-shadow: 0 3px 20px 0px rgba(0, 0, 0, 0.1);
      -o-box-shadow: 0 3px 20px 0px rgba(0, 0, 0, 0.1);
      -ms-box-shadow: 0 3px 20px 0px rgba(0, 0, 0, 0.1);
      margin-bottom: 20px;
    }

    .form-control{
      border: 1px solid #ddd;
      border-radius: 2px;
    }

    .select2-container--default .select2-selection--single {
      background-color: #fff;
      border: 1px solid #ddd;
      border-radius: 2px;
      padding: 3px;
      height: 33px;
    } 

    .input-group .form-control {
      position: relative;
      z-index: 1;
    }

    .modal {
        overflow: visible;
    }   

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

    .container-checked input {
        position: absolute;
        opacity: 0;
        cursor: pointer;
        height: 0;
        width: 0;
    }

    .container-checked:hover input ~ .checkmark {
        background-color: #ccc;
    }

    .checkmark {
        position: absolute;
        top: 3px;
        border-radius: 3px;
        left: 0;
        height: 15px;
        width: 15px;
        background-color: #eee;
    }

    .container-checked input:checked ~ .checkmark:after {
        display: block;
    }

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

    .checkmark:after {
        content: "";
        position: absolute;
        display: none;
    }

    .container-checked input:checked ~ .checkmark {
        background-color: #56c174;
    }

    form input {
    border: 0px solid #eee;
    border-radius: 2px;
    color: #777;
    outline: none;
    margin-top: 3px;
    font-size: inherit;
    display: block;
    padding: 8px;
    padding-left: 30px;
    width: 100%;
    -moz-box-sizing: border-box;
    -webkit-box-sizing: border-box;
    box-sizing: border-box;
} 
    

</style>

<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=AIzaSyB4bT35gnQoCL-6V4QbeLBKa0x-rsOYRCI"></script> 
<script type="text/javascript">

function ProsesSekarang(){  
  $('#loadMe').modal({
    fadeDuration: 250,
  });
}

function functionCheckbox(){
  var checkBox = document.getElementById("checkbox-data");
  var asal_sekolah = document.getElementById("asal_sekolah");
   
    if (checkBox.checked == true){
      asal_sekolah.style.display = "none";
    } else {
       asal_sekolah.style.display = "block";
    }
}

</script>
@endsection

<body onload="initialize()"> 


<!-- 
var geocoder = new google.maps.Geocoder();

  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(successFunction, errorFunction);
} 
//Get the latitude and the longitude;
function successFunction(position) {
    var lat = position.coords.latitude;
    var lng = position.coords.longitude;
    codeLatLng(lat, lng)
}

function errorFunction(){
    alert("Geocoder failed");
}

function initialize() {
  geocoder = new google.maps.Geocoder();
}

function codeLatLng(lat, lng) {

  var latlng = new google.maps.LatLng(lat, lng);
  geocoder.geocode({'latLng': latlng}, function(results, status) {
    if (status == google.maps.GeocoderStatus.OK) {
    console.log(results)
      if (results[1]) {
       //formatted address
       alert(results[0].formatted_address)
      //find country name
           for (var i=0; i<results[0].address_components.length; i++) {
          for (var b=0;b<results[0].address_components[i].types.length;b++) {

          //there are different types that might hold a city admin_area_lvl_1 usually does in come cases looking for sublocality type will be more appropriate
              if (results[0].address_components[i].types[b] == "administrative_area_level_1") {
                  //this is the object you are looking for
                  city= results[0].address_components[i];
                  break;
              }
          }
      }
      //city data
      alert(city.short_name + " " + city.long_name)


      } else {
        alert("No results found");
      }
    } else {
      alert("Geocoder failed due to: " + status);
    }
  });
}   -->