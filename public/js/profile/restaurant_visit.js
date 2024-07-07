import { PostAjax } from "../ajax/post.js";
import { HandleTab } from "./handleTab.js";
import { Toast } from "../toast/toast.js"

const restaurant_id = $('#restaurant_id').val();

let generateRate = (average_rating, review_count) => {
    $('.res_rating').empty();

    let html = ``;

    for(let i = 1; i <= 5; i++) {
        html += `
            <svg class="h-5 transition-all duration-100
                ${ i <= average_rating ? 'fill-yellow-500' : 'fill-gray-500' }"
                viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg"
                xmlns:xlink="http://www.w3.org/1999/xlink">
                <path d="M575.852903 115.426402L661.092435 288.054362c10.130509 20.465674 29.675227 34.689317 52.289797 37.963825l190.433097 27.62866c56.996902 8.288598 79.7138 78.281203 38.475467 118.496253l-137.836314 134.35715c-16.372539 15.963226-23.84251 38.987109-19.954032 61.49935l32.540421 189.716799c9.721195 56.792245-49.833916 100.077146-100.793444 73.267113L545.870691 841.446188a69.491196 69.491196 0 0 0-64.67153 0l-170.376737 89.537324c-50.959528 26.810033-110.51464-16.474868-100.793444-73.267113L242.569401 667.9996c3.888478-22.512241-3.581493-45.536125-19.954032-61.49935L84.779055 472.245428c-41.238333-40.215049-18.521435-110.207655 38.475467-118.496252l190.433097-27.62866c22.61457-3.274508 42.159288-17.498151 52.289797-37.963826L451.319277 115.426402c25.479764-51.675827 99.053862-51.675827 124.533626 0z"></path>
            </svg>
        `
    }
    html += `
        <p class="px-1 text-sm text-sec opacity-70 font-semibold">${review_count} reviews</p>
    `;

    $('.res_rating').append(html);
}

let getRate = () => {
    let url = '/res/getRate/';

    let data = new FormData();
    data.append('restaurant_id', restaurant_id);

    let getRate = {
        url: url,
        data: data,
        processData: false,
        contentType: false,
        button: null,
        div: null,
        onSuccess: (response) => {
            if(response) {
                let average_rating = response.average_rating;
                let review_count = response.review_count;
                generateRate(average_rating, review_count);
            }
        },
        onError: (response) => {
            console.log(response);
        }
    };

    PostAjax.initAjaxPost(getRate);
}

let postRate = (index) => {
    let rate = ++index;

    let data = new FormData();
    data.append('rating', rate);
    data.append('restaurant_id', restaurant_id);

    let url = '/res/postRate';

    let postRate = {

        url: url,
        data: data,
        processData: false,
        contentType: false,
        button: null,
        div: null,
        onSuccess: (response) => {
            if(response.success) {
                getRate();
                Toast.toast('success', response.message);
            }
        },
        onError: (response) => {
            Toast.toast('error', response.message);
        }
    };

    PostAjax.initAjaxPost(postRate);
}

let handleRating = () => {
    $('.rating .star').on('click', function(e) {
        e.preventDefault();

        var clickedIndex = $(this).index();
        var stars = $(this).parent().children('.star');
        postRate(clickedIndex);

        stars.each(function(index) {
            if (index <= clickedIndex) {
                $(this).addClass('fill-yellow-500').removeClass('fill-gray-500');
            } else {
                $(this).addClass('fill-gray-500').removeClass('fill-yellow-500');
            }
        });
    });
}

let getCategory = () => {
    $('.appetizers').on('click', function(e) {
        e.preventDefault();
        getMenu(1, 'appetizers');
        setupPaginationClickHandlers('appetizers');
        $('.menuSelecte').empty();
        $('.menuSelecte').append(`
            Appetizers
        `);
    });
    $('.sandwiches').on('click', function(e) {
        e.preventDefault();
        getMenu(1, 'sandwiches');
        setupPaginationClickHandlers('sandwiches');
        $('.menuSelecte').empty();
        $('.menuSelecte').append(`
            Sandwiches
        `);
    });
    $('.meals').on('click', function(e) {
        e.preventDefault();
        getMenu(1, 'meals');
        setupPaginationClickHandlers('meals');
        $('.menuSelecte').empty();
        $('.menuSelecte').append(`
            Meals
        `);
    });
    $('.pizzas').on('click', function(e) {
        e.preventDefault();
        getMenu(1, 'pizzas');
        setupPaginationClickHandlers('pizzas');
        $('.menuSelecte').empty();
        $('.menuSelecte').append(`
            Pizzas
        `);
    });
    $('.desserts').on('click', function(e) {
        e.preventDefault();
        getMenu(1, 'desserts');
        setupPaginationClickHandlers('desserts');
        $('.menuSelecte').empty();
        $('.menuSelecte').append(`
            Desserts
        `);
    });
    $('.drinks').on('click', function(e) {
        e.preventDefault();
        getMenu(1, 'drinks');
        setupPaginationClickHandlers('drinks');
        $('.menuSelecte').empty();
        $('.menuSelecte').append(`
            Drinks
        `);
    });
}

