<?php

namespace App\Http\Controllers\Merchant;

use App\Http\Controllers\Controller;
use App\Http\Requests\Merchants\StoreCustomerRequest;
use App\Http\Requests\Merchants\UpdateCustomerRequest;
use App\Models\BuildingType;
use App\Models\City;
use App\Models\CustomerAddress;
use App\Models\Governorate;
use Auth;

class CustomerController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {

		return view('merchants.customers.index');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		$building_types = BuildingType::latest()->get();
		$governorates   = Governorate::where('active', 1)->latest()->get();
		$cities         = City::where('active', 1)->latest()->get();
		return view('merchants.customers.create', compact('governorates', 'cities', 'building_types'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(StoreCustomerRequest $request) {

		$customer_address = new CustomerAddress;
		$market_id        = session()->get('market_id');
		if (!$customer_address->add($request->all(), $market_id, Auth::guard('merchant')->id(), 'merchant')) {
			return back()->with('error_msg', trans('customers.adding_customer_address_error'));
		}

		return back()->with('success_msg', trans('customers.customer_added'));
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show(CustomerAddress $customer) {
		$customer->load(['building_type', 'city', 'governorate']);
		return view('merchants.customers.customer', compact('customer'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit(CustomerAddress $customer) {
		$building_types = BuildingType::latest()->get();
		$governorates   = Governorate::where('active', 1)->latest()->get();
		$cities         = City::where('active', 1)->where('governorate_id', $customer->governorate_id)->latest()->get();
		return view('merchants.customers.edit', compact('governorates', 'cities', 'building_types', 'customer'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(UpdateCustomerRequest $request, CustomerAddress $customer) {

		if (!$customer->edit($request->all())) {
			return back()->with('error_msg', trans('customers.edit_error'));
		}

		return back()->with('success_msg', trans('customers.edit_success'));
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
