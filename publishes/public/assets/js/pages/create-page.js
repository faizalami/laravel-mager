define(['jquery'], function ($) {
    $('#landing, #redirect').hide();
    $('#view-name').show();

    init($('#resource').val());

    $('#resource').change(function () {
        $('#landing, #redirect').hide();
        $('#view-name').show();

        $('#redirect, #view-name').find('input').val('');

        init($(this).val());
    });

    function init(val) {
        switch (val) {
            case 'index':
                $('#landing').show();
                break;
            case 'create':
            case 'edit':
                $('#redirect').show();
                break;
            case 'destroy':
                $('#view-name').hide();
                break;
        }
    }
});
