var loadFiles = [
    'jquery',
    'lodash',
    'promise!assets/js/services/view-config',
    'assets/js/components/gui-builder-dragable-config',
    'assets/js/components/gui-builder-sortable-config',
    'assets/js/components/property-sidebar',
    'jqueryui',
    'waitme'
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

            guiBuildePage.initModel();
        },
        initModel: function() {
            $('#show-model').click(function () {
                propertySidebar.drawModelColumns();
                $('#modal-model-columns').modal();
            });

            var $modalChooseColumn = $('#modal-choose-columns');

            $('.modal-model').on('click', '.button-delete', function () {
                propertySidebar.deleteColumnModel($(this).data('name'));
                guiBuildePage.hideTooltip();
                propertySidebar.drawModelColumns();
            });

            $('.modal-model').on('click', '.button-edit', function () {
                $('.modal-model tr').removeClass('active');
                $(this).parents('tr').addClass('active');
                guiBuildePage.hideTooltip();
            });

            $('.modal-model').on('click', '.button-save-edit', function () {
                propertySidebar.editColumnModel($(this).parents('table'), $(this).data('name'));
                $('.modal-model tr').removeClass('active');
                guiBuildePage.hideTooltip();
                propertySidebar.drawModelColumns();
            });

            $('.new-column').click(function () {
                propertySidebar.addColumnModel($(this).parents('table'));
                propertySidebar.drawModelColumns();
            });

            if($modalChooseColumn.length === 1) {
                $('#properties-form').on('click', '.button-choose-column', function (event) {
                    event.preventDefault();
                    propertySidebar.drawModelColumns(true, $(this).data('id'));
                    $('#save-choosen-columns').data('id', $(this).data('id'));
                    $modalChooseColumn.modal();
                });

                $('#save-choosen-columns').click(function () {
                    propertySidebar.saveChoosenColumns($(this).data('id'));
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
                    case 'label-data':
                    case 'paragraph':
                    case 'paragraph-data':
                    case 'number':
                    case 'email':
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
                    case 'heading':
                    case 'heading-data':
                        var $activeHeading = $component.find('h' + config.size);
                        var $componentHeading = $component.find('.component-heading');

                        $componentHeading.text(config.text)
                            .removeClass('active');
                        $activeHeading.addClass('active');

                        if(config.name) {
                            $componentHeading.data('name', config.name);
                        }
                        break;
                    case 'table':
                        $component.find('.dataTable').DataTable();
                        if(config['columns'] !== '') {
                            var tableHeaderContent = '';
                            var tableBodyContent = '';
                            _.forEach(config['columns'].split(','), function (item) {
                                tableHeaderContent += '<th>' + propertySidebar.model.columns[item].label + '</th>\n';
                                tableBodyContent += '<td>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</td>\n';
                            });
                            tableHeaderContent += '<th>Action</th>';
                            tableBodyContent += '<td>\n' +
                                '    <a class="btn btn-xs btn-primary" data-toggle="tooltip" title="Item Detail" href="#"><i class="far fa-eye"></i></a>\n' +
                                '    <a class="btn btn-xs btn-primary" data-toggle="tooltip" title="Edit Item" href="#"><i class="fas fa-edit"></i></a>\n' +
                                '    <a class="btn btn-xs btn-danger" data-toggle="tooltip" title="Delete Item" href="#"><i class="far fa-trash-alt"></i></a>\n' +
                                '</td>';

                            $component.find('.component-table thead tr').html(tableHeaderContent);
                            $component.find('.component-table tbody tr').html(tableBodyContent);
                        }
                        break;
                    case 'thumbnail':
                        $component.find('.component-thumbnail').css('width', '');
                        colSize = {
                            xs: 4,
                            sm: 4,
                            md: 3,
                            lg: 3
                        };

                        var $thumbnailCol = $component.find('.thumbnail-col');

                        if(config.title !== '') {
                            var thumbnailTitle = propertySidebar.model.columns[config.title];
                            if(thumbnailTitle) {
                                $thumbnailCol.find('h4')
                                    .text(thumbnailTitle.label);
                            } else {
                                $thumbnailCol.find('h4')
                                    .text('[Unknown Column!]');
                            }
                        }

                        if(config.content !== '') {
                            var thumbnailContent = propertySidebar.model.columns[config.content];
                            if(thumbnailContent) {
                                $thumbnailCol.find('span')
                                    .text('[' + thumbnailContent.label + ']');
                            } else {
                                $thumbnailCol.find('span')
                                    .text('[Unknown Column!]');
                            }
                        }

                        _.forEach(colSize, function (size, colName) {
                            $thumbnailCol.removeClass('col-' + colName + '-' + size)
                                .addClass('col-' + colName + '-' + config[colName]);
                        });
                        break;
                    case 'table-detail':
                        if(config['columns'] !== '') {
                            var tableContent = '';
                            _.forEach(config['columns'].split(','), function (item) {
                                tableContent += '<tr>\n' +
                                    '    <th>' + propertySidebar.model.columns[item].label + '</th>\n' +
                                    '    <td>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</td>\n' +
                                    '</tr>';
                            });
                            $component.find('.component-table tbody').html(tableContent);
                        }
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

            $('.drawing-area').waitMe('hide');
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
