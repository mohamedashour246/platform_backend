<?php

/*
|
| those routes for merhcant board
|
 */

Route::group(['prefix' => 'Merchant', 'namespace' => 'Merchant', 'middleware' => ['lang']], function () {

		Route::get('/login', 'Auth\LoginController@loginView')->name('merchants.login_view');
		Route::post('/login', 'Auth\LoginController@login')->name('merchants.login');
		Route::group(['middleware' => ['merchant', 'activeMerchant', 'activeMarket']], function () {
				// profile routes
				Route::get('/board', 'BoardController@index')->name('merchants.board');
				Route::get('/logout', 'ProfileController@logout')->name('merchants.logout');
				Route::get('/password/edit', 'ProfileController@edit_password')->name('merchants.password.edit');
				Route::patch('/password', 'ProfileController@update_password')->name('merchants.password.update');
				Route::get('/profile/edit', 'ProfileController@profile')->name('merchants.profile.edit');
				Route::patch('/profile', 'ProfileController@update_profile')->name('merchants.profile.update');
				Route::get('/', 'BoardController@index')->name('merchants.board');
			});
	});
