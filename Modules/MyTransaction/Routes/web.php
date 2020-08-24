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
Route::group(['prefix'=>'my-transaction','as'=>'myTransaction.','middleware'=>['PermissionSession','EmailVerified']], function(){
    Route::get('/', 'MyTransactionController@index')->name('index');
});
