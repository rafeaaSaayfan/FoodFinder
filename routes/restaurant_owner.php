<?php

use App\Http\Controllers\Restaurant_owner\Complete_profile\CompleteProfileController;
use App\Http\Controllers\Restaurant_owner\MenuController;
use App\Http\Controllers\Restaurant_owner\OrdersController;
use App\Http\Controllers\Restaurant_owner\ProfileController;
use App\Http\Controllers\Restaurant_owner\RestaurantOwnerController;
use App\Http\Controllers\Restaurant_owner\SettingsController;
use Illuminate\Support\Facades\Route;

Route::controller(CompleteProfileController::class)->group(function() {
    Route::get('/complete_profile', 'viewPage')->name('restaurantOwner_complete_profile');
    Route::post('/complete_profile_post', 'complete_profile');
});

Route::prefix('res_owner')->middleware(['auth', 'verified', 'res_owner'])->group(function() {
    Route::controller(RestaurantOwnerController::class)->group(function() {
        Route::get('/profile', 'profile')->name('restaurantOwner_profile');
        Route::get('/orders', 'orders')->name('restaurantOwner_orders');
        Route::get('/menu_management', 'menu_management')->name('restaurantOwner_menu_management');
        Route::get('/settings', 'settings')->name('restaurantOwner_settings');
    });

    Route::controller(ProfileController::class)->group(function() {
        Route::post('/profile/getOrders', 'getOrders');
    });

    Route::controller(OrdersController::class)->group(function() {
        Route::post('/orders/getOrders', 'getOrders');
        Route::post('/orders/cancelOrder', 'cancelOrder');
        Route::post('/orders/acceptOrder', 'acceptOrder');
        Route::post('/orders/completeOrder', 'completeOrder');
    });

    Route::controller(MenuController::class)->group(function() {
        Route::post('/menus/getMenu', 'getMenu');
        Route::post('/menus/createMenu', 'createMenu');
        Route::post('/menus/deleteMenu', 'deleteMenu');
    });

    Route::controller(SettingsController::class)->group(function() {
        Route::get('/settings/get', 'getAllSettings');
        Route::post('/settings/update', 'update');
    });

});
