var loadFiles = [
    'jquery',
    'lodash',
    'promise!assets/js/services/view-config',
    'assets/js/components/gui-builder-dragable-config',
    'assets/js/components/gui-builder-sortable-config',
    'assets/js/components/property-sidebar',
    'jqueryui'
];

define(loadFiles, function ($, _, ServiceViewConfig, ComponentDragableConfig, ComponentSortableConfig, ComponentPropertySidebar) {

    var propertySidebar = ComponentPropertySidebar(ServiceViewConfig);
    var savedConfig= ServiceViewConfig.config.components;

    var $drawingArea = $('.drawing-area');

    var guiBuildePage = {
        init: function() {
            var sidebarItem = '.component-sidebar .sidebar-item';

            guiBuildePage.loadSavedLayout();

            guiBuildePage.initDrawingArea();

            guiBuildePage.initSidebar();

            guiBuildePage.initDragAndDrop(sidebarItem);

            $('#save-page-properties').click(function () {
                propertySidebar.saveProperties();
            });

            var $modalChooseColumn = $('#modal-choose-columns');

            if($modalChooseColumn.length === 1) {
                $('#properties-form').on('click', '#button-choose-column', function (event) {
                    event.preventDefault();
                    $modalChooseColumn.modal();
                });
                propertySidebar.drawChooseColumns();

                $('#save-choosen-columns').click(function () {
                    propertySidebar.saveChoosenColumns();
                    $modalChooseColumn.modal('hide');
                });
            }
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
        loadSavedLayout: function () {
            var configQueue = _.chain(savedConfig)
                .sortBy(['level', 'index'])
                .value();

            // todo: jadikan 1 komponen
            _.forEach(configQueue, function (config) {
                var id = _.findKey(savedConfig, ['data-id', config['data-id']]);

                var $component = guiBuildePage.getComponent(config.type, id);

                switch (config.type) {
                    case 'label':
                    case 'button':
                        $component.data({
                            'id': config['data-id'],
                            'type': config.type
                        }).find('.component-'+config.type).html(config.text);
                        break;
                    case 'textbox':
                    case 'numberbox':
                    case 'emailbox':
                    case 'passwordbox':
                    case 'textarea':
                        $component.data('type', config.type)
                            .find('.component-label')
                            .html(config.label);
                        var $input = $component.find('.component-input');

                        var attr = {};
                        _.forEach(config, function (value, key) {
                            if(key !== 'label') {
                                attr[key] = value;
                            }
                        });

                        $input.attr(attr);
                        break;
                    case 'col':
                        $component.data('type', config.type);
                        var colSize = {
                            xs: 6,
                            sm: 6,
                            md: 4,
                            lg: 4
                        };
                        _.forEach(colSize, function (size, colName) {
                            $component.css('border', 'solid 1px #5f5f5f')
                                .removeClass('col-' + colName + '-' + size)
                                .addClass('col-' + colName + '-' + config[colName]);
                        });
                        break;
                    default:
                        $component.data('type', config.type);
                        console.log(config);
                        break;
                }

                if(config.parent === 'page') {
                    $drawingArea.append($component);
                } else {
                    $('#' + config.parent).children('.nested-sortable').append($component);
                }
            });

            $('.nested-sortable').sortable({
                revert: true,
                connectWith: '.drawing-area',
                stop: function (event, ui) {
                    ComponentSortableConfig(savedConfig).sortStopConfig(ui);
                }
            });
        },
        // todo: jadikan 1 komponen
        getComponent: function (type, id) {
            var containerType = 'component';
            if (type === 'row' || type === 'col') {
                containerType = type;
            }

            var $component = $($('#template-' + containerType).html());
            $component.find('.button-property').data('type', type);

            if(containerType === 'component') {
                $component.children('.component-body').html($('#template-' + type).html());
            }

            $component.addClass('place-component')
                .removeClass('drag-component')
                .data('id', id)
                .attr('id', id);

            return $component;
        },
        initSidebar: function () {

            $('#open-property-sidebar').on('click', {sidebarName: 'property'}, guiBuildePage.toggleSidebar);

            $('#open-component-sidebar').on('click', {sidebarName: 'component'}, guiBuildePage.toggleSidebar);

            propertySidebar.displayProperties({type: 'page', id: 'page'});

            $('#show-page-properties').on('click', {type: 'page', id: 'page'}, function (event) {
                propertySidebar.displayProperties(event.data);
            });

            $('.property-sidebar').on('focus', 'input[type=text], input[type=number], textarea', function () {
                $(this).select();
            });
        },
        initDragAndDrop: function (sidebarItem) {
            var $sidebarItem = $(sidebarItem);

            $sidebarItem.draggable(ComponentDragableConfig().config);
            $drawingArea.sortable(ComponentSortableConfig(savedConfig).config);

            $sidebarItem.on('dragstop', function (event, comp, data) {
                propertySidebar.displayProperties(data);
            });
        },
        toggleSidebar: function (event) {
            $('.' + event.data.sidebarName + '-sidebar').toggleClass('active');
        },
        removeComponent: function () {
            guiBuildePage.hideTooltip();
            var id = $(this).parent().parent().data('id');
            var $components = $(this).parent().parent().find('.nested-sortable').children();
            if($components.length > 0) {
                _.forEach($components, function (component) {
                    propertySidebar.deleteProperties($(component).data('id'));
                })
            }
            propertySidebar.deleteProperties(id);

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
