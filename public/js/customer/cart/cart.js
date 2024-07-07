import { PostAjax } from '../../ajax/post.js';
import { Toast } from "../../toast/toast.js";

let deleteCart = () => {
    $('.deleteBtn').on('click', function(e) {
        e.preventDefault();

        let restaurantId = $('#restaurants').val();

        let id = $(this).data('id');

        let url = '/cart/deleteCart';

        let data = new FormData();
        data.append('id', id);
        data.append('restaurant_id', restaurantId);

        console.log(restaurantId);

        let deleteCart = {

            url: url,
            data: data,
            processData: false,
            contentType: false,
            button: null,
            div: null,
            onSuccess: (response) => {
                if (response) {
                    Toast.toast('success', response.message);

                    if (response.isCartEmpty) {
                        getRestaurants();
                    } else {
                        getCart(1, restaurantId);
                    }
                }
            },
            onError: (response) => {
            }
        };

        PostAjax.initAjaxPost(deleteCart);

    });
}

let handleQuantity = () => {
    $('.quantity-btn').on('click', function(e) {
        e.preventDefault;

        let id = $(this).data('id');
        let action = $(this).data('action');
        let quantity = $(this).data('quantity');

        if(action == 'decrease' && quantity > 1) {
            quantity--;
        } else if(action == 'increase') {
            quantity++;
        } else {
            return;
        }

        let url = '/cart/updatedCart';

        let data = new FormData();
        data.append('id', id);
        data.append('quantity', quantity);

        let updatedCart = {

            url: url,
            data: data,
            processData: false,
            contentType: false,
            button: null,
            div: null,
            onSuccess: (response) => {
                if (response) {
                    Toast.toast('success', response.message);
                    getCart(1, $('#restaurants').val());
                }
            },
            onError: (response) => {
                console.log(response);
            }
        };

        PostAjax.initAjaxPost(updatedCart);
    });
}

let generateCart = (data) => {
    $('.cart').empty();
    $('.total_price').empty();

    let html = ``;
    let total_price = 0;

    $.each(data.carts, function (index, item) {
        html = `
            <div class="w-full lg:w-1/2 sm:px-4 mb-4">
                <div class="bg-sec p-4 rounded-lg hover:ring-4 hover:ring-orange-400 transition duration-300">
                    <div class="md:hidden w-full relative mb-5">
                        <button class="deleteBtn flex items-center justify-center rounded-lg absolute top-0 end-0 w-7 h-7 border hover:bg-red-300 text-red-500" data-id="${item.id}">
                            <span class="fas fa-trash delete text-xs"></span>
                        </button>
                    </div>
                    <div class="w-full flex lg:justify-between">
                        <div class="w-full flex justify-center sm:justify-between">
                            <div class="flex flex-col sm:flex-row gap-4">
                                <img class="w-38 h-32 object-cover rounded-lg" src="/uploads/menu_images/${ item.menu.image }">
                                <div class="flex flex-col justify-between max-w-full break-words">
                                    <div class="">
                                        <h4 class="text-lg font-bold text-qua">${ item.menu.name }</h4>
                                    </div>
                                    <span class="text-gray-400">Price: <span class="font-bold text-ter">${ item.price }$</span></span>
                                    <div class="flex gap-3 items-center">
                                        <p class="text-gray-400 break-words">Quantity:</p>
                                        <div class="flex gap-2 items-center">
                                            <button class="quantity-btn z-20 cursor-pointer text-qua border w-5 h-5 flex items-center justify-center rounded-md" data-quantity="${item.quantity}" data-action="decrease" data-id="${item.id}">-</button>
                                            <span class="quantity text-qua">${item.quantity}</span>
                                            <button class="quantity-btn z-20 text-qua border w-5 h-5 flex items-center justify-center rounded-md" data-quantity="${item.quantity}" data-action="increase" data-id="${item.id}">+</button>
                                        </div>
                                    </div>
                                    <p class="mt-2 text-gray-400 break-words">${ item.menu.description }</p>
                                </div>
                            </div>
                        </div>
                        <div class="hidden md:block w-full relative">
                            <button class="deleteBtn flex items-center justify-center rounded-lg absolute top-0 end-0 w-7 h-7 border hover:bg-red-300 text-red-500" data-id="${item.id}">
                                <span class="fas fa-trash delete text-xs"></span>
                            </button>
                        </div>
                    <div>
                </div>
            </div>
        `;
        $('.cart').append(html);

        total_price += item.price;
    });

    $('.total_price').append(total_price + '$');

    handleQuantity();
    deleteCart();
}

