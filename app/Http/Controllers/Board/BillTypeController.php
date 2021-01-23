<?php

namespace App\Http\Controllers\Board;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BillType;
use App\Http\Requests\Board\BillTypes\StoreBillTypeRequest;
use App\Http\Requests\Board\BillTypes\UpdateBillTypeRequest;
use Auth;
class BillTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $types = BillType::latest()->get();
        return view('board.bill_types.index'  , compact('types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('board.bill_types.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBillTypeRequest $request)
    {
        $type = new BillType;
        $type->type_ar = $request->name_ar;
        $type->type_en = $request->name_en;
        $type->admin_id = Auth::guard('admin')->id();
        $type->save();


        return redirect()->route('bill_types.index')->with('success_msg'  , trans('bill_types.success_add') );
    }

  

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit( $bill_type)
    {
        
        return view('board.bill_types/edit'  , compact('bill_type') );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBillTypeRequest $request,BillType $bill_type)
    {
        $bill_type->type_ar = $request->name_ar;
        $bill_type->type_en = $request->name_en;
        $bill_type->save();
        return redirect()->route('bill_types.index')->with('success_msg'  , trans('bill_types.success_edit') );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function ajax_delete(Request $request)
    {
        $type = BillType::find($request->id);
        $type->delete();

        return response()->json( ['status' => 'success' , 'msg' => trans('bill_types.deleted_success') ]  , 200);
    }
}
