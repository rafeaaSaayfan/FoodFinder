<?php

namespace App\Http\Controllers\Restaurant_owner;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RestaurantOwnerController extends Controller
{
    public function profile() {
        $restaurant = Restaurant::where('restaurants.owner_id', auth()->user()->id)
        ->join('restaurant_images', 'restaurants.id', '=', 'restaurant_images.restaurant_id')
        ->select('restaurants.*', 'restaurant_images.*')
        ->first();

        $reviews = Restaurant::with('restaurant_reviews')->findOrFail($restaurant->restaurant_id);

        $orderCounts = Order::select('status', DB::raw('count(*) as count'))
        ->where('restaurant_id', $restaurant->restaurant_id)
        ->groupBy('status')
        ->pluck('count', 'status');

        $statuses = ['pending', 'canceled', 'accepted', 'completed'];

        $orderStatusCounts = [];
        foreach ($statuses as $status) {
            $orderStatusCounts[$status] = $orderCounts->get($status, 0);
        }

        $totalOrders = array_sum($orderStatusCounts);

        return view('restaurant_owner.profile')->with([
            'restaurant' => $restaurant,
            'reviews' => $reviews,
            'totalOrders' => $totalOrders,
            'orderStatusCounts' => $orderStatusCounts,
        ]);
    }

    public function orders() {
        $restaurant = Restaurant::where('owner_id', auth()->user()->id)
        ->first();

        return view('restaurant_owner.orders')->with([
            'restaurant' => $restaurant,
        ]);
    }

    public function menu_management() {
        $restaurant = Restaurant::where('owner_id', auth()->user()->id)
        ->first();

        return view('restaurant_owner.menu_management', compact('restaurant'));
    }

    public function settings() {
        return view('restaurant_owner.settings');
    }
}
