<?php

namespace App\Http\Controllers\Board;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Governorate;
use App\Models\Country;
use App\Http\Requests\Governorates\StoreGovernorateRequest;
use App\Http\Requests\Governorates\UpdateGovernorateRequest;
use App\Models\DeliveryPrice;
use Auth;
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
        $governorate->withCount('cities');
        $governorate->load(['admin','country' , 'cities' , 'delivery_prices' , 'delivery_prices.destinationGovernorate' ]);
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





    public function delivery_prices_create(Governorate $governorate)
    {
        $exception_governorates = $governorate->delivery_prices()->pluck('to_governorate')->toArray();
        $exception_governorates[] = $governorate->id ;
        $governorates = Governorate::whereNotIn('id' ,  $exception_governorates )->get();
        return view('board.governorates.delivery_prices.create' , compact('governorate' , 'governorates'));
    }


    public function delivery_prices_store(Request $request ,  Governorate $governorate)
    {

        $delivery_prices = [];
        for ($i = 0; $i <count($request->prices) ; $i++) {
            if ($request->prices[$i] != null ) {
                $delivery_prices[] = new DeliveryPrice([
                    'price' => $request->prices[$i] ,
                    'admin_id' => Auth::guard('admin')->id(),
                    'from_governorate' => $governorate->id , 
                    'to_governorate' => $request->from_governorate_id[$i],
                ]);
            } 
        }

        $governorate->delivery_prices()->saveMany($delivery_prices);

        return redirect(route('governorates.delivery_prices.index'  , ['governorate' => $governorate->id ] ))->with('success_msg' , trans('governorates.delivery_prices_add_successfully') );
    }



    public function delivery_prices(Governorate $governorate)
    {
        $governorate->load(['delivery_prices.destinationGovernorate' , 'delivery_prices.admin' , 'delivery_prices' ]);
        return view('board.governorates.delivery_prices.index'  , compact('governorate') );
        
    }




}

