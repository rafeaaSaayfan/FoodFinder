@extends('layouts.dashboard.dashboard')

@push('links')
    <link rel="stylesheet" href="https://unpkg.com/@themesberg/flowbite@1.2.0/dist/flowbite.min.css" />
@endpush

@section('content')

@include('restaurant_owner.sideBar.sideBar')

<div class="bg-qua w-full flex justify-center items-center ps-md-4 py-3">
    <div class="container w-full flex justify-center items-center px-md-5">
        <input type="hidden" id="restaurant_id" value="{{ $restaurant->id }}">
        <div class="w-full flex flex-col">
            <div class="w-full px-3 pt-3 flex flex-wrap items-center gap-3 gap-md-5 border-x border-t bg-white rounded-t-lg">
                <a class="tab1 text-nowrap cursor-pointer border-b-2 border-orange-600 pb-2 text-ter">
                    <div class="w-full flex items-center gap-1 text-xs sm:text-sm">
                        <span class="fas fa-hourglass-start"></span>
                        <span>
                            Pending
                        </span>
                    </div>
                </a>
                <a class="tab2 text-nowrap cursor-pointer pb-2 text-sec">
                    <div class="w-full flex items-center gap-1 text-xs sm:text-sm">
                        <span class="fas fa-times-circle"></span>
                        <span>
                            Canceled
                        </span>
                    </div>
                </a>
                <a class="tab3 text-nowrap cursor-pointer pb-2 text-sec">
                    <div class="w-full flex items-center gap-1 text-xs sm:text-sm">
                        <span class="fas fa-check-circle"></span>
                        <span>
                            Accepted
                        </span>
                    </div>
                </a>
                <a class="tab4 text-nowrap cursor-pointer pb-2 text-sec">
                    <div class="w-full flex items-center gap-1 text-xs sm:text-sm">
                        <span class="fas fa-check-double"></span>
                        <span>
                            Completed
                        </span>
                    </div>
                </a>
            </div>
            <div class="relative border pb-3 px-4 rounded-b-lg shadow bg-white mb-4" style="min-height: 20vh; max-height: fit-content">
                <div class="orders pt-3 flex flex-wrap items-center justify-around"></div>
                <div class="pagination_controls rounded"></div>
                <div class="hidden absolute inset-0 flex items-center justify-center z-50 loading-indicator">
                </div>
            </div>
        </div>
    </div>
</div>

<div data-dialog-backdrop="web-3-dialog" data-dialog-backdrop-close="true"
   class="modal hidden fixed inset-0 z-[999] grid h-screen w-screen place-items-center bg-black bg-opacity-60 backdrop-blur-sm transition-opacity duration-300 px-1 md:px-0">
    <div class="bg-sec m-4 rounded-lg shadow-2xl text-blue-gray-500 antialiased leading-relaxed w-11/12 lg:w-2/4"
    data-dialog="web-3-dialog">
        <div class="w-full flex items-center pt-3 px-2 font-sans text-2xl font-semibold justify-between">
            <div class="flex items-center flex-wrap gap-3 md:gap-5">
                <h5 class="text-lg md:text-xl font-bold text-ter">
                    Order details
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
        <div class="max-w-2xl mx-auto">
            <div class="border-b border-gray-600 mb-3">
                <ul class="flex flex-wrap -mb-px" id="myTab" data-tabs-toggle="#myTabContent" role="tablist">
                    <li class="mx-3" role="presentation">
                        <button class="inline-block text-qua hover:text-gray-100 hover:border-gray-100 rounded-t-lg py-2 px-3 text-sm font-medium text-center border-transparent border-b-2 active" id="profile-tab" data-tabs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="true">Orders</button>
                    </li>
                    <li class="mx-3" role="presentation">
                        <button class="inline-block text-qua hover:text-gray-100 hover:border-gray-100 rounded-t-lg py-2 px-3 text-sm font-medium text-center border-transparent border-b-2" id="dashboard-tab" data-tabs-target="#dashboard" type="button" role="tab" aria-controls="dashboard" aria-selected="false">Order owner</button>
                    </li>
                </ul>
            </div>
            <div id="myTabContent">
                <div class="orderDetails overflow-y-auto w-full flex justify-around flex-wrap item-center pt-3" style="min-height: 30vh; max-height: 60vh"
                id="profile" role="tabpanel" aria-labelledby="profile-tab"></div>
                <div class="orderOwner overflow-y-auto max-w-full flex item-center pt-3 hidden" style="min-height: 30vh; max-height: 60vh"
                id="dashboard" role="tabpanel" aria-labelledby="dashboard-tab"></div>
            </div>
        </div>
        <hr class="my-3">
        <div class="flex flex-wrap flex-row-reverse gap-4 pb-3 buttons px-3">
        </div>
    </div>
</div>

</div>
@endsection

@push('scripts')
    <script src="{{ asset('js/restaurant_owner/orders.js') }}" type="module"></script>
    <script src="https://unpkg.com/@themesberg/flowbite@1.2.0/dist/flowbite.bundle.js"></script>
@endpush
