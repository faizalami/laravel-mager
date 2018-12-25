// todo: dummy
localStorage.setItem('controller', 'demo');
localStorage.setItem('model', 'demo');
localStorage.setItem('view', 'form');

var loadFiles = [
    'jquery',
    'lodash',
    'sweetalert',
    'promise!assets/js/services/component-template',
    'promise!assets/js/services/view-config',
    'promise!assets/js/services/model-config',
    'jquerymy'
];

define(loadFiles, function ($, _, swal, ServiceComponentTemplate, ServiceViewConfig, ServiceModelConfig) {

    var propertySidebar = (function () {

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

            $input.attr({
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
                    value = item.value !== undefined ? item.value : current.id;
                } else {
                    value = item.value !== undefined ? item.value : '';
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
                case 'button':
                    binding['#' + current.id] = {
                        bind: function (data, value, $control) {
                            setProperties(data);

                            $control.data('id', data.id)
                                .find('.component-'+current.type).html(data.text);
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

                            modelConfig.columns[data.name] = componentTemplate[current.type].db;
                            modelConfig.columns[data.name]['label'] = data.label;

                            var attr = {};
                            _.forEach(data, function (value, key) {
                                if(key !== 'label') {
                                    attr[key] = value;
                                }
                            });

                            $input.attr(attr);
                        },
                        watch: ids.join(', ')
                    };
                    break;
                case 'col':
                    binding['#' + current.id] = {
                        bind: function (data, value, $control) {
                            var colSize = {
                                xs: 6,
                                sm: 6,
                                md: 4,
                                lg: 4
                            };
                            _.forEach(colSize, function (size, colName) {
                                setProperties(data);

                                $control.css('border', 'solid 1px #5f5f5f')
                                    .removeClass('col-' + colName + '-' + size)
                                    .addClass('col-' + colName + '-' + data[colName]);
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

        const setProperties = function (data) {
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
        };

        const saveProperties = function () {
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

        return {
            displayProperties: displayProperties,
            saveProperties: saveProperties
        };
    })();

    return propertySidebar;
});
