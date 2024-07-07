@extends('layouts.app')

@section('content')

<div class="relative container py-5 flex flex-col gap-5" style="min-height: 100vh">
    <div class="pt-5">
        <div class="container">
            <div class="tab-class text-center wow fadeInUp" data-wow-delay="0.1s">
                <div class="text-center">
                    <h5 class="section-title ff-secondary text-center text-primary font-normal">Orders</h5>
                    @if ($user->username)
                        <h1 class="">{{ $user->username }}'s <span class="fas fa-shopping-cart text-ter"></span> orders</h1>
                    @else
                        <h1 class="">{{ $user->email }}'s <span class="fas fa-shopping-cart text-ter"></span> orders</h1>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <p class="mb-1 text-sec restaurants_p hidden">Restaurants:</p>
        <select class="hidden form-select w-fit lg:w-64 rounded-lg bg-white mb-2" name="restaurant" id="restaurants">
        </select>
        <div class="px-3 pt-3 flex flex-wrap items-center gap-3 gap-md-5 border-x border-t bg-white rounded-t-lg">
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
        <div class="overflow-y-auto relative border px-4 rounded-b-lg shadow bg-white mb-4" style="min-height: 30vh; max-height: 49vh">
            <div class="orders pt-3 flex flex-wrap items-center justify-around"></div>
        </div>
    </div>

    <div class="hidden fixed inset-0 flex items-center justify-center z-50 loading-indicator">
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
        <div class="orderDetails overflow-y-auto w-full flex justify-around flex-wrap item-center pt-3" style="max-height: 60vh"></div>
    </div>
</div>

@endsection

@push('scripts')
    <script src="{{ asset('js/customer/orders/orders.js') }}" type="module"></script>
@endpush



