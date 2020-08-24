<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['prefix'=>'free-online','as'=>'FreeExamp.','middleware'=>['PermissionSession']], function(){
    // get started
    Route::get('/', 'FreeExampController@getStarted')->name('getStarted');
    Route::get('/e/{kelas}', 'FreeExampController@select_tingkat')->name('select_tingkat');
    Route::get('/d/{tingkat}', 'FreeExampController@select_matapelajaran')->name('select_matapelajaran');
    Route::get('/process_revisi', 'FreeExampController@process_revisi')->name('process_revisi');
    Route::get('/prepare_examp', 'FreeExampController@prepare_examp')->name('prepare_examp');
    

    

    Route::get('/mapel', 'FreeExampController@mapel')->name('mapel');
    Route::get('/silabus', 'FreeExampController@silabus')->name('silabus');
    Route::get('/confirm', 'FreeExampController@confirm')->name('confirm');
    Route::get('/process', 'FreeExampController@process')->name('process');
    Route::get('/finish/{id}', 'FreeExampController@finish')->name('finish');
    Route::get('/video/nambah_view/{id}', 'FreeExampController@video_nambah_view')->name('nambah_view');
    Route::get('/video/matpel_video', 'FreeExampController@matpel_video')->name('matpel_video');
    Route::get('/video/langganan', 'FreeExampController@video_langganan')->name('video_langganan');
    Route::get('/video/langganan/{slug}', 'FreeExampController@video_langganan_slug')->name('video_langganan_slug');

    Route::group(['prefix'=>'test','as'=>'ETest.'], function(){
	    Route::get('/', 'ETestPermataController@index')->name('index');
	    Route::get('/soal', 'ETestPermataController@soal')->name('soal');
        Route::post('/answer', 'ETestPermataController@answer')->name('answer');
        Route::get('/finish', 'ETestPermataController@finish')->name('finish');
	});

});


