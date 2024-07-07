<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class RestaurantsController extends Controller
{
    public function getRestaurants(Request $request) {
        $query = Restaurant::where('status', 'approved')
        ->withCount(['orders as total_orders' => function ($query) {
            $query->where('status', 'completed');
        }])
        ->withAvg('restaurant_reviews', 'rating');

        if ($request->has('search') && !empty($request->input('search'))) {
            $query->where('restaurant_name', 'like', '%' . $request->input('search') . '%');
        }

        if ($request->has('bestRate') && $request->input('bestRate') == 'true') {
            $query->orderBy('restaurant_reviews_avg_rating', 'desc');
        }

        if ($request->has('bestSale') && $request->input('bestSale') == 'true') {
            $query->orderBy('total_orders', 'desc');
        }

        $restaurants = $query->paginate(8);

        return response()->json([
            'success' => true,
            'data' => $restaurants->items(),
            'pagination' => (string) $restaurants->links(),
        ]);
    }

    public function deleteRestaurant(Request $request) {
        try {
            $restaurant = Restaurant::findOrFail($request->input('id'));
            $user = User::findOrFail($restaurant->owner_id);
            $ownerEmail = $user->email;

            Mail::raw("Dear User, \n\nWe're sorry to inform you that your restaurant, $restaurant->restaurant_name, has been deleted and removed from our system.", function($message) use ($ownerEmail) {
                $message->to($ownerEmail)
                        ->subject('Restaurant deleted');
            });

            $restaurant->delete();
            $user->delete();

            return response()->json([
                'success' => true,
                'message' => 'Restaurant deleted successfully.',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Could not be deleted.',
            ], 404);
        }
    }
}
