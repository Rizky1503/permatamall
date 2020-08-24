@extends('layouts.FrontEnd')
@section('content')

<div class="container" style="padding-bottom: 80px; padding-top: 50px;">
  <div class="row">
    <div class="col-md-12">
      <div class="bs-example">
        <div class="accordion" id="accordionExample">
          <div class="card">
            <div class="card-header" id="headingOne" style="background-color: #3eb960;">
                <h2 class="mb-0" style="padding: 2px;">
                    <button type="button" class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" style="text-decoration: none; font-weight: bold; color: #fff">Informasi Produk</button>                  
                    <span style="float: right;">
                      <button type="button" class="btn btn-link" data-toggle="collapse" data-target="#collapseOne">
                        <i class="fa fa-minus" style="color: #fff"></i>
                      </button>                              
                    </span>
                </h2>
            </div>
            <div id="collapseOne" class="collapse in" aria-labelledby="headingOne" data-parent="#accordionExample" style="border:1px solid #fff; background-color: #fff; padding: 10px;">
                <div class="card-body">                            
                    <div style="padding: 10px 0px 10px 0px;border:1px solid #e4e3e3; padding: 1px 10px;background-color: #efefef;">
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
                          @foreach($produk as $key=>$produk)
                          <tr>
                            <td> <img width="60" src="http://3.bp.blogspot.com/-DRr13QVT13Q/VphgsIPGAoI/AAAAAAAAAMc/pJBWCh-9p8M/s1600/baie_server.jpg" alt=""/></td>
                            <td>{{$produk->relationProduk->nama_produk}}</td>
                            <td>{{$produk->qty}}</td>
                            <td>Rp. {{number_format($produk->harga,0,',','.')}}</td>
                            <td id="total_harga">Rp. {{number_format($produk->total_harga,0,',','.')}}</td>
                          </tr>
                          @endforeach
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
  </div>
  @if ($errors->any())
  <div class="alert alert-danger">
      <ul>
          @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
          @endforeach
      </ul>
  </div>
@endif
  <div class="row"> 
    
    <div class="col-md-8" style="display: none;">
      <div class="panel panel-default">
      <div class="panel-heading">Bukti pembayaran</div>
      <div class="panel-body">                
        <form method="post" action="{{ route('Belanja.store', [encrypt($id_invoice)]) }}" enctype="multipart/form-data">
          @csrf
          <input type="hidden" name="product_invoice" value="">
          <div class="form-group">
            <label for="email">Nama:</label>
            <input type="text" class="form-control" id="nama" name="nama" value="{{ old('nama') }}">
        </div>
          <div class="form-group">
            <label for="email">Nama Bank:</label>
            <input type="text" class="form-control" id="bank" name="nama_bank" value="{{ old('nama_bank') }}">
        </div>
          <div class="form-group">
            <label for="email">Upload bukti Pembayaran:</label>
            <input type="file" class="form-control" id="image-file-payment" name="upload">
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-primary" style="float: right;">Konfirmasi Pembayaran</button>
        </div>
        </form>
      </div>
      </div>
    </div>

    <div class="col-md-4">
      <div class="panel panel-default">
      <div class="panel-body Transaksi">
        <span style="color: #bbbaba">Total yang harus di bayar</span>
        <br>
        <span style="color: #000; font-weight: bold; font-size: 20px;"> <p style="color:red">Rp. {{ number_format($harga_produk,0,',','.') }} + Rp. {{ number_format($ongkir,0,',','.') }}(Ongkos Kirim) </p> </span>
        <span style="color: #000; font-weight: bold; font-size: 20px;">Rp. {{ number_format($harga,0,',','.') }}</span>
        <br>
        <hr>
        <span style="color: #bbbaba">Metode Pembayaran</span>
        
      </div>
      </div>
    </div>

    <div class="col-md-4" style="position: relative;bottom: 21px;">
      <div class="accordion" id="accordionExample1">
        <div class="card">
          <div class="card-header" id="headingOne" style="background-color: #3eb960;">
              <h2 class="mb-0" style="padding: 2px;border: 1px solid #efefef;">
                  <button type="button" class="btn btn-link" data-toggle="collapse" data-target="#collapseOne1" style="text-decoration: none; color: #fff">Manual Pembayaran</button>                  
                  <span style="float: right;">
                    <button type="button" class="btn btn-link" data-toggle="collapse" data-target="#collapseOne1">
                      <i class="fa fa-chevron-down" style="color: #fff"></i>
                    </button>                              
                  </span>
              </h2>
          </div>
          <div id="collapseOne1" class="collapse in" aria-labelledby="headingOne" data-parent="#accordionExample1" style="border:1px solid #efefef; background-color: #fff; padding: 10px;">
              <div class="card-body" style="display: grid;">
