<?php

namespace App\Http\Controllers\merchantDashbaord;

use App\DataTables\ProductDataTable;
use App\Http\Requests;
use App\Http\Requests\merchantDashbaord\product\CreateProductRequest;
use App\Http\Requests\merchantDashbaord\product\UpdateProductRequest;
use App\MerchantModels\Product;
use App\MerchantModels\SubCategory;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;
use App\ImageTrait;


class ProductController extends AppBaseController
{
    use ImageTrait;
    /**
     * Display a listing of the Product.
     *
     * @param ProductDataTable $productDataTable
     * @return Response
     */
    public function index(ProductDataTable $productDataTable)
    {

        $products=Product::where('merchant_id',auth()->guard('merchant')->id())->get();
        return view('merchantDashbaord.products.index',compact('products'));
    }

    /**
     * Show the form for creating a new Product.
     *
     * @return Response
     */
    public function create()
    {
        $subCategories=SubCategory::all();

        return view('merchantDashbaord.products.create',compact('subCategories'));
    }

    /**
     * Store a newly created Product in storage.
     *
     * @param CreateProductRequest $request
     *
     * @return Response
     */
    public function store(CreateProductRequest $request)
    {
        $input= $request->all();
        $input['merchant_id'] = auth()->guard('merchant')->id();
        $input['code'] =   $this->generateRandomCode();
        $input['status'] =   1;


        /** @var Product $product */
        if ($request->image) {
            $this-> saveImage('uploads/merchantDashbaord/' ,$request->image,$width=300,$height=300);
            $input['image'] = $request->image->hashName();
        }
        $product = Product::create($input);



        return redirect(route('products.index'))->with('success_msg' , trans('merchantDashbaord.added_successfully'));
    }

    /**
     * Display the specified Product.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Product $product */
        $product = Product::find($id);
//        dd($product);
        if($product->merchant_id!=auth()->guard('merchant')->id()){
            return redirect(route('products.index'))->with('error_msg' , trans('merchantDashbaord.not_permitted'));

        }

        if (empty($product)) {

            return redirect(route('products.index'))->with('error_msg' , trans('merchantDashbaord.not_foundd'));
        }

        return view('merchantDashbaord.products.show')->with('product', $product);
    }

    /**
     * Show the form for editing the specified Product.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var Product $product */
        $product = Product::find($id);
        $subCategories=SubCategory::all();
        if($product->merchant_id!=auth()->guard('merchant')->id()){
            return redirect(route('products.index'))->with('error_msg' , trans('merchantDashbaord.not_permitted'));

        }

        if (empty($product)) {

            return redirect(route('products.index'))->with('error_msg' , trans('merchantDashbaord.not_found'));
        }

        return view('merchantDashbaord.products.edit')->with(['product'=>$product,'subCategories'=>$subCategories]);
    }

    /**
     * Update the specified Product in storage.
     *
     * @param  int              $id
     * @param UpdateProductRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateProductRequest $request)
    {
        /** @var Product $product */
        $product = Product::find($id);
        if($product->merchant_id!=auth()->guard('merchant')->id()){
            return redirect(route('products.index'))->with('error_msg' , trans('merchantDashbaord.not_permitted'));

        }

        if (empty($product)) {


            return redirect(route('products.index'))->with('error_msg' , trans('merchantDashbaord.not_found'));
        }
        $input= $request->all();
        if ($request->status=='on'){
            $input['status'] =1;
        }else{
            $input['status'] =0;

        }
        $input['merchant_id'] = auth()->guard('merchant')->id();

        /** @var Product $product */
        if ($request->image) {
            $this-> saveImage('uploads/merchantDashbaord/' ,$request->image,$width=300,$height=300);
            $input['image'] = $request->image->hashName();
        }
        $product->fill($input);
        $product->save();


        return redirect(route('products.index'))->with('success_msg' , trans('merchantDashbaord.updated_successfully'));
    }

    /**
     * Remove the specified Product from storage.
     *
     * @param  int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Product $product */
        $product = Product::find($id);

        if($product->merchant_id!=auth()->guard('merchant')->id()){
            return redirect(route('products.index'))->with('error_msg' , trans('merchantDashbaord.not_permitted'));

        }
        if (empty($product)) {

            return redirect(route('products.index'))->with('error_msg' , trans('merchantDashbaord.not_found'));
        }

        $product->delete();


        return redirect(route('products.index'))->with('success_msg' , trans('merchantDashbaord.deleted_successfully'));
    }
}
