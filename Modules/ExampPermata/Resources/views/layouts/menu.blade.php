<div class="row">
  <div class="col-md-12">    
    <div class="panel panel-default">
      <div class="panel-body" style="padding: 8px; text-align: center;">       
        <a href="{{ route('ExampPermata.index') }}">
          <div style="width: 25%; float: left;">          
            <img src="{!! asset('public/assets/images/icon/examp/home.png') !!}" class="image-icon-examp">
            <p style="margin-top: 10px; font-weight: bold;">Halaman Utama</p>          
          </div>
        </a>
        <a href="">
          <div style="width: 25%; float: left;">          
            <img src="{!! asset('public/assets/images/icon/examp/user.png') !!}" class="image-icon-examp">
            <p style="margin-top: 10px; font-weight: bold;">Profil</p>          
          </div>
        </a>

        <a href="{{ route('ExampPermata.Saran.index') }}">
          <div style="width: 25%; float: left;">
            <img src="{!! asset('public/assets/images/icon/examp/laporan.png') !!}" class="image-icon-examp">
            <p style="margin-top: 10px; font-weight: bold;">Saran & Nilai</p>          
          </div>
        </a>
        <a href="{{ route('ExampPermata.Pembahasan.index') }}">
          <div style="width: 25%; float: left;">          
            <img src="{!! asset('public/assets/images/icon/examp/nilai.png') !!}" class="image-icon-examp">
            <p style="margin-top: 10px; font-weight: bold;">Pembahasan</p>
          </div>
        </a>        
      </div>
    </div>          
  </div>
</div>