<!--                  <h3>Manual</h3>       
-->                @foreach ($manual as $key => $value)
                   <label><input type="radio" name="payment_method" value="{{ $value->id_payment }}"><img src="{{ $value->breadchumb }}" style="width: 100px;"><label style="float: right;">Rp. {{ number_format(120000, 0, ',', '.') }}</label><hr></label>
                @endforeach                     
              </div>
            <input type="button" class="btn btn-success" value="CheckOut">
          </div>
        </div>                
      </div>        
    </div>

    <div class="col-md-4" style="position: relative;bottom: 21px;">
      <div class="accordion1" id="accordionExample1">
        <div class="card">
          <div class="card-header" id="headingOne" style="background-color: #3eb960;">
              <h2 class="mb-0" style="padding: 2px;">
                  <button type="button" class="btn btn-link" data-toggle="collapse" data-target="#collapseOne1" style="text-decoration: none; color: #fff" >Online Pembayaran</button>                  
                  <span style="float: right;">
                    <button type="button" class="btn btn-link" data-toggle="collapse" data-target="#collapseOne1">
                      <i class="fa fa-chevron-down" style="color: #fff"></i>
                    </button>                              
                  </span>
              </h2>
          </div>
          <div id="collapseOne1" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample1" style="border:1px solid #efefef; background-color: #fff; padding: 10px;">
              <div class="card-body" style="display: grid;">
              @foreach ($online as $key => $value)
                <?php if($value->nama_bank == 'Gopay'){
                      $harga = 120000;
                      $cost = $harga * $value->cost / 100;
                      $final = $harga + $cost;
                    }else{
                      $harga = 120000;
                      $final = $harga + $value->cost;
                    }
                 ?> 
                   <label><input type="radio" onclick="onlinepayment(this.value)" name="payment_method" value="{{ $value->channel_payment }}"><img src="{{ $value->breadchumb }}" style="width: 100px;"><label style="float: right;">Rp. {{ number_format($final, 0, ',', '.') }}</label><hr></label>
                @endforeach  
              </div>
          </div>
        </div>                
      </div>
    </div>  

  </div>
</div>  

@endsection
@section('script')
@include('sweet::alert')



<script type="text/javascript">
  $('#image-file-payment').bind('change', function() {
    fileValidation(this.id);
    var mb = this.files[0].size / 1024 / 1024;
    if (mb > 3) {
      swal({
        title: "Error!",
        text: "Foto yang kamu upload "+ mb.toFixed(2)+" MB, maksimal upload yang di izinkan 1 MB",
        icon: "error",
      });
          this.value = "";
    }   
  });


  function fileValidation(response){
      var fileInput = document.getElementById(response);
      var filePath = fileInput.value;
      var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;
      if(!allowedExtensions.exec(filePath)){
        swal({
        title: "Error!",
        text: "File yang di ijinkan hanya format .jpeg .jpg dan .png",
        icon: "error",
      });
          fileInput.value = '';
          return false;
      }
  }
</script>
