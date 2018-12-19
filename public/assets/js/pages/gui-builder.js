var loadFiles = [
    'jquery',
    'assets/js/components/gui-builder-dragable-config',
    'assets/js/components/gui-builder-sortable-config',
    'assets/js/components/property-sidebar',
];

define(loadFiles, function ($, ComponentDragableConfig, ComponentSortableConfig, ComponentPropertySidebar) {
    require(['jqueryui']);

    var propertySidebar = ComponentPropertySidebar;

    var $drawingArea = $('.drawing-area');

    var guiBuildePage = {
        init: function() {
            var sidebarItem = '.component-sidebar .sidebar-item';

            guiBuildePage.initDrawingArea();

            guiBuildePage.initSidebar();

            guiBuildePage.initDragAndDrop(sidebarItem);
        },
        initDrawingArea: function () {

            $drawingArea.on('click', '.button-remove', guiBuildePage.removeComponent);

            $drawingArea.on('mouseenter mouseleave', '.component-row.place-component, .component-col.place-component', guiBuildePage.containerComponentHover);

            $drawingArea.on('click', '.button-property', function () {
                guiBuildePage.hideTooltip();
                var type = $(this).data('type');
                var data = {
                    type: type
                };

                var $targetComponent = $(this).parents('.component-' + type);
                if(type !== 'row' && type !== 'col') {
                    $targetComponent = $(this).parents('.component-container');
                }

                // todo: jadi komponen parent
                data.parent = 'page';
                var itemParent = $targetComponent.parent();

                if(itemParent.is('.row') || itemParent.is('.col-container')) {
                    data.parent = itemParent.parent().attr('id');
                }

                data.id = $targetComponent.prop('id');
                data.index = $targetComponent.index();

                propertySidebar.displayProperties(data);
            });

        },
        initSidebar: function () {

            $('#open-property-sidebar').on('click', {sidebarName: 'property'}, guiBuildePage.toggleSidebar);

            $('#open-component-sidebar').on('click', {sidebarName: 'component'}, guiBuildePage.toggleSidebar);

            propertySidebar.displayProperties({type: 'page', id: 'page'});

            $('#show-page-properties').on('click', {type: 'page', id: 'page'}, function (event) {
                propertySidebar.displayProperties(event.data);
            });
        },
        initDragAndDrop: function (sidebarItem) {
            var $sidebarItem = $(sidebarItem);

            $sidebarItem.draggable(ComponentDragableConfig().config);
            $drawingArea.sortable(ComponentSortableConfig().config);

            $sidebarItem.on('dragstop', function (event, comp, data) {
                propertySidebar.displayProperties(data);
            });
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
