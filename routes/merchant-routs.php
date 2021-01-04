<?php

/*
|
| those routes for merhcant board
|
 */

Route::group(['prefix' => 'Merchant', 'namespace' => 'Merchant', 'middleware' => ['lang']], function () {

		Route::get('/login', 'Auth\LoginController@loginView')->name('merhcants.login_view');
		Route::post('/login', 'Auth\LoginController@login')->name('merhcants.login');

		Route::group(['middleware' => ['merhcant', 'activeMerchant', 'activeMarket']], function () {

				Route::get('/board', 'BoardController@index')->name('merhcants.board');
				// Route::
			});
	});
