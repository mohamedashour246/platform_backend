<?php

namespace App\Http\Controllers\Board;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Governorate;
use App\Models\City;
use App\Http\Requests\Cities\StoreCityRequest;
use App\Http\Requests\Cities\UpdateCityRequest;
class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('board.cities.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lang = session()->get('locale');
        $governorates = Governorate::select('id' , 'name_'.$lang)->get();
        return view('board.cities.create' , compact('governorates'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCityRequest $request)
    {
        $city = new City;
        if($city->add($request->all()))
            return redirect(route('cities.index'))->with('success_msg' , trans('cities.adding_success') );

        return back()->with('error_msg' , trans('cities.adding_error') );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(City $city)
    {
        $city->load(['governorate' , 'admin']);
        return view('board.cities.city' , compact('city'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(City $city)
    {
        $lang = session()->get('locale');
        $governorates = Governorate::select('id' , 'name_'.$lang)->get();
        return view('board.cities.edit'  , compact('governorates' , 'city') );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCityRequest $request,City $city)
    {
         if($city->edit($request->all()))
            return redirect(route('cities.index'))->with('success_msg' , trans('cities.updating_success') );

        return back()->with('error_msg' , trans('cities.updating_error') );
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
