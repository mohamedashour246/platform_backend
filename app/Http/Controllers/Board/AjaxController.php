<?php

namespace App\Http\Controllers\Board;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\CustomerAddress;
use Auth;
use Illuminate\Http\Request;
use Validator;

class AjaxController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function get_governorate_cities(Request $request) {

        $lang = session()->get('locale');

        $cities = City::where('governorate_id', $request->governorate)->where('active', 1)->get();

        $options = '<option value=""> </option> ';

        foreach ($cities as $city) {
            $options .= '<option value="'.$city->id.'"> '.$city["name_".$lang].' </option>';
        }

        return $options;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add_new_customar_via_ajax(Request $request) {

        $validator = Validator::make($request->all(), [
                'governorate'     => 'required',
                'city'            => 'required',
                'building_type'   => 'nullable',
                'street_name'     => 'nullable',
                'phone2'          => 'nullable',
                'phone1'          => 'required',
                'name'            => 'required',
                'avenue_number'   => 'nullable',
                'building_number' => 'nullable',
                'floor_number'    => 'nullable',
                'place_number'    => 'nullable',
                'longitude'       => 'required',
                'latitude'        => 'required',
                'business_type'   => 'nullable',
                'market_id' => 'nullable' , 
            ]);

        // dd($validator->errors());
        if ($validator    ->fails()) {

            return response()->json(['status' => 'error', 'msg' => 'من فضلك قم بملىئ البيانات'], 200);
        }

        // dd($request->all());

        $market_id = session()->get('market_id');
        $user_id   = Auth::guard('admin')->id();

        $customer_address = new CustomerAddress;
        if (!$customer_address->add($request->all(), $request->market_id, $user_id, 'admin')) {
            return response()->json(['status' => 'error', 'msg' => trans('trips.adding_customer_address_error')], 200);
        }


        return response()->json(['status' => 'success', 'text' => $customer_address->name   , 'id' => $customer_address->id ,  'msg' => trans('trips.customer_added')], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        //
    }
}
