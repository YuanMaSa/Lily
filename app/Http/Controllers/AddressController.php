<?php

namespace LilyFlower\Http\Controllers;

use Illuminate\Http\Request;
use DB;//use DB
use LilyFlower\address;//use address model
use LilyFlower\User;
use Auth;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id=Auth::id();
        $addresses = User::find($user_id)->address;//查詢使用者的園區
        // echo $user_id;
        return view('address.index',compact('addresses'));//return the file names index in address folder
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $address=new address;
        $address->name = $request->name;
        $address->user_id = $request->user_id;
        $address->save(); 
        return redirect('address');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $address = address::find($id);
        return $address;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {   $user_id=Auth::id();
        $address = address::find($id);
        $address->name = $request->name;
        $address->user_id = $user_id;
        $address->save(); 
        return redirect('address');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $address = address::find($id);
        $address->delete();
        return redirect('address');
    }
}
