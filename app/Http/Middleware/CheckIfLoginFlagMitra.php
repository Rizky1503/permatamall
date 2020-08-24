<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;

class CheckIfLoginFlagMitra
{
    public function handle($request, Closure $next)
    {

    	if(!Session::get('login')){
            return redirect()->route('Registrasi.index');
        }
        else{
    		$mitra = json_decode(file_get_contents(ENV('APP_URL_API').'merchant/mitra/cek/'.decrypt(Session::get('id_token_xmtrusr'))));  

            if ($mitra == "true") {
				return $next($request);
    		}else{
                $pelanggan = json_decode(file_get_contents(ENV('APP_URL_API').'merchant/pelanggan/cek/'.decrypt(Session::get('id_token_xmtrusr'))));
                if ($pelanggan == "true") {
                    return redirect()->route('FrontEnd.index');
                }else{
                    Session::flush();
                    return redirect()->route('Login.index')->with('alert','Login anda telah berakhir, Silahkan login kembali');
                }
    		}
        }

    }
}