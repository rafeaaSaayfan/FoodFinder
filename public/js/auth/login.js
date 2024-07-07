import { PostAjax } from "../ajax/post.js";

let login = () => {
    const loginForm = $("#loginForm");

    loginForm.on("submit", function(e) {
        e.preventDefault();

        let data = new FormData(loginForm[0]);
        let url = '/login';
        let btn = loginForm.find('button[type="submit"]');

            let loginConfig = {
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
                    let errorP = loginForm.find(".error_" + key);
                    errorP.html(value[0]);
                });
            }
        };
        PostAjax.initAjaxPost(loginConfig);
    });
}

$(document).ready(function() {
    login();
});
