import { PostAjax } from "../ajax/post.js";
import { HandleTab } from "./handleTab.js";
import { Toast } from "../toast/toast.js";

const updateProfileForm = $('#updateProfileForm');

let updateProfile = () => {
    updateProfileForm.on('submit', function(e) {
        e.preventDefault();

        let data = new FormData(updateProfileForm[0]);

        let url = '/updateProfile';
        let btn = updateProfileForm.find('button[type="submit"]');

        let updateProfile = {
            url: url,
            data: data,
            processData: false,
            contentType: false,
            button: btn,
            div: null,
            onSuccess: (response) => {
                if(response) {
                    Toast.toast('success', response.message)
                    getProfile();
                    $(".error_p").empty();
                }
                if (btn) {
                    if (btn.length > 0) {
                        btn.prop('disabled', false);
                    }
                }
            },
            onError: (response) => {
                $(".error_p").empty();
                let errors = response.responseJSON.errors;
                $.each(errors, function(key, value) {
                    let errorP = $(".error_" + key);
                    errorP.html(value[0]);
                });
            }
        };

        PostAjax.initAjaxPost(updateProfile);
    })
}

let getProfile = () => {
    let url = '/profile/getProfile';

    let getProfile = {
        url: url,
        data: null,
        processData: false,
        contentType: false,
        div: null,
        onSuccess: (response) => {
            let data = response.user;

            data.username ? $('.username').text(data.username) : $('.username').text('Anonymos');
            $('.profile_img').attr('src', data.profile_img ? 'uploads/profile_images/' + data.profile_img : 'images/default_image/profile_img.jpg');
            data.email ? $('#email').text(data.email) : $('#email').text('@gmail.com');
            data.email ? $('#email').attr('href', 'mailto:' + data.email) : $('#email').attr('href', '#');
            data.phone_number ? $('.phone_number').text(data.phone_number) : $('.phone_number').text('+961');
            data.phone_number ? $('.phone_number').attr('href', 'tel:' + data.email) : $('.phone_number').attr('href', '#');
            data.address ? $('#location_address').attr('href', data.address) : $('#location_address').attr('href', '#');

            data.first_name ? $('[name="first_name"]').val(data.first_name) : null;
            data.last_name ? $('[name="last_name"]').val(data.last_name) : null;
            data.username ? $('[name="username"]').val(data.username) : null;
            data.email ? $('[name="email"]').val(data.email) : null;
            data.phone_number ? $('[name="phone_number"]').val(data.phone_number) : null;
            data.address ? $('[name="address"]').val(data.address) : null;
        },
        onError: (response) => {
            console.log(response);
        }
    };

    PostAjax.initAjaxGet(getProfile);
}

let selectOnclick = () => {
    $('.tab1').on('click', function() {
        $('.tabSelect').empty();
        $('.tabSelect').append('Orders');
    });
    $('.tab4').on('click', function() {
        $('.tabSelect').empty();
        $('.tabSelect').append('Personal info');
    });
}

let changePass = () => {
    const changePassForm = $('.changePassForm');

    changePassForm.on('submit', function(e) {
        e.preventDefault();

        let data = new FormData(changePassForm[0]);

        let url = '/security/changePassword';
        let btn = changePassForm.find('button[type="submit"]');

        let changePass = {
            url: url,
            data: data,
            processData: false,
            contentType: false,
            button: btn,
            div: null,
            onSuccess: (response) => {
                if(response.success) {
                    Toast.toast('success', response.message)
                    $(".error_pass").empty();
                    $('.modal').addClass('hidden');
                    changePassForm[0].reset();
                } else {
                    Toast.toast('error', response.message)
                }
                if (btn) {
                    if (btn.length > 0) {
                        btn.prop('disabled', false);
                    }
                }
            },
            onError: (response) => {
                console.log(response);

                $(".error_pass").empty();
                let errors = response.responseJSON.errors;
                $.each(errors, function(key, value) {
                    let errorP = $(".error_" + key);
                    errorP.html(value[0]);
                });
            }
        };

        PostAjax.initAjaxPost(changePass);
    });
}

let handleModal = () => {
    $('.resetPassBtn').on('click', function() {
        $('.modal').removeClass('hidden');
        changePass();
    });
    $('.close').on('click', function() {
        $('.modal').addClass('hidden');
    });
}

let generateOrders = (orders, pagination) => {
    $('.tbody').empty();
    $('.pagination_controls').empty();

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
                                <td class="align-middle px-2 name text-sm">${item.restaurant.restaurant_name}</td>
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
    $('.pagination_controls').append(pagination);
}

let getOrders = (page = 1) => {
    let url = `/profile/getOrders?page=${page}`;

    let getOrders = {
        url: url,
        data: null,
        processData: false,
        contentType: false,
        button: null,
        div: $('.loading-indicator'),
        onSuccess: (response) => {
            if(response.success) {
                let orders = response.data;
                let pagination = response.pagination;

                if(orders.length) {
                    generateOrders(orders, pagination);
                } else {
                    $('.tbody').empty();
                    $('.pagination_controls').empty();
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
                $('.pagination_controls').empty();
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

let setupPaginationClickHandlers = () => {
    $('.pagination_controls').off('click', 'a');
    $('.pagination_controls').on('click', 'a', function (e) {
        e.preventDefault();
        let url = new URL($(this).attr('href'));
        let page = url.searchParams.get('page');
        getOrders(page);
    });
}

$(document).ready(function() {
    getProfile();
    getOrders();
    updateProfile();
    setupPaginationClickHandlers();
    HandleTab.handleTab();
    selectOnclick();
    handleModal();
});
