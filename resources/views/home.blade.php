@extends('layouts.app')

@section('content')
<div class="py-5 bg-pr hero-header mb-5">
    <div class="container my-5 py-5">
        <div class="row align-items-center ">
            <div class="col-lg-6 text-center text-lg-start">
                <h1 class="display-3 text-white animated slideInLeft">Enjoy Our<br>Delicious Meals</h1>
                <p class="text-white animated slideInLeft mb-4 pb-2">Where culinary artistry meets impeccable taste.
                    Discover a symphony of flavors, thoughtfully crafted dishes, and an inviting ambiance that promises
                    an unforgettable dining experience. Join us in celebrating the art of food.</p>
                <a href="#restaurants" class="btn btn-primary bg-ter py-sm-3 px-sm-5 animated slideInLeft">
                    Order Now,
                    @if ($user->username)
                        {{ $user->username }}
                    @else
                        {{ $user->email }}
                    @endif
                    ?
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
                        <p>Our skilled culinary artists blend creativity and expertise to present dishes that tantalize
                            your taste buds with every bite, We've Got the best in the world</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
                <div class="service-item border rounded pt-3">
                    <div class="p-4">
                        <i class="fa fa-3x fa-utensils text-ter mb-4"></i>
                        <h5 class="font-semibold mb-1">Quality Food</h5>
                        <p>Indulge in a symphony of flavors as we source the finest ingredients and craft each dish with
                            precision, ensuring an exceptional dining experience.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.5s">
                <div class="service-item border rounded pt-3">
                    <div class="p-4">
                        <i class="fa fa-3x fa-cart-plus text-ter mb-4"></i>
                        <h5 class="font-semibold mb-1">Online Order</h5>
                        <p> Satisfy your cravings from home with our convenient online ordering system, delivering our delicious creations straight to your doorstep.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.7s">
                <div class="service-item border rounded pt-3">
                    <div class="p-4">
                        <i class="fa fa-3x fa-headset text-ter mb-4"></i>
                        <h5 class="font-semibold mb-1">24/7 Service</h5>
                        <p>Experience our dedicated round-the-clock service, ready to cater to your cravings whenever
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
    <div class="relative container py-5 px-3 px-md-5 rounded-none md:rounded-2xl bg-pr wow fadeInUp" data-wow-delay="0.1s">
        <div class="lg:flex items-center justify-between">
            <h2 class="font-meduim text-ter text-3xl ff-secondary">Restaurants</h2>
            <div class="md:flex items-center gap-4 wow fadeInUp text-qua pt-3 lg:pt-0" data-wow-delay="0.1s">
                <div class="flex items-center gap-3 pb-1 pb-md-0">
                    <div class="flex items-center gap-1 opacity-90">
                        <input type="checkbox" name="" id="rateSearch" class="w-4 h-4 cursor-pointer">
                        <label for="rateSearch" class="cursor-pointer pt-1 text-sm">Best Rate</label>
                    </div>
                    <div class="flex items-center gap-1 opacity-90">
                        <input type="checkbox" name="" id="saleSearch" class="w-4 h-4 cursor-pointer">
                        <label for="saleSearch" class="cursor-pointer pt-1 text-sm">Best Sale</label>
                    </div>
                </div>
                <div class="md:w-80">
                    <div class="relative w-full">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <svg class="w-5 h-5 text-qua opacity-70" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <input type="text" id="search" class="w-full bg-sec text-qua text-sm rounded-xl block pl-10 p-2.5" placeholder="Search Reastaurant">
                    </div>
                </div>
            </div>
        </div>
        <hr class="mt-3">
        <div class="showRestaurants row" style="min-height: 100vh">
        </div>
        <div class="pagination_controls mt-5"></div>
        <div class="absolute start-1/2 top-1/2 loading-indicator">
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
                        <img class="img-fluid rounded w-100 wow zoomIn" data-wow-delay="0.1s" src="images/about-1.jpg">
                    </div>
                    <div class="col-6 text-start">
                        <img class="img-fluid rounded w-75 wow zoomIn" data-wow-delay="0.3s" src="images/about-2.jpg"
                            style="margin-top: 25%;">
                    </div>
                    <div class="col-6 text-end">
                        <img class="img-fluid rounded w-75 wow zoomIn" data-wow-delay="0.5s" src="images/about-3.jpg">
                    </div>
                    <div class="col-6 text-end">
                        <img class="img-fluid rounded w-100 wow zoomIn" data-wow-delay="0.7s" src="images/about-4.jpg">
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
                    With a selection of master chefs from diverse backgrounds, we curate dishes that reflect artistry and
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
                            <h1 class="flex-shrink-0 display-5 text-ter mb-0" data-toggle="counter-up">{{ $resCount }}</h1>
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
                    The variety of flavors on FoodFinder delighted my taste buds! Each dish felt crafted with precision and passion.
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
                    Navigating FoodFinder was a breeze, and the food quality exceeded my expectations. Truly a delightful experience!
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
                    I loved how easy it was to discover new restaurants on FoodFinder. Their recommendations were spot-on!
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
                    FoodFinder made ordering food online so convenient. The prompt delivery and delicious meals kept me coming back for more!
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
<!-- Testimonial End -->
@endsection

@push('scripts')
    <script src="{{ asset('js/home.js') }}" type="module"></script>
@endpush
