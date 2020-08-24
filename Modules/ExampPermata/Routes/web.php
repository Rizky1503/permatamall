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
Route::group(['prefix'=>'online','as'=>'ExampPermataBimbelOnline.'], function(){

    Route::get('/bimbel/latihan', 'ExampPermataController@getStarted')->name('getStarted');
    Route::get('/paket/{id}', 'ExampPermataController@paket_more')->name('paket_more');
    Route::get('/pengembangan', 'ExampPermataController@pengembangan')->name('pengembangan');
    Route::get('/get_detail_paket', 'ExampPermataController@get_detail_paket')->name('get_detail_paket');

});


Route::group(['prefix'=>'online','as'=>'ExampPermata.','middleware'=>['PermissionSession','EmailVerified','CheckIfLoginFlagPelanggan']], function(){
    // Route::get('/', 'ExampPermataController@index')->name('index');
    Route::get('/', function(){
        return redirect()->route('ExampPermataBimbelOnline.getStarted');
    })->name('index');

    // get started
    Route::get('/free', 'ExampPermataController@start')->name('start');
    Route::get('/paket/{id}', 'ExampPermataController@paket_more')->name('paket_more');

    Route::get('/langganan/{id}', 'ExampPermataController@langganan')->name('langganan');

    // selain kelas 11 dan kelas 10
    Route::get('/1/{id}', 'ExampPermataController@after_kelas')->name('after_kelas');
    Route::get('/2/{id}', 'ExampPermataController@after_jenis')->name('after_jenis');
    Route::get('/3/{id}', 'ExampPermataController@after_tahun')->name('after_tahun');
    Route::get('/4/{id}', 'ExampPermataController@after_matpel')->name('after_matpel');


    Route::get('/payment/{id}', 'ExampPermataController@payment')->name('payment');
    Route::get('/diskon', 'ExampPermataController@diskon')->name('diskon');
    Route::post('/paymentStore', 'ExampPermataController@paymentStore')->name('paymentStore');

    Route::get('/getjenis', 'ExampPermataController@getjenis')->name('getjenis');
    Route::get('/getjenislatihan', 'ExampPermataController@getjenislatihan')->name('getjenislatihan');
    Route::get('/gettahun', 'ExampPermataController@gettahun')->name('gettahun');
    Route::get('/get_matpel', 'ExampPermataController@get_matpel')->name('get_matpel');

    // bedah materi
    Route::get('/matapelajaran_bedah_materi', 'ExampPermataController@matapelajaran_bedah_materi')->name('matapelajaran_bedah_materi');
    Route::get('/silabus_bedah_materi', 'ExampPermataController@silabus_bedah_materi')->name('silabus_bedah_materi');
    Route::get('/keterangan_bedah_materi', 'ExampPermataController@keterangan_bedah_materi')->name('keterangan_bedah_materi');
    Route::get('/GetFilePdf', 'ExampPermataController@GetFilePdf')->name('GetFilePdf');


    // video langganan
    Route::get('/video/langganan/{id}', 'ExampPermataController@video_langganan')->name('video_langganan');
    Route::get('/video/langganan/e/{slug}', 'ExampPermataController@video_langganan_slug')->name('video_langganan_slug');
    Route::get('/video/matpel_video', 'ExampPermataController@matpel_video')->name('matpel_video');
    Route::get('/video/nambah_view/{id}', 'ExampPermataController@video_nambah_view')->name('nambah_view');


    Route::get('/mapel', 'ExampPermataController@mapel')->name('mapel');
    Route::get('/silabus', 'ExampPermataController@silabus')->name('silabus');
    Route::get('/confirm', 'ExampPermataController@confirm')->name('confirm');
    Route::get('/process', 'ExampPermataController@process')->name('process');


    // berbayar
    Route::get('/langganan_confirm', 'ExampPermataController@langganan_confirm')->name('langganan_confirm');
    Route::get('/langganan_confirm_siap_un', 'ExampPermataController@langganan_confirm_siap_un')->name('langganan_confirm_siap_un');
    Route::get('/langganan_process', 'ExampPermataController@langganan_process')->name('langganan_process');

    // Pay
    Route::get('/pay', 'ExampPermataController@pay')->name('pay');
    Route::get('/proses', 'ExampPermataController@proses')->name('proses');
    Route::get('/delete_payment', 'ExampPermataController@delete_payment')->name('delete_payment');
    Route::get('/cancel_payment', 'ExampPermataController@cancel_payment')->name('cancel_payment');
    Route::post('/insert_payment', 'ExampPermataController@insert_payment')->name('insert_payment');
    Route::get('/online_payment', 'ExampPermataController@online_payment')->name('online_payment');
    Route::get('/kota_sekolah', 'ExampPermataController@kota_sekolah')->name('kota_sekolah');
    Route::get('/update_sekolah', 'ExampPermataController@update_sekolah')->name('update_sekolah');
    Route::get('/store_payment_method', 'ExampPermataController@store_payment_method')->name('store_payment_method');



    //registrasi token
	Route::get('/token/{jenis_langganan}/{tanggal_registrasi}', 'ExampPermataController@token_berlangganan')->name('token_berlangganan');
	Route::group(['prefix'=>'test','as'=>'ETest.'], function(){
	    Route::get('/', 'ETestPermataController@index')->name('index');
	    Route::get('/soal', 'ETestPermataController@soal')->name('soal');
        Route::post('/answer', 'ETestPermataController@answer')->name('answer');
        Route::get('/finish', 'ETestPermataController@finish')->name('finish');
	});

    Route::group(['prefix'=>'e-test','as'=>'ETestLangganan.'], function(){
        Route::get('/', 'ETestLanggananPermataController@index')->name('index');
        Route::get('/soal', 'ETestLanggananPermataController@soal')->name('soal');
        Route::post('/answer', 'ETestLanggananPermataController@answer')->name('answer');
        Route::get('/finish', 'ETestLanggananPermataController@finish')->name('finish');
    });

    // Profile
    Route::group(['prefix'=>'report','as'=>'Report.'], function(){
        Route::get('/', 'ReportPermataController@index')->name('index');
        Route::get('/soal', 'ReportPermataController@soal')->name('soal');

    });


    // Saran
    Route::group(['prefix'=>'saran','as'=>'Saran.'], function(){
        Route::get('/', 'ReportPermataController@saran')->name('index');
    });

    // Saran Langganan
    Route::group(['prefix'=>'saranlangganan','as'=>'SaranLangganan.'], function(){
        Route::get('/', 'ReportPermataLanggananController@saran')->name('index');
    });

    // Pembahasan
    Route::group(['prefix'=>'pembahasan','as'=>'Pembahasan.'], function(){
        Route::get('/', 'ReportPermataController@pembahasan')->name('index');
        Route::get('detail/{id}', 'ReportPermataController@pembahasanDetail')->name('detail');
    });

     // Pembahasan Langganan
    Route::group(['prefix'=>'pembahasanlangganan','as'=>'PembahasanLangganan.'], function(){
        Route::get('/', 'ReportPermataLanggananController@pembahasan')->name('index');
        Route::get('/{id}', 'ReportPermataLanggananController@pembahasanDetail')->name('detail');
    });



    // Saran langganan 
    Route::group(['prefix'=>'lang','as'=>'lang.'], function(){
        Route::get('/saran/{id}', 'ReportPermataController@saran_langganan')->name('saran');
        Route::get('/ringkasan/{id}', 'ExampPermataController@ringkasan')->name('ringkasan');
        Route::get('/pembahasan/{id}', 'ReportPermataController@pembahasan_langganan')->name('pembahasan');
        Route::get('/pembahasan/detail/{id}', 'ReportPermataController@pembahasan_detail_langganan')->name('pembahasan_detail');
        Route::get('/pembahasan_soal', 'ReportPermataController@pembahasan_soal_langganan')->name('pembahasan_soal');
    });
});


