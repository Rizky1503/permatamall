<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;

class EmailVerifiedMitra
{
    public function handle($request, Closure $next)
    {

    	if(!Session::get('login')){
            return redirect()->route('Registrasi.index');
        }
        else{
            $EmailVerifiedMitra = json_decode(file_get_contents(ENV('APP_URL_API').'web/profile/mitra/email_verified/'.decrypt(Session::get('id_token_xmtrusr'))));  
    		
            if(json_encode($EmailVerifiedMitra->data, true) == "true") {
                return redirect()->route('EmailVerifyMitra.index');
            }else{
                return $next($request);
    		}
        }

    }
}