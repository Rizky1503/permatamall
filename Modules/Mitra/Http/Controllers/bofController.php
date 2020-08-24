<?php

namespace Modules\Mitra\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Session;

class bofController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {        
        $this->title = 'List Murid Pendaftaran Online'; 

        return view('mitra::Product.BOF.index')->with([
            'page' => $this
        ]);
    }


    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function detail_siswa(Request $request)
    {        
        if (isset($request->tanggal)) {
            return redirect()->route('Mitra.BOF.detail_siswa',['tingkat' => $request->tingkat,'product' => $request->product, 'range' => base64_encode($request->tanggal)]);
        }

        

        if (isset($request->tingkat) && isset($request->product)) {
            $tingkat = $request->tingkat;
            $product = $request->product;
        }else{
            $tingkat = "";
            $product = "";

        }

        $this->title = $tingkat.' | '.$product; 
        return view('mitra::Product.BOF.detail_siswa')->with([
            'tingkat'   => $tingkat,
            'paket'     => $product,
            'page'      => $this
        ]);
    }


    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function export()
    {        
        $this->title = 'Export Data'; 
        return view('mitra::Product.BOF.export')->with([
            'page'      => $this
        ]);
    }


    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function keuangan()
    {        
        $this->title = 'Keuangan'; 
        return view('mitra::Product.BOF.keuangan')->with([
            'page'      => $this
        ]);
    }


    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function cabang()
    {        
        $this->title = 'Cabang'; 
        return view('mitra::Product.BOF.Cabang.cabang')->with([
            'page'      => $this
        ]);
    }


    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function detail_cabang($id)
    {        
        $this->title = ucwords(str_replace('-', ' ', $id)); 
        return view('mitra::Product.BOF.Cabang.cabang_detail')->with([
            'page'          => $this,
            'nama_cabang'   => $id

        ]);
    }
}
