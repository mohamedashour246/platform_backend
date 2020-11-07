<?php

namespace App\Http\Controllers\Board;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App;
class BoardController extends Controller
{


    public function __construct() {

        $this->middleware('admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('board.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function change_language(Request $request)
    {

        $langs = ['ar'  , 'en' ];

        if(!in_array($request->lang , $langs )) {
            session()->put('locale'  ,'ar'); 
            session()->put('dir' , 'rtl');
            App::setLocale(session()->get('locale'));
            return redirect()->back();
        } 



        if($request->lang == 'en') {
            session()->put('locale'  , 'en' ); 
            session()->put('dir' , 'ltr');
        }

        else 
        {
            session()->put('locale'  , 'ar' );
            session()->put('dir' , 'rtl');
        }



        App::setLocale(session()->get('locale'));

        return redirect()->back();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
