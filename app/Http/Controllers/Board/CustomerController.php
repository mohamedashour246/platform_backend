<?php

namespace App\Http\Controllers\Board;

use App\Http\Controllers\Controller;
use App\Http\Resources\CustomerResourceCollection;
use App\Models\CustomerAddress;
use Illuminate\Http\Request;
use Validator;

class CustomerController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		//
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		return view('merchants.customers.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {

		$validator = Validator::make($request->all(), [
				'governorate'      => 'required',
				'city'             => 'required',
				'building_type'    => 'nullable',
				'street_name'      => 'nullable',
				'phone2'           => 'nullable',
				'phone1'           => 'required',
				'customer_name'    => 'required',
				'avenue_number'    => 'nullable',
				'building_number'  => 'nullable',
				'floor_number'     => 'nullable',
				'place_number'     => 'nullable',
				'longitude'        => 'required',
				'latitude'         => 'required',
				'building_type_id' => 'required',
			]);

		if ($validator    ->fails()) {
			return response()->json(['status' => 'error', 'msg' => 'من فضلك قم بملىئ البيانات'], 200);
			// return redirect('post/create')
			// ->withErrors($validator)
			// ->withInput();
		}

		$customer_address = new CustomerAddress;
		if (!$customer_address->add($request->all())) {
			return response()->json(['status' => 'error', 'msg' => trans('trips.adding_customer_address_error')], 200);
		}

		return response()->json(['status' => 'success', 'msg' => trans('trips.customer_added')], 200);

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

	public function ajax_search_customers(Request $request) {

		$keyword   = $request->q;
		$customers = CustomerAddress::select('name', 'phone1', 'id', 'phone2')->where('name', 'like', '%'.$keyword.'%')->orWhere('phone2', 'like', '%'.$keyword.'%')->orWhere('phone1', 'like', '%'.$keyword.'%')->get();

		return new CustomerResourceCollection($customers);
	}
}
