<?php

namespace Modules\Profile\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Image;
use Alert;


class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $Data   = json_decode(file_get_contents(ENV('APP_URL_API').'web/profile/pelanggan/'.decrypt(Session::get('id_token_xmtrusr'))));
        // dd($Data);
        return view('profile::index')->with([
            "Data" => $Data
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit()
    {
        $Data   = json_decode(file_get_contents(ENV('APP_URL_API').'web/profile/pelanggan/'.decrypt(Session::get('id_token_xmtrusr'))));

        // dd($Data);
        return view('profile::edit')->with([
            "Data" => $Data
        ]);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_lengkap'  => 'required',
            'no_telpon'     => 'required',
            'alamat'        => 'required',
        ]);

        $client = new \GuzzleHttp\Client();

        if ($request->foto_profile == "") {
            $name = $request->image_last;
        }else{
            // file upload
            $file = $request->file('foto_profile');
            $name = str_random(10).time() . '_' . $file->getClientOriginalName();
            $path = base_path() .'/public/images/profile-member';
            $img  = Image::make($file->getRealPath());
            $img->resize(300, 500, function ($constraint) { // P X T
                $constraint->aspectRatio();
            })->save($path.'/'.$name);
            
            $response = $client->request('POST', ENV('APP_URL_API_RESOURCE').'images/profile/upload', [
                'multipart' => [                                
                    [
                        'name'     => 'file_name',
                        'contents' => $name
                    ],
                    [
                        'name'     => 'upload_file',
                        'contents' => file_get_contents($path.'/'.$name),
                        'filename' => $name
                    ],
                ]
            ]);

            unlink($path.'/'.$name);
        }

        $response = $client->request('POST', ENV('APP_URL_API').'web/profile/pelanggan/change_profile', [
            'multipart' => [                
                [
                    'name'     => 'foto',
                    'contents' => $name
                ],
                [
                    'name'     => 'nama',
                    'contents' => $request->nama_lengkap
                ],
                [
                    'name'     => 'no_telp',
                    'contents' => $request->no_telpon
                ],
                [
                    'name'     => 'alamat',
                    'contents' => $request->alamat
                ],
                [
                    'name'     => 'id_pelanggan',
                    'contents' => decrypt(Session::get('id_token_xmtrusr')),
                ]
            ]
        ]);
        
        Alert::success('Terima Kasih sudah melakukan Pembayaran', 'Terima Kasih');
        return redirect()->route('Profile.edit');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function password()
    {
        $Data   = json_decode(file_get_contents(ENV('APP_URL_API').'web/profile/pelanggan/'.decrypt(Session::get('id_token_xmtrusr'))));

        // dd($Data);
        return view('profile::password')->with([
            "Data" => $Data
        ]);
    }

    public function cek_password (Request $request){

        $client = new \GuzzleHttp\Client();
        $response = $client->request('POST', ENV('APP_URL_API').'web/profile/pelanggan/cek_password', [
            'form_params'   => [
                'id_user'   => decrypt(Session::get('id_token_xmtrusr')) ,  
            ]
        ]); 

        $responses = $response->getBody()->getContents();

        if ($responses === $request->old_password){
            echo 'sama';
        }else{
            echo 'beda';
        }

    }

    public function change_password(Request $request){

        $client = new \GuzzleHttp\Client();
        $response = $client->request('POST', ENV('APP_URL_API').'web/profile/pelanggan/change_password', [
            'form_params'   => [
                'id_user'   => decrypt(Session::get('id_token_xmtrusr')) ,  
                'password'  => $request->password            
            ]
        ]);

        $responses = json_decode($response->getBody());

    }
}
