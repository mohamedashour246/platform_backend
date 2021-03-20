<?php

namespace App\Http\Controllers\Merchant;

use App\Http\Controllers\Controller;
use App\MerchantModels\OrderService;
use App\MerchantModels\ProductOrder;
use App\Models\Driver;
use App\Models\Merchant;
use App\User;
use Illuminate\Http\Request;

class OrderServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orderservices = OrderService::all();
        return view('merchantDashbaord.orderservices.index',compact('orderservices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //dd($exproducts);
        $orderservices = OrderService::all();
        $merchants = Merchant::all();
        $users = User::all();
        $drivers = Driver::all();

        return view('merchantDashbaord.orderservices.create',compact('orderservices','merchants','users','drivers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = request()->all();
        
        $this->validate(request(),[

            'receiver' => 'required',
            'time_receiver' => 'required',
            'sender' => 'required',
            'time_sender' => 'required',
            'price' => 'required',
            'name_ar' => 'required',
            'name_en' => 'required',
            'count'  => 'required',
            'item_ar'  => 'required',     
            'item_en'  => 'required',     

        ]);

        $orderservice = new OrderService($input);
        $orderservice->save();
        
        $input['count'] = request('count');
        $input['name_en'] = request('item_en');
        $input['name_ar'] = request('item_ar');
        $input['orderservice_id'] = $orderservice->id;

        $productorder = new ProductOrder($input);
        $productorder->save();

        return redirect(route('orderservices.index'))->with('success_msg' , trans('merchantDashbaord.added_successfully'));    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $orderservice = OrderService::find($id);
        $merchants = Merchant::all();
        $users = User::all();
        $drivers = Driver::all();
        $productorder = ProductOrder::find($id);
        //dd($order);
        if (empty($orderservice)) {

            return redirect(route('orderservices.index'))->with('error_msg' , trans('merchantDashbaord.not_found'));
        }

        return view('merchantDashbaord.orderservices.edit',compact('orderservice','merchants','users','drivers','productorder'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $orderservice = OrderService::find($id);
        $productorder = ProductOrder::find($id);

        if (empty($orderservice)) {


            return redirect(route('orderservices.index'))->with('error_msg' , trans('merchantDashbaord.not_found'));
        }

        if (empty($productorder)) {


            return redirect(route('orderservices.index'))->with('error_msg' , trans('merchantDashbaord.not_found'));
        }

        $input= $request->all();

        // $input['type'] = request('type');

        $input['count'] = request('count');
        $input['name_en'] = request('item_en');
        $input['name_ar'] = request('item_ar');
        $input['orderservice_id'] = $orderservice->id;

        $orderservice->fill($input);
        $orderservice->update();

        $productorder->fill($input);
        $productorder->update();

        return redirect(route('orderservices.index'))->with('success_msg' , trans('merchantDashbaord.updated_successfully'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $orderservice = OrderService::find($id);

        if (empty($orderservice)) {

            return redirect(route('orderservices.index'))->with('error_msg' , trans('merchantDashbaord.not_found'));
        }

        $orderservice->delete();

        return redirect(route('orderservices.index'))->with('success_msg' , trans('merchantDashbaord.deleted_successfully'));
    }
}
