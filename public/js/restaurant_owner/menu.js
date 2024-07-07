import { HandleTab } from "../profile/handleTab.js";
import { PostAjax } from '../ajax/post.js';
import { Toast } from "../toast/toast.js";

const restaurant_id = $('#restaurant_id').val();
const createMenuForm = $('#createMenuForm');

let generateMenu = (menus, pagination) => {
    $('.menu').empty();
    $('.pagination_controls').empty();

    let html = ``;

    $.each(menus, function (index, item) {
        html = `
                    <div class="w-full lg:w-1/2 xl:w-1/3 px-2">
                        <div class="block py-4 px-2 mb-4 bg-sec rounded-md hover:ring-4 hover:ring-orange-400 transition duration-300">
                            <div class="hidden sm:flex justify-between">
                                <div class="flex justify-center sm:justify-between">
                                    <div class="flex flex-col sm:flex-row gap-2">
                                        <img class="w-32 h-24 object-cover rounded-lg"
                                            src="/uploads/menu_images/${item.image}" alt="${item.name}">
                                        <div class="flex flex-col justify-between max-w-36 break-words">
                                            <div class="flex justify-between items-center">
                                                <h4 class="text-lg font-bold text-qua">${item.name}</h4>
                                            </div>
                                            <span class="text-gray-400">Price: <span
                                                    class="font-bold text-ter">${item.price}$</span></span>
                                            <p class="mt-2 text-gray-400 break-words">${item.description}</p>
                                        </div>
                                    </div>
                                </div>
                                <div @click.away="open = false" class="relative" x-data="{ open: false }">
                                    <button @click="open = !open"
                                        class="w-full rounded-lg hover:ring-1 hover:ring-gray-300 px-3 py-1 text-sm text-right text-qua">
                                        <span class="fas fa-ellipsis-v"></span>
                                    </button>
                                    <div x-show="open" x-transition:enter="transition ease-out duration-100"
                                        x-transition:enter-start="transform opacity-0 scale-95"
                                        x-transition:enter-end="transform opacity-100 scale-100"
                                        x-transition:leave="transition ease-in duration-75"
                                        x-transition:leave-start="transform opacity-100 scale-100"
                                        x-transition:leave-end="transform opacity-0 scale-95"
                                        class="absolute right-0 w-full mt-2 origin-top-right rounded-md shadow-lg w-32 md:w-48">
                                        <div class="px-1 py-1 bg-pr rounded-md shadow">
                                            <div data-id=${item.id}
                                                class="deleteBtn cursor-pointer px-4 py-2 text-sm font-semibold rounded-lg hover:bg-red-600 text-qua hover:text-white">
                                                Delete
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="w-full flex sm:hidden flex-col justify-center gap-3">
                                <div @click.away="open = false" class="relative" x-data="{ open: false }">
                                    <button @click="open = !open"
                                        class="w-fit rounded-lg hover:ring-1 hover:ring-gray-300 px-3 py-1 text-sm text-end text-qua">
                                        <span class="fas fa-ellipsis-v"></span>
                                    </button>
                                    <div x-show="open" x-transition:enter="transition ease-out duration-100"
                                        x-transition:enter-start="transform opacity-0 scale-95"
                                        x-transition:enter-end="transform opacity-100 scale-100"
                                        x-transition:leave="transition ease-in duration-75"
                                        x-transition:leave-start="transform opacity-100 scale-100"
                                        x-transition:leave-end="transform opacity-0 scale-95"
                                        class="absolute left-0 w-full mt-2 origin-top-right rounded-md shadow-lg w-32 md:w-48">
                                        <div class="px-1 py-1 bg-pr rounded-md shadow">
                                            <div data-id=${item.id}
                                                class="deleteBtn cursor-pointer px-4 py-2 text-sm font-semibold rounded-lg hover:bg-red-600 text-qua hover:text-white">
                                                Delete
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="w-full flex sm:hidden flex-col justify-center items-center gap-2">
                                    <img class="w-32 h-24 object-cover rounded-lg"
                                        src="/uploads/menu_images/${item.image}" alt="${item.name}">
                                    <div class="flex flex-col justify-between max-w-36 break-words">
                                        <div class="flex justify-between items-center">
                                            <h4 class="text-lg font-bold text-qua">${item.name}</h4>
                                        </div>
                                        <span class="text-gray-400">Price: <span
                                                class="font-bold text-ter">${item.price}$</span></span>
                                        <p class="mt-2 text-gray-400 break-words">${item.description}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
        `;
        $('.menu').append(html);
    });

    handleModal();

    $('.pagination_controls').append(pagination);
    setupPaginationClickHandlers();
}

