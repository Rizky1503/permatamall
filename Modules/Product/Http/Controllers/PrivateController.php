<?php

namespace Modules\Product\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Session;

class PrivateController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function List(Request $request)
    {
        $url            = ENV('APP_URL_API').'web/homepage/kota';
        $kotaList       = json_decode(file_get_contents($url));

        $urltingkat     = ENV('APP_URL_API').'web/homepage/private/list/kelas';
        $tingkatList    = json_decode(file_get_contents($urltingkat));        
        $tingkat        = "";
        $kota           = "";
        $Mapel          = array();


        $this->title = 'Les Privat seluruh indonesia dengan Guru Berkualitas';
        return view('product::Private.List')->with([
            'page'      => $this, 
            'tingkat'   => $tingkat,
            'kota'      => $kota,
            'kotaList'  => $kotaList,
            'Mapel'     => $Mapel,
            'tingkatList'=> $tingkatList,
        ]);
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index(Request $request)
    {
        $url            = ENV('APP_URL_API').'web/homepage/kota';
        $kotaList       = json_decode(file_get_contents($url));        

        if (isset($request->jns_bimbel) && isset($request->tingkat) && isset($request->kota)) {            
            if ($request->kota == "Lainya") {
                $kota       = $request->kota;
                $kotaLainya = $request->kota_lainya;
            }else{
                $kota       = base64_decode($request->kota);
                $kotaLainya = 'Lainya';
            }
            $tingkat    = $request->tingkat;
            $urlMapel   = ENV('APP_URL_API').'web/homepage/private/'.$tingkat;
            $Mapel      = json_decode(file_get_contents($urlMapel));
        }else{
            $tingkat    = "";
            $kota       = "";
            $kotaLainya = "Lainya";
            $Mapel      = array();

        }

        return view('product::Private.search')->with([
            'page'          => $this,      
            'tingkat'       => $tingkat,
            'kota'          => $kota,
            'kotaLainya'    => $kotaLainya,
            'kotaList'      => $kotaList,
            'Mapel'         => $Mapel,       
        ]);


        
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index_backup(Request $request)
    {

        $url            = ENV('APP_URL_API').'web/homepage/kota';
        $kotaList       = json_decode(file_get_contents($url));        

        if (isset($request->jns_bimbel) && isset($request->tingkat) && isset($request->kota)) {            
            if ($request->kota == "Lainya") {
                $kota       = $request->kota;
                $kotaLainya = $request->kota_lainya;
            }else{
                $kota       = base64_decode($request->kota);
                $kotaLainya = 'Lainya';
            }
            $tingkat    = $request->tingkat;
            $urlMapel   = ENV('APP_URL_API').'web/homepage/private/'.$tingkat;
            $Mapel      = json_decode(file_get_contents($urlMapel));
        }else{
            $tingkat    = "";
            $kota       = "";
            $kotaLainya = "Lainya";
            $Mapel      = array();

        }

        $profileOrtu    = json_decode(file_get_contents(ENV('APP_URL_API').'web/profile/pelanggan/'.decrypt(Session::get('id_token_xmtrusr'))));
        
        $this->title = 'Les Privat SD, SMP, SMA dengan berbagai mata pelajaran';
        return view('product::Private.index')->with([
            'page'          => $this, 
            'tingkat'       => $tingkat,
            'kota'          => $kota,
            'kotaLainya'    => $kotaLainya,
            'kotaList'      => $kotaList,
            'Mapel'         => $Mapel,
            'profileOrtu'   => $profileOrtu,
        ]);


        
    }


    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function matpel(Request $request)
    {
        if ($request->id == "") {
            echo "<option value=''>Pilih Mata Pelajaran</option>";
        }else{
            $urlMapel   = ENV('APP_URL_API').'web/homepage/private/'.$request->id;
            $Mapel      = json_decode(file_get_contents($urlMapel));
            foreach ($Mapel as $key => $value) {
                echo "<option value='".$value."'>".$value."</option>";
            }            
        }
    }
    

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function levelprivate(Request $request)
    {   
        if ($request->level == "Guru") {
            $level = "Junior";
        }else{
            $level = "Senior";
        }

        $client = new \GuzzleHttp\Client();
        $response = $client->request('POST', ENV('APP_URL_API').'web/mitra/product/private/search', [
                'form_params'       => [
                    'jenis_kelamin' => $request->jenis_kelamin,
                    'tingkat'       => $request->tingkat,
                    'mata_pelajaran'=> $request->mata_pelajaran,
                    'kota'          => $request->kota,
                    'level'         => $level
                ]
        ]);

        $responses      = json_decode($response->getBody());

        if (isset($responses->min->min)) {
            $min    = $responses->min->min;
        }else{
            $min    = "0";
        }
        
        if (isset($responses->max->max)) {
            $max    = $responses->max->max;
        }else{
            $max    = "0";
        }


        $list = array([
            'count' => $responses->CountRow->count,
            'raw'   => encrypt($responses->ListRow),
            'min'   => $min,
            'max'   => $max,
        ]);
        return $list['0'];
    }


    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function PrivateProcess(Request $request)
    {   
        $keterangan = array(
            'name'          => $request->name,
            'phone'         => $request->phone,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tingkat'       => $request->tingkat,
            'mata_pelajaran'=> $request->mata_pelajaran,
            'Pertemuan'     => $request->Pertemuan,
            'kota'          => $request->kota,
            'level'         => $request->level,
        );

        $kondisi = array(
            'jenis_kelamin' => $request->jenis_kelamin,
            'tingkat'       => $request->tingkat,
            'mata_pelajaran'=> $request->mata_pelajaran,
            'kota'          => $request->kota,
        );

        $client = new \GuzzleHttp\Client();

        $responsea = $client->request('POST', ENV('APP_URL_API').'web/profile/pelanggan/ortu', [
                'form_params'           => [
                    'id_user'           => decrypt(Session::get('id_token_xmtrusr')),
                    'nama_ortu'         => $request->name,
                    'no_telp_ortu'      => $request->phone,
                    'asal_sekolah'      => $request->asal_sekolah,
                ]
        ]);

        $response = $client->request('POST', ENV('APP_URL_API').'web/mitra/product/private/order', [
                'form_params'           => [
                    'id_user_order'     => decrypt(Session::get('id_token_xmtrusr')),
                    'id_product_order'  => '',
                    'product'           => 'Private',
                    'status_order'      => 'Requested',
                    'keterangan'        => $keterangan,
                    'kondisi'           => $kondisi,
                ]
        ]);

        if ($response->getBody() == "Requested") {
            return "Requested";
        }else{
            $responses      = json_decode($response->getBody());
            if (!empty($request->raw_search)) {
                foreach (decrypt($request->raw_search) as $key => $value) {
                    $response = $client->request('POST', ENV('APP_URL_API').'web/mitra/product/private/order/request', [
                        'form_params'           => [
                            'id_order'      => $responses->id_order,
                            'id_produk'     => $value->id_produk,
                            'id_mitra'      => $value->id_mitra,
                            'nama_produk'   => $value->nama_produk,
                            'kota'          => $value->kota,
                            'alamat'        => $value->alamat,
                        ]
                    ]);
                }
            }

            return $responses->id_order;
        }  
              
    }


    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function RequestRequirement(Request $request)
    {
        return route('Private.result',['reqirement' => encrypt($request->all())]);
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function result(Request $request)
    {
        $tampung = decrypt($request->reqirement);
        $silabus         = ENV('APP_URL_API').'web/homepage/private/list/silabus/'.str_replace(' ', '%20', $tampung['tingkat']).'/'.str_replace(' ', '%20', $tampung['mata_pelajaran']);
        $ListSilabus     = json_decode(file_get_contents($silabus));
        return view('product::Private.result')->with([
            'page'      => $this,      
            'data'      => decrypt($request->reqirement),
            'silabus'   => $ListSilabus,
        ]);
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function proses(Request $request)
    {

        $keterangan = array(
            'name'          => $request->nama_orang_tua,
            'phone'         => $request->no_telp_orang_tua,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tingkat'       => $request->tingkat,
            'mata_pelajaran'=> $request->mata_pelajaran,
            'Pertemuan'     => $request->Pertemuan,
            'kota'          => $request->kota,
            'level'         => $request->level,
        );

        $kondisi = array(
            'jenis_kelamin' => $request->jenis_kelamin,
            'tingkat'       => $request->tingkat,
            'mata_pelajaran'=> $request->mata_pelajaran,
            'kota'          => $request->kota,
        );
        $client = new \GuzzleHttp\Client();
        $responsea = $client->request('POST', ENV('APP_URL_API').'web/profile/pelanggan/ortu', [
                'form_params'           => [
                    'id_user'           => decrypt(Session::get('id_token_xmtrusr')),
                    'nama_ortu'         => $request->nama_orang_tua,
                    'no_telp_ortu'      => $request->no_telp_orang_tua,
                    'asal_sekolah'      => 'development',
                ]
        ]);

        $response = $client->request('POST', ENV('APP_URL_API').'web/mitra/product/private/order', [
                'form_params'           => [
                    'id_user_order'     => decrypt(Session::get('id_token_xmtrusr')),
                    'id_product_order'  => '',
                    'product'           => 'Private',
                    'status_order'      => 'Requested',
                    'keterangan'        => $keterangan,
                    'kondisi'           => $kondisi,
                ]
        ]);

        if ($response->getBody() == "Requested") {
            return redirect()->route('Private.finish',['status' => 'Sudah_Terdaftar']);
        }else{
            $responses      = json_decode($response->getBody());
            if (!empty($request->raw_search)) {
                foreach (decrypt($request->raw_search) as $key => $value) {
                    $response = $client->request('POST', ENV('APP_URL_API').'web/mitra/product/private/order/request', [
                        'form_params'           => [
                            'id_order'      => $responses->id_order,
                            'id_produk'     => $value->id_produk,
                            'id_mitra'      => $value->id_mitra,
                            'nama_produk'   => $value->nama_produk,
                            'kota'          => $value->kota,
                            'alamat'        => $value->alamat,
                        ]
                    ]);
                }
            }

            return redirect()->route('Private.finish',['status' => 'Baru','id_order' =>  encrypt($responses->id_order), 'content' => encrypt($request->all())]);
        }  
    }

     /**
     * Display a listing of the resource.
     * @return Response
     */
    public function finish(Request $request)
    {
        if ($request->status == "Baru") {
            $url        = ENV('APP_URL_API').'web/Transaction/detail/'.decrypt($request->id_order);
            $Detail      = json_decode(file_get_contents($url));

            if ($Detail->transaksi->status_order != 'Requested') {
                return redirect()->route('Transaction.detail',$request->id_order);
            }
            return view('product::Private.finish')->with([
                'page'      => $this,  
                'content'   => decrypt($request->content),  
                'detail'    => $Detail    
            ]);

        }else{
            return view('product::Private.finish_terdaftar')->with([
                'page'      => $this,  
            ]);
        }        
    }            

}
