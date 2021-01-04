<?php

namespace App\Http\Controllers\Merchant;

use App\Http\Controllers\Controller;

use App\Http\Requests\Merchants\StoreAdminRequest;
use App\Models\AdminType;
use App\Models\Merchant;
use App\Models\PermissionGroup;
use Illuminate\Http\Request;
use Session;

class AdminController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {

		$admins = Merchant::where('market_id', Session::get('market_id'))->latest()->get();
		return view('merchants.admins.index', compact('admins'));

	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		$groups = PermissionGroup::with(['permissions'])->where('slug', 'branches')->orWhere('slug', 'admins')->orWhere('slug', 'trips')->get();
		$types  = AdminType::where('active', 1)->latest()->get();
		return view('merchants.admins.create', compact('groups', 'types'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(StoreAdminRequest $request) {

		$admin = new Merchant;
		if ($admin->add($request->all())) {

		}
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show() {
		$groups = PermissionGroup::with(['permissions'])->where('slug', 'branches')->orWhere('slug', 'admins')->orWhere('slug', 'trips')->get();
		$types  = AdminType::where('active', 1)->latest()->get();
		return view('merchants.admins.create', compact('groups', 'types'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit() {
		$groups = PermissionGroup::with(['permissions'])->where('slug', 'branches')->orWhere('slug', 'admins')->orWhere('slug', 'trips')->get();
		$types  = AdminType::where('active', 1)->latest()->get();
		return view('merchants.admins.create', compact('groups', 'types'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id) {
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id) {
		//
	}
}
