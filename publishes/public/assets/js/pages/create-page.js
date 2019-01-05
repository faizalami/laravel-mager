define(['jquery'], function ($) {
    $('#landing, #redirect').hide();

    var resource = {
        create: true,
        edit: true,
        destroy: true
    };
    $('#resource').change(function () {
        $('#landing').hide();
        $('#redirect').val('').hide();

        if($(this).val() === 'index') {
            $('#landing').show();
        } else if(resource[$(this).val()]) {
            $('#redirect').show();
        }
    });
});
