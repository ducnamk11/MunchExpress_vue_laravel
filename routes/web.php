<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/restaurant', 'RestaurantController@index')->name('restos');
    Route::get('/restaurant/menu/{id}', 'MenuController@index')->name('restos.menu');
    Route::get('/restaurant/orders/{id}', 'OrderController@index')->name('restos.orders');
    Route::get('/restaurant/orders/{id}/add', 'OrderController@add')->name('restos.orders.add');
});
