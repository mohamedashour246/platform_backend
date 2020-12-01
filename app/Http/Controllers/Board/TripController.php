<?php

namespace App\Http\Controllers\Board;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\City;
use App\Models\Trip;
use App\Models\TripItem;
use App\Models\Governorate;
use App\Models\BuildingType;
use App\Models\PaymentMethod;
use App\Models\CustomerAddress;
use App\Http\Requests\StoreTripRequest;
class TripController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('board.trips.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $payment_methods = PaymentMethod::all();
        $governorates = Governorate::all();
        $cities = City::all();
        $building_types = BuildingType::all();
        return view('board.trips.create' , compact('payment_methods' , 'governorates' , 'cities' , 'building_types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $customer_address = new CustomerAddress;
        if (!$customer_address->add($request->all())) 
            return back()->with('error_msg' , trans('trips.adding_customer_address_error'));
        

        $trip = new Trip;
        if(!$trip->add($request->all() , $customer_address->id))
            return back()->with('error_msg' , trans('trips.adding_trip_error'));

        // then we need to calcualte the trip delivery cost

        $items = [];


        for ($i = 0; $i <count($request->item_name) ; $i++) {
             $items[] = new TripItem([
                'name' => $request->item_name[$i],
                'quantity' => $request->quantity[$i] , 
                'trip_id' => $trip->id , 
            ]);
        }

       $trip->items()->saveMany($items);


        //then we need to add the trips items to database


        return redirect(route('trips.index'))->with('success_msg' , trans('trips.adding_success'));
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
