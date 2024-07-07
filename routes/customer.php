<?php

use App\Http\Controllers\Customer\CartController;
use App\Http\Controllers\Customer\OrdersController;
use Illuminate\Support\Facades\Route;

Route::controller(CartController::class)->group(function() {
    Route::get('/cart', 'cart')->name('cart');
    Route::post('/cart/getRestaurants', 'getRestaurants');
    Route::post('/cart/getCart', 'getCart');
    Route::post('/cart/deleteCart', 'deleteCart');
    Route::post('/cart/updatedCart', 'updatedCart');
    Route::post('/cart/checkOut', 'checkOut');
});

Route::controller(OrdersController::class)->group(function() {
    Route::get('/orders', 'orders')->name('orders');
    Route::post('/orders/getRestaurants', 'getRestaurants');
    Route::post('/orders/getOrders', 'getOrders');
    Route::post('/orders/cancelOrder', 'cancelOrder');
});
