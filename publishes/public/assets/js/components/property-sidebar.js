var loadFiles = [
    'jquery',
    'lodash',
    'sweetalert',
    'moment',
    'promise!assets/js/services/component-template',
    'promise!assets/js/services/model-config',
    'jquerymy',
    'datatables.bootstrap'
];

define(loadFiles, function ($, _, swal, moment, ServiceComponentTemplate, ServiceModelConfig) {

    var propertySidebar = function (ServiceViewConfig) {

        var componentTemplate= ServiceComponentTemplate.config;
        var viewConfig= ServiceViewConfig.config;
        var modelConfig= ServiceModelConfig.config;
        var $propertiesForm=$('#properties-form');
        var current;

        const defaultComponent = function () {
            var component = {};
            _.forEach(componentTemplate[current.type]['property'], function (property, name) {
                component[name] = {...property};
            });
            return component;
        };

        const currentComponent = function () {
            var component = defaultComponent();

            if(current.type === 'page') {
                component.id.value = viewConfig.id;
                component.title.value = viewConfig.title;
            } else {
                var objectProperties = viewConfig.components[current.id];
                if(objectProperties !== undefined) {
                    _.forEach(component, function (item, key) {
                        item.value = objectProperties[key];
                    });
                }
            }

            return component;
        };

        const drawForm = function (id, item, value) {
            var $template = $($('#template-property-input').html());
            var $input = $($('#template-property-'+item.type).html());

            var formControl = _.find($input, function(input){
                return $(input).is('.form-control');
            });

            var buttonModal = _.find($input, function(input){
                return $(input).is('button');
            });

            $(buttonModal).data('id', id);

            $(formControl).attr({
                'id': id,
                'placeholder': item.label,
                'value': value
            });

            $template.find('.property-label')
                .prop('for', '#'+id)
                .html(item.label);

            $template.find('.property-input')
                .html($input);

            $propertiesForm.append($template);
        };

        const initComponent = function () {
            var components = currentComponent();
            _.forEach(components, function (item, key) {
                var value = '';

                if(['data-id', 'name'].includes(key)) {
                    if(item.value) {
                        _.forEach(item.value.split('-'), function (item, key) {
                            if(key === 0) {
                                value += item;
                            } else {
                                value += item.charAt(0).toUpperCase() + item.slice(1);
                            }
                        })
                    } else {
                        _.forEach(current.id.split('-'), function (item, key) {
                            if(key === 0) {
                                value += item;
                            } else {
                                value += item.charAt(0).toUpperCase() + item.slice(1);
                            }
                        })
                    }
                } else {
                    value = item.value ? item.value : '';
                }

                current.bind.model[key] = value;

                current.bind.binding['#'+key] = key;

                drawForm(key, item, value);
            });
        };

        const initBinding = function () {
            var binding = current.bind.binding;
            var ids = Object.keys(binding);

            switch (current.type) {
                case 'page':
                    binding['#' + current.id] = {
                        bind: function (data, value, $control) {
                            viewConfig.id = data.id;
                            viewConfig.title = data.title;

                            $control.data('id', data.id)
                                .find('.page-name').html(data.title);
                        },
                        watch: ids.join(', ')
                    };
                    break;
                case 'label':
                case 'label-data':
                case 'paragraph':
                case 'paragraph-data':
                case 'number':
                case 'email':
                case 'button':
                    binding['#' + current.id] = {
                        bind: function (data, value, $control) {
                            setProperties(data);

                            $control.data('id', data.id);

                            var $component = $control.find('.component-'+current.type);
                            $component.text(data.text);

                            if(current.type === 'email') {
                                $component.attr('href', 'mailto:' + data.text);
                            }

                            if(data.name) {
                                $component.data('name', data.name);
                            }
                        },
                        watch: ids.join(', ')
                    };
                    break;
                case 'textbox':
                case 'numberbox':
                case 'emailbox':
                case 'passwordbox':
                case 'textarea':
                    binding['#' + current.id] = {
                        bind: function (data, value, $control) {
                            setProperties(data);

                            $control.find('.component-label')
                                .html(data.label);
                            var $input = $control.find('.component-input');

                            if(modelConfig.columns[$input.attr('name')]) {
                                delete modelConfig.columns[$input.attr('name')];
                            }

                            var attr = {};
                            _.forEach(data, function (value, key) {
                                if(key !== 'label') {
                                    attr[key] = value;
                                }
                            });

                            $input.attr(attr);

                            data.input = current.type;
                            setColumnModel(data);
                        },
                        watch: ids.join(', ')
                    };
                    break;
                case 'heading':
                case 'heading-data':
                    binding['#' + current.id] = {
                        bind: function (data, value, $control) {
                            setProperties(data);

                            var $activeHeading = $control.find('h' + data.size);
                            var $componentHeading = $control.find('.component-heading');

                            $componentHeading.text(data.text)
                                .removeClass('active');
                            $activeHeading.addClass('active');

                            if(data.name) {
                                $componentHeading.data('name', data.name);
                            }
                        },
                        watch: ids.join(', ')
                    };
                    break;
                case 'table':
                    binding['#' + current.id] = {
                        bind: function (data, value, $control) {
                            $control.find('.dataTable').DataTable();
                            setProperties(data);

                            if(data['columns'] !== '') {
                                var tableHeaderContent = '';
                                var tableBodyContent = '';
                                _.forEach(data['columns'].split(','), function (item) {
                                    tableHeaderContent += '<th>' + modelConfig.columns[item].label + '</th>\n';
                                    tableBodyContent += '<td>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</td>\n';
                                });
                                tableHeaderContent += '<th>Action</th>';
                                tableBodyContent += '<td>\n' +
                                    '    <a class="btn btn-xs btn-primary" data-toggle="tooltip" title="Item Detail" href="#"><i class="far fa-eye"></i></a>\n' +
                                    '    <a class="btn btn-xs btn-primary" data-toggle="tooltip" title="Edit Item" href="#"><i class="fas fa-edit"></i></a>\n' +
                                    '    <a class="btn btn-xs btn-danger" data-toggle="tooltip" title="Delete Item" href="#"><i class="far fa-trash-alt"></i></a>\n' +
                                    '</td>';

                                $control.find('.component-table thead tr').html(tableHeaderContent);
                                $control.find('.component-table tbody tr').html(tableBodyContent);
                            }
                        },
                        watch: ids.join(', ')
                    };
                    break;
                case 'thumbnail':
                    binding['#' + current.id] = {
                        bind: function (data, value, $control) {
                            var colSize;
                            var currentConfig = viewConfig.components[current.id];

                            if(currentConfig === undefined) {
                                colSize = {
                                    xs: 4,
                                    sm: 4,
                                    md: 3,
                                    lg: 3
                                };
                            } else {
                                colSize = {
                                    xs: currentConfig.xs,
                                    sm: currentConfig.sm,
                                    md: currentConfig.md,
                                    lg: currentConfig.lg
                                };
                            }

                            var $thumbnailCol = $control.find('.thumbnail-col');

                            if(data.title !== '') {
                                var thumbnailTitle = modelConfig.columns[data.title];
                                if(thumbnailTitle) {
                                    $thumbnailCol.find('h4')
                                        .text(thumbnailTitle.label);
                                } else {
                                    $thumbnailCol.find('h4')
                                        .text('[Unknown Column!]');
                                }
                            }

                            if(data.content !== '') {
                                var thumbnailContent = modelConfig.columns[data.content];
                                if(thumbnailContent) {
                                    $thumbnailCol.find('span')
                                        .text('[' + thumbnailContent.label + ']');
                                } else {
                                    $thumbnailCol.find('span')
                                        .text('[Unknown Column!]');
                                }
                            }

                            _.forEach(colSize, function (size, colName) {
                                setProperties(data);
                                $thumbnailCol.removeClass('col-' + colName + '-' + size)
                                    .addClass('col-' + colName + '-' + data[colName]);
                            });
                        },
                        watch: ids.join(', ')
                    };
                    break;
                case 'table-detail':
                    binding['#' + current.id] = {
                        bind: function (data, value, $control) {
                            setProperties(data);

                            if(data['columns'] !== '') {
                                var tableContent = '';
                                _.forEach(data['columns'].split(','), function (item) {
                                    tableContent += '<tr>\n' +
                                        '    <th>' + modelConfig.columns[item].label + '</th>\n' +
                                        '    <td>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</td>\n' +
                                        '</tr>';
                                });
                                $control.find('.component-table tbody').html(tableContent);
                            }
                        },
                        watch: ids.join(', ')
                    };
                    break;
                case 'col':
                    binding['#' + current.id] = {
                        bind: function (data, value, $control) {
                            var colSize;
                            var currentConfig = viewConfig.components[current.id];

                            if(currentConfig === undefined) {
                                colSize = {
                                    xs: 6,
                                    sm: 6,
                                    md: 4,
                                    lg: 4
                                };
                            } else {
                                colSize = {
                                    xs: currentConfig.xs,
                                    sm: currentConfig.sm,
                                    md: currentConfig.md,
                                    lg: currentConfig.lg
                                };
                            }

                            _.forEach(colSize, function (size, colName) {
                                setProperties(data);

                                $control.css('border', 'solid 1px #5f5f5f')
                                    .removeClass('col-' + colName + '-' + size)
                                    .addClass('col-' + colName + '-' + data[colName]);

                                colSize[colName] = data[colName];
                            });
                        },
                        watch: ids.join(', ')
                    };
                    break;
                default:
                    binding['#' + current.id] = {
                        bind: function (data) {
                            setProperties(data);

                            console.log(data, current.type);
                        },
                        watch: ids.join(', ')
                    };
                    break;
            }

            var $guiBuilder = $('.gui-builder');
            $guiBuilder.my('remove');
            $guiBuilder.my({ui: binding}, current.bind.model);
        };

        const setColumnModel = function (data) {
            if(data.name !== '') {
                modelConfig.columns[data.name] = componentTemplate[current.type].db;
                if(data.label) {
                    modelConfig.columns[data.name]['label'] = data.label;
                } else {
                    if(modelConfig.columns[data.name]['label'] === undefined) {
                        var name = data.name;

                        if(name.includes('_')) {
                            name.replace('_', ' ');
                        } else {
                            name.replace(/([A-Z])/g, ' $1').trim();
                        }

                        name = name.charAt(0).toUpperCase() + name.slice(1);

                        modelConfig.columns[data.name]['label'] = name;
                    }
                }

                modelConfig.columns[data.name]['input'] = data.input;
            }
        };

        const setProperties = function (data) {
            if(viewConfig.components.length === 0) {
                viewConfig.components = {};
            }

            if(viewConfig.components[current.id] === undefined) {
                viewConfig.components[current.id] = {};
            }

            _.forEach(data, function (item, key) {
                viewConfig.components[current.id][key] = item;
            });

            viewConfig.components[current.id]['type'] = current.type;
            viewConfig.components[current.id]['parent'] = current.parent;
            viewConfig.components[current.id]['index'] = current.index;

            if(current.parent === 'page') {
                viewConfig.components[current.id]['level'] = 1;
            } else {
                viewConfig.components[current.id]['level'] = viewConfig.components[current.parent]['level'] + 1;
            }

            _.forEach($('#' + current.id).siblings(), function (sibling) {
                viewConfig.components[$(sibling).data('id')]['index'] = $(sibling).index();
            })
        };

        const deleteProperties = function (id) {
            var columnName = viewConfig.components[id]['name'];

            delete viewConfig.components[id];
            delete modelConfig.columns[columnName];
        };

        const saveProperties = function () {
            var time = moment().format('YYYY_MM_DD_HHmmss');
            var history = {
                time: time,
                table: {}
            };

            _.forEach(modelConfig.columns, function (config, name) {
                history.table[name] = {...config};
            });

            if(_.last(modelConfig.history) === undefined || !_.isEqual(_.last(modelConfig.history).table, modelConfig.columns)) {
                modelConfig.history.push(history);
            }

            Promise.all([ServiceViewConfig.update(viewConfig), ServiceModelConfig.update(modelConfig)]).then(function (data) {
                var status = 'success';
                var message = '';
                var errorCount = 0;

                _.forEach(data, function (item) {
                    message += item.message + '\n';
                    if(!item.status) {
                        errorCount++;
                    }
                });

                if(errorCount === data.length) {
                    status = 'error';
                } else if(errorCount > 0 && errorCount < data.length) {
                    status = 'warning';
                }

                swal(status.toUpperCase(), message, status);
            });
        };

        const displayProperties= function (data) {
            if(data) {
                current = data;
                current.bind = {
                    model: {},
                    binding: {}
                };

                $propertiesForm.data({
                    'component': current.id,
                    'type': current.type
                }).html('');

                initComponent();

                initBinding();
            }
        };
        
        const drawModelColumns = function (choose = false, id = null) {
            var rows = '';

            _.forEach(modelConfig.columns, function (item, name) {
                var chooseInput = '';

                if(current.type === 'table' || current.type === 'table-detail') {
                    chooseInput = '   <td><input type="checkbox" name="choose-column[]" class="input-choose-columns" value="' + name + '"></td>';
                } else if(current.type === 'thumbnail' || current.type === 'heading-data' || current.type === 'label-data' || current.type === 'paragraph-data') {
                    chooseInput = '   <td><input type="radio" name="choose-column" class="input-choose-columns" value="' + name + '"></td>';
                } else {
                    chooseInput = '';
                }

                rows += '<tr>' +
                    chooseInput +
                    '   <td>' + name + '</td>' +
                    '   <td>' + item.label + '</td>' +
                    '   <td>' + item.type + '</td>' +
                    '   <td>' + item.input + '</td>' +
                    '   <td><a class="btn btn-xs btn-danger" data-name="' + name + '" data-toggle="tooltip" title="Delete Item" href="#"><i class="far fa-trash-alt"></i></a></td>' +
                    '</tr>'
            });

            if(choose) {
                $('#table-choose-columns tbody').html(rows);

                _.forEach($('#'+id).val().split(','), function (item) {
                    $('[value="' + item + '"]').attr('checked', 'true');
                });
            } else {
                $('#table-model-columns tbody').html(rows);

            }
        };

        const saveChoosenColumns = function (id) {
            var $choosenColumns = $('.input-choose-columns:checked').map(function(){
                return $(this).val();
            }).get();

            $('#'+id).val($choosenColumns.join()).trigger('input');
        };

        return {
            displayProperties: displayProperties,
            saveProperties: saveProperties,
            deleteProperties: deleteProperties,
            drawModelColumns: drawModelColumns,
            saveChoosenColumns: saveChoosenColumns,
            model: modelConfig
        };
    };

    return propertySidebar;
});
