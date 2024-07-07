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
                                <a href="{{ route('restaurantOwner_profile') }}"
                                    class="w-full flex items-center text-qua hover:text-gray-200 rounded-xl hover:bg-orange-600 py-2 px-2 {{ Request::route()->getName() === 'restaurantOwner_profile' ? ' bg-orange-600' : '' }}">
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
                                    <span class="text-sm mx-2">Profile</span>
                                </a>
                            </li>
                            <li
                                class="flex w-full justify-between text-gray-400 hover:text-gray-300 cursor-pointer items-center mb-3">
                                <a href="{{ route('restaurantOwner_orders') }}"
                                    class="w-full flex items-center text-qua hover:text-gray-200 rounded-xl hover:bg-orange-600 py-2 px-2 {{ Request::route()->getName() === 'restaurantOwner_orders' ? ' bg-orange-600' : '' }}">
                                    <svg class="fill-white" width="18" height="18" enable-background="new 0 0 64 64" id="Layer_1" version="1.1" viewBox="0 0 64 64" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g>
                                        <path d="M60.3496094,17.6196289C59.9726563,17.2241211,59.4492188,17,58.9023438,17H47v-2c0-7.7197266-6.2802734-14-14-14h-2   c-7.7197266,0-14,6.2802734-14,14v2H5.0976563c-0.546875,0-1.0703125,0.2241211-1.4472656,0.6196289   c-0.3779297,0.3959961-0.5761719,0.9291992-0.5507813,1.4755859l1.8183594,38.1899414   C5.0712891,60.4902344,7.703125,63,10.9111328,63h42.1777344c3.2080078,0,5.8398438-2.5097656,5.9931641-5.7148438   l1.8183594-38.1899414C60.9257813,18.5488281,60.7275391,18.015625,60.3496094,17.6196289z M21,15c0-5.5141602,4.4863281-10,10-10   h2c5.5136719,0,10,4.4858398,10,10v2H21V15z M55.0859375,57.0957031C55.0351563,58.1630859,54.1582031,59,53.0888672,59H10.9111328   c-1.0693359,0-1.9462891-0.8369141-1.9970703-1.9042969L7.1953125,21H17v7c0,1.1044922,0.8955078,2,2,2s2-0.8955078,2-2v-7h22v7   c0,1.1044922,0.8955078,2,2,2s2-0.8955078,2-2v-7h9.8046875L55.0859375,57.0957031z"/>
                                    </svg>
                                    <span class="text-sm ml-2">Orders</span>
                                </a>
                            </li>
                            <li
                                class="flex w-full justify-between text-gray-400 hover:text-gray-300 cursor-pointer items-center mb-3">
                                <a href="{{ route('restaurantOwner_menu_management') }}"
                                    class="w-full flex items-center text-qua hover:text-gray-200 rounded-xl hover:bg-orange-600 py-2 px-2 {{ Request::route()->getName() === 'restaurantOwner_menu_management' ? ' bg-orange-600' : '' }}">
                                    <svg class="fill-white" width="18"
                                        style="fill-rule:evenodd;clip-rule:evenodd;stroke-linejoin:round;stroke-miterlimit:2;"
                                        version="1.1" viewBox="0 0 32 32" xml:space="preserve"
                                        xmlns="http://www.w3.org/2000/svg" xmlns:serif="http://www.serif.com/"
                                        xmlns:xlink="http://www.w3.org/1999/xlink">
                                        <path
                                            d="M27,4c-0,-1.657 -1.343,-3 -3,-3l-16.012,0c-1.657,0 -3,1.343 -3,3c-0,5.154 -0,18.844 -0,23.998c-0,1.657 1.343,3 3,3l16.012,0c1.657,0 3,-1.343 3,-3c0,-5.154 0,-18.844 -0,-23.998Zm-6,-1l-0,1.002c0,0.795 -0.316,1.558 -0.879,2.121c-0.562,0.563 -1.325,0.879 -2.121,0.879l-4,-0c-0.796,-0 -1.559,-0.316 -2.121,-0.879c-0.563,-0.563 -0.879,-1.326 -0.879,-2.121l0,-1.002l-3.012,0c-0.553,0 -1,0.448 -1,1c-0,5.154 -0,18.844 -0,23.998c-0,0.553 0.447,1 1,1c-0,0 16.012,0 16.012,0c0.552,0 1,-0.447 1,-1c0,-5.154 0,-18.844 -0,-23.998c-0,-0.552 -0.448,-1 -1,-1l-3,0Zm-2,0l-6,0l-0,1.002c-0,0.265 0.105,0.519 0.293,0.707c0.187,0.187 0.442,0.293 0.707,0.293c0,-0 4,-0 4,-0c0.265,-0 0.52,-0.106 0.707,-0.293c0.188,-0.188 0.293,-0.442 0.293,-0.707l-0,-1.002Z" />
                                        <circle cx="10" cy="10.006" r="1.25" />
                                        <circle cx="10" cy="14" r="1.25" />
                                        <circle cx="10" cy="18.014" r="1.25" />
                                        <circle cx="10" cy="22.028" r="1.25" />
                                        <circle cx="10" cy="26.042" r="1.25" />
                                        <path
                                            d="M14,11l7.988,0c0.552,0 1,-0.448 1,-1c-0,-0.552 -0.448,-1 -1,-1l-7.988,0c-0.552,0 -1,0.448 -1,1c0,0.552 0.448,1 1,1Z" />
                                        <path
                                            d="M14.006,14.998l7.988,0c0.552,0 1,-0.448 1,-1c-0,-0.552 -0.448,-1 -1,-1l-7.988,0c-0.552,0 -1,0.448 -1,1c0,0.552 0.448,1 1,1Z" />
                                        <path
                                            d="M14,19l7.988,-0c0.552,-0 1,-0.448 1,-1c-0,-0.552 -0.448,-1 -1,-1l-7.988,-0c-0.552,-0 -1,0.448 -1,1c0,0.552 0.448,1 1,1Z" />
                                        <path
                                            d="M14.006,23l7.988,-0c0.552,0 1,-0.448 1,-1c-0,-0.552 -0.448,-1 -1,-1l-7.988,-0c-0.552,0 -1,0.448 -1,1c0,0.552 0.448,1 1,1Z" />
                                        <path
                                            d="M14,26.998l7.988,0c0.552,0 1,-0.448 1,-1c-0,-0.552 -0.448,-1 -1,-1l-7.988,0c-0.552,0 -1,0.448 -1,1c-0,0.552 0.448,1 1,1Z" />
                                        <g id="Icon" />
                                    </svg>
                                    <span class="text-sm ml-2">Menu management</span>
                                </a>
                            </li>
                            <li
                                class="flex w-full justify-between text-gray-400 hover:text-gray-300 cursor-pointer items-center mb-2">
                                <a href="{{ route('restaurantOwner_settings') }}"
                                    class="w-full flex items-center text-qua hover:text-gray-200 rounded-xl hover:bg-orange-600 py-2 px-2 {{ Request::route()->getName() === 'restaurantOwner_settings' ? ' bg-orange-600' : '' }}">
                                    <svg class="fill-white" id="icon" width="20" viewBox="0 0 512 512"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <title />
                                        <g data-name="1" id="_1">
                                            <path
                                                d="M293.9,450H233.53a15,15,0,0,1-14.92-13.42l-4.47-42.09a152.77,152.77,0,0,1-18.25-7.56L163,413.53a15,15,0,0,1-20-1.06l-42.69-42.69a15,15,0,0,1-1.06-20l26.61-32.93a152.15,152.15,0,0,1-7.57-18.25L76.13,294.1a15,15,0,0,1-13.42-14.91V218.81A15,15,0,0,1,76.13,203.9l42.09-4.47a152.15,152.15,0,0,1,7.57-18.25L99.18,148.25a15,15,0,0,1,1.06-20l42.69-42.69a15,15,0,0,1,20-1.06l32.93,26.6a152.77,152.77,0,0,1,18.25-7.56l4.47-42.09A15,15,0,0,1,233.53,48H293.9a15,15,0,0,1,14.92,13.42l4.46,42.09a152.91,152.91,0,0,1,18.26,7.56l32.92-26.6a15,15,0,0,1,20,1.06l42.69,42.69a15,15,0,0,1,1.06,20l-26.61,32.93a153.8,153.8,0,0,1,7.57,18.25l42.09,4.47a15,15,0,0,1,13.41,14.91v60.38A15,15,0,0,1,451.3,294.1l-42.09,4.47a153.8,153.8,0,0,1-7.57,18.25l26.61,32.93a15,15,0,0,1-1.06,20L384.5,412.47a15,15,0,0,1-20,1.06l-32.92-26.6a152.91,152.91,0,0,1-18.26,7.56l-4.46,42.09A15,15,0,0,1,293.9,450ZM247,420h33.39l4.09-38.56a15,15,0,0,1,11.06-12.91A123,123,0,0,0,325.7,356a15,15,0,0,1,17,1.31l30.16,24.37,23.61-23.61L372.06,328a15,15,0,0,1-1.31-17,122.63,122.63,0,0,0,12.49-30.14,15,15,0,0,1,12.92-11.06l38.55-4.1V232.31l-38.55-4.1a15,15,0,0,1-12.92-11.06A122.63,122.63,0,0,0,370.75,187a15,15,0,0,1,1.31-17l24.37-30.16-23.61-23.61-30.16,24.37a15,15,0,0,1-17,1.31,123,123,0,0,0-30.14-12.49,15,15,0,0,1-11.06-12.91L280.41,78H247l-4.09,38.56a15,15,0,0,1-11.07,12.91A122.79,122.79,0,0,0,201.73,142a15,15,0,0,1-17-1.31L154.6,116.28,131,139.89l24.38,30.16a15,15,0,0,1,1.3,17,123.41,123.41,0,0,0-12.49,30.14,15,15,0,0,1-12.91,11.06l-38.56,4.1v33.38l38.56,4.1a15,15,0,0,1,12.91,11.06A123.41,123.41,0,0,0,156.67,311a15,15,0,0,1-1.3,17L131,358.11l23.61,23.61,30.17-24.37a15,15,0,0,1,17-1.31,122.79,122.79,0,0,0,30.13,12.49,15,15,0,0,1,11.07,12.91ZM449.71,279.19h0Z" />
                                            <path
                                                d="M263.71,340.36A91.36,91.36,0,1,1,355.08,249,91.46,91.46,0,0,1,263.71,340.36Zm0-152.72A61.36,61.36,0,1,0,325.08,249,61.43,61.43,0,0,0,263.71,187.64Z" />
                                        </g>
                                    </svg>
                                    <span class="text-sm ml-2">Settings</span>
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
                        <a class="w-full border flex items-center gap-2 px-4 py-2 text-sm font-semibold rounded-lg hover:bg-red-500 hover:text-white">
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                            <button class="flex items-center w-full gap-2 text-sm font-semibold rounded-lg hover:bg-red-500 hover:text-white"
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
                        </a>
                    </div>
                </div>
            </div>
            <div class="w-64 z-40 absolute bg-gray-800 shadow md:h-full flex-col justify-between md:hidden transition duration-150 ease-in-out"
                id="mobile-nav">
                <button aria-label="toggle sidebar" id="openSideBar"
                    class="h-10 w-10 bg-gray-800 absolute right-0 mt-1 -mr-10 flex items-center shadow rounded-tr rounded-br justify-center cursor-pointer focus:outline-none focus:ring-2 focus:ring-offset-2 rounded focus:ring-gray-800"
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
                    class="hidden h-10 w-10 bg-gray-800 absolute right-0 mt-1 -mr-10 flex items-center shadow rounded-tr rounded-br justify-center cursor-pointer text-white"
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
                                <a href="{{ route('restaurantOwner_profile') }}"
                                    class="w-full flex items-center text-qua hover:text-gray-200 rounded-xl hover:bg-orange-600 py-2 px-2 {{ Request::route()->getName() === 'restaurantOwner_profile' ? ' bg-orange-600' : '' }}">
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
                                    <span class="text-sm mx-2">Profile</span>
                                </a>
                            </li>
                            <li
                                class="flex w-full justify-between text-gray-400 hover:text-gray-300 cursor-pointer items-center mb-3">
                                <a href="{{ route('restaurantOwner_orders') }}"
                                    class="w-full flex items-center text-qua hover:text-gray-200 rounded-xl hover:bg-orange-600 py-2 px-2 {{ Request::route()->getName() === 'restaurantOwner_orders' ? ' bg-orange-600' : '' }}">
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
                                    <span class="text-sm ml-2">Orders</span>
                                </a>
                            </li>
                            <li
                                class="flex w-full justify-between text-gray-400 hover:text-gray-300 cursor-pointer items-center mb-3">
                                <a href="{{ route('restaurantOwner_menu_management') }}"
                                    class="w-full flex items-center text-qua hover:text-gray-200 rounded-xl hover:bg-orange-600 py-2 px-2 {{ Request::route()->getName() === 'restaurantOwner_menu_management' ? ' bg-orange-600' : '' }}">
                                    <svg class="fill-white" width="18"
                                        style="fill-rule:evenodd;clip-rule:evenodd;stroke-linejoin:round;stroke-miterlimit:2;"
                                        version="1.1" viewBox="0 0 32 32" xml:space="preserve"
                                        xmlns="http://www.w3.org/2000/svg" xmlns:serif="http://www.serif.com/"
                                        xmlns:xlink="http://www.w3.org/1999/xlink">
                                        <path
                                            d="M27,4c-0,-1.657 -1.343,-3 -3,-3l-16.012,0c-1.657,0 -3,1.343 -3,3c-0,5.154 -0,18.844 -0,23.998c-0,1.657 1.343,3 3,3l16.012,0c1.657,0 3,-1.343 3,-3c0,-5.154 0,-18.844 -0,-23.998Zm-6,-1l-0,1.002c0,0.795 -0.316,1.558 -0.879,2.121c-0.562,0.563 -1.325,0.879 -2.121,0.879l-4,-0c-0.796,-0 -1.559,-0.316 -2.121,-0.879c-0.563,-0.563 -0.879,-1.326 -0.879,-2.121l0,-1.002l-3.012,0c-0.553,0 -1,0.448 -1,1c-0,5.154 -0,18.844 -0,23.998c-0,0.553 0.447,1 1,1c-0,0 16.012,0 16.012,0c0.552,0 1,-0.447 1,-1c0,-5.154 0,-18.844 -0,-23.998c-0,-0.552 -0.448,-1 -1,-1l-3,0Zm-2,0l-6,0l-0,1.002c-0,0.265 0.105,0.519 0.293,0.707c0.187,0.187 0.442,0.293 0.707,0.293c0,-0 4,-0 4,-0c0.265,-0 0.52,-0.106 0.707,-0.293c0.188,-0.188 0.293,-0.442 0.293,-0.707l-0,-1.002Z" />
                                        <circle cx="10" cy="10.006" r="1.25" />
                                        <circle cx="10" cy="14" r="1.25" />
                                        <circle cx="10" cy="18.014" r="1.25" />
                                        <circle cx="10" cy="22.028" r="1.25" />
                                        <circle cx="10" cy="26.042" r="1.25" />
                                        <path
                                            d="M14,11l7.988,0c0.552,0 1,-0.448 1,-1c-0,-0.552 -0.448,-1 -1,-1l-7.988,0c-0.552,0 -1,0.448 -1,1c0,0.552 0.448,1 1,1Z" />
                                        <path
                                            d="M14.006,14.998l7.988,0c0.552,0 1,-0.448 1,-1c-0,-0.552 -0.448,-1 -1,-1l-7.988,0c-0.552,0 -1,0.448 -1,1c0,0.552 0.448,1 1,1Z" />
                                        <path
                                            d="M14,19l7.988,-0c0.552,-0 1,-0.448 1,-1c-0,-0.552 -0.448,-1 -1,-1l-7.988,-0c-0.552,-0 -1,0.448 -1,1c0,0.552 0.448,1 1,1Z" />
                                        <path
                                            d="M14.006,23l7.988,-0c0.552,0 1,-0.448 1,-1c-0,-0.552 -0.448,-1 -1,-1l-7.988,-0c-0.552,0 -1,0.448 -1,1c0,0.552 0.448,1 1,1Z" />
                                        <path
                                            d="M14,26.998l7.988,0c0.552,0 1,-0.448 1,-1c-0,-0.552 -0.448,-1 -1,-1l-7.988,0c-0.552,0 -1,0.448 -1,1c-0,0.552 0.448,1 1,1Z" />
                                        <g id="Icon" />
                                    </svg>
                                    <span class="text-sm ml-2">Menu management</span>
                                </a>
                            </li>
                            <li
                                class="flex w-full justify-between text-gray-400 hover:text-gray-300 cursor-pointer items-center mb-2">
                                <a href="{{ route('restaurantOwner_settings') }}"
                                    class="w-full flex items-center text-qua hover:text-gray-200 rounded-xl hover:bg-orange-600 py-2 px-2 {{ Request::route()->getName() === 'restaurantOwner_settings' ? ' bg-orange-600' : '' }}">
                                    <svg class="fill-white" id="icon" width="20" viewBox="0 0 512 512"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <title />
                                        <g data-name="1" id="_1">
                                            <path
                                                d="M293.9,450H233.53a15,15,0,0,1-14.92-13.42l-4.47-42.09a152.77,152.77,0,0,1-18.25-7.56L163,413.53a15,15,0,0,1-20-1.06l-42.69-42.69a15,15,0,0,1-1.06-20l26.61-32.93a152.15,152.15,0,0,1-7.57-18.25L76.13,294.1a15,15,0,0,1-13.42-14.91V218.81A15,15,0,0,1,76.13,203.9l42.09-4.47a152.15,152.15,0,0,1,7.57-18.25L99.18,148.25a15,15,0,0,1,1.06-20l42.69-42.69a15,15,0,0,1,20-1.06l32.93,26.6a152.77,152.77,0,0,1,18.25-7.56l4.47-42.09A15,15,0,0,1,233.53,48H293.9a15,15,0,0,1,14.92,13.42l4.46,42.09a152.91,152.91,0,0,1,18.26,7.56l32.92-26.6a15,15,0,0,1,20,1.06l42.69,42.69a15,15,0,0,1,1.06,20l-26.61,32.93a153.8,153.8,0,0,1,7.57,18.25l42.09,4.47a15,15,0,0,1,13.41,14.91v60.38A15,15,0,0,1,451.3,294.1l-42.09,4.47a153.8,153.8,0,0,1-7.57,18.25l26.61,32.93a15,15,0,0,1-1.06,20L384.5,412.47a15,15,0,0,1-20,1.06l-32.92-26.6a152.91,152.91,0,0,1-18.26,7.56l-4.46,42.09A15,15,0,0,1,293.9,450ZM247,420h33.39l4.09-38.56a15,15,0,0,1,11.06-12.91A123,123,0,0,0,325.7,356a15,15,0,0,1,17,1.31l30.16,24.37,23.61-23.61L372.06,328a15,15,0,0,1-1.31-17,122.63,122.63,0,0,0,12.49-30.14,15,15,0,0,1,12.92-11.06l38.55-4.1V232.31l-38.55-4.1a15,15,0,0,1-12.92-11.06A122.63,122.63,0,0,0,370.75,187a15,15,0,0,1,1.31-17l24.37-30.16-23.61-23.61-30.16,24.37a15,15,0,0,1-17,1.31,123,123,0,0,0-30.14-12.49,15,15,0,0,1-11.06-12.91L280.41,78H247l-4.09,38.56a15,15,0,0,1-11.07,12.91A122.79,122.79,0,0,0,201.73,142a15,15,0,0,1-17-1.31L154.6,116.28,131,139.89l24.38,30.16a15,15,0,0,1,1.3,17,123.41,123.41,0,0,0-12.49,30.14,15,15,0,0,1-12.91,11.06l-38.56,4.1v33.38l38.56,4.1a15,15,0,0,1,12.91,11.06A123.41,123.41,0,0,0,156.67,311a15,15,0,0,1-1.3,17L131,358.11l23.61,23.61,30.17-24.37a15,15,0,0,1,17-1.31,122.79,122.79,0,0,0,30.13,12.49,15,15,0,0,1,11.07,12.91ZM449.71,279.19h0Z" />
                                            <path
                                                d="M263.71,340.36A91.36,91.36,0,1,1,355.08,249,91.46,91.46,0,0,1,263.71,340.36Zm0-152.72A61.36,61.36,0,1,0,325.08,249,61.43,61.43,0,0,0,263.71,187.64Z" />
                                        </g>
                                    </svg>
                                    <span class="text-sm ml-2">Settings</span>
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
                        <a class="w-full border flex items-center gap-2 px-4 py-2 text-sm font-semibold rounded-lg hover:bg-red-500 hover:text-white">
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                            <button class="flex items-center w-full gap-2 text-sm font-semibold rounded-lg hover:bg-red-500 hover:text-white"
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
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
