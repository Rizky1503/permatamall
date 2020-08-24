<?php 
use Illuminate\Support\Facades\Session;
if (! function_exists('HelperNotificationTransaksi')) {
    function HelperNotificationTransaksi()
    {
		$url = ENV('APP_URL_API').'web/Transaction/notification/'.decrypt(Session::get('id_token_xmtrusr'));
       	return json_decode(file_get_contents($url));
    }
}