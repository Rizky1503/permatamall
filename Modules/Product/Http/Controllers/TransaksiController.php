<?php

namespace Modules\Product\Http\Controllers;

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

        $url    = ENV('APP_URL_API').'web/Transaction/list/'.decrypt(Session::get('id_token_xmtrusr')).'/1'.'/10';
        $List   = json_decode(file_get_contents($url));
        // dd($List);
        return view('product::Transaction.index')->with([
            'List' => $List
        ]);
    }


    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function detail($id)
    {
        $url        = ENV('APP_URL_API').'web/Transaction/detail/'.decrypt($id);
        $Detail      = json_decode(file_get_contents($url));

        if (isset($Detail->Product)) {
            $prod = $Detail->Product->nama_produk;
        }else{
            $prod = "Sedang dalam proses PT. Permata Mall Nusantara";
        }

        $manual   = json_decode(file_get_contents(ENV('APP_URL_API').'langganan/examp/payment_manual'));
        $online   = json_decode(file_get_contents(ENV('APP_URL_API').'langganan/examp/payment_online'));

        $client = new \GuzzleHttp\Client();

        $Order = $client->request('POST', ENV('APP_URL_API').'langganan/examp/private_order', [
                'form_params'     => [
                    'id_order'     => $Detail->transaksi->id_order,
                    'id_user_order'  => decrypt(Session::get('id_token_xmtrusr')),              
                ]
        ]);
        $order =  json_decode($Order->getBody());

        $checkPayment = $client->request('POST', ENV('APP_URL_API').'langganan/examp/cek_in_payment', [
                'form_params'     => [
                    'id_user'     => decrypt(Session::get('id_token_xmtrusr')),
                    'id_invoice'  => $Detail->transaksi->id_order,              
                ]
        ]);
        $checkPayment =  json_decode($checkPayment->getBody());


        return view('product::Transaction.detail')->with([
            "Detail"        => $Detail->transaksi,
            "product"       => $prod,
            'manual'        => $manual,
            'online'        => $online,
            'cek'           => $checkPayment[0]->count,
            'ide'           => $id,
            'data'          => $order,
        ]);
    }

     public function online_payment (Request $request){
            $client = new \GuzzleHttp\Client();

            $Order = $client->request('POST', ENV('APP_URL_API').'langganan/examp/getOrder', [
                    'form_params'      => [
                        'id_invoice'   => decrypt($request->id_invoice),              
                    ]
            ]);
            $order =  json_decode($Order->getBody());

            $Pelanggan = $client->request('POST', ENV('APP_URL_API').'langganan/examp/data_pelanggan', [
                    'form_params'      => [
                        'id_pelanggan'   => decrypt(Session::get('id_token_xmtrusr')),              
                    ]
            ]);
            $pelanggan =  json_decode($Pelanggan->getBody());

            $headers = [
                'Accept' => 'application/json', 
                'Content-Type' => 'application/json', 
                'Authorization' => 'Basic ' . base64_encode('SB-Mid-server-juzzj8oCGer3_4cZ5kgt_s46:'), 
            ];

            $GetOrder = [
                'transaction_details' => [
                    'order_id' => $order->id_order,
                    'gross_amount' => $request->amount,
                ],
                'item_details' => [
                    'id' => $order->product,
                    'price' => $request->amount,
                    'quantity' => 1,
                    'name' => 'Les Private',
                    'brand' => 'Permata Private',
                    'category' => 'Private',
                    'merchant_name' => 'PT. PermataMall',
                ],
                'customer_details' => [
                    'first_name'=> $pelanggan->nama,
                    'email'=> $pelanggan->email,
                    'phone' => $pelanggan->no_telpon,
                ],
                'enabled_payments' => [ $request->channel_payment],
            ];

            $res = $client->post("https://app.sandbox.midtrans.com/snap/v1/transactions", [
                'headers' => $headers, 
                'json' => $GetOrder,
            ]);

            $response =  json_decode($res->getBody());

            return $response->token;
            
    }

    public function dummy_requested(){
        return view('product::Transaction.dummy_requested');
    }

    public function dummy_pending(){
        return view('product::Transaction.dummy_pending');
    }

    public function bo_dummy_pending(){
        return view('product::Transaction.Bo_dummy_pending');
    }


    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function close_review(Request $request)
    {
        $client = new \GuzzleHttp\Client();
        $response = $client->request('POST', ENV('APP_URL_API').'web/Transaction/close_review', [
                'form_params'       => [
                    '_token_close'  => decrypt($request->_token_close),
                    'status_order'  => 'Close',
                    'review_close'  => $request->review_close,
                    'alasan_close'  => $request->alasan_close,
                ]
        ]);
        return json_decode($response->getBody());
    }


    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function Lanjut($id)
    {
        $client = new \GuzzleHttp\Client();
        $response = $client->request('POST', ENV('APP_URL_API').'web/Transaction/close_review', [
                'form_params'       => [
                    '_token_close'  => decrypt($id),
                    'status_order'  => 'Konfirmasi_Ulang',
                    'review_close'  => '',
                    'alasan_close'  => '',
                ]
        ]);
        Alert::success('Pengajuan Lanjut sedang dalam proses PertamaMall', 'Terima Kasih');
        return redirect()->route('Transaction.index');
    }


    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function Invoice($id)
    {
        $url        = ENV('APP_URL_API').'web/Transaction/close/'.decrypt($id);
        $Detail      = json_decode(file_get_contents($url));
        return view('product::Transaction.invoice')->with([
            "data" => $Detail,
        ]);
    }

}
