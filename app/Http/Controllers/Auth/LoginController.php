<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Socialite;
use Socialize;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = '/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function redirectToProvider($driver)
    {
        return Socialite::driver($driver)->redirect();
    }

    public function handleProviderCallback($driver)
    {
        // $user = Socialite::driver($driver)->user();
        $user = Socialite::driver($driver)->stateless()->user();
        $now = \Carbon\Carbon::now()->format('mY');

        $client = new \GuzzleHttp\Client();

        if ( decrypt(Session::get('jenis_user_login')) == 'pelanggan'){

            $response = $client->request('POST', ENV('APP_URL_API').'merchant/pelanggan_google', [
                'form_params'               => [
                    'nama'      => $user->user['name'],
                    'no_telpon' => '',
                    'email'     => $user->user['email'],
                    'password'  => $now,
                    'alamat'    => '',
                    'kota'      => '',                    
                ]
            ]);

            $responses = json_decode($response->getBody());
            Session::put('id_token_xmtrusr',encrypt($responses->id_pelanggan));
            Session::put('id_token_xmtrusr_name',encrypt($responses->nama));        
            Session::put('profile',encrypt($responses));                        
            Session::put('login',TRUE);
            
            $client = new \GuzzleHttp\Client();
            $response = $client->request('POST', ENV('APP_URL_API').'web/profile/pelanggan/email_send', [
                'form_params'   => [
                    'id_user'   => decrypt(Session::get('id_token_xmtrusr')),
                    'link'      => route('EmailVerify.confirm',[Session::get('id_token_xmtrusr')])
                ]
            ]);

            if (session('link') == "") {
                return redirect()->route('EmailVerify.index');
            }else{
                return redirect(session('link'));                
            }     
        }else{
            $response = $client->request('POST', ENV('APP_URL_API').'merchant/mitra_google', [
                'form_params'   => [
                    'nama'      => $user->user['name'],
                    'no_telpon' => '',
                    'email'     => $user->user['email'],
                    'password'  => $now,
                    'alamat'    => '',
                    'kota'      => '',                    
                ]
            ]);

            $responses = json_decode($response->getBody());
            Session::put('id_token_xmtrusr',encrypt($responses->id_mitra));
            Session::put('id_token_xmtrusr_name',encrypt($responses->nama));        
            Session::put('profile',encrypt($responses));                        
            Session::put('login',TRUE);
            
            $client = new \GuzzleHttp\Client();
            $response = $client->request('POST', ENV('APP_URL_API').'web/profile/mitra/email_send', [
              'form_params'   => [
                  'id_user'   => decrypt(Session::get('id_token_xmtrusr')),
                  'link'      => route('EmailVerifyMitra.confirm',[Session::get('id_token_xmtrusr')])
              ]
            ]);
          
            if (session('link') == "") {
              return redirect()->route('Mitra.index');
            }else{
              return redirect(session('link'));                
            }
        }    
    }

    public function jenis_user(Request $request){
        Session::put('jenis_user_login',encrypt($request->jenis));
    }

}
