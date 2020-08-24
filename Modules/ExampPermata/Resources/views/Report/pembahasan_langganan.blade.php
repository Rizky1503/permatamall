@extends('examppermata::layouts.master2')

@section('content')
<div style="background-image: url('{!! asset('public/images/sidebar/banner_examp.png') !!}'); background-size: cover; text-align: center;font-size: 40px;font-weight: bold;color: #209841; padding-bottom: 80px; padding-top: 80px;">

    List Pembahasan
</div>
<div class="container" style="padding-bottom: 80px; padding-top: 10px;">          
    @include('examppermata::layouts.menulangganan')    
    <div class="row">     
        <div class="col-md-12">
          	<div class="row">
                <div class="col-xs-12 ">
                  <nav>
                    <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                    @foreach($data as $key => $judul)
                      <a class="nav-item nav-link" id="nav-{{$judul->jenis_paket}}-tab" data-toggle="tab" href="#nav-{{$judul->jenis_paket}}" role="tab" aria-controls="nav-{{$judul->jenis_paket}}" aria-selected="true" autofocus onclick="functionRemoveClass(this.id)">{{$judul->jenis_paket}}</a>
                    @endforeach  
                    </div>
                  </nav>
                  <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
                    @foreach($data as $key => $judul)
                    <div class="tab-pane fade  in" id="nav-{{$judul->jenis_paket}}" role="tabpanel" aria-labelledby="nav-{{$judul->jenis_paket}}-tab">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tingkat</th>
                                    <th>Mata Pelajaran</th>
                                    <th>Lihat</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($judul->pembahasan_matpel as $key => $value)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $value->kelas }}</td>
                                    <td>{{ $value->nama_matpel }}</td>
                                    <th><a href="{{ route('ExampPermata.lang.pembahasan_detail',encrypt([$id,$value->nama_matpel,$judul->jenis_paket])) }}" class="btn btn-primary">Detail</a></a></th>
                                </tr>
                                @endforeach
                            </tbody>    
                        </table>
                    </div>
                    @endforeach
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
    
    nav>div a.nav-item.nav-link, nav>div a.nav-item.nav-link.active {
    border: none;
    color: #000000;
    background: #c0e6ca;
    border-radius: 0;
    padding: 10px;
    }
    
    nav>.nav.nav-tabs {
        background: #c0e6ca;
    }
    
    .tab-content{
        min-height: auto;
    }
    
    .ps-main{
        background: #f7fcf7 !important;
    }
    
    a.nav-item.nav-link.active {
        border: none;
        color: #fff;
        background: #3eb960 !important;
        border-radius: 0;
        padding: 10px;
        font-size: 20px;
    }

    a.nav-item.nav-link.alwaysactive {
        border: none;
        color: #fff;
        background: #3eb960 !important;
        border-radius: 0;
        padding: 10px;
        font-size: 20px;
    }
</style>

<script type="text/javascript">
    function functionRemoveClass(responses) {
      $('.nav-link').removeClass('active');
      $('#'+responses).addClass('active');
    }
</script>
@endsection
@section('script')
@endsection