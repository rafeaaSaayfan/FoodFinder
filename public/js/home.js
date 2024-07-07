import { PostAjax } from "./ajax/post.js";

function generateStars(avg) {
    let starsHtml = '';
    for (let i = 1; i <= 5; i++) {
        starsHtml += `
        <svg class="star h-5 transition-all duration-100 ${i <= avg ? 'fill-yellow-500' : 'fill-gray-500'}"
            viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
            <path d="M575.852903 115.426402L661.092435 288.054362c10.130509 20.465674 29.675227 34.689317 52.289797 37.963825l190.433097 27.62866c56.996902 8.288598 79.7138 78.281203 38.475467 118.496253l-137.836314 134.35715c-16.372539 15.963226-23.84251 38.987109-19.954032 61.49935l32.540421 189.716799c9.721195 56.792245-49.833916 100.077146-100.793444 73.267113L545.870691 841.446188a69.491196 69.491196 0 0 0-64.67153 0l-170.376737 89.537324c-50.959528 26.810033-110.51464-16.474868-100.793444-73.267113L242.569401 667.9996c3.888478-22.512241-3.581493-45.536125-19.954032-61.49935L84.779055 472.245428c-41.238333-40.215049-18.521435-110.207655 38.475467-118.496252l190.433097-27.62866c22.61457-3.274508 42.159288-17.498151 52.289797-37.963826L451.319277 115.426402c25.479764-51.675827 99.053862-51.675827 124.533626 0z">
            </path>
        </svg>
        `;
    }
    return starsHtml;
}

let generateRestaurants = (restaurants, pagination) => {
    $('.showRestaurants').empty();
    $('.pagination_controls').empty();

    function getCsrfToken() {
        return $('meta[name="csrf-token"]').attr('content');
    }

    $.each(restaurants, function(index, restaurant) {
        let imagesHtml = '';
        $.each(restaurant.restaurant_images, function(i, image) {
            imagesHtml += `<img class="w-full h-48 object-cover" src="/uploads/restaurant_images/${image.profile_image}" alt="Restaurant Image">`;
        });

        let restaurantHtml = `
            <div class="team-item col-12 col-md-6 col-xl-4 pt-5">
                <div class="bg-sec rounded-lg shadow-md overflow-hidden">
                    ${imagesHtml}
                    <div class="p-4">
                        <h2 class="text-xl text-qua font-semibold mb-1">${restaurant.restaurant_name}</h2>
                        <div class='rating flex flex-row gap-1'>
                            ${generateStars(restaurant.restaurant_reviews_avg_rating)}
                        </div>
                        <p class="text-qua opacity-80 mt-1">${restaurant.description}</p>
                        <div class="flex items-center gap-1 mt-1">
                            <p class="text-qua opacity-80">Orders:</p>
                            <p class="text-qua font-semibold">${restaurant.total_orders}</p>
                        </div>
                        <form id="visitForm" action="/restaurants/${restaurant.restaurant_name}" method="POST">
                            <input type="hidden" name="_token" value="${getCsrfToken()}">
                            <input type="hidden" name="_method" value="POST">
                            <input type="hidden" name="restaurant_id" id="restaurant_id" value="${restaurant.id}">
                            <button type="submit" class="mt-3 px-5 py-2 text-qua bg-ter rounded-lg">Visit</button>
                        </form>
                    </div>
                </div>
            </div>
        `;
        $('.showRestaurants').append(restaurantHtml);
    });

    $('.pagination_controls').append(pagination);
    setupPaginationClickHandlers();
}

let getRestaurants = (page = 1, search = '', bestRate = false, bestSale = false) => {
    let url = `/home/getRestaurants?page=${page}&search=${search}&bestRate=${bestRate}&bestSale=${bestSale}`;

    let getRestaurants = {
        url: url,
        data: null,
        div: $('.loading-indicator'),
        processData: false,
        contentType: false,
        onSuccess: (response) => {
            if(response) {
                let restaurants = response.data;
                let pagination = response.pagination;
                generateRestaurants(restaurants, pagination);
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
    $('.pagination_controls').on('click', 'a', function(e) {
        e.preventDefault();
        let url = new URL($(this).attr('href'));
        let page = url.searchParams.get('page');
        getRestaurants(page, '', false, false);
    });
}

let setupSearchHandlers = () => {
    $('#search').on('input', function() {
        let search = $(this).val();
        let bestRate = $('#rateSearch').is(':checked');
        let bestSale = $('#saleSearch').is(':checked');
        getRestaurants(1, search, bestRate, bestSale);
    });

    $('#rateSearch, #saleSearch').on('change', function() {
        if ($(this).is(':checked')) {
            $('#rateSearch, #saleSearch').not(this).prop('checked', false);
        }
        let search = $('#search').val();
        let bestRate = $('#rateSearch').is(':checked');
        let bestSale = $('#saleSearch').is(':checked');
        getRestaurants(1, search, bestRate, bestSale);
    });
}

$(document).ready(function() {
    getRestaurants();
    setupSearchHandlers();

    // $(".nav-toggler").each(function(_, navToggler) {
    //     var target = $(navToggler).data("target");
    //     $(navToggler).on("click", function() {
    //       $(target).animate({
    //         height: "toggle"
    //        });
    //     });
    // });
});
