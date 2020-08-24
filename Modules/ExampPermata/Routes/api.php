<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/examppermata', function (Request $request) {
    return $request->user();
});

Route::group(['prefix'=>'api/examp','as'=>'ApiExamp.'], function(){

	Route::post('/', function(Request $request){
	
		$client = new \GuzzleHttp\Client();
		$response = $client->request('POST', ENV('APP_URL_API').'bo/test/answer/time', [
	        'form_params'             => [
	            'id_examp'            => decrypt($request->id_user),
	            'waktu'               => $request->method            
	        ]
	    ]);
	    return "done";
	})->name('index');    
});


Route::group(['prefix'=>'api/examp/berbayar','as'=>'ApiExampBerbayar.'], function(){

	Route::post('/', function(Request $request){
	
		$client = new \GuzzleHttp\Client();
		$response = $client->request('POST', ENV('APP_URL_API').'bo/berbayar/test/answer/time', [
	        'form_params'             => [
	            'id_examp'            => decrypt($request->id_user),
	            'waktu'               => $request->method            
	        ]
	    ]);
	    return "done";
	})->name('index');    
});


