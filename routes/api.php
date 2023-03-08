<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Cache;

 Route::get('/', 'Api\UserController@index')->name('users.index');
 Route::get('/filter/{typeId}', 'Api\UserController@filter');
 Route::get('/dishes/user/{userId}', 'Api\UserController@getDishesByUser');
 Route::post('/orders', 'Admin\OrderController@createOrder');
 Route::get('/order/{orderId}', 'Admin\OrderController@showOrderRecap');
 Route::get('/get-order-id', function () {
    $order_id = Cache::get('order_id');
    return response()->json(['order_id' => $order_id]);
});
Route::post('/payment','PaymentController@createPaymentIntent');

// <router-link class="nav-link" :to="{ name: 'cart' }">Carrello</router-link>

