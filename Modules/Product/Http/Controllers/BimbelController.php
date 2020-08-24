<?php

namespace Modules\Product\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class BimbelController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index(Request $request)
    {
        $url            = ENV('APP_URL_API').'web/homepage/kota';
        $kotaList       = json_decode(file_get_contents($url));        
        if (isset($request->jns_bimbel) && isset($request->tingkat) && isset($request->kota) && isset($request->mata_pelajaran)){       

            $tingkat    = $request->tingkat;
            $kota       = base64_decode($request->kota);
            $jns_bimbel = $request->jns_bimbel;

            $urlMapel   = ENV('APP_URL_API').'web/homepage/private/'.$tingkat;
            $Mapel      = json_decode(file_get_contents($urlMapel));
            $NamaMapel = $request->mata_pelajaran;
            
        }elseif (isset($request->jns_bimbel) && isset($request->tingkat) && isset($request->kota)){

            $tingkat    = $request->tingkat;
            $kota       = base64_decode($request->kota);
            $jns_bimbel = $request->jns_bimbel;

            $urlMapel   = ENV('APP_URL_API').'web/homepage/private/'.$tingkat;
            $Mapel      = json_decode(file_get_contents($urlMapel));
            $NamaMapel  = "";

        }else{
            $tingkat    = "";
            $kota       = "";
            $jns_bimbel = "";
            $NamaMapel  = "";
            $Mapel      = array();

        }

        $this->title = 'Ribuan Bimbel Online dengan Pilihan terbaik';

        return view('product::Bimbel.index')->with([
            'tingkat'   => $tingkat,
            'page'      => $this,            
            'kota'      => $kota,
            'kotaList'  => $kotaList,
            'Mapel'     => $Mapel,
            'NamaMapel' => $NamaMapel,
            'jns_bimbel'=> $jns_bimbel,
        ]);
    }

    

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function more(Request $request)
    {
        return view('product::Bimbel.more')->with([
            'kota' => base64_decode($request->kota)
        ]);
    }

     /**
     * Display a listing of the resource.
     * @return Response
     */
    public function detail()
    {
        return view('product::Bimbel.detail');
    }

    public function thank()
    {
        return view('product::Bimbel.thank');
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function getlocationbimbel(Request $request)
    {

        $url = 'https://api.mapbox.com/geocoding/v5/mapbox.places/'.$request->lng.','.$request->lat.'.json?access_token=pk.eyJ1Ijoic2hvcGtsaWVuIiwiYSI6ImNqcWd4MjZpcjJtaW8zeHBiM3R6a3JkaHMifQ.aOg0HE-JWjVyPySLhJC65w&types=locality';

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec ($ch);
        $err = curl_error($ch);  //if you need
        curl_close ($ch);
        // $as = print_r($response);

        $data = json_decode($response, true);
        return $data['features'][0]['place_name'];
    }


    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function search(Request $request)
    {
        if (isset($request->jns_bimbel) && isset($request->tingkat) && isset($request->kota)) {
            if ($request->jns_bimbel == "Bimbel Offline") {
                return redirect()->route('Bimbel.index',$request->all());
            }else if ($request->jns_bimbel == "Private") {
                return redirect()->route('Private.index',$request->all());
            }
        }else{
            $this->title = 'bimbel Online Ganesha Operation';
            return view('product::Bimbel.listSearch')->with([
                'page'      => $this,     
                'kota' => base64_decode($request->kota)
            ]);
        }
    }    
}
