<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Invoice Page Transaction</title>
    
    <style>
    .invoice-box {
        max-width: 800px;
        margin: auto;
        padding: 30px;
        border: 1px solid #eee;
        box-shadow: 0 0 10px rgba(0, 0, 0, .15);
        font-size: 16px;
        line-height: 24px;
        font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        color: #555;
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
        padding-bottom: 10px;
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
        font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
    }
    
    .rtl table {
        text-align: right;
    }
    
    .rtl table tr td:nth-child(2) {
        text-align: left;
    }
    </style>
</head>

<body>
    <div class="invoice-box">
        <table cellpadding="0" cellspacing="0">
            <tr class="top">
                <td colspan="2">
                    <table>
                        <tr>
                            <td class="title">
                                <img src="{!! asset('public/assets/images/textonly-363x129.png') !!}" style="width:100%; max-width:200px;">
                            </td>
                            
                            <td>
                                {{ $data->data->nama_produk ?? '' }} <br>
                                No Laporan #: {{ $data->data->id_order ?? '' }}<br>
                                Tanggal: {{ \Carbon\Carbon::parse($data->data->created_at)->format('d F Y') ?? '' }}<br>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            
            <tr class="information">
                <td colspan="2">
                    <table>
                        <tr>
                            <td>
                                <b>Murid</b><br>
                                {{ $data->data->nama ?? '' }}<br>
                                <?php
                                $keterangan = json_decode($data->data->keterangan);
                                ?>
                                {{ $keterangan->tingkat ?? '' }}, 
                                {{ $keterangan->mata_pelajaran ?? '' }}, 
                                {{ $keterangan->Pertemuan ?? '' }} Pertemuan<br>
                                {{ $data->data->asal_sekolah ?? '' }}
                            </td>
                            
                            <td>
                                <b>Guru</b><br>
                                {{ $data->Mitra->nama ?? '' }}<br>
                                @if($data->Mitra->jenis_kelamin == "L")
                                Laki Laki
                                @else
                                Perempuan
                                @endif
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            
            <tr class="heading">
                <td>
                    Informasi Pembayaran
                </td>
                
                <td>
                    Pembayaran
                </td>
            </tr>
            <?php
              $sum = 0;
            ?>
            @foreach($data->Payment as $ListPayment)
            <tr class="details">
                <td>
                    Pembayaran tanggal {{ \Carbon\Carbon::parse($ListPayment->created_at)->format('d F Y') ?? '' }}
                </td>                
                <td>
                    Rp. {{ number_format($ListPayment->amount) }}
                </td>
            </tr>
            <?php
              $sum+= $ListPayment->amount;
            ?>
            @endforeach
            <tr>
                <td  style="border-top: 1px solid #eee">
                    Total
                </td>                
                <td  style="border-top: 1px solid #eee">
                    Rp. {{ number_format($sum) }}
                </td>
            </tr>            
            <tr class="heading">
                <td>
                    Jadwal Absen Murid
                </td>
                
                <td>
                    Tanggal
                </td>
            </tr>
            @foreach($data->Jadwal as $ListJadwal)
            <tr class="item">
                <td>
                    @if($ListJadwal->status == "Hadir")
                      Hadir
                    @else
                      Tidak Hadir
                    @endif 
                    Pertemuan {{ $ListJadwal->pertemuan_ke }}
                </td>
                
                <td>
                    {{ \Carbon\Carbon::parse($ListJadwal->tanggal)->format('d F Y h:i:s') ?? '' }}
                </td>
            </tr>       
            @endforeach
        </table>
    </div>
</body>
<script type="text/javascript">
  window.print();
  window.open('', '_self', '');
  window.close();
</script>
</html>