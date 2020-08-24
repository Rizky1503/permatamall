@extends('examppermata::layouts.master2')

@section('content')
<div style="background-image: url('{!! asset('public/images/sidebar/examp.png') !!}'); background-size: cover; text-align: center;font-size: 40px;font-weight: bold;color: #fff; padding-bottom: 80px; padding-top: 80px;">
    Video Pembelajaran
</div>
<div class="container" style="padding-bottom: 80px; padding-top: 50px;" id="seach_page">          
  @include('examppermata::layouts.menulangganan') 
  <div class="row">
      <div class="col-sm-9 post_page_uploads">
          <div class="author_details post_details row m0">
              <div>
                  <video controls id="video-bg"></video>
                  <!-- <video controls controlsList="nodownload">
                    <source src="{!! asset('public/video/load_video_blob.MP4') !!}" type="video/mp4">
                  </video> -->     
                  <!-- <video controls crossorigin playsinline poster="https://cdn.plyr.io/static/demo/View_From_A_Blue_Moon_Trailer-HD.jpg">
                     <source src="https://cdn.plyr.io/static/demo/View_From_A_Blue_Moon_Trailer-576p.mp4" type="video/mp4" size="576">
                      <source src="https://cdn.plyr.io/static/demo/View_From_A_Blue_Moon_Trailer-720p.mp4" type="video/mp4" size="720">
                      <source src="https://cdn.plyr.io/static/demo/View_From_A_Blue_Moon_Trailer-1080p.mp4" type="video/mp4" size="1080">
                      <track kind="captions" label="English" srclang="en" src="https://cdn.plyr.io/static/demo/View_From_A_Blue_Moon_Trailer-HD.en.vtt"
                          default>
                      <track kind="captions" label="Français" srclang="fr" src="https://cdn.plyr.io/static/demo/View_From_A_Blue_Moon_Trailer-HD.fr.vtt">
                      <a href="https://cdn.plyr.io/static/demo/View_From_A_Blue_Moon_Trailer-576p.mp4" download>Download</a>
                  </video>              -->
              </div>
              <div class="row post_title_n_view">
                  <h2 class="col-sm-8 post_title">{{ $detail->title }}</h2>
                  <h2 class="col-sm-4 view_count">{{ $detail->total_view }} <small>kali dilihat</small></h2>
              </div>
              <div class="media bio_section">
                  <div class="media-left about_social">                                            
                      <div class="row m0 about_section section_row single_video_info">
                          <dl class="dl-horizontal">
                              <dt>Upload:</dt>
                              <dd>{{ \Carbon\Carbon::parse($detail->created_at)->format('d F Y') ?? '' }}</dd>

                              <dt>Kategori:</dt>
                              <dd>Science &amp; Technology</dd>

                              <dt>Lisensi Video</dt>
                              <dd>Permatamall-Lisensi</dd>

                              <dt>Lainya</dt>
                              <dd>- Tingkat {{ $detail->kelas }} <br> - Mata Pelajaran {{ $detail->kelas }}
                              </dd>
                          </dl>
                      </div>
                  </div>
                  <div class="media-body author_desc_by_author">
                      {!! $detail->deskripsi !!}                      
                  </div>
              </div>
          </div>
      </div>
      <div class="col-sm-3 sidebar sidebar2">
          <div class="row m0 sidebar_row_inner">                            
              <!--More From the Author-->
              <div class="row m0 widget widget_popular_videos">
                  <h5 class="widget_title">Video serupa lainya</h5>
                  <div class="row m0 inner">
                      @foreach($Serupa as $ListSerupa)
                      <div class="media">
                          <div class="media-left">
                            <a href="{{ route('ExampPermata.video_langganan_slug',[$ListSerupa->slug]) }}">
                              <img src="{{ ENV('APP_URL_API_RESOURCE').'images/Video/banner/'.$ListSerupa->kelas.'/'.$ListSerupa->nama_matpel.'/'.$ListSerupa->banner }}" alt=""><span class="duration">{{ $ListSerupa->durasi }}</span>
                            </a>
                          </div>
                          <div class="media-body">
                              <a href="{{ route('ExampPermata.video_langganan_slug',[$ListSerupa->slug]) }}">
                                  <h5>{{ $ListSerupa->title }}</h5>
                              </a>
                              <div class="row m0 meta_info views">{{ $ListSerupa->total_view }} kali dilihat</div>
                              <div class="row m0 meta_info posted">{{ \Carbon\Carbon::parse($ListSerupa->created_at)->format('d F Y') ?? '' }}</div>
                          </div>
                      </div> 
                      @endforeach                     
                  </div>
              </div>
          </div>
      </div>
  </div>
