<?php 
use Illuminate\Support\Facades\Session;
if (! function_exists('HelperProductMitra')) {
    function HelperProductMitra()
    {
		$url = ENV('APP_URL_API').'mitra/web-desktop/list/'.decrypt(Session::get('id_token_xmtrusr'));
        return json_decode(file_get_contents($url));
    }
}