<?php

namespace App\Http\Controllers\Board;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Market;
use Auth;
use App\Models\Merchant;
use App\Models\MerchantNotification;
use App\Http\Requests\Board\MerchantNotification\StoreMerchantNotificationRequest;
class MerchantNotificationController extends Controller
{


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $markets = Market::get();
        return view('board.markets_notifications.create' , compact('markets'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMerchantNotificationRequest $request)
    {

        if (in_array('all', $request->markets)) 
            $merchants = Merchant::where('type_id' , 1)->pluck('id')->toArray();
        else
            $merchants = Merchant::where('type_id' , 1)->whereIn('id' , $request->markets )->pluck('id')->toArray();


        $notifications = [];


        foreach ($merchants as $merchant) {
            $notifications[] = [
                'title_en' => $request->title_en , 
                'title_ar' => $request->title_ar , 
                'content_en' => $request->content_en , 
                'content_ar' => $request->content_ar , 
                'merchant_id' => $merchant , 
                'seen' => 0 ,
                'user_id' => Auth::guard('admin')->id() , 
                'send_type' => 'admin' , 
            ];
        }
        MerchantNotification::insert($notifications);


        return back()->with('success_msg'  , trans('markets.notification_send_successfully') );
        
    }


}
