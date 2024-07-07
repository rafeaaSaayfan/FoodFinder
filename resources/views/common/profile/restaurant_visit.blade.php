@extends('layouts.app')

@section('content')

<div class="container w-full h-full py-20">
    <div class="card bg-white shadow rounded-md">
        <div class="lg:flex w-full">
            <div class="bg-cover bg-center justify-between rounded-tl-md w-full lg:w-1/2 min-h-96"
                style="background-image:url('{{ asset('uploads/restaurant_images/' . $restaurant->profile_image) }}');">
            </div>
            <div class="w-full lg:w-1/2 flex flex-col gap-4 lg:gap-0 justify-between py-3 px-2 px-md-4 lg:min-h-96">
                <div class="w-full">
                    <h2 class="font-bold text-3xl text-ter">{{ $restaurant->restaurant_name }}</h2>
                    <div class='res_rating flex flex-row gap-1'>
                    </div>
                    <div class="flex opacity-70 gap-2 pt-2">
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
                <div class="flex flex-col gap-2">
                    <input type="hidden" id="restaurant_id" value="{{ $restaurantId }}">
                    <p class="text-sm text-sec opacity-70 font-semibold">Your rate</p>
                    <div class='rating flex flex-row gap-1'>
                        @for ($i = 1; $i <= 5; $i++)
                        <svg class="star h-5 transition-all duration-100 cursor-pointer
                            {{ $i <= $average_rating ? 'fill-yellow-500' : 'fill-gray-500' }}"
                            viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg"
                            xmlns:xlink="http://www.w3.org/1999/xlink">
                            <path d="M575.852903 115.426402L661.092435 288.054362c10.130509 20.465674 29.675227 34.689317 52.289797 37.963825l190.433097 27.62866c56.996902 8.288598 79.7138 78.281203 38.475467 118.496253l-137.836314 134.35715c-16.372539 15.963226-23.84251 38.987109-19.954032 61.49935l32.540421 189.716799c9.721195 56.792245-49.833916 100.077146-100.793444 73.267113L545.870691 841.446188a69.491196 69.491196 0 0 0-64.67153 0l-170.376737 89.537324c-50.959528 26.810033-110.51464-16.474868-100.793444-73.267113L242.569401 667.9996c3.888478-22.512241-3.581493-45.536125-19.954032-61.49935L84.779055 472.245428c-41.238333-40.215049-18.521435-110.207655 38.475467-118.496252l190.433097-27.62866c22.61457-3.274508 42.159288-17.498151 52.289797-37.963826L451.319277 115.426402c25.479764-51.675827 99.053862-51.675827 124.533626 0z"></path>
                        </svg>
                        @endfor
                    </div>
                </div>
                <div class="flex flex-wrap justify-around w-full">
                    <div class="col-12 col-md-6 rounded shadow-xs border">
                        <div class="flex flex-col p-3 gap-1 text-xs md:text-base">
                            <div class="flex gap-1 items-center">
                                <i class="bi bi-envelope text-sec opacity-80"></i>
                                <p class="text-sec opacity-80">Email</p>
                            </div>
                            <a href="mailto:{{ $restaurant->restaurant_email }}" class="text-sec px-3 font-semibold hover:text-orange-600">
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
                            <a href="tel:{{ $restaurant->restaurant_phone }}" class="text-sec px-3 font-semibold hover:text-orange-600">
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
                            <a href="{{ $restaurant->address }}" class="text-sec px-3 font-semibold hover:text-orange-600" target="_blank">
                                See location
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="relative card mt-4 bg-white shadow rounded-md">
        <div class="pb-5">
            <div class="row justify-content-xl-between">
                <div class="w-full col-auto">
                    <div class="w-full pt-4 px-2 px-md-3">
                        <div class="border-b w-full flex flex-wrap items-center justify-between">
                            <a class="tab1 text-nowrap cursor-pointer border-b-2 border-orange-600 pb-2 text-ter">
                                <div class="w-full flex items-center gap-1 text-xs md:text-base">
                                    <span class="fas fa-utensils"></span>
                                    <span>
                                        Menu
                                    </span>
                                </div>
                            </a>
                            <a class="tab3 text-nowrap cursor-pointer pb-2 text-sec">
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
                </div>
                <div class="w-full px-3 wow fadeInUp" data-wow-delay="0.1s" id="orders">
                    <div class="pt-4">
                        <div class="hidden lg:block container">
                            <div class="tab-class text-center wow fadeInUp" data-wow-delay="0.1s">
                                <ul class="nav nav-pills flex flex-row flex-wrap justify-between border-bottom mb-5">
                                    <li class="nav-item">
                                        <a class="appetizers flex items-center text-start mx-3 ms-0 pb-3 active"
                                            data-bs-toggle="pill" href="#tab-1">
                                            <img src="{{ asset('images/nachos.png') }}" class="w-7 md:w-10">
                                            <div class="ps-3">
                                                <small class="text-xs md:text-md">Popular</small>
                                                <h6 class="mt-n1 mb-0 text-sm md:text-lg">Appetizers</h6>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="sandwiches d-flex align-items-center text-start mx-3 pb-3" data-bs-toggle="pill"
                                            href="#tab-2">
                                            <img src="{{ asset('images/sandwich.png') }}" class="w-7 md:w-10">
                                            <div class="ps-3">
                                                <small class="text-xs md:text-md">Special</small>
                                                <h6 class="mt-n1 mb-0 text-sm md:text-lg">Sandwiches</h6>
                                            </div>
                                        </a>
                                    </li>

                                    <li class="nav-item mx-2">
                                        <a class="meals d-flex align-items-center text-start mx-3 me-0 pb-3"
                                            data-bs-toggle="pill" href="#tab-3">
                                            <img src="{{ asset('images/burger.png') }}" class="w-7 md:w-10">
                                            <div class="ps-3">
                                                <small class="text-xs md:text-md">Tasty</small>
                                                <h6 class="mt-n1 mb-0 text-sm md:text-lg">Meals</h6>
                                            </div>
                                        </a>
                                    </li>

                                    <li class="nav-item mx-2">
                                        <a class="pizzas d-flex align-items-center text-start mx-3 me-0 pb-3"
                                            data-bs-toggle="pill" href="#tab-4">
                                            <img src="{{ asset('images/pizza.png') }}" class="w-7 md:w-10">
                                            <div class="ps-3">
                                                <small class="text-xs md:text-md">Lovely</small>
                                                <h6 class="mt-n1 mb-0 text-sm md:text-lg">Pizzas</h6>
                                            </div>
                                        </a>
                                    </li>

                                    <li class="nav-item mx-2">
                                        <a class="desserts d-flex align-items-center text-start mx-3 me-0 pb-3"
                                            data-bs-toggle="pill" href="#tab-5">
                                            <img src="{{ asset('images/pancakes.png') }}" class="w-7 md:w-10">
                                            <div class="ps-3">
                                                <small class="text-xs md:text-md">Sweet</small>
                                                <h6 class="mt-n1 mb-0 text-sm md:text-lg">Desserts</h6>
                                            </div>
                                        </a>
                                    </li>

                                    <li class="nav-item mx-2">
                                        <a class="drinks d-flex align-items-center text-start mx-3 me-0 pb-3"
                                            data-bs-toggle="pill" href="#tab-6">
                                            <img src="{{ asset('images/soft-drink.png') }}" class="w-7 md:w-10">
                                            <div class="ps-3">
                                                <small class="text-xs md:text-md">Refreshing</small>
                                                <h6 class="mt-n1 mb-0 text-sm md:text-lg">Drinks</h6>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div id="tab-1" class="tab-pane fade show p-0 active">
                                        <div class="tab_content row g-4">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                                <h5 class="section-title ff-secondary text-center text-primary fw-normal">
                                    {{ $restaurant->restaurant_name }} Menu</h5>
                                <h1 class="mb-5 text-sec">Our Incredible Menu</h1>
                            </div>
                        </div>
                        <div class="block lg:hidden container mb-3">
                            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                                <h5 class="section-title ff-secondary text-center text-primary fw-normal">
                                    {{ $restaurant->restaurant_name }} Menu</h5>
                                <h1 class="mb-1 text-sec">Our Incredible Menu</h1>
                            </div>
                            <div @click.away="open = false" class="relative mt-4" x-data="{ open: false }">
                                <button @click="open = !open"
                                    class="w-fit bg-sec px-3 py-1 flex items-center rounded-lg hover:ring-1 hover:ring-orange-300 text-sm text-left text-qua">
                                    <span class="menuSelecte">Appetizers</span>
                                    <svg fill="currentColor" viewBox="0 0 20 20" :class="{'rotate-180': open, 'rotate-0': !open}"
                                    class="inline w-4 h-4 mt-1 ml-1 transition-transform duration-200 transform md:-mt-1">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd"></path>
                                    </svg>
                                </button>
                                <div x-show="open" x-transition:enter="transition ease-out duration-100"
                                    x-transition:enter-start="transform opacity-0 scale-95"
                                    x-transition:enter-end="transform opacity-100 scale-100"
                                    x-transition:leave="transition ease-in duration-75"
                                    x-transition:leave-start="transform opacity-100 scale-100"
                                    x-transition:leave-end="transform opacity-0 scale-95"
                                    class="z-20 absolute w-full mt-2 origin-top-right rounded-md shadow-lg w-32 md:w-48">
                                    <div class="px-1 py-1 bg-pr rounded-md shadow">
                                        <div @click="open = !open" class="appetizers cursor-pointer px-1 py-2 text-sm font-semibold rounded-lg hover:bg-orange-600 text-qua hover:text-white">
                                            Appetizers
                                        </div>
                                        <div @click="open = !open" class="sandwiches cursor-pointer px-1 py-2 text-sm font-semibold rounded-lg hover:bg-orange-600 text-qua hover:text-white">
                                            Sandwiches
                                        </div>
                                        <div @click="open = !open" class="meals cursor-pointer px-1 py-2 text-sm font-semibold rounded-lg hover:bg-orange-600 text-qua hover:text-white">
                                            Meals
                                        </div>
                                        <div @click="open = !open" class="pizzas cursor-pointer px-1 py-2 text-sm font-semibold rounded-lg hover:bg-orange-600 text-qua hover:text-white">
                                            Pizzas
                                        </div>
                                        <div @click="open = !open" class="desserts cursor-pointer px-1 py-2 text-sm font-semibold rounded-lg hover:bg-orange-600 text-qua hover:text-white">
                                            Desserts
                                        </div>
                                        <div @click="open = !open" class="drinks cursor-pointer px-1 py-2 text-sm font-semibold rounded-lg hover:bg-orange-600 text-qua hover:text-white">
                                            Drinks
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="menu px-2 px-md-5 flex flex-col min-h-72 md:flex-row items-center justify-center md:justify-between lg:justify-around flex-wrap"></div>
                    <div class="pagination_controls mt-3 px-5"></div>
                </div>
                <div class="hidden w-full px-3" id="stores">
                    <div class="flex items-center gap-5 flex-wrap px-3 pt-3">
                        <div class="flex gap-2 items-center justify-center rounded-lg shadow-md w-28 py-1 bg-gray-500">
                            <p class="text-qua">Pending:</p>
                            <p class="text-qua font-semibold">{{ $orderStatusCounts['pending'] }}</p>
                        </div>
                        <div class="flex gap-2 items-center justify-center rounded-lg shadow-md w-28 py-1 bg-red-500">
                            <p class="text-qua">Canceled:</p>
                            <p class="text-qua font-semibold">{{ $orderStatusCounts['canceled'] }}</p>
                        </div>
                        <div class="flex gap-2 items-center justify-center rounded-lg shadow-md w-28 py-1 bg-blue-500">
                            <p class="text-qua">Accepted:</p>
                            <p class="text-qua font-semibold">{{ $orderStatusCounts['accepted'] }}</p>
                        </div>
                        <div class="flex gap-2 items-center justify-center rounded-lg shadow-md w-28 py-1 bg-green-500">
                            <p class="text-qua">Completed:</p>
                            <p class="text-qua font-semibold">{{ $orderStatusCounts['completed'] }}</p>
                        </div>
                    </div>
                    @admin
                    <div class="w-full overflow-x-auto">
                        <div class="relative table-responsive w-full pt-3 px-3" style="min-width: 100vh; min-height: 20vh;">
                            <table class="table table-sm fs-9 mb-0">
                                <thead>
                                    <tr class="bg-sec">
                                        <th class="sort border-top border-translucent px-2 text-qua">Customer Email</th>
                                        <th class="sort border-top border-translucent text-qua text-end">Status</th>
                                        <th class="sort border-top border-translucent text-qua text-end">Total Price</th>
                                        <th class="sort text-end align-middle border-top border-translucent text-qua px-2">Date</th>
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
                    @endadmin
                </div>
                <div class="hidden w-full col-auto py-4 mx-3" id="reviews">
                    <div class="flex gap-3 px-5 pt-3">
                        <div class="flex flex-col gap-3 w-1/2">
                            <img src="{{ asset('uploads/restaurant_images/' . $restaurant->detail_image_1) }}"
                                class="detail_1 bg-cover rounded-lg" alt="">
                            <img src="{{ asset('uploads/restaurant_images/' . $restaurant->detail_image_2) }}"
                                class="detail_2 bg-cover rounded-lg" alt="">
                        </div>
                        <div class="flex flex-col gap-3 w-1/2">
                            <img src="{{ asset('uploads/restaurant_images/' . $restaurant->detail_image_3) }}"
                                class="detail_3 bg-cover rounded-lg" alt="">
                            <img src="{{ asset('uploads/restaurant_images/' . $restaurant->detail_image_4) }}"
                                class="detail_4 bg-cover rounded-lg" alt="">
                        </div>
                    </div>
                </div>
                <div class="w-full relative">
                    <div class="absolute -top-64 left-1/2 z-20 loading-indicator"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<div data-dialog-backdrop="web-3-dialog" data-dialog-backdrop-close="true"
   class="modal hidden fixed inset-0 z-[999] grid h-screen w-screen place-items-center bg-black bg-opacity-60 backdrop-blur-sm transition-opacity duration-300 px-1 md:px-0">
    <div class="bg-sec m-4 rounded-lg shadow-2xl text-blue-gray-500 antialiased leading-relaxed w-11/12 lg:w-4/12"
    data-dialog="web-3-dialog">
        <div class="w-full flex items-center pt-3 px-2 font-sans text-2xl font-semibold justify-between">
            <div class="flex items-center flex-wrap gap-3 md:gap-5">
                <h5 class="text-lg md:text-xl font-bold text-ter">
                </h5>
            </div>
            <button class="align-middle select-none font-sans font-semibold text-center uppercase transition-all disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none text-xs"
                type="button" data-ripple-dark="true" data-dialog-close="true">
                <span class="close transform text-qua">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                        stroke="currentColor" aria-hidden="true" class="h-7 w-7">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12">
                        </path>
                    </svg>
                </span>
            </button>
        </div>
        <hr class="my-3">
        <form class="addToCartForm flex flex-col gap-4 mx-2 mx-lg-4">
            <div class="">
                <h5 class="mb-2 text-body-highlight text-qua">Quantity</h5>
                <input type="number" name="quantity" class="form-control" id="quantity"
                placeholder="Enter the item quantity" step="1" min="1" value="1">
            </div>
            <div class="flex flex-wrap flex-row-reverse gap-4 pb-3">
                <button type="submit" class="confDeleteBtn block max-w-xs bg-ter text-qua rounded px-4 py-1 font-semibold">
                    <p class="submit span-text text-sm">Add to cart</p>
                    <div class="loading hidden">
                        <div class="flex items-center gap-2 text-sm">
                            <svg aria-hidden="true" role="status" class="inline w-4 h-4 text-white animate-spin" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="#E5E7EB"></path>
                                <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentColor"></path>
                            </svg>
                            <span>{{ __('messages.auth.loading') }}</span>
                        </div>
                    </div>
                </button>
                <div class="close px-4 py-1 bg-sec border border-orange-600 text-qua rounded">Cancel</div>
            </div>
        </form>
    </div>
</div>

@endsection

@push('scripts')
    <script src="{{ asset('js/profile/restaurant_visit.js') }}" type="module"></script>
@endpush
