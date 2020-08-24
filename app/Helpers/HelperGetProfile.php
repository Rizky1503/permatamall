<?php 
use Illuminate\Support\Facades\Session;
if (! function_exists('HelperGetProfile')) {
    function HelperGetProfile()
    {
    	$Profile       = json_decode(file_get_contents(ENV('APP_URL_API').'web/profile/mitra/'.decrypt(Session::get('id_token_xmtrusr'))));   
    	return $Profile;
    }
}