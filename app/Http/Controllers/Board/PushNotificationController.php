<?php

namespace App\Http\Controllers\Board;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Driver;
use App\Models\PushNotification;

use App\Http\Requests\StorePushNotificationRequest;
class PushNotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notifications = PushNotification::latest()->get();
        return view('board.push_notifications.index'  , compact('notifications') );
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $drivers = Driver::all();
        return view('board.push_notifications.create'  , compact('drivers') );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePushNotificationRequest $request)
    {
        //we need to save it first to database
        $notification = new PushNotification;
        $notification->add($request->all());
        // now we need to send this notification ti firebase

        return back()->with('success_msg'  , trans('push_notifications.send_success') );
               

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(PushNotification $push_notification)
    {
        
        $push_notification->load('admin');
        return view('board.push_notifications.notification'  , compact('push_notification') );
    }

   
}
