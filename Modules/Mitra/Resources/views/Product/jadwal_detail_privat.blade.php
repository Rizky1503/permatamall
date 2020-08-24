@extends('mitra::layouts.master-v2')

@section('content')
<!--begin::Portlet-->
<div class="m-portlet m-portlet--tab">    
    <div class="m-portlet__body">
        <!--begin::Section-->
        <div class="m-section">
            <div class="row">
                <div class="col-md-6">
                    <div class="m-section__content">
                        <div class="m-demo" data-code-preview="true" data-code-html="true" data-code-js="false">
                            <div class="m-demo__preview">
                                <p>
                                    <span class="m--font-bold">
                                        Nama Siswa:
                                    </span>
                                    <span style="float: right;">{{ $data->Product->nama ?? '' }}</span>
                                </p> 
                                <p>
                                    <span class="m--font-bold">
                                        No Telpon
                                    </span>
                                    <span style="float: right;">{{ $data->Product->no_telpon ?? '' }}</span>
                                </p> 
                                <p>
                                    <span class="m--font-bold">
                                        Tingkat Sekolah
                                    </span>
                                    <?php
                                        $datas = json_decode($data->Product->keterangan);
                                    ?>
                                    <span style="float: right;">{{ $datas->tingkat ?? '' }}</span>
                                </p> 
                                <p>
                                    <span class="m--font-bold">
                                        Mata Pelajaran:
                                    </span>
                                    <span style="float: right;">{{ $datas->mata_pelajaran ?? '' }}</span>
                                </p> 
                                <p>
                                    <span class="m--font-bold">
                                        Kota/Kabupaten:
                                    </span>
                                    <span style="float: right;">{{ $datas->kota ?? '' }}</span>
                                </p> 
                                <p>
                                    <span class="m--font-bold">
                                        Alamat: 
                                    </span>
                                    <span style="float: right;">{{ $data->Product->alamat ?? '' }} </span>
                                </p> 

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="m-section__content">
                        <div class="m-demo" data-code-preview="true" data-code-html="true" data-code-js="false">
                            <div class="m-demo__preview">
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <tr>
                                            <th>Pertemuan</th>
                                            <th>Tanggal Pertemuan</th>
                                        </tr>
                                        @foreach($PertemuanSudah as $listPertemuanSudah)
                                        <tr>
                                            <td>{{ $listPertemuanSudah->pertemuan_ke }}</td>
                                            @if($listPertemuanSudah->status == "Hadir")
                                                <td>Hadir tanggal {{ \Carbon\Carbon::parse($listPertemuanSudah->tanggal)->format('d F Y H:i:s') }}</td>
                                            @else
                                                <td>Tidak Hadir tanggal {{ \Carbon\Carbon::parse($listPertemuanSudah->tanggal)->format('d F Y H:i:s') }}</td>
                                            @endif
                                        </tr>
                                        @endforeach
                                        @foreach($Pertemuan as $listPertemuan)
                                        <tr>
                                            <td>{{ $listPertemuan->pertemuan_ke }}</td>
                                            <td>
                                                @if(empty($listPertemuan->absen_guru))
                                                    <a href="{{ route('Mitra.Privat.index',[encrypt($listPertemuan->id_pertemuan)]) }}" class="btn btn-primary">Absen Hadir</a>
                                                @else
                                                    <button class="btn btn-warning">Menunggu absensi dari murid</button>
                                                @endif
                                            </td>
                                        </tr>
                                        @endforeach
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>            
        </div>
        <!--end::Section-->
    </div>
</div>
@stop
@section('script')
@if (session('push-notification'))
   <script>
   if ("WebSocket" in window) {         
        // Let us open a web socket
        var ws = new WebSocket(" {{env('APP_URL_SOCKET')}}");
        ws.onopen = function() {          
        // Web Socket is connected, send data using send()
            ws.send("Notification");
            ws.send("Transaction");
            console.log("Notification,Transaction")
        };  
    } else {
        console.log("Browser not support")
    }
   </script>
@endif
@endsection
