var loadFiles = [
    'jquery',
    'assets/js/components/gui-builder-dragable-config',
    'assets/js/components/gui-builder-sortable-config',
    'assets/js/components/property-sidebar',
];

define(loadFiles, function ($, ComponentDragableConfig, ComponentSortableConfig, ComponentPropertySidebar) {
    require(['jqueryui']);

    var propertySidebar = ComponentPropertySidebar;

    var guiBuildePage = {
        init: function() {
            guiBuildePage.initDrawingArea();
            
            var $sidebarItem = $('.component-sidebar .sidebar-item');

            propertySidebar.displayProperties('page', 'page');

            $('#open-property-sidebar').on('click', {sidebarName: 'property'}, guiBuildePage.toggleSidebar);

            $('#open-component-sidebar').on('click', {sidebarName: 'component'}, guiBuildePage.toggleSidebar);

            $('#show-page-properties').on('click', {type: 'page', id: 'page'}, function (event) {
                propertySidebar.displayProperties(event.data.type, event.data.id);
            });

            $sidebarItem.on('dragstop', function (event, type, id) {
                propertySidebar.displayProperties(type, id);
            });
            $sidebarItem.draggable(ComponentDragableConfig().config);


        },
        initDrawingArea: function () {
            var $drawingArea = $('.drawing-area');

            $drawingArea.on('click', '.button-remove', guiBuildePage.removeComponent);

            $drawingArea.on('mouseenter mouseleave', '.component-row.place-component, .component-col.place-component', guiBuildePage.containerComponentHover);

            $drawingArea.on('click', '.button-property', function () {
                guiBuildePage.hideTooltip();
                var type = $(this).data('type');
                if(type !== 'row' && type !== 'col') {
                    propertySidebar.displayProperties(type, $(this).parents('.component-container').prop('id'));
                } else {
                    propertySidebar.displayProperties(type, $(this).parents('.component-' + type).prop('id'));
                }
            });

            $drawingArea.sortable(ComponentSortableConfig().config);
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