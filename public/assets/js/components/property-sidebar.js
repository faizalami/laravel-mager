var loadFiles = [
    'jquery',
    'lodash',
    'assets/js/services/component-template',
    'assets/js/services/view-config',
    'assets/js/services/model-config',
    'assets/js/services/controller-config',
];

define(loadFiles, function ($, _, ServiceComponentTemplate, ServiceViewConfig, ServiceModelConfig, ServiceControllerConfig) {
    require(['jquerymy']);

    var propertySidebar = (function () {

        const componentTemplate= ServiceComponentTemplate.config;
        var viewConfig= ServiceViewConfig('create').config;
        var modelConfig= ServiceModelConfig('coba').config;
        var controllerConfig= ServiceControllerConfig('coba').config;
        var $propertiesForm=$('#properties-form');
        var currentType;
        var currentId;

        const currentComponent = function () {
            var component = componentTemplate[currentType];

            if(currentType === 'page') {
                component.id.value = viewConfig.id;
                component.title.value = viewConfig.title;
            } else {
                var objectProperties = viewConfig.components[currentId];
                if(objectProperties !== undefined) {
                    _.forEach(component, function (item, key) {
                        item.value = objectProperties[key];
                    })
                }
            }

            return component;
        };

        var drawForm = function (id, item, value) {
            var $template = $($('#template-property-input').html());
            var $input = $($('#template-property-'+item.type).html());

            $input.prop({
                'id': id,
                'placeholder': item.label
            }).val(value);

            $template.find('.property-label')
                .prop('for', '#'+id)
                .html(item.label);

            $template.find('.property-input')
                .html($input);

            $propertiesForm.append($template);
        };

        const displayProperties= function (type, id) {
            currentType = type;
            currentId = id;
            $propertiesForm.data({
                'component': id,
                'type': type
            }).html('');

            _.forEach(currentComponent(), function (item, key) {
                var value = item.value !== undefined ? item.value : '';

                if(key === 'id' && value === '') {
                    value = id;
                }

                drawForm(key, item, value);
            });
        };

        return {
            displayProperties: displayProperties
        };
    })();

    return propertySidebar;
});