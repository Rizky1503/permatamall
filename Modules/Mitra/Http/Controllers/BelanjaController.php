<?php

namespace Modules\Mitra\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Alert;
use Image;

class BelanjaController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {           
        $Data   = json_decode(file_get_contents(ENV('APP_URL_API').'frontend/mitra/belanja/persyaratan/'.decrypt(Session::get('id_token_xmtrusr')).'/24'));
        $this->title = 'Belanja'; 
        $this->breadcrumbs = [
           ['url' => route('Mitra.index'), 'title' =>'Dashboard'],
           ['url' => route('Mitra.Product.index'), 'title' =>'Produk'],
           ['url' => '', 'title' =>'Belanja'],
        ];

        if ($Data->pemilik_rekening == "" || $Data->no_rekening == "") {

                    
            return view('mitra::Belanja.index')->with([
                'page'          => $this,
                'registrasi'    => 'true'
            ]);            
        }else{
            return view('mitra::Belanja.index')->with([
                'page'      => $this,
                'registrasi'    => 'false'                
            ]);            
        }
    }


    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function store(Request $request)
    {           
        $this->validate($request, [
            'nama_bank'                 => 'required',
            'nama_pemilik_rekening'     => 'required',
            'no_rekening'               => 'required',
        ]);

        $client = new \GuzzleHttp\Client();
        $uploadImage = $client->request('POST', ENV('APP_URL_API').'frontend/mitra/belanja/persyaratan_store', [
            'multipart' => [
                [
                    'name'     => 'id_mitra',
                    'contents' => decrypt(Session::get('id_token_xmtrusr'))
                ],
                [
                    'name'     => 'nama_bank',
                    'contents' => $request->nama_bank
                ],
                [
                    'name'     => 'nama_pemilik_rekening',
                    'contents' => $request->nama_pemilik_rekening
                ],
                [
                    'name'     => 'no_rekening',
                    'contents' => $request->no_rekening
                ],
                
            ]
        ]);

        return redirect()->route('Mitra.Belanja.index'); 
    }
}
