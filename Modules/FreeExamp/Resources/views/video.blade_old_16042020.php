@extends('examppermata::layouts.master2')

@section('content')
<div style="background-image: url('{!! asset('public/images/sidebar/examp.png') !!}'); background-size: cover; text-align: center;font-size: 40px;font-weight: bold;color: #fff; padding-bottom: 80px; padding-top: 80px;">
    Video Tutorial Belajar
</div>
<div class="container" style="padding-bottom: 80px; padding-top: 50px;" id="seach_page">   
  <!-- Pencarian Video -->
  <div class="row">    
    <div class="col-md-12">
      <div class="permata-search" onclick="functionGetOverlay()" id="page_cari_halaman">
        <form action="{{ route('FreeExamp.video_langganan') }}" method="get">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="usr">Tingkat: {{ $_tingkat }}</label>
                <select class="form-control select2" name="tingkat" onchange="getmatapelajaran(this.value)">
                      <option value="">Pilih Tingkat</option>
                    @foreach($tingkat as $listTingkat)
                      <option value="{{ $listTingkat->tingkat }}" @if($_tingkat == $listTingkat->tingkat ? "selected":"") @endif>{{$listTingkat->tingkat}}</option>
                    @endforeach
                </select>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="usr">Mata Pelajaran:</label>
                <select class="form-control select2" name="matapelajaran" id="matapelajaran">
                    <option value="">Pilih Mata Pelajaran</option>
                </select>
              </div>
            </div>            
            <div class="col-md-12" id="buttonCari">
              <div class="form-group">
                <button type="submit" class="btn btn-primary btn-lg" style="float: right;">Cari Video</button>
              </div>
            </div>
          </div>
        </form> 
      </div>
    </div>
  </div>  
  <br><br>
  <div class="row">     
    <div class="col-md-12">
      <div class="row">
        <h2 class="home-subHeader-top" style="null;">
          <span style="null;"></span>{{ $judul }}                   
        </h2>
      </div>
      <div class="row">
        @foreach($video as $ListVideo)
        <article class="col-md-2 video_post postType4" style="height: 320px;">
          <div class="inner row m0" style="height: 289px;">
              <a href="{{ route('FreeExamp.nambah_view',[$ListVideo->slug]) }}">
                <div class="row screencast m0">
                  <img src="{{ ENV('APP_URL_API_RESOURCE').'images/Video/banner/'.$ListVideo->kelas.'/'.$ListVideo->nama_matpel.'/'.$ListVideo->banner }}" alt="" class="cast img-responsive" style="width: 100%">
                  <div class="play_btn"></div>
                  <div class="media-length">{{ $ListVideo->durasi ?? 0 }}</div>
                </div>
              </a>
              <div class="row m0 post_data">
                  <div class="row m0"><a href="{{ route('FreeExamp.nambah_view',[$ListVideo->slug]) }}" class="post_title">{{ substr($ListVideo->title, 0, 30) ?? '-' }} ..</a></div>
                  <div class="fleft date">Upload: {{ \Carbon\Carbon::parse($ListVideo->created_at)->format('d F Y') ?? '' }}</div>
                  <div class="fleft date"><a href="#"><img src="http://uxart.io/downloads/metavideo-html/images/icons/views.png" alt="">Telah Di Lihat: {{ $ListVideo->total_view ?? 0 }} x</a></div> 
              </div> 
          </div>
        </article>    
        @endforeach    
      </div>
      @if($data->lastPage > 1)
      <div style="float: right;">
        <nav aria-label="Page navigation example">
          <ul class="pagination">
            @if($lastPage < $data->lastPage)
            <li class="page-item disabled"><a class="page-link" href="">Sebelumnya</a></li>            
            @else
            <li class="page-item"><a class="page-link" href="{{ route('FreeExamp.video_langganan',['tingkat'=>$_tingkat,'matapelajaran'=>$_matpel,'page'=>$data->page-1]) }}">Sebelumnya</a></li>            
            @endif

            @if($lastPage == $data->lastPage)
            <li class="page-item disabled"><a class="page-link" href="">Selanjutnya</a></li>
            @elseif($lastPage > $data->lastPage)
            <li class="page-item disabled"><a class="page-link" href="">Selanjutnya</a></li>
            @else
            <li class="page-item"><a class="page-link" href="{{  route('FreeExamp.video_langganan',['tingkat'=>$_tingkat,'matapelajaran'=>$_matpel,'page'=>$data->page+1]) }}">Selanjutnya</a></li>
            @endif            
          </ul>
        </nav>
      </div>
      @endif
    </div>  
  </div>
</div>
@endsection
@section('script')
<!-- nama_matpel -->
<script type="text/javascript">

  function getmatapelajaran(value){
    $.ajax({
      type: "GET",
      url: '{{ route("FreeExamp.matpel_video") }}',
      data: {
        tingkat : value,
      },
      success: function(responses){  
        $('#matapelajaran').html(responses);  
      }
  });
  }

  function functionGetLainya(response){
      if (response == "Lainya") {
        $('#KotaLainya').show();
        $('#buttonCari').attr('class','col-md-6');
        $('#buttonCari').attr('style','margin-top:20px;');
        $('#kota_lainya').attr('required','required');
      }else{
        $('#KotaLainya').hide();
        $('#buttonCari').attr('class','col-md-12');
        $('#kota_lainya').removeAttr('required');        
      }
    }

    function functionGetOverlay(){
        $('#page_selain_cari_halaman').addClass("show");
        $('#page_cari_halaman').addClass("focus");
    }

    function functionPostOverlay(){
        $('#page_selain_cari_halaman').removeClass("show");
        $('#page_cari_halaman').removeClass("focus");
    }
</script>

<style type="text/css">
/*----------------------------------------------------
@File: Default Styles
@Author: Emran Khan
@URL: http://emran-khan.com

This file contains the styling for the actual theme, this
is the file you need to edit to change the look of the
theme.

This files contents are outlined below.

  1.  Variables
  2.  Prefix
  3.  Shortcode
  4.  Header
  5.  Upload Media
  6.  Ribbon
  7.  Media - Video Post
  8.  Advertise
  9.  Sidebar
 10. Footer
 11. Filter
 12. Auth
 13. Profile
 14. Single Page
----------------------------------------------------*/
/*----------------------------------------------------------------*/
/*----------------------------------------------------------------*/
/*Prefix Styles*/

.home-subHeader-top {
    padding: 0 0 10px;
    font-size: 22px;
    font-weight: 500;
    width: 50%; 
    margin-bottom: 0;
}

.home-subHeader-top span {
    border-left: 3px solid #41c866;
    margin-right: 10px;
}

