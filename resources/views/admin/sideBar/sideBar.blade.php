<div class="w-full h-full flex" style="min-height: 100vh">

    <div class="w-0 md:w-48 lg:w-56 xl:w-64 text-white flex flex-col z-20">
        <div class="fixed top-0 left-0 h-screen md:w-48 lg:w-56 xl:w-64">
            <div class="bg-pr h-full shadow hidden md:flex">
                <div class="flex flex-col items-center justify-between h-full p-3">
                    <div>
                        <a href="{{ route('home') }}"
                            class="border border-b rounded-xl w-full flex items-center justify-center bg-cover bg-center">
                            <img src="{{ asset('images/logo/logo.png') }}" alt="" class="w-3/4" style="">
                        </a>
                        <ul class="w-full mt-10">
                            <li class="flex w-full justify-between cursor-pointer items-center mb-3">
                                <a href="{{ route('dashboard') }}"
                                    class="w-full flex items-center text-qua hover:text-gray-200 rounded-xl hover:bg-orange-600 py-2 px-2 {{ Request::route()->getName() === 'dashboard' ? ' bg-orange-600' : '' }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-grid"
                                        width="18" height="18" viewBox="0 0 24 24" stroke-width="1.5"
                                        stroke="currentColor" fill="none" stroke-linecap="round"
                                        stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z"></path>
                                        <rect x="4" y="4" width="6" height="6" rx="1"></rect>
                                        <rect x="14" y="4" width="6" height="6" rx="1"></rect>
                                        <rect x="4" y="14" width="6" height="6" rx="1"></rect>
                                        <rect x="14" y="14" width="6" height="6" rx="1"></rect>
                                    </svg>
                                    <span class="text-sm mx-2">Dashboard</span>
                                </a>
                            </li>

                            <li class="w-full mb-2">
                                Users
                            </li>
                            <li
                                class="flex w-full justify-between text-gray-400 hover:text-gray-300 cursor-pointer items-center mb-2">
                                <a href="{{ route('users') }}"
                                    class="w-full flex items-center text-qua hover:text-gray-200 rounded-xl hover:bg-orange-600 py-2 px-2 {{ Request::route()->getName() === 'users' ? ' bg-orange-600' : '' }}">
                                    <svg viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg" width='18' height="18"
                                        class="icon icon-tabler icon-tabler-puzzle stroke-white fill-none">
                                        <defs>
                                            <style>
                                                .cls-1 {
                                                    stroke-linecap: round;
                                                    stroke-linejoin: round;
                                                    stroke-width: 2px;
                                                }

                                            </style>
                                        </defs>
                                        <title />
                                        <g data-name="79-users" id="_79-users">
                                            <circle class="cls-1" cx="16" cy="13" r="5" />
                                            <path class="cls-1" d="M23,28A7,7,0,0,0,9,28Z" />
                                            <path class="cls-1" d="M24,14a5,5,0,1,0-4-8" />
                                            <path class="cls-1" d="M25,24h6a7,7,0,0,0-7-7" />
                                            <path class="cls-1" d="M12,6a5,5,0,1,0-4,8" />
                                            <path class="cls-1" d="M8,17a7,7,0,0,0-7,7H7" />
                                        </g>
                                    </svg>
                                    <span class="text-sm ml-2">Users</span>
                                </a>
                            </li>

                            <li class="w-full mb-2">
                                Restaurants
                            </li>
                            <li
                                class="flex w-full justify-between text-gray-400 hover:text-gray-300 cursor-pointer items-center mb-2">
                                <a href="{{ route('restaurants') }}"
                                    class="w-full flex items-center text-qua hover:text-gray-200 rounded-xl hover:bg-orange-600 py-2 px-2 {{ Request::route()->getName() === 'restaurants' ? ' bg-orange-600' : '' }}">
                                    <svg width="20" viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg"
                                        class="stroke-white">
                                        <defs>
                                            <style>
                                                .cls-1 {
                                                    fill: none;
                                                    stroke-linejoin: round;
                                                    stroke-width: 2px;
                                                }

                                            </style>
                                        </defs>
                                        <title />
                                        <g data-name="Layer 19" id="Layer_19">
                                            <rect class="cls-1" height="4" width="60" x="2" y="58" />
                                            <line class="cls-1" x1="60" x2="60" y1="25" y2="58" />
                                            <line class="cls-1" x1="4" x2="4" y1="58" y2="25" />
                                            <path class="cls-1"
                                                d="M2,12H12a0,0,0,0,1,0,0v9a5,5,0,0,1-5,5H7a5,5,0,0,1-5-5V12A0,0,0,0,1,2,12Z" />
                                            <path class="cls-1"
                                                d="M22,17.59V21a5,5,0,0,1-5,5h0a5,5,0,0,1-5-5V12h9.05" />
                                            <path class="cls-1" d="M31,24a5,5,0,0,1-4,2h0a5,5,0,0,1-5-5V17.59" />
                                            <path class="cls-1" d="M42,17.59V21a5,5,0,0,1-5,5h0a5,5,0,0,1-4-2" />
                                            <path class="cls-1" d="M43,12h9v9a5,5,0,0,1-5,5h0a5,5,0,0,1-5-5V17.59" />
                                            <path class="cls-1"
                                                d="M52,12H62a0,0,0,0,1,0,0v9a5,5,0,0,1-5,5h0a5,5,0,0,1-5-5V12A0,0,0,0,1,52,12Z" />
                                            <circle class="cls-1" cx="32" cy="13" r="11" />
                                            <path class="cls-1"
                                                d="M27,8h8a0,0,0,0,1,0,0v8a2,2,0,0,1-2,2H29a2,2,0,0,1-2-2V8A0,0,0,0,1,27,8Z" />
                                            <path class="cls-1" d="M35,10h1a3,3,0,0,1,3,3h0a3,3,0,0,1-3,3H35" />
                                            <rect class="cls-1" height="22" width="28" x="8" y="30" />
                                            <polyline class="cls-1" points="42 58 42 38 56 38 56 58" />
                                            <line class="cls-1" x1="8" x2="36" y1="46" y2="46" />
                                            <line class="cls-1" x1="12" x2="18" y1="41" y2="35" />
                                            <line class="cls-1" x1="19" x2="25" y1="41" y2="35" />
                                            <line class="cls-1" x1="26" x2="32" y1="41" y2="35" />
                                            <line class="cls-1" x1="46" x2="46" y1="45" y2="51" />
                                            <rect class="cls-1" height="4" width="10" x="44" y="30" />
                                        </g>
                                    </svg>
                                    <span class="text-sm ml-2">Restaurants</span>
                                </a>
                            </li>
                            <li
                                class="flex w-full justify-between text-gray-400 hover:text-gray-300 cursor-pointer items-center mb-2">
                                <a href="{{ route('restaurant_request') }}"
                                    class="w-full flex items-center text-qua hover:text-gray-200 rounded-xl hover:bg-orange-600 py-2 px-2 {{ Request::route()->getName() === 'restaurant_request' ? ' bg-orange-600' : '' }}">
                                    <svg class="fill-white" id="icon" width="20" viewBox="0 0 32 32"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <title />
                                        <path
                                            d="M22,22v6H6V4H16V2H6A2,2,0,0,0,4,4V28a2,2,0,0,0,2,2H22a2,2,0,0,0,2-2V22Z"
                                            transform="translate(0)" />
                                        <path
                                            d="M29.54,5.76l-3.3-3.3a1.6,1.6,0,0,0-2.24,0l-14,14V22h5.53l14-14a1.6,1.6,0,0,0,0-2.24ZM14.7,20H12V17.3l9.44-9.45,2.71,2.71ZM25.56,9.15,22.85,6.44l2.27-2.27,2.71,2.71Z"
                                            transform="translate(0)" />
                                        <rect class="cls-1" data-name="&lt;Transparent Rectangle&gt;" height="20"
                                            id="_Transparent_Rectangle_" width="20" />
                                    </svg>
                                    <span class="text-sm ml-2">Restaurants requests</span>
                                </a>
                            </li>
                        </ul>
                        <hr>
                        <div
                            class="w-full group inline-block block mt-3 px-2 py-1 text-sm font-semibold rounded-lg hover:bg-orange-600 text-qua hover:text-white">
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
                                class="z-10 py-2 mt-1 px-2 text-qua bg-sec rounded-3xl transform scale-0 group-hover:scale-100 absolute transition duration-150 ease-in-out origin-top min-w-40 flex flex-col">
                                <a href="{{ route('setLanguage', ['lang' => 'en']) }}"
                                    class="rounded-xl px-3 py-2 hover:bg-orange-600 mb-2 hover:text-white">{{ __('messages.change_lang.en') }}</a>
                                <a href="{{ route('setLanguage', ['lang' => 'ar']) }}"
                                    class="rounded-xl px-3 py-2 hover:bg-orange-600 hover:text-white">{{ __('messages.change_lang.ar') }}</a>
                            </ul>
                        </div>
                    </div>
                    <div class="flex justify-center w-full">
                        <a
                            class="w-full border flex items-center gap-2 px-4 py-2 text-sm font-semibold rounded-lg hover:bg-red-500 hover:text-white">
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                            <button
                                class="flex items-center w-full gap-2 text-sm font-semibold rounded-lg hover:bg-red-500 hover:text-white"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <svg class="fill-white" width="16" style="enable-background:new 0 0 24 24;"
                                    version="1.1" viewBox="0 0 24 24" xml:space="preserve"
                                    xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                    <g id="info" />
                                    <g id="icons">
                                        <g id="exit2">
                                            <path
                                                d="M12,10c1.1,0,2-0.9,2-2V4c0-1.1-0.9-2-2-2s-2,0.9-2,2v4C10,9.1,10.9,10,12,10z" />
                                            <path
                                                d="M19.1,4.9L19.1,4.9c-0.3-0.3-0.6-0.4-1.1-0.4c-0.8,0-1.5,0.7-1.5,1.5c0,0.4,0.2,0.8,0.4,1.1l0,0c0,0,0,0,0,0c0,0,0,0,0,0    c1.3,1.3,2,3,2,4.9c0,3.9-3.1,7-7,7s-7-3.1-7-7c0-1.9,0.8-3.7,2.1-4.9l0,0C7.3,6.8,7.5,6.4,7.5,6c0-0.8-0.7-1.5-1.5-1.5    c-0.4,0-0.8,0.2-1.1,0.4l0,0C3.1,6.7,2,9.2,2,12c0,5.5,4.5,10,10,10s10-4.5,10-10C22,9.2,20.9,6.7,19.1,4.9z" />
                                        </g>
                                    </g>
                                </svg>
                                <span>Logout</span>
                            </button>
                        </a>
                    </div>
                </div>
            </div>
            <div class="w-64 z-40 absolute bg-pr shadow md:h-full flex-col justify-between sm:hidden transition duration-150 ease-in-out"
                id="mobile-nav">
                <button aria-label="toggle sidebar" id="openSideBar"
                    class="h-10 w-10 bg-pr absolute right-0 mt-1 -mr-10 flex items-center shadow rounded-tr rounded-br justify-center cursor-pointer focus:outline-none focus:ring-2 focus:ring-offset-2 rounded focus:ring-gray-800"
                    onclick="sidebarHandler(true)">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-adjustments" width="20"
                        height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="#FFFFFF" fill="none"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" />
                        <circle cx="6" cy="10" r="2" />
                        <line x1="6" y1="4" x2="6" y2="8" />
                        <line x1="6" y1="12" x2="6" y2="20" />
                        <circle cx="12" cy="16" r="2" />
                        <line x1="12" y1="4" x2="12" y2="14" />
                        <line x1="12" y1="18" x2="12" y2="20" />
                        <circle cx="18" cy="7" r="2" />
                        <line x1="18" y1="4" x2="18" y2="5" />
                        <line x1="18" y1="9" x2="18" y2="20" />
                    </svg>
                </button>
                <button aria-label="Close sidebar" id="closeSideBar"
                    class="hidden h-10 w-10 bg-pr absolute right-0 mt-1 -mr-10 flex items-center shadow rounded-tr rounded-br justify-center cursor-pointer text-white"
                    onclick="sidebarHandler(false)">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-x" width="20"
                        height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" />
                        <line x1="18" y1="6" x2="6" y2="18" />
                        <line x1="6" y1="6" x2="18" y2="18" />
                    </svg>
                </button>
                <div style="min-height: 100vh" class="flex flex-col justify-between px-3">
                    <div>
                        <a href="{{ route('home') }}"
                            class="border border-b rounded-xl w-full flex items-center justify-center bg-cover bg-center">
                            <img src="{{ asset('images/logo/logo.png') }}" alt="" class="w-3/4" style="">
                        </a>
                        <ul class="w-full mt-10">
                            <li class="flex w-full justify-between cursor-pointer items-center mb-3">
                                <a href="{{ route('dashboard') }}"
                                    class="w-full flex items-center text-qua hover:text-gray-200 rounded-xl hover:bg-orange-600 py-2 px-2 {{ Request::route()->getName() === 'dashboard' ? ' bg-orange-600' : '' }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-grid"
                                        width="18" height="18" viewBox="0 0 24 24" stroke-width="1.5"
                                        stroke="currentColor" fill="none" stroke-linecap="round"
                                        stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z"></path>
                                        <rect x="4" y="4" width="6" height="6" rx="1"></rect>
                                        <rect x="14" y="4" width="6" height="6" rx="1"></rect>
                                        <rect x="4" y="14" width="6" height="6" rx="1"></rect>
                                        <rect x="14" y="14" width="6" height="6" rx="1"></rect>
                                    </svg>
                                    <span class="text-sm mx-2">Dashboard</span>
                                </a>
                            </li>

                            <li class="w-full mb-2">
                                Users
                            </li>
                            <li
                                class="flex w-full justify-between text-gray-400 hover:text-gray-300 cursor-pointer items-center mb-2">
                                <a href="{{ route('users') }}"
                                    class="w-full flex items-center text-qua hover:text-gray-200 rounded-xl hover:bg-orange-600 py-2 px-2 {{ Request::route()->getName() === 'users' ? ' bg-orange-600' : '' }}">
                                    <svg viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg" width='18' height="18"
                                        class="icon icon-tabler icon-tabler-puzzle stroke-white fill-none">
                                        <defs>
                                            <style>
                                                .cls-1 {
                                                    stroke-linecap: round;
                                                    stroke-linejoin: round;
                                                    stroke-width: 2px;
                                                }

                                            </style>
                                        </defs>
                                        <title />
                                        <g data-name="79-users" id="_79-users">
                                            <circle class="cls-1" cx="16" cy="13" r="5" />
                                            <path class="cls-1" d="M23,28A7,7,0,0,0,9,28Z" />
                                            <path class="cls-1" d="M24,14a5,5,0,1,0-4-8" />
                                            <path class="cls-1" d="M25,24h6a7,7,0,0,0-7-7" />
                                            <path class="cls-1" d="M12,6a5,5,0,1,0-4,8" />
                                            <path class="cls-1" d="M8,17a7,7,0,0,0-7,7H7" />
                                        </g>
                                    </svg>
                                    <span class="text-sm ml-2">Users</span>
                                </a>
                            </li>

                            <li class="w-full mb-2">
                                Restaurants
                            </li>
                            <li
                                class="flex w-full justify-between text-gray-400 hover:text-gray-300 cursor-pointer items-center mb-2">
                                <a href="{{ route('restaurants') }}"
                                    class="w-full flex items-center text-qua hover:text-gray-200 rounded-xl hover:bg-orange-600 py-2 px-2 {{ Request::route()->getName() === 'restaurants' ? ' bg-orange-600' : '' }}">
                                    <svg width="20" viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg"
                                        class="stroke-white">
                                        <defs>
                                            <style>
                                                .cls-1 {
                                                    fill: none;
                                                    stroke-linejoin: round;
                                                    stroke-width: 2px;
                                                }

                                            </style>
                                        </defs>
                                        <title />
                                        <g data-name="Layer 19" id="Layer_19">
                                            <rect class="cls-1" height="4" width="60" x="2" y="58" />
                                            <line class="cls-1" x1="60" x2="60" y1="25" y2="58" />
                                            <line class="cls-1" x1="4" x2="4" y1="58" y2="25" />
                                            <path class="cls-1"
                                                d="M2,12H12a0,0,0,0,1,0,0v9a5,5,0,0,1-5,5H7a5,5,0,0,1-5-5V12A0,0,0,0,1,2,12Z" />
                                            <path class="cls-1"
                                                d="M22,17.59V21a5,5,0,0,1-5,5h0a5,5,0,0,1-5-5V12h9.05" />
                                            <path class="cls-1" d="M31,24a5,5,0,0,1-4,2h0a5,5,0,0,1-5-5V17.59" />
                                            <path class="cls-1" d="M42,17.59V21a5,5,0,0,1-5,5h0a5,5,0,0,1-4-2" />
                                            <path class="cls-1" d="M43,12h9v9a5,5,0,0,1-5,5h0a5,5,0,0,1-5-5V17.59" />
                                            <path class="cls-1"
                                                d="M52,12H62a0,0,0,0,1,0,0v9a5,5,0,0,1-5,5h0a5,5,0,0,1-5-5V12A0,0,0,0,1,52,12Z" />
                                            <circle class="cls-1" cx="32" cy="13" r="11" />
                                            <path class="cls-1"
                                                d="M27,8h8a0,0,0,0,1,0,0v8a2,2,0,0,1-2,2H29a2,2,0,0,1-2-2V8A0,0,0,0,1,27,8Z" />
                                            <path class="cls-1" d="M35,10h1a3,3,0,0,1,3,3h0a3,3,0,0,1-3,3H35" />
                                            <rect class="cls-1" height="22" width="28" x="8" y="30" />
                                            <polyline class="cls-1" points="42 58 42 38 56 38 56 58" />
                                            <line class="cls-1" x1="8" x2="36" y1="46" y2="46" />
                                            <line class="cls-1" x1="12" x2="18" y1="41" y2="35" />
                                            <line class="cls-1" x1="19" x2="25" y1="41" y2="35" />
                                            <line class="cls-1" x1="26" x2="32" y1="41" y2="35" />
                                            <line class="cls-1" x1="46" x2="46" y1="45" y2="51" />
                                            <rect class="cls-1" height="4" width="10" x="44" y="30" />
                                        </g>
                                    </svg>
                                    <span class="text-sm ml-2">Restaurants</span>
                                </a>
                            </li>
                            <li
                                class="flex w-full justify-between text-gray-400 hover:text-gray-300 cursor-pointer items-center mb-2">
                                <a href="{{ route('restaurant_request') }}"
                                    class="w-full flex items-center text-qua hover:text-gray-200 rounded-xl hover:bg-orange-600 py-2 px-2 {{ Request::route()->getName() === 'restaurant_request' ? ' bg-orange-600' : '' }}">
                                    <svg class="fill-white" id="icon" width="20" viewBox="0 0 32 32"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <title />
                                        <path
                                            d="M22,22v6H6V4H16V2H6A2,2,0,0,0,4,4V28a2,2,0,0,0,2,2H22a2,2,0,0,0,2-2V22Z"
                                            transform="translate(0)" />
                                        <path
                                            d="M29.54,5.76l-3.3-3.3a1.6,1.6,0,0,0-2.24,0l-14,14V22h5.53l14-14a1.6,1.6,0,0,0,0-2.24ZM14.7,20H12V17.3l9.44-9.45,2.71,2.71ZM25.56,9.15,22.85,6.44l2.27-2.27,2.71,2.71Z"
                                            transform="translate(0)" />
                                        <rect class="cls-1" data-name="&lt;Transparent Rectangle&gt;" height="20"
                                            id="_Transparent_Rectangle_" width="20" />
                                    </svg>
                                    <span class="text-sm ml-2">Restaurants requests</span>
                                </a>
                            </li>
                        </ul>
                        <hr>
                        <div
                            class="w-full group inline-block block mt-3 px-2 py-1 text-sm font-semibold rounded-lg hover:bg-orange-600 text-qua hover:text-white">
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
                                class="z-10 py-2 mt-1 px-2 text-qua bg-sec rounded-3xl transform scale-0 group-hover:scale-100 absolute transition duration-150 ease-in-out origin-top min-w-40 flex flex-col">
                                <a href="{{ route('setLanguage', ['lang' => 'en']) }}"
                                    class="rounded-xl px-3 py-2 hover:bg-orange-600 mb-2 hover:text-white">{{ __('messages.change_lang.en') }}</a>
                                <a href="{{ route('setLanguage', ['lang' => 'ar']) }}"
                                    class="rounded-xl px-3 py-2 hover:bg-orange-600 hover:text-white">{{ __('messages.change_lang.ar') }}</a>
                            </ul>
                        </div>
                    </div>
                    <div class="flex justify-center w-full">
                        <a
                            class="w-full border flex items-center gap-2 px-4 py-2 text-sm font-semibold rounded-lg hover:bg-red-500 hover:text-white">
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                            <button
                                class="flex items-center w-full gap-2 text-sm font-semibold rounded-lg hover:bg-red-500 hover:text-white"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <svg class="fill-white" width="16" style="enable-background:new 0 0 24 24;"
                                    version="1.1" viewBox="0 0 24 24" xml:space="preserve"
                                    xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                    <g id="info" />
                                    <g id="icons">
                                        <g id="exit2">
                                            <path
                                                d="M12,10c1.1,0,2-0.9,2-2V4c0-1.1-0.9-2-2-2s-2,0.9-2,2v4C10,9.1,10.9,10,12,10z" />
                                            <path
                                                d="M19.1,4.9L19.1,4.9c-0.3-0.3-0.6-0.4-1.1-0.4c-0.8,0-1.5,0.7-1.5,1.5c0,0.4,0.2,0.8,0.4,1.1l0,0c0,0,0,0,0,0c0,0,0,0,0,0    c1.3,1.3,2,3,2,4.9c0,3.9-3.1,7-7,7s-7-3.1-7-7c0-1.9,0.8-3.7,2.1-4.9l0,0C7.3,6.8,7.5,6.4,7.5,6c0-0.8-0.7-1.5-1.5-1.5    c-0.4,0-0.8,0.2-1.1,0.4l0,0C3.1,6.7,2,9.2,2,12c0,5.5,4.5,10,10,10s10-4.5,10-10C22,9.2,20.9,6.7,19.1,4.9z" />
                                        </g>
                                    </g>
                                </svg>
                                <span>Logout</span>
                            </button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
