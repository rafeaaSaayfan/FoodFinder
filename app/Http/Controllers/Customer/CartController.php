<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Http\Requests\Customer\CheckoutRequest;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function cart() {
        $user = auth()->user();

        return view('customer.cart')->with([
            'user' => $user,
        ]);
    }

    public function getRestaurants() {
        $userId = auth()->user()->id;

        $restaurants = Restaurant::whereHas('carts', function($query) use ($userId) {
            $query->where('user_id', $userId);
        })->get();

        return response()->json([
            'success' => true,
            'restaurants' => $restaurants,
        ]);
    }

    public function getCart(Request $request) {
        $userId = auth()->user()->id;

        $restaurants = Restaurant::where('id', $request->restaurant)
        ->whereHas('carts', function($query) use ($userId) {
            $query->where('user_id', auth()->user()->id);
        })->with(['carts' => function($query) use ($userId) {
            $query->where('user_id', $userId)->with('menu');
        }])->get();

        if (count($restaurants) === 1) {
            $data = $restaurants[0];
        }

        return response()->json([
            'success' => true,
            'data' => $data,
        ]);
    }

    public function updatedCart(Request $request) {
        $cart = Cart::findOrFail($request->id);

        if($cart) {
            $price = $cart->price / $cart->quantity;
            $total_price = $price * $request->quantity;

            $cart->quantity = $request->quantity;
            $cart->price = $total_price;
            $cart->save();

            return response()->json([
                'success' => true,
                'message' => 'Quantiy updated successfully',
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'Cart item not found',
        ], 404);
    }

    public function deleteCart(Request $request) {
        $cart = Cart::findOrFail($request->id);

        if($cart) {
            $cart->delete();

            $remainingCarts = Cart::where('user_id', auth()->user()->id)
            ->where('restaurant_id', $request->restaurant_id)
            ->get();
            $isCartEmpty = $remainingCarts->isEmpty();

            return response()->json([
                'success' => true,
                'message' => 'Deleted successfully',
                'isCartEmpty' => $isCartEmpty,
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'Cart item not found',
        ], 404);
    }

    public function checkOut(CheckoutRequest $request) {
        $carts = Cart::where('restaurant_id', $request->restaurant_id)
        ->where('user_id', auth()->user()->id)
        ->get();

        if ($carts->isEmpty()) {
            return response()->json([
                'success' => false,
                'message' => 'Cart item not found',
            ], 404);
        }

        $totalPrice = $carts->sum(function ($cart) {
            return $cart->price;
        });

        $order = Order::create([
            'user_id' => auth()->user()->id,
            'restaurant_id' => $request->restaurant_id,
            'total_price' => $totalPrice,
        ]);

        foreach ($carts as $cart) {
            OrderDetails::create([
                'order_id' => $order->id,
                'menu_id' => $cart->menu_id,
                'quantity' => $cart->quantity,
                'price' => $cart->price,
            ]);

            $cart->delete();
        }

        $user = auth()->user();
        $user->address = $request->address;
        $user->save();

        return response()->json([
            'success' => true,
            'message' => 'These Carts checked out successfully',
        ]);
    }

}
