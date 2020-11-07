<?php

namespace App\Http\Controllers\Board;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateProfileRequest;
use Auth;
use Image;
class ProfileController extends Controller
{


    protected $filesMainPath;

    public function __construct() {

        $this->filesMainPath =  public_path().'/uploads/admins/';
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admin = Auth::guard('admin')->user();
        return view('board.profile'  , compact('admin') );
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProfileRequest $request)
    {
        $admin = Auth::guard('admin')->user();

        if ($request->hasFile('profile_picture')) {
            $file = $request->file('profile_picture');
            $FileGeneratedName = md5(time().mt_rand(3,9)).'.'.$file->getClientOriginalExtension();
            $status = $file->move($this->filesMainPath, $FileGeneratedName);
            $admin->image = $FileGeneratedName;      
        }
        
        $admin->username = $request->username;
        $admin->email = $request->email;
        $admin->save();

        return back()->with('success_msg'  , trans('board.update_success') );

    }

}
