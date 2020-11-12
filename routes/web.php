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




Route::group(['prefix' => 'Board'  ,  'middleware' => ['admin' , 'lang' ]  , 'namespace' => 'Board'] , function(){
	Route::get('/' , 'BoardController@index' )->name('board.index');
	Route::get('/language/{lang}' , 'BoardController@change_language' )->name('board.lang');
	Route::get('/logout'  , 'Auth\LoginController@logout')->name('board.logout');
	Route::get('/profile'  , 'ProfileController@index' )->name('board.profile');
	Route::patch('/profile' , 'ProfileController@update' )->name('board.profile.update');
	Route::get('/password'  , 'ProfileController@edit_password' )->name('profile.password.edit');
	Route::patch('/password' , 'ProfileController@change_password' )->name('profile.password.change');
	Route::resource('/admins'  , 'AdminController');
	Route::resource('/drivers'  , 'DriverController');
});

Route::get('/test', function () {


  	
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/Board/login' , 'Board\Auth\LoginController@login_form')->name('Board.login_form');
Route::post('/Board/login' , 'Board\Auth\LoginController@login')->name('Board.login');