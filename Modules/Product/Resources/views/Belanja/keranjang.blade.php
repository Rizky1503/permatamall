@extends('layouts.FrontEnd')
@section('content')
<?php $sum = 0;?>
<div class="container">
  <br><div class="col-md-12">
    <div class="row">
      @foreach ($mitra as $key=>$mitra)
        <div class="col-md-12">
          <div class="bs-example">
            <div class="accordion" id="accordionExample">
              <div class="card">
                <div class="card-header" id="headingOne" style="background-color: #3eb960;">
                    <h2 class="mb-0" style="padding: 2px;">
                        <button type="button" class="btn btn-link" data-toggle="collapse" data-target="#collapseOne{{$key}}" style="text-decoration: none; font-weight: bold; color: #fff">{{$mitra->nama}} Store</button>                  
                        <span style="float: right;">
                          <button type="button" class="btn btn-link" data-toggle="collapse" data-target="#collapseOne{{$key}}">
                            <i class="fa fa-minus" style="color: #fff"></i>
                          </button>                              
                        </span>
                    </h2>
                </div>
                <div id="collapseOne{{$key}}" class="collapse in" aria-labelledby="headingOne" data-parent="#accordionExample" style="border:1px solid #fff; background-color: #fff; padding: 10px;">
                    <div class="card-body">                            
                        <div style="padding: 10px 0px 10px 0px;border:1px solid #f6f6f6; padding: 1px 10px;background-color: #efefef;">
                          <table class="table">
                            <thead>
                              <tr>
                                <th>Gambar</th>
                                <th>Nama</th>
                                <th>Qty</th>
                                <th>Harga</th>
                                <th>Total</th>
                              </tr>
                            </thead>
                           <tbody>
                            <?php  $Produk = ENV('APP_URL_API').'frontend/belanja/list_keranjang/'.$id.'/'.$mitra->id_mitra;
                                   $produk = json_decode(file_get_contents($Produk)); 
                            ?>
                            @foreach($produk as $key=>$produk)
                            <?php $sum += $produk->total_harga ?> 
                              <tr>
                                <td> <img width="60" src="http://3.bp.blogspot.com/-DRr13QVT13Q/VphgsIPGAoI/AAAAAAAAAMc/pJBWCh-9p8M/s1600/baie_server.jpg" alt=""/></td>
                                <td>{{$produk->relationProduk->nama_produk}}
                                    @if ($produk->status_stock == 'Menunggu')
                                    <p style="color: red; font-size: 11px;">Menunggu Konfirmasi Mitra</p>
                                    @elseif ($produk->status_stock == 'Kurang')
                                    <p style="color: #ff8d00; font-size: 11px;"> {{$produk->stok_tersedia}} Sisa Stock Tersedia </p>
                                     @elseif ($produk->status_stock == 'Tersedia')
                                    <p style="color: green; font-size: 11px;">Tersedia</p>
                                    @else
                                    <p style="color: red; font-size: 11px;">Stock Kosong</p>
                                    @endif
                                </td>
                                <td>
                                  <div class="input-append">
                                    <input class="span1 form-control" name="qty[{{$key}}]" data-id="{{$produk->id_produk}}" data-harga="{{$produk->harga}}" style="max-width:68px;height: 34px;"  size="16" type="text" value="{{$produk->qty}}" min="1" max="{{$produk->relationProduk->stok}}" onchange="updatestockinput(this.value, this)">
                                    <button class="btn btn-danger" onclick="konfirm(this.value)" value="{{$produk->id_produk}}" type="button"><i class="icon-remove icon-white"></i></button>
                                  </div>
                                </td>
                                <td>Rp. {{number_format($produk->harga,0,',','.')}}</td>
                                <td id="total_harga">Rp. {{number_format($produk->total_harga,0,',','.')}}</td>
                              </tr>  
                               @endforeach
                              <tr>
                                <td colspan="3" style="text-align:right">Total Bayar: </td>
                                <td> Rp. {{number_format($sum,0,',','.')}} </td>
                                <td><button class="btn btn-success" onclick="functionGetProccessConfirm()">Bayar</button></td>
                              </tr> 
                            </tbody>
                          </table>
                        </div>
                    </div>
                </div>
              </div>                
            </div>
          </div>
          <br>
        </div>

        <div id="modal_proses_data" class="modal" style="margin-top: 60px;">
           <form method="get" action="{{ route('Belanja.pembayaran',[$mitra->id_mitra]) }}"> @csrf
           <div class="col-md-12">
            <div class="row">
              <div class = "col-md-12 form-group">
                  <label for="">Alamat Sebagai :</label>
                  <input type="text" name="alamat_sebagai" class="form-control" required="required" placeholder="Rumah/Kantor">
              </div>
              <div class = "col-md-12 form-group">
                    <label for="">Nama Penerima :</label>
                    <input type="text" name="nama_penerima" class="form-control" required="required" placeholder="Jenifer Loves">
                </div>
                <div class = "col-md-12 form-group">
                    <label for="">Nomer Telepon :</label>
                    <input type="text" name="no_telpon" class="form-control" required="required" placeholder="0822xxxxx">
                </div>
                <div class = "col-md-12 form-group">
                    <label for="">Provinsi :</label>
                    <select class="form-control " id="provinsi" name="provinsi" onchange="functionkota(this.value)" required="required">
                      <option value="" >Pilih</option>
                      @foreach ($provinsi->results as $value)
                      <option value="{{ $value->province_id  }} & {{ $value->province }} " >{{ $value->province }}</option>
                      @endforeach
                    </select>
                </div>
                <div class = "col-md-12 form-group" style="margin-left: 3px;">
                    <label for="">Kota :</label>
                    <select class="form-control" id="kota_" name="kota" onchange="functiongetkota(this.value)" >
                      <option value="">Pilih</option>
                    </select>
                </div>
                <div class = 'col-md-12 form-group'>
                  <label for="kurir">Kurir</label>
                  <select class="form-control" id="kurir" name="kurir" onchange="functioncost(this.value)" >
                    <option value="">Pilih</option>
                    <option value="jne">JNE</option>
                    <option value="tiki">TIKI</option>
                    <option value="pos">POS</option>
                    <option value="pcp">PCP</option>
                    <option value="rpx">RPX</option>
                    <option value="esl">ESL</option>
                  </select>  
                </div>
                <div class = "col-md-12 form-group">
                    <label for="">Paket :</label>
                    <select class="form-control" id="getcost" name="paket" onchange="functionpaket(this.value)"> 
                      <option value="">Pilih</option>
                    </select>
                </div>
                <div class = "col-md-12 form-group">
                    <label for="">Alamat Pengiriman :</label>
                    <textarea class="form-control" name="alamat_pengiriman" id="exampleFormControlTextarea1" rows="3" placeholder="Jalan Cipayung no.5 RT05/09 desa megamendung "></textarea>
                </div>
                 <input type="hidden" name="amount" value="{{$sum}}">
                 <input type="hidden" name="id_mitra" value="{{$mitra->id_mitra}}">
                 <input type="hidden" name="ongkir" value="" id="ongkir">
                 <input type="hidden" name="jenis_pengiriman" value="" id="jenis_pengiriman">
                 <input type="hidden" name="nama_kota" value="" id="nama_kota">
                 <input type="hidden" name="id_kota" value="" id="id_kota">
                 <input type="hidden" name="nama_prov" value="" id="nama_prov">
            </div>
           </div>
            <p style="float: right;">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Konfirmasi</button>
            </p>
        </div>
         <?php $sum = 0; ?> 
       @endforeach 
    </div><br> 
  </div>
