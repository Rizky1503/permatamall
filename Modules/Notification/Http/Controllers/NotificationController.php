<?php

namespace Modules\Notification\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class NotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('notification::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function more($id)
    {
        $url = ENV('APP_URL_API').'notification/member_update/'.decrypt($id);
        $data = json_decode(file_get_contents($url));
        if (!empty($data)) {
            if ($data->produk_notifikasi == "Privat") {
                return redirect()->route('Transaction.detail',[encrypt($data->id_invoice)]);
            }elseif($data->produk_notifikasi == "Bimbel Online"){
                return redirect()->route('Transaction.index');
            }else{
                dd($data);
            }
        }else{
            return "Kosong";
        }

        return view('notification::more');
    }
    
}
