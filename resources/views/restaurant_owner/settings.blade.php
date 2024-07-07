@extends('layouts.dashboard.dashboard')

@section('content')

@include('restaurant_owner.sideBar.sideBar')

<div class="container bg-qua w-full w-full md:w-3/4 lg:w-4/5 h-full px-0 xl:px-10 flex justify-center items-center"
    style="min-height: 100vh;">
    <div class="w-full h-full py-2 rounded-lg md:py-5 my-10 px-3 md:px-5 bg-white">
        <h3 class="text-ter font-bold text-2xl">Settings</h3>
        <div class="pt-5">
            <div class="row g-6">
                <div class="col-12 col-xl-12">
                    <div class="border-b">
                        <div class="pb-5">
                            <div class="border-b w-full flex flex-wrap items-center justify-between">
                                <a class="tab1 text-nowrap cursor-pointer border-b-2 border-orange-600 pb-2 text-ter">
                                    <div class="w-full flex items-center gap-1 text-xs md:text-sm">
                                        <span class="fas fa-info"></span>
                                        <span>
                                            Restaurant Information
                                        </span>
                                    </div>
                                </a>
                                <a class="tab2 text-nowrap cursor-pointer text-sec pb-2">
                                    <div class="w-full flex items-center gap-1 text-xs md:text-sm">
                                        <span class="far fa-map"></span>
                                        <span>
                                            Location
                                        </span>
                                    </div>
                                </a>
                                <a class="tab3 text-nowrap cursor-pointer pb-2 text-sec">
                                    <div class="w-full flex items-center gap-1 text-xs md:text-sm">
                                        <span class="far fa-images"></span>
                                        <span>
                                            Images
                                        </span>
                                    </div>
                                </a>
                            </div>

                            <form class="res_info_form row g-3 pt-4" id="orders">
                                <div class="col-12 col-sm-6">
                                    <div class="form-icon-container">
                                        <div class="form-floating">
                                            <input class="form-control form-icon-input" id="restaurant_name" type="text" name="restaurant_name"
                                                placeholder="restaurant name" />
                                            <label class="text-body-tertiary text-sm flex gap-1 items-center form-icon-label" for="restaurant_name">
                                                <svg class="fill-gray-700" width="18" id="Layer_1" style="enable-background:new 0 0 300 300;" version="1.1" viewBox="0 0 300 300" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g id="XMLID_2_">
                                                    <path d="M125.6,19.4c-7.2,0.4-12.9,6.5-12.9,13.9v47.4c0,1.9-1.4,3.6-3.3,3.8c-1,0.1-2-0.2-2.8-0.9   c-0.8-0.7-1.2-1.7-1.2-2.7V33.4c0-7.5-5.7-13.6-12.9-14c-3.8-0.2-7.3,1.1-10,3.7c-2.7,2.6-4.2,6.1-4.2,9.8v47.8   c0,2-1.4,3.6-3.3,3.8c-1,0.1-2-0.2-2.8-0.9C71.4,83,71,82,71,81V33.4c0-7.5-5.7-13.6-12.9-14c-3.8-0.2-7.3,1.1-10,3.7   c-2.7,2.6-4.2,6.1-4.2,9.8v50.7c0,26.1,11.6,49.3,29.5,59.3v118.6c0,10.1,8,18.6,17.8,19c0.2,0,0.5,0,0.7,0c4.8,0,9.4-1.8,12.8-5.2   c3.7-3.5,5.7-8.3,5.7-13.4V143c17.9-10,29.5-33.2,29.5-59.3V33c0-3.8-1.5-7.2-4.2-9.8C132.9,20.6,129.4,19.3,125.6,19.4z    M100.4,139.9v121.9c0,4.5-3.4,8.4-7.7,8.8c-2.4,0.2-4.8-0.5-6.6-2.2c-1.8-1.6-2.8-3.9-2.8-6.3V139.9c0-1.9-1.1-3.7-2.9-4.5   c-15.9-7.3-26.6-28-26.6-51.7V33.2c0-2,1.4-3.6,3.3-3.8c0.1,0,0.2,0,0.4,0c0.9,0,1.8,0.3,2.4,0.9C60.6,31,61,32,61,33v47.6   c0,7.5,5.7,13.6,12.9,14c3.8,0.2,7.3-1.1,10-3.7c2.7-2.6,4.2-6.1,4.2-9.8V33.2c0-2,1.4-3.6,3.3-3.8c1-0.1,2,0.2,2.8,0.9   C95,31,95.5,32,95.5,33v47.6c0,7.5,5.7,13.6,12.9,14c3.8,0.2,7.3-1.1,10-3.7c2.7-2.6,4.2-6.1,4.2-9.8V33.2c0-2,1.4-3.6,3.3-3.8   c1-0.1,2,0.2,2.8,0.9c0.8,0.7,1.2,1.7,1.2,2.7v50.7c0,23.7-10.7,44.4-26.6,51.7C101.6,136.2,100.4,138,100.4,139.9z" id="XMLID_282_"/>
                                                    <path d="M241.1,42.4c-10.4-14.8-24-23-38.2-23c-14.3,0-27.9,8.2-38.2,23c-9.6,13.6-15.1,31.2-15.1,48.2   c0,25.9,13.3,46.6,34.7,54.2v116.8c0,10.1,8,18.6,17.8,19c0.2,0,0.5,0,0.7,0c4.8,0,9.4-1.8,12.8-5.2c3.7-3.5,5.7-8.3,5.7-13.4   V144.8c21.4-7.6,34.7-28.3,34.7-54.2C256.2,73.6,250.7,56,241.1,42.4z M211.5,141.1v120.7c0,4.5-3.4,8.4-7.7,8.8   c-2.5,0.2-4.8-0.5-6.6-2.2c-1.8-1.6-2.8-3.9-2.8-6.3V141.1c0-2.2-1.5-4.2-3.7-4.8c-19.2-5.3-31.1-22.8-31.1-45.7   c0-15,4.8-30.5,13.2-42.5c8.5-12.1,19.1-18.7,30.1-18.7S224.5,36,233,48.1c8.4,12,13.2,27.5,13.2,42.5c0,22.9-11.9,40.4-31.1,45.7   C213,136.9,211.5,138.9,211.5,141.1z" id="XMLID_285_"/></g>
                                                </svg>
                                                Restaurant Name
                                            </label>
                                        </div>
                                        <p class="error_restaurant_name px-1 text-red-400 error_p pt-1 text-sm"></p>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-icon-container">
                                        <div class="form-floating">
                                            <input class="form-control form-icon-input" id="restaurant_phone" type="tel" name="restaurant_phone"
                                                placeholder="Phone" />
                                            <label class="text-body-tertiary text-sm flex gap-1 items-center form-icon-label" for="restaurant_phone">
                                                <svg class="fill-gray-700" enable-background="new 0 0 48 48" version="1.1" viewBox="0 0 48 48" width="15" height="15" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g id="Expanded"><g><g>
                                                    <path d="M35,48H13c-2.757,0-5-2.243-5-5V5c0-2.757,2.243-5,5-5h22c2.757,0,5,2.243,5,5v38C40,45.757,37.757,48,35,48z M13,2     c-1.654,0-3,1.346-3,3v38c0,1.654,1.346,3,3,3h22c1.654,0,3-1.346,3-3V5c0-1.654-1.346-3-3-3H13z"/></g><g>
                                                    <path d="M39,10H9c-0.553,0-1-0.448-1-1s0.447-1,1-1h30c0.553,0,1,0.448,1,1S39.553,10,39,10z"/></g><g>
                                                    <path d="M39,40H9c-0.553,0-1-0.448-1-1s0.447-1,1-1h30c0.553,0,1,0.448,1,1S39.553,40,39,40z"/></g><g>
                                                    <path d="M24,41c-1.104,0-2,0.896-2,2s0.896,2,2,2s2-0.896,2-2S25.104,41,24,41L24,41z"/></g><g>
                                                    <path d="M29,6H19c-0.553,0-1-0.448-1-1s0.447-1,1-1h10c0.553,0,1,0.448,1,1S29.553,6,29,6z"/></g></g></g>
                                                </svg>
                                                Restaurant Phone
                                            </label>
                                        </div>
                                        <p class="error_restaurant_phone px-1 text-red-400 error_p pt-1 text-sm"></p>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-icon-container">
                                        <div class="form-floating">
                                            <input class="form-control form-icon-input" id="restaurant_email" type="email" name="restaurant_email"
                                                value="" placeholder="Email" />
                                            <label class="text-body-tertiary text-sm flex gap-1 items-center form-icon-label" for="restaurant_email">
                                                <svg width="14" class="fill-gray-700" viewBox="0 0 48 48" xmlns="http://www.w3.org/2000/svg"><title/><g data-name="8-Email" id="_8-Email">
                                                    <path d="M45,7H3a3,3,0,0,0-3,3V38a3,3,0,0,0,3,3H45a3,3,0,0,0,3-3V10A3,3,0,0,0,45,7Zm-.64,2L24,24.74,3.64,9ZM2,37.59V10.26L17.41,22.17ZM3.41,39,19,23.41l4.38,3.39a1,1,0,0,0,1.22,0L29,23.41,44.59,39ZM46,37.59,30.59,22.17,46,10.26Z"/></g>
                                                </svg>
                                                Restaurant Email
                                            </label>
                                        </div>
                                        <p class="error_restaurant_email px-1 text-red-400 error_p pt-1 text-sm"></p>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-icon-container">
                                        <div class="form-floating">
                                            <textarea class="form-control form-icon-input" id="description" name="description"
                                                style="height: 115px;" placeholder="Info"></textarea>
                                            <label class="text-body-tertiary form-icon-label" for="description">
                                                <div class="flex gap-1 items-center text-sm">
                                                    <svg width="15" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg"><title/><g id="About">
                                                        <path class="fill-gray-700" d="M22.6787,5H9.3213A4.3216,4.3216,0,0,0,5,9.3218V22.6782A4.3216,4.3216,0,0,0,9.3213,27H22.6787A4.3216,4.3216,0,0,0,27,22.6782V9.3218A4.3216,4.3216,0,0,0,22.6787,5ZM16,9.0625a1.5,1.5,0,1,1-1.5,1.5A1.5,1.5,0,0,1,16,9.0625ZM18.0625,23h-4a1,1,0,0,1,0-2H15V15h-.9375a1,1,0,0,1,0-2H17v8h1.0625a1,1,0,0,1,0,2Z"/></g>
                                                    </svg>
                                                    Description
                                                </div>
                                            </label>
                                        </div>
                                        <p class="error_description px-1 text-red-400 error_p pt-1 text-sm"></p>
                                    </div>
                                </div>
                            </form>

                            <form class="location_form hidden row g-3 pt-4" id="reviews">
                                <div class="col-12">
                                    <div class="form-icon-container">
                                        <div>
                                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1696204.1899564962!2d34.525305288998275!3d33.86649865269898!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x151f17028422aaad%3A0xcc7d34096c00f970!2sLebanon!5e0!3m2!1sen!2sus!4v1717430551488!5m2!1sen!2sus" width="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                            <p class="text-sec opacity-80">{{ __('messages.complete_profile.addr_p') }}</p>
                                        </div>
                                        <div class="form-floating">
                                            <input class="form-control form-icon-input" id="address" type="text" name="address"
                                                placeholder="address" />
                                            <label class="text-body-tertiary flex gap-1 items-center text-sm form-icon-label" for="address">
                                                <svg class="fill-gray-700" viewBox="0 0 48 48" width="15" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M24 4c-7.73 0-14 6.27-14 14 0 10.5 14 26 14 26s14-15.5 14-26c0-7.73-6.27-14-14-14zm0 19c-2.76 0-5-2.24-5-5s2.24-5 5-5 5 2.24 5 5-2.24 5-5 5z"/>
                                                    <path d="M0 0h48v48h-48z" fill="none"/>
                                                </svg>
                                                Address
                                            </label>
                                        </div>
                                        <p class="error_address px-1 text-red-400 error_p pt-1 text-sm"></p>
                                    </div>
                                </div>
                            </form>

                            <form class="images_form hidden row g-4 pt-4" enctype="multipart/form-data" id="stores">
                                <div class="flex flex-col lg:flex-row col-12 gap-4">
                                    <div class="w-full lg:w-5/12">
                                        <p>Profile Image</p>
                                        <div class="relative w-full">
                                            <div class="w-full bg-cover bg-center h-fit rounded-3xl">
                                                <img src="{{ asset('uploads/restaurant_images/17185482605527.jpg') }}" class="profile_image bg-cover rounded-lg w-full h-full" alt="">
                                                <p class="error_profile_image px-1 text-red-400 error_p pt-1 text-sm"></p>
                                            </div>
                                            <label class="absolute -top-2 -right-2 flex items-center justify-center w-9 h-9 bg-ter rounded-full shadow hover:text-primary cursor-pointer" title="Change avatar">
                                                <i class="fas fa-pen text-xs text-gray-100"></i>
                                                <input type="file" name="profile_image" accept=".png, .jpg, .jpeg" class="hidden"/>
                                            </label>
                                        </div>
                                    </div>

                                    <div class="flex flex-wrap items-center w-full lg:w-7/12">
                                        <div class="w-1/2 flex items-center justify-center pb-2">
                                            <div class="relative w-11/12 flex justify-center items-center">
                                                <div class="bg-cover bg-center w-full h-fit rounded-3xl">
                                                    <img src="{{ asset('uploads/restaurant_images/17185482605527.jpg') }}" class="detail_image_1 bg-cover rounded-lg w-full h-full" alt="">
                                                    <p class="error_detail_image_1 px-1 text-red-400 error_p pt-1 text-sm"></p>
                                                </div>
                                                <label class="absolute -top-2 -right-2 flex items-center justify-center w-9 h-9 bg-ter rounded-full shadow hover:text-primary cursor-pointer" title="Change avatar">
                                                    <i class="fas fa-pen text-xs text-gray-100"></i>
                                                    <input type="file" name="detail_image_1" accept=".png, .jpg, .jpeg" class="hidden"/>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="w-1/2 flex items-center justify-center pb-2">
                                            <div class="relative w-11/12 flex justify-center items-center">
                                                <div class="bg-cover bg-center w-full h-fit rounded-3xl">
                                                    <img src="{{ asset('uploads/restaurant_images/17185482605527.jpg') }}" class="detail_image_2 bg-cover rounded-lg w-full h-full" alt="">
                                                    <p class="error_detail_image_2 px-1 text-red-400 error_p pt-1 text-sm"></p>
                                                </div>
                                                <label class="absolute -top-2 -right-2 flex items-center justify-center w-9 h-9 bg-ter rounded-full shadow hover:text-primary cursor-pointer" title="Change avatar">
                                                    <i class="fas fa-pen text-xs text-gray-100"></i>
                                                    <input type="file" name="detail_image_2" accept=".png, .jpg, .jpeg" class="hidden"/>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="w-1/2 flex items-center justify-center pb-2">
                                            <div class="relative w-11/12 flex justify-center items-center">
                                                <div class="bg-cover bg-center w-full h-fit rounded-3xl">
                                                    <img src="{{ asset('uploads/restaurant_images/17185482605527.jpg') }}" class="detail_image_3 bg-cover rounded-lg w-full h-full" alt="">
                                                    <p class="error_detail_image_3 px-1 text-red-400 error_p pt-1 text-sm"></p>
                                                </div>
                                                <label class="absolute -top-2 -right-2 flex items-center justify-center w-9 h-9 bg-ter rounded-full shadow hover:text-primary cursor-pointer" title="Change avatar">
                                                    <i class="fas fa-pen text-xs text-gray-100"></i>
                                                    <input type="file" name="detail_image_3" accept=".png, .jpg, .jpeg" class="hidden"/>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="w-1/2 flex items-center justify-center pb-2">
                                            <div class="relative w-11/12 flex justify-center items-center">
                                                <div class="bg-cover bg-center w-full h-fit rounded-3xl">
                                                    <img src="{{ asset('uploads/restaurant_images/17185482605527.jpg') }}" class="detail_image_4 bg-cover rounded-lg w-full h-full" alt="">
                                                    <p class="error_detail_image_4 px-1 text-red-400 error_p pt-1 text-sm"></p>
                                                </div>
                                                <label class="absolute -top-2 -right-2 flex items-center justify-center w-9 h-9 bg-ter rounded-full shadow hover:text-primary cursor-pointer" title="Change avatar">
                                                    <i class="fas fa-pen text-xs text-gray-100"></i>
                                                    <input type="file" name="detail_image_4" accept=".png, .jpg, .jpeg" class="hidden"/>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="text-end py-3">
                        <button type="submit" class="btn bg-ter text-qua rounded-lg hover:text-white px-7">
                            <p class="span-text">Save changes</p>
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
                </div>
                {{-- <div class="col-12 col-xl-3">
                    <div class="languages border-bottom border-translucent border-dashed pb-3 mb-4">
                        <h5 class="text-body mb-3">What is your default language?</h5>
                        <div class="form-check">
                            <input class="form-check-input" id="english" type="radio" checked="checked"
                                name="profiileVisibility" />
                            <label class="form-check-label fs-8" for="english">English</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" id="arabic" type="radio" name="profiileVisibility" />
                            <label class="form-check-label fs-8" for="arabic">Arabic</label>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
</div>
</div>
@endsection

@push('scripts')

    <script src="{{ asset('js/restaurant_owner/settings.js') }}" type="module"></script>

@endpush
