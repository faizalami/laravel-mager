const componentProperties = {
    page: {
        id: {
            label: 'ID',
            type: 'textbox'
        },
        text: {
            label: 'Text',
            type: 'textbox',
            default: 'Page Name'
        },
    },
    label: {
        id: {
            label: 'ID',
            type: 'textbox'
        },
        text: {
            label: 'Text',
            type: 'textarea',
            default: 'Label Text'
        },
    },
    textbox: {
        id: {
            label: 'ID',
            type: 'textbox'
        },
        label: {
            label: 'Label',
            type: 'textbox',
            default: 'Textbox Label'
        },
        name: {
            label: 'Name',
            type: 'textbox'
        },
        value: {
            label: 'Value',
            type: 'textbox'
        },
        minLength: {
            label: 'Min Length',
            type: 'numberbox',
            default: 0
        },
        maxLength: {
            label: 'Max Length',
            type: 'numberbox',
            default: 255
        },
    },
    numberbox: {
        id: {
            label: 'ID',
            type: 'textbox'
        },
        label: {
            label: 'Label',
            type: 'textbox',
            default: 'Numberbox Label'
        },
        name: {
            label: 'Name',
            type: 'textbox'
        },
        value: {
            label: 'Value',
            type: 'textbox'
        },
        minLength: {
            label: 'Min Length',
            type: 'numberbox',
            default: 0
        },
        maxLength: {
            label: 'Max Length',
            type: 'numberbox',
            default: 255
        },
    },
    emailbox: {
        id: {
            label: 'ID',
            type: 'textbox'
        },
        label: {
            label: 'Label',
            type: 'textbox',
            default: 'Emailbox Label'
        },
        name: {
            label: 'Name',
            type: 'textbox'
        },
        value: {
            label: 'Value',
            type: 'textbox'
        },
        minLength: {
            label: 'Min Length',
            type: 'numberbox',
            default: 0
        },
        maxLength: {
            label: 'Max Length',
            type: 'numberbox',
            default: 255
        },
    },
    passwordbox: {
        id: {
            label: 'ID',
            type: 'textbox'
        },
        label: {
            label: 'Label',
            type: 'textbox',
            default: 'Passwordbox Label'
        },
        name: {
            label: 'Name',
            type: 'textbox'
        },
        value: {
            label: 'Value',
            type: 'textbox'
        },
        minLength: {
            label: 'Min Length',
            type: 'numberbox',
            default: 0
        },
        maxLength: {
            label: 'Max Length',
            type: 'numberbox',
            default: 255
        },
    },
    button: {
        id: {
            label: 'ID',
            type: 'textbox'
        },
        text: {
            label: 'Text',
            type: 'textbox',
            default: 'Button'
        },
    },
};

$(document).ready(function () {
    var defaultIds = {};

    displayProperties(componentProperties.page, 'page', 'page');

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

                $('.drag-component')
                    .addClass('place-component')
                    .removeClass('drag-component')
                    .data('id', componentId)
                    .prop('id', componentId);

                displayProperties(componentProperties[type], componentId, type);
            }
        }
    });

    $('.drawing-area').sortable({
        revert: true
    });

    $('.drawing-area').on('click', '.button-remove', function () {
        $(this).tooltip('hide');
        $(this).parents('.place-component').slideUp('slow', function () {
            $(this).remove();
        });
    });

    $('.drawing-area').on('click', '.button-property', function () {
        $(this).tooltip('hide');
        displayProperties(componentProperties[$(this).data('type')], $(this).parents('.component-container').data('id'), $(this).data('type'));
    });

    $('.drawing-area-header').click(function () {
        displayProperties(componentProperties.page, 'page', 'page');
    });

    function displayProperties(component, object, type) {
        var $properties = $('#properties-form');

        $properties.data({
            'component': object,
            'type': type
        }).html('');

        var model = {}, binding = {}, ids = [];

        _.forEach(component, function (item, key) {
            var $loadTemplate = $($('#template-property-input').html());

            var $loadInput = $($('#template-property-'+item.type).html());

            var value = item.default !== undefined ? item.default : '';

            if(key === 'id') {
                value = object;
            }

            model[key] = value;

            binding['#'+key] = key;
            ids.push('#'+key);

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

        switch (type) {
            case 'page':
                binding['#' + object] = {
                    bind: function (data, value, $control) {
                        $control.prop('id', data.id)
                            .find('.page-name').html(data.text);
                    },
                    watch: ids.join(', ')
                };
                break;
            case 'label':
                binding['#' + object] = {
                    bind: function (data, value, $control) {
                        $control.prop('id', data.id)
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
                        $control.prop('id', data.id);
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
                        $control.prop('id', data.id)
                            .find('.component-button').html(data.text);
                    },
                    watch: ids.join(', ')
                };
                break;
            default:
                binding['#' + object] = {
                    bind: function (data, value, $control) {
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
});
