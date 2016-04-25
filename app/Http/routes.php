<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => 'language'], function()
{
    Route::get('/', 'DashboardController@index');
    Route::get('dashboard', 'DashboardController@index');
    // Authentication routes...
    Route::get('auth/login', 'Auth\AuthController@getLogin');
    Route::post('auth/login', 'Auth\AuthController@postLogin');
    Route::get('auth/logout', 'Auth\AuthController@getLogout');

    Route::resource('users', 'UserController');
    Route::resource('items', 'ItemController');

    Route::resource('sales', 'SaleController');

    Route::resource('customers', 'CustomerController');

    Route::resource('rules', 'ChargeRuleController');

    Route::resource('discounts', 'DiscountController');
    Route::group(['prefix' => 'api/v1'], function () {
        Route::resource('items', 'ItemApiController');
        Route::resource('charges', 'ChargeRuleApiController');
        Route::resource('discounts', 'DiscountApiController');
    });
});
