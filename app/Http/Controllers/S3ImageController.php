<?php

namespace LilyFlower\Http\Controllers;

use Illuminate\Http\Request;
use LilyFlower\photodetail;//use address model
use Storage;

class S3ImageController extends Controller
{

    /**
    * Create view file
    *
    * @return void
    */
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
        $photodetail->photo_url = $request->photo_url;
        $photodetail->process_id = $request->process_id;
        $photodetail->address_id = $request->address_id;
        $photodetail->save(); 
        return redirect('upload');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
}