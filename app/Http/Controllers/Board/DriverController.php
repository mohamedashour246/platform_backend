<?php

namespace App\Http\Controllers\Board;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Drivers\StoreDriverRequest;
use App\Http\Requests\Drivers\UpdateDriverRequest;
use App\Models\Country;
use App\Models\Driver;
use App\Models\PaymentMethod;
use App\Http\Resources\DriverResourceCollection;
use App\Models\Trip;
use App\Models\Bill;
use App\Exports\TripsExport;
use Excel;
use PDF;
class DriverController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('board.drivers.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = Country::all();
        return view('board.drivers.create' , compact('countries') );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDriverRequest $request)
    {
        $driver = new Driver;

        if(!$driver->add($request->all()))
            return back()->with('error_msg' , trans('drivers.adding_error'));


        if($request->hasFile('profile_picture')) {
            $path = $request->file('profile_picture')->store('drivers' , 's3' );
            $driver->setImage(basename($path));
        }
        return redirect(route('drivers.index'))->with('success_msg' , trans('drivers.added_success'));
    }





    public function driver_bills(Driver $driver)
    {
        return view('board.drivers.driver_bills' , compact('driver') );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Driver $driver)
    {
        $today_total_trips_count = Trip::whereDate('delivery_date_to_customer' , '=' , today())->where('driver_id'  , $driver->id )->where('status_id' , 4)->count();
        $today_total_bills_count = Bill::whereDate('created_at' , '=' , today())->where('driver_id'  , $driver->id )->count();
        $driver->load(['country' , 'admin']);
        return view('board.drivers.driver' , compact('driver' , 'today_total_trips_count' , 'today_total_bills_count'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Driver $driver)
    {
        $countries = Country::all();
        return view('board.drivers.edit'  , compact('countries'  , 'driver' ) );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDriverRequest $request,Driver $driver)
    {
        if(!$driver->edit($request->all()))
            return back()->with('error_msg' , trans('drivers.updating_error'));


        if($request->hasFile('profile_picture')) {
            $path = $request->file('profile_picture')->store('drivers' , 's3' );
            $driver->setImage(basename($path));
        }


        return back()->with('success_msg' , trans('drivers.updating_success'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Driver $driver)
    {

        if($driver->remove())
            return redirect(route('drivers.index'))->with('success_msg' , trans('drivers.deleted_success'));
    }



    public function search_drivers(Request $request)
    {
        $keyword = $request->q;

        $drivers = Driver::where('name', 'like', '%' . $keyword . '%')->orWhere('code', 'like', '%' . $keyword . '%')->orWhere('phone', 'like', '%' . $keyword . '%')->get();

        return new DriverResourceCollection($drivers);
    }



    public function change_status(Request $request)
    {
       
       $driver = Driver::find($request->driver_id);

       if ($driver) {
           $driver->available = $request->status;
           dd($driver->save());
       }
    }




    public function reports(Request $request)
    {

        $driver_erad = 0;
        $cashe = 0;
        $kent = 0;
        $delivery_total_price = 0;
        $trips = Trip::query();
        $fillters = false;

        if ($request->filled('driver')) {
            $fillters = true;
            $trips = $trips->where('driver_id' , '=' , $request->driver );        
        }

        if ($request->filled('dateFrom')) {
            $fillters = true;
            $trips =  $trips->whereDate('receipt_date_from_market', '>=', $request->dateFrom );
        }


        if ($request->filled('dateTo')) {
            $fillters = true;
            $trips =  $trips->whereDate('receipt_date_from_market', '<=', $request->dateTo );
        }


        if ( $request->payment_method != 'all' ) {
            $fillters = true;
            $trips = $trips->where('payment_method_id', '=', $request->payment_method );
            // dd($trips->get());
        }


        if ($fillters) {
            // $temp_trips = $trips;
            $trips = $trips->with(['market' , 'driver'])->get();

            
            $cashe = collect($trips)->where('payment_method_id' , 1)->sum('delivery_price');;
            $kent = collect($trips)->where('payment_method_id' , 2)->sum('delivery_price');
            $delivery_total_price = collect($trips)->sum('delivery_price');
            $driver_erad = $cashe + $kent + $delivery_total_price;
        }

        switch ($request->btn_active) {
            case 'excel':
            return Excel::download(new TripsExport($trips), 'trips.xlsx'); 
            break;
            case 'pdf':
            return PDF::loadView('board.drivers.pdf', compact('trips') )->download('trips.pdf');
            break;
            default:
            $payment_methods = PaymentMethod::all();
            return view('board.drivers.reports'  , compact('payment_methods' , 'trips'  , 'driver_erad' , 'cashe' , 'kent' , 
                'delivery_total_price' ));
            break;
        }


    }
}
