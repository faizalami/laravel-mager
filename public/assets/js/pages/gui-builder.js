var loadFiles = [
    'jquery',
    'assets/js/components/gui-builder-dragable-config',
    'assets/js/components/gui-builder-sortable-config',
];

define(loadFiles, function ($, dragableConfig, sortableConfig) {
    require(['jqueryui']);

    var guiBuildePage = {
        init: function() {
            var $drawingArea = $('.drawing-area');

            $('#open-property-sidebar').on('click', {sidebarName: 'property'}, guiBuildePage.toggleSidebar);

            $('#open-component-sidebar').on('click', {sidebarName: 'component'}, guiBuildePage.toggleSidebar);

            $drawingArea.on('click', '.button-remove', guiBuildePage.removeComponent);

            $drawingArea.on('mouseenter mouseleave', '.component-row.place-component, .component-col.place-component', guiBuildePage.containerComponentHover);

            $('.component-sidebar .sidebar-item').draggable(dragableConfig().config);

            $drawingArea.sortable(sortableConfig().config);
        },
        toggleSidebar: function (event) {
            $('.' + event.data.sidebarName + '-sidebar').toggleClass('active');
        },
        removeComponent: function () {
            guiBuildePage.hideTooltip();
            $(this).parent().parent().slideUp('slow', function () {
                $(this).remove();
            });
        },
        containerComponentHover: function(event){
            var $containerComponent = $('.nested-sortable').parent();

            if(event.type === 'mouseenter') {
                $containerComponent.css('border', 'solid 1px #5f5f5f');
            } else if (event.type === 'mouseleave') {
                $containerComponent.css('border', '');
            }
        },
        hideTooltip: function () {
            $('*').tooltip('hide');
        }
    };

    $(document).ready(function () {
        guiBuildePage.init();
    });
});