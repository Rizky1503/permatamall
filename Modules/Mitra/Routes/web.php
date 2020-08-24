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

Route::group(['prefix'=>'mitra','as'=>'Mitra.','middleware'=>['PermissionSession', 'CheckIfLoginFlagMitra','EmailVerifiedMitra']], function(){
    Route::get('/', 'MitraController@index')->name('index');
    Route::get('/daftar', 'MitraController@daftar')->name('daftar');
    Route::post('/daftar', 'MitraController@daftarStore')->name('daftarStore');
    Route::get('/daftar/ex/', 'MitraController@exDaftar')->name('exDaftar');
    Route::get('/matpel/', 'MitraController@matpel')->name('matpel');
    Route::post('/daftar/private', 'MitraController@daftarStoreProductPrivate')->name('daftarStoreProductPrivate');
    Route::get('/kota', 'MitraController@kota')->name('kota');
    Route::get('/Kecamatan', 'MitraController@Kecamatan')->name('Kecamatan');

    // produk
    Route::group(['prefix'=>'transaksi','as'=>'Transaksi.'], function(){
        Route::get('/', 'TransaksiController@index')->name('index');
    });


    // produk
    Route::group(['prefix'=>'product','as'=>'Product.'], function(){
        Route::get('/', 'ProdukController@index')->name('index');
        Route::get('/privat', 'ProdukController@data')->name('data');
        Route::get('/list/{id}', 'ProdukController@List')->name('List');
        Route::get('/detail/privat/jadwal/{id}', 'ProdukController@jadwal_detail_privat')->name('jadwal_detail_privat');
        Route::get('/privat/jadwal', 'ProdukController@jadwal_privat')->name('jadwal_privat');
        Route::get('/privat/history', 'ProdukController@history_privat')->name('history_privat');
        Route::get('/privat/panduan', 'ProdukController@panduan_privat')->name('panduan_privat');
        Route::get('/privat/hak-kewajiban', 'ProdukController@hak_kewajiban_privat')->name('hak_kewajiban_privat');

    });


    // prototype
    Route::group(['prefix'=>'boffline','as'=>'BOF.'], function(){
        Route::get('/', 'bofController@index')->name('index');
        Route::get('/siswa/', 'bofController@detail_siswa')->name('detail_siswa');
        // export
        Route::get('/export', 'bofController@export')->name('export');
        // export
        Route::get('/keuangan', 'bofController@keuangan')->name('keuangan');
        // cabang
        Route::get('/cabang', 'bofController@cabang')->name('cabang');
        Route::get('/cabang/{id_cabang}', 'bofController@detail_cabang')->name('detail_cabang');

    });


    // profile
    Route::group(['prefix'=>'profile','as'=>'Profile.'], function(){
        Route::get('/', 'ProfileController@index')->name('index');
        Route::get('/password', 'ProfileController@password')->name('password');
        Route::post('/Storepassword', 'ProfileController@Storepassword')->name('Storepassword');
        Route::post('/StoreProfile', 'ProfileController@StoreProfile')->name('StoreProfile');
    });

    // privat
    Route::group(['prefix'=>'privat','as'=>'Privat.'], function(){
        Route::get('/absen/{id}', function($id){
            $url    = ENV('APP_URL_API').'web/mitra/product/private/absen/'.decrypt($id);
            $data   = file_get_contents($url);
            Alert::success('Absen Anda Berhasil', 'Selamat');
            return redirect()->route('Mitra.Product.jadwal_detail_privat',[encrypt($data)])->with('push-notification','push-notification');
        })->name('index');
    });

    // privat
    Route::group(['prefix'=>'notification','as'=>'Notification.'], function(){
        Route::get('/', 'NotificationController@index')->name('index');
    });

    // belanja
    Route::group(['prefix'=>'belanja','as'=>'Belanja.'], function(){
        Route::get('/', 'BelanjaController@index')->name('index');
        Route::post('/store', 'BelanjaController@store')->name('store');
            
        Route::group(['prefix'=>'product','as'=>'Product.'], function(){
            Route::get('/', 'BelanjaProductController@index')->name('index');
            Route::get('/create', 'BelanjaProductController@create')->name('create');
            Route::post('/store', 'BelanjaProductController@store')->name('store');            
            Route::get('/getFirstCategory', 'BelanjaProductController@getFirstCategory')->name('getFirstCategory');            
            Route::get('/get-data-product', 'BelanjaProductController@getDataProduct')->name('getDataProduct');
            Route::get('/edit/{id}', 'BelanjaProductController@edit')->name('edit');
            Route::get('/gambar/{id}', 'BelanjaProductController@Gambar')->name('Gambar');

        }); 
    });


});
