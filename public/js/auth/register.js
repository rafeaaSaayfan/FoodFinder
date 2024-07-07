import { PostAjax } from "../ajax/post.js";

let register = () => {
    const registerForm = $("#registerForm");

    registerForm.on("submit", function(e) {
        e.preventDefault();

        let data = new FormData(registerForm[0]);
        let url = '/register';
        let btn = registerForm.find('button[type="submit"]');

            let registerConfig = {
            url: url,
            data: data,
            processData: false,
            contentType: false,
            button: btn,
            onSuccess: (response) => {
                window.location.href = response.redirect_url;
            },
            onError: (response) => {
                $(".error_p").empty();
                let errors = response.responseJSON.errors;
                $.each(errors, function(key, value) {
                    let errorP = registerForm.find(".error_" + key);
                    errorP.html(value[0]);
                });
            }
        };
        PostAjax.initAjaxPost(registerConfig);
    });
}

$(document).ready(function() {
    register();
});
