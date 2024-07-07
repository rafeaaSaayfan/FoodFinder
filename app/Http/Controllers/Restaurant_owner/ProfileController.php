<?php

namespace App\Http\Controllers\Restaurant_owner;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function getOrders() {
        $user = auth()->user();

        $restaurant = Restaurant::select('id')->where('owner_id', $user->id)->first();

        $restaurant_id = $restaurant->id;

        $orders = Order::where('restaurant_id', $restaurant_id)->with('user')->paginate(6);

        return response()->json([
            'success' => true,
            'data' => $orders->items(),
            'pagination' => (string) $orders->links(),
            'restaurant_id' => $restaurant_id,
        ]);
    }
}
