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
// TODO: My orders route
// TODO: Add / remove item route
// TODO: Cart and create order in same page
