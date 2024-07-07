import { HandleTab } from "../profile/handleTab.js";
import { PostAjax } from '../ajax/post.js';

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
    let url = `/res_owner/profile/getOrders?page=${page}`;

    let getOrders = {
        url: url,
        data: null,
        processData: false,
        contentType: false,
        button: null,
        div: $('.loading-indicator_orders'),
        onSuccess: (response) => {
            if(response.success) {
                console.log(response);
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

$(document).ready(function () {
    getOrders();
    setupPaginationClickHandlersOrders();
    HandleTab.handleTab();
});
