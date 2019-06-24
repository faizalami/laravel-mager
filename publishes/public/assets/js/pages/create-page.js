define(['jquery'], function ($) {
    $('#landing, #redirect').hide();
    $('#view').show();

    $('#resource').change(function () {
        $('#landing, #redirect').hide();
        $('#view').show();

        $('#redirect, #view').find('input').val('');

        if($(this).val() === 'index') {
            $('#landing').show();
        } else if(['create', 'edit'].contains($(this).val())) {
            $('#redirect').show();
        } else if($(this).val() === 'delete') {
            $('#view').hide();
        }
    });
});
