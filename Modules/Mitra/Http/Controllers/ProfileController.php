<?php

namespace Modules\Mitra\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Alert;
use Image;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {        
        if (decrypt(Session::get('id_token_xmtrusr')) == "MT201909131000000008" || decrypt(Session::get('id_token_xmtrusr')) == "MT201909181000000010") {
            $urlKota        = ENV('APP_URL_API').'web/homepage/kota';
            $kotaList       = json_decode(file_get_contents($urlKota));
            $this->title = 'Profil'; 

            return view('mitra::Profile.index')->with([
                'kotaList' => $kotaList,
                'page' => $this
            ]);
        }else{

            $Profile       = json_decode(file_get_contents(ENV('APP_URL_API').'web/profile/mitra/'.decrypt(Session::get('id_token_xmtrusr'))));           
            $urlKota        = ENV('APP_URL_API').'web/homepage/semua_kota';
            $kotaList       = json_decode(file_get_contents($urlKota));
            $this->title = 'Profil'; 
            $this->breadcrumbs = [
               ['url' => route('Mitra.index'), 'title' =>'Dashboard'],
               ['url' => '', 'title' =>'Pengaturan'],
               ['url' => '', 'title' =>'Ubah Profil'],
            ];
            
            return view('mitra::Profile.profile')->with([
                'kotaList'  => $kotaList,
                'page'      => $this,
                'Profile'   => $Profile,
            ]);

        }
    }


    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function password()
    {        
    	$this->title = 'Ubah Password'; 
        $this->breadcrumbs = [
           ['url' => route('Mitra.index'), 'title' =>'Dashboard'],
           ['url' => '', 'title' =>'Pengaturan'],
           ['url' => '', 'title' =>'Ubah Password'],
        ];

        return view('mitra::Profile.password')->with([
        	'page' => $this
        ]);
    }


    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function Storepassword(Request $request)
    {        
    	$data = file_get_contents(ENV('APP_URL_API').'web/profile/mitraJoin/getPassword/'.decrypt(Session::get('id_token_xmtrusr')));
    	if ($data == $request->lama) {
    		$client = new \GuzzleHttp\Client();
	        $response = $client->request('POST', ENV('APP_URL_API').'web/profile/mitraJoin/changepassword', [
	                'form_params'       => [
	                    'id_user' 		=> decrypt(Session::get('id_token_xmtrusr')),
	                    'password'      => $request->baru
	                ]
	        ]);
            return redirect()->route('Mitra.Profile.password')->with('success','Password Berhasil di ubah');
    	}else{    		
            return redirect()->route('Mitra.Profile.password')->with('Error','Password lama Salah');
    	}
    }


    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function StoreProfile(Request $request)
    {        
        $this->validate($request, [
            'nama_lengkap'          => 'required',
            'no_telpon'             => 'required',
            'jenis_kelamin'         => 'required',
            'nama_pemilih_rekening' => 'required',
            'no_pemilik_rekening'   => 'required',
            'kota'                  => 'required',
            'alamat'                => 'required',
        ]);

        $client = new \GuzzleHttp\Client();

        if ($request->foto_profile == "") {
            $name = $request->last_name;
        }else{
            // file upload
            $file = $request->file('foto_profile');
            $name = 'foto-profile.png';
            $path = base_path() .'/public/images/private';
            $img  = Image::make($file->getRealPath());
            $img->resize(200, 200, function ($constraint) { // P X T
                $constraint->aspectRatio();
            })->save($path.'/'.$name);

            $response = $client->request('POST', ENV('APP_URL_API_RESOURCE').'images/mitra/upload_profile', [
                'multipart' => [                                
                    [
                        'name'     => 'id_mitra',
                        'contents' => decrypt(Session::get('id_token_xmtrusr'))
                    ],
                    [
                        'name'     => 'foto',
                        'contents' => file_get_contents($path.'/'.$name),
                        'filename' => $name
                    ],
                ]
            ]);
            unlink($path.'/'.$name);
        }

        $response = $client->request('POST', ENV('APP_URL_API').'web/profile/mitraJoin/changeprofile', [
            'multipart' => [
                [
                    'name'     => 'nama_lengkap',
                    'contents' => $request->nama_lengkap
                ],
                [
                    'name'     => 'no_telpon',
                    'contents' => $request->no_telpon
                ],
                [
                    'name'     => 'jenis_kelamin',
                    'contents' => $request->jenis_kelamin
                ],
                [
                    'name'     => 'nama_pemilih_rekening',
                    'contents' => $request->nama_pemilih_rekening
                ],
                [
                    'name'     => 'no_pemilik_rekening',
                    'contents' => $request->no_pemilik_rekening
                ],
                [
                    'name'     => 'kota',
                    'contents' => $request->kota
                ],
                [
                    'name'     => 'alamat',
                    'contents' => $request->alamat
                ],
                [
                    'name'     => 'id_mitra',
                    'contents' => decrypt(Session::get('id_token_xmtrusr'))
                ],
                [
                    'name'     => 'foto_profile',
                    'contents' => $name
                ],
            ]
        ]);        
        $responses = json_decode($response->getBody());
        Alert::success('Profile Berhasil di ubah', 'Berhasil');
        return redirect()->route('Mitra.Profile.index');
    }
}
