<?php

namespace App\Http\Controllers\Board;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\City;
use App\Models\Trip;
use App\Models\Driver;
use App\Models\TripItem;
use App\Models\Governorate;
use App\Models\BuildingType;
use App\Models\PaymentMethod;
use App\Models\CustomerAddress;
use App\Models\TripStatus;
use App\Http\Requests\StoreTripRequest;
use PDF;
class TripController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // $trips = Trip::all();

        // return PDF::loadView('board.drivers.pdf', compact('trips'))->download('trips.pdf');
        
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
        $building_types = BuildingType::all();
        $drivers = Driver::all();
        $clients = CustomerAddress::all();
        return view('board.trips.create' , compact('payment_methods' , 'governorates' ,  'building_types' , 'drivers'  , 'clients' ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTripRequest $request)
    {   
        foreach ($request->customers as $customer) {
            $trip = new Trip;
            $trip->add($request->all() , $customer);
            $items = [];
            for ($i = 0; $i <count($request->item_name) ; $i++) {
                if (!is_null($request->item_name[$i])) {
                    $items[] = new TripItem([
                        'name' => $request->item_name[$i],
                        'quantity' => $request->quantity[$i] , 
                        'trip_id' => $trip->id , 
                    ]);
                }
            }
           if(count($items))
                $trip->items()->saveMany($items);
        }

        // here we need to notify the diver about the order

        return redirect(route('trips.create'))->with('success_msg' , trans('trips.adding_success'));
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