</div>





@endsection
@section('script')

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
@include('sweet::alert')

<style type="text/css">

</style>

<!-- Bootstrap style --> 
  <link rel="stylesheet" href="{!! asset('public/assets\themes/css/base.css') !!}">
<!-- Bootstrap style responsive --> 
  <link rel="stylesheet" href="{!! asset('public\assets\themes/css/bootstrap-responsive.min.css') !!}">
  <link rel="stylesheet" href="{!! asset('public\assets\themes/css/font-awesome.css') !!}">
  <link rel="stylesheet" href="{!! asset('public\assets\themes/switch/themeswitch.css') !!}">
<!-- Google-code-prettify --> 
  <link rel="stylesheet" href="{!! asset('public\assets\themes/js/google-code-prettify/prettify.css') !!}">

  <script src="{!! asset('public\assets\themes/js/google-code-prettify/prettify.js') !!}"></script> 
  <script src="{!! asset('public\assets\themes/js/bootshop.js') !!}"></script> 
  <script src="{!! asset('public\assets\themes/js/jquery.lightbox-0.5.js') !!}"></script> 

<script type="text/javascript">

  function functionGetProccessConfirm(){
      $('#modal_proses_data').modal({
        fadeDuration: 250
      });
  }

 
  function konfirm(value){
    swal({
      title: "Hapus Barang?",
      text: "Apa Kamu Akan Menghapus Barang Ini?",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
      $.ajax({
        type : "GET",
        url : '{{ route("Belanja.hapus_produk") }}',
        data : {
          id_produk : value
      },
        success: function(responses){
          console.log('berhasil');
        }
      });

      swal("Barang Kamu terhapus, Selamat Berbelanja", {
          icon: "success",
        });
      } else {
        
      }
    });
  }

  function getsecond(str){
    return str.split('&')[1];
  }

  function getfirst(str){
    return str.split('&')[0];
  }

  function functionpaket(value){
    var data = value;
    var ongkir = getsecond(data);
    var jenis_pengiriman = getfirst(data);
    
    $('#ongkir').val(ongkir);
    $('#jenis_pengiriman').val(jenis_pengiriman);

  }

  function functiongetkota(value){
    var data = value;
    var nama_kota = getsecond(data);
    var id_kota = getfirst(data);
    $('#nama_kota').val(nama_kota);
    $('#id_kota').val(id_kota);
  }

  function functionkota(value, responses){
    var data = value;
    $.ajax({
      type : "GET",
      url : '{{ route("Belanja.getkota") }}',
      data : {
        provinsi : getfirst(data)
      },
      success: function(responses){
        alert(responses);
        $('#kota_').html(responses);
      }
    });
    var nama_prov = getsecond(data);
    $('#nama_prov').val(nama_prov);

  }

  function functioncost(value, responses){
    $.ajax({
      type : "GET",
      url : '{{ route("Belanja.getcost") }}',
      data : {
        kurir : value,
        kota: $('#id_kota').val(),
      },
      success: function(responses){
        $('#getcost').html(responses);
      }
    });
  }

  function updatestock(value, responses){
     $('#minus').html(value);
     $.ajax({
        type: "GET",
        url: '{{ route("Belanja.updateqty") }}',
        data: {
            qty : value,
            id_produk : $(responses).data('id'),
            harga : $(responses).data('harga')
        },
        success: function(responses){
          var bilangan = responses;
            
          var number_string = bilangan.toString(),
            sisa  = number_string.length % 3,
            rupiah  = number_string.substr(0, sisa),
            ribuan  = number_string.substr(sisa).match(/\d{3}/g);
              
          if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
          }

          $('#total_harga').html("Rp. " + rupiah);
          }
    });
  }

  function updatestockplus(value, responses){
     $('#plus').html(value);
     $.ajax({
        type: "GET",
        url: '{{ route("Belanja.updateqty") }}',
        data: {
            qty : value,
            id_produk : $(responses).data('id'),
            harga : $(responses).data('harga')
        },
        success: function(responses){
          var bilangan = responses;
            
          var number_string = bilangan.toString(),
            sisa  = number_string.length % 3,
            rupiah  = number_string.substr(0, sisa),
            ribuan  = number_string.substr(sisa).match(/\d{3}/g);
              
          if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
          }

          $('#total_harga').html("Rp. " + rupiah);
          }
    });
  }

  function updatestockinput(value, responses){
     $.ajax({
        type: "GET",
        url: '{{ route("Belanja.updateqty") }}',
        data: {
            qty : value,
            id_produk : $(responses).data('id'),
            harga : $(responses).data('harga')
        },
        success: function(responses){
          var bilangan = responses;
            
          var number_string = bilangan.toString(),
            sisa  = number_string.length % 3,
            rupiah  = number_string.substr(0, sisa),
            ribuan  = number_string.substr(sisa).match(/\d{3}/g);
              
          if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
          }

          $('#total_harga').html("Rp. " + rupiah);
          }
    });
  }

  $("#qty").keyup(function() {
    var value = $(this).val();
      value = value.replace(/^(0*)/,"");
      $(this).val(value);

    activeFunction();
  });

  $("#qty").keypress(function (e) {
      var txt = String.fromCharCode(e.which);
      if (!txt.match(/[A-Za-z0-9&.]/)) {
          return false;
      }

      if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
            return false;
      }
  });

  $('.btn-number').click(function(e){
      e.preventDefault();
      
      fieldName = $(this).attr('data-field');
      type      = $(this).attr('data-type');
      var input = $("input[name='"+fieldName+"']");
      var currentVal = parseInt(input.val());
      if (!isNaN(currentVal)) {
          if(type == 'minus') {
              
              if(currentVal > input.attr('min')) {
                  input.val(currentVal - 1).change();
              } 
              if(parseInt(input.val()) == input.attr('min')) {
                  $(this).attr('disabled', true);
              }

          } else if(type == 'plus') {

              if(currentVal < input.attr('max')) {
                  input.val(currentVal + 1).change();
              }
              if(parseInt(input.val()) == input.attr('max')) {
                  $(this).attr('disabled', true);
              }

          }
      } else {
          input.val(0);
      }
  });
  $('.input-number').focusin(function(){
     $(this).data('oldValue', $(this).val());
  });
  $('.input-number').change(function() {
      
      minValue =  parseInt($(this).attr('min'));
      maxValue =  parseInt($(this).attr('max'));
      valueCurrent = parseInt($(this).val());
      
      name = $(this).attr('name');
      if(valueCurrent >= minValue) {
          $(".btn-number[data-type='minus'][data-field='"+name+"']").removeAttr('disabled')
      } else {
          alert('Sorry, the minimum value was reached');
          $(this).val($(this).data('oldValue'));
      }
      if(valueCurrent <= maxValue) {
          $(".btn-number[data-type='plus'][data-field='"+name+"']").removeAttr('disabled')
      } else {
          alert('Sorry, the maximum value was reached');
          $(this).val($(this).data('oldValue'));
      }
      
      
  });
  $(".input-number").keydown(function (e) {
          // Allow: backspace, delete, tab, escape, enter and .
          if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 190]) !== -1 ||
               // Allow: Ctrl+A
              (e.keyCode == 65 && e.ctrlKey === true) || 
               // Allow: home, end, left, right
              (e.keyCode >= 35 && e.keyCode <= 39)) {
                   // let it happen, don't do anything
                   return;
          }
          // Ensure that it is a number and stop the keypress
          if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
              e.preventDefault();
          }
      });
</script>

@endsection
