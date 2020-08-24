<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class HomePageController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {        
    	// $url = ENV('APP_URL_API').'web/homepage/popular';
     //    $PopularData   = json_decode(file_get_contents($url));
        if(Session::get('login')){

            $mitra = json_decode(file_get_contents(ENV('APP_URL_API').'merchant/mitra/cek/'.decrypt(Session::get('id_token_xmtrusr'))));

            if ($mitra == "true") {
                $private = "Mitra";
            }else{
                $private = "Pelanggan";
            }

            $urlKota            = ENV('APP_URL_API').'web/homepage/kota';
            $kotaList       = json_decode(file_get_contents($urlKota));

            $count_survey = json_decode(file_get_contents(ENV('APP_URL_API').'web/homepage/survey/count/'.decrypt(Session::get('id_token_xmtrusr'))));

            $data   = json_decode(file_get_contents(ENV('APP_URL_API').'bo/list/paket'));
            
            return view('Pages.homePage-Login')->with([
                'count_survey' => $count_survey->count,
                'kotaList'     => $kotaList,
                'private'      => $private,
                'data'         => $data,
            ]);

        }else{
            $private = "Harus_login";
            $data   = json_decode(file_get_contents(ENV('APP_URL_API').'bo/list/paket'));

            return view('Pages.homePage')->with([
                'private'    => $private,
                'data'       => $data,
            ]);
        }        
    }

    public function store_survey(Request $request){
        $client = new \GuzzleHttp\Client();
        $response = $client->request('POST', ENV('APP_URL_API').'web/homepage/survey/store', [
            'form_params'         => [
                'id_pelanggan'    => decrypt(Session::get('id_token_xmtrusr')),
                'sumber'          => $request->sumber
            ]
        ]);
    }

    public function bantuan (){
        return view('Pages.bantuan');
    }

    public function pengembangan (){
        return view('layouts.pengembangan');
    }    

    public function telphone (){
        return view('Pages.insertPhone');
    }

    public function store_telphone (Request $request){
        $this->validate($request, [
            'no_telpon'  => 'required|max:13|min:11',
        ]);

        $client = new \GuzzleHttp\Client();
        $response = $client->request('POST', ENV('APP_URL_API').'web/profile/store_telephone', [
            'form_params'         => [
                'id_pelanggan'    => decrypt(Session::get('id_token_xmtrusr')),
                'no_telp'         => $request->no_telpon
            ]
        ]);

        if (session('link') == "") {
            return redirect()->route('Mitra.index');
        }else{
            return redirect(session('link'));                
        }
    }

}
