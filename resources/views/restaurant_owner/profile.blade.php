@extends('layouts.dashboard.dashboard')

@section('content')

@include('restaurant_owner.sideBar.sideBar')

<div class="container bg-qua w-full w-full md:w-3/4 lg:w-4/5 h-full px-0 xl:px-10 flex justify-center items-center"
    style="min-height: 100vh;">
    <div class="w-full h-full rounded-lg mt-3 px-2 px-md-5">
        <div class="bg-transparent w-full">
            <div class="card rounded-md shadow-md">
                <div class="bg-cover bg-center rounded-t-md"
                    style="min-height: 450px; background-image:url('{{ asset('uploads/restaurant_images/' . $restaurant->profile_image) }}');">
                </div>
                <div class="pb-3">
                    <div class="w-full lg:col-auto">
                        <div class="my-3 px-3 flex flex-col gap-1">
                            <h2 class="font-bold text-3xl text-ter">{{ $restaurant->restaurant_name }}</h2>
                            @php
                            $restaurant_reviews = $reviews->restaurant_reviews;
                            $totalRatings = 0;
                            $reviewCount = $restaurant_reviews->count();

                            foreach ($restaurant_reviews as $review) {
                            $totalRatings += $review->rating;
                            }

                            if ($reviewCount > 0) {
                            $averageRating = $totalRatings / $reviewCount;
                            } else {
                            $averageRating = 0;
                            }
                            @endphp
                            <div class="flex flex-row gap-2 mb-1">
                                <div class="rating flex flex-row gap-1">
                                    @for ($i = 1; $i <= 5; $i++) <svg class="star h-5 transition-all duration-100
                                            {{ $i <= $averageRating ? 'fill-yellow-500' : 'fill-gray-500' }}"
                                        viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg"
                                        xmlns:xlink="http://www.w3.org/1999/xlink">
                                        <path
                                            d="M575.852903 115.426402L661.092435 288.054362c10.130509 20.465674 29.675227 34.689317 52.289797 37.963825l190.433097 27.62866c56.996902 8.288598 79.7138 78.281203 38.475467 118.496253l-137.836314 134.35715c-16.372539 15.963226-23.84251 38.987109-19.954032 61.49935l32.540421 189.716799c9.721195 56.792245-49.833916 100.077146-100.793444 73.267113L545.870691 841.446188a69.491196 69.491196 0 0 0-64.67153 0l-170.376737 89.537324c-50.959528 26.810033-110.51464-16.474868-100.793444-73.267113L242.569401 667.9996c3.888478-22.512241-3.581493-45.536125-19.954032-61.49935L84.779055 472.245428c-41.238333-40.215049-18.521435-110.207655 38.475467-118.496252l190.433097-27.62866c22.61457-3.274508 42.159288-17.498151 52.289797-37.963826L451.319277 115.426402c25.479764-51.675827 99.053862-51.675827 124.533626 0z">
                                        </path>
                                        </svg>
                                        @endfor
                                </div>
                                <p class="px-1 text-sm text-sec opacity-70 font-semibold">{{$reviewCount}} reviews</p>
                            </div>
                            <div class="flex opacity-70 gap-2">
                                <svg width="22" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg">
                                    <title />
                                    <g id="About">
                                        <path class="fill-gray-700"
                                            d="M22.6787,5H9.3213A4.3216,4.3216,0,0,0,5,9.3218V22.6782A4.3216,4.3216,0,0,0,9.3213,27H22.6787A4.3216,4.3216,0,0,0,27,22.6782V9.3218A4.3216,4.3216,0,0,0,22.6787,5ZM16,9.0625a1.5,1.5,0,1,1-1.5,1.5A1.5,1.5,0,0,1,16,9.0625ZM18.0625,23h-4a1,1,0,0,1,0-2H15V15h-.9375a1,1,0,0,1,0-2H17v8h1.0625a1,1,0,0,1,0,2Z" />
                                    </g>
                                </svg>
                                <p class="text-sec hover:text-gray-700 font-semibold break-words">
                                    {{ $restaurant->description }}
                                </p>
                            </div>
                        </div>
                        <div class="flex flex-wrap justify-around w-full px-3 mt-3">
                            <div class="col-12 col-md-6 rounded shadow-xs border">
                                <div class="flex flex-col p-3 gap-1 text-xs md:text-base">
                                    <div class="flex gap-1 items-center">
                                        <i class="bi bi-envelope text-sec opacity-80"></i>
                                        <p class="text-sec opacity-80">Email</p>
                                    </div>
                                    <a href="mailto:{{ $restaurant->restaurant_email }}"
                                        class="text-sec px-3 font-semibold hover:text-orange-600">
                                        {{ $restaurant->restaurant_email }}
                                    </a>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 mt-3 mt-md-0 rounded shadow-xs border">
                                <div class="flex flex-col p-3 gap-1 text-xs md:text-base">
                                    <div class="flex gap-1 items-center">
                                        <i class="bi bi-phone text-sec opacity-80"></i>
                                        <p class="text-sec opacity-80">Phone number</p>
                                    </div>
                                    <a href="tel:{{ $restaurant->restaurant_phone }}"
                                        class="text-sec px-3 font-semibold hover:text-orange-600">
                                        {{ $restaurant->restaurant_phone }}
                                    </a>
                                </div>
                            </div>
                            <div class="col-12 rounded shadow-xs border mt-3">
                                <div class="flex flex-col p-3 gap-1 text-xs md:text-base">
                                    <div class="flex gap-1 items-center">
                                        <i class="bi bi-geo-alt text-sec opacity-80"></i>
                                        <p class="text-sec opacity-80">Location</p>
                                    </div>
                                    <a href="{{ $restaurant->address }}"
                                        class="text-sec px-3 font-semibold hover:text-orange-600" target="_blank">
                                        See location
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="my-4 card rounded-md shadow-md">
                <div class="pb-3">
                    <div class="lg:col-auto w-full pt-4 px-4 px-md-5">
                        <div class="border-b w-full flex flex-wrap items-center justify-between">
                            <a class="tab3 text-nowrap cursor-pointer pb-2 text-ter border-b-2 border-orange-600">
                                <div class="w-full flex items-center gap-1 text-xs md:text-base">
                                    <span class="fas fa-shopping-cart"></span>
                                    <span>
                                        Orders
                                        <span class="text-body-tertiary fw-normal">({{ $totalOrders }})</span>
                                    </span>
                                </div>
                            </a>
                            <a class="tab2 text-nowrap cursor-pointer pb-2 text-sec">
                                <div class="w-full flex items-center gap-1 text-xs md:text-base">
                                    <span class="far fa-images"></span>
                                    <span>
                                        Images
                                    </span>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="w-full pt-3 px-3 px-md-5" id="stores">
                        <div class="flex items-center gap-5 flex-wrap px-3 pt-3">
                            <div
                                class="flex gap-2 items-center justify-center rounded-lg shadow-md w-28 py-1 bg-gray-500">
                                <p class="text-qua">Pending:</p>
                                <p class="text-qua font-semibold">{{ $orderStatusCounts['pending'] }}</p>
                            </div>
                            <div
                                class="flex gap-2 items-center justify-center rounded-lg shadow-md w-28 py-1 bg-red-500">
                                <p class="text-qua">Canceled:</p>
                                <p class="text-qua font-semibold">{{ $orderStatusCounts['canceled'] }}</p>
                            </div>
                            <div
                                class="flex gap-2 items-center justify-center rounded-lg shadow-md w-28 py-1 bg-blue-500">
                                <p class="text-qua">Accepted:</p>
                                <p class="text-qua font-semibold">{{ $orderStatusCounts['accepted'] }}</p>
                            </div>
                            <div
                                class="flex gap-2 items-center justify-center rounded-lg shadow-md w-28 py-1 bg-green-500">
                                <p class="text-qua">Completed:</p>
                                <p class="text-qua font-semibold">{{ $orderStatusCounts['completed'] }}</p>
                            </div>
                        </div>
                        <div class="w-full overflow-x-auto">
                            <div class="relative table-responsive w-full pt-3 px-3"
                                style="min-width: 100vh; min-height: 20vh;">
                                <table class="table table-sm fs-9 mb-0" style="">
                                    <thead>
                                        <tr class="bg-sec">
                                            <th class="sort border-top border-translucent px-2 text-qua">Customer Email
                                            </th>
                                            <th class="sort border-top border-translucent text-qua text-end">Status</th>
                                            <th class="sort border-top border-translucent text-qua text-end">Total Price
                                            </th>
                                            <th
                                                class="sort text-end align-middle border-top border-translucent text-qua px-2">
                                                Date</th>
                                        </tr>
                                    </thead>
                                    <tbody class="list tbody">
                                    </tbody>
                                </table>
                                <div class="pagination_controls_orders mt-3"></div>
                                <div class="absolute inset-0 top-1/3 left-1/2 loading-indicator_orders">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="hidden w-full col-auto pt-3" id="reviews">
                        <div class="flex flex-col md:flex-row gap-3 px-5 pt-3">
                            <div class="flex flex-col gap-3 w-full">
                                <img src="{{ asset('uploads/restaurant_images/' . $restaurant->detail_image_1) }}"
                                    class="detail_1 bg-cover rounded-lg" alt="">
                                <img src="{{ asset('uploads/restaurant_images/' . $restaurant->detail_image_2) }}"
                                    class="detail_2 bg-cover rounded-lg" alt="">
                            </div>
                            <div class="flex flex-col gap-3 w-full">
                                <img src="{{ asset('uploads/restaurant_images/' . $restaurant->detail_image_3) }}"
                                    class="detail_3 bg-cover rounded-lg" alt="">
                                <img src="{{ asset('uploads/restaurant_images/' . $restaurant->detail_image_4) }}"
                                    class="detail_4 bg-cover rounded-lg" alt="">
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
<script src="{{ asset('js/restaurant_owner/profile.js') }}" type="module"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
@endpush