</div>
@endsection
@section('script')
<link rel='stylesheet' href="{!! asset('public/assets/plyr/plyr.css') !!}">
<link rel="stylesheet" type="text/css" href="{!! asset('public/assets/css/template-video.css') !!}">
<script src="{!! asset('public/assets/plyr/polyfill.min.js') !!}"></script>
<script src="{!! asset('public/assets/plyr/plyr.min.js') !!}"></script>
<script  src="{!! asset('public/assets/plyr/script-plyr.js') !!}"></script>
<script type="text/javascript">
var FILE = "{!! asset('public/video/load_video_blob.webm') !!}";
var NUM_CHUNKS = 2;
var video = document.querySelector('video');

window.MediaSource = window.MediaSource || window.WebKitMediaSource;
if (!!!window.MediaSource) {
  alert('MediaSource API is not available');
}

var mediaSource = new MediaSource();


video.src = window.URL.createObjectURL(mediaSource);

function callback(e) {
  var sourceBuffer = mediaSource.addSourceBuffer('video/webm; codecs="vorbis,vp8"');

  console.log('mediaSource readyState: ' + this.readyState);

  GET(FILE, function(uInt8Array) {
    var file = new Blob([uInt8Array], {type: 'video/webm'});
    var chunkSize = Math.ceil(file.size / NUM_CHUNKS);

    console.log('num chunks:' + NUM_CHUNKS);
    console.log('chunkSize:' + chunkSize + ', totalSize:' + file.size);

    // Slice the video into NUM_CHUNKS and append each to the media element.
    var i = 0;

    (function readChunk_(i) {
      var reader = new FileReader();

      // Reads aren't guaranteed to finish in the same order they're started in,
      // so we need to read + append the next chunk after the previous reader
      // is done (onload is fired).
      reader.onload = function(e) {
        sourceBuffer.appendBuffer(new Uint8Array(e.target.result));
        console.log('appending chunk:' + i);
        if (i == NUM_CHUNKS - 1) {
          mediaSource.endOfStream();
        } else {
          if (video.paused) {
            video.play(); // Start playing after 1st chunk is appended.
          }
          readChunk_(++i);
        }
      };

      var startByte = chunkSize * i;
      var chunk = file.slice(startByte, startByte + chunkSize);

      reader.readAsArrayBuffer(chunk);
    })(i);  // Start the recursive call by self calling.
  });
}

mediaSource.addEventListener('sourceopen', callback, false);
mediaSource.addEventListener('webkitsourceopen', callback, false);

mediaSource.addEventListener('webkitsourceended', function(e) {
  console.log('mediaSource readyState: ' + this.readyState);
}, false);

function GET(url, callback) {
  var xhr = new XMLHttpRequest();
  xhr.open('GET', url, true);
  xhr.responseType = 'arraybuffer';
  xhr.send();

  xhr.onload = function(e) {
    if (xhr.status != 200) {
      alert("Unexpected status code " + xhr.status + " for " + url);
      return false;
    }
    callback(new Uint8Array(xhr.response));
  };
}  
</script>
<!-- <script type="text/javascript">
getBlobURL("{!! asset('public/video/load_video_blob.MP4') !!}", "video/mp4", function(url, blob) {
    var source = $("<source>");
    source[0].src = url;

    $("#video-bg").append(source);
});

function getBlobURL(url, mime, callback) {
  var xhr = new XMLHttpRequest();
  xhr.open("get", url);
  xhr.responseType = "arraybuffer";

  xhr.addEventListener("load", function() {

    var arrayBufferView = new Uint8Array( this.response );
    var blob = new Blob( [ arrayBufferView ], { type: mime } );
    var url = null;

    if ( window.webkitURL ) {
        url = window.webkitURL.createObjectURL(blob);
    } else if ( window.URL && window.URL.createObjectURL ) {
        url = window.URL.createObjectURL(blob);
    }

    callback(url, blob);
  });
  xhr.send();
}  
</script> -->
@endsection