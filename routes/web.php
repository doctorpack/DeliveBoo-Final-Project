<?php


use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Auth::routes();

Route::middleware('auth')
    ->namespace('Admin')
    ->name('admin.')
    ->prefix('admin')
    ->group(function () {
    Route::resource('dishes','DishController');
    Route::resource('orders', 'OrderController');
});


Route::get('/admin',function(){
    return view('admin.home');
    })->name('home');


Route::get('{any?}', function () {
    return view('guest.home');
    })->where("any", ".")->name('guest.home');

    Route::get('/unauthorized', function () {
        return view('auth.unauthorized');
    })->name('unauthorized');



