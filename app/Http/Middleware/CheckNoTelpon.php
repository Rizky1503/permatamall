<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;

class CheckNoTelpon{

    public function handle($request, Closure $next){
    	if(!Session::get('login')){
            return $next($request);
        }else{
	        $check_no_telpon = json_decode(file_get_contents(ENV('APP_URL_API').'web/profile/check_telephone/'.decrypt(Session::get('id_token_xmtrusr'))));

			if ($check_no_telpon->count < 1) {
				return $next($request);
			}else{
	            session(['link' => $request->fullUrl()]);
				return redirect()->route('telphone');
			}
        }
    }
}

