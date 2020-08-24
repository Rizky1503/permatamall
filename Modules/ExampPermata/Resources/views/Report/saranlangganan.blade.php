@extends('examppermata::layouts.master2')

@section('content')
<div style="background-image: url('{!! asset('public/images/sidebar/examp.png') !!}'); background-size: cover; text-align: center;font-size: 40px;font-weight: bold;color: #fff; padding-bottom: 80px; padding-top: 80px;">

    Saran dan Nilai
</div>
<div class="container" style="padding-bottom: 80px; padding-top: 10px;">   
    @include('examppermata::layouts.menulangganan')       
    <div class="row">     
        <div class="col-md-12">
          	<div class="row">
              <div class="col-md-12">    
                <div class="panel panel-default">
                  	<div class="panel-body" style="padding: 15px;min-height: 340px;">       
                  		<div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Tingkat</th>
                                        <th>Mata Pelajaran</th>
                                        <th>Nilai</th>
                                        <th>Passing Grade</th>
                                        <th>Tanggal Tes</th>
                                        <th>Saran</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($data as $key => $listData)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td></td>
                                        <td><?php echo json_decode($listData->keterangan)->test_online ?></td>
                                        <td>
                                            @if($listData->total_nilai < 0)
                                                0
                                            @else
                                            {{ $listData->total_nilai }}
                                            @endif
                                        </td>
                                        <td>
                                            @if($listData->passing_grade < 0)
                                                0
                                            @else
                                            {{ number_format($listData->passing_grade, 2) }} %
                                            @endif
                                        </td>
                                        <td>{{ \Carbon\Carbon::parse($listData->created_at)->format('d F Y H:i:s') }}</td>
                                        <td>
                                            @if($listData->passing_grade <= 40)
                                                Nilai kamu belum memuaskan, silahkan ikut bimbel les privat untuk meningkatkan pengetahuan kamu
                                            @endif
                                        </td>                             
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
@endsection
@section('script')
@endsection