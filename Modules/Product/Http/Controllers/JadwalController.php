<?php

namespace Modules\Product\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Alert;

class JadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function semua()
    {   
        $RemoveNotification   = json_decode(file_get_contents(ENV('APP_URL_API').'notification/disabled_notification/'.decrypt(Session::get('id_token_xmtrusr'))));
        
        $data = json_decode(file_get_contents(ENV('APP_URL_API').'web/Transaction/ListJadwal/'.decrypt(Session::get('id_token_xmtrusr'))));
        return view('product::Jadwal.semua')->with([
            "Data" => $data
        ]);
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index($id)
    {        
        $RemoveNotification   = json_decode(file_get_contents(ENV('APP_URL_API').'notification/disabled_notification/'.decrypt(Session::get('id_token_xmtrusr'))));

        $product_invoice = substr($id,0, 12). base64_decode(substr($id,12, 50));
        $data      = json_decode(file_get_contents(ENV('APP_URL_API').'web/Transaction/check_jadwal/'.$product_invoice));
        if (!empty($data)) {
            if ($data->status_order == "In Progres") {
                $siswa      = json_decode(file_get_contents(ENV('APP_URL_API').'web/profile/pelanggan/'.decrypt(Session::get('id_token_xmtrusr'))));
                $guru       = json_decode(file_get_contents(ENV('APP_URL_API').'web/profile/mitraJoin/'.$product_invoice));

                $JadwalLast  = json_decode(file_get_contents(ENV('APP_URL_API').'web/Transaction/detail/jadwallast/'.$product_invoice.'/'.decrypt(Session::get('id_token_xmtrusr'))));
                $Jadwal  = json_decode(file_get_contents(ENV('APP_URL_API').'web/Transaction/detail/jadwal/'.$product_invoice.'/'.decrypt(Session::get('id_token_xmtrusr'))));

                $JadwalLastConfirm  = json_decode(file_get_contents(ENV('APP_URL_API').'web/Transaction/detail/jadwal_last/'.$product_invoice.'/'.decrypt(Session::get('id_token_xmtrusr'))));

                return view('product::Jadwal.index')->with([
                    'product_invoice'   => $id,
                    'JadwalLastConfirm' => $JadwalLastConfirm,
                    'JadwalLast'        => $JadwalLast,
                    'List'              => $Jadwal,
                    'profile'           => $siswa,
                    'guru'              => $guru,
                ]);
            }else{
                return redirect()->route('Transaction.index'); 
            }
        }else{
            return redirect()->route('Transaction.index'); 
        }        
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function absen($id,$konfirmasi)
    {        
        if (base64_decode($konfirmasi) == "Hadir") {
            $Jadwal  = json_decode(file_get_contents(ENV('APP_URL_API').'web/Transaction/detail/absen/'.decrypt($id).'/'.decrypt(Session::get('id_token_xmtrusr'))));
            if ($Jadwal == 0) {
                return redirect()->back()->with('success','Berhasil diubah');
            }else{
                return redirect()->back()->with('success','Berhasil diubah');            
            }
        }else{
            $Jadwal  = json_decode(file_get_contents(ENV('APP_URL_API').'web/Transaction/detail/absen_tidak/'.decrypt($id).'/'.decrypt(Session::get('id_token_xmtrusr'))));
            if ($Jadwal == 0) {
                return redirect()->back()->with('success','Berhasil diubah');
            }else{
                return redirect()->back()->with('success','Berhasil diubah');            
            }

        }
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function absen_review($id,$konfirmasi)
    {        
        if (base64_decode($konfirmasi) == "Hadir") {

            $Jadwal  = json_decode(file_get_contents(ENV('APP_URL_API').'web/Transaction/detail/absen_kelipatan/'.decrypt($id)));
            Alert::success('telah konfirmasi kehadiran', 'Terima Kasih');
            return redirect()->route('Transaction.index');

        }else{

            $Jadwal  = json_decode(file_get_contents(ENV('APP_URL_API').'web/Transaction/detail/absen_kelipatan_tidak/'.decrypt($id)));
            Alert::success('telah konfirmasi kehadiran', 'Terima Kasih');
            return redirect()->route('Transaction.index');

        }

    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function nilai(Request $request)
    {
        $client = new \GuzzleHttp\Client();
        $response = $client->request('POST', ENV('APP_URL_API').'web/Transaction/detail/jadwal_last_close', [
                'form_params'       => [
                    'data'      => $request->data,
                    'status'    => $request->status,
                ]
        ]);
        $responses      = json_decode($response->getBody());        
    }

}
