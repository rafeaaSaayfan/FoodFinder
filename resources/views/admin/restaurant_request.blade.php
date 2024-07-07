@extends('layouts.dashboard.dashboard')

@section('content')

    @include('admin.sideBar.sideBar')
            <div class="container bg-qua h-full w-100 md:w-4/5 xs:px-2 xl:px-10 flex justify-center items-center" style="min-height: 100vh">
                <div class="w-full h-full md:px-24">
                    <div class="mb-3">
                        <h1 class="text-ter font-bold">Restaurant Request</h1>
                    </div>
                    <hr>
                    <div class="restaurant_request flex flex-col justify-center">
                    </div>
                    <div class="loading-indicator flex flex-col items-center justify-center w-full">
                    </div>
                    <hr class="my-4">
                    <div class="pagination_controls"></div>
                </div>
            </div>

            <div data-dialog-backdrop="web-3-dialog" data-dialog-backdrop-close="true"
                class="modal hidden fixed inset-0 z-[999] grid h-screen w-screen place-items-center bg-black bg-opacity-60 backdrop-blur-sm transition-opacity duration-300 px-1 md:px-0">
                <div class="bg-sec m-4 rounded-lg shadow-2xl text-blue-gray-500 antialiased leading-relaxed w-full md:w-3/4"
                    data-dialog="web-3-dialog">
                    <div class="flex items-center pt-3 md:pt-4 pb-2 px-2 md:px-4 font-sans text-2xl font-semibold justify-between">
                        <div class="flex items-center flex-wrap gap-3 md:gap-5">
                            <h5 class="text-lg md:text-xl font-bold text-ter">
                                Restaurant View
                            </h5>
                            <div class="items-center gap-3 hidden md:flex">
                                <input type="hidden" value="" class="res_id">
                                <button type="submit" class="rejectBtn block max-w-xs bg-gray-500 hover:bg-gray-700 text-qua rounded px-3 py-1 font-semibold">
                                    <p class="submit span-text text-sm">Reject</p>
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
                                <button type="submit" class="approvedBtn block max-w-xs bg-ter text-qua rounded px-3 py-1 font-semibold">
                                    <p class="submit span-text text-sm">Approval</p>
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
                        <button class="align-middle select-none font-sans font-semibold text-center uppercase transition-all disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none text-xs"
                            type="button" data-ripple-dark="true" data-dialog-close="true">
                            <span class="close transform">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                    stroke="currentColor" aria-hidden="true" class="stroke-gray-300 h-7 w-7">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12">
                                    </path>
                                </svg>
                            </span>
                        </button>
                    </div>
                    <div class="px-2 pb-2 pt-1 flex items-center gap-3 md:hidden">
                        <input type="hidden" value="" class="res_id">
                        <button type="submit" class="rejectBtn block max-w-xs bg-gray-500 hover:bg-gray-700 text-qua rounded px-3 py-1 font-semibold">
                            <p class="submit span-text text-sm">Reject</p>
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
                        <button type="submit" class="approvedBtn block max-w-xs bg-ter text-qua rounded px-3 py-1 font-semibold">
                            <p class="submit span-text text-sm">Approval</p>
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
                    <hr>
                    <div class="w-full overflow-y-auto content p-2 md:p-4" style="max-height: 80vh">
                        <div class="w-full">
                            <div class="res_info w-full flex flex-col justify-center items-center">
                            </div>
                        </div>
                        <div class="res_imgs w-full flex flex-wrap items-center justify-between mt-5">
                            <div class="w-full flex items-center justify-center">
                                <div class="w-3/4">
                                    <label class="text-start text-qua">Profile Image</label>
                                    <img src="" class="profile_res bg-cover rounded-lg">
                                </div>
                            </div>
                            <div class="w-full image_detail mt-5">
                                <label for="" class="text-qua">Image details</label>
                                <div class="flex gap-3">
                                    <div class="flex flex-col gap-3 w-1/2">
                                        <img src="" class="detail_1 bg-cover rounded-lg" alt="">
                                        <img src="" class="detail_2 bg-cover rounded-lg" alt="">
                                    </div>
                                    <div class="flex flex-col gap-3 w-1/2">
                                        <img src="" class="detail_3 bg-cover rounded-lg" alt="">
                                        <img src="" class="detail_4 bg-cover rounded-lg" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection

@push('scripts')
<script src="{{ asset('js/admin/restaurant_request.js') }}" type="module"></script>
<script src="https://unpkg.com/@material-tailwind/html@latest/scripts/dialog.js"></script>
@endpush
