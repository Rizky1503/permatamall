<?php

namespace Modules\ExampPermata\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Session;
use Alert;


class ReportPermataController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $Profile = json_decode(file_get_contents(ENV('APP_URL_API').'bo/report/profile/'.decrypt(Session::get('id_token_xmtrusr'))));

        if (empty($Profile)) {
            return redirect()->route('ExampPermata.start');
        }

        $Jumlahsoal   = json_decode(file_get_contents(ENV('APP_URL_API').'bo/report/start/'.$Profile->id_examp.'/'.decrypt(Session::get('id_token_xmtrusr'))));

        return view('examppermata::Report.index')->with([
          'profile'     => $Profile,
          'keterangan'  => json_decode($Profile->keterangan),
          'soalSatu'      => $Jumlahsoal[0],
          'Jumlahsoal'    => $Jumlahsoal
        ]);
    }


    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function soal(Request $request)
    {
        if (isset($request->execute)) {
            $execute = base64_decode($request->execute);
            $Jumlahsoal   = json_decode(file_get_contents(ENV('APP_URL_API').'bo/report/soal/'.$execute)); 
            return "<div class='col-md-12'>
                          <strong style='font-size: 18px;'>Soal : jawaban kamu ".$Jumlahsoal->jawaban_user."</strong>
                        </div>
                        <div class='col-md-12'>
                          <img src='".ENV('APP_URL_API_RESOURCE').'images/Examp/5041/Soal/'.$Jumlahsoal->soal."' style='width:100%;'>
                        </div>
                        <div class='col-md-12'>
                          <strong style='font-size: 18px;'>Pembahasan : jawaban betul ".$Jumlahsoal->jawaban."</strong>
                        </div>
                        <div class='col-md-12'>
                          <img src='".ENV('APP_URL_API_RESOURCE').'images/Examp/5041/Pembahasan/'.$Jumlahsoal->pembahasan."' style='width:100%;'>
                        </div>";
      }



        // <img src='".ENV('APP_URL_API').'images/5041/Soal/'.$Jumlahsoal->soal."' style='width:100%'>
    }


    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function pembahasan()
    {
        $Pembahasan   = json_decode(file_get_contents(ENV('APP_URL_API').'bo/pembahasan/'.decrypt(Session::get('id_token_xmtrusr')))); 
        return view('examppermata::Report.pembahasan')->with([
          "data"  => $Pembahasan
        ]);
    }


    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function pembahasanDetail($id)
    {
        $Profile = json_decode(file_get_contents(ENV('APP_URL_API').'bo/report/profile/'.decrypt($id)));

        if (empty($Profile)) {
            return redirect()->route('ExampPermata.start');
        }
        $Jumlahsoal   = json_decode(file_get_contents(ENV('APP_URL_API').'bo/report/start/'.$Profile->id_examp.'/'.decrypt(Session::get('id_token_xmtrusr'))));
        return view('examppermata::Report.index')->with([
          'profile'     => $Profile,
          'keterangan'  => json_decode($Profile->keterangan),
          'soalSatu'      => $Jumlahsoal[0],
          'Jumlahsoal'    => $Jumlahsoal
        ]);
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function saran()
    {
        $Pembahasan   = json_decode(file_get_contents(ENV('APP_URL_API').'bo/pembahasan/'.decrypt(Session::get('id_token_xmtrusr')))); 
        return view('examppermata::Report.saran')->with([
          "data"  => $Pembahasan
        ]);
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function saran_langganan($id)
    {
        $client = new \GuzzleHttp\Client();
        $saran_API = $client->request('POST', ENV('APP_URL_API').'bo/berbayar/saran/semua', [
                    'form_params'  => [
                        'id_user'    => decrypt(Session::get('id_token_xmtrusr')),                
                        'id_kelas'   => decrypt($id),                
                    ]
            ]);
        $saran =  json_decode($saran_API->getBody());

        return view('examppermata::Report.saran_langganan')->with([
          "data"  => $saran,
          "id"    => decrypt($id),
        ]);
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function pembahasan_langganan($id)
    {
        $client = new \GuzzleHttp\Client();
        $Pembahasan_API = $client->request('POST', ENV('APP_URL_API').'bo/berbayar/pembahasan/semua', [
                    'form_params'  => [
                        'id_kelas'   => decrypt($id),                
                    ]
            ]);
        $Pembahasan =  json_decode($Pembahasan_API->getBody());
        return view('examppermata::Report.pembahasan_langganan')->with([
          "data"  => $Pembahasan,
          "id"    => decrypt($id),
        ]);
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function pembahasan_detail_langganan($id, Request $request)
    {
      
        $dec =  decrypt($id);
        $id_kelas = $dec[0];
        $matpel = $dec[1];
        $jenis = $dec[2];
      
        $client = new \GuzzleHttp\Client();
        $Jumlahsoal_API = $client->request('POST', ENV('APP_URL_API').'langganan/examp/report/start', [
                    'form_params'  => [
                        'id_kelas'   => $id_kelas,   
                        'nama_matpel' => $matpel, 
                        'jenis_paket' => $jenis, 
                        'id_soal'   => $request->id_soal,
                        'eksekutor' => $request->flag,
                    ]
            ]);
        $Jumlahsoal =  json_decode($Jumlahsoal_API->getBody());

        if ($request->soalke) {
          $page = $request->soalke;
        }else{
          $page = 1;
        }

        return view('examppermata::Report.pembahasan_detail_langganan')->with([
          'soalSatu'      => $Jumlahsoal->soal[0],
          'soalAwal'      => $Jumlahsoal->firstid[0],
          'soalAkhir'     => $Jumlahsoal->lastid[0],
          'Jumlahsoal'    => $Jumlahsoal->soal,
          'count'         => $Jumlahsoal->count[0],
          'matpel'        => $matpel,
          'jenis'         => $jenis,
          'url'           => $id,
          'id'            => $id_kelas,
          'page'          => $page,
        ]);
      
    }


    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function pembahasan_soal_langganan(Request $request)
    { 
        // dd(base64_decode($request->execute));
        if (isset($request->execute)) {
          $execute = base64_decode($request->execute);
          $Jumlahsoal   = json_decode(file_get_contents(ENV('APP_URL_API').'bo/berbayar/report/soal/'.$execute)); 
          // return $execute;
          return "<div class='col-md-12'>
                        <p style='font-size: 18px;'>Soal : </p>
                      </div>
                      <div class='col-md-12'>
                        <img src='".ENV('APP_URL_API_RESOURCE').'images/Examp/5041/berbayar/Soal/'.$Jumlahsoal->soal."' style='max-width:100%;'>
                      </div>
                      <div class='col-md-12'>
                        <p style='font-size: 18px;'>Pembahasan : </p>
                      </div>
                      <div class='col-md-12'>
                        <img src='".ENV('APP_URL_API_RESOURCE').'images/Examp/5041/berbayar/Pembahasan/'.$Jumlahsoal->pembahasan."' style='maxwidth:100%;'>
                      </div>";
        }
    }
    
}
