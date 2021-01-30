<?php

namespace App\Http\Controllers\merchantDashboard;

use App\Http\Controllers\Controller;
use App\Models\Extra;
use App\Models\Order;
use Illuminate\Http\Request;
use Auth;

class OrderController extends Controller
{
    public function index(){
        $orders = Order::where('merchant_id' , auth()->guard('merchant')->id())->get();
        return view('merchantDashbaord.orders.index' , compact('orders'));
    }

    public function show($id){
        $name = 'name_'.app()->getLocale();
        $order = Order::where('id' , $id)->first();
        $extras = Extra::where('order_id' , $id)->get();
        if($order->merchant_id!=auth()->guard('merchant')->id()){
            return redirect(route('orders.index'))->with('error_msg' , trans('merchantDashbaord.not_permitted'));

        }
        return view('merchantDashbaord.orders.show' , compact('order' , 'name' , 'extras'));
    }
}
