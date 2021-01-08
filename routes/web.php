<?php

use Illuminate\Support\Facades\Route;

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get('/', 'App\Http\Controllers\StoreController@index')->name('item.list');
Route::get('/electronic-item/{id}', 'App\Http\Controllers\StoreController@show')->name('item.show');
Route::post('/cart/add/{id}', 'App\Http\Controllers\OrderController@add')->name('cart.add');
Route::post('/cart/remove/{id}', 'App\Http\Controllers\OrderController@remove')->name('cart.remove');
Route::get('/order/preview', 'App\Http\Controllers\OrderController@preview')->name('order.preview');
Route::middleware('auth')->group(function () {
    Route::get('/profile', 'App\Http\Controllers\ProfileController@index')->name('profile.index');
});
