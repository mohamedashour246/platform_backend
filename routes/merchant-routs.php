<?php

/*
|
| those routes for merchants board
|
 */

Route::group(['prefix' => 'Merchant', 'namespace' => 'Merchant', 'middleware' => ['lang']], function () {

		Route::get('/language/{lang}', 'BoardController@change_language');

		Route::get('/login', 'Auth\LoginController@loginView')->name('merchants.login_view');
		Route::post('/login', 'Auth\LoginController@login')->name('merchants.login');
		Route::group(['middleware' => ['merchant', 'activeMerchant', 'activeMarket', 'whichMarket'], 'as' => 'merchants.'], function () {
				// profile routes
				Route::get('/board', 'BoardController@index')->name('board');
				Route::get('/logout', 'ProfileController@logout')->name('logout');
				Route::get('/password/edit', 'ProfileController@edit_password')->name('password.edit');
				Route::patch('/password', 'ProfileController@update_password')->name('password.update');
				Route::get('/profile/edit', 'ProfileController@profile')->name('profile.edit');
				Route::patch('/profile', 'ProfileController@update_profile')->name('profile.update');
				Route::get('/', 'BoardController@index')->name('board');
				Route::resource('/admins', 'AdminController');
				Route::resource('/branches', 'BranchController');
			});
	});
