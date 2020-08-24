<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ComplaintController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('Complaint.index');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function store(Request $request)
    {
        $client = new \GuzzleHttp\Client();
        $response = $client->request('POST', ENV('APP_URL_API').'complaint/store', [
            'multipart' => [                
                [
                    'name'     => 'id_tiket',
                    'contents' => strtoupper(str_random(5).date('dmy').'-help'.date('his'))
                ],
                [
                    'name'     => 'id_user_complaint',
                    'contents' => decrypt(Session::get('id_token_xmtrusr'))
                ],
                [
                    'name'     => 'jenis_produk',
                    'contents' => $request->jenis_produk
                ],
                [
                    'name'     => 'keterangan',
                    'contents' => $request->keterangan_pengaduan
                ],
                [
                    'name'     => 'status',
                    'contents' => 'Requested'
                ]
            ]
        ]);

        $data = json_decode($response->getbody());
        return redirect()->route('Complaint.finish',[encrypt($data->id_tiket)]);
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function finish($id)
    {
        return view('Complaint.finish')->with([
            'id' => decrypt($id)
        ]);
    }
}
