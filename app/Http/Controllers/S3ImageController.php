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
    	echo "!";
        return view('upload');
    }
}