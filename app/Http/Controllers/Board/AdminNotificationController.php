<?php

namespace App\Http\Controllers\Board;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Auth;
use App\Models\AdminNotification;
use App\Http\Requests\Board\AdminNotification\StoreAdminNotificationRequest;
class AdminNotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $admins = Admin::with('type')->get();
        return view('board.admins_notifications.create' , compact('admins'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAdminNotificationRequest $request)
    {


        if(in_array('all', $request->admins))
            $admins = Admin::pluck('id')->toArray();
        else
            $admins = $request->admins;


        $notifications = [];


        foreach ($admins as $admin) {
            $notifications[] = [
                'title_ar' => $request->title_ar,
                'content_ar' => $request->content_ar,
                'content_en' => $request->content_en,
                'title_en' => $request->title_en,
                'seen' => 0 , 
                'added_by' => Auth::guard('admin')->id() , 
                'admin_id' => $admin , 
                'created_at' => now()
            ];
        }

        AdminNotification::insert($notifications);


        return back()->with('success_msg'  , trans('admins.notification_send_successfully') );

    }
}
