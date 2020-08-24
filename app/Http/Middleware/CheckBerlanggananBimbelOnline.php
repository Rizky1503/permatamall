<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;

class CheckBerlanggananBimbelOnline
{
    public function handle($request, Closure $next)
    {

    	if(!Session::get('login')){
            return redirect()->route('Registrasi.index');
        }
        else{

    		$check_berlangganan = json_decode(file_get_contents(ENV('APP_URL_API').'bo/berbayar/cek_berlangganan/'.decrypt(Session::get('id_token_xmtrusr'))));

    		if ($check_berlangganan->count > 0) {
    			return $next($request);
    		}else{
    			return redirect()->route('ExampPermata.index');
    		}

        }

    }
}