let handleSelect = () => {

    $('#restaurants').on('change', function (e) {
        e.preventDefault();
        let restaurant = $('#restaurants').val();
        getCart(1, restaurant);
    });
}

let generateSelect = (restaurants) => {
    $('#restaurants').empty();
    $('#restaurants').show();
    $('.restaurants_p').show();

    let html = ``;

    $.each(restaurants, function (index, restaurant) {
        html = `
            <option value="${restaurant.id}">${restaurant.restaurant_name}</option>
        `;
        $('#restaurants').append(html);
    });

    if (restaurants.length > 0) {
        getCart(1, restaurants[0].id);
    }

    handleSelect();
}

let getCart = (page = 1, restaurant) => {
    let url = `/cart/getCart?page=${page}`;

    let data = new FormData();
    data.append('restaurant', restaurant);

    let getCart = {

        url: url,
        data: data,
        processData: false,
        contentType: false,
        button: null,
        div: $('.loading-indicator'),
        onSuccess: (response) => {
            if (response) {
                let data = response.data;

                if (data) {
                    generateCart(data);
                } else {
                    $('.cart').empty();
                    $('.pagination_controls').empty();
                    $('.cart').append(`
                        <div class="w-full flex items-center justify-center py-4">
                            <div class="bg-sec px-3 py-2 text-qua rounded">Empty Cart</div>
                        </div>
                    `);
                }
            }
        },
        onError: (response) => {
            console.log(response);
        }
    };

    PostAjax.initAjaxPost(getCart);
}

let getRestaurants = () => {
    let url = '/cart/getRestaurants';

    let getRestaurants = {

        url: url,
        data: null,
        processData: false,
        contentType: false,
        button: null,
        div: $('.loading-indicator'),
        onSuccess: (response) => {
            if (response) {
                let restaurants = response.restaurants;

                if (restaurants.length) {
                    generateSelect(restaurants);

                    if ($('.checkoutBtn')) {
                        if ($('.checkoutBtn').length > 0) {
                            $('.checkoutBtn').prop('disabled', false);
                        }
                    }

                } else {
                    $('#restaurants').hide();
                    $('.restaurants_p').hide();

                    $('.cart').empty();
                    $('.pagination_controls').empty();
                    $('.cart').append(`
                        <div class="w-full flex items-center justify-center py-4">
                            <div class="bg-sec px-3 py-2 text-qua rounded">Empty Cart</div>
                        </div>
                    `);

                    if ($('.checkoutBtn').length > 0) {
                        $('.checkoutBtn').prop('disabled', true);
                    }

                    $('.total_price').text('0$');
                    $('.checkoutBtn').removeClass('bg-ter hover:bg-orange-600');
                    $('.checkoutBtn').addClass('bg-sec opacity-50');
                }
            }
        },
        onError: (response) => {
            console.log(response);
        }
    };

    PostAjax.initAjaxPost(getRestaurants);
}

let handleCheckOut = () => {
    $('.checkoutBtn').on('click', function(e) {
        e.preventDefault();
        $('.modal').removeClass('hidden');
    });

    const checkoutForm = $('.checkoutForm');

    checkoutForm.on('submit', function(e) {
        e.preventDefault();

        let url = '/cart/checkOut';
        let btn = checkoutForm.find('[type=submit]');

        let restaurant_id = $('#restaurants').val();

        let data = new FormData(checkoutForm[0]);
        data.append('restaurant_id', restaurant_id);

        let checkOut = {

            url: url,
            data: data,
            processData: false,
            contentType: false,
            button: btn,
            div: null,
            onSuccess: (response) => {
                if (response) {
                    Toast.toast('success', response.message);
                    $('.modal').addClass('hidden');
                    getRestaurants();
                }
            },
            onError: (response) => {
                console.log(response);
                $(".error_p").empty();
                let errors = response.responseJSON.errors;
                $.each(errors, function(key, value) {
                    let errorP = $(".error_" + key);
                    errorP.html(value[0]);
                });
            }
        };

        PostAjax.initAjaxPost(checkOut);
    });

    $('.close').on('click', function(e) {
        e.preventDefault();
        $('.modal').addClass('hidden');
    });
}

$(document).ready(function () {
    getRestaurants();
    handleCheckOut();
});
