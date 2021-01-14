<?php

namespace App\Http\Controllers\Merchant;

use App\Http\Controllers\Controller;

use App\Http\Requests\Merchants\StoreBranchRequest;
use App\Http\Requests\Merchants\UpdateBranchRequest;

use App\Models\Branch;
use App\Models\BuildingType;
use App\Models\City;
use App\Models\Governorate;
use Session;

class BranchController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		$branches = Branch::with(['merchant', 'building_type', 'city', 'governorate'])->where('market_id', Session::get('market_id'))->latest()->get();
		return view('merchants.branches.index', compact('branches'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		$governorates   = Governorate::where('active', 1)->latest()->get();
		$building_types = BuildingType::get();
		return view('merchants.branches.create', compact('governorates', 'building_types'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(StoreBranchRequest $request) {

		$branche = new Branch;
		if ($branche->add($request->all())) {
			return redirect(route('merchants.branches.index'))->with('success_msg', trans('branches.branche_addedd'));
		}
		return back()->with('error_msg', trans('branches.adding_error'));
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show(Branch $branch) {

		$branch->load(['governorate', 'city', 'merchant', 'building_type']);
		return view('merchants.branches.branch', compact('branch'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Branch $branch) {
		$governorates   = Governorate::where('active', 1)->latest()->get();
		$cities         = City::where('active', 1)->where('governorate_id', $branch->governorate_id)->latest()->get();
		$building_types = BuildingType::get();
		return view('merchants.branches.edit', compact('branch', 'cities', 'governorates', 'building_types'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(UpdateBranchRequest $request, Branch $branch) {
		// dd($request->all());
		if ($branch->edit($request->all())) {
			return redirect(route('merchants.branches.index'))->with('success_msg', trans('branches.branche_edited'));
		}
		return back()->with('error_msg', trans('branches.editing_error'));
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Branch $branch) {

		if ($branch                                        ->remove()) {
			return redirect(route('merchants.branches.index'))->with('success_msg', trans('branches.deleted_success'));
		}

		return redirect(route('merchants.branches.index'))->with('error_msg', trans('branches.delete_error'));
	}
}
