<?php

namespace App\Http\Controllers\merchantDashbaord;

use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;

class HomeController extends AppBaseController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('merchantDashbaord.index');
    }
}
