<?php

namespace Modules\FreeExamp\Http\Controllers;

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
        $Profile = json_decode(file_get_contents(ENV('APP_URL_API').'bo/gratis_nolog/test/profile/'.decrypt(Session::get('id_token_xmtrusr')))); 

        if (empty($Profile)) {
            return redirect()->route('FreeExamp.getStarted');
        }
        
        $Jumlahsoal   = json_decode(file_get_contents(ENV('APP_URL_API').'bo/gratis_nolog/test/start/'.$Profile->id_examp.'/'.decrypt(Session::get('id_token_xmtrusr'))));

        return view('freeexamp::Test.index')->with([
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

        $Jumlahsoal   = json_decode(file_get_contents(ENV('APP_URL_API').'bo/gratis_nolog/test/soal/'.$execute)); 

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
                          <img src='".ENV('APP_URL_API_RESOURCE').'images/gratis/5041/Soal/'.$Jumlahsoal->soal."' min-height: 300px;'>
                        </td>
                      </tr>
                      <tr>
                        <td></td>
                        <td>
                          <div class='style-jawaban'>
                            <p style='color: #fd9a04;font-weight: bold;'>Pilih salah satu jawaban di bawah ini</p>
                            <button class='jawaban ".$jawabClasA.' '.$Jumlahsoal->id_soal_execute."' id='ans_A_".$Jumlahsoal->id_soal_execute."' onclick='functionAnswer(this.id)'>A</button>
                            <button class='jawaban ".$jawabClasB.' '.$Jumlahsoal->id_soal_execute."' id='ans_B_".$Jumlahsoal->id_soal_execute."' onclick='functionAnswer(this.id)'>B</button>
                            <button class='jawaban ".$jawabClasC.' '.$Jumlahsoal->id_soal_execute."' id='ans_C_".$Jumlahsoal->id_soal_execute."' onclick='functionAnswer(this.id)'>C</button>
                            <button class='jawaban ".$jawabClasD.' '.$Jumlahsoal->id_soal_execute."' id='ans_D_".$Jumlahsoal->id_soal_execute."' onclick='functionAnswer(this.id)'>D</button>
                            <button class='jawaban ".$jawabClasE.' '.$Jumlahsoal->id_soal_execute."' id='ans_E_".$Jumlahsoal->id_soal_execute."' onclick='functionAnswer(this.id)'>E</button>
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <td></td>
                        <td>
                          <br />
                          <div style='padding-top: 11px; padding-left: 3px;'> 
                              <div class='form-group'>
                                <label class='container-checked' style='font-size:19px; color:orange;'>Lihat Jawaban
                                  <input type='checkbox' id='checkbox-data' onclick='functionCheckbox()'>
                                  <span class='checkmark'></span>
                                </label>
                              </div>
                          </div>
                        </td>
                      </tr>
                      <tr id='jawaban' style='display:none;'>
                        <td style='vertical-align: top;font-size: 20px;width:30px;'>
                        </td>
                        <td>
                          <img src='".ENV('APP_URL_API_RESOURCE').'images/gratis/5041/Pembahasan/'.$Jumlahsoal->pembahasan."' style=''>
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
      $response = $client->request('POST', ENV('APP_URL_API').'bo/gratis_nolog/test/answer/soal', [
        'form_params'             => [
            'id_soal_execute'     => $request->id,
            'jawaban'             => $request->ans            
        ]
      ]);

      $id_examp =  json_decode($response->getBody()); 

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
      $response = $client->request('POST', ENV('APP_URL_API').'bo/gratis_nolog/test/finish', [
        'form_params'             => [
            'id_examp'     => decrypt($request->id)    
        ]
      ]);
      return $response->getBody();
    }
    
}
