<?php

// use App\Http\Controllers\Auth\SocialAuthController;

use App\Http\Controllers\Controller;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Lang\Language;
use App\Http\Controllers\Profile\ChangePassController;
use App\Http\Controllers\Profile\ProfileController;
use App\Http\Controllers\Profile\RestaurantVisitController;
use App\Http\Controllers\Profile\ReviewController;
// use App\Http\Controllers\MenuController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Auth::routes(['verify' => true]);

Route::get('/Language/{lang}', [Language::class, 'setLanguage'])->name('setLanguage');

Route::middleware(['guest'])->get('/', [Controller::class, 'landingPage']);

Route::middleware(['auth', 'verified'])->group(function() {

    Route::controller(HomeController::class)->group(function() {
        Route::get('/home', 'index')->name('home');
        Route::get('/home/getRestaurants', 'getRestaurants');
    });

    Route::controller(ProfileController::class)->group(function() {
        Route::get('/profile', 'viewPage')->name('profile');
        Route::post('/updateProfile', 'updateProfile');
        Route::get('/profile/getProfile', 'getProfile');
        Route::post('/profile/getOrders', 'getOrders');
    });

    Route::controller(ChangePassController::class)->group(function() {
        Route::post('/security/changePassword', 'changePass');
    });

    include __DIR__ . '\customer.php';
    include __DIR__ . '\restaurant_owner.php';
    include __DIR__ . '\admin.php';

    Route::controller(RestaurantVisitController::class)->group(function() {
        Route::post('/restaurants/{restaurant_name}', 'index')->name('RestaurantVisit');
        Route::post('/menus/getMenu', 'getMenu');
        Route::post('/restaurants/menus/addToCart', 'addToCart');
        Route::post('/restaurants/orders/getOrders', 'getOrders');
    });
    Route::controller(ReviewController::class)->group(function() {
        Route::post('/res/getRate', 'getRate');
        Route::post('/res/postRate', 'postRate');
    });

});



// Route::get('auth/google', [SocialAuthController::class, 'redirectToGoogle'])->name('google.redirect');
// Route::get('auth/google/callback', [SocialAuthController::class, 'handleGoogleCallback']);
