<?php

namespace App\Http\Controllers\Board;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Drivers\StoreDriverRequest;
use App\Http\Requests\Drivers\UpdateDriverRequest;
use App\Models\Country;
use App\Models\Driver;
class DriverController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('board.drivers.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = Country::all();
        return view('board.drivers.create' , compact('countries') );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDriverRequest $request)
    {
        $driver = new Driver;

        if(!$driver->add($request->all()))
            return back()->with('error_msg' , trans('drivers.adding_error'));


        if($request->hasFile('profile_picture')) {
            $path = $request->file('profile_picture')->store('drivers' , 's3' );
            $driver->setImage(basename($path));
        }


        return redirect(route('drivers.index'))->with('success_msg' , trans('drivers.added_success'));


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Driver $driver)
    {
        $driver->load(['country' , 'admin']);
        return view('board.drivers.driver' , compact('driver'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Driver $driver)
    {
        $countries = Country::all();
        return view('board.drivers.edit'  , compact('countries'  , 'driver' ) );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDriverRequest $request,Driver $driver)
    {
        if(!$driver->edit($request->all()))
            return back()->with('error_msg' , trans('drivers.updating_error'));


        if($request->hasFile('profile_picture')) {
            $path = $request->file('profile_picture')->store('drivers' , 's3' );
            $driver->setImage(basename($path));
        }


        return back()->with('success_msg' , trans('drivers.updating_success'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Driver $driver)
    {

        if($driver->remove())
            return redirect(route('drivers.index'))->with('success_msg' , trans('drivers.deleted_success'));
        
    }
}
