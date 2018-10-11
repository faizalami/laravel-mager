const controllerName = 'controllername';
const pageName = 'pagename';

const reqComponentConfiguration = async function () {
    return await axios.get(baseUrl + 'pages/config/component');
};

const reqProperties = async function () {
    return await axios.get(baseUrl + 'pages/config/page/' + controllerName + '/' + pageName);
};

(async function() {
    const getComponentConfiguration = await reqComponentConfiguration();
    const componentConfiguration = getComponentConfiguration.data;

    const getProperties = await reqProperties();
    var savedProperties = getProperties.data;

    $(document).ready(function () {
        var defaultIds = {};

        displayProperties('page', 'page');

        $('#show-page-properties').click(function () {
            displayProperties('page', 'page');
        });

        $('#save-page-properties').click(function () {
            axios.post(baseUrl + 'pages/config/page/save/controllername/pagename', savedProperties)
                .then(function (response) {
                    const data = response.data;
                    if(data.status) {
                        swal("Success", data.message, "success");
                    } else {
                        swal("Error", data.message, "warning");
                    }
                });
        });

        $('#open-component-sidebar').click(function () {
            $('.component-sidebar').toggleClass('active');
        });

        $('#open-property-sidebar').click(function () {
            $('.property-sidebar').toggleClass('active');
        });

        $('.component-sidebar .sidebar-item').draggable({
            opacity: 0.7,
            cursor: 'move',
            cursorAt: { top: 5, left: 5 },
            containment: 'body',
            appendTo: 'body',
            connectToSortable: '.drawing-area',
            revert: 'invalid',
            helper: function() {
                var type = $(this).data('type');
                var $dragComponent = $($('#template-component').html());
                $dragComponent.find('.button-property').data('type', type);
                $dragComponent.children('.component-body').html($('#template-'+type).html());
                return $dragComponent;
            },
            stop: function(event, ui) {
                if(ui.helper.is('.ui-sortable-helper')) {
                    var type = $(this).data('type');

                    if(defaultIds[type] !== undefined) {

                        defaultIds[type]++;
                    } else {
                        defaultIds[type] = 1;
                    }
                    var componentId = type + defaultIds[type];

                    ui.helper
                        .addClass('place-component')
                        .removeClass('drag-component')
                        .data('id', componentId)
                        .prop('id', componentId);

                    displayProperties(type, componentId);
                }
            }
        });

        $('.drawing-area').sortable({
            revert: true,
            stop: function(event, ui) {
                ui.item.css('width', '');
            }
        });

        $('.drawing-area').on('click', '.button-remove', function () {
            $(this).tooltip('hide');
            $(this).parents('.place-component').slideUp('slow', function () {
                $(this).remove();
            });
        });

        $('.drawing-area').on('click', '.button-property', function () {
            $(this).tooltip('hide');
            displayProperties($(this).data('type'), $(this).parents('.component-container').prop('id'));
        });

        $('.drawing-area-header').click(function () {
            displayProperties('page', $(this).prop('id'));
        });

        $('.property-sidebar').on('focus', 'input[type=text], input[type=number], textarea', function () {
            $(this).select();
        });

        function displayProperties(componentId, object) {
            const component = componentConfiguration[componentId];

            var $properties = $('#properties-form');

            $properties.data({
                'component': object,
                'type': componentId
            }).html('');

            var model = {}, binding = {};

            if(componentId === 'page') {
                component.id.value = savedProperties.id;
                component.title.value = savedProperties.title;
            } else {
                var objectProperties = savedProperties.components[object];
                if(objectProperties !== undefined) {
                    _.forEach(component, function (item, key) {
                        item.value = objectProperties[key];
                    })
                }
            }

            _.forEach(component, function (item, key) {
                var $loadTemplate = $($('#template-property-input').html());

                var $loadInput = $($('#template-property-'+item.type).html());

                var value = item.value !== undefined ? item.value : '';

                if(key === 'id' && value === '') {
                    value = object;
                }

                model[key] = value;

                binding['#'+key] = key;

                $loadInput.prop({
                    'id': key,
                    'placeholder': item.label
                }).val(value);

                $loadTemplate.find('.property-label')
                    .prop('for', '#'+key)
                    .html(item.label);

                $loadTemplate.find('.property-input')
                    .html($loadInput);

                $properties.append($loadTemplate);
            });

            prepareBinding(object, componentId, binding, model);
        }

        function prepareBinding(object, type, binding, model) {
            var ids = Object.keys(binding);

            switch (type) {
                case 'page':
                    binding['#' + object] = {
                        bind: function (data, value, $control) {
                            savedProperties.id = data.id;
                            savedProperties.title = data.title;

                            $control.data('id', data.id)
                                .find('.page-name').html(data.title);
                        },
                        watch: ids.join(', ')
                    };
                    break;
                case 'label':
                    binding['#' + object] = {
                        bind: function (data, value, $control) {
                            saveProperties(object, data);

                            $control.data('id', data.id)
                                .find('.component-label').html(data.text);
                        },
                        watch: ids.join(', ')
                    };
                    break;
                case 'textbox':
                case 'numberbox':
                case 'emailbox':
                case 'passwordbox':
                    binding['#' + object] = {
                        bind: function (data, value, $control) {
                            saveProperties(object, data);

                            $control.data('id', data.id);
                            $control.find('.component-label')
                                .html(data.label);
                            $control.find('.component-input')
                                .prop({
                                    'name': data.name,
                                    'placeholder': data.label,
                                    'minlength': data.minLength,
                                    'maxlength': data.maxLength,
                                }).val(data.value);
                        },
                        watch: ids.join(', ')
                    };
                    break;
                case 'button':
                    binding['#' + object] = {
                        bind: function (data, value, $control) {
                            saveProperties(object, data);

                            $control.data('id', data.id)
                                .find('.component-button').html(data.text);
                        },
                        watch: ids.join(', ')
                    };
                    break;
                default:
                    binding['#' + object] = {
                        bind: function (data) {
                            saveProperties(object, data);

                            console.log(data);
                        },
                        watch: ids.join(', ')
                    };
                    break;
            }

            var $guiBuilder = $('.gui-builder');
            $guiBuilder.my('remove');
            $guiBuilder.my({ui: binding}, model);
        }

        function saveProperties(object, data) {
            if(savedProperties.components[object] === undefined) {
                savedProperties.components[object] = {};
            }

            _.forEach(data, function (item, key) {
                savedProperties.components[object][key] = item;
            });
        }
    });
})();
