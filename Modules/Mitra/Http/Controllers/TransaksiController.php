<?php

namespace Modules\Mitra\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Session;
use Alert;


class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {        
        
        $Profile       = json_decode(file_get_contents(ENV('APP_URL_API').'web/profile/mitra/'.decrypt(Session::get('id_token_xmtrusr'))));           
        $urlKota        = ENV('APP_URL_API').'web/homepage/kota';
        $kotaList       = json_decode(file_get_contents($urlKota));
        $this->title = 'Transaksi'; 
        
        return view('mitra::Transaksi.index')->with([
            'kotaList'  => $kotaList,
            'page'      => $this,
            'Profile'   => $Profile,
        ]);
    }
}
