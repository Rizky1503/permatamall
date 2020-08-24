<?php

namespace Modules\Product\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class GedungController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('product::Gedung.index');
    }

    

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function more()
    {
        return view('product::Gedung.more');
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
}
