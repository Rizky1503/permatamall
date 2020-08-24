<p>
    <center><b style="font-size: 20px;">Daftar Produk Aktif</b></center>
</p>   
<hr>
<?php
$data = HelperGetListProduct(); 
?>                       
@foreach($data as $listData)
<p class="list_product_mitra_flag">
    <a href="">
        <i class="fa fa-chevron-circle-right" aria-hidden="true"></i>
        <b>{{ $listData->nama_produk }}</b>
    </a>
</p>
@endforeach