let generateDeletModal = (id) => {
    $('.modal').removeClass('hidden');

    $('.confDeleteBtn').on('click', function (e) {
        e.preventDefault();

        let data = new FormData();
        data.append('id', id);

        let url = '/res_owner/menus/deleteMenu';

        let deleteMenu = {
            url: url,
            data: data,
            processData: false,
            contentType: false,
            button: null,
            onSuccess: (response) => {
                if (response.success) {
                    getMenu(1, '', '');
                    Toast.toast('success', response.message);
                    $('.modal').addClass('hidden');
                } else {
                    Toast.toast('error', 'error');
                }
            },
            onError: (response) => {
                if (response) {
                    Toast.toast('error', 'cant deleted');
                }
            }
        };
        PostAjax.initAjaxPost(deleteMenu);
    })
}

let handleModal = () => {
    $('.deleteBtn').on('click', function () {
        let id = $(this).data('id');
        console.log('clicked');
        generateDeletModal(id);
    });

    $('.close').on('click', function () {
        $('.modal').addClass('hidden');
    });
}

let getMenu = (page = 1, category, search) => {
    let url = `/res_owner/menus/getMenu?page=${page}`;

    let data = new FormData();
    data.append('restaurant_id', restaurant_id);
    data.append('category', category);
    data.append('search', search);

    let getMenu = {

        url: url,
        data: data,
        processData: false,
        contentType: false,
        button: null,
        div: $('.loading-indicator'),
        onSuccess: (response) => {
            if (response) {
                let menus = response.data;
                let pagination = response.pagination;
                if (menus.length) {
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
            }
        },
        onError: (response) => {
            console.log(response);
        }
    };

    PostAjax.initAjaxPost(getMenu);
}

let getCategory = () => {
    $('#category').on('change', function (e) {
        e.preventDefault();
        let category = $('#category').val();
        let search = $('#search').val();
        getMenu(1, category, search);
    });
    $('#search').on('keyup', function (e) {
        e.preventDefault();
        let category = $('#category').val();
        let search = $('#search').val();
        getMenu(1, category, search);
    });
}

let setupPaginationClickHandlers = () => {
    $('.pagination_controls').off('click', 'a');
    $('.pagination_controls').on('click', 'a', function (e) {
        e.preventDefault();
        let url = new URL($(this).attr('href'));
        let page = url.searchParams.get('page');
        getMenu(page, '', '');
    });
}

let createMenu = () => {
    createMenuForm.on('submit', function (e) {
        e.preventDefault();

        let url = '/res_owner/menus/createMenu';

        let data = new FormData(createMenuForm[0]);
        data.append('restaurant_id', restaurant_id)
        let btn = createMenuForm.find('[type=submit]');

        let createMenu = {

            url: url,
            data: data,
            processData: false,
            contentType: false,
            button: btn,
            div: null,
            onSuccess: (response) => {
                if (response) {
                    createMenuForm[0].reset();
                    Toast.toast('success', response.message);
                    getMenu(1, '', '');
                    if (btn.length > 0) {
                        btn.prop('disabled', false);
                    }
                }
            },
            onError: (response) => {
                $(".error_p").empty();
                let errors = response.responseJSON.errors;
                $.each(errors, function (key, value) {
                    let errorP = $(".error_" + key);
                    errorP.html(value[0]);
                });
            }
        };

        PostAjax.initAjaxPost(createMenu);
    })
}

$(document).ready(function () {
    getMenu(1, '', '');
    getCategory();
    createMenu();
    HandleTab.handleTab();
    handleModal();
});
