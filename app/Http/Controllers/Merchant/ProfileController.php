<?php

namespace App\Http\Controllers\Merchant;

use App\Http\Controllers\Controller;
use App\Http\Requests\Merchants\UpdatePasswordRequest;
use App\Http\Requests\Merchants\UpdateProfileRequest;
use Auth;
use Hash;

class ProfileController extends Controller {

	public function logout() {

		Auth::guard('merchant')->logout();
		return redirect()->route('merchants.login_view')->with('success_msg', 'تم تسجيل الخروج بنجاح');
	}

	public function profile() {
		$merchant = Auth::guard('merchant')->user();

		return view('merchants.profile', compact('merchant'));
	}

	public function update_profile(UpdateProfileRequest $request) {
		$merchant = Auth::guard('merchant')->user();
		if ($request->hasFile('profile_picture')) {
			$path = $request->file('profile_picture')->store('merchants', 's3');
			$merchant->setImage(basename($path));
		}

		$merchant->username = $request->username;
		$merchant->email    = $request->email;
		$merchant->save();
		return back()->with('success_msg', trans('merchants.profile_updated'));
	}

	public function edit_password() {
		$merchant = Auth::guard('merchant')->user();
		return view('merchants.password', compact('merchant'));
	}

	public function update_password(UpdatePasswordRequest $request) {

		if (!Hash::check($request->current_password, Auth::guard('merchant')->user()->password)) {
			return back()->with('error_msg', trans('merchants.current_password_is_not_valid'));
		}

		$merchant           = Auth::guard('merchant')->user();
		$merchant->password = Hash::make($request->password);
		return back()->with('success_msg', trans('merchants.password_updated'));

	}
}
