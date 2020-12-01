<?php

namespace App\Http\Controllers\Board;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CityDeliveryPrice;
use App\Models\Governorate;
use App\Models\City;
use Auth;
class CityDeliveryPriceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('board.city_delivery_prices.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $governorates = Governorate::all();
        return view('board.city_delivery_prices.create' ,  compact('governorates'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $city_delivery_price = new CityDeliveryPrice;
        $city_delivery_price->from_city = $request->from_city;
        $city_delivery_price->to_city = $request->to_city;
        $city_delivery_price->price = $request->price;
        $city_delivery_price->admin_id = Auth::guard('admin')->id();
        $city_delivery_price->save();
        return redirect(route('city_delivery_prices.index'))->with('success_msg' , trans('city_delivery_prices.price_added_successfully'));
    }

    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         // return redirect(route('city_delivery_prices.index'))->with('success_msg' , trans('city_delivery_prices.price_added_successfully'));
    }



    public function get_cities_we_can_set_price_to_it(Request $request)
    {


        $city_delivery_prices = CityDeliveryPrice::where('from_city' , $request->from_city )->pluck('to_city')->toArray();

        $governorate_cities = City::where('governorate_id' , $request->to_governorate_id )->whereNotIn('id' , $city_delivery_prices )->get();
        $lang = session()->get('locale');
        $options = '<option> </option>';

        foreach ($governorate_cities as $city) {
            $name = $city['name_'.$lang];
            $options .= '<option value="'.$city->id.'" >'.$name.'</option>';
        }
        return $options;
    }
}
