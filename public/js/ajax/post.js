import { Loading } from "../loading/loading.js";


export class PostAjax {

    static initAjaxPost = (option) => {

        const csrfToken = $('meta[name="csrf-token"]').attr('content');

        const btn = option.button;

        if (btn) {
            Loading.showLoading(btn)
            if (btn.length > 0) {
                btn.prop('disabled', true);
            }
        }

        const loadingIndicator = Loading.loadingData();
        if(option.div) {
            option.div.removeClass('hidden');
            option.div.append(loadingIndicator);
        }


        $.ajax({
            url: option.url,
            method: 'POST',
            data: option.data,
            headers: {
                'X-CSRF-TOKEN': csrfToken
            },
            enctype: "multipart/form-data",
            processData: option.processData,
            contentType: option.contentType,
            success: function(response) {
                if (btn) {
                    Loading.hideLoading(btn);
                    if (btn.length > 0) {
                        btn.prop('disabled', true);
                    }
                }
                if(option.div) {
                    option.div.addClass('hidden');
                    option.div.find('.loading-indicator').remove();
                }
                option.onSuccess(response);
            },
            error: function(response) {
                if (btn) {
                    Loading.hideLoading(btn);
                    setTimeout(() => {
                        btn.prop('disabled', false);
                    }, 200)
                }
                option.onError(response);
            }
        });
    }

    static initAjaxGet = (option) => {

        const csrfToken = $('meta[name="csrf-token"]').attr('content');

        const loadingIndicator = Loading.loadingData();
        if(option.div) {
            option.div.append(loadingIndicator);
        }

        $.ajax({
            url: option.url,
            method: 'GET',
            data: option.data,
            headers: {
                'X-CSRF-TOKEN': csrfToken
            },
            enctype: "multipart/form-data",
            processData: option.processData,
            contentType: option.contentType,
            success: function(response) {
                if(option.div) {
                    option.div.find('.loading-indicator').remove();
                }
                option.onSuccess(response);
            },
            error: function(response) {
                option.onError(response);
            }
        });

    }
}
