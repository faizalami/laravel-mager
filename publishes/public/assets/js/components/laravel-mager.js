define(['jquery', 'bootstrap'], function ($) {
    $(document).ready(function () {
        $('body').tooltip({
            selector: '[data-toggle="tooltip"]',
            container: 'body'
        });
    });
});