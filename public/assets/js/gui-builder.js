$(document).ready(function () {
    $('#open-component-sidebar').click(function () {
        $('.component-sidebar').toggleClass('active');
    });

    $('#open-property-sidebar').click(function () {
        $('.property-sidebar').toggleClass('active');
    });

    $('.component-sidebar .sidebar-item').draggable({
        opacity: 0.7,
        cursor: 'move',
        containment: 'body',
        appendTo: 'body',
        connectToSortable: '.drawing-area',
        revert: 'invalid',
        helper: function() {
            var $dragComponet = $($('#template-component').html());
            var $component = $dragComponet.html($('#template-'+$(this).data('type')).html());
            return $component;
        },
        stop: function (event, ui) {
            $('.drag-component')
                .addClass('place-component')
                .removeClass('drag-component');
        }
    });

    $('.drawing-area').sortable({
        revert: true
    });
});
