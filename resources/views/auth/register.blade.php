@extends('layouts.auth.main')

@section('content')
<div class="min-w-screen min-h-screen bg-pr flex items-center justify-center">
    <div class="bg-sec rounded-3xl shadow-xl w-full overflow-hidden my-3 mx-5 md:mx-10 lg:mx-20 xl:mx-48">
        <div class="md:flex w-full">
            <div class="hidden md:block md:w-2/6 lg:w-1/2 relative pt-4">
                <div class="ms-4 group inline-block">
                    <button class="outline-none focus:outline-none px-3 shadow-xl py-1 bg-pr rounded-3xl flex items-center min-w-32">
                        <span class="pr-1 font-semibold flex-1 text-qua">{{ __('messages.change_lang.lang') }}</span>
                        <span>
                            <svg class="fill-white h-4 w-4 transform group-hover:-rotate-180 transition duration-150 ease-in-out" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/>
                            </svg>
                        </span>
                    </button>
                    <ul class="py-2 text-qua bg-pr rounded-3xl transform scale-0 group-hover:scale-100 absolute transition duration-150 ease-in-out origin-top min-w-32 flex flex-col">
                        <a href="{{ route('setLanguage', ['lang' => 'en']) }}" class="rounded-3xl px-3 py-2 hover:bg-orange-700 mb-2">{{ __('messages.change_lang.en') }}</a>
                        <a href="{{ route('setLanguage', ['lang' => 'ar']) }}" class="rounded-3xl px-3 py-2 hover:bg-orange-700">{{ __('messages.change_lang.ar') }}</a>
                    </ul>
                </div>
                <div class="absolute top-1/2 transform -translate-y-1/2 left-1/4">
                    <img src="{{ asset('images/logo/logo.png') }}" alt="" class="w-72">
                </div>
            </div>
            <div class="w-full md:w-4/6 lg:w-1/2 py-4 md:py-8 px-5 md:px-10">
                <div class="mb-10">
                    <div class="md:hidden w-100">
                        <div class="group inline-block">
                            <button class="outline-none focus:outline-none px-3 shadow-xl py-1 bg-pr rounded-3xl flex items-center min-w-32">
                                <span class="pr-1 font-semibold flex-1 text-qua">{{ __('messages.change_lang.lang') }}</span>
                                <span>
                                    <svg class="fill-white h-4 w-4 transform group-hover:-rotate-180 transition duration-150 ease-in-out" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/>
                                    </svg>
                                </span>
                            </button>
                            <ul class="py-2 text-qua bg-pr rounded-3xl transform scale-0 group-hover:scale-100 absolute transition duration-150 ease-in-out origin-top min-w-32 flex flex-col">
                                <a href="{{ route('setLanguage', ['lang' => 'en']) }}" class="rounded-3xl px-3 py-2 hover:bg-orange-700 mb-2">{{ __('messages.change_lang.en') }}</a>
                                <a href="{{ route('setLanguage', ['lang' => 'ar']) }}" class="rounded-3xl px-3 py-2 hover:bg-orange-700">{{ __('messages.change_lang.ar') }}</a>
                            </ul>
                        </div>
                        <div class="w-100 flex justify-center">
                            <img src="{{ asset('images/logo/logo.png') }}" alt="" class="w-28">
                        </div>
                    </div>
                    <h1 class="text-center hidden md:block domain-name font-bold text-3xl">FoodFinder</h1>
                    <p class="text-center text-qua opacity-80">{{ __('messages.auth.sub_title_reg') }}</p>
                </div>

                <form id="registerForm">
                    <div class="mb-4">
                        <div class="w-100 flex flex-col sm:flex-row items-center gap-2">
                            <label for="customer_radio" class="bg-pr py-5 w-full sm:w-1/2 hover:ring-1 ring-gray-200 rounded-3xl shadow-xl cursor-pointer">
                                <div class="flex items-center mb-2 px-8">
                                    <input id="customer_radio" type="radio" value="customer" name="role" class="w-3 h-3">
                                    <p class="ms-2 text-sm font-medium text-qua">
                                        {{ __('messages.auth.customer') }}
                                    </p>
                                </div>
                                <p class="text-qua text-xs opacity-70 px-8">{{ __('messages.auth.customer_p') }}</p>
                            </label>
                            <label for="restaurant_radio" class="bg-pr py-5 w-full sm:w-1/2 hover:ring-1 ring-gray-200 rounded-3xl shadow-xl cursor-pointer">
                                <div class="flex items-center mb-2 px-8">
                                    <input id="restaurant_radio" type="radio" value="restaurant_owner" name="role" class="w-3 h-3">
                                    <p class="ms-2 text-sm font-medium text-qua">
                                        {{ __('messages.auth.restaurant_owner') }}
                                    </p>
                                </div>
                                <p class="text-qua text-xs opacity-70 px-8">{{ __('messages.auth.restaurant_owner_p') }}</p>
                            </label>
                        </div>
                        <p class="error_role px-1 text-red-400 error_p"></p>
                    </div>
                    <div class="flex -mx-3 mb-4">
                        <div class="w-full px-3">
                            <label for="" class="text-xs font-semibold px-1 text-qua opacity-80">{{ __('messages.auth.email') }}</label>
                            <div class="flex items-center">
                                <div class="w-10 z-10 px-1 text-center pointer-events-none flex items-center justify-center">
                                    <svg viewBox="0 0 48 48" xmlns="http://www.w3.org/2000/svg" width="20"><title/>
                                        <g data-name="8-Email" id="_8-Email">
                                            <path d="M45,7H3a3,3,0,0,0-3,3V38a3,3,0,0,0,3,3H45a3,3,0,0,0,3-3V10A3,3,0,0,0,45,7Zm-.64,2L24,24.74,3.64,9ZM2,37.59V10.26L17.41,22.17ZM3.41,39,19,23.41l4.38,3.39a1,1,0,0,0,1.22,0L29,23.41,44.59,39ZM46,37.59,30.59,22.17,46,10.26Z" class="fill-orange-700""/>
                                        </g>
                                    </svg>
                                </div>
                                <input name="email" type="email" class="w-full -mx-10 @if(App::getLocale() == 'ar') pr-10 @else pl-10 @endif px-3 py-2 rounded-xl border-2 bg-qua outline-none focus:border-orange-500" placeholder="{{ __('messages.auth.ent_email') }}">
                            </div>
                            <p class="error_email px-1 text-red-400 error_p"></p>
                        </div>
                    </div>
                    <div class="flex -mx-3 mb-4">
                        <div class="w-full px-3">
                            <label for="" class="text-xs font-semibold px-1 text-qua opacity-80">{{ __('messages.auth.password') }}</label>
                            <div class="flex">
                                <div class="w-10 z-10 px-1 text-center pointer-events-none flex items-center justify-center">
                                    <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" width="21">
                                        <g>
                                        <path d="M0 0h24v24H0z" fill="none"/>
                                        <path class="fill-orange-700" d="M18 8h2a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V9a1 1 0 0 1 1-1h2V7a6 6 0 1 1 12 0v1zM5 10v10h14V10H5zm6 4h2v2h-2v-2zm-4 0h2v2H7v-2zm8 0h2v2h-2v-2zm1-6V7a4 4 0 1 0-8 0v1h8z"/>
                                        </g>
                                    </svg>
                                </div>
                                <input id="password" type="password" class="w-full bg-qua -mx-10 @if(App::getLocale() == 'ar') pr-10 @else pl-10 @endif px-3 py-2 rounded-xl border-2 border-gray-200 outline-none focus:border-orange-500 @error('password') is-invalid @enderror" name="password" autocomplete="new-password" placeholder="{{ __('messages.auth.ent_pass') }}">
                            </div>
                            <p class="error_password px-1 text-red-400 error_p"></p>
                        </div>
                    </div>
                    <div class="flex -mx-3 mb-4">
                        <div class="w-full px-3">
                            <label for="" class="text-xs font-semibold px-1 text-qua opacity-80">{{ __('messages.auth.confirm_password') }}</label>
                            <div class="flex">
                                <div class="w-10 z-10 px-1 text-center pointer-events-none flex items-center justify-center">
                                    <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" width="21">
                                        <g>
                                        <path d="M0 0h24v24H0z" fill="none"/>
                                        <path class="fill-orange-700" d="M18 8h2a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V9a1 1 0 0 1 1-1h2V7a6 6 0 1 1 12 0v1zM5 10v10h14V10H5zm6 4h2v2h-2v-2zm-4 0h2v2H7v-2zm8 0h2v2h-2v-2zm1-6V7a4 4 0 1 0-8 0v1h8z"/>
                                        </g>
                                    </svg>
                                 </div>
                                <input id="password-confirm" type="password" name="password_confirmation" autocomplete="new-password" class="w-full -mx-10 px-10 @if(App::getLocale() == 'ar') pr-10 @else pl-10 @endif py-2 rounded-xl bg-qua border-2 border-gray-200 outline-none focus:border-orange-500" placeholder="{{ __('messages.auth.conf_pass') }}">
                            </div>
                            <p class="error_confirm_password px-1 text-red-400 error_p"></p>
                        </div>
                    </div>
                    <div class="w-full px-3 mb-8">
                        <p>
                            <span class="text-qua opacity-80">{{ __('messages.auth.al_have_acc') }}</span>
                            <a href="{{ route('login') }}" class="text-ter">{{ __('messages.auth.login') }}</a>
                        </p>
                    </div>
                    <div class="w-100 flex items-center">
                        <div class="w-3/4">
                            <button type="submit" class="block max-w-xs bg-ter hover:bg-gray-900 text-qua rounded-xl px-5 py-3 font-semibold">
                                <p class="span-text">{{ __('messages.auth.register') }}</p>
                                <div class="loading hidden">
                                    <div class="flex items-center gap-2">
                                        <svg aria-hidden="true" role="status" class="inline w-4 h-4 text-white animate-spin" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="#E5E7EB"></path>
                                            <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentColor"></path>
                                        </svg>
                                        <span>{{ __('messages.auth.loading') }}</span>
                                    </div>
                                </div>
                            </button>
                        </div>
                        {{-- <div class="w-1/4 flex items-center justify-between">
                            <span class="text-qua">Or</span>
                            <a href="{{ route('google.redirect') }}" class="hover:bg-gray-900 rounded-full p-3 cursor-pointer">
                                <svg width="25" enable-background="new 0 0 128 128" id="Social_Icons" version="1.1" viewBox="0 0 128 128" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                    <g id="_x31__stroke"><g id="Google"><rect clip-rule="evenodd" fill="none" fill-rule="evenodd" height="128" width="128"/>
                                        <path clip-rule="evenodd" d="M27.585,64c0-4.157,0.69-8.143,1.923-11.881L7.938,35.648    C3.734,44.183,1.366,53.801,1.366,64c0,10.191,2.366,19.802,6.563,28.332l21.558-16.503C28.266,72.108,27.585,68.137,27.585,64" fill="#FBBC05" fill-rule="evenodd"/>
                                        <path clip-rule="evenodd" d="M65.457,26.182c9.031,0,17.188,3.2,23.597,8.436L107.698,16    C96.337,6.109,81.771,0,65.457,0C40.129,0,18.361,14.484,7.938,35.648l21.569,16.471C34.477,37.033,48.644,26.182,65.457,26.182" fill="#EA4335" fill-rule="evenodd"/>
                                        <path clip-rule="evenodd" d="M65.457,101.818c-16.812,0-30.979-10.851-35.949-25.937    L7.938,92.349C18.361,113.516,40.129,128,65.457,128c15.632,0,30.557-5.551,41.758-15.951L86.741,96.221    C80.964,99.86,73.689,101.818,65.457,101.818" fill="#34A853" fill-rule="evenodd"/>
                                        <path clip-rule="evenodd" d="M126.634,64c0-3.782-0.583-7.855-1.457-11.636H65.457v24.727    h34.376c-1.719,8.431-6.397,14.912-13.092,19.13l20.474,15.828C118.981,101.129,126.634,84.861,126.634,64" fill="#4285F4" fill-rule="evenodd"/></g></g>
                                </svg>
                            </a>
                        </div> --}}
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script src="{{ url('js/auth/register.js') }}" type="module"></script>
@endpush

@endsection
