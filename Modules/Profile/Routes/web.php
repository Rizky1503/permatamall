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

// transaction
Route::group(['prefix'=>'profile','as'=>'Profile.','middleware'=>['PermissionSession','EmailVerified','CheckIfLoginFlagPelanggan']], function(){
    Route::get('/', 'ProfileController@index')->name('index');
    Route::get('/edit', 'ProfileController@edit')->name('edit');
    Route::post('/store', 'ProfileController@store')->name('store');
    Route::get('/password', 'ProfileController@password')->name('password');
    Route::post('/change_password', 'ProfileController@change_password')->name('change_password');
    Route::get('/cek_password', 'ProfileController@cek_password')->name('cek_password');
});
