<?php

namespace App\Http\Controllers\Board;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Market;
use App\Models\City;
use App\Models\Merchant;
use App\Models\MarketDocument;
use App\Models\Branch;
use App\Http\Requests\StoreMarketRequest;
use App\Http\Requests\UpdateMarketRequest;
use App\Models\CityDeliveryPrice;
use Hash;
use Auth;
class MarketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('board.markets.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('board.markets.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMarketRequest $request)
    {

        $market = new Market;
        if (!$market->add($request->all())) 
            return back()->with('error_msg'  , trans('markets.adding_error') );

        if($request->hasFile('logo')) {
            $path = $request->file('logo')->store('markets'  , 's3' );
            $market->setLogo(basename($path));
        }


        if($request->hasFile('contract_image')) {
            $path = $request->file('contract_image')->store('markets'  , 's3' );
            $market->setContractImage(basename($path));
        }

   




        if ($request->hasFile('files')) {

            for ($i = 0; $i <count($request->file('files')) ; $i++) {
                $files = [];
                $path = $request->file('files')[$i]->store('markets_documents'  , 's3' );
                $files[] = new MarketDocument([
                    'file' => basename($path) , 
                    'market_id' => $market->id , 
                    'admin_id' => Auth::guard('admin')->id(),
                ]);
            }

            $market->documents()->saveMany($files);
        }

        $merchant = new Merchant;
        $merchant->username = $request->username;
        $merchant->password = Hash::make($request->password);
        $merchant->type = 'superadmin';
        $merchant->market_id = $market->id;
        $merchant->email = $request->email;
        $merchant->phone = $request->phone;
        $merchant->save();

        return redirect(route('markets.show'  , ['market' => $market->id ] ))->with('succss_msg'  , 'adding_success' );


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Market $market)
    {
        $market->load(['documents' , 'admin' ]);
        return view('board.markets.market' ,  compact('market'));
    }



     /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function admin(Market $market)
     {
        $market->load('marketAdmin');
        return view('board.markets.market_admin' ,  compact('market'));
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function branches(Market $market)
    {
        $market->load('branches');
        return view('board.markets.market_branches' ,  compact('market'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function documents(Market $market)
    {

        $market->load(['documents'  , 'documents.admin' ]);

        return view('board.markets.market_documents' ,  compact('market'));
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function emails(Market $market)
    {
        $market->load(['emails' , 'emails.admin' ]);
        return view('board.markets.market_emails' ,  compact('market'));
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function bank_accounts(Market $market)
    {
        $market->load(['bank_accounts' , 'bank_accounts.admin'  ]);
        return view('board.markets.market_bank_accounts' ,  compact('market'));
    }



    public function row(Request $request)
    {

        $city = City::find($request->id);
        $row = view('board.markets.row'  , compact('city') )->render();
        return response($row,200);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delivery_prices(Market $market)
    {
        $market->load(['delivery_prices' , 'delivery_prices.from'  , 'delivery_prices.to' , 'delivery_prices.admin' ]);
        return view('board.markets.market_delivery_prices' ,  compact('market'));
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function trips(Market $market)
    {
        // $market->load(['emails' , 'emails.admin' ]);
        // return view('board.markets.market_emails' ,  compact('market'));
    }





    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Market $market)
    {
        return view('board.markets.edit'  , compact('market') );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMarketRequest $request , Market $market )
    {
        if (!$market->edit($request->all())) 
            return back()->with('error_msg'  , trans('markets.updating_error') );

        if($request->hasFile('logo')) {
            $path = $request->file('logo')->store('markets'  , 's3' );
            $market->setLogo(basename($path));
        }


        if ($request->hasFile('files')) {

            for ($i = 0; $i <count($request->file('files')) ; $i++) {
                $files = [];
                $path = $request->file('files')[$i]->store('markets_documents'  , 's3' );
                $files[] = new MarketDocument([
                    'file' => basename($path) , 
                    'market_id' => $market->id , 
                    'admin_id' => Auth::guard('admin')->id(),
                ]);
            }

            $market->documents()->saveMany($files);
        }

        return redirect(route('markets.show'  , ['market' => $market->id ] ))->with('success_msg'  , trans('markets.updating_success') );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Market $market)
    {
        if($market->remove())
            return redirect(route('markets.index'))->with('success_msg'  , trans('markets.deleted_success') );
    }

    public function ajax_search(Request $request) {
        $markets = Market::select('name' , 'id')->where('name' , 'like', '%' . $request->q . '%' )->get();
        return $markets;
    }


    public function add_delivery_prices(Market $market)
    {
        $market->load('branches');
        return view('board.markets.create_delivery_prices' , compact('market'));
    }


    public function store_delivery_prices(Request $request )
    {
        // dd($request->all());

        // first we need to get the bransh city id
        $branche = Branch::find($request->branche);
        $branche->load('market' , 'market.delivery_prices');
        $prices = [];
        $admin_id = Auth::guard('admin')->id();

        // dd($branche->city_id);
        
        for ($i = 0; $i < count($request->city_id) ; $i++) {
            $prices[] = new CityDeliveryPrice(array(
                'admin_id' => $admin_id , 
                'market_id' => $branche->market_id , 
                'price' => $request->price[$i] , 
                'from_city' => $branche->city_id , 
                'to_city' => $request->city_id[$i] , 
            )); 
        }
        $branche->market->delivery_prices()->saveMany($prices);
      


      return redirect(route('market.delivery_prices'  , ['market' => $branche->market_id ] ))->with('success_msg'  , trans('markets.delivery_prices_added_successfully') );
        
    }

}
