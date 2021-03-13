<?php

namespace App\Http\Controllers\Merchant;

use App\Http\Controllers\Controller;
use App\Http\Requests\merchantDashbaord\order\CreateOrderRequest;
use App\Http\Requests\merchantDashbaord\order\UpdateOrderRequest;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::all();
        return view('merchantDashbaord.orders.index',compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $orders = Order::all();
        return view('merchantDashbaord.orders.create',compact('orders'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateOrderRequest $request)
    {
        $input= $request->all();
        $input['client_id'] = auth()->guard('merchant')->id();
        $input['merchant_id'] = auth()->guard('merchant')->id();
        $input['city_id'] = auth()->guard('merchant')->id();
        $input['barcode'] = $request['barcode'];
        $input['time_to_arrive'] =   $request['time_to_arrive'];
        $input['payment_type'] =  $request['payment_type'];
        $input['status'] = $request['status'];
        $input['total'] =  $request['total'];

        $order = Order::create($input);

        return redirect(route('orders.index'))->with('success_msg' , trans('merchantDashbaord.added_successfully'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = Order::find($id);

        if (empty($order)) {

            return redirect(route('orders.index'))->with('error_msg' , trans('merchantDashbaord.not_foundd'));
        }

        return view('merchantDashbaord.orders.show')->with('order', $order);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $order = Order::find($id);
        //dd($order);
        if (empty($order)) {

            return redirect(route('orders.index'))->with('error_msg' , trans('merchantDashbaord.not_found'));
        }

        return view('merchantDashbaord.orders.edit',compact('order'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOrderRequest $request, $id)
    {
        $order = Order::find($id);

        if (empty($order)) {


            return redirect(route('orders.index'))->with('error_msg' , trans('merchantDashbaord.not_found'));
        }

        $input= $request->all();
        if ($request->status=='on'){
            $input['status'] =1;
        }else if($request->status == 'off'){
            $input['status'] =0;

        }

        $input['barcode'] = $request['barcode'];
        $input['time_to_arrive'] =   $request['time_to_arrive'];
        $input['payment_type'] =  $request['payment_type'];
        // $input['status'] = $request['status'];
        $input['total'] =  $request['total'];

        $order->fill($input);
        $order->save();

        return redirect(route('orders.index'))->with('success_msg' , trans('merchantDashbaord.updated_successfully'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $order = Order::find($id);

        if (empty($order)) {

            return redirect(route('orders.index'))->with('error_msg' , trans('merchantDashbaord.not_found'));
        }

        $order->delete();


        return redirect(route('orders.index'))->with('success_msg' , trans('merchantDashbaord.deleted_successfully'));

    }
}
