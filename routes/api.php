<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/forgot', 'RegistrasiController@ForgotApi')->name('ApiForgotPassword.index');


// notification
Route::group(['prefix'=>'web/notification','as'=>'ApiNotification.'], function(){
    Route::post('/member', function(Request $request){
    	if (!empty($request->_token)) {
    		$url = ENV('APP_URL_API').'notification/member/'.decrypt($request->_token);
       		$data = json_decode(file_get_contents($url));

       		$new_array = array();
       		foreach ($data->Data as $key => $value) {
       			$abad['url'] = route('Notification.more',[encrypt($value->id_notifikasi)]);
       			$abad['produk_notifikasi'] = $value->produk_notifikasi;
       			$abad['status_notifikasi'] = $value->status_notifikasi;
       			$abad['keterangan'] = $value->keterangan;
       			$new_array[] = $abad;


       		}
       		return array([
       			"count" => $data->Count->count,
       			"data" => $new_array,
       		]);
    	}else{
    		return 0;
    	}    	
    })->name('member');
});

// chat post
Route::group(['prefix'=>'web/chat/post','as'=>'ChatPost.'], function(){
    Route::post('/member', function(Request $request){
      return $request->all();    
    })->name('Member');
});


// // chat post
// Route::group(['prefix'=>'/broadcast','as'=>'Broadcast.'], function(){

//     Route::get('/whatsapp/{angka}', function(Request $request, $id){
//       $json = file_get_contents(asset('public/json_no_telp_24-07-2020.json'));
      
//       $body = "data:image/gif;base64,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
// ";
      
//       $caption = "*Tahun Ajaran Baru Aplikasi Baru* \n\nTetap Belajar dirumah dengan nyaman \n\n Facebook :https://www.facebook.com/PermataBelajar \n Instagram : https://www.instagram.com/permatabelajar_ \n Download Aplikasi di https://play.google.com/store/apps/details?id=com.permatabimbel \n\n **Note: GRATIS TOTAL SAMPAI 31 JULI 2020*";
      

//       foreach(json_decode($json)->$id as $key => $value) {
//         $data = [
//           'phone'     => $value->no_telp, // Receivers phone              
//           'body'      => $body, // Message
//           'filename'  => 'image.gif', // Message
//           'caption'   => $caption, // Message
//         ];
//         $json = json_encode($data); // Encode data to JSON
//         // URL for request POST /message
//         $url = 'https://eu141.chat-api.com/instance153847/sendFile?token=fw8tfrg0dvthobb8';
//         // Make a POST request
//         $options = stream_context_create(['http' => [
//                 'method'  => 'POST',
//                 'header'  => 'Content-type: application/json',
//                 'content' => $json
//             ]
//         ]);
//         // // Send a request
//         $result = file_get_contents($url, false, $options);
//       }
//     })->name('whatsapp');
// });



// notification
Route::group(['prefix'=>'mobile/','as'=>'MobileUpload.'], function(){
    Route::post('/upload_pembayaran', function(Request $request){
      

      return $request->all();
      
      $target_dir   = 'uploads/';
      $target_file  = $target_dir.basename($_FILES["fileToUpload"]["name"]);

      $status = array();

      if(move_uploaded_file($_FILES['fileToUpload']['tm_name'], $target_file)){
        $status['kode'] = 1;
        $status['deskripsi'] = 'upload hasil';
      }else{
        $status['kode'] = 0;
        $status['deskripsi'] = 'upload gagal';
      }

      echo json_decode($status);
    });
});


