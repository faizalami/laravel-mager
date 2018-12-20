define(['assets/js/services/json-io'], function (ServiceJsonIO) {
    var modelConfig = async function () {
        const controller = localStorage.getItem('controller');
        const model = localStorage.getItem('model');

        var url = 'model/' + controller + '/' + model;

        const jsonIO = await ServiceJsonIO(url);

        return {
            url: url,
            config: jsonIO.data,
            update: jsonIO.updateJson
        }
    };

    return modelConfig();
});