let generateMenu = (menus, pagination) => {
    $('.menu').empty();
    $('.pagination_controls').empty();

    let html = ``;

    $.each(menus, function (index, item) {
        html += `
        <div data-id="${item.id}" data-price="${item.price}" class="modalBtn px-3 w-3/4 md:w-1/2 lg:w-1/3 xl-1/4">
            <div class="block cursor-pointer py-4 px-3 mb-4 bg-sec rounded-md hover:ring-4 hover:ring-orange-400
            transition duration-300">
                <div class="flex justify-center sm:justify-between">
                    <div class="flex flex-col sm:flex-row gap-2">
                        <img class="w-32 h-24 object-cover rounded-lg" src="/uploads/menu_images/${item.image}" alt="${item.name}">
                        <div class="flex flex-col justify-between max-w-36 break-words">
                            <div class="flex justify-between items-center">
                                <h4 class="text-lg font-bold text-qua">${item.name}</h4>
                            </div>
                            <span class="text-gray-400">Price: <span class="font-bold text-ter">${item.price}$</span></span>
                            <p class="mt-2 text-gray-400 break-words">${item.description}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        `;
    });

    $('.menu').append(html);
    $('.pagination_controls').append(pagination);

    handleModal();
}

let getMenu = (page = 1, category) => {
    let url = `/menus/getMenu?page=${page}`;

    let data = new FormData();
    data.append('restaurant_id', restaurant_id);
    data.append('category', category);

    let getMenu = {
        url: url,
        data: data,
        processData: false,
        contentType: false,
        button: null,
        div: $('.loading-indicator'),
        onSuccess: (response) => {
            if(response.success) {
                let menus = response.data;
                let pagination = response.pagination;

                if(menus.length) {
                    generateMenu(menus, pagination);
                } else {
                    $('.menu').empty();
                    $('.pagination_controls').empty();
                    $('.menu').append(`
                        <div class="w-full flex items-center justify-center py-4">
                            <div class="bg-sec px-3 py-2 text-qua rounded">No Result</div>
                        </div>
                    `);
                }
            } else {
                $('.menu').empty();
                $('.pagination_controls').empty();
                $('.menu').append(`
                    <div class="w-full flex items-center justify-center py-4">
                        <div class="bg-sec px-3 py-2 text-qua rounded">No Result</div>
                    </div>
                `);
            }
        },
        onError: (response) => {
            console.log(response);
        }
    };

    PostAjax.initAjaxPost(getMenu);
}

let setupPaginationClickHandlers = (category) => {
    $('.pagination_controls').off('click', 'a');
    $('.pagination_controls').on('click', 'a', function (e) {
        e.preventDefault();
        let url = new URL($(this).attr('href'));
        let page = url.searchParams.get('page');
        getMenu(page, category);
    });
}

let addToCart = (restaurant_id, menu_id, price) => {
    const addToCartForm = $('.addToCartForm');

    addToCartForm.off('submit').on('submit', function(e) {
        e.preventDefault();

        let url = '/restaurants/menus/addToCart'

        let data = new FormData(addToCartForm[0]);
        data.append('restaurant_id', restaurant_id);
        data.append('menu_id', menu_id);
        data.append('price', price);

        console.log(restaurant_id);

        let btn = addToCartForm.find('[type=submit]');

        let addToCart = {
            url: url,
            data: data,
            processData: false,
            contentType: false,
            button: btn,
            div: null,
            onSuccess: (response) => {
                if(response.success) {
                    addToCartForm[0].reset();
                    Toast.toast('success', response.message);
                    $('.modal').addClass('hidden');
                    if (btn) {
                        if (btn.length > 0) {
                            btn.prop('disabled', false);
                        }
                    }
                }
            },
            onError: (response) => {
                console.log(response);
                Toast.toast('error', response.message);
            }
        };

        PostAjax.initAjaxPost(addToCart);
    })
}

