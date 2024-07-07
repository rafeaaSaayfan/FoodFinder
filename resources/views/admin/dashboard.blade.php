@extends('layouts.dashboard.dashboard')

@section('content')

@include('admin.sideBar.sideBar')

<div class="container bg-qua h-full w-100 md:w-4/5 xs:px-2 xl:px-10 flex justify-center items-center">
    <div class="w-full h-full rounded bg-qua md:ps-10 lg:ps-10 xl:ps-5">
        <h1 class="text-3xl font-bold mb-6 pt-5 text-ter">Dashboard</h1>
        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6">
            <a class="tab1 cursor-pointer border-1 border-orange-600 flex items-center justify-between bg-white rounded-lg px-3 py-3 transition hover:scale-x-105">
                <div class="flex items-center gap-3">
                    <div class="w-14 h-14 bg-blue-500 text-white flex justify-center items-center rounded-full">
                        <i class="fas fa-store-alt"></i>
                    </div>
                    <div class="">
                        <h3 class="text-lg font-semibold text-sec opacity-80">Total Restaurants</h3>
                        <p class="text-sec font-bold">{{ $totalRestaurants }}</p>
                    </div>
                </div>
            </a>
            <a class="tab2 cursor-pointer border-1 flex items-center justify-between bg-white rounded-lg px-3 py-3 transition-transform hover:scale-x-105">
                <div class="flex items-center gap-3">
                    <div class="w-14 h-14 bg-green-500 text-white flex justify-center items-center rounded-full">
                        <i class="fas fa-users"></i>
                    </div>
                    <div class="">
                        <h3 class="text-lg font-semibold text-sec opacity-80">Total Customers</h3>
                        <p class="text-sec font-bold">{{ $totalCustomers }}</p>
                    </div>
                </div>
            </a>
            <a class="tab3 cursor-pointer border-1 flex items-center justify-between bg-white rounded-lg px-3 py-3 transition hover:scale-x-105">
                <div class="flex items-center gap-3">
                    <div class="w-14 h-14 bg-red-500 text-white flex justify-center items-center rounded-full">
                        <i class="fas fa-shopping-cart"></i>
                    </div>
                    <div class="">
                        <h3 class="text-lg font-semibold text-sec opacity-80">Total Orders</h3>
                        <p class="text-sec font-bold">{{ $totalOrders }}</p>
                    </div>
                </div>
            </a>
            <a class="tab4 cursor-pointer border-1 flex items-center justify-between bg-white rounded-lg px-3 py-3 transition hover:scale-x-105">
                <div class="flex items-center gap-3">
                    <div class="w-14 h-14 bg-yellow-500 text-white flex justify-center items-center rounded-full">
                        <i class="bi bi-coin text-xl"></i>
                    </div>
                    <div class="">
                        <h3 class="text-lg font-semibold text-sec opacity-80">Total Sales</h3>
                        <p class="text-sec font-bold">{{ $totalSales }}$</p>
                    </div>
                </div>
            </a>
        </div>

        <div class="w-full my-5" id="orders">
            <div class="w-full flex flex-wrap justify-between gap-4 gap-lg-0">
                <div class="w-full lg:w-7/12">
                    <p class="text-sec font-semibold mb-2 opacity-80">Restaurants registered last 3 months:</p>
                    <div class="card w-full flex items-center justify-center py-3 px-3">
                        <div class="flex flex-col w-full">
                            <div class="border-b border-s border-gray-700 p-3 flex flex-row justify-around gap-5 h-80">
                                @foreach ($restaurantCounts as $index => $restaurant)
                                    @php
                                        $heightClass = 'h-3';
                                        $color = '';

                                        if ($restaurant['count'] > 0) {
                                            if ($restaurant['count'] == max(array_column($restaurantCounts, 'count'))) {
                                                $heightClass = 'h-full';
                                            } elseif ($restaurant['count'] == min(array_column($restaurantCounts, 'count'))) {
                                                $heightClass = 'h-1/3';
                                            } else {
                                                $heightClass = 'h-2/3';
                                            }
                                        }

                                        if ($index == 0) {
                                            $color = 'bg-red-500';
                                        } elseif ($index == 1) {
                                            $color = 'bg-blue-500';
                                        } else {
                                            $color = 'bg-green-500';
                                        }
                                    @endphp
                                    <div class="w-5 h-full flex flex-col-reverse items-center gap-1">
                                        <div class="w-5 {{ $color }} {{ $heightClass }}"></div>
                                        <p>{{ $restaurant['count'] }}</p>
                                    </div>
                                @endforeach
                            </div>
                            <div class="flex items-center justify-between mt-1">
                                <div class="flex items-center gap-3 gap-md-4">
                                    @foreach ($restaurantCounts as $index => $restaurant)
                                    @php
                                    $color = '';
                                    if ($index == 0) {
                                    $color = 'bg-red-500';
                                    } elseif ($index == 1) {
                                    $color = 'bg-blue-500';
                                    } else {
                                    $color = 'bg-green-500';
                                    }
                                    @endphp
                                    <div class="flex items-center gap-1">
                                        <div class="py-1 px-2 {{ $color }}"></div>
                                        <div class="text-sec text-sm">{{ $restaurant['month_name'] }}</div>
                                    </div>
                                    @endforeach
                                </div>
                                <div class="text-sec text-sm">
                                    2024
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="w-full lg:w-2/5">
                    <div class="flex flex-col justify-around h-full">
                        <p class="text-sec font-semibold mb-2 opacity-80">Top 3 restaurants by:</p>
                        <div class="card flex flex-col w-full px-3 py-3">
                            <p class="text-ter font-semibold text-sm mb-2 opacity-90">Rating:</p>
                            <div class="border-b py-2 flex items-center justify-between">
                                <div class="flex items-center gap-2">
                                    <p class="text-sec opacity-80">1-</p>
                                    <p class="text-sec">{{ $topResRate[0]->restaurant_name }}</p>
                                </div>
                                <div class="flex gap-1 items-center">
                                    @for($i = 1; $i <= 5; $i++)
                                    <svg class="h-5 transition-all duration-100
                                    {{ $i <= $topResRate[0]->avg_rating ? 'fill-yellow-500' : 'fill-gray-500' }}"
                                    viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg"
                                    xmlns:xlink="http://www.w3.org/1999/xlink">
                                        <path d="M575.852903 115.426402L661.092435 288.054362c10.130509 20.465674 29.675227 34.689317 52.289797 37.963825l190.433097 27.62866c56.996902 8.288598 79.7138 78.281203 38.475467 118.496253l-137.836314 134.35715c-16.372539 15.963226-23.84251 38.987109-19.954032 61.49935l32.540421 189.716799c9.721195 56.792245-49.833916 100.077146-100.793444 73.267113L545.870691 841.446188a69.491196 69.491196 0 0 0-64.67153 0l-170.376737 89.537324c-50.959528 26.810033-110.51464-16.474868-100.793444-73.267113L242.569401 667.9996c3.888478-22.512241-3.581493-45.536125-19.954032-61.49935L84.779055 472.245428c-41.238333-40.215049-18.521435-110.207655 38.475467-118.496252l190.433097-27.62866c22.61457-3.274508 42.159288-17.498151 52.289797-37.963826L451.319277 115.426402c25.479764-51.675827 99.053862-51.675827 124.533626 0z"></path>
                                    </svg>
                                    @endfor
                                </div>
                            </div>
                            <div class="border-b py-2 flex items-center justify-between">
                                <div class="flex items-center gap-2">
                                    <p class="text-sec opacity-80">2-</p>
                                    <p class="text-sec">{{ $topResRate[1]->restaurant_name }}</p>
                                </div>
                                <div class="flex gap-1 items-center">
                                    @for($i = 1; $i <= 5; $i++)
                                    <svg class="h-5 transition-all duration-100
                                    {{ $i <= $topResRate[1]->avg_rating ? 'fill-yellow-500' : 'fill-gray-500' }}"
                                    viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg"
                                    xmlns:xlink="http://www.w3.org/1999/xlink">
                                        <path d="M575.852903 115.426402L661.092435 288.054362c10.130509 20.465674 29.675227 34.689317 52.289797 37.963825l190.433097 27.62866c56.996902 8.288598 79.7138 78.281203 38.475467 118.496253l-137.836314 134.35715c-16.372539 15.963226-23.84251 38.987109-19.954032 61.49935l32.540421 189.716799c9.721195 56.792245-49.833916 100.077146-100.793444 73.267113L545.870691 841.446188a69.491196 69.491196 0 0 0-64.67153 0l-170.376737 89.537324c-50.959528 26.810033-110.51464-16.474868-100.793444-73.267113L242.569401 667.9996c3.888478-22.512241-3.581493-45.536125-19.954032-61.49935L84.779055 472.245428c-41.238333-40.215049-18.521435-110.207655 38.475467-118.496252l190.433097-27.62866c22.61457-3.274508 42.159288-17.498151 52.289797-37.963826L451.319277 115.426402c25.479764-51.675827 99.053862-51.675827 124.533626 0z"></path>
                                    </svg>
                                    @endfor
                                </div>
                            </div>
                            <div class="border-b py-2 flex items-center justify-between">
                                <div class="flex items-center gap-2">
                                    <p class="text-sec opacity-80">3-</p>
                                    <p class="text-sec">{{ $topResRate[2]->restaurant_name }}</p>
                                </div>
                                <div class="flex gap-1 items-center">
                                    @for($i = 1; $i <= 5; $i++)
                                    <svg class="h-5 transition-all duration-100
                                    {{ $i <= $topResRate[2]->avg_rating ? 'fill-yellow-500' : 'fill-gray-500' }}"
                                    viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg"
                                    xmlns:xlink="http://www.w3.org/1999/xlink">
                                        <path d="M575.852903 115.426402L661.092435 288.054362c10.130509 20.465674 29.675227 34.689317 52.289797 37.963825l190.433097 27.62866c56.996902 8.288598 79.7138 78.281203 38.475467 118.496253l-137.836314 134.35715c-16.372539 15.963226-23.84251 38.987109-19.954032 61.49935l32.540421 189.716799c9.721195 56.792245-49.833916 100.077146-100.793444 73.267113L545.870691 841.446188a69.491196 69.491196 0 0 0-64.67153 0l-170.376737 89.537324c-50.959528 26.810033-110.51464-16.474868-100.793444-73.267113L242.569401 667.9996c3.888478-22.512241-3.581493-45.536125-19.954032-61.49935L84.779055 472.245428c-41.238333-40.215049-18.521435-110.207655 38.475467-118.496252l190.433097-27.62866c22.61457-3.274508 42.159288-17.498151 52.289797-37.963826L451.319277 115.426402c25.479764-51.675827 99.053862-51.675827 124.533626 0z"></path>
                                    </svg>
                                    @endfor
                                </div>
                            </div>
                        </div>
                        <div class="card w-full mt-2 flex xl:flex-row gap-4 items-center justify-between px-3 py-3">
                            <div class="flex flex-col w-full xl:w-1/2">
                                <p class="text-ter font-semibold mb-2 text-sm opacity-90">Orders:</p>
                                <div class="border-b py-2 flex items-center justify-between">
                                    <div class="flex items-center gap-2">
                                        <p class="text-sec opacity-80">1-</p>
                                        <p class="text-sec text-sm">{{ $topRestaurantOrders[0]->restaurant_name }}</p>
                                    </div>
                                    <p class="text-sec text-sm">{{ $topRestaurantOrders[0]->orders_count }} orders</p>
                                </div>
                                <div class="border-b py-2 flex items-center justify-between">
                                    <div class="flex items-center gap-2">
                                        <p class="text-sec opacity-80">2-</p>
                                        <p class="text-sec text-sm">{{ $topRestaurantOrders[1]->restaurant_name }}</p>
                                    </div>
                                    <p class="text-sec text-sm">{{ $topRestaurantOrders[1]->orders_count }} orders</p>
                                </div>
                                <div class="border-b py-2 flex items-center justify-between">
                                    <div class="flex items-center gap-2">
                                        <p class="text-sec opacity-80">3-</p>
                                        <p class="text-sec text-sm">{{ $topRestaurantOrders[2]->restaurant_name }}</p>
                                    </div>
                                    <p class="text-sec text-sm">{{ $topRestaurantOrders[2]->orders_count }} orders</p>
                                </div>
                            </div>
                            <div class="flex flex-col w-full xl:w-1/2">
                                <p class="text-ter font-semibold mb-2 text-sm opacity-90">Completed orders:</p>
                                <div class="border-b py-2 flex items-center justify-between">
                                    <div class="flex items-center gap-2">
                                        <p class="text-sec opacity-80">1-</p>
                                        <p class="text-sec text-sm">{{ $topRestaurantOrdersComp[0]->restaurant_name }}</p>
                                    </div>
                                    <p class="text-sec text-sm">{{ $topRestaurantOrdersComp[0]->orders_count }} orders</p>
                                </div>
                                <div class="border-b py-2 flex items-center justify-between">
                                    <div class="flex items-center gap-2">
                                        <p class="text-sec opacity-80">2-</p>
                                        <p class="text-sec text-sm">{{ $topRestaurantOrdersComp[1]->restaurant_name }}</p>
                                    </div>
                                    <p class="text-sec text-sm">{{ $topRestaurantOrdersComp[1]->orders_count }} orders</p>
                                </div>
                                <div class="border-b py-2 flex items-center justify-between">
                                    <div class="flex items-center gap-2">
                                        <p class="text-sec opacity-80">3-</p>
                                        <p class="text-sec text-sm">{{ $topRestaurantOrdersComp[2]->restaurant_name }}</p>
                                    </div>
                                    <p class="text-sec text-sm">{{ $topRestaurantOrdersComp[2]->orders_count }} orders</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="w-full hidden my-5" id="reviews">
            <div class="w-full flex flex-wrap justify-between gap-4 gap-lg-0">
                <div class="w-full lg:w-7/12">
                    <p class="text-sec font-semibold mb-2 opacity-80">Customers registered last 3 months:</p>
                    <div class="card w-full flex items-center justify-center py-3 px-3">
                        <div class="flex flex-col w-full">
                            <div class="border-b border-s border-gray-700 p-3 flex flex-row justify-around gap-5 h-80">
                                @foreach ($customerCounts as $index => $customer)
                                @php
                                $heightClass = 'h-3';
                                $color = '';

                                if ($customer['count'] > 0) {
                                if ($customer['count'] == max(array_column($customerCounts, 'count'))) {
                                $heightClass = 'h-full';
                                } elseif ($customer['count'] == min(array_column($customerCounts, 'count'))) {
                                $heightClass = 'h-1/3';
                                } else {
                                $heightClass = 'h-2/3';
                                }
                                }

                                if ($index == 0) {
                                $color = 'bg-red-500';
                                } elseif ($index == 1) {
                                $color = 'bg-blue-500';
                                } else {
                                $color = 'bg-green-500';
                                }
                                @endphp
                                <div class="w-5 h-full flex flex-col-reverse items-center gap-1">
                                    <div class="w-5 {{ $color }} {{ $heightClass }}"></div>
                                    <p>{{ $customer['count'] }}</p>
                                </div>
                                @endforeach
                            </div>
                            <div class="flex items-center justify-between mt-1">
                                <div class="flex items-center gap-3 gap-md-4">
                                    @foreach ($customerCounts as $index => $customer)
                                    @php
                                    $color = '';
                                    if ($index == 0) {
                                    $color = 'bg-red-500';
                                    } elseif ($index == 1) {
                                    $color = 'bg-blue-500';
                                    } else {
                                    $color = 'bg-green-500';
                                    }
                                    @endphp
                                    <div class="flex items-center gap-1">
                                        <div class="py-1 px-2 {{ $color }}"></div>
                                        <div class="text-sec text-sm">{{ $customer['month_name'] }}</div>
                                    </div>
                                    @endforeach
                                </div>
                                <div class="text-sec text-sm">
                                    2024
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="w-full lg:w-2/5">
                    <div class="flex flex-col justify-around h-full">
                        <p class="text-sec font-semibold mb-2 opacity-80">Top 3 customers by:</p>
                        <div class="card flex flex-col w-full px-3 py-3">
                            <p class="text-ter font-semibold mb-2 text-sm opacity-90">Orders:</p>
                            <div class="border-b py-2 flex items-center justify-between">
                                <div class="flex items-center gap-2">
                                    <p class="text-sec opacity-80">1-</p>
                                    <p class="text-sec text-sm">
                                        {{ $topCustomerOrders[0]->username ? $topCustomerOrders[0]->username : $topCustomerOrders[0]->email }}
                                    </p>
                                </div>
                                <p class="text-sec text-sm">{{ $topCustomerOrders[0]->orders_count }} orders</p>
                            </div>
                            <div class="border-b py-2 flex items-center justify-between">
                                <div class="flex items-center gap-2">
                                    <p class="text-sec opacity-80">2-</p>
                                    <p class="text-sec text-sm">{{ $topCustomerOrders[1]->username ? $topCustomerOrders[1]->username : $topCustomerOrders[1]->email }}</p>
                                </div>
                                <p class="text-sec text-sm">{{ $topCustomerOrders[1]->orders_count }} orders</p>
                            </div>
                            <div class="border-b py-2 flex items-center justify-between">
                                <div class="flex items-center gap-2">
                                    <p class="text-sec opacity-80">3-</p>
                                    <p class="text-sec text-sm">{{ $topCustomerOrders[2]->username ? $topCustomerOrders[2]->username : $topCustomerOrders[2]->email }}</p>
                                </div>
                                <p class="text-sec text-sm">{{ $topCustomerOrders[2]->orders_count }} orders</p>
                            </div>
                        </div>
                        <div class="card w-full mt-2 flex xl:flex-row gap-4 items-center justify-between px-3 py-3">
                            <div class="flex flex-col w-full">
                                <p class="text-ter font-semibold mb-2 text-sm opacity-90">Completed orders:</p>
                                <div class="border-b py-2 flex items-center justify-between">
                                    <div class="flex items-center gap-2">
                                        <p class="text-sec opacity-80">1-</p>
                                        <p class="text-sec text-sm">{{ $topCustomerComp[0]->username ? $topCustomerComp[0]->username : $topCustomerComp[0]->email }}</p>
                                    </div>
                                    <p class="text-sec text-sm">{{ $topCustomerComp[0]->orders_count }} orders</p>
                                </div>
                                <div class="border-b py-2 flex items-center justify-between">
                                    <div class="flex items-center gap-2">
                                        <p class="text-sec opacity-80">2-</p>
                                        <p class="text-sec text-sm">{{ $topCustomerComp[1]->username ? $topCustomerComp[1]->username : $topCustomerComp[1]->email }}</p>
                                    </div>
                                    <p class="text-sec text-sm">{{ $topCustomerComp[1]->orders_count }} orders</p>
                                </div>
                                <div class="border-b py-2 flex items-center justify-between">
                                    <div class="flex items-center gap-2">
                                        <p class="text-sec opacity-80">3-</p>
                                        <p class="text-sec text-sm">{{ $topCustomerComp[2]->username ? $topCustomerComp[2]->username : $topCustomerComp[2]->email }}</p>
                                    </div>
                                    <p class="text-sec text-sm">{{ $topCustomerComp[2]->orders_count }} orders</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="w-full hidden my-5" id="stores">
            <div class="w-full flex flex-wrap justify-between gap-4 gap-lg-0">
                <div class="w-full lg:w-7/12">
                    <p class="text-sec font-semibold mb-4 opacity-80">Orders maked last 3 months:</p>
                    <div class="card w-full flex items-center justify-center py-4 px-3">
                        <div class="flex flex-col w-full">
                            <div class="border-b border-s border-gray-700 p-3 flex flex-row justify-around gap-5 h-80">
                                @foreach ($orderCounts as $index => $order)
                                @php
                                $heightClass = 'h-3';
                                $color = '';

                                if ($order['count'] > 0) {
                                if ($order['count'] == max(array_column($orderCounts, 'count'))) {
                                $heightClass = 'h-full';
                                } elseif ($order['count'] == min(array_column($orderCounts, 'count'))) {
                                $heightClass = 'h-1/3';
                                } else {
                                $heightClass = 'h-2/3';
                                }
                                }

                                if ($index == 0) {
                                $color = 'bg-red-500';
                                } elseif ($index == 1) {
                                $color = 'bg-blue-500';
                                } else {
                                $color = 'bg-green-500';
                                }
                                @endphp
                                <div class="w-5 h-full flex flex-col-reverse items-center gap-1">
                                    <div class="w-5 {{ $color }} {{ $heightClass }}"></div>
                                    <p>{{ $order['count'] }}</p>
                                </div>
                                @endforeach
                            </div>
                            <div class="flex items-center justify-between mt-1">
                                <div class="flex items-center gap-3 gap-md-4">
                                    @foreach ($orderCounts as $index => $order)
                                    @php
                                    $color = '';
                                    if ($index == 0) {
                                    $color = 'bg-red-500';
                                    } elseif ($index == 1) {
                                    $color = 'bg-blue-500';
                                    } else {
                                    $color = 'bg-green-500';
                                    }
                                    @endphp
                                    <div class="flex items-center gap-1">
                                        <div class="py-1 px-2 {{ $color }}"></div>
                                        <div class="text-sec text-sm">{{ $order['month_name'] }}</div>
                                    </div>
                                    @endforeach
                                </div>
                                <div class="text-sec text-sm">
                                    2024
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="w-full lg:w-2/5">
                    <div class="flex flex-col justify-around h-full">
                        <div class="card flex flex-col w-full px-3 py-3">
                            <p class="text-ter font-semibold mb-2 text-sm opacity-90">Top 3 users by orders:</p>
                            <div class="border-b py-2 flex items-center justify-between">
                                <div class="flex items-center gap-2">
                                    <p class="text-sec opacity-80">1-</p>
                                    <p class="text-sec text-sm">
                                        {{ $topUserOrders[0]->username ? $topUserOrders[0]->username : $topUserOrders[0]->email }}
                                    </p>
                                </div>
                                <p class="text-sec text-sm">{{ $topUserOrders[0]->orders_count }} orders</p>
                            </div>
                            <div class="border-b py-2 flex items-center justify-between">
                                <div class="flex items-center gap-2">
                                    <p class="text-sec opacity-80">2-</p>
                                    <p class="text-sec text-sm">
                                        {{ $topUserOrders[1]->username ? $topUserOrders[1]->username : $topUserOrders[1]->email }}
                                    </p>
                                </div>
                                <p class="text-sec text-sm">{{ $topUserOrders[1]->orders_count }} orders</p>
                            </div>
                            <div class="border-b py-2 flex items-center justify-between">
                                <div class="flex items-center gap-2">
                                    <p class="text-sec opacity-80">3-</p>
                                    <p class="text-sec text-sm">
                                        {{ $topUserOrders[2]->username ? $topUserOrders[2]->username : $topUserOrders[2]->email }}
                                    </p>
                                </div>
                                <p class="text-sec text-sm">{{ $topUserOrders[2]->orders_count }} orders</p>
                            </div>
                        </div>
                        <div class="card w-full mt-2 flex xl:flex-row gap-4 items-center justify-between px-3 py-3">
                            <div class="flex flex-col w-full">
                                <p class="text-ter font-semibold text-sm opacity-90">Orders details:</p>
                                @foreach ($orderPercentages as $order)
                                    @php
                                        $Color = '';
                                        if ($order['status'] == 'canceled') {
                                            $Color = 'red';
                                        } elseif ($order['status'] == 'pending') {
                                            $Color = 'gray';
                                        } elseif ($order['status'] == 'accepted') {
                                            $Color = 'blue';
                                        } elseif ($order['status'] == 'completed') {
                                            $Color = 'green';
                                        }

                                    @endphp
                                    <div class="flex justify-between mb-1 mt-3">
                                        <span class="text-sm font-medium text-{{ $Color }}-500">{{ ucfirst($order['status']) }}({{ $order['count'] }})</span>
                                        <span class="text-sm font-medium text-ter">{{ number_format($order['percentage'], 2) }}%</span>
                                    </div>
                                    <div class="w-full bg-gray-200 rounded-full h-2.5">
                                        <div class="bg-{{ $Color }}-500 h-2.5 rounded-full" style="width: {{ $order['percentage'] }}%"></div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="w-full hidden my-5" id="updateProfile">
            <div class="w-full flex flex-wrap justify-between gap-4 gap-lg-0">
                <div class="w-full lg:w-7/12">
                    <p class="text-sec font-semibold mb-2 opacity-80">Sales in the last 3 months:</p>
                    <div class="card w-full flex items-center justify-center py-3 px-3">
                        <div class="flex flex-col w-full">
                            <div class="border-b border-s border-gray-700 p-3 flex flex-row justify-around gap-5 h-80">
                                @foreach ($sales as $index => $sale)
                                @php
                                $heightClass = 'h-3';
                                $color = '';

                                if ($sale['sales'] > 0) {
                                if ($sale['sales'] == max(array_column($sales, 'sales'))) {
                                $heightClass = 'h-full';
                                } elseif ($sale['sales'] == min(array_column($sales, 'sales'))) {
                                $heightClass = 'h-1/3';
                                } else {
                                $heightClass = 'h-2/3';
                                }
                                }

                                if ($index == 0) {
                                $color = 'bg-red-500';
                                } elseif ($index == 1) {
                                $color = 'bg-blue-500';
                                } else {
                                $color = 'bg-green-500';
                                }
                                @endphp
                                <div class="w-5 h-full flex flex-col-reverse items-center gap-1">
                                    <div class="w-5 {{ $color }} {{ $heightClass }}"></div>
                                    <p>{{ $sale['sales'] }}$</p>
                                </div>
                                @endforeach
                            </div>
                            <div class="flex items-center justify-between mt-1">
                                <div class="flex items-center gap-3 gap-md-4">
                                    @foreach ($sales as $index => $sale)
                                    @php
                                    $color = '';
                                    if ($index == 0) {
                                    $color = 'bg-red-500';
                                    } elseif ($index == 1) {
                                    $color = 'bg-blue-500';
                                    } else {
                                    $color = 'bg-green-500';
                                    }
                                    @endphp
                                    <div class="flex items-center gap-1">
                                        <div class="py-1 px-2 {{ $color }}"></div>
                                        <div class="text-sec text-sm">{{ $sale['month_name'] }}</div>
                                    </div>
                                    @endforeach
                                </div>
                                <div class="text-sec text-sm">
                                    2024
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="w-full lg:w-2/5">
                    <div class="flex flex-col justify-around h-full">
                        <div class="card flex flex-col w-full px-3 py-3 mt-1">
                            <p class="text-ter font-semibold mb-3 text-sm opacity-90">Top 3 users with highest purchases:</p>
                            <div class="border-b py-2 flex items-center justify-between">
                                <div class="flex items-center gap-2">
                                    <p class="text-sec opacity-80">1-</p>
                                    <p class="text-sec text-sm">
                                        {{ $topUserPurchase[0]->username ? $topUserPurchase[0]->username : $topUserPurchase[0]->email }}
                                    </p>
                                </div>
                                <p class="text-sec text-sm">
                                    {{ $topUserPurchase[0]->completed_orders_sum_total_price ? $topUserPurchase[0]->completed_orders_sum_total_price : '0' }}$
                                </p>
                            </div>
                            <div class="border-b py-2 flex items-center justify-between">
                                <div class="flex items-center gap-2">
                                    <p class="text-sec opacity-80">2-</p>
                                    <p class="text-sec text-sm">
                                        {{ $topUserPurchase[1]->username ? $topUserPurchase[1]->username : $topUserPurchase[1]->email }}
                                    </p>
                                </div>
                                <p class="text-sec text-sm">
                                    {{ $topUserPurchase[1]->completed_orders_sum_total_price ? $topUserPurchase[1]->completed_orders_sum_total_price : '0' }}$
                                </p>
                            </div>
                            <div class="border-b py-2 flex items-center justify-between">
                                <div class="flex items-center gap-2">
                                    <p class="text-sec opacity-80">3-</p>
                                    <p class="text-sec text-sm">
                                        {{ $topUserPurchase[2]->username ? $topUserPurchase[2]->username : $topUserPurchase[2]->email }}
                                    </p>
                                </div>
                                <p class="text-sec text-sm">
                                    {{ $topUserPurchase[2]->completed_orders_sum_total_price ? $topUserPurchase[2]->completed_orders_sum_total_price : '0' }}$
                                </p>
                            </div>
                        </div>
                        <div class="card w-full mt-4 flex xl:flex-row gap-4 items-center justify-between px-3 py-3">
                            <div class="flex flex-col w-full">
                                <p class="text-ter font-semibold text-sm mb-3 opacity-90">Top 3 restaurants with highest sales:</p>
                                <div class="border-b py-2 flex items-center justify-between">
                                    <div class="flex items-center gap-2">
                                        <p class="text-sec opacity-80">1-</p>
                                        <p class="text-sec text-sm">
                                            {{ $topResSale[0]->restaurant_name ? $topResSale[0]->restaurant_name : $topResSale[0]->restaurant_email }}
                                        </p>
                                    </div>
                                    <p class="text-sec text-sm">
                                        {{ $topResSale[0]->completed_orders_sum_total_price ? $topResSale[0]->completed_orders_sum_total_price : '0' }}$
                                    </p>
                                </div>
                                <div class="border-b py-2 flex items-center justify-between">
                                    <div class="flex items-center gap-2">
                                        <p class="text-sec opacity-80">2-</p>
                                        <p class="text-sec text-sm">
                                            {{ $topResSale[1]->restaurant_name ? $topResSale[1]->restaurant_name : $topResSale[1]->restaurant_email }}
                                        </p>
                                    </div>
                                    <p class="text-sec text-sm">
                                        {{ $topResSale[1]->completed_orders_sum_total_price ? $topResSale[1]->completed_orders_sum_total_price : '0' }}$
                                    </p>
                                </div>
                                <div class="border-b py-2 flex items-center justify-between">
                                    <div class="flex items-center gap-2">
                                        <p class="text-sec opacity-80">3-</p>
                                        <p class="text-sec text-sm">
                                            {{ $topResSale[2]->restaurant_name ? $topResSale[2]->restaurant_name : $topResSale[2]->restaurant_email }}
                                        </p>
                                    </div>
                                    <p class="text-sec text-sm">
                                        {{ $topResSale[2]->completed_orders_sum_total_price ? $topResSale[2]->completed_orders_sum_total_price : '0' }}$
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</div>
@endsection

@push('scripts')
    <script src="{{ asset('js/admin/dashboard.js') }}" type="module"></script>
@endpush
