export class HandleTab {
    static handleTab = () => {
        function showTab(tabToShow, clickedTab) {
            $('#orders, #reviews, #stores, #updateProfile').hide();
            $(tabToShow).show();

            $('.tab1, .tab2, .tab3, .tab4').removeClass('border-b-2 border-orange-600 text-ter');
            $(clickedTab).addClass('border-b-2 border-orange-600 text-ter');
            $(clickedTab).removeClass('text-sec');
        }

        $('.tab1').on('click', function() {
            showTab('#orders', this);
        });
        $('.tab2').on('click', function() {
            showTab('#reviews', this);
        });
        $('.tab3').on('click', function() {
            showTab('#stores', this);
        });
        $('.tab4').on('click', function() {
            showTab('#updateProfile', this);
        });

    }
}


$(document).ready(function() {
    HandleTab.handleTab();
});
