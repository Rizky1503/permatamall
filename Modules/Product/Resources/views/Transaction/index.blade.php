@extends('layouts.FrontEnd')

@section('content')
<div style="width: 100%; height: 200px; background-image: url('{!! asset('public/images/sidebar/banner_examp.png ') !!}');">
    <div class="container">
      <p style="font-size: 24px;color: #209841;font-weight: 600;margin-top: 40px;">
        Semua Transaksi
      </p>
    </div>
</div>
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="permata-search-transaction">
        <div class="row">
          @if(empty($List))
            <center>
              <h2 style="font-weight: bold;color: #3eb960;">Belum Ada Transaksi</h2>
              <img src="{!! asset('public/assets/images/icon/empty-cart-icon.jpg') !!}">
              <p>
                <br>
                <a href="{{ route('FrontEnd.index') }}" class="btn btn-primary">Cari Barang Sekarang</a>
              </p>
            </center>
          @else
            @foreach($List as $ListAll)
              @if($ListAll->product == "Private")
                <div class="col-md-12" style="border: 1px solid #e4e4e4;padding: 10px; margin-top: 10px">
                  <div class="row">
                    <div class="col-md-3">
                      <span style="font-size: 12px; color: #afafaf">No Tagihan</span>
                      <br>
                      <span style="font-size: 16px;font-weight: 600;color: #444">{{ substr($ListAll->id_order,3, 9) }}{{ base64_encode(substr($ListAll->id_order,12, 9)) }}</span>
                      <br>
                      <span style="font-size: 12px; color: #afafaf">{{ \Carbon\Carbon::parse($ListAll->updated_at)->format('d F Y H:i') }}</span>
                    </div>
                    <div class="col-md-2">
                      <span style="font-size: 12px; color: #afafaf">jenis Product</span>
                      <br>
                      <span style="font-size: 16px;font-weight: 600;color: #444">
                        Les Privat
                      </span>
                    </div>
                    <div class="col-md-2">
                      <span style="font-size: 12px; color: #afafaf">Status Product</span>
                      <br>
                      <span style="font-size: 16px;font-weight: 600;color: #444">
                        @if($ListAll->status_order == "Cek_Pembayaran")
                          Konfirmasi
                        @elseif($ListAll->status_order == "In Progres")
                          Terverifikasi
                        @else
                          {{ str_replace('_',' ', $ListAll->status_order) }}
                        @endif
                        </span>
                    </div>
                    <div class="col-md-3">
                      <span style="font-size: 12px; color: #afafaf">Keterangan</span>
                      <br>
                      <span style="font-size: 12px;color: #444">
                        @if($ListAll->status_order == "Requested")
                          Order anda sedang dalam proses
                        @elseif($ListAll->status_order == "Close")
                          Penilaian {{ str_replace('_', ' ' ,$ListAll->flag_nilai) }} | {{ $ListAll->keterangan_nilai }}
                        @elseif($ListAll->status_order == "Pending")
                          Lanjutkan ke halaman pembayaran order                
                        @elseif($ListAll->status_order == "Rejected")
                          Bukti pembayaran order anda tidak sesuai, mohon sobat upload ulang bukti pembayaran yang benar          
                        @elseif($ListAll->status_order == "In Progres")
                          Sobat, kegiatan Permata Bimbel Les Privat sedang berjalan, sobat bisa lihat jadwal di menu profil
                        @elseif($ListAll->status_order == "Registrasi_Ulang")
                          Sobat Permata Bimbel Les Privat, Les Privat sudah terlaksana 4 kali pertemuan, apakah sobat ingin lanjut atau tidak? 
                        @elseif($ListAll->status_order == "Konfirmasi_Ulang")
                          Terimakasih sobat Permata Bimbel Les Privat, pengajuan lanjutan Les Privat anda sedang dalam proses, mohon menunggu info lebih lanjut ya
                        @endif
                      </span>
                    </div>
                    <div class="col-md-2">
                      @if($ListAll->status_order == "Requested")
                        <a href="{{ route('Transaction.detail',[encrypt($ListAll->id_order)]) }}" class="btn btn-primary" style="float: right;">Detail Produk</a>
                      @elseif($ListAll->status_order == "Close")
                        <a href="{{ route('Transaction.Invoice',[encrypt($ListAll->id_order)]) }}" target="_blank" class="btn btn-warning" style="float: right;">Download Laporan</a>
                      @elseif($ListAll->status_order == "Pending")
                        <a href="{{ route('Payment.index',[substr($ListAll->id_order,0, 12).base64_encode(substr($ListAll->id_order,12, 50)),base64_encode(now())]) }}" class="btn btn-warning" style="float: right;">Bayar Sekarang</a>
                      @elseif($ListAll->status_order == "Rejected")
                        <a href="{{ route('Payment.index',[substr($ListAll->id_order,0, 12).base64_encode(substr($ListAll->id_order,12, 50)),base64_encode(now())]) }}" class="btn btn-warning" style="float: right;">Bayar Sekarang</a>
                      @elseif($ListAll->status_order == "Cek_Pembayaran")
                        <a href="{{ route('Transaction.detail',[encrypt($ListAll->id_order)]) }}" class="btn btn-primary" style="float: right;">Detail Produk</a>
                      @elseif($ListAll->status_order == "In Progres")
                          <a href="{{ route('Jadwal.semua') }}" class="btn btn-primary" style="float: right;">Jadwal Les Privat</a>
                      @elseif($ListAll->status_order == "Registrasi_Ulang")
                        <a href="{{ route('Transaction.Lanjut',[encrypt($ListAll->id_order)]) }}" class="btn btn-primary" style="float: right;">Lanjut</a>              
                        <a href="#tidak_button" data-id="{{ encrypt($ListAll->id_order) }}" class="btn btn-warning" style="float: right; margin-right: 10px;">Tidak</a>                  
                      @elseif($ListAll->status_order == "Konfirmasi_Ulang")
                        <a href="{{ route('Transaction.detail',[encrypt($ListAll->id_order)]) }}" class="btn btn-primary" style="float: right;">Detail Produk</a>               
                      @endif
                    </div>
                  </div>            
                </div>
              @elseif($ListAll->product == "BO" and $ListAll->status_order != "Rejected")                
                <div class="col-md-12" style="border: 1px solid #e4e4e4;padding: 10px; margin-top: 10px">
                  <div class="row">
                    <div class="col-md-3">
                      <span style="font-size: 12px; color: #afafaf">No Tagihan</span>
                      <br>
                      <span style="font-size: 16px;font-weight: 600;color: #444">{{ substr($ListAll->id_order,3, 9) }}{{ base64_encode(substr($ListAll->id_order,12, 9)) }}</span>
                      <br>
                      <span style="font-size: 12px; color: #afafaf">{{ \Carbon\Carbon::parse($ListAll->updated_at)->format('d F Y H:i') }}</span>
                    </div>
                    <div class="col-md-2">
                      <span style="font-size: 12px; color: #afafaf">jenis Product</span>
                      <br>
                      <span style="font-size: 16px;font-weight: 600;color: #444">
                        Bimbel Online
                      </span>
                    </div>
                    <div class="col-md-2">
                      <span style="font-size: 12px; color: #afafaf">Status Product</span>
                      <br>
                      <span style="font-size: 16px;font-weight: 600;color: #444">
                        @if($ListAll->status_order == "Cek_Pembayaran")
                          @if($ListAll->upload[0])
                            Menunggu verifikasi
                          @else
                            Upload Pembayaran
                          @endif
                        @elseif($ListAll->status_order == "In Progres")
                          Terverifikasi
                        @else
                          {{ str_replace('_',' ', $ListAll->status_order) }}
                        @endif
                        </span>
                    </div>
                    <div class="col-md-3">
                      <span style="font-size: 12px; color: #afafaf">Keterangan</span>
                      <br>
                      <span style="font-size: 12px;color: #444">
                        @if($ListAll->status_order == "Close")
                          
                            Sobat Permata Bimbel Online, akun Bimbel Online {{ $ListAll->nama_paket }} Berbayar anda sudah berakhir
                       
                          
                        @elseif($ListAll->status_order == "Pending")
                         
                            Sobat Permata Bimbel Online, Silahkan lanjutkan ke halaman pembayaran akun Bimbel Online <b> {{ $ListAll->nama_paket }} </b> anda
               
                        @elseif($ListAll->status_order == "Rejected")

                          Sobat Permata Bimbel Online, bukti pembayaran order anda tidak sesuai, mohon upload ulang bukti pembayaran order anda. Terimakasih

                        @elseif($ListAll->status_order == "Cek_Pembayaran")
                           @if($ListAll->upload[0])
                            <b>Bimbel Online {{ $ListAll->nama_paket }}</b>, Bukti pembayaran sudah kami terima, mohon tunggu verifikasi dari kami.
                           @else
                            <b>Bimbel Online {{ $ListAll->nama_paket }}</b>, Silahkan upload bukti pembayaran
                           @endif
                         
                          
                        @elseif($ListAll->status_order == "In Progres")
                          Sobat Permata Bimbel Online, akun berlangganan anda adalah <b> {{ $ListAll->nama_paket }} </b> akan berakhir bulan {{ \Carbon\Carbon::parse($ListAll->expired_bimbel_online)->format('F Y') }}, anda bisa melakukan perpanjangan juga ya sobat agar tetap mendapatkan video belajar, teknik menjawab soal yang cepat, soal-soal dan pembahasan berkualitas
                        @endif
                      </span>
                    </div>
                    <div class="col-md-2">
                      <?php
                        $routeA = $ListAll->keterangan.','.$ListAll->kondisi.','.$ListAll->amount.','.'UN';
                      ?>
                      @if($ListAll->status_order == "Close")
                        <a href="" target="_blank" class="btn btn-warning" style="float: right;">Download Laporan</a>
                      @elseif($ListAll->status_order == "Pending")
                        <a href="{{ route('ExampPermata.pay',['id_paket' => $ListAll->id_package_user, 'id_harga' => $ListAll->id_paket_harga]) }}" class="btn btn-warning" style="float: right;">Lanjutkan Pembayaran</a>
                      @elseif($ListAll->status_order == "Rejected")
                       
                      @elseif($ListAll->status_order == "Cek_Pembayaran")
                        @if($ListAll->upload[0])
                          <a style="cursor: pointer;" class="btn btn-warning" style="float: right;">Menunggu Verifikasi</a>        
                        @else
                          <a href="{{ route('ExampPermata.pay',['id_paket' => $ListAll->id_package_user, 'id_harga' => $ListAll->id_paket_harga]) }}" class="btn btn-warning" style="float: right;">Bayar Sekarang</a>       
                        @endif
                      @elseif($ListAll->status_order == "In Progres")                          
                        <a href="{{ route('ExampPermata.langganan',[base64_encode($ListAll->id_package_user)]) }}" class="btn btn-primary" style="float: right;">Masuk Halaman Bimbel</a>          
                      @endif
                    </div>
                  </div>            
                </div>
              @elseif($ListAll->product == "Belanja")                
                <div class="col-md-12" style="border: 1px solid #e4e4e4;padding: 10px; margin-top: 10px">
                  <div class="row">
                    <div class="col-md-3">
                      <span style="font-size: 12px; color: #afafaf">No Tagihan</span>
                      <br>
                      <span style="font-size: 16px;font-weight: 600;color: #444">{{ substr($ListAll->id_order,3, 9) }}{{ base64_encode(substr($ListAll->id_order,12, 9)) }}</span>
                      <br>
                      <span style="font-size: 12px; color: #afafaf">{{ \Carbon\Carbon::parse($ListAll->updated_at)->format('d F Y H:i') }}</span>
                    </div>
                    <div class="col-md-2">
                      <span style="font-size: 12px; color: #afafaf">jenis Product</span>
                      <br>
                      <span style="font-size: 16px;font-weight: 600;color: #444">
                        Belanja
                      </span>
                    </div>
                    <div class="col-md-2">
                      <span style="font-size: 12px; color: #afafaf">Status Product</span>
                      <br>
                      <span style="font-size: 16px;font-weight: 600;color: #444">
                        @if($ListAll->status_order == "Cek_Pembayaran")
                          Konfirmasi
                        @elseif($ListAll->status_order == "In Progres")
                          Di proses
                        @else
                          {{ str_replace('_',' ', $ListAll->status_order) }}
                        @endif
                        </span>
                    </div>
                    <div class="col-md-3">
                      <span style="font-size: 12px; color: #afafaf">Keterangan</span>
                      <br>
                      <span style="font-size: 12px;color: #444">
                        @if($ListAll->status_order == "Close")
                          Sobat Permata Belanja, pembayaran order yang sobat lakukan gagal, silahkan ulang kembali ya.
                        @elseif($ListAll->status_order == "Pending")
                          Sobat Permata Belanja, mohon lakukan pembayaran order anda segera ya  
                        @elseif($ListAll->status_order == "Rejected")
                          Sobat Permata Belanja, bukti pembayaran order anda tidak sesuai, mohon upload ulang bukti pembayaran order anda ya                       
                        @elseif($ListAll->status_order == "In Progres")
                          Sobat Permata Belanja, order anda sudah diteruskan ke mitra permatamall.com, mohon sobat menunggu info selanjutnya ya
                        @endif
                      </span>
                    </div>
                    <div class="col-md-2">
                      <?php
                        $routeA = $ListAll->keterangan.','.$ListAll->kondisi.',0';
                      ?>
                      @if($ListAll->status_order == "Close")
                        <a href="" target="_blank" class="btn btn-warning" style="float: right;">Download Laporan</a>
                      @elseif($ListAll->status_order == "Pending")
                        <a href="" class="btn btn-warning" style="float: right;">Bayar Sekarang</a>
                      @elseif($ListAll->status_order == "Rejected")
                        <a href="" class="btn btn-warning" style="float: right;">Bayar Sekarang</a>
                      @elseif($ListAll->status_order == "Cek_Pembayaran")
                        <a class="btn btn-warning" style="float: right;">Mohon Tunggu</a>
                      @elseif($ListAll->status_order == "In Progres")                          
                        
                      @endif
                    </div>
                  </div>            
                </div>
              @endif   
            @endforeach       
          @endif
        </div> 
      </div>
    </div>
  </div>
  <div style="margin-bottom: 60px;">    
  </div>

  <div id="tidak_button" class="modal">
    <form id="form_close">
      <input type="hidden" name="_token_close" id="_token_close">
      <p>Bagimana menurut kamu selama ini dalam pembelajaran melalui <a href="https://permatamall.com">Permatamall.com</a></p>
      <p>
        <label>
          <input type="radio" name="review_close" value="Sangat_Puas">
          <img src="{!! asset('public/assets/images/icon/review/happy.png') !!}">
          <span class="text-review-happy-angry">Sangat Puas</span>
        </label>      
        <label>
          <input type="radio" name="review_close" value="Puas">
          <img src="{!! asset('public/assets/images/icon/review/proud.png') !!}">
          <span class="text-review-proud-sad">&nbsp; Puas</span>        
        </label>      
        <label>
          <input type="radio" name="review_close" value="Sedang">
          <img src="{!! asset('public/assets/images/icon/review/sad.png') !!}">
          <span class="text-review-proud-sad">Sedang</span>
        </label>      
        <label>
          <input type="radio" name="review_close" value="Tidak_Puas">
          <img src="{!! asset('public/assets/images/icon/review/angry.png') !!}">
          <span class="text-review-happy-angry">Tidak Puas</span>        
        </label>      
      </p>
      <hr>
      <textarea name="alasan_close" placeholder="isi alasan kamu disini" class="form-control" rows="5" id="alasan_close"></textarea>
      <br>
    </form>
    <p>      
      <button class="btn btn-success" style="float: right;" id="submit_close" onclick="functionSubmitClose()">Submit</button>
    </p>
  </div>
