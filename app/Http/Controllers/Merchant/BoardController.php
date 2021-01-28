<?php

namespace App\Http\Controllers\Merchant;

use App;
use App\Http\Controllers\Controller;
use App\Http\Controllers\merchantDashbaord\SubCategoryController;
use App\Http\Resources\CustomerResourceCollection;
use App\Models\CustomerAddress;
use Illuminate\Http\Request;

class BoardController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
        $categories    = App\MerchantModels\SubCategory::latest()->where('merchant_id',auth()->guard('merchant')->id())->get();
        $products      = App\MerchantModels\Product::latest()->where('merchant_id',auth()->guard('merchant')->id())->get();
        $orders = App\Models\Order::latest()->where('merchant_id',auth()->guard('merchant')->id())->get();
        return view('merchants.index', compact('categories','products','orders'));	}

	public function notifications() {
		return view('merchants.notifications');
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

	public function search_customers(Request $request) {
		$keywords  = $request->q;
		$market_id = session()->get('market_id');
		$customers = CustomerAddress::where('market_id', $market_id)->where('name', 'like', '%'.$keywords.'%')->orWhere('phone1', 'like', '%'.$keywords.'%')->orWhere('phone2', 'like', '%'.$keywords.'%')->get();
		return new CustomerResourceCollection($customers);

	}

}
