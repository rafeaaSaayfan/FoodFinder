<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Favicon -->
    <link href="{{ asset('images/favicon.ico') }}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&family=Pacifico&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css') }}" rel="stylesheet" />

    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/material-design-icons/3.0.1/iconfont/material-icons.min.css"
        integrity="sha256-x8PYmLKD83R9T/sYmJn1j3is/chhJdySyhet/JuHnfY=" crossorigin="anonymous" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('css/home.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset("css/theme.css") }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>

<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    .rtl {
        direction: rtl;
        text-align: right;
    }

</style>

<body class="@if(App::getLocale() == 'ar') rtl @endif">

    <div class="1 bg-white p-0">
        <!-- Spinner Start -->
        <div id="spinner"
            class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
    </div>
    <!-- Spinner End -->

    <div class="w-full text-qua bg-pr fixed-top">
        <div x-data="{ open: false }"
            class="flex flex-col min-w-screen-xl mx-auto md:items-center md:justify-between md:flex-row px-4">
            <div class="py-2 flex flex-row items-center justify-between">
                <a href="{{ route('home') }}" class="text-3xl font-bold text-ter rounded-lg">
                    FoodFinder
                </a>
                <button class="md:hidden rounded-lg focus:outline-none focus:shadow-outline" @click="open = !open">
                    <svg fill="currentColor" viewBox="0 0 20 20" class="w-6 h-6">
                        <path x-show="!open" fill-rule="evenodd"
                            d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM9 15a1 1 0 011-1h6a1 1 0 110 2h-6a1 1 0 01-1-1z"
                            clip-rule="evenodd"></path>
                        <path x-show="open" fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>
            <nav :class="{'flex': open, 'hidden': !open}"
                class="flex-col flex-grow hidden md:flex md:justify-end md:flex-row py-2 gap-4">
                <div class="flex-col flex-grow flex md:justify-end md:flex-row gap-2">
                    <a class="px-4 py-2 mt-1 text-sm font-semibold text-qua hover:bg-orange-600 rounded-lg hover:text-white"
                        href="{{ route('login') }}">
                        Login
                    </a>
                    <a class="px-4 py-2 mt-1 text-sm font-semibold rounded-lg hover:bg-orange-600 rounded-lg hover:text-white"
                        href="{{ route('register') }}">
                        Register
                    </a>
                </div>
            </nav>
        </div>
        <hr>
    </div>

    <div class="py-5 bg-pr hero-header mb-5">
        <div class="container my-5 py-5">
            <div class="row align-items-center ">
                <div class="col-lg-6 text-center text-lg-start">
                    <h1 class="display-3 text-white animated slideInLeft">Enjoy Our<br>Delicious Meals</h1>
                    <p class="text-white animated slideInLeft mb-4 pb-2">Where culinary artistry meets impeccable taste.
                        Discover a symphony of flavors, thoughtfully crafted dishes, and an inviting ambiance that
                        promises
                        an unforgettable dining experience. Join us in celebrating the art of food.</p>
                    <a class="btnClick btn btn-primary bg-ter py-sm-3 px-sm-5 animated slideInLeft">
                        Order Now
                    </a>
                </div>
                <div class="col-lg-6 text-center text-lg-end overflow-hidden pt-5 md:pt-0">
                    <img class="img-fluid" src="images/hero.png" alt="">
                </div>
            </div>
        </div>
    </div>

    <!-- Service Start -->
    <div class="bg-qua py-5">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="service-item border rounded pt-3">
                        <div class="p-4">
                            <i class="fa fa-3x fa-user-tie text-ter mb-4 text-pr"></i>
                            <h5 class="font-semibold mb-1">Master Chefs</h5>
                            <p>Our skilled culinary artists blend creativity and expertise to present dishes that
                                tantalize
                                your taste buds with every bite, We've Got the best in the world</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="service-item border rounded pt-3">
                        <div class="p-4">
                            <i class="fa fa-3x fa-utensils text-ter mb-4"></i>
                            <h5 class="font-semibold mb-1">Quality Food</h5>
                            <p>Indulge in a symphony of flavors as we source the finest ingredients and craft each dish
                                with
                                precision, ensuring an exceptional dining experience.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="service-item border rounded pt-3">
                        <div class="p-4">
                            <i class="fa fa-3x fa-cart-plus text-ter mb-4"></i>
                            <h5 class="font-semibold mb-1">Online Order</h5>
                            <p> Satisfy your cravings from home with our convenient online ordering system, delivering
                                our delicious creations straight to your doorstep.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.7s">
                    <div class="service-item border rounded pt-3">
                        <div class="p-4">
                            <i class="fa fa-3x fa-headset text-ter mb-4"></i>
                            <h5 class="font-semibold mb-1">24/7 Service</h5>
                            <p>Experience our dedicated round-the-clock service, ready to cater to your cravings
                                whenever
                                you desire, ensuring your satisfaction is our top priority.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Service End -->

    {{-- show restaurants --}}
    <div class="restaurants bg-qua py-20" id="restaurants">
        <div class="relative container py-5 px-3 px-md-5 rounded-none md:rounded-2xl bg-pr wow fadeInUp"
            data-wow-delay="0.1s">
            <div class="lg:flex items-center justify-between">
                <h2 class="font-meduim text-ter text-3xl ff-secondary">Restaurants</h2>
            </div>
            <hr class="mt-3">
            <div class="showRestaurants row" style="min-height: 100vh">
                @foreach ($restaurants as $restaurant)
                <div class="team-item col-12 col-md-6 col-xl-4 pt-5">
                    <div class="bg-sec rounded-lg shadow-md overflow-hidden">
                        @php
                        $imagesHtml = '';
                        foreach ($restaurant->restaurant_images as $image) {
                        $imagesHtml .= '<img class="w-full h-48 object-cover"
                            src="/uploads/restaurant_images/' . $image->profile_image . '" alt="Restaurant Image">';
                        }
                        @endphp
                        {!! $imagesHtml !!}
                        <div class="p-4">
                            <h2 class="text-xl text-qua font-semibold mb-1">{{ $restaurant->restaurant_name }}</h2>
                            <div class='rating flex flex-row gap-1'>
                                @for($i = 0; $i < 5; $i++) <svg
                                    class="star h-5 transition-all duration-100 {{ $restaurant->restaurant_reviews_avg_rating > $i ? 'fill-yellow-500' : 'fill-gray-500'}}"
                                    viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg"
                                    xmlns:xlink="http://www.w3.org/1999/xlink">
                                    <path
                                        d="M575.852903 115.426402L661.092435 288.054362c10.130509 20.465674 29.675227 34.689317 52.289797 37.963825l190.433097 27.62866c56.996902 8.288598 79.7138 78.281203 38.475467 118.496253l-137.836314 134.35715c-16.372539 15.963226-23.84251 38.987109-19.954032 61.49935l32.540421 189.716799c9.721195 56.792245-49.833916 100.077146-100.793444 73.267113L545.870691 841.446188a69.491196 69.491196 0 0 0-64.67153 0l-170.376737 89.537324c-50.959528 26.810033-110.51464-16.474868-100.793444-73.267113L242.569401 667.9996c3.888478-22.512241-3.581493-45.536125-19.954032-61.49935L84.779055 472.245428c-41.238333-40.215049-18.521435-110.207655 38.475467-118.496252l190.433097-27.62866c22.61457-3.274508 42.159288-17.498151 52.289797-37.963826L451.319277 115.426402c25.479764-51.675827 99.053862-51.675827 124.533626 0z">
                                    </path>
                                    </svg>
                                    @endfor
                            </div>
                            <p class="text-qua opacity-80 mt-1">{{ $restaurant->description }}</p>
                            <div class="flex items-center gap-1 mt-1">
                                <p class="text-qua opacity-80">Orders:</p>
                                <p class="text-qua font-semibold">{{ $restaurant->total_orders }}</p>
                            </div>
                            <button type="submit"
                                class="btnClick mt-3 px-5 py-2 text-qua bg-ter rounded-lg">Visit</button>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </div>

    <!-- About Start -->
    <div class="bg-qua py-5" id="about">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="row g-3">
                        <div class="col-6 text-start">
                            <img class="img-fluid rounded w-100 wow zoomIn" data-wow-delay="0.1s"
                                src="images/about-1.jpg">
                        </div>
                        <div class="col-6 text-start">
                            <img class="img-fluid rounded w-75 wow zoomIn" data-wow-delay="0.3s"
                                src="images/about-2.jpg" style="margin-top: 25%;">
                        </div>
                        <div class="col-6 text-end">
                            <img class="img-fluid rounded w-75 wow zoomIn" data-wow-delay="0.5s"
                                src="images/about-3.jpg">
                        </div>
                        <div class="col-6 text-end">
                            <img class="img-fluid rounded w-100 wow zoomIn" data-wow-delay="0.7s"
                                src="images/about-4.jpg">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <h5 class="section-title ff-secondary text-start text-xl text-ter">About Us</h5>
                    <h1 class="mb-4 text-sec">Welcome to <i class="fa fa-utensils text-ter px-1"></i>FoodFinder</h1>
                    <p class="mb-4">
                        At FoodFinder, we're more than just a platform – we're a passion-driven culinary hub.
                        Our mission is to connect you with extraordinary flavors from a variety of restaurants,
                        ensuring each meal is an unforgettable experience.
                    </p>
                    <p class="mb-4">
                        With a selection of master chefs from diverse backgrounds, we curate dishes that reflect
                        artistry and
                        innovation. Embark on a gastronomic adventure with us as we merge tradition and creativity,
                        redefining the essence of dining and creating unforgettable memories.
                    </p>
                    <div class="row g-4 mb-4">
                        <div class="col-sm-6">
                            <div class="d-flex align-items-center border-5 border-orange-600 px-3 bg-white">
                                <h1 class="flex-shrink-0 display-5 text-ter mb-0" data-toggle="counter-up">15</h1>
                                <div class="ps-4">
                                    <p class="mb-0">Years of</p>
                                    <h6 class="text-uppercase text-sec mb-0">Experience</h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="d-flex align-items-center border-5 border-orange-600 px-3 bg-white">
                                <h1 class="flex-shrink-0 display-5 text-ter mb-0" data-toggle="counter-up">
                                    {{ $resCount }}</h1>
                                <div class="ps-4">
                                    <p class="mb-0">Top-Rated</p>
                                    <h6 class="text-uppercase text-sec mb-0">Partner Restaurants</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->

    <!-- Testimonial Start -->
    <div class="bg-qua py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container">
            <div class="text-center">
                <h5 class="section-title ff-secondary text-center text-ter">Testimonials</h5>
                <h1 class="mb-5 text-sec">Our Clients's Feedback!</h1>
            </div>
            <div class="owl-carousel testimonial-carousel">
                <div class="testimonial-item bg-white border rounded p-4">
                    <i class="fa fa-quote-left fa-2x text-ter mb-3"></i>
                    <p class="text-sec opacity-80">
                        The variety of flavors on FoodFinder delighted my taste buds! Each dish felt crafted with
                        precision and passion.
                    </p>
                    <div class="d-flex align-items-center pt-3">
                        <img class="img-fluid flex-shrink-0 rounded-circle" src="images/testimonial-1.jpg"
                            style="width: 50px; height: 50px;">
                        <div class="ps-3">
                            <h5 class="mb-1 text-sec font-semibold">Ahmad Chebbo</h5>
                            <small>Food Critic</small>
                        </div>
                    </div>
                </div>
                <div class="testimonial-item bg-white border rounded p-4">
                    <i class="fa fa-quote-left fa-2x text-ter mb-3"></i>
                    <p class="text-sec opacity-80">
                        Navigating FoodFinder was a breeze, and the food quality exceeded my expectations. Truly a
                        delightful experience!
                    </p>
                    <div class="d-flex align-items-center pt-3">
                        <img class="img-fluid flex-shrink-0 rounded-circle" src="images/testimonial-2.jpg"
                            style="width: 50px; height: 50px;">
                        <div class="ps-3">
                            <h5 class="mb-1 text-sec font-semibold">Ahmad Seifeddine</h5>
                            <small>Food Lover</small>
                        </div>
                    </div>
                </div>
                <div class="testimonial-item bg-white border rounded p-4">
                    <i class="fa fa-quote-left fa-2x text-ter mb-3"></i>
                    <p class="text-sec opacity-80">
                        I loved how easy it was to discover new restaurants on FoodFinder. Their recommendations were
                        spot-on!
                    </p>
                    <div class="d-flex align-items-center pt-3">
                        <img class="img-fluid flex-shrink-0 rounded-circle" src="images/testimonial-3.jpg"
                            style="width: 50px; height: 50px;">
                        <div class="ps-3">
                            <h5 class="mb-1 text-sec font-semibold">Malih Chebbo</h5>
                            <small>Gym Bro</small>
                        </div>
                    </div>
                </div>
                <div class="testimonial-item bg-white border rounded p-4">
                    <i class="fa fa-quote-left fa-2x text-ter mb-3"></i>
                    <p class="text-sec opacity-80">
                        FoodFinder made ordering food online so convenient. The prompt delivery and delicious meals kept
                        me coming back for more!
                    </p>
                    <div class="d-flex align-items-center pt-3">
                        <img class="img-fluid flex-shrink-0 rounded-circle" src="images/testimonial-4.jpg"
                            style="width: 50px; height: 50px;">
                        <div class="ps-3">
                            <h5 class="mb-1 text-sec font-semibold">Gordon Ramsey</h5>
                            <small>Chef</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div data-dialog-backdrop="web-3-dialog" data-dialog-backdrop-close="true"
        class="modal hidden fixed inset-0 z-[999] grid h-screen w-screen place-items-center bg-black bg-opacity-60 backdrop-blur-sm transition-opacity duration-300 px-1 md:px-0">
        <div class="bg-pr m-4 rounded-lg shadow-2xl text-blue-gray-500 antialiased leading-relaxed w-11/12 lg:w-4/12"
            data-dialog="web-3-dialog">
            <div class="w-full flex items-center pt-3 px-2 font-sans text-2xl font-semibold justify-between">
                <div class="flex items-center flex-wrap gap-3 md:gap-5">
                    <h5 class="text-lg md:text-xl font-bold text-ter">
                    </h5>
                </div>
                <button
                    class="align-middle select-none font-sans font-semibold text-center uppercase transition-all disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none text-xs"
                    type="button" data-ripple-dark="true" data-dialog-close="true">
                    <span class="close transform">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                            stroke="currentColor" aria-hidden="true" class="h-7 w-7 stroke-red-500">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12">
                            </path>
                        </svg>
                    </span>
                </button>
            </div>
            <hr class="my-3">
            <div class="flex flex-row items-center justify-center gap-5 pt-5 pb-3 px-4">
                <a href="{{ route('login') }}" class="px-4 py-1 hover:bg-orange-600 border text-qua bg-sec hover:text-white rounded">Login</a>
                <p class="text-qua opacity-80">Or</p>
                <a href="{{ route('register') }}" class="px-4 py-1 hover:bg-orange-600 border text-qua bg-sec hover:text-white rounded">Register</a>
            </div>
        </div>
    </div>

    @include('common.footer')

    {{-- script --}}
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('lib/wow/wow.min.js') }}"></script>
    <script src="{{ asset('lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('lib/counterup/counterup.min.js') }}"></script>
    <script src="{{ asset('lib/owlcarousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('lib/tempusdominus/js/moment.min.js') }}"></script>
    <script src="{{ asset('lib/tempusdominus/js/moment-timezone.min.js') }}"></script>
    <script src="{{ asset('lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>

    <script>
        $('.btnClick').on('click', function (event) {
            event.preventDefault();
            $('.modal').removeClass('hidden');
        });

        $('.close').on('click', function (event) {
            event.preventDefault();
            $('.modal').addClass('hidden');
        });

    </script>

</body>

</html>
