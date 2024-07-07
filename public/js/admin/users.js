import { PostAjax } from "../ajax/post.js";
import { Toast } from "../toast/toast.js";

const user_id = $('#user_id').val();

let generateUsers = (users, pagination) => {
    $('.empty_data').empty();
    $('.tbody').empty();
    $('.pagination_controls').empty();

    $.each(users, function (index, user) {
        let adminAction = user.role === 'admin' ? 'Dismiss to customer' : 'Make admin';
        let action = '';
        if(user.role != 'restaurant_owner') {
            action = `
                <a class="dropdown-item admin_action cursor-pointer" data-user-id="${user.id}">${adminAction}</a>
            `
        }

        let profileUrl = user.id == user_id ? '/profile' : '/dashboard/users/profile/' + user.id;

        let userHtml = `
            <tr class="bg-white">
                <td class="align-middle px-2 name text-sm">${user.username}</td>
                <td class="align-middle email text-sm">${user.email}</td>
                <td class="align-middle text-sm">${user.role}</td>
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
                        <a class="dropdown-item cursor-pointer" href="${profileUrl}">View Profile</a>
                        ${action}
                        <div class="dropdown-divider"></div>
                            <a class="dropdown-item text-danger delete_account cursor-pointer" data-user-id="${user.id}">Delete account</a>
                    </div>
                </div>
                </td>
            </tr>
        `;
        $('.tbody').append(userHtml);
    });

    $('.pagination_controls').append(pagination);
    setupPaginationClickHandlers();
    setupActionHandlers();
}

let getUsers = (page = 1, search = '', customer = false, restaurant = false, admin = false) => {
    let url = `/dashboard/users/getUsers?page=${page}&search=${search}&customer=${customer}&restaurant=${restaurant}&admin=${admin}`;

    let getUsers = {
        url: url,
        data: null,
        div: $('.loading-indicator'),
        processData: false,
        contentType: false,
        onSuccess: (response) => {
            if (response) {
                let users = response.data;
                let pagination = response.pagination;
                if(users.length > 0) {
                    generateUsers(users, pagination);
                } else {
                    $('.tbody').empty();
                    $('.pagination_controls').empty();
                    $('.empty_data').empty();
                    $('.empty_data').append(`
                        <div class="shadow-md bg-white px-5 py-2 text-sec">No Users</div>
                    `);
                }
            }
        },
        onError: (response) => {
            console.log(response);
        }
    };

    PostAjax.initAjaxGet(getUsers);
}

let setupPaginationClickHandlers = () => {
    $('.pagination_controls').off('click', 'a');
    $('.pagination_controls').on('click', 'a', function (e) {
        e.preventDefault();
        let url = new URL($(this).attr('href'));
        let page = url.searchParams.get('page');
        getUsers(page, '', false, false, false);
    });
}

let setupSearchHandlers = () => {
    $('#search').on('input', function () {
        let search = $(this).val();
        let customerSearch = $('#customerSearch').is(':checked');
        let restauarntSearch = $('#restauarntSearch').is(':checked');
        let adminSearch = $('#adminSearch').is(':checked');
        getUsers(1, search, customerSearch, restauarntSearch, adminSearch);
    });

    $('#customerSearch, #restauarntSearch, #adminSearch').on('change', function () {
        if ($(this).is(':checked')) {
            $('#customerSearch, #restauarntSearch, #adminSearch').not(this).prop('checked', false);
        }
        let search = $('#search').val();
        let customerSearch = $('#customerSearch').is(':checked');
        let restauarntSearch = $('#restauarntSearch').is(':checked');
        let adminSearch = $('#adminSearch').is(':checked');
        getUsers(1, search, customerSearch, restauarntSearch, adminSearch);
    });
}

let setupActionHandlers = () => {
    $('.admin_action').on('click', function (e) {
        e.preventDefault();
        let userId = $(this).data('user-id');
        let action = $(this).text().trim();

        let data = new FormData();
        data.append('id', userId);
        data.append('role', action);

        let url = '/dashboard/users/changeRole';

        let changeRole = {
            url: url,
            data: data,
            processData: false,
            contentType: false,
            button: null,
            onSuccess: (response) => {
                if(response.success) {
                    let search = $('#search').val();
                    let customerSearch = $('#customerSearch').is(':checked');
                    let restauarntSearch = $('#restauarntSearch').is(':checked');
                    let adminSearch = $('#adminSearch').is(':checked');
                    getUsers(1, search, customerSearch, restauarntSearch, adminSearch);
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
                        icon: "ERROR",
                        title: response.message,
                    });
                }
            }
        };
        PostAjax.initAjaxPost(changeRole);
    });

    $('.delete_account').on('click', function (e) {
        e.preventDefault();
        let userId = $(this).data('user-id');

        if (confirm('Are you sure you want to delete this account?')) {
            let data = new FormData();
            data.append('id', userId);

            let url = '/dashboard/users/deletUser';

            let deleteAccount = {
                url: url,
                data: data,
                processData: false,
                contentType: false,
                button: null,
                onSuccess: (response) => {
                    if(response.success) {
                        let search = $('#search').val();
                        let customerSearch = $('#customerSearch').is(':checked');
                        let restauarntSearch = $('#restauarntSearch').is(':checked');
                        let adminSearch = $('#adminSearch').is(':checked');
                        getUsers(1, search, customerSearch, restauarntSearch, adminSearch);
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
                            icon: "ERROR",
                            title: response.message,
                        });
                    }
                },
            };
            PostAjax.initAjaxPost(deleteAccount);
        }
    });
}


$(document).ready(function () {
    getUsers();
    setupSearchHandlers();
    setupActionHandlers();
});
