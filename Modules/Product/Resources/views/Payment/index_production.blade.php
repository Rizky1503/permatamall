@extends('layouts.FrontEnd')

@section('content')
<div class="container">
  <div style="height: 300px;">
    <form method="post" action="{{ ENV('APP_URL_PAYMENT') }}Suite/Receive" id="form_doku_payment" style="display: none;">
      <table width="600" border="0" cellspacing="1" cellpadding="5">
        <tr>
          <td width="100" class="field_label">BASKET</td>
          <td width="100" class="field_input">
            <input name="BASKET" type="text" id="BASKET" value="{{ $data->nama_produk }},{{ $data->amount }}.00,1,{{ $data->amount }}.00" />
          </td>
        </tr>
        <tr>
          <td width="100" class="field_label">MALLID</td>
          <td width="500" class="field_input">
            <input name="MALLID" type="text" id="MALLID" value="{{ ENV('APP_MALL_ID') }}"/>
          </td>
        </tr>
        <tr>
          <td width="100" class="field_label">CHAINMERCHANT</td>
          <td width="500" class="field_input">
            <input name="CHAINMERCHANT" type="text" id="CHAINMERCHANT" value="NA"/>
          </td>
        </tr>
        <tr>
          <td class="field_label">CURRENCY</td>
          <td class="field_input">
            <input name="CURRENCY" type="text" id="CURRENCY" value="360"/>
          </td>
        </tr>
        <tr>
          <td class="field_label">PURCHASECURRENCY</td>
          <td class="field_input">
            <input name="PURCHASECURRENCY" type="text" id="PURCHASECURRENCY" value="360"/>
          </td>
        </tr>
        <tr>
          <td class="field_label">AMOUNT</td>
          <td class="field_input">
            <input name="AMOUNT" type="text" id="AMOUNT" value="{{ $data->amount }}.00"/>
          </td>
        </tr>
        <tr>
          <td class="field_label">PURCHASEAMOUNT</td>
          <td class="field_input">
            <input name="PURCHASEAMOUNT" type="text" id="PURCHASEAMOUNT" value="{{ $data->amount }}.00"/>
          </td>
        </tr>
        <tr>
          <td class="field_label">TRANSIDMERCHANT</td>
          <td class="field_input">
            <input name="TRANSIDMERCHANT" type="text" id="TRANSIDMERCHANT" value="{{ $data->id_order }}" />
          </td>
        </tr>
        <tr>
          <td class="field_label">SHAREDKEY</td>
          <td class="field_input">
            <input name="SHAREDKEY" type="text" id="SHAREDKEY" value="{{ ENV('APP_SHARE_KEY') }}"/> --> Shared Key OCO
          </td>
        </tr>
        <tr>
          <td class="field_label">WORDS</td>
          <td class="field_input">
            <input type="text" id="WORDS" name="WORDS"/>
          </td>
        </tr>
        <tr>
          <td class="field_label">REQUESTDATETIME</td>
          <td class="field_input">
            <input name="REQUESTDATETIME" type="text" id="REQUESTDATETIME" value="{{ \Carbon\Carbon::parse(now())->format('Ymdhis') }}" />
            (YYYYMMDDHHMMSS)
          </td>
        </tr>

        <tr>
          <td class="field_label">SESSIONID</td>
          <td class="field_input">
            <input type="text" id="SESSIONID" name="SESSIONID" value="zoAkfTrnJC1DL7RK3mzt" />
          </td>
        </tr>
        <tr>
          <td class="field_label">PAYMENTCHANNEL</td>
          <td class="field_input">
            <input type="text" id="PAYMENTCHANNEL" name="PAYMENTCHANNEL" value="" /> --> kosongkan jika ingin menampilkan semua payment channel yang digunakan
          </td>
        </tr>
        <tr>
          <td width="100" class="field_label">EMAIL</td>
          <td width="500" class="field_input">
            <input name="EMAIL" type="text" id="EMAIL" value="{{ $productNya->email }}" />
          </td>
        </tr>
        <tr>
          <td class="field_label">NAME</td>
          <td class="field_input">
            <input name="NAME" type="text" id="NAME" value="{{ $productNya->nama }}" maxlength="50" />
          </td>
        </tr>
        <tr>
          <td class="field_label">ADDRESS</td>
          <td class="field_input">
            <input name="ADDRESS" type="text" id="ADDRESS" value="{{ $productNya->alamat }}" size="50" maxlength="50" />
          </td>
        </tr>
        <tr>
          <td class="field_label">COUNTRY</td>
          <td class="field_input">
            <input name="COUNTRY" type="text" id="COUNTRY" value="360" size="50" maxlength="50" />
          </td>
        </tr>
        <tr>
          <td class="field_label">STATE</td>
          <td class="field_input">
            <input name="STATE" type="text" id="STATE" value="STATE" size="50" maxlength="50" />
          </td>
        </tr>
        <tr>
          <td class="field_label">CITY</td>
          <td class="field_input">
            <input name="CITY" type="text" id="CITY" value="CITY" size="50" maxlength="50" />
          </td>
        </tr>
        <tr>
          <td class="field_label">PROVINCE</td>
          <td class="field_input">
            <input name="PROVINCE" type="text" id="PROVINCE" value="PROVINCE" size="50" maxlength="50" />
          </td>
        </tr>
        <tr>
          <td class="field_label">ZIPCODE</td>
          <td class="field_input">
            <input name="ZIPCODE" type="text" id="ZIPCODE" value="67153" size="6" maxlength="10" />
          </td>
        </tr>
        <tr>
          <td class="field_label">HOMEPHONE</td>
          <td class="field_input">
            <input name="HOMEPHONE" type="text" id="HOMEPHONE" value="{{ $productNya->no_telpon }}" size="12" maxlength="20" />
          </td>
        </tr>
        <tr>
          <td class="field_label">MOBILEPHONE</td>
          <td class="field_input">
            <input name="MOBILEPHONE" type="text" id="MOBILEPHONE" value="{{ $productNya->no_telpon }}" size="12" maxlength="20" />
          </td>
        </tr>
        <tr>
          <td class="field_label">WORKPHONE</td>
          <td class="field_input">
            <input name="WORKPHONE" type="text" id="WORKPHONE" size="12" maxlength="20" value="{{ $productNya->no_telpon }}" />
          </td>
        </tr>
        <tr>
          <td class="field_label">BIRTHDATE</td>
          <td class="field_input">
            <input name="BIRTHDATE" type="text" id="BIRTHDATE" value="{{ \Carbon\Carbon::parse($productNya->created_at)->format('Ymd') }}" size="12" maxlength="8" />
          </td>
        </tr>
        <tr>
          <td class="field_input" colspan="2">&nbsp;</td>
        </tr>               
      </table>
    </form>
  </div>
</div>
@stop
@section('script')
<script language="JavaScript" type="text/javascript" src="{{ ENV('APP_URL_PAYMENT') }}sha-1.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
    Swal.fire({
      onBeforeOpen: () => {
        Swal.showLoading()
        timerInterval = setInterval(() => {
        Swal.getContent().querySelector('strong')
          .textContent = Swal.getTimerLeft()
        }, 100)
      },
      title: 'Sedang proses',
      text: 'beberapa saat lagi Anda akan di arahkan ke halaman pembayaran',
      showCloseButton: true,
    })

    // setTimeout(function(){ 
    //   var msg = "{{ $data->amount }}" + ".00" + "{{ ENV('APP_MALL_ID') }}" + "{{ ENV('APP_SHARE_KEY') }}" + "{{ $data->id_order }}";
    //   $('#WORDS').val(SHA1(msg));
    //   $('#form_doku_payment').submit();

    // }, 1000);    
  });  
</script>

<style type="text/css">
  .swal2-container.swal2-shown {
    background-color: rgba(0, 0, 0, 0.92);
  }
</style>
@endsection


