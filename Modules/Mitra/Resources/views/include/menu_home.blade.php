<div class="row">
    <div class="col-md-12">    
        <div class="panel panel-default">
          <div class="panel-body" style="padding: 8px; text-align: center;">
            <a href="{{ route('Mitra.index') }}">       
                <div class="icon_menu_mitra">                          
                    <img src="{!! asset('public/assets/images/icon/mitra/home.png') !!}" class="image-icon-examp">
                    <p style="margin-top: 10px; font-weight: bold;">Halaman Utama</p>                      
                </div>
            </a>
            <a href="{{ route('Mitra.Profile.index') }}">       
                <div class="icon_menu_mitra">                          
                    <img src="{!! asset('public/assets/images/icon/mitra/user.png') !!}" class="image-icon-examp">
                    <p style="margin-top: 10px; font-weight: bold;">Profil</p>                      
                </div>
            </a>
            <a href="{{ route('Mitra.Product.index') }}">
                <div class="icon_menu_mitra">                          
                    <img src="{!! asset('public/assets/images/icon/mitra/produk.png') !!}" class="image-icon-examp">
                    <p style="margin-top: 10px; font-weight: bold;">Produk</p>                          
                </div>
            </a>
            <!-- <a href="{{ route('Mitra.Transaksi.index') }}">
                <div class="icon_menu_mitra">
                    <img src="{!! asset('public/assets/images/icon/mitra/transaksi.png') !!}" class="image-icon-examp">
                    <p style="margin-top: 10px; font-weight: bold;">Transaksi</p>
                </div>
            </a>                        
            <a href="">
                <div class="icon_menu_mitra">                          
                    <img src="{!! asset('public/assets/images/icon/mitra/komplain.png') !!}" class="image-icon-examp">
                    <p style="margin-top: 10px; font-weight: bold;">Komplain</p>                          
                </div>
            </a>
             --><a href="{{ route('Mitra.Notification.index') }}">                
                <div class="icon_menu_mitra">                          
                    <img src="{!! asset('public/assets/images/icon/mitra/pemberitahuan.png') !!}" class="image-icon-examp">
                    <span class="animasi-pemberitahuan">2</span>
                    <p style="margin-top: 10px; font-weight: bold;">Pemberitahuan</p>                          
                </div>
            </a>
          </div>
        </div>          
    </div>
</div>
<style type="text/css">
@keyframes zoominoutsinglefeatured {
    0% {
        transform: scale(1,1);
    }
    50% {
        transform: scale(1.5,1.5);
    }
    100% {
        transform: scale(1,1);
    }
}    

.animasi-pemberitahuan{
    position: absolute; 
    background-color: #29abe2; 
    border-radius: 50%; 
    width: 20px; 
    height: 20px;
    color: #fff;
    animation: zoominoutsinglefeatured 1s infinite ;
}
</style>