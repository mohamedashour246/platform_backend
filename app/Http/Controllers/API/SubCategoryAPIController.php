<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateSubCategoryAPIRequest;
use App\Http\Requests\API\UpdateSubCategoryAPIRequest;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Http\Resources\SubCategoryResource;
use Response;

/**
 * Class SubCategoryController
 * @package App\Http\Controllers\API
 */

class SubCategoryAPIController extends AppBaseController
{
    /**
     * Display a listing of the SubCategory.
     * GET|HEAD /subCategories
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $query = SubCategory::query();

        if ($request->get('skip')) {
            $query->skip($request->get('skip'));
        }
        if ($request->get('limit')) {
            $query->limit($request->get('limit'));
        }

        $subCategories = $query->get();

        return $this->sendResponse(SubCategoryResource::collection($subCategories), 'Sub Categories retrieved successfully');
    }

    /**
     * Store a newly created SubCategory in storage.
     * POST /subCategories
     *
     * @param CreateSubCategoryAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateSubCategoryAPIRequest $request)
    {
        $input = $request->all();

        /** @var SubCategory $subCategory */
        $subCategory = SubCategory::create($input);

        return $this->sendResponse(new SubCategoryResource($subCategory), 'Sub Category saved successfully');
    }

    /**
     * Display the specified SubCategory.
     * GET|HEAD /subCategories/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var SubCategory $subCategory */
        $subCategory = SubCategory::find($id);

        if (empty($subCategory)) {
            return $this->sendError('Sub Category not found');
        }

        return $this->sendResponse(new SubCategoryResource($subCategory), 'Sub Category retrieved successfully');
    }

    /**
     * Update the specified SubCategory in storage.
     * PUT/PATCH /subCategories/{id}
     *
     * @param int $id
     * @param UpdateSubCategoryAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSubCategoryAPIRequest $request)
    {
        /** @var SubCategory $subCategory */
        $subCategory = SubCategory::find($id);

        if (empty($subCategory)) {
            return $this->sendError('Sub Category not found');
        }

        $subCategory->fill($request->all());
        $subCategory->save();

        return $this->sendResponse(new SubCategoryResource($subCategory), 'SubCategory updated successfully');
    }

    /**
     * Remove the specified SubCategory from storage.
     * DELETE /subCategories/{id}
     *
     * @param int $id
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
            return $this->sendError('Sub Category not found');
        }

        $subCategory->delete();

        return $this->sendSuccess('Sub Category deleted successfully');
    }
}
