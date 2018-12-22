define(['assets/js/services/json-io'], function (ServiceJsonIO) {
    var componentTemplate = async function () {
        var url = 'template/component';

        const jsonIO = await ServiceJsonIO(url);

        return {
            url: url,
            config: jsonIO.data
        }
    };

    return componentTemplate();
});
