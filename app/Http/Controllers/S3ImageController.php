<?php

namespace LilyFlower\Http\Controllers;

use Illuminate\Http\Request;
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
    	$this->validate($request, [
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imageName = time().'.'.$request->image->getClientOriginalExtension();
        $image = $request->file('image');
        $t = Storage::disk('s3')->put($imageName, file_get_contents($image), 'public');
        $imageName = Storage::disk('s3')->url($imageName);

    	return back()
    		->with('success','Image Uploaded successfully.')
    		->with('path',$imageName);
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
        $photodetail->address_id = $request->address_id
        $address->save(); 
        return redirect('upload');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
}