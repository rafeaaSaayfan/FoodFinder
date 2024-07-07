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
                <a class="px-4 py-2 mt-1 text-sm font-semibold text-qua hover:bg-orange-600 {{ Request::route()->getName() === 'home' ? ' bg-ter' : '' }} rounded-lg hover:text-white"
                    href="{{ route('home') }}">Home
                </a>
                <a class="px-4 py-2 mt-1 text-sm font-semibold rounded-lg hover:bg-orange-600 {{ Request::route()->getName() === 'cart' ? ' bg-ter' : '' }} rounded-lg hover:text-white"
                    href="{{ route('cart') }}">
                    Cart
                </a>
                <a class="px-4 py-2 mt-1 text-sm font-semibold rounded-lg hover:bg-orange-600 {{ Request::route()->getName() === 'orders' ? ' bg-ter' : '' }} rounded-lg hover:text-white"
                    href="{{ route('orders') }}">
                    Orders
                </a>
            </div>
            <div @click.away="open = false" class="relative" x-data="{ open: false }">
                <button @click="open = !open"
                    class="flex flex-row items-center w-full text-sm font-semibold text-left bg-transparent rounded-lg">
                    @if (isset($user))
                        @if ($user->profile_img)
                        <img src="{{ asset('uploads/profile_images/' . $user->profile_img) }}" alt="Profile Image"
                            class="profile_img rounded-full w-10 h-10">
                        @else
                        <img src="{{ asset('images/default_image/profile_img.jpg') }}" alt="Default Image"
                            class="profile_img rounded-full w-10 h-10">
                        @endif
                    @else
                    <img src="{{ asset('images/default_image/profile_img.jpg') }}" alt="Default Image"
                        class="profile_img rounded-full w-10 h-10">
                    @endif
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
                    class="absolute right-0 w-full mt-2 origin-top-right rounded-md shadow-lg md:w-48">
                    <div class="px-2 py-2 bg-pr rounded-md shadow">
                        <a class="flex items-center gap-1 px-4 py-2 mt-2 text-sm font-semibold rounded-lg hover:bg-orange-600 text-qua hover:text-white"
                            href="{{ route('profile') }}">
                            <svg class="fill-white" width="13" height="13" data-name="Layer 1" id="Layer_1"
                                viewBox="0 0 48 48" xmlns="http://www.w3.org/2000/svg">
                                <title />
                                <path
                                    d="M24,21A10,10,0,1,1,34,11,10,10,0,0,1,24,21ZM24,5a6,6,0,1,0,6,6A6,6,0,0,0,24,5Z" />
                                <path
                                    d="M42,47H6a2,2,0,0,1-2-2V39A16,16,0,0,1,20,23h8A16,16,0,0,1,44,39v6A2,2,0,0,1,42,47ZM8,43H40V39A12,12,0,0,0,28,27H20A12,12,0,0,0,8,39Z" />
                            </svg>
                            <span class="">Profile</span>
                        </a>
                        @admin
                            <hr class="my-2">
                            <a href="{{ route('dashboard') }}"
                              class="flex items-center gap-2 px-4 py-2 mt-2 text-sm font-semibold rounded-lg hover:bg-orange-600 text-qua hover:text-white {{ Request::route()->getName() === 'admin' ? ' active' : '' }}">
                                Dashboard
                            </a>
                        @endadmin
                        @res_owner
                            <hr class="my-2">
                            <a href="{{ route('restaurantOwner_profile') }}"
                              class="flex items-center gap-2 px-4 py-2 mt-2 text-sm font-semibold rounded-lg hover:bg-orange-600 text-qua hover:text-white {{ Request::route()->getName() === 'admin' ? ' active' : '' }}">
                                My restaurant
                            </a>
                        @endres_owner
                        <hr class="my-2">
                        <div
                            class="group inline-block block px-4 py-1 text-sm font-semibold rounded-lg hover:bg-orange-600 text-qua hover:text-white">
                            <button class="outline-none focus:outline-none py-1 flex items-center min-w-32">
                                <span class="font-semibold text-qua">{{ __('messages.change_lang.lang') }}</span>
                                <span>
                                    <svg class="fill-white h-4 w-4 transform group-hover:-rotate-180 transition duration-150 ease-in-out"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path
                                            d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                    </svg>
                                </span>
                            </button>
                            <ul
                                class="z-10 py-2 px-2 mt-1 text-qua bg-pr rounded-3xl transform scale-0 group-hover:scale-100 absolute transition duration-150 ease-in-out origin-top min-w-40 flex flex-col">
                                <a href="{{ route('setLanguage', ['lang' => 'en']) }}"
                                    class="rounded-xl px-3 py-2 hover:bg-orange-600 mb-2 hover:text-white">{{ __('messages.change_lang.en') }}</a>
                                <a href="{{ route('setLanguage', ['lang' => 'ar']) }}"
                                    class="rounded-xl px-3 py-2 hover:bg-orange-600 hover:text-white">{{ __('messages.change_lang.ar') }}</a>
                            </ul>
                        </div>
                        <hr class="my-2">
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>

                        <button class="flex items-center w-full gap-2 px-4 py-2 text-sm font-semibold rounded-lg hover:bg-red-500 hover:text-white"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <svg class="fill-white" width="16" style="enable-background:new 0 0 24 24;" version="1.1"
                                viewBox="0 0 24 24" xml:space="preserve" xmlns="http://www.w3.org/2000/svg"
                                xmlns:xlink="http://www.w3.org/1999/xlink">
                                <g id="info" />
                                <g id="icons">
                                <g id="exit2">
                                <path d="M12,10c1.1,0,2-0.9,2-2V4c0-1.1-0.9-2-2-2s-2,0.9-2,2v4C10,9.1,10.9,10,12,10z" />
                                <path d="M19.1,4.9L19.1,4.9c-0.3-0.3-0.6-0.4-1.1-0.4c-0.8,0-1.5,0.7-1.5,1.5c0,0.4,0.2,0.8,0.4,1.1l0,0c0,0,0,0,0,0c0,0,0,0,0,0    c1.3,1.3,2,3,2,4.9c0,3.9-3.1,7-7,7s-7-3.1-7-7c0-1.9,0.8-3.7,2.1-4.9l0,0C7.3,6.8,7.5,6.4,7.5,6c0-0.8-0.7-1.5-1.5-1.5    c-0.4,0-0.8,0.2-1.1,0.4l0,0C3.1,6.7,2,9.2,2,12c0,5.5,4.5,10,10,10s10-4.5,10-10C22,9.2,20.9,6.7,19.1,4.9z" />
                                </g>
                                </g>
                            </svg>
                            <span>Logout</span>
                        </button>
                    </div>
                </div>
            </div>
        </nav>
    </div>
    <hr>
</div>



<!-- Navbar & Hero End -->
