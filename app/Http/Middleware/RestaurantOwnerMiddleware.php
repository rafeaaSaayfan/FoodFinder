<?php

namespace App\Http\Middleware;

use App\Models\Restaurant;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RestaurantOwnerMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            $user = Auth::user();

            if ($user->role === 'restaurant_owner') {

                $restaurant = Restaurant::where('owner_id', $user->id)
                                        ->where('status', 'approved')
                                        ->first();

                if ($restaurant) {
                    return $next($request);
                }
            }
        }

        abort(404);
    }
}
