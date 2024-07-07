import { PostAjax } from '../../ajax/post.js';
import { Toast } from "../../toast/toast.js";
import { HandleTab } from "../../profile/handleTab.js";

let orderDetailsMap = {};

let handleCancelOrder = () => {
    $('.deleteBtn').on('click', function(e) {
        e.preventDefault();

        let restaurantId = $('#restaurants').val();

        let id = $(this).data('id');

        let url = '/orders/cancelOrder';

        let data = new FormData();
        data.append('id', id);
        data.append('restaurant_id', restaurantId);

        let cancelOrder = {

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
                        let status = '';

                        if ($('.tab1').hasClass('text-ter')) {
                            status = 'pending';
                        } else if ($('.tab2').hasClass('text-ter')) {
                            status = 'canceled';
                        } else if ($('.tab3').hasClass('text-ter')) {
                            status = 'accepted';
                        } else if ($('.tab4').hasClass('text-ter')) {
                            status = 'completed';
                        }
                        getOrders(1, restaurantId, status);
                    }
                }
            },
            onError: (response) => {
            }
        };

        PostAjax.initAjaxPost(cancelOrder);

    });
}

let handleViewOrderDetails = () => {
    let clicked = false;

    $('.deleteBtn').on('click', function(e) {
        e.preventDefault();
        clicked = true;
    });

    $('.orderBtn').on('click', function(e) {
        e.preventDefault();


        if(!clicked) {
            let orderId = $(this).data('id');
            let order_details = orderDetailsMap[orderId];

            let html = ``;

            $.each(order_details, function(index, item) {
                html += `
                    <div class="px-3 w-3/4 md:w-1/2">
                        <div class="block py-4 px-3 mb-4 bg-sec rounded-md ring-1 ring-gray-300 hover:ring-2 hover:ring-orange-400
                        transition duration-300">
                            <div class="flex justify-center sm:justify-between">
                                <div class="flex flex-col sm:flex-row gap-2">
                                    <img class="w-36 h-32 object-cover rounded-lg" src="/uploads/menu_images/${item.menu.image}" alt="${item.menu.name}">
                                    <div class="flex flex-col justify-between max-w-36 break-words">
                                        <div class="flex justify-between items-center">
                                            <h4 class="text-lg font-bold text-qua">${item.menu.name}</h4>
                                        </div>
                                        <div class="flex items-center gap-2">
                                            <p class="text-gray-400">Quantity:</p>
                                            <span class="text-gray-400">${item.quantity}</span>
                                        </div>
                                        <span class="text-gray-400">Price: <span class="font-bold text-ter">${item.price}$</span></span>
                                        <p class="mt-2 text-gray-400 break-words">${item.menu.description}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                `;
            });

            $('.orderDetails').empty();
            $('.orderDetails').append(html);
            $('.modal').removeClass('hidden');
        }
    });

    $('.close').on('click', function(e) {
        e.preventDefault();
        $('.modal').addClass('hidden');
    });
}

function formatTimeSince(timestamp) {
    const now = new Date();
    const elapsed = now - timestamp;

    if (elapsed < 1000 * 60) {
        return Math.floor(elapsed / 1000) + ' seconds ago';
    } else if (elapsed < 1000 * 60 * 60) {
        return Math.floor(elapsed / (1000 * 60)) + ' minutes ago';
    } else if (elapsed < 1000 * 60 * 60 * 24) {
        return Math.floor(elapsed / (1000 * 60 * 60)) + ' hours ago';
    } else {
        return Math.floor(elapsed / (1000 * 60 * 60 * 24)) + ' days ago';
    }
}

