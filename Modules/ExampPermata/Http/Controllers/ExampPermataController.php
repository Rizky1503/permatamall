<?php

namespace Modules\ExampPermata\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Session;
use Alert;
use Carbon\Carbon;
use Image;
use Guzzle\Http\Exception\ClientErrorResponseException;


class ExampPermataController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('examppermata::index');
    }


    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function getStarted(){          
        $this->title = 'Permata Bimbel Online'; 

        if (Session::get('id_token_xmtrusr')) {
            $data    = json_decode(file_get_contents(ENV('APP_URL_API').'bo/list/paket/ku/'.decrypt(Session::get('id_token_xmtrusr'))));
        }else{
            $data    = json_decode(file_get_contents(ENV('APP_URL_API').'bo/list/paket'));
        }
         
        return view('examppermata::GetStarted.get-started')->with([
            'data'  => $data,
            'page'  => $this,
        ]);
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function paket_more($id){

        $data   = json_decode(file_get_contents(ENV('APP_URL_API').'bo/list/paket/'.decrypt($id).'/'.decrypt(Session::get('id_token_xmtrusr'))));

        if (empty($data->paket)) {
            return redirect()->route('ExampPermataBimbelOnline.getStarted');
        }

        if ($data->order) {
            if($data->order[0]->status_order ==  'In Progres'){
                return redirect()->route('ExampPermataBimbelOnline.getStarted');
            }
        }

        $description = (explode(",",$data->paket->description));

        $client = new \GuzzleHttp\Client();
        $check_trial = $client->request('POST', ENV('APP_URL_API').'bo/berbayar/checkTrial', [
                     'form_params'           => [
                         'id_paket'      => $data->paket->id_paket, 
                         'id_pelanggan'  => decrypt(Session::get('id_token_xmtrusr')),               
                     ]
             ]);
        $check =  json_decode($check_trial->getBody()); 

        $duration   = json_decode(file_get_contents(ENV('APP_URL_API').'bo/list/duration_paket/'.decrypt($id)));
        
        return view('examppermata::GetStarted.harga_paket')->with([
            'data'            => $data->paket,
            'duration'        => $duration,
            'duration_button' => $duration,
            'description'     => $description,
            'trial'           => $check->count,
        ]);
    }

    public function get_detail_paket(Request $request){
       $client = new \GuzzleHttp\Client();
       $check_paket = $client->request('POST', ENV('APP_URL_API').'bo/list/detail_paket', [
                    'form_params'           => [
                        'id_paket'      => $request->id,                
                    ]
            ]);
        $detail_paket =  json_decode($check_paket->getBody()); 

        return response()->json([
            'detail_paket' => $detail_paket,
        ]);
    }

    public function pay(Request $request){
       Session::put('asal_sekolah1', $request->asal_sekolah);
   
       $client = new \GuzzleHttp\Client();

       $response = $client->request('POST', ENV('APP_URL_API').'langganan/examp/online', [
                'form_params'           => [
                    'id_pelanggan'      => decrypt(Session::get('id_token_xmtrusr')),
                    'id_paket'          => $request->id_paket,
                    'id_harga'          => $request->id_harga,
                ]
        ]);
        $Data =  json_decode($response->getBody());

        $manual   = json_decode(file_get_contents(ENV('APP_URL_API').'langganan/examp/payment_manual'));
        $online   = json_decode(file_get_contents(ENV('APP_URL_API').'langganan/examp/payment_online'));

        $voucher   = json_decode(file_get_contents(ENV('APP_URL_API').'langganan/examp/voucher/'.$request->id_paket));

        $checkPayment = $client->request('POST', ENV('APP_URL_API').'langganan/examp/cek_in_payment', [
                'form_params'      => [
                    'id_user'     => $Data->Data->id_user_order,
                    'id_invoice'   => $Data->Data->id_order,              
                ]
        ]);
        $checkPayment =  json_decode($checkPayment->getBody());



        if ($Data->Data->status_order == 'In Progres') {
             return redirect()->route('ExampPermata.langganan',[base64_encode($request->id_paket)]) ;
        }else{
           return view('examppermata::Langganan.pay')->with([
                'mount'         => $Data->DealWeb->amount,
                'mount_deal'    => $Data->DataPaket->amount,
                'data'          => $Data->Data,
                'data_deal_web' => $Data->DealWeb,
                'dataPayment'   => $Data->DataPayment,
                'asal_sekolah'  => $Data->AsalSekolah->count,
                'manual'        => $manual,
                'online'        => $online,
                'cek'           => $checkPayment[0]->count,
                'id'            => $request->id_paket,
                'data_paket'    => $Data->DataPaket,
                'voucher'       => $voucher,
            ]); 
        }
    }

    public function diskon(Request $request){
        if ($request->flag == 'diskon') {
            $diskon = $request->amount * $request->nominal / 100;
            $amount = $request->amount - $diskon; 
        }else{
            $amount = $request->amount - $request->nominal; 
        }

        $client = new \GuzzleHttp\Client();
        $Order = $client->request('POST', ENV('APP_URL_API').'langganan/examp/update_deal_web', [
            'form_params'         => [
                'id_order'        => decrypt($request->invoice),  
                'amount'          => $amount,  
                'id_voucher'      => $request->id_voucher          
            ]
        ]);
    }

    public function kota_sekolah(Request $request){
        $client = new \GuzzleHttp\Client();
        $response = $client->request('POST', ENV('APP_URL_API').'langganan/examp/kota_sekolah', [
                'form_params'       => [
                    'kota'  => $request->kota_sekolah,              
                ]
        ]);
        $Data =  json_decode($response->getBody());

        $kota = array();
        foreach ($Data as $key => $value) {
            $kota[] = $value->kota;
        }

        return $kota;
    }

    public function update_sekolah(Request $request){
        $sekolah =  strtoupper($request->tingkat).' '.strtoupper($request->asal_sekolah);
        $client = new \GuzzleHttp\Client();
        $Order = $client->request('POST', ENV('APP_URL_API').'langganan/examp/store_asal_sekolah', [
                'form_params'         => [
                    'id_order'      => decrypt($request->id_invoice),  
                    'id_pelanggan'    => decrypt(Session::get('id_token_xmtrusr')),
                    'tingkat_sekolah' => strtoupper($request->tingkat),           
                    'asal_sekolah'    => strtoupper($request->asal_sekolah),             
                    'kota_sekolah'    => strtoupper($request->kota_sekolah),              
                ]
        ]);
    }

    public function store_payment_method(Request $request){
        $client = new \GuzzleHttp\Client();
        $channel_payment = $client->request('POST', ENV('APP_URL_API').'langganan/examp/payment_method', [
            'form_params'           => [
                'id_invoice'        => decrypt($request->id_invoice),
                'paymentcode'       => $request->payment_code,
                'payment_channel'   => $request->channel_payment,
                'amount'            => $request->amount,
                'id_voucher'        => $request->id_voucher,
                'id_pelanggan'      => decrypt(Session::get('id_token_xmtrusr')),               
            ]
        ]);
    }

    public function online_payment (Request $request){
            $client = new \GuzzleHttp\Client();

            $channel_payment = $client->request('POST', ENV('APP_URL_API').'langganan/examp/payment_method', [
                    'form_params'      => [
                        'id_invoice'   => decrypt($request->id_invoice),
                        'paymentcode'       => $request->payment_code,
                        'payment_channel'   => $request->channel_payment,  
                        'amount'            => $request->final_amount,
                        'id_voucher'        => $request->id_voucher,
                        'id_pelanggan'      => decrypt(Session::get('id_token_xmtrusr')),               
                    ]
            ]);


            $Order = $client->request('POST', ENV('APP_URL_API').'langganan/examp/getOrder', [
                    'form_params'           => [
                        'id_invoice'        => decrypt($request->id_invoice),
                    ]
            ]);
            $order =  json_decode($Order->getBody());

            $cost_midtrans = $request->final_amount - $order->amount;


            $channel_payment = $client->request('POST', ENV('APP_URL_API').'langganan/examp/amount_cost_ordel_deal', [
                    'form_params'      => [
                        'id_invoice'   => decrypt($request->id_invoice),
                        'amount_cost'  => $cost_midtrans,
                    ]
            ]);

            $Pelanggan = $client->request('POST', ENV('APP_URL_API').'langganan/examp/data_pelanggan', [
                    'form_params'      => [
                        'id_pelanggan'   => decrypt(Session::get('id_token_xmtrusr')),              
                    ]
            ]);
            $pelanggan =  json_decode($Pelanggan->getBody());


            $headers = [
                'Accept' => 'application/json', 
                'Content-Type' => 'application/json', 
                // 'Authorization' => 'Basic ' . base64_encode('SB-Mid-server-juzzj8oCGer3_4cZ5kgt_s46:'), 
                'Authorization' => 'Basic ' . base64_encode('Mid-server-0_7N8YEMOvU1GBFZtLEIkMFL:'), 
            ];

            $GetOrder = [
                'transaction_details' => [
                    'order_id' => $order->id_order,
                    'gross_amount' => $request->final_amount,
                ],
                'item_details' => [
                    'id' => $order->product,
                    'price' => $request->final_amount,
                    'quantity' => 1,
                    'name' => 'Bimbel Online'.' '.$order->kondisi,
                    'brand' => 'Permata Bimbel',
                    'category' => 'Bimbel',
                    'merchant_name' => 'PT. PermataMall',
                ],
                'customer_details' => [
                    'first_name'=> $pelanggan->nama,
                    'email'=> $pelanggan->email,
                    'phone' => $pelanggan->no_telpon,
                ],
                'enabled_payments' => [ 
                    $request->channel_payment
                ],
                'callbacks' => [
                    'finish' => 'www.permatamall.com'
                ],
                'expiry' => [
                    'start_time' => Carbon::now()->toDateTimeString().' +0700',
                    'unit' => 'day',
                    'duration' => 2
                ],
            ];

             $res = $client->post("https://app.midtrans.com/snap/v1/transactions", [
                'headers' => $headers, 
                'json' => $GetOrder,
            ]);
            
            // $res = $client->post("https://app.sandbox.midtrans.com/snap/v1/transactions", [
            //     'headers' => $headers, 
            //     'json' => $GetOrder,
            // ]);

           

            $response =  json_decode($res->getBody());

            return $response->token;
            
    }

    public function cancel_payment(Request $request){

   
       $client = new \GuzzleHttp\Client();

       $response = $client->request('POST', ENV('APP_URL_API').'langganan/examp/rejected', [
                'form_params'           => [
                    'id_invoice'      => decrypt($request->inv),
                ]
        ]);

       $cancel = $client->request('POST', ENV('APP_URL_API').'langganan/examp/cancel_payment', [
                'form_params'          => [
                    'id_invoice'       => decrypt($request->inv),
                ]
        ]);

        

    }

    public function proses (Request $request){
       $client = new \GuzzleHttp\Client();
       $responses = $client->request('POST', ENV('APP_URL_API').'langganan/examp/update_order', [
               'form_params'        => [
                   'id_order'       => decrypt($request->inv),
                   'payment_code'   => $request->method,              
               ]
       ]);
       $response =  json_decode($responses->getBody());

       return $response;
    }

    public function delete_payment (Request $request){
        $client = new \GuzzleHttp\Client();
        $responses = $client->request('POST', ENV('APP_URL_API').'langganan/examp/delete_payment_order', [
               'form_params'        => [
                   'id_order'       => decrypt($request->inv),
               ]
        ]);
        $response =  json_decode($responses->getBody());

       return $response;
    }

    public function insert_payment(Request $request){
        $client = new \GuzzleHttp\Client();
     
        // file upload
        $file = $request->file('upload');
        $name = str_random(10).time(). '_' . $file->getClientOriginalName();
        $path = base_path() .'/public/images/payment';
        $img  = Image::make($file->getRealPath());
        $img->resize(300, 500, function ($constraint) { // P X T
            $constraint->aspectRatio();
        })->save($path.'/'.$name);

        $client = new \GuzzleHttp\Client();
        $response = $client->request('POST', ENV('APP_URL_API_RESOURCE').'images/payment/upload', [
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

         $responses = $client->request('POST', ENV('APP_URL_API').'langganan/examp/input_payment', [
                'form_params'       => [
                    'id_user'       => decrypt(Session::get('id_token_xmtrusr')),
                    'id_invoice'    => decrypt($request->inv),
                    'file'          => $name,
                    'nama_pengirim' => 'PermataMall',
                ]
         ]);
         $response =  json_decode($responses->getBody());

         $response = $client->request('POST', ENV('APP_URL_API').'langganan/examp/send_mail_pembayaran', [
                'form_params'     => [
                    'id_order'       => decrypt($request->inv),
                    'id_pelanggan'   => decrypt(Session::get('id_token_xmtrusr')),
                    'file'           => $name,
                ]
        ]);

        return redirect()->route('Transaction.index');
    }


    public function get_matpel(Request $request){
        $client = new \GuzzleHttp\Client();
        $response = $client->request('POST', ENV('APP_URL_API').'langganan/examp/get_matpel', [
                'form_params'     => [
                    'jenis'       => $request->jenis,
                    'tingkat'     => $request->tingkat,
                    'tahun'       => $request->tahun,
                    'id_kelas'    => $request->id_kelas,
                ]
        ]);
        $matpel =  json_decode($response->getBody());

        echo "<option value=''>Pilih Mata Pelajaran</option>";
            foreach ($matpel as $key => $value) {
                echo "<option value='".$value->nama_matpel ."'>".$value->nama_matpel ."</option>";
            }
    } 

    public function gettahun(Request $request){
        $jenis = $request->id;
        $id_kelas = $request->id_kelas;

        $client = new \GuzzleHttp\Client();
        $response = $client->request('POST', ENV('APP_URL_API').'langganan/examp/get_tahun', [
                'form_params'           => [
                    'jenis'             => $jenis,
                    'id_kelas'          => $id_kelas,
                ]
        ]);
        $jenis =  json_decode($response->getBody());
      
        echo "<option value=''>Pilih</option>";
            foreach ($jenis as $key => $value) {
                echo "<option value='".$value->tahun_soal ."'>".$value->tahun_soal ."</option>";
            }

    } 


    public function getjenislatihan(Request $request){
        $client = new \GuzzleHttp\Client();
        $response = $client->request('POST', ENV('APP_URL_API').'langganan/examp/get_jenis_latihan/berbayar', [
                'form_params'     => [
                    'id_kelas'    => $request->id_kelas,
                    'tingkat'     => $request->id,
                ]
        ]);
        $jenis =  json_decode($response->getBody());
    
        return response()->json([
            'jenis' => $jenis,

        ]);
    }

    public function langganan($id)
    {      
        $pilihan = explode(',', base64_decode($id)); 

        $client = new \GuzzleHttp\Client();
        $response = $client->request('POST', ENV('APP_URL_API').'langganan/examp/online', [
                'form_params'           => [
                    'id_pelanggan'      => decrypt(Session::get('id_token_xmtrusr')),
                    'id_paket'          => $pilihan[0],
                ]
        ]);
        $Data =  json_decode($response->getBody()); 

        $Kategori_pilihan = $client->request('POST', ENV('APP_URL_API').'langganan/examp/kategori_pilihan', [
                'form_params'           => [
                    'id_pelanggan'      => decrypt(Session::get('id_token_xmtrusr')),
                ]
        ]);

        $kategori_pilihan = json_decode($Kategori_pilihan->getBody());

        Session::put('expired', $Data->Data->expired_bimbel_online);

        return view('examppermata::Berbayar.berbayar_pilih_paket')->with([
            'kategori_pilihan'       => $kategori_pilihan,
            'kategori_pilihan_siap'  => $kategori_pilihan,
            'kategori_pilihan_bedah' => $kategori_pilihan,
            'data'                   => $Data,
            'expired'                => $Data->Data->expired_bimbel_online,
            'nama_user'              => $Profile->nama ?? decrypt(Session::get('id_token_xmtrusr_name')),
            
        ]);
    }

    //selain kelas 11 dan kelas 10 -- start
    public function after_kelas($id){
       $data = json_decode(file_get_contents(ENV('APP_URL_API').'langganan/examp/check_payment/'.decrypt($id)));

       $client = new \GuzzleHttp\Client();
       $Kategori_pilihan = $client->request('POST', ENV('APP_URL_API').'langganan/examp/kategori_pilihan', [
               'form_params'           => [
                   'id_pelanggan'      => decrypt(Session::get('id_token_xmtrusr')),
               ]
       ]);

       $kategori_pilihan = json_decode($Kategori_pilihan->getBody());

       $response = $client->request('POST', ENV('APP_URL_API').'langganan/examp/get_data_paket_berbayar', [
               'form_params'           => [
                   'id_kelas'           => $data->paket->id_kelas,
               ]
       ]);
       $paket =  json_decode($response->getBody());
       
       return view('examppermata::Berbayar.berbayar_tahun_tingkat_paket')->with([
            'data'                   => $data,
            'paket'                  => $paket->data,
            'kategori_pilihan_image' => $kategori_pilihan,
            'kategori_pilihan'       => $kategori_pilihan,
            'nama_user'              => $Profile->nama ?? decrypt(Session::get('id_token_xmtrusr_name')),
        ]);
    }

    public function after_jenis($id){
        
        $dec = decrypt($id);
        $id_invoice = encrypt($dec[0]);
        $id_kelas = $dec[1];
        $jenis = $dec[2];
        $images_jenis = $dec[3];

        $data = json_decode(file_get_contents(ENV('APP_URL_API').'langganan/examp/check_payment/'.decrypt($id_invoice)));

        $client = new \GuzzleHttp\Client();
        $response = $client->request('POST', ENV('APP_URL_API').'langganan/examp/get_tahun', [
                'form_params'           => [
                    'jenis'             => $jenis,
                    'id_kelas'          => $id_kelas,
                ]
        ]);
        $tahun =  json_decode($response->getBody());


        $Kategori_pilihan = $client->request('POST', ENV('APP_URL_API').'langganan/examp/kategori_pilihan', [
                'form_params'           => [
                    'id_pelanggan'      => decrypt(Session::get('id_token_xmtrusr')),
                ]
        ]);
        $kategori_pilihan = json_decode($Kategori_pilihan->getBody());

        return view('examppermata::Berbayar.berbayar_tahun_paket')->with([
            'data'                  => $data, 
            'tahun'                 => $tahun,
            'kategori_pilihan'      => $kategori_pilihan,
            'nama_user'             => $Profile->nama ?? decrypt(Session::get('id_token_xmtrusr_name')),
            'jenis'                 => $jenis,
            'images_jenis'          => $images_jenis,
        ]);
    }

    public function after_tahun($id){
        $dec = decrypt($id);
        $id_invoice = encrypt($dec[0]);
        $id_kelas = $dec[1];
        $tahun = $dec[2];
        $jenis = $dec[3];
        $images_jenis = $dec[4];

        $data = json_decode(file_get_contents(ENV('APP_URL_API').'langganan/examp/check_payment/'.decrypt($id_invoice)));

        $client = new \GuzzleHttp\Client();
        $response = $client->request('POST', ENV('APP_URL_API').'langganan/examp/get_matpel', [
                'form_params'     => [
                    'jenis'       => $jenis,
                    'tahun'       => $tahun,
                    'id_kelas'    => $id_kelas,
                ]
        ]);
        $matpel =  json_decode($response->getBody());

        $Kategori_pilihan = $client->request('POST', ENV('APP_URL_API').'langganan/examp/kategori_pilihan', [
                'form_params'           => [
                    'id_pelanggan'      => decrypt(Session::get('id_token_xmtrusr')),
                ]
        ]);

        $kategori_pilihan = json_decode($Kategori_pilihan->getBody());

        $penggunaan_api = $client->request('POST', ENV('APP_URL_API').'mobile/home/panduan/bo', [
                'form_params'   => [
                    'flag'      => 'langganan',
                ]
        ]);

        $penggunaan = json_decode($penggunaan_api->getBody());

        return view('examppermata::Berbayar.berbayar_matpel_paket')->with([
            'data'                => $data, 
            'matpel'              => $matpel,
            'kategori_pilihan'    => $kategori_pilihan,
            'nama_user'           => $Profile->nama ?? decrypt(Session::get('id_token_xmtrusr_name')),
            'jenis'               => $jenis,
            'tahun'               => $tahun,
            'images_jenis'        => $images_jenis,
            'penggunaan'          => $penggunaan->data
        ]);
    }

    public function after_matpel($id){
        $dec = decrypt($id);
        $id_invoice = encrypt($dec[0]);
        $id_kelas = $dec[1];
        $tahun = $dec[2];
        $jenis = $dec[3];
        $matpel = $dec[4];
        $client = new \GuzzleHttp\Client();
        file_get_contents(ENV('APP_URL_API').'bo/berbayar/list/remove_temp/'.decrypt(Session::get('id_token_xmtrusr')));

        $data = json_decode(file_get_contents(ENV('APP_URL_API').'langganan/examp/check_payment/'.decrypt($id_invoice)));
        $CountSoal = $client->request('POST', ENV('APP_URL_API').'bo/berbayar/count_soal', [
                'form_params'       => [
                    'jenis_paket'   => $jenis,
                    'tahun_soal'    => $tahun,
                    'nama_matpel'   => $matpel,
                    'id_kelas'      => $id_kelas,
                ]
        ]);
        $count = json_decode($CountSoal->getBody());
        

        $ListMapel = $client->request('POST', ENV('APP_URL_API').'bo/berbayar/list/new_confirm_silabus', [
                        'form_params'       => [
                        'id_kelas'          => $id_kelas,
                        'jenis'             => $jenis,
                        'mata_pelajaran'    => $matpel,
                    ]
            ]);

        $list_matpel = json_decode($ListMapel->getBody());

        Session::put('id_matpel_online', $list_matpel[0]->id_matpel);

        $soal_kita = array();
        foreach (json_decode($ListMapel->getBody()) as $key => $value) {    

            $ListSoal = $client->request('POST', ENV('APP_URL_API').'bo/berbayar/list/new_soal', [
                        'form_params'           => [
                        'jenis'             => $value->jenis_paket,
                        'mata_pelajaran'    => $value->mata_pelajaran,
                        'tahun'             => $tahun,
                        'limit'             => $value->jumlah_soal,
                        'id_kelas'          => $value->id_kelas
                    ]
            ]);

            foreach (json_decode($ListSoal->getBody())->listSoal as $keys => $soal) {
                $soal_kita[] = $soal;
            }
        }

        foreach ($soal_kita as $key => $soal) {
            
            $response = $client->request('POST', ENV('APP_URL_API').'bo/berbayar/store/temp', [
                    'form_params'       => [
                        'id_soal'       => $soal->id_soal,
                        'id_user'       => decrypt(Session::get('id_token_xmtrusr')),
                        'waktu'         => $soal->waktu,
                        'jawaban_betul' => $soal->jawaban,
                    ]
            ]);
        }

        

        $SoalTemp    = json_decode(file_get_contents(ENV('APP_URL_API').'bo/berbayar/store/list/confirm/'.decrypt(Session::get('id_token_xmtrusr'))));  


        $profile = array(
            'nama'          => decrypt(Session::get('id_token_xmtrusr_name')), 
            'jumlahSoal'    => $count->count, 
            'dataSource'    => encrypt($SoalTemp->data),
        );


        Session::put('tokenSources_Langganan_'.Session::get('id_token_xmtrusr'),encrypt($SoalTemp->data));

        $keterangan_value = '{"_kelas":"'.$data->Data->keterangan.' '.$data->Data->kondisi.'","_tingkat":"'.$jenis.'","_mata_pelajaran":"'.$matpel.'","jenis_paket":"'.$jenis.'","tahun_soal":"'.$tahun.'"}';

        $client = new \GuzzleHttp\Client();
        $response = $client->request('POST', ENV('APP_URL_API').'bo/berbayar/store/process', [
                'form_params'       => [
                    'id_user'       => decrypt(Session::get('id_token_xmtrusr')),
                    'keterangan'    => $keterangan_value,
                    // 'waktu_test'    => decrypt(Session::get('token_langganan'.Session::get('id_token_xmtrusr'))),
                    'status'        => 'Mulai',
                    'jenis_paket'   => $jenis,
                    'tahun_soal'    => $tahun,
                    'id_kelas'      => $id_kelas,
                    'id_matpel'     => session::get('id_matpel_online'),
                ]
        ]);
        $responses = json_decode($response->getBody());
        
        if ($responses->status == true) {
            $sourcesData = decrypt(Session::get('tokenSources_Langganan_'.Session::get('id_token_xmtrusr')));
            foreach ($sourcesData as $key => $value) {            
                $response = $client->request('POST', ENV('APP_URL_API').'bo/berbayar/store/process/soal', [
                    'form_params'       => [
                        'id_soal'       => $value->id_soal,
                        'jawaban_betul' => $value->jawaban_betul,
                        'id_user'       => decrypt(Session::get('id_token_xmtrusr')),
                        'id_examp'      => $responses->data,
                    ]
                ]);
            }
        }

        Session::put('token_examp_berbayar_'.Session::get('id_token_xmtrusr'),encrypt($responses->data));

       return redirect()->route('ExampPermata.ETestLangganan.index');
    }


    public function langganan_confirm(Request $request)
    {   
        $client = new \GuzzleHttp\Client();
        file_get_contents(ENV('APP_URL_API').'bo/berbayar/list/remove_temp/'.decrypt(Session::get('id_token_xmtrusr')));

        $CountSoal = $client->request('POST', ENV('APP_URL_API').'bo/berbayar/count_soal', [
                'form_params'       => [
                    'jenis_paket'   => $request->_jenis_latihan,
                    'tahun_soal'    => $request->_tahun,
                    'nama_matpel'   => $request->_mata_pelajaran,
                    'id_kelas'      => $request->id_kelas,
                ]
        ]);
        $count = json_decode($CountSoal->getBody());

        
        $ListMapel = $client->request('POST', ENV('APP_URL_API').'bo/berbayar/list/new_confirm_silabus', [
                        'form_params'       => [
                        'id_kelas'          => $request->id_kelas,
                        'jenis'             => $request->_jenis_latihan,
                        'mata_pelajaran'    => $request->_mata_pelajaran,
                    ]
            ]);

        $list_matpel = json_decode($ListMapel->getBody());

        Session::put('id_matpel_online', $list_matpel[0]->id_matpel);

        $soal_kita = array();
        foreach (json_decode($ListMapel->getBody()) as $key => $value) {    

            $ListSoal = $client->request('POST', ENV('APP_URL_API').'bo/berbayar/list/new_soal', [
                        'form_params'           => [
                        'jenis'             => $value->jenis_paket,
                        'mata_pelajaran'    => $value->mata_pelajaran,
                        'tahun'             => $request->_tahun,
                        'limit'             => $value->jumlah_soal,
                        'id_kelas'          => $value->id_kelas
                    ]
            ]);

            foreach (json_decode($ListSoal->getBody())->listSoal as $keys => $soal) {
                $soal_kita[] = $soal;
            }
        }
        

        foreach ($soal_kita as $key => $soal) {
            
            $response = $client->request('POST', ENV('APP_URL_API').'bo/berbayar/store/temp', [
                    'form_params'       => [
                        'id_soal'       => $soal->id_soal,
                        'id_user'       => decrypt(Session::get('id_token_xmtrusr')),
                        'waktu'         => $soal->waktu,
                        'jawaban_betul' => $soal->jawaban,
                    ]
            ]);
        }

        

        $SoalTemp    = json_decode(file_get_contents(ENV('APP_URL_API').'bo/berbayar/store/list/confirm/'.decrypt(Session::get('id_token_xmtrusr'))));  


        // profile user
        $profile = array(
            'nama'          => decrypt(Session::get('id_token_xmtrusr_name')), 
            'jumlahSoal'    => $count->count, 
            'dataSource'    => encrypt($SoalTemp->data),
        );

        // dd($SoalTemp->datas);

            Session::put('tokenSources_Langganan_'.Session::get('id_token_xmtrusr'),encrypt($SoalTemp->data));

        return array([
            'Information' => json_encode($profile)
        ]);
    }

    public function langganan_process(Request $request)
    {
        $keterangan_value = '{"_kelas":"'.$request->_kelas.'","_tingkat":"'.$request->_tingkat.'","_mata_pelajaran":"'.$request->_mata_pelajaran.'","jenis_paket":"'.$request->_jenis_latihan.'","tahun_soal":"'.$request->_tahun.'"}';

        $client = new \GuzzleHttp\Client();
        $response = $client->request('POST', ENV('APP_URL_API').'bo/berbayar/store/process', [
                'form_params'       => [
                    'id_user'       => decrypt(Session::get('id_token_xmtrusr')),
                    'keterangan'    => $keterangan_value,
                    // 'waktu_test'    => decrypt(Session::get('token_langganan'.Session::get('id_token_xmtrusr'))),
                    'status'        => 'Mulai',
                    'jenis_paket'   => $request->_jenis_latihan,
                    'tahun_soal'    => $request->_tahun,
                    'id_kelas'      => $request->id_kelas,
                    'id_matpel'     => session::get('id_matpel_online'),
                ]
        ]);
        $responses = json_decode($response->getBody());
        
        if ($responses->status == true) {
            $sourcesData = decrypt(Session::get('tokenSources_Langganan_'.Session::get('id_token_xmtrusr')));
            foreach ($sourcesData as $key => $value) {            
                $response = $client->request('POST', ENV('APP_URL_API').'bo/berbayar/store/process/soal', [
                    'form_params'       => [
                        'id_soal'       => $value->id_soal,
                        'jawaban_betul' => $value->jawaban_betul,
                        'id_user'       => decrypt(Session::get('id_token_xmtrusr')),
                        'id_examp'      => $responses->data,
                    ]
                ]);
            }
        }

        Session::put('token_examp_berbayar_'.Session::get('id_token_xmtrusr'),encrypt($responses->data));
        return "5041";
    }

    public function getjenis(Request $request){
        if (!empty($request->id)) {
            $data = json_decode(file_get_contents(ENV('APP_URL_API').'langganan/examp/check_payment/'.decrypt($request->id)));

             if ($data->Data->status_order == "In Progres") {
                $client = new \GuzzleHttp\Client();

                $response = $client->request('POST', ENV('APP_URL_API').'langganan/examp/get_data_paket_berbayar', [
                        'form_params'           => [
                            'id_kelas'           => $data->paket->id_kelas,
                        ]
                ]);
                $paket =  json_decode($response->getBody());



                return response()->json([
                    'status'        => 'in Progres',
                    'data'          => $paket->data,
                    'tingkat'       => $paket->tingkat,
                    'data_order'    => $data->Data,
                    'id_kelas'      => $data->paket->id_kelas

                ]);
             }else{
                return response()->json([
                    'status'        => 'Pending',
                    'data'          => encrypt($data->Data->id_order),
                    'data_order'    => $data,
                ]);
             }
        }else{
            return response()->json([
                'status' => 'None',
                'data'   => 'None',
            ]);
        }  
    }

    public function order_langganan($id){

    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function payment($id)
    {           
        if (ENV('APP_ENV') == "Production") {
            $data   = json_decode(file_get_contents(ENV('APP_URL_API').'web/payment/online/amount/'.decrypt($id)[0]));
            return view('examppermata::GetStarted.payment_production')->with([
                'data'   => $data
            ]);
        }else{
            return view('examppermata::GetStarted.payment')->with([
                'data'   => decrypt($id)
            ]);
        }           
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function paymentStore(Request $request)
    {           

        $validatedData = $request->validate([
            'nama'          => 'required',
            'nama_bank'     => 'required',
            'upload'        => 'required',
        ]);

        $product_invoice = decrypt($request->product_invoice);

        // file upload
        $file = $request->file('upload');
        $name = str_random(10).time() . '_' . $file->getClientOriginalName();
        $path = base_path() .'/public/images/payment';
        $img  = Image::make($file->getRealPath());
        $img->resize(300, 500, function ($constraint) { // P X T
            $constraint->aspectRatio();
        })->save($path.'/'.$name);

        $client = new \GuzzleHttp\Client();
        $response = $client->request('POST', ENV('APP_URL_API_RESOURCE').'images/payment/upload', [
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

        $response = $client->request('POST', ENV('APP_URL_API').'web/payment/draft', [
            'multipart' => [                
                [
                    'name'     => 'id_user',
                    'contents' => decrypt(Session::get('id_token_xmtrusr'))
                ],
                [
                    'name'     => 'id_invoice',
                    'contents' => $product_invoice
                ],
                [
                    'name'     => 'nama_pengirim',
                    'contents' => $request->nama
                ],
                [
                    'name'     => 'nama_bank',
                    'contents' => $request->nama_bank
                ],
                [
                    'name'     => 'upload_file',
                    'contents' => $name,
                ],
                [
                    'name'     => 'status',
                    'contents' => 'Requested'
                ]
            ]
        ]);

        unlink($path.'/'.$name);

        if ($response->getBody() == "Already") {
            Alert::error('Anda sudah melakukan upload pembayaran', 'error');
            return redirect()->route('ExampPermata.getStarted');
        }else{
            Alert::success('Terima Kasih sudah melakukan Pembayaran', 'Terima Kasih');
            return redirect()->route('ExampPermata.getStarted');
        }
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function start()
    {   
        $Profile = json_decode(file_get_contents(ENV('APP_URL_API').'bo/profile/'.decrypt(Session::get('id_token_xmtrusr'))));

        if (!empty($Profile)) {
            $data       = $Profile; 
            $terakhir   = json_decode($Profile->keterangan);
            $status     = $Profile->status;
        }else{
            $data       = "";
            $terakhir   = "Belum Ada Tes";
            $status     = "Kosong";
        }
        file_get_contents(ENV('APP_URL_API').'bo/list/remove_temp/'.decrypt(Session::get('id_token_xmtrusr')));
        $ListProd   = json_decode(file_get_contents(ENV('APP_URL_API').'bo/list/kelas'));


        return view('examppermata::GetStarted.index')->with([
            'data'      => $data,
            'ListProd'  => $ListProd,
            'status'    => $status,
            'terakhir'  => $terakhir,
            'nama_user' => $Profile->nama ?? decrypt(Session::get('id_token_xmtrusr_name'))
        ]);
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function storeRequest(Request $request)
    {
        return $request->all();
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function token_berlangganan($token,$no)
    {
        if (decrypt($token) == "berbayar") {
            $client = new \GuzzleHttp\Client();
            $response = $client->request('POST', ENV('APP_URL_API').'web/mitra/product/private/order', [
                    'form_params'           => [
                        'id_user_order'     => decrypt(Session::get('id_token_xmtrusr')),
                        'id_product_order'  => '',
                        'product'           => 'Private',
                        'status_order'      => 'Requested',
                        'keterangan'        => 'request bimbel premium',
                        'kondisi'           => 'request bimbel premium',
                    ]
            ]);

            if ($response->getBody() == "Requested") {
                Alert::error('anda sudah terdaftar dengan premium paket 1 tahun', 'Maaf');
                return redirect()->route('ExampPermata.index');
            }else{
                $responses      = json_decode($response->getBody());                
                return $responses[0];
            }
            return view('examppermata::Langganan.Berbayar');
        }else{
            return view('examppermata::Langganan.Free');
        }
    }


    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function mapel(Request $request)
    {
        if ($request->id == "") {
            echo "<option value=''>Pilih Mata Pelajaran</option>";
        }else{
            $ListMapel   = json_decode(file_get_contents(ENV('APP_URL_API').'bo/list/mapel/'.str_replace(' ', '%20', $request->id)));
            echo "<option value=''>Pilih Mata Pelajaran</option>";
            foreach ($ListMapel as $key => $value) {
                echo "<option value='".$value."'>".$value."</option>";
            }            
        }
    }
    
    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function silabus(Request $request)
    {
        if ($request->id == "") {
            echo "";
        }else{
            $ListSilabus   = json_decode(file_get_contents(ENV('APP_URL_API').'bo/list/silabus/'.str_replace(' ', '%20', $request->kelas).'/'.str_replace(' ', '%20', $request->id)));

            foreach ($ListSilabus as $key => $value) {
                echo "<ul>
                    <input type='hidden' name='silabus[]' value='".$value->silabus."'>
                    <li> <i class='fa fa-adjust' aria-hidden='true'></i> ".$value->silabus."</li>
                </ul>
                ";
                // echo "<div class='panel panel-default'>
                //       <div class='panel-heading' role='tab' id='headingTwo'>
                //         <h4 class='panel-title'>
                //         <input type='hidden' name='silabus[]' value='".$value->silabus."'>
                //           <a class='collapsed' role='button' data-toggle='collapse' data-parent='#accordion' href='#collapseTwo".$key."' aria-expanded='false' aria-controls='collapseTwo".$key."'>
                //             <i class='fa fa-list'></i> ".$value->silabus."
                //           </a>
                //         </h4>
                //       </div>
                      
                //     </div>
                //     ";
            }
        }

    }


    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function confirm(Request $request)
    {
        file_get_contents(ENV('APP_URL_API').'bo/list/remove_temp/'.decrypt(Session::get('id_token_xmtrusr')));
        $ListSilabus    = json_decode(file_get_contents(ENV('APP_URL_API').'bo/list/confirm_silabus/'.str_replace(' ', '%20', $request->kelas).'/'.str_replace(' ', '%20', $request->matpel).'/'.str_replace(' ', '%20', implode(',', $request->silabus))));

        $soal_kita = array();
        foreach ($ListSilabus as $key => $value) {            
            $ListSoal   = json_decode(file_get_contents(ENV('APP_URL_API').'bo/list/soal/'.str_replace(' ', '%20', $value->kelas).'/'.str_replace(' ', '%20', $value->mata_pelajaran).'/'.str_replace(' ', '%20', $value->silabus).'/'.$value->jumlah_soal));
            foreach ($ListSoal as $keys => $soal) {
                $soal_kita[] = $soal;
            }
        }    
        foreach ($soal_kita as $key => $soal) {
            $client = new \GuzzleHttp\Client();
            $response = $client->request('POST', ENV('APP_URL_API').'bo/store/temp', [
                    'form_params'       => [
                        'id_soal'       => $soal->id_soal,
                        'id_user'       => decrypt(Session::get('id_token_xmtrusr')),
                        'waktu'         => $soal->waktu,
                        'jawaban_betul' => $soal->jawaban,
                    ]
            ]);
        }
        $SoalTemp    = json_decode(file_get_contents(ENV('APP_URL_API').'bo/store/list/confirm/'.decrypt(Session::get('id_token_xmtrusr'))));           
        // profile user
        $profile = array(
            'nama'          => decrypt(Session::get('id_token_xmtrusr_name')), 
            'kelas'         => $request->kelas, 
            'matpel'        => $request->matpel, 
            'total_silabus' => count($request->silabus), 
            'jumlahSoal'    => $SoalTemp->jumlahSoal->count, 
            'TotalWaktu'    => $SoalTemp->TotalWaktu, 
            'dataSource'    => encrypt($SoalTemp->data)
        );

        Session::put('token_'.Session::get('id_token_xmtrusr'),encrypt($SoalTemp->TotalWaktu));
        Session::put('tokenSources_'.Session::get('id_token_xmtrusr'),encrypt($SoalTemp->data));

        return array([
            'Information' => json_encode($profile)
        ]);
    }


    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function process(Request $request)
    {
        $client = new \GuzzleHttp\Client();
        $response = $client->request('POST', ENV('APP_URL_API').'bo/store/process', [
                'form_params'       => [
                    'id_user'       => decrypt(Session::get('id_token_xmtrusr')),
                    'keterangan'    => $request->all(),
                    'waktu_test'    => decrypt(Session::get('token_'.Session::get('id_token_xmtrusr'))),
                    'status'        => 'Mulai',
                ]
        ]);
        $responses = json_decode($response->getBody());
        if ($responses != 0) {
            $sourcesData = decrypt(Session::get('tokenSources_'.Session::get('id_token_xmtrusr')));
            foreach ($sourcesData as $key => $value) {            
                $response = $client->request('POST', ENV('APP_URL_API').'bo/store/process/soal', [
                    'form_params'       => [
                        'id_soal'       => $value->id_soal,
                        'jawaban_betul' => $value->jawaban_betul,
                        'id_user'       => decrypt(Session::get('id_token_xmtrusr')),
                        'id_examp'      => $responses,
                    ]
                ]);
            }
        }
        return "5041";
    }


    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    

    public function langganan_confirm_siap_un(Request $request)
    {           
        $client = new \GuzzleHttp\Client();
        file_get_contents(ENV('APP_URL_API').'bo/berbayar/list/remove_temp/'.decrypt(Session::get('id_token_xmtrusr')));

        $CountSoal = $client->request('POST', ENV('APP_URL_API').'bo/berbayar/count_soal', [
                'form_params'       => [
                    'tingkat'       => $request->_tingkat,
                    'jenis_paket'   => 'SIAP UN',
                    'tahun_soal'    => '2020',
                    'nama_matpel'   => $request->_mata_pelajaran,
                ]
        ]);
        $count = json_decode($CountSoal->getBody());

        $ListMapel = $client->request('POST', ENV('APP_URL_API').'bo/berbayar/list/new_confirm_silabus', [
                        'form_params'       => [
                        'tingkat'           => $request->_tingkat,
                        'invoice'           => decrypt($request->_test_online),
                        'jenis'             => 'SIAP UN',
                        'mata_pelajaran'    => $request->_mata_pelajaran,
                    ]
            ]);

        $soal_kita = array();
        foreach (json_decode($ListMapel->getBody()) as $key => $value) {    

            $ListSoal = $client->request('POST', ENV('APP_URL_API').'bo/berbayar/list/new_soal', [
                        'form_params'           => [
                        'tingkat'           => $value->tingkat,
                        'jenis'             => 'SIAP UN',
                        'mata_pelajaran'    => $value->mata_pelajaran,
                        'tahun'             => '2020',
                        'limit'             => $value->jumlah_soal,
                    ]
            ]);

            foreach (json_decode($ListSoal->getBody())->listSoal as $keys => $soal) {
                $soal_kita[] = $soal;
            }
        }
        
        foreach ($soal_kita as $key => $soal) {
            
            $response = $client->request('POST', ENV('APP_URL_API').'bo/berbayar/store/temp', [
                    'form_params'       => [
                        'id_soal'       => $soal->id_soal,
                        'id_user'       => decrypt(Session::get('id_token_xmtrusr')),
                        'waktu'         => $soal->waktu,
                        'jawaban_betul' => $soal->jawaban,
                    ]
            ]);
        }

        

        $SoalTemp    = json_decode(file_get_contents(ENV('APP_URL_API').'bo/berbayar/store/list/confirm/'.decrypt(Session::get('id_token_xmtrusr'))));  


        // profile user
        $profile = array(
            'nama'          => decrypt(Session::get('id_token_xmtrusr_name')), 
            'jumlahSoal'    => $count->count, 
            'dataSource'    => encrypt($SoalTemp->data),
        );

        // dd($SoalTemp->datas);

            Session::put('tokenSources_Langganan_'.Session::get('id_token_xmtrusr'),encrypt($SoalTemp->data));

        return array([
            'Information' => json_encode($profile)
        ]);
    }


    /**
     * Show the form for creating a new resource.
     * @return Response
     */
   public function video_langganan(Request $request,$id)
    {      
          $client = new \GuzzleHttp\Client();
          $Matpel_API = $client->request('POST', ENV('APP_URL_API').'bo/berbayar/video/get_matpel_video', [
                      'form_params'       => [
                          'id_kelas'   => decrypt($id),   
                      ]
                  ]);
          $matpel = json_decode($Matpel_API->getBody());

          if (isset($request->page)) {
              if ($request->page == 0) {
                  // $Video   = json_decode(file_get_contents(ENV('APP_URL_API').'bo/berbayar/video/semua/1/12'));
                  $Video_API = $client->request('POST', ENV('APP_URL_API').'bo/berbayar/video/semua/1/12', [
                      'form_params'       => [
                          'id_kelas'        => decrypt($id),
                          'matapelajaran'   => $request->matapelajaran
                      ]
                  ]);
                  $Video = json_decode($Video_API->getBody());
                  $lastPage = 1;
              }else{
                  $Video_API = $client->request('POST', ENV('APP_URL_API').'bo/berbayar/video/semua/'.$request->page.'/12', [
                      'form_params'       => [
                          'id_kelas'   => decrypt($id),  
                          'matapelajaran'   => $request->matapelajaran 
                      ]
                  ]);
                  $Video = json_decode($Video_API->getBody());
                  $lastPage = $request->page;
              }            
          }else{
              $Video_API = $client->request('POST', ENV('APP_URL_API').'bo/berbayar/video/semua/1/12', [
                      'form_params'       => [
                          'id_kelas'   => decrypt($id), 
                          'matapelajaran'   => $request->matapelajaran  
                      ]
                ]);
                $Video = json_decode($Video_API->getBody());
                $lastPage = 1;
          }  
          // dd($lastPage);
        return view('examppermata::Langganan.video')->with([
            '_tingkat'  => $request->tingkat,
            '_matpel'   => $request->matapelajaran,
            'data'      => $Video,
            'video'     => $Video->data,
            'lastPage'  => $lastPage,
            'id'        => decrypt($id),
            'matpel'    => $matpel,
        ]);
    }


    public function matpel_video(Request $request){
        $client = new \GuzzleHttp\Client();
        $response = $client->request('POST', ENV('APP_URL_API').'bo/berbayar/video/matpel', [
            'form_params'       => [
                'tingkat'       => $request->tingkat,
            ]
        ]);
        $responses = json_decode($response->getBody());

        echo "<option value=''>Pilih</option>";
            foreach ($responses as $key => $value) {
                echo "<option value='".$value->nama_matpel ."'>".$value->nama_matpel ."</option>";
        }
    }

    public function video_nambah_view($id){
        $nambah_view   = json_decode(file_get_contents(ENV('APP_URL_API').'bo/gratis_nolog/video/nambah_view/'.$id));

        return redirect()->route('ExampPermata.video_langganan_slug',[$id]); 
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function video_langganan_slug($id)
    {        
        $dec =  decrypt($id);
        $Detail_Product   = json_decode(file_get_contents(ENV('APP_URL_API').'bo/berbayar/video/detail/'.$dec[0]));
        $client = new \GuzzleHttp\Client();
        $response = $client->request('POST', ENV('APP_URL_API').'bo/berbayar/video/serupa', [
            'form_params'    => [
                'id_kelas'   => $dec[1],
            ]
        ]);
        $Serupa = json_decode($response->getBody());
        return view('examppermata::Langganan.video_slug')->with([
            'detail'    => $Detail_Product,
            'Serupa'    => $Serupa,   
            'id'        => $dec[1],         
        ]);
    }

    public function ringkasan(Request $request,$id){
        $client = new \GuzzleHttp\Client();
        $ringkasan_api = $client->request('POST', ENV('APP_URL_API').'bo/berbayar/ringkasan', [
            'form_params'       => [
                'id_kelas'       => decrypt($id),
            ]
        ]);
        $ringkasan = json_decode($ringkasan_api->getBody());

        return view('examppermata::Langganan.ringkasan')->with([
            'id'    => decrypt($id),   
            'data'  => $ringkasan,      
        ]);
    }

    public function matapelajaran_bedah_materi(Request $request){
        $data = json_decode(file_get_contents(ENV('APP_URL_API').'langganan/examp/check_payment/'.decrypt($request->id)));

        $tingkat = $data->keterangan.' '.$data->kondisi;    
        
        $client = new \GuzzleHttp\Client();
        $response = $client->request('POST', ENV('APP_URL_API').'langganan/examp/get_matpel_bedahmateri', [
                'form_params'           => [
                    'tingkat'           => $tingkat,
                ]
        ]);

        $matpel =  json_decode($response->getBody());

        echo "<option value=''>Pilih Mata Pelajaran</option>";
            foreach ($matpel as $key => $value) {
                echo "<option value='".$value->matapelajaran ."'>".$value->matapelajaran ."</option>";
            }
    }

    public function silabus_bedah_materi(Request $request){
        $data = json_decode(file_get_contents(ENV('APP_URL_API').'langganan/examp/check_payment/'.decrypt($request->id)));
        $tingkat = $data->keterangan.' '.$data->kondisi;    

        $client = new \GuzzleHttp\Client();
        $response = $client->request('POST', ENV('APP_URL_API').'langganan/examp/get_silabus_bedahmateri', [
                'form_params'           => [
                    'matapelajaran'     => $request->matapelajaran,
                    'tingkat'           => $tingkat,
                ]
        ]);
        $silabus =  json_decode($response->getBody());

        echo "<option value=''>Pilih Silabus</option>";
            foreach ($silabus as $key => $value) {
                echo "<option value='".$value->id ."'>".$value->silabus ."</option>";
            }
    }

    public function keterangan_bedah_materi(Request $request){
        $client = new \GuzzleHttp\Client();
        $response = $client->request('POST', ENV('APP_URL_API').'langganan/examp/get_file_bedahmateri', [
                'form_params'           => [
                    'id'     => $request->id,
                ]
        ]);
        $keterangan =  json_decode($response->getBody());
        return response()->json([
                    'status'        => $keterangan[0]->file_bedah_soal,
                    'keterangan'    => $keterangan[0]->keterangan,
                ]);       
    }

    public function GetFilePdf(Request $request){
        $client = new \GuzzleHttp\Client();
        $response = $client->request('POST', ENV('APP_URL_API').'langganan/examp/get_file_bedahmateri', [
                'form_params'           => [
                    'id'    => $request->id,
                ]
        ]);
        $keterangan =  json_decode($response->getBody());
        if ($keterangan->responses == 200) {
            $url = ENV('APP_URL_API_RESOURCE')."images/bedahmateri/bimbel-online/bedah-materi/".$keterangan->data."#toolbar=0";
            echo "<iframe type='application/pdf' src=".$url." style='width:100%; height:400px;'></iframe>";
        }else{
            return 'null';
        }
    }

    public function pengembangan(Request $request){
         return view('examppermata::pengembangan');
    }

    
    
}
