<?php

namespace App\Http\Controllers\Merchant;

use App\Http\Controllers\Controller;
use App\Http\Requests\Merchants\StoreTripRequest;
use App\Models\Branch;
use App\Models\BuildingType;
use App\Models\Governorate;
use App\Models\PaymentMethod;
use App\Models\Trip;
use App\Models\TripItem;
use Auth;
use Illuminate\Http\Request;

class TripController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		return view('merchants.trips.index');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		$payment_methods = PaymentMethod::all();
		$governorates    = Governorate::all();
		$building_types  = BuildingType::all();
		$branches        = Branch::where('market_id', session()->get('market_id'))->get();
		return view('merchants.trips.create', compact('building_types', 'governorates', 'payment_methods', 'branches'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(StoreTripRequest $request) {

		foreach ($request->customers as $customer) {
			$trip                            = new Trip;
			$trip->market_id                 = session()->get('market_id');
			$trip->branch_id                 = $request->branch_id;
			$trip->code                      = mt_rand(0, 50).time();
			$trip->admin_id                  = Auth::guard('merchant')->id();
			$trip->order_price               = $request->order_price;
			$trip->payment_method_id         = $request->payment_method_id;
			$trip->delivery_date_to_customer = $request->delivery_date_to_customer.' '.$request->delivery_time_to_customer;
			$trip->receipt_date_from_market  = $request->receipt_date_from_market.' '.$request->receipt_time_from_market;
			$trip->status                    = 1;

			$trip->customer_address_id = $customer;
			$trip->save();
			$items = [];
			for ($i = 0; $i < count($request->item_name); $i++) {
				if (!is_null($request->item_name[$i])) {
					$items[] = new TripItem([
							'name'     => $request->item_name[$i],
							'quantity' => $request->quantity[$i],
							'trip_id'  => $trip->id,
						]);
				}
			}
			if (count($items)) {
				$trip->items()->saveMany($items);
			}
		}
		return redirect(route('merchants.trips.create'))->with('success_msg', trans('trips.adding_success'));
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show(Trip $trip) {
		$trip->load(['branch', 'market', 'payment_method', 'address.building_type', 'driver', 'address', 'address.governorate', 'address.city']);
		return view('merchants.trips.trip', compact('trip'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Trip $trip) {
		$payment_methods = PaymentMethod::all();
		$governorates    = Governorate::all();
		$building_types  = BuildingType::all();
		$branches        = Branch::where('market_id', session()->get('market_id'))->get();
		return view('merchants.trips.create', compact('building_types', 'governorates', 'payment_methods', 'branches', 'trip'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, Trip $trip) {

		return redirect(route('merchants.trips.index'))->with('success_msg', trans('trips.editing_success'));
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
