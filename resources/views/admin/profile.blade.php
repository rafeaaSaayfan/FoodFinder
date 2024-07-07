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

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-icons/3.0.1/iconfont/material-icons.min.css" integrity="sha256-x8PYmLKD83R9T/sYmJn1j3is/chhJdySyhet/JuHnfY=" crossorigin="anonymous" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('css/home.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset("css/theme.css") }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @stack('link')

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
    <div class="bg-qua">
        <div class="container pt-10 pb-10">
            <a href="/dashboard/users" class="text-sec font-bold text-lg"><- Dashboard</a>
            <div class="row align-items-center justify-content-between g-3 mb-4 pt-5">
                <div class="col-auto">
                    <h2 class="mb-0 text-ter text-3xl ff-secondary">Profile</h2>
                </div>
                <div class="col-auto">
                    <div class="row g-2 g-sm-3">
                        <div class="col-auto">
                            <form action="{{ route('deletUserProfile', ['id' => $user->id]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger rounded-lg text-sm">
                                    <span class="fas fa-trash-alt me-2"></span>
                                    Delete customer
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row g-3 mb-6">
                <div class="col-12 col-lg-8">
                    <div class="card rounded-lg h-100">
                        <div class="card-body">
                            <div class="border-bottom border-dashed pb-4">
                                <div class="row items-center g-3 g-sm-5 text-center text-sm-start">
                                    <div class="col-12 col-sm-auto">
                                        <label class="cursor-pointer avatar avatar-5xl" for="avatarFile">
                                            @if ($user->profile_img)
                                            <img class="profile_img rounded-circle w-48 h-48"
                                            src="{{ asset('uploads/profile_images/' . $user->profile_img) }}" alt="" />
                                            @else
                                            <img class="profile_img rounded-circle w-48 h-48"
                                            src="{{ asset('images/default_image/profile_img.jpg') }}" alt="" />
                                            @endif
                                        </label>
                                    </div>
                                    <div class="col-12 col-sm-auto flex-1">
                                        @if ($user->username)
                                            <h3 class="username text-2xl text-ter font-bold">{{ $user->username }}</h3>
                                        @else
                                            <h3 class="username text-2xl text-ter font-bold">Anonymos</h3>
                                        @endif
                                        <p class="text-body-secondary">Joined {{ $joinedDate }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="flex flex-row flex-wrap items-center justify-between gap-4 gap-sm-0 pt-4">
                                <div class="text-end">
                                    <h6 class="mb-2 text-pr font-semibold">Total Spent</h6>
                                    <h4 class="fs-7 mb-0">${{ $totalSpent }}</h4>
                                </div>
                                <div class="text-end">
                                    <h6 class="mb-2 text-pr font-semibold">Last Order</h6>
                                    <h4 class="fs-7 mb-0">{{ $lastOrder }}</h4>
                                </div>
                                <div class="text-end">
                                    <h6 class="mb-2 text-pr font-semibold">Complete Orders</h6>
                                    <h4 class="fs-7 mb-0">{{ $totalOrder }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-4">
                    <div class="card rounded-lg h-100">
                        <div class="card-body flex flex-col justify-between">
                            <div class="pt-4 mb-7 mb-lg-4 mb-xl-7">
                                <div class="row justify-between">
                                    <div class="col-auto">
                                        <h5 class="text-body-highlight">Address</h5>
                                    </div>
                                    <div class="col-auto">
                                        <p class="text-body-secondary">Lebanon</p>
                                        @if ($user->address)
                                            <a href="{{ $user->address }}" class="text-sm underline" target="_blank">See location</a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="border-top border-dashed pt-4">
                                <div class="row flex items-center justify-between mb-2">
                                    <div class="col-auto">
                                        <h5 class="text-body-highlight mb-0">Email</h5>
                                    </div>
                                    <div class="col-auto"><a class="lh-1"
                                            href="mailto:{{ $user->email }}">{{ $user->email }}</a></div>
                                </div>
                                <div class="row flex items-center justify-between">
                                    <div class="col-auto">
                                        <h5 class="text-body-highlight mb-0">Phone</h5>
                                    </div>
                                    <div class="col-auto"><a href="tel:{{ $user->phone_number }}">{{ $user->phone_number }}</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="rounded-lg mt-8 py-4 px-2 px-md-4 bg-white w-full border">
                <input type="hidden" value="{{$user->id}}" id="user_id">
                <div class="hidden sm:flex border-b items-center justify-between fs-9 mb-4">
                    <a class="tab1 text-nowrap cursor-pointer border-b-2 border-orange-600 pb-2 text-ter">
                        <div class="w-full flex items-center gap-2">
                            <span class="fas fa-shopping-cart"></span>
                            <span>
                                Orders
                                <span class="text-body-tertiary fw-normal">({{ $totalOrders }})</span>
                            </span>
                        </div>
                    </a>
                </div>
                <div id="orders" class="orders w-full overflow-x-auto overflow-y-none">
                    <div class="relative table-responsive w-full" style="min-width: 100vh; min-height: 20vh;">
                        <table class="table table-sm fs-9 mb-0">
                            <thead>
                                <tr class="bg-sec">
                                    <th class="sort border-top border-translucent px-2 text-qua">Restaurant Name</th>
                                    <th class="sort border-top border-translucent text-qua text-end">Status</th>
                                    <th class="sort border-top border-translucent text-qua text-end">Total Price</th>
                                    <th class="sort text-end align-middle border-top border-translucent text-qua px-2">Date</th>
                                </tr>
                            </thead>
                            <tbody class="list tbody">
                            </tbody>
                        </table>
                        <div class="pagination_controls mt-3"></div>
                        <div class="absolute inset-0 top-1/3 left-1/2 loading-indicator">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('js/admin/profile.js') }}" type="module"></script>

