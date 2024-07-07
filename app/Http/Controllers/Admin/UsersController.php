<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class UsersController extends Controller
{
    public function getUsers(Request $request) {
        $query = User::query();

        if ($request->has('search') && !empty($request->input('search'))) {
            $query->where('email', 'like', '%' . $request->input('search') . '%');
        }

        if ($request->has('customer') && $request->input('customer') == 'true') {
            $query->where('role', 'customer');
        }

        if ($request->has('restaurant') && $request->input('restaurant') == 'true') {
            $query->where('role', 'restaurant_owner');
        }

        if ($request->has('admin') && $request->input('admin') == 'true') {
            $query->where('role', 'admin');
        }

        $users = $query->paginate(8);

        return response()->json([
            'success' => true,
            'data' => $users->items(),
            'pagination' => (string) $users->links(),
        ]);

    }

    public function changeRole(Request $request) {
        $currentUserId = auth()->user()->id;
        $userId = $request->input('id');
        $action = $request->input('role');

        if ($userId != $currentUserId) {
            $user = User::findOrFail($userId);

            if ($action == 'Make admin') {
                $user->role = 'admin';
            } elseif ($action == 'Dismiss to customer') {
                $user->role = 'customer';
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Invalid action specified.',
                ], 400);
            }

            $user->save();

            return response()->json([
                'success' => true,
                'message' => 'User role updated successfully.',
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'You cannot change your own role.',
            ]);
        }
    }

    public function deletUser(Request $request) {
        $currentUserId = auth()->user()->id;
        $userIdToDelete = $request->input('id');

        if ($userIdToDelete != $currentUserId) {
            try {
                $user = User::findOrFail($userIdToDelete);
                $user->delete();

                return response()->json([
                    'success' => true,
                    'message' => 'User deleted successfully.',
                ]);
            } catch (\Exception $e) {
                return response()->json([
                    'success' => false,
                    'message' => 'User not found or could not be deleted.',
                ], 404);
            }
        } else {
            return response()->json([
                'success' => false,
                'message' => 'You cannot delete your own account.',
            ]);
        }
    }

    public function profile($id) {
        $user = User::find($id);

        $joinedDate = Carbon::parse($user->created_at)->diffForHumans();

        $totalSpent = Order::where('user_id', $user->id)->where('status', 'completed')->sum('total_price');
        $lastOrder = Order::where('user_id', $user->id)->orderBy('created_at', 'desc')->first();
        $lastOrder = $lastOrder ? Carbon::parse($lastOrder->created_at)->diffForHumans() : 'no order';
        $totalOrder = Order::where('user_id', $user->id)->where('status', 'completed')->count();
        $totalOrders = Order::where('user_id', $user->id)->count();

        return view('admin.profile')->with([
            'user' => $user,
            'joinedDate' => $joinedDate,
            'totalSpent' => $totalSpent,
            'lastOrder' => $lastOrder,
            'totalOrder' => $totalOrder,
            'totalOrders' => $totalOrders,
        ]);
    }

    public function getOrders(Request $request) {
        $validated = $request->validate([
            'user_id' => 'required|integer|exists:users,id',
        ]);

        $user_id = $validated['user_id'];

        $orders = Order::where('user_id', $user_id)->with('restaurant')->paginate(6);

        return response()->json([
            'success' => true,
            'data' => $orders->items(),
            'pagination' => (string) $orders->links(),
        ]);
    }

    public function deletUserProfile($id) {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('users')->with('success', 'User profile deleted successfully.');
    }
}
