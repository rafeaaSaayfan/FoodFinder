<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use App\Models\RestaurantReview;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function getRate(Request $request) {
        $restaurantId = $request->restaurant_id;

        $restaurant_reviews = Restaurant::with('restaurant_reviews')->findOrFail($restaurantId);
        $reviews = $restaurant_reviews->restaurant_reviews;
        $averageRating = $reviews->avg('rating');
        $reviewCount = $reviews->count();

        return response()->json([
            'success' => true,
            'message' => 'Rated successfully',
            'average_rating' => $averageRating,
            'review_count' => $reviewCount,
        ]);
    }

    public function postRate(Request $request) {

        $validatedData = $request->validate([
            'restaurant_id' => 'required|exists:restaurants,id',
            'rating' => 'required|numeric|min:1|max:5',
        ]);

        $restaurantId = $validatedData['restaurant_id'];
        $rating = $validatedData['rating'];
        $userId = auth()->id();

        $existingReview = RestaurantReview::where('user_id', $userId)
        ->where('restaurant_id', $restaurantId)
        ->first();

        try {
            if ($existingReview) {

                $existingReview->rating = $rating;
                $existingReview->save();

            } else {
                RestaurantReview::create([
                    'user_id' => $userId,
                    'restaurant_id' => $restaurantId,
                    'rating' => $rating,
                ]);
            }

            return response()->json([
                'success' => true,
                'message' => 'Rated successfully',
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to rate the restaurant',
            ], 500);
        }
    }
}
