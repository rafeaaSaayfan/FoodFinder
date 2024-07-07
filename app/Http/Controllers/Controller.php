<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function landingPage() {
        if(auth()->user()) {
            return redirect()->route('home');

        } else {

            $resCount = Restaurant::count();

            $query = Restaurant::where('status', 'approved')
            ->withCount(['orders as total_orders' => function ($query) {
                $query->where('status', 'completed');
            }])
            ->withAvg('restaurant_reviews', 'rating')
            ->with('restaurant_images')
            ->take(6)
            ->get();

            return view('landingPage', [
                'resCount' => $resCount,
                'restaurants' => $query,
            ]);
        }
    }
}
