<?php

namespace LilyFlower\Http\Controllers;

use Illuminate\Http\Request;
use LilyFlower\photodetail;
use LilyFlower\address;
use LilyFlower\process;
use LilyFlower\pest;
use LilyFlower\disease;
use LilyFlower\User;
use Auth;
use DB;
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
        if (Auth::check())
            {
                // The user is logged in...
            $user_id=Auth::id();
            $addresses = User::find($user_id)->address;//查詢使用者的園區
            $processes=process::all();
            $photodetails=photodetail::all();
            $photodetails=photodetail::all();
            $diseases=disease::all();
            $pests=pest::all();
            // echo $user_id;
            return view('upload',compact('addresses','processes','photodetails','diseases','pests'));
            }
            else{
                return redirect('login');
            }
            //return the file names index in address folder
    }
    public function imageUpload()
    {
    	return redirect('upload');
    }

    /**
    * Manage Post Request
    *
    * @return void
    */

    public function imageUploadPost(Request $request)
    {
    	$this->validate($request, [
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:100000',
        ]);//限制照片副檔名及大小
        $imageName = time().'.'.$request->image->getClientOriginalExtension();
        $image = $request->file('image');
        $t = Storage::disk('s3')->put($imageName, file_get_contents($image), 'public');
        $imageName = Storage::disk('s3')->url($imageName);
        // return back()
        //     ->with('success','Image Uploaded successfully.')
        //     ->with('path',$imageName);
        $photodetail=new photodetail;
        $photodetail->water = $request->water;
        $photodetail->take_time = $request->take_time;
        $photodetail->L_value = $request->L_value;
        $photodetail->a_value = $request->a_value;
        $photodetail->b_value = $request->b_value;
        $photodetail->disease = $request->disease;
        $disease_list=$request->input('disease_list');
        $pest_list=$request->input('pest_list');
        $photodetail->pest = $request->pest;
        $photodetail->user_id = $request->user_id;
        $photodetail->process_id = $request->process_id;
        $photodetail->address_id = $request->address_id;
        $photodetail->photo_url=$imageName;//將照片網址存入photo_url中
        $photodetail->save();
        $id = $photodetail->id;
        if ($photodetail->pest==1) {
            for ($i=0; $i <count($pest_list) ; $i++) { 
            # code...
                DB::table('photodetail_pest')->insert(
                ['photodetail_id' => $id, 'pest_id' => $pest_list[$i]]);
            }
        }
        if ($photodetail->disease==1) {
            for ($i=0; $i <count($disease_list) ; $i++) { 
            # code...
                DB::table('photodetail_disease')->insert(
                ['photodetail_id' => $id, 'disease_id' => $disease_list[$i]]);
            }
        }
        return redirect('home');
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
    public function updateimage(Request $request,$id)
    {   $user_id=Auth::id();
        $this->validate($request, [
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:100000',
        ]);//限制照片副檔名及大小
        $imageName = time().'.'.$request->image->getClientOriginalExtension();
        $image = $request->file('image');
        $t = Storage::disk('s3')->put($imageName, file_get_contents($image), 'public');
        $imageName = Storage::disk('s3')->url($imageName);
        // return back()
        //     ->with('success','Image Uploaded successfully.')
        //     ->with('path',$imageName);
        $photodetail = photodetail::find($id);
        $photodetail->water = $request->water;
        $photodetail->take_time = $request->take_time;
        $photodetail->L_value = $request->L_value;
        $photodetail->a_value = $request->a_value;
        $photodetail->b_value = $request->b_value;
        $photodetail->user_id = $user_id;
        $photodetail->disease = $request->disease;
        $disease_list=$request->input('disease_list');
        $pest_list=$request->input('pest_list');
        $photodetail->pest = $request->pest;
        $photodetail->process_id = $request->process_id;
        $photodetail->address_id = $request->address_id;
        $photodetail->photo_url=$imageName;//將照片網址存入photo_url中
        $photodetail->save();
        if ($photodetail->pest==1) {
            DB::table('photodetail_pest')->where('photodetail_id', '=', $id)->delete();
            for ($i=0; $i <count($pest_list) ; $i++) { 
            # code...
                DB::table('photodetail_pest')->insert(
                ['photodetail_id' => $id, 'pest_id' => $pest_list[$i]]);
            }
        }else{
            DB::table('photodetail_pest')->where('photodetail_id', '=', $id)->delete();
        }
        if ($photodetail->disease==1) {
            DB::table('photodetail_disease')->where('photodetail_id', '=', $id)->delete();
            for ($i=0; $i <count($disease_list) ; $i++) { 
            # code...
                DB::table('photodetail_disease')->insert(
                ['photodetail_id' => $id, 'disease_id' => $disease_list[$i]]);
            }
        }else{
            DB::table('photodetail_disease')->where('photodetail_id', '=', $id)->delete();
        }
        return redirect('home');
    }
     public function show($id)
    {
        //
    }
    public function edit($id)
    {
    }
    public function modifyPhoto(Request $request)
    {   $user_id=Auth::id();
        $photodetail = photodetail::find($request->id);
        $addresses = User::find($user_id)->address;//查詢使用者的園區
        $processes=process::all();
        $diseases=disease::all();
        $pests=pest::all();
        $disease_lists=[];
        $pest_lists=[];
        if($photodetail->disease==0){
            $disease_lists=[];
        }else{
            $disease_lists = DB::select('select disease_id from photodetail_disease where photodetail_id = ?',[$photodetail->id]);
        }
        if($photodetail->pest==0){
            $pest_lists=[];
        }else{
            $pest_lists = DB::select('select * from photodetail_pest where photodetail_id = ?',[$photodetail->id]);
        }
        return view('modifyPhoto',compact('photodetail','addresses','processes','disease_lists','pest_lists','diseases','pests'));
    }
    public function destroy($id)
    {
        $photodetail = photodetail::find($id);
        $photodetail->delete();
        return redirect('home');
    }
}