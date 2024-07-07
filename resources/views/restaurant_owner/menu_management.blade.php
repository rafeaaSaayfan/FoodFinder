@extends('layouts.dashboard.dashboard')

@section('content')

@include('restaurant_owner.sideBar.sideBar')

<div class="bg-qua w-full flex items-center justify-center items-center ps-md-4 py-3">
    <div class="container w-full flex justify-center items-center px-md-5">
        <div class="relative w-full shadow bg-white rounded pt-4 px-3 px-md-5">
            <div class="w-full border-b w-full flex flex-wrap items-center justify-between">
                <a class="tab1 text-nowrap cursor-pointer border-b-2 border-orange-600 pb-2 text-ter">
                    <div class="w-full flex items-center gap-2">
                        <span class="fas fa-utensils"></span>
                        <span>
                            Menu
                        </span>
                    </div>
                </a>
                <a class="tab2 text-nowrap cursor-pointer pb-2 text-sec">
                    <div class="w-full flex items-center gap-2">
                        <span class="fas fa-plus"></span>
                        <span>
                            Create Menu
                        </span>
                    </div>
                </a>
            </div>
            <div class="w-full py-4" id="orders">
                <div class="w-full flex flex-wrap gap-2 md:gap-0 items-center justify-between border-b pb-3">
                    <input type="hidden" value="{{ $restaurant->id }}" id="restaurant_id">
                    <select class="form-select w-fit lg:w-64 rounded-lg bg-qua" name="category" id="category">
                        <option value="" selected="">All</option>
                        <option value="appetizers">appetizers</option>
                        <option value="sandwiches">sandwiches</option>
                        <option value="meals">meals</option>
                        <option value="pizzas">pizzas</option>
                        <option value="desserts">desserts</option>
                        <option value="drinks">drinks</option>
                    </select>
                    <div class="w-fit lg:w-80">
                        <div class="relative w-full">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <svg class="w-5 h-5 text-sec opacity-70" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </div>
                            <input type="text" id="search"
                                class="w-full bg-qua border text-sec text-sm rounded-xl block pl-10 p-2.5"
                                placeholder="Search menu name">
                        </div>
                    </div>
                </div>
                <div class="menu flex items-center justify-around sm:justify-center lg:justify-around flex-wrap pt-3"></div>
                <div class="pagination_controls mt-3"></div>
            </div>
            <div class="hidden w-full py-4" id="reviews">
                <form id="createMenuForm" class="container bg-qua shadow rounded p-4">
                    <div class="w-full">
                        <div class="row">
                            <div class="col-12 col-xl-8">
                                <div class="mb-3">
                                    <h4 class="mb-1">Item name</h4>
                                    <input class="form-control" name="name" type="text"
                                        placeholder="Write name here..." />
                                    <p class="error_name px-1 text-red-400 error_p pt-1 text-sm"></p>
                                </div>
                                <div class="mb-3">
                                    <h4 class="mb-1">Item Description</h4>
                                    <textarea class="form-control" name="description"></textarea>
                                    <p class="error_description px-1 text-red-400 error_p pt-1 text-sm"></p>
                                </div>
                                <div class="mb-3">
                                    <label for="image">Item Image</label>
                                    <input type="file" name="image" class="bg-white form-control" id="image"
                                        placeholder="Item Image" />
                                    <p class="error_image px-1 text-red-400 error_p pt-1 text-sm"></p>
                                </div>
                            </div>
                            <div class="col-12 col-xl-4 pt-2">
                                <div class="card w-full">
                                    <div class="w-full card-body">
                                        <h4 class="card-title mb-4">Organize</h4>
                                        <div class="row">
                                            <div class="col-12 col-sm-6 col-xl-12">
                                                <div class="mb-4">
                                                    <div class="d-flex flex-wrap mb-2">
                                                        <h5 class="mb-0 text-body-highlight me-2">Category</h5>
                                                    </div>
                                                    <select class="form-select" name="category" id="category">
                                                        <option selected="">Add item category</option>
                                                        <option value="appetizers">appetizers</option>
                                                        <option value="sandwiches">sandwiches</option>
                                                        <option value="meals">meals</option>
                                                        <option value="pizzas">pizzas</option>
                                                        <option value="desserts">desserts</option>
                                                        <option value="drinks">drinks</option>
                                                    </select>
                                                    <p class="error_category px-1 text-red-400 error_p pt-1 text-sm">
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-6 col-xl-12">
                                                <div class="mb-1">
                                                    <h5 class="mb-2 text-body-highlight">Price</h5>
                                                    <input type="number" name="price" class="form-control" id="price"
                                                        placeholder="Item Price" step="0.1" min="0">
                                                    <p class="error_price px-1 text-red-400 error_p pt-1 text-sm"></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="text-end py-3">
                                <button type="submit" class="btn bg-ter text-qua rounded-lg hover:text-white px-7">
                                    <p class="span-text">Save changes</p>
                                    <div class="loading hidden">
                                        <div class="flex items-center gap-2">
                                            <svg aria-hidden="true" role="status"
                                                class="inline w-4 h-4 text-white animate-spin" viewBox="0 0 100 101"
                                                fill="none" xmlns="http://www.w3.org/2000/svg">
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
                        </div>
                    </div>
                </form>
            </div>
            <div class="absolute z-20 start-1/2 top-1/2 loading-indicator">
            </div>
        </div>
    </div>
</div>
<div data-dialog-backdrop="web-3-dialog" data-dialog-backdrop-close="true"
    class="modal hidden fixed inset-0 z-[999] grid h-screen w-screen place-items-center bg-black bg-opacity-60 backdrop-blur-sm transition-opacity duration-300 px-1 md:px-0">
    <div class="bg-qua m-4 rounded-lg shadow-2xl text-blue-gray-500 antialiased leading-relaxed w-11/12 lg:w-4/12"
        data-dialog="web-3-dialog">
        <div class="w-full flex items-center pt-3 px-2 font-sans text-2xl font-semibold justify-between">
            <div class="flex items-center flex-wrap gap-3 md:gap-5">
                <h5 class="text-lg md:text-xl font-bold text-ter">
                    Do you want to delete this item
                </h5>
            </div>
            <button
                class="align-middle select-none font-sans font-semibold text-center uppercase transition-all disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none text-xs"
                type="button" data-ripple-dark="true" data-dialog-close="true">
                <span class="close transform">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                        stroke="currentColor" aria-hidden="true" class="h-7 w-7">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12">
                        </path>
                    </svg>
                </span>
            </button>
        </div>
        <hr class="my-3">
        <div class="flex flex-row justify-between pt-5 pb-3 px-4">
            <button class="close px-4 py-1 bg-blue-600 text-qua rounded">Cancel</button>
            <button type="submit"
                class="confDeleteBtn block bg-red-600 max-w-xs bg-ter text-qua rounded px-4 py-1 font-semibold">
                <p class="submit span-text text-sm">Delete</p>
                <div class="loading hidden">
                    <div class="flex items-center gap-2 text-sm">
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
    </div>
</div>
</div>
@endsection

@push('scripts')
<script src="{{ asset('js/restaurant_owner/menu.js') }}" type="module"></script>
@endpush
