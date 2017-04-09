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
    {   echo "1";
    	$this->validate($request, [
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);//限制照片副檔名及大小
         echo "2";
        $imageName = time().'.'.$request->image->getClientOriginalExtension();
        $image = $request->file('image');
         echo "3";
        $t = Storage::disk('s3')->put($imageName, file_get_contents($image), 'public');

         echo "4";
        $imageName = Storage::disk('s3')->url($imageName);
         echo "5";
        // return back()
        //     ->with('success','Image Uploaded successfully.')
        //     ->with('path',$imageName);
        $photodetail=new photodetail;
        $photodetail->water = $request->water;
        $photodetail->take_time = $request->take_time;
        $photodetail->L_value = $request->L_value;
        $photodetail->a_value = $request->a_value;
        $photodetail->b_value = $request->b_value;
        $photodetail->process_id = $request->process_id;
        $photodetail->address_id = $request->address_id;
        $photodetail->photo_url=$imageName;//將照片網址存入photo_url中
         echo "6";
        $photodetail->save();
         echo "7";
        return view('home');
    }
    // public function store(Request $request)
    // {
    //     $photodetail=new photodetail;
    //     $photodetail->water = $request->water;
    //     $photodetail->take_time = $request->take_time;
    //     $photodetail->L_value = $request->L_value;
    //     $photodetail->a_value = $request->a_value;
    //     $photodetail->b_value = $request->b_value;
    //     $photodetail->process_id = $request->process_id;
    //     $photodetail->address_id = $request->address_id;
    //     $photodetail->save();

    //     return redirect('home');

    // }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
}