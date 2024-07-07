<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Restaurant;
use App\Models\User;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    public function orders() {
        $user = auth()->user();

        return view('customer.orders')->with([
            'user' => $user,
        ]);
    }

    public function getRestaurants() {
        $userId = auth()->user()->id;

        $restaurants = Restaurant::whereHas('orders', function($query) use ($userId) {
            $query->where('user_id', $userId);
        })->get();

        return response()->json([
            'success' => true,
            'restaurants' => $restaurants,
        ]);
    }

    public function getOrders(Request $request) {
        $userId = auth()->user()->id;

        $validatedData = $request->validate([
            'status' => 'required|in:pending,canceled,accepted,completed',
        ]);

        $status = $validatedData['status'];
        $restaurant_id = $request->restaurant;

        $restaurant = Restaurant::where('id', $restaurant_id)
            ->whereHas('orders', function($query) use ($userId, $restaurant_id, $status) {
                $query->where('user_id', $userId)->where('restaurant_id', $restaurant_id)->where('status', $status);
            })
            ->with(['orders' => function($query) use ($userId, $status) {
                $query->where('user_id', $userId)->where('status', $status)->with('order_details.menu');
            }])
            ->first();

        return response()->json([
            'success' => true,
            'data' => $restaurant,
        ]);
    }

    public function cancelOrder(Request $request) {
        $order = Order::findOrFail($request->id);

        if($order) {
            $order->status = 'canceled';
            $order->save();

            $remainingCarts = Order::where('user_id', auth()->user()->id)
            ->where('restaurant_id', $request->restaurant_id)
            ->get();
            $isCartEmpty = $remainingCarts->isEmpty();

            return response()->json([
                'success' => true,
                'message' => 'Order canceled successfully',
                'isCartEmpty' => $isCartEmpty,
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'Cart item not found',
        ], 404);
    }
}
