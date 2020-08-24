<?php

namespace Modules\Mitra\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Alert;
use Image;

class BelanjaProductController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {    
    	$client = new \GuzzleHttp\Client();
    	$result =  $client->request('POST', ENV('APP_URL_API')."frontend/mitra/belanja/list_product", [
	        'timeout' => 60,
	        'form_params' => [
	            'page' => 1,
	            'limit' => 0,
	            'order' => 'id_mitra',
	            'id_mitra' =>  decrypt(Session::get('id_token_xmtrusr'))              
	        ]
	    ]);
	    $response = json_decode($result->getBody());
    	$this->title = 'Belanja';         
    	$this->breadcrumbs = [
           ['url' => route('Mitra.Belanja.index'), 'title' =>'Dashboard'],
           ['url' => route('Mitra.Belanja.index'), 'title' =>'Belanja'],
           ['url' => '', 'title' =>'Barang'],
        ];
        return view('mitra::Belanja.Product.index')->with([
            'page'      => $this,
            'data'      => $response,
        ]);        
    }


    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function create()
    {       

    	$Data   = json_decode(file_get_contents(ENV('APP_URL_API').'frontend/mitra/belanja/create_first/'.decrypt(Session::get('id_token_xmtrusr'))));
        
        $RemoveImage   = json_decode(file_get_contents(ENV('APP_URL_API').'frontend/mitra/belanja/remove_all_image_product/'.$Data->id_produk));

    	$this->title = 'Belanja';         
    	$this->breadcrumbs = [
           ['url' => route('Mitra.Belanja.index'), 'title' =>'Dashboard'],
           ['url' => route('Mitra.Belanja.index'), 'title' =>'Belanja'],
           ['url' => route('Mitra.Belanja.Product.index'), 'title' =>'Barang'],
           ['url' => route('Mitra.Belanja.Product.create'), 'title' =>'Jual Barang'],
        ];
        return view('mitra::Belanja.Product.created')->with([
            'page'      => $this,
            'id_prod_temp' => encrypt($Data->id_produk)	
        ]);        
    }

    

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function getDataProduct(Request $request)
    {    	
    	$client = new \GuzzleHttp\Client();

    	if (isset($request->input('datatable')['query']['generalSearch'])) {
	    	$result =  $client->request('POST', ENV('APP_URL_API')."frontend/mitra/belanja/list_product", [
	            'timeout' => 60,
	            'form_params' => [
	                'page' => 1,
	                'limit' => 3,
	                'order' => 'id_mitra',
	                'id_mitra' =>  decrypt(Session::get('id_token_xmtrusr'))              
	            ]
	        ]);
	        $response = json_decode($result->getBody());

	        $data = [];
	        $no = 1;
	        foreach ($response->data as $key => $value) {
	            $beda['id'] = $value->id_mitra;                                
	            $beda['name'] = $value->id_mitra;                                
	            $beda['no'] = $no++;                                
	            array_push($data, $beda);
	        }            
        }else{            
	    	$result =  $client->request('POST', ENV('APP_URL_API')."frontend/mitra/belanja/list_product", [
	            'timeout' => 60,
	            'form_params' => [
	                'page' => 1,
	                'limit' => 3,
	                'order' => 'id_mitra',
	                'id_mitra' =>  decrypt(Session::get('id_token_xmtrusr'))              
	            ]
	        ]);
	        $response = json_decode($result->getBody());

	        $data = [];
	        $no = 1;
	        foreach ($response->data as $key => $value) {
	            $beda['id'] = $value->id_mitra;                                
	            $beda['name'] = $value->id_mitra;                                
	            $beda['no'] = $no++;                                
	            array_push($data, $beda);
	        }            
        }
    	return $request->all();
    }


    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function getFirstCategory(Request $request)
    {       
        $Category_first = [];
        $Category   = json_decode(file_get_contents(ENV('APP_URL_API').'frontend/mitra/belanja/list_category'));
        foreach ($Category as $key => $value) {
            $Category_first_data['c'] = $value->id_master_kategori;
            $Category_first_data['n'] = $value->kategori;

            $Category_sub = array();
            $sub_Category   = json_decode(file_get_contents(ENV('APP_URL_API').'frontend/mitra/belanja/list_sub_category/'.str_replace(" ", "%20", $value->kategori)));
            foreach ($sub_Category as $key => $values) {
                $Category_sub_data['c'] = $values->id_master_kategori;
                $Category_sub_data['n'] = $values->kategori;

                $Category_sub_sub = array();
                $sub_sub_Category = json_decode(file_get_contents(ENV('APP_URL_API').'frontend/mitra/belanja/list_sub_category/'.str_replace(" ", "%20", $values->kategori)));

                foreach ($sub_sub_Category as $key => $valuess) {                
                    $Category_sub_sub_data['c'] = $valuess->id_master_kategori;
                    $Category_sub_sub_data['n'] = $valuess->kategori;                    
                    array_push($Category_sub_sub, $Category_sub_sub_data);                
                }

                $Category_sub_data['d'] = $Category_sub_sub;
                array_push($Category_sub, $Category_sub_data);                

            }
            $Category_first_data['d'] = $Category_sub;
            array_push($Category_first, $Category_first_data);

        }

        return $Category_first;
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function imageUploadProduct(Request $request)
    {      
        return $request;
        if (isset($request->id)) {
            $result =  $client->request('POST', ENV('APP_URL_API')."frontend/mitra/belanja/remove_image_product", [
                'form_params' => [
                    'id_gambar'         => decrypt($request->id),                  
                ]
            ]);
            $responses = json_decode($result->getBody());
            dd($responses->error);
        }else{

            // upload gambar
            $file = $request->file('imageOne');
            $database =  $file->getClientOriginalName ();            
            $name = 'foto-profile.png';
            $path = base_path() .'/public/images/belanja';
            $img  = Image::make($file->getRealPath());
            $img->resize(200, 200, function ($constraint) { // P X T
                $constraint->aspectRatio();
            })->save($path.'/'.$name);

            $responseImage = $client->request('POST', ENV('APP_URL_API_RESOURCE').'images/mitra/belanja/upload_gambar', [
                'multipart' => [                                
                    [
                        'name'     => 'file_name',
                        'contents' => pathinfo($database,PATHINFO_FILENAME)
                    ],
                    [
                        'name'     => 'foto',
                        'contents' => file_get_contents($path.'/'.$name),
                        'filename' => $name
                    ],
                ]
            ]);
            $responsesImage = json_decode($responseImage->getBody());
            unlink($path.'/'.$name);

            $result =  $client->request('POST', ENV('APP_URL_API')."frontend/mitra/belanja/store_image_product", [
                'form_params' => [
                    'id_produk'         => decrypt($request->data),
                    'gambar_produk'     => $responsesImage->error,                     
                ]
            ]);
            $responses = json_decode($result->getBody());
            
            $success_message = array( 'success' => 200,
                'filename' => encrypt($responses->error->id_gambar),
            );
            return json_encode($success_message);
        }       
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function store(Request $request)
    {       
        $client = new \GuzzleHttp\Client();
        $result =  $client->request('POST', ENV('APP_URL_API')."frontend/mitra/belanja/store_product_belanja", [
            'form_params' => [
                'id_product'        => decrypt($request->_product_key),
                'nama_barang'       => $request->nama_barang,
                'kategori_barang'   => $request->kategori_barang,              
                'harga'             => $request->harga,
                'stok'              => $request->stok,              
                'kondisi_barang'    => $request->kondisi_barang,              
                'barang_import'     => $request->barang_import,              
                'keterangan'        => $request->keterangan,              
                'lat'               => $request->_lat,              
                'long'              => $request->_long  
            ]
        ]);

        return $result->getBody();   
    }  


    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function edit($id)
    {       
        $Data   = json_decode(file_get_contents(ENV('APP_URL_API').'frontend/mitra/belanja/edit/'.decrypt($id)));
        if (empty($Data)) {
            return redirect()->route('Mitra.Belanja.Product.index')->with('error','Data tidak ditemukan');
        }
        $this->title = 'Belanja';         
        $this->breadcrumbs = [
           ['url' => route('Mitra.Belanja.index'), 'title' =>'Dashboard'],
           ['url' => route('Mitra.Belanja.index'), 'title' =>'Belanja'],
           ['url' => route('Mitra.Belanja.Product.index'), 'title' =>'Barang'],
           ['url' => '', 'title' =>'Edit Barang'],
        ];
        return view('mitra::Belanja.Product.edit')->with([
            'page'          => $this,
            'Data'          => $Data, 
            'id_prod_temp'  => encrypt($Data->id_produk) 
        ]);        
    }  


    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function Gambar($id)
    {       
        $Data   = json_decode(file_get_contents(ENV('APP_URL_API').'frontend/mitra/belanja/edit/'.decrypt($id)));
        if (empty($Data)) {
            return redirect()->route('Mitra.Belanja.Product.index')->with('error','Data tidak ditemukan');
        }

        $Gambar   = json_decode(file_get_contents(ENV('APP_URL_API').'frontend/mitra/belanja/gambar/'.decrypt($id)));

        $this->title = 'Gambar Produk';         
        $this->breadcrumbs = [
           ['url' => route('Mitra.Belanja.index'), 'title' =>'Dashboard'],
           ['url' => route('Mitra.Belanja.index'), 'title' =>'Belanja'],
           ['url' => route('Mitra.Belanja.Product.index'), 'title' =>'Barang'],
           ['url' => '', 'title' =>'Upload Gambar'],
        ];
        return view('mitra::Belanja.Product.gambar')->with([
            'page'          => $this,
            'Data'          => $Data, 
            'Gambar'        => $Gambar, 
            'id_prod_temp'  => encrypt($Data->id_produk) 
        ]);        
    }  
}
