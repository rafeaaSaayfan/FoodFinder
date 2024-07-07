@extends('layouts.complete_profile.main')

@section('content')

<!-- component -->
<div class="min-h-screen w-full flex">
    <div class="hidden lg:block lg:w-1/3 bg-pr">
        <div class="flex items-center justify-between m-8">
            <h1 class="font-bold text-lg text-qua">{{ __('messages.complete_profile.completeProfile') }}</h1>
            <div class="ms-4 group inline-block">
                <button class="outline-none focus:outline-none px-3 shadow-xl py-1 bg-sec rounded-3xl flex items-center min-w-28">
                    <span class="pr-1 font-semibold flex-1 text-qua text-sm opacity-80">{{ __('messages.change_lang.lang') }}</span>
                    <span>
                        <svg class="fill-white h-4 w-4 transform group-hover:-rotate-180 transition duration-150 ease-in-out" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/>
                        </svg>
                    </span>
                </button>
                <ul class="py-2 z-10 text-qua bg-sec rounded-3xl transform scale-0 group-hover:scale-100 absolute transition duration-150 ease-in-out origin-top min-w-28 flex flex-col">
                    <a href="{{ route('setLanguage', ['lang' => 'en']) }}" class="rounded-3xl px-3 py-1 hover:bg-orange-700 mb-2">{{ __('messages.change_lang.en') }}</a>
                    <a href="{{ route('setLanguage', ['lang' => 'ar']) }}" class="rounded-3xl px-3 py-1 hover:bg-orange-700">{{ __('messages.change_lang.ar') }}</a>
                </ul>
            </div>
        </div>

        <div class="flex justify-center">
            <div class="flex flex-col items-center gap-3">
                <div class="stepper1 flex items-center p-8 gap-4 w-80 bg-sec rounded-3xl">
                    <div>
                        <div class="px-4 py-2 rounded-full text-qua">1</div>
                    </div>
                    <div class="">
                        <p class="text-qua">{{ __('messages.complete_profile.stepper.res_info') }}</p>
                        <p class="text-qua opacity-50 text-sm">{{ __('messages.complete_profile.stepper.setup_res_info') }}</p>
                    </div>
                </div>
                <div class="stepper2 flex items-center p-8 gap-4 w-80 bg-sec rounded-3xl">
                    <div>
                        <div class="px-4 py-2 rounded-full text-qua">2</div>
                    </div>
                    <div class="">
                        <p class="text-qua">{{ __('messages.complete_profile.stepper.res_loc_addr') }}</p>
                        <p class="text-qua opacity-50 text-sm">{{ __('messages.complete_profile.stepper.res_setup_loc_addr') }}</p>
                    </div>
                </div>
                <div class="stepper3 flex items-center p-8 gap-4 w-80 bg-sec rounded-3xl">
                    <div>
                        <div class="px-4 py-2 rounded-full text-qua">3</div>
                    </div>
                    <div class="">
                        <p class="text-qua">{{ __('messages.complete_profile.stepper.res_pic') }}</p>
                        <p class="text-qua opacity-50 text-sm">{{ __('messages.complete_profile.stepper.setup_res_pic') }}</p>
                    </div>
                </div>
                <div class="stepper4 flex items-center p-8 gap-4 w-80 bg-sec rounded-3xl">
                    <div>
                        <div class="px-4 py-2 rounded-full text-qua">4</div>
                    </div>
                    <div class="">
                        <p class="text-qua">{{ __('messages.complete_profile.stepper.completed') }}</p>
                        <p class="text-qua opacity-50 text-sm">{{ __('messages.complete_profile.stepper.rev_sub') }}</p>
                    </div>
                </div>

                <div class="mt-3">
                    <img src="{{ asset('images/logo/logo.png') }}" alt="" class="w-28">
                </div>
            </div>
        </div>
    </div>

    <div class="content w-full lg:w-3/4 bg-sec flex justify-center items-center">
        <div class="w-full">

            <div class="step_1 px-5 md:px-20 pt-5">
                <h1 class="text-qua font-bold text-lg mb-10 lg:hidden pt-5">{{ __('messages.complete_profile.completeProfile') }}</h1>
                <div class="flex items-center gap-4 p-8 w-80 bg-pr rounded-3xl mb-10 lg:hidden">
                    <div>
                        <div class="bg-ter px-4 py-2 rounded-full text-qua">1</div>
                    </div>
                    <div class="">
                        <p class="text-qua">{{ __('messages.complete_profile.stepper.res_info') }}</p>
                        <p class="text-qua opacity-50 text-sm">{{ __('messages.complete_profile.stepper.setup_res_info') }}</p>
                    </div>
                </div>
                <div class="flex mb-4">
                    <div class="w-full">
                        <label for="" class="text-xs font-semibold px-1 text-qua opacity-80">{{ __('messages.complete_profile.res_name') }}</label>
                        <div class="flex items-center">
                            <div class="w-10 z-10 px-1 text-center pointer-events-none flex items-center justify-center">
                                <svg class="fill-orange-700" width="24" id="Layer_1" style="enable-background:new 0 0 300 300;" version="1.1" viewBox="0 0 300 300" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g id="XMLID_2_">
                                    <path d="M125.6,19.4c-7.2,0.4-12.9,6.5-12.9,13.9v47.4c0,1.9-1.4,3.6-3.3,3.8c-1,0.1-2-0.2-2.8-0.9   c-0.8-0.7-1.2-1.7-1.2-2.7V33.4c0-7.5-5.7-13.6-12.9-14c-3.8-0.2-7.3,1.1-10,3.7c-2.7,2.6-4.2,6.1-4.2,9.8v47.8   c0,2-1.4,3.6-3.3,3.8c-1,0.1-2-0.2-2.8-0.9C71.4,83,71,82,71,81V33.4c0-7.5-5.7-13.6-12.9-14c-3.8-0.2-7.3,1.1-10,3.7   c-2.7,2.6-4.2,6.1-4.2,9.8v50.7c0,26.1,11.6,49.3,29.5,59.3v118.6c0,10.1,8,18.6,17.8,19c0.2,0,0.5,0,0.7,0c4.8,0,9.4-1.8,12.8-5.2   c3.7-3.5,5.7-8.3,5.7-13.4V143c17.9-10,29.5-33.2,29.5-59.3V33c0-3.8-1.5-7.2-4.2-9.8C132.9,20.6,129.4,19.3,125.6,19.4z    M100.4,139.9v121.9c0,4.5-3.4,8.4-7.7,8.8c-2.4,0.2-4.8-0.5-6.6-2.2c-1.8-1.6-2.8-3.9-2.8-6.3V139.9c0-1.9-1.1-3.7-2.9-4.5   c-15.9-7.3-26.6-28-26.6-51.7V33.2c0-2,1.4-3.6,3.3-3.8c0.1,0,0.2,0,0.4,0c0.9,0,1.8,0.3,2.4,0.9C60.6,31,61,32,61,33v47.6   c0,7.5,5.7,13.6,12.9,14c3.8,0.2,7.3-1.1,10-3.7c2.7-2.6,4.2-6.1,4.2-9.8V33.2c0-2,1.4-3.6,3.3-3.8c1-0.1,2,0.2,2.8,0.9   C95,31,95.5,32,95.5,33v47.6c0,7.5,5.7,13.6,12.9,14c3.8,0.2,7.3-1.1,10-3.7c2.7-2.6,4.2-6.1,4.2-9.8V33.2c0-2,1.4-3.6,3.3-3.8   c1-0.1,2,0.2,2.8,0.9c0.8,0.7,1.2,1.7,1.2,2.7v50.7c0,23.7-10.7,44.4-26.6,51.7C101.6,136.2,100.4,138,100.4,139.9z" id="XMLID_282_"/>
                                    <path d="M241.1,42.4c-10.4-14.8-24-23-38.2-23c-14.3,0-27.9,8.2-38.2,23c-9.6,13.6-15.1,31.2-15.1,48.2   c0,25.9,13.3,46.6,34.7,54.2v116.8c0,10.1,8,18.6,17.8,19c0.2,0,0.5,0,0.7,0c4.8,0,9.4-1.8,12.8-5.2c3.7-3.5,5.7-8.3,5.7-13.4   V144.8c21.4-7.6,34.7-28.3,34.7-54.2C256.2,73.6,250.7,56,241.1,42.4z M211.5,141.1v120.7c0,4.5-3.4,8.4-7.7,8.8   c-2.5,0.2-4.8-0.5-6.6-2.2c-1.8-1.6-2.8-3.9-2.8-6.3V141.1c0-2.2-1.5-4.2-3.7-4.8c-19.2-5.3-31.1-22.8-31.1-45.7   c0-15,4.8-30.5,13.2-42.5c8.5-12.1,19.1-18.7,30.1-18.7S224.5,36,233,48.1c8.4,12,13.2,27.5,13.2,42.5c0,22.9-11.9,40.4-31.1,45.7   C213,136.9,211.5,138.9,211.5,141.1z" id="XMLID_285_"/></g>
                                </svg>
                            </div>
                            <input name="restaurant_name" type="name" class="w-full -mx-10 @if(App::getLocale() == 'ar') pr-10 @else pl-10 @endif px-3 py-2 rounded-xl border-2 bg-qua outline-none focus:border-orange-500"
                                placeholder="{{ __('messages.complete_profile.res_name_plch') }}" value="{{ $restaurant->restaurant_name }}"
                            >
                        </div>
                        <p class="error_restaurant_name px-1 text-red-400 error_p"></p>
                    </div>
                </div>
                <div class="flex mb-4">
                    <div class="w-full">
                        <label for="" class="text-xs font-semibold px-1 text-qua opacity-80">{{ __('messages.complete_profile.res_email') }}</label>
                        <div class="flex">
                            <div class="w-10 z-10 px-1 text-center pointer-events-none flex items-center justify-center">
                                <svg class="fill-orange-700" enable-background="new 0 0 48 48" height="24" id="Layer_1" version="1.1" viewBox="0 0 48 48" width="24" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                    <path d="M24,0C10.746,0,0,10.745,0,24s10.746,24,24,24c13.256,0,24-10.745,24-24S37.256,0,24,0z M24,13.713  c2.809,0,5.084,2.275,5.084,5.083c0,2.809-2.275,5.084-5.084,5.084c-2.807,0-5.083-2.275-5.083-5.084  C18.917,15.988,21.193,13.713,24,13.713z M32.582,37.69c-2.491,1.537-5.416,2.439-8.559,2.439c-3.161,0-6.104-0.913-8.604-2.467  V27.326c0-0.904,0.733-1.638,1.638-1.638h13.888c0.904,0,1.638,0.733,1.638,1.638V37.69z"/>
                                </svg>
                            </div>
                            <input name="restaurant_email" type="email" class="w-full bg-qua -mx-10 @if(App::getLocale() == 'ar') pr-10 @else pl-10 @endif px-3 py-2 rounded-xl border-2 border-gray-200 outline-none focus:border-orange-500"
                                placeholder="{{ __('messages.complete_profile.res_email_plch') }}" value="{{ $restaurant->restaurant_email }}"
                            >
                        </div>
                        <p class="error_restaurant_email px-1 text-red-400 error_p"></p>
                    </div>
                </div>
                <div class="flex mb-4">
                    <div class="w-full">
                        <label for="" class="text-xs font-semibold px-1 text-qua opacity-80">{{ __('messages.complete_profile.res_phone') }}</label>
                        <div class="flex">
                            <div class="w-10 z-10 px-1 text-center pointer-events-none flex items-center justify-center">
                                <svg height="24" viewBox="0 0 48 48" width="24" xmlns="http://www.w3.org/2000/svg" class="fill-orange-700">
                                    <path d="M0 0h48v48h-48z" fill="none"/>
                                    <path d="M13.25 21.59c2.88 5.66 7.51 10.29 13.18 13.17l4.4-4.41c.55-.55 1.34-.71 2.03-.49 2.24.74 4.65 1.14 7.14 1.14 1.11 0 2 .89 2 2v7c0 1.11-.89 2-2 2-18.78 0-34-15.22-34-34 0-1.11.9-2 2-2h7c1.11 0 2 .89 2 2 0 2.49.4 4.9 1.14 7.14.22.69.06 1.48-.49 2.03l-4.4 4.42z"/>
                                </svg>
                            </div>
                            <input name="restaurant_phone" type="phone" class="w-full bg-qua -mx-10 @if(App::getLocale() == 'ar') pr-10 @else pl-10 @endif px-3 py-2 rounded-xl border-2 border-gray-200 outline-none focus:border-orange-500"
                                placeholder="{{ __('messages.complete_profile.res_phone_plch') }}" value="{{ $restaurant->restaurant_phone }}"
                            >
                        </div>
                        <p class="error_restaurant_phone px-1 text-red-400 error_p"></p>
                    </div>
                </div>
                <div class="flex mb-4">
                    <div class="w-full">
                        <label for="" class="text-xs font-semibold px-1 text-qua opacity-80">{{ __('messages.complete_profile.description') }}</label>
                        <div class="">
                            <textarea class="w-full bg-qua @if(App::getLocale() == 'ar') pr-10 @else pl-10 @endif px-3 py-2 rounded-xl border-2 border-gray-200 outline-none focus:border-orange-500"
                                name="description" id="" cols="30" rows="10">{{ $restaurant->description }}
                            </textarea>
                        </div>
                        <p class="error_description px-1 text-red-400 error_p"></p>
                    </div>
                </div>
            </div>

            <div class="step_2 px-5 md:px-20">
                <h1 class="text-qua font-bold text-lg mb-10 lg:hidden pt-5">{{ __('messages.complete_profile.completeProfile') }}</h1>
                <div class="flex items-center gap-4 p-8 w-80 bg-pr rounded-3xl mb-10 lg:hidden">
                    <div>
                        <div class="bg-ter px-4 py-2 rounded-full text-qua">2</div>
                    </div>
                    <div class="">
                        <p class="text-qua">{{ __('messages.complete_profile.stepper.pers_info') }}</p>
                        <p class="text-qua opacity-50 text-sm">{{ __('messages.complete_profile.stepper.setup_pers_info') }}</p>
                    </div>
                </div>
                <div class="flex mb-4">
                    <div class="w-full flex gap-16 flex-col">
                        <div>
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1696204.1899564962!2d34.525305288998275!3d33.86649865269898!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x151f17028422aaad%3A0xcc7d34096c00f970!2sLebanon!5e0!3m2!1sen!2sus!4v1717430551488!5m2!1sen!2sus" width="100%" height="200" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                            <p class="text-qua opacity-80">{{ __('messages.complete_profile.addr_p') }}</p>
                        </div>
                        <div>
                            <label for="" class="text-xs font-semibold px-1 text-qua opacity-80">{{ __('messages.complete_profile.res_addr') }}</label>
                            <div class="flex">
                                <div class="w-10 z-10 px-1 text-center pointer-events-none flex items-center justify-center">
                                    <svg class="fill-orange-700" enable-background="new 0 0 30 30" id="Capa_1" version="1.1" viewBox="0 0 30 30" width="22" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                        <path d="M15.1,0.3c-6,0-10,4-10,9.8c0,7.8,7.2,17.5,9.1,19.4c0.1,0.1,0.3,0.2,0.5,0.2c0,0,0,0,0,0  c0.2,0,0.4-0.1,0.5-0.3c1-1.1,9.6-11.1,9.6-19.3C24.9,3.3,20,0.3,15.1,0.3z M14.7,27.8c-2.3-2.7-8.1-11.1-8.1-17.7  c0-5.1,3.3-8.3,8.5-8.3c3.8,0,8.3,2.2,8.3,8.3C23.4,16,18.2,23.8,14.7,27.8z M15,6.1c-2.2,0-4,1.8-4,4c0,2.2,1.8,4,4,4s4-1.8,4-4  C19,7.9,17.2,6.1,15,6.1z M15,12.6c-1.4,0-2.5-1.1-2.5-2.5c0-1.4,1.1-2.5,2.5-2.5s2.5,1.1,2.5,2.5C17.5,11.5,16.4,12.6,15,12.6z"/>
                                    </svg>
                                </div>
                                <input name="restaurant_address" type="text" class="w-full bg-qua -mx-10 @if(App::getLocale() == 'ar') pr-10 @else pl-10 @endif px-3 py-2 rounded-xl border-2 border-gray-200 outline-none focus:border-orange-500"
                                    placeholder="{{ __('messages.complete_profile.res_addr_plch') }}" value="{{ $restaurant->address }}"
                                >
                            </div>
                            <p class="error_address px-1 text-red-400 error_p"></p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="step_3 px-5 md:px-20">
                <h1 class="text-qua font-bold text-lg mb-10 lg:hidden pt-5">{{ __('messages.complete_profile.completeProfile') }}</h1>
                <div class="flex items-center gap-4 p-8 w-80 bg-pr rounded-3xl mb-10 lg:hidden">
                    <div>
                        <div class="bg-ter px-4 py-2 rounded-full text-qua">6</div>
                    </div>
                    <div class="">
                        <p class="text-qua">{{ __('messages.complete_profile.stepper.res_pic') }}</p>
                        <p class="text-qua opacity-50 text-sm">{{ __('messages.complete_profile.stepper.setup_res_pic') }}</p>
                    </div>
                </div>
                <div class="flex">
                    <div class="w-full flex flex-col gap-4 pt-5">
                        <div class="relative bg-pr bg-cover bg-center w-full h-80 rounded-3xl">
                            <div class="w-full h-full flex flex-col justify-center items-center">
                                <span class="text-qua">{{ __('messages.complete_profile.profile_img_label') }}<span class="text-ter"> {{ __('messages.complete_profile.profile_img_lab') }}</span>
                                @if ($restaurant_images->profile_image)
                                    <p class="profile_image bg-sec pb-1 px-3 text-qua mt-1 rounded-xl text-sm opacity-60">{{ $restaurant_images->profile_image }}</p>
                                @else
                                    <p class="profile_image bg-sec pb-1 px-3 text-qua mt-1 rounded-xl text-sm opacity-60">.png, .jpg or .jpeg</p>
                                @endif
                                <p class="error_profile_image px-1 text-red-400 error_p pt-1 text-sm"></p>
                                </span>
                            </div>

                            <label class="absolute -top-4 -right-2 flex items-center justify-center w-9 h-9 bg-white rounded-full shadow hover:text-primary cursor-pointer" title="Change avatar">
                                <i class="fas fa-pen text-xs text-gray-500"></i>
                                <input type="file" name="profile_image" accept=".png, .jpg, .jpeg" class="hidden"/>
                            </label>
                        </div>

                        <div class="flex items-center justify-between w-full gap-5">
                            <div class="flex flex-col gap-3 w-1/2">
                                <div class="relative bg-pr h-36 bg-cover bg-center w-full rounded-3xl">
                                    <div class="w-full h-full flex flex-col justify-center items-center px-5">
                                        <span class="text-qua">{{ __('messages.complete_profile.detail_image_label1') }}
                                        @if ($restaurant_images->detail_image_1)
                                            <p class="detail_image_1 bg-sec pb-1 px-3 text-qua mt-1 rounded-xl text-sm opacity-60">{{ $restaurant_images->detail_image_1 }}</p>
                                        @else
                                            <p class="detail_image_1 bg-sec pb-1 px-3 text-qua mt-1 rounded-xl text-sm opacity-60">.png, .jpg or .jpeg</p>
                                        @endif
                                        <p class="error_detail_image_1 px-1 text-red-400 error_p pt-1 text-sm"></p>
                                        </span>
                                    </div>

                                    <label class="absolute -top-4 -right-2 flex items-center justify-center w-9 h-9 bg-white rounded-full shadow hover:text-primary cursor-pointer" title="Change avatar">
                                        <i class="fas fa-pen text-xs text-gray-500"></i>
                                        <input type="file" name="detail_image_1" accept=".png, .jpg, .jpeg" class="hidden"/>
                                    </label>
                                </div>
                                <div class="relative bg-pr bg-cover h-36 bg-center w-full rounded-3xl">
                                    <div class="w-full h-full flex flex-col justify-center items-center">
                                        <span class="text-qua">{{ __('messages.complete_profile.detail_image_label2') }}
                                        @if ($restaurant_images->detail_image_2)
                                            <p class="detail_image_2 bg-sec pb-1 px-3 text-qua mt-1 rounded-xl text-sm opacity-60">{{ $restaurant_images->detail_image_2 }}</p>
                                        @else
                                            <p class="detail_image_2 bg-sec pb-1 px-3 text-qua mt-1 rounded-xl text-sm opacity-60">.png, .jpg or .jpeg</p>
                                        @endif
                                        <p class="error_detail_image_2 px-1 text-red-400 error_p pt-1 text-sm"></p>
                                        </span>
                                    </div>

                                    <label class="absolute -top-4 -right-2 flex items-center justify-center w-9 h-9 bg-white rounded-full shadow hover:text-primary cursor-pointer" title="Change avatar">
                                        <i class="fas fa-pen text-xs text-gray-500"></i>
                                        <input type="file" name="detail_image_2" accept=".png, .jpg, .jpeg" class="hidden"/>
                                    </label>
                                </div>
                            </div>

                            <div class="flex flex-col gap-3 w-1/2">
                                <div class="relative bg-pr h-36 bg-cover bg-center w-full rounded-3xl">
                                    <div class="w-full h-full flex flex-col justify-center items-center px-5">
                                        <span class="text-qua">{{ __('messages.complete_profile.detail_image_label3') }}
                                        @if ($restaurant_images->detail_image_3)
                                            <p class="detail_image_3 bg-sec pb-1 px-3 text-qua mt-1 rounded-xl text-sm opacity-60">{{ $restaurant_images->detail_image_3 }}</p>
                                        @else
                                            <p class="detail_image_3 bg-sec pb-1 px-3 text-qua mt-1 rounded-xl text-sm opacity-60">.png, .jpg or .jpeg</p>
                                        @endif
                                        <p class="error_detail_image_3 px-1 text-red-400 error_p pt-1 text-sm"></p>
                                        </span>
                                    </div>

                                    <label class="absolute -top-4 -right-2 flex items-center justify-center w-9 h-9 bg-white rounded-full shadow hover:text-primary cursor-pointer" title="Change avatar">
                                        <i class="fas fa-pen text-xs text-gray-500"></i>
                                        <input type="file" name="detail_image_3" accept=".png, .jpg, .jpeg" class="hidden"/>
                                    </label>
                                </div>
                                <div class="relative bg-pr bg-cover h-36 bg-center w-full rounded-3xl">
                                    <div class="w-full h-full flex flex-col justify-center items-center">
                                        <span class="text-qua">{{ __('messages.complete_profile.detail_image_label4') }}
                                        @if ($restaurant_images->detail_image_4)
                                            <p class="detail_image_4 bg-sec pb-1 px-3 text-qua mt-1 rounded-xl text-sm opacity-60">{{ $restaurant_images->detail_image_4 }}</p>
                                        @else
                                            <p class="detail_image_4 bg-sec pb-1 px-3 text-qua mt-1 rounded-xl text-sm opacity-60">.png, .jpg or .jpeg</p>
                                        @endif
                                        <p class="error_detail_image_4 px-1 text-red-400 error_p pt-1 text-sm"></p>
                                        </span>
                                    </div>

                                    <label class="absolute -top-4 -right-2 flex items-center justify-center w-9 h-9 bg-white rounded-full shadow hover:text-primary cursor-pointer" title="Change avatar">
                                        <i class="fas fa-pen text-xs text-gray-500"></i>
                                        <input type="file" name="detail_image_4" accept=".png, .jpg, .jpeg" class="hidden"/>
                                    </label>
                                </div>
                            </div>
                        </div>

                        {{-- <img src="{{ asset('/uploads/customer_profile_img/' . $user->profile_img) }}" alt="" width="300px"> --}}
                    </div>
                </div>
            </div>

            <div class="finished step_4 px-5 md:px-20">
                <h1 class="text-qua font-bold text-lg mb-10 lg:hidden pt-5">{{ __('messages.complete_profile.completeProfile') }}</h1>
                <div class="flex items-center gap-4 p-8 w-80 bg-pr rounded-3xl mb-10 lg:hidden">
                    <div>
                        <div class="bg-ter px-4 py-2 rounded-full text-qua">6</div>
                    </div>
                    <div class="">
                        <p class="text-qua">{{ __('messages.complete_profile.stepper.pers_info') }}</p>
                        <p class="text-qua opacity-50 text-sm">{{ __('messages.complete_profile.stepper.setup_pers_info') }}</p>
                    </div>
                </div>
                <div class="text-qua font-bold mb-3">
                    <p>Thank you for submitting your information. We have received the details you provided.</p>
                </div>
                <div class="card bg-pr text-qua py-5 px-8 rounded-lg">
                    <p class="font-semibold mb-3">Cookies</p>
                    <ul class="list-disc px-10">
                        <li class="pb-2">All information is real</li>
                        <li>
                            Please note that your restaurant submission is pending admin approval. You will receive an email notification once your restaurant is approved.
                        </li>
                    </ul>
                </div>
                <div class="flex items-center gap-2 mt-4">
                    <input class="cursor-pointer w-4 h-4" type="checkbox" id="confirmCheckbox" required>
                    <label for="confirmCheckbox" class="cursor-pointer text-qua">Confirm cookies</label>
                </div>
            </div>

            <div class="px-5 md:px-20 pt-10 pb-4">
                <input class="progress_step" type="hidden" value="{{ $user->profile_progress_step }}">
                <div class="flex items-center justify-between flex-row-reverse">
                    <button type="submit" class="wizardBtn block max-w-xs bg-ter text-qua rounded-xl px-5 py-3 font-semibold">
                        <p class="nextStep span-text">{{ __('messages.complete_profile.nextStep') }}</p>
                        <p class="submit span-text">{{ __('messages.complete_profile.submit') }}</p>
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
                    <button type="submit" class="notallowedBtn opacity-50 cursor-not-allowed block max-w-xs bg-ter text-qua rounded-xl px-5 py-3 font-semibold">
                        <p class="submit span-text">{{ __('messages.complete_profile.submit') }}</p>
                    </button>
                    <button type="submit" class="prevWizardBtn hidden max-w-xs bg-ter text-qua rounded-xl px-5 py-3 font-semibold">
                        <p class="span-text">{{ __('messages.complete_profile.prevStep') }}</p>
                        <div class="loading hidden">
                            <div class="flex items-center">
                                <svg aria-hidden="true" role="status" class="inline mr-3 w-4 h-4 text-white animate-spin" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
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
    </div>

</div>

@endsection

{{-- @push('scripts')
    <script src="{{ asset('js/restaurant_owner/complete_profile.js') }}" type="module"></script>
@endpush --}}
