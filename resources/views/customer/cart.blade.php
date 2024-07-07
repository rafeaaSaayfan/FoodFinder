@extends('layouts.app')

@push('style')

@endpush

@section('content')

<div class="relative container py-5 flex flex-col justify-between" style="min-height: 100vh">
    <div class="pt-5">
        <div class="container">
            <div class="tab-class text-center wow fadeInUp" data-wow-delay="0.1s">
                <div class="text-center">
                    <h5 class="section-title ff-secondary text-center text-primary font-normal">Cart</h5>
                    @if ($user->username)
                        <h1 class="">{{ $user->username }}'s <span class="fas fa-shopping-cart text-ter"></span> Cart</h1>
                    @else
                        <h1 class="">{{ $user->email }}'s <span class="fas fa-shopping-cart text-ter"></span> Cart</h1>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <p class="mb-1 text-sec restaurants_p hidden">Restaurants:</p>
        <select class="hidden form-select w-fit lg:w-64 rounded-lg bg-white mb-3" name="restaurant" id="restaurants">
        </select>
        <div class="overflow-y-auto cart border pt-4 px-4 rounded-lg shadow bg-white flex flex-wrap items-center justify-around mb-4" style="min-height: 30vh; max-height: 53vh">
        </div>
    </div>

    <div class="bg-pr rounded-lg py-3 px-4">
        <div class="flex flex-wrap items-center justify-between gap-3 sm:gap-0">
            <div class="">
                <h5 class="text-qua">Subtotal: <span class="total_price text-ter"></span></h5>
            </div>
            <div class="">
                <h5 class="text-qua">Tax: <span class="text-ter">0$</span></h5>
            </div>
            <div class="">
                <h5 class="text-qua">Total Price: <span class="total_price text-ter"></span></h5>
            </div>
            <div class="">
                <button type="submit" class="checkoutBtn block max-w-xs hover:bg-orange-600 bg-ter text-qua rounded-lg px-4 py-3 font-semibold">
                    <p class="submit span-text text-sm">Checkout</p>
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
            </div>
        </div>
    </div>

    <div class="fixed inset-0 bg-opacity-75 flex items-center justify-center z-50 loading-indicator">
    </div>
</div>


<div data-dialog-backdrop="web-3-dialog" data-dialog-backdrop-close="true"
   class="modal hidden fixed inset-0 z-[999] grid h-screen w-screen place-items-center bg-black bg-opacity-60 backdrop-blur-sm transition-opacity duration-300 px-1 md:px-0">
    <div class="bg-sec m-4 rounded-lg shadow-2xl text-blue-gray-500 antialiased leading-relaxed w-11/12 lg:w-2/5"
    data-dialog="web-3-dialog">
        <div class="w-full flex items-center pt-3 px-2 font-sans text-2xl font-semibold justify-between">
            <div class="flex items-center flex-wrap gap-3 md:gap-5">
                <h5 class="text-lg md:text-xl font-bold text-ter">
                    Location
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
        <form class="checkoutForm flex flex-col gap-4 mx-2 mx-lg-4">
            <div class="w-full">
                <div class="w-full flex gap-3 flex-col">
                    <div>
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1696204.1899564962!2d34.525305288998275!3d33.86649865269898!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x151f17028422aaad%3A0xcc7d34096c00f970!2sLebanon!5e0!3m2!1sen!2sus!4v1717430551488!5m2!1sen!2sus" width="100%" height="200" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        <p class="text-qua opacity-80">{{ __('messages.complete_profile.addr_p') }}</p>
                    </div>
                    <div>
                        <label for="" class="flex items-center gap-1 text-sm font-semibold px-1 text-qua opacity-80">
                            Your Address?
                            <a class="text-sm text-blue-400" href="{{ $user->address }}" target="_blank">Check location</a>
                        </label>
                        <div class="flex">
                            <div class="w-10 z-10 px-1 text-center pointer-events-none flex items-center justify-center">
                                <svg class="fill-orange-700" enable-background="new 0 0 30 30" id="Capa_1" version="1.1" viewBox="0 0 30 30" width="22" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                    <path d="M15.1,0.3c-6,0-10,4-10,9.8c0,7.8,7.2,17.5,9.1,19.4c0.1,0.1,0.3,0.2,0.5,0.2c0,0,0,0,0,0  c0.2,0,0.4-0.1,0.5-0.3c1-1.1,9.6-11.1,9.6-19.3C24.9,3.3,20,0.3,15.1,0.3z M14.7,27.8c-2.3-2.7-8.1-11.1-8.1-17.7  c0-5.1,3.3-8.3,8.5-8.3c3.8,0,8.3,2.2,8.3,8.3C23.4,16,18.2,23.8,14.7,27.8z M15,6.1c-2.2,0-4,1.8-4,4c0,2.2,1.8,4,4,4s4-1.8,4-4  C19,7.9,17.2,6.1,15,6.1z M15,12.6c-1.4,0-2.5-1.1-2.5-2.5c0-1.4,1.1-2.5,2.5-2.5s2.5,1.1,2.5,2.5C17.5,11.5,16.4,12.6,15,12.6z"/>
                                </svg>
                            </div>
                            <input name="address" type="text" class="w-full bg-qua -mx-10 @if(App::getLocale() == 'ar') pr-10 @else pl-10 @endif px-5 py-2 rounded-xl border-2 border-gray-200 outline-none focus:border-orange-500"
                                placeholder="Enter your location like https://maps..." value="{{ $user->address }}">
                        </div>
                        <p class="error_address px-1 text-red-400 error_p"></p>
                    </div>
                </div>
            </div>
            <div class="flex flex-wrap flex-row-reverse gap-4 pb-3">
                <button type="submit" class="confDeleteBtn block max-w-xs bg-ter text-qua rounded px-4 py-1 font-semibold">
                    <p class="submit span-text text-sm">Checkout</p>
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
                <div class="close cursor-pointer px-4 py-1 bg-sec border border-orange-600 text-qua rounded">Cancel</div>
            </div>
        </form>
    </div>
</div>

@endsection

@push('scripts')
    <script src="{{ asset('js/customer/cart/cart.js') }}" type="module"></script>
@endpush



