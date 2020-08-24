<?php 
use Illuminate\Support\Facades\Session;
if (! function_exists('HelperRedirectPortalMitra')) {
    function HelperRedirectPortalMitra()
    {
		$url = ENV('APP_URL_API').'merchant/mitra/cek/'.decrypt(Session::get('id_token_xmtrusr'));
       	return json_decode(file_get_contents($url));
    }
}