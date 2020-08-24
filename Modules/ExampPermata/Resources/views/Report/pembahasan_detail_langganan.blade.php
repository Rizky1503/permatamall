@extends('examppermata::layouts.master2')

@section('content')
<div style="background-image: url('{!! asset('public/images/sidebar/banner_examp.png') !!}'); background-size: cover; text-align: center;font-size: 40px;font-weight: bold;color: #209841; padding-bottom: 80px; padding-top: 80px;">

    PEMBAHASAN SOAL {{$matpel}}
</div>
<div class="container" style="padding-bottom: 80px; padding-top: 10px;">          
        @include('examppermata::layouts.menulangganan')    
  <div class="row"> 
    <div class="col-md-12">
        <div class="row">
          <div class="col-md-12">    
            <div class="panel panel-default">
                <div class="panel-body" style="padding: 8px;min-height: 340px;">       
                    <div class="row">
                        <div id="target-content"></div>   
                        <div style="float: right; position: relative; top: -17px; left: -75px;">

                            @if($soalAwal->id_soal == $soalSatu->id_soal)
                                <center><p>{{$page}} / {{ $count->count }}</p></center>
                                <a disabled class="btn btn-success" style="border-radius: 18px;">Sebelumnya</a>
                                <a href="{{ route('ExampPermata.lang.pembahasan_detail',[$url,'flag'=>'next','id_soal' => $soalSatu->id_soal,'soalke'=> $page+1]) }}" class="btn btn-success" style="border-radius: 18px;">Selanjutnya</a>
                            @elseif($soalAkhir->id_soal == $soalSatu->id_soal)
                                <center><p>{{$page}} / {{ $count->count }}</p></center>
                                <a href="{{ route('ExampPermata.lang.pembahasan_detail',[$url,'flag'=>'prev','id_soal' => $soalSatu->id_soal,'soalke'=> $page-1]) }}" class="btn btn-success" style="border-radius: 18px;">Sebelumnya</a>
                                <a disabled class="btn btn-success" style="border-radius: 18px;">Selanjutnya</a>
                            @else
                                <center><p>{{$page}} / {{ $count->count }}</p></center>
                                <a href="{{ route('ExampPermata.lang.pembahasan_detail',[$url,'flag'=>'prev','id_soal' => $soalSatu->id_soal,'soalke'=> $page-1]) }}" class="btn btn-success" style="border-radius: 18px;">Sebelumnya</a>
                                <a href="{{ route('ExampPermata.lang.pembahasan_detail',[$url,'flag'=>'next','id_soal' => $soalSatu->id_soal,'soalke'=> $page+1]) }}" class="btn btn-success" style="border-radius: 18px;">Selanjutnya</a>
                            @endif
                            
                            

                        </div>                      
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
<script type="text/javascript" charset="utf8" src="{!! asset('public/assets/js/jquery-1.8.2.min.js') !!}"></script>
<script>
jQuery(document).ready(function() {
    jQuery("#target-content").load("{{ route('ExampPermata.lang.pembahasan_soal') }}?execute={{ base64_encode($soalSatu->id_soal) }}&number=1");
    jQuery("#pagination li").live('click', function(e) {
        e.preventDefault();
        jQuery("#target-content").html("<div class='loader'></div>");
        jQuery("#pagination li").removeClass('active');
        jQuery(this).addClass('active');
        var pageNum     = this.id;
        var number      = $(this).attr("data-id");
        jQuery("#target-content").load("{{ route('ExampPermata.lang.pembahasan_soal') }}?execute="+pageNum+"&number="+number);
    });
});
</script>

<style>
    
    .ps-main{
           background: #f7fcf7 !important;
       }

   .panel-default {
       border-radius: 7px !important;
       border-color: #27a94a !important;
       background-color: #f7fcf700 !important;
   }
    
    .loader {
        border: 16px solid #f3f3f3;
        border-radius: 50%;
        position: absolute;
        left: 35%;
        bottom: 30%;
        z-index: 1;
        border-top: 16px solid #3498db;
        width: 120px;
        height: 120px;
        -webkit-animation: spin 2s linear infinite;
        animation: spin 2s linear infinite;
    }

    .test-profile {
        font-weight: bold;
        font-size: 16px;
    }

    .option-pagin {
        float: right;
        margin-top: -40px;
    }

    hr {
        margin-top: 2px;
        margin-bottom: 7px;
    }

    .pilih_jawaban {
        font-size: 20px;
        font-weight: bold;
    }

    .style-jawaban {
        margin-top: 10px;
    }

    .pagination>.active>a, .pagination>.active>a:focus, .pagination>.active>a:hover, .pagination>.active>span, .pagination>.active>span:focus, .pagination>.active>span:hover {
        z-index: 3;
        cursor: default;
        color: #ffffff;
        background-color: #278642;
        border-color: #278642;

    }

    .pagination>.terjawab>a, .pagination>.terjawab>a:focus, .pagination>.terjawab>a:hover, .pagination>.terjawab>span, .pagination>.terjawab>span:focus, .pagination>.terjawab>span:hover {
        z-index: 3;
        cursor: default;
        cursor: pointer;
        color: #ffffff;
        background-color: #3eb960;
        border-color: #3eb960;
    }

    .pagination>li:first-child>a, .pagination>li:first-child>span {
        border-radius: 4px;
        border-top-left-radius: 0px; 
        border-bottom-left-radius: 0px; 
    }

    .pagination>li:last-child>a, .pagination>li:last-child>span {
        border-top-left-radius: 0px; 
        border-bottom-left-radius: 0px; 
        border-radius: 4px;

    }

    .pagination>li:last-child>a, .pagination>li:last-child>span {
        border-top-right-radius: 0px;
        border-bottom-right-radius: 0px;
        border-radius: 4px;
    }

    .pagination>.terjawab>a, .pagination>.terjawab>a:focus, .pagination>.terjawab>a:hover, .pagination>.terjawab>span, .pagination>.terjawab>span:focus, .pagination>.terjawab>span:hover {
        border-radius: 4px;
    }

    .pagination>li>a, .pagination>li>span {
        padding: 5px 10px;
    }

    .pagination>li>a, .pagination>li>span {
         line-height: 1.1; 
        color: #3eb960;
        background-color: #fff;
        border: 2px solid #3eb960;
    }

    .pagination>li>a:focus, .pagination>li>a:hover, .pagination>li>span:focus, .pagination>li>span:hover {
        z-index: 2;
        color: #ffffff;
        background-color: #278642;
        border-color: #278642;
    }

    @media only screen and (max-width: 600px) {
        .option-pagin {
            float: left;
            margin-top: 20px;
        }
        .pilih_jawaban {
            line-height: 2;
        }
    }
    </style>
<script type="text/javascript">
  document.addEventListener('contextmenu', event => event.preventDefault());
</script>

@endsection