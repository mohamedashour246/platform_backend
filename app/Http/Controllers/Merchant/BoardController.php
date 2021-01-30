<?php

namespace App\Http\Controllers\Merchant;

use App;
use App\Http\Controllers\Controller;
use App\Http\Controllers\merchantDashbaord\SubCategoryController;
use App\Http\Resources\CustomerResourceCollection;
use App\Models\OrderCustomerAddress;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BoardController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
        $this->data['categories']    = App\MerchantModels\SubCategory::latest()->where('merchant_id',auth()->guard('merchant')->id())->get();
        $this->data['products']      = App\MerchantModels\Product::latest()->where('merchant_id',auth()->guard('merchant')->id())->get();
        $this->data['orders'] = App\Models\Order::latest()->where('merchant_id',auth()->guard('merchant')->id())->get();
        // Charts Statics
        Carbon::setLocale('ar');
        $this->data['current_month'] = Carbon::now()->endOfMonth()->format('Y-M');
        $this->data['sub_1_month'] = Carbon::now()->endOfMonth()->subMonth(1)->format('Y-M');
        $this->data['sub_2_month'] = Carbon::now()->endOfMonth()->subMonth(2)->format('Y-M');
        $this->data['sub_3_month'] = Carbon::now()->endOfMonth()->subMonth(3)->format('Y-M');
        $this->data['sub_4_month'] = Carbon::now()->endOfMonth()->subMonth(4)->format('Y-M');
        $this->data['sub_5_month'] = Carbon::now()->endOfMonth()->subMonth(5)->format('Y-M');
        $this->data['sub_6_month'] = Carbon::now()->endOfMonth()->subMonth(6)->format('Y-M');
        $this->data['sub_7_month'] = Carbon::now()->endOfMonth()->subMonth(7)->format('Y-M');
        $this->data['sub_8_month'] = Carbon::now()->endOfMonth()->subMonth(8)->format('Y-M');
        $this->data['sub_9_month'] = Carbon::now()->endOfMonth()->subMonth(9)->format('Y-M');
        $this->data['sub_10_month'] = Carbon::now()->endOfMonth()->subMonth(10)->format('Y-M');
        $this->data['sub_11_month'] = Carbon::now()->endOfMonth()->subMonth(11)->format('Y-M');

        $this->data['normal_user_count_current_month'] = App\Models\Order::where('order_status','new')->where('merchant_id',auth()->guard('merchant')->id())->where('created_at', '>=', Carbon::now()->startOfMonth()->format('Y-m-d H:i:s'))->where('created_at', '<=', Carbon::now()->endOfMonth()->format('Y-m-d H:i:s'))->count();
        $this->data['normal_user_count_sub_1_month']   = App\Models\Order::where('order_status','new')->where('merchant_id',auth()->guard('merchant')->id())->where('created_at', '>=', Carbon::now()->startOfMonth()->subMonth(1)->format('Y-m-d H:i:s'))->where('created_at', '<=', Carbon::now()->endOfMonth()->subMonth(1)->format('Y-m-d H:i:s'))->count();
        $this->data['normal_user_count_sub_2_month']   = App\Models\Order::where('order_status','new')->where('merchant_id',auth()->guard('merchant')->id())->where('created_at', '>=', Carbon::now()->startOfMonth()->subMonth(2)->format('Y-m-d H:i:s'))->where('created_at', '<=', Carbon::now()->endOfMonth()->subMonth(2)->format('Y-m-d H:i:s'))->count();
        $this->data['normal_user_count_sub_3_month']   = App\Models\Order::where('order_status','new')->where('merchant_id',auth()->guard('merchant')->id())->where('created_at', '>=', Carbon::now()->startOfMonth()->subMonth(3)->format('Y-m-d H:i:s'))->where('created_at', '<=', Carbon::now()->endOfMonth()->subMonth(3)->format('Y-m-d H:i:s'))->count();
        $this->data['normal_user_count_sub_4_month']   = App\Models\Order::where('order_status','new')->where('merchant_id',auth()->guard('merchant')->id())->where('created_at', '>=', Carbon::now()->startOfMonth()->subMonth(4)->format('Y-m-d H:i:s'))->where('created_at', '<=', Carbon::now()->endOfMonth()->subMonth(4)->format('Y-m-d H:i:s'))->count();
        $this->data['normal_user_count_sub_5_month']   = App\Models\Order::where('order_status','new')->where('merchant_id',auth()->guard('merchant')->id())->where('created_at', '>=', Carbon::now()->startOfMonth()->subMonth(5)->format('Y-m-d H:i:s'))->where('created_at', '<=', Carbon::now()->endOfMonth()->subMonth(5)->format('Y-m-d H:i:s'))->count();
        $this->data['normal_user_count_sub_6_month']   = App\Models\Order::where('order_status','new')->where('merchant_id',auth()->guard('merchant')->id())->where('created_at', '>=', Carbon::now()->startOfMonth()->subMonth(6)->format('Y-m-d H:i:s'))->where('created_at', '<=', Carbon::now()->endOfMonth()->subMonth(6)->format('Y-m-d H:i:s'))->count();
        $this->data['normal_user_count_sub_7_month']   = App\Models\Order::where('order_status','new')->where('merchant_id',auth()->guard('merchant')->id())->where('created_at', '>=', Carbon::now()->startOfMonth()->subMonth(7)->format('Y-m-d H:i:s'))->where('created_at', '<=', Carbon::now()->endOfMonth()->subMonth(7)->format('Y-m-d H:i:s'))->count();
        $this->data['normal_user_count_sub_8_month']   = App\Models\Order::where('order_status','new')->where('merchant_id',auth()->guard('merchant')->id())->where('created_at', '>=', Carbon::now()->startOfMonth()->subMonth(8)->format('Y-m-d H:i:s'))->where('created_at', '<=', Carbon::now()->endOfMonth()->subMonth(8)->format('Y-m-d H:i:s'))->count();
        $this->data['normal_user_count_sub_9_month']   = App\Models\Order::where('order_status','new')->where('merchant_id',auth()->guard('merchant')->id())->where('created_at', '>=', Carbon::now()->startOfMonth()->subMonth(9)->format('Y-m-d H:i:s'))->where('created_at', '<=', Carbon::now()->endOfMonth()->subMonth(9)->format('Y-m-d H:i:s'))->count();
        $this->data['normal_user_count_sub_10_month']  = App\Models\Order::where('order_status','new')->where('merchant_id',auth()->guard('merchant')->id())->where('created_at', '>=', Carbon::now()->startOfMonth()->subMonth(10)->format('Y-m-d H:i:s'))->where('created_at', '<=', Carbon::now()->endOfMonth()->subMonth(10)->format('Y-m-d H:i:s'))->count();
        $this->data['normal_user_count_sub_11_month']  = App\Models\Order::where('order_status','new')->where('merchant_id',auth()->guard('merchant')->id())->where('created_at', '>=', Carbon::now()->startOfMonth()->subMonth(11)->format('Y-m-d H:i:s'))->where('created_at', '<=', Carbon::now()->endOfMonth()->subMonth(11)->format('Y-m-d H:i:s'))->count();


        $this->data['fitness_expert_count_current_month'] = App\Models\Order::where('order_status','new')->where('merchant_id',auth()->guard('merchant')->id())->where('created_at', '>=', Carbon::now()->startOfMonth()->format('Y-m-d H:i:s'))->where('created_at', '<=', Carbon::now()->endOfMonth()->format('Y-m-d H:i:s'))->count();
        $this->data['fitness_expert_count_sub_1_month']   = App\Models\Order::where('order_status','new')->where('merchant_id',auth()->guard('merchant')->id())->where('created_at', '>=', Carbon::now()->startOfMonth()->subMonth(1)->format('Y-m-d H:i:s'))->where('created_at', '<=', Carbon::now()->endOfMonth()->subMonth(1)->format('Y-m-d H:i:s'))->count();
        $this->data['fitness_expert_count_sub_2_month']   = App\Models\Order::where('order_status','new')->where('merchant_id',auth()->guard('merchant')->id())->where('created_at', '>=', Carbon::now()->startOfMonth()->subMonth(2)->format('Y-m-d H:i:s'))->where('created_at', '<=', Carbon::now()->endOfMonth()->subMonth(2)->format('Y-m-d H:i:s'))->count();
        $this->data['fitness_expert_count_sub_3_month']   = App\Models\Order::where('order_status','new')->where('merchant_id',auth()->guard('merchant')->id())->where('created_at', '>=', Carbon::now()->startOfMonth()->subMonth(3)->format('Y-m-d H:i:s'))->where('created_at', '<=', Carbon::now()->endOfMonth()->subMonth(3)->format('Y-m-d H:i:s'))->count();
        $this->data['fitness_expert_count_sub_4_month']   = App\Models\Order::where('order_status','new')->where('merchant_id',auth()->guard('merchant')->id())->where('created_at', '>=', Carbon::now()->startOfMonth()->subMonth(4)->format('Y-m-d H:i:s'))->where('created_at', '<=', Carbon::now()->endOfMonth()->subMonth(4)->format('Y-m-d H:i:s'))->count();
        $this->data['fitness_expert_count_sub_5_month']   = App\Models\Order::where('order_status','new')->where('merchant_id',auth()->guard('merchant')->id())->where('created_at', '>=', Carbon::now()->startOfMonth()->subMonth(5)->format('Y-m-d H:i:s'))->where('created_at', '<=', Carbon::now()->endOfMonth()->subMonth(5)->format('Y-m-d H:i:s'))->count();
        $this->data['fitness_expert_count_sub_6_month']   = App\Models\Order::where('order_status','new')->where('merchant_id',auth()->guard('merchant')->id())->where('created_at', '>=', Carbon::now()->startOfMonth()->subMonth(6)->format('Y-m-d H:i:s'))->where('created_at', '<=', Carbon::now()->endOfMonth()->subMonth(6)->format('Y-m-d H:i:s'))->count();
        $this->data['fitness_expert_count_sub_7_month']   = App\Models\Order::where('order_status','new')->where('merchant_id',auth()->guard('merchant')->id())->where('created_at', '>=', Carbon::now()->startOfMonth()->subMonth(7)->format('Y-m-d H:i:s'))->where('created_at', '<=', Carbon::now()->endOfMonth()->subMonth(7)->format('Y-m-d H:i:s'))->count();
        $this->data['fitness_expert_count_sub_8_month']   = App\Models\Order::where('order_status','new')->where('merchant_id',auth()->guard('merchant')->id())->where('created_at', '>=', Carbon::now()->startOfMonth()->subMonth(8)->format('Y-m-d H:i:s'))->where('created_at', '<=', Carbon::now()->endOfMonth()->subMonth(8)->format('Y-m-d H:i:s'))->count();
        $this->data['fitness_expert_count_sub_9_month']   = App\Models\Order::where('order_status','new')->where('merchant_id',auth()->guard('merchant')->id())->where('created_at', '>=', Carbon::now()->startOfMonth()->subMonth(9)->format('Y-m-d H:i:s'))->where('created_at', '<=', Carbon::now()->endOfMonth()->subMonth(9)->format('Y-m-d H:i:s'))->count();
        $this->data['fitness_expert_count_sub_10_month']  = App\Models\Order::where('order_status','new')->where('merchant_id',auth()->guard('merchant')->id())->where('created_at', '>=', Carbon::now()->startOfMonth()->subMonth(10)->format('Y-m-d H:i:s'))->where('created_at', '<=', Carbon::now()->endOfMonth()->subMonth(10)->format('Y-m-d H:i:s'))->count();
        $this->data['fitness_expert_count_sub_11_month']  = App\Models\Order::where('order_status','new')->where('merchant_id',auth()->guard('merchant')->id())->where('created_at', '>=', Carbon::now()->startOfMonth()->subMonth(11)->format('Y-m-d H:i:s'))->where('created_at', '<=', Carbon::now()->endOfMonth()->subMonth(11)->format('Y-m-d H:i:s'))->count();


        $this->data['client_count_current_month'] = App\Models\Order::where('order_status','new')->where('merchant_id',auth()->guard('merchant')->id())->where('created_at', '>=', Carbon::now()->startOfMonth()->format('Y-m-d H:i:s'))->where('created_at', '<=', Carbon::now()->endOfMonth()->format('Y-m-d H:i:s'))->count();
        $this->data['client_count_sub_1_month']   = App\Models\Order::where('order_status','new')->where('merchant_id',auth()->guard('merchant')->id())->where('created_at', '>=', Carbon::now()->startOfMonth()->subMonth(1)->format('Y-m-d H:i:s'))->where('created_at', '<=', Carbon::now()->endOfMonth()->subMonth(1)->format('Y-m-d H:i:s'))->count();
        $this->data['client_count_sub_2_month']   = App\Models\Order::where('order_status','new')->where('merchant_id',auth()->guard('merchant')->id())->where('created_at', '>=', Carbon::now()->startOfMonth()->subMonth(2)->format('Y-m-d H:i:s'))->where('created_at', '<=', Carbon::now()->endOfMonth()->subMonth(2)->format('Y-m-d H:i:s'))->count();
        $this->data['client_count_sub_3_month']   = App\Models\Order::where('order_status','new')->where('merchant_id',auth()->guard('merchant')->id())->where('created_at', '>=', Carbon::now()->startOfMonth()->subMonth(3)->format('Y-m-d H:i:s'))->where('created_at', '<=', Carbon::now()->endOfMonth()->subMonth(3)->format('Y-m-d H:i:s'))->count();
        $this->data['client_count_sub_4_month']   = App\Models\Order::where('order_status','new')->where('merchant_id',auth()->guard('merchant')->id())->where('created_at', '>=', Carbon::now()->startOfMonth()->subMonth(4)->format('Y-m-d H:i:s'))->where('created_at', '<=', Carbon::now()->endOfMonth()->subMonth(4)->format('Y-m-d H:i:s'))->count();
        $this->data['client_count_sub_5_month']   = App\Models\Order::where('order_status','new')->where('merchant_id',auth()->guard('merchant')->id())->where('created_at', '>=', Carbon::now()->startOfMonth()->subMonth(5)->format('Y-m-d H:i:s'))->where('created_at', '<=', Carbon::now()->endOfMonth()->subMonth(5)->format('Y-m-d H:i:s'))->count();
        $this->data['client_count_sub_6_month']   = App\Models\Order::where('order_status','new')->where('merchant_id',auth()->guard('merchant')->id())->where('created_at', '>=', Carbon::now()->startOfMonth()->subMonth(6)->format('Y-m-d H:i:s'))->where('created_at', '<=', Carbon::now()->endOfMonth()->subMonth(6)->format('Y-m-d H:i:s'))->count();
        $this->data['client_count_sub_7_month']   = App\Models\Order::where('order_status','new')->where('merchant_id',auth()->guard('merchant')->id())->where('created_at', '>=', Carbon::now()->startOfMonth()->subMonth(7)->format('Y-m-d H:i:s'))->where('created_at', '<=', Carbon::now()->endOfMonth()->subMonth(7)->format('Y-m-d H:i:s'))->count();
        $this->data['client_count_sub_8_month']   = App\Models\Order::where('order_status','new')->where('merchant_id',auth()->guard('merchant')->id())->where('created_at', '>=', Carbon::now()->startOfMonth()->subMonth(8)->format('Y-m-d H:i:s'))->where('created_at', '<=', Carbon::now()->endOfMonth()->subMonth(8)->format('Y-m-d H:i:s'))->count();
        $this->data['client_count_sub_9_month']   = App\Models\Order::where('order_status','new')->where('merchant_id',auth()->guard('merchant')->id())->where('created_at', '>=', Carbon::now()->startOfMonth()->subMonth(9)->format('Y-m-d H:i:s'))->where('created_at', '<=', Carbon::now()->endOfMonth()->subMonth(9)->format('Y-m-d H:i:s'))->count();
        $this->data['client_count_sub_10_month']  = App\Models\Order::where('order_status','new')->where('merchant_id',auth()->guard('merchant')->id())->where('created_at', '>=', Carbon::now()->startOfMonth()->subMonth(10)->format('Y-m-d H:i:s'))->where('created_at', '<=', Carbon::now()->endOfMonth()->subMonth(10)->format('Y-m-d H:i:s'))->count();
        $this->data['client_count_sub_11_month']  = App\Models\Order::where('order_status','new')->where('merchant_id',auth()->guard('merchant')->id())->where('created_at', '>=', Carbon::now()->startOfMonth()->subMonth(11)->format('Y-m-d H:i:s'))->where('created_at', '<=', Carbon::now()->endOfMonth()->subMonth(11)->format('Y-m-d H:i:s'))->count();


        $this->data['provider_count_current_month'] = App\Models\Order::where('order_status','delivered')->where('merchant_id',auth()->guard('merchant')->id())->where('created_at', '>=', Carbon::now()->startOfMonth()->format('Y-m-d H:i:s'))->where('created_at', '<=', Carbon::now()->endOfMonth()->format('Y-m-d H:i:s'))->count();
        $this->data['provider_count_sub_1_month']   = App\Models\Order::where('order_status','delivered')->where('merchant_id',auth()->guard('merchant')->id())->where('created_at', '>=', Carbon::now()->startOfMonth()->subMonth(1)->format('Y-m-d H:i:s'))->where('created_at', '<=', Carbon::now()->endOfMonth()->subMonth(1)->format('Y-m-d H:i:s'))->count();
        $this->data['provider_count_sub_2_month']   = App\Models\Order::where('order_status','delivered')->where('merchant_id',auth()->guard('merchant')->id())->where('created_at', '>=', Carbon::now()->startOfMonth()->subMonth(2)->format('Y-m-d H:i:s'))->where('created_at', '<=', Carbon::now()->endOfMonth()->subMonth(2)->format('Y-m-d H:i:s'))->count();
        $this->data['provider_count_sub_3_month']   = App\Models\Order::where('order_status','delivered')->where('merchant_id',auth()->guard('merchant')->id())->where('created_at', '>=', Carbon::now()->startOfMonth()->subMonth(3)->format('Y-m-d H:i:s'))->where('created_at', '<=', Carbon::now()->endOfMonth()->subMonth(3)->format('Y-m-d H:i:s'))->count();
        $this->data['provider_count_sub_4_month']   = App\Models\Order::where('order_status','delivered')->where('merchant_id',auth()->guard('merchant')->id())->where('created_at', '>=', Carbon::now()->startOfMonth()->subMonth(4)->format('Y-m-d H:i:s'))->where('created_at', '<=', Carbon::now()->endOfMonth()->subMonth(4)->format('Y-m-d H:i:s'))->count();
        $this->data['provider_count_sub_5_month']   = App\Models\Order::where('order_status','delivered')->where('merchant_id',auth()->guard('merchant')->id())->where('created_at', '>=', Carbon::now()->startOfMonth()->subMonth(5)->format('Y-m-d H:i:s'))->where('created_at', '<=', Carbon::now()->endOfMonth()->subMonth(5)->format('Y-m-d H:i:s'))->count();
        $this->data['provider_count_sub_6_month']   = App\Models\Order::where('order_status','delivered')->where('merchant_id',auth()->guard('merchant')->id())->where('created_at', '>=', Carbon::now()->startOfMonth()->subMonth(6)->format('Y-m-d H:i:s'))->where('created_at', '<=', Carbon::now()->endOfMonth()->subMonth(6)->format('Y-m-d H:i:s'))->count();
        $this->data['provider_count_sub_7_month']   = App\Models\Order::where('order_status','delivered')->where('merchant_id',auth()->guard('merchant')->id())->where('created_at', '>=', Carbon::now()->startOfMonth()->subMonth(7)->format('Y-m-d H:i:s'))->where('created_at', '<=', Carbon::now()->endOfMonth()->subMonth(7)->format('Y-m-d H:i:s'))->count();
        $this->data['provider_count_sub_8_month']   = App\Models\Order::where('order_status','delivered')->where('merchant_id',auth()->guard('merchant')->id())->where('created_at', '>=', Carbon::now()->startOfMonth()->subMonth(8)->format('Y-m-d H:i:s'))->where('created_at', '<=', Carbon::now()->endOfMonth()->subMonth(8)->format('Y-m-d H:i:s'))->count();
        $this->data['provider_count_sub_9_month']   = App\Models\Order::where('order_status','delivered')->where('merchant_id',auth()->guard('merchant')->id())->where('created_at', '>=', Carbon::now()->startOfMonth()->subMonth(9)->format('Y-m-d H:i:s'))->where('created_at', '<=', Carbon::now()->endOfMonth()->subMonth(9)->format('Y-m-d H:i:s'))->count();
        $this->data['provider_count_sub_10_month']  = App\Models\Order::where('order_status','delivered')->where('merchant_id',auth()->guard('merchant')->id())->where('created_at', '>=', Carbon::now()->startOfMonth()->subMonth(10)->format('Y-m-d H:i:s'))->where('created_at', '<=', Carbon::now()->endOfMonth()->subMonth(10)->format('Y-m-d H:i:s'))->count();
        $this->data['provider_count_sub_11_month']  = App\Models\Order::where('order_status','delivered')->where('merchant_id',auth()->guard('merchant')->id())->where('created_at', '>=', Carbon::now()->startOfMonth()->subMonth(11)->format('Y-m-d H:i:s'))->where('created_at', '<=', Carbon::now()->endOfMonth()->subMonth(11)->format('Y-m-d H:i:s'))->count();

        return view('merchants.index',$this->data);	}

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
