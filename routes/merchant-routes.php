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
				Route::get('/ajax/search_customers', 'BoardController@search_customers');
				Route::post('/admins/change_status', 'AdminController@change_status');
				Route::get('/admins/{admin}/trips', 'AdminController@admin_trips')->name('trips');
				Route::resource('/admins', 'AdminController');
				Route::resource('/branches', 'BranchController');
				Route::resource('/trips', 'TripController');
				Route::resource('/customers', 'CustomerController');
				Route::get('/notifications', 'BoardController@notifications');
				Route::get('/get_governorate_cities', 'AjaxController@get_governorate_cities');
				Route::post('/add_new_customar_via_ajax', 'AjaxController@add_new_customar_via_ajax');


			});
	});

Route::group(['middleware' => ['merchant', 'activeMerchant', 'activeMarket', 'whichMarket'], ], function () {

    Route::group(['prefix' => 'merchantDashboard', 'middleware' => ['lang']], function () {

        Route::get('/language/{lang}', 'BoardController@change_language');

        Route::resource('orders', 'merchantDashboard\OrderController');

    });
});

Route::group(['middleware' => ['merchant', 'activeMerchant', 'activeMarket', 'whichMarket'], ], function () {

    Route::group(['prefix' => 'merchantDashbaord', 'middleware' => ['lang']], function () {

        Route::get('/language/{lang}', 'BoardController@change_language');


        Route::get('/', 'merchantDashbaord\HomeController@index')->name('merchantDashbaord');
        Route::resource('subCategories', 'merchantDashbaord\SubCategoryController');


        Route::resource('products', 'merchantDashbaord\ProductController');
				Route::resource('exproducts', 'Merchant\ExtrasController');
				Route::resource('orders', 'Merchant\OrderController');
				Route::resource('dissliders', 'Merchant\DiscountController');
				Route::resource('customers', 'Merchant\CustomerController');

    });
});
