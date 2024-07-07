<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Restaurant;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index()
    {
        $user = auth()->user();
        $resCount = Restaurant::count();

        return view('home', [
            'user' => $user,
            'resCount' => $resCount,
        ]);
    }

    public function getRestaurants(Request $request) {
        $query = Restaurant::where('status', 'approved')
        ->withCount(['orders as total_orders' => function ($query) {
            $query->where('status', 'completed');
        }])
        ->withAvg('restaurant_reviews', 'rating')
        ->with('restaurant_images');

        if ($request->has('search') && !empty($request->input('search'))) {
            $query->where('restaurant_name', 'like', '%' . $request->input('search') . '%');
        }

        if ($request->has('bestRate') && $request->input('bestRate') == 'true') {
            $query->orderBy('restaurant_reviews_avg_rating', 'desc');
        }

        if ($request->has('bestSale') && $request->input('bestSale') == 'true') {
            $query->orderBy('total_orders', 'desc');
        }

        $restaurants = $query->paginate(6);

        return response()->json([
            'success' => true,
            'data' => $restaurants->items(),
            'pagination' => (string) $restaurants->links()
        ]);
    }
}
