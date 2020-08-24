<?php 
use Illuminate\Support\Facades\Session;
if (! function_exists('HelperGetListProduct')) {
    function HelperGetListProduct()
    {
		$url = ENV('APP_URL_API').'mitra/web-desktop/list-product-all/'.decrypt(Session::get('id_token_xmtrusr'));
       	return json_decode(file_get_contents($url));
    }
}