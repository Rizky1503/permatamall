<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;

class LoginApi
{
    public function handle($request, Closure $next)
    {
    	if(!Session::get('login')){            
            session(['link' => $request->fullUrl()]);
            return redirect()->route('Login.index')->with('alert','Silahkan login terlebih dahulu');
        }
        else{
			return $next($request);
        }
    }
}