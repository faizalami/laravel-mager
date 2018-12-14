define(['jquery', 'jqueryui'], function ($) {
    var sortableConfig = function ($sortableComponent = null) {
        var $nestedSortable = (function () {
            if ($sortableComponent === null) {
                return $('.nested-sortable');
            } else {
                return $sortableComponent;
            }
        })();

        var $nestedSortableParent = $nestedSortable.parent();

        var config = {
            revert: true,
            connectWith: '.nested-sortable',
            sort: function () {
                $nestedSortableParent.css('border', 'solid 1px #5f5f5f');
            },
            stop: function (event, ui) {
                ui.item.css('width', '');
                $nestedSortableParent.css('border', '');
            },
            receive: function () {
                $nestedSortable.css('height', '');
                $nestedSortableParent.prop('style', '');
                $('.nested-sortable').sortable({
                    revert: true,
                    connectWith: '.drawing-area'
                });
            }
        };

        return {
            $nestedSortable: $nestedSortable,
            config: config
        };
    };

    return sortableConfig;
});