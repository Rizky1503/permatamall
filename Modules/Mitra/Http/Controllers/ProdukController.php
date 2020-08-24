<?php

namespace Modules\Mitra\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Session;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {     

        if(decrypt(Session::get('id_token_xmtrusr')) == "MT201909131000000008" || decrypt(Session::get('id_token_xmtrusr')) == "MT201909181000000010"){
            return redirect()->route('Mitra.BOF.index');            
        }

        $url = ENV('APP_URL_API').'mitra/web-desktop/list/'.decrypt(Session::get('id_token_xmtrusr'));
        $ListProd   = json_decode(file_get_contents($url));

        $urlCategory = ENV('APP_URL_API').'mitra/web-desktop/listcategory_home/'.decrypt(Session::get('id_token_xmtrusr'));
        $ListProdCategory   = json_decode(file_get_contents($urlCategory));

        $this->title = 'Produk'; 
        $this->breadcrumbs = [
           ['url' => route('Mitra.index'), 'title' =>'Dashboard'],
           ['url' => '', 'title' =>'Semua Produk'],
        ];

        return view('mitra::Product.semua')->with([
            'data'              => $ListProd,
            'page'              => $this,
            'ListProdCategory'  => $ListProdCategory->rows
        ]);           
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function data()
    {        
        $url = ENV('APP_URL_API').'mitra/web-desktop/list-product/'.decrypt(Session::get('id_token_xmtrusr')).'/19';
        $ListProd   = json_decode(file_get_contents($url));        
        $this->title = 'Les Privat'; 
        $this->breadcrumbs = [
           ['url' => route('Mitra.index'), 'title' =>'Dashboard'],
           ['url' => route('Mitra.Product.index'), 'title' =>'Produk'],
           ['url' => '', 'title' =>'Les Privat'],
        ];

        return view('mitra::Product.index')->with([
            'ListProd' => $ListProd,
            'page'      => $this,        
        ]);
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function jadwal_privat()
    {        
        $url = ENV('APP_URL_API').'web/mitra/product/private/semua_jadwal/'.decrypt(Session::get('id_token_xmtrusr'));
        $ListProd   = json_decode(file_get_contents($url));        

        $this->title = 'Les Privat'; 
        $this->breadcrumbs = [
           ['url' => route('Mitra.index'), 'title' =>'Dashboard'],
           ['url' => route('Mitra.Product.index'), 'title' =>'Produk'],
           ['url' => route('Mitra.Product.data'), 'title' =>'Les Privat'],
           ['url' => '', 'title' =>'Jadwal'],
        ];

        return view('mitra::Privat.jadwal_privat')->with([
            'ListProd' => $ListProd,
            'page'      => $this,        
        ]);
    }


    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function List($id)
    {        
        $url        = ENV('APP_URL_API').'web/mitra/product/mitra/list/'.decrypt($id);
        $ListMurid   = json_decode(file_get_contents($url));

        $this->title = 'Les Privat'; 
        $this->breadcrumbs = [
           ['url' => route('Mitra.index'), 'title' =>'Dashboard'],
           ['url' => route('Mitra.Product.index'), 'title' =>'Produk'],
           ['url' => route('Mitra.Product.data',[base64_encode('19')]), 'title' =>'Les Privat'],
           ['url' => '', 'title' =>'Lis Murid'],
        ];

        return view('mitra::Product.index-private')->with([
            'listMurid' => $ListMurid,
            'page'      => $this,       
        ]);
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function jadwal_detail_privat($id)
    {        
        $url    = ENV('APP_URL_API').'mitra/web-desktop/product-privat/'.decrypt($id);
        $data   = json_decode(file_get_contents($url));
        if (empty($data)) {
            return "Data tidak ditemukan";
        }

        if ($data->Product->status_order == "In Progres") {
            $this->title = 'Halaman Produk Privat'; 
            $this->breadcrumbs = [
               ['url' => route('Mitra.index'), 'title' =>'Dashboard'],
               ['url' => route('Mitra.Product.index'), 'title' =>'Produk'],
               ['url' => route('Mitra.Product.data',[base64_encode('19')]), 'title' =>'Les Privat'],
               ['url' => '', 'title' =>'Jadwal Les Murid'],
            ];
            return view('mitra::Product.jadwal_detail_privat')->with([
                'data'          => $data,        
                'PertemuanSudah'=> $data->PertemuanSudah,        
                'Pertemuan'     => $data->Pertemuan,        
                'page'          => $this,        
            ]);
        }else{
            return redirect()->route('Mitra.Product.List',[encrypt($data->Product->id_product_order)])->with('error','Jadwal sedang dalam proses PermataMall');
        }
    }


    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function history_privat()
    {        
         $url = ENV('APP_URL_API').'web/mitra/product/private/semua_jadwal_history/'.decrypt(Session::get('id_token_xmtrusr'));
        $ListProd   = json_decode(file_get_contents($url));   
        $this->title = 'Histori Les Privat'; 
        $this->breadcrumbs = [
           ['url' => route('Mitra.index'), 'title' =>'Dashboard'],
           ['url' => route('Mitra.Product.index'), 'title' =>'Produk'],
           ['url' => '', 'title' =>'Histori les privat'],
        ];
        return view('mitra::Product.history_privat')->with([
            'page'          => $this,        
            'ListProd'      => $ListProd,
        ]);
    }


    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function panduan_privat()
    {        
        $this->title = 'Panduan Les privat'; 
        $this->breadcrumbs = [
           ['url' => route('Mitra.index'), 'title' =>'Dashboard'],
           ['url' => route('Mitra.Product.index'), 'title' =>'Produk'],
           ['url' => '', 'title' =>'Panduan Les privat'],
        ];
        return view('mitra::Product.panduan_privat')->with([
            'page'          => $this,        
        ]);
    }


    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function hak_kewajiban_privat()
    {        
        $this->title = 'Hak & Kewajiban'; 
        $this->breadcrumbs = [
           ['url' => route('Mitra.index'), 'title' =>'Dashboard'],
           ['url' => route('Mitra.Product.index'), 'title' =>'Produk'],
           ['url' => '', 'title' =>'Hak & Kewajiban'],
        ];
        return view('mitra::Product.hak_kewajiban_privat')->with([
            'page'          => $this,        
        ]);
    }
}