.m0 {
  margin: 0;
}
.p0 {
  padding: 0;
}
body {
  position: relative;
  /*Global Font*/
  /*Floating*/
  /*Section Fix*/
  /*Container Prefix*/
}
body * {
  font-family: 'Open Sans', sans-serif;
}
body .fleft {
  float: left;
}
body .fright {
  float: right;
}
body .flefti {
  float: left !important;
}
body .frighti {
  float: right !important;
}
body section.row,
body header.row,
body footer.row {
  margin: 0;
  position: relative;
}
body .mfp-container {
  width: 100vw;
  padding: 0;
}
/*Ancore*/
a,
.btn,
button {
  outline: none;
  transition: all 300ms ease-in-out 0s;
}
a:focus,
.btn:focus,
button:focus,
a:hover,
.btn:hover,
button:hover {
  outline: none;
  text-decoration: none;
  transition: all 300ms ease-in-out 0s;
}
/*----------------------------------------------------------------*/
.title_row {
  padding: 0 15px;
}
.title_row h3 {
  font-size: 22px;
  border-bottom: 2px solid  #e8ebed;
  position: relative;
  margin-bottom: 25px;
  margin-top: 0;
  text-transform: uppercase;
  font-weight: bold;
  color: #43494e;
  line-height: 1;
  padding-bottom: 13px;
}
.title_row h3:after {
  position: relative;
  height: 2px;
  background: #4aa3df;
  width: 80px;
  content: '';
  left: 0;
  bottom: -15px;
  display: block;
}
.load_more_videos,
.loadting_text {
  display: block;
  line-height: 60px;
  color: #828a91;
  text-transform: uppercase;
  font-weight: 600;
  text-align: center;
  background: #f1f4f5;
  margin-top: 15px;
  margin-left: 15px;
  margin-right: 15px;
  transition: all 300ms ease-in-out 0s;
}
.load_more_videos:hover,
.loadting_text:hover,
.load_more_videos:focus,
.loadting_text:focus {
  color: #fff;
  background: #4aa3df;
}
.load_more_videos:focus,
.loadting_text:focus {
  color: #43494e;
}
.loadting_text i {
  margin-right: 5px;
}
.post_page_sidebar {
  padding-top: 15px;
}
.post_page_sidebar .advertise_row {
  margin: 45px auto;
}
.post_page_sidebar.post_page_sidebar2 .post_page_uploads {
  float: none;
  margin: 0 auto;
}
.pagination_row {
  padding: 40px 15px;
}
.pagination_row .pagination {
  float: none;
  display: table;
  margin: 0 auto;
}
.pagination_row .pagination li {
  float: left;
}
.pagination_row .pagination li a {
  min-width: 33px;
  text-align: center;
  padding: 0 13px;
  background: #f1f4f5;
  line-height: 32px;
  border: none;
  border-radius: 2px;
  color: #43494e;
  text-transform: uppercase;
  font-weight: 600;
}
.pagination_row .pagination li a:hover {
  background: #4aa3df;
  color: #fff;
}
.pagination_row .pagination li + li {
  margin-left: 10px;
}
.pagination_row .pagination li.active a {
  background: #4aa3df;
  color: #fff;
}
.pagination_row .pagination li:first-child a,
.pagination_row .pagination li:last-child a {
  width: 90px;
}
.page_cover {
  height: 200px;
  background: #232323;
  z-index: 2;
  color: #fff;
  padding-top: 60px;
}
.page_cover:before {
  content: '';
  width: 100%;
  height: 100%;
  position: absolute;
  top: 0;
  left: 0;
  background: url(../../images/page-cover.jpg) no-repeat scroll center top;
  z-index: -1;
  opacity: 0.2;
}
.page_cover h1 {
  font-weight: 300;
  margin: 0;
}
.page_cover .breadcrumb {
  background: none;
  padding: 16px 0 0;
  font-size: 18px;
  margin-bottom: 0;
}
.page_cover .breadcrumb li a {
  color: #fff;
}
.page_cover .breadcrumb li + li {
  color: #fff;
}
.page_cover .breadcrumb li + li:before {
  content: '>';
}
/*----------------------------------------------------------------*/
.upload_media {
  background: #232323;
  position: relative;
  height: 640px;
  z-index: 0;
  text-align: center;
  padding-top: 140px;
}
.upload_media:before {
  position: absolute;
  top: 0;
  left: 0;
  height: 100%;
  width: 100%;
  content: '';
  background: url(../../images/even-slider-2.jpg) no-repeat scroll center top;
  background-size: cover;
  z-index: -1;
}
.upload_media h2 {
  font-size: 48px;
  line-height: 1;
  font-weight: lighter;
  color: #fff;
  margin-bottom: 0;
  margin-top: 13px;
}
.upload_media h3 {
  font-size: 24px;
  line-height: 1;
  font-weight: lighter;
  color: #fff;
  margin-bottom: 55px;
}
.upload_media .upload_media_row {
  display: block;
  overflow: hidden;
  max-width: 1015px;
  margin: 0 auto;
}
.upload_media #upload_media,
.upload_media #upload_media_2 {
  width: 460px;
  height: 340px;
  background: #fff;
  color: #828a91;
  padding: 30px;
  margin: auto 15px;
  cursor: pointer;
  position: relative;
  float: left;
}
.upload_media #upload_media .inner,
.upload_media #upload_media_2 .inner {
  width: 100%;
  height: 100%;
  border: 5px dashed #dce0e2;
  padding-top: 30px;
}
.upload_media #upload_media .plus_ico,
.upload_media #upload_media_2 .plus_ico {
  width: 100px;
  height: 100px;
  margin: 0 auto 30px;
  text-align: center;
  line-height: 90px;
  font-size: 100px;
  font-weight: bold;
  background: #f1f4f5;
  border-radius: 100%;
  transition: all 300ms ease-in-out 0s;
}
.upload_media #upload_media h2,
.upload_media #upload_media_2 h2 {
  font-size: 30px;
  color: #2e373e;
  margin: 0;
  font-weight: 600;
}
.upload_media #upload_media h6,
.upload_media #upload_media_2 h6 {
  font-size: 14px;
  color: #a7b7c3;
  padding-bottom: 20px;
}
.upload_media #upload_media h4,
.upload_media #upload_media_2 h4 {
  font-size: 18px;
  color: #2e373e;
}
.upload_media #upload_media h5,
.upload_media #upload_media_2 h5 {
  font-size: 14px;
  color: #2e373e;
}
.upload_media #upload_media label,
.upload_media #upload_media_2 label {
  cursor: pointer;
  margin-bottom: 10px;
  padding: 0 22px;
  line-height: 42px;
  border-radius: 5px;
  background: #4aa3df;
  color: #fff;
  font-weight: 700;
  font-size: 16px;
  text-transform: uppercase;
  transition: all 300ms ease-in-out 0s;
}
.upload_media #upload_media label img,
.upload_media #upload_media_2 label img {
  margin-right: 10px;
}
.upload_media #upload_media label:hover,
.upload_media #upload_media_2 label:hover {
  background: #c9392b;
}
.upload_media #upload_media .dz-default.dz-message,
.upload_media #upload_media_2 .dz-default.dz-message {
  bottom: 70px;
  width: calc(100% - 60px);
  position: absolute;
}
.upload_media #upload_media:hover .plus_ico,
.upload_media #upload_media_2:hover .plus_ico {
  color: #fff;
  background: #4aa3df;
}
.upload_media .or_btn {
  line-height: 32px;
  width: 32px;
  border-radius: 50%;
  background-color: rgba(0, 0, 0, 0.4);
  color: #fff;
  display: inline-block;
  float: left;
  margin-top: 155px;
}
.upload_media .videos_from h2 {
  padding-bottom: 5px;
}
.upload_media .videos_from a {
  text-align: center;
  line-height: 50px;
  display: block;
  background: #e74c3c;
  color: #fff;
  border-radius: 2px;
  margin: 10px 50px;
}
.upload_media .videos_from a.vimeo {
  background: #1ab7ea;
}
.upload_media .videos_from a.dailymotion {
  background: #0064dc;
}
/*----------------------------------------------------------------*/
.ribbon li {
  height: 8px;
}
.ribbon li a {
  padding: 4px 15px;
  transform: scaleY(1) scaleX(1);
  position: relative;
  z-index: 1;
  cursor: default;
}
.ribbon li:nth-child(1) a {
  background: #1abc9c;
}
.ribbon li:nth-child(2) a {
  background: #e67e22;
}
.ribbon li:nth-child(3) a {
  background: #3498db;
}
.ribbon li:nth-child(4) a {
  background: #e74c3c;
}
.ribbon li:nth-child(5) a {
  background: #9b59b6;
}
.ribbon li:nth-child(6) a {
  background: #f1c40f;
}
/*----------------------------------------------------------------*/
.recent_uploads {
  padding: 95px 0 60px;
}
.author_interview {
  padding-bottom: 30px;
}
.category_based {
  padding-top: 95px;
}
.video_post {
  padding: 15px;
}
.video_post .inner {
  box-shadow: 0 1px 10px 0 rgba(0, 0, 0, 0.09);
  background: #fff;
  border-bottom: 0;
  transition: all 0.6s cubic-bezier(0.165, 0.84, 0.44, 1);
}
.video_post .inner:hover,
.video_post .inner:focus {
  -webkit-transform: translate(0, -8px);
  -moz-transform: translate(0, -8px);
  -ms-transform: translate(0, -8px);
  -o-transform: translate(0, -8px);
  transform: translate(0, -8px);
  box-shadow: 0 15px 40px rgba(0, 0, 0, 0.16);
}
.video_post .inner .screencast {
  position: relative;
}
.video_post .inner .screencast .play_btn {
  position: absolute;
  width: 48px;
  height: 33px;
  background: url(../../images/play-btn.png) no-repeat scroll 0 0;
  top: calc(50% - 16.5px);
  left: calc(50% - 24px);
}
.video_post .inner .screencast .media-length {
  position: absolute;
  background: #4aa3df;
  line-height: 20px;
  font-size: 12px;
  padding: 0 5px;
  left: 0;
  bottom: 0;
  color: #fff;
}
.video_post .inner .post_data {
  padding: 12px 15px;
  padding-bottom: 25px;
}
.video_post .inner .post_data .post_title {
  font-weight: 600;
  line-height: 22px;
  color: #43494e;
}
.video_post .inner .post_data .author,
.video_post .inner .post_data .date {
  color: #43494e;
  font-size: 12px;
  font-weight: 600;
}
.video_post .inner .post_data .author a,
.video_post .inner .post_data .date a {
  color: #43494e;
}
.video_post .inner .post_data .author {
  margin-right: 30px;
}
.video_post .inner .post_data .category,
.video_post .inner .post_data .views {
  display: block;
}
.video_post .inner .post_data .category a,
.video_post .inner .post_data .views a {
  color: #43494e;
  font-size: 12px;
  font-weight: 600;
  display: block;
  padding: 10px 0px;
  white-space: nowrap;
}
.video_post .inner .post_data .category a img,
.video_post .inner .post_data .views a img {
  margin-right: 5px;
}
.video_post .inner .post_data .views a {
  padding: 0;
}
.video_post .inner .post_data .post_title {
  font-size: 11px;
  display: block;
  padding-bottom: 15px;
}
.video_post .inner .taxonomy .category {
  margin-right: 1px;
}
.video_post .inner .taxonomy .views {
  margin-left: 1px;
  text-align: right;
}
.video_post .inner .taxonomy .category,
.video_post .inner .taxonomy .views {
  width: calc(50% - 1px);
}
.video_post .inner .taxonomy .category a,
.video_post .inner .taxonomy .views a {
  background: #f1f4f5;
  color: #43494e;
  font-size: 12px;
  font-weight: 600;
  display: block;
  padding: 12px 15px;
  min-height: 43px;
  white-space: nowrap;
}
.video_post .inner .taxonomy .category a img,
.video_post .inner .taxonomy .views a img {
  margin-right: 5px;
}
.video_post .inner:hover .screencast .play_btn {
  background-image: url(../../images/play-btn-hover.png);
}
.video_post .inner:hover .post_data .post_title {
  color: #4aa3df;
}
.feature_post {
  margin-bottom: 30px;
}
.feature_post .feature_post_inner .feature_img {
  float: left;
  padding-right: 30px;
}
.feature_post .feature_post_inner .feature_img a {
  width: auto;
  height: auto;
  display: block;
  position: relative;
}
.feature_post .feature_post_inner .feature_img a img {
  width: auto;
  max-width: 100%;
  border-radius: 0;
}
.feature_post .feature_post_inner .feature_img a .duration {
  position: absolute;
  top: 0;
  right: 0;
  color: #fff;
  font-size: 12px;
  padding: 0 5px;
  display: block;
  line-height: 20px;
  background: #4aa3df;
  transition: all 300ms ease-in-out 0s;
}
.feature_post .feature_post_inner .feature_img a:hover .duration {
  color: #f1f4f5;
  background: #43494e;
}
.feature_post .feature_post_inner .feature_body h4 {
  margin-top: 0;
  line-height: 22px;
  font-weight: 600;
  color: #43494e;
  margin-bottom: 15px;
  transition: all 300ms ease-in-out 0s;
}
.feature_post .feature_post_inner .feature_body h4:hover {
  color: #4aa3df;
}
.feature_post .feature_post_inner .feature_body p {
  line-height: 20px;
  color: #43494e;
  margin-bottom: 15px;
}
.feature_post .feature_post_inner .feature_body .meta_info {
  font-size: 12px;
  color: #828a91;
  line-height: 18px;
}
.feature_post .feature_post_inner .feature_body .meta_info.posted a {
  color: #828a91;
}
.feature_post .feature_post_inner .feature_body .views a {
  color: #43494e;
  font-size: 12px;
  font-weight: 600;
}
.feature_post .feature_post_inner .feature_body .views a img {
  margin-right: 5px;
}
.feature_post_2 {
  display: block;
  overflow: hidden;
}
.feature_post_2 .feature_post_inner .feature_img {
  padding-right: 15px;
  display: block;
  overflow: hidden;
}
.feature_post_2 .feature_post_inner .feature_img a {
  height: 270px;
}
.feature_post_2 .feature_post_inner .feature_body h4 {
  font-size: 30px;
  line-height: 40px;
}
.feature_post_2 .feature_post_inner .feature_body .posted {
  display: inline-block;
  font-size: 16px;
}
.feature_post_2 .feature_post_inner .feature_body .views {
  display: inline-block;
  padding-left: 20px;
}
.feature_post_2 .feature_post_inner .feature_body .views a {
  font-size: 14px;
}
.feature_post_2 .feature_post_inner .feature_body p {
  padding-top: 20px;
  font-size: 16px;
}
.feature_post_2 .feature_post_inner .feature_body .read-more {
  font-size: 18px;
  color: #313b42;
  font-weight: 600;
}
.feature_post_2 .feature_post_inner .feature_body .read-more:hover,
.feature_post_2 .feature_post_inner .feature_body .read-more:focus {
  color: #4aa3df;
}
/*----------------------------------------------------------------*/
.advertise_betweeen_uploads {
  text-align: center;
  color: #fff;
}
.advertise_betweeen_uploads .inner {
  border-radius: 3px;
  background: #4aa3df;
  padding: 149px 0;
  border: none;
}
.advertise_betweeen_uploads .inner h3 {
  margin: 0;
  line-height: 33px;
  font-weight: bold;
}
.advertise_row {
  background: #4aa3df;
  color: #fff;
  width: 760px;
  max-width: 100%;
  margin: 0 auto 60px;
}
.advertise_row h3 {
  margin: 0;
  line-height: 90px;
  font-weight: bold;
  text-align: center;
}
.advertise_area {
  padding-top: 10px;
}
.advertise_area .advertise_row {
  background-color: transparent;
  width: 100%;
  text-align: center;
}
.advertise_area .advertise_row img {
  max-width: 100%;
}
.advertise_2 {
  padding-top: 40px;
}
/*----------------------------------------------------------------*/
.sidebar.sidebar1 {
  padding: 95px 0 80px;
  background: #f7f8f9;
}
.sidebar.sidebar2,
.sidebar.sidebar3 {
  padding: 15px 15px 85px;
}
.sidebar.sidebar2 .widget + .widget,
.sidebar.sidebar3 .widget + .widget {
  margin-top: 25px;
}
.sidebar.sidebar3 {
  width: 316px;
  padding-top: 30px;
  padding-right: 30px;
  position: absolute;
  top: 0;
  right: 0;
}
.sidebar.sidebar3 .sidebar_row_inner {
  margin-right: 0;
  padding-left: 0;
}
.widget .widget_title {
  line-height: 1;
  color: #43494e;
  text-transform: uppercase;
  padding-bottom: 15px;
  margin: 0 0 30px;
  border-bottom: 1px solid  #e8ebed;
  position: relative;
  font-weight: bold;
}
.widget .widget_title:after {
  content: '';
  width: 70px;
  height: 1px;
  background: #4aa3df;
  bottom: -1px;
  left: 0;
  position: absolute;
}
.widget.widget_post_from_blog .post_from_blog + .post_from_blog {
  margin-top: 30px;
}
.widget.widget_post_from_blog .post_from_blog .featured_img {
  margin-bottom: 15px;
}
.widget.widget_post_from_blog .post_from_blog .featured_img a {
  display: block;
}
.widget.widget_post_from_blog .post_from_blog .featured_img a img {
  display: block;
}
.widget.widget_post_from_blog .post_from_blog .the_title a {
  display: inline-block;
  color: #43494e;
  line-height: 1.2;
  font-weight: bold;
}
.widget.widget_post_from_blog .post_from_blog:hover .the_title a {
  color: #4aa3df;
}
.widget.widget_recommended_to_follow .media + .media {
  margin-top: 20px;
}
.widget.widget_recommended_to_follow .media .media-left {
  padding-right: 20px;
}
.widget.widget_recommended_to_follow .media .media-left a {
  width: 70px;
  height: 70px;
  display: block;
}
.widget.widget_recommended_to_follow .media .media-left a img {
  width: 100%;
  border-radius: 100%;
}
.widget.widget_recommended_to_follow .media .media-body h5 {
  margin-top: 0;
  line-height: 20px;
  font-weight: 600;
  color: #43494e;
}
.widget.widget_recommended_to_follow .media .media-body .btn-group {
  border-radius: 3px;
}
.widget.widget_recommended_to_follow .media .media-body .btn-group a {
  line-height: 22px;
  padding: 0 20px;
  border: 1px solid #c9ced1;
  text-transform: uppercase;
  color: #828a91;
}
.widget.widget_recommended_to_follow .media .media-body .btn-group a + a {
  border: 0;
  background: #4aa3df;
  line-height: 24px;
  color: #fff;
}
.widget.widget_recommended_to_follow .media .media-body .btn-group a + a:hover {
  background: #c9392b;
  color: #f1f4f5;
  border-color: #43494e;
}
.widget.widget_recommended_to_follow .media .media-body .btn-group a + a:focus {
  background: #6b7881;
}
.widget.widget_recommended_to_follow .media:hover .media-body h5 {
  color: #4aa3df;
}
.widget.widget_popular_videos .media + .media {
  margin-top: 20px;
}
.widget.widget_popular_videos .media .media-left {
  padding-right: 20px;
}
.widget.widget_popular_videos .media .media-left a {
  width: 120px;
  height: 80px;
  display: block;
  position: relative;
}
.widget.widget_popular_videos .media .media-left a img {
  width: 100%;
  border-radius: 2px;
}
.widget.widget_popular_videos .media .media-left a .duration {
  position: absolute;
  top: 0;
  right: 0;
  color: #fff;
  font-size: 12px;
  padding: 0 5px;
  display: block;
  line-height: 20px;
  background: #4aa3df;
  transition: all 300ms ease-in-out 0s;
}
.widget.widget_popular_videos .media .media-body h5 {
  margin-top: 0;
  line-height: 20px;
  font-weight: 600;
  color: #43494e;
  margin-bottom: 5px;
  transition: all 300ms ease-in-out 0s;
}
.widget.widget_popular_videos .media .media-body .meta_info {
  font-size: 12px;
  color: #828a91;
  line-height: 18px;
}
.widget.widget_popular_videos .media:hover .media-body h5 {
  color: #4aa3df;
}
.widget.w_in_footer .widget_title {
  color: #fff;
  border-bottom: 1px solid  #47545d;
}
.widget.w_in_footer.widget_about a {
  display: inline-block;
  margin-bottom: 30px;
}
.widget.w_in_footer.widget_about p {
  margin-bottom: 0;
  color: #fff;
  font-weight: 400;
}
.widget.w_in_footer.widget_subscribe form .form-control {
  background-color: transparent;
  border: 1px solid #fff;
  border-radius: 2px;
  height: 40px;
  padding: 0 20px;
  line-height: 38px;
  transition: all 300ms ease-in-out 0s;
}
.widget.w_in_footer.widget_subscribe form .form-control:focus {
  border-color: #4aa3df;
  box-shadow: inset 0 1px 1px rgba(74, 163, 223, 0.75), 0 0 8px rgba(74, 163, 223, 0.8);
}
.widget.w_in_footer.widget_subscribe form .form-control + .form-control {
  margin-top: 10px;
}
.widget.w_in_footer.widget_subscribe form .form-control::-moz-placeholder {
  color: #6b7881;
  opacity: 1;
  text-transform: capitalize;
  transition: all 300ms ease-in-out 0s;
}
.widget.w_in_footer.widget_subscribe form .form-control:-ms-input-placeholder {
  color: #6b7881;
  text-transform: capitalize;
  transition: all 300ms ease-in-out 0s;
}
.widget.w_in_footer.widget_subscribe form .form-control::-webkit-input-placeholder {
  color: #6b7881;
  text-transform: capitalize;
  transition: all 300ms ease-in-out 0s;
}
.widget.w_in_footer.widget_subscribe form .form-control:focus::-moz-placeholder {
  color: #f1f4f5;
}
.widget.w_in_footer.widget_subscribe form .form-control:focus:-ms-input-placeholder {
  color: #f1f4f5;
}
.widget.w_in_footer.widget_subscribe form .form-control:focus::-webkit-input-placeholder {
  color: #f1f4f5;
}
.widget.w_in_footer.widget_subscribe form .form-control.btn {
  background: #4aa3df;
  text-shadow: none;
  color: #fff;
  text-transform: uppercase;
  font-weight: bold;
  border: none;
  transition: all 300ms ease-in-out 0s;
}
.widget.w_in_footer.widget_subscribe form .form-control.btn:hover {
  background: #4aa3df;
  color: #f1f4f5;
}
.widget.w_in_footer.widget_tags .tag {
  color: #fff;
  border: 1px solid #fff;
  border-radius: 2px;
  display: inline-block;
  line-height: 28px;
  padding: 0 13px;
  text-transform: uppercase;
  font-size: 12px;
  margin-right: 5px;
  margin-bottom: 7px;
}
.widget.w_in_footer.widget_tags .tag:hover {
  color: #f1f4f5;
  border-color: #4aa3df;
  background: #4aa3df;
}
.widget.w_in_footer.widget_twitter .tweet {
  line-height: 20px;
  color: #fff;
}
.widget.w_in_footer.widget_twitter .tweet + .tweet {
  margin-top: 10px;
}
.widget.w_in_footer.widget_twitter .tweet a {
  color: #4aa3df;
  margin-right: 5px;
  display: inline-block;
}
.widget.w_in_footer.widget_twitter .tweet a:hover {
  color: #f1f4f5;
}
/*----------------------------------------------------------------*/
footer.row {
  background: #313b42;
  padding: 95px 0 50px;
}
#preloader {
  position: fixed;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ffffff;
  z-index: 99999999;
}
#status {
  width: 200px;
  height: 200px;
  position: absolute;
  left: 50%;
  top: 50%;
  background-image: url('../../images/preloader.svg');
  background-repeat: no-repeat;
  background-position: center;
  margin: -100px 0 0 -100px;
}
/*----------------------------------------------------------------*/
.search_filter {
  background: #313b42;
  padding: 24px 0;
}
.search_filter .category_filter .btn.dropdown-toggle {
  border-radius: 2px;
  background: none transparent;
  text-shadow: none;
  border-color: #fff;
  color: #fff;
  box-shadow: none;
  text-transform: uppercase;
  line-height: 38px;
  height: 40px;
  padding: 0;
  width: 220px;
}
.search_filter .category_filter .btn.dropdown-toggle .filter-option {
  float: left;
  padding: 0 15px;
  width: calc(100% - 30px);
  font-weight: 600;
  text-align: left;
}
.search_filter .category_filter .btn.dropdown-toggle .caret {
  border: none;
  border-left: 1px solid #fff;
  display: inline-block;
  line-height: 38px;
  height: 38px;
  width: 30px;
  float: right;
  margin-top: 0;
  top: 0;
  right: 0;
  background: url(../../images/icons/dropdown-arrow2.png) no-repeat center center transparent;
  transition: background 300ms ease-in-out 0s;
}
.search_filter .category_filter .btn.dropdown-toggle.active {
  border-color: #4aa3df;
  color: #4aa3df;
}
.search_filter .category_filter .btn.dropdown-toggle.active .caret {
  border-left-color: #4aa3df;
  background-image: url(../../images/icons/dropdown-arrow-active.png);
}
.search_filter .category_filter .btn.dropdown-toggle + .dropdown-menu {
  border-radius: 0 0 5px 5px;
  padding: 0;
  text-transform: capitalize;
  border: none;
  width: 100%;
  transform: scale(1, 0);
  display: block;
  transform-origin: top;
  transition: all 300ms ease-in-out 0s;
}
.search_filter .category_filter .btn.dropdown-toggle + .dropdown-menu li {
  background: #313b42;
  transition: all 300ms ease-in-out 0s;
}
.search_filter .category_filter .btn.dropdown-toggle + .dropdown-menu li + li {
  border-top: 1px solid #6b7881;
}
.search_filter .category_filter .btn.dropdown-toggle + .dropdown-menu li:hover {
  border-top-color: #4aa3df;
}
.search_filter .category_filter .btn.dropdown-toggle + .dropdown-menu li:hover + li {
  border-top-color: #4aa3df;
}
.search_filter .category_filter .btn.dropdown-toggle + .dropdown-menu li a {
  color: #6b7881;
  line-height: 42px;
  padding: 0 15px;
}
.search_filter .category_filter .btn.dropdown-toggle + .dropdown-menu li a .badge {
  background: #444f57;
  font-weight: lighter;
  margin: 12px 0;
  color: #9ca7af;
  position: absolute;
  right: 15px;
  transition: all 300ms ease-in-out 0s;
}
.search_filter .category_filter .btn.dropdown-toggle + .dropdown-menu li a:hover,
.search_filter .category_filter .btn.dropdown-toggle + .dropdown-menu li a:focus {
  color: #fff;
  background: #4aa3df;
}
.search_filter .category_filter .btn.dropdown-toggle + .dropdown-menu li a:hover .badge,
.search_filter .category_filter .btn.dropdown-toggle + .dropdown-menu li a:focus .badge {
  background: #4ab3df;
  color: #fff;
}
.search_filter .category_filter .btn.dropdown-toggle + .dropdown-menu li.selected {
  border-top-color: #4aa3df;
}
.search_filter .category_filter .btn.dropdown-toggle + .dropdown-menu li.selected + li {
  border-top-color: #4aa3df;
}
.search_filter .category_filter .btn.dropdown-toggle + .dropdown-menu li.selected a {
  color: #fff;
  background: #4aa3df;
}
.search_filter .category_filter .btn.dropdown-toggle + .dropdown-menu li.selected a .badge {
  background: #cf3b2c;
  color: #fff;
}
.search_filter .category_filter.open .btn .caret {
  background-image: url(../../images/author/dropdown-arrow2-open.png);
}
.search_filter .category_filter.open .btn + .dropdown-menu {
  transform: scale(1, 1);
}
.search_filter .postTypeFilter {
  margin: 0 0 0 180px;
  padding: 5px 0;
}
.search_filter .postTypeFilter.ml0 {
  margin-left: 0;
}
.search_filter .postTypeFilter .btn {
  background: none;
  border: 1px solid #fff;
  border-radius: 20px;
  padding: 0 15px 0 0;
  line-height: 28px;
  height: 30px;
  box-shadow: none;
  color: #fff;
}
.search_filter .postTypeFilter .btn:not(:first-child):not(:last-child):not(.dropdown-toggle) {
  border-radius: 20px;
}
.search_filter .postTypeFilter .btn:first-child:not(:last-child):not(.dropdown-toggle) {
  border-top-right-radius: 20px;
  border-bottom-right-radius: 20px;
}
.search_filter .postTypeFilter .btn + .btn {
  margin-left: 8px;
  border-radius: 20px;
}
.search_filter .postTypeFilter .btn.active {
  background: #4aa3df;
  border-color: #4aa3df;
  color: #fff;
}
.search_filter .postTypeFilter .btn:before {
  width: 40px;
  float: left;
  content: '';
  height: 30px;
  background: no-repeat scroll center center;
}
.search_filter .postTypeFilter .btn:first-child:before {
  background-image: url(../../images/icons/chart-active.png);
}
.search_filter .postTypeFilter .btn:nth-child(2):before {
  background-image: url(../../images/icons/video-active.png);
}
.search_filter .postTypeFilter .btn:nth-child(3):before {
  background-image: url(../../images/icons/camera-active.png);
}
.search_filter .postTypeFilter .btn:last-child:before {
  background-image: url(../../images/icons/audio-headphone.png);
}
.search_filter.search_filter_type2 .listing_type {
  margin-right: 0;
}
.search_form,
.widget.widget_search {
  width: 244px;
}
.search_form .input-group .form-control,
.widget.widget_search .input-group .form-control {
  background: none;
  line-height: 38px;
  height: 40px;
  border-color: #fff;
}
.search_form .input-group .form-control::-moz-placeholder,
.widget.widget_search .input-group .form-control::-moz-placeholder {
  color: #fff;
  opacity: 1;
  text-transform: uppercase;
  transition: all 300ms ease-in-out 0s;
}
.search_form .input-group .form-control:-ms-input-placeholder,
.widget.widget_search .input-group .form-control:-ms-input-placeholder {
  color: #fff;
  text-transform: uppercase;
  transition: all 300ms ease-in-out 0s;
}
.search_form .input-group .form-control::-webkit-input-placeholder,
.widget.widget_search .input-group .form-control::-webkit-input-placeholder {
  color: #fff;
  text-transform: uppercase;
  transition: all 300ms ease-in-out 0s;
}
.search_form .input-group .form-control:focus::-moz-placeholder,
.widget.widget_search .input-group .form-control:focus::-moz-placeholder {
  color: #fff;
}
.search_form .input-group .form-control:focus:-ms-input-placeholder,
.widget.widget_search .input-group .form-control:focus:-ms-input-placeholder {
  color: #fff;
}
.search_form .input-group .form-control:focus::-webkit-input-placeholder,
.widget.widget_search .input-group .form-control:focus::-webkit-input-placeholder {
  color: #fff;
}
.search_form .input-group .form-control + span,
.widget.widget_search .input-group .form-control + span {
  padding: 0;
  background: none;
  border-color: #fff;
}
.search_form .input-group .form-control + span button,
.widget.widget_search .input-group .form-control + span button {
  padding: 0;
  width: 35px;
  height: 38px;
  line-height: 38px;
  text-align: center;
  background: none;
  border: none;
  color: #fff;
}
.widget.widget_search {
  width: auto;
}
.widget.widget_search .input-group .form-control {
  border-color: #e8ebec;
}
.widget.widget_search .input-group .form-control::-moz-placeholder {
  color: #828a91;
}
.widget.widget_search .input-group .form-control:-ms-input-placeholder {
  color: #828a91;
}
.widget.widget_search .input-group .form-control::-webkit-input-placeholder {
  color: #828a91;
}
.widget.widget_search .input-group .form-control:focus::-moz-placeholder {
  color: #313b42;
}
.widget.widget_search .input-group .form-control:focus:-ms-input-placeholder {
  color: #313b42;
}
.widget.widget_search .input-group .form-control:focus::-webkit-input-placeholder {
  color: #313b42;
}
.widget.widget_search .input-group .form-control + span {
  border-color: #e8ebec;
}
/*----------------------------------------------------------------*/
.auth_form {
  width: 100vw;
  height: 100vh;
  background: #fff;
}
.auth_form .form-inner .form-header,
.auth_form .form-inner .options_header {
  text-align: center;
}
.auth_form .form-inner .form-header a,
.auth_form .form-inner .options_header a {
  display: inline-block;
}
.auth_form .form-inner .form-header h4,
.auth_form .form-inner .options_header h4 {
  margin: 25px 0;
  line-height: 1;
  font-weight: normal;
  color: #43494e;
}
.auth_form .form-inner .form-header h4 a,
.auth_form .form-inner .options_header h4 a {
  display: inline-block;
  color: #4aa3df;
  text-decoration: underline;
}
.auth_form .form-inner .form-header h4 a:hover,
.auth_form .form-inner .options_header h4 a:hover {
  text-decoration: none;
}
.auth_form .form-inner .form-body .form-control {
  background-color: transparent;
  border: 1px solid #e8ebec;
  border-radius: 2px;
  height: 40px;
  padding: 0 20px;
  line-height: 38px;
  transition: all 300ms ease-in-out 0s;
}
.auth_form .form-inner .form-body .form-control:focus {
  border-color: #4aa3df;
  box-shadow: inset 0 1px 1px rgba(74, 163, 223, 0.75), 0 0 8px rgba(74, 163, 223, 0.8);
}
.auth_form .form-inner .form-body .form-control + .form-control {
  margin-top: 10px;
}
.auth_form .form-inner .form-body .form-control::-moz-placeholder {
  color: #828a91;
  opacity: 1;
  text-transform: capitalize;
  transition: all 300ms ease-in-out 0s;
}
.auth_form .form-inner .form-body .form-control:-ms-input-placeholder {
  color: #828a91;
  text-transform: capitalize;
  transition: all 300ms ease-in-out 0s;
}
.auth_form .form-inner .form-body .form-control::-webkit-input-placeholder {
  color: #828a91;
  text-transform: capitalize;
  transition: all 300ms ease-in-out 0s;
}
.auth_form .form-inner .form-body .form-control:focus::-moz-placeholder {
  color: #6b7881;
}
.auth_form .form-inner .form-body .form-control:focus:-ms-input-placeholder {
  color: #6b7881;
}
.auth_form .form-inner .form-body .form-control:focus::-webkit-input-placeholder {
  color: #6b7881;
}
.auth_form .form-inner .form-body .form-control[type="submit"] {
  background: #4aa3df;
  text-shadow: none;
  color: #fff;
  text-transform: uppercase;
  border: none;
  padding: 0;
  line-height: 40px;
  height: 42px;
  margin-top: 30px;
  transition: all 300ms ease-in-out 0s;
}
.auth_form .form-inner .form-body .form-control[type="submit"]:hover {
  background: #43494e;
  color: #f1f4f5;
}
.auth_form .form-inner .form-footer {
  text-align: center;
  padding-top: 20px;
}
.auth_form .form-inner .form-footer button.mfp-close {
  position: relative;
  display: inline-block;
  width: 25px;
  height: 25px;
  background: url(../../images/icons/close.png) no-repeat scroll center center;
}
.signup_form .form-inner {
  width: 320px;
  margin: 0 auto;
  margin-top: calc(50vh - 181px);
}
.login_form {
  width: 100vw;
  height: 100vh;
  background: #fff;
}
.login_form .form-inner {
  width: 520px;
  margin: 0 auto;
  margin-top: calc(50vh - 298px);
}
.login_form .form-inner .login_options .login_with_social_media {
  text-align: center;
  width: 390px;
  margin: 0 auto;
  padding-bottom: 30px;
  border-bottom: 1px solid #e8ebec;
}
.login_form .form-inner .login_options .login_with_social_media a {
  display: inline-block;
}
.login_form .form-inner .login_options .login_with_social_media a + a {
  margin-top: 10px;
}
.login_form .form-inner .form-header,
.login_form .form-inner .form-body,
.login_form .form-inner .form-footer {
  width: 320px;
  margin: 0 auto;
}
.login_form .form-inner .form-header h4,
.login_form .form-inner .form-body h4,
.login_form .form-inner .form-footer h4 {
  margin: 25px 0 15px;
}
/*----------------------------------------------------------------*/
.author_details {
  padding-top: 15px;
}
.author_details .author_cover img {
  width: 100%;
}
.author_details .author_photo_name {
  padding-bottom: 40px;
}
.author_details .author_photo_name img {
  width: 110px;
  height: 110px;
  border: none;
  margin-left: 25px;
  margin-top: -55px;
}
.author_details .author_photo_name h3 {
  font-weight: 600;
  color: #43494e;
}
.author_details .follow_n_count {
  padding-top: 60px;
}
.author_details .follow_n_count .btn-group {
  border-radius: 3px;
  float: right;
}
.author_details .follow_n_count .btn-group a {
  line-height: 22px;
  padding: 0 20px;
  border: 1px solid #c9ced1;
  text-transform: uppercase;
  color: #828a91;
}
.author_details .follow_n_count .btn-group a:hover {
  background: #43494e;
  color: #f1f4f5;
  border-color: #43494e;
}
.author_details .follow_n_count .btn-group a + a {
  border: 0;
  background: #5edb87;
  line-height: 24px;
  color: #fff;
}
.author_details .follow_n_count .btn-group a + a:focus {
  background: #6b7881;
}
.author_details .bio_section {
  border-top: 1px solid  #e8ebed;
  border-bottom: 1px solid  #e8ebed;
  height: auto;
  position: relative;
  margin-bottom: 50px;
  margin-top: 0;
}
.author_details .bio_section .about_social {
  width: 285px;
  padding: 0;
}
.author_details .bio_section .about_social .section_row {
  padding: 30px 0;
}
.author_details .bio_section .about_social .section_row + .section_row {
  border-top: 1px solid  #e8ebed;
}
.author_details .bio_section .about_social .about_section h4 {
  font-size: 16px;
  line-height: 1;
  margin: 0 0 15px;
  color: #43494e;
}
.author_details .bio_section .about_social .about_section dl {
  margin: 0;
}
.author_details .bio_section .about_social .about_section dl dt {
  text-align: left;
  color: #43494e;
  width: 115px;
}
.author_details .bio_section .about_social .about_section dl dd {
  color: #43494e;
  margin-left: 115px;
  text-align: left;
}
.author_details .bio_section .about_social .about_section.single_video_info {
  /*dl{
                        dt{
                            width: 130px;
                        }
                        dd{
                            margin-left: 130px;
                        }
                    }*/
}
.author_details .bio_section .about_social .social_section h5 {
  margin: 0 0 15px;
  color: #43494e;
  font-weight: 600;
  line-height: 1;
}
.author_details .bio_section .about_social .social_section ul {
  width: 223px;
  margin: 0;
}
.author_details .bio_section .about_social .social_section ul li {
  padding: 1px;
}
.author_details .bio_section .about_social .social_section ul li a {
  display: block;
}
.author_details .bio_section .author_desc_by_author {
  width: calc(100% - 285px);
  border-left: 1px solid  #e8ebed;
  min-height: 100%;
  position: relative;
  padding: 25px 0 25px 28px;
  color: #43494e;
}
.author_details .bio_section .author_desc_by_author p {
  line-height: 22px;
  margin-bottom: 0;
}
.author_details .bio_section .author_desc_by_author p + p {
  margin-top: 15px;
}
/*----------------------------------------------------------------*/
.post_details .post_title_n_view {
  position: relative;
}
.post_details .post_title_n_view h2 {
  font-weight: 600;
  color: #43494e;
  line-height: 38px;
  margin: 25px 0 28px;
}
.post_details .post_title_n_view h2.view_count {
  position: absolute;
  right: 0;
  bottom: 0;
  text-align: right;
}
.post_details .post_title_n_view h2.view_count small {
  font-weight: 400;
  font-size: 12px;
}
.post_details .bio_section {
  margin-bottom: 0;
}
.post_details .author_section.widget.widget_recommended_to_follow .media .media-body .btn-group a {
  padding: 0 15px;
}
.comment_form h5 {
  margin: 0;
  padding: 25px 0;
  text-transform: uppercase;
  color: #43494e;
  font-weight: 600;
}
.comment_form textarea {
  resize: none;
  height: 200px;
  border-color: #e8ebec;
}
.comment_form .btn {
  height: 42px;
  line-height: 42px;
  padding: 0 55px;
  border-radius: 2px;
  background: #4aa3df;
  color: #fff;
  text-transform: uppercase;
  font-weight: 600;
  margin-top: 30px;
}
.comments {
  border-bottom: 1px solid  #e8ebec;
}
.comments .comment_count {
  font-weight: 600;
  text-transform: uppercase;
  color: #43494e;
  line-height: 1;
  margin: 25px 0 0;
}
.comments .comment {
  padding: 25px 0 0;
}
.comments .comment + .comment {
  border-top: 1px solid  #e8ebec;
  margin: 0;
}
.comments .comment.no-reply {
  padding-bottom: 25px;
}
.comments .comment .media-left {
  padding-right: 20px;
}
.comments .comment .media-left a {
  width: 70px;
  height: 70px;
}
.comments .comment .media-body .comment_header h5 {
  margin: 0 0 15px;
}
.comments .comment .media-body .comment_header h5 a {
  color: #43494e;
  font-weight: 600;
}
.comments .comment .media-body .comment_header h5 .time_ago {
  color: #828a91;
  margin: 0 20px;
}
.comments .comment .media-body .comment_header h5 .reply_link {
  text-decoration: underline;
  text-transform: uppercase;
}
.comments .comment .media-body p {
  color: #43494e;
  margin: 0;
  line-height: 22px;
}
.comments .comment .media-body p + p {
  margin-top: 15px;
}
.comments .comment.comment_reply {
  border-top: 1px solid  #e8ebec;
  padding-bottom: 25px;
}
/*----------------------------------------------------------------*/
.science_technology .science_tec_row img {
  max-width: 100%;
}
.science_technology .science_tec_row .science_img {
  position: relative;
  z-index: 2;
}
.science_technology .science_tec_row .science_img .big_img {
  height: 470px;
}
.science_technology .science_tec_row .science_img:before {
  content: "";
  position: absolute;
  top: 50%;
  left: 0;
  right: 0;
  bottom: 0;
  display: block;
  background: -webkit-linear-gradient(rgba(0, 0, 0, 0) 0%, #000000 100%);
  background: -o-linear-gradient(rgba(0, 0, 0, 0) 0%, #000000 100%);
  background: linear-gradient(rgba(0, 0, 0, 0) 0%, #000000 100%);
  filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#00000000', endColorstr='#000000', GradientType=0);
  opacity: 0.8;
  -webkit-backface-visibility: hidden;
  pointer-events: none;
}
.science_technology .science_tec_row .science_img .video-content {
  position: absolute;
  left: 30px;
  bottom: 30px;
}
.science_technology .science_tec_row .science_img .video-content a {
  color: #fff;
  font-weight: 600;
  font-size: 18px;
  font-family: 'Open Sans', sans-serif;
}
.science_technology .science_tec_row .science_img .video-content a:hover,
.science_technology .science_tec_row .science_img .video-content a:focus {
  color: #4aa3df;
}
.science_technology .science_tec_row .science_img .video-content h5 {
  font-size: 14px;
  color: rgba(255, 255, 255, 0.75);
  margin: 0;
  padding-top: 5px;
}
.science_technology .science_tec_row .science_img .video-content h5 a {
  color: rgba(255, 255, 255, 0.75);
  font-size: 14px;
}
.science_technology .science_tec_row .science_img .video-content h5 a:hover,
.science_technology .science_tec_row .science_img .video-content h5 a:focus {
  color: #fff;
}
.science_technology .science_tec_row .small_img {
  padding-bottom: 20px;
  padding-left: 5px;
}
.author_interview_2 {
  padding-top: 40px;
}
.author_interview_2 .feature_post .media-left.feature_img {
  padding-right: 0;
  padding-bottom: 20px;
}
.author_interview_2 .feature_post .media-body.feature_body h4 {
  font-size: 24px;
  line-height: 30px;
}
.author_interview_2 .feature_post .media-body.feature_body .meta_info {
  display: inline-block;
}
.author_interview_2 .feature_post .media-body.feature_body .views {
  display: inline-block;
  padding-left: 30px;
}
.science_tec_grid {
  padding-bottom: 40px;
}
.slider_technology {
  display: block;
  overflow: hidden;
}
.slider_technology .science_tec_row .science_img img {
  width: 100%;
  height: 320px;
}
.slider_technology .science_tec_row .science_img .big_img {
  height: 660px;
  width: 100%;
}
.slider_technology .science_tec_row .small_img:last-child {
  padding-bottom: 0;
}
/*----------------------------------------------------------------*/
/*# sourceMappingURL=style.css.map */  
</style>
@endsection