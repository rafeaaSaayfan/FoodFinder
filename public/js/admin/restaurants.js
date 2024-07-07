import { PostAjax } from "../ajax/post.js";
import { Toast } from "../toast/toast.js";

let generateRestaurants = (restaurants, pagination) => {
    $('.empty_data').empty();
    $('.tbody').empty();
    $('.pagination_controls').empty();

    function getCsrfToken() {
        return $('meta[name="csrf-token"]').attr('content');
    }

    $.each(restaurants, function (index, restaurant) {

        let profileUrl = '/dashboard/restaurants/profile/' + restaurant.id;

        let stars = ``;
        for(let i = 1; i <= 5; i++) {
            stars += `
                <svg class="h-5 transition-all duration-100
                    ${ i <= restaurant.restaurant_reviews_avg_rating ? 'fill-yellow-500' : 'fill-gray-500' }"
                    viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg"
                    xmlns:xlink="http://www.w3.org/1999/xlink">
                    <path d="M575.852903 115.426402L661.092435 288.054362c10.130509 20.465674 29.675227 34.689317 52.289797 37.963825l190.433097 27.62866c56.996902 8.288598 79.7138 78.281203 38.475467 118.496253l-137.836314 134.35715c-16.372539 15.963226-23.84251 38.987109-19.954032 61.49935l32.540421 189.716799c9.721195 56.792245-49.833916 100.077146-100.793444 73.267113L545.870691 841.446188a69.491196 69.491196 0 0 0-64.67153 0l-170.376737 89.537324c-50.959528 26.810033-110.51464-16.474868-100.793444-73.267113L242.569401 667.9996c3.888478-22.512241-3.581493-45.536125-19.954032-61.49935L84.779055 472.245428c-41.238333-40.215049-18.521435-110.207655 38.475467-118.496252l190.433097-27.62866c22.61457-3.274508 42.159288-17.498151 52.289797-37.963826L451.319277 115.426402c25.479764-51.675827 99.053862-51.675827 124.533626 0z"></path>
                </svg>
            `
        }

        let restaurantHtml = `
            <tr class="bg-white">
                <td class="align-middle px-2 name text-sm">${restaurant.restaurant_name}</td>
                <td class="align-middle email text-sm">${restaurant.restaurant_email}</td>
                <td class="align-middle text-sm">${restaurant.total_orders}</td>
                <td class="align-middle text-sm">
                    <div class="flex gap-1 items-center">
                        ${stars}
                    </div>
                </td>
                <td class="align-middle white-space-nowrap text-end px-1">
                <div class="btn-reveal-trigger position-static">
                    <button class="border rounded-lg hover:bg-gray-200 p-1 mx-1" type="button" data-bs-toggle="dropdown">
                        <svg class="fill-black" width="18" enable-background="new 0 0 32 32" id="Glyph" version="1.1" viewBox="0 0 32 32" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                        <path d="M16,13c-1.654,0-3,1.346-3,3s1.346,3,3,3s3-1.346,3-3S17.654,13,16,13z" id="XMLID_287_"/>
                        <path d="M6,13c-1.654,0-3,1.346-3,3s1.346,3,3,3s3-1.346,3-3S7.654,13,6,13z" id="XMLID_289_"/>
                        <path d="M26,13c-1.654,0-3,1.346-3,3s1.346,3,3,3s3-1.346,3-3S27.654,13,26,13z" id="XMLID_291_"/>
                        </svg>
                    </button>
                    <div class="dropdown-menu dropdown-menu-end py-2" style="">
                        <form id="visitForm" action="/restaurants/${restaurant.restaurant_name}" method="POST">
                            <input type="hidden" name="_token" value="${getCsrfToken()}">
                            <input type="hidden" name="_method" value="POST">
                            <input type="hidden" name="restaurant_id" id="restaurant_id" value="${restaurant.id}">
                            <button type="submit" class="dropdown-item text-sec">View Profile</button>
                        </form>
                        <div class="dropdown-divider"></div>
                            <a class="dropdown-item text-danger delete_account cursor-pointer" data-id="${restaurant.id}">Delete restaurant</a>
                        </div>
                    </div>
                </td>
            </tr>
        `;
        $('.tbody').append(restaurantHtml);
    });

    $('.pagination_controls').append(pagination);
    setupPaginationClickHandlers();
    deleteRestaurant();
}