// notification
Route::group(['prefix'=>'mobile/','as'=>'Send_Email.'], function(){
    Route::post('/pelanggan', function(Request $request){
      $client = new \GuzzleHttp\Client();
      $response = $client->request('POST', ENV('APP_URL_API').'web/profile/pelanggan/email_send', [
          'form_params'   => [
              'id_user'   => $request->id_pelanggan,
              'link'      => route('EmailVerify.confirm',[encrypt($request->id_pelanggan)])
          ]
      ]);
      return response()->json([
        'status' => 'true', 
        'responses' => '200', 
        'Data' => 'Berhasil'
      ]);      
    })->name('pelanggan');


    Route::post('/pelanggan/konfirmasi_email', function(Request $request){
      $url = ENV('APP_URL_API').'web/profile/pelanggan/email_confirm/'.decrypt($request->token);
      $data = json_decode(file_get_contents($url));   

      $data = response()->json([
        'id_pelanggan' => decrypt($request->token),
        'command'      => 'Email Berhasil Dikonfirmasi'
      ]);

      return response()->json([
        'status' => 'true', 
        'responses' => '200', 
        'Data' => $data
      ]);
    })->name('pelanggan_konfirmasi_email');


    Route::post('/pelanggan/auth/request_otp', function(Request $request){

      if ($request->no_telpon) {
        $phone = $request->no_telpon;
        $replace_phone = array();
        if (substr($phone, 0, 1) == '0') {
          array_push($replace_phone, "+62".substr($phone, 1, 20));
        }else if (substr($phone, 0, 1) != "+") {
          array_push($replace_phone, "+".$phone);
        }else{
          array_push($replace_phone, $phone);          
        }
        try {
          $token = env("TWILIO_AUTH_TOKEN");
          $twilio_sid = env("TWILIO_SID");
          $twilio_verify_sid = env("TWILIO_VERIFY_SID");
          $twilio = new Twilio\Rest\Client($twilio_sid, $token);
          $twilio->verify->v2->services($twilio_verify_sid)
            ->verifications
            ->create($replace_phone[0], "sms");
          return response()->json([
            'status' => 'true', 
            'responses' => '200', 
            'Data' => 'kode OTP telah dikirim ke '.$phone
          ]);
        } catch (Exception $e) {
          return response()->json([
            'status' => 'true', 
            'responses' => '201', 
            'Data' => 'terjadi kesalahan, mohon gunakan no telpon lain'
          ]);       
        }
      }else{
        return response()->json([
          'status' => 'true', 
          'responses' => '201', 
          'Data' => 'no telpon tidak valid'
        ]);               
      }      
    })->name('pelanggan_request_otp');
    

    Route::post('/pelanggan/auth/verify_otp', function(Request $request){
      try {
        if ($request->phone_number) {
          $phone = $request->phone_number;
          $replace_phone = array();
          if (substr($phone, 0, 1) == '0') {
            array_push($replace_phone, "+62".substr($phone, 1, 20));
          }else if (substr($phone, 0, 1) != "+") {
            array_push($replace_phone, "+".$phone);
          }else{
            array_push($replace_phone, $phone);          
          }
          $token = env("TWILIO_AUTH_TOKEN");
          $twilio_sid = env("TWILIO_SID");
          $twilio_verify_sid = env("TWILIO_VERIFY_SID");
          $twilio = new Twilio\Rest\Client($twilio_sid, $token);
          $verification = $twilio->verify->v2->services($twilio_verify_sid)
              ->verificationChecks
              ->create($request->verification_code, array('to' => $replace_phone[0]));
          if ($verification->valid) {
              return response()->json([
                'status' => 'true', 
                'responses' => '200', 
                'Data' => 'Verifikasi gagal, silahkan kirim ulang kode'
              ]);
          }else{
              return response()->json([
                'status' => 'true', 
                'responses' => '201', 
                'Data' => 'Verifikasi Gagal'
              ]);
          }  
        }else{
          return response()->json([
            'status' => 'true', 
            'responses' => '201', 
            'Data' => 'Verifikasi gagal, silahkan kirim ulang kode'
          ]);
        }                
      } catch (Exception $e) {
        return response()->json([
          'status' => 'true', 
          'responses' => '201', 
          'Data' => 'Verifikasi gagal, silahkan kirim ulang kode'
        ]);       
      }
    })->name('pelanggan_verify_otp');
});
