  <div class="col-md-12">    
    <div class="panel panel-default" style="background-color: #e0f9e0;">
      <div class="panel-body" style="padding: 8px; text-align: center;">       
        <div style="width: 25%; float: left;">
          <a href="{{ route('ExampPermata.lang.saran',encrypt($data->Data->id_package_user)) }}">
            <img src="{!! asset('public/images/bimbel_berbayar_icon/histori.png') !!}" class="image-icon-examp">
            <p style="margin-top: 10px; font-weight: bold;">Histori</p>
          </a>
        </div>
        <div style="width: 25%; float: left;">
          <a href="{{ route('ExampPermata.lang.pembahasan',encrypt($data->Data->id_package_user)) }}">
            <img src="{!! asset('public/images/bimbel_berbayar_icon/pembahasan.png') !!}" class="image-icon-examp">
            <p style="margin-top: 10px; font-weight: bold;">Pembahasan</p>
          </a>
        </div>
        <div style="width: 25%; float: left; cursor: pointer">
          <a href="{{ route('ExampPermata.lang.ringkasan',encrypt($data->Data->id_package_user)) }}">
            <img src="{!! asset('public/images/bimbel_berbayar_icon/bedah-materi.png') !!}" class="image-icon-examp">
            <p style="margin-top: 10px; font-weight: bold;">Ringkasan Materi</p>
          </a>
        </div>
        <div style="width: 25%; float: left;">
          <a href="{{ route('ExampPermata.video_langganan',encrypt($data->Data->id_package_user)) }}">
            <img src="{!! asset('public/images/bimbel_berbayar_icon/video.png') !!}" class="image-icon-examp">
            <p style="margin-top: 10px; font-weight: bold;">Video</p>
          </a>
        </div>
      </div>
    </div>          
  </div> 


