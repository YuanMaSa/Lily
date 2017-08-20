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
use Excel;


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
    	if($request->predict!=1){
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
            if($request->water==null){
                $photodetail->water = 0;
            }else{
                $photodetail->water = $request->water;
            }
            $photodetail->take_time = $request->take_time;
            $photodetail->L_value = $request->L_value;
            $photodetail->a_value = $request->a_value;
            $photodetail->b_value = $request->b_value;
            $photodetail->disease = $request->disease;
            $disease_list=$request->input('disease_list');
            $pest_list=$request->input('pest_list');
            //$photodetail->pest = 0;
            $photodetail->user_id = $request->user_id;
            $photodetail->process_id = $request->process_id;
            $photodetail->address_id = $request->address_id;
            $photodetail->photo_url=$imageName;//將照片網址存入photo_url中
            $output2 = shell_exec('python3 /var/www/Lily/openCV.py '.$imageName);
            $array1 = explode(",",$output2);
            $photodetail->h=$array1[0];
            $photodetail->s=$array1[1];
            $photodetail->v=$array1[2];
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
            $data = photodetail::get(array('process_id', 'L_value', 'a_value', 'b_value','h','s','v','take_time','water'))->toArray();
            //$data = DB::table('photodetails')->select('process_id', 'L_value', 'a_value', 'b_value','h','s','v','take_time','water')->get()->toArray();
            //echo $data;
            $t=Excel::create('lilyflower', function($excel) use ($data) {
                $excel->sheet('mySheet', function($sheet) use ($data)
                {
                   $sheet->fromArray($data, null, 'A1', true,false);
                });
            })->store('csv', storage_path('public'));
            return redirect('home');
        }else{
            $process_id = $request->process_id;
            $take_time = $request->take_time;
            $L_value= $request->L_value;
            $a_value = $request->a_value;
            $b_value = $request->b_value;
            $this->validate($request, [
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:100000',
            ]);//限制照片副檔名及大小
            $imageName = time().'.'.$request->image->getClientOriginalExtension();
            $image = $request->file('image');
            $t = Storage::disk('s3')->put($imageName, file_get_contents($image), 'public');
            #echo $imageName;
            $img=$imageName;
            $imageName = Storage::disk('s3')->url($imageName);
            $url=$imageName;
            $photodetail=new photodetail;
            $photodetail->water = 0;
            $photodetail->take_time = $request->take_time;
            $photodetail->L_value = $request->L_value;
            $photodetail->a_value = $request->a_value;
            $photodetail->b_value = $request->b_value;
            $photodetail->disease = $request->disease;
            $disease_list=$request->input('disease_list');
            $pest_list=$request->input('pest_list');
            //$photodetail->pest = 0;
            $photodetail->user_id = $request->user_id;
            $photodetail->process_id = $request->process_id;
            $photodetail->address_id = $request->address_id;
            $photodetail->photo_url=$imageName;//將照片網址存入photo_url中
            //$photodetail->save();
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
            #echo("take_time : ".$take_time." L value : ".$L_value." a value : ".$a_value." b value : ".$b_value." image_url : ".$imageName);

            // $command = escapeshellcmd('/Users/mindy/Desktop/test.py');
            #$download='wget '.$imageName;
            #$commandDownload = shell_exec($download);
            #$imagePosition='./../opencvExportHSV.py ./../public/'.$img;
            #$command = escapeshellcmd($image_command);
            #$command="./../opencvExportHSV.py ".$imageName;
            #echo "<br>command : ".$image_command;
            //$output1 = shell_exec('/Users/mindy/laravel-project/Lily/convertType.py');
            // echo "output1 : ".$output1;
            //$output2 = shell_exec('/Users/mindy/laravel-project/Lily/openCV.py '.$imageName);
            // echo "output2 : ".$output2;
            $output1 = shell_exec('python3 /var/www/Lily/convertType.py');
            $output2 = shell_exec('python3 /var/www/Lily/openCV.py '.$imageName);
            $array1 = explode(",",$output2);
            $photodetail->h=$array1[0];
            $photodetail->s=$array1[1];
            $photodetail->v=$array1[2];
            //$image_command='/Users/mindy/laravel-project/Lily/opencvExportHSV_v2.py '.$L_value.' '.$a_value.' '.$b_value.' '.$take_time.' '.$process_id.' '.$array1[0].' '.$array1[1].' '.$array1[2];

            $image_command='python3 /var/www/Lily/opencvExportHSV_v2.py '.$L_value.' '.$a_value.' '.$b_value.' '.$take_time.' '.$process_id.' '.$array1[0].' '.$array1[1].' '.$array1[2];
            $output = shell_exec($image_command);

            $photodetail->water=(int)$output;

            //$photodetail->save();
            $user_id=Auth::id();

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
            //echo($photodetail->water);


            //新增後自動更新csv

            $data = photodetail::get(array('process_id', 'L_value', 'a_value', 'b_value','h','s','v','take_time','water'))->toArray();
            //$data = DB::table('photodetails')->select('process_id', 'L_value', 'a_value', 'b_value','h','s','v','take_time','water')->get()->toArray();
            //echo $data;
            $t=Excel::create('lilyflower', function($excel) use ($data) {
                $excel->sheet('mySheet', function($sheet) use ($data)
                {
                   $sheet->fromArray($data, null, 'A1', true,false);
                });
            })->store('csv', storage_path('public'));
            $photodetail->save();
            return view('modifyPhoto',compact('photodetail','addresses','processes','disease_lists','pest_lists','diseases','pests'));
        }
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
        // $this->validate($request, [
        //     'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:100000',
        // ]);//限制照片副檔名及大小
        // $imageName = time().'.'.$request->image->getClientOriginalExtension();
        // $image = $request->file('image');
        // $t = Storage::disk('s3')->put($imageName, file_get_contents($image), 'public');
        // $imageName = Storage::disk('s3')->url($imageName);
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
        $photodetail->pest = 0;
        $photodetail->process_id = $request->process_id;
        $photodetail->address_id = $request->address_id;
        //$photodetail->photo_url=$imageName;//將照片網址存入photo_url中
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
        //更新後自動更新csv

            $data = photodetail::get(array('process_id', 'L_value', 'a_value', 'b_value','h','s','v','take_time','water'))->toArray();
            //$data = DB::table('photodetails')->select('process_id', 'L_value', 'a_value', 'b_value','h','s','v','take_time','water')->get()->toArray();
            //echo $data;
            $t=Excel::create('lilyflower', function($excel) use ($data) {
                $excel->sheet('mySheet', function($sheet) use ($data)
                {
                     $sheet->row(1, array(
                        'process_id', 'L_value', 'a_value', 'b_value','h','s','v','take_time','water'
                    ));
                    $sheet->fromArray($data, null, 'A1', true,false);
                });
            })->store('csv', storage_path('public'));
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
        //更新後自動更新csv

            $data = photodetail::get(array('process_id', 'L_value', 'a_value', 'b_value','h','s','v','take_time','water'))->toArray();
            //$data = DB::table('photodetails')->select('process_id', 'L_value', 'a_value', 'b_value','h','s','v','take_time','water')->get()->toArray();
            //echo $data;
            $t=Excel::create('lilyflower', function($excel) use ($data) {
                $excel->sheet('mySheet', function($sheet) use ($data)
                {
                    $sheet->row(1, array(
                        'process_id', 'L_value', 'a_value', 'b_value','h','s','v','take_time','water'
                    ));
                    $sheet->fromArray($data, null, 'A1', true,false);
                });
            })->store('csv', storage_path('public'));
        return view('modifyPhoto',compact('photodetail','addresses','processes','disease_lists','pest_lists','diseases','pests'));
    }
    public function destroy($id)
    {
        $photodetail = photodetail::find($id);
        $photodetail->delete();
        //刪除後自動更新csv

            $data = photodetail::get(array('process_id', 'L_value', 'a_value', 'b_value','h','s','v','take_time','water'))->toArray();
            //$data = DB::table('photodetails')->select('process_id', 'L_value', 'a_value', 'b_value','h','s','v','take_time','water')->get()->toArray();
            //echo $data;
            $t=Excel::create('lilyflower', function($excel) use ($data) {
                $excel->sheet('mySheet', function($sheet) use ($data)
                {
                    $sheet->row(1, array(
                        'process_id', 'L_value', 'a_value', 'b_value','h','s','v','take_time','water'
                    ));
                    $sheet->fromArray($data, null, 'A1', true,false);
                });
            })->store('csv', storage_path('public'));
        return redirect('home');
    }
}
