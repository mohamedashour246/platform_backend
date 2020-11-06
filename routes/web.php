<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/




Route::group(['prefix' => 'Board'  , 'namespace' => 'Board'] , function(){
	Route::get('/' , 'BoardController@index' )->name('board.index');
});

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/Board/login' , 'Board\Auth\LoginController@login_form')->name('Board.login_form');
Route::post('/Board/login' , 'Board\Auth\LoginController@login')->name('Board.login');