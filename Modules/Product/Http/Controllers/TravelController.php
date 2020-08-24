<?php
namespace Modules\Product\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class TravelController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index(Request $request)
    {        

        $this->title = 'travel di permatamall';

        return view('product::Travel.index')->with([
            'page'      => $this,                        
        ]);
    }  
}