let handleModal = () => {
    $('.modalBtn').on('click', function (e) {
        e.preventDefault();
        $('.modal').removeClass('hidden');
        let menu_id = $(this).data('id');
        let price = $(this).data('price');

        addToCart(restaurant_id, menu_id, price);
    });

    $('.close').on('click', function () {
        $('.modal').addClass('hidden');
    });
}

let generateOrders = (orders, pagination) => {
    $('.tbody').empty();
    $('.pagination_controls_orders').empty();

    let html = ``;
    let statusHtml = ``;

    $.each(orders, function (index, item) {
        let formattedDate = moment(item.created_at).format('DD/MM/YYYY');

        if (item.status == 'pending') {
            statusHtml = `
                    <div class="flex flex-row-reverse my-1">
                <p class="w-28 py-1 text-center bg-gray-500 rounded-lg text-qua">
                     ${item.status }
                </p>
            </div>
            `;
        } else if (item.status == 'canceled') {
            statusHtml = `
                <div class="flex flex-row-reverse my-1">
                <p class="w-28 text-center py-1 bg-red-500 text-qua rounded-lg">
                    ${item.status }
                </p>
            </div>
            `;
        } else if (item.status == 'accepted') {
            statusHtml = `
                        <div class="flex flex-row-reverse my-1">
                <p class="w-28 py-1 text-center bg-blue-500 text-qua rounded-lg">
                    ${item.status}
                </p>
            </div>
            `;
        } else if (item.status == 'completed') {
            statusHtml = `
                        <div class="flex flex-row-reverse my-1">
                <p class="w-28 py-1 text-center bg-green-500 text-qua rounded-lg">
                    ${item.status}</p>
            </div>
            `;
        }

        html += `
                            <tr class="bg-white">
                                <td class="align-middle px-2 name text-sm">${item.user.email}</td>
                                <td class="align-middle email text-sm">
                                    ${statusHtml}
                                </td>
                                <td class="align-middle text-sm text-end">${item.total_price}$</td>
                                <td class="align-middle white-space-nowrap text-end px-1">
                                ${formattedDate}
                                </td>
                            </tr>
        `;
    });

    $('.tbody').append(html);
    $('.pagination_controls_orders').append(pagination);
}

let getOrders = (page = 1) => {
    let url = `/restaurants/orders/getOrders?page=${page}`;

    let data = new FormData();
    data.append('restaurant_id', restaurant_id);

    let getOrders = {
        url: url,
        data: data,
        processData: false,
        contentType: false,
        button: null,
        div: $('.loading-indicator_orders'),
        onSuccess: (response) => {
            if(response.success) {
                let orders = response.data;
                let pagination = response.pagination;

                if(orders.length) {
                    generateOrders(orders, pagination);
                } else {
                    $('.tbody').empty();
                    $('.pagination_controls_orders').empty();
                    $('.tbody').append(`
                                                <tr class="bg-white">
                                <td class="align-middle px-2 text-sm text-center">
                                </td>
                                <td class="align-middle text-sm text-center">
                                    <p class="bg-sec px-3 py-1 text-qua rounded-md my-3">
                                        No orders
                                    </p>
                                </td>
                                <td class="align-middle px-2 text-sm text-start">
                                </td>
                                <td class="align-middle px-2 text-sm text-center">
                                </td>
                            </tr>
                    `);
                }
            } else {
                $('.tbody').empty();
                $('.pagination_controls_orders').empty();
                $('.tbody').append(`
                                                <tr class="bg-white">
                                <td class="align-middle px-2 text-sm text-center">
                                </td>
                                <td class="align-middle text-sm text-center">
                                    <p class="bg-sec px-3 py-1 text-qua rounded-md my-3">
                                        No orders
                                    </p>
                                </td>
                                <td class="align-middle px-2 text-sm text-start">
                                </td>
                                <td class="align-middle px-2 text-sm text-center">
                                </td>
                            </tr>
                `);
            }
        },
        onError: (response) => {
            console.log(response);
        }
    };

    PostAjax.initAjaxPost(getOrders);
}

let setupPaginationClickHandlersOrders = () => {
    $('.pagination_controls_orders').off('click', 'a');
    $('.pagination_controls_orders').on('click', 'a', function (e) {
        e.preventDefault();
        let url = new URL($(this).attr('href'));
        let page = url.searchParams.get('page');
        getOrders(page);
    });
}

$(document).ready(function() {
    getRate();
    handleRating();
    getMenu(1, 'appetizers');
    getCategory();
    setupPaginationClickHandlers();
    handleModal();
    HandleTab.handleTab();
    getOrders();
    setupPaginationClickHandlersOrders();
});
