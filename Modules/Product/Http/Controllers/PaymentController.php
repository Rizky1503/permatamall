<?php

namespace Modules\Product\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Alert;
use Image;


class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index($id)
    {        
        $RemoveNotification   = json_decode(file_get_contents(ENV('APP_URL_API').'notification/disabled_notification/'.decrypt(Session::get('id_token_xmtrusr'))));

        $product_invoice = substr($id,0, 12). base64_decode(substr($id,12, 50));
        $url       = ENV('APP_URL_API').'web/payment/check/'.$product_invoice;
        if (file_get_contents($url) == "Already") {
            $data   = json_decode(file_get_contents(ENV('APP_URL_API').'web/payment/amount/'.$product_invoice));
            if (ENV('APP_ENV') == "Production") {
                return view('product::Payment.index_production')->with([
                    'product_invoice'   => $id,
                    'data'              => $data->Finaly,
                    'productNya'        => $data->productNya,
                ]);
            }else{
                return view('product::Payment.index')->with([
                    'product_invoice'   => $id,
                    'data'              => $data->Finaly,
                    'productNya'        => $data->productNya,
                ]);
            }            
        }else{
            Alert::error('Status product Anda Belum Pending', 'Maaf');
            return redirect()->route('Transaction.index');
        }
    }


    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama'          => 'required',
            'nama_bank'     => 'required',
            'upload'        => 'required',
        ]);

        $product_invoice = substr($request->product_invoice,0, 12). base64_decode(substr($request->product_invoice,12, 50));

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
            return redirect()->route('Transaction.index');
        }else{
            Alert::success('Terima Kasih sudah melakukan Pembayaran', 'Terima Kasih');
            return redirect()->route('Transaction.index');
        }
    }

}
