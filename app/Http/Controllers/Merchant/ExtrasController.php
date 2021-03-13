<?php

namespace App\Http\Controllers\Merchant;

use App\Http\Controllers\Controller;
use App\Http\Requests\merchantDashbaord\addition\CreateAdditionRequest;
use App\Http\Requests\merchantDashbaord\addition\UpdateAdditionRequest;
use Illuminate\Http\Request;
use App\MerchantModels\AddProduct;


class ExtrasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $exproducts=AddProduct::all();
      return view('merchantDashbaord.extras.index',compact('exproducts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $exproducts=AddProduct::all();
        return view('merchantDashbaord.extras.create',compact('exproducts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateAdditionRequest $request)
    {
        $input= $request->all();
        $input['name_ar'] = $request['name_ar'];
        $input['name_en'] =   $request['name_en'];
        $input['cost'] =  $request['cost'];
        $input['count'] = $request['count'];
        $input['status'] =  $request['status'];

        $exproduct = AddProduct::create($input);

        return redirect(route('exproducts.index'))->with('success_msg' , trans('merchantDashbaord.added_successfully'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $exproduct = AddProduct::find($id);
        //        dd($product);
        
                if (empty($exproduct)) {
        
                    return redirect(route('exproducts.index'))->with('error_msg' , trans('merchantDashbaord.not_foundd'));
                }
        
                return view('merchantDashbaord.extras.show')->with('exproduct', $exproduct);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $exproduct = AddProduct::find($id);
       
        

        if (empty($exproduct)) {

            return redirect(route('exproducts.index'))->with('error_msg' , trans('merchantDashbaord.not_found'));
        }

        return view('merchantDashbaord.extras.edit',compact('exproduct'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAdditionRequest $request, $id)
    {
        $exproduct = AddProduct::find($id);

        if (empty($exproduct)) {


            return redirect(route('exproducts.index'))->with('error_msg' , trans('merchantDashbaord.not_found'));
        }

         $input= $request->all();
        if ($request->status=='on'){
            $input['status'] =1;
        }else{
            $input['status'] =0;

        }

        // $input['status'] = $request['status'];   
        $input['name_ar'] = $request['name_ar'];
        $input['name_en'] = $request['name_en'];
        $input['cost'] = $request['cost'];
        $input['count'] = $request['count'];

        $exproduct->fill($input);
        $exproduct->save();

        

        return redirect(route('exproducts.index'))->with('success_msg' , trans('merchantDashbaord.updated_successfully'));
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $exproduct = AddProduct::find($id);

        
        if (empty($exproduct)) {

            return redirect(route('exproducts.index'))->with('error_msg' , trans('merchantDashbaord.not_found'));
        }

        $exproduct->delete();


        return redirect(route('exproducts.index'))->with('success_msg' , trans('merchantDashbaord.deleted_successfully'));
    }
}
