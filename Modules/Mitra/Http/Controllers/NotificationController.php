<?php

namespace Modules\Mitra\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Alert;
use Image;

class NotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {        
        $this->title = 'Pemberitahuan'; 
        
        return view('mitra::Notification.index')->with([
            'page'      => $this,
        ]);
    }
}
