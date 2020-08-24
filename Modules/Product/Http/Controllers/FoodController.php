<?php
namespace Modules\Product\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class FoodController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index(Request $request)
    {        

        $this->title = 'Beli Makanan di permatamall';

        return view('product::Food.index')->with([
            'page'      => $this,                        
        ]);
    }  
}
