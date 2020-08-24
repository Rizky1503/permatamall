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

// gedung petemuan
Route::group(['prefix'=>'oh-no','as'=>'OhNo.'], function(){
    Route::get('/', 'gedungController@index')->name('index');
});

// gedung petemuan
Route::group(['prefix'=>'gedung-pertemuan','as'=>'GedungPertemuan.'], function(){
    Route::get('/', 'gedungController@index')->name('index');
});

// event-organizer
Route::group(['prefix'=>'event-organizer','as'=>'EventOrgnizer.'], function(){
    Route::get('/', 'gedungController@index')->name('index');
});



Route::group(['prefix'=>'bimbel','as'=>'Bimbel.'], function(){
    Route::get('/', 'BimbelController@index')->name('index');
    Route::get('/search', 'BimbelController@search')->name('search');
    Route::get('/paket/{id}', 'BimbelController@more')->name('more');
    Route::get('/{slug}/detail', 'BimbelController@detail')->name('detail');
    Route::get('/payment', 'BimbelController@thank')->name('payment')->middleware(['PermissionSession']);
});



Route::group(['prefix'=>'gedung','as'=>'Gedung.'], function(){
    Route::get('/', 'gedungController@index')->name('index');
    Route::get('/{slug}', 'GedungController@more')->name('more');
});


Route::group(['prefix'=>'privat','as'=>'Private.'], function(){
    Route::get('/', 'PrivateController@List')->name('List');
    Route::get('/search', 'PrivateController@index')->name('index');
    Route::get('/RequestRequirement', 'PrivateController@RequestRequirement')->name('RequestRequirement');
    Route::get('/result', 'PrivateController@result')->name('result');
    Route::get('/matpel', 'PrivateController@matpel')->name('matpel');
    Route::get('/levelprivate', 'PrivateController@levelprivate')->name('levelprivate');

    Route::get('/proses', 'PrivateController@proses')->name('proses')->middleware(['PermissionSession','EmailVerified','CheckIfLoginFlagPelanggan']);

    Route::get('/PrivateProcess', 'PrivateController@PrivateProcess')->name('PrivateProcess')->middleware(['PermissionSession','EmailVerified','CheckIfLoginFlagPelanggan']);

    Route::get('/finish', 'PrivateController@finish')->name('finish')->middleware(['PermissionSession','EmailVerified','CheckIfLoginFlagPelanggan']);
});

//belanja
Route::group(['prefix'=>'belanja','as'=>'Belanja.'], function(){
    Route::get('/', 'BelanjaController@index')->name('index');    
    Route::get('/e/{slug}', 'BelanjaController@detail')->name('detail');    
    Route::post('/keranjang/{id_produk}', 'BelanjaController@keranjang')->name('keranjang');
    Route::get('/Listkeranjang', 'BelanjaController@listkeranjang')->name('listkeranjang');
    Route::get('/list_keranjang', 'BelanjaController@Listkeranjang')->name('list_keranjang');
    Route::get('/updateqty', 'BelanjaController@updateqty')->name('updateqty');
    Route::get('/getkota', 'BelanjaController@getkota')->name('getkota');
    Route::get('/getcost', 'BelanjaController@getcost')->name('getcost');
    Route::get('/hapus_produk', 'BelanjaController@hapus_produk')->name('hapus_produk');
    Route::get('/pembayaran/{id}', 'BelanjaController@pembayaran')->name('pembayaran')->middleware(['PermissionSession','EmailVerified','CheckIfLoginFlagPelanggan']);;
    Route::get('/bayar/{id}/{id_mitra}/{ongkir}', 'BelanjaController@bayar')->name('bayar');
    Route::post('/store/{id}', 'BelanjaController@store')->name('store');

});


Route::group(['prefix'=>'food','as'=>'Food.'], function(){
    Route::get('/', 'FoodController@index')->name('index');    
});

Route::group(['prefix'=>'travel','as'=>'Travel.'], function(){
    Route::get('/', 'TravelController@index')->name('index');    
});



// transaction
Route::group(['prefix'=>'transaction','as'=>'Transaction.','middleware'=>['PermissionSession','EmailVerified','CheckIfLoginFlagPelanggan']], function(){
    Route::get('/', 'TransaksiController@index')->name('index');
    Route::get('/e/{id}', 'TransaksiController@detail')->name('detail');
    Route::get('/close_review', 'TransaksiController@close_review')->name('close_review');
    Route::get('/Lanjut/{id}', 'TransaksiController@Lanjut')->name('Lanjut');
    Route::get('/invoice/privat/{id}', 'TransaksiController@Invoice')->name('Invoice');
    Route::get('/e/dummy', 'TransaksiController@dummy_pembayaran')->name('Dummy');
    Route::get('/online_payment', 'TransaksiController@online_payment')->name('online_payment');

});

// Dummy transaction
Route::group(['prefix'=>'d_transaction','as'=>'D_Transaction.'], function(){
    Route::get('/private/dummy/requested', 'TransaksiController@dummy_requested')->name('requested');
    Route::get('/private/dummy/pending', 'TransaksiController@dummy_pending')->name('pending');
    Route::get('/bimbel_online/dummy/pending', 'TransaksiController@bo_dummy_pending')->name('bo_pending');
});


// payment
Route::group(['prefix'=>'payment','as'=>'Payment.','middleware'=>['PermissionSession','EmailVerified','CheckIfLoginFlagPelanggan']], function(){
    Route::get('/{id}/{now}', 'PaymentController@index')->name('index');
    Route::post('/store', 'PaymentController@store')->name('store');
});


// jadwal
Route::group(['prefix'=>'jadwal','as'=>'Jadwal.','middleware'=>['PermissionSession','EmailVerified','CheckIfLoginFlagPelanggan']], function(){
    Route::get('/', 'JadwalController@semua')->name('semua');
    Route::get('/privat/{id}/{now}', 'JadwalController@index')->name('index');
    Route::get('/absen/{id}/{konfirmasi}', 'JadwalController@absen')->name('absen');
    Route::get('/absen_review/{id}/{konfirmasi}', 'JadwalController@absen_review')->name('absen_review');
});



Route::group(['prefix'=>'ApiProd','as'=>'ApiProd.'], function(){
    Route::get('/bimbel', 'bimbelController@getlocationbimbel')->name('getlocationbimbel');
});
