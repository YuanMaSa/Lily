<?php

namespace LilyFlower\Http\Controllers;

use Illuminate\Http\Request;
use LilyFlower\photodetail;
use LilyFlower\address;
use LilyFlower\process;
use LilyFlower\User;
use Auth;

use Storage;

class S3ImageController extends Controller
{

    /**
    * Create view file
    *
    * @return void
    */

    public function index()
    {
        $user_id=Auth::id();
        $addresses = User::find($user_id)->address;//查詢使用者的園區
        $processes=process::all();
        // echo $user_id;
        return view('upload',compact('addresses','processes'));//return the file names index in address folder
    }
    public function imageUpload()
    {
    	return view('upload');
    }

    /**
    * Manage Post Request
    *
    * @return void
    */
    
    public function imageUploadPost(Request $request)
    {
    	echo "!";
        return view('upload');
    }
    public function store(Request $request)
    {
        $photodetail=new photodetail;
        $photodetail->water = $request->water;
        $photodetail->take_time = $request->take_time;
        $photodetail->L_value = $request->L_value;
        $photodetail->a_value = $request->a_value;
        $photodetail->b_value = $request->b_value;
        $photodetail->process_id = $request->process_id;
        $photodetail->address_id = $request->address_id;
        $photodetail->save(); 

        return redirect('home');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
}