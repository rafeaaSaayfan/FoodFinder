import { PostAjax } from '../ajax/post.js';
import { Toast } from "../toast/toast.js";
import { HandleTab } from "../profile/handleTab.js";

const restaurant_id = $('#restaurant_id').val();
let orderDetailsMap = {};
let orderOwnerMap = {};
let formattedDateMap = {};

let handleCancelOrder = () => {
    $('.deleteBtn').on('click', function(e) {
        e.preventDefault();

        let id = $(this).data('id');
        let email = orderOwnerMap[id].email;

        let url = '/res_owner/orders/cancelOrder';

        let data = new FormData();
        data.append('id', id);
        data.append('restaurant_id', restaurant_id);
        data.append('email', email);

        let btn = $(this);

        let cancelOrder = {

            url: url,
            data: data,
            processData: false,
            contentType: false,
            button: btn,
            div: null,
            onSuccess: (response) => {
                if (response.success) {
                    Toast.toast('success', response.message);

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
                    getOrders(1, status);

                    $('.modal').addClass('hidden');
                }
            },
            onError: (response) => {
                console.log(response);
            }
        };

        PostAjax.initAjaxPost(cancelOrder);
    });
}

let handleAcceptOrder = () => {
    $('.acceptBtn').on('click', function(e) {
        e.preventDefault();

        let id = $(this).data('id');
        let email = orderOwnerMap[id].email;

        let url = '/res_owner/orders/acceptOrder';

        let data = new FormData();
        data.append('id', id);
        data.append('restaurant_id', restaurant_id);
        data.append('email', email);

        let btn = $(this);

        let acceptOrder = {

            url: url,
            data: data,
            processData: false,
            contentType: false,
            button: btn,
            div: null,
            onSuccess: (response) => {
                if (response.success) {
                    Toast.toast('success', response.message);

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
                    getOrders(1, status);

                    $('.modal').addClass('hidden');
                }
            },
            onError: (response) => {
                console.log(response);
            }
        };

        PostAjax.initAjaxPost(acceptOrder);
    });
}

