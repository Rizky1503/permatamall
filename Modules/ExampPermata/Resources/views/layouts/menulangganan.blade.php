<div class="row">
  <div class="col-md-12">    
    <div class="panel panel-default">
      <div class="panel-body" style="padding: 8px; text-align: center;">       
         <a href="{{ route('ExampPermata.langganan',[base64_encode($id)]) }}">
          <div style="width: 20%; float: left;">          
            <img src="{!! asset('public/assets/images/icon/examp/home.png') !!}" class="image-icon-examp">
            <p style="margin-top: 10px; font-weight: bold;">Halaman Utama</p>          
          </div>
        </a>
        <a href="{{ route('ExampPermata.lang.saran',encrypt($id)) }}">
          <div style="width: 20%; float: left;">
            <img src="{!! asset('public/images/bimbel_berbayar_icon/histori.png') !!}" class="image-icon-examp">
            <p style="margin-top: 10px; font-weight: bold;">Histori</p>          
          </div>
        </a>
        <a href="{{ route('ExampPermata.lang.pembahasan',encrypt($id)) }}">
          <div style="width: 20%; float: left;">          
            <img src="{!! asset('public/images/bimbel_berbayar_icon/pembahasan.png') !!}" class="image-icon-examp">
            <p style="margin-top: 10px; font-weight: bold;">Pembahasan</p>
          </div>
        </a>
        <a href="{{ route('ExampPermata.lang.ringkasan',encrypt($id)) }}">
          <div style="width: 20%; float: left;">          
            <img src="{!! asset('public/images/bimbel_berbayar_icon/bedah-materi.png') !!}" class="image-icon-examp">
            <p style="margin-top: 10px; font-weight: bold;">Ringkasan Materi</p>
          </div>
        </a>
        <a href="{{ route('ExampPermata.video_langganan',encrypt($id)) }}">
          <div style="width: 20%; float: left;">          
            <img src="{!! asset('public/images/bimbel_berbayar_icon/video.png') !!}" class="image-icon-examp">
            <p style="margin-top: 10px; font-weight: bold;">Video</p>
          </div>
        </a>        
      </div>
    </div>          
  </div>
</div>