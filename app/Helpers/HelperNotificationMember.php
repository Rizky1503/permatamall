<?php 
use Illuminate\Support\Facades\Session;
if (! function_exists('HelperNotificationMember')) {
    function HelperNotificationMember()
    {
		$url = ENV('APP_URL_API').'notification/member/'.decrypt(Session::get('id_token_xmtrusr'));
       	return json_decode(file_get_contents($url));
    }
}