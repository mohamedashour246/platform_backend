<?php

namespace App\Http\Controllers\Board;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Governorate;
use App\Models\Country;
use App\Http\Requests\Governorates\StoreGovernorateRequest;
use App\Http\Requests\Governorates\UpdateGovernorateRequest;
class GovernorateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('board.governorates.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = Country::all();
        return view('board.governorates.create' , compact('countries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreGovernorateRequest $request)
    {
        $governorate = new Governorate;
        if(!$governorate->add($request->all()))
            return back()->with('error_msg' , trans('governorates.adding_error') );


        return redirect(route('governorates.index'))->with('success_msg' , trans('governorates.adding_success') );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Governorate $governorate)
    {
        $governorate->load(['admin' , 'country']);
        return  view('board.governorates.governorate'  , compact('governorate') );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Governorate $governorate)
    {
        $countries = Country::all();
        return view('board.governorates.edit' , compact('governorate' , 'countries') );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateGovernorateRequest $request,Governorate $governorate)
    {
        if(!$governorate->edit($request->all()))
            return back()->with('error_msg' , trans('governorates.updating_error') );


        return redirect(route('governorates.index'))->with('success_msg' , trans('governorates.updating_success') );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
