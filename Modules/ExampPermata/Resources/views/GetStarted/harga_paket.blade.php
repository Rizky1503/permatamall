@extends('examppermata::layouts.master2')

@section('content')

<div style="background-image: url('https://png.pngtree.com/thumb_back/fw800/background/20190220/ourmid/pngtree-simple-summer-summer-training-image_4721.jpg'); height: auto; background-size: cover;">
  <div class="container" style="padding-bottom: 80px; padding-top: 10px;">          
    <div class="row">
      <div class="col-md-12" style="padding: 28px;">
        <div class="row">
          <div class="col-md-12">
            <center><img src="{!! asset('public/images/bimbel_berbayar_icon/banner-di-pembayaran.png') !!}" style="width: 43%;     padding-bottom: 26px;"></center>
          </div>
          <div class="col-md-7">
            <center><h1 style="color: white;">Selamat Datang Di Permata Bimbel Online :</h1></center><br>
            <div style="color: white;">
            <p style="color: white; font-size: 18px; font-family: cambria;">Hallo sobat PermataMall, terimakasih sudah berkunjung ke marketplace bimbel online Permata Bimbel.
            <p style="color: white; font-size: 18px; font-family: cambria;">Bimbel Online ini, dibuat untuk membantu para siswa/i meningkatkan<br />prestasi di sekolah dan persiapan ujian kenaikan kelas dan masuk perguruan tinggi.</p>
            <p style="color: white; font-size: 18px; font-family: cambria;">Para siswa/i bisa belajar dari soal-soal pilihan serta<br />pembahasannya, dan beberapa video tutorial belajar yang ada.</p>
            <p style="color: white; font-size: 18px; font-family: cambria;">PermataMall juga akan mengadakan secara periodik program belajar jarak jauh<br />lewat "video conference", kalau ada pertanyaan dapat menghubungi kami di support@permatamall.com dan di no WA <a href="https://wa.me/62811811306" style="color: #baff4c;">0811811306.</a></p>
            </div>
          </div>
          <div class="col-md-5">
            <div style="border: 1px solid transparent; border-radius: 12px; background-color: white; height: auto; width: 100%; padding: 20px;">
              <h1 style="font-family: Rubik !important; font-weight: 500 !important; color: #434856;">Pilih Paket </h1><hr>

              <div class="row">
                <div class="col-md-6">
                  <label>Tingkat</label>
                  <input class="form-control" style="border-radius: 20px;" type="text" disabled="disabled" name="" id="" value="{{ $data->nama_paket }}">
                </div>
                <div class="col-md-6">
                  <label>Lama Paket</label>
                  <form method="get" action="{{ route('ExampPermata.pay')}}">
                  <select class="form-control" id="duration" name="id_harga" required onchange="FunctionGetDetail(this.value)" style="border-radius: 20px;">

                    @if($duration[0]->duration == 0)
                      <option value="{{$duration[0]->id}}" selected="selected"> Gratis</option>
                    @else
                      @if($trial > 0)
                        <option selected="select">Pilih</option>
                        @foreach ($duration as $key => $value)
                          <option value="{{$value->id}}">{{$value->duration}} Bulan</option>
                        @endforeach
                      @else
                        <option value="{{$duration[0]->id}}" selected="selected">Trial Selama 2 Hari</option>
                      @endif
                    @endif
                    
                  </select>
                </div>
              </div><br>
             
              <div class="row">
                <div class="col-md-12">
                  <div style="border:1px solid #c1c1c1; height: auto; border-radius: 7px; padding:10px;"> 
                    @foreach ($description as $key => $value)  
                      <p class="berlaku">- {{$value}}</p>
                    @endforeach
                  </div>
                </div>
              </div><br>
              @if($duration[0]->duration == 0)
              @else
                @if($trial > 0)
                <div class="row">
                  <div class="col-md-12">
                    <div style="border:1px solid #c1c1c1; height: auto; border-radius: 7px; padding:10px;"> 
  <!--                     <p class="harga-paket">Harga Paket</p>
   -->                    <p class="harga-fix" id="harga-fix">Rp. 0</p>
                      @if($duration_button[0]->duration == 0)
                      <p class="berlaku"> Gratis Selama Promosi</p>
                      @else
                      <p class="berlaku" id="berlaku">Berlaku Selama - Bulan</p>
                      <p class="berlaku" style="font-size: 12px">Berlangganan Sekarang Untuk Mendapatkan Diskon 50%</p>
                      @endif
                    </div>
                  </div>
                </div><br>
                @endif
              @endif
              


              <div class="row">
                <div class="col-md-12">
                    <input type="hidden" name="id_paket" id="id_paket" value="{{$data->id_paket}}">
                    @if($duration_button[0]->duration == 0)
                      <button class="btn-langganan" id="btn-langganan">Masuk</button>
                    @else
                      @if($trial > 0)
                        <button class="btn-langganan" id="btn-langganan" style="display: none">Langganan Sekarang</button>
                      @else
                        <button class="btn-langganan" id="btn-langganan">Coba Sekarang</button>
                      @endif
                    @endif
                    </form>
                </div>
              </div>
            </div>
          </div>
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
  .harga-fix{
    margin: 0;
    font-size: 24px;
    font-weight: 500;
    color: #ed2643;
  }

  .harga-paket{
    font-size: 20px;
    font-weight: 500;
    margin-top: 0;
    color: #434856;
  }

  .btn-langganan{
    background-image: linear-gradient(to bottom,#108457,#11af70);
    padding: 5px 0 !important; -webkit-font-smoothing: antialiased;
    cursor: pointer;
    -moz-user-select: none;
    -webkit-user-select: none;
    -o-user-select: none;
    user-select: none;
    display: inline-block;
    font-weight: normal;
    text-align: center;
    text-decoration: none;
    -moz-transition: all .4s ease;
    -webkit-transition: all .4s ease;
    -o-transition: all .4s ease;
    background: rgb(248,152,37);
    border-radius: 6px;
    border-width: 0px;
    color: rgb(255,255,255);
    font-family: sans-serif;
    height: 44px;
    transition: all .4s ease;
    padding: 0;
    text-shadow: none;
    width: 404px;
    font-size: 24px;
    line-height: 1.5em;
    border-radius: 25px;
    background-image: linear-gradient(to bottom,#108457,#11af70);
    padding: 0 20px;
    line-height: 32px;
    font-size: 16px;
    font-weight: 600;
    box-shadow: 0 6px 20px 0 rgba(67, 72, 86, 0.15);
  }

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

function FunctionGetDetail(value){

  if (value == 'Pilih') {
    $('#btn-langganan').hide();
    $('#harga-fix').html("Rp."+" "+0);  
    $('#berlaku').html("Berlaku Selama - Bulan");
  }else{
    $('#btn-langganan').show();
  }
  $.ajax({
      type: "GET",
      url: '{{ route("ExampPermataBimbelOnline.get_detail_paket") }}',
      data: {
          id : value,
      },
      success: function(responses){
          console.log(responses)
          if (responses.detail_paket.duration == 0) {
            $('#harga-fix').html("Rp."+" "+responses.detail_paket.amount);  
            $('#berlaku').html("Berlaku Selama Promosi");
            $('#id_harga').html(value);
          }else{
            $('#harga-fix').html("Rp."+" "+responses.detail_paket.amount);  
            $('#berlaku').html("Berlaku Selama"+" "+ responses.detail_paket.duration +" Bulan");
            $('#id_harga').html(value);
          }
          
      }
  });
}

function proses(){
  $.ajax({
      type: "GET",
      url: '{{ route("ExampPermata.pay") }}',
      data: {
          id_paket : $('#id_paket').val(),
          id_harga : $('#id_harga').val(),
      },
      success: function(responses){
        
      }
  });
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