</div>



<div id="chat_ke_customer_service" class="modal" style="border-radius: 3px;padding: 0px;">  
  <div class="modal-heading-chat">
    <img src="http://wealwebs.com/assets/img/icon/user.png" width="30">
    <span class="nama_modal_chat">
      <span>Customer Service Les Privat</span>
    </span>
    <span class="action_modal_chat">Akhiri Chat</span>
  </div>
  <div class="modal-body-chat">
    <ul id="listChat" class="modal-body-chat-ul">
      <li class="chat-left">test ada apa ya dan dimandfas fsdajfa test ada apa ya dan dimandfas fsdajfa test ada apa ya dan dimandfas fsdajfa test ada apa ya dan dimandfas fsdajfa </li>
      <li class="chat-right">saya mau tanya dulu pak saya mau tanya dulu pak saya mau tanya dulu pak saya mau tanya dulu pak</li>
      <li class="chat-left">test ada apa ya dan dimandfas fsdajfa test ada apa ya dan dimandfas fsdajfa test ada apa ya dan dimandfas fsdajfa test ada apa ya dan dimandfas fsdajfa </li>
    </ul>
  </div>
  <div class="modal-footer-chat">
    <textarea placeholder="Ketik pesan disini .." id="send_text" class="form-control textarea-form" style="height: 37px;margin-bottom: 15px;"></textarea>
    <span class="icon-button-send" onclick="functionSendMessage()">
      <i class="fa fa-send"></i>
    </span>
  </div>
