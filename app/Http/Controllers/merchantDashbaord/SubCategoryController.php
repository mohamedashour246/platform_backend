<?php

namespace App\Http\Controllers\merchantDashbaord;

use App\DataTables\SubCategoryDataTable;
use App\Http\Requests;
use App\Http\Requests\merchantDashbaord\subCategory\CreateSubCategoryRequest;
use App\Http\Requests\merchantDashbaord\subCategory\UpdateSubCategoryRequest;
use App\ImageTrait;
use App\MerchantModels\SubCategory;
use App\Models\Merchant;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class SubCategoryController extends AppBaseController
{
    use ImageTrait;
    /**
     * Display a listing of the SubCategory.
     *
     * @param SubCategoryDataTable $subCategoryDataTable
     * @return Response
     */
    public function index(SubCategoryDataTable $subCategoryDataTable)
    {
        $subCategories = SubCategory::where('merchant_id', auth()->guard('merchant')->id())->get();
        return view('merchantDashbaord.sub_categories.index', compact('subCategories'));
    }

    /**
     * Show the form for creating a new SubCategory.
     *
     * @return Response
     */
    public function create()
    {
        $merchants = Merchant::all();
        return view('merchantDashbaord.sub_categories.create', compact('merchants'));
    }

    /**
     * Store a newly created SubCategory in storage.
     *
     * @param CreateSubCategoryRequest $request
     *
     * @return Response
     */
    public function store(CreateSubCategoryRequest $request)
    {
        $input = $request->all();
        $input['merchant_id'] = auth()->guard('merchant')->id();
        $input['code'] =   $this->generateRandomCode();

            $input['status'] =1;

        /** @var SubCategory $subCategory */
        $subCategory = SubCategory::create($input);


        return redirect(route('subCategories.index'))->with('success_msg', trans('merchantDashbaord.added_successfully'));
    }

    /**
     * Display the specified SubCategory.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var SubCategory $subCategory */
        $subCategory = SubCategory::find($id);
        if($subCategory->merchant_id!=auth()->guard('merchant')->id()){
            return redirect(route('subCategories.index'))->with('error_msg' , trans('merchantDashbaord.not_permitted'));

        }
        if (empty($subCategory)) {

            return redirect(route('subCategories.index'))->with('error_msg', trans('merchantDashbaord.not_found'));
        }

        return view('merchantDashbaord.sub_categories.show')->with('subCategory', $subCategory);
    }

    /**
     * Show the form for editing the specified SubCategory.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var SubCategory $subCategory */
        $merchants = Merchant::all();

        $subCategory = SubCategory::find($id);
        if($subCategory->merchant_id!=auth()->guard('merchant')->id()){
            return redirect(route('subCategories.index'))->with('error_msg' , trans('merchantDashbaord.not_permitted'));

        }
        if (empty($subCategory)) {

            return redirect(route('subCategories.index'))->with('error_msg', trans('merchantDashbaord.not_found'));
        }

        return view('merchantDashbaord.sub_categories.edit')->with(['subCategory' => $subCategory, 'merchants' => $merchants]);
    }

    /**
     * Update the specified SubCategory in storage.
     *
     * @param int $id
     * @param UpdateSubCategoryRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSubCategoryRequest $request)
    {
        /** @var SubCategory $subCategory */
        $subCategory = SubCategory::find($id);
        if($subCategory->merchant_id!=auth()->guard('merchant')->id()){
            return redirect(route('subCategories.index'))->with('error_msg' , trans('merchantDashbaord.not_permitted'));

        }
        if (empty($subCategory)) {

            return redirect(route('subCategories.index'))->with('error_msg', trans('merchantDashbaord.not_found'));
        }
        $input = $request->all();
        $input['merchant_id'] = auth()->guard('merchant')->id();
        if ($request->status=='on'){
            $input['status'] =1;
        }else{
            $input['status'] =0;

        }

        $subCategory->fill($input);
        $subCategory->save();


        return redirect(route('subCategories.index'))->with('success_msg', trans('merchantDashbaord.updated_successfully'));
    }

    /**
     * Remove the specified SubCategory from storage.
     *
     * @param int $id
     *
     * @return Response
     * @throws \Exception
     *
     */
    public function destroy($id)
    {
        /** @var SubCategory $subCategory */
        $subCategory = SubCategory::find($id);
        if($subCategory->merchant_id!=auth()->guard('merchant')->id()){
            return redirect(route('subCategories.index'))->with('error_msg' , trans('merchantDashbaord.not_permitted'));

        }
        if (empty($subCategory)) {

            return redirect(route('subCategories.index'))->with('error_msg', trans('merchantDashbaord.not_found'));
        }

        $subCategory->delete();


        return redirect(route('subCategories.index'))->with('success_msg', trans('merchantDashbaord.deleted_successfully'));
    }
}
