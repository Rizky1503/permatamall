@extends('mitra::layouts.master-v2')


@section('content')
@if ($message = Session::get('error'))
  <div class="alert alert-danger alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button> 
      <strong>{{ $message }}</strong>
  </div>
@endif
<!--begin:: Widgets/Best Sellers-->
<div class="m-portlet">
    <div class="m-portlet__head">
        <div class="m-portlet__head-caption">
            <div class="m-portlet__head-title">
                <h3 class="m-portlet__head-text">
                </h3>
            </div>
        </div>
        <div class="m-portlet__head-tools">
            <ul class="nav nav-pills nav-pills--brand m-nav-pills--align-right m-nav-pills--btn-pill m-nav-pills--btn-sm" role="tablist">
                <li class="nav-item m-tabs__item">
                    <a class="nav-link m-tabs__link active" data-toggle="tab" href="#m_widget5_tab1_content" role="tab">
                        Jadwal Murid Belajar
                    </a>
                </li>
                <li class="nav-item m-tabs__item">
                    <a class="nav-link m-tabs__link" data-toggle="tab" href="#m_widget5_tab2_content" role="tab">
                        Daftar Pertanyaan
                    </a>
                </li>                
            </ul>
        </div>
    </div>
    <div class="m-portlet__body">
        <!--begin::Content-->
        <div class="tab-content">
            <div class="tab-pane active" id="m_widget5_tab1_content" aria-expanded="true">
                <!--begin::m-widget5-->
                <div class="m-widget5">
                    @if(empty($listMurid))
                        Data Belum Tersedia
                    @else
                    @foreach($listMurid as $key => $listMurids)
                    <div class="m-widget5__item">
                        <div class="m-widget5__pic">
                            <?php
                              if ($listMurids->foto != "") {
                                $foto = ENV('APP_URL_API_RESOURCE').'images/profile/pelanggan/'.$listMurids->foto;;
                              }else{
                                $foto = asset('public/assets/images/not-found.png'); //not-found.png
                              }
                            ?>
                            <img class="m-widget7__img" src="{{ $foto }}" alt="">
                        </div>
                        <div class="m-widget5__content">
                            <h4 class="m-widget5__title">
                                {{ $listMurids->nama }}
                            </h4>
                            <span class="m-widget5__desc">
                                {{ $listMurids->nama }} - {{ $listMurids->module }}
                            </span>
                            <div class="m-widget5__info">
                                <span class="m-widget5__author">
                                    Kota
                                </span>
                                <span class="m-widget5__info-label">
                                    {{ $listMurids->kota }}, 
                                </span>
                                <span class="m-widget5__info-author-name">
                                    Nama Orang Tua
                                </span>
                                <span class="m-widget5__info-label">
                                    {{ $listMurids->nama_ortu }}
                                </span>
                            </div>
                        </div>
                        <div class="m-widget5__stats1">
                            <a href="{{ route('Mitra.Product.jadwal_detail_privat',[encrypt($listMurids->id_order)]) }}" class="btn btn-success">
                                <i class="flaticon-time-3"></i> Lihat Jadwal
                            </a>                            
                        </div>                        
                    </div>      
                    @endforeach  
                    @endif      
                </div>
                <!--end::m-widget5-->
            </div>
            <div class="tab-pane" id="m_widget5_tab2_content" aria-expanded="false">
                <!--begin::m-widget5-->
                <!-- <div class="m-widget3">
                    <div class="m-widget3__item">
                        <div class="m-widget3__header">
                            <div class="m-widget3__user-img">
                                <img class="m-widget3__img" src="assets/app/media/img/users/user1.jpg" alt="">
                            </div>
                            <div class="m-widget3__info">
                                <span class="m-widget3__username">
                                    Melania Trump
                                </span>
                                <br>
                                <span class="m-widget3__time">
                                    2 day ago
                                </span>
                            </div>
                            <span class="m-widget3__status m--font-info">
                                Pending
                            </span>
                        </div>
                        <div class="m-widget3__body">
                            <p class="m-widget3__text">
                                Lorem ipsum dolor sit amet,consectetuer edipiscing elit,sed diam nonummy nibh euismod tinciduntut laoreet doloremagna aliquam erat volutpat.
                            </p>
                        </div>
                    </div>                    
                </div> -->
                <!--end::m-widget5-->
            </div>
        </div>
        <!--end::Content-->
        <br>
    </div>
    &nbsp;
</div>
&nbsp;
@stop
@section('script')
@endsection
