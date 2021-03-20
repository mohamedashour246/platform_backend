<?php

namespace App\Http\Controllers\merchantDashbaord;

use App\DataTables\ProductDataTable;
use App\Http\Requests;
use App\Http\Requests\merchantDashbaord\product\CreateProductRequest;
use App\Http\Requests\merchantDashbaord\product\UpdateProductRequest;
use App\MerchantModels\Product;
use App\MerchantModels\SubCategory;
use App\MerchantModels\AddProduct;

use Flash;
use App\Http\Controllers\AppBaseController;
use Response;
use App\ImageTrait;
use App\Models\Addition;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Validator;

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
        $exproducts=AddProduct::all();
        //dd($exproducts);
        
        return view('merchantDashbaord.products.create',compact('subCategories','exproducts'));
    }

    /**
     * Store a newly created Product in storage.
     *
     * @param CreateProductRequest $request
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $input= request()->all();

        $this->validate(request(),[

            'name_ar' => 'required',
            'name_en' => 'required',
            'image' => 'required',
            'description_ar' => 'required',
            'description_en' => 'required',
            'status' => 'required',
            'type' => 'required',
            'deliver_services' => 'required',
            'unit_type' => 'required',
            'order'  => 'required',
            'price' => 'required',
            'discount' => 'required',
            'limit' => 'required',
            'barcode' => 'required',
            'sub_category_id' => 'required',
            'title_ar' => 'required',
            'title_en' => 'required',
            'mandatory' => 'required',
            'status_add' => 'required',
           
        ]);

        // if($validator->fails())
        // {
        //     return redirect()->back()->with('errors',$validator->errors());
        // }
        
        $input['merchant_id'] = auth()->guard('merchant')->id();
        $input['sub_category_id '] = auth()->guard('merchant')->id();
        $input['code'] =   $this->generateRandomCode();
        $input['status'] =   1;


        /** @var Product $product */
        if (request('image')) {
            $this-> saveImage('uploads/merchantDashbaord/' ,request('image'),$width=300,$height=300);
            $input['image'] = request('image')->hashName();
        }

       

        $product = new Product($input);
        $product->save();
        //dd($product->id);

       
       
        $input['mandatory'] = request('status_add');
        $input['extras'] = json_encode(request('extras'));
        $input['product_id'] = $product->id;

        $addition = new Addition($input);
        $addition->save();

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
        $exproducts = AddProduct::all();
        $addition = Addition::find($id);
        if($product->merchant_id!=auth()->guard('merchant')->id()){
            return redirect(route('products.index'))->with('error_msg' , trans('merchantDashbaord.not_permitted'));

        }

        if (empty($product)) {

            return redirect(route('products.index'))->with('error_msg' , trans('merchantDashbaord.not_found'));
        }

        return view('merchantDashbaord.products.edit',compact('product','subCategories','exproducts','addition'));
    }

    /**
     * Update the specified Product in storage.
     *
     * @param  int              $id
     * @param UpdateProductRequest $request
     *
     * @return Response
     */
    public function update($id, Request $request)
    {
        /** @var Product $product */
        $product = Product::find($id);
        $addition = Addition::find($id);
        if($product->merchant_id!=auth()->guard('merchant')->id()){
            return redirect(route('products.index'))->with('error_msg' , trans('merchantDashbaord.not_permitted'));

        }

        if (empty($product)) {


            return redirect(route('products.index'))->with('error_msg' , trans('merchantDashbaord.not_found'));
        }
        $input= request()->all();
        if (request('status')=='on'){
            $input['status'] =1;
        }else{
            $input['status'] =0;

        }
        $input['merchant_id'] = auth()->guard('merchant')->id();

        /** @var Product $product */
        if (request('image')) {
            $this-> saveImage('uploads/merchantDashbaord/' ,request('image'),$width=300,$height=300);
            $input['image'] = request('image')->hashName();
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
