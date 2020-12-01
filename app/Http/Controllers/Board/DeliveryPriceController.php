<?php

namespace App\Http\Controllers\Board;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Governorate;
use App\Models\City;
use App\Models\DeliveryPrice;
use App\Http\Requests\UpdateDeliveryPriceRequest;
class DeliveryPriceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $governorates = Governorate::all();
        return view('board.delivery_prices.create' , compact('governorates'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd($request->all());
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
    public function edit(DeliveryPrice $delivery_price)
    {
        $delivery_price->load(['governorate' , 'destinationGovernorate']);
        return view('board.governorates.delivery_prices.edit'  , compact('delivery_price') );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDeliveryPriceRequest $request,DeliveryPrice $delivery_price)
    {

        $delivery_price->price = $request->price;
        $delivery_price->save();
        return back()->with('success_msg' , trans('governorates.editing_delivery_price_success') );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(DeliveryPrice $delivery_price)
    {
        $delivery_price->delete();
        return back()->with('success_msg' , trans('governorates.deleted_success'));
    }
}
