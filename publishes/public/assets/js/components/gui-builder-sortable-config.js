define(['jquery', 'lodash', 'jqueryui'], function ($, _) {
    var sortableConfig = function (savedConfig, $sortableComponent = null) {
        var $nestedSortable = (function () {
            if ($sortableComponent === null) {
                return $('.nested-sortable');
            } else {
                return $sortableComponent;
            }
        })();

        var defaultIds = [];
        _.forEach(savedConfig, function (config, id) {
            var type = id.replace(/[0-9]/g, '');
            var number = parseInt(id.replace(/[a-zA-Z]/g, ''));

            defaultIds[type] = number;
        });

        var $nestedSortableParent = $nestedSortable.parent();

        var getComponentId = function (type) {
            if (defaultIds[type] !== undefined) {
                defaultIds[type]++;
            } else {
                defaultIds[type] = 1;
            }

            return type + defaultIds[type];
        };

        var getParentId = function (item) {
            var parentId = 'page';
            var itemParent = item.parent();

            if(itemParent.is('.row') || itemParent.is('.col-container')) {
                parentId = itemParent.parent().attr('id');
            }

            return parentId;
        };

        var sortStopConfig = function (ui) {
            ui.item.css('width', '');
            $nestedSortableParent.css('border', '');

            var type = ui.item.data('type');
            var componentId = ui.item.attr('id');

            if(componentId === undefined) {
                componentId = getComponentId(type);
            }

            ui.item
                .addClass('place-component')
                .removeClass('drag-component')
                .data('id', componentId)
                .attr('id', componentId);

            var data = {
                type: type,
                id: componentId,
                parent: getParentId(ui.item),
                index: ui.item.index()
            };

            $( '.component-sidebar .sidebar-item').trigger( 'dragstop', [ ui, data ] );
        };

        var config = {
            revert: true,
            connectWith: '.nested-sortable',
            sort: function () {
                $nestedSortableParent.css('border', 'solid 1px #5f5f5f');
            },
            change: function () {
                console.log('change');
            },
            stop: function (event, ui) {
                sortStopConfig(ui);
            },
            receive: function () {
                var $sortable = $('.nested-sortable');
                $sortable.css('height', '');
                $sortable.parent().prop('style', '');
                $sortable.sortable({
                    revert: true,
                    connectWith: '.drawing-area',
                    stop: function (event, ui) {
                        sortStopConfig(ui);
                    }
                });
            }
        };

        return {
            $nestedSortable: $nestedSortable,
            sortStopConfig: sortStopConfig,
            config: config
        };
    };

    return sortableConfig;
});
