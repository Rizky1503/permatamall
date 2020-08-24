@extends('examppermata::layouts.master2')

@section('content')
<div style="background-image: url('{!! asset('public/images/sidebar/examp.png') !!}'); background-size: cover; text-align: center;font-size: 40px;font-weight: bold;color: #fff; padding-bottom: 80px; padding-top: 80px;">
    Video Tutorial Belajar
</div>
<div class="container" style="padding-bottom: 80px; padding-top: 50px;" id="seach_page">          
  <div class="row">
      <div class="col-sm-12 post_page_uploads">
          <div class="author_details post_details row m0">
              <div>
                  <video controls autoplay width="320" height="240"></video>
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
var FILE = "{{ ENV('APP_URL_API_RESOURCE').'video/materi/'.$detail->video }}";
var NUM_CHUNKS = "{{ $detail->chunk }}";
var video = document.querySelector('video');

window.MediaSource = window.MediaSource || window.WebKitMediaSource;
if (!!!window.MediaSource) {
  alert('MediaSource API is not available');
}

var mediaSource = new MediaSource();


video.src = window.URL.createObjectURL(mediaSource);

function callback(e) {
  var sourceBuffer = mediaSource.addSourceBuffer('video/webm; codecs="vorbis,vp8"');
  GET(FILE, function(uInt8Array) {
    var file = new Blob([uInt8Array], {type: 'video/webm'});
    var chunkSize = Math.ceil(file.size / NUM_CHUNKS);
    var i = 0;

    (function readChunk_(i) {
      var reader = new FileReader();
      reader.onload = function(e) {
        sourceBuffer.appendBuffer(new Uint8Array(e.target.result));
        if (i == NUM_CHUNKS - 1) {
          mediaSource.endOfStream();
        } else {
          // if (video.paused) {
          //   video.play(); // Start playing after 1st chunk is appended.
          // }
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
  xhr.open('GET', 'https://cors-anywhere.herokuapp.com/'+url, true);
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
@endsection