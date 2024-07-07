import { HandleTab } from "../profile/handleTab.js";
import { PostAjax } from '../ajax/post.js';
import { Toast } from "../toast/toast.js";

const submit = $('.btn');

let generateImages = (images) => {
    if ($('.imageNameDiv').length) {
        $('.imageNameDiv').remove();
    }

    $.each(images, function (index, image) {
        $('.profile_image').attr('src', image.profile_image ? '/uploads/restaurant_images/' + image.profile_image : null);
        $('.detail_image_1').attr('src', image.detail_image_1 ? '/uploads/restaurant_images/' + image.detail_image_1 : null);
        $('.detail_image_2').attr('src', image.detail_image_2 ? '/uploads/restaurant_images/' + image.detail_image_2 : null);
        $('.detail_image_3').attr('src', image.detail_image_3 ? '/uploads/restaurant_images/' + image.detail_image_3 : null);
        $('.detail_image_4').attr('src', image.detail_image_4 ? '/uploads/restaurant_images/' + image.detail_image_4 : null);
    });

    setTimeout(() => {
        $('img').show();
    }, 100);
}

let getAllSettings = () => {
    let url = '/res_owner/settings/get';

    let getAllSettings = {
        url: url,
        data: null,
        processData: false,
        contentType: false,
        div: null,
        onSuccess: (response) => {
            let data = response.data;
            let images = response.data.restaurant_images;

            data.restaurant_name ? $('[name="restaurant_name"]').val(data.restaurant_name) : null;
            data.restaurant_phone ? $('[name="restaurant_phone"]').val(data.restaurant_phone) : null;
            data.restaurant_email ? $('[name="restaurant_email"]').val(data.restaurant_email) : null;
            $('[name="description"]').empty();
            data.description ? $('[name="description"]').append(data.description) : null;
            data.address ? $('[name="address"]').val(data.address) : null;

            generateImages(images);
            console.log(images);
        },
        onError: (response) => {
            console.log(response);
        }
    };

    PostAjax.initAjaxGet(getAllSettings);
}


let settings = () => {
    let url = '/res_owner/settings/update';
    let form = '';
    let progress_step = '';

    submit.on('click', function(e) {
        e.preventDefault();

        if($('.tab1').hasClass('text-ter')) {
            form = $('.res_info_form');
            progress_step = 0;
        } else if($('.tab2').hasClass('text-ter')) {
            form = $('.location_form');
            progress_step = 1;
        } else if($('.tab3').hasClass('text-ter')) {
            form = $('.images_form');
            progress_step = 2;
        }

        let data = new FormData(form[0]);
        data.append('progress_step', progress_step);

        let settings = {
            url: url,
            data: data,
            processData: false,
            contentType: false,
            button: submit,
            onSuccess: (response) => {
                if (response) {
                    $(".error_p").empty();
                    getAllSettings();
                    if (submit.length > 0) {
                        submit.prop('disabled', false);
                    }
                    // Toast.toast('success', response.message);
                    const Toast = Swal.mixin({
                        toast: true,
                        position: "center",
                        showConfirmButton: false,
                        color: "#fff",
                        background: "#48bb78",
                        timer: 400,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.onmouseenter = Swal.stopTimer;
                            toast.onmouseleave = Swal.resumeTimer;
                        }
                    });
                    Toast.fire({
                        icon: "success",
                        title: response.message,
                    });
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

        PostAjax.initAjaxPost(settings);
    });
}

let handleChangeImage = () => {
    $('input[type="file"]').each(function() {
        $(this).on('change', function() {
            const file = this.files[0];
            if (file) {
                const container = $(this).closest('div.relative');
                const img = container.find('img');
                const fileName = file.name;

                if (img.length) {
                    img.hide();
                }

                const fileNameDiv = $('<div></div>', {
                    class: 'imageNameDiv flex items-center justify-center w-full h-full bg-sec rounded-3xl text-center text-qua h-40',
                    text: fileName
                });

                container.find('.bg-cover').append(fileNameDiv);
            }
        });
    });
}

$(document).ready(function() {
    HandleTab.handleTab();
    getAllSettings();
    settings();
    handleChangeImage();
});
