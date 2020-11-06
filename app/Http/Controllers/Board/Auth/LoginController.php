<?php

namespace App\Http\Controllers\Board\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Http\Requests\Board\Auth\LoginRequest;
use Auth;
class LoginController extends Controller
{
    /**
     * Display the login form
     *
     * @return \Illuminate\Http\Response
     */
    public function login_form()
    {
        return view('board.login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function login(LoginRequest $request)
    {
        $credentials = $request->only('username', 'password');

        if (Auth::guard('admin')->attempt($credentials)) {
            return redirect(route('board.index'));
        }
    }

   
}
