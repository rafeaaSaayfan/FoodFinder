import { PostAjax } from "../../ajax/post.js";
import { Wizard } from "../../wizard/wizard.js";

export class CompleteProfile {
    static getData = (progress_step) => {
        let data = new FormData();

        switch (progress_step) {
            case 0:
                data.append('restaurant_name', $('[name=restaurant_name]').val());
                data.append('restaurant_email', $('[name=restaurant_email]').val());
                data.append('restaurant_phone', $('[name=restaurant_phone]').val());
                data.append('description', $('[name=description]').val());
                break;
            case 1:
                data.append('address', $('[name=restaurant_address]').val());
               break;
            case 2:
                data.append('profile_image', $('[name=profile_image]')[0].files[0]);
                data.append('detail_image_1', $('[name=detail_image_1]')[0].files[0]);
                data.append('detail_image_2', $('[name=detail_image_2]')[0].files[0]);
                data.append('detail_image_3', $('[name=detail_image_3]')[0].files[0]);
                data.append('detail_image_4', $('[name=detail_image_4]')[0].files[0]);

                break;
            case 3:
                break;
            default:
                console.error("Invalid step");
                return;
        }

        data.append('progress_step', progress_step);
        completeProject(data, progress_step);
    }
}

let completeProject = (data) => {
    let url = '/complete_profile_post';
    let btn = $(".wizardBtn");

    let completeProject = {
        url: url,
        data: data,
        processData: false,
        contentType: false,
        button: btn,
        onSuccess: (response) => {
            $(".error_p").empty();
            if(response.redirect_url) {
                window.location.href = response.redirect_url;
            } else {
                Wizard.progress_step++;
                Wizard.handleStep();
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

    PostAjax.initAjaxPost(completeProject);
}

let handleImageName = (inputId, spanClass) => {
    $(inputId).change(function() {
        var fileName = $(this).prop('files')[0]?.name;
        $(spanClass).text(fileName || '');
    });

    $('label[title="Change avatar"]').click(function() {
        $(inputId).click();
    });
};

$(document).ready(function() {
    Wizard.handleStepProgress();
    handleImageName('[name=profile_image]', '.profile_image');
    handleImageName('[name=detail_image_1]', '.detail_image_1');
    handleImageName('[name=detail_image_2]', '.detail_image_2');
    handleImageName('[name=detail_image_3]', '.detail_image_3');
    handleImageName('[name=detail_image_4]', '.detail_image_4');

    $('#confirmCheckbox, label[for="confirmCheckbox"]').on('click', function() {
        if ($('#confirmCheckbox').prop('checked')) {
            $('.notallowedBtn').hide();
            $(".wizardBtn").show();
        } else {
            $(".wizardBtn").hide();
            $('.notallowedBtn').show();
        }
    });
});
