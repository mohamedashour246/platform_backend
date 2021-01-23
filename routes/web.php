<?php

use Illuminate\Support\Facades\Route;
require_once 'merchant-routes.php';
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

Route::group(['prefix' => 'Board', 'middleware' => ['admin', 'lang'], 'namespace' => 'Board'],

function () {
		Route::get('/', 'BoardController@index')->name('board.index');
		Route::get('/language/{lang}', 'BoardController@change_language')->name('board.lang');
		Route::get('/logout', 'Auth\LoginController@logout')->name('board.logout');
		Route::get('/profile', 'ProfileController@index')->name('board.profile');
		Route::patch('/profile', 'ProfileController@update')->name('board.profile.update');
		Route::get('/password', 'ProfileController@edit_password')->name('profile.password.edit');
		Route::patch('/password', 'ProfileController@change_password')->name('profile.password.change');
		Route::resource('/admins', 'AdminController');
		Route::post('/admins/change_status', 'AdminController@change_status');
		Route::post('/drivers/change_status', 'DriverController@change_status');
		Route::get('/drivers/reports', 'DriverController@reports')->name('drivers.reports');
		Route::resource('/drivers', 'DriverController');
		Route::resource('/markets', 'MarketController');
		Route::resource('/branches', 'BranchController');
		Route::resource('/trips', 'TripController');
		Route::resource('/cities', 'CityController');
		Route::resource('/governorates', 'GovernorateController');
		Route::resource('/city_delivery_prices', 'CityDeliveryPriceController');
		Route::resource('/push_notifications', 'PushNotificationController');
		Route::resource('/admin_types', 'AdminTypeController');
		Route::resource('/customers', 'CustomerController');
		Route::get('/governorates/{governorate}/delivery_prices/create', 'GovernorateController@delivery_prices_create')->name('governorates.delivery_prices.create');
		Route::post('/governorates/{governorate}/delivery_prices', 'GovernorateController@delivery_prices_store')->name('governorates.delivery_prices.store');
		Route::get('/governorates/{governorate}/delivery_prices/', 'GovernorateController@delivery_prices')->name('governorates.delivery_prices.index');
		Route::get('/markets/{market}/admin', 'MarketController@admin')->name('market.admin');
		Route::get('/markets/{market}/branches', 'MarketController@branches')->name('market.branches');
		Route::get('/markets/{market}/trips', 'MarketController@trips')->name('market.trips');
		Route::get('/markets/{market}/documents', 'MarketController@documents')->name('market.documents');
		Route::get('/markets/{market}/emails', 'MarketController@emails')->name('market.emails');
		Route::get('/markets/{market}/bank_accounts', 'MarketController@bank_accounts')->name('market.bank_accounts');
		Route::get('/markets/{market}/delivery_prices', 'MarketController@delivery_prices')->name('market.delivery_prices');
		Route::get('/market_documents/{file}/download', 'MarketDocumentController@download')->name('market.documents.download');
		Route::get('/markets/{market}/delivery_prices/create', 'MarketController@add_delivery_prices')
			->name('market.delivery_prices.create');
		Route::post('/markets/{market}/delivery_prices', 'MarketController@store_delivery_prices')
			->name('market.delivery_prices.store');
		Route::delete('/delivery_prices/{delivery_price}', 'DeliveryPriceController@destroy')->name('delivery_prices.destroy');
		Route::get('/delivery_prices/{delivery_price}/edit', 'DeliveryPriceController@edit')->name('delivery_prices.edit');
		Route::patch('/delivery_prices/{delivery_price}', 'DeliveryPriceController@update')->name('delivery_prices.update');
		Route::get('/searching_cities', 'CityController@ajax_search');
		Route::get('/search_in_cities', 'CityController@search_in_cities');
		Route::get('/get_governorate_cities', 'CityController@get_governorate_cities');
		Route::get('/get_cities_we_can_set_price_to_it', 'CityDeliveryPriceController@get_cities_we_can_set_price_to_it');
		//ajax request
		Route::get('/ajax/search_markets', 'MarketController@ajax_search');
		Route::get('/ajax/search_branches', 'BranchController@get_market_branches_via_ajax');
		Route::get('/ajax/search_customers', 'CustomerController@ajax_search_customers');
		Route::get('/ajax/search_drivers', 'DriverController@search_drivers');
		Route::get('get_row', 'MarketController@row');
		Route::delete('ajax/delete_delivery_price', 'CityDeliveryPriceController@ajax_delete');
		Route::delete('ajax/delete_admin_type', 'AdminTypeController@ajax_delete');
		Route::get('/get_governorate_cities', 'AjaxController@get_governorate_cities');
		Route::post('/save_customer'  , 'AjaxController@add_new_customar_via_ajax' );

	});
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/Board/login', 'Board\Auth\LoginController@login_form')->name('Board.login_form');
Route::post('/Board/login', 'Board\Auth\LoginController@login')->name('Board.login');




Route::group([ 'middleware' => ['lang']], function () {

    Route::get('/language/{lang}', 'BoardController@change_language');



Route::resource('subCategories', 'merchantDashbaord\SubCategoryController');


Route::resource('products', 'merchantDashbaord\ProductController');
});
