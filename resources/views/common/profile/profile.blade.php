@extends('layouts.app')

@section('content')
<div class="bg-qua">
    <div class="container pt-32 pb-10">
        <div class="row align-items-center justify-content-between g-3 mb-4">
            <div class="col-auto">
                <h2 class="mb-0 text-ter text-3xl ff-secondary">Profile</h2>
            </div>
            <div class="col-auto">
                <div class="row g-2 g-sm-3">
                    <div class="col-auto">
                        <button class="btn resetPassBtn bg-sec text-sm hover:text-white text-qua rounded-lg hover:bg-orange-600">
                            <span class="fas fa-key me-2"></span>
                            Reset password
                        </button>
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
                                        <img class="profile_img rounded-circle w-48 h-48" src="" alt="" />
                                    </label>
                                </div>
                                <div class="col-12 col-sm-auto flex-1">
                                    <h3 class="username text-2xl text-ter font-bold"></h3>
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
                                    <a href="" id="location_address" class="text-sm underline" target="_blank">See location</a>
                                </div>
                            </div>
                        </div>
                        <div class="border-top border-dashed pt-4">
                            <div class="row flex items-center justify-between mb-2">
                                <div class="col-auto">
                                    <h5 class="text-body-highlight mb-0">Email</h5>
                                </div>
                                <div class="col-auto">
                                    <a id="email" class="lh-1" href=""></a>
                                </div>
                            </div>
                            <div class="row flex items-center justify-between">
                                <div class="col-auto">
                                    <h5 class="text-body-highlight mb-0">Phone</h5>
                                </div>
                                <div class="col-auto"><a class="phone_number" href=""></a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="rounded-lg mt-8 py-4 px-2 px-md-4 bg-white w-full border">
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
                <a class="tab4 text-nowrap cursor-pointer text-sec pb-2">
                    <div class="w-full flex items-center gap-2">
                        <span class="fas fa-user"></span>
                        Personal info
                    </div>
                </a>
            </div>
            <div @click.away="open = false" class="relative mb-3 sm:hidden" x-data="{ open: false }">
                <button @click="open = !open"
                    class="w-fit bg-sec px-3 py-1 flex items-center rounded-lg hover:ring-1 hover:ring-orange-300 text-sm text-left text-qua">
                    <span class="tabSelect">Orders</span>
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
                    class="z-20 absolute w-full mt-2 origin-top-right rounded-md shadow-lg w-32 md:w-48">
                    <div class="px-1 py-1 bg-pr rounded-md shadow">
                        <div @click="open = !open" class="tab1 cursor-pointer px-4 py-2 text-sm font-semibold rounded-lg hover:bg-orange-600 text-qua hover:text-white">
                            <div class="w-full flex items-center gap-2">
                                <span class="fas fa-shopping-cart"></span>
                                <span>
                                    Orders
                                    <span class="text-body-tertiary fw-normal">({{ $totalOrders }})</span>
                                </span>
                            </div>
                        </div>
                        <div @click="open = !open" class="tab4 cursor-pointer px-4 py-2 text-sm font-semibold rounded-lg hover:bg-orange-600 text-qua hover:text-white">
                            <div class="w-full flex items-center gap-2">
                                <span class="fas fa-user"></span>
                                Personal info
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="orders" class="orders w-full overflow-x-auto">
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
            <div class="hidden" id="updateProfile">
                <form class="row g-3" id="updateProfileForm">
                    <div class="col-12 col-lg-3">
                        <label class="">
                            <span class="text-sm text-sec">Profile Image:</span>
                            <div class="flex items-center gap-2">
                                <img class="profile_img rounded-circle w-20 h-20" src="" alt="" />

                                <label
                                    class="flex items-center justify-center w-8 h-8 bg-white rounded-full border cursor-pointer"
                                    title="Change avatar" class="">
                                    <i class="fas fa-pen text-xs text-sec"></i>
                                    <input type="file" name="profile_img" accept=".png, .jpg, .jpeg" class="hidden" />
                                </label>

                                <label
                                    class="flex items-center justify-center w-8 h-8 bg-white rounded-full border cursor-pointer"
                                    title="Change avatar" class="">
                                    <i class="fa fa-solid fa-trash text-red-600"></i>
                                </label>
                            </div>
                            <p class="error_profile_image px-1 text-red-500 error_p text-sm"></p>
                        </label>
                    </div>
                    <div class="col-12 col-lg-3">
                        <label class="form-label text-sec fs-8 ps-0 text-capitalize lh-sm" for="first_name">First
                            Name:</label>
                        <input class="form-control rounded-lg" id="first_name" type="text" name="first_name"
                            placeholder="Full name" />
                        <p class="error_first_name px-1 text-red-500 error_p text-sm"></p>
                    </div>
                    <div class="col-12 col-lg-3">
                        <label class="form-label text-sec fs-8 ps-0 text-capitalize lh-sm" for="last_name">Last
                            Name:</label>
                        <input class="form-control rounded-lg" name="last_name" id="last_name" type="text"
                            placeholder="Full name" />
                        <p class="error_last_name px-1 text-red-500 error_p text-sm"></p>
                    </div>
                    <div class="col-12 col-lg-3">
                        <label class="form-label text-sec fs-8 ps-0 text-capitalize lh-sm"
                            for="username">Username:</label>
                        <input class="form-control rounded-lg" name="username" id="username" type="text"
                            placeholder="Full name" />
                        <p class="error_username px-1 text-red-500 error_p text-sm"></p>
                    </div>
                    <div class="col-12 col-lg-6">
                        <label class="form-label text-sec fs-8 ps-0 text-capitalize lh-sm" for="email">Email:</label>
                        <input class="form-control rounded-lg" id="email" name="email" type="text"
                            placeholder="Email" />
                        <p class="error_email px-1 text-red-500 error_p text-sm"></p>
                    </div>
                    <div class="col-12 col-lg-6">
                        <label class="form-label text-sec fs-8 ps-0 text-capitalize lh-sm" for="phone">Phone</label>
                        <input class="form-control rounded-lg" id="phone" name="phone_number" type="text"
                            placeholder="+1234567890" />
                        <p class="error_phone_number px-1 text-red-500 error_p text-sm"></p>
                    </div>
                    <div class="col-12 pt-3">
                        <div class="w-full flex flex-col">
                            <div>
                                <iframe
                                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1696204.1899564962!2d34.525305288998275!3d33.86649865269898!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x151f17028422aaad%3A0xcc7d34096c00f970!2sLebanon!5e0!3m2!1sen!2sus!4v1717430551488!5m2!1sen!2sus"
                                    width="100%" height="150" style="border:0;" class="rounded-lg" allowfullscreen=""
                                    loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                <p class="text-sec text-xs opacity-80">{{ __('messages.complete_profile.addr_p') }}</p>
                            </div>
                            <div>
                                <label for="" class="text-xs font-semibold px-1 text-sec opacity-80">Address:</label>
                                <input class="form-control rounded-lg" id="phone" name="address" type="text"
                                    placeholder="Enter your Address" />
                                <p class="error_address px-1 text-red-500 error_p text-sm"></p>
                            </div>
                        </div>
                    </div>
                    <div class="text-end mt-5">
                        <button type="submit" class="btn bg-ter text-qua rounded-lg hover:text-white px-7">
                            <p class="span-text">Save changes</p>
                            <div class="loading hidden">
                                <div class="flex items-center gap-2">
                                    <svg aria-hidden="true" role="status" class="inline w-4 h-4 text-white animate-spin"
                                        viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z"
                                            fill="#E5E7EB"></path>
                                        <path
                                            d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z"
                                            fill="currentColor"></path>
                                    </svg>
                                    <span>{{ __('messages.auth.loading') }}</span>
                                </div>
                            </div>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div data-dialog-backdrop="web-3-dialog" data-dialog-backdrop-close="true"
   class="modal hidden fixed inset-0 z-[999] grid h-screen w-screen place-items-center bg-black bg-opacity-60 backdrop-blur-sm transition-opacity duration-300 px-1 md:px-0">
    <div class="bg-sec m-4 rounded-lg shadow-2xl text-blue-gray-500 antialiased leading-relaxed w-11/12 lg:w-4/12"
    data-dialog="web-3-dialog">
        <div class="w-full flex items-center pt-3 px-2 font-sans text-2xl font-semibold justify-between">
            <div class="flex items-center flex-wrap gap-3 md:gap-5">
                <h5 class="text-lg md:text-xl font-bold text-ter">
                    Change Password
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
        <form class="changePassForm flex flex-col gap-4 mx-2 mx-lg-4">
            <div class="col-12">
                <label class="form-label text-qua text-sm" for="old_pass">
                    Old password:
                </label>
                <input class="form-control rounded-lg" id="old_pass" type="password" name="old_pass"
                    placeholder="Enter your old password" />
            </div>
            <div class="col-12">
                <label class="form-label text-qua text-sm" for="password">
                    New password:
                </label>
                <input class="form-control rounded-lg" id="password" type="password" name="password"
                    placeholder="Enter your new password" />
                <p class="error_password px-1 text-red-500 error_pass text-sm"></p>
            </div>
            <div class="col-12">
                <label class="form-label text-qua text-sm" for="conf_pass">
                    Confirm password:
                </label>
                <input class="form-control rounded-lg" id="conf_pass" type="password" name="password_confirmation"
                    placeholder="Confirm your new password" />
            </div>

            <div class="flex flex-wrap flex-row-reverse gap-4 py-3">
                <button type="submit" class="block max-w-xs bg-ter text-qua rounded px-4 py-1 font-semibold">
                    <p class="submit span-text text-sm">Change</p>
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
<script src="{{ asset('js/profile/profile.js') }}" type="module"></script>
@endpush
