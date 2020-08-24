<?php

namespace Modules\FreeExamp\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Session;

class FreeExampController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function getStarted()
    {
        $client = new \GuzzleHttp\Client();
        $listProd = $client->request('POST', ENV('APP_URL_API').'bo/gratis_nolog/revisi/list_kelas', [
                      'form_params'  => [
                          'id_pelanggan'    => decrypt(Session::get('id_token_xmtrusr')),
                      ]
              ]);
        $ListProd = json_decode($listProd->getBody());
       
        $ListProd_user = $ListProd->data_user;

        return view('freeexamp::index')->with([
            'ListProd'  => $ListProd,
            'ListProd_user'  => $ListProd_user,
        ]);        
    }

    public function select_tingkat($kelas){
      $Kelas = decrypt($kelas);

      $client = new \GuzzleHttp\Client();
      $Tingkat = $client->request('POST', ENV('APP_URL_API').'bo/gratis_nolog/revisi/list_mata_pelajaran_fitur', [
                    'form_params'  => [
                        'kelas'    => $Kelas,
                    ]
            ]);
      $tingkat = json_decode($Tingkat->getBody());


      $Maksimal = $client->request('POST', ENV('APP_URL_API').'bo/gratis_nolog/revisi/maksimal_bimbel_gratis', [
                    'form_params'  => [
                        'id_user'    => decrypt(Session::get('id_token_xmtrusr')),
                    ]
            ]);
      $maksimal = json_decode($Maksimal->getBody());
      
      if ( $tingkat->flag == 'tingkat') {
        return view('freeexamp::select_tingkat')->with([
            'tingkat'  => $tingkat,
            'kelas'   => $Kelas,
            'maksimal'  => $maksimal
        ]);
      }else{
        return view('freeexamp::select_matapelajaran')->with([
            'tingkat'  => $tingkat,
            'kelas'   => $Kelas,
            'maksimal'  => $maksimal
        ]);
      }
    }

    public function select_matapelajaran($tingkat){
      $tingkatan = decrypt($tingkat);

      $client = new \GuzzleHttp\Client();
      $Tingkat = $client->request('POST', ENV('APP_URL_API').'bo/gratis_nolog/revisi/list_mata_pelajaran_from_tingkat', [
                    'form_params'  => [
                        'kelas'    => $tingkatan[0],
                        'tingkat'  => $tingkatan[1]
                    ]
            ]);
      $tingkat = json_decode($Tingkat->getBody());

      $Maksimal = $client->request('POST', ENV('APP_URL_API').'bo/gratis_nolog/revisi/maksimal_bimbel_gratis', [
                    'form_params'  => [
                        'id_user'    => decrypt(Session::get('id_token_xmtrusr')),
                    ]
            ]);
      $maksimal = json_decode($Maksimal->getBody());

      return view('freeexamp::select_matapelajaran')->with([
            'tingkat'  => $tingkat,
            'kelas'   => $tingkatan[0],
            'maksimal'  => $maksimal
        ]);

    }

    public function process_revisi(Request $request){
      $client = new \GuzzleHttp\Client();

      Session::put('session_matpel_online',$request->id_soal);
      Session::put('session_keterangan',$request->keterangan);

      $Data = $client->request('POST', ENV('APP_URL_API').'bo/gratis_nolog/revisi/submit_latihan', [
                    'form_params'  => [
                        'id_matpel_online' => $request->id_soal,
                        'id_pelanggan'     => decrypt(Session::get('id_token_xmtrusr'))
                    ]
            ]);
      $data = json_decode($Data->getBody());

      return array([
            'Information' => json_encode($data->data)
        ]);
    }

    public function prepare_examp(Request $request){

      $client = new \GuzzleHttp\Client();
      $response = $client->request('POST', ENV('APP_URL_API').'bo/gratis_nolog/revisi/store_submit', [
              'form_params'          => [
                  'id_user'          => decrypt(Session::get('id_token_xmtrusr')),
                  'keterangan'       => $request->keterangan,
                  'waktu_test'       => 0, 
                  'id_matpel_online' => Session::get('session_matpel_online'),
              ]
      ]);

      $responses = json_decode($response->getBody());

      return "5041";
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
            $ListMapel   = json_decode(file_get_contents(ENV('APP_URL_API').'bo/gratis_nolog/list/mapel/'.str_replace(' ', '%20', $request->id)));
            echo "<option value=''>Pilih Mata Pelajaran</option>";
            foreach ($ListMapel as $key => $value) {
                echo "<option value='".$value."'>".$value."</option>";
            }            
        }
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function silabus(Request $request)
    {
        if ($request->id == "") {
            echo "";
        }else{
            $ListSilabus   = json_decode(file_get_contents(ENV('APP_URL_API').'bo/gratis_nolog/list/silabus/'.str_replace(' ', '%20', $request->kelas).'/'.str_replace(' ', '%20', $request->id)));

            foreach ($ListSilabus as $key => $value) {
                echo "<ul>
                    <input type='hidden' name='silabus[]' value='".$value->silabus."'>
                    <li> <i class='fa fa-adjust' aria-hidden='true'></i> ".$value->silabus."</li>
                </ul>
                ";
            }
        }
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function confirm(Request $request)
    {
        $client = new \GuzzleHttp\Client();
        file_get_contents(ENV('APP_URL_API').'bo/gratis_nolog/list/remove_temp/'.Session::get('id_token_fake'));

        $ListSilabuss = $client->request('POST', ENV('APP_URL_API').'bo/gratis_nolog/list/new_confirm_silabus', [
                    'form_params'  => [
                        'mapel'    => $request->matpel,
                        'kelas'    => $request->kelas,
                    ]
            ]);

        $ListSilabus = json_decode($ListSilabuss->getBody());

        $soal_kita = array();
        foreach ($ListSilabus as $key => $value) {            
        
            $Listsoal = $client->request('POST', ENV('APP_URL_API').'bo/gratis_nolog/list/new_soal', [
                    'form_params'  => [
                        'mapel'    => $request->matpel,
                        'kelas'    => $request->kelas,
                        'limit'    => $value->jumlah_soal,
                    ]
            ]);

            foreach (json_decode($Listsoal->getBody()) as $keys => $soal) {
                $soal_kita[] = $soal;
            }
        }   

        foreach ($soal_kita as $key => $soal) {
            $response = $client->request('POST', ENV('APP_URL_API').'bo/gratis_nolog/store/temp', [
                    'form_params'       => [
                        'id_soal'       => $soal->id_soal,
                        'id_user'       => Session::get('id_token_fake'),
                        'waktu'         => $soal->waktu,
                        'jawaban_betul' => $soal->jawaban,
                    ]
            ]);
        }
        $SoalTemp    = json_decode(file_get_contents(ENV('APP_URL_API').'bo/gratis_nolog/store/list/confirm/'.Session::get('id_token_fake')));  

        // profile user
        $profile = array(
            'nama'          => 'Permatamall', 
            'kelas'         => $request->kelas, 
            'matpel'        => $request->matpel, 
            'total_silabus' => count($request->silabus), 
            'jumlahSoal'    => $SoalTemp->jumlahSoal->count, 
            'TotalWaktu'    => $SoalTemp->TotalWaktu, 
            'dataSource'    => encrypt($SoalTemp->data)
        );

        Session::put('token_fake_'.Session::get('id_token_fake'),encrypt($SoalTemp->TotalWaktu));
        Session::put('tokenSources_fake_'.Session::get('id_token_fake'),encrypt($SoalTemp->data));

        // dd($SoalTemp);

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
        $response = $client->request('POST', ENV('APP_URL_API').'bo/gratis_nolog/store/process', [
                'form_params'       => [
                    'id_user'       => Session::get('id_token_fake'),
                    'keterangan'    => $request->all(),
                    'waktu_test'    => decrypt(Session::get('token_fake_'.Session::get('id_token_fake'))),
                    'status'        => 'Mulai',
                ]
        ]);
        $responses = json_decode($response->getBody());
        if ($responses != 0) {
            $sourcesData = decrypt(Session::get('tokenSources_fake_'.Session::get('id_token_fake')));
            foreach ($sourcesData as $key => $value) {            
                $response = $client->request('POST', ENV('APP_URL_API').'bo/gratis_nolog/store/process/soal', [
                    'form_params'       => [
                        'no_urut'       => $key + 1,
                        'id_soal'       => $value->id_soal,
                        'jawaban_betul' => $value->jawaban_betul,
                        'id_user'       => Session::get('id_token_fake'),
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
    public function finish($id)
    {
        $Pembahasan    = json_decode(file_get_contents(ENV('APP_URL_API').'bo/gratis_nolog/pembahasan/'.decrypt($id)));
        return view('freeexamp::finish')->with([
            'Data' => $Pembahasan
        ]);
    }

    public function video_langganan(Request $request)
    {     
        $client = new \GuzzleHttp\Client();
   
        // if ( isset($request->tingkat) and isset($request->matapelajaran) ) {
        //     if (isset($request->page)) {
        //       if ($request->page == 0) {
        //           $response = $client->request('POST', ENV('APP_URL_API').'bo/gratis_nolog/video/semua/tingkat/matpel/1/12', [
        //             'form_params'             => [
        //                 'tingkat'     => $request->tingkat,
        //                 'matpel'     => $request->matapelajaran,
        //             ]
        //           ]);

        //           $Video =  json_decode($response->getBody()); 
        //           $lastPage = 1;
        //           $judul = 'Video Tingkat : '.$request->tingkat.' Mata Pelajaran : '.$request->matapelajaran;
        //       }else{
        //           $response = $client->request('POST', ENV('APP_URL_API').'bo/gratis_nolog/video/semua/tingkat/matpel/'.$request->page.'/12', [
        //             'form_params'             => [
        //                 'tingkat'     => $request->tingkat,
        //                 'matpel'     => $request->matapelajaran,
        //             ]
        //           ]);

        //           $Video =  json_decode($response->getBody()); 
        //           $lastPage = $request->page;
        //           $judul = 'Video Tingkat : '.$request->tingkat.' Mata Pelajaran : '.$request->matapelajaran;
        //       }            
        //     }else{
        //       $response = $client->request('POST', ENV('APP_URL_API').'bo/gratis_nolog/video/semua/tingkat/matpel/1/12', [
        //             'form_params'             => [
        //                 'tingkat'     => $request->tingkat,
        //                 'matpel'     => $request->matapelajaran,
        //             ]
        //           ]);

        //       $Video =  json_decode($response->getBody());
        //       $lastPage = 1;
        //       $judul = 'Video Tingkat : '.$request->tingkat.' Mata Pelajaran : '.$request->matapelajaran;
        //     } 
        // }elseif ( !isset($request->tingkat) and isset($request->matapelajaran) ) {
        //     if (isset($request->page)) {
        //       if ($request->page == 0) {
        //           $response = $client->request('POST', ENV('APP_URL_API').'bo/gratis_nolog/video/semua/matpel/1/12', [
        //             'form_params'             => [
        //                 'matpel'     => $request->matapelajaran,
        //             ]
        //           ]);

        //           $Video =  json_decode($response->getBody()); 
        //           $lastPage = 1;
        //           $judul = 'Video Mata Pelajaran : '.$request->matapelajaran;
        //       }else{
        //           $response = $client->request('POST', ENV('APP_URL_API').'bo/gratis_nolog/video/semua/matpel/'.$request->page.'/12', [
        //             'form_params'             => [
        //                 'matpel'     => $request->matapelajaran,
        //             ]
        //           ]);

        //           $Video =  json_decode($response->getBody()); 
        //           $lastPage = $request->page;
        //           $judul = 'Video Mata Pelajaran : '.$request->matapelajaran;

        //       }            
        //     }else{
        //       $response = $client->request('POST', ENV('APP_URL_API').'bo/gratis_nolog/video/semua/matpel/1/12', [
        //             'form_params'             => [
        //                 'matpel'     => $request->matapelajaran,
        //             ]
        //           ]);

        //       $Video =  json_decode($response->getBody());
        //       $lastPage = 1;
        //       $judul = 'Video Mata Pelajaran : '.$request->matapelajaran;

        //     }  
        // }elseif ( isset($request->tingkat) and !isset($request->matapelajaran) ) {
        //     if (isset($request->page)) {
        //       if ($request->page == 0) {
        //           $response = $client->request('POST', ENV('APP_URL_API').'bo/gratis_nolog/video/semua/tingkat/1/12', [
        //             'form_params'             => [
        //                 'tingkat'     => $request->tingkat,
        //             ]
        //           ]);

        //           $Video =  json_decode($response->getBody()); 
        //           $lastPage = 1;
        //           $judul = 'Video Tingkat : '.$request->tingkat;
        //       }else{
        //           $response = $client->request('POST', ENV('APP_URL_API').'bo/gratis_nolog/video/semua/tingkat/'.$request->page.'/12', [
        //             'form_params'             => [
        //                 'tingkat'     => $request->tingkat,
        //             ]
        //           ]);

        //           $Video =  json_decode($response->getBody()); 
        //           $lastPage = $request->page;
        //           $judul = 'Video Tingkat : '.$request->tingkat;
        //       }            
        //     }else{
        //       $response = $client->request('POST', ENV('APP_URL_API').'bo/gratis_nolog/video/semua/tingkat/1/12', [
        //             'form_params'             => [
        //                 'tingkat'     => $request->tingkat,
        //             ]
        //           ]);

        //       $Video =  json_decode($response->getBody());
        //       $lastPage = 1;
        //       $judul = 'Video Tingkat : '.$request->tingkat;

        //     }  
        // }elseif ( !isset($request->tingkat) and !isset($request->matapelajaran) ){
        //   if (isset($request->page)) {
        //       if ($request->page == 0) {
        //           $Video   = json_decode(file_get_contents(ENV('APP_URL_API').'bo/gratis_nolog/video/semua/1/12'));
        //           $lastPage = 1;
        //           $judul = 'Video Terpopuler';
        //       }else{
        //           $Video   = json_decode(file_get_contents(ENV('APP_URL_API').'bo/gratis_nolog/video/semua/'.$request->page.'/12'));
        //           $lastPage = $request->page;
        //           $judul = 'Video Terpopuler';
        //       }            
        //   }else{
        //       $Video   = json_decode(file_get_contents(ENV('APP_URL_API').'bo/gratis_nolog/video/semua/1/12'));
        //       $lastPage = 1;
        //       $judul = 'Video Terpopuler';
        //   }  
        // }
        
        $video = json_decode(file_get_contents(ENV('APP_URL_API').'bo/gratis_nolog/revisi/video/list_video'));

        // dd($video);
        return view('freeexamp::video')->with([
            'video'     => $video,
        ]);
    }

    public function matpel_video(Request $request){
        $client = new \GuzzleHttp\Client();
        $response = $client->request('POST', ENV('APP_URL_API').'bo/gratis_nolog/video/matpel', [
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

        return redirect()->route('FreeExamp.video_langganan_slug',[$id]); 
    }

    public function video_langganan_slug($id)
    {        
        $Detail_Product   = json_decode(file_get_contents(ENV('APP_URL_API').'bo/gratis_nolog/video/detail/'.$id));
        $client = new \GuzzleHttp\Client();
        $response = $client->request('POST', ENV('APP_URL_API').'bo/gratis_nolog/video/serupa', [
            'form_params'       => [
                'tingkat'       => $Detail_Product->tingkat,
            ]
        ]);
        $Serupa = json_decode($response->getBody());

        return view('freeexamp::video_slug')->with([
            'detail'    => $Detail_Product,
            'Serupa'     => $Serupa,            
        ]);
    }

    
}
