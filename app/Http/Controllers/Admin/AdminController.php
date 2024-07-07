<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Restaurant;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard() {
        $totalRestaurants = Restaurant::where('status', 'approved')->count();
        $totalCustomers = User::where('role', 'customer')->count();
        $totalOrders = Order::count();
        $totalSales = Order::where('status', 'completed')->sum('total_price');

        $restaurantCounts = $this->lastMonthsResRegister();
        $topRestaurantOrders = $this->topResOrders();
        $topRestaurantOrdersComp = $this->topResOrdersComp();
        $topResRate = $this->topResRate();

        $customerCounts = $this->lastMonthCusRegister();
        $topCustomerOrders = $this->topCusOrders();
        $topCustomerComp = $this->topCusOrdersComp();

        $orderCounts = $this->lastMonthOrder();
        $topUserOrders = $this->topUserOrders();
        $orderPercentages = $this->orderStatusPercentages();

        $sales = $this->lastMonthSale();
        $topUserPurchase = $this->topUserPurchase();
        $topResSale = $this->topResSale();

        return view('admin.dashboard')->with([
            'totalRestaurants' => $totalRestaurants,
            'totalCustomers' => $totalCustomers,
            'totalOrders' => $totalOrders,
            'totalSales' => $totalSales,

            'restaurantCounts' => $restaurantCounts,
            'topRestaurantOrders' => $topRestaurantOrders,
            'topRestaurantOrdersComp' => $topRestaurantOrdersComp,
            'topResRate' => $topResRate,

            'customerCounts' => $customerCounts,
            'topCustomerOrders' => $topCustomerOrders,
            'topCustomerComp' => $topCustomerComp,

            'orderCounts' => $orderCounts,
            'topUserOrders' => $topUserOrders,
            'orderPercentages' => $orderPercentages,

            'sales' => $sales,
            'topUserPurchase' => $topUserPurchase,
            'topResSale' => $topResSale
        ]);
    }

    public function users() {
        return view('admin.users');
    }

    public function restaurants() {
        return view('admin.restaurants');
    }

    public function restaurant_request() {
        return view('admin.restaurant_request');
    }





    private function lastMonthsResRegister() {
        $restaurantsCounts = [];

        $endDate = Carbon::now();
        $startDate = Carbon::now()->subMonths(2);

        while ($startDate <= $endDate) {
            $monthName = $startDate->monthName;

            $restaurantCounts = Restaurant::whereMonth('created_at', $startDate->month)
            ->whereYear('created_at', $startDate->year)
            ->count();

            $restaurantsCounts[] = [
                'month_name' => $monthName,
                'count' => $restaurantCounts,
            ];

            $startDate->addMonth();
        }
        $currentMonthCount = Order::whereYear('created_at', $endDate->year)
        ->whereMonth('created_at', $endDate->month)
        ->count();

        $restaurantsCounts[] = [
            'month_name' => $endDate->monthName,
            'count' => $currentMonthCount,
        ];

        return $restaurantsCounts;
    }

    private function topResOrders() {
        $topRestaurantOrders = Restaurant::withCount('orders')
        ->orderByDesc('orders_count')
        ->limit(3)
        ->get();

        return $topRestaurantOrders;
    }

    private function topResOrdersComp() {
        $topRestaurantsComp = Restaurant::withCount(['orders' => function ($query) {
            $query->where('status', 'completed');
        }])
        ->orderByDesc('orders_count')
        ->limit(3)
        ->get();

        return $topRestaurantsComp;
    }

    private function topResRate() {
        $topResRate = Restaurant::join('restaurant_reviews', 'restaurants.id', '=', 'restaurant_reviews.restaurant_id')
        ->select('restaurants.*', DB::raw('AVG(restaurant_reviews.rating) as avg_rating'))
        ->groupBy('restaurants.id')
        ->orderByDesc('avg_rating')
        ->limit(3)
        ->get();


        return $topResRate;
    }


    private function lastMonthCusRegister() {
        $customersCounts = [];

        $endDate = Carbon::now();
        $startDate = Carbon::now()->subMonths(2);

        while ($startDate <= $endDate) {
            $monthName = $startDate->monthName;

            $customerCounts = User::where('role', 'customer')
            ->whereMonth('created_at', $startDate->month)
            ->whereYear('created_at', $startDate->year)
            ->count();

            $customersCounts[] = [
                'month_name' => $monthName,
                'count' => $customerCounts,
            ];

            $startDate->addMonth();
        }
        $currentMonthCount = Order::whereYear('created_at', $endDate->year)
        ->whereMonth('created_at', $endDate->month)
        ->count();

        $customersCounts[] = [
            'month_name' => $endDate->monthName,
            'count' => $currentMonthCount,
        ];

        return $customersCounts;
    }

    private function topCusOrders() {
        $topCustomerOrders = User::where('role', 'customer')->withCount('orders')
        ->orderByDesc('orders_count')
        ->limit(3)
        ->get();

        return $topCustomerOrders;
    }

    private function topCusOrdersComp() {
        $topCustomerComp = User::where('role', 'customer')->withCount(['orders' => function ($query) {
            $query->where('status', 'completed');
        }])
        ->orderByDesc('orders_count')
        ->limit(3)
        ->get();

        return $topCustomerComp;
    }


    private function lastMonthOrder() {
        $ordersCounts = [];

        $endDate = Carbon::now();
        $startDate = Carbon::now()->subMonths(2);

        while ($startDate <= $endDate) {
            $monthName = $startDate->monthName;

            $orderCount = Order::whereMonth('created_at', $startDate->month)
            ->whereYear('created_at', $startDate->year)
            ->count();

            $ordersCounts[] = [
                'month_name' => $monthName,
                'count' => $orderCount,
            ];

            $startDate->addMonth();
        }
        $currentMonthCount = Order::whereYear('created_at', $endDate->year)
            ->whereMonth('created_at', $endDate->month)
            ->count();

        $ordersCounts[] = [
            'month_name' => $endDate->monthName,
            'count' => $currentMonthCount,
        ];

        return $ordersCounts;
    }

    private function topUserOrders() {
        $topUserOrders = User::withCount('orders')
        ->orderByDesc('orders_count')
        ->limit(3)
        ->get();

        return $topUserOrders;
    }

    private function orderStatusPercentages() {
        $ordersGroupedByStatus = Order::select('status', DB::raw('count(*) as count'))
            ->groupBy('status')
            ->get();

        $totalOrders = Order::count();

        $orderPercentages = $ordersGroupedByStatus->map(function($order) use ($totalOrders) {
            return [
                'status' => $order->status,
                'count' => $order->count,
                'percentage' => ($order->count / $totalOrders) * 100
            ];
        });

        return $orderPercentages;
    }


    private function lastMonthSale() {
        $salesCounts = [];

        $endDate = Carbon::now();
        $startDate = Carbon::now()->subMonths(2);

        while ($startDate <= $endDate) {
            $monthName = $startDate->monthName;

            $saleSum = Order::where('status', 'completed')
            ->whereMonth('created_at', $startDate->month)
            ->whereYear('created_at', $startDate->year)
            ->sum('total_price');

            $salesCounts[] = [
                'month_name' => $monthName,
                'sales' => $saleSum,
            ];

            $startDate->addMonth();
        }
        $currentMonthSales = Order::where('status', 'completed')
        ->whereYear('created_at', $endDate->year)
        ->whereMonth('created_at', $endDate->month)
        ->sum('total_price');

        $salesCounts[] = [
            'month_name' => $endDate->monthName,
            'sales' => $currentMonthSales,
        ];

        return $salesCounts;
    }

    private function topUserPurchase() {
        $topUserPurchase = User::withSum('completedOrders', 'total_price')
        ->orderByDesc('completed_orders_sum_total_price')
        ->limit(3)
        ->get();

        return $topUserPurchase;
    }

    private function topResSale() {
        $topResSale = Restaurant::withSum('completedOrders', 'total_price')
        ->orderByDesc('completed_orders_sum_total_price')
        ->limit(3)
        ->get();

        return $topResSale;
    }

}
