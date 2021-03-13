<?php

namespace App\Http\Controllers\Merchant\Auth;

use App\Http\Controllers\Controller;
use App\Models\Merchant;
use Auth;
use Illuminate\Http\Request;
use Validator;

class LoginController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function loginView() {
		return view('merchantDashbaord.auth.login');
	}

	public function login(Request $request) {

		$validator = Validator::make($request->all(), [
				'username' => 'required',
				'password' => 'required',
			]);

		if ($validator->fails()) {
			return back()
			->withErrors($validator)
			->withInput();
		}

		$credentials = $request->only('username', 'password');

		if (Auth::guard('merchant')->attempt($credentials)) {
			return redirect()->route('merchantDashbaord');
		}

		return back()->with('error_msg', 'عفوا بيانات الدخول غير صحيحه');

	}

}
