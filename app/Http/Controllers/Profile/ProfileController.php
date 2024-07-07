<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Http\Requests\Profile\UpdateProfileRequest;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class ProfileController extends Controller
{
    public function viewPage() {
        $user = auth()->user();
        $joinedDate = Carbon::parse($user->created_at)->diffForHumans();

        $totalSpent = Order::where('user_id', $user->id)->where('status', 'completed')->sum('total_price');
        $lastOrder = Order::where('user_id', $user->id)->orderBy('created_at', 'desc')->first();
        $lastOrder = $lastOrder ? Carbon::parse($lastOrder->created_at)->diffForHumans() : 'no order';
        $totalOrder = Order::where('user_id', $user->id)->where('status', 'completed')->count();
        $totalOrders = Order::where('user_id', $user->id)->count();

        return view('common.profile.profile')->with([
            'joinedDate' => $joinedDate,
            'totalSpent' => $totalSpent,
            'lastOrder' => $lastOrder,
            'totalOrder' => $totalOrder,
            'totalOrders' => $totalOrders,
        ]);
    }

    public function updateProfile(UpdateProfileRequest $request) {
        $user = auth()->user();

        if ($request->filled('first_name')) {
            $user->first_name = $request->first_name;
        }
        if ($request->filled('last_name')) {
            $user->last_name = $request->last_name;
        }
        if ($request->filled('username')) {
            $user->username = $request->username;
        }
        $user->email = $request->email;
        if ($request->filled('phone_number')) {
            $user->phone_number = $request->phone_number;
        }
        if ($request->hasFile('profile_img')) {
            $extension = $request->file('profile_img')->getClientOriginalExtension();
            $filename = time() . rand(1, 10000) . "." . $extension;
            $request->file('profile_img')->move(public_path('uploads/profile_images'), $filename);
            $user->profile_img = $filename;
        }

        $user->save();

        return response()->json([
            'success' => true,
            'message' => 'Profile updated successfully'
        ]);
    }

    public function getOrders() {
        $user = auth()->user();

        $orders = Order::where('user_id', $user->id)->with('restaurant')->paginate(6);

        return response()->json([
            'success' => true,
            'data' => $orders->items(),
            'pagination' => (string) $orders->links(),
        ]);
    }

    public function getProfile() {
        $user = auth()->user();

        return response()->json([
            'success' => true,
            'message' => 'successfully',
            'user' => $user
        ]);
    }
}
