define(['jquery', 'jqueryui'], function ($) {

    var draggableConfig = function ($sortableComponent = null) {
        var $nestedSortable = (function () {
            if($sortableComponent === null) {
                return $('.nested-sortable');
            } else {
                return $sortableComponent;
            }
        })();

        var getDragComponent = function (type) {
            var containerType = 'component';
            if (type === 'row' || type === 'col') {
                containerType = type;
            }

            var $dragComponent = $($('#template-' + containerType).html());
            $dragComponent.find('.button-property').data('type', type);

            if(containerType === 'component') {
                $dragComponent.children('.component-body').html($('#template-' + type).html());
            }

            return $dragComponent;
        };

        var containerBorder = function (display = true) {
            var $sortableContainer = $('.nested-sortable').parent();
            if(display) {
                $sortableContainer.css('border', 'solid 1px #5f5f5f');
            } else {
                $sortableContainer.parent().css('border', '');
            }
        };

        var config = {
            opacity: 0.7,
            cursor: 'move',
            cursorAt: {top: 5, left: 5},
            containment: 'body',
            appendTo: 'body',
            connectToSortable: '.drawing-area',
            revert: 'invalid',
            helper: function () {
                var type = $(this).data('type');
                return getDragComponent(type);
            },
            drag: function (event, ui) {
                containerBorder();
                ui.helper.data('type', $(this).data('type'));
            },
            stop: function (event, ui) {
                containerBorder(false);
            }
        };

        return {
            $nestedSortable: $nestedSortable,
            config: config
        };
    };

    return draggableConfig;
});