</div>
@endsection
@section('script')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script type="text/javascript" src="{!! asset('public/assets/js/autosize.js') !!}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.0.4/socket.io.js"></script>
<script type="text/javascript" charset="utf-8">
// var socket = io.connect('http://127.0.0.1:2000/api/chat');  

// socket.on('error', function (reason){
//   console.log(reason);
// });


// socket.on('disconnected', function (reason){
//   console.log(reason);
// });



// socket.on('chatmessage', function(msg){
//   console.log("fdasf");
// });

// function functionSendMessage(){
//   console.log("request emit");
//   socket.emit('chatmessage', "data");
//   // var send_text = $('#send_text').val();
//   // if (send_text == "") {
//   // }else{
//   //   $("#listChat").append("<li class='chat-right'>"+send_text+"</li>");
//   //   $('#send_text').val("");
//   //   $('#send_text').focus();
//   //   $('#listChat').animate({scrollTop: $('#listChat').prop("scrollHeight")}, 500);    


//   //   $.ajax({
//   //       type: "POST",
//   //       url: '{{ route("ChatPost.Member") }}',
//   //       data: {
//   //         id_user     : "data",
//   //         id_channel  : "data",
//   //         chat        : "data",
//   //       },
//   //       success: function(responses){
//   //           socket.emit('chatmessage', "data");
//   //        }
//   //   });    
//   // }
// }

