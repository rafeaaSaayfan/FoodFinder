import { PostAjax } from '../ajax/post.js';
import { Toast } from "../toast/toast.js";

let generateRestaurantImages = (images, res) => {
    $('.res_info').empty();


    let res_info = `
        <div class="px-2 md:px-0 w-full md:w-3/4 flex flex-col gap-5">
            <div class="w-full flex flex-col lg:flex-row gap-5 justify-between">
                <div class="w-full lg:w-1/2">
                    <label for="" class="text-qua">Restaurant name</label>
                    <div class="w-full bg-white rounded shadow-md px-3 py-1 text-sec">
                        ${res.restaurant_name}
                    </div>
                </div>
                <div class="w-full lg:w-1/2">
                    <label for="" class="text-qua">Restaurant email</label>
                    <div class="w-full bg-white rounded shadow-md px-3 py-1">
                        <a href="mailto:rafehsaayfan@gmail.com" class="text-sec">
                            ${res.restaurant_email}
                        </a>
                    </div>
                </div>
            </div>
            <div class="w-full flex flex-col lg:flex-row gap-5">
                <div class="w-full lg:w-1/2">
                    <label for="" class="text-qua">Restaurant phone</label>
                    <div class="w-full bg-white rounded shadow-md px-3 py-1">
                        <a href="tel:${res.restaurant_phone}" class="flex flex-wrap text-sec">${res.restaurant_phone}</a>
                    </div>
                </div>
                <div class="w-full lg:w-1/2">
                    <label for="" class="text-qua">Address</label>
                    <div class="w-full bg-white rounded shadow-md px-3 py-1 break-words">
                        <a href="${res.address}" class="text-sec w-full">See location</a>
                    </div>
                </div>
            </div>
            <div class="w-full">
                <label for="" class="text-qua">Description</label>
                <div class="bg-white rounded shadow-md px-3 py-1 text-sec break-words">
                    ${res.description}
                </div>
            </div>
        </div>
    `;

    $('.res_info').append(res_info);

    $.each(images, function (index, image) {
        $('.profile_res').attr('src', image.profile_image ? '/uploads/restaurant_images/' + image.profile_image : null);
        $('.detail_1').attr('src', image.detail_image_1 ? '/uploads/restaurant_images/' + image.detail_image_1 : null);
        $('.detail_2').attr('src', image.detail_image_2 ? '/uploads/restaurant_images/' + image.detail_image_2 : null);
        $('.detail_3').attr('src', image.detail_image_3 ? '/uploads/restaurant_images/' + image.detail_image_3 : null);
        $('.detail_4').attr('src', image.detail_image_4 ? '/uploads/restaurant_images/' + image.detail_image_4 : null);
    });

    $('.modal').removeClass('hidden');
}

let generateRestaurantRequest = (requests, pagination) => {
    $('.restaurant_request').empty();
    $('.pagination_controls').empty();

    $.each(requests, function (index, request) {
        let Html = `
            <div class="flex justify-between items-center py-2 px-3 bg-white border shadow rounded-lg mt-4">
                <p class="text-sec">${request.restaurant_name}</p>
                <button class="viewBtn text-qua px-4 py-1 bg-sec rounded select-none shadow-md transition-all"
                    type="button" data-res='${JSON.stringify(request)}' data-images='${JSON.stringify(request.restaurant_images)}'>
                    View
                </button>
            </div>
        `;
        $('.restaurant_request').append(Html);
    });

    handleModal();

    $('.pagination_controls').append(pagination);
    setupPaginationClickHandlers();
    // setupActionHandlers();
}

let handleModal = () => {
    $('.viewBtn').on('click', function () {
        let images = $(this).data('images');
        let res = $(this).data('res');
        generateRestaurantImages(images, res);
        $('.res_id').val(res.id);
    });

    $('.close').on('click', function () {
        $('.modal').addClass('hidden');
    });
}

let getRestaurantRequest = (page = 1) => {
    let url = `/dashboard/restaurant/getRestaurantRequest?page=${page}`;

    let getRestaurantRequest = {
        url: url,
        data: null,
        div: $('.loading-indicator'),
        processData: false,
        contentType: false,
        onSuccess: (response) => {
            if (response) {
                let requests = response.data;
                let pagination = response.pagination;
                if (requests.length > 0) {
                    generateRestaurantRequest(requests, pagination);
                } else {
                    $('.pagination_controls').empty();
                    $('.restaurant_request').empty();
                    $('.restaurant_request').append(`
                        <div class='w-full flex justify-center items-center mt-4'>
                            <div class='py-2 px-5 bg-white text-sec shadow rounded'>
                                <span>No Request</span>
                            </div>
                        </div>
                    `);
                }
            }
        },
        onError: (response) => {
            console.log(response);
        }
    };

    PostAjax.initAjaxGet(getRestaurantRequest);
}

let setupPaginationClickHandlers = () => {
    $('.pagination_controls').off('click', 'a');
    $('.pagination_controls').on('click', 'a', function (e) {
        e.preventDefault();
        getRestaurantRequest(page);
    });
}

let handleResStatus = () => {
    $('.approvedBtn').on('click', function (e) {
        e.preventDefault();
        let id = $('.res_id').val();

        let data = new FormData();
        data.append('id', id);

        let btn = $(this);

        let url = '/dashboard/restaurant_request/approved';

        let approvedRes = {
            url: url,
            data: data,
            processData: false,
            contentType: false,
            button: btn,
            onSuccess: (response) => {
                if (response.success) {
                    getRestaurantRequest(1);
                    Toast.toast('success', response.message);
                    $('.modal').addClass('hidden');
                    if (btn.length > 0) {
                        btn.prop('disabled', false);
                    }
                } else {
                    Toast.toast('error', response.message);
                }
            },
            onError: (response) => {
                if (response) {
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
                        title: 'ERROR',
                    });
                }
            }
        };
        PostAjax.initAjaxPost(approvedRes);
    });

    $('.rejectBtn').on('click', function (e) {
        e.preventDefault();
        let id = $('.res_id').val();

        let data = new FormData();
        data.append('id', id);

        let btn = $(this);

        let url = '/dashboard/restaurant_request/reject';

        let rejectRes = {
            url: url,
            data: data,
            processData: false,
            contentType: false,
            button: btn,
            onSuccess: (response) => {
                if (response.success) {
                    getRestaurantRequest(1);
                    Toast.toast('success', response.message);
                    $('.modal').addClass('hidden');
                    if (btn.length > 0) {
                        btn.prop('disabled', false);
                    }
                } else {
                    Toast.toast('error', response.message);
                }
            },
            onError: (response) => {
                if (response) {
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
                        title: 'ERROR',
                    });
                }
            }
        };
        PostAjax.initAjaxPost(rejectRes);
    });
}



$(document).ready(function () {
    getRestaurantRequest();
    handleModal();
    handleResStatus();
});
