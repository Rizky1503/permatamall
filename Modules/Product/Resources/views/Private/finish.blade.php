@extends('layouts.FrontEnd')

@section('content')
<div style="width: 100%; height: 220px; background-image: url('{!! asset('public/images/sidebar/privat.png') !!}');">
    <div class="container">
      <p style="font-size: 24px;color: #fff;font-weight: 600;margin-top: 70px; text-align: center;">
          Les Privat
      </p>
    </div>
</div>
<div class="container"  style="margin-top: 30px; margin-bottom: 30px;">
  <div class="content">
    <img src="data:image/png;base64,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" width="100" style="float: left; margin-right: 20px;">
    <span style="text-align: justify;">Sobat Permata Les Privat, <a href="{{ route('FrontEnd.index') }}">permatamall.com</a> akan segera menginformasikan kebutuhan Guru Les Privat anda dalam waktu 2 x 24 jam. Salam Permata Bimbel.</span>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="invoice-box">
        <table cellpadding="0" cellspacing="0">
          <tr class="information">
              <td colspan="2">
                  <table>
                      <tr>
                          <td>
                              Les Privat : {{ $content['tingkat'] }} {{ $content['mata_pelajaran'] }}<br>
                              Jumlah Pertemuan Les Privat : {{ $content['Pertemuan'] }} Pertemuan<br>
                              Lokasi Les Privat : {{ $content['kota'] }}
                          </td>
                          
                          <td>
                              Kode Pendaftaran {{ $detail->transaksi->id_order }}.<br>
                              Pengajuan Les Privat<br>
                              {{ \Carbon\Carbon::parse($detail->transaksi->created_at)->format('d F Y H:i:s') }}
                          </td>
                      </tr>
                  </table>
              </td>
          </tr>
                  
        </table>
    </div>
    </div>
  </div>
</div>

@endsection
@section('script')
<style>

  .content{
    padding: 30px 30px 30px 30px;
    width: 100%;  
    margin-bottom: 20px;
    font-size: 24px;
    background: #fff;
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 3px 20px 0px rgba(0, 0, 0, 0.1);
    -moz-box-shadow: 0 3px 20px 0px rgba(0, 0, 0, 0.1);
    -webkit-box-shadow: 0 3px 20px 0px rgba(0, 0, 0, 0.1);
    -o-box-shadow: 0 3px 20px 0px rgba(0, 0, 0, 0.1);
    -ms-box-shadow: 0 3px 20px 0px rgba(0, 0, 0, 0.1);
  }

  .invoice-box {
      max-width: 100%;
      margin: auto;
      padding: 30px;
      border: 1px solid #eee;
      box-shadow: 0 0 10px rgba(0, 0, 0, .15);
      font-size: 16px;
      line-height: 24px;
      color: #000;
  }
  
  .invoice-box table {
      width: 100%;
      line-height: inherit;
      text-align: left;
  }
  
  .invoice-box table td {
      padding: 5px;
      vertical-align: top;
  }
  
  .invoice-box table tr td:nth-child(2) {
      text-align: right;
  }
  
  .invoice-box table tr.top table td {
      padding-bottom: 20px;
  }
  
  .invoice-box table tr.top table td.title {
      font-size: 45px;
      line-height: 45px;
      color: #333;
  }
  
  .invoice-box table tr.information table td {
      padding-bottom: 40px;
  }
  
  .invoice-box table tr.heading td {
      background: #eee;
      border-bottom: 1px solid #ddd;
      font-weight: bold;
  }
  
  .invoice-box table tr.details td {
      padding-bottom: 20px;
  }
  
  .invoice-box table tr.item td{
      border-bottom: 1px solid #eee;
  }
  
  .invoice-box table tr.item.last td {
      border-bottom: none;
  }
  
  .invoice-box table tr.total td:nth-child(2) {
      border-top: 2px solid #eee;
      font-weight: bold;
  }
  
  @media only screen and (max-width: 600px) {
      .invoice-box table tr.top table td {
          width: 100%;
          display: block;
          text-align: center;
      }
      
      .invoice-box table tr.information table td {
          width: 100%;
          display: block;
          text-align: center;
      }
  }
  
  /** RTL **/
  .rtl {
      direction: rtl;
  }
  
  .rtl table {
      text-align: right;
  }
  
  .rtl table tr td:nth-child(2) {
      text-align: left;
  }
</style>
@endsection