// $(document).ready(function(){
//   $('#chat_ke_customer_service').modal({
//     fadeDuration: 250,
//     escapeClose: false,
//     clickClose: false,
//     showClose: false
//   });

//   $('#listChat').scrollTop($('#listChat').scrollHeight);
//   autosize(document.getElementsByClassName("textarea-form"));    
// });  


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

$("input[name='review_close']").click(function(){
  checkNullReviewClose();
});

$('#alasan_close').on('keyup', function(){
  checkNullReviewClose();
})

function checkNullReviewClose() {
  var radioValue = $("input[name='review_close']:checked").val();
  if(radioValue && $('#alasan_close').val() != ""){
    $('#submit_close').removeAttr('disabled');
  }else{
    $('#submit_close').attr('disabled','disabled');      
  }
}

function functionSubmitClose() {
  var data = $('#form_close').serialize();
  $.ajax({
    type: "GET",
    url: '{{ route("Transaction.close_review") }}',
    data: data,
    success: function(responses){
      swal({
        title: "Terima kasih",
        text: "Terima kasih atas kepercayaan anda terhadap permatamall, halaman ini akan otomatis refresh dalam 5 detik",
        type: "success",
        confirmButtonText: "OK"
      }).then(function() {
          window.location.href = "{{ route('Transaction.index') }}";
      });
      setTimeout(function () {                             
          window.location.href = "{{ route('Transaction.index') }}";
      }, 5000);
     }
  });
}
</script>
@include('sweet::alert')
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
  .permata-search-transaction{
    width: 100%;
    padding: 20px 40px 40px 40px;
    border-radius: 5px;
    background: #fff;
    -webkit-box-shadow: 0 6px 12px rgba(0,0,0,.175);
    box-shadow: 0 6px 12px rgba(0,0,0,.175);
    position: sticky;
    margin-top: -80px;
  }

  .modal-heading-chat{
    padding: 10px;
    background: #fff;
    border-radius: 3px 3px 0px 0px;
  }

  .modal-body-chat-ul{
    height: 350px;
    overflow-y: auto;
    padding: 10px;
    width: 100%;
  }


  .modal-footer-chat{
    padding: 10px;
  }

  .nama_modal_chat{
    font-weight: bold;
  }

  .action_modal_chat{
    float: right;
  }

  .modal-footer-chat{
    background: #fff;
    border-radius: 0px 0px 3px 3px;
  }

  .modal-body-chat{
    background-image: url('https://www.tiket.com/help-center/assetspattern-banner.png');
    background-color: #8c8c8c9e;
    background-position: center;
  }

  .chat-left{
    width: 70%;
    padding: 5px;
    background-color: #fff;
    border-radius: 3px;
    margin-bottom: 9px;
    clear: left;
    float: left;
  }
  .chat-right{
    width: 70%;
    padding: 5px;
    background-color:#27ae60;
    color: #fff;
    border-radius: 3px;
    margin-bottom: 9px;
    float: right;
    clear: right;
  }

  .textarea-form {
    resize: none;
    width: 86%;
    float: left;
  }

  .icon-send{
    width: 55px;
    float: right;
    border-radius: 50%;
  }

  .icon-button-send{
    padding: 7px 10px 7px 10px;
    background-color: #b9b9b9;
    border-radius: 50%;
    color: #fff;
    margin-left: 20px;
    position: absolute;
    cursor: pointer;
  }

  @media only screen and (max-width: 600px){
    .permata-search-transaction{
      width: 100%;
      padding: 10px 30px 30px 30px;
      border-radius: 5px;
      background: #fff;
      -webkit-box-shadow: 0 6px 12px rgba(0,0,0,.175);
      box-shadow: 0 6px 12px rgba(0,0,0,.175);
      position: sticky;
      margin-top: -50px;
    }

    .icon-button-send{
      padding: 7px 10px 7px 10px;
      background-color: #b9b9b9;
      border-radius: 50%;
      color: #fff;
      margin-left: 6px;
      position: absolute;
      cursor: pointer;
    }

    .modal-body-chat-ul{
      height: 550px;
      overflow-y: auto;
      padding: 10px;
      width: 100%;
    }

    .blocker {
       padding: 0px; 
    }
  }
</style>
<script type="text/javascript">
</script>
@endsection