let getRestaurants = (page = 1, search = '', bestRate = false, bestSale = false) => {
    let url = `/dashboard/restaurants/getRestaurants?page=${page}&search=${search}&bestRate=${bestRate}&bestSale=${bestSale}`;

    let getRestaurants = {
        url: url,
        data: null,
        div: $('.loading-indicator'),
        processData: false,
        contentType: false,
        onSuccess: (response) => {
            if (response) {
                let restaurants = response.data;
                let pagination = response.pagination;

                if(restaurants.length > 0) {
                    generateRestaurants(restaurants, pagination);
                } else {
                    $('.tbody').empty();
                    $('.pagination_controls').empty();
                    $('.empty_data').empty();
                    $('.empty_data').append(`
                        <div class="shadow-md bg-white px-5 py-2 text-sec">No restaurant</div>
                    `);
                }
            }
        },
        onError: (response) => {
            console.log(response);
        }
    };

    PostAjax.initAjaxGet(getRestaurants);
}

let setupPaginationClickHandlers = () => {
    $('.pagination_controls').off('click', 'a');
    $('.pagination_controls').on('click', 'a', function (e) {
        e.preventDefault();
        let url = new URL($(this).attr('href'));
        let page = url.searchParams.get('page');
        getRestaurants(page, '', false, false);
    });
}

let setupSearchHandlers = () => {
    $('#search').on('input', function () {
        let search = $(this).val();
        let bestRate = $('#bestRate').is(':checked');
        let bestSale = $('#bestSale').is(':checked');
        getRestaurants(1, search, bestRate, bestSale);
    });

    $('#bestRate, #bestSale').on('change', function () {
        if ($(this).is(':checked')) {
            $('#bestRate, #bestSale').not(this).prop('checked', false);
        }
        let search = $('#search').val();
        let bestRate = $('#bestRate').is(':checked');
        let bestSale = $('#bestSale').is(':checked');
        getRestaurants(1, search, bestRate, bestSale);
    });
}


let deleteRestaurant = () => {

    $('.delete_account').on('click', function (e) {
        e.preventDefault();
        let id = $(this).data('id');

        if (confirm('Are you sure you want to delete this restaurant?')) {
            let data = new FormData();
            data.append('id', id);

            let url = '/dashboard/restaurants/deleteRestaurant';

            let deleteRestaurant = {
                url: url,
                data: data,
                processData: false,
                contentType: false,
                button: null,
                onSuccess: (response) => {
                    if(response.success) {
                        let search = $('#search').val();
                        let bestRate = $('#bestRate').is(':checked');
                        let bestSale = $('#bestSale').is(':checked');
                        getRestaurants(1, search, bestRate, bestSale);

                        Toast.toast('success', response.message);
                    } else {
                        Toast.toast('error', response.message);
                    }
                },
                onError: (response) => {
                    if(response) {
                        const Toast = Swal.mixin({
                            toast: true,
                            position: "top-end",
                            showConfirmButton: false,
                            color: "#fff",
                            background: "red",
                            timer: 3000,
                            timerProgressBar: true,
                            didOpen: (toast) => {
                                toast.onmouseenter = Swal.stopTimer;
                                toast.onmouseleave = Swal.resumeTimer;
                            }
                        });
                        Toast.fire({
                            icon: "error",
                            title: 'Error',
                        });
                    }
                },
            };
            PostAjax.initAjaxPost(deleteRestaurant);
        }
    });
}

$(document).ready(function () {
    getRestaurants();
    setupSearchHandlers();
    deleteRestaurant();
});
