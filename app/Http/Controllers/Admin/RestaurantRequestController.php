<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;

class RestaurantRequestController extends Controller
{
    public function getRestaurantRequest() {
        $query = Restaurant::where('status', 'pending')->with('restaurant_images')->paginate(6);

        return response()->json([
            'success' => true,
            'data' => $query->items(),
            'pagination' => (string) $query->links()
        ]);
    }

    public function approved(Request $request) {
        $query = Restaurant::findOrFail($request->id);
        $user = User::findOrFail($query->owner_id);

        $query->status = 'approved';
        $query->save();

        $ownerEmail = $user->email;
        $restaurantName = $query->restaurant_name;

        Mail::raw("Dear User, \n\nCongratulations! Your restaurant, $restaurantName, has been approved.", function($message) use ($ownerEmail) {
            $message->to($ownerEmail)
                    ->subject('Restaurant Approved');
        });

        return response()->json([
            'success' => true,
            'message' => 'The restaurant is approved successfully',
        ]);
    }

    public function reject(Request $request) {
        $query = Restaurant::findOrFail($request->id);

        $user = User::findOrFail($query->owner_id);

        $ownerEmail = $user->email;
        $restaurantName = $query->restaurant_name;

        Mail::raw("Dear User, \n\nWe're sorry to inform you that your restaurant, $restaurantName, has been rejected and removed from our system.", function($message) use ($ownerEmail) {
            $message->to($ownerEmail)
                    ->subject('Restaurant Rejected');
        });

        $query->delete();
        $user->delete();


        return response()->json([
            'success' => true,
            'message' => 'The restaurant is deleted successfully',
        ]);
    }

}
