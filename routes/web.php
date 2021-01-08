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

Route::get('/', 'App\Http\Controllers\StoreController@index')->name('item.list');
Route::get('/electronic-item/{id}', 'App\Http\Controllers\StoreController@show')->name('item.show');
Route::post('/cart/add/{id}', 'App\Http\Controllers\OrderController@add')->name('cart.add');
Route::post('/cart/remove/{id}', 'App\Http\Controllers\OrderController@remove')->name('cart.remove');
Route::get('/order/preview', 'App\Http\Controllers\OrderController@preview')->name('order.preview');
// TODO: My orders route
