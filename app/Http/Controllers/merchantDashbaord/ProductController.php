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
        $products=Product::all();
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
        $input = $request->all();

        /** @var Product $product */
        if ($request->image) {
            $this-> saveImage('uploads/merchantDashbaord/' ,$request->image,$width=300,$height=300);
            $input['image'] = $request->image->hashName();
        }
        $product = Product::create($input);

        Flash::success('Product saved successfully.');

        return redirect(route('products.index'));
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

        if (empty($product)) {
            Flash::error('Product not found');

            return redirect(route('products.index'));
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

        if (empty($product)) {
            Flash::error('Product not found');

            return redirect(route('products.index'));
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

        if (empty($product)) {
            Flash::error('Product not found');

            return redirect(route('products.index'));
        }
        $input = $request->all();

        /** @var Product $product */
        if ($request->image) {
            $this-> saveImage('uploads/merchantDashbaord/' ,$request->image,$width=300,$height=300);
            $input['image'] = $request->image->hashName();
        }
        $product->fill($input);
        $product->save();

        Flash::success('Product updated successfully.');

        return redirect(route('products.index'));
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

        if (empty($product)) {
            Flash::error('Product not found');

            return redirect(route('products.index'));
        }

        $product->delete();

        Flash::success('Product deleted successfully.');

        return redirect(route('products.index'));
    }
}
