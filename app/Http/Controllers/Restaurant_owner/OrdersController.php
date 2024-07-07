<?php

namespace App\Http\Controllers\Restaurant_owner;

use App\Http\Controllers\Controller;
// use App\Mail\Mail as OrderMail;
use App\Models\Order;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
// use Illuminate\Support\Facades\Queue;

class OrdersController extends Controller
{
    public function getOrders(Request $request) {
        $validatedData = $request->validate([
            'status' => 'required|in:pending,canceled,accepted,completed',
        ]);

        $status = $validatedData['status'];
        $restaurant_id = $request->restaurant_id;

        $query = Order::where('restaurant_id', $restaurant_id)->where('status', $status)
        ->with(['order_details.menu', 'user']);

        $orders = $query->paginate(4);

        return response()->json([
            'success' => true,
            'orders' => $orders->items(),
            'pagination' => (string) $orders->links(),
        ]);
    }

    public function cancelOrder(Request $request) {
        $order = Order::findOrFail($request->id);

        $order->status = 'canceled';
        $order->save();

        $restaurant = Restaurant::select('restaurant_name')->where('id', $order->restaurant_id)->first();
        $restaurant_name = $restaurant->restaurant_name;

        $ownerEmail = $request->email;

        Mail::raw("Dear User, \n\nWe're sorry to cancel your order from our restaurant, $restaurant_name.", function($message) use ($ownerEmail) {
            $message->to($ownerEmail)
                    ->subject('Order Canceled');
        });

        // $subject = 'Order Canceled';
        // $message = "We're sorry to cancel your order from our restaurant";

        // Mail::to($ownerEmail)
        // ->queue(new OrderMail($restaurant_name, $subject, $message));

        return response()->json([
            'success' => true,
            'message' => 'Order canceled successfully',
        ]);
    }

    public function acceptOrder(Request $request) {
        $order = Order::findOrFail($request->id);

        $order->status = 'accepted';
        $order->save();

        $restaurant = Restaurant::select('restaurant_name')->where('id', $order->restaurant_id)->first();
        $restaurant_name = $restaurant->restaurant_name;

        $ownerEmail = $request->email;

        Mail::raw("Dear User, \n\nYour order is accepted successfully from our restaurant, $restaurant_name.", function($message) use ($ownerEmail) {
            $message->to($ownerEmail)
                    ->subject('Order Accepted');
        });

        return response()->json([
            'success' => true,
            'message' => 'Order accepted successfully',
        ]);
    }

    public function CompleteOrder(Request $request) {
        $order = Order::findOrFail($request->id);

        $order->status = 'completed';
        $order->save();

        return response()->json([
            'success' => true,
            'message' => 'Order completed successfully',
        ]);
    }
}
