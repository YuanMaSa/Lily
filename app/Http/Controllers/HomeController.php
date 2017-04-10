<?php

namespace LilyFlower\Http\Controllers;

use Illuminate\Http\Request;
use LilyFlower\photodetail;
use LilyFlower\address;
use LilyFlower\process;
use LilyFlower\User;
use Auth;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $user_id=Auth::id();
        $photodetails =DB::table('photodetails')
            ->join('processes', 'process_id', '=', 'processes.id')
            ->select('processes.method','water','photodetails.created_at','photo_url')
            ->get();
        $processes=process::all();
        $addresses =address::all();
        return view('home',compact('addresses','processes','photodetails'));
    }
}
