<?php

namespace App\Http\Controllers\Board;

use App\Http\Controllers\Controller;
use App\Models\Branch;
use App\Models\BuildingType;
use App\Models\Market;
use App\Models\City;
use App\Models\Governorate;
use Illuminate\Http\Request;
use App\Http\Requests\Board\Branches\StoreBranchRequest;
use App\Http\Requests\Board\Branches\UpdateBranchRequest;
class BranchController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		
		// $branches = Branch::with(['merchant', 'building_type', 'city', 'governorate'])->where('market_id', Session::get('market_id'))->latest()->get();
		// return view('merchants.branches.index', compact('branches'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create(Market $market) {

		$governorates = Governorate::where('active', 1)->latest()->get();
		$building_types = BuildingType::get();
		return view('board.branches.create', compact('governorates' , 'building_types' , 'market'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(StoreBranchRequest $request , Market $market) {
		
		// dd($market);
		$branche = new Branch;
		if ($branche->add($request->all() , $market->id )) {
			return redirect(route('market.branches.index' , ['market' => $market->id ] ))->with('success_msg', trans('branches.branche_addedd'));
		}
		return back()->with('error_msg', trans('branches.adding_error'));

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show(Market $market , Branch $branch) {
		
		$branch->load(['governorate', 'city', 'admin', 'building_type' , 'market']);
		return view('board.branches.branch'  , compact('branch'  , 'market' ) );
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Market $market , Branch $branch ) {


		$governorates   = Governorate::where('active', 1)->latest()->get();
		$cities         = City::where('active', 1)->where('governorate_id', $branch->governorate_id)->latest()->get();
		$building_types = BuildingType::get();
		return view('board.branches.edit', compact('branch', 'cities', 'governorates', 'building_types' , 'market'));

	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(UpdateBranchRequest $request,Market $market  , Branch $branch  ) {

		// dd($market);
		if ($branch->edit($request->all())) {
			return redirect(route('market.branches.index' , ['market' => $market->id , 'branch' => $branch->id ] ))->with('success_msg', trans('branches.branche_edited'));
		}
		return back()->with('error_msg', trans('branches.editing_error'));
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Market $market ,  Branch $branch) {


		if ($branch->remove()) {
			return back()->with('success_msg', trans('branches.deleted_success'));
		}

		return back()->with('error_msg', trans('branches.delete_error'));
	}

	public function get_market_branches_via_ajax(Request $request) {
		$branches = Branch::select('name', 'id')->where('market_id', $request->market_id)->get();
		return $branches;
	}

}
