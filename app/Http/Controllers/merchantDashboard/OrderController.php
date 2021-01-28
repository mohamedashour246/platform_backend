<?php

namespace App\Http\Controllers\merchantDashboard;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Auth;

class OrderController extends Controller
{



    public function index(){
        $orders = Order::where('merchant_id' , auth()->guard('merchant')->id())->get();
        return view('merchantDashbaord.orders.index' , compact('orders'));
    }
}
