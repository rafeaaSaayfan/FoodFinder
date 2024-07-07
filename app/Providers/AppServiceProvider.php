<?php

namespace App\Providers;

use App\Models\Restaurant;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth; // Import Auth facade

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Blade::if('admin', function () {
            return auth()->check() && auth()->user()->role === 'admin';
        });

        Blade::if('res_owner', function () {
            if (Auth::check()) {
                $user = Auth::user();

                if ($user->role === 'restaurant_owner') {
                    $restaurant = Restaurant::where('owner_id', $user->id)
                                            ->where('status', 'approved')
                                            ->first();

                    if ($restaurant) {
                        return true;
                    }
                }
            }

            return false;
        });
    }
}
