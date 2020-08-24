<?php 
use Illuminate\Support\Facades\Session;
if (! function_exists('HelperNotificationJadwalGuru')) {
    function HelperNotificationJadwalGuru()
    {
		$url = ENV('APP_URL_API').'notification/jadwal_reminder/'.decrypt(Session::get('id_token_xmtrusr'));
       	return json_decode(file_get_contents($url));
    }
}