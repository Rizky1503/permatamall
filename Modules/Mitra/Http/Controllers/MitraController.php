<?php

namespace Modules\Mitra\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Image;

class MitraController extends Controller
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

        $urlCategory = ENV('APP_URL_API').'mitra/web-desktop/listcategory';
        $ListProdCategory   = json_decode(file_get_contents($urlCategory));

        $this->title = 'Halaman Utama'; 
        
        return view('mitra::index')->with([
            'data'              => $ListProd,
            'page'      => $this,
            'ListProdCategory'  => $ListProdCategory
        ]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function daftar(Request $request)
    {              
        $urlCategory = ENV('APP_URL_API').'mitra/web-desktop/listcategory';
        $ListProdCategory   = json_decode(file_get_contents($urlCategory));
        $nama_product = base64_decode($request->prod);

        if (isset($request->prod)) {
            if ($nama_product == 23) {
                $value_prod = $nama_product;
                $this->title = 'Produk Bimbel Offline';   
                return view('mitra::Daftar.bimbel_offline')->with([
                    'ListProdCategory'  => $ListProdCategory,
                    'value_prod'        => $value_prod,
                    'page'              => $this,
                ]);
            }else if ($nama_product == "19") {
                $PrivateUSer   = json_decode(file_get_contents(ENV('APP_URL_API').'web/mitra/product/mitra/'.decrypt(Session::get('id_token_xmtrusr'))));

                if ($PrivateUSer->jenis_kelamin == "" || $PrivateUSer->cv == "" || $PrivateUSer->pemilik_rek == "" || $PrivateUSer->no_rek == "" || $PrivateUSer->foto == "" ) {
                    $value_prod = $nama_product;                
                    $this->title = 'Daftar Produk Les Privat';  
                    $this->breadcrumbs = [
                       ['url' => route('Mitra.index'), 'title' =>'Dashboard'],
                       ['url' => route('Mitra.Product.index'), 'title' =>'Produk'],
                       ['url' => '', 'title' =>'Produk Les Privat'],
                    ];

                    return view('mitra::Daftar.privat')->with([
                        'ListProdCategory'  => $ListProdCategory,
                        'value_prod'        => $value_prod,
                        'page'              => $this,
                        'Profile'           => $PrivateUSer,
                        'kota'              => json_decode(file_get_contents(ENV('APP_URL_API').'web/homepage/semua_kota'))
                    ]);                
                }else{
                    return redirect()->route('Mitra.exDaftar',['prod'=>'Privat']);
                }
            }else if ($nama_product == "24") {
                return redirect()->route('Mitra.Belanja.index');
            }
        }else{            
            $value_prod = 'not found';
            $this->title = 'Tambah Produk';   
            return view('mitra::daftar')->with([
                'ListProdCategory'  => $ListProdCategory,                
                'value_prod'        => $value_prod,
                'page'              => $this,
            ]);
        }

    }


    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function daftarStore(Request $request)
    {
        $this->validate($request, [
            'jenis_kelamin' => 'required',
            'kota'          => 'required',
            'cv'            => 'required',
            'pemilik_rek'   => 'required',
            'no_rek'        => 'required',
            'foto'          => 'required',
            'sertifikat'    => 'required',
        ]);

        $file = $request->file('cv');
        $name = 'cv'.time() . '_' . $file->getClientOriginalName();
        $path = base_path() .'/public/images/private/';
        $img = Image::make($file->getRealPath());
        $img->resize(300, 500, function ($constraint) {
            $constraint->aspectRatio();
        })->save($path.'/'.$name);   


        $file_foto = $request->file('foto');
        $name_foto = 'foto'.time() . '_' . $file_foto->getClientOriginalName();
        $path_foto = base_path() .'/public/images/private/';
        $img_foto = Image::make($file_foto->getRealPath());
        $img_foto->resize(200, 200, function ($constraint) {
            $constraint->aspectRatio();
        })->save($path_foto.'/'.$name_foto);   


        $file_sertifikat = $request->file('sertifikat');
        $name_sertifikat = 'sertifikat'.time() . '_' . $file_sertifikat->getClientOriginalName();
        $path_sertifikat = base_path() .'/public/images/private/';
        $img_sertifikat = Image::make($file_sertifikat->getRealPath());
        $img_sertifikat->resize(400, 700, function ($constraint) {
            $constraint->aspectRatio();
        })->save($path_sertifikat.'/'.$name_sertifikat);   

        $client = new \GuzzleHttp\Client();
        $uploadImage = $client->request('POST', ENV('APP_URL_API_RESOURCE').'images/mitra/upload', [
            'multipart' => [
                [
                    'name'     => 'id_mitra',
                    'contents' => decrypt(Session::get('id_token_xmtrusr'))
                ],
                [
                    'name'     => 'cv',
                    'contents' => file_get_contents($path . $name),
                    'filename' => $name
                ],                
                [
                    'name'     => 'foto',
                    'contents' => file_get_contents($path_foto . $name_foto),
                    'filename' => $name_foto
                ],
                [
                    'name'     => 'sertifikat',
                    'contents' => file_get_contents($path_sertifikat . $name_sertifikat),
                    'filename' => $name_sertifikat
                ],
            ]
        ]);

        $response = $client->request('POST', ENV('APP_URL_API').'web/mitra/product/privat', [
            'multipart' => [
                [
                    'name'     => 'cv',
                    'contents' => $name
                ],
                [
                    'name'     => 'id_mitra',
                    'contents' => decrypt(Session::get('id_token_xmtrusr'))
                ],
                [
                    'name'     => 'jenis_kelamin',
                    'contents' => $request->jenis_kelamin
                ],
                [
                    'name'     => 'pemilik_rek',
                    'contents' => $request->pemilik_rek
                ],
                [
                    'name'     => 'no_rek',
                    'contents' => $request->no_rek
                ],
                [
                    'name'     => 'foto',
                    'contents' => $name_foto
                ],
                [
                    'name'     => 'sertifikat',
                    'contents' => $name_sertifikat,
                ],
                [
                    'name'     => 'kota',
                    'contents' => $request->kota,
                ],
                
            ]
        ]);

        unlink($path . $name);
        unlink($path_foto. $name_foto);
        unlink($path_sertifikat. $name_sertifikat);
        $responses = json_decode($response->getBody());

        return redirect()->route('Mitra.exDaftar', ['prod'=>$request->product]);

    }   


    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function exDaftar(Request $request)
    {
        $this->title = 'Produk Les Privat';
        $this->breadcrumbs = [
           ['url' => route('Mitra.index'), 'title' =>'Dashboard'],
           ['url' => route('Mitra.Product.index'), 'title' =>'Produk'],
           ['url' => '', 'title' =>'Produk Les Privat'],
        ];
        $result = file_get_contents(ENV('APP_URL_API').'web/mitra/product/kelas');
        $data = json_decode($result, true);
        $kota       = file_get_contents(ENV('APP_URL_API').'web/homepage/kota');
        $kota_value = json_decode($kota, true);
        return view('mitra::Daftar.exDaftarPrivate')->with([
            'data'          => $data,
            'kota_value'    => $kota_value,
            'page'          => $this,
        ]);

    } 


    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function matpel(Request $request)
    {
        $nama_hari = array('Senin','selasa','Rabu','Kamis','Jumat','Sabtu','Minggu');

        if ($request->id == "Pilih") {
            echo "<option value=''>Pilih</option>";
        }else{
            $result = file_get_contents(ENV('APP_URL_API').'web/mitra/product/kelas/'.decrypt($request->id));
            $data = json_decode($result, true);

            echo "<option value=''>Pilih</option>";
            foreach ($data as $key => $value) {
                echo "<option value='".$value."'>".$value."</option>";
            }

        }        

    } 


    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function daftarStoreProductPrivate(Request $request)
    {        
        $url = ENV('APP_URL_API').'web/profile/mitra/'.decrypt(Session::get('id_token_xmtrusr'));
        $Profile   = json_decode(file_get_contents($url));

        if ($request->kota == "Lainya") {
            $kota = $request->kota_lainya;
        }else{
            $kota = $request->kota;            
        }

        $client = new \GuzzleHttp\Client();                
        $response = $client->request('POST', ENV('APP_URL_API').'web/mitra/product/save', [
            'form_params'               => [
                'id_master_kategori'    => '19',
                'nama_produk'           => 'les-privat-'.decrypt(Session::get('id_token_xmtrusr_name')).'-'.decrypt($request->tingkat_kelas).'-'.$request->matpel_tingkat,
                'alamat'                => '',
                'negara'                => 'Indonesia',
                'provinsi'              => '',
                'kota'                  => $kota,
                'kecamatan'             => '',
                'kode_post'             => '',
                'nama_pic'              => '',
                'no_telp'               => '',
                'kontak_pic'            => '',
                'status_product'        => "Tidak Aktif",
                'id_mitra'              => decrypt(Session::get('id_token_xmtrusr')),
                'pengalaman'            => $request->lama,
                'module'                => decrypt($request->tingkat_kelas),
                'sub_module'            => $request->matpel_tingkat,
                'jenis_kelamin'         => $Profile->jenis_kelamin,
                'gaji_saat_ini'         => $request->gaji_saat_ini,
                'harga'                 => $request->harga,
                'total_murid'           => $request->total_murid
            ]
        ]);

        $responses = json_decode($response->getBody());

        if ($responses->count) {
            return redirect()->route('Mitra.Product.data')->with('error','Maaf Data Sudah Terdaftar');
        }

        if (isset($request->hari)) {
            foreach ($request->hari as $key => $hari) {
                if (isset($request->$hari)) {
                    foreach ($request->$hari as $key => $jadwal) {
                        $harga = $client->request('POST', ENV('APP_URL_API').'web/mitra/product/harga', [
                            'form_params'               => [
                                'id_produk'         => $responses->product->id_produk,
                                'hari'              => $hari,
                                'jam'               => $jadwal,
                                'jam_selesai'       => $jadwal,
                                'jenis'             => '',
                                'harga'             => $request->harga,
                                'dp'                => '',
                                'over_time'         => '',
                                'keterangan'        => 'List Detail Harga',
                                'id_fasilitas'      => '',
                            ]
                        ]);
                    }
                }                
            }
        }
        
        return redirect()->route('Mitra.Product.data',['MTk='])->with('success','Pengajuan Anda berhasil di kirim');
    }



    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function kota(Request $request)
    {    
        $alm = ENV('APP_URL_API').'merchant/alamat/kota/'.$request->id;
        $url = str_replace(" ", "%20", $alm);
        $ListKota   = json_decode(file_get_contents($url));
        echo "<option value=''>Pilih kota</option>";
        foreach ($ListKota as $key => $value) {
            echo "<option value='".$value."'>".$value."</option>";
        }

    }    


    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function Kecamatan(Request $request)
    {    
        $alm = ENV('APP_URL_API').'merchant/alamat/kecamatan/'.$request->id;
        $url = str_replace(" ", "%20", $alm);
        $ListKota   = json_decode(file_get_contents($url));
        echo "<option selected disabled>Pilih kecamatan</option>";
        foreach ($ListKota as $key => $value) {
            echo "<option value='".$value."'>".$value."</option>";
        }

    }    
}
