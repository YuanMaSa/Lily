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
        $photodetails = User::find($user_id)->photodetail;
        $addresses=User::find($user_id)->address;
        $photodetails1 =DB::table('photodetails')
            ->join('processes', 'process_id', '=', 'processes.id')
            ->join('users', 'user_id', '=', 'users.id')
            ->select('photodetails.id','processes.method','water','photodetails.created_at','photo_url','user_id')
            ->where('user_id', '=', $user_id)
            ->get();

        $photodetails2 = DB::table('photodetails')
                    ->join('users', 'user_id', '=', 'users.id')
                    ->join('processes', 'process_id', '=', 'processes.id')
                    ->select('photodetails.id','processes.method','water','photodetails.created_at','photo_url','user_id')
                    ->where([
                        ['process_id', '=', 1],
                        ['user_id', '=', $user_id],
                        ])
                    ->get();
        $photodetails3 = DB::table('photodetails')
                    ->join('users', 'user_id', '=', 'users.id')
                    ->join('processes', 'process_id', '=', 'processes.id')
                    ->select('photodetails.id','processes.method','water','photodetails.created_at','photo_url','user_id')
                    ->where([
                        ['process_id', '=', 2],
                        ['user_id', '=', $user_id],
                        ])
                    ->get();
        $photodetails4 = DB::table('photodetails')
                    ->join('users', 'user_id', '=', 'users.id')
                    ->join('processes', 'process_id', '=', 'processes.id')
                    ->select('photodetails.id','processes.method','water','photodetails.created_at','photo_url','user_id')
                    ->where([
                        ['process_id', '=', 3],
                        ['user_id', '=', $user_id],
                        ])
                    ->get();
        $photodetails5 = DB::table('photodetails')
                    ->join('users', 'user_id', '=', 'users.id')
                    ->join('processes', 'process_id', '=', 'processes.id')
                    ->select('photodetails.id','processes.method','water','photodetails.created_at','photo_url','user_id')
                    ->where([
                        ['process_id', '=', 4],
                        ['user_id', '=', $user_id],
                        ])
                    ->get();
        $photodetails6= DB::table('photodetails')
                    ->join('users', 'user_id', '=', 'users.id')
                    ->join('processes', 'process_id', '=', 'processes.id')
                    ->select('photodetails.id','processes.method','water','photodetails.created_at','photo_url','user_id')
                     ->where([
                        ['user_id', '=', $user_id],
                        ])
                    ->orderBy('created_at', 'desc')
                    ->get();

        $photodetails7= DB::table('photodetails')
                    ->join('users', 'user_id', '=', 'users.id')
                    ->join('processes', 'process_id', '=', 'processes.id')
                    ->select('photodetails.id','processes.method','water','photodetails.created_at','photo_url','address_id','user_id')
                    ->where([
                        ['user_id', '=', $user_id],
                        ])
                    ->get();


        $processes=process::all();


        return view('home',compact('processes','addresses','photodetails1','photodetails2','photodetails3','photodetails4','photodetails5','photodetails6','photodetails7'));
    }
}
