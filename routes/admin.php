<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\RestaurantRequestController;
use App\Http\Controllers\Admin\RestaurantsController;
use App\Http\Controllers\Admin\UsersController;
use Illuminate\Support\Facades\Route;

Route::prefix('dashboard')->middleware(['auth', 'verified', 'admin'])->group(function() {

    Route::controller(AdminController::class)->group(function() {
        Route::get('/', 'dashboard')->name('dashboard');
        Route::get('/users', 'users')->name('users');
        Route::get('/restaurants', 'restaurants')->name('restaurants');
        Route::get('/restaurant_request', 'restaurant_request')->name('restaurant_request');
    });

    Route::controller(UsersController::class)->group(function() {
        Route::get('/users/getUsers', 'getUsers');
        Route::post('/users/changeRole', 'changeRole');
        Route::post('/users/deletUser', 'deletUser');
        Route::get('/users/profile/{id}', 'profile');

        Route::post('/users/profile/getOrders', 'getOrders')->name('getOrders');
        Route::delete('/users/profile/deletUser/{id}', 'deletUserProfile')->name('deletUserProfile');
    });

    Route::controller(RestaurantsController::class)->group(function() {
        Route::get('/restaurants/getRestaurants', 'getRestaurants');
        Route::post('/restaurants/deleteRestaurant', 'deleteRestaurant');
        // Route::get('/users/profile/{id}', 'profile');

        // Route::delete('/users/profile/deletUser/{id}', 'deletUserProfile')->name('deletUserProfile');
    });

    Route::controller(RestaurantRequestController::class)->group(function() {
        Route::get('/restaurant/getRestaurantRequest', 'getRestaurantRequest');
        Route::post('/restaurant_request/approved', 'approved');
        Route::post('/restaurant_request/reject', 'reject');
    });
});
