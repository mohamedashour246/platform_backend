<?php

namespace App\Http\Controllers\Board;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateProfileRequest;
use App\Http\Requests\ChangePasswordRequest;
use Auth;
use Image;
use Hash;
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
           $path =  $request->file('profile_picture')->store('admins' , 's3');

           $admin->image = basename($path);
        }
        
        $admin->username = $request->username;
        $admin->email = $request->email;
        $admin->save();

        return back()->with('success_msg'  , trans('board.update_success') );

    }




    public function edit_password()
    {
        $admin = Auth::guard('admin')->user();
        return view('board.password'  , compact('admin') );       
    }




    public function  change_password(ChangePasswordRequest $request)
    {
        $admin = Auth::guard('admin')->user();
        if (!Hash::check($request->current_password, $admin->password ))
            return back()->with('error_msg'  , trans('profile.current_password_is_not_correct') );


        $admin->password = Hash::make($request->password);
        $admin->save();

        return back()->with('success_msg'  , trans('board.update_success') );

    }

}
