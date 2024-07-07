<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Http\Requests\Customer\CartRequest;
use App\Models\Cart;
use App\Models\Menu;
use App\Models\Order;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RestaurantVisitController extends Controller
{
    public function index(Request $request, $res_name) {
        $user = auth()->user();

        $restaurantId = $request->input('restaurant_id');

        $restaurant = Restaurant::where('restaurants.id', $restaurantId)
        ->join('restaurant_images', 'restaurants.id', '=', 'restaurant_images.restaurant_id')
        ->select('restaurants.*', 'restaurant_images.*')
        ->first();

        $restaurant_reviews = Restaurant::with(['restaurant_reviews' => function ($query) {
            $query->where('user_id', auth()->id());
        }])->findOrFail($restaurantId);
        $reviews = $restaurant_reviews->restaurant_reviews;
        $averageRating = $reviews->avg('rating');
        $reviewCount = $reviews->count();

        $orderCounts = Order::select('status', DB::raw('count(*) as count'))
        ->where('restaurant_id', $restaurantId)
        ->groupBy('status')
        ->pluck('count', 'status');

        $statuses = ['pending', 'canceled', 'accepted', 'completed'];

        $orderStatusCounts = [];
        foreach ($statuses as $status) {
            $orderStatusCounts[$status] = $orderCounts->get($status, 0);
        }

        $totalOrders = array_sum($orderStatusCounts);

        return view('common.profile.restaurant_visit', [
            'user' => $user,
            'restaurantId' => $restaurantId,
            'restaurant' => $restaurant,
            'average_rating' => $averageRating,
            'review_count' => $reviewCount,
            'totalOrders' => $totalOrders,
            'orderStatusCounts' => $orderStatusCounts,
        ]);
    }

    public function getMenu(Request $request) {
        $validatedData = $request->validate([
            'restaurant_id' => 'required|exists:restaurants,id',
            'category' => 'required|in:appetizers,sandwiches,meals,pizzas,desserts,drinks',
        ]);

        $restaurant_id = $validatedData['restaurant_id'];
        $category = $validatedData['category'];

        $menu = Menu::where('restaurant_id', $restaurant_id)->where('category', $category);

        $menus = $menu->paginate(6);

        return response()->json([
            'success' => true,
            'data' => $menus->items(),
            'pagination' => (string) $menus->links(),
        ]);
    }

    public function addToCart(CartRequest $request) {
        $cartItem = Cart::where('user_id', auth()->user()->id)
        ->where('restaurant_id', $request->restaurant_id)
        ->where('menu_id', $request->menu_id)
        ->first();

        if ($cartItem) {
            $totalQuantity = $cartItem->quantity + $request->quantity;
            $price = $request->price * $totalQuantity;

            $cartItem->quantity = $totalQuantity;
            $cartItem->price = $price;
            $cartItem->save();

        } else {
            $price = $request->quantity * $request->price;

            Cart::create([
                'user_id' => auth()->user()->id,
                'restaurant_id' => $request->restaurant_id,
                'menu_id' => $request->menu_id,
                'quantity' => $request->quantity,
                'price' => $price,
            ]);
        }

        return response()->json([
            'success' => true,
            'message' => 'Cart item added successfully',
        ]);
    }

    public function getOrders(Request $request) {
        $validated = $request->validate([
            'restaurant_id' => 'required|integer|exists:restaurants,id',
        ]);

        $restaurant_id = $validated['restaurant_id'];

        $orders = Order::where('restaurant_id', $restaurant_id)->with('user')->paginate(6);

        return response()->json([
            'success' => true,
            'data' => $orders->items(),
            'pagination' => (string) $orders->links(),
        ]);
    }
}
