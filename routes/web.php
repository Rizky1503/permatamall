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
Route::group(['as'=>'FrontEnd.','middleware'=>['CheckNoTelpon']], function(){
    Route::get('/', 'HomePageController@index')->name('index');
    Route::get('/bantuan-permatamall', 'HomePageController@bantuan')->name('bantuan');
    Route::get('/store_survey', 'HomePageController@store_survey')->name('store_survey');
});

Route::get('/pengembangan', 'HomePageController@pengembangan')->name('pengembangan');
Route::get('/insert-telphone', 'HomePageController@telphone')->name('telphone');
Route::post('/store-telphone', 'HomePageController@store_telphone')->name('store_telphone');

Route::group(['as'=>'Bantuan.'], function(){
    Route::get('/bantuan-permatamall', 'HomePageController@bantuan')->name('bantuan');
});

Route::group(['as'=>'Refund.'], function(){
    Route::get('/refund', 'RegistrasiController@refund_policy')->name('index');
});

Route::group(['prefix'=>'/registrasi','as'=>'Registrasi.'], function(){
    Route::get('/', 'RegistrasiController@index')->name('index');
    Route::post('/check', 'RegistrasiController@check')->name('check');
    Route::get('store_latlong', 'RegistrasiController@store_latlong')->name('store_latlong');
});


Route::group(['prefix'=>'/login','as'=>'Login.'], function(){
    Route::get('/', 'RegistrasiController@login')->name('index');
    Route::post('/check', 'RegistrasiController@checkLogin')->name('check');
});

Route::group(['prefix'=>'/verify','as'=>'EmailVerify.'], function(){
    Route::get('/', 'RegistrasiController@verify')->name('index');
    Route::get('/request', 'RegistrasiController@request')->name('request');
    Route::get('/confirm/{id}', 'RegistrasiController@confirm')->name('confirm');
});


Route::group(['prefix'=>'/mitra/verify','as'=>'EmailVerifyMitra.'], function(){
    Route::get('/', 'RegistrasiController@verifyMitra')->name('index');
    Route::get('/request', 'RegistrasiController@requestMitra')->name('request');
    Route::get('/confirm/{id}', 'RegistrasiController@confirmMitra')->name('confirm');
});

Route::get('/forgot-password', 'RegistrasiController@Forgot')->name('ForgotPassword.index');
Route::get('/change-password', 'RegistrasiController@ChangePassword')->name('ChangePassword.index');
Route::post('/change-password', 'RegistrasiController@ChangePasswordStore')->name('ChangePassword.store');



// Auth::routes();
Route::get('/logout', 'RegistrasiController@logout')->name('logout');
Route::get('redirect/{driver}', 'Auth\LoginController@redirectToProvider')->name('login_provider');
Route::get('auth_redirect/{driver}/callback', 'Auth\LoginController@handleProviderCallback')->name('login.callback');
Route::get('jenis_user', 'Auth\LoginController@jenis_user')->name('jenis_user');
// Route::get('/home', 'HomeController@index')->name('home');


Route::group(['prefix'=>'/complaint','as'=>'Complaint.','middleware'=>['PermissionSession','EmailVerified']], function(){
    Route::get('/', 'ComplaintController@index')->name('index');
    Route::post('/store', 'ComplaintController@store')->name('store');
    Route::get('/finish/{id}', 'ComplaintController@finish')->name('finish');
});

Route::group(['prefix'=>'/faq','as'=>'FAQ.'], function(){
    Route::get('/', 'FAQController@index')->name('index');
});

Route::group(['prefix'=>'/privacy','as'=>'PRIVACY.'], function(){
    Route::get('/', 'PRIVACYController@index')->name('index');
});