let handleCompleteOrder = () => {
    $('.completeBtn').on('click', function(e) {
        e.preventDefault();

        let id = $(this).data('id');

        let url = '/res_owner/orders/completeOrder';

        let data = new FormData();
        data.append('id', id);
        data.append('restaurant_id', restaurant_id);

        let completeBtn = {

            url: url,
            data: data,
            processData: false,
            contentType: false,
            button: null,
            div: null,
            onSuccess: (response) => {
                if (response.success) {
                    Toast.toast('success', response.message);

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
                    getOrders(1, status);

                    $('.modal').addClass('hidden');
                }
            },
            onError: (response) => {
            }
        };

        PostAjax.initAjaxPost(completeBtn);
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

let handleViewOrderDetails = () => {
    let clicked = false;

    $('.deleteBtn').on('click', function(e) {
        e.preventDefault();
        clicked = true;
    });
    $('.acceptBtn').on('click', function(e) {
        e.preventDefault();
        clicked = true;
    });
    $('.completeBtn').on('click', function(e) {
        e.preventDefault();
        clicked = true;
    });

    $('.orderBtn').on('click', function(e) {
        e.preventDefault();

        if(!clicked) {
            let orderId = $(this).data('id');
            let status = $(this).data('status');

            let formattedDate = formattedDateMap[orderId];
            let order_details = orderDetailsMap[orderId];
            let order_owner = orderOwnerMap[orderId];

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

            if(status == 'pending') {
                $('.buttons').empty();
                $('.buttons').append(
                    `
                                 <button type="submit" class="acceptBtn z-20 flex items-center justify-center rounded-lg px-3 py-1 border hover:bg-blue-500 text-qua" data-id="${orderId}">
                                    <p class="submit span-text text-sm">Accept order</p>
                                    <div class="loading hidden">
                                        <div class="flex items-center gap-2 text-sm">
                                            <svg aria-hidden="true" role="status" class="inline w-4 h-4 text-white animate-spin" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="#E5E7EB"></path>
                                                <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentColor"></path>
                                            </svg>
                                            <span>loading</span>
                                        </div>
                                    </div>
                                </button>
                                 <button type="submit" class="deleteBtn z-20 flex items-center justify-center rounded-lg px-3 py-1 border hover:bg-red-300 text-red-500" data-id="${orderId}">
                                    <p class="submit span-text text-sm">Cancel order</p>
                                    <div class="loading hidden">
                                        <div class="flex items-center gap-2 text-sm">
                                            <svg aria-hidden="true" role="status" class="inline w-4 h-4 text-white animate-spin" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="#E5E7EB"></path>
                                                <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentColor"></path>
                                            </svg>
                                            <span>loading</span>
                                        </div>
                                    </div>
                                </button>
                    `
                );
            } else if(status == 'accepted') {
                $('.buttons').empty();
                $('.buttons').append(
                    `
                    <button class="completeBtn text-xs md:text-sm z-20 flex items-center justify-center rounded-lg px-3 py-1 border hover:bg-green-500 text-qua" data-id="${orderId}">
                        Order completed
                    </button>
                    `
                );
            } else {
                $('.buttons').empty();
            }

            let img = order_owner.profile_img ? `/uploads/profile_images/${order_owner.profile_img}` : `/images/default_image/profile_img.jpg`;

            let htmlInfo = `
                    <div class="flex flex-wrap justify-around g-5 px-3">
                        <div class="col-12 shadow border rounded p-3">
                            <div class="flex items-center gap-1 mb-4">
                                <i class="bi bi-person text-qua opacity-80"></i>
                                <h6 class="text-qua opacity-80">Customer</h6>
                            </div>
                            <div class="w-full flex items-center justify-around flex-wrap">
                                <div class="flex items-center gap-2 mb-3 px-3">
                                    <img class="w-12 h-12 rounded-full" src="${img}">
                                    <p class="text-qua font-semibold fs-9">${order_owner.username}</p>
                                </div>
                                <div class="flex items-center gap-1 mb-1 px-3">
                                    <h6 class="mb-0 text-qua opacity-70">first name:</h6>
                                    <p class="text-qua font-semibold fs-9">${order_owner.first_name}</p>
                                </div>
                                <div class="flex items-center gap-1 px-3">
                                    <h6 class="mb-0 text-qua opacity-70">last name:</h6>
                                    <p class="text-qua font-semibold fs-9">${order_owner.last_name}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 mt-5 shadow border rounded p-3">
                            <div class="flex items-center gap-1 mb-2">
                                <i class="bi bi-envelope text-qua opacity-80"></i>
                                <h6 class="text-qua opacity-70 mb-0">Email</h6>
                            </div>
                            <a class="text-qua font-semibold fs-9 px-3" target="_blank" href="mailto:${order_owner.email}">${order_owner.email}</a>
                        </div>
                        <div class="col-12 col-md-6 mt-5 shadow border rounded p-3">
                            <div class="flex items-center gap-1 mb-2">
                                <i class="bi bi-phone text-qua opacity-80"></i>
                                <h6 class="text-qua opacity-70 mb-0">Phone number</h6>
                            </div>
                            <a class="text-qua font-semibold fs-9 px-3" target="_blank" href="tel:${order_owner.phone_number}">${order_owner.phone_number}</a>
                        </div>
                        <div class="col-12 col-md-8 mt-5 shadow border rounded p-3">
                            <div class="flex items-center gap-1 mb-2">
                                <i class="bi bi-calendar text-qua opacity-80"></i>
                                <h6 class="text-qua opacity-70 mb-0">Shipping Date</h6>
                            </div>
                            <p class="text-qua font-semibold mb-0 fs-9 px-3">${formattedDate}</p>
                        </div>
                        <div class="col-12 col-md-4 mt-5 shadow border rounded p-3">
                            <div class="flex items-center gap-1 mb-2">
                                <i class="bi bi-geo-alt text-qua opacity-80"></i>
                                <h6 class="text-qua opacity-70 mb-0">Address</h6>
                            </div>
                            <div class="px-3">
                                <a href="${order_owner.address}" class="text-qua font-semibold mb-0 fs-9" target="_blank">See location</p>
                            </div>
                        </div>
                    </div>
            `;

            $('.orderDetails').empty();
            $('.orderDetails').append(html);
            $('.orderOwner').empty();
            $('.orderOwner').append(htmlInfo);
            $('.modal').removeClass('hidden');

            handleCancelOrder();
            handleAcceptOrder();
            handleCompleteOrder();
        }
    });

    $('.close').on('click', function(e) {
        e.preventDefault();
        $('.modal').addClass('hidden');
    });
}

let generateOrders = (orders, pagination) => {
    $('.orders').empty();
    $('.pagination_controls').empty();

    let html = ``;

    $.each(orders, function (index, order) {
        let createdAt = new Date(order.created_at);
        let formattedDate = formatTimeSince(createdAt);

        let bg_status = '';
        let btn = ``;
        let btnSmall = ``;
        let btnAccept = ``;
        let btnAcceptSmall = ``;
        let btnCompleted = ``;

        if(order.status == 'pending') {
            bg_status = 'bg-gray-100 text-sec';
            btn = `
                                                <button type="submit" class="deleteBtn z-20 flex items-center justify-center rounded-lg px-3 py-1 border hover:bg-red-300 text-red-500" data-id="${order.id}">
                                    <p class="submit span-text text-sm">Cancel order</p>
                                    <div class="loading hidden">
                                        <div class="flex items-center gap-2 text-sm">
                                            <svg aria-hidden="true" role="status" class="inline w-4 h-4 text-white animate-spin" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="#E5E7EB"></path>
                                                <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentColor"></path>
                                            </svg>
                                            <span>loading</span>
                                        </div>
                                    </div>
                                </button>
            `;
            btnSmall = `
                <div class="">
                                                                    <button type="submit" class="deleteBtn z-20 flex items-center justify-center rounded-lg px-3 py-1 border hover:bg-red-300 text-red-500" data-id="${order.id}">
                                    <p class="submit span-text text-xs">Cancel order</p>
                                    <div class="loading hidden">
                                        <div class="flex items-center gap-2 text-xs">
                                            <svg aria-hidden="true" role="status" class="inline w-4 h-4 text-white animate-spin" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="#E5E7EB"></path>
                                                <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentColor"></path>
                                            </svg>
                                            <span>loading</span>
                                        </div>
                                    </div>
                                </button>
                </div>

            `;
            btnAccept = `
                           <button type="submit" class="acceptBtn z-20 flex items-center justify-center rounded-lg px-3 py-1 border hover:bg-blue-500 text-qua" data-id="${order.id}">
                                    <p class="submit span-text text-sm">Accept order</p>
                                    <div class="loading hidden">
                                        <div class="flex items-center gap-2 text-sm">
                                            <svg aria-hidden="true" role="status" class="inline w-4 h-4 text-white animate-spin" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="#E5E7EB"></path>
                                                <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentColor"></path>
                                            </svg>
                                            <span>loading</span>
                                        </div>
                                    </div>
                                </button>
            `;
            btnAcceptSmall = `
                <div>
                                <button type="submit" class="acceptBtn z-20 flex items-center justify-center rounded-lg px-3 py-1 border hover:bg-blue-500 text-qua" data-id="${order.id}">
                                    <p class="submit span-text text-xs">Accept order</p>
                                    <div class="loading hidden">
                                        <div class="flex items-center gap-2 text-xs">
                                            <svg aria-hidden="true" role="status" class="inline w-4 h-4 text-white animate-spin" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="#E5E7EB"></path>
                                                <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentColor"></path>
                                            </svg>
                                            <span>loading</span>
                                        </div>
                                    </div>
                                </button>
                </div>
            `;
        } else if(order.status == 'canceled') {
            bg_status = 'bg-red-400 text-qua';
        }  else if(order.status == 'accepted') {
            bg_status = 'bg-blue-400 text-qua';
            btnCompleted = `
                <button class="completeBtn text-xs md:text-sm z-20 flex items-center justify-center rounded-lg px-3 py-1 border hover:bg-green-500 text-qua" data-id="${order.id}">
                    Order completed
                </button>
            `;
        } else if(order.status == 'completed') {
            bg_status = 'bg-green-400 text-qua';
        }

        orderDetailsMap[order.id] = order.order_details;
        orderOwnerMap[order.id] = order.user;
        formattedDateMap[order.id] = formattedDate;

        html = `
            <div class="w-full lg:w-1/2 sm:px-4 mb-4">
                <div class="orderBtn z-0 bg-sec cursor-pointer p-4 rounded-lg hover:ring-4 hover:ring-orange-400 transition duration-300"
                 data-id="${order.id}" data-status="${order.status}">
                    <div class="w-full md:hidden flex items-center gap-1 flex-row justify-around flex-wrap mb-3">
                        ${btnSmall}
                        ${btnAcceptSmall}
                        ${btnCompleted}
                    </div>
                    <div class="w-full flex lg:justify-between">
                        <div class="w-full flex justify-center sm:justify-between">
                            <div class="flex flex-col sm:flex-row gap-4">
                                <div class="flex flex-col justify-between max-w-full break-words">
                                    <div class="pb-2">
                                        <h4 class="text-lg font-bold text-qua">${ formattedDate }</h4>
                                    </div>
                                    <span class="text-gray-400">Total Price: <span class="font-bold text-ter">${ order.total_price }$</span></span>
                                    <div class="flex gap-1 items-center pt-1">
                                        <p class="text-gray-400 break-words">Order items:</p>
                                        <span class="quantity text-qua">${order.order_details.length}</span>
                                    </div>
                                    <div class="mt-2 border ${bg_status} rounded flex items-center justify-center py-1">
                                        ${ order.status }
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="relative w-full hidden md:block w-full absolute top-0 end-0">
                            <div class="absolute md:flex flex-col gap-2 top-0 end-0 items-center">
                                ${btn}
                                ${btnAccept}
                                ${btnCompleted}
                            </div>
                        </div>
                    <div>
                </div>
            </div>
        `;

        $('.orders').append(html);
    });

    $('.pagination_controls').append(pagination);

    handleCancelOrder();
    handleViewOrderDetails();
    handleAcceptOrder();
    handleCompleteOrder();
}

let handleStatus = () => {
    $('.tab1, .tab2, .tab3, .tab4').click(function() {
        let status = '';

        if ($(this).hasClass('tab1')) {
            status = 'pending';
        } else if ($(this).hasClass('tab2')) {
            status = 'canceled';
        } else if ($(this).hasClass('tab3')) {
            status = 'accepted';
        } else if ($(this).hasClass('tab4')) {
            status = 'completed';
        }

        getOrders(1, status);
    });
}

let getOrders  = (page = 1, status) => {
    let url = `/res_owner/orders/getOrders?page=${page}`;

    let data = new FormData();
    data.append('restaurant_id', restaurant_id);
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
                let orders = response.orders;
                let pagination = response.pagination;

                if (orders.length) {
                    generateOrders(orders, pagination);
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

let setupPaginationClickHandlers = () => {
    $('.pagination_controls').off('click', 'a');
    $('.pagination_controls').on('click', 'a', function (e) {
        e.preventDefault();
        let url = new URL($(this).attr('href'));
        let page = url.searchParams.get('page');
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
        getOrders(page, status);
    });
}


$(document).ready(function () {
    getOrders(1, 'pending');
    handleStatus();
    setupPaginationClickHandlers();
    HandleTab.handleTab();
});
