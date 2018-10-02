const componentProperties = {
    page: {
        id: {
            label: 'ID',
            type: 'textbox'
        },
        text: {
            label: 'Text',
            type: 'textbox'
        },
    },
    label: {
        id: {
            label: 'ID',
            type: 'textbox'
        },
        text: {
            label: 'Text',
            type: 'textarea'
        },
    },
    textbox: {
        id: {
            label: 'ID',
            type: 'textbox'
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
            type: 'textbox'
        },
    },
};

$(document).ready(function () {
    var defaultIds = {};

    displayProperties(componentProperties.page, '#page', 'page');

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
        displayProperties(componentProperties.page, '#page', 'page');
    });

    function displayProperties(component, object, type) {
        var $properties = $('#properties-form');

        $properties.data({
            'component': object,
            'type': type
        }).html('');

        _.forEach(component, function (item, key) {
            var $loadTemplate = $($('#template-property-input').html());

            var $loadInput = $($('#template-property-'+item.type).html());

            var value = item.default !== undefined ? item.default : '';

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
    }
});
