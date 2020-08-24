<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;

class EmailVerified
{
    public function handle($request, Closure $next)
    {

    	if(!Session::get('login')){
            return redirect()->route('Registrasi.index');
        }
        else{
            $EmailVerifiedPelanggan = json_decode(file_get_contents(ENV('APP_URL_API').'web/profile/pelanggan/email_verified/'.decrypt(Session::get('id_token_xmtrusr'))));  
    		
            if(json_encode($EmailVerifiedPelanggan->data, true) == "true") {
                return redirect()->route('EmailVerify.index');
            }else{
                return $next($request);
    		}
        }

    }
}