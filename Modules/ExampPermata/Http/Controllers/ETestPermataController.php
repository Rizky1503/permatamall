<?php

namespace Modules\ExampPermata\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Session;
use Alert;


class ETestPermataController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $Profile = json_decode(file_get_contents(ENV('APP_URL_API').'bo/test/profile/'.decrypt(Session::get('id_token_xmtrusr'))));
        return $profile;

        if (empty($Profile)) {
            return redirect()->route('ExampPermata.start');
        }

        $Jumlahsoal   = json_decode(file_get_contents(ENV('APP_URL_API').'bo/test/start/'.$Profile->id_examp.'/'.decrypt(Session::get('id_token_xmtrusr'))));

        return view('examppermata::Test.index')->with([
            'Profile'       => $Profile,
            'soalSatu'      => $Jumlahsoal[0],
            'Jumlahsoal'    => $Jumlahsoal,
        ]);

    }


    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function soal(Request $request)
    {

        if (isset($request->execute)) {
            $execute = $request->execute;
        }

        $Jumlahsoal   = json_decode(file_get_contents(ENV('APP_URL_API').'bo/test/soal/'.$execute)); 

        $jawabClasA = "";
        $jawabClasB = "";
        $jawabClasC = "";
        $jawabClasD = "";
        $jawabClasE = "";
        $jawabClasNot = "";

        if ($Jumlahsoal->jawaban_user == "A") {
          $jawabClasA = "active_answer";
        }elseif ($Jumlahsoal->jawaban_user == "B") {
          $jawabClasB = "active_answer";
        }elseif ($Jumlahsoal->jawaban_user == "C") {
          $jawabClasC = "active_answer";
        }elseif ($Jumlahsoal->jawaban_user == "D") {
          $jawabClasD = "active_answer";
        }elseif ($Jumlahsoal->jawaban_user == "E") {
          $jawabClasE = "active_answer";
        }


        return "<div class='col-md-12'>    
                    <table style='width:100%'>
                      <tr>
                        <td style='vertical-align: top;font-size: 20px;width:30px;'>
                          ".$request->number.".
                        </td>
                        <td>
                          <img src='".ENV('APP_URL_API_RESOURCE').'images/Examp/5041/Soal/'.$Jumlahsoal->soal."' style='width:100%; min-height: 300px;'>
                        </td>
                      </tr>
                      <tr>
                        <td></td>
                        <td>
                          <div class='style-jawaban'>
                            <button class='jawaban ".$jawabClasA.' '.$Jumlahsoal->id_soal_execute."' id='ans_A_".$Jumlahsoal->id_soal_execute."' onclick='functionAnswer(this.id)'>A</button>
                            <button class='jawaban ".$jawabClasB.' '.$Jumlahsoal->id_soal_execute."' id='ans_B_".$Jumlahsoal->id_soal_execute."' onclick='functionAnswer(this.id)'>B</button>
                            <button class='jawaban ".$jawabClasC.' '.$Jumlahsoal->id_soal_execute."' id='ans_C_".$Jumlahsoal->id_soal_execute."' onclick='functionAnswer(this.id)'>C</button>
                            <button class='jawaban ".$jawabClasD.' '.$Jumlahsoal->id_soal_execute."' id='ans_D_".$Jumlahsoal->id_soal_execute."' onclick='functionAnswer(this.id)'>D</button>
                            <button class='jawaban ".$jawabClasE.' '.$Jumlahsoal->id_soal_execute."' id='ans_E_".$Jumlahsoal->id_soal_execute."' onclick='functionAnswer(this.id)'>E</button>
                          </div>
                        </td>
                      </tr>
                    </table>
                </div>";
    }


    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function answer(Request $request)
    {
      $client = new \GuzzleHttp\Client();
      $response = $client->request('POST', ENV('APP_URL_API').'bo/test/answer/soal', [
        'form_params'             => [
            'id_soal_execute'     => $request->id,
            'jawaban'             => $request->ans            
        ]
      ]);

      $id_examp =  json_decode($response->getBody()); 

      $response = $client->request('POST', ENV('APP_URL_API').'bo/test/answer/time', [
        'form_params'             => [
            'id_examp'            => $id_examp[0],
            'waktu'               => $request->gth_8756321            
        ]
      ]);

      $soal             = $request->id;
      $soalSelanjutnya  = $soal;
      return $soalSelanjutnya + 1;
    }


    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function finish(Request $request)
    {

      $client = new \GuzzleHttp\Client();
      $response = $client->request('POST', ENV('APP_URL_API').'bo/test/finish', [
        'form_params'             => [
            'id_examp'     => decrypt($request->id)    
        ]
      ]);
      return $response->getBody();
    }
    
}
