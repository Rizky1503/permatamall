@extends('examppermata::layouts.master2')

@section('content')
<div style="background-image: url('{!! asset('public/images/sidebar/banner_examp.png') !!}'); background-size: cover; text-align: center;font-size: 40px;font-weight: bold;color: #209841; padding-bottom: 80px; padding-top: 80px;">

    HISTORI
</div>
<div class="container" style="padding-bottom: 80px; padding-top: 10px;">   
    @include('examppermata::layouts.menulangganan')       
    <div class="row">     
        <div class="col-md-12">
            <div class="row">
              <div class="col-md-12">    
                <div class="panel panel-default">
                    <div class="panel-body" style="padding: 15px;min-height: auto;">       
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Tingkat</th>
                                        <th>Mata Pelajaran</th>
                                        <th>Nilai</th>
                                        <th>Tanggal Tes</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($data as $key => $listData)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        @if( json_decode($listData->keterangan)->_kelas == 'TINGKAT' )
                                            <td>{{ str_replace('_',' ', json_decode($listData->keterangan)->_tingkat) }}</td>
                                        @else
                                            <td>{{ str_replace('_',' ', json_decode($listData->keterangan)->_kelas) }} {{ str_replace('_',' ', json_decode($listData->keterangan)->_tingkat) }} </td>
                                        @endif
                                        <td>{{ str_replace('_',' ', json_decode($listData->keterangan)->_mata_pelajaran) }}</td>
                                        <td>
                                            @if($listData->total_nilai < 0)
                                                0
                                            @else
                                            {{ $listData->total_nilai }}
                                            @endif
                                        </td>
                                        <td>{{ \Carbon\Carbon::parse($listData->created_at)->format('d F Y H:i:s') }}</td>
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
    </div>
</div>

<style type="text/css">
    .table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th {
        font-size: 17px !important;
    }
    .ps-main{
        background: #f7fcf7 !important;
    }

    .panel-default {
        border-radius: 7px !important;
        border-color: #27a94a !important;
        background-color: #f7fcf700 !important;
    }
</style>

@endsection
@section('script')
@endsection