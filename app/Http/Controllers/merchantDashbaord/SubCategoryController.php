<?php

namespace App\Http\Controllers\merchantDashbaord;

use App\DataTables\SubCategoryDataTable;
use App\Http\Requests;
use App\Http\Requests\merchantDashbaord\subCategory\CreateSubCategoryRequest;
use App\Http\Requests\merchantDashbaord\subCategory\UpdateSubCategoryRequest;
use App\MerchantModels\SubCategory;
use App\Models\Merchant;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class SubCategoryController extends AppBaseController
{
    /**
     * Display a listing of the SubCategory.
     *
     * @param SubCategoryDataTable $subCategoryDataTable
     * @return Response
     */
    public function index(SubCategoryDataTable $subCategoryDataTable)
    {
$subCategories=SubCategory::all();
return view('merchantDashbaord.sub_categories.index',compact('subCategories'));
    }

    /**
     * Show the form for creating a new SubCategory.
     *
     * @return Response
     */
    public function create()
    {
        $merchants=Merchant::all();
        return view('merchantDashbaord.sub_categories.create',compact('merchants'));
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

        /** @var SubCategory $subCategory */
        $subCategory = SubCategory::create($input);

        Flash::success('Sub Category saved successfully.');

        return redirect(route('subCategories.index'));
    }

    /**
     * Display the specified SubCategory.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var SubCategory $subCategory */
        $subCategory = SubCategory::find($id);

        if (empty($subCategory)) {
            Flash::error('Sub Category not found');

            return redirect(route('subCategories.index'));
        }

        return view('merchantDashbaord.sub_categories.show')->with('subCategory', $subCategory);
    }

    /**
     * Show the form for editing the specified SubCategory.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var SubCategory $subCategory */
        $merchants=Merchant::all();

        $subCategory = SubCategory::find($id);

        if (empty($subCategory)) {
            Flash::error('Sub Category not found');

            return redirect(route('subCategories.index'));
        }

        return view('merchantDashbaord.sub_categories.edit')->with(['subCategory'=> $subCategory,'merchants'=>$merchants]);
    }

    /**
     * Update the specified SubCategory in storage.
     *
     * @param  int              $id
     * @param UpdateSubCategoryRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSubCategoryRequest $request)
    {
        /** @var SubCategory $subCategory */
        $subCategory = SubCategory::find($id);

        if (empty($subCategory)) {
            Flash::error('Sub Category not found');

            return redirect(route('subCategories.index'));
        }

        $subCategory->fill($request->all());
        $subCategory->save();

        Flash::success('Sub Category updated successfully.');

        return redirect(route('subCategories.index'));
    }

    /**
     * Remove the specified SubCategory from storage.
     *
     * @param  int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var SubCategory $subCategory */
        $subCategory = SubCategory::find($id);

        if (empty($subCategory)) {
            Flash::error('Sub Category not found');

            return redirect(route('subCategories.index'));
        }

        $subCategory->delete();

        Flash::success('Sub Category deleted successfully.');

        return redirect(route('subCategories.index'));
    }
}
