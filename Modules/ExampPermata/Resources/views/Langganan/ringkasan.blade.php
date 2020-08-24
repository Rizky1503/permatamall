@extends('examppermata::layouts.master2')

@section('content')
<div style="background-image: url('{!! asset('public/images/sidebar/banner_examp.png') !!}'); background-size: cover; text-align: center;font-size: 40px;font-weight: bold;color: #209841; padding-bottom: 80px; padding-top: 80px;">

    Ringkasan Materi
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
                      @if($judul->matapelajaran == 'BAHASA INDONESIA')
                        <a class="nav-item nav-link" id="nav-indonesia-tab" data-toggle="tab" href="#nav-indonesia" role="tab" aria-controls="nav-indonesia" aria-selected="true" autofocus onclick="functionRemoveClass(this.id)">{{$judul->matapelajaran}}</a>
                      @elseif($judul->matapelajaran == 'BAHASA INGGRIS')
                        <a class="nav-item nav-link" id="nav-inggris-tab" data-toggle="tab" href="#nav-inggris" role="tab" aria-controls="nav-inggris" aria-selected="true" autofocus onclick="functionRemoveClass(this.id)">{{$judul->matapelajaran}}</a>
                      @else
                      <a class="nav-item nav-link" id="nav-{{$judul->matapelajaran}}-tab" data-toggle="tab" href="#nav-{{$judul->matapelajaran}}" role="tab" aria-controls="nav-{{$judul->matapelajaran}}" aria-selected="true" autofocus onclick="functionRemoveClass(this.id)">{{$judul->matapelajaran}}</a>
                      @endif
                    @endforeach  
                    </div>
                  </nav>
                  <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
                    @foreach($data as $key => $judul)
                     @if($judul->matapelajaran == 'BAHASA INDONESIA')
                      <div class="tab-pane fade  in" id="nav-indonesia" role="tabpanel" aria-labelledby="nav-indonesia-tab">
                     @elseif($judul->matapelajaran == 'BAHASA INGGRIS')
                      <div class="tab-pane fade  in" id="nav-inggris" role="tabpanel" aria-labelledby="nav-inggris-tab">
                     @else
                      <div class="tab-pane fade  in" id="nav-{{$judul->matapelajaran}}" role="tabpanel" aria-labelledby="nav-{{$judul->matapelajaran}}-tab">
                     @endif
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tingkat</th>
                                    <th>Silabus</th>
                                    <th>File</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($judul->ringkasan_matpel as $key => $value)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $value->tingkat }}</td>
                                    <td>{{ $value->silabus }}</td>
                                    <th><a href="#ex1" rel="modal:open" onclick="functiongetfilemateri('{{$value->id_bedah_mata_pelajaran}}')" class="btn btn-primary" >Lihat</a></a></th>
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



<div id="ex1" class="modal">
  <div id="pdf">
    
  </div>
</div>


<!-- <iframe src="https://www.takafulumum.co.id/upload/tausiah/008%20menepati%20janji.pdf" width="1000" height="1000"></iframe> -->
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

    .modal{
        overflow: visible;
    }
    
</style>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />

<script type="text/javascript">
    function functionRemoveClass(responses) {
      $('.nav-link').removeClass('active');
      $('#'+responses).addClass('active');
    }

    function functiongetfilemateri(val){
      $.ajax({
          type: "GET",
          url: '{{ route("ExampPermata.GetFilePdf") }}',
          data: {
              id : val,
          },
          success: function(responses){
            // window.open(responses);
            $('#pdf').html(responses); 
          }
      });
    }
</script>
@endsection
@section('script')
@endsection