let generateOrders = (data) => {
    $('.orders').empty();

    let html = ``;

    $.each(data.orders, function (index, item) {
        let createdAt = new Date(item.created_at);
        let formattedDate = formatTimeSince(createdAt);

        let bg_status = '';
        let btn = ``;
        let btnSmall = ``;

        if(item.status == 'pending') {
            bg_status = 'bg-gray-100 text-sec';
            btn = `
                <div class="hidden md:block w-full relative">
                    <button class="deleteBtn z-20 flex items-center justify-center rounded-lg absolute top-0 end-0 px-3 py-1 border hover:bg-red-300 text-red-500" data-id="${item.id}">
                        Cancel order
                    </button>
                </div>
            `;
            btnSmall = `
                <div class="md:hidden w-full relative mb-5">
                    <button class="deleteBtn z-20 text-xs flex items-center justify-center rounded-lg absolute top-0 end-0 px-3 py-1 border hover:bg-red-300 text-red-500" data-id="${item.id}">
                        Cancel order
                    </button>
                </div>
            `
        } else if(item.status == 'canceled') {
            bg_status = 'bg-red-400 text-qua';
        }  else if(item.status == 'accepted') {
            bg_status = 'bg-blue-400 text-qua';
        } else if(item.status == 'completed') {
            bg_status = 'bg-green-400 text-qua';
        }

        orderDetailsMap[item.id] = item.order_details;

        html = `
            <div class="w-full lg:w-1/2 sm:px-4 mb-4">
                <div class="orderBtn z-0 bg-sec cursor-pointer p-4 rounded-lg hover:ring-4 hover:ring-orange-400 transition duration-300" data-id="${item.id}">
                    ${btnSmall}
                    <div class="w-full flex lg:justify-between">
                        <div class="w-full flex justify-center sm:justify-between">
                            <div class="flex flex-col sm:flex-row gap-4">
                                <div class="flex flex-col justify-between max-w-full break-words">
                                    <div class="pb-2">
                                        <h4 class="text-lg font-bold text-qua">${ formattedDate }</h4>
                                    </div>
                                    <span class="text-gray-400">Total Price: <span class="font-bold text-ter">${ item.total_price }$</span></span>
                                    <div class="flex gap-1 items-center pt-1">
                                        <p class="text-gray-400 break-words">Order items:</p>
                                        <span class="quantity text-qua">${item.order_details.length}</span>
                                    </div>
                                    <div class="mt-2 border ${bg_status} rounded flex items-center justify-center py-1">
                                        ${ item.status }
                                    </div>
                                </div>
                            </div>
                        </div>
                        ${btn}
                    <div>
                </div>
            </div>
        `;

        $('.orders').append(html);
    });

    handleCancelOrder();
    handleViewOrderDetails();
}

let handleSelectAndStatus = () => {
    $('#restaurants').on('change', function (e) {
        e.preventDefault();
        let restaurant = $('#restaurants').val();

        let status = '';

        if ($('.tab1').hasClass('text-ter')) {
            status = 'pending';
        } else if ($('.tab2').hasClass('text-ter')) {
            status = 'canceled';
        } else if ($('.tab3').hasClass('text-ter')) {
            status = 'accepted';
        } else if ($('.tab4').hasClass('text-ter')) {
            status = 'completed';
        }

        getOrders(1, restaurant, status);
    });


    $('.tab1, .tab2, .tab3, .tab4').click(function() {
        let status = '';
        let restaurant = $('#restaurants').val();

        if ($(this).hasClass('tab1')) {
            status = 'pending';
        } else if ($(this).hasClass('tab2')) {
            status = 'canceled';
        } else if ($(this).hasClass('tab3')) {
            status = 'accepted';
        } else if ($(this).hasClass('tab4')) {
            status = 'completed';
        }

        getOrders(1, restaurant, status);
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

    if (restaurants) {
        let status = '';

        if ($('.tab1').hasClass('text-ter')) {
            status = 'pending';
        } else if ($('.tab2').hasClass('text-ter')) {
            status = 'canceled';
        } else if ($('.tab3').hasClass('text-ter')) {
            status = 'accepted';
        } else if ($('.tab4').hasClass('text-ter')) {
            status = 'completed';
        }

        getOrders(1, restaurants[0].id, status);
    }

    handleSelectAndStatus();
}

let getOrders  = (page = 1, restaurant, status) => {
    let url = `/orders/getOrders?page=${page}`;

    let data = new FormData();
    data.append('restaurant', restaurant);
    data.append('status', status);

    let getOrders = {

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
                    generateOrders(data);
                } else {
                    $('.orders').empty();
                    $('.pagination_controls').empty();
                    $('.orders').append(`
                        <div class="w-full flex items-center justify-center py-4 mt-5">
                            <div class="bg-sec px-3 py-2 text-qua rounded">No Orders</div>
                        </div>
                    `);
                }
            }
        },
        onError: (response) => {
            console.log(response);
        }
    };

    PostAjax.initAjaxPost(getOrders);
}

let getRestaurants = () => {
    let url = '/orders/getRestaurants';

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

                } else {
                    $('#restaurants').hide();
                    $('.restaurants_p').hide();

                    $('.orders').empty();
                    $('.pagination_controls').empty();
                    $('.orders').append(`
                        <div class="w-full flex items-center justify-center py-4 mt-5">
                            <div class="bg-sec px-3 py-2 text-qua rounded">No Orders</div>
                        </div>
                    `);
                }
            }
        },
        onError: (response) => {
        }
    };

    PostAjax.initAjaxPost(getRestaurants);
}

$(document).ready(function () {
    getRestaurants();
    HandleTab.handleTab();
});
