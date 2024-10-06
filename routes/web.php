<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SalesController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::group(['namespace' => 'App\Http\Controllers\Order'], function () {
    Route::get('/orders', 'IndexController@__invoke')->name('order.index')->middleware('auth');
    Route::get('/orders/create', 'CreateController@__invoke')->name('order.create')->middleware('auth');
    Route::post('/orders', 'StoreController@__invoke')->name('order.store')->middleware('auth');
    Route::get('/orders/{order}/edit', 'EditController@__invoke')->name('order.edit')->middleware('auth');
    Route::patch('/orders/{order}', 'UpdateController@__invoke')->name('order.update')->middleware('auth');
    Route::delete('/orders/{order}', 'DeleteController@__invoke')->name('order.delete')->middleware('auth');
    Route::get('/orders/{order}/print', 'PrintController@__invoke')->name('order.print')->middleware('auth');
});

Route::group(['namespace' => 'App\Http\Controllers\Contractor'], function () {
    Route::get('/contractors/create', 'CreateController@__invoke')->name('contractor.create')->middleware('auth');
    Route::post('/contractors', 'StoreController@__invoke')->name('contractor.store')->middleware('auth');
    Route::get('/contractors/{contractor}/edit', 'EditController@__invoke')->name('contractor.edit')->middleware('auth');
    Route::patch('/contractors/{contractor}', 'UpdateController@__invoke')->name('contractor.update')->middleware('auth');
    Route::delete('/contractors/{contractor}', 'DeleteController@__invoke')->name('contractor.delete')->middleware('auth');
});

Route::get('/sales', [SalesController::class, 'index'])->name('sale.index')->middleware('auth');

Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index')->middleware('auth');

Auth::routes();
