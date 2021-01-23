<?php

namespace App\Http\Controllers\Board;

use App;
use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\City;
use App\Models\CustomerAddress;
use App\Models\Driver;
use App\Models\Governorate;
use App\Models\Market;
use App\Models\Bill;
use App\Models\Trip;
use Illuminate\Http\Request;
use Carbon\Carbon;
class BoardController extends Controller {

	public function __construct() {

		$this->middleware('admin');
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		$customers_count    = CustomerAddress::count();
		$markets_count      = Market::count();
		$governorates_count = Governorate::count();
		$cities_count       = City::count();
		$admins_count       = Admin::count();
		$drivers_count      = Driver::count();
		$accountants_count  = Admin::where('type_id', 3)->count();
		$call_center_count  = Admin::where('type_id', 4)->count();
        $trips_count = Trip::count();
        $days = 10;
        $today_total_trips_count = Trip::whereDate('delivery_date_to_customer' , '='  , today() )->count();
        $markets_about_to_expire = Market::whereBetween('expiration_date'  , [Carbon::today() , Carbon::today()->addDays(10) ])->get();
        $expired_markets_subscription = Market::whereDate('expiration_date'  , '<='  , today() )->get();
        $accepted_bills_count = Bill::whereMonth('created_at'  , '=' , date('m') )->where('status' ,1 )->count();
        $waiting_bills_count = Bill::whereMonth('created_at'  , '=' , date('m') )->where('status' ,0 )->count();
        $refused_bills_count = Bill::whereMonth('created_at'  , '=' , date('m') )->where('status' , 2)->count();
        $total_bills_count = Bill::whereMonth('created_at'  , '=' , date('m') )->count();
		return view('board.index', compact('customers_count', 'markets_count', 'governorates_count', 'cities_count', 'admins_count', 'drivers_count', 'accountants_count', 'call_center_count' , 'trips_count' , 'markets_about_to_expire' , 'expired_markets_subscription' , 'today_total_trips_count' , 'accepted_bills_count'  , 'waiting_bills_count' , 'refused_bills_count' , 'total_bills_count' ));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function change_language(Request $request) {

		$langs = ['ar', 'en'];

		if (!in_array($request->lang, $langs)) {
			session()            ->put('locale', 'ar');
			session()->put('dir', 'rtl');
			App::setLocale(session()->get('locale'));
			return redirect()->back();
		}

		if ($request->lang == 'en') {
			session()  ->put('locale', 'en');
			session()->put('dir', 'ltr');
		} else {
			session()->put('locale', 'ar');
			session()->put('dir', 'rtl');
		}

		App::setLocale(session()->get('locale'));

		return redirect()->back();
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
