<?php

namespace App\Http\Controllers\Board;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreAdminTypeRequest;
use App\Http\Requests\UpdateAdminTypeRequest;

use App\Models\AdminType;

class AdminTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $types = AdminType::latest()->get();
        return view('board.admin_types.index'  , compact('types') );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('board.admin_types.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAdminTypeRequest $request)
    {
        $type = new AdminType;
        if($type->add($request->all()))
            return redirect(route('admin_types.index'))->with('success_msg'  , trans('admin_types.success_add'));

        return back()->with('success_msg'  , trans('admin_types.error_add'));              
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(AdminType $admin_type)
    {
        return view('board.admin_types.edit'  , compact('admin_type') );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAdminTypeRequest $request, AdminType $admin_type)
    {
         if($admin_type->edit($request->all()))
            return redirect(route('admin_types.index'))->with('success_msg'  , trans('admin_types.success_edit'));

        return back()->with('success_msg'  , trans('admin_types.error_edit')); 
    }


    public function ajax_delete(Request $request)
    {
        $type = AdminType::find($request->id);
    
        $type->delete();


        return response()->json( ['status' => 'success' , 'msg' => trans('admin_types.deleted_success') ]  , 200);
    }

    
}
