<?php

namespace App\Http\Controllers\Merchant;

use App\DiscountSliders;
use App\Http\Controllers\Controller;
use App\Http\Requests\merchantDashbaord\discountsliders\CreateDiscountsliderRequest;
use App\Http\Requests\merchantDashbaord\discountsliders\UpdateDiscountsliderRequest;
use Illuminate\Http\Request;

class DiscountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dissliders = DiscountSliders::all();
        return view('merchantDashbaord.discountsliders.index',compact('dissliders'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dissliders = DiscountSliders::all();
        return view('merchantDashbaord.discountsliders.create',compact('dissliders'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $input= request()->all();
        
        $this->validate(request(),[
              
            'name_ar' => 'required',
            'name_en' => 'required',
            'image' => 'required|image',
            'expire' => 'required',
            'barcode' => 'required',
            'count_use' => 'required',
            'value_discount' => 'required',
            'min_cost' => 'required',

        ]);

        if(request('image')){
          $file = request()->file('image');
          $path = "uploads/admins";
          $random = rand(1111,9999);
          $name = rand(1111111,9999999);
          $fileName = $random.'_'.$name.'.'.$file->getClientOriginalExtension();
          $file->move($path, $fileName);
          $input['image'] = $fileName;
      }

        $disslider = new DiscountSliders($input);
        $disslider->save();

        return redirect(route('dissliders.index'))->with('success_msg' , trans('merchantDashbaord.added_successfully'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $disslider = DiscountSliders::find($id);

        if (empty($disslider)) {

            return redirect(route('dissliders.index'))->with('error_msg' , trans('merchantDashbaord.not_foundd'));
        }

        return view('merchantDashbaord.discountsliders.show')->with('disslider', $disslider);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $disslider = DiscountSliders::find($id);

        if (empty($disslider)) {

            return redirect(route('dissliders.index'))->with('error_msg' , trans('merchantDashbaord.not_found'));
        }

        return view('merchantDashbaord.discountsliders.edit',compact('disslider'));
    }
    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDiscountsliderRequest $request, $id)
    {
        $disslider = DiscountSliders::find($id);

        if (empty($disslider)) {


            return redirect(route('dissliders.index'))->with('error_msg' , trans('merchantDashbaord.not_found'));
        }
        
         $input = $request->all();
        // if($request->current_status == '1')
        // {
        //     $input['current_status'] = 1;
        // } 
        // else {
        //     $input['current_status'] = 0;
        // }

        // if($request->status_slider == '1')
        // {
        //     $input['status_slider'] = 1;
        // } 
        // else {
        //     $input['status_slider'] = 0;
        // }

        // if($request->free_shipping == '1')
        // {
        //     $input['free_shipping'] = 1;
        // } 
        // else {
        //     $input['free_shipping'] = 0;
        // }

        if (request('free_shipping')=='on'){
            $input['free_shipping'] =1;
        }else{
            $input['free_shipping'] =0;

        }

        if (request('status_slider')=='on'){
            $input['status_slider'] =1;
        }else{
            $input['status_slider'] =0;

        }

        if (request('current_status')=='on'){
            $input['current_status'] =1;
        }else{
            $input['current_status'] =0;

        }

        if(request('image')){
            $file = request()->file('image');
            $path = "uploads/admins";
            $random = rand(1111,9999);
            $name = rand(1111111,9999999);
            $fileName = $random.'_'.$name.'.'.$file->getClientOriginalExtension();
            $file->move($path, $fileName);
            $input['image'] = $fileName;
        }

        // $input['name_ar'] = $request['name_ar'];
        // $input['name_en'] = $request['name_en'];
        // $input['expire'] = $request['expire'];
        // $input['barcode'] = $request['barcode'];
        // $input['count_use'] =   $request['count_use'];
        // $input['repeatation'] =  $request['repeatation'];
        // $input['value_discount'] =  $request['value_discount'];
        // $input['discount_type'] = $request['discount_type'];
        // $input['min_cost'] = $request['min_cost'];

        $disslider->fill($input);
        $disslider->save();

        return redirect(route('dissliders.index'))->with('success_msg' , trans('merchantDashbaord.updated_successfully'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $disslider = DiscountSliders::find($id);
        
        if (empty($disslider)) {

            return redirect(route('dissliders.index'))->with('error_msg' , trans('merchantDashbaord.not_found'));
        }

        $disslider->delete();


        return redirect(route('dissliders.index'))->with('success_msg' , trans('merchantDashbaord.deleted_successfully'));
    }
}
