<?php

namespace Modules\ExampPermata\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Session;
use Alert;


class ReportPermataLanggananController extends Controller
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

        $Pembahasan   = json_decode(file_get_contents(ENV('APP_URL_API').'langganan/examp/pembahasan/'.decrypt(Session::get('id_token_xmtrusr')))); 
        return view('examppermata::Report.pembahasanlangganan')->with([
          "data"  => $Pembahasan
        ]);
    }


    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function pembahasanDetail($id)
    {
        $Profile = json_decode(file_get_contents(ENV('APP_URL_API').'langganan/examp/report/profile/'.decrypt($id)));
        if (empty($Profile)) {
            return redirect()->route('ExampPermata.start');
        }

        $Jumlahsoal   = json_decode(file_get_contents(ENV('APP_URL_API').'langganan/examp/report/start/'.$Profile->id_examp.'/'.decrypt(Session::get('id_token_xmtrusr'))));

        return view('examppermata::Report.detailpembahasan')->with([
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
        $Pembahasan   = json_decode(file_get_contents(ENV('APP_URL_API').'langganan/examp/pembahasan/'.decrypt(Session::get('id_token_xmtrusr')))); 
        return view('examppermata::Report.saranlangganan')->with([
          "data"  => $Pembahasan
        ]);
    }
    
}
