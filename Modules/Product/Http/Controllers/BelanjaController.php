<?php

namespace Modules\Product\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Session;
use Image;
use Alert;

class BelanjaController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index(Request $request)
    {        

        $this->title = 'Belanja di PermataMall';

        $Listkategori = ENV('APP_URL_API').'frontend/belanja/list_kategori';
        $listkategori = json_decode(file_get_contents($Listkategori));
 
        $Listproduk = ENV('APP_URL_API').'frontend/belanja/list_produk';
        $listproduk = json_decode(file_get_contents($Listproduk));
        // dd($listproduk);
        
        return view('product::Belanja.awal')->with([
            'page'      => $this,  
            'kategori'  => $listkategori,
            'produk'    => $listproduk,                      
        ]);
    }  

    public function detail(Request $request, $slug){        

        $this->title = 'Belanja di PermataMall';

        $Detailproduk = ENV('APP_URL_API').'frontend/belanja/detail/'.$slug;
        $detailproduk = json_decode(file_get_contents($Detailproduk));

        return view('product::Belanja.detail')->with([
            'page' => $this,
            'detailproduk' => $detailproduk,
            'slug' => $slug,
            // 'id_pelanggan' => $id_pelanggan,         
        ]);
    }

    public function keranjang (Request $request,$id_produk){
        
        if (empty(Session::get('id_token_xmtrusr'))) {
                if (empty(Session::get('id_token_fake'))) {
                    Session::put('id_token_fake',rand(1,1000000000));                   
                }
            $id = Session::get('id_token_fake');  
        }else{
            $id = decrypt(Session::get('id_token_xmtrusr'));
        }

        $client = new \GuzzleHttp\Client();

        $responsep = $client->request('Get', ENV('APP_URL_API').'frontend/belanja/cek_keranjang/'.$id_produk.'/'.$id);

        $ambil =  json_decode($responsep->getBody());
        $status = $ambil->status;


        if ( $status == "ada") {

            $Detailproduk = ENV('APP_URL_API').'frontend/belanja/detail/'.$request->slug;
            $detailproduk = json_decode(file_get_contents($Detailproduk));


            $maxstock = $detailproduk[0]->stok;

            $hitung = $ambil->keranjang[0]->qty + $request->qty;

            if ($hitung > $maxstock) {
                $new_qty = $maxstock ;
            }else{
                $new_qty = $ambil->keranjang[0]->qty + $request->qty ;
            }

            $new_harga =  $request->harga * $new_qty;

            $response = $client->request('POST', ENV('APP_URL_API').'frontend/belanja/update_keranjang', [
                        'form_params'       => [
                            'qty' => $new_qty,
                            'total_harga' => $new_harga,
                            'id_produk' => $id_produk,
                            'id_pelanggan' => $id
                        ]
                ]);   
            Alert::success('Barang Berhasil Di Tambahkan ke Keranjang', 'Terima Kasih');   
        }else{

            $harga = $request->harga * $request->qty;

            $response = $client->request('POST', ENV('APP_URL_API').'frontend/belanja/Keranjang/'.$id, [
                    'form_params'       => [
                        'id_produk' => $id_produk,
                        'harga' => $request->harga,
                        'qty' => $request->qty,
                        'total_harga' => $harga,
                        'id_mitra' => $request->id_mitra
                    ] 
            ]);  

            Alert::success('Barang Berhasil Masuk ke Keranjang', 'Terima Kasih'); 
        }
        
       return redirect()->route('Belanja.detail',[$request->slug]); 
    } 

    public function Listkeranjang()
    {        

        $curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_URL => "https://api.rajaongkir.com/starter/province",
          // CURLOPT_URL => "https://api.rajaongkir.com/starter/city?province=5",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "GET",
          CURLOPT_HTTPHEADER => array(
            "key:".ENV('APP_KEY_RAJAONGKIR')
          ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        $data = json_decode($response);
        
        $provinsi =  $data->rajaongkir;   

        if (empty(Session::get('id_token_xmtrusr'))) {
            $id = Session::get('id_token_fake');;   
        }else{
            $id = decrypt(Session::get('id_token_xmtrusr'));
        }

        $Mitra = ENV('APP_URL_API').'frontend/belanja/list_keranjang_mitra/'.$id;
        $mitra = json_decode(file_get_contents($Mitra));

        return view('product::Belanja.keranjang')->with([
            'mitra' => $mitra,
            'provinsi' => $provinsi,
            'id' => $id
        ]);
    } 

    public function updateqty(Request $request){
        if (empty(Session::get('id_token_xmtrusr'))) {
            $id = Session::get('id_token_fake');;   
        }else{
            $id = decrypt(Session::get('id_token_xmtrusr'));
        }

        $new_total = $request->harga * $request->qty;

        $client = new \GuzzleHttp\Client();
        $response = $client->request('POST', ENV('APP_URL_API').'frontend/belanja/update_keranjang', [
            'form_params' => [
                'qty' => $request->qty,
                'total_harga' => $new_total,
                'id_produk' => $request->id_produk,
                'id_pelanggan' => $id
            ]
        ]); 

        $a = json_decode($response->getBody()->getContents());

        echo $a[0]->total_harga ;
    }

    public function hapus_produk (Request $request){
        
        if (empty(Session::get('id_token_xmtrusr'))) {
            $id = Session::get('id_token_fake');;   
        }else{
            $id = decrypt(Session::get('id_token_xmtrusr'));
        }

        $client = new \GuzzleHttp\Client();
        $response = $client->request('POST', ENV('APP_URL_API').'frontend/belanja/hapus_produk', [
            'form_params' => [
                'id_produk' => $request->id_produk,
                'id_pelanggan' => $id
            ]
        ]); 
    }

    public function getkota (Request $request){
        $curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_URL => "https://api.rajaongkir.com/starter/city?province=".$request->provinsi,
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "GET",
          CURLOPT_HTTPHEADER => array(
            "key:".ENV('APP_KEY_RAJAONGKIR')
          ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        $data = json_decode($response);
        
        $Kota =  $data->rajaongkir->results; 

        echo "<option value=''>Pilih</option>";
        foreach ($Kota as $key => $value) {
            echo "<option value='".$value->city_id ."&".$value->city_name ."'>".$value->city_name.' ('.$value->type.')'."</option>";
        }   
    }

    public function getcost (Request $request){
        $curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_URL => "https://api.rajaongkir.com/starter/cost",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "POST",
          CURLOPT_POSTFIELDS => "origin=501&destination=".$request->kota."&weight=170&courier=".$request->kurir,
          CURLOPT_HTTPHEADER => array(
            "content-type: application/x-www-form-urlencoded",
            "key:".ENV('APP_KEY_RAJAONGKIR')
          ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        $data = json_decode($response);

        $cost = $data->rajaongkir->results[0];

        // dd ($cost);

        echo "<option value=''>Pilih</option>";
        foreach ($cost->costs as $key => $value) {
            echo "<option value='".$value->service."&".$value->cost[0]->value."'>". $value->service .'*'.' estimasi= '. $value->cost[0]->etd .' hari '.'Rp.'. number_format($value->cost[0]->value,0,',','.') ."</option>";
        }   
    }

    public function pembayaran (Request $request,$id){

        $key_pelanggan = Session::get('id_token_fake');;   
        $id_pelanggan = decrypt(Session::get('id_token_xmtrusr'));

        if (empty(Session::get('id_token_xmtrusr'))) {
            $key_pelanggan = Session::get('id_token_fake');;   
        }else{
            $key_pelanggan = decrypt(Session::get('id_token_xmtrusr'));
        }
    
        $client = new \GuzzleHttp\Client();

        $keterangan = array(
            'alamat_sebagai'     => $request->alamat_sebagai,
            'nama_penerima'      => $request->nama_penerima,
            'no_telpon'          => $request->no_telpon,
            'provinsi'           => $request->nama_prov,
            'kota'               => $request->nama_kota,
            'alamat_pengiriman'  => $request->alamat_pengiriman,
            'amount'             => $request->amount,
            'kurir'              => $request->kurir,
            'jenis_pengiriman'   => $request->jenis_pengiriman,
            'ongkir'             => $request->ongkir
        );

        $response = $client->request('POST', ENV('APP_URL_API').'frontend/belanja/pembayaran', [
            'form_params' => [
                'id_pelanggan' => $id_pelanggan,
                'id_mitra' => $id,
                'keterangan' => $keterangan,
                'key' => $key_pelanggan
            ]
        ]); 
        $responses = json_decode($response->getBody());
        $idinvoice = encrypt($responses->id_order);
        $id_mitra = encrypt($id);
        $ongkir = encrypt($request->ongkir);

        return redirect()->route('Belanja.bayar',[$idinvoice,$id_mitra,$ongkir]);
    }

    public function bayar (Request $request, $id,$id_mitra,$ongkir){
        decrypt($ongkir);
        $this->title = 'Belanja di PermataMall';

        $id_invoice =  decrypt($id);

        if (empty(Session::get('id_token_xmtrusr'))) {
            $id = Session::get('id_token_fake');;   
        }else{
            $id = decrypt(Session::get('id_token_xmtrusr'));
        }

        $Produk = ENV('APP_URL_API').'frontend/belanja/list_bayar/'.$id.'/'.decrypt($id_mitra).'/'.$id_invoice;
        $produks = json_decode(file_get_contents($Produk));

        $produk = $produks->list_keranjang;
        $Harga =  $produks->harga; 
        $hargas = json_decode($Harga[0]->keterangan);
        $harga = $hargas->amount + decrypt($ongkir);

        $manual   = json_decode(file_get_contents(ENV('APP_URL_API').'langganan/examp/payment_manual'));
        $online   = json_decode(file_get_contents(ENV('APP_URL_API').'langganan/examp/payment_online'));

        return view('product::Belanja.payment')->with([
            'page'      => $this,  
            'produk' => $produk,
            'harga' => $harga,
            'id_invoice' => $id_invoice,
            'ongkir' => decrypt($ongkir),
            'harga_produk' => $hargas->amount,
            'online' => $online,
            'manual' => $manual,                
        ]);
    }

     public function store(Request $request,$id)
    {
        $validatedData = $request->validate([
            'nama'          => 'required',
            'nama_bank'     => 'required',
            'upload'        => 'required',
            
        ]);

        $id_invoice =  decrypt($id);

        if (empty(Session::get('id_token_xmtrusr'))) {
            $id = Session::get('id_token_fake');;   
        }else{
            $id = decrypt(Session::get('id_token_xmtrusr'));
        }

        // file upload
        $file = $request->file('upload');
        $name = str_random(10).time() . '_' . $file->getClientOriginalName();
        $path = base_path() .'/public/images/payment';
        $img  = Image::make($file->getRealPath());
        $img->resize(300, 500, function ($constraint) { // P X T
            $constraint->aspectRatio();
        })->save($path.'/'.$name);


        $client = new \GuzzleHttp\Client();
        $response = $client->request('POST', ENV('APP_URL_API_RESOURCE').'images/payment/upload', [
            'multipart' => [                                
                [
                    'name'     => 'file_name',
                    'contents' => $name
                ],
                [
                    'name'     => 'upload_file',
                    'contents' => file_get_contents($path.'/'.$name),
                    'filename' => $name
                ],
            ]
        ]);

         $response = $client->request('POST', ENV('APP_URL_API').'frontend/belanja/update_order', [
            'form_params' => [
                'id_pelanggan' => $id,
                'id_invoice' => $id_invoice
            ]
        ]); 

        $response = $client->request('POST', ENV('APP_URL_API').'web/payment/draft', [
            'multipart' => [                
                [
                    'name'     => 'id_user',
                    'contents' => decrypt(Session::get('id_token_xmtrusr'))
                ],
                [
                    'name'     => 'id_invoice',
                    'contents' => $id_invoice
                ],
                [
                    'name'     => 'nama_pengirim',
                    'contents' => $request->nama
                ],
                [
                    'name'     => 'nama_bank',
                    'contents' => $request->nama_bank
                ],
                [
                    'name'     => 'upload_file',
                    'contents' => $name,
                ],
                [
                    'name'     => 'status',
                    'contents' => 'Requested'
                ]
            ]
        ]);

        unlink($path.'/'.$name);

        if ($response->getBody() == "Already") {
            Alert::error('Anda sudah melakukan upload pembayaran', 'error');
            return redirect()->route('Belanja.index');
        }else{
            Alert::success('Terima Kasih sudah melakukan Pembayaran', 'Terima Kasih');
            return redirect()->route('Belanja.index');
        }
    }

   
}
