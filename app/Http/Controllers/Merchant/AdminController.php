<?php

namespace App\Http\Controllers\Merchant;

use App\Http\Controllers\Controller;

use App\Http\Requests\Merchants\StoreAdminRequest;
use App\Models\AdminType;
use App\Models\Merchant;
use App\Models\MerchantPermission;
use App\Models\PermissionGroup;

use Auth;
use Illuminate\Http\Request;
use Session;

class AdminController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {

		$admins = Merchant::with(['type', 'governorate'])->where('market_id', Session::get('market_id'))->latest()->paginate(10);
		return view('merchants.admins.index', compact('admins'));

	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		$groups = PermissionGroup::with(['permissions'])->where('slug', 'branches')->orWhere('slug', 'admins')->orWhere('slug', 'trips')->orWhere('slug', 'customers')->get();
		$types  = AdminType::where('active', 1)->whereIn('id', [2, 3, 4])->latest()->get();
		return view('merchants.admins.create', compact('groups', 'types'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(StoreAdminRequest $request) {

		// dd($request->all());
		$admin = new Merchant;
		if (!$admin->add($request->all())) {
			return back()->with('error_msg', trans('admins.adding_error'));
		}

		if ($request->hasFile('profile_picture')) {
			$path = $request->file('profile_picture')->store('merchants', 's3');
			$admin->setImage(basename($path));
		}

		$current_logged_in_admin_id = Auth::guard('merchant')->id();
		$permissions                = [];
		foreach ($request->permissions as $permission) {
			$permissions[] = new MerchantPermission([
					'permission_id' => $permission,
					'added_by'      => $current_logged_in_admin_id,
					'merchant_id'   => $admin->id,
				]);
		}

		$admin->permissions()->saveMany($permissions);

		return redirect(route('merchants.admins.index'))->with('success_msg', trans('admins.adding_success'));
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show(Merchant $admin) {
		$admin->load(['type', 'permissions']);
		return view('merchants.admins.admin', compact('admin'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Merchant $admin) {
		$groups            = PermissionGroup::with(['permissions'])->where('slug', 'branches')->orWhere('slug', 'admins')->orWhere('slug', 'trips')->orWhere('slug', 'customers')->get();
		$types             = AdminType::where('active', 1)->whereIn('id', [2, 3, 4])->latest()->get();
		$admin_permissions = MerchantPermission::where('merchant_id', $admin->id)->pluck('permission_id')->toArray();
		return view('merchants.admins.edit', compact('groups', 'types', 'admin', 'admin_permissions'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, Merchant $admin) {

		if (!$admin->edit($request->all())) {
			return back()->with('error_msg', trans('admins.updating_error'));
		}

		if ($request->hasFile('profile_picture')) {
			$path = $request->file('profile_picture')->store('merchants', 's3');
			$admin->setImage(basename($path));
		}

		$current_logged_in_admin_id = Auth::guard('merchant')->id();
		$permissions                = [];
		foreach ($request->permissions as $permission) {
			$permissions[] = new MerchantPermission([
					'permission_id' => $permission,
					'added_by'      => $current_logged_in_admin_id,
					'merchant_id'   => $admin->id,
				]);
		}

		$admin->permissions()->saveMany($permissions);

		return redirect(route('merchants.admins.index'))->with('success_msg', trans('admins.editing_success'));
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Merchant $admin) {
		$admin->delete();
		return redirect(route('merchants.admins.index'))->with('success_msg', trans('admins.deleted_success'));
	}

	public function change_status(Request $request) {
		// dd($request->all());
		$admin = Merchant::find($request->admin_id);

		if ($admin) {
			$admin->active == 1?0:1;
			$admin->save();

